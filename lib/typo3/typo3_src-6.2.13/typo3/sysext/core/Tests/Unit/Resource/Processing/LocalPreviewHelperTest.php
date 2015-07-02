<?php
namespace TYPO3\CMS\Core\Tests\Unit\Resource\Processing;

/*
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

use TYPO3\CMS\Core\Tests\UnitTestCase;

/**
 * Testcase for \TYPO3\CMS\Core\Resource\Processing\LocalPreviewHelper
 */
class LocalPreviewHelperTest extends UnitTestCase {

	/**
	 * @test
	 */
	public function processProvidesDefaultSizeIfNotConfigured() {
		$file = $this->getMockBuilder('TYPO3\\CMS\\Core\\Resource\\File')
			->disableOriginalConstructor()
			->getMock();
		// Use size slightly larger than default size to ensure processing
		$file->expects($this->any())->method('getProperty')->will($this->returnValueMap(array(
			array('width', 65),
			array('height', 65),
		)));

		$task = $this->getMock('TYPO3\\CMS\\Core\\Resource\\Processing\\TaskInterface');
		$task->expects($this->once())->method('getSourceFile')->willReturn($file);
		$task->expects($this->once())->method('getConfiguration')->willReturn(array());

		$localPreviewHelper = $this->getMockBuilder('TYPO3\\CMS\\Core\\Resource\\Processing\\LocalPreviewHelper')
			->disableOriginalConstructor()
			->setMethods(array('getTemporaryFilePath', 'generatePreviewFromFile'))
			->getMock();
		$localPreviewHelper->expects($this->once())->method('getTemporaryFilePath')->willReturn('test/file');
		// Assert that by default 64x64 is used as preview size
		$localPreviewHelper->expects($this->once())->method('generatePreviewFromFile')
			->with($file, array('width' => 64, 'height' => 64), 'test/file');

		$localPreviewHelper->process($task);
	}

	/**
	 * @test
	 */
	public function processDoesNotScaleUpImages() {
		$file = $this->getMockBuilder('TYPO3\\CMS\\Core\\Resource\\File')
			->disableOriginalConstructor()
			->getMock();
		$file->expects($this->any())->method('getProperty')->will($this->returnValueMap(array(
			array('width', 20),
			array('height', 20),
		)));

		$localPreviewHelper = $this->getMockBuilder('TYPO3\\CMS\\Core\\Resource\\Processing\\LocalPreviewHelper')
			->disableOriginalConstructor()
			->setMethods(array('dummy'))
			->getMock();

		$task = $this->getMock('TYPO3\\CMS\\Core\\Resource\\Processing\\TaskInterface');
		$task->expects($this->once())->method('getSourceFile')->willReturn($file);
		$task->expects($this->once())->method('getConfiguration')->willReturn(array('width' => 30, 'height' => 30));

		$this->assertNull($localPreviewHelper->process($task));
	}

	/**
	 * @test
	 */
	public function processGeneratesPreviewEvenIfSourceFileHasNoSize() {
		$file = $this->getMockBuilder('TYPO3\\CMS\\Core\\Resource\\File')
			->disableOriginalConstructor()
			->getMock();
		$file->expects($this->any())->method('getProperty')->will($this->returnValueMap(array(
			array('width', 0),
			array('height', 0),
		)));

		$task = $this->getMock('TYPO3\\CMS\\Core\\Resource\\Processing\\TaskInterface');
		$task->expects($this->once())->method('getSourceFile')->willReturn($file);
		$task->expects($this->once())->method('getConfiguration')->willReturn(array());

		$localPreviewHelper = $this->getMockBuilder('TYPO3\\CMS\\Core\\Resource\\Processing\\LocalPreviewHelper')
			->disableOriginalConstructor()
			->setMethods(array('getTemporaryFilePath', 'generatePreviewFromFile'))
			->getMock();
		$expectedResult = array('width' => 20, 'height' => 20, 'filePath' => 'test/file');
		$localPreviewHelper->expects($this->once())->method('generatePreviewFromFile')->willReturn($expectedResult);

		$this->assertEquals($expectedResult, $localPreviewHelper->process($task));
	}
}
