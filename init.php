<?php

	// store original PWD before altering it
	define('PATH_cwd', getcwd() . '/');

    // find the root
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

    # init
    define('TYPO3_MODE', 'BE');
    define('PATH_script', dirname(__FILE__) . '/');
    define('PATH_site', getcwd() . '/');
    define('PATH_typo3conf', PATH_site . 'typo3conf/');
    define('PATH_t3lib', PATH_site . 't3lib/');

	define('INDENT', "\t");
	define('COLOR_RED', "\x1b[1;31m");
	define('COLOR_BLUE', "\x1b[1;34m");
	define('COLOR_ADDITION', COLOR_BLUE);
	define('COLOR_DELETION', COLOR_RED);

	define('COLOR_RESET', "\x1b[0m");
	// @TODO : more color constants here

	error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED);
    //  error_reporting(E_ALL);

	date_default_timezone_set('UTC');

    require_once(PATH_script . 'includes/functions.php');

    # list of activated modules
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


    readData();


    $GLOBALS['version_4'] = is_file(PATH_typo3conf . 'localconf.php');
    $GLOBALS['version_6'] = is_file(PATH_typo3conf . 'LocalConfiguration.php');

    t3tool_read_conf();

    // if called from bash_completion, leave early
    if ($argv[1] == '_complete') {
        die(getTabCompleteString($argv[2], $argv[3]));
    }

    t3tool_build_tca();


    // part of TCA
    $label = array(
        'pages' => 'title',
        'sys_domain' => 'domainName',
        'sys_template' => 'title',
        'tt_content' => 'header',
        'tt_news' => 'title',
    );


