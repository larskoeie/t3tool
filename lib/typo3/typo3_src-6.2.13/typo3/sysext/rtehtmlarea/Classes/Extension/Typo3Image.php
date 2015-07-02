<?php
namespace TYPO3\CMS\Rtehtmlarea\Extension;

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
 * TYPO3 Image plugin for htmlArea RTE
 *
 * @author Stanislas Rolland <typo3(arobas)sjbr.ca>
 */
class Typo3Image extends \TYPO3\CMS\Rtehtmlarea\RteHtmlAreaApi {

	protected $extensionKey = 'rtehtmlarea';

	// The key of the extension that is extending htmlArea RTE
	protected $pluginName = 'TYPO3Image';

	// The name of the plugin registered by the extension
	protected $relativePathToLocallangFile = '';

	// Path to this main locallang file of the extension relative to the extension dir.
	protected $relativePathToSkin = 'extensions/TYPO3Image/skin/htmlarea.css';

	// Path to the skin (css) file relative to the extension dir.
	protected $htmlAreaRTE;

	// Reference to the invoking object
	protected $thisConfig;

	// Reference to RTE PageTSConfig
	protected $toolbar;

	// Reference to RTE toolbar array
	protected $LOCAL_LANG;

	// Frontend language array
	protected $pluginButtons = 'image';

	protected $convertToolbarForHtmlAreaArray = array(
		'image' => 'InsertImage'
	);

	public function main($parentObject) {
		$enabled = parent::main($parentObject);
		// Check if this should be enabled based on extension configuration and Page TSConfig
		// The 'Minimal' and 'Typical' default configurations include Page TSConfig that removes images on the way to the database
		$enabled = $enabled && !($this->thisConfig['proc.']['entryHTMLparser_db.']['tags.']['img.']['allowedAttribs'] == '0' && $this->thisConfig['proc.']['entryHTMLparser_db.']['tags.']['img.']['rmTagIfNoAttrib'] == '1') && !$this->thisConfig['buttons.']['image.']['TYPO3Browser.']['disabled'];
		return $enabled;
	}

	/**
	 * Return JS configuration of the htmlArea plugins registered by the extension
	 *
	 * @param 	integer		Relative id of the RTE editing area in the form
	 * @return 	string		JS configuration for registered plugins, in this case, JS configuration of block elements
	 */
	public function buildJavascriptConfiguration($RTEcounter) {
		$registerRTEinJavascriptString = '';
		$button = 'image';
		if (in_array($button, $this->toolbar)) {
			if (!is_array($this->thisConfig['buttons.']) || !is_array($this->thisConfig['buttons.'][($button . '.')])) {
				$registerRTEinJavascriptString .= '
			RTEarea[' . $RTEcounter . ']["buttons"]["' . $button . '"] = new Object();';
			}
			$registerRTEinJavascriptString .= '
			RTEarea[' . $RTEcounter . '].buttons.' . $button . '.pathImageModule = "' .
				\TYPO3\CMS\Backend\Utility\BackendUtility::getModuleUrl('rtehtmlarea_wizard_select_image') . '";';
		}
		return $registerRTEinJavascriptString;
	}

}
