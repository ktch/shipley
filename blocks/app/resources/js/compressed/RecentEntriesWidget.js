/*!
 * Blocks by Pixel & Tonic
 *
 * @package   Blocks
 * @author    Pixel & Tonic, Inc.
 * @copyright Copyright (c) 2012, Pixel & Tonic, Inc.
 * @license   http://blockscms.com/license1.0.html Blocks License
 * @link      http://blockscms.com
 */
(function(a){Blocks.RecentEntriesWidget=Blocks.Base.extend({params:null,$widget:null,$body:null,$container:null,$tbody:null,hasEntries:null,init:function(b,c){this.params=c;this.$widget=a("#widget"+b);this.$body=this.$widget.find(".body:first");this.$container=this.$widget.find(".container:first");this.$tbody=this.$container.find("tbody:first");this.hasEntries=!!this.$tbody.length;Blocks.RecentEntriesWidget.instances.push(this)},addEntry:function(e){this.$container.css("margin-top",0);var g=this.$container.height();if(!this.hasEntries){var c=a('<table class="data"/>').prependTo(this.$container);this.$tbody=a("<tbody/>").appendTo(c)}this.$tbody.prepend('<tr><td><a href="'+e.url+'">'+e.title+'</a> <span class="light">'+e.postDate+(Blocks.hasPackage("Users")?" "+Blocks.t("by {author}",{author:e.username}):"")+"</span></td></tr>");var b=this.$container.height(),f=b-g;this.$container.css("margin-top",-f);var d={"margin-top":0};if(!this.hasEntries){d["margin-bottom"]=-g;this.hasEntries=true}this.$container.animate(d)}},{instances:[]})})(jQuery);