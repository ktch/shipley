/*!
 * Blocks by Pixel & Tonic
 *
 * @package   PublishPro
 * @author    Pixel & Tonic, Inc.
 * @copyright Copyright (c) 2012, Pixel & Tonic, Inc.
 * @license   http://blockscms.com/license1.0.html Blocks License
 * @link      http://blockscms.com
 */
(function(a){Blocks.ui.SectionAdminTable=Blocks.ui.AdminTable.extend({init:function(){this.base({tableSelector:"#sections",noObjectsSelector:"#nosections",deleteAction:"sections/deleteSection"})},confirmDeleteObject:function(c){var d=c.attr(this.settings.nameAttribute),b=parseInt(c.attr("data-entries"));if(!b){return confirm(Blocks.t(this.settings.confirmDeleteMessage,{name:d}))}else{return confirm(Blocks.t("Are you sure you want to delete “{name}” and its {entries} entries?",{name:d,entries:b}))}return confirm(msg)}})})(jQuery);