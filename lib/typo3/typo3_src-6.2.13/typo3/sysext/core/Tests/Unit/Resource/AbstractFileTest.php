<?php
namespace TYPO3\CMS\Core\Tests\Unit\Resource;

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
use TYPO3\CMS\Core\Resource\File;

/**
 * Testcase for the abstract file class of the TYPO3 FAL
 *
 * @author Steffen Müller <typo3@t3node.com>
 */
class AbstractFileTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {

	/**
	 * @test
	 */
	public function getParentFolderGetsParentFolderFromStorage() {
		$parentIdentifier = '/parent/';
		$currentIdentifier = '/parent/current/';

		$mockedStorageForParent = $this->getMock('TYPO3\\CMS\\Core\\Resource\\ResourceStorage', array(), array(), '', FALSE);

		/** @var \TYPO3\CMS\Core\Resource\AbstractFile $parentFolderFixture */
		$parentFolderFixture = $this->getMockForAbstractClass('TYPO3\\CMS\\Core\\Resource\\AbstractFile');
		$parentFolderFixture->setIdentifier($parentIdentifier)->setStorage($mockedStorageForParent);

		$mockedStorage = $this->getMock('TYPO3\\CMS\\Core\\Resource\\ResourceStorage', array('getFolderIdentifierFromFileIdentifier', 'getFolder'), array(), '', FALSE);
		$mockedStorage->expects($this->once())->method('getFolderIdentifierFromFileIdentifier')->with($currentIdentifier)->will($this->returnValue($parentIdentifier));
		$mockedStorage->expects($this->once())->method('getFolder')->with($parentIdentifier)->will($this->returnValue($parentFolderFixture));

		/** @var \TYPO3\CMS\Core\Resource\AbstractFile $currentFolderFixture */
		$currentFolderFixture = $this->getMockForAbstractClass('TYPO3\\CMS\\Core\\Resource\\AbstractFile');
		$currentFolderFixture->setIdentifier($currentIdentifier)->setStorage($mockedStorage);

		$this->assertSame($parentFolderFixture, $currentFolderFixture->getParentFolder());
	}

	/**
	 * This test accounts for an inconsistency in the Storage–Driver interface of FAL: The driver returns the MIME
	 * type in a field "mimetype", while the file object and the database table use mime_type.
	 * The test is placed in the test case for AbstractFile because the broken functionality resides there, though
	 * it is only triggered when constructing a File instance with an index record.
	 *
	 * @test
	 */
	public function storageIsNotAskedForMimeTypeForPersistedRecord() {
		$mockedStorage = $this->getMockBuilder('TYPO3\\CMS\\Core\\Resource\\ResourceStorage')
			->disableOriginalConstructor()->getMock();
		$mockedStorage->expects($this->never())->method('getFileInfoByIdentifier')->with('/foo', 'mimetype');
		$subject = new File(array('identifier' => '/foo', 'mime_type' => 'my/mime-type'), $mockedStorage);

		$this->assertEquals('my/mime-type', $subject->getMimeType());
	}

}
