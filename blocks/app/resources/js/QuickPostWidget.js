/*!
 * Blocks by Pixel & Tonic
 *
 * @package   Blocks
 * @author    Pixel & Tonic, Inc.
 * @copyright Copyright (c) 2012, Pixel & Tonic, Inc.
 * @license   http://blockscms.com/license1.0.html Blocks License
 * @link      http://blockscms.com
 */

(function($) {


Blocks.QuickPostWidget = Blocks.Base.extend({

	params: null,
	initBlocks: null,
	$widget: null,
	$form: null,
	$formClone: null,
	$spinner: null,
	$errorList: null,
	loading: false,

	init: function(widgetId, params, initBlocks)
	{
		this.params = params;
		this.initBlocks = initBlocks;
		this.$widget = $('#widget'+widgetId);
		this.$form = this.$widget.find('form:first');
		this.$spinner = this.$form.find('.spinner');

		this.$formClone = this.$form.clone();

		this.initForm();
	},

	initForm: function()
	{
		this.addListener(this.$form, 'submit', 'onSubmit');
		this.initBlocks();
	},

	onSubmit: function(event)
	{
		event.preventDefault();

		if (this.loading) return;
		this.loading = true;
		this.$spinner.removeClass('hidden');

		var formData = Blocks.getPostData(this.$form),
			data = $.extend({ enabled: 1 }, formData, this.params);

		Blocks.postActionRequest('entries/saveEntry', data, $.proxy(function(response) {
			if (this.$errorList)
			{
				this.$errorList.children().remove();
			}

			if (response.success)
			{
				Blocks.cp.displayNotice(Blocks.t('Entry saved.'));

				// Reset the widget
				var $newForm = this.$formClone.clone();
				this.$form.replaceWith($newForm);
				this.$form = $newForm;
				this.initForm();

				// Are there any Recent Entries widgets to notify?
				if (typeof Blocks.RecentEntriesWidget != 'undefined')
				{
					for (var i = 0; i < Blocks.RecentEntriesWidget.instances.length; i++)
					{
						var widget = Blocks.RecentEntriesWidget.instances[i];
						if (!widget.params.sectionId || widget.params.sectionId == this.params.sectionId)
						{
							widget.addEntry({
								url:      response.cpEditUrl,
								title:    response.entry.title,
								postDate: response.entry.postDate.date.substr(0, 10),
								username: response.author.username
							});
						}
					}
				}
			}
			else
			{
				Blocks.cp.displayError(Blocks.t('Couldn’t save entry.'));

				if (response.errors)
				{
					if (!this.$errorList)
					{
						this.$errorList = $('<ul class="errors"/>').insertAfter(this.$form);
					}

					for (var attribute in response.errors)
					{
						for (var i = 0; i < response.errors[attribute].length; i++)
						{
							var error = response.errors[attribute][i];
							$('<li>'+error+'</li>').appendTo(this.$errorList);
						}
					}
				}
			}

			this.loading = false;
			this.$spinner.addClass('hidden');
		}, this));
	}
});


})(jQuery);
