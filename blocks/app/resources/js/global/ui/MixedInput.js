(function($) {


Blocks.ui.MixedInput = Blocks.Base.extend({

	$container: null,
	elements: null,
	focussedElement: null,
	blurTimeout: null,

	init: function(container, settings)
	{
		this.$container = $(container);
		this.setSettings(settings, Blocks.ui.MixedInput.defaults);

		this.elements = [];

		// Allow the container to receive focus
		this.$container.attr('tabindex', 0);
		this.addListener(this.$container, 'focus', 'onFocus');
	},

	getElementIndex: function($elem)
	{
		return $.inArray($elem, this.elements);
	},

	isText: function($elem)
	{
		return ($elem.prop('nodeName') == 'INPUT');
	},

	onFocus: function(event)
	{
		// Set focus to the first element
		if (this.elements.length)
		{
			var $elem = this.elements[0];
			this.setFocus($elem);
			this.setCarotPos($elem, 0);
		}
		else
		{
			this.addTextElement();
		}
	},

	addTextElement: function(index)
	{
		var text = new TextElement(this);
		this.addElement(text.$input, index);
		return text;
	},

	addElement: function($elem, index)
	{
		// Was a target index passed, and is it valid?
		if (typeof index == 'undefined')
		{
			if (this.focussedElement)
			{
				var focussedElement = this.focussedElement,
					focussedElementIndex = this.getElementIndex(focussedElement);

				// Is the focus on a text element?
				if (this.isText(focussedElement))
				{
					var selectionStart = focussedElement.prop('selectionStart'),
						selectionEnd = focussedElement.prop('selectionEnd'),
						val = focussedElement.val(),
						preVal = val.substring(0, selectionStart),
						postVal = val.substr(selectionEnd);

					if (preVal && postVal)
					{
						// Split the input into two
						focussedElement.val(preVal).trigger('change');
						var newText = new TextElement(this);
						newText.$input.val(postVal).trigger('change');
						this.addElement(newText.$input, focussedElementIndex+1);

						// Insert the new element in between them
						index = focussedElementIndex+1;
					}
					else if (!preVal)
					{
						// Insert the new element before this one
						index = focussedElementIndex;
					}
					else
					{
						// Insert it after this one
						index = focussedElementIndex + 1;
					}
				}
				else
				{
					// Just insert the new one after this one
					index = focussedElementIndex + 1;
				}
			}
			else
			{
				// Insert the new element at the end
				index = this.elements.length;
			}
		}

		// Add the element
		if (typeof this.elements[index] != 'undefined')
		{
			$elem.insertBefore(this.elements[index]);
			this.elements.splice(index, 0, $elem);
		}
		else
		{
			// Just for safe measure, set the index to what it really will be
			index = this.elements.length;

			this.$container.append($elem);
			this.elements.push($elem);
		}

		// Make sure that there are text elements surrounding all non-text elements
		if (!this.isText($elem))
		{
			// Add a text element before?
			if (index == 0 || !this.isText(this.elements[index-1]))
			{
				this.addTextElement(index);
				index++;
			}

			// Add a text element after?
			if (index == this.elements.length-1 || !this.isText(this.elements[index+1]))
			{
				this.addTextElement(index+1);
			}
		}

		// Add event listeners
		this.addListener($elem, 'click', function() {
			this.setFocus($elem);
		});

		// Set focus to the new element
		setTimeout($.proxy(function() {
			this.setFocus($elem);
		}, this), 1);
	},

	removeElement: function($elem)
	{
		var index = this.getElementIndex($elem);
		if (index != -1)
		{
			this.elements.splice(index, 1);

			if (!this.isText($elem))
			{
				// Combine the two now-adjacent text elements
				var $prevElem = this.elements[index-1],
					$nextElem = this.elements[index];

				if (this.isText($prevElem) && this.isText($nextElem))
				{
					var prevElemVal = $prevElem.val(),
						newVal = prevElemVal + $nextElem.val();
					$prevElem.val(newVal).trigger('change');
					this.removeElement($nextElem);
					this.setFocus($prevElem);
					this.setCarotPos($prevElem, prevElemVal.length);
				}
			}

			$elem.remove();
		}
	},

	setFocus: function($elem)
	{
		this.$container.addClass('focus');

		if (!this.focussedElement)
		{
			// Prevent the container from receiving focus
			// as long as one of its elements has focus
			this.$container.attr('tabindex', '-1');
		}
		else
		{
			// Blur the previously-focussed element
			this.blurFocussedElement();
		}

		$elem.attr('tabindex', '0');
		$elem.focus();
		this.focussedElement = $elem;

		this.addListener($elem, 'blur', function() {
			this.blurTimeout = setTimeout($.proxy(function() {
				if (this.focussedElement == $elem)
				{
					this.blurFocussedElement();
					this.focussedElement = null;
					this.$container.removeClass('focus');

					// Get ready for future focus
					this.$container.attr('tabindex', '0');
				}
			}, this), 1);
		});
	},

	blurFocussedElement: function()
	{
		this.removeListener(this.focussedElement, 'blur');
		this.focussedElement.attr('tabindex', '-1');
	},

	focusPreviousElement: function($from)
	{
		var index = this.getElementIndex($from);

		if (index > 0)
		{
			var $elem = this.elements[index-1];
			this.setFocus($elem);

			// If it's a text element, put the carot at the end
			if (this.isText($elem))
			{
				var length = $elem.val().length;
				this.setCarotPos($elem, length);
			}
		}
	},

	focusNextElement: function($from)
	{
		var index = this.getElementIndex($from);

		if (index < this.elements.length-1)
		{
			var $elem = this.elements[index+1];
			this.setFocus($elem);

			// If it's a text element, put the carot at the beginning
			if (this.isText($elem))
			{
				this.setCarotPos($elem, 0)
			}
		}
	},

	setCarotPos: function($elem, pos)
	{
		$elem.prop('selectionStart', pos);
		$elem.prop('selectionEnd', pos);
	}

});



var TextElement = Blocks.Base.extend({

	parentInput: null,
	$input: null,
	$stage: null,
	val: null,
	focussed: false,
	interval: null,

	init: function(parentInput)
	{
		this.parentInput = parentInput;

		this.$input = $('<input type="text"/>').appendTo(this.parentInput.$container);
		this.$input.css('margin-right', (2-TextElement.padding)+'px');

		this.setWidth();

		this.addListener(this.$input, 'focus', 'onFocus');
		this.addListener(this.$input, 'blur', 'onBlur');
		this.addListener(this.$input, 'keydown', 'onKeyDown');
		this.addListener(this.$input, 'change', 'checkInput');
	},

	getIndex: function()
	{
		return this.parentInput.getElementIndex(this.$input);
	},

	buildStage: function()
	{
		this.$stage = $('<stage/>').appendTo(Blocks.$body);

		// replicate the textarea's text styles
		this.$stage.css({
			position: 'absolute',
			top: -9999,
			left: -9999,
			wordWrap: 'nowrap'
		});

		Blocks.copyTextStyles(this.$input, this.$stage);
	},

	getTextWidth: function(val)
	{
		if (!this.$stage)
			this.buildStage();

		if (val)
		{
			// Ampersand entities
			val = val.replace(/&/g, '&amp;');

			// < and >
			val = val.replace(/</g, '&lt;');
			val = val.replace(/>/g, '&gt;');

			// Spaces
			val = val.replace(/ /g, '&nbsp;');
		}

		this.$stage.html(val);
		this.stageWidth = this.$stage.width();
		return this.stageWidth;
	},

	onFocus: function()
	{
		this.focussed = true;
		this.interval = setInterval($.proxy(this, 'checkInput'), Blocks.ui.NiceText.interval);
		this.checkInput();
	},

	onBlur: function()
	{
		this.focussed = false;
		clearInterval(this.interval);
		this.checkInput();
	},

	onKeyDown: function(event)
	{
		setTimeout($.proxy(this, 'checkInput'), 1);

		switch (event.keyCode)
		{
			case Blocks.LEFT_KEY:
			{
				if (this.$input.prop('selectionStart') == 0 && this.$input.prop('selectionEnd') == 0)
				{
					// Set focus to the previous element
					this.parentInput.focusPreviousElement(this.$input);
				}
				break;
			}
			case Blocks.RIGHT_KEY:
			{
				if (this.$input.prop('selectionStart') == this.val.length && this.$input.prop('selectionEnd') == this.val.length)
				{
					// Set focus to the next element
					this.parentInput.focusNextElement(this.$input);
				}
				break;
			}
			case Blocks.DELETE_KEY:
			{
				if (this.$input.prop('selectionStart') == 0 && this.$input.prop('selectionEnd') == 0)
				{
					// Set focus to the previous element
					this.parentInput.focusPreviousElement(this.$input);
					event.preventDefault();
				}
			}
		}
	},

	getVal: function()
	{
		this.val = this.$input.val();
		return this.val;
	},

	setVal: function(val)
	{
		this.$input.val(val);
		this.checkInput();
	},

	checkInput: function()
	{
		// Has the value changed?
		var changed = (this.val !== this.getVal());
		if (changed)
		{
			this.setWidth();
			this.onChange();
		}

		return changed;
	},

	setWidth: function()
	{
		// has the width changed?
		if (this.stageWidth !== this.getTextWidth(this.val))
		{
			// update the textarea width
			var width = this.stageWidth + TextElement.padding;
			this.$input.width(width);
		}
	},

	onChange: function() {}

}, {
	padding: 20
});


})(jQuery);
