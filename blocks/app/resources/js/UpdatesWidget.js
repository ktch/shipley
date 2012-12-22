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


Blocks.UpdatesWidget = Blocks.Base.extend({

	$widget: null,

	init: function(widgetId)
	{
		this.$widget = $('#widget'+widgetId);
		this.$widget.addClass('loading');

		Blocks.postActionRequest('dashboard/checkForUpdates', $.proxy(function(response) {

			this.$widget.removeClass('loading');
			this.$widget.find('.body').html(response);

		}, this));
	}
});


})(jQuery);
