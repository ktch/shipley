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


var CP = Blocks.Base.extend({

	$notificationContainer: null,
	$notifications: null,

	init: function()
	{
		// Fade the notification out in two seconds
		this.$notificationContainer = $('#notifications');
		this.$notifications = this.$notificationContainer.children();
		this.$notifications.delay(CP.notificationDuration).fadeOut();

		// Tabs
		var $tabContainer = $('#tabs');
		if ($tabContainer.length)
		{
			var $tabs = $tabContainer.find('a');
				var $activeTab = $tabs.filter('.active:first');

			$tabs.click(function() {
				var $tab = $(this);
				if (this != $activeTab[0])
				{
					var newTarget = $tab.attr('data-target');
					if (newTarget)
					{
						$activeTab.removeClass('active');
						var oldTarget = $activeTab.attr('data-target');

						$activeTab = $tab;
						$activeTab.addClass('active');

						if (newTarget)
						{
							$('#'+newTarget).removeClass('hidden');
						}

						if (oldTarget)
						{
							$('#'+oldTarget).addClass('hidden');
						}
					}
				}
			});
		};

		// Secondary form submit buttons
		$('.formsubmit').click(function() {
			var $btn = $(this),
				$form = $btn.closest('form');

			if ($btn.attr('data-action'))
			{
				$('<input type="hidden" name="action" value="'+$btn.attr('data-action')+'"/>').appendTo($form);
			}

			if ($btn.attr('data-redirect'))
			{
				$('<input type="hidden" name="redirect" value="'+$btn.attr('data-redirect')+'"/>').appendTo($form);
			}

			$form.submit();
		});
	},

	/**
	 * Dispays a notification.
	 *
	 * @param string type
	 * @param string message
	 */
	displayNotification: function(type, message)
	{
		$('<div class="notification '+type+'">'+message+'</div>')
			.appendTo(this.$notificationContainer)
			.fadeIn('fast')
			.delay(CP.notificationDuration)
			.fadeOut();
	},

	/**
	 * Displays a notice.
	 *
	 * @param string message
	 */
	displayNotice: function(message)
	{
		this.displayNotification('notice', message);
	},

	/**
	 * Displays an error.
	 *
	 * @param string message
	 */
	displayError: function(message)
	{
		this.displayNotification('error', message);
	}

}, {
	notificationDuration: 2000
});


Blocks.cp = new CP();


})(jQuery);
