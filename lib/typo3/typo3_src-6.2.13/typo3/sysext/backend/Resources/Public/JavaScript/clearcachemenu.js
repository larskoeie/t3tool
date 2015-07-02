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
 * class to handle the clear cache menu
 */
var ClearCacheMenu = Class.create({

	/**
	 * registers for resize event listener and executes on DOM ready
	 */
	initialize: function() {

		Ext.onReady(function() {
			var self = this;
			Event.observe(
				window, 'resize',
				function() { TYPO3BackendToolbarManager.positionMenu('clear-cache-actions-menu'); }
			);
			TYPO3BackendToolbarManager.positionMenu('clear-cache-actions-menu');
			this.toolbarItemIcon = $$('#clear-cache-actions-menu .toolbar-item span.t3-icon')[0];

			Event.observe('clear-cache-actions-menu', 'click', this.toggleMenu);

				// observe all clicks on clear cache actions in the menu
			$$('#clear-cache-actions-menu li a').each(function(element) {
				$(element).onclick = function(event) {
					event = event || window.event;
					self.clearCache.call(self, event);
					return false;
				};
			});
		}, this);
	},

	/**
	 * toggles the visibility of the menu and places it under the toolbar icon
	 */
	toggleMenu: function(event) {
		var toolbarItem = $$('#clear-cache-actions-menu > a')[0];
		var menu        = $$('#clear-cache-actions-menu .toolbar-item-menu')[0];
		toolbarItem.blur();

		if (!toolbarItem.hasClassName('toolbar-item-active')) {
			toolbarItem.addClassName('toolbar-item-active');
			Effect.Appear(menu, {duration: 0.2});
			TYPO3BackendToolbarManager.hideOthers(toolbarItem);
		} else {
			toolbarItem.removeClassName('toolbar-item-active');
			Effect.Fade(menu, {duration: 0.1});
		}

		if (event) {
			Event.stop(event);
		}
	},

	/**
	 * calls the actual clear cache URL using an asynchronious HTTP request
	 *
	 * @param	Event	prototype event object
	 */
	clearCache: function(event) {
		var toolbarItemIcon = $$('#clear-cache-actions-menu .toolbar-item span.t3-icon')[0];
		var url             = '';
		var clickedElement  = Event.element(event);

			// activate the spinner
		var parent = Element.up(toolbarItemIcon);
		var spinner = new Element('span').addClassName('spinner');
		var oldIcon = toolbarItemIcon.replace(spinner);

		if (clickedElement.tagName === 'SPAN') {
			link =  clickedElement.up('a');
		} else {
			link =  clickedElement;
		}

		if (link.href) {
			var call = new Ajax.Request(link.href, {
				'method': 'get',
				'onComplete': function(result) {
					spinner.replace(oldIcon);
				}.bind(this)
			});
		}

		this.toggleMenu(event);
	}
});

var TYPO3BackendClearCacheMenu = new ClearCacheMenu();
