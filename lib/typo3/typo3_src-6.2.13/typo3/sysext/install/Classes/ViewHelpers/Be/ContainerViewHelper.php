<?php
namespace TYPO3\CMS\Install\ViewHelpers\Be;

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
 * View helper which allows you to create extbase based modules in the
 * style of TYPO3 default modules.
 * Note: This feature is experimental!
 *
 * = Examples =
 *
 * <code title="Simple">
 * <f:be.container>your module content</f:be.container>
 * </code>
 * <output>
 * "your module content" wrapped with proper head & body tags.
 * Default backend CSS styles and JavaScript will be included
 * </output>
 *
 * <code title="All options">
 * <f:be.container pageTitle="foo" enableJumpToUrl="false" enableClickMenu="false" loadPrototype="false" loadScriptaculous="false" scriptaculousModule="someModule,someOtherModule" loadExtJs="true" loadExtJsTheme="false" extJsAdapter="jQuery" enableExtJsDebug="true" addCssFile="{f:uri.resource(path:'styles/backend.css')}" addJsFile="{f:uri.resource(path:'scripts/main.js')}">your module content</f:be.container>
 * </code>
 * <output>
 * "your module content" wrapped with propper head & body tags.
 * Custom CSS file EXT:your_extension/Resources/Public/styles/backend.css and JavaScript file EXT:your_extension/Resources/Public/scripts/main.js will be loaded
 * </output>
 */
class ContainerViewHelper extends \TYPO3\CMS\Fluid\ViewHelpers\Be\AbstractBackendViewHelper {

	/**
	 * Render start page with \TYPO3\CMS\Backend\Template\DocumentTemplate and pageTitle
	 *
	 * @param string  $pageTitle title tag of the module. Not required by default, as BE modules are shown in a frame
	 * @param boolean $enableJumpToUrl If TRUE, includes "jumpTpUrl" javascript function required by ActionMenu. Defaults to TRUE, not needed anymore, as it is included all the time
	 * @param boolean $enableClickMenu If TRUE, loads clickmenu.js required by BE context menus. Defaults to TRUE
	 * @param boolean $loadPrototype specifies whether to load prototype library. Defaults to TRUE
	 * @param boolean $loadScriptaculous specifies whether to load scriptaculous libraries. Defaults to FALSE
	 * @param string  $scriptaculousModule additionales modules for scriptaculous
	 * @param boolean $loadExtJs specifies whether to load ExtJS library. Defaults to FALSE
	 * @param boolean $loadExtJsTheme whether to load ExtJS "grey" theme. Defaults to FALSE
	 * @param string  $extJsAdapter load alternative adapter (ext-base is default adapter)
	 * @param boolean $enableExtJsDebug if TRUE, debug version of ExtJS is loaded. Use this for development only
	 * @param array $addCssFiles Custom CSS files to be loaded
	 * @param array $addJsFiles Custom JavaScript files to be loaded
	 * @param array $triggers Defined triggers to be forwarded to client (e.g. refreshing backend widgets)
	 * @return string
	 * @see template
	 * @see \TYPO3\CMS\Core\Page\PageRenderer
	 */
	public function render($pageTitle = '', $enableJumpToUrl = TRUE, $enableClickMenu = TRUE, $loadPrototype = TRUE, $loadScriptaculous = FALSE, $scriptaculousModule = '', $loadExtJs = FALSE, $loadExtJsTheme = TRUE, $extJsAdapter = '', $enableExtJsDebug = FALSE, $addCssFiles = array(), $addJsFiles = array(), $triggers = array()) {
		$doc = $this->getDocInstance();
		$pageRenderer = $doc->getPageRenderer();

		$doc->JScode .= $doc->wrapScriptTags($doc->redirectUrls());
		if ($enableClickMenu) {
			$doc->loadJavascriptLib('sysext/backend/Resources/Public/JavaScript/clickmenu.js');
		}
		if ($loadPrototype) {
			$pageRenderer->loadPrototype();
		}
		if ($loadScriptaculous) {
			$pageRenderer->loadScriptaculous($scriptaculousModule);
		}
		if ($loadExtJs) {
			$pageRenderer->loadExtJS(TRUE, $loadExtJsTheme, $extJsAdapter);
			if ($enableExtJsDebug) {
				$pageRenderer->enableExtJsDebug();
			}
		}
		if (is_array($addCssFiles) && count($addCssFiles) > 0) {
			foreach ($addCssFiles as $addCssFile) {
				$pageRenderer->addCssFile($addCssFile);
			}
		}
		if (is_array($addJsFiles) && count($addJsFiles) > 0) {
			foreach ($addJsFiles as $addJsFile) {
				$pageRenderer->addJsFile($addJsFile);
			}
		}
		// Handle triggers
		if (!empty($triggers[\TYPO3\CMS\Extensionmanager\Controller\AbstractController::TRIGGER_RefreshModuleMenu])) {
			$pageRenderer->addJsInlineCode(
				\TYPO3\CMS\Extensionmanager\Controller\AbstractController::TRIGGER_RefreshModuleMenu,
				'if (top.TYPO3ModuleMenu.refreshMenu) { top.TYPO3ModuleMenu.refreshMenu(); }'
			);
		}
		$output = $this->renderChildren();
		$output = $doc->startPage($pageTitle) . $output;
		$output .= $doc->endPage();
		return $output;
	}
}
