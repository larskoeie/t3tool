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
 * Contains the update class for filling the basic repository record of the extension manager
 *
 * @author Georg Ringer <typo3@ringerge.org>
 */
class ExtensionManagerTables extends AbstractUpdate {

	/**
	 * @var string
	 */
	protected $title = 'Add the default Extension Manager database tables';

	/**
	 * @var NULL|\TYPO3\CMS\Install\Service\SqlSchemaMigrationService
	 */
	protected $installToolSqlParser = NULL;

	/**
	 * @return \TYPO3\CMS\Install\Service\SqlSchemaMigrationService
	 */
	protected function getInstallToolSqlParser() {
		if ($this->installToolSqlParser === NULL) {
			$this->installToolSqlParser = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\\CMS\\Install\\Service\\SqlSchemaMigrationService');
		}

		return $this->installToolSqlParser;
	}

	/**
	 * Gets all create, add and change queries from ext_tables.sql
	 *
	 * @return array
	 */
	protected function getUpdateStatements() {
		$updateStatements = array();

		// Get all necessary statements for ext_tables.sql file
		$rawDefinitions = \TYPO3\CMS\Core\Utility\GeneralUtility::getUrl(\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('extensionmanager') . '/ext_tables.sql');
		$fieldDefinitionsFromFile = $this->getInstallToolSqlParser()->getFieldDefinitions_fileContent($rawDefinitions);
		if (count($fieldDefinitionsFromFile)) {
			$fieldDefinitionsFromCurrentDatabase = $this->getInstallToolSqlParser()->getFieldDefinitions_database();
			$diff = $this->getInstallToolSqlParser()->getDatabaseExtra($fieldDefinitionsFromFile, $fieldDefinitionsFromCurrentDatabase);
			$updateStatements = $this->getInstallToolSqlParser()->getUpdateSuggestions($diff);
		}

		return $updateStatements;
	}

	/**
	 * Checks if an update is needed
	 *
	 * @param string &$description The description for the update
	 * @return boolean Whether an update is needed (TRUE) or not (FALSE)
	 */
	public function checkForUpdate(&$description) {
		$result = FALSE;
		$description = 'Creates necessary database tables and adds static tables for the new Extension Manager.';

		// First check necessary database update
		$updateStatements = $this->getUpdateStatements();
		if (empty($updateStatements)) {
			// Check for repository database table
			$databaseTables = $GLOBALS['TYPO3_DB']->admin_get_tables();
			if (!isset($databaseTables['tx_extensionmanager_domain_model_repository'])) {
				$result = TRUE;
			} else {
				// Get count of rows in repository database table
				$count = $GLOBALS['TYPO3_DB']->exec_SELECTcountRows('*', 'tx_extensionmanager_domain_model_repository');
				if ($count === 0) {
					$result = TRUE;
				}
			}
		} else {
			$result = TRUE;
		}

		return $result;
	}

	/**
	 * @param mixed &$customMessages Custom messages
	 *
	 * @return boolean
	 */
	protected function hasError(&$customMessages) {
		$result = FALSE;
		if ($GLOBALS['TYPO3_DB']->sql_error()) {
			$customMessages .= '<br /><br />SQL-ERROR: ' . htmlspecialchars($GLOBALS['TYPO3_DB']->sql_error());
			$result = TRUE;
		}

		return $result;
	}

	/**
	 * Performs the database update.
	 *
	 * @param array &$dbQueries Queries done in this update
	 * @param mixed &$customMessages Custom messages
	 * @return boolean Whether it worked (TRUE) or not (FALSE)
	 */
	public function performUpdate(array &$dbQueries, &$customMessages) {
		$result = FALSE;

		// First perform all create, add and change queries
		$updateStatements = $this->getUpdateStatements();
		foreach ((array) $updateStatements['add'] as $string) {
			$GLOBALS['TYPO3_DB']->admin_query($string);
			$dbQueries[] = $string;
			$result = ($result || $this->hasError($customMessages));
		}
		foreach ((array) $updateStatements['change'] as $string) {
			$GLOBALS['TYPO3_DB']->admin_query($string);
			$dbQueries[] = $string;
			$result = ($result || $this->hasError($customMessages));
		}
		foreach ((array) $updateStatements['create_table'] as $string) {
			$GLOBALS['TYPO3_DB']->admin_query($string);
			$dbQueries[] = $string;
			$result = ($result || $this->hasError($customMessages));
		}

		// Perform statis import anyway
		$rawDefinitions = \TYPO3\CMS\Core\Utility\GeneralUtility::getUrl(\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('extensionmanager') . 'ext_tables_static+adt.sql');
		$statements = $this->getInstallToolSqlParser()->getStatementarray($rawDefinitions, 1);
		foreach ($statements as $statement) {
			if (trim($statement) !== '') {
				$GLOBALS['TYPO3_DB']->admin_query($statement);
				$dbQueries[] = $statement;
				$result = ($result || $this->hasError($customMessages));
			}
		}

		return !$result;
	}

}
