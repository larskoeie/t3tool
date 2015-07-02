<?php
namespace TYPO3\CMS\Core\Tests\Unit\Configuration;

/**
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

/**
 * Test case
 *
 * @author Christian Kuhn <lolli@schwarzbu.ch>
 */
class ConfigurationManagerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {

	/**
	 * Absolute path to files that must be removed
	 * after a test - handled in tearDown
	 */
	protected $testFilesToDelete = array();

	/**
	 * @var \TYPO3\CMS\Core\Configuration\ConfigurationManager|\PHPUnit_Framework_MockObject_MockObject
	 */
	protected $fixture;

	public function setUp() {
		$this->createFixtureWithMockedMethods(
			array(
				'getDefaultConfigurationFileLocation',
				'getLocalConfigurationFileLocation',
			)
		);
	}

	/**
	 * Tear down test case
	 */
	public function tearDown() {
		foreach ($this->testFilesToDelete as $absoluteFileName) {
			\TYPO3\CMS\Core\Utility\GeneralUtility::unlink_tempfile($absoluteFileName);
		}
		parent::tearDown();
	}

	/**
	 * @param array $methods
	 */
	protected function createFixtureWithMockedMethods(array $methods) {
		$this->fixture = $this->getMock(
			'TYPO3\\CMS\\Core\\Configuration\\ConfigurationManager',
			$methods
		);
	}

	/**
	 * @test
	 * @expectedException \RuntimeException
	 */
	public function getDefaultConfigurationExecutesDefinedDefaultConfigurationFile() {
		$defaultConfigurationFile = PATH_site . 'typo3temp/' . $this->getUniqueId('defaultConfiguration');
		file_put_contents(
			$defaultConfigurationFile,
			'<?php throw new \RuntimeException(\'foo\', 1310203814); ?>'
		);
		$this->testFilesToDelete[] = $defaultConfigurationFile;

		$this->fixture
			->expects($this->once())
			->method('getDefaultConfigurationFileLocation')
			->will($this->returnValue($defaultConfigurationFile));
		$this->fixture->getDefaultConfiguration();
	}

	/**
	 * @test
	 * @expectedException \RuntimeException
	 */
	public function getLocalConfigurationExecutesDefinedConfigurationFile() {
		$configurationFile = PATH_site . 'typo3temp/' . $this->getUniqueId('localConfiguration');
		file_put_contents(
			$configurationFile,
			'<?php throw new \RuntimeException(\'foo\', 1310203815); ?>'
		);
		$this->testFilesToDelete[] = $configurationFile;

		$this->fixture
			->expects($this->once())
			->method('getLocalConfigurationFileLocation')
			->will($this->returnValue($configurationFile));
		$this->fixture->getLocalConfiguration();
	}

	/**
	 * @test
	 */
	public function updateLocalConfigurationWritesNewMergedLocalConfigurationArray() {
		$currentLocalConfiguration = array(
			'notChanged' => 23,
			'changed' => 'unChanged',
		);
		$overrideConfiguration = array(
			'changed' => 'changed',
			'new' => 'new'
		);
		$expectedConfiguration = array(
			'notChanged' => 23,
			'changed' => 'changed',
			'new' => 'new',
		);

		$this->createFixtureWithMockedMethods(
			array(
				'getLocalConfiguration',
				'writeLocalConfiguration',
			)
		);
		$this->fixture->expects($this->once())
				->method('getLocalConfiguration')
				->will($this->returnValue($currentLocalConfiguration));
		$this->fixture->expects($this->once())
				->method('writeLocalConfiguration')
				->with($expectedConfiguration);

		$this->fixture->updateLocalConfiguration($overrideConfiguration);
	}

	/**
	 * @test
	 */
	public function getDefaultConfigurationValueByPathReturnsCorrectValue() {
		$this->createFixtureWithMockedMethods(
			array(
				'getDefaultConfiguration',
			)
		);
		$this->fixture->expects($this->once())
				->method('getDefaultConfiguration')
				->will($this->returnValue(array(
					'path' => 'value',
				)
			));

		$this->assertSame('value', $this->fixture->getDefaultConfigurationValueByPath('path'));
	}

	/**
	 * @test
	 */
	public function getLocalConfigurationValueByPathReturnsCorrectValue() {
		$this->createFixtureWithMockedMethods(
			array(
				'getLocalConfiguration',
			)
		);
		$this->fixture->expects($this->once())
				->method('getLocalConfiguration')
				->will($this->returnValue(array(
					'path' => 'value',
				)
			));

		$this->assertSame('value', $this->fixture->getLocalConfigurationValueByPath('path'));
	}

	/**
	 * @test
	 */
	public function getConfigurationValueByPathReturnsCorrectValue() {
		$this->createFixtureWithMockedMethods(
			array(
				'getDefaultConfiguration',
				'getLocalConfiguration',
			)
		);
		$this->fixture->expects($this->once())
				->method('getDefaultConfiguration')
				->will($this->returnValue(array(
					'path' => 'value',
				)
			));
		$this->fixture->expects($this->once())
				->method('getLocalConfiguration')
				->will($this->returnValue(array(
					'path' => 'valueOverride',
				)
			));

		$this->assertSame('valueOverride', $this->fixture->getConfigurationValueByPath('path'));
	}

	/**
	 * @test
	 */
	public function setLocalConfigurationValueByPathReturnFalseIfPathIsNotValid() {
		$this->createFixtureWithMockedMethods(array(
				'isValidLocalConfigurationPath',
			));
		$this->fixture->expects($this->once())
				->method('isValidLocalConfigurationPath')
				->will($this->returnValue(FALSE));

		$this->assertFalse($this->fixture->setLocalConfigurationValueByPath('path', 'value'));
	}

	/**
	 * @test
	 */
	public function setLocalConfigurationValueByPathUpdatesValueDefinedByPath() {
		$currentLocalConfiguration = array(
			'notChanged' => 23,
			'toUpdate' => 'notUpdated',
		);
		$expectedConfiguration = array(
			'notChanged' => 23,
			'toUpdate' => 'updated',
		);

		$this->createFixtureWithMockedMethods(
			array(
				'isValidLocalConfigurationPath',
				'getLocalConfiguration',
				'writeLocalConfiguration',
			)
		);
		$this->fixture->expects($this->once())
				->method('isValidLocalConfigurationPath')
				->will($this->returnValue(TRUE));
		$this->fixture->expects($this->once())
				->method('getLocalConfiguration')
				->will($this->returnValue($currentLocalConfiguration));
		$this->fixture->expects($this->once())
				->method('writeLocalConfiguration')
				->with($expectedConfiguration);

		$this->fixture->setLocalConfigurationValueByPath('toUpdate', 'updated');
	}

	/**
	 * @test
	 */
	public function setLocalConfigurationValuesByPathValuePairsSetsPathValuePairs() {
		$currentLocalConfiguration = array(
			'notChanged' => 23,
			'toUpdate' => 'notUpdated',
		);
		$expectedConfiguration = array(
			'notChanged' => 23,
			'toUpdate' => 'updated',
			'new' => 'new',
		);

		$this->createFixtureWithMockedMethods(
			array(
				'isValidLocalConfigurationPath',
				'getLocalConfiguration',
				'writeLocalConfiguration',
			)
		);
		$this->fixture->expects($this->any())
				->method('isValidLocalConfigurationPath')
				->will($this->returnValue(TRUE));
		$this->fixture->expects($this->once())
				->method('getLocalConfiguration')
				->will($this->returnValue($currentLocalConfiguration));
		$this->fixture->expects($this->once())
				->method('writeLocalConfiguration')
				->with($expectedConfiguration);

		$pairs = array(
			'toUpdate' => 'updated',
			'new' => 'new'
		);
		$this->fixture->setLocalConfigurationValuesByPathValuePairs($pairs);
	}

	/**
	 * @test
	 */
	public function removeLocalConfigurationKeysByPathRemovesGivenPathsFromConfigurationAndReturnsTrue() {
		$currentLocalConfiguration = array(
			'toRemove1' => 'foo',
			'notChanged' => 23,
			'toRemove2' => 'bar',
		);
		$expectedConfiguration = array(
			'notChanged' => 23,
		);

		$this->createFixtureWithMockedMethods(
			array(
				'getLocalConfiguration',
				'writeLocalConfiguration',
			)
		);
		$this->fixture->expects($this->once())
			->method('getLocalConfiguration')
			->will($this->returnValue($currentLocalConfiguration));
		$this->fixture->expects($this->once())
			->method('writeLocalConfiguration')
			->with($expectedConfiguration);

		$removePaths = array(
			'toRemove1',
			'toRemove2',
		);
		$this->assertTrue($this->fixture->removeLocalConfigurationKeysByPath($removePaths));
	}

	/**
	 * @test
	 */
	public function removeLocalConfigurationKeysByPathReturnsFalseIfNothingIsRemoved() {
		$currentLocalConfiguration = array(
			'notChanged' => 23,
		);
		$this->createFixtureWithMockedMethods(
			array(
				'getLocalConfiguration',
				'writeLocalConfiguration',
			)
		);
		$this->fixture->expects($this->once())
			->method('getLocalConfiguration')
			->will($this->returnValue($currentLocalConfiguration));
		$this->fixture->expects($this->never())
			->method('writeLocalConfiguration');

		$removeNothing = array();
		$this->assertFalse($this->fixture->removeLocalConfigurationKeysByPath($removeNothing));
	}

	/**
	 * @test
	 */
	public function removeLocalConfigurationKeysByPathReturnsFalseIfSomethingInexistentIsRemoved() {
		$currentLocalConfiguration = array(
			'notChanged' => 23,
		);
		$this->createFixtureWithMockedMethods(
			array(
				'getLocalConfiguration',
				'writeLocalConfiguration',
			)
		);
		$this->fixture->expects($this->once())
			->method('getLocalConfiguration')
			->will($this->returnValue($currentLocalConfiguration));
		$this->fixture->expects($this->never())
			->method('writeLocalConfiguration');

		$removeNonExisting = array('notPresent');
		$this->assertFalse($this->fixture->removeLocalConfigurationKeysByPath($removeNonExisting));
	}

	/**
	 * @test
	 */
	public function canWriteConfigurationReturnsFalseIfDirectoryIsNotWritable() {
		if (function_exists('posix_getegid') && posix_getegid() === 0) {
			$this->markTestSkipped('Test skipped if run on linux as root');
		} elseif (TYPO3_OS == 'WIN') {
			$this->markTestSkipped('Not available on Windows');
		}
		/** @var $fixture \TYPO3\CMS\Core\Configuration\ConfigurationManager|\PHPUnit_Framework_MockObject_MockObject|\TYPO3\CMS\Core\Tests\AccessibleObjectInterface */
		$fixture = $this->getAccessibleMock('TYPO3\\CMS\\Core\\Configuration\\ConfigurationManager', array('dummy'));

		$directory = 'typo3temp/' . $this->getUniqueId('test_');
		$absoluteDirectory = PATH_site . $directory;
		mkdir($absoluteDirectory);
		chmod($absoluteDirectory, 0544);
		clearstatcache();

		$fixture->_set('pathTypo3Conf', $directory);

		$result = $fixture->canWriteConfiguration();

		chmod($absoluteDirectory, 0755);
		rmdir($absoluteDirectory);

		$this->assertFalse($result);
	}

	/**
	 * @test
	 */
	public function canWriteConfigurationReturnsFalseIfLocalConfigurationFileIsNotWritable() {
		if (function_exists('posix_getegid') && posix_getegid() === 0) {
			$this->markTestSkipped('Test skipped if run on linux as root');
		} elseif (TYPO3_OS == 'WIN') {
			$this->markTestSkipped('Not available on Windows');
		}
		/** @var $fixture \TYPO3\CMS\Core\Configuration\ConfigurationManager|\PHPUnit_Framework_MockObject_MockObject|\TYPO3\CMS\Core\Tests\AccessibleObjectInterface */
		$fixture = $this->getAccessibleMock('TYPO3\\CMS\\Core\\Configuration\\ConfigurationManager', array('dummy'));

		$file = 'typo3temp/' . $this->getUniqueId('test_');
		$absoluteFile = PATH_site . $file;
		touch($absoluteFile);
		$this->testFilesToDelete[] = $absoluteFile;
		chmod($absoluteFile, 0444);
		clearstatcache();

		$fixture->_set('localConfigurationFile', $file);

		$result = $fixture->canWriteConfiguration();

		chmod($absoluteFile, 0644);

		$this->assertFalse($result);
	}

	/**
	 * @test
	 */
	public function canWriteConfigurationReturnsTrueIfDirectoryAndFilesAreWritable() {
		/** @var $fixture \TYPO3\CMS\Core\Configuration\ConfigurationManager|\PHPUnit_Framework_MockObject_MockObject|\TYPO3\CMS\Core\Tests\AccessibleObjectInterface */
		$fixture = $this->getAccessibleMock('TYPO3\\CMS\\Core\\Configuration\\ConfigurationManager', array('dummy'));

		$directory = 'typo3temp/' . $this->getUniqueId('test_');
		$absoluteDirectory = PATH_site . $directory;
		mkdir($absoluteDirectory);
		$fixture->_set('pathTypo3Conf', $absoluteDirectory);

		$file1 = 'typo3temp/' . $this->getUniqueId('test_');
		$absoluteFile1 = PATH_site . $file1;
		touch($absoluteFile1);
		$this->testFilesToDelete[] = $absoluteFile1;
		$fixture->_set('localConfigurationFile', $absoluteFile1);

		$file2 = 'typo3temp/' . $this->getUniqueId('test_');
		$absoluteFile2 = PATH_site . $file2;
		touch($absoluteFile2);
		$this->testFilesToDelete[] = $absoluteFile2;
		$fixture->_set('localconfFile', $absoluteFile2);

		clearstatcache();

		$result = $fixture->canWriteConfiguration();

		$this->assertTrue($result);
	}

	/**
	 * @test
	 */
	public function writeLocalConfigurationWritesSortedContentToConfigurationFile() {
		$configurationFile = PATH_site . 'typo3temp/' . $this->getUniqueId('localConfiguration');
		if (!is_file($configurationFile)) {
			if (!$fh = fopen($configurationFile, 'wb')) {
				$this->markTestSkipped('Can not create file ' . $configurationFile . '. Please check your write permissions.');
			}
			fclose($fh);
		}

		if (!@is_file($configurationFile)) {
			throw new \RuntimeException('File ' . $configurationFile . ' could not be found. Please check your write permissions', 1346364362);
		}
		$this->testFilesToDelete[] = $configurationFile;

		$this->fixture
			->expects($this->any())
			->method('getLocalConfigurationFileLocation')
			->will($this->returnValue($configurationFile));

		$pairs = array(
			'foo' => 42,
			'bar' => 23
		);
		$expectedContent =
			'<?php' . LF .
				'return array(' . LF .
					TAB . '\'bar\' => 23,' . LF .
					TAB . '\'foo\' => 42,' . LF .
				');' . LF .
			'?>';

		$this->fixture->writeLocalConfiguration($pairs);
		$this->assertSame($expectedContent, file_get_contents($configurationFile));
	}

	/**
	 * @test
	 * @expectedException \RuntimeException
	 */
	public function createLocalConfigurationFromFactoryConfigurationThrowsExceptionIfFileExists() {
		/** @var $fixture \TYPO3\CMS\Core\Configuration\ConfigurationManager|\PHPUnit_Framework_MockObject_MockObject|\TYPO3\CMS\Core\Tests\AccessibleObjectInterface */
		$fixture = $this->getAccessibleMock('TYPO3\\CMS\\Core\\Configuration\\ConfigurationManager', array('dummy'));

		$file = 'typo3temp/' . $this->getUniqueId('test_');
		$absoluteFile = PATH_site . $file;
		touch($absoluteFile);
		$this->testFilesToDelete[] = $absoluteFile;
		$fixture->_set('localConfigurationFile', $file);

		$fixture->createLocalConfigurationFromFactoryConfiguration();
	}

	/**
	 * @test
	 */
	public function createLocalConfigurationFromFactoryConfigurationWritesContentFromFactoryFile() {
		/** @var $fixture \TYPO3\CMS\Core\Configuration\ConfigurationManager|\PHPUnit_Framework_MockObject_MockObject|\TYPO3\CMS\Core\Tests\AccessibleObjectInterface */
		$fixture = $this->getAccessibleMock('TYPO3\\CMS\\Core\\Configuration\\ConfigurationManager', array('writeLocalConfiguration'));
		$fixture->_set('localConfigurationFile', 'typo3temp/' . $this->getUniqueId('dummy_'));

		$factoryConfigurationFile = 'typo3temp/' . $this->getUniqueId('test_') . '.php';
		$factoryConfigurationAbsoluteFile = PATH_site . $factoryConfigurationFile;
		$uniqueContentString = $this->getUniqueId('string_');
		$validFactoryConfigurationFileContent =
			'<?php' . LF .
				'return array(' . LF .
					$uniqueContentString . ' => foo,' . LF .
				');' . LF .
			'?>';
		file_put_contents(
			$factoryConfigurationAbsoluteFile,
			$validFactoryConfigurationFileContent
		);
		$this->testFilesToDelete[] = $factoryConfigurationAbsoluteFile;

		$fixture->_set('factoryConfigurationFile', $factoryConfigurationFile);

		$fixture
			->expects($this->once())
			->method('writeLocalConfiguration')
			->with($this->arrayHasKey($uniqueContentString));
		$fixture->createLocalConfigurationFromFactoryConfiguration();
	}

	/**
	 * @test
	 */
	public function createLocalConfigurationFromFactoryConfigurationMergesConfigurationWithAdditionalFactoryFile() {
		/** @var $fixture \TYPO3\CMS\Core\Configuration\ConfigurationManager|\PHPUnit_Framework_MockObject_MockObject|\TYPO3\CMS\Core\Tests\AccessibleObjectInterface */
		$fixture = $this->getAccessibleMock('TYPO3\\CMS\\Core\\Configuration\\ConfigurationManager', array('writeLocalConfiguration'));
		$fixture->_set('localConfigurationFile', 'typo3temp/' . $this->getUniqueId('dummy_'));

		$factoryConfigurationFile = 'typo3temp/' . $this->getUniqueId('test_') . '.php';
		$factoryConfigurationAbsoluteFile = PATH_site . $factoryConfigurationFile;
		$validFactoryConfigurationFileContent =
			'<?php' . LF .
				'return array();' . LF .
			'?>';
		file_put_contents(
			$factoryConfigurationAbsoluteFile,
			$validFactoryConfigurationFileContent
		);
		$this->testFilesToDelete[] = $factoryConfigurationAbsoluteFile;
		$fixture->_set('factoryConfigurationFile', $factoryConfigurationFile);

		$additionalFactoryConfigurationFile = 'typo3temp/' . $this->getUniqueId('test_') . '.php';
		$additionalFactoryConfigurationAbsoluteFile = PATH_site . $additionalFactoryConfigurationFile;
		$uniqueContentString = $this->getUniqueId('string_');
		$validAdditionalFactoryConfigurationFileContent =
			'<?php' . LF .
				'return array(' . LF .
					$uniqueContentString . ' => foo,' . LF .
				');' . LF .
			'?>';
		file_put_contents(
			$additionalFactoryConfigurationAbsoluteFile,
			$validAdditionalFactoryConfigurationFileContent
		);
		$this->testFilesToDelete[] = $additionalFactoryConfigurationAbsoluteFile;
		$fixture->_set('additionalFactoryConfigurationFile', $additionalFactoryConfigurationFile);

		$fixture
			->expects($this->once())
			->method('writeLocalConfiguration')
			->with($this->arrayHasKey($uniqueContentString));
		$fixture->createLocalConfigurationFromFactoryConfiguration();
	}

	/**
	 * @test
	 */
	public function isValidLocalConfigurationPathAcceptsWhitelistedPath() {
		/** @var $fixture \TYPO3\CMS\Core\Configuration\ConfigurationManager|\PHPUnit_Framework_MockObject_MockObject|\TYPO3\CMS\Core\Tests\AccessibleObjectInterface */
		$fixture = $this->getAccessibleMock('TYPO3\\CMS\\Core\\Configuration\\ConfigurationManager', array('dummy'));
		$fixture->_set('whiteListedLocalConfigurationPaths', array('foo/bar'));
		$this->assertTrue($fixture->_call('isValidLocalConfigurationPath', 'foo/bar/baz'));
	}

	/**
	 * @test
	 */
	public function isValidLocalConfigurationPathDeniesNotWhitelistedPath() {
		/** @var $fixture \TYPO3\CMS\Core\Configuration\ConfigurationManager|\PHPUnit_Framework_MockObject_MockObject|\TYPO3\CMS\Core\Tests\AccessibleObjectInterface */
		$fixture = $this->getAccessibleMock('TYPO3\\CMS\\Core\\Configuration\\ConfigurationManager', array('dummy'));
		$fixture->_set('whiteListedLocalConfigurationPaths', array('foo/bar'));
		$this->assertFalse($fixture->_call('isValidLocalConfigurationPath', 'bar/baz'));
	}
}
