/*!
 * Blocks by Pixel & Tonic
 *
 * @package   Cloud
 * @author    Pixel & Tonic, Inc.
 * @copyright Copyright (c) 2012, Pixel & Tonic, Inc.
 * @license   http://blockscms.com/license1.0.html Blocks License
 * @link      http://blockscms.com
 */
(function(a){a(".bucket-select select").change(function(){a(".url-prefix").val(a(".bucket-select select option:selected").attr("data-url-prefix"));a(".bucket-location").val(a(".bucket-select select option:selected").attr("data-location"))});a(".refresh-buckets").click(function(){if(a(this).hasClass("disabled")){return}a(this).addClass("disabled");var b={keyId:a(".s3-key-id").val(),secret:a(".s3-secret-key").val()};a.post(Blocks.actionUrl+"/assetSources/getS3Buckets",b,a.proxy(function(c){a(this).removeClass("disabled");if(c.error){alert(c.error);return}if(c.length>0){var e=a(".bucket-select select").prop("disabled",false);var f=e.val();e.empty();for(var d=0;d<c.length;d++){e.append('<option value="'+c[d].bucket+'" data-url-prefix="'+c[d].url_prefix+'" data-location="'+c[d].location+'">'+c[d].bucket+"</option>")}e.val(f)}},this))})})(jQuery);