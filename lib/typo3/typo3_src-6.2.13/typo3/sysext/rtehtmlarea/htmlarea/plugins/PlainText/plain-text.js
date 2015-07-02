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
/*
 * Paste as Plain Text Plugin for TYPO3 htmlArea RTE
 */
HTMLArea.PlainText = Ext.extend(HTMLArea.Plugin, {
	/*
	 * This function gets called by the class constructor
	 */
	configurePlugin: function (editor) {
		this.buttonsConfiguration = this.editorConfiguration.buttons;
		/*
		 * Registering plugin "About" information
		 */
		var pluginInformation = {
			version		: '1.3',
			developer	: 'Stanislas Rolland',
			developerUrl	: 'http://www.sjbr.ca/',
			copyrightOwner	: 'Stanislas Rolland',
			sponsor		: 'Otto van Bruggen',
			sponsorUrl	: 'http://www.webspinnerij.nl',
			license		: 'GPL'
		};
		this.registerPluginInformation(pluginInformation);
		/*
		 * Registering the buttons
		 */
		Ext.iterate(this.buttonList, function (buttonId, buttonConf) {
			var buttonConfiguration = {
				id		: buttonId,
				tooltip		: this.localize(buttonId + 'Tooltip'),
				iconCls		: 'htmlarea-action-' + buttonConf[1],
				action		: 'onButtonPress',
				dialog		: buttonConf[2]
			};
			if (buttonId == 'PasteToggle' && this.buttonsConfiguration && this.buttonsConfiguration[buttonConf[0]] && this.buttonsConfiguration[buttonConf[0]].hidden) {
				buttonConfiguration.hide = true;
				buttonConfiguration.hideInContextMenu = true;
				buttonConfiguration.hotKey = null;
				this.buttonsConfiguration[buttonConf[0]].hotKey = null;
			}
			this.registerButton(buttonConfiguration);
		}, this);
		return true;
	},
	/*
	 * The list of buttons added by this plugin
	 */
	buttonList: {
		PasteToggle: 	['pastetoggle', 'paste-toggle', false],
		PasteBehaviour:	['pastebehaviour', 'paste-behaviour', true]
	},
	/*
	 * Cleaner configurations
	 */
	cleanerConfig: {
	 	pasteStructure: {
	 	 	keepTags: /^(a|p|h[0-6]|pre|address|article|aside|blockquote|div|footer|header|nav|section|hr|br|table|thead|tbody|tfoot|caption|tr|th|td|ul|ol|dl|li|dt|dd)$/i,
	 	 	removeAttributes: /^(id|on.*|style|class|className|lang|align|valign|bgcolor|color|border|face|.*:.*)$/i
	 	},
		pasteFormat: {
			keepTags: /^(a|p|h[0-6]|pre|address|article|aside|blockquote|div|footer|header|nav|section|hr|br|img|table|thead|tbody|tfoot|caption|tr|th|td|ul|ol|dl|li|dt|dd|b|bdo|big|cite|code|del|dfn|em|i|ins|kbd|label|q|samp|small|strike|strong|sub|sup|tt|u|var)$/i,
			removeAttributes:  /^(id|on.*|style|class|className|lang|align|valign|bgcolor|color|border|face|.*:.*)$/i
	 	}
	},
	/*
	 * This function gets called when the plugin is generated
	 */
	onGenerate: function () {
			// Create cleaners
		if (this.buttonsConfiguration && this.buttonsConfiguration['pastebehaviour']) {
			this.pasteBehaviourConfiguration = this.buttonsConfiguration['pastebehaviour'];
		}
		this.cleaners = {};
		Ext.iterate(this.cleanerConfig, function (behaviour) {
			if (this.pasteBehaviourConfiguration && this.pasteBehaviourConfiguration[behaviour]) {
				if (this.pasteBehaviourConfiguration[behaviour].keepTags) {
					this.cleanerConfig[behaviour].keepTags = new RegExp( '^(' + this.pasteBehaviourConfiguration[behaviour].keepTags.split(',').join('|') + ')$', 'i');
				}
				if (this.pasteBehaviourConfiguration[behaviour].removeAttributes) {
					this.cleanerConfig[behaviour].removeAttributes = new RegExp( '^(' + this.pasteBehaviourConfiguration[behaviour].removeAttributes.split(',').join('|') + ')$', 'i');
				}
			}
			this.cleaners[behaviour] = new HTMLArea.DOM.Walker(this.cleanerConfig[behaviour]);
		}, this);
			// Initial behaviour
		this.currentBehaviour = 'plainText';
			// May be set in TYPO3 User Settings
		if (this.buttonsConfiguration && this.buttonsConfiguration['pastebehaviour'] && this.buttonsConfiguration['pastebehaviour']['current']) {
			this.currentBehaviour = this.buttonsConfiguration['pastebehaviour']['current'];
		}
			// Set the toggle ON, if configured
		if (this.buttonsConfiguration && this.buttonsConfiguration['pastetoggle'] && this.buttonsConfiguration['pastetoggle'].setActiveOnRteOpen) {
			this.toggleButton('PasteToggle');
		}
			// Start monitoring paste events
		this.editor.iframe.mon(Ext.get(Ext.isIE ? this.editor.document.body : this.editor.document.documentElement), 'paste', this.onPaste, this);
	},
	/*
	 * This function toggles the state of a button
	 *
	 * @param	string		buttonId: id of button to be toggled
	 *
	 * @return	void
	 */
	toggleButton: function (buttonId) {
			// Set new state
		var button = this.getButton(buttonId);
		button.setInactive(!button.inactive);
	},
	/*
	 * This function gets called when a button was pressed.
	 *
	 * @param	object		editor: the editor instance
	 * @param	string		id: the button id or the key
	 *
	 * @return	boolean		false if action is completed
	 */
	onButtonPress: function (editor, id, target) {
			// Could be a button or its hotkey
		var buttonId = this.translateHotKey(id);
		buttonId = buttonId ? buttonId : id;
		switch (buttonId) {
			case 'PasteBehaviour':
					// Open dialogue window
				this.openDialogue(
					buttonId,
					'PasteBehaviourTooltip',
					this.getWindowDimensions(
						{
							width: 260,
							height:260
						},
						buttonId
					)
				);
				break;
			case 'PasteToggle':
				this.toggleButton(buttonId);
				this.editor.focus();
				break;
			}
		return false;
	},
	/*
	 * Open the dialogue window
	 *
	 * @param	string		buttonId: the button id
	 * @param	string		title: the window title
	 * @param	object		dimensions: the opening dimensions of the window
	 *
	 * @return	void
	 */
	openDialogue: function (buttonId, title, dimensions) {
		this.dialog = new Ext.Window({
			title: this.localize(title),
			cls: 'htmlarea-window',
			border: false,
			width: dimensions.width,
			height: 'auto',
			iconCls: this.getButton(buttonId).iconCls,
			listeners: {
				close: {
					fn: this.onClose,
					scope: this
				}
			},
			items: [{
					xtype: 'fieldset',
					defaultType: 'radio',
					title: this.getHelpTip('behaviour', title),
					labelWidth: 170,
					defaults: {
						labelSeparator: '',
						name: buttonId
					},
					items: [{
							itemId: 'plainText',
							fieldLabel: this.getHelpTip('plainText', 'plainText'),
							checked: (this.currentBehaviour === 'plainText')
						},{
							itemId: 'pasteStructure',
							fieldLabel: this.getHelpTip('pasteStructure', 'pasteStructure'),
							checked: (this.currentBehaviour === 'pasteStructure')
						},{
							itemId: 'pasteFormat',
							fieldLabel: this.getHelpTip('pasteFormat', 'pasteFormat'),
							checked: (this.currentBehaviour === 'pasteFormat')
						}
					]
				}
			],
			buttons: [
				this.buildButtonConfig('OK', this.onOK)
			]
		});
		this.show();
	},
	/*
	 * Handler invoked when the OK button of the Clean Paste Behaviour window is pressed
	 */
	onOK: function () {
		var fields = [
			'plainText',
			'pasteStructure',
			'pasteFormat'
		];
		Ext.each(fields, function (field) {
			if (this.dialog.find('itemId', field)[0].getValue()) {
				this.currentBehaviour = field;
				return false;
			}
		}, this);
		this.close();
		return false;
	},
	/*
	 * Handler for paste event
	 *
	 * @param	object		event: the paste event
	 *
	 * @return	boolean		false, if the event was handled, true otherwise
	 */
	onPaste: function (event) {
		if (!this.getButton('PasteToggle').inactive) {
			var clipboardText = '';
			switch (this.currentBehaviour) {
				case 'plainText':
					// Let's see if clipboardData can be used for plain text
					clipboardText = this.grabClipboardText(event, 'plain');
					if (clipboardText) {
						// Stop the event
						if (HTMLArea.isIEBeforeIE9) {
							event.browserEvent.returnValue = false;
						} else {
							event.stopEvent();
						}
						this.editor.getSelection().insertHtml(clipboardText);
						return false;
					}
				case 'pasteStructure':
				case 'pasteFormat':
					// Let's see if clipboardData can be used for html text
					clipboardText = this.grabClipboardText(event, 'html');
					if (clipboardText) {
						// Stop the event
						if (HTMLArea.isIEBeforeIE9) {
							event.browserEvent.returnValue = false;
						} else {
							event.stopEvent();
						}
						// Clean content
						this.processClipboardContent(clipboardText);
						return false;
					}
					// Could be IE or WebKit denying access to the clipboard
					if (Ext.isIE || Ext.isWebKit) {
						// Show the pasting pad
						this.openPastingPad(
							'PasteToggle',
							this.currentBehaviour,
							this.getWindowDimensions(
								{
									width:  550,
									height: 550
								},
								'PasteToggle'
							)
						);
						if (HTMLArea.isIEBeforeIE9) {
							event.browserEvent.returnValue = false;
						} else {
							event.stopEvent();
						}
						return false;
					} else {
						// Falling back to old ways...
						// Redirect the paste operation to a hidden section
						this.redirectPaste();
						// Process the content of the hidden section after the paste operation is completed
						this.processPastedContent.defer(50, this);
					}
					break;
				default:
					break;
			}
		}
		return true;
	},

	/**
	 * Grab the text content directly from the clipboard
	 *
	 * @param object event: the paste event
	 * @param string type: type of content to grab 'plain' ot 'html'
	 * @return string clipboard content, if access was granted
	 */
	grabClipboardText: function (event, type) {
		var clipboardText = '',
			browserEvent = event.browserEvent,
			clipboardData = '',
			contentTypes = '';
		if (browserEvent && (browserEvent.clipboardData || window.clipboardData) && (browserEvent.clipboardData || window.clipboardData).getData) {
			var clipboardData = (browserEvent.clipboardData || window.clipboardData);
			var contentTypes = clipboardData.types;
		}
		if (clipboardData) {
			switch (type) {
				case 'plain':
					if (/text\/plain/.test(contentTypes) || Ext.isIE) {
						clipboardText = clipboardData.getData(Ext.isIE ? 'Text' : 'text/plain');
					}
					break;
				case 'html':
					if (contentTypes && Object.prototype.toString.call(contentTypes) === '[object Array]' && contentTypes.length > 0) {
						var i = 0, contentType;
						while (i < contentTypes.length) {
							contentType = contentTypes[i];
							if (/text\/plain|text\/html/.test(contentType)) {
								clipboardText += clipboardData.getData(contentType);
							}
							i++;
						}
					}
					break;
			}
		}
		return clipboardText;
	},

	/**
	 * Redirect the paste operation towards a hidden section
	 *
	 * @return	void
	 */
	redirectPaste: function () {
		// Save the current selection
		this.bookmark = this.editor.getBookMark().get(this.editor.getSelection().createRange());
		// Create and append hidden section
		var hiddenSection = this.createHiddenSection();
		// Move the selection to the hidden section and let the browser paste into the hidden section
		this.editor.getSelection().selectNodeContents(hiddenSection);
	},

	/**
	 * Create an hidden section inside the RTE content
	 *
	 * @return object the hidden section
	 */
	createHiddenSection: function () {
		// Create and append hidden section
		var hiddenSection = this.editor.document.createElement('div');
		HTMLArea.DOM.addClass(hiddenSection, 'htmlarea-paste-hidden-section');
		hiddenSection.setAttribute('style', 'position: absolute; left: -10000px; top: ' + this.editor.document.body.scrollTop + 'px; overflow: hidden;');
		hiddenSection = this.editor.document.body.appendChild(hiddenSection);
		if (Ext.isWebKit) {
			hiddenSection.innerHTML = '&nbsp;';
		}
		return hiddenSection;
	},

	/*
	 * Process the pasted content that was redirected towards a hidden section
	 * and insert it at the original selection
	 *
	 * @return	void
	 */
	processPastedContent: function () {
		this.editor.focus();
			// Get the hidden section
		var divs = this.editor.document.getElementsByClassName('htmlarea-paste-hidden-section');
		var hiddenSection = divs[0];
			// Delete any other hidden sections
		for (var i = divs.length; --i >= 1;) {
			HTMLArea.DOM.removeFromParent(divs[i]);
		}
		var content = '';
		switch (this.currentBehaviour) {
			case 'plainText':
					// Get plain text content
				content = hiddenSection.textContent;
				break;
			case 'pasteStructure':
			case 'pasteFormat':
					// Get clean content
				content = this.cleaners[this.currentBehaviour].render(hiddenSection, false);
				break;
		}
			// Remove the hidden section from the document
		HTMLArea.DOM.removeFromParent(hiddenSection);
			// Restore the selection
		this.editor.getSelection().selectRange(this.editor.getBookMark().moveTo(this.bookmark));
			// Insert the cleaned content
		if (content) {
			this.editor.getSelection().execCommand('insertHTML', false, content);
		}
	},

	/**
	 * Process the content that was grabbed form the clipboard
	 * and insert it at the original selection
	 *
	 * @param string content: html content grabbed form the clipboard
	 * @return void
	 */
	processClipboardContent: function (content) {
		this.editor.focus();
		// Create and append hidden section and insert content
		var hiddenSection = this.createHiddenSection();
		hiddenSection.innerHTML = content.replace(/(<html>)|(<body>)|(<\/html>)|(<\/body>)/gi, '');
		// Get clean content
		var cleanContent = this.cleaners[this.currentBehaviour].render(hiddenSection, false);
		// Remove the hidden section from the document
		HTMLArea.DOM.removeFromParent(hiddenSection);
		// Insert the cleaned content
		if (cleanContent) {
			this.editor.getSelection().execCommand('insertHTML', false, cleanContent);
		}
	},

	/*
	 * Open the pasting pad window (for IE)
	 *
	 * @param	string		buttonId: the button id
	 * @param	string		title: the window title
	 * @param	object		dimensions: the opening dimensions of the window
	 *
	 * @return	void
	 */
	openPastingPad: function (buttonId, title, dimensions) {
		this.dialog = new Ext.Window({
			title: this.getHelpTip(title, title),
			cls: 'htmlarea-window',
			bodyCssClass: 'pasting-pad',
			border: false,
			width: dimensions.width,
			height: 'auto',
			iconCls: this.getButton(buttonId).iconCls,
			listeners: {
				afterrender: {
						// The document will not be immediately ready
					fn: function (event) { this.onPastingPadAfterRender.defer(100, this, [event]); },
					scope: this
				},
				close: {
					fn: this.onClose,
					scope: this
				}
			},
			items: [{
					xtype: 'tbtext',
					text: this.getHelpTip('pasteInPastingPad', 'pasteInPastingPad'),
					style: {
						marginBottom: '5px'
					}
				},{
						// The iframe
					xtype: 'box',
					itemId: 'pasting-pad-iframe',
					autoEl: {
						name: 'contentframe',
						tag: 'iframe',
						cls: 'contentframe',
						src: Ext.isGecko ? 'javascript:void(0);' : HTMLArea.editorUrl + 'popups/blank.html'
					}
				}
			],
			buttons: [
				this.buildButtonConfig('OK', this.onPastingPadOK),
				this.buildButtonConfig('Cancel', this.onCancel)
			]
		});
		// Apparently, IE needs sometime before being able to show the iframe
		this.show.defer(100, this);
	},
	/*
	 * Handler invoked after the pasting pad iframe has been rendered
	 */
	onPastingPadAfterRender: function () {
		var iframe = this.dialog.getComponent('pasting-pad-iframe').getEl().dom;
		this.pastingPadDocument = iframe.contentWindow ? iframe.contentWindow.document : iframe.contentDocument;
		this.pastingPadBody = this.pastingPadDocument.body;
		this.pastingPadBody.contentEditable = true;
		// Start monitoring paste events
		this.dialog.mon(Ext.get(this.pastingPadBody), 'paste', this.onPastingPadPaste, this);
		// Try to keep focus on the pasting pad
		this.dialog.mon(Ext.get(this.editor.document.documentElement), 'mouseover', function (event) { this.focusOnPastingPad(); }, this);
		this.dialog.mon(Ext.get(this.editor.document.body), 'focus', function (event) { this.focusOnPastingPad(); }, this);
		this.dialog.mon(Ext.get(this.pastingPadDocument.documentElement), 'mouseover', function (event) { this.focusOnPastingPad(); }, this);
		this.focusOnPastingPad();
	},
	/*
	 * Bring focus and selection on the pasting pad
	 */
	focusOnPastingPad: function () {
		this.pastingPadBody.focus();
		this.pastingPadDocument.getSelection().selectAllChildren(this.pastingPadBody);
		this.pastingPadDocument.getSelection().collapseToEnd();
	},
	/*
	 * Handler invoked when content is pasted into the pasting pad
	 */
	onPastingPadPaste: function (event) {
			// Let the paste operation complete before cleaning
		this.cleanPastingPadContents.defer(50, this);
	},
	/*
	 * Clean the contents of the pasting pad
	 */
	cleanPastingPadContents: function () {
		var content = '';
		switch (this.currentBehaviour) {
			case 'plainText':
				// Get plain text content
				content = this.pastingPadBody.textContent;
				break;
			case 'pasteStructure':
			case 'pasteFormat':
				// Get clean content
				content = this.cleaners[this.currentBehaviour].render(this.pastingPadBody, false);
				break;
		}
		this.pastingPadBody.innerHTML = content;
		this.pastingPadBody.focus();
	},
	/*
	 * Handler invoked when the OK button of the Pasting Pad window is pressed
	 */
	onPastingPadOK: function () {
	 	 	// Restore the selection
		this.restoreSelection();
			// Insert the cleaned pasting pad content
		this.editor.getSelection().insertHtml(this.pastingPadBody.innerHTML);
		this.close();
		return false;
	},
	/*
	 * This function gets called when the toolbar is updated
	 */
	onUpdateToolbar: function (button, mode, selectionEmpty, ancestors) {
		if (mode === 'wysiwyg' && this.editor.isEditable()) {
			switch (button.itemId) {
				case 'PasteToggle':
					button.setTooltip({
							title: this.localize((button.inactive ? 'enable' : 'disable') + this.currentBehaviour)
					});
					break;
			}
		}
	}
});
