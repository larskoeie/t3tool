<?php


namespace TYPO3\CMS\Core\Package;

/*                                                                        *
 * This script belongs to the TYPO3 Flow framework.                       *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU Lesser General Public License, either version 3   *
 * of the License, or (at your option) any later version.                 *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */

/**
 * A Package
 * Adapted from FLOW for TYPO3 CMS
 *
 * @api
 */
class Package extends \TYPO3\Flow\Package\Package implements PackageInterface {

	const PATTERN_MATCH_EXTENSIONKEY = '/^[0-9a-z_-]+$/i';

	/**
	 * @var array
	 */
	protected $extensionManagerConfiguration = array();

	/**
	 * @var array
	 */
	protected $classAliases;

	/**
	 * @var bool
	 */
	protected $objectManagementEnabled = NULL;

	/**
	 * @var array
	 */
	protected $ignoredClassNames = array();

	/**
	 * If this package is part of factory default, it will be activated
	 * during first installation.
	 *
	 * @var bool
	 */
	protected $partOfFactoryDefault = FALSE;

	/**
	 * If this package is part of minimal usable system, it will be
	 * activated if PackageStates is created from scratch.
	 *
	 * @var bool
	 */
	protected $partOfMinimalUsableSystem = FALSE;

	/**
	 * Constructor
	 *
	 * @param \TYPO3\Flow\Package\PackageManager $packageManager the package manager which knows this package
	 * @param string $packageKey Key of this package
	 * @param string $packagePath Absolute path to the location of the package's composer manifest
	 * @param string $classesPath Path the classes of the package are in, relative to $packagePath. Optional, read from Composer manifest if not set.
	 * @param string $manifestPath Path the composer manifest of the package, relative to $packagePath. Optional, defaults to ''.
	 * @throws \TYPO3\Flow\Package\Exception\InvalidPackageKeyException if an invalid package key was passed
	 * @throws \TYPO3\Flow\Package\Exception\InvalidPackagePathException if an invalid package path was passed
	 * @throws \TYPO3\Flow\Package\Exception\InvalidPackageManifestException if no composer manifest file could be found
	 */
	public function __construct(\TYPO3\Flow\Package\PackageManager $packageManager, $packageKey, $packagePath, $classesPath = NULL, $manifestPath = '') {
		if (!$packageManager->isPackageKeyValid($packageKey)) {
			throw new \TYPO3\Flow\Package\Exception\InvalidPackageKeyException('"' . $packageKey . '" is not a valid package key.', 1217959511);
		}
		if (!(@is_dir($packagePath) || (\TYPO3\Flow\Utility\Files::is_link($packagePath) && is_dir(\TYPO3\Flow\Utility\Files::getNormalizedPath($packagePath))))) {
			throw new \TYPO3\Flow\Package\Exception\InvalidPackagePathException(sprintf('Tried to instantiate a package object for package "%s" with a non-existing package path "%s". Either the package does not exist anymore, or the code creating this object contains an error.', $packageKey, $packagePath), 1166631890);
		}
		if (substr($packagePath, -1, 1) !== '/') {
			throw new \TYPO3\Flow\Package\Exception\InvalidPackagePathException(sprintf('The package path "%s" provided for package "%s" has no trailing forward slash.', $packagePath, $packageKey), 1166633722);
		}
		if ($classesPath[1] === '/') {
			throw new \TYPO3\Flow\Package\Exception\InvalidPackagePathException(sprintf('The package classes path provided for package "%s" has a leading forward slash.', $packageKey), 1334841321);
		}
		if (!@file_exists($packagePath . $manifestPath . 'ext_emconf.php')) {
			throw new \TYPO3\Flow\Package\Exception\InvalidPackageManifestException(sprintf('No ext_emconf file found for package "%s". Please create one at "%sext_emconf.php".', $packageKey, $manifestPath), 1360403545);
		}
		$this->packageManager = $packageManager;
		$this->manifestPath = $manifestPath;
		$this->packageKey = $packageKey;
		$this->packagePath = \TYPO3\Flow\Utility\Files::getNormalizedPath($packagePath);
		$this->classesPath = \TYPO3\Flow\Utility\Files::getNormalizedPath(\TYPO3\Flow\Utility\Files::concatenatePaths(array($this->packagePath, self::DIRECTORY_CLASSES)));
		try {
			$this->getComposerManifest();
		} catch (\TYPO3\Flow\Package\Exception\MissingPackageManifestException $exception) {
			$this->getExtensionEmconf($packageKey, $this->packagePath);
		}
		$this->loadFlagsFromComposerManifest();
		if ($this->objectManagementEnabled === NULL) {
			$this->objectManagementEnabled = FALSE;
		}
	}

	/**
	 * Loads package management related flags from the "extra:typo3/cms:Package" section
	 * of extensions composer.json files into local properties
	 *
	 * @return void
	 */
	protected function loadFlagsFromComposerManifest() {
		$extraFlags = $this->getComposerManifest('extra');
		if ($extraFlags !== NULL && isset($extraFlags->{"typo3/cms"}->{"Package"})) {
			foreach ($extraFlags->{"typo3/cms"}->{"Package"} as $flagName => $flagValue) {
				if (property_exists($this, $flagName)) {
					$this->{$flagName} = $flagValue;
				}
			}
		}
	}

	/**
	 * @return bool
	 */
	public function isPartOfFactoryDefault() {
		return $this->partOfFactoryDefault;
	}

	/**
	 * @return boolean
	 */
	public function isPartOfMinimalUsableSystem() {
		return $this->partOfMinimalUsableSystem;
	}

	/**
	 * @return bool
	 */
	protected function getExtensionEmconf() {
		$_EXTKEY = $this->packageKey;
		$path = $this->packagePath . '/ext_emconf.php';
		$EM_CONF = NULL;
		if (@file_exists($path)) {
			include $path;
			if (is_array($EM_CONF[$_EXTKEY])) {
				$this->extensionManagerConfiguration = $EM_CONF[$_EXTKEY];
				$this->mapExtensionManagerConfigurationToComposerManifest();
			}
		}
		return FALSE;
	}

	/**
	 *
	 */
	protected function mapExtensionManagerConfigurationToComposerManifest() {
		if (is_array($this->extensionManagerConfiguration)) {
			$extensionManagerConfiguration = $this->extensionManagerConfiguration;
			$composerManifest = $this->composerManifest = new \stdClass();
			$composerManifest->name = $this->getPackageKey();
			$composerManifest->type = 'typo3-cms-extension';
			$composerManifest->description = $extensionManagerConfiguration['title'];
			$composerManifest->version = $extensionManagerConfiguration['version'];
			if (isset($extensionManagerConfiguration['constraints']['depends']) && is_array($extensionManagerConfiguration['constraints']['depends'])) {
				$composerManifest->require = new \stdClass();
				foreach ($extensionManagerConfiguration['constraints']['depends'] as $requiredPackageKey => $requiredPackageVersion) {
					if (!empty($requiredPackageKey)) {
						$composerManifest->require->$requiredPackageKey = $requiredPackageVersion;
					} else {
						// TODO: throw meaningful exception or fail silently?
					}
				}
			}
			if (isset($extensionManagerConfiguration['constraints']['conflicts']) && is_array($extensionManagerConfiguration['constraints']['conflicts'])) {
				$composerManifest->conflict = new \stdClass();
				foreach ($extensionManagerConfiguration['constraints']['conflicts'] as $conflictingPackageKey => $conflictingPackageVersion) {
					if (!empty($conflictingPackageKey)) {
						$composerManifest->conflict->$conflictingPackageKey = $conflictingPackageVersion;
					} else {
						// TODO: throw meaningful exception or fail silently?
					}
				}
			}
			if (isset($extensionManagerConfiguration['constraints']['suggests']) && is_array($extensionManagerConfiguration['constraints']['suggests'])) {
				$composerManifest->suggest = new \stdClass();
				foreach ($extensionManagerConfiguration['constraints']['suggests'] as $suggestedPackageKey => $suggestedPackageVersion) {
					if (!empty($suggestedPackageKey)) {
						$composerManifest->suggest->$suggestedPackageKey = $suggestedPackageVersion;
					} else {
						// TODO: throw meaningful exception or fail silently?
					}
				}
			}
		}
	}

	/**
	 * Returns the package meta data object of this package.
	 *
	 * @return \TYPO3\Flow\Package\MetaData
	 */
	public function getPackageMetaData() {
		if ($this->packageMetaData === NULL) {
			parent::getPackageMetaData();
			$suggestions = $this->getComposerManifest('suggest');
			if ($suggestions !== NULL) {
				foreach ($suggestions as $suggestion => $version) {
					if ($this->packageRequirementIsComposerPackage($suggestion) === FALSE) {
						// Skip non-package requirements
						continue;
					}
					$packageKey = $this->packageManager->getPackageKeyFromComposerName($suggestion);
					$constraint = new \TYPO3\Flow\Package\MetaData\PackageConstraint(\TYPO3\Flow\Package\MetaDataInterface::CONSTRAINT_TYPE_SUGGESTS, $packageKey);
					$this->packageMetaData->addConstraint($constraint);
				}
			}
		}
		return $this->packageMetaData;
	}

	/**
	 * @return array
	 */
	public function getPackageReplacementKeys() {
		// The cast to array is required since the manifest returns data with type mixed
		return (array)$this->getComposerManifest('replace') ?: array();
	}

	/**
	 * Returns the PHP namespace of classes in this package.
	 *
	 * @return string
	 * @api
	 */
	public function getNamespace() {
		if(!$this->namespace) {
			$manifest = $this->getComposerManifest();
			if (isset($manifest->autoload->{'psr-0'})) {
				$namespaces = $manifest->autoload->{'psr-0'};
				if (count($namespaces) === 1) {
					$this->namespace = key($namespaces);
				} else {
					throw new \TYPO3\Flow\Package\Exception\InvalidPackageStateException(sprintf('The Composer manifest of package "%s" contains multiple namespace definitions in its autoload section but Flow does only support one namespace per package.', $this->packageKey), 1348053246);
				}
			} else {
				$packageKey = $this->getPackageKey();
				if (strpos($packageKey, '.') === FALSE) {
					// Old school with unknown vendor name
					$this->namespace =  '*\\' . \TYPO3\CMS\Core\Utility\GeneralUtility::underscoredToUpperCamelCase($packageKey);
				} else {
					$this->namespace = str_replace('.', '\\', $packageKey);
				}
			}
		}
		return $this->namespace;
	}

	/**
	 * @return array
	 */
	public function getClassFiles() {
		if (!is_array($this->classFiles)) {
			$this->classFiles = $this->filterClassFiles($this->buildArrayOfClassFiles($this->classesPath . '/', $this->namespace . '\\'));
		}
		return $this->classFiles;
	}

	/**
	 * @param array $classFiles
	 * @return array
	 */
	protected function filterClassFiles(array $classFiles) {
		$classesNotMatchingClassRule = array_filter(array_keys($classFiles), function($className) {
			return preg_match('/^[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\\\x7f-\xff]*$/', $className) !== 1;
		});
		foreach ($classesNotMatchingClassRule as $forbiddenClassName) {
			unset($classFiles[$forbiddenClassName]);
		}
		foreach ($this->ignoredClassNames as $ignoredClassName) {
			if (isset($classFiles[$ignoredClassName])) {
				unset($classFiles[$ignoredClassName]);
			}
		}
		return $classFiles;
	}

	/**
	 * @return array
	 */
	public function getClassFilesFromAutoloadRegistry() {
		$autoloadRegistryPath = $this->packagePath . 'ext_autoload.php';
		if (@file_exists($autoloadRegistryPath)) {
			return require $autoloadRegistryPath;
		}
		return array();
	}

	/**
	 *
	 */
	public function getClassAliases() {
		if (!is_array($this->classAliases)) {
			try {
				$extensionClassAliasMapPathAndFilename = \TYPO3\Flow\Utility\Files::concatenatePaths(array(
					$this->getPackagePath(),
					'Migrations/Code/ClassAliasMap.php'
				));
				if (@file_exists($extensionClassAliasMapPathAndFilename)) {
					$this->classAliases = require $extensionClassAliasMapPathAndFilename;
				}
			} catch (\BadFunctionCallException $e) {
			}
			if (!is_array($this->classAliases)) {
				$this->classAliases = array();
			}
		}
		return $this->classAliases;
	}

	/**
	 * Check whether the given package requirement (like "typo3/flow" or "php") is a composer package or not
	 *
	 * @param string $requirement the composer requirement string
	 * @return boolean TRUE if $requirement is a composer package (contains a slash), FALSE otherwise
	 */
	protected function packageRequirementIsComposerPackage($requirement) {
		// According to http://getcomposer.org/doc/02-libraries.md#platform-packages
		// the following regex should capture all non composer requirements.
		// typo3 is included in the list because it's a meta package and not supported for now.
		// composer/installers is included until extensionmanager can handle composer packages natively
		return preg_match('/^(php(-64bit)?|ext-[^\/]+|lib-(curl|iconv|libxml|openssl|pcre|uuid|xsl)|typo3|composer\/installers)$/', $requirement) !== 1;
	}


}

return 
array (
  'packageStatesConfiguration' => 
  array (
    'packages' => 
    array (
      'core' => 
      array (
        'manifestPath' => '',
        'composerName' => 'typo3/cms-core',
        'state' => 'active',
        'packagePath' => 'typo3/sysext/core/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'backend' => 
      array (
        'manifestPath' => '',
        'composerName' => 'typo3/cms-backend',
        'state' => 'active',
        'packagePath' => 'typo3/sysext/backend/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'cshmanual' => 
      array (
        'manifestPath' => '',
        'composerName' => 'typo3/cms-cshmanual',
        'state' => 'active',
        'packagePath' => 'typo3/sysext/cshmanual/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'extensionmanager' => 
      array (
        'manifestPath' => '',
        'composerName' => 'typo3/cms-extensionmanager',
        'state' => 'active',
        'packagePath' => 'typo3/sysext/extensionmanager/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'cms' => 
      array (
        'manifestPath' => '',
        'composerName' => 'typo3/cms-cms',
        'state' => 'active',
        'packagePath' => 'typo3/sysext/cms/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'frontend' => 
      array (
        'manifestPath' => '',
        'composerName' => 'typo3/cms-frontend',
        'state' => 'active',
        'packagePath' => 'typo3/sysext/frontend/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'extbase' => 
      array (
        'manifestPath' => '',
        'composerName' => 'typo3/cms-extbase',
        'state' => 'active',
        'packagePath' => 'typo3/sysext/extbase/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'fluid' => 
      array (
        'manifestPath' => '',
        'composerName' => 'typo3/cms-fluid',
        'state' => 'active',
        'packagePath' => 'typo3/sysext/fluid/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'install' => 
      array (
        'manifestPath' => '',
        'composerName' => 'typo3/cms-install',
        'state' => 'active',
        'packagePath' => 'typo3/sysext/install/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'lang' => 
      array (
        'manifestPath' => '',
        'composerName' => 'typo3/cms-lang',
        'state' => 'active',
        'packagePath' => 'typo3/sysext/lang/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'recordlist' => 
      array (
        'manifestPath' => '',
        'composerName' => 'typo3/cms-recordlist',
        'state' => 'active',
        'packagePath' => 'typo3/sysext/recordlist/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'saltedpasswords' => 
      array (
        'manifestPath' => '',
        'composerName' => 'typo3/cms-saltedpasswords',
        'state' => 'active',
        'packagePath' => 'typo3/sysext/saltedpasswords/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'sv' => 
      array (
        'manifestPath' => '',
        'composerName' => 'typo3/cms-sv',
        'state' => 'active',
        'packagePath' => 'typo3/sysext/sv/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      't3skin' => 
      array (
        'manifestPath' => '',
        'composerName' => 'typo3/cms-t3skin',
        'state' => 'active',
        'packagePath' => 'typo3/sysext/t3skin/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      't3tool' => 
      array (
        'state' => 'active',
        'packagePath' => 'typo3conf/ext/t3tool/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'about' => 
      array (
        'manifestPath' => '',
        'composerName' => 'typo3/cms-about',
        'state' => 'inactive',
        'packagePath' => 'typo3/sysext/about/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'aboutmodules' => 
      array (
        'manifestPath' => '',
        'composerName' => 'typo3/cms-aboutmodules',
        'state' => 'inactive',
        'packagePath' => 'typo3/sysext/aboutmodules/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'adodb' => 
      array (
        'manifestPath' => '',
        'composerName' => 'typo3/cms-adodb',
        'state' => 'inactive',
        'packagePath' => 'typo3/sysext/adodb/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'belog' => 
      array (
        'manifestPath' => '',
        'composerName' => 'typo3/cms-belog',
        'state' => 'inactive',
        'packagePath' => 'typo3/sysext/belog/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'beuser' => 
      array (
        'manifestPath' => '',
        'composerName' => 'typo3/cms-beuser',
        'state' => 'inactive',
        'packagePath' => 'typo3/sysext/beuser/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'context_help' => 
      array (
        'manifestPath' => '',
        'composerName' => 'typo3/cms-context-help',
        'state' => 'inactive',
        'packagePath' => 'typo3/sysext/context_help/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'css_styled_content' => 
      array (
        'manifestPath' => '',
        'composerName' => 'typo3/cms-css-styled-content',
        'state' => 'inactive',
        'packagePath' => 'typo3/sysext/css_styled_content/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'dbal' => 
      array (
        'manifestPath' => '',
        'composerName' => 'typo3/cms-dbal',
        'state' => 'inactive',
        'packagePath' => 'typo3/sysext/dbal/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'documentation' => 
      array (
        'manifestPath' => '',
        'composerName' => 'typo3/cms-documentation',
        'state' => 'inactive',
        'packagePath' => 'typo3/sysext/documentation/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'extra_page_cm_options' => 
      array (
        'manifestPath' => '',
        'composerName' => 'typo3/cms-extra-page-cm-options',
        'state' => 'inactive',
        'packagePath' => 'typo3/sysext/extra_page_cm_options/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'feedit' => 
      array (
        'manifestPath' => '',
        'composerName' => 'typo3/cms-feedit',
        'state' => 'inactive',
        'packagePath' => 'typo3/sysext/feedit/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'felogin' => 
      array (
        'manifestPath' => '',
        'composerName' => 'typo3/cms-felogin',
        'state' => 'inactive',
        'packagePath' => 'typo3/sysext/felogin/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'filelist' => 
      array (
        'manifestPath' => '',
        'composerName' => 'typo3/cms-filelist',
        'state' => 'inactive',
        'packagePath' => 'typo3/sysext/filelist/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'filemetadata' => 
      array (
        'manifestPath' => '',
        'composerName' => 'typo3/cms-filemetadata',
        'state' => 'inactive',
        'packagePath' => 'typo3/sysext/filemetadata/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'form' => 
      array (
        'manifestPath' => '',
        'composerName' => 'typo3/cms-form',
        'state' => 'inactive',
        'packagePath' => 'typo3/sysext/form/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'func' => 
      array (
        'manifestPath' => '',
        'composerName' => 'typo3/cms-func',
        'state' => 'inactive',
        'packagePath' => 'typo3/sysext/func/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'func_wizards' => 
      array (
        'manifestPath' => '',
        'composerName' => 'typo3/cms-func-wizards',
        'state' => 'inactive',
        'packagePath' => 'typo3/sysext/func_wizards/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'impexp' => 
      array (
        'manifestPath' => '',
        'composerName' => 'typo3/cms-impexp',
        'state' => 'inactive',
        'packagePath' => 'typo3/sysext/impexp/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'indexed_search' => 
      array (
        'manifestPath' => '',
        'composerName' => 'typo3/cms-indexed-search',
        'state' => 'inactive',
        'packagePath' => 'typo3/sysext/indexed_search/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'indexed_search_mysql' => 
      array (
        'manifestPath' => '',
        'composerName' => 'typo3/cms-indexed-search-mysql',
        'state' => 'inactive',
        'packagePath' => 'typo3/sysext/indexed_search_mysql/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'info' => 
      array (
        'manifestPath' => '',
        'composerName' => 'typo3/cms-info',
        'state' => 'inactive',
        'packagePath' => 'typo3/sysext/info/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'info_pagetsconfig' => 
      array (
        'manifestPath' => '',
        'composerName' => 'typo3/cms-info-pagetsconfig',
        'state' => 'inactive',
        'packagePath' => 'typo3/sysext/info_pagetsconfig/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'linkvalidator' => 
      array (
        'manifestPath' => '',
        'composerName' => 'typo3/cms-linkvalidator',
        'state' => 'inactive',
        'packagePath' => 'typo3/sysext/linkvalidator/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'lowlevel' => 
      array (
        'manifestPath' => '',
        'composerName' => 'typo3/cms-lowlevel',
        'state' => 'inactive',
        'packagePath' => 'typo3/sysext/lowlevel/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'opendocs' => 
      array (
        'manifestPath' => '',
        'composerName' => 'typo3/cms-opendocs',
        'state' => 'inactive',
        'packagePath' => 'typo3/sysext/opendocs/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'openid' => 
      array (
        'manifestPath' => '',
        'composerName' => 'typo3/cms-openid',
        'state' => 'inactive',
        'packagePath' => 'typo3/sysext/openid/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'perm' => 
      array (
        'manifestPath' => '',
        'composerName' => 'typo3/cms-perm',
        'state' => 'inactive',
        'packagePath' => 'typo3/sysext/perm/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'recycler' => 
      array (
        'manifestPath' => '',
        'composerName' => 'typo3/cms-recycler',
        'state' => 'inactive',
        'packagePath' => 'typo3/sysext/recycler/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'reports' => 
      array (
        'manifestPath' => '',
        'composerName' => 'typo3/cms-reports',
        'state' => 'inactive',
        'packagePath' => 'typo3/sysext/reports/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'rsaauth' => 
      array (
        'manifestPath' => '',
        'composerName' => 'typo3/cms-rsaauth',
        'state' => 'inactive',
        'packagePath' => 'typo3/sysext/rsaauth/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'rtehtmlarea' => 
      array (
        'manifestPath' => '',
        'composerName' => 'typo3/cms-rtehtmlarea',
        'state' => 'inactive',
        'packagePath' => 'typo3/sysext/rtehtmlarea/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
          0 => 'setup',
        ),
      ),
      'scheduler' => 
      array (
        'manifestPath' => '',
        'composerName' => 'typo3/cms-scheduler',
        'state' => 'inactive',
        'packagePath' => 'typo3/sysext/scheduler/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'setup' => 
      array (
        'manifestPath' => '',
        'composerName' => 'typo3/cms-setup',
        'state' => 'inactive',
        'packagePath' => 'typo3/sysext/setup/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'sys_action' => 
      array (
        'manifestPath' => '',
        'composerName' => 'typo3/cms-sys-action',
        'state' => 'inactive',
        'packagePath' => 'typo3/sysext/sys_action/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'sys_note' => 
      array (
        'manifestPath' => '',
        'composerName' => 'typo3/cms-sys-note',
        'state' => 'inactive',
        'packagePath' => 'typo3/sysext/sys_note/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      't3editor' => 
      array (
        'manifestPath' => '',
        'composerName' => 'typo3/cms-t3editor',
        'state' => 'inactive',
        'packagePath' => 'typo3/sysext/t3editor/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'taskcenter' => 
      array (
        'manifestPath' => '',
        'composerName' => 'typo3/cms-taskcenter',
        'state' => 'inactive',
        'packagePath' => 'typo3/sysext/taskcenter/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'tstemplate' => 
      array (
        'manifestPath' => '',
        'composerName' => 'typo3/cms-tstemplate',
        'state' => 'inactive',
        'packagePath' => 'typo3/sysext/tstemplate/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'version' => 
      array (
        'manifestPath' => '',
        'composerName' => 'typo3/cms-version',
        'state' => 'inactive',
        'packagePath' => 'typo3/sysext/version/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'viewpage' => 
      array (
        'manifestPath' => '',
        'composerName' => 'typo3/cms-viewpage',
        'state' => 'inactive',
        'packagePath' => 'typo3/sysext/viewpage/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'wizard_crpages' => 
      array (
        'manifestPath' => '',
        'composerName' => 'typo3/cms-wizard-crpages',
        'state' => 'inactive',
        'packagePath' => 'typo3/sysext/wizard_crpages/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'wizard_sortpages' => 
      array (
        'manifestPath' => '',
        'composerName' => 'typo3/cms-wizard-sortpages',
        'state' => 'inactive',
        'packagePath' => 'typo3/sysext/wizard_sortpages/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
      'workspaces' => 
      array (
        'manifestPath' => '',
        'composerName' => 'typo3/cms-workspaces',
        'state' => 'inactive',
        'packagePath' => 'typo3/sysext/workspaces/',
        'classesPath' => 'Classes/',
        'suggestions' => 
        array (
        ),
      ),
    ),
    'version' => 4,
  ),
  'packageAliasMap' => 
  array (
    'core' => 'core',
    'backend' => 'backend',
    'cshmanual' => 'cshmanual',
    'extensionmanager' => 'extensionmanager',
    'cms' => 'cms',
    'frontend' => 'frontend',
    'extbase' => 'extbase',
    'fluid' => 'fluid',
    'install' => 'install',
    'lang' => 'lang',
    'recordlist' => 'recordlist',
    'saltedpasswords' => 'saltedpasswords',
    'sv' => 'sv',
    't3skin' => 't3skin',
    'about' => 'about',
    'aboutmodules' => 'aboutmodules',
    'adodb' => 'adodb',
    'belog' => 'belog',
    'beuser' => 'beuser',
    'context_help' => 'context_help',
    'css_styled_content' => 'css_styled_content',
    'dbal' => 'dbal',
    'documentation' => 'documentation',
    'extra_page_cm_options' => 'extra_page_cm_options',
    'feedit' => 'feedit',
    'felogin' => 'felogin',
    'filelist' => 'filelist',
    'filemetadata' => 'filemetadata',
    'form' => 'form',
    'func' => 'func',
    'func_wizards' => 'func_wizards',
    'impexp' => 'impexp',
    'indexed_search' => 'indexed_search',
    'indexed_search_mysql' => 'indexed_search_mysql',
    'info' => 'info',
    'info_pagetsconfig' => 'info_pagetsconfig',
    'linkvalidator' => 'linkvalidator',
    'lowlevel' => 'lowlevel',
    'opendocs' => 'opendocs',
    'openid' => 'openid',
    'perm' => 'perm',
    'recycler' => 'recycler',
    'reports' => 'reports',
    'rsaauth' => 'rsaauth',
    'rtehtmlarea' => 'rtehtmlarea',
    'scheduler' => 'scheduler',
    'setup' => 'setup',
    'sys_action' => 'sys_action',
    'sys_note' => 'sys_note',
    't3editor' => 't3editor',
    'taskcenter' => 'taskcenter',
    'tstemplate' => 'tstemplate',
    'version' => 'version',
    'viewpage' => 'viewpage',
    'wizard_crpages' => 'wizard_crpages',
    'wizard_sortpages' => 'wizard_sortpages',
    'workspaces' => 'workspaces',
  ),
  'packageKeys' => 
  array (
    'core' => 'core',
    'backend' => 'backend',
    'cshmanual' => 'cshmanual',
    'extensionmanager' => 'extensionmanager',
    'cms' => 'cms',
    'frontend' => 'frontend',
    'extbase' => 'extbase',
    'fluid' => 'fluid',
    'install' => 'install',
    'lang' => 'lang',
    'recordlist' => 'recordlist',
    'saltedpasswords' => 'saltedpasswords',
    'sv' => 'sv',
    't3skin' => 't3skin',
    't3tool' => 't3tool',
    'about' => 'about',
    'aboutmodules' => 'aboutmodules',
    'adodb' => 'adodb',
    'belog' => 'belog',
    'beuser' => 'beuser',
    'context_help' => 'context_help',
    'css_styled_content' => 'css_styled_content',
    'dbal' => 'dbal',
    'documentation' => 'documentation',
    'extra_page_cm_options' => 'extra_page_cm_options',
    'feedit' => 'feedit',
    'felogin' => 'felogin',
    'filelist' => 'filelist',
    'filemetadata' => 'filemetadata',
    'form' => 'form',
    'func' => 'func',
    'func_wizards' => 'func_wizards',
    'impexp' => 'impexp',
    'indexed_search' => 'indexed_search',
    'indexed_search_mysql' => 'indexed_search_mysql',
    'info' => 'info',
    'info_pagetsconfig' => 'info_pagetsconfig',
    'linkvalidator' => 'linkvalidator',
    'lowlevel' => 'lowlevel',
    'opendocs' => 'opendocs',
    'openid' => 'openid',
    'perm' => 'perm',
    'recycler' => 'recycler',
    'reports' => 'reports',
    'rsaauth' => 'rsaauth',
    'rtehtmlarea' => 'rtehtmlarea',
    'scheduler' => 'scheduler',
    'setup' => 'setup',
    'sys_action' => 'sys_action',
    'sys_note' => 'sys_note',
    't3editor' => 't3editor',
    'taskcenter' => 'taskcenter',
    'tstemplate' => 'tstemplate',
    'version' => 'version',
    'viewpage' => 'viewpage',
    'wizard_crpages' => 'wizard_crpages',
    'wizard_sortpages' => 'wizard_sortpages',
    'workspaces' => 'workspaces',
  ),
  'activePackageKeys' => 
  array (
    0 => 'core',
    1 => 'backend',
    2 => 'cshmanual',
    3 => 'extensionmanager',
    4 => 'cms',
    5 => 'frontend',
    6 => 'extbase',
    7 => 'fluid',
    8 => 'install',
    9 => 'lang',
    10 => 'recordlist',
    11 => 'saltedpasswords',
    12 => 'sv',
    13 => 't3skin',
    14 => 't3tool',
  ),
  'requiredPackageKeys' => 
  array (
    0 => 'core',
    1 => 'backend',
    2 => 'cshmanual',
    3 => 'extensionmanager',
    4 => 'cms',
    5 => 'frontend',
    6 => 'extbase',
    7 => 'fluid',
    8 => 'install',
    9 => 'lang',
    10 => 'recordlist',
    11 => 'saltedpasswords',
    12 => 'sv',
  ),
  'loadedExtArray' => 
  array (
    'core' => 
    array (
      'type' => 'S',
      'siteRelPath' => 'typo3/sysext/core/',
      'typo3RelPath' => 'sysext/core/',
      'ext_localconf.php' => '/usr/local/bin/tools/t3tool/lib/typo3/typo3/sysext/core/ext_localconf.php',
      'ext_tables.php' => '/usr/local/bin/tools/t3tool/lib/typo3/typo3/sysext/core/ext_tables.php',
      'ext_tables.sql' => '/usr/local/bin/tools/t3tool/lib/typo3/typo3/sysext/core/ext_tables.sql',
      'ext_icon' => 'ext_icon.png',
    ),
    'backend' => 
    array (
      'type' => 'S',
      'siteRelPath' => 'typo3/sysext/backend/',
      'typo3RelPath' => 'sysext/backend/',
      'ext_localconf.php' => '/usr/local/bin/tools/t3tool/lib/typo3/typo3/sysext/backend/ext_localconf.php',
      'ext_tables.php' => '/usr/local/bin/tools/t3tool/lib/typo3/typo3/sysext/backend/ext_tables.php',
      'ext_icon' => 'ext_icon.png',
    ),
    'cshmanual' => 
    array (
      'type' => 'S',
      'siteRelPath' => 'typo3/sysext/cshmanual/',
      'typo3RelPath' => 'sysext/cshmanual/',
      'ext_tables.php' => '/usr/local/bin/tools/t3tool/lib/typo3/typo3/sysext/cshmanual/ext_tables.php',
      'ext_icon' => 'ext_icon.gif',
    ),
    'extensionmanager' => 
    array (
      'type' => 'S',
      'siteRelPath' => 'typo3/sysext/extensionmanager/',
      'typo3RelPath' => 'sysext/extensionmanager/',
      'ext_localconf.php' => '/usr/local/bin/tools/t3tool/lib/typo3/typo3/sysext/extensionmanager/ext_localconf.php',
      'ext_tables.php' => '/usr/local/bin/tools/t3tool/lib/typo3/typo3/sysext/extensionmanager/ext_tables.php',
      'ext_tables.sql' => '/usr/local/bin/tools/t3tool/lib/typo3/typo3/sysext/extensionmanager/ext_tables.sql',
      'ext_tables_static+adt.sql' => '/usr/local/bin/tools/t3tool/lib/typo3/typo3/sysext/extensionmanager/ext_tables_static+adt.sql',
      'ext_typoscript_setup.txt' => '/usr/local/bin/tools/t3tool/lib/typo3/typo3/sysext/extensionmanager/ext_typoscript_setup.txt',
      'ext_icon' => 'ext_icon.gif',
    ),
    'cms' => 
    array (
      'type' => 'S',
      'siteRelPath' => 'typo3/sysext/cms/',
      'typo3RelPath' => 'sysext/cms/',
      'ext_localconf.php' => '/usr/local/bin/tools/t3tool/lib/typo3/typo3/sysext/cms/ext_localconf.php',
      'ext_tables.php' => '/usr/local/bin/tools/t3tool/lib/typo3/typo3/sysext/cms/ext_tables.php',
      'ext_icon' => 'ext_icon.gif',
    ),
    'frontend' => 
    array (
      'type' => 'S',
      'siteRelPath' => 'typo3/sysext/frontend/',
      'typo3RelPath' => 'sysext/frontend/',
      'ext_localconf.php' => '/usr/local/bin/tools/t3tool/lib/typo3/typo3/sysext/frontend/ext_localconf.php',
      'ext_tables.sql' => '/usr/local/bin/tools/t3tool/lib/typo3/typo3/sysext/frontend/ext_tables.sql',
      'ext_icon' => 'ext_icon.png',
    ),
    'extbase' => 
    array (
      'type' => 'S',
      'siteRelPath' => 'typo3/sysext/extbase/',
      'typo3RelPath' => 'sysext/extbase/',
      'ext_localconf.php' => '/usr/local/bin/tools/t3tool/lib/typo3/typo3/sysext/extbase/ext_localconf.php',
      'ext_tables.php' => '/usr/local/bin/tools/t3tool/lib/typo3/typo3/sysext/extbase/ext_tables.php',
      'ext_tables.sql' => '/usr/local/bin/tools/t3tool/lib/typo3/typo3/sysext/extbase/ext_tables.sql',
      'ext_typoscript_setup.txt' => '/usr/local/bin/tools/t3tool/lib/typo3/typo3/sysext/extbase/ext_typoscript_setup.txt',
      'ext_icon' => 'ext_icon.gif',
    ),
    'fluid' => 
    array (
      'type' => 'S',
      'siteRelPath' => 'typo3/sysext/fluid/',
      'typo3RelPath' => 'sysext/fluid/',
      'ext_localconf.php' => '/usr/local/bin/tools/t3tool/lib/typo3/typo3/sysext/fluid/ext_localconf.php',
      'ext_tables.php' => '/usr/local/bin/tools/t3tool/lib/typo3/typo3/sysext/fluid/ext_tables.php',
      'ext_typoscript_setup.txt' => '/usr/local/bin/tools/t3tool/lib/typo3/typo3/sysext/fluid/ext_typoscript_setup.txt',
      'ext_icon' => 'ext_icon.gif',
    ),
    'install' => 
    array (
      'type' => 'S',
      'siteRelPath' => 'typo3/sysext/install/',
      'typo3RelPath' => 'sysext/install/',
      'ext_localconf.php' => '/usr/local/bin/tools/t3tool/lib/typo3/typo3/sysext/install/ext_localconf.php',
      'ext_tables.php' => '/usr/local/bin/tools/t3tool/lib/typo3/typo3/sysext/install/ext_tables.php',
      'ext_icon' => 'ext_icon.gif',
    ),
    'lang' => 
    array (
      'type' => 'S',
      'siteRelPath' => 'typo3/sysext/lang/',
      'typo3RelPath' => 'sysext/lang/',
      'ext_localconf.php' => '/usr/local/bin/tools/t3tool/lib/typo3/typo3/sysext/lang/ext_localconf.php',
      'ext_tables.php' => '/usr/local/bin/tools/t3tool/lib/typo3/typo3/sysext/lang/ext_tables.php',
      'ext_icon' => 'ext_icon.gif',
    ),
    'recordlist' => 
    array (
      'type' => 'S',
      'siteRelPath' => 'typo3/sysext/recordlist/',
      'typo3RelPath' => 'sysext/recordlist/',
      'ext_tables.php' => '/usr/local/bin/tools/t3tool/lib/typo3/typo3/sysext/recordlist/ext_tables.php',
      'ext_icon' => 'ext_icon.gif',
    ),
    'saltedpasswords' => 
    array (
      'type' => 'S',
      'siteRelPath' => 'typo3/sysext/saltedpasswords/',
      'typo3RelPath' => 'sysext/saltedpasswords/',
      'ext_localconf.php' => '/usr/local/bin/tools/t3tool/lib/typo3/typo3/sysext/saltedpasswords/ext_localconf.php',
      'ext_tables.php' => '/usr/local/bin/tools/t3tool/lib/typo3/typo3/sysext/saltedpasswords/ext_tables.php',
      'ext_icon' => 'ext_icon.gif',
    ),
    'sv' => 
    array (
      'type' => 'S',
      'siteRelPath' => 'typo3/sysext/sv/',
      'typo3RelPath' => 'sysext/sv/',
      'ext_localconf.php' => '/usr/local/bin/tools/t3tool/lib/typo3/typo3/sysext/sv/ext_localconf.php',
      'ext_tables.php' => '/usr/local/bin/tools/t3tool/lib/typo3/typo3/sysext/sv/ext_tables.php',
      'ext_icon' => 'ext_icon.gif',
    ),
    't3skin' => 
    array (
      'type' => 'S',
      'siteRelPath' => 'typo3/sysext/t3skin/',
      'typo3RelPath' => 'sysext/t3skin/',
      'ext_localconf.php' => '/usr/local/bin/tools/t3tool/lib/typo3/typo3/sysext/t3skin/ext_localconf.php',
      'ext_tables.php' => '/usr/local/bin/tools/t3tool/lib/typo3/typo3/sysext/t3skin/ext_tables.php',
      'ext_icon' => 'ext_icon.gif',
    ),
    't3tool' => 
    array (
      'type' => 'L',
      'siteRelPath' => 'typo3conf/ext/t3tool/',
      'typo3RelPath' => '../typo3conf/ext/t3tool/',
      'ext_localconf.php' => '/usr/local/bin/tools/t3tool/lib/typo3/typo3conf/ext/t3tool/ext_localconf.php',
      'ext_icon' => '',
    ),
  ),
  'packageObjectsCacheEntryIdentifier' => 'PackageObjects_55926125ef506400785607',
);
#