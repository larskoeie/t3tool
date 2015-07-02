<?php
namespace TYPO3\CMS\Install\Updates;

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
 * Contains the update class for the compatibility version.
 * Used by the update wizard in the install tool.
 *
 * @author Sebastian Kurfürst <sebastian@garbage-group.de
 */
class CompatVersionUpdate extends AbstractUpdate {

	/**
	 * @var string
	 */
	protected $title = 'Version Compatibility';

	/**
	 * Function which checks if update is needed. Called in the beginning of an update process.
	 *
	 * @param string &$description Pointer to description for the update
	 * @return boolean TRUE if update is needs to be performed, FALSE otherwise.
	 */
	public function checkForUpdate(&$description) {
		if (!$this->compatVersionIsCurrent()) {
			$description = '
				<p>
					Your current TYPO3 installation is configured to
					<strong>behave like version
					' . htmlspecialchars($GLOBALS['TYPO3_CONF_VARS']['SYS']['compat_version']) . '
					</strong> of TYPO3. If you just upgraded from this version,
					you most likely want to <strong>use new features</strong> as
					well.
				</p>
				<p>
					In the next step, you will see the things that need to be
					adjusted to make your installation compatible with the new
					features.
				</p>
			';
			return TRUE;
		}
		return FALSE;
	}

	/**
	 * Second step: get user input if needed
	 *
	 * @param string Input prefix, all names of form fields have to start with this. Append custom name in [ ... ]
	 * @return string HTML output
	 */
	public function getUserInput($inputPrefix) {
		if ($this->compatVersionIsCurrent()) {
			$content = '
				<fieldset>
					<ol>
						<li>
							<strong>You updated from an older version of TYPO3</strong>:
						</li>
						<li>
							<label for="version">Select the version where you have upgraded from:</label>
							<select name="' . $inputPrefix . '[version]" id="version">
			';
			$versions = array(
				'3.8' => '<= 3.8',
				'4.1' => '<= 4.1',
				'4.2' => '<= 4.2',
				'4.3' => '<= 4.3',
				'4.4' => '<= 4.4',
				'4.5' => '<= 4.5'
			);
			foreach ($versions as $singleVersion => $caption) {
				$content .= '
								<option value="' . $singleVersion . '">' . $caption . '</option>
				';
			}
			$content .= '
							</select>
						</li>
					</ol>
				</fieldset>
			';
		} else {
			$content = '
				<p>
					TYPO3 output is currently compatible to version ' . htmlspecialchars($GLOBALS['TYPO3_CONF_VARS']['SYS']['compat_version']) . '.
					To use all the new features in the current TYPO3 version,
					make sure you follow the guidelines below to upgrade without
					problems.
				</p>
				<p>
					<strong>
						Follow the steps below carefully and confirm every step!
					</strong>
					<br />
					You will see this list again after you performed the update.
				</p>
			';
			$content .= $this->showChangesNeeded($inputPrefix);
			$content .= '
				<fieldset>
					<ol>
						<li class="labelAfter">
							<input type="checkbox" name="' . $inputPrefix . '[compatVersion][all]" id="compatVersionAll" value="1" />
							<label for="compatVersionAll">Check all (ignore selection above)</label>
						</li>
						<li>
							WARNING: this might break the output of your website.
						</li>
					</ol>
				</fieldset>
			';
		}
		return $content;
	}

	/**
	 * Checks if user input is valid
	 *
	 * @param string Pointer to output custom messages
	 * @return boolean TRUE if user input is correct, then the update is performed. When FALSE, return to getUserInput
	 */
	public function checkUserInput(&$customMessages) {
		if ($this->compatVersionIsCurrent()) {
			return TRUE;
		} else {
			if ($this->userInput['compatVersion']['all']) {
				return TRUE;
			} else {
				$performUpdate = TRUE;
				$oldVersion = \TYPO3\CMS\Core\Utility\VersionNumberUtility::convertVersionNumberToInteger($GLOBALS['TYPO3_CONF_VARS']['SYS']['compat_version']);
				$currentVersion = \TYPO3\CMS\Core\Utility\VersionNumberUtility::convertVersionNumberToInteger(TYPO3_branch);
				foreach ($GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['ext/install']['compat_version'] as $internalName => $details) {
					if ($details['version'] > $oldVersion && $details['version'] <= $currentVersion) {
						if (!$this->userInput['compatVersion'][$internalName]) {
							$performUpdate = FALSE;
							$customMessages = 'If you want to update the compatibility version, you need to confirm all checkboxes on the previous page.';
							break;
						}
					}
				}
				return $performUpdate;
			}
		}
	}

	/**
	 * Performs the update itself
	 *
	 * @param array $dbQueries where to insert all DB queries made, so they can be shown to the user if wanted
	 * @param string $customMessages to output custom messages
	 * @return boolean TRUE if update succeeded, FALSE otherwise
	 */
	public function performUpdate(array &$dbQueries, &$customMessages) {
		$customMessages = '';
		// If we just set it to an older version
		if ($this->userInput['version']) {
			$customMessages .= 'If you want to see what you need to do to use the new features, run the update wizard again!';
		}
		$version = $this->userInput['version'] ? $this->userInput['version'] : TYPO3_branch;
		\TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\\CMS\\Core\\Configuration\\ConfigurationManager')->setLocalConfigurationValueByPath('SYS/compat_version', $version);
		$customMessages .= '<br />The compatibility version has been set to ' . $version . '.';
		return TRUE;
	}

	/**
	 * Checks if compatibility version is set to current version
	 *
	 * @return boolean TRUE if compat version is equal the current version
	 */
	protected function compatVersionIsCurrent() {
		if (TYPO3_branch != $GLOBALS['TYPO3_CONF_VARS']['SYS']['compat_version']) {
			return FALSE;
		} else {
			return TRUE;
		}
	}

	/**
	 * Show changes needed
	 *
	 * @param string Input prefix to prepend all form fields with.
	 * @return string HTML output
	 */
	protected function showChangesNeeded($inputPrefix = '') {
		$oldVersion = \TYPO3\CMS\Core\Utility\VersionNumberUtility::convertVersionNumberToInteger($GLOBALS['TYPO3_CONF_VARS']['SYS']['compat_version']);
		$currentVersion = \TYPO3\CMS\Core\Utility\VersionNumberUtility::convertVersionNumberToInteger(TYPO3_branch);
		$tableContents = '';
		if (is_array($GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['ext/install']['compat_version'])) {
			$upgradeWizardBoxes = '';
			foreach ($GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['ext/install']['compat_version'] as $internalName => $details) {
				if ($details['version'] > $oldVersion && $details['version'] <= $currentVersion) {
					$description = str_replace(chr(10), '<br />', $details['description']);
					$description_acknowledge = isset($details['description_acknowledge']) ? str_replace(chr(10), '<br />', $details['description_acknowledge']) : '';
					$upgradeWizardBoxes .= '
						<div style="border: 1px solid; padding: 10px; margin: 10px; padding-top: 0px; width: 500px;">
							<h3>' . (isset($details['title']) ? $details['title'] : $internalName) . '</h3>
							' . $description . (strlen($description_acknowledge) ? '<p>' . $description_acknowledge . '</p>' : '') . (strlen($inputPrefix) ? '
								<fieldset>
									<ol>
										<li class="labelAfter">
											<input type="checkbox" name="' . $inputPrefix . '[compatVersion][' . $internalName . ']" id="compatVersion' . $internalName . '" value="1" />
											<label for="compatVersion' . $internalName . '">Acknowledged</label>
										</li>
									</ol>
								</fieldset>
							' : '') . '
						</div>';
				}
			}
		}
		if (strlen($upgradeWizardBoxes)) {
			return $upgradeWizardBoxes;
		}
		return '';
	}

}
