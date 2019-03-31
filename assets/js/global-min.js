/**
 * Global JS file
 *
 * @package  clct
 * @subpackage clct/assets/js
 * @author   Chip Sheppard
 * @since    1.0.0
 * @license  GPL-2.0+
 */
function myFunction(e){var n=document.getElementById("page"),t,t;e.matches?(t=new Headroom(n,{offset:0,tolerance:0})).init():(t=new Headroom(n,{offset:270,tolerance:5})).init()}!function(e){var n,t,i,a;function s(n){var t=e("<button />",{class:"dropdown-toggle","aria-expanded":!1}).append(e("<span />",{class:"screen-reader-text",text:"Expand child menu"}));n.find(".menu-item-has-children > a, .page_item_has_children > a").after(t),n.find(".current-menu-ancestor > button").addClass("not-toggled").attr("aria-expanded","false").find(".screen-reader-text").text("Expand child menu"),n.find(".current-menu-ancestor > .sub-menu").addClass("not-toggled"),n.find(".dropdown-toggle").click(function(n){var t=e(this),i=t.find(".screen-reader-text");n.preventDefault(),t.toggleClass("toggled-on"),t.next(".children, .sub-menu").toggleClass("toggled-on"),t.attr("aria-expanded","false"===t.attr("aria-expanded")?"true":"false"),i.text("Expand child menu"===i.text()?"Collapse child menu":"Expand child menu")})}s(e(".site-navigation, .topbar-widget.widget_nav_menu")),n=e("#masthead"),t=n.find(".responsive-menu-icon"),i=n.find(".site-navigation"),a=n.find(".site-navigation > div > ul"),t.length&&(t.attr("aria-expanded","false"),t.on("click",function(){i.toggleClass("toggled-on"),e(this).attr("aria-expanded",i.hasClass("toggled-on"))})),function(){function n(){"none"===e(".responsive-menu-icon").css("display")?(e(document.body).on("touchstart",function(n){e(n.target).closest(".site-navigation li").length||e(".site-navigation li").removeClass("focus")}),a.find(".menu-item-has-children > a, .page_item_has_children > a").on("touchstart",function(n){var t=e(this).parent("li");t.hasClass("focus")||(n.preventDefault(),t.toggleClass("focus"),t.siblings(".focus").removeClass("focus"))})):a.find(".menu-item-has-children > a, .page_item_has_children > a").unbind("touchstart")}a.length&&a.children().length&&("ontouchstart"in window&&(e(window).on("resize",n),n()),a.find("a").on("focus blur",function(){e(this).parents(".menu-item, .page_item").toggleClass("focus")}))}()}(jQuery);var x=window.matchMedia("(max-width: 768px)");myFunction(x),x.addListener(myFunction),jQuery(function(e){e(".l").hide(),e(".cssicon-plusminus").click(function(){e(this).hasClass("plus")?(e(this).removeClass("plus"),e(this).addClass("minus"),e(".m").hide(),e(".l").show(),e(".extended").slideDown(200)):(e(this).removeClass("minus"),e(this).addClass("plus"),e(".l").hide(),e(".m").show(),e(".extended").slideUp(200))})}),jQuery(function(e){e(".trust-cols").find(".expand").click(function(){e(this).parents().children(".extra").slideToggle(180)},function(){e(this).parents().children(".extra").slideToggle(180)})}),jQuery(function(e){e(".expand").click(function(){e(this).hasClass("open")?e(this).removeClass("open"):e(this).addClass("open")})}),function(e){if(e(".opm").length){var n=e(".opm"),t=n.offset().top,i=function(){var i;e(window).scrollTop()>=t?n.addClass("stuck"):n.removeClass("stuck")};e(window).scroll(i),i()}}(jQuery),function(e){if(e(".opm").length){var n=e(".opm-target"),t=e(".opm-menu"),i=t.outerHeight();e(window).on("scroll",function(){var a=e(this).scrollTop();n.each(function(){var s=e(this).offset().top-i,o=s+e(this).outerHeight();a>=s&&a<=o&&(t.find("a").removeClass("active"),n.removeClass("active"),e(this).addClass("active"),t.find('a[href="#'+e(this).attr("id")+'"]').addClass("active"))})}),t.find("a").on("click",function(){var n,t=e(this).attr("href");return e(t).length&&e("html, body").animate({scrollTop:e(t).offset().top},500),!1})}}(jQuery),function(e){e(".scrollto").on("click",function(n){if(""!==this.hash){n.preventDefault();var t=this.hash;e("html, body").animate({scrollTop:e(t).offset().top},800,function(){window.location.hash=t})}})}(jQuery);