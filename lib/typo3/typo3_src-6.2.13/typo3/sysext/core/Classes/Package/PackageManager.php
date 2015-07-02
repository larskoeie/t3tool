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

use TYPO3\Flow\Annotations as Flow;

/**
 * The default TYPO3 Package Manager
 * Adapted from FLOW for TYPO3 CMS
 *
 * @api
 * @Flow\Scope("singleton")
 */
class PackageManager extends \TYPO3\Flow\Package\PackageManager implements \TYPO3\CMS\Core\SingletonInterface {

	/**
	 * @var \TYPO3\CMS\Core\Core\ClassLoader
	 */
	protected $classLoader;

	/**
	 * @var \TYPO3\CMS\Core\Package\DependencyResolver
	 */
	protected $dependencyResolver;

	/**
	 * @var \TYPO3\CMS\Core\Core\Bootstrap
	 */
	protected $bootstrap;

	/**
	 * @var \TYPO3\CMS\Core\Cache\Frontend\PhpFrontend
	 */
	protected $coreCache;

	/**
	 * @var string
	 */
	protected $cacheIdentifier;

	/**
	 * @var array
	 */
	protected $extAutoloadClassFiles;

	/**
	 * @var array
	 */
	protected $packagesBasePaths = array();

	/**
	 * @var array
	 */
	protected $packageAliasMap = array();

	/**
	 * @var array
	 */
	protected $requiredPackageKeys = array();

	/**
	 * @var array
	 */
	protected $runtimeActivatedPackages = array();

	/**
	 * Absolute path leading to the various package directories
	 * @var string
	 */
	protected $packagesBasePath = PATH_site;

	/**
	 * Constructor
	 */
	public function __construct() {
		// The order of paths is crucial for allowing overriding of system extension by local extensions.
		// Pay attention if you change order of the paths here.
		$this->packagesBasePaths = array(
			'local'     => PATH_typo3conf . 'ext',
			'global'    => PATH_typo3 . 'ext',
			'sysext'    => PATH_typo3 . 'sysext',
			'composer'  => PATH_site . 'Packages',
		);
		$this->packageStatesPathAndFilename = PATH_typo3conf . 'PackageStates.php';
		$this->packageFactory = new PackageFactory($this);
	}

	/**
	 * @param \TYPO3\CMS\Core\Core\ClassLoader $classLoader
	 */
	public function injectClassLoader(\TYPO3\CMS\Core\Core\ClassLoader $classLoader) {
		$this->classLoader = $classLoader;
	}

	/**
	 * @param \TYPO3\CMS\Core\Cache\Frontend\PhpFrontend $coreCache
	 */
	public function injectCoreCache(\TYPO3\CMS\Core\Cache\Frontend\PhpFrontend $coreCache) {
		$this->coreCache = $coreCache;
	}

	/**
	 * @param DependencyResolver
	 */
	public function injectDependencyResolver(DependencyResolver $dependencyResolver) {
		$this->dependencyResolver = $dependencyResolver;
	}

	/**
	 * Initializes the package manager
	 *
	 * @param \TYPO3\CMS\Core\Core\Bootstrap|\TYPO3\Flow\Core\Bootstrap $bootstrap The current bootstrap; Flow Bootstrap is here by intention to keep the PackageManager valid to the interface
	 * @return void
	 */
	public function initialize(\TYPO3\Flow\Core\Bootstrap $bootstrap) {
		$this->bootstrap = $bootstrap;

		$loadedFromCache = FALSE;
		try {
			$this->loadPackageManagerStatesFromCache();
			$loadedFromCache = TRUE;
		} catch (Exception\PackageManagerCacheUnavailableException $exception) {
			$this->loadPackageStates();
			$this->initializePackageObjects();
			$this->initializeCompatibilityLoadedExtArray();
		}

		//@deprecated since 6.2, don't use
		if (!defined('REQUIRED_EXTENSIONS')) {
			// List of extensions required to run the core
			define('REQUIRED_EXTENSIONS', implode(',', $this->requiredPackageKeys));
		}

		$cacheIdentifier = $this->getCacheIdentifier();
		if ($cacheIdentifier === NULL) {
			// Create an artificial cache identifier if the package states file is not available yet
			// in order that the class loader and class alias map can cache anyways.
			$cacheIdentifier = md5(implode('###', array_keys($this->activePackages)));
		}
		$this->classLoader->setCacheIdentifier($cacheIdentifier)->setPackages($this->activePackages);

		foreach ($this->activePackages as $package) {
			/** @var $package Package */
			$package->boot($bootstrap);
		}

		if (!$loadedFromCache) {
			$this->saveToPackageCache();
		}
	}

	/**
	 * @return PackageFactory
	 */
	protected function getPackageFactory() {
		if (!isset($this->packageFactory)) {
			$this->packageFactory = new PackageFactory($this);
		}
		return $this->packageFactory;
	}

	/**
	 * @return string
	 */
	protected function getCacheIdentifier() {
		if ($this->cacheIdentifier === NULL) {
			$mTime = @filemtime($this->packageStatesPathAndFilename);
			if ($mTime !== FALSE) {
				$this->cacheIdentifier = md5($this->packageStatesPathAndFilename . $mTime);
			} else {
				$this->cacheIdentifier = NULL;
			}
		}
		return $this->cacheIdentifier;
	}

	/**
	 * @return string
	 */
	protected function getCacheEntryIdentifier() {
		$cacheIdentifier = $this->getCacheIdentifier();
		return $cacheIdentifier !== NULL ? 'PackageManager_' . $cacheIdentifier : NULL;
	}

	/**
	 *
	 */
	protected function saveToPackageCache() {
		$cacheEntryIdentifier = $this->getCacheEntryIdentifier();
		if ($cacheEntryIdentifier !== NULL && !$this->coreCache->has($cacheEntryIdentifier)) {
			// Package objects get their own cache entry, so PHP does not have to parse the serialized string
			$packageObjectsCacheEntryIdentifier = str_replace('.', '', uniqid('PackageObjects_', TRUE));
			// Build cache file
			$packageCache = array(
				'packageStatesConfiguration'  => $this->packageStatesConfiguration,
				'packageAliasMap' => $this->packageAliasMap,
				'packageKeys' => $this->packageKeys,
				'activePackageKeys' => array_keys($this->activePackages),
				'requiredPackageKeys' => $this->requiredPackageKeys,
				'loadedExtArray' => $GLOBALS['TYPO3_LOADED_EXT'],
				'packageObjectsCacheEntryIdentifier' => $packageObjectsCacheEntryIdentifier
			);
			$packageClassSources = array(
				'typo3\\flow\\package\\package' => NULL,
				'typo3\\cms\\core\\package\\package' => NULL,
			);
			foreach ($this->packages as $package) {
				$packageClassName = strtolower(get_class($package));
				if (!isset($packageClassSources[$packageClassName]) || $packageClassSources[$packageClassName] === NULL) {
					$reflectionPackageClass = new \ReflectionClass($packageClassName);
					$packageClassSource = file_get_contents($reflectionPackageClass->getFileName());
					$packageClassSources[$packageClassName] = preg_replace('/<\?php|\?>/i', '', $packageClassSource);
				}
			}
			$this->coreCache->set($packageObjectsCacheEntryIdentifier, serialize($this->packages));
			$this->coreCache->set(
				$cacheEntryIdentifier,
				implode(PHP_EOL, $packageClassSources) . PHP_EOL .
					'return ' . PHP_EOL . var_export($packageCache, TRUE) . ';'
			);
		}
	}

	/**
	 * Attempts to load the package manager states from cache
	 *
	 * @throws Exception\PackageManagerCacheUnavailableException
	 */
	protected function loadPackageManagerStatesFromCache() {
		$cacheEntryIdentifier = $this->getCacheEntryIdentifier();
		if ($cacheEntryIdentifier === NULL || !$this->coreCache->has($cacheEntryIdentifier) || !($packageCache = $this->coreCache->requireOnce($cacheEntryIdentifier))) {
			throw new Exception\PackageManagerCacheUnavailableException('The package state cache could not be loaded.', 1393883342);
		}
		$this->packageStatesConfiguration = $packageCache['packageStatesConfiguration'];
		$this->packageAliasMap = $packageCache['packageAliasMap'];
		$this->packageKeys = $packageCache['packageKeys'];
		$this->requiredPackageKeys = $packageCache['requiredPackageKeys'];
		$GLOBALS['TYPO3_LOADED_EXT'] = $packageCache['loadedExtArray'];
		$GLOBALS['TYPO3_currentPackageManager'] = $this;
		// Strip off PHP Tags from Php Cache Frontend
		$packageObjects = substr(substr($this->coreCache->get($packageCache['packageObjectsCacheEntryIdentifier']), 6), 0, -2);
		$this->packages = unserialize($packageObjects);
		foreach ($packageCache['activePackageKeys'] as $activePackageKey) {
			$this->activePackages[$activePackageKey] = $this->packages[$activePackageKey];
		}
		unset($GLOBALS['TYPO3_currentPackageManager']);
	}

	/**
	 * Loads the states of available packages from the PackageStates.php file.
	 * The result is stored in $this->packageStatesConfiguration.
	 *
	 * @throws Exception\PackageStatesUnavailableException
	 * @return void
	 */
	protected function loadPackageStates() {
		$this->packageStatesConfiguration = @include($this->packageStatesPathAndFilename) ?: array();
		if (!isset($this->packageStatesConfiguration['version']) || $this->packageStatesConfiguration['version'] < 4) {
			$this->packageStatesConfiguration = array();
		}
		if ($this->packageStatesConfiguration !== array()) {
			$this->registerPackagesFromConfiguration();
		} else {
			throw new Exception\PackageStatesUnavailableException('The PackageStates.php file is either corrupt or unavailable.', 1381507733);
		}
	}

	/**
	 * Initializes activePackages and requiredPackageKeys properties
	 *
	 * Saves PackageStates.php if list of required extensions has changed.
	 *
	 * @return void
	 */
	protected function initializePackageObjects() {
		$requiredPackages = array();
		foreach ($this->packages as $packageKey => $package) {
			$protected = $package->isProtected();
			if ($protected) {
				$requiredPackages[$packageKey] = $package;
			}
			if (isset($this->packageStatesConfiguration['packages'][$packageKey]['state']) && $this->packageStatesConfiguration['packages'][$packageKey]['state'] === 'active') {
				$this->activePackages[$packageKey] = $package;
			}
		}
		$previousActivePackage = $this->activePackages;
		$this->activePackages = array_merge($requiredPackages, $this->activePackages);
		$this->requiredPackageKeys = array_keys($requiredPackages);

		if ($this->activePackages != $previousActivePackage) {
			foreach ($this->requiredPackageKeys as $requiredPackageKey) {
				$this->packageStatesConfiguration['packages'][$requiredPackageKey]['state'] = 'active';
			}
			$this->sortAndSavePackageStates();
		}
	}

	/**
	 * Initializes a backwards compatibility $GLOBALS['TYPO3_LOADED_EXT'] array
	 *
	 * @return void
	 */
	protected function initializeCompatibilityLoadedExtArray() {
		$loadedExtObj = new \TYPO3\CMS\Core\Compatibility\LoadedExtensionsArray($this);
		$GLOBALS['TYPO3_LOADED_EXT'] = $loadedExtObj->toArray();
	}


	/**
	 * Scans all directories in the packages directories for available packages.
	 * For each package a Package object is created and stored in $this->packages.
	 *
	 * @return void
	 * @throws \TYPO3\Flow\Package\Exception\DuplicatePackageException
	 */
	public function scanAvailablePackages() {
		$previousPackageStatesConfiguration = $this->packageStatesConfiguration;

		if (isset($this->packageStatesConfiguration['packages'])) {
			foreach ($this->packageStatesConfiguration['packages'] as $packageKey => $configuration) {
				if (!@file_exists($this->packagesBasePath . $configuration['packagePath'])) {
					unset($this->packageStatesConfiguration['packages'][$packageKey]);
				}
			}
		} else {
			$this->packageStatesConfiguration['packages'] = array();
		}

		foreach ($this->packagesBasePaths as $key => $packagesBasePath) {
			if (!is_dir($packagesBasePath)) {
				unset($this->packagesBasePaths[$key]);
			}
		}

		$packagePaths = $this->scanLegacyExtensions();
		foreach ($this->packagesBasePaths as $packagesBasePath) {
			$this->scanPackagesInPath($packagesBasePath, $packagePaths);
		}

		foreach ($packagePaths as $composerManifestPath) {
			$packagePath = $composerManifestPath;
			$packagesBasePath = PATH_site;
			foreach ($this->packagesBasePaths as $basePath) {
				if (strpos($packagePath, $basePath) === 0) {
					$packagesBasePath = $basePath;
					break;
				}
			}
			try {
				$composerManifest = self::getComposerManifest($composerManifestPath);
				$packageKey = PackageFactory::getPackageKeyFromManifest($composerManifest, $packagePath, $packagesBasePath);
				$this->composerNameToPackageKeyMap[strtolower($composerManifest->name)] = $packageKey;
				$this->packageStatesConfiguration['packages'][$packageKey]['manifestPath'] = substr($composerManifestPath, strlen($packagePath)) ? : '';
				$this->packageStatesConfiguration['packages'][$packageKey]['composerName'] = $composerManifest->name;
			} catch (\TYPO3\Flow\Package\Exception\MissingPackageManifestException $exception) {
				$relativePackagePath = substr($packagePath, strlen($packagesBasePath));
				$packageKey = substr($relativePackagePath, strpos($relativePackagePath, '/') + 1, -1);
				if (!$this->isPackageKeyValid($packageKey)) {
					continue;
				}
			} catch (\TYPO3\Flow\Package\Exception\InvalidPackageKeyException $exception) {
				continue;
			}
			if (!isset($this->packageStatesConfiguration['packages'][$packageKey]['state'])) {
				$this->packageStatesConfiguration['packages'][$packageKey]['state'] = 'inactive';
			}

			$this->packageStatesConfiguration['packages'][$packageKey]['packagePath'] = str_replace($this->packagesBasePath, '', $packagePath);

			// Change this to read the target from Composer or any other source
			$this->packageStatesConfiguration['packages'][$packageKey]['classesPath'] = Package::DIRECTORY_CLASSES;
		}

		$registerOnlyNewPackages = !empty($this->packages);
		$this->registerPackagesFromConfiguration($registerOnlyNewPackages);
		if ($this->packageStatesConfiguration != $previousPackageStatesConfiguration) {
			$this->sortAndsavePackageStates();
		}
	}

	/**
	 * @param array $collectedExtensionPaths
	 * @return array
	 */
	protected function scanLegacyExtensions(&$collectedExtensionPaths = array()) {
		$legacyCmsPackageBasePathTypes = array('sysext', 'global', 'local');
		foreach ($this->packagesBasePaths as $type => $packageBasePath) {
			if (!in_array($type, $legacyCmsPackageBasePathTypes)) {
				continue;
			}
			/** @var $fileInfo \SplFileInfo */
			foreach (new \DirectoryIterator($packageBasePath) as $fileInfo) {
				if (!$fileInfo->isDir()) {
					continue;
				}
				$filename = $fileInfo->getFilename();
				if ($filename[0] !== '.') {
					$currentPath = \TYPO3\Flow\Utility\Files::getUnixStylePath($fileInfo->getPathName()) . '/';
					// Only add the extension if we have an EMCONF and the extension is not yet registered.
					// This is crucial in order to allow overriding of system extension by local extensions
					// and strongly depends on the order of paths defined in $this->packagesBasePaths.
					if (file_exists($currentPath . 'ext_emconf.php') && !isset($collectedExtensionPaths[$filename])) {
						$collectedExtensionPaths[$filename] = $currentPath;
					}
				}
			}
		}
		return $collectedExtensionPaths;
	}

	/**
	 * Looks for composer.json in the given path and returns a path or NULL.
	 *
	 * @param string $packagePath
	 * @return array
	 */
	protected function findComposerManifestPaths($packagePath) {
		// If an ext_emconf.php file is found, we don't need to look deeper
		if (file_exists($packagePath . '/ext_emconf.php')) {
			return array();
		}
		return parent::findComposerManifestPaths($packagePath);
	}

	/**
	 * Requires and registers all packages which were defined in packageStatesConfiguration
	 *
	 * @param boolean $registerOnlyNewPackages
	 * @return void
	 * @throws \TYPO3\Flow\Package\Exception\CorruptPackageException
	 */
	protected function registerPackagesFromConfiguration($registerOnlyNewPackages = FALSE) {
		$packageStatesHasChanged = FALSE;
		foreach ($this->packageStatesConfiguration['packages'] as $packageKey => $stateConfiguration) {

			if ($registerOnlyNewPackages && $this->isPackageAvailable($packageKey)) {
				continue;
			}

			$packagePath = isset($stateConfiguration['packagePath']) ? $stateConfiguration['packagePath'] : NULL;
			$classesPath = isset($stateConfiguration['classesPath']) ? $stateConfiguration['classesPath'] : NULL;
			$manifestPath = isset($stateConfiguration['manifestPath']) ? $stateConfiguration['manifestPath'] : NULL;

			try {
				$package = $this->getPackageFactory()->create($this->packagesBasePath, $packagePath, $packageKey, $classesPath, $manifestPath);
			} catch (\TYPO3\Flow\Package\Exception\InvalidPackagePathException $exception) {
				$this->unregisterPackageByPackageKey($packageKey);
				$packageStatesHasChanged = TRUE;
				continue;
			} catch (\TYPO3\Flow\Package\Exception\InvalidPackageKeyException $exception) {
				$this->unregisterPackageByPackageKey($packageKey);
				$packageStatesHasChanged = TRUE;
				continue;
			}

			$this->registerPackage($package, FALSE);

			if (!$this->packages[$packageKey] instanceof \TYPO3\Flow\Package\PackageInterface) {
				throw new \TYPO3\Flow\Package\Exception\CorruptPackageException(sprintf('The package class in package "%s" does not implement PackageInterface.', $packageKey), 1300782488);
			}

			$this->packageKeys[strtolower($packageKey)] = $packageKey;
			if ($stateConfiguration['state'] === 'active') {
				$this->activePackages[$packageKey] = $this->packages[$packageKey];
			}
		}
		if ($packageStatesHasChanged) {
			$this->sortAndSavePackageStates();
		}
	}

	/**
	 * Register a native Flow package
	 *
	 * @param \TYPO3\Flow\Package\PackageInterface $package The Package to be registered
	 * @param boolean $sortAndSave allows for not saving packagestates when used in loops etc.
	 * @return \TYPO3\Flow\Package\PackageInterface
	 * @throws \TYPO3\Flow\Package\Exception\CorruptPackageException
	 */
	public function registerPackage(\TYPO3\Flow\Package\PackageInterface $package, $sortAndSave = TRUE) {
		$package = parent::registerPackage($package, $sortAndSave);
		if ($package instanceof PackageInterface) {
			foreach ($package->getPackageReplacementKeys() as $packageToReplace => $versionConstraint) {
				$this->packageAliasMap[strtolower($packageToReplace)] = $package->getPackageKey();
			}
		}
		return $package;
	}

	/**
	 * Unregisters a package from the list of available packages
	 *
	 * @param string $packageKey Package Key of the package to be unregistered
	 * @return void
	 */
	protected function unregisterPackageByPackageKey($packageKey) {
		try {
			$package = $this->getPackage($packageKey);
			if ($package instanceof PackageInterface) {
				foreach ($package->getPackageReplacementKeys() as $packageToReplace => $versionConstraint) {
					unset($this->packageAliasMap[strtolower($packageToReplace)]);
				}
				$packageKey = $package->getPackageKey();
			}
		} catch (\TYPO3\Flow\Package\Exception\UnknownPackageException $e) {
		}
		unset($this->packages[$packageKey]);
		unset($this->packageKeys[strtolower($packageKey)]);
		unset($this->packageStatesConfiguration['packages'][$packageKey]);
	}

	/**
	 * Resolves a Flow package key from a composer package name.
	 *
	 * @param string $composerName
	 * @return string
	 * @throws \TYPO3\Flow\Package\Exception\InvalidPackageStateException
	 */
	public function getPackageKeyFromComposerName($composerName) {
		if (isset($this->packageAliasMap[$composerName])) {
			return $this->packageAliasMap[$composerName];
		}
		try {
			return parent::getPackageKeyFromComposerName($composerName);
		} catch (\TYPO3\Flow\Package\Exception\InvalidPackageStateException $exception) {
			return $composerName;
		}
	}

	/**
	 * @return array
	 */
	public function getExtAutoloadRegistry() {
		if (!isset($this->extAutoloadClassFiles)) {
			$classRegistry = array();
			foreach ($this->activePackages as $packageKey => $packageData) {
				try {
					$extensionAutoloadFile = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($packageKey, 'ext_autoload.php');
					if (@file_exists($extensionAutoloadFile)) {
						$classRegistry = array_merge($classRegistry, require $extensionAutoloadFile);
					}
				} catch (\BadFunctionCallException $e) {
				}
			}
			$this->extAutoloadClassFiles = $classRegistry;
		}
		return $this->extAutoloadClassFiles;
	}

	/**
	 * Returns a PackageInterface object for the specified package.
	 * A package is available, if the package directory contains valid MetaData information.
	 *
	 * @param string $packageKey
	 * @return \TYPO3\Flow\Package\PackageInterface The requested package object
	 * @throws \TYPO3\Flow\Package\Exception\UnknownPackageException if the specified package is not known
	 * @api
	 */
	public function getPackage($packageKey) {
		if (isset($this->packageAliasMap[$lowercasedPackageKey = strtolower($packageKey)])) {
			$packageKey = $this->packageAliasMap[$lowercasedPackageKey];
		}
		return parent::getPackage($packageKey);
	}

	/**
	 * Returns TRUE if a package is available (the package's files exist in the packages directory)
	 * or FALSE if it's not. If a package is available it doesn't mean necessarily that it's active!
	 *
	 * @param string $packageKey The key of the package to check
	 * @return boolean TRUE if the package is available, otherwise FALSE
	 * @api
	 */
	public function isPackageAvailable($packageKey) {
		if (isset($this->packageAliasMap[$lowercasedPackageKey = strtolower($packageKey)])) {
			$packageKey = $this->packageAliasMap[$lowercasedPackageKey];
		}
		return parent::isPackageAvailable($packageKey);
	}

	/**
	 * Returns TRUE if a package is activated or FALSE if it's not.
	 *
	 * @param string $packageKey The key of the package to check
	 * @return boolean TRUE if package is active, otherwise FALSE
	 * @api
	 */
	public function isPackageActive($packageKey) {
		if (isset($this->packageAliasMap[$lowercasedPackageKey = strtolower($packageKey)])) {
			$packageKey = $this->packageAliasMap[$lowercasedPackageKey];
		}
		return isset($this->runtimeActivatedPackages[$packageKey]) || parent::isPackageActive($packageKey);
	}

	/**
	 * @param string $packageKey
	 */
	public function deactivatePackage($packageKey) {
		$package = $this->getPackage($packageKey);
		parent::deactivatePackage($package->getPackageKey());
	}

	/**
	 * @param string $packageKey
	 */
	public function activatePackage($packageKey) {
		$package = $this->getPackage($packageKey);
		parent::activatePackage($package->getPackageKey());
		$this->classLoader->addActivePackage($package);
	}

	/**
	 * Enables packages during runtime, but no class aliases will be available
	 *
	 * @param string $packageKey
	 * @api
	 */
	public function activatePackageDuringRuntime($packageKey) {
		$package = $this->getPackage($packageKey);
		$this->runtimeActivatedPackages[$package->getPackageKey()] = $package;
		$this->classLoader->addActivePackage($package);
		if (!isset($GLOBALS['TYPO3_LOADED_EXT'][$package->getPackageKey()])) {
			$loadedExtArrayElement = new \TYPO3\CMS\Core\Compatibility\LoadedExtensionArrayElement($package);
			$GLOBALS['TYPO3_LOADED_EXT'][$package->getPackageKey()] = $loadedExtArrayElement->toArray();
		}
	}


	/**
	 * @param string $packageKey
	 */
	public function deletePackage($packageKey) {
		$package = $this->getPackage($packageKey);
		parent::deletePackage($package->getPackageKey());
	}


	/**
	 * @param string $packageKey
	 */
	public function freezePackage($packageKey) {
		$package = $this->getPackage($packageKey);
		parent::freezePackage($package->getPackageKey());
	}

	/**
	 * @param string $packageKey
	 * @return bool
	 */
	public function isPackageFrozen($packageKey) {
		$package = $this->getPackage($packageKey);
		return parent::isPackageFrozen($package->getPackageKey());
	}

	/**
	 * @param string $packageKey
	 */
	public function unfreezePackage($packageKey) {
		$package = $this->getPackage($packageKey);
		parent::unfreezePackage($package->getPackageKey());
	}

	/**
	 * @param string $packageKey
	 */
	public function refreezePackage($packageKey) {
		$package = $this->getPackage($packageKey);
		parent::refreezePackage($package->getPackageKey());
	}

	/**
	 * Returns an array of \TYPO3\Flow\Package objects of all active packages.
	 * A package is active, if it is available and has been activated in the package
	 * manager settings. This method returns runtime activated packages too
	 *
	 * @return \TYPO3\Flow\Package\PackageInterface[]
	 * @api
	 */
	public function getActivePackages() {
		return array_merge(parent::getActivePackages(), $this->runtimeActivatedPackages);
	}

	/**
	 * Orders all packages by comparing their dependencies. By this, the packages
	 * and package configurations arrays holds all packages in the correct
	 * initialization order.
	 *
	 * @return void
	 */
	protected function sortAvailablePackagesByDependencies() {
		$this->resolvePackageDependencies();

		// sort the packages by key at first, so we get a stable sorting of "equivalent" packages afterwards
		ksort($this->packageStatesConfiguration['packages']);
		$this->packageStatesConfiguration['packages'] = $this->dependencyResolver->sortPackageStatesConfigurationByDependency($this->packageStatesConfiguration['packages']);

		// Reorder the packages according to the loading order
		$newPackages = array();
		foreach ($this->packageStatesConfiguration['packages'] as $packageKey => $_) {
			$newPackages[$packageKey] = $this->packages[$packageKey];
		}
		$this->packages = $newPackages;
	}

	/**
	 * Resolves the dependent packages from the meta data of all packages recursively. The
	 * resolved direct or indirect dependencies of each package will put into the package
	 * states configuration array.
	 *
	 * @return void
	 */
	protected function resolvePackageDependencies() {
		parent::resolvePackageDependencies();
		foreach ($this->packages as $packageKey => $package) {
			$this->packageStatesConfiguration['packages'][$packageKey]['suggestions'] = $this->getSuggestionArrayForPackage($packageKey);
		}
	}

	/**
	 * Returns an array of suggested package keys for the given package.
	 *
	 * @param string $packageKey The package key to fetch the suggestions for
	 * @return array|NULL An array of directly suggested packages
	 */
	protected function getSuggestionArrayForPackage($packageKey) {
		if (!isset($this->packages[$packageKey])) {
			return NULL;
		}
		$suggestedPackageKeys = array();
		$suggestedPackageConstraints = $this->packages[$packageKey]->getPackageMetaData()->getConstraintsByType(\TYPO3\Flow\Package\MetaDataInterface::CONSTRAINT_TYPE_SUGGESTS);
		foreach ($suggestedPackageConstraints as $constraint) {
			if ($constraint instanceof \TYPO3\Flow\Package\MetaData\PackageConstraint) {
				$suggestedPackageKey = $constraint->getValue();
				if (isset($this->packages[$suggestedPackageKey])) {
					$suggestedPackageKeys[] = $suggestedPackageKey;
				}
			}
		}
		return array_reverse($suggestedPackageKeys);
	}

	/**
	 * Saves the current content of $this->packageStatesConfiguration to the
	 * PackageStates.php file.
	 *
	 * @return void
	 */
	protected function sortAndSavePackageStates() {
		parent::sortAndSavePackageStates();
		\TYPO3\CMS\Core\Utility\GeneralUtility::fixPermissions($this->packageStatesPathAndFilename);

		$this->initializeCompatibilityLoadedExtArray();
		\TYPO3\CMS\Core\Utility\OpcodeCacheUtility::clearAllActive($this->packageStatesPathAndFilename);
	}

	/**
	 * Check the conformance of the given package key
	 *
	 * @param string $packageKey The package key to validate
	 * @return boolean If the package key is valid, returns TRUE otherwise FALSE
	 * @api
	 */
	public function isPackageKeyValid($packageKey) {
		return parent::isPackageKeyValid($packageKey) || preg_match(\TYPO3\CMS\Core\Package\Package::PATTERN_MATCH_EXTENSIONKEY, $packageKey) === 1;
	}
}
