<?php
return array(
	'BE' => array(
		'explicitADmode' => 'explicitAllow',
		'loginSecurityLevel' => 'rsa',
	),
	'DB' => array(
		'database' => 'bolius',
		'extTablesDefinitionScript' => 'extTables.php',
		'host' => 'localhost',
		'password' => '4NbQgyug45Fq',
		'socket' => '',
		'username' => 'bolius',
	),
	'EXT' => array(
		'extConf' => array(
			'rsaauth' => 'a:1:{s:18:"temporaryDirectory";s:0:"";}',
			'saltedpasswords' => 'a:2:{s:3:"BE.";a:4:{s:21:"saltedPWHashingMethod";s:41:"TYPO3\\CMS\\Saltedpasswords\\Salt\\PhpassSalt";s:11:"forceSalted";i:0;s:15:"onlyAuthService";i:0;s:12:"updatePasswd";i:1;}s:3:"FE.";a:5:{s:7:"enabled";i:1;s:21:"saltedPWHashingMethod";s:41:"TYPO3\\CMS\\Saltedpasswords\\Salt\\PhpassSalt";s:11:"forceSalted";i:0;s:15:"onlyAuthService";i:0;s:12:"updatePasswd";i:1;}}',
			't3skin' => 'a:0:{}',
			't3tool' => 'a:0:{}',
		),
	),
	'FE' => array(
		'activateContentAdapter' => FALSE,
		'loginSecurityLevel' => 'rsa',
	),
	'GFX' => array(
		'jpg_quality' => '80',
	),
	'SYS' => array(
		'compat_version' => '6.2',
		'encryptionKey' => '612b95fbd5a587b1e198bc8e70b6b80cf74f921bee44f2fac1d16a0f000e0ddb62a5bbf962ff513bc4fbc248ae3676f5',
		'isInitialInstallationInProgress' => TRUE,
		'sitename' => 'New TYPO3 site',
	),
);
?>
