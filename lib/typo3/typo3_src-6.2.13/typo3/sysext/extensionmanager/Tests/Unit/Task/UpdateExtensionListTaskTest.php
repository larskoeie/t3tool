<?php
namespace TYPO3\CMS\Extensionmanager\Tests\Unit\Task;

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
 */
class UpdateExtensionListTaskTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {

	/**
	 * @var array A backup of registered singleton instances
	 */
	protected $singletonInstances = array();

	/**
	 * @var \TYPO3\CMS\Extensionmanager\Utility\Repository\Helper
	 */
	protected $repositoryHelper;

	/**
	 * Set up
	 */
	public function setUp() {
		if (!\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::isLoaded('scheduler')) {
			$this->markTestSkipped('Tests need EXT:scheduler loaded.');
		}
		$this->singletonInstances = \TYPO3\CMS\Core\Utility\GeneralUtility::getSingletonInstances();
		$this->repositoryHelper = $this->getMock('TYPO3\\CMS\\Extensionmanager\\Utility\\Repository\\Helper', array(), array(), '', FALSE);
	}

	/**
	 * Tear down
	 */
	public function tearDown() {
		\TYPO3\CMS\Core\Utility\GeneralUtility::resetSingletonInstances($this->singletonInstances);
		parent::tearDown();
	}

	/**
	 * @test
	 */
	public function updateExtensionListTaskIsInstanceOfAbstractTask() {
		$taskMock = $this->getMock('TYPO3\\CMS\\Extensionmanager\\Task\\UpdateExtensionListTask');
		$this->assertInstanceOf('TYPO3\\CMS\\Scheduler\\Task\\AbstractTask', $taskMock);
	}

	/**
	 * @test
	 */
	public function executeCallsUpdateExtListOfRepositoryHelper() {
		$this->repositoryHelper
				->expects($this->once())
				->method('updateExtList');

		$objectManagerMock = $this->getMock('TYPO3\\CMS\\Extbase\\Object\\ObjectManager');
		$objectManagerMock
				->expects($this->at(0))
				->method('get')
				->with('TYPO3\\CMS\\Extensionmanager\\Utility\\Repository\\Helper')
				->will($this->returnValue($this->repositoryHelper));

		$persistenceManagerMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\Generic\\PersistenceManager');
		$objectManagerMock
				->expects($this->at(1))
				->method('get')
				->will($this->returnValue($persistenceManagerMock));

		\TYPO3\CMS\Core\Utility\GeneralUtility::setSingletonInstance('TYPO3\\CMS\\Extbase\\Object\\ObjectManager', $objectManagerMock);

		$task = $this->getMock('TYPO3\\CMS\\Extensionmanager\\Task\\UpdateExtensionListTask', array('dummy'), array(), '', FALSE);
		$task->execute();
	}

	/**
	 * @test
	 */
	public function executeCallsPersistAllOnPersistenceManager() {
		$objectManagerMock = $this->getMock('TYPO3\\CMS\\Extbase\\Object\\ObjectManager');
		$objectManagerMock
			->expects($this->at(0))
			->method('get')
			->with('TYPO3\\CMS\\Extensionmanager\\Utility\\Repository\\Helper')
			->will($this->returnValue($this->repositoryHelper));

		$persistenceManagerMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\Generic\\PersistenceManager');
		$persistenceManagerMock
			->expects($this->once())
			->method('persistAll');

		$objectManagerMock
				->expects($this->at(1))
				->method('get')
				->will($this->returnValue($persistenceManagerMock));

		\TYPO3\CMS\Core\Utility\GeneralUtility::setSingletonInstance('TYPO3\\CMS\\Extbase\\Object\\ObjectManager', $objectManagerMock);

		$task = $this->getMock('TYPO3\\CMS\\Extensionmanager\\Task\\UpdateExtensionListTask', array('dummy'), array(), '', FALSE);
		$task->execute();
	}
}
