/*!
 * Blocks by Pixel & Tonic
 *
 * @package   Users
 * @author    Pixel & Tonic, Inc.
 * @copyright Copyright (c) 2012, Pixel & Tonic, Inc.
 * @license   http://blockscms.com/license1.0.html Blocks License
 * @link      http://blockscms.com
 */
(function(d){var c=null;var b={postParameters:{userId:d(".user-photo").attr("data-user")},modalClass:"profile-image-modal",uploadAction:"users/uploadUserPhoto",deleteMessage:Blocks.t("Are you sure you want to delete this photo?"),deleteAction:"users/deleteUserPhoto",cropAction:"users/cropUserPhoto",areaToolOptions:{aspectRatio:"1:1",initialRectangle:{mode:"auto"}},onImageSave:function(f){e(f)},onImageDelete:function(f){e(f)}};function e(f){if(typeof f.html!="undefined"){d(".user-photo").replaceWith(f.html);var g=d(".user-photo>.current-photo").css("background-image").replace(/^url\(/,"").replace(/\)$/,"");d("#account-menu").find("img").attr("src",g);a()}}function a(){b.uploadButton=d(".user-photo-controls .upload-photo");b.deleteButton=d(".user-photo-controls .delete-photo");c=new Blocks.ui.ImageUpload(b)}a()})(jQuery);