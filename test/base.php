<?php

require_once('/usr/local/bin/tools/t3tool/init.php');
class t3toolTest extends PHPUnit_Framework_TestCase {

    public function doCmd ($cmd) {
        $args = explode(' ', $cmd);
        t3tool_handlecmd($args);

    }

}