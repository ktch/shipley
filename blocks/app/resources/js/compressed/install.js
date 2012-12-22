/*!
 * Blocks by Pixel & Tonic
 *
 * @package   Blocks
 * @author    Pixel & Tonic, Inc.
 * @copyright Copyright (c) 2012, Pixel & Tonic, Inc.
 * @license   http://blockscms.com/license1.0.html Blocks License
 * @link      http://blockscms.com
 */
(function(a){Blocks.Installer=Blocks.Base.extend({$screens:null,$currentScreen:null,$accountSubmitBtn:null,$siteSubmitBtn:null,loading:false,init:function(){this.$screens=Blocks.$body.children(".modal");setTimeout(a.proxy(this,"showWelcomeScreen"),500)},showWelcomeScreen:function(){this.$currentScreen=a(this.$screens[0]).removeClass("scaleddown").animate({opacity:1},"fast",a.proxy(function(){this.addListener(a("#getstarted"),"activate","showAccountScreen");this.focusFirstInput();this.$licensekeySubmitBtn=a("#licensekeysubmit");this.addListener(this.$licensekeySubmitBtn,"activate","validateLicenseKey");this.addListener(a("#licensekeyform"),"submit","validateLicenseKey")},this))},validateLicenseKey:function(c){c.preventDefault();var b=["licensekey"];this.validate("licensekey",b,a.proxy(this,"showAccountScreen"))},showAccountScreen:function(b){this.showScreen(1,a.proxy(function(){this.$accountSubmitBtn=a("#accountsubmit");this.addListener(this.$accountSubmitBtn,"activate","validateAccount");this.addListener(a("#accountform"),"submit","validateAccount")},this))},validateAccount:function(c){c.preventDefault();var b=["username","email","password"];this.validate("account",b,a.proxy(this,"showSiteScreen"))},showSiteScreen:function(){this.showScreen(2,a.proxy(function(){this.$siteSubmitBtn=a("#sitesubmit");this.addListener(this.$siteSubmitBtn,"activate","validateSite");this.addListener(a("#siteform"),"submit","validateSite")},this))},validateSite:function(c){c.preventDefault();var b=["siteName","siteUrl"];this.validate("site",b,a.proxy(this,"showInstallScreen"))},showInstallScreen:function(){this.showScreen(3,a.proxy(function(){var b=["licensekey","username","email","password","siteName","siteUrl","language"];var e={};for(var d=0;d<b.length;d++){var c=b[d],f=a("#"+c);e[c]=Blocks.getInputPostVal(f)}Blocks.postActionRequest("install/install",e,a.proxy(function(){this.$currentScreen.find("h1:first").text(Blocks.t("All done!"));var g=a('<div class="buttons"><a href="'+Blocks.getUrl("dashboard")+'" class="btn big submit">'+Blocks.t("Go to Blocks")+"</a></div>");a("#spinner").replaceWith(g)},this))},this))},showScreen:function(d,e){var c=Blocks.$window.width(),b=Math.floor(c/2);this.$currentScreen.css("left",b).animate({left:-730,opacity:0});this.$currentScreen=a(this.$screens[d]).css({display:"block",left:c+370}).animate({left:b},a.proxy(function(){this.$currentScreen.css("left","50%");this.focusFirstInput();e()},this))},validate:function(g,e,k){if(this.loading){return}this.loading=true;a("#"+g+"form").find(".errors").remove();var j=this["$"+g+"SubmitBtn"];j.addClass("sel loading");var b="install/validate"+Blocks.uppercaseFirst(g);var c={};for(var d=0;d<e.length;d++){var h=e[d],f=a("#"+h);c[h]=Blocks.getInputPostVal(f)}Blocks.postActionRequest(b,c,a.proxy(function(m){if(m.validates){k()}else{for(var l in m.errors){var s=m.errors[l],r=a("#"+l),q=r.closest(".field"),o=a('<ul class="errors"/>').appendTo(q);for(var p=0;p<s.length;p++){var n=s[p];a("<li>"+n+"</li>").appendTo(o)}if(!r.is(":focus")){r.addClass("error");(a.proxy(function(i){this.addListener(i,"focus",function(){i.removeClass("error");this.removeListener(i,"focus")})},this))(r)}}Blocks.shake(this.$currentScreen)}this.loading=false;j.removeClass("sel loading")},this))},focusFirstInput:function(){setTimeout(a.proxy(function(){this.$currentScreen.find("input:first").focus()},this),400)}});Blocks.$window.on("load",function(){Blocks.installer=new Blocks.Installer()})})(jQuery);