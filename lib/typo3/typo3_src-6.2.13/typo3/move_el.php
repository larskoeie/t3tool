<?php
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
 * Move element wizard:
 * Moving pages or content elements (tt_content) around in the system via a page tree navigation.
 *
 * @author Kasper Skårhøj <kasperYYYY@typo3.com>
 */
require __DIR__ . '/init.php';

/**
 * Local extension of the page tree class
 *
 * @author Kasper Skårhøj <kasperYYYY@typo3.com>
 */
class moveElementLocalPageTree extends \TYPO3\CMS\Backend\Tree\View\PageTreeView {

	/**
	 * Inserting uid-information in title-text for an icon
	 *
	 * @param string $icon Icon image
	 * @param array $row Item row
	 * @return string Wrapping icon image.
	 * @todo Define visibility
	 */
	public function wrapIcon($icon, $row) {
		return $this->addTagAttributes($icon, ' title="id=' . htmlspecialchars($row['uid']) . '"');
	}

}

/**
 * Extension of position map for pages
 *
 * @author Kasper Skårhøj <kasperYYYY@typo3.com>
 */
class ext_posMap_pages extends \TYPO3\CMS\Backend\Tree\View\PagePositionMap {

	/**
	 * @todo Define visibility
	 */
	public $l_insertNewPageHere = 'movePageToHere';

	/**
	 * Page tree implementation class name
	 *
	 * @var string
	 */
	protected $pageTreeClassName = 'moveElementLocalPageTree';

	/**
	 * Creates the onclick event for the insert-icons.
	 *
	 * @param integer $pid The pid.
	 * @param integer $newPagePID New page id.
	 * @return string Onclick attribute content
	 * @todo Define visibility
	 */
	public function onClickEvent($pid, $newPagePID) {
		return 'window.location.href=\'tce_db.php?cmd[pages][' . $GLOBALS['SOBE']->moveUid . '][' . $this->moveOrCopy . ']=' . $pid . '&redirect=' . rawurlencode($this->R_URI) . '&prErr=1&uPT=1&vC=' . $GLOBALS['BE_USER']->veriCode() . \TYPO3\CMS\Backend\Utility\BackendUtility::getUrlToken('tceAction') . '\';return false;';
	}

	/**
	 * Wrapping page title.
	 *
	 * @param string $str Page title.
	 * @param array $rec Page record (?)
	 * @return string Wrapped title.
	 * @todo Define visibility
	 */
	public function linkPageTitle($str, $rec) {
		$url = \TYPO3\CMS\Core\Utility\GeneralUtility::linkThisScript(array('uid' => (int)$rec['uid'], 'moveUid' => $GLOBALS['SOBE']->moveUid));
		return '<a href="' . htmlspecialchars($url) . '">' . $str . '</a>';
	}

	/**
	 * Wrap $t_code in bold IF the $dat uid matches $id
	 *
	 * @param string $t_code Title string
	 * @param array $dat Information array with record array inside.
	 * @param integer $id The current id.
	 * @return string The title string.
	 * @todo Define visibility
	 */
	public function boldTitle($t_code, $dat, $id) {
		return parent::boldTitle($t_code, $dat, $GLOBALS['SOBE']->moveUid);
	}

}

/**
 * Extension of position map for content elements
 *
 * @author Kasper Skårhøj <kasperYYYY@typo3.com>
 */
class ext_posMap_tt_content extends \TYPO3\CMS\Backend\Tree\View\PagePositionMap {

	/**
	 * @todo Define visibility
	 */
	public $dontPrintPageInsertIcons = 1;

	/**
	 * Page tree implementation class name
	 *
	 * @var string
	 */
	protected $pageTreeClassName = 'moveElementLocalPageTree';

	/**
	 * Wrapping page title.
	 *
	 * @param string $str Page title.
	 * @param array $rec Page record (?)
	 * @return string Wrapped title.
	 * @todo Define visibility
	 */
	public function linkPageTitle($str, $rec) {
		$url = \TYPO3\CMS\Core\Utility\GeneralUtility::linkThisScript(array('uid' => (int)$rec['uid'], 'moveUid' => $GLOBALS['SOBE']->moveUid));
		return '<a href="' . htmlspecialchars($url) . '">' . $str . '</a>';
	}

	/**
	 * Wrapping the title of the record.
	 *
	 * @param string $str The title value.
	 * @param array $row The record row.
	 * @return string Wrapped title string.
	 * @todo Define visibility
	 */
	public function wrapRecordTitle($str, $row) {
		if ($GLOBALS['SOBE']->moveUid == $row['uid']) {
			$str = '<strong>' . $str . '</strong>';
		}
		return parent::wrapRecordTitle($str, $row);
	}
}

$moveElementController = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\\CMS\\Backend\\Controller\\ContentElement\\MoveElementController');
$moveElementController->main();
$moveElementController->printContent();
