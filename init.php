<?php


    require_once('includes/functions.php');

    # init
    define('TYPO3_MODE', 'BE');
    define('PATH_script', dirname(__FILE__) . '/');
    define('PATH_site', getcwd() . '/');
    define('PATH_typo3conf', PATH_site . 'typo3conf/');
    define('PATH_t3lib', PATH_site . 't3lib/');

    error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED);
    //  error_reporting(E_ALL);
