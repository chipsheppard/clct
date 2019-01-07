/**
 * Global JS file
 *
 * @package  clct
 * @subpackage clct/assets/js
 * @author   Chip Sheppard
 * @since    1.0.0
 * @license  GPL-2.0+
 */
function myFunction(e){var n=document.getElementById("page"),t,t;e.matches?(t=new Headroom(n,{offset:0,tolerance:0})).init():(t=new Headroom(n,{offset:270,tolerance:5})).init()}!function(a){var e,n,t,i;function s(e){var n=a("<button />",{class:"dropdown-toggle","aria-expanded":!1}).append(a("<span />",{class:"screen-reader-text",text:"Expand child menu"}));e.find(".menu-item-has-children > a, .page_item_has_children > a").after(n),e.find(".current-menu-ancestor > button").addClass("not-toggled").attr("aria-expanded","false").find(".screen-reader-text").text("Expand child menu"),e.find(".current-menu-ancestor > .sub-menu").addClass("not-toggled"),e.find(".dropdown-toggle").click(function(e){var n=a(this),t=n.find(".screen-reader-text");e.preventDefault(),n.toggleClass("toggled-on"),n.next(".children, .sub-menu").toggleClass("toggled-on"),n.attr("aria-expanded","false"===n.attr("aria-expanded")?"true":"false"),t.text("Expand child menu"===t.text()?"Collapse child menu":"Expand child menu")})}s(a(".site-navigation, .topbar-widget.widget_nav_menu")),e=a("#masthead"),n=e.find(".responsive-menu-icon"),t=e.find(".site-navigation"),i=e.find(".site-navigation > div > ul"),n.length&&(n.attr("aria-expanded","false"),n.on("click",function(){t.toggleClass("toggled-on"),a(this).attr("aria-expanded",t.hasClass("toggled-on"))})),function(){function e(){"none"===a(".responsive-menu-icon").css("display")?(a(document.body).on("touchstart",function(e){a(e.target).closest(".site-navigation li").length||a(".site-navigation li").removeClass("focus")}),i.find(".menu-item-has-children > a, .page_item_has_children > a").on("touchstart",function(e){var n=a(this).parent("li");n.hasClass("focus")||(e.preventDefault(),n.toggleClass("focus"),n.siblings(".focus").removeClass("focus"))})):i.find(".menu-item-has-children > a, .page_item_has_children > a").unbind("touchstart")}i.length&&i.children().length&&("ontouchstart"in window&&(a(window).on("resize",e),e()),i.find("a").on("focus blur",function(){a(this).parents(".menu-item, .page_item").toggleClass("focus")}))}()}(jQuery);var x=window.matchMedia("(max-width: 768px)");myFunction(x),x.addListener(myFunction),jQuery(function(e){e(".l").hide(),e(".cssicon-plusminus").click(function(){e(this).hasClass("plus")?(e(this).removeClass("plus"),e(this).addClass("minus"),e(".m").hide(),e(".l").show(),e(".extended").slideDown(200)):(e(this).removeClass("minus"),e(this).addClass("plus"),e(".l").hide(),e(".m").show(),e(".extended").slideUp(200))})}),jQuery(function(e){e(".trust-cols").find(".expand").click(function(){e(this).parents().children(".extra").slideToggle(180)},function(){e(this).parents().children(".extra").slideToggle(180)})}),jQuery(function(e){e(".expand").click(function(){e(this).hasClass("open")?e(this).removeClass("open"):e(this).addClass("open")})});