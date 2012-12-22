/*!
 * Blocks by Pixel & Tonic
 *
 * @package   Blocks
 * @author    Pixel & Tonic, Inc.
 * @copyright Copyright (c) 2012, Pixel & Tonic, Inc.
 * @license   http://blockscms.com/license1.0.html Blocks License
 * @link      http://blockscms.com
 */
(function(a){var b=Blocks.Base.extend({$notificationContainer:null,$notifications:null,init:function(){this.$notificationContainer=a("#notifications");this.$notifications=this.$notificationContainer.children();this.$notifications.delay(b.notificationDuration).fadeOut();var d=a("#tabs");if(d.length){var c=d.find("a");var e=c.filter(".active:first");c.click(function(){var g=a(this);if(this!=e[0]){var h=g.attr("data-target");if(h){e.removeClass("active");var f=e.attr("data-target");e=g;e.addClass("active");if(h){a("#"+h).removeClass("hidden")}if(f){a("#"+f).addClass("hidden")}}}})}a(".formsubmit").click(function(){var g=a(this),f=g.closest("form");if(g.attr("data-action")){a('<input type="hidden" name="action" value="'+g.attr("data-action")+'"/>').appendTo(f)}if(g.attr("data-redirect")){a('<input type="hidden" name="redirect" value="'+g.attr("data-redirect")+'"/>').appendTo(f)}f.submit()})},displayNotification:function(c,d){a('<div class="notification '+c+'">'+d+"</div>").appendTo(this.$notificationContainer).fadeIn("fast").delay(b.notificationDuration).fadeOut()},displayNotice:function(c){this.displayNotification("notice",c)},displayError:function(c){this.displayNotification("error",c)}},{notificationDuration:2000});Blocks.cp=new b()})(jQuery);