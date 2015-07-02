<?php
namespace TYPO3\CMS\Backend\Controller\File;

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

use TYPO3\CMS\Backend\Utility\BackendUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Script Class for the create-new script; Displays a form for creating up to 10 folders or one new text file
 *
 * @author Kasper Skårhøj <kasperYYYY@typo3.com>
 */
class CreateFolderController {

	// External, static:
	/**
	 * @todo Define visibility
	 */
	public $folderNumber = 10;

	// Internal, static:
	/**
	 * document template object
	 *
	 * @var \TYPO3\CMS\Backend\Template\DocumentTemplate
	 * @todo Define visibility
	 */
	public $doc;

	// Name of the filemount
	/**
	 * @todo Define visibility
	 */
	public $title;

	// Internal, static (GPVar):
	/**
	 * @todo Define visibility
	 */
	public $number;

	// Set with the target path inputted in &target
	/**
	 * @todo Define visibility
	 */
	public $target;

	/**
	 * The folder object which is  the target directory
	 *
	 * @var \TYPO3\CMS\Core\Resource\Folder $folderObject
	 */
	protected $folderObject;

	// Return URL of list module.
	/**
	 * @todo Define visibility
	 */
	public $returnUrl;

	// Internal, dynamic:
	// Accumulating content
	/**
	 * @todo Define visibility
	 */
	public $content;

	/**
	 * Constructor
	 */
	public function __construct() {
		$GLOBALS['SOBE'] = $this;
		$GLOBALS['BACK_PATH'] = '';

		$this->init();
	}

	/**
	 * Initialize
	 *
	 * @return void
	 */
	protected function init() {
		// Initialize GPvars:
		$this->number = GeneralUtility::_GP('number');
		$this->target = ($combinedIdentifier = GeneralUtility::_GP('target'));
		$this->returnUrl = GeneralUtility::sanitizeLocalUrl(GeneralUtility::_GP('returnUrl'));
		// create the folder object
		if ($combinedIdentifier) {
			$this->folderObject = \TYPO3\CMS\Core\Resource\ResourceFactory::getInstance()->getFolderObjectFromCombinedIdentifier($combinedIdentifier);
		}
		// Cleaning and checking target directory
		if (!$this->folderObject) {
			$title = $GLOBALS['LANG']->sL('LLL:EXT:lang/locallang_mod_file_list.xlf:paramError', TRUE);
			$message = $GLOBALS['LANG']->sL('LLL:EXT:lang/locallang_mod_file_list.xlf:targetNoDir', TRUE);
			throw new \RuntimeException($title . ': ' . $message, 1294586845);
		}
		if ($this->folderObject->getStorage()->getUid() === 0) {
			throw new \TYPO3\CMS\Core\Resource\Exception\InsufficientFolderAccessPermissionsException('You are not allowed to access folders outside your storages', 1375889838);
		}

		// Setting the title and the icon
		$icon = \TYPO3\CMS\Backend\Utility\IconUtility::getSpriteIcon('apps-filetree-root');
		$this->title = $icon . htmlspecialchars($this->folderObject->getStorage()->getName()) . ': ' . htmlspecialchars($this->folderObject->getIdentifier());
		// Setting template object
		$this->doc = GeneralUtility::makeInstance('TYPO3\\CMS\\Backend\\Template\\DocumentTemplate');
		$this->doc->setModuleTemplate('EXT:backend/Resources/Private/Templates/file_newfolder.html');
		$this->doc->backPath = $GLOBALS['BACK_PATH'];
		$this->doc->JScode = $this->doc->wrapScriptTags('
			var path = "' . $this->target . '";

			function reload(a) {	//
				if (!changed || (changed && confirm(' . GeneralUtility::quoteJSvalue($GLOBALS['LANG']->sL('LLL:EXT:lang/locallang_core.xlf:mess.redraw')) . '))) {
					var params = "&target="+encodeURIComponent(path)+"&number="+a+"&returnUrl=' . rawurlencode($this->returnUrl) . '";
					window.location.href = "file_newfolder.php?"+params;
				}
			}
			function backToList() {	//
				top.goToModule("file_list");
			}

			var changed = 0;
		');
	}

	/**
	 * Main function, rendering the main module content
	 *
	 * @return void
	 */
	public function main() {
		// Start content compilation
		$this->content .= $this->doc->startPage($GLOBALS['LANG']->sL('LLL:EXT:lang/locallang_core.xlf:file_newfolder.php.pagetitle'));
		// Make page header:
		$pageContent = $this->doc->header($GLOBALS['LANG']->sL('LLL:EXT:lang/locallang_core.xlf:file_newfolder.php.pagetitle'));
		$pageContent .= $this->doc->spacer(5);
		$pageContent .= $this->doc->divider(5);
		if ($this->folderObject->checkActionPermission('add')) {
			$code = '<form action="tce_file.php" method="post" name="editform">';
			// Making the selector box for the number of concurrent folder-creations
			$this->number = \TYPO3\CMS\Core\Utility\MathUtility::forceIntegerInRange($this->number, 1, 10);
			$code .= '
				<div id="c-select">
					<label for="number-of-new-folders">' . $GLOBALS['LANG']->sL('LLL:EXT:lang/locallang_core.xlf:file_newfolder.php.number_of_folders') . '</label>
					<select name="number" id="number-of-new-folders" onchange="reload(this.options[this.selectedIndex].value);">';
			for ($a = 1; $a <= $this->folderNumber; $a++) {
				$code .= '<option value="' . $a . '"' . ($this->number == $a ? ' selected="selected"' : '') . '>' . $a . '</option>';
			}
			$code .= '
					</select>
				</div>
				';
			// Making the number of new-folder boxes needed:
			$code .= '
				<div id="c-createFolders">
			';
			for ($a = 0; $a < $this->number; $a++) {
				$code .= '
						<input' . $this->doc->formWidth(20) . ' type="text" name="file[newfolder][' . $a . '][data]" onchange="changed=true;" />
						<input type="hidden" name="file[newfolder][' . $a . '][target]" value="' . htmlspecialchars($this->target) . '" /><br />
					';
			}
			$code .= '
				</div>
			';
			// Making submit button for folder creation:
			$code .= '
				<div id="c-submitFolders">
					<input type="submit" value="' . $GLOBALS['LANG']->sL('LLL:EXT:lang/locallang_core.xlf:file_newfolder.php.submit', TRUE) . '" />
					<input type="submit" value="' . $GLOBALS['LANG']->sL('LLL:EXT:lang/locallang_core.xlf:labels.cancel', TRUE) . '" onclick="backToList(); return false;" />
					<input type="hidden" name="redirect" value="' . htmlspecialchars($this->returnUrl) . '" />
					'. \TYPO3\CMS\Backend\Form\FormEngine::getHiddenTokenField('tceAction') . '
				</div>
				';
			// CSH:
			$code .= BackendUtility::cshItem('xMOD_csh_corebe', 'file_newfolder', $GLOBALS['BACK_PATH'], '<br />');
			$pageContent .= $code;
			// Add spacer:
			$pageContent .= $this->doc->spacer(10);
			// Switching form tags:
			$pageContent .= $this->doc->sectionEnd() . '</form>';
		}

		if ($this->folderObject->getStorage()->checkUserActionPermission('add', 'File')) {
			$pageContent .= '<form action="tce_file.php" method="post" name="editform2">';
			// Create a list of allowed file extensions with the nice format "*.jpg, *.gif" etc.
			$fileExtList = array();
			$textfileExt = GeneralUtility::trimExplode(',', $GLOBALS['TYPO3_CONF_VARS']['SYS']['textfile_ext'], TRUE);
			foreach ($textfileExt as $fileExt) {
				if (!preg_match(('/' . $GLOBALS['TYPO3_CONF_VARS']['BE']['fileDenyPattern'] . '/i'), ('.' . $fileExt))) {
					$fileExtList[] = '*.' . $fileExt;
				}
			}
			// Add form fields for creation of a new, blank text file:
			$code = '
				<div id="c-newFile">
					<p>[' . htmlspecialchars(implode(', ', $fileExtList)) . ']</p>
					<input' . $this->doc->formWidth(20) . ' type="text" name="file[newfile][0][data]" onchange="changed=true;" />
					<input type="hidden" name="file[newfile][0][target]" value="' . htmlspecialchars($this->target) . '" />
				</div>
				';
			// Submit button for creation of a new file:
			$code .= '
				<div id="c-submitFiles">
					<input type="submit" value="' . $GLOBALS['LANG']->sL('LLL:EXT:lang/locallang_core.xlf:file_newfolder.php.newfile_submit', TRUE) . '" />
					<input type="submit" value="' . $GLOBALS['LANG']->sL('LLL:EXT:lang/locallang_core.xlf:labels.cancel', TRUE) . '" onclick="backToList(); return false;" />
					<input type="hidden" name="redirect" value="' . htmlspecialchars($this->returnUrl) . '" />
					'. \TYPO3\CMS\Backend\Form\FormEngine::getHiddenTokenField('tceAction') . '
				</div>
				';
			// CSH:
			$code .= BackendUtility::cshItem('xMOD_csh_corebe', 'file_newfile', $GLOBALS['BACK_PATH'], '<br />');
			$pageContent .= $this->doc->section($GLOBALS['LANG']->sL('LLL:EXT:lang/locallang_core.xlf:file_newfolder.php.newfile'), $code);
			$pageContent .= $this->doc->sectionEnd();
			$pageContent .= '</form>';
		}

		$docHeaderButtons = array(
			'back' => ''
		);
		// Back
		if ($this->returnUrl) {
			$docHeaderButtons['back'] = '<a href="' . htmlspecialchars(GeneralUtility::linkThisUrl($this->returnUrl)) . '" class="typo3-goBack" title="' . $GLOBALS['LANG']->sL('LLL:EXT:lang/locallang_core.xlf:labels.goBack', TRUE) . '">' . \TYPO3\CMS\Backend\Utility\IconUtility::getSpriteIcon('actions-view-go-back') . '</a>';
		}
		// Add the HTML as a section:
		$markerArray = array(
			'CSH' => $docHeaderButtons['csh'],
			'FUNC_MENU' => BackendUtility::getFuncMenu($this->id, 'SET[function]', $this->MOD_SETTINGS['function'], $this->MOD_MENU['function']),
			'CONTENT' => $pageContent,
			'PATH' => $this->title
		);
		$this->content .= $this->doc->moduleBody(array(), $docHeaderButtons, $markerArray);
		$this->content .= $this->doc->endPage();
		$this->content = $this->doc->insertStylesAndJS($this->content);
	}

	/**
	 * Outputting the accumulated content to screen
	 *
	 * @return void
	 */
	public function printContent() {
		echo $this->content;
	}

}
