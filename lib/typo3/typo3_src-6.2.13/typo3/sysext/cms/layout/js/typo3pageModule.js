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