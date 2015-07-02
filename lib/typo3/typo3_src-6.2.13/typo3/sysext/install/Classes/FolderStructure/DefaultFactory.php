<?php
namespace TYPO3\CMS\Install\FolderStructure;

/**
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

/**
 * Factory returns default folder structure object hierarchy
 */
class DefaultFactory {

	/**
	 * Get default structure object hierarchy
	 *
	 * @throws Exception
	 * @return RootNode
	 * @TODO: Use objectManager instead of new (will be injected)
	 */
	public function getStructure() {
		$rootNode = new RootNode($this->getDefaultStructureDefinition(), NULL);
		if (!($rootNode instanceof RootNodeInterface)) {
			throw new Exception(
				'Root node must implement RootNodeInterface',
				1366139176
			);
		}
		$structureFacade = new StructureFacade($rootNode);
		if (!($structureFacade instanceof StructureFacadeInterface)) {
			throw new Exception(
				'Structure facade must implement StructureFacadeInterface',
				1366535827
			);
		}
		return $structureFacade;
	}

	/**
	 * Default definition of folder and file structure with dynamic
	 * permission settings
	 *
	 * @return array
	 */
	protected function getDefaultStructureDefinition() {
		$filePermission = $GLOBALS['TYPO3_CONF_VARS']['BE']['fileCreateMask'];
		$directoryPermission = $GLOBALS['TYPO3_CONF_VARS']['BE']['folderCreateMask'];

		return array(
			// Cut off trailing forward / from PATH_site, so root node has no trailing slash like all others
			'name' => substr(PATH_site, 0, -1),
			'targetPermission' => $directoryPermission,
			'children' => array(
				array(
					'name' => 'index.php',
					'type' => 'TYPO3\\CMS\\install\\FolderStructure\\LinkNode',
					'target' => 'typo3_src/index.php',
				),
				array(
					'name' => 'typo3',
					'type' => 'TYPO3\\CMS\\install\\FolderStructure\\LinkNode',
					'target' => 'typo3_src/typo3',
				),
				array(
					'name' => 'typo3_src',
					'type' => 'TYPO3\\CMS\\install\\FolderStructure\\LinkNode',
				),
				array(
					'name' => 'typo3temp',
					'type' => 'TYPO3\\CMS\\install\\FolderStructure\\DirectoryNode',
					'targetPermission' => $directoryPermission,
					'children' => array(
						array(
							'name' => 'index.html',
							'type' => 'TYPO3\\CMS\\install\\FolderStructure\\FileNode',
							'targetPermission' => $filePermission,
							'targetContent' => '',
						),
						array(
							'name' => 'compressor',
							'type' => 'TYPO3\\CMS\\install\\FolderStructure\\DirectoryNode',
							'targetPermission' => $directoryPermission,
						),
						array(
							'name' => 'cs',
							'type' => 'TYPO3\\CMS\\install\\FolderStructure\\DirectoryNode',
							'targetPermission' => $directoryPermission,
						),
						array(
							'name' => 'Cache',
							'type' => 'TYPO3\\CMS\\install\\FolderStructure\\DirectoryNode',
							'targetPermission' => $directoryPermission,
						),
						array(
							'name' => 'GB',
							'type' => 'TYPO3\\CMS\\install\\FolderStructure\\DirectoryNode',
							'targetPermission' => $directoryPermission,
						),
						array(
							'name' => 'llxml',
							'type' => 'TYPO3\\CMS\\install\\FolderStructure\\DirectoryNode',
							'targetPermission' => $directoryPermission,
						),
						array(
							'name' => 'locks',
							'type' => 'TYPO3\\CMS\\install\\FolderStructure\\DirectoryNode',
							'targetPermission' => $directoryPermission,
						),
						array(
							'name' => 'pics',
							'type' => 'TYPO3\\CMS\\install\\FolderStructure\\DirectoryNode',
							'targetPermission' => $directoryPermission,
						),
						array(
							'name' => 'sprites',
							'type' => 'TYPO3\\CMS\\install\\FolderStructure\\DirectoryNode',
							'targetPermission' => $directoryPermission,
						),
						array(
							'name' => 'temp',
							'type' => 'TYPO3\\CMS\\install\\FolderStructure\\DirectoryNode',
							'targetPermission' => $directoryPermission,
						),
						array(
							'name' => '_processed_',
							'type' => 'TYPO3\\CMS\\install\\FolderStructure\\DirectoryNode',
							'targetPermission' => $directoryPermission,
						),
					),
				),
				array(
					'name' => 'typo3conf',
					'type' => 'TYPO3\\CMS\\install\\FolderStructure\\DirectoryNode',
					'targetPermission' => $directoryPermission,
					'children' => array(
						array(
							'name' => 'ext',
							'type' => 'TYPO3\\CMS\\install\\FolderStructure\\DirectoryNode',
							'targetPermission' => $directoryPermission,
						),
						array(
							'name' => 'l10n',
							'type' => 'TYPO3\\CMS\\install\\FolderStructure\\DirectoryNode',
							'targetPermission' => $directoryPermission,
						),
					),
				),
				array(
					'name' => 'uploads',
					'type' => 'TYPO3\\CMS\\install\\FolderStructure\\DirectoryNode',
					'targetPermission' => $directoryPermission,
					'children' => array(
						array(
							'name' => 'index.html',
							'type' => 'TYPO3\\CMS\\install\\FolderStructure\\FileNode',
							'targetPermission' => $filePermission,
							'targetContentFile' => PATH_site . 'typo3/sysext/install/Resources/Private/FolderStructureTemplateFiles/uploads-index.html',
						),
						array(
							'name' => 'media',
							'type' => 'TYPO3\\CMS\\install\\FolderStructure\\DirectoryNode',
							'targetPermission' => $directoryPermission,
							'children' => array(
								array(
									'name' => 'index.html',
									'type' => 'TYPO3\\CMS\\install\\FolderStructure\\FileNode',
									'targetPermission' => $filePermission,
									'targetContent' => '',
								),
							),
						),
						array(
							'name' => 'pics',
							'type' => 'TYPO3\\CMS\\install\\FolderStructure\\DirectoryNode',
							'targetPermission' => $directoryPermission,
							'children' => array(
								array(
									'name' => 'index.html',
									'type' => 'TYPO3\\CMS\\install\\FolderStructure\\FileNode',
									'targetPermission' => $filePermission,
									'targetContent' => '',
								),
							),
						),
					),
				),
				array(
					'name' => !empty($GLOBALS['TYPO3_CONF_VARS']['BE']['fileadminDir']) ? rtrim($GLOBALS['TYPO3_CONF_VARS']['BE']['fileadminDir'], '/') : 'fileadmin',
					'type' => 'TYPO3\\CMS\\install\\FolderStructure\\DirectoryNode',
					'targetPermission' => $directoryPermission,
					'children' => array(
						array(
							'name' => '_temp_',
							'type' => 'TYPO3\\CMS\\install\\FolderStructure\\DirectoryNode',
							'targetPermission' => $directoryPermission,
							'children' => array(
								array(
									'name' => '.htaccess',
									'type' => 'TYPO3\\CMS\\install\\FolderStructure\\FileNode',
									'targetPermission' => $filePermission,
									'targetContentFile' => PATH_site . 'typo3/sysext/install/Resources/Private/FolderStructureTemplateFiles/fileadmin-temp-htaccess',
								),
								array(
									'name' => 'index.html',
									'type' => 'TYPO3\\CMS\\install\\FolderStructure\\FileNode',
									'targetPermission' => $filePermission,
									'targetContentFile' => PATH_site . 'typo3/sysext/install/Resources/Private/FolderStructureTemplateFiles/fileadmin-temp-index.html',
								),
							),
						),
						array(
							'name' => 'user_upload',
							'type' => 'TYPO3\\CMS\\install\\FolderStructure\\DirectoryNode',
							'targetPermission' => $directoryPermission,
							'children' => array(
								array(
									'name' => '_temp_',
									'type' => 'TYPO3\\CMS\\install\\FolderStructure\\DirectoryNode',
									'targetPermission' => $directoryPermission,
									'children' => array(
										array(
											'name' => 'index.html',
											'type' => 'TYPO3\\CMS\\install\\FolderStructure\\FileNode',
											'targetPermission' => $filePermission,
											'targetContent' => '',
										),
										array(
											'name' => 'importexport',
											'type' => 'TYPO3\\CMS\\install\\FolderStructure\\DirectoryNode',
											'targetPermission' => $directoryPermission,
											'children' => array(
												array(
													'name' => '.htaccess',
													'type' => 'TYPO3\\CMS\\install\\FolderStructure\\FileNode',
													'targetPermission' => $filePermission,
													'targetContentFile' => PATH_site . 'typo3/sysext/install/Resources/Private/FolderStructureTemplateFiles/fileadmin-user_upload-temp-importexport-htaccess',
												),
												array(
													'name' => 'index.html',
													'type' => 'TYPO3\\CMS\\install\\FolderStructure\\FileNode',
													'targetPermission' => $filePermission,
													'targetContentFile' => PATH_site . 'typo3/sysext/install/Resources/Private/FolderStructureTemplateFiles/fileadmin-temp-index.html',
												),
											),
										),
									),
								),
								array(
									'name' => 'index.html',
									'type' => 'TYPO3\\CMS\\install\\FolderStructure\\FileNode',
									'targetPermission' => $filePermission,
									'targetContent' => '',
								),
							),
						),
					),
				),
			),
		);
	}
}