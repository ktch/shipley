/*!
 * Blocks by Pixel & Tonic
 *
 * @package   Blocks
 * @author    Pixel & Tonic, Inc.
 * @copyright Copyright (c) 2012, Pixel & Tonic, Inc.
 * @license   http://blockscms.com/license1.0.html Blocks License
 * @link      http://blockscms.com
 */
var b;(function(c){var a=null;if(typeof window.Assets=="undefined"){window.Assets=Blocks.Base.extend({})}Assets.FileManager=Blocks.Base.extend({init:function(d,e){this.$manager=d;this.options=c.extend({},Assets.FileManager.defaultOptions,e);this.$toolbar=c(".toolbar",this.$manager);this.$viewAsThumbsBtn=c("a.thumbs",this.$toolbar);this.$viewAsListBtn=c("a.list",this.$toolbar);this.$upload=c(".buttons .assets-upload",this.$manager);this.$search=c("> .search input.text",this.$toolbar);this.$spinner=c(".temp-spinner",this.$manager);this.$left=c("> .nav",this.$manager);this.$right=c("> .asset-content",this.$manager);this.$status=c("> .asset-status",this.$right);this.$sources=c("> .assets-sources",this.$left);this.$folderContainer=c("> .folder-container",this.$right);this.$uploadProgress=c("> .assets-fm-uploadprogress",this.$manager);this.$uploadProgressBar=c(".assets-fm-pb-bar",this.$uploadProgress);this.modal=null;this.sort="asc";this.requestId=0;this.currentState={view:"thumbs",current_source:null,current_folder:null};this.storageKey="Blocks_Assets_"+this.options.namespace;if(typeof(localStorage)!=="undefined"){if(typeof(localStorage[this.storageKey])=="undefined"){localStorage[this.storageKey]=JSON.stringify(this.currentState)}else{this.currentState=JSON.parse(localStorage[this.storageKey])}}this.storeState=function(f,g){this.currentState[f]=g;if(typeof(localStorage)!=="undefined"){localStorage[this.storageKey]=JSON.stringify(this.currentState)}};this.uploader=new qqUploader.FileUploader({element:this.$upload[0],action:Blocks.actionUrl+"/assets/uploadFile",template:'<div class="assets-qq-uploader"><div class="assets-qq-upload-drop-area"></div><a href="" class="btn submit assets-qq-upload-button" data-icon="↑" style="position: relative; overflow: hidden; direction: ltr; ">'+Blocks.t("Upload files")+'</a><ul class="assets-qq-upload-list"></ul></div>',fileTemplate:'<li><span class="assets-qq-upload-file"></span><span class="assets-qq-upload-spinner"></span><span class="assets-qq-upload-size"></span><a class="assets-qq-upload-cancel" href="#">Cancel</a><span class="assets-qq-upload-failed-text">Failed</span></li>',classes:{button:"assets-qq-upload-button",drop:"assets-qq-upload-drop-area",dropActive:"assets-qq-upload-drop-area-active",list:"assets-qq-upload-list",file:"assets-qq-upload-file",spinner:"assets-qq-upload-spinner",size:"assets-qq-upload-size",cancel:"assets-qq-upload-cancel",success:"assets-qq-upload-success",fail:"assets-qq-upload-fail"},onSubmit:c.proxy(this,"_onUploadSubmit"),onProgress:c.proxy(this,"_onUploadProgress"),onComplete:c.proxy(this,"_onUploadComplete")});this.$sources.find("a").click(c.proxy(function(f){this.selectSource(c(f.target))},this));this.$viewAsThumbsBtn.click(c.proxy(function(){this.selectViewType("thumbs");this.markActiveViewButton()},this));this.$viewAsListBtn.click(c.proxy(function(){this.selectViewType("list");this.markActiveViewButton()},this));if(this.currentState.current_source==null){this.storeState("current_source",this.$sources.find("a[data-source]").attr("data-source"))}this.markActiveSource(this.currentState.current_source);this.markActiveViewButton();this.reloadFolderView()},selectViewType:function(d){this.storeState("view",d);this.reloadFolderView()},markActiveViewButton:function(){if(this.currentState.view=="thumbs"){this.$viewAsThumbsBtn.addClass("active");this.$viewAsListBtn.removeClass("active")}else{this.$viewAsThumbsBtn.removeClass("active");this.$viewAsListBtn.addClass("active")}},markActiveSource:function(d){this.$sources.find("a").removeClass("sel");this.$sources.find("a[data-source="+d+"]").addClass("sel")},selectSource:function(d){this.markActiveSource(d.attr("data-source"));this.storeState("current_source",d.attr("data-source"));this.storeState("current_folder",d.attr("data-folder"));this.reloadFolderView();this._setUploadFolder(this.getCurrentFolderId())},reloadFolderView:function(){this.loadFolderView(this.getCurrentFolderId())},loadFolderView:function(d){this.$spinner.show();var e={requestId:++this.requestId,folderId:d,viewType:this.currentState.view};Blocks.postActionRequest("assets/viewFolder",e,c.proxy(function(f,g){this.storeState("current_folder",d);if(f.requestId!=this.requestId){return}this.$folderContainer.attr("data",d);this.$folderContainer.html(f.html);this._setUploadFolder(d);this.$spinner.hide();this.applyFolderBindings()},this))},applyFolderBindings:function(){var d=this;this.$folderContainer.find(".open-file").dblclick(function(){d.$spinner.show();var e={requestId:++d.requestId,fileId:c(this).attr("data-file")};Blocks.postActionRequest("assets/viewFile",e,c.proxy(function(f,g){if(f.requestId!=this.requestId){return}this.$spinner.hide();if(a==null){a=c('<div class="modal view-file"></div>').addClass().appendTo(Blocks.$body)}if(this.modal==null){this.modal=new Blocks.ui.Modal()}a.empty().append(f.headHtml);a.append(f.bodyHtml);a.append(f.footHtml);this.modal.setContainer(a);this.modal.show();this.modal.addListener(Blocks.ui.Modal.$shade,"click",function(){this.hide()});this.modal.addListener(this.modal.$container.find(".btn.cancel"),"click",function(){this.hide()});this.modal.addListener(this.modal.$container.find(".btn.submit"),"click",function(){this.removeListener(Blocks.ui.Modal.$shade,"click");var h=c("form#file-blocks").serialize();Blocks.postActionRequest("assets/saveFile",h,c.proxy(function(i,j){this.hide()},this))})},d))});this.$folderContainer.find(".open-folder").dblclick(function(){d.$spinner.show();d.loadFolderView(c(this).attr("data-folder"))})},getCurrentFolderId:function(){if(this.currentState.current_folder==null||typeof this.currentState.current_folder=="udefined"){this.storeState("current_folder",this.$folderContainer.attr("data-folder"))}if(this.currentState.current_folder==0||this.currentState.current_folder==null){this.storeState("current_folder",this.$sources.find("a[data-source="+this.currentState.current_source+"]").attr("data-folder"))}return this.currentState.current_folder},_setUploadFolder:function(d){this.uploader.setParams({folderId:d})},_setStatus:function(d){this.$status.html(d)},_setUploadStatus:function(){this._setStatus("")},_onUploadSubmit:function(e,d){if(!this.uploader.getInProgress()){this.$spinner.show();this.$uploadProgress.show();this.$uploadProgressBar.width("0%");this._uploadFileProgress={};this._uploadTotalFiles=1;this._uploadedFiles=0}else{this._uploadTotalFiles++}this._uploadFileProgress[e]=0;this._setUploadStatus()},_onUploadProgress:function(g,f,d,e){this._uploadFileProgress[g]=d/e;this._updateProgressBar()},_onUploadComplete:function(f,e,d){this._uploadFileProgress[f]=1;this._updateProgressBar();if(d.success){this._uploadedFiles++;this._setUploadStatus()}if(!this.uploader.getInProgress()){if(this._uploadedFiles){this.reloadFolderView()}else{this._hideProgressBar();this.$spinner.hide()}}},_updateProgressBar:function(){var d=0;for(var f in this._uploadFileProgress){d+=this._uploadFileProgress[f]}var e=Math.round(100*d/this._uploadTotalFiles)+"%";this.$uploadProgressBar.width(e)},_hideProgressBar:function(){this.$uploadProgress.fadeOut(c.proxy(function(){this.$uploadProgress.hide()},this))}});Assets.FileManager.defaultOptions={mode:"full",multiSelect:true,kinds:"any",disabledFiles:[],namespace:"panel"}})(jQuery);