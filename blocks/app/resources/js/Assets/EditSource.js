/*!
 * Blocks by Pixel & Tonic
 *
 * @package   Cloud
 * @author    Pixel & Tonic, Inc.
 * @copyright Copyright (c) 2012, Pixel & Tonic, Inc.
 * @license   http://blockscms.com/license1.0.html Blocks License
 * @link      http://blockscms.com
 */

(function($) {

    $('.bucket-select select').change(function () {
        $('.url-prefix').val($('.bucket-select select option:selected').attr('data-url-prefix'));
        $('.bucket-location').val($('.bucket-select select option:selected').attr('data-location'));
    });

    $('.refresh-buckets').click(function () {
        if ($(this).hasClass('disabled')) {
            return;
        }

        $(this).addClass('disabled');
        var params = {
            keyId:  $('.s3-key-id').val(),
            secret: $('.s3-secret-key').val()
        };

        $.post(Blocks.actionUrl + '/assetSources/getS3Buckets', params, $.proxy(function (response) {
            $(this).removeClass('disabled');
            if (response.error)
            {
                alert(response.error);
                return;
            }

            if (response.length > 0)
            {
                var _select = $('.bucket-select select').prop('disabled', false);
                var currentBucket = _select.val();

                _select.empty();

                for (var i = 0; i < response.length; i++)
                {
                    _select.append('<option value="' + response[i].bucket + '" data-url-prefix="' + response[i].url_prefix + '" data-location="' + response[i].location + '">' + response[i].bucket + '</option>');
                }

                _select.val(currentBucket);
            }
        }, this));
    });
})(jQuery);
