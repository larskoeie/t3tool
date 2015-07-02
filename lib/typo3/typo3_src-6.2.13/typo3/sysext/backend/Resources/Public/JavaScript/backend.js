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
 * general backend javascript functions
 */

Ext.ns('TYPO3.configuration');

/**
 * jump the backend to a module
 */
function jump(url, modName, mainModName, pageId) {
	if (isNaN(pageId)) {
		pageId = -2;
	}
		// clear information about which entry in nav. tree that might have been highlighted.
	top.fsMod.navFrameHighlightedID = [];
	top.fsMod.recentIds['web'] = pageId;

	if (top.TYPO3.Backend.NavigationContainer.PageTree) {
		top.TYPO3.Backend.NavigationContainer.PageTree.refreshTree();
	}

	top.nextLoadModuleUrl = url;
	top.TYPO3.ModuleMenu.App.showModule(modName);

}

/**
 * shortcut manager to delegate the action of creating shortcuts to the new
 * backend.php shortcut menu or the old shortcut frame depending on what is available
 */
var ShortcutManager = {

	/**
	 * central entry point to create a shortcut, delegates the call to correct endpoint
	 */
	createShortcut: function(confirmQuestion, backPath, moduleName, url) {
		if(confirm(confirmQuestion)) {
			if (typeof TYPO3BackendShortcutMenu !== undefined) {
					// backend.php
				TYPO3BackendShortcutMenu.createShortcut('', moduleName, url);
			}
		}
	}
}


/**
 * Function similar to PHPs  rawurlencode();
 */
function rawurlencode(str) {
	var output = escape(str);
	output = str_replace("*","%2A", output);
	output = str_replace("+","%2B", output);
	output = str_replace("/","%2F", output);
	output = str_replace("@","%40", output);
	return output;
}

/**
 * Function to similar to PHPs  rawurlencode() which removes TYPO3_SITE_URL;
 */
function rawurlencodeAndRemoveSiteUrl(str)	{	//
	var siteUrl = TYPO3.configuration.siteUrl;
	return rawurlencode(str_replace(siteUrl, "", str));
}

/**
 * String-replace function
 */
function str_replace(match,replace,string)	{	//
	var input = ""+string;
	var matchStr = ""+match;
	if (!matchStr)	{return string;}
	var output = "";
	var pointer=0;
	var pos = input.indexOf(matchStr);
	while (pos !== -1) {
		output+=""+input.substr(pointer, pos-pointer)+replace;
		pointer=pos+matchStr.length;
		pos = input.indexOf(match,pos+1);
	}
	output+=""+input.substr(pointer);
	return output;
}



/**
 * Launcing information window for records/files (fileref as "table" argument)
 */
function launchView(table, uid, bP) {
	var backPath = bP ? bP : "";
	var thePreviewWindow = "";
	thePreviewWindow = window.open(TS.PATH_typo3 + "show_item.php?table=" + encodeURIComponent(table) + "&uid=" + encodeURIComponent(uid),
			"ShowItem" + TS.uniqueID,
			"width=650,height=600,status=0,menubar=0,resizable=0,location=0,directories=0,scrollbars=1,toolbar=0");
	if (thePreviewWindow && thePreviewWindow.focus) {
		thePreviewWindow.focus();
	}
}

/**
 * Opens plain window with url
 */
function openUrlInWindow(url,windowName)	{	//
	regularWindow = window.open(
		url,
		windowName,
		"status=1,menubar=1,resizable=1,location=1,directories=0,scrollbars=1,toolbar=1");
	regularWindow.focus();
	return false;
}

/**
 * Loads a page id for editing in the page edit module:
 */
function loadEditId(id,addGetVars)	{	//
	top.fsMod.recentIds.web = id;
	top.fsMod.navFrameHighlightedID.web = "pages" + id + "_0";		// For highlighting

	if (top.content && top.content.nav_frame && top.content.nav_frame.refresh_nav) {
		top.content.nav_frame.refresh_nav();
	}
	if (TYPO3.configuration.pageModule) {
		top.goToModule(TYPO3.configuration.pageModule, 0, addGetVars?addGetVars:"");
	}
}

/**
 * Returns incoming URL (to a module) unless nextLoadModuleUrl is set. If that is the case nextLoadModuleUrl is returned (and cleared)
 * Used by the shortcut frame to set a "intermediate URL"
 */
var nextLoadModuleUrl="";
function getModuleUrl(inUrl)	{	//
	var nMU;
	if (top.nextLoadModuleUrl) {
		nMU=top.nextLoadModuleUrl;
		top.nextLoadModuleUrl="";
		return nMU;
	} else {
		return inUrl;
	}
}

/**
 * Print properties of an object
 */
function debugObj(obj,name)	{	//
	var acc;
	for (var i in obj) {
		if (obj[i]) {
			acc+=i+":  "+obj[i]+"\n";
		}
	}
	alert("Object: "+name+"\n\n"+acc);
}



	// Used by Frameset Modules
var currentSubScript = "";
var currentSubNavScript = "";

	// Used for tab-panels:
var DTM_currentTabs = [];

	// status of WS FE preview
var WorkspaceFrontendPreviewEnabled = TYPO3.configuration.workspaceFrontendPreviewEnabled;
