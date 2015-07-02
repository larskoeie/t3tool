<?php
namespace TYPO3\CMS\Backend\Controller\ContentElement;

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
use TYPO3\CMS\Backend\Utility\IconUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Script Class for the New Content element wizard
 *
 * @author Kasper Skårhøj <kasperYYYY@typo3.com>
 */
class NewContentElementController {

	// Internal, static (from GPvars):
	// Page id
	/**
	 * @todo Define visibility
	 */
	public $id;

	// Sys language
	/**
	 * @todo Define visibility
	 */
	public $sys_language = 0;

	// Return URL.
	/**
	 * @todo Define visibility
	 */
	public $R_URI = '';

	// If set, the content is destined for a specific column.
	/**
	 * @todo Define visibility
	 */
	public $colPos;

	/**
	 * @todo Define visibility
	 */
	public $uid_pid;

	// Internal, static:
	// Module TSconfig.
	/**
	 * @todo Define visibility
	 */
	public $modTSconfig = array();

	/**
	 * Internal backend template object
	 *
	 * @var \TYPO3\CMS\Backend\Template\DocumentTemplate
	 * @todo Define visibility
	 */
	public $doc;

	// Internal, dynamic:
	// Includes a list of files to include between init() and main() - see init()
	/**
	 * @todo Define visibility
	 */
	public $include_once = array();

	// Used to accumulate the content of the module.
	/**
	 * @todo Define visibility
	 */
	public $content;

	// Access boolean.
	/**
	 * @todo Define visibility
	 */
	public $access;

	// config of the wizard
	/**
	 * @todo Define visibility
	 */
	public $config;

	/**
	 * Constructor, initializing internal variables.
	 *
	 * @return void
	 * @todo Define visibility
	 */
	public function init() {
		// Setting class files to include:
		if (is_array($GLOBALS['TBE_MODULES_EXT']['xMOD_db_new_content_el']['addElClasses'])) {
			$this->include_once = array_merge($this->include_once, $GLOBALS['TBE_MODULES_EXT']['xMOD_db_new_content_el']['addElClasses']);
		}
		// Setting internal vars:
		$this->id = (int)GeneralUtility::_GP('id');
		$this->sys_language = (int)GeneralUtility::_GP('sys_language_uid');
		$this->R_URI = GeneralUtility::sanitizeLocalUrl(GeneralUtility::_GP('returnUrl'));
		$this->colPos = GeneralUtility::_GP('colPos') === NULL ? NULL : (int)GeneralUtility::_GP('colPos');
		$this->uid_pid = (int)GeneralUtility::_GP('uid_pid');
		$this->MCONF['name'] = 'xMOD_db_new_content_el';
		$this->modTSconfig = BackendUtility::getModTSconfig($this->id, 'mod.wizards.newContentElement');
		$config = BackendUtility::getPagesTSconfig($this->id);
		$this->config = $config['mod.']['wizards.']['newContentElement.'];
		// Starting the document template object:
		$this->doc = GeneralUtility::makeInstance('TYPO3\\CMS\\Backend\\Template\\DocumentTemplate');
		$this->doc->backPath = $GLOBALS['BACK_PATH'];
		$this->doc->setModuleTemplate('EXT:backend/Resources/Private/Templates/db_new_content_el.html');
		$this->doc->JScode = '';
		$this->doc->form = '<form action="" name="editForm"><input type="hidden" name="defValues" value="" />';
		// Setting up the context sensitive menu:
		$this->doc->getContextMenuCode();
		// Getting the current page and receiving access information (used in main())
		$perms_clause = $GLOBALS['BE_USER']->getPagePermsClause(1);
		$this->pageinfo = BackendUtility::readPageAccess($this->id, $perms_clause);
		$this->access = is_array($this->pageinfo) ? 1 : 0;
	}

	/**
	 * Creating the module output.
	 *
	 * @return void
	 * @todo Define visibility
	 */
	public function main() {
		if ($this->id && $this->access) {
			// Init position map object:
			$posMap = GeneralUtility::makeInstance('ext_posMap');
			$posMap->cur_sys_language = $this->sys_language;
			$posMap->backPath = $GLOBALS['BACK_PATH'];
			// If a column is pre-set:
			if (isset($this->colPos)) {
				if ($this->uid_pid < 0) {
					$row = array();
					$row['uid'] = abs($this->uid_pid);
				} else {
					$row = '';
				}
				$this->onClickEvent = $posMap->onClickInsertRecord($row, $this->colPos, '', $this->uid_pid, $this->sys_language);
			} else {
				$this->onClickEvent = '';
			}
			// ***************************
			// Creating content
			// ***************************
			// use a wrapper div
			$this->content .= '<div id="user-setup-wrapper">';
			$this->content .= $this->doc->header($GLOBALS['LANG']->getLL('newContentElement'));
			$this->content .= $this->doc->spacer(5);
			// Wizard
			$code = '';
			$wizardItems = $this->getWizardItems();
			// Wrapper for wizards
			$this->elementWrapper['section'] = array('<ul class="contentelement-wizard list-unstyled">', '</ul>');
			// Copy wrapper for tabs
			$this->elementWrapperForTabs = $this->elementWrapper;
			// Hook for manipulating wizardItems, wrapper, onClickEvent etc.
			if (is_array($GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['cms']['db_new_content_el']['wizardItemsHook'])) {
				foreach ($GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['cms']['db_new_content_el']['wizardItemsHook'] as $classData) {
					$hookObject = GeneralUtility::getUserObj($classData);
					if (!$hookObject instanceof \TYPO3\CMS\Backend\Wizard\NewContentElementWizardHookInterface) {
						throw new \UnexpectedValueException('$hookObject must implement interface TYPO3\\CMS\\Backend\\Wizard\\NewContentElementWizardHookInterface', 1227834741);
					}
					$hookObject->manipulateWizardItems($wizardItems, $this);
				}
			}
			if ($this->config['renderMode'] == 'tabs' && $this->elementWrapperForTabs != $this->elementWrapper) {
				// Restore wrapper for tabs if they are overwritten in hook
				$this->elementWrapper = $this->elementWrapperForTabs;
			}
			// Add document inline javascript
			$this->doc->JScode = $this->doc->wrapScriptTags('
				function goToalt_doc() {	//
					' . $this->onClickEvent . '
				}

				if(top.refreshMenu) {
					top.refreshMenu();
				} else {
					top.TYPO3ModuleMenu.refreshMenu();
				}
			');
			// Traverse items for the wizard.
			// An item is either a header or an item rendered with a radio button and title/description and icon:
			$cc = ($key = 0);
			$menuItems = array();
			foreach ($wizardItems as $k => $wInfo) {
				if ($wInfo['header']) {
					$menuItems[] = array(
						'label' => htmlspecialchars($wInfo['header']),
						'content' => $this->elementWrapper['section'][0]
					);
					$key = count($menuItems) - 1;
				} else {
					$content = '';

					if (!$this->onClickEvent) {
						// Radio button:
						$oC = 'document.editForm.defValues.value=unescape(\'' . rawurlencode($wInfo['params']) . '\');goToalt_doc();' . (!$this->onClickEvent ? 'window.location.hash=\'#sel2\';' : '');
						$content .= '<div class="contentelement-wizard-item-input"><input type="radio" name="tempB" value="' . htmlspecialchars($k) . '" onclick="' . htmlspecialchars($oC) . '" /></div>';
						// Onclick action for icon/title:
						$aOnClick = 'document.getElementsByName(\'tempB\')[' . $cc . '].checked=1;' . $oC . 'return false;';
					} else {
						$aOnClick = "document.editForm.defValues.value=unescape('".rawurlencode($wInfo['params'])."');goToalt_doc();".(!$this->onClickEvent?"window.location.hash='#sel2';":'');
					}

					$menuItems[$key]['content'] .=
						'<li>
							<div class="contentelement-wizard-item">
								' . $content . '
								<div class="contentelement-wizard-item-icon">
									<a href="#" onclick="' . htmlspecialchars($aOnClick) . '">
										<img' . IconUtility::skinImg($this->doc->backPath, $wInfo['icon'], '') . ' alt="" />
									</a>
								</div>
								<div class="contentelement-wizard-item-text">
									<a href="#" onclick="' . htmlspecialchars($aOnClick) . '">
										<strong>' . htmlspecialchars($wInfo['title']) . '</strong>
										<br />' . nl2br(htmlspecialchars(trim($wInfo['description']))) .
									'</a>
								</div>
							</div>
						</li>';
					$cc++;
				}
			}
			// Add closing section-tag
			foreach ($menuItems as $key => $val) {
				$menuItems[$key]['content'] .= $this->elementWrapper['section'][1];
			}
			// Add the wizard table to the content, wrapped in tabs:
			if ($this->config['renderMode'] == 'tabs') {
				$code = $GLOBALS['LANG']->getLL('sel1', 1) . '<br /><br />' . $this->doc->getDynTabMenu($menuItems, 'new-content-element-wizard', FALSE, FALSE);
			} else {
				$code = $GLOBALS['LANG']->getLL('sel1', 1) . '<br /><br />';
				foreach ($menuItems as $section) {
					$code .= '<h3 class="divider">' . $section['label'] . '</h3>' . $section['content'];
				}
			}
			$this->content .= $this->doc->section(!$this->onClickEvent ? $GLOBALS['LANG']->getLL('1_selectType') : '', $code, 0, 1);
			// If the user must also select a column:
			if (!$this->onClickEvent) {
				// Add anchor "sel2"
				$this->content .= $this->doc->section('', '<a name="sel2"></a>');
				$this->content .= $this->doc->spacer(20);
				// Select position
				$code = $GLOBALS['LANG']->getLL('sel2', 1) . '<br /><br />';

				// Load SHARED page-TSconfig settings and retrieve column list from there, if applicable:
				$colPosArray = GeneralUtility::callUserFunction('TYPO3\\CMS\\Backend\\View\\BackendLayoutView->getColPosListItemsParsed', $this->id, $this);
				$colPosIds = array_map(function($element){ return (int)$element[1]; }, $colPosArray);
				// Removing duplicates, if any
				$colPosList = implode(',', array_unique($colPosIds));
				// Finally, add the content of the column selector to the content:
				$code .= $posMap->printContentElementColumns($this->id, 0, $colPosList, 1, $this->R_URI);
				$this->content .= $this->doc->section($GLOBALS['LANG']->getLL('2_selectPosition'), $code, 0, 1);
			}
			// Close wrapper div
			$this->content .= '</div>';
		} else {
			// In case of no access:
			$this->content = '';
			$this->content .= $this->doc->header($GLOBALS['LANG']->getLL('newContentElement'));
			$this->content .= $this->doc->spacer(5);
		}
		// Setting up the buttons and markers for docheader
		$docHeaderButtons = $this->getButtons();
		$markers['CSH'] = $docHeaderButtons['csh'];
		$markers['CONTENT'] = $this->content;
		// Build the <body> for the module
		$this->content = $this->doc->startPage($GLOBALS['LANG']->getLL('newContentElement'));
		$this->content .= $this->doc->moduleBody($this->pageinfo, $docHeaderButtons, $markers);
		$this->content .= $this->doc->sectionEnd();
		$this->content .= $this->doc->endPage();
		$this->content = $this->doc->insertStylesAndJS($this->content);
	}

	/**
	 * Print out the accumulated content:
	 *
	 * @return void
	 * @todo Define visibility
	 */
	public function printContent() {
		echo $this->content;
	}

	/**
	 * Create the panel of buttons for submitting the form or otherwise perform operations.
	 *
	 * @return array All available buttons as an assoc. array
	 */
	protected function getButtons() {
		$buttons = array(
			'csh' => '',
			'back' => ''
		);
		if ($this->id && $this->access) {
			$buttons['csh'] = BackendUtility::cshItem('xMOD_csh_corebe', 'new_ce', $GLOBALS['BACK_PATH'], '', TRUE);
			if ($this->R_URI) {
				$buttons['back'] = '<a href="' . htmlspecialchars($this->R_URI) . '" class="typo3-goBack" title="' . $GLOBALS['LANG']->getLL('goBack', TRUE) . '">' . IconUtility::getSpriteIcon('actions-view-go-back') . '</a>';
			}
		}
		return $buttons;
	}

	/***************************
	 *
	 * OTHER FUNCTIONS:
	 *
	 ***************************/
	/**
	 * Returns the content of wizardArray() function...
	 *
	 * @return array Returns the content of wizardArray() function...
	 * @todo Define visibility
	 */
	public function getWizardItems() {
		return $this->wizardArray();
	}

	/**
	 * Returns the array of elements in the wizard display.
	 * For the plugin section there is support for adding elements there from a global variable.
	 *
	 * @return array
	 * @todo Define visibility
	 */
	public function wizardArray() {
		if (is_array($this->config)) {
			$wizards = $this->config['wizardItems.'];
		}
		$appendWizards = $this->wizard_appendWizards($wizards['elements.']);
		$wizardItems = array();
		if (is_array($wizards)) {
			foreach ($wizards as $groupKey => $wizardGroup) {
				$groupKey = preg_replace('/\\.$/', '', $groupKey);
				$showItems = GeneralUtility::trimExplode(',', $wizardGroup['show'], TRUE);
				$showAll = $wizardGroup['show'] === '*';
				$groupItems = array();
				if (is_array($appendWizards[$groupKey . '.']['elements.'])) {
					$wizardElements = array_merge((array) $wizardGroup['elements.'], $appendWizards[$groupKey . '.']['elements.']);
				} else {
					$wizardElements = $wizardGroup['elements.'];
				}
				if (is_array($wizardElements)) {
					foreach ($wizardElements as $itemKey => $itemConf) {
						$itemKey = preg_replace('/\\.$/', '', $itemKey);
						if ($showAll || in_array($itemKey, $showItems)) {
							$tmpItem = $this->wizard_getItem($groupKey, $itemKey, $itemConf);
							if ($tmpItem) {
								$groupItems[$groupKey . '_' . $itemKey] = $tmpItem;
							}
						}
					}
				}
				if (count($groupItems)) {
					$wizardItems[$groupKey] = $this->wizard_getGroupHeader($groupKey, $wizardGroup);
					$wizardItems = array_merge($wizardItems, $groupItems);
				}
			}
		}
		// Remove elements where preset values are not allowed:
		$this->removeInvalidElements($wizardItems);
		return $wizardItems;
	}

	/**
	 * @param mixed $wizardElements
	 * @return array
	 * @todo Define visibility
	 */
	public function wizard_appendWizards($wizardElements) {
		if (!is_array($wizardElements)) {
			$wizardElements = array();
		}
		if (is_array($GLOBALS['TBE_MODULES_EXT']['xMOD_db_new_content_el']['addElClasses'])) {
			foreach ($GLOBALS['TBE_MODULES_EXT']['xMOD_db_new_content_el']['addElClasses'] as $class => $path) {
				require_once $path;
				$modObj = GeneralUtility::makeInstance($class);
				$wizardElements = $modObj->proc($wizardElements);
			}
		}
		$returnElements = array();
		foreach ($wizardElements as $key => $wizardItem) {
			preg_match('/^[a-zA-Z0-9]+_/', $key, $group);
			$wizardGroup = $group[0] ? substr($group[0], 0, -1) . '.' : $key;
			$returnElements[$wizardGroup]['elements.'][substr($key, strlen($wizardGroup)) . '.'] = $wizardItem;
		}
		return $returnElements;
	}

	/**
	 * @param string Not used
	 * @param string Not used
	 * @param array $itemConf
	 * @return array
	 * @todo Define visibility
	 */
	public function wizard_getItem($groupKey, $itemKey, $itemConf) {
		$itemConf['title'] = $GLOBALS['LANG']->sL($itemConf['title']);
		$itemConf['description'] = $GLOBALS['LANG']->sL($itemConf['description']);
		$itemConf['tt_content_defValues'] = $itemConf['tt_content_defValues.'];
		unset($itemConf['tt_content_defValues.']);
		return $itemConf;
	}

	/**
	 * @param string Not used
	 * @param array $wizardGroup
	 * @return array
	 * @todo Define visibility
	 */
	public function wizard_getGroupHeader($groupKey, $wizardGroup) {
		return array(
			'header' => $GLOBALS['LANG']->sL($wizardGroup['header'])
		);
	}

	/**
	 * Checks the array for elements which might contain unallowed default values and will unset them!
	 * Looks for the "tt_content_defValues" key in each element and if found it will traverse that array as fieldname / value pairs and check. The values will be added to the "params" key of the array (which should probably be unset or empty by default).
	 *
	 * @param array $wizardItems Wizard items, passed by reference
	 * @return void
	 * @todo Define visibility
	 */
	public function removeInvalidElements(&$wizardItems) {
		// Get TCEFORM from TSconfig of current page
		$row = array('pid' => $this->id);
		$TCEFORM_TSconfig = BackendUtility::getTCEFORM_TSconfig('tt_content', $row);
		$headersUsed = array();
		// Traverse wizard items:
		foreach ($wizardItems as $key => $cfg) {
			// Exploding parameter string, if any (old style)
			if ($wizardItems[$key]['params']) {
				// Explode GET vars recursively
				$tempGetVars = GeneralUtility::explodeUrl2Array($wizardItems[$key]['params'], TRUE);
				// If tt_content values are set, merge them into the tt_content_defValues array,
				// unset them from $tempGetVars and re-implode $tempGetVars into the param string
				// (in case remaining parameters are around).
				if (is_array($tempGetVars['defVals']['tt_content'])) {
					$wizardItems[$key]['tt_content_defValues'] = array_merge(
						is_array($wizardItems[$key]['tt_content_defValues'])
							? $wizardItems[$key]['tt_content_defValues']
							: array(),
						$tempGetVars['defVals']['tt_content']
					);
					unset($tempGetVars['defVals']['tt_content']);
					$wizardItems[$key]['params'] = GeneralUtility::implodeArrayForUrl('', $tempGetVars);
				}
			}
			// If tt_content_defValues are defined...:
			if (is_array($wizardItems[$key]['tt_content_defValues'])) {
				// Traverse field values:
				foreach ($wizardItems[$key]['tt_content_defValues'] as $fN => $fV) {
					if (is_array($GLOBALS['TCA']['tt_content']['columns'][$fN])) {
						// Get information about if the field value is OK:
						$config = &$GLOBALS['TCA']['tt_content']['columns'][$fN]['config'];
						$authModeDeny = $config['type'] == 'select' && $config['authMode']
							&& !$GLOBALS['BE_USER']->checkAuthMode('tt_content', $fN, $fV, $config['authMode']);
						// explode TSconfig keys only as needed
						if (!isset($removeItems[$fN])) {
							$removeItems[$fN] = GeneralUtility::trimExplode(',', $TCEFORM_TSconfig[$fN]['removeItems'], TRUE);
						}
						if (!isset($keepItems[$fN])) {
							$keepItems[$fN] = GeneralUtility::trimExplode(',', $TCEFORM_TSconfig[$fN]['keepItems'], TRUE);
						}
						$isNotInKeepItems = count($keepItems[$fN]) && !in_array($fV, $keepItems[$fN]);
						if ($authModeDeny || $fN === 'CType' && in_array($fV, $removeItems[$fN]) || $isNotInKeepItems) {
							// Remove element all together:
							unset($wizardItems[$key]);
							break;
						} else {
							// Add the parameter:
							$wizardItems[$key]['params'] .= '&defVals[tt_content][' . $fN . ']=' . rawurlencode($fV);
							$tmp = explode('_', $key);
							$headersUsed[$tmp[0]] = $tmp[0];
						}
					}
				}
			}
		}
		// remove headers without elements
		foreach ($wizardItems as $key => $cfg) {
			$tmp = explode('_', $key);
			if ($tmp[0] && !$tmp[1] && !in_array($tmp[0], $headersUsed)) {
				unset($wizardItems[$key]);
			}
		}
	}

}
