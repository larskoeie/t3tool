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
 * New content elements wizard
 * (Part of the 'cms' extension)
 *
 * @author Kasper Skårhøj <kasperYYYY@typo3.com>
 */
unset($MCONF);
require __DIR__ . '/conf.php';
require $BACK_PATH . 'init.php';
// Unset MCONF/MLANG since all we wanted was back path etc. for this particular script.
unset($MCONF);
unset($MLANG);
// Merging locallang files/arrays:
$GLOBALS['LANG']->includeLLFile('EXT:lang/locallang_misc.xlf');
$LOCAL_LANG_orig = $LOCAL_LANG;
$LANG->includeLLFile('EXT:cms/layout/locallang_db_new_content_el.xlf');
\TYPO3\CMS\Core\Utility\ArrayUtility::mergeRecursiveWithOverrule($LOCAL_LANG_orig, $LOCAL_LANG);
$LOCAL_LANG = $LOCAL_LANG_orig;
// Exits if 'cms' extension is not loaded:
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::isLoaded('cms', 1);
/**
 * Local position map class
 *
 * @author Kasper Skårhøj <kasperYYYY@typo3.com>
 */
class ext_posMap extends \TYPO3\CMS\Backend\Tree\View\PagePositionMap {

	/**
	 * @todo Define visibility
	 */
	public $dontPrintPageInsertIcons = 1;

	/**
	 * Wrapping the title of the record - here we just return it.
	 *
	 * @param string $str The title value.
	 * @param array $row The record row.
	 * @return string Wrapped title string.
	 * @todo Define visibility
	 */
	public function wrapRecordTitle($str, $row) {
		return $str;
	}

	/**
	 * Create on-click event value.
	 *
	 * @param array $row The record.
	 * @param string $vv Column position value.
	 * @param integer $moveUid Move uid
	 * @param integer $pid PID value.
	 * @param integer $sys_lang System language
	 * @return string
	 * @todo Define visibility
	 */
	public function onClickInsertRecord($row, $vv, $moveUid, $pid, $sys_lang = 0) {
		$table = 'tt_content';
		$location = $this->backPath . 'alt_doc.php?edit[tt_content][' . (is_array($row) ? -$row['uid'] : $pid) . ']=new&defVals[tt_content][colPos]=' . $vv . '&defVals[tt_content][sys_language_uid]=' . $sys_lang . '&returnUrl=' . rawurlencode($GLOBALS['SOBE']->R_URI);
		return 'window.location.href=\'' . $location . '\'+document.editForm.defValues.value; return false;';
	}

}

/*
 * @deprecated since 6.0, the classname SC_db_new_content_el and this file is obsolete
 * and will be removed with 6.2. The class was renamed and is now located at:
 * typo3/sysext/backend/Classes/Controller/ContentElement/NewContentElementController.php
 */
require_once \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('backend') . 'Classes/Controller/ContentElement/NewContentElementController.php';
// Make instance:
$SOBE = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\\CMS\\Backend\\Controller\\ContentElement\\NewContentElementController');
$SOBE->init();
// Include files?
foreach ($SOBE->include_once as $INC_FILE) {
	include_once $INC_FILE;
}
$SOBE->main();
$SOBE->printContent();
