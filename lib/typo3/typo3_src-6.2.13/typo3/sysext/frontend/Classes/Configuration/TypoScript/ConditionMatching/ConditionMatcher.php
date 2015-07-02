<?php
namespace TYPO3\CMS\Frontend\Configuration\TypoScript\ConditionMatching;

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
 * Matching TypoScript conditions for frontend disposal.
 *
 * Used with the TypoScript parser.
 * Matches browserinfo, IPnumbers for use with templates
 *
 * @author Kasper Skårhøj <kasperYYYY@typo3.com>
 */
class ConditionMatcher extends \TYPO3\CMS\Core\Configuration\TypoScript\ConditionMatching\AbstractConditionMatcher {

	/**
	 * Evaluates a TypoScript condition given as input, eg. "[browser=net][...(other conditions)...]"
	 *
	 * @param string $string The condition to match against its criterias.
	 * @return boolean Whether the condition matched
	 * @see \TYPO3\CMS\Core\TypoScript\Parser\TypoScriptParser::parse()
	 */
	protected function evaluateCondition($string) {
		list($key, $value) = \TYPO3\CMS\Core\Utility\GeneralUtility::trimExplode('=', $string, FALSE, 2);
		$result = $this->evaluateConditionCommon($key, $value);
		if (is_bool($result)) {
			return $result;
		} else {
			switch ($key) {
				case 'usergroup':
					$groupList = $this->getGroupList();
					// '0,-1' is the default usergroups when not logged in!
					if ($groupList != '0,-1') {
						$values = \TYPO3\CMS\Core\Utility\GeneralUtility::trimExplode(',', $value, TRUE);
						foreach ($values as $test) {
							if ($test == '*' || \TYPO3\CMS\Core\Utility\GeneralUtility::inList($groupList, $test)) {
								return TRUE;
							}
						}
					}
					break;
				case 'treeLevel':
					$values = \TYPO3\CMS\Core\Utility\GeneralUtility::trimExplode(',', $value, TRUE);
					$treeLevel = count($this->rootline) - 1;
					foreach ($values as $test) {
						if ($test == $treeLevel) {
							return TRUE;
						}
					}
					break;
				case 'PIDupinRootline':

				case 'PIDinRootline':
					$values = \TYPO3\CMS\Core\Utility\GeneralUtility::trimExplode(',', $value, TRUE);
					if ($key == 'PIDinRootline' || !in_array($this->pageId, $values)) {
						foreach ($values as $test) {
							foreach ($this->rootline as $rl_dat) {
								if ($rl_dat['uid'] == $test) {
									return TRUE;
								}
							}
						}
					}
					break;
			}
		}
		return FALSE;
	}

	/**
	 * Returns GP / ENV / TSFE vars
	 *
	 * @param string $var Identifier
	 * @return mixed The value of the variable pointed to or NULL if variable did not exist
	 */
	protected function getVariable($var) {
		$vars = explode(':', $var, 2);
		$val = $this->getVariableCommon($vars);
		if (is_null($val)) {
			$splitAgain = explode('|', $vars[1], 2);
			$k = trim($splitAgain[0]);
			if ($k) {
				switch ((string) trim($vars[0])) {
				case 'TSFE':
					$val = $this->getGlobal('TSFE|' . $vars[1]);
					break;
				}
			}
		}
		return $val;
	}

	/**
	 * Get the usergroup list of the current user.
	 *
	 * @return string The usergroup list of the current user
	 */
	protected function getGroupList() {
		$groupList = $GLOBALS['TSFE']->gr_list;
		return $groupList;
	}

	/**
	 * Determines the current page Id.
	 *
	 * @return integer The current page Id
	 */
	protected function determinePageId() {
		return (int)$GLOBALS['TSFE']->id;
	}

	/**
	 * Gets the properties for the current page.
	 *
	 * @return array The properties for the current page.
	 */
	protected function getPage() {
		return $GLOBALS['TSFE']->page;
	}

	/**
	 * Determines the rootline for the current page.
	 *
	 * @return array The rootline for the current page.
	 */
	protected function determineRootline() {
		$rootline = (array) $GLOBALS['TSFE']->tmpl->rootLine;
		return $rootline;
	}

	/**
	 * Get the id of the current user.
	 *
	 * @return integer The id of the current user
	 */
	protected function getUserId() {
		$userId = $GLOBALS['TSFE']->fe_user->user['uid'];
		return $userId;
	}

	/**
	 * Determines if a user is logged in.
	 *
	 * @return boolean Determines if a user is logged in
	 */
	protected function isUserLoggedIn() {
		$userLoggedIn = FALSE;
		if ($GLOBALS['TSFE']->loginUser) {
			$userLoggedIn = TRUE;
		}
		return $userLoggedIn;
	}

	/**
	 * Set/write a log message.
	 *
	 * @param string $message The log message to set/write
	 * @return void
	 */
	protected function log($message) {
		if (is_object($GLOBALS['TT'])) {
			$GLOBALS['TT']->setTSlogMessage($message, 3);
		}
	}

}
