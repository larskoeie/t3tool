<?php

  // aliases
  return array(
    'clean-dev' => array(
      'commands' => array(
        'allusers disable',
        'allusers removeemail',
        'allfeusers removeemail',
        'alladddresses removeemail',
        'alldomains disable',
        'cc config',
      ),
    ),

    'set-domain' => array(
      'commands' => array(
        'alldomains disable',
        'domain add $1 FIRSTROOT',
        'domain movetotop $1',
        'template set FIRSTROOT config.baseURL $1'
      ),
      'usage' => "t3tool set-domain <domain>",

    )
  );
