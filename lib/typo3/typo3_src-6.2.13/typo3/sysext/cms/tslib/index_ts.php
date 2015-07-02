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
 * This is the MAIN DOCUMENT of the TypoScript driven standard front-end (from
 * the "cms" extension)
 *
 * Basically put this is the "index.php" script which all requests for TYPO3
 * delivered pages goes to in the frontend (the website) The script configures
 * constants, includes libraries and does a little logic here and there in order
 * to instantiate the right classes to create the webpage.
 *
 * All the real data processing goes on in the "tslib/" classes which this script
 * will include and use as needed.
 *
 * @author Kasper Skårhøj <kasperYYYY@typo3.com>
 */

define('TYPO3_MODE', 'FE');

\TYPO3\CMS\Core\Core\Bootstrap::getInstance()
	->startOutputBuffering()
	->loadConfigurationAndInitialize()
	->loadTypo3LoadedExtAndExtLocalconf(TRUE)
	->applyAdditionalConfigurationSettings();

// Timetracking started
$configuredCookieName = trim($GLOBALS['TYPO3_CONF_VARS']['BE']['cookieName']);
if (empty($configuredCookieName)) {
	$configuredCookieName = 'be_typo_user';
}
if ($_COOKIE[$configuredCookieName]) {
	$TT = new \TYPO3\CMS\Core\TimeTracker\TimeTracker();
} else {
	$TT = new \TYPO3\CMS\Core\TimeTracker\NullTimeTracker();
}

$TT->start();

\TYPO3\CMS\Core\Core\Bootstrap::getInstance()->initializeTypo3DbGlobal();
// Hook to preprocess the current request:
if (is_array($TYPO3_CONF_VARS['SC_OPTIONS']['tslib/index_ts.php']['preprocessRequest'])) {
	foreach ($TYPO3_CONF_VARS['SC_OPTIONS']['tslib/index_ts.php']['preprocessRequest'] as $hookFunction) {
		$hookParameters = array();
		\TYPO3\CMS\Core\Utility\GeneralUtility::callUserFunction($hookFunction, $hookParameters, $hookParameters);
	}
	unset($hookFunction);
	unset($hookParameters);
}
// Look for extension ID which will launch alternative output engine
if ($temp_extId = \TYPO3\CMS\Core\Utility\GeneralUtility::_GP('eID')) {
	if ($classPath = \TYPO3\CMS\Core\Utility\GeneralUtility::getFileAbsFileName($TYPO3_CONF_VARS['FE']['eID_include'][$temp_extId])) {
		// Remove any output produced until now
		ob_clean();
		require $classPath;
	}
	die;
}

/** @var $TSFE \TYPO3\CMS\Frontend\Controller\TypoScriptFrontendController */
$TSFE = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(
	'TYPO3\\CMS\\Frontend\\Controller\\TypoScriptFrontendController',
	$TYPO3_CONF_VARS,
	\TYPO3\CMS\Core\Utility\GeneralUtility::_GP('id'),
	\TYPO3\CMS\Core\Utility\GeneralUtility::_GP('type'),
	\TYPO3\CMS\Core\Utility\GeneralUtility::_GP('no_cache'),
	\TYPO3\CMS\Core\Utility\GeneralUtility::_GP('cHash'),
	\TYPO3\CMS\Core\Utility\GeneralUtility::_GP('jumpurl'),
	\TYPO3\CMS\Core\Utility\GeneralUtility::_GP('MP'),
	\TYPO3\CMS\Core\Utility\GeneralUtility::_GP('RDCT')
);

if ($TYPO3_CONF_VARS['FE']['pageUnavailable_force']
	&& !\TYPO3\CMS\Core\Utility\GeneralUtility::cmpIP(
		\TYPO3\CMS\Core\Utility\GeneralUtility::getIndpEnv('REMOTE_ADDR'),
		$TYPO3_CONF_VARS['SYS']['devIPmask'])
) {
	$TSFE->pageUnavailableAndExit('This page is temporarily unavailable.');
}

$TSFE->connectToDB();
$TSFE->sendRedirect();

// Output compression
// Remove any output produced until now
ob_clean();
if ($TYPO3_CONF_VARS['FE']['compressionLevel'] && extension_loaded('zlib')) {
	if (\TYPO3\CMS\Core\Utility\MathUtility::canBeInterpretedAsInteger($TYPO3_CONF_VARS['FE']['compressionLevel'])) {
		// Prevent errors if ini_set() is unavailable (safe mode)
		@ini_set('zlib.output_compression_level', $TYPO3_CONF_VARS['FE']['compressionLevel']);
	}
	ob_start(array(\TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\\CMS\\Frontend\\Utility\\CompressionUtility'), 'compressionOutputHandler'));
}

// FE_USER
$TT->push('Front End user initialized', '');
/** @var $TSFE \TYPO3\CMS\Frontend\Controller\TypoScriptFrontendController */
$TSFE->initFEuser();
$TT->pull();

// BE_USER
/** @var $BE_USER \TYPO3\CMS\Backend\FrontendBackendUserAuthentication */
$BE_USER = $TSFE->initializeBackendUser();

// Process the ID, type and other parameters.
// After this point we have an array, $page in TSFE, which is the page-record
// of the current page, $id.
$TT->push('Process ID', '');
// Initialize admin panel since simulation settings are required here:
if ($TSFE->isBackendUserLoggedIn()) {
	$BE_USER->initializeAdminPanel();
	\TYPO3\CMS\Core\Core\Bootstrap::getInstance()->loadExtensionTables(TRUE);
} else {
	\TYPO3\CMS\Core\Core\Bootstrap::getInstance()->loadCachedTca();
}
$TSFE->checkAlternativeIdMethods();
$TSFE->clear_preview();
$TSFE->determineId();

// Now, if there is a backend user logged in and he has NO access to this page,
// then re-evaluate the id shown! _GP('ADMCMD_noBeUser') is placed here because
// \TYPO3\CMS\Version\Hook\PreviewHook might need to know if a backend user is logged in.
if (
	$TSFE->isBackendUserLoggedIn()
	&& (!$BE_USER->extPageReadAccess($TSFE->page) || \TYPO3\CMS\Core\Utility\GeneralUtility::_GP('ADMCMD_noBeUser'))
) {
	// Remove user
	unset($BE_USER);
	$TSFE->beUserLogin = FALSE;
	// Re-evaluate the page-id.
	$TSFE->checkAlternativeIdMethods();
	$TSFE->clear_preview();
	$TSFE->determineId();
}

$TSFE->makeCacheHash();
$TT->pull();

// Admin Panel & Frontend editing
if ($TSFE->isBackendUserLoggedIn()) {
	$BE_USER->initializeFrontendEdit();
	if ($BE_USER->adminPanel instanceof \TYPO3\CMS\Frontend\View\AdminPanelView) {
		\TYPO3\CMS\Core\Core\Bootstrap::getInstance()
			->initializeLanguageObject()
			->initializeSpriteManager();
	}
	if ($BE_USER->frontendEdit instanceof \TYPO3\CMS\Core\FrontendEditing\FrontendEditingController) {
		$BE_USER->frontendEdit->initConfigOptions();
	}
}

// Starts the template
$TT->push('Start Template', '');
$TSFE->initTemplate();
$TT->pull();
// Get from cache
$TT->push('Get Page from cache', '');
$TSFE->getFromCache();
$TT->pull();
// Get config if not already gotten
// After this, we should have a valid config-array ready
$TSFE->getConfigArray();
// Setting language and locale
$TT->push('Setting language and locale', '');
$TSFE->settingLanguage();
$TSFE->settingLocale();
$TT->pull();

// Convert POST data to internal "renderCharset" if different from the metaCharset
$TSFE->convPOSTCharset();

// Check JumpUrl
$TSFE->setExternalJumpUrl();
$TSFE->checkJumpUrlReferer();

$TSFE->handleDataSubmission();

// Check for shortcut page and redirect
$TSFE->checkPageForShortcutRedirect();
$TSFE->checkPageForMountpointRedirect();

// Generate page
$TSFE->setUrlIdToken();
$TT->push('Page generation', '');
if ($TSFE->isGeneratePage()) {
	$TSFE->generatePage_preProcessing();
	$temp_theScript = $TSFE->generatePage_whichScript();
	if ($temp_theScript) {
		include $temp_theScript;
	} else {
		\TYPO3\CMS\Frontend\Page\PageGenerator::pagegenInit();
		// Global content object
		$TSFE->newCObj();
		// LIBRARY INCLUSION, TypoScript
		$temp_incFiles = \TYPO3\CMS\Frontend\Page\PageGenerator::getIncFiles();
		foreach ($temp_incFiles as $temp_file) {
			include_once './' . $temp_file;
		}
		// Content generation
		if (!$TSFE->isINTincScript()) {
			\TYPO3\CMS\Frontend\Page\PageGenerator::renderContent();
			$TSFE->setAbsRefPrefix();
		}
	}
	$TSFE->generatePage_postProcessing();
} elseif ($TSFE->isINTincScript()) {
	\TYPO3\CMS\Frontend\Page\PageGenerator::pagegenInit();
	// Global content object
	$TSFE->newCObj();
	// LIBRARY INCLUSION, TypoScript
	$temp_incFiles = \TYPO3\CMS\Frontend\Page\PageGenerator::getIncFiles();
	foreach ($temp_incFiles as $temp_file) {
		include_once './' . $temp_file;
	}
}
$TT->pull();

// $TSFE->config['INTincScript']
if ($TSFE->isINTincScript()) {
	$TT->push('Non-cached objects', '');
	$TSFE->INTincScript();
	$TT->pull();
}
// Output content
$sendTSFEContent = FALSE;
if ($TSFE->isOutputting()) {
	$TT->push('Print Content', '');
	$TSFE->processOutput();
	$sendTSFEContent = TRUE;
	$TT->pull();
}
// Store session data for fe_users
$TSFE->storeSessionData();
// Statistics
$TYPO3_MISC['microtime_end'] = microtime(TRUE);
$TSFE->setParseTime();
if (isset($TSFE->config['config']['debug'])) {
	$debugParseTime = (bool)$TSFE->config['config']['debug'];
} else {
	$debugParseTime = !empty($TSFE->TYPO3_CONF_VARS['FE']['debug']);
}
if ($TSFE->isOutputting() && $debugParseTime) {
	$TSFE->content .= LF . '<!-- Parsetime: ' . $TSFE->scriptParseTime . 'ms -->';
}
// Check JumpUrl
$TSFE->jumpurl();
// Preview info
$TSFE->previewInfo();
// Hook for end-of-frontend
$TSFE->hook_eofe();
// Finish timetracking
$TT->pull();
// Check memory usage
\TYPO3\CMS\Core\Utility\MonitorUtility::peakMemoryUsage();
// beLoginLinkIPList
echo $TSFE->beLoginLinkIPList();

// Admin panel
if (
	$TSFE->isBackendUserLoggedIn()
	&& $BE_USER instanceof \TYPO3\CMS\Backend\FrontendBackendUserAuthentication
	&& $BE_USER->isAdminPanelVisible()
) {
	$TSFE->content = str_ireplace('</head>', $BE_USER->adminPanel->getAdminPanelHeaderData() . '</head>', $TSFE->content);
	$TSFE->content = str_ireplace('</body>', $BE_USER->displayAdminPanel() . '</body>', $TSFE->content);
}

if ($sendTSFEContent) {
	echo $TSFE->content;
}
// Debugging Output
if (isset($error) && is_object($error) && @is_callable(array($error, 'debugOutput'))) {
	$error->debugOutput();
}
if (TYPO3_DLOG) {
	\TYPO3\CMS\Core\Utility\GeneralUtility::devLog('END of FRONTEND session', 'cms', 0, array('_FLUSH' => TRUE));
}
\TYPO3\CMS\Core\Core\Bootstrap::getInstance()->shutdown();
