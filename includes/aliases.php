<?php

  /**
   * t3tool - cli tool for administering a TYPO3 installation
   *
   * @package t3tool
   * @author  Lars Køie <lars@koeie.dk>
   * @license GNU GPL
   *
   */

  // aliases
  return array(
    'clean-dev' => array(
      'commands' => array(
        'user disable "*"',
        'user removeemail "*"',
        'feuser removeemail "*"',
        'adddres removeemail "*"',
        'domain disable "*"',
        'cc config',
      ),
    ),

    'set-domain' => array(
      'commands' => array(
        'domain disable "*"',
        'domain add $1 FIRSTROOT',
        'domain movetotop $1',
        'template set FIRSTROOT config.baseURL $1'
      ),
      'usage' => "t3tool set-domain <domain>",

    )
  );
