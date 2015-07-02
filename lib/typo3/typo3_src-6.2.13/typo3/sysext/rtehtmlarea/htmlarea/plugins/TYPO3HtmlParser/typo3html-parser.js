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
 * TYPO3HtmlParser Plugin for TYPO3 htmlArea RTE
 */
HTMLArea.TYPO3HtmlParser = Ext.extend(HTMLArea.Plugin, {
	/*
	 * This function gets called by the class constructor
	 */
	configurePlugin: function (editor) {
		this.pageTSConfiguration = this.editorConfiguration.buttons.cleanword;
		this.parseHtmlModulePath = this.pageTSConfiguration.pathParseHtmlModule;
		/*
		 * Registering plugin "About" information
		 */
		var pluginInformation = {
			version		: '1.10',
			developer	: 'Stanislas Rolland',
			developerUrl	: 'http://www.sjbr.ca/',
			copyrightOwner	: 'Stanislas Rolland',
			sponsor		: 'SJBR',
			sponsorUrl	: 'http://www.sjbr.ca/',
			license		: 'GPL'
		};
		this.registerPluginInformation(pluginInformation);
		/*
		 * Registering the (hidden) button
		 */
		var buttonId = 'CleanWord';
		var buttonConfiguration = {
			id		: buttonId,
			tooltip		: this.localize(buttonId + '-Tooltip'),
			action		: 'onButtonPress',
			hide		: true,
			hideInContextMenu: true
		};
		this.registerButton(buttonConfiguration);
	},
	/*
	 * This function gets called when the button was pressed.
	 *
	 * @param	object		editor: the editor instance
	 * @param	string		id: the button id or the key
	 *
	 * @return	boolean		false if action is completed
	 */
	onButtonPress: function (editor, id) {
			// Could be a button or its hotkey
		var buttonId = this.translateHotKey(id);
		buttonId = buttonId ? buttonId : id;
		this.clean();
		return false;
	},
	/*
	 * This function gets called when the editor is generated
	 */
	onGenerate: function () {
		this.editor.iframe.mon(Ext.get(Ext.isIE ? this.editor.document.body : this.editor.document.documentElement), 'paste', this.wordCleanHandler, this);
	},
	clean: function() {
		this.editor.inhibitKeyboardInput = true;
		var editor = this.editor;
		if (Ext.isWebKit) {
			editor.getDomNode().cleanAppleStyleSpans(editor.document.body);
		}
		var bookmark = editor.getBookMark().get(editor.getSelection().createRange());
		var url = this.parseHtmlModulePath;
		var content = {
			editorNo : this.editorId,
			content	 : editor.getInnerHTML()
		};
			// Server-based cleaning of pasted content
		this.postData(	url,
				content,
				function (options, success, response) {
					if (success) {
						editor.setHTML(response.responseText);
						editor.getSelection().selectRange(editor.getBookMark().moveTo(bookmark));
					} else {
						this.appendToLog('clean', 'Post request to ' + url + ' failed. Server reported ' + response.status, 'error');
					}
					this.editor.inhibitKeyboardInput = false;
				}
		);
	},
	/*
	 * Handler for paste, dragdrop and drop events
	 */
	wordCleanHandler: function (event) {
		this.clean.defer(50, this);
	}
});
