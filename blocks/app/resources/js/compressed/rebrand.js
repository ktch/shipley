/*!
 * Blocks by Pixel & Tonic
 *
 * @package   Rebrand
 * @author    Pixel & Tonic, Inc.
 * @copyright Copyright (c) 2012, Pixel & Tonic, Inc.
 * @license   http://blockscms.com/license1.0.html Blocks License
 * @link      http://blockscms.com
 */
(function(d){var c=null;var b={modalClass:"logo-modal",uploadAction:"rebrand/uploadLogo",deleteMessage:Blocks.t("Are you sure you want to delete the logo?"),deleteAction:"rebrand/deleteLogo",cropAction:"rebrand/cropLogo",areaToolOptions:{aspectRatio:"",initialRectangle:{mode:"auto"}},onImageSave:function(f){e(f)},onImageDelete:function(f){e(f)}};function e(f){if(typeof f.html!="undefined"){d(".cp-logo").replaceWith(f.html);a()}}function a(){b.uploadButton=d(".logo-controls .upload-logo");b.deleteButton=d(".logo-controls .delete-logo");c=new Blocks.ui.ImageUpload(b)}a()})(jQuery);