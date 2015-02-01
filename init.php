<?php


    # init
    define('TYPO3_MODE', 'BE');
    define('PATH_script', dirname(__FILE__) . '/');
    define('PATH_site', getcwd() . '/');
    define('PATH_typo3conf', PATH_site . 'typo3conf/');
    define('PATH_t3lib', PATH_site . 't3lib/');

    error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED);
    //  error_reporting(E_ALL);

    require_once(PATH_script . 'includes/functions.php');




    $GLOBALS['modules'] = array(
        'cc',
        'config',
        'db',
        'deprecation',
        'devlog',
        'domain',
        'ext',
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
        'user',
        'task',
        'template'
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

    while (!is_dir('typo3conf') && getcwd() != '/') {
        chdir('..');
    }
    if (!is_dir('typo3conf')) {
        die('TYPO3 not found');
    }

    readData();


    $GLOBALS['version_4'] = is_file(PATH_typo3conf . 'localconf.php');
    $GLOBALS['version_6'] = is_file(PATH_typo3conf . 'LocalConfiguration.php');

    readConf();

    // if called from bash_completion, leave early
    if ($argv[1] == '_complete') {
        die(getTabCompleteString($argv[2], $argv[3]));
    }

    buildTCA();


    // part of TCA
    $label = array(
        'pages' => 'title',
        'sys_domain' => 'domainName',
        'sys_template' => 'title',
        'tt_content' => 'header',
        'tt_news' => 'title',
    );