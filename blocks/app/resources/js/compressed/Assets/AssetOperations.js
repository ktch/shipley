/*!
 * Blocks by Pixel & Tonic
 *
 * @package   Blocks
 * @author    Pixel & Tonic, Inc.
 * @copyright Copyright (c) 2012, Pixel & Tonic, Inc.
 * @license   http://blockscms.com/license1.0.html Blocks License
 * @link      http://blockscms.com
 */
(function(c){var b=null;var d=Blocks.Base.extend({$startOperationsButton:null,$sourceMasterCheckbox:null,$sourceCheckboxes:null,$indexCheckbox:null,$sizesCheckbox:null,$sizeMasterCheckbox:null,$sizeCheckboxes:null,$progressBarContainer:null,sessionId:null,queue:null,modal:null,missingFolders:[],init:function(){this.$startOperationsButton=c("#start-operations");this.$sourceMasterCheckbox=c(".assets-sources input[type=checkbox].all");this.$sourceCheckboxes=c(".assets-sources input[type=checkbox]").not(".all");this.$indexCheckbox=c("#do-index");this.$sizesCheckbox=c("#do-sizes");this.$sizeMasterCheckbox=c("#sizes input[type=checkbox].all");this.$sizeCheckboxes=c("#sizes input[type=checkbox]").not(".all");this.$progressBarContainer=c(".operation-progress");this.addListener(this.$startOperationsButton,"click","startOperations")},startOperations:function(){if(this.$startOperationsButton.hasClass("disabled")){return}var g=[];if(this.$sizesCheckbox.prop("checked")){this.$sizeCheckboxes.filter(":checked").each(function(){g.push(c(this).val())})}var h=this.$indexCheckbox.prop("checked");var e=this.$sourceCheckboxes.filter(":checked");if(e.length==0||!(h||g.length)){this.$startOperationsButton.removeClass("disabled");return}var f={doIndexes:Number(h),sizes:g};this.$startOperationsButton.addClass("disabled");this.$sourceMasterCheckbox.prop("disabled",true);this.$sourceCheckboxes.prop("disabled",true);this.$sizeMasterCheckbox.prop("disabled",true);this.$sizeCheckboxes.prop("disabled",true);this.$indexCheckbox.prop("disabled",true);Blocks.postActionRequest("assetOperations/getSessionId",c.proxy(function(j){this.sessionId=j.sessionId;this.missingFolders=[];this.queue=new AjaxQueueManager(10,this.displayIndexingReport,this);this.$progressBarContainer.empty();var i=this;e.each(function(){var k=c('<div class="progress-bar"><label>'+c(this).parent().text()+"</label><span></span></div>").appendTo(i.$progressBarContainer);var l={sourceId:c(this).val(),session:i.sessionId,doIndexes:f.doIndexes,doSizes:f.sizes};i.queue.addItem(Blocks.getActionUrl("assetOperations/startIndex"),l,c.proxy(function(o){k.attr("total",o.total).attr("current",0);for(var n=0;n<o.total;n++){l={session:this.sessionId,sourceId:o.sourceId,offset:n,doIndexes:f.doIndexes,doSizes:f.sizes};this.queue.addItem(Blocks.getActionUrl("assetOperations/performIndex"),l,function(){k.attr("current",parseInt(k.attr("current"),10)+1);k.find(">span").html(k.attr("current")+" / "+k.attr("total"))})}if(typeof o.missingFolders!="undefined"){for(var m in o.missingFolders){this.missingFolders.push({folder_id:m,folder_name:o.missingFolders[m]})}}},i))});this.queue.startQueue()},this))},displayIndexingReport:function(){this.$startOperationsButton.removeClass("disabled");this.$progressBarContainer.html("");if(!this.$indexCheckbox.prop("checked")){this.releaseLock();return}var e=[];this.$sourceCheckboxes.filter(":checked").each(function(){e.push(c(this).val())});if(b==null){b=c('<div class="modal index-report"></div>').addClass().appendTo(Blocks.$body)}if(this.modal==null){this.modal=new Blocks.ui.Modal();this.modal.sessionId=this.sessionId;this.modal.OperationManager=this}var f={sessionId:this.sessionId,command:JSON.stringify({command:"statistics"}),sources:e.join(",")};c.post(Blocks.getActionUrl("assetOperations/finishIndex"),f,c.proxy(function(k){var h="";if(typeof k.files!="undefined"||this.missingFolders.length>0){h+="<p>"+Blocks.t("The following items were found in the database that do not have a physical match.")+"</p>";if(this.missingFolders.length>0){h+='<div class="report-part"><strong>'+Blocks.t("Folders")+"</strong>";for(var g=0;g<this.missingFolders.length;g++){h+='<div><label><input type="checkbox" checked="checked" class="delete_folder" value="'+this.missingFolders[g].folder_id+'" /> '+this.missingFolders[g].folder_name+"</label></div>"}h+="</div>"}if(typeof k.files!="undefined"){h+='<div class="report-part"><strong>'+Blocks.t("Files")+"</strong>";for(var j in k.files){h+='<div><label><input type="checkbox" checked="checked" class="delete_file" value="'+j+'" /> '+k.files[j]+"</label></div>"}h+="</div>"}h+='<footer class="footer"><ul class="right">';h+='<li><input type="button" class="btn cancel" value="'+Blocks.t("Cancel")+'"></li>';h+='<li><input type="button" class="btn submit delete" value="'+Blocks.t("Delete")+'"></li>';h+="</ul></footer>";b.empty().append(h);this.modal.setContainer(b);this.modal.show();this.modal.removeListener(Blocks.ui.Modal.$shade,"click");this.modal.addListener(this.modal.$container.find(".btn.cancel"),"click",function(){this.OperationManager.releaseLock();this.hide()});this.modal.addListener(this.modal.$container.find(".btn.delete"),"click",function(){var m={};m.command="delete";m.folderIds=[];m.fileIds=[];this.$container.find("input.delete_folder:checked").each(function(){m.folderIds.push(c(this).val())});this.$container.find("input.delete_file:checked").each(function(){m.fileIds.push(c(this).val())});var i=[];this.OperationManager.$sourceCheckboxes.filter(":checked").each(function(){i.push(c(this).val())});var l={sessionId:this.sessionId,command:JSON.stringify(m),sources:i.join(",")};c.post(Blocks.getActionUrl("assetOperations/finishIndex"),l,c.proxy(function(n){this.hide();this.OperationManager.releaseLock()},this))})}else{this.releaseLock()}},this))},releaseLock:function(){this.$sourceMasterCheckbox.prop("disabled",false);if(this.$sourceMasterCheckbox.prop("checked")){this.$sourceMasterCheckbox.prop("disabled",false)}else{this.$sourceCheckboxes.prop("disabled",false)}this.$sizeMasterCheckbox.prop("disabled",false);if(this.$sizeMasterCheckbox.prop("checked")){this.$sizeMasterCheckbox.prop("disabled",false)}else{this.$sizeCheckboxes.prop("disabled",false)}this.$indexCheckbox.prop("disabled",false)}});var a=new d()})(jQuery);