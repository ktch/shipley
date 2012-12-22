/*!
 * Blocks by Pixel & Tonic
 *
 * @package   Blocks
 * @author    Pixel & Tonic, Inc.
 * @copyright Copyright (c) 2012, Pixel & Tonic, Inc.
 * @license   http://blockscms.com/license1.0.html Blocks License
 * @link      http://blockscms.com
 */
(function(a){Blocks.UpdatesWidget=Blocks.Base.extend({$widget:null,init:function(b){this.$widget=a("#widget"+b);this.$widget.addClass("loading");Blocks.postActionRequest("dashboard/checkForUpdates",a.proxy(function(c){this.$widget.removeClass("loading");this.$widget.find(".body").html(c)},this))}})})(jQuery);