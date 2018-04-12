<?php

	// store original PWD before altering it
	define('PATH_cwd', getcwd() . '/');

    // find the root of the TYPO3 site
    while (!is_dir('typo3conf') && !is_file('.t3tool-root') && getcwd() != '/') {
        chdir('..');
    }
    if (is_file('.t3tool-root')) {
       chdir(trim(file_get_contents('.t3tool-root')));
    }
    if (!is_dir('typo3conf')) {
        if ($argv[1] == '_complete') {
            die();
        } else {
            die("TYPO3 not found\n");
        }
    }

    // set some TYPO3 constants
    define('TYPO3_MODE', 'BE');
    define('PATH_script', dirname(__FILE__) . '/');
    define('PATH_site', getcwd() . '/');
    define('PATH_typo3conf', PATH_site . 'typo3conf/');
    define('PATH_t3lib', PATH_site . 't3lib/');
    define('PATH_t3tool', PATH_site . '../.t3tool/');
    define('PATH_reports', '/var/www/documentation/http/reports/');

	// set indentation string
	define('INDENT', "\t");
	define('OUTPUT_INDENT', "  ");


    //
    define('CHECKMARK', "\xe2\x9c\x93");

	// define some colors
	define('COLOR_BOLD', "\x1b[1;1m");
	define('COLOR_RED', "\x1b[1;31m");
	define('COLOR_BLUE', "\x1b[1;34m");
	define('COLOR_PURPLE', "\x1b[1;35m");
	define('COLOR_GREEN', "\x1b[1;32m");
	define('COLOR_YELLOW', "\x1b[1;33m");
	define('CLEARSCREEN', "\x1b[1;2J");
	define('TOPLEFT', "\x1b[1;1H");

	define('COLOR_BG_YELLOW', "\x1b[1;43m");

	define('COLOR_ADDITION', COLOR_GREEN);
	define('COLOR_DELETION', COLOR_RED);
	define('COLOR_HILITE', COLOR_BG_YELLOW);
	define('COLOR_RESET', "\x1b[0m");

	define('PREFIX_ADDITION', COLOR_ADDITION . '+ ');
	define('PREFIX_DELETION', COLOR_DELETION . '- ');
	define('PREFIX_NOTCHANGED', COLOR_RESET . '  ');

	error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED);
    //  error_reporting(E_ALL);

	date_default_timezone_set('UTC');

    require_once(PATH_script . 'includes/functions.php');

    // list of activated modules
    $GLOBALS['modules'] = array(
        'cache',
        'config',
        'db',
        'deprecation',
        'devlog',
        'domain',
        'ext',
        'fesession',
        'feuser',
        'history',
        'log',
        'page',
        'plugin',
		'php',
        'realurl',
        'registry',
        'search',
        'show',
        'sqlq',
        'solr',
        'user',
        'task',
        'template',
		'ts',
    );

    // require all modules
    foreach ($GLOBALS['modules'] as $m) {
        require_once("modules/t3tool-$m.phpsh");
    }

    // build command map for bash completion
    // aliases defined by modules
    $GLOBALS['commands'] = array();
    foreach ($GLOBALS['modules'] as $m) {
        $function = 't3tool_' . $m . '_completion';
        if (function_exists($function)) {
            $GLOBALS['commands'] = array_merge($GLOBALS['commands'], $function());
        }
    }

    // build aliases
    // aliases defined by modules
    $GLOBALS['aliases'] = array();
    foreach ($GLOBALS['modules'] as $m) {
        $function = 't3tool_' . $m . '_cmdaliases';
        if (function_exists($function)) {
            $GLOBALS['aliases'] = array_merge($GLOBALS['aliases'], $function());
        }
    }

	// global aliases
    $filename = PATH_script . 'includes/aliases.php';
    if (file_exists($filename)) {
        $GLOBALS['aliases'] = array_merge($GLOBALS['aliases'], include($filename));
    }

    // aliases defined by user
    $user = posix_getpwuid(posix_getuid());
    $filename = $user['dir'] . '/.t3tool/aliases.php';
    if (file_exists($filename)) {
        include($filename);
    }

	// build options
	// options defined by modules
	$GLOBALS['options'] = array();
	foreach ($GLOBALS['modules'] as $m) {
		$function = 't3tool_' . $m . '_completion_options';
		if (function_exists($function)) {
			$GLOBALS['options'] = array_merge($GLOBALS['options'], $function());
		}
	}

	// read t3tool persistent data
	readData();

	// set either v4 or v6
    $GLOBALS['version_4'] = is_file(PATH_typo3conf . 'localconf.php');
    $GLOBALS['version_6'] = is_file(PATH_typo3conf . 'LocalConfiguration.php');

	// read TYPO3 global configuration
    t3tool_read_conf();

    // if called from bash_completion, leave early
    if ($argv[1] == '_complete') {
        die(getTabCompleteString($argv[2], $argv[3]));
    }

	// build the TCA
    t3tool_build_tca();

    // part of TCA
    $label = array(
        'pages' => 'title',
        'sys_domain' => 'domainName',
        'sys_template' => 'title',
        'tt_content' => 'header',
        'tt_news' => 'title',
    );


