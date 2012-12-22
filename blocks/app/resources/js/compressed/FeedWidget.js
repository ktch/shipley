/*!
 * Blocks by Pixel & Tonic
 *
 * @package   Blocks
 * @author    Pixel & Tonic, Inc.
 * @copyright Copyright (c) 2012, Pixel & Tonic, Inc.
 * @license   http://blockscms.com/license1.0.html Blocks License
 * @link      http://blockscms.com
 */
(function(a){Blocks.FeedWidget=Blocks.Base.extend({$widget:null,init:function(d,c,b){this.$widget=a("#widget"+d);this.$widget.addClass("loading");var e={url:c,limit:b};Blocks.postActionRequest("dashboard/getFeedItems",e,a.proxy(function(f){var j=this.$widget.find("td");for(var g=0;g<f.items.length;g++){var h=f.items[g],k=a(j[g]);k.html('<a href="'+h.url+'" target="_blank">'+h.title+'</a> <span class="light nowrap">'+h.date+"</span>")}this.$widget.removeClass("loading")},this))}})})(jQuery);