/**
 * Global JS file
 *
 * @package  clct
 * @subpackage clct/assets/js
 * @author   Chip Sheppard
 * @since    1.0.0
 * @license  GPL-2.0+
 */

/*
 * Navigation
 */
(function( $ ) {
	var masthead, menuToggle, siteNavContain, siteNavigation;

	function initMainNavigation( container ) {

		var dropdownToggle = $( '<button />', { 'class': 'dropdown-toggle', 'aria-expanded': false } )
			.append( $( '<span />', { 'class': 'screen-reader-text', 'text': 'Expand child menu' } ) );

		container.find( '.menu-item-has-children > a, .page_item_has_children > a' ).after( dropdownToggle );

		container.find( '.current-menu-ancestor > button' )
			.addClass( 'not-toggled' )
			.attr( 'aria-expanded', 'false' )
			.find( '.screen-reader-text' )
			.text( 'Expand child menu' );

		container.find( '.current-menu-ancestor > .sub-menu' ).addClass( 'not-toggled' );

		container.find( '.dropdown-toggle' ).click( function( e ) {
			var _this = $( this ),
				screenReaderSpan = _this.find( '.screen-reader-text' );

			e.preventDefault();
			_this.toggleClass( 'toggled-on' );
			_this.next( '.children, .sub-menu' ).toggleClass( 'toggled-on' );

			_this.attr( 'aria-expanded', _this.attr( 'aria-expanded' ) === 'false' ? 'true' : 'false' );

			screenReaderSpan.text( screenReaderSpan.text() === 'Expand child menu' ? 'Collapse child menu' : 'Expand child menu' );
		});
	}

	initMainNavigation( $( '.site-navigation, .topbar-widget.widget_nav_menu' ) );

	masthead       = $( '#masthead' );
	menuToggle     = masthead.find( '.responsive-menu-icon' );
	siteNavContain = masthead.find( '.site-navigation' );
	siteNavigation = masthead.find( '.site-navigation > div > ul' );

	(function() {

		if ( ! menuToggle.length ) {
			return;
		}

		menuToggle.attr( 'aria-expanded', 'false' );

		menuToggle.on( 'click', function() {
			siteNavContain.toggleClass( 'toggled-on' );

			$( this ).attr( 'aria-expanded', siteNavContain.hasClass( 'toggled-on' ) );
		});
	})();

	(function() {
		if ( ! siteNavigation.length || ! siteNavigation.children().length ) {
			return;
		}

		function toggleFocusClassTouchScreen() {
			if ( 'none' === $( '.responsive-menu-icon' ).css( 'display' ) ) {

				$( document.body ).on( 'touchstart', function( e ) {
					if ( ! $( e.target ).closest( '.site-navigation li' ).length ) {
						$( '.site-navigation li' ).removeClass( 'focus' );
					}
				} );

				siteNavigation.find( '.menu-item-has-children > a, .page_item_has_children > a' )
					.on( 'touchstart', function( e ) {
						var el = $( this ).parent( 'li' );

						if ( ! el.hasClass( 'focus' ) ) {
							e.preventDefault();
							el.toggleClass( 'focus' );
							el.siblings( '.focus' ).removeClass( 'focus' );
						}
					} );

			} else {
				siteNavigation.find( '.menu-item-has-children > a, .page_item_has_children > a' ).unbind( 'touchstart' );
			}
		}

		if ( 'ontouchstart' in window ) {
			$( window ).on( 'resize', toggleFocusClassTouchScreen );
			toggleFocusClassTouchScreen();
		}

		siteNavigation.find( 'a' ).on( 'focus blur', function() {
			$( this ).parents( '.menu-item, .page_item' ).toggleClass( 'focus' );
		} );
	} )();
} )( jQuery );


/*
 * MY Headroom
 */
function myFunction(x) {
	var header = document.getElementById('page');
	if (x.matches) { // If media query matches
		var headroom  = new Headroom(header, {
			"offset": 0,
			"tolerance": 0
		});
		headroom.init();
	} else {
		var headroom  = new Headroom(header, {
			"offset": 270,
			"tolerance": 5
		});
		headroom.init();
	}
}
var x = window.matchMedia("(max-width: 768px)");
myFunction(x); // Call listener function at run time
x.addListener(myFunction); // Attach listener function on state changes



/*
 * Project List show/hide
 */
 jQuery(function( $ ){
	 $('.l').hide();
	 $( '.cssicon-plusminus' ).click(function() {
		 if ( $(this).hasClass( 'plus' ) ) {
			$(this).removeClass( 'plus' );
			$(this).addClass( 'minus' );
			$('.m').hide();
			$('.l').show();
			$('.extended').slideDown(200);
		} else {
			$(this).removeClass( 'minus' );
			$(this).addClass( 'plus' );
			$('.l').hide();
			$('.m').show();
			$('.extended').slideUp(200);
		}
 	} );
 } );

 /*
  * Trust columns "Expand to read more"
  */
jQuery(function( $ ){
$('.trust-cols').find('.expand').click(function() {
	$(this).parents().children('.extra').slideToggle(180);
  },
  function() {
	  $(this).parents().children('.extra').slideToggle(180);
  } );
} );

jQuery(function( $ ){
	$('.expand').click(function() {
		if ( $(this).hasClass( 'open' ) ) {
			$(this).removeClass( 'open' );
		} else {
			$(this).addClass( 'open' );
		}
	} );
 } );


/*
 * Sticky On-Page Menu
 *
 * @link https://codepen.io/jovanivezic/pen/ZQNdag
(function( $ ) {
	if ($('.opm').length ) {

		var $anchor = $('.opm');
		var ot = $anchor.offset().top;
		var move = function() {
			var st = $(window).scrollTop();
			//if(window.innerWidth > 640) {
				if(st >= ot) {
					$anchor.addClass('stuck');
				} else {
					$anchor.removeClass('stuck');
				}
			//}
		};

		$(window).scroll(move);
		move();

	} else {
		return;
	}
} )( jQuery );
 */

/**
 * Smooth Scroll for OnPage Menus
 *
 * @link http://cssdeck.com/labs/setting-active-states-on-sticky-navigations-while-scrolling
 * @link https://codepen.io/rishabhp/pen/aNXVbQ
 */
(function( $ ) {
	if ($('.opm').length ) {
		var sections = $('.opm-target'),
		nav = $('.opm-menu'),
		nav_height = nav.outerHeight();

		$(window).on('scroll', function () {
			var cur_pos = $(this).scrollTop();

			sections.each(function() {
				var top = $(this).offset().top - nav_height,
				    bottom = top + $(this).outerHeight();

				if (cur_pos >= top && cur_pos <= bottom) {
					nav.find('a').removeClass('active');
					sections.removeClass('active');

					$(this).addClass('active');
					nav.find('a[href="#'+$(this).attr('id')+'"]').addClass('active');
				}
		 	});
		});

		nav.find('a').on('click', function () {
			var $el = $(this),
			id = $el.attr('href');

		if ($(id).length ) {
			$('html, body').animate({
				scrollTop: $(id).offset().top
			}, 500);
		}
			return false;
		});

	} else {
		return;
	}
} )( jQuery );


(function( $ ) {
  // Add smooth scrolling to all links
  $(".scrollto").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
	}, 500, function(){

        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
} )( jQuery );
