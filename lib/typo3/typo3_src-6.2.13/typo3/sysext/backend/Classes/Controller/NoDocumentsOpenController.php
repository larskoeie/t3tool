<?php
namespace TYPO3\CMS\Backend\Controller;

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

use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Script Class for the "No-doc" display; This shows most recently edited records.
 *
 * @author Kasper Skårhøj <kasperYYYY@typo3.com>
 */
class NoDocumentsOpenController {

	// Internal:
	// Content accumulation
	/**
	 * @todo Define visibility
	 */
	public $content;

	/**
	 * Document template object
	 *
	 * @var \TYPO3\CMS\Backend\Template\DocumentTemplate
	 * @todo Define visibility
	 */
	public $doc;

	/**
	 * Object for backend modules.
	 *
	 * @var \TYPO3\CMS\Backend\Module\ModuleLoader
	 * @todo Define visibility
	 */
	public $loadModules;

	/**
	 * Constructor
	 */
	public function __construct() {
		$GLOBALS['SOBE'] = $this;
		$GLOBALS['LANG']->includeLLFile('EXT:lang/locallang_alt_doc.xml');

		$this->init();
	}

	/**
	 * Initialize.
	 *
	 * @return void
	 */
	protected function init() {
		// Start the template object:
		$this->doc = GeneralUtility::makeInstance('TYPO3\\CMS\\Backend\\Template\\DocumentTemplate');
		$this->doc->bodyTagMargins['x'] = 5;
		$this->doc->bodyTagMargins['y'] = 5;
		$this->doc->backPath = $GLOBALS['BACK_PATH'];
		// Add JS
		$this->doc->JScode = $this->doc->wrapScriptTags('
		function jump(url, modName, mainModName) {
				// clear information about which entry in nav. tree that might have been highlighted.
			top.fsMod.navFrameHighlightedID = [];

			if (top.content && top.content.nav_frame && top.content.nav_frame.refresh_nav) {
				top.content.nav_frame.refresh_nav();
			}

			top.nextLoadModuleUrl = url;
			top.goToModule(modName);
		}
		');
		// Start the page:
		$this->content = '';
		$this->content .= $this->doc->startPage('TYPO3 Edit Document');
		// Loads the backend modules available for the logged in user.
		$this->loadModules = GeneralUtility::makeInstance('TYPO3\\CMS\\Backend\\Module\\ModuleLoader');
		$this->loadModules->load($GLOBALS['TBE_MODULES']);
	}

	/**
	 * Rendering the content.
	 *
	 * @return void
	 */
	public function main() {
		$msg = array();
		// Add a message, telling that no documents were open...
		$msg[] = '<p>' . $GLOBALS['LANG']->getLL('noDocuments_msg', TRUE) . '</p><br />';
		// If another page module was specified, replace the default Page module with the new one
		$newPageModule = trim($GLOBALS['BE_USER']->getTSConfigVal('options.overridePageModule'));
		$pageModule = \TYPO3\CMS\Backend\Utility\BackendUtility::isModuleSetInTBE_MODULES($newPageModule) ? $newPageModule : 'web_layout';
		// Perform some access checks:
		$a_wl = $GLOBALS['BE_USER']->check('modules', 'web_list');
		$a_wp = $GLOBALS['BE_USER']->check('modules', $pageModule);
		// Finding module images: PAGE
		$imgFile = $GLOBALS['LANG']->moduleLabels['tabs_images']['web_layout_tab'];
		$imgInfo = @getimagesize($imgFile);
		$img_web_layout = is_array($imgInfo) ? '<img src="../' . \TYPO3\CMS\Core\Utility\PathUtility::stripPathSitePrefix($imgFile) . '" ' . $imgInfo[3] . ' alt="" />' : '';
		// Finding module images: LIST
		$imgFile = $GLOBALS['LANG']->moduleLabels['tabs_images']['web_list_tab'];
		$imgInfo = @getimagesize($imgFile);
		$img_web_list = is_array($imgInfo) ? '<img src="../' . \TYPO3\CMS\Core\Utility\PathUtility::stripPathSitePrefix($imgFile) . '" ' . $imgInfo[3] . ' alt="" />' : '';
		// If either the Web>List OR Web>Page module are active, show the little message with links to those modules:
		if ($a_wl || $a_wp) {
			$msg_2 = array();
			// Web>Page:
			if ($a_wp) {
				$msg_2[] = '<strong><a href="#" onclick="top.goToModule(\'' . $pageModule . '\'); return false;">' . $GLOBALS['LANG']->getLL('noDocuments_pagemodule', TRUE) . $img_web_layout . '</a></strong>';
				if ($a_wl) {
					$msg_2[] = $GLOBALS['LANG']->getLL('noDocuments_OR');
				}
			}
			// Web>List
			if ($a_wl) {
				$msg_2[] = '<strong><a href="#" onclick="top.goToModule(\'web_list\'); return false;">' . $GLOBALS['LANG']->getLL('noDocuments_listmodule', TRUE) . $img_web_list . '</a></strong>';
			}
			$msg[] = '<p>' . sprintf($GLOBALS['LANG']->getLL('noDocuments_msg2', 1), implode(' ', $msg_2)) . '</p><br />';
		}
		// Display the list of the most recently edited documents:
		$modObj = GeneralUtility::makeInstance('TYPO3\\CMS\\Opendocs\\Controller\\OpendocsController');
		$msg[] = '<p>' . $GLOBALS['LANG']->getLL('noDocuments_msg3', TRUE) . '</p><br />' . $modObj->renderMenu();
		// Adding the content:
		$this->content .= $this->doc->section($GLOBALS['LANG']->getLL('noDocuments'), implode(' ', $msg), 0, 1);
	}

	/**
	 * Printing the content.
	 *
	 * @return void
	 */
	public function printContent() {
		$this->content .= $this->doc->endPage();
		$this->content = $this->doc->insertStylesAndJS($this->content);
		echo $this->content;
	}

}
