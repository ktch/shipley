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

var EmailSettingsForm = Blocks.Base.extend({

	$form: null,
	$protocolField: null,
	$protocolSelect: null,
	$hiddenFields: null,
	$testBtn: null,
	$testSpinner: null,
	$protocolSettingsPane: null,
	$protocolSettingsPaneHead: null,
	$protocolSettingsPaneBody: null,
	protocol: null,

	init: function()
	{
		this.$form = $('#settings-form');
		this.$protocolField = $('#protocol-field');
		this.$protocolSelect = $('#protocol');
		this.$hiddenFields = $('#hidden-fields');
		this.$testBtn = $('#test');
		this.$testSpinner = $('#test-spinner');

		this._onEmailTypeChange();
		this.addListener(this.$protocolSelect, 'change', '_onEmailTypeChange');
		this.addListener(this.$testBtn, 'activate', 'sendTestEmail');
	},

	getField: function(fieldIndex)
	{
		return $('#'+EmailSettingsForm.protocolFields[this.protocol][fieldIndex]+'-field');
	},

	_onEmailTypeChange: function()
	{
		if (this.protocol && this.protocol in EmailSettingsForm.protocolFields)
		{
			// Detach the old fields
			for (var i = 0; i < EmailSettingsForm.protocolFields[this.protocol].length; i++)
			{
				this.getField(i).appendTo(this.$hiddenFields);
			}
		}

		this.protocol = this.$protocolSelect.val();

		if (this.protocol in EmailSettingsForm.protocolFields)
		{
			// Attach the new fields
			var $lastField = this.$protocolField;
			for (var j = 0; j < EmailSettingsForm.protocolFields[this.protocol].length; j++)
			{
				var $field = this.getField(j);
				$field.insertAfter($lastField);
				$lastField = $field;
			}
		}
	},

	sendTestEmail: function()
	{
		if (this.$testBtn.hasClass('active')) return;

		this.$testBtn.addClass('active');
		this.$testSpinner.removeClass('hidden');

		var data = Blocks.getPostData(this.$form);
		delete data.action;

		Blocks.postActionRequest('systemSettings/testEmailSettings', data, $.proxy(function(response) {
			this.$testBtn.removeClass('active');
			this.$testSpinner.addClass('hidden');

			if (response.success)
			{
				alert(Blocks.t('Email sent successfully! Check your inbox.'));
			}
			else
			{
				var error = response.error || Blocks.t('An unknown error occurred.');
				alert(error);
			}
		}, this));
	}

}, {
	protocolFields: {
		smtp:  ['host', 'port', 'smtpKeepAlive', 'smtpAuth', 'smtpAuthCredentials', 'smtpSecureTransportType', 'timeout'],
		pop:   ['username', 'password', 'host', 'port', 'timeout'],
		gmail: ['username', 'password']
	}
});

Blocks.emailSettingsForm = new EmailSettingsForm();

})(jQuery);
