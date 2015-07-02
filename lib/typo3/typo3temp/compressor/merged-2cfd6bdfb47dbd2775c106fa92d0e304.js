
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


Element.addMethods({
	pngHack: function(element) {
		element = $(element);
		var transparentGifPath = 'clear.gif';

			// If there is valid element, it is an image and the image file ends with png:
		if (Object.isElement(element) && element.tagName === 'IMG' && element.src.endsWith('.png')) {
			var alphaImgSrc = element.src;
			var sizingMethod = 'scale';
			element.src = transparentGifPath;
		}

		if (alphaImgSrc) {
			element.style.filter = 'progid:DXImageTransform.Microsoft.AlphaImageLoader(src="#{alphaImgSrc}",sizingMethod="#{sizingMethod}")'.interpolate(
			{
				alphaImgSrc: alphaImgSrc,
				sizingMethod: sizingMethod
			});
		}

		return element;
	}
});

var IECompatibility = Class.create({

	/**
	 * initializes the compatibility class
	 */
	initialize: function() {
		Event.observe(document, 'dom:loaded', function() {
			$$('input[type="checkbox"]').invoke('addClassName', 'checkbox');
		}.bind(this));

		Event.observe(window, 'load', function() {
			if (Prototype.Browser.IE) {
				var version = parseFloat(navigator.appVersion.split(';')[1].strip().split(' ')[1]);
				if (version === 6) {
					$$('img').each(function(img) {
						img.pngHack();
					});
					$$('#typo3-menu li ul li').each(function(li) {
						li.setStyle({height: '21px'});
					});
				}
			}
		});
	}
});

if (Prototype.Browser.IE) {
	var TYPO3IECompatibilty = new IECompatibility();
}

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

Ext.ns('TYPO3', 'TYPO3.Components');

TYPO3.Components.PageModule = {
	/**
	 * Initialization
	 */
	init: function() {
		this.enableDragDrop();
	},

	/**
	 * This method configures the drag'n'drop behavior in the page module
	 */
	enableDragDrop: function() {
		var overrides = {
			// Called the instance the element is dragged.
			b4StartDrag: function () {
				// Cache the drag element
				if (!this.el) {
					this.el = Ext.get(this.getEl());
				}

				// Add css class to define active state
				this.el.addClass('active-drag');

				// Add css class for the drag shadow
				this.el.child('.t3-page-ce-dragitem').addClass('dragitem-shadow');
				// Hide create new element button
				this.el.child('.t3-icon-document-new').addClass('drag-start');

				// Cache the original XY Coordinates of the element, we'll use this later.
				this.originalXY = this.el.getXY();

				// Hide create new element button
				this.el.findParent('td.t3-page-column', null, true).removeClass('active');

				var dropZones = Ext.select('.t3-page-ce-dropzone');
				var self = this;
				Ext.each(dropZones.elements, function(el) {
					var dropZoneElement = Ext.get(el);
					// Only highlight valid drop targets
					if (dropZoneElement.id != self.el.prev().child('.t3-page-ce-dropzone').id &&
					dropZoneElement.id != self.el.child('.t3-page-ce-dropzone').id) {
						dropZoneElement.addClass('t3-page-ce-dropzone-available');
					}
				});
			},
			// Called when element is dropped not anything other than a dropzone with the same ddgroup
			onInvalidDrop: function () {
				// Set a flag to invoke the animated repair
				this.invalidDrop = true;
			},
			// Called when the drag operation completes
			endDrag: function () {
				// Invoke the animation if the invalidDrop flag is set to true
				if (this.invalidDrop === true) {
					// Remove the drop invitation
					this.el.removeClass('dropOK');

					// Create the animation configuration object
					var animCfgObj = {
						easing:'easeOut',
						duration:0.3,
						scope:this,
						callback: function () {
							// Remove the position attribute
							this.el.dom.style.position = '';
						}
					};

					// Apply the repair animation
					this.el.moveTo(this.originalXY[0], this.originalXY[1], animCfgObj);
					delete this.invalidDrop;
				}

				var dropZones = Ext.select('.t3-page-ce-dropzone');
				Ext.each(dropZones.elements, function(el) {
					Ext.get(el).removeClass('t3-page-ce-dropzone-available');
				});

				// Remove css class to define inactive state
				this.el.removeClass('active-drag');
				// Remove dragitem-shadow after dragging
				this.el.child('.t3-page-ce-dragitem').removeClass('dragitem-shadow');
				// Show create new element button again
				this.el.child('.t3-icon-document-new').removeClass('drag-start');
			},

			// Called upon successful drop of an element on a DDTarget with the same
			onDragDrop: function (evtObj, targetElId) {
				// Wrap the drop target element with Ext.Element
				var dropEl = Ext.get(targetElId);

				// Perform the node move only if not dropped on the dropzone directly above
				// this element
				if (this.el.prev().child('.t3-page-ce-dropzone').id != targetElId &&
						targetElId != this.el.child('.t3-page-ce-dropzone').id) {

					// Remove the drag invitation
					this.onDragOut(evtObj, targetElId);

					// Add height to drop zone
					var oldHeight = dropEl.getHeight();
					var elementNewY = dropEl.getY() + dropEl.getHeight();
					dropEl.setHeight(dropEl.getHeight() + this.el.getHeight(), true);

					// Create the animation configuration object
					var animCfgObj = {
						easing: 'easeOut',
						duration: 0.3,
						scope: this,
						callback: function () {

							// restore dropzone height
							// animation is necessary to let it work.
							dropEl.setHeight(oldHeight, {duration: 0.1});

							// Move the element
							dropEl.parent().insertSibling(this.el, 'after');

							// Clear the styles
							this.el.dom.style.position = '';
							this.el.dom.style.top = '';
							this.el.dom.style.left = '';
						}
					};

					// Animate to new position
					this.el.moveTo(dropEl.getX(), elementNewY, animCfgObj);

					// Show create new element button again
					dropEl.findParent('td.t3-page-column', null, true).addClass('active');

					// Try to save changes to the backend
					// There is no feedback from the server side functions, just hope for the best
					TYPO3.Components.DragAndDrop.CommandController.moveContentElement(
						this.el.id,
						targetElId,
						dropEl.parent().id,
						this
					);

				} else {
					// This was an invalid drop, initiate a repair
					this.onInvalidDrop();
				}
			},
			// Only called when the drag element is dragged over the a drop target with the same ddgroup
			onDragEnter: function (evtObj, targetElId) {
				// Perform the node move only if not dropped on the dropzone directly above
				// this element
				if (targetElId != this.el.prev().child('.t3-page-ce-dropzone').id &&
						targetElId != this.el.child('.t3-page-ce-dropzone').id) {
					this.el.addClass('dropOK');
					Ext.get(targetElId).addClass('dropReceiveOK');
				} else {
					// Remove the invitation
					this.onDragOut();
				}
			},
			// Only called when element is dragged out of a dropzone with the same ddgroup
			onDragOut: function (evtObj, targetElId) {
				this.el.removeClass('dropOK');
				if (targetElId) {
					Ext.get(targetElId).removeClass('dropReceiveOK');
				}
			},

			/**
			 * Evaluates a response from an ext direct call and shows a flash message
			 * if it was an exceptional result
			 *
			 * @param {Object} response
			 * @return {Boolean}
			 */
			evaluateResponse: function (response) {
				if (response.success === false) {
					TYPO3.Flashmessage.display(4, 'Exception', response.message);
					return false;
				}

				return true;
			}
		};

		var contentElements = Ext.select('.t3-page-ce');
		Ext.each(contentElements.elements, function (el) {
			if (Ext.DomQuery.is(el, 'div:has(.t3-page-ce-dragitem)')) {
				var dd = new Ext.dd.DD(el, 'ceDDgroup', {
					isTarget : false
				});
				// Apply overrides to newly created instance
				Ext.apply(dd, overrides);
			}
		});

		// Find dropzones and add them to the group
		var dropZones = Ext.select('.t3-page-ce-dropzone');
		Ext.each(dropZones.elements, function(el) {
			var dropTarget = new Ext.dd.DDTarget(el, 'ceDDgroup');
		});
	}
}

Ext.onReady(function() {
	TYPO3.Components.PageModule.init();
});
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
 * Javascript functions regarding the clickmenu
 * relies on the javascript library "prototype"
 */

/**
 * new clickmenu code to make an AJAX call and render the
 * AJAX result in a layer next to the mouse cursor
 */
var Clickmenu = {
	clickURL: 'alt_clickmenu.php',
	ajax: true, // \TYPO3\CMS\Backend\Template\DocumentTemplate::isCMLayers
	mousePos: { X: null, Y: null },
	delayClickMenuHide: false,

	/**
	 * main function, called from most clickmenu links
	 * @param	table		table from where info should be fetched
	 * @param	uid		the UID of the item
	 * @param	listFr		list Frame?
	 * @param	enDisItems	Items to disable / enable
	 * @param	backPath	TYPO3 backPath
	 * @param	addParams	additional params
	 * @return	nothing
	 */
	show: function(table, uid, listFr, enDisItems, backPath, addParams) {
		var params = 'table=' + encodeURIComponent(table) +
			'&uid=' + uid +
			'&listFr=' + listFr +
			'&enDisItems=' + enDisItems +
			'&backPath=' + backPath +
			'&addParams=' + addParams;
		this.callURL(params);
	},


	/**
	 * switch function that either makes an AJAX call
	 * or loads the request in the top frame
	 *
	 * @param	params	parameters added to the URL
	 * @return	nothing
	 */
	callURL: function(params) {
		if (this.ajax && Ajax.getTransport()) { // run with AJAX
			params += '&ajax=1';
			var call = new Ajax.Request(this.clickURL, {
				method: 'get',
				parameters: params,
				onComplete: function(xhr) {
					var response = xhr.responseXML;

					if (!response.getElementsByTagName('data')[0]) {
						var res = params.match(/&reloadListFrame=(0|1|2)(&|$)/);
						var reloadListFrame = parseInt(res[1], 0);
						if (reloadListFrame) {
							var doc = reloadListFrame != 2 ? top.content.list_frame : top.content;
							doc.location.reload(true);
						}
						return;
					}
					var menu  = response.getElementsByTagName('data')[0].getElementsByTagName('clickmenu')[0];
					var data  = menu.getElementsByTagName('htmltable')[0].firstChild.data;
					var level = menu.getElementsByTagName('cmlevel')[0].firstChild.data;
					this.populateData(data, level);

				}.bind(this)
			});
		}
	},


	/**
	 * fills the clickmenu with content and displays it correctly
	 * depending on the mouse position
	 * @param	data	the data that will be put in the menu
	 * @param	level	the depth of the clickmenu
	 */
	populateData: function(data, level) {
		if (!$('contentMenu0')) {
			this.addClickmenuItem();
		}
		level = parseInt(level, 10) || 0;
		var obj = $('contentMenu' + level);

		if (obj && (level === 0 || Element.visible('contentMenu' + (level-1)))) {
			obj.innerHTML = data;
			var x = this.mousePos.X;
			var y = this.mousePos.Y;
			var dimsWindow = document.viewport.getDimensions();
			dimsWindow.width = dimsWindow.width-20; // saving margin for scrollbars

			var dims = Element.getDimensions(obj); // dimensions for the clickmenu
			var offset = document.viewport.getScrollOffsets();
			var relative = { X: this.mousePos.X - offset.left, Y: this.mousePos.Y - offset.top };

			// adjusting the Y position of the layer to fit it into the window frame
			// if there is enough space above then put it upwards,
			// otherwise adjust it to the bottom of the window
			if (dimsWindow.height - dims.height < relative.Y) {
				if (relative.Y > dims.height) {
					y -= (dims.height - 10);
				} else {
					y += (dimsWindow.height - dims.height - relative.Y);
				}
			}
			// adjusting the X position like Y above, but align it to the left side of the viewport if it does not fit completely
			if (dimsWindow.width - dims.width < relative.X) {
				if (relative.X > dims.width) {
					x -= (dims.width - 10);
				} else if ((dimsWindow.width - dims.width - relative.X) < offset.left) {
					x = offset.left;
				} else {
					x += (dimsWindow.width - dims.width - relative.X);
				}
			}

			obj.style.left = x + 'px';
			obj.style.top  = y + 'px';
			Element.show(obj);
		}
		if (/MSIE5/.test(navigator.userAgent)) {
			this._toggleSelectorBoxes('hidden');
		}
	},


	/**
	 * event handler function that saves the actual position of the mouse
	 * in the Clickmenu object
	 * @param	event	the event object
	 */
	calcMousePosEvent: function(event) {
		if (!event) {
			event = window.event;
		}
		this.mousePos.X = Event.pointerX(event);
		this.mousePos.Y = Event.pointerY(event);
		this.mouseOutFromMenu('contentMenu0');
		this.mouseOutFromMenu('contentMenu1');
	},


	/**
	 * hides a visible menu if the mouse has moved outside
	 * of the object
	 * @param	obj	the object to hide
	 * @result	nothing
	 */
	mouseOutFromMenu: function(obj) {
		obj = $(obj);
		if (obj && Element.visible(obj) && !Position.within(obj, this.mousePos.X, this.mousePos.Y)) {
			this.hide(obj);
			if (/MSIE5/.test(navigator.userAgent) && obj.id === 'contentMenu0') {
				this._toggleSelectorBoxes('visible');
			}
		} else if (obj && Element.visible(obj)) {
			this.delayClickMenuHide = true;
		}
	},

	/**
	 * hides a clickmenu
	 *
	 * @param	obj	the clickmenu object to hide
	 * @result	nothing
	 */
	hide: function(obj) {
		this.delayClickMenuHide = false;
		window.setTimeout(function() {
			if (!Clickmenu.delayClickMenuHide) {
				Element.hide(obj);
			}
		}, 500);
	},

	/**
	 * hides all clickmenus
	 */
	hideAll: function() {
		this.hide('contentMenu0');
		this.hide('contentMenu1');
	},


	/**
	 * hides / displays all selector boxes in a page, fixes an IE 5 selector problem
	 * originally by Michiel van Leening
	 *
	 * @param	action 	hide (= "hidden") or show (= "visible")
	 * @result	nothing
	 */
	_toggleSelectorBoxes: function(action) {
		for (var i = 0; i < document.forms.length; i++) {
			for (var j = 0; j < document.forms[i].elements.length; j++) {
				if (document.forms[i].elements[j].type == 'select-one') {
					document.forms[i].elements[j].style.visibility = action;
				}
			}
		}
	},


	/**
	 * manipulates the DOM to add the divs needed for clickmenu at the bottom of the <body>-tag
	 *
	 * @return	nothing
	 */
	addClickmenuItem: function() {
		var code = '<div id="contentMenu0" style="display: block;"></div><div id="contentMenu1" style="display: block;"></div>';
		var insert = new Insertion.Bottom(document.getElementsByTagName('body')[0], code);
	}
}

// register mouse movement inside the document
Event.observe(document, 'mousemove', Clickmenu.calcMousePosEvent.bindAsEventListener(Clickmenu), true);


// @deprecated: Deprecated functions since 4.2, here for compatibility, remove in 4.4+
// ## BEGIN ##

// Still used in Core: typo3/alt_clickmenu.php::linkItem()
function showClickmenu_raw(url) {
	var parts = url.split('?');
	if (parts.length === 2) {
		Clickmenu.clickURL = parts[0];
		Clickmenu.callURL(parts[1]);
	} else {
		Clickmenu.callURL(url);
	}
}
function showClickmenu_noajax(url) {
	Clickmenu.ajax = false; showClickmenu_raw(url);
}
function setLayerObj(tableData, cmLevel) {
	Clickmenu.populateData(tableData, cmLevel);
}
function hideEmpty() {
	Clickmenu.hideAll();
	return false;
}
function hideSpecific(level) {
	if (level === 0 || level === 1) {
		Clickmenu.hide('contentMenu'+level);
	}
}
function showHideSelectorBoxes(action) {
	toggleSelectorBoxes(action);
}
// ## END ##

/*
 * This code has been copied from Project_CMS
 * Copyright (c) 2005 by Phillip Berndt (www.pberndt.com)
 *
 * Extended Textarea for IE and Firefox browsers
 * Features:
 *  - Possibility to place tabs in <textarea> elements using a simply <TAB> key
 *  - Auto-indenting of new lines
 *
 * License: GNU General Public License
 */

function checkBrowser() {
	browserName = navigator.appName;
	browserVer = parseInt(navigator.appVersion);

	ok = false;
	if (browserName == "Microsoft Internet Explorer" && browserVer >= 4) {
		ok = true;
	} else if (browserName == "Netscape" && browserVer >= 3) {
		ok = true;
	}

	return ok;
}

	// Automatically change all textarea elements
function changeTextareaElements() {
	if (!checkBrowser()) {
			// Stop unless we're using IE or Netscape (includes Mozilla family)
		return false;
	}

	document.textAreas = document.getElementsByTagName("textarea");

	for (i = 0; i < document.textAreas.length; i++) {
			// Only change if the class parameter contains "enable-tab"
		if (document.textAreas[i].className && document.textAreas[i].className.search(/(^| )enable-tab( |$)/) != -1) {
			document.textAreas[i].textAreaID = i;
			makeAdvancedTextArea(document.textAreas[i]);
		}
	}
}

	// Wait until the document is completely loaded.
	// Set a timeout instead of using the onLoad() event because it could be used by something else already.
window.setTimeout("changeTextareaElements();", 200);

	// Turn textarea elements into "better" ones. Actually this is just adding some lines of JavaScript...
function makeAdvancedTextArea(textArea) {
	if (textArea.tagName.toLowerCase() != "textarea") {
		return false;
	}

		// On attempt to leave the element:
		// Do not leave if this.dontLeave is true
	textArea.onblur = function(e) {
		if (!this.dontLeave) {
			return;
		}
		this.dontLeave = null;
		window.setTimeout("document.textAreas[" + this.textAreaID + "].restoreFocus()", 1);
		return false;
	}

		// Set the focus back to the element and move the cursor to the correct position.
	textArea.restoreFocus = function() {
		this.focus();

		if (this.caretPos) {
			this.caretPos.collapse(false);
			this.caretPos.select();
		}
	}

		// Determine the current cursor position
	textArea.getCursorPos = function() {
		if (this.selectionStart) {
			currPos = this.selectionStart;
		} else if (this.caretPos) {	// This is very tricky in IE :-(
			oldText = this.caretPos.text;
			finder = "--getcurrpos" + Math.round(Math.random() * 10000) + "--";
			this.caretPos.text += finder;
			currPos = this.value.indexOf(finder);

			this.caretPos.moveStart('character', -finder.length);
			this.caretPos.text = "";

			this.caretPos.scrollIntoView(true);
		} else {
			return;
		}

		return currPos;
	}

		// On tab, insert a tabulator. Otherwise, check if a slash (/) was pressed.
	textArea.onkeydown = function(e) {
		if (this.selectionStart == null &! this.createTextRange) {
			return;
		}
		if (!e) {
			e = window.event;
		}

			// Tabulator
		if (e.keyCode == 9) {
			this.dontLeave = true;
			this.textInsert(String.fromCharCode(9));
		}

			// Newline
		if (e.keyCode == 13) {
				// Get the cursor position
			currPos = this.getCursorPos();

				// Search the last line
			lastLine = "";
			for (i = currPos - 1; i >= 0; i--) {
				if(this.value.substring(i, i + 1) == '\n') {
					break;
				}
			}
			lastLine = this.value.substring(i + 1, currPos);

				// Search for whitespaces in the current line
			whiteSpace = "";
			for (i = 0; i < lastLine.length; i++) {
				if (lastLine.substring(i, i + 1) == '\t') {
					whiteSpace += "\t";
				} else if (lastLine.substring(i, i + 1) == ' ') {
					whiteSpace += " ";
				} else {
					break;
				}
			}

				// Another ugly IE hack
			if (navigator.appVersion.match(/MSIE/)) {
				whiteSpace = "\\n" + whiteSpace;
			}

				// Insert whitespaces
			window.setTimeout("document.textAreas["+this.textAreaID+"].textInsert(\""+whiteSpace+"\");", 1);
		}
	}

		// Save the current cursor position in IE
	textArea.onkeyup = textArea.onclick = textArea.onselect = function(e) {
		if (this.createTextRange) {
			this.caretPos = document.selection.createRange().duplicate();
		}
	}

		// Insert text at the current cursor position
	textArea.textInsert = function(insertText) {
		if (this.selectionStart != null) {
			var savedScrollTop = this.scrollTop;
			var begin = this.selectionStart;
			var end = this.selectionEnd;
			if (end > begin + 1) {
				this.value = this.value.substr(0, begin) + insertText + this.value.substr(end);
			} else {
				this.value = this.value.substr(0, begin) + insertText + this.value.substr(begin);
			}

			this.selectionStart = begin + insertText.length;
			this.selectionEnd = begin + insertText.length;
			this.scrollTop = savedScrollTop;
		} else if (this.caretPos) {
			this.caretPos.text = insertText;
			this.caretPos.scrollIntoView(true);
		} else {
			text.value += insertText;
		}

		this.focus();
	}
}
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

Ext.ns('TYPO3', 'TYPO3.CSH.ExtDirect');

/**
 * Class to show tooltips for links that have the css t3-help-link
 * need the tags data-table and data-field (HTML5)
 */


TYPO3.ContextHelp = function() {

	/**
	 * Cache for CSH
	 * @type {Ext.util.MixedCollection}
	 */
	var cshHelp = new Ext.util.MixedCollection(true),
	tip;

	/**
	 * Shows the tooltip, triggered from mouseover event handler
	 *
	 */
	function showToolTipHelp() {
		var link = tip.triggerElement;
		if (!link) {
			return false;
		}
		var table = link.getAttribute('data-table');
		var field = link.getAttribute('data-field');
		var key = table + '.' + field;
		var response = cshHelp.key(key);
		tip.target = tip.triggerElement;
		if (response) {
			updateTip(response);
		} else {
				// If a table is defined, use ExtDirect call to get the tooltip's content
			if (table) {
				var description = '';
				if (typeof(top.TYPO3.LLL) !== 'undefined') {
					description = top.TYPO3.LLL.core.csh_tooltip_loading;
				} else if (opener && typeof(opener.top.TYPO3.LLL) !== 'undefined') {
					description = opener.top.TYPO3.LLL.core.csh_tooltip_loading;
				}

					// Clear old tooltip contents
				updateTip({
					description: description,
					cshLink: '',
					moreInfo: '',
					title: ''
				});
					// Load content
				TYPO3.CSH.ExtDirect.getTableContextHelp(table, function(response, options) {
					Ext.iterate(response, function(key, value){
						cshHelp.add(value);
						if (key === field) {
							updateTip(value);
								// Need to re-position because the height may have increased
							tip.show();
						}
					});
				}, this);

				// No table was given, use directly title and description
			} else {
				updateTip({
					description: link.getAttribute('data-description'),
					cshLink: '',
					moreInfo: '',
					title: link.getAttribute('data-title')
				});
			}
		}
	}

	/**
	 * Update tooltip message
	 *
	 * @param {Object} response
	 */
	function updateTip(response) {
		tip.body.dom.innerHTML = response.description;
		tip.cshLink = response.id;
		tip.moreInfo = response.moreInfo;
		if (tip.moreInfo) {
			tip.addClass('tipIsLinked');
		}
		tip.setTitle(response.title);
		tip.doAutoWidth();
	}

	return {
		/**
		 * Constructor
		 */
		init: function() {
			tip = new Ext.ToolTip({
				title: 'CSH', // needs a title for init because of the markup
				html: '',
					// The tooltip will appear above the label, if viewport allows
				anchor: 'bottom',
				minWidth: 160,
				maxWidth: 240,
				target: Ext.getBody(),
				delegate: 'span.t3-help-link',
				renderTo: Ext.getBody(),
				cls: 'typo3-csh-tooltip',
				shadow: false,
				dismissDelay: 0, // tooltip stays while mouse is over target
				autoHide: true,
				showDelay: 1000, // show after 1 second
				hideDelay: 300, // hide after 0.3 seconds
				closable: true,
				isMouseOver: false,
				listeners: {
					beforeshow: showToolTipHelp,
					render: function(tip) {
						tip.body.on({
							'click': {
								fn: function(event) {
									event.stopEvent();
									if (tip.moreInfo) {
										try {
											top.TYPO3.ContextHelpWindow.open(tip.cshLink);
										} catch(e) {
											// do nothing
										}
									}
									tip.hide();
								}
							}
						});
						tip.el.on({
							'mouseover': {
								fn: function() {
									if (tip.moreInfo) {
										tip.isMouseOver = true;
									}
								}
							},
							'mouseout': {
								fn: function() {
									if (tip.moreInfo) {
										tip.isMouseOver = false;
										tip.hide.defer(tip.hideDelay, tip, []);
									}
								}
							}
						});
					},
					hide: function(tip) {
						tip.setTitle('');
						tip.body.dom.innerHTML = '';
					},
					beforehide: function(tip) {
						return !tip.isMouseOver;
					},
					scope: this
				}
			});

			Ext.getBody().on({
				'keydown': {
					fn: function() {
						tip.hide();
					}
				},
				'click': {
					fn: function() {
						tip.hide();
					}
				}
			});

			/**
			 * Adds a sequence to Ext.TooltTip::showAt so as to increase vertical offset when anchor position is 'bottom'
			 * This positions the tip box closer to the target element when the anchor is on the bottom side of the box
			 * When anchor position is 'top' or 'bottom', the anchor is pushed slightly to the left in order to align with the help icon, if any
			 *
			 */
			Ext.ToolTip.prototype.showAt = Ext.ToolTip.prototype.showAt.createSequence(
				function() {
					var ap = this.getAnchorPosition().charAt(0);
					if (this.anchorToTarget && !this.trackMouse) {
						switch (ap) {
							case 'b':
								var xy = this.getPosition();
								this.setPagePosition(xy[0]-10, xy[1]+5);
								break;
							case 't':
								var xy = this.getPosition();
								this.setPagePosition(xy[0]-10, xy[1]);
								break;
						}
					}
				}
			);

		},

		/**
		 * Opens the help window, triggered from click event handler
		 *
		 * @param {Event} event
		 * @param {Node} link
		 */
		openHelpWindow: function(event, link) {
			var id = link.getAttribute('data-table') + '.' + link.getAttribute('data-field');
			event.stopEvent();
			top.TYPO3.ContextHelpWindow.open(id);
		}
	}
}();

/**
 * Calls the init on Ext.onReady
 */
Ext.onReady(TYPO3.ContextHelp.init, TYPO3.ContextHelp);

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
 * Flashmessage rendered by ExtJS
 *
 *
 * @author Steffen Kamper <info@sk-typo3.de>
 */
Ext.ns('TYPO3');

/**
 * Object for named severities
 */
TYPO3.Severity = {
	notice: 0,
	information: 1,
	ok: 2,
	warning: 3,
	error: 4
};

/**
 * @class TYPO3.Flashmessage
 * Passive popup box singleton
 * @singleton
 *
 * Example (Information message):
 * TYPO3.Flashmessage.display(1, 'TYPO3 Backend - Version 4.4', 'Ready for take off', 3);
 */
TYPO3.Flashmessage = function() {
	var messageContainer;
	var severities = ['notice', 'information', 'ok', 'warning', 'error'];

	function createBox(severity, title, message) {
		return ['<div class="typo3-message message-', severity, '" style="width: 400px">',
				'<div class="t3-icon t3-icon-actions t3-icon-actions-message t3-icon-actions-message-close t3-icon-message-' + severity + '-close"></div>',
				'<div class="header-container">',
				'<div class="message-header">', title, '</div>',
				'</div>',
				'<div class="message-body">', message, '</div>',
				'</div>'].join('');
	}

	return {
		/**
		 * Shows popup
		 * @member TYPO3.Flashmessage
		 * @param int severity (0=notice, 1=information, 2=ok, 3=warning, 4=error)
		 * @param string title
		 * @param string message
		 * @param float duration in sec (default 5)
		 */
		display : function(severity, title, message, duration) {
			duration = duration || 5;
			if (!messageContainer) {
				messageContainer = Ext.DomHelper.insertFirst(document.body, {
					id   : 'msg-div',
					style: 'position:absolute;z-index:10000'
				}, true);
			}

			var box = Ext.DomHelper.append(messageContainer, {
				html: createBox(severities[severity], title, message)
			}, true);
			messageContainer.alignTo(document, 't-t');
			box.child('.t3-icon-actions-message-close').on('click',	function (e, t, o) {
				var node;
				node = new Ext.Element(Ext.get(t).findParent('div.typo3-message'));
				node.hide();
				Ext.removeNode(node.dom);
			}, box);
			box.slideIn('t').pause(duration).ghost('t', {remove: true});
		}
	};
}();
