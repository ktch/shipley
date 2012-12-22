/*!
 * Blocks by Pixel & Tonic
 *
 * @package   Blocks
 * @author    Pixel & Tonic, Inc.
 * @copyright Copyright (c) 2012, Pixel & Tonic, Inc.
 * @license   http://blockscms.com/license1.0.html Blocks License
 * @link      http://blockscms.com
 */
(function(a){a(document).ready(function(){var f=a("#status"),e,h,g=-1;function d(j){f.addClass("error");f.html(j)}function c(j){f.addClass("success");f.html(j)}if(!updateHandle){d(Blocks.t("Unable to determine what to update."));return}function i(){var j={handle:updateHandle};Blocks.postActionRequest("update/getUpdates",j,function(k){if(k.success){if(k.updateInfo){e=k.updateInfo;h=e.length;b()}else{c(Blocks.t("You’re already up-to-date."))}}else{var l=(j.error||Blocks.t("An unknown error occurred."));d(l)}})}function b(){g++;f.html("Updating "+e[g].name+" to version "+e[g].version+" ("+g+" of "+h+")");var j={handle:e[g].handle};Blocks.postActionRequest("update/runAutoUpdate",j,function(k,l){if(!k||l!="success"){d(Blocks.t("An unknown error occurred while updating {name}.",{name:e[g].name}));return}if(k.error){d(k.error);return}if(g==h-1){c(Blocks.t("All done!"));setTimeout(function(){window.location=Blocks.getUrl("dashboard")},500);return}b()},function(k,m,l){d(Blocks.t("An unknown error occurred while updating {name}.",{name:e[g].name}));return})}i()})})(jQuery);