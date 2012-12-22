(function(b){var a=null;Blocks.ui.ImageUpload=Blocks.Base.extend({_defaultSettings:{postParameters:{},modalClass:"",uploadButton:{},uploadAction:"",deleteButton:{},deleteMessage:"",deleteAction:"",cropAction:"",areaToolOptions:{aspectRatio:"1:1",initialRectangle:{mode:"auto",x1:0,x2:0,y1:0,y2:0}},onImageDelete:function(c){location.reload()},onImageSave:function(c){location.reload()}},_imageHandler:null,init:function(c){c=b.extend(this._defaultSettings,c);this._imageHandler=new ImageHandler(c)}});ImageHandler=Blocks.Base.extend({modal:null,_settings:null,init:function(e){this._settings=e;var f=this;var d=e.uploadButton;var c={element:this._settings.uploadButton[0],action:Blocks.actionUrl+"/"+this._settings.uploadAction,params:this._settings.postParameters,multiple:false,onComplete:function(g,j,h){if(a==null){a=b('<div class="modal"></div>').addClass(e.modalClass).appendTo(Blocks.$body)}if(h.html){a.empty().append(h.html);if(!this.modal){this.modal=new ImageModal({postParameters:e.postParameters,cropAction:e.cropAction});this.modal.setContainer(a);this.modal.imageHandler=f}var i=this.modal;i.bindButtons();i.addListener(i.$saveBtn,"click","saveImage");i.addListener(i.$cancelBtn,"click","cancel");i.show();i.removeListener(Blocks.ui.Modal.$shade,"click");setTimeout(function(){a.find("img").load(function(){var k=new ImageAreaTool(e.areaToolOptions);k.showArea(i)})},1)}},allowedExtensions:["jpg","jpeg","gif","png"],template:'<div class="QqUploader-uploader"><div class="QqUploader-upload-drop-area" style="display: none; "><span></span></div><div class="QqUploader-upload-button" style="position: relative; overflow: hidden; direction: ltr; ">'+d.text()+'<input type="file" name="file" style="position: absolute; right: 0px; top: 0px; font-family: Arial; font-size: 118px; margin: 0px; padding: 0px; cursor: pointer; opacity: 0; "></div><ul class="QqUploader-upload-list"></ul></div>'};c.sizeLimit=Blocks.maxUploadSize;this.uploader=new qqUploader.FileUploader(c);b(e.deleteButton).click(function(){if(confirm(e.deleteMessage)){b(this).parent().append('<div class="blocking-modal"></div>');Blocks.postActionRequest(e.deleteAction,e.postParameters,b.proxy(function(g){f.onImageDelete.apply(f,[g])},this))}})},onImageSave:function(c){this._settings.onImageSave.apply(this,[c])},onImageDelete:function(c){this._settings.onImageDelete.apply(this,[c])}});ImageModal=Blocks.ui.Modal.extend({$container:null,$saveBtn:null,$cancelBtn:null,areaSelect:null,factor:null,source:null,_postParameters:null,_cropAction:"",imageHandler:null,init:function(c){this.base();this._postParameters=c.postParameters;this._cropAction=c.cropAction},bindButtons:function(){this.$saveBtn=this.$container.find(".submit:first");this.$cancelBtn=this.$container.find(".cancel:first")},cancel:function(){this.hide();this.areaSelect.setOptions({remove:true,hide:true,disable:true});this.$container.empty()},saveImage:function(){var c=this.areaSelect.getSelection();var d={x1:Math.round(c.x1/this.factor),x2:Math.round(c.x2/this.factor),y1:Math.round(c.y1/this.factor),y2:Math.round(c.y2/this.factor),source:this.source};d=b.extend(this._postParameters,d);Blocks.postActionRequest(this._cropAction,d,b.proxy(function(e){if(e.error){alert(e.error)}else{this.imageHandler.onImageSave.apply(this.imageHandler,[e])}this.hide();this.$container.empty();this.areaSelect.setOptions({remove:true,hide:true,disable:true})},this));this.areaSelect.setOptions({disable:true});this.removeListener(this.$saveBtn,"click");this.removeListener(this.$cancelBtn,"click");this.$container.find(".crop-image").fadeTo(50,0.5)}});ImageAreaTool=Blocks.Base.extend({$container:null,_settings:null,init:function(c){this.$container=a;this._settings=c},showArea:function(k){var e=this.$container.find("img");var f={aspectRatio:this._settings.aspectRatio,maxWidth:e.width(),maxHeight:e.height(),instance:true,resizable:true,show:true,persistent:true,handles:true,parent:e.parent()};var h=e.imgAreaSelect(f);var d=this._settings.initialRectangle.x1;var c=this._settings.initialRectangle.x2;var j=this._settings.initialRectangle.y1;var i=this._settings.initialRectangle.y2;if(this._settings.initialRectangle.mode=="auto"){var m=this._settings.aspectRatio.split(":");var g=0;var l=0;if(m[0]>m[1]){g=e.width();l=g*m[1]/m[0]}else{if(m[0]>m[1]){l=e.height();g=l*m[0]/m[1]}else{l=g=Math.min(e.width(),e.height())}}d=Math.round((e.width()-g)/2);j=Math.round((e.height()-l)/2);c=d+g;i=j+l}h.setSelection(d,j,c,i);h.update();k.areaSelect=h;k.factor=e.attr("data-factor");k.source=e.attr("src").split("/").pop()}})})(jQuery);