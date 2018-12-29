<?php
/**
 * Theme Functions
 *
 * @package  clct
 * @subpackage clct/inc
 * @author   Chip Sheppard
 * @since    1.0.0
 * @license  GPL-2.0+
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/*
 * DISPLAY Branding
 -----------------------------------------------------------------
 */
if ( ! function_exists( 'clct_display_branding' ) ) {
	/**
	 * Get the branding markup
	 */
	function clct_display_branding() {

		$custom_logo_id = get_theme_mod( 'custom_logo' );
		$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
		$sitename = get_bloginfo( 'name', 'display' );
		$logoheight = absint( $logo[2] );
		$logowidth = absint( $logo[1] );
		$description = get_bloginfo( 'description', 'display' );

		echo '<div class="site-branding">';

		if ( has_custom_logo() ) {
			echo '<div class="custom-logo">';
			echo '<a href="' . esc_url( home_url( '/' ) ) . '" rel="home"><img src="' . esc_url( $logo[0] ) . '" height="' . esc_html( $logoheight ) . '" width="' . esc_html( $logowidth ) . '" alt="' . esc_html( $sitename ) . '"></a>';
			echo '</div>';
		}

		echo '<div class="stuck-logo">';
		echo '<a href="' . esc_url( home_url( '/' ) ) . '" rel="home"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/clct-logo-nav.png" height="260" width="180" alt="' . esc_html( $sitename ) . '"></a>';
		echo '</div>';

		if ( is_front_page() ) :
			echo '<h1 class="site-title">' . esc_html( $sitename ) . '</h1>';
		else :
			echo '<div class="site-title"><a href="' . esc_url( home_url( '/' ) ) . '" rel="home">' . esc_html( $sitename ) . '</a></div>';
		endif;

		if ( $description || is_customize_preview() ) :
			echo '<div class="site-description">' . $description . '</div>'; /* WPCS: xss ok. */
		endif;
		echo '</div>';
	}
}
add_action( 'tha_header_top', 'clct_display_branding' );


/*
 * DISPLAY Navigation
 -----------------------------------------------------------------
 */
if ( ! function_exists( 'clct_display_nav' ) ) {
	/**
	 * Get the menu
	 * write the markup if conditions are met.
	 */
	function clct_display_nav() {

		if ( ! has_nav_menu( 'primary' ) ) {
			return;
		}

		$custom_logo_id = get_theme_mod( 'custom_logo' );
		$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
		$sitename = get_bloginfo( 'name', 'display' );
		$logoheight = absint( $logo[2] );
		$logowidth = absint( $logo[1] );

		echo '<nav id="primary-navigation" class="site-navigation" role="navigation">';
			echo '<button class="responsive-menu-icon" aria-controls="mobile-navigation" aria-expanded="false"><div class="menu-icon-wrap"><div class="menu-icon"></div></div></button>';

			echo '<div class="menu-wrap">';

				wp_nav_menu( array(
					'theme_location' => 'primary',
					'menu_id' => 'primary-menu',
					'container' => '',
				) );

			echo '<div class="mobile-nav-logo"><a href="' . esc_url( home_url( '/' ) ) . '" rel="home"><img src="' . esc_url( $logo[0] ) . '" height="' . esc_html( $logoheight ) . '" width="' . esc_html( $logowidth ) . '" alt="' . esc_html( $sitename ) . '"></a></div>';
			echo '</div>';
		echo '</nav>';
	}
}
add_action( 'tha_header_top', 'clct_display_nav' );


/*
 * DISPLAY Entry Footer
 -----------------------------------------------------------------
 */
if ( ! function_exists( 'clct_display_entry_footer' ) ) {
	/**
	 * Get the categories and tags.
	 */
	function clct_display_entry_footer() {

		if ( is_single() && 'post' === get_post_type() ) :
			echo '<div class="inner-wrap">';
			echo '<footer class="entry-footer">';

			// Hide this on pages.
			if ( 'post' === get_post_type() ) {
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( esc_html__( ', ', 'clct' ) );
				if ( $categories_list ) {
					printf( '<span class="cat-links"><div class="cssicon-folder"></div>%1$s</span>', $categories_list ); // WPCS: XSS OK.
				}

				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', esc_html__( ', ', 'clct' ) );
				if ( $tags_list ) {
					printf( '<span class="tags-links"><div class="cssicon-tag"></div>%1$s</span>', $tags_list ); // WPCS: XSS OK.
				}
			}

			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'clct' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
			echo '</footer>';
			echo '</div>';
		endif;
	}
}
add_action( 'tha_entry_bottom', 'clct_display_entry_footer' );


/*
 * DISPLAY Read More link
-----------------------------------------------------------------
*/
if ( ! function_exists( 'clct_display_read_more' ) ) {
	/**
	 * The Read More link markup
	 */
	function clct_display_read_more() {
		if ( is_archive() || is_home() || is_search() ) :
			$link = sprintf( '<footer class="link-more"><a href="%1$s" class="more-link arrow">%2$s</a></footer>',
				get_permalink( get_the_ID() ),
				/* translators: %s: Name of current post */
				sprintf( __( 'Read more<span class="screen-reader-text"> "%s"</span>', 'clct' ), get_the_title( get_the_ID() ) )
			);
			echo wp_kses_post( $link );
			echo '<div class="cf"></div>';
		endif;
	}
}
add_action( 'tha_entry_bottom', 'clct_display_read_more' );

/*
 * DISPLAY Site Footer
 -----------------------------------------------------------------
 */
if ( ! function_exists( 'clct_display_site_footer' ) ) {
	/**
	 * The Site Footer MArkup
	 */
	function clct_display_site_footer() {
		if ( is_active_sidebar( 'footer' ) ) {
			echo '<div class="site-info">';
				dynamic_sidebar( 'footer' );
			echo '</div>';
		} else {
			echo '<div class="site-info">';
				echo '<p>"' . esc_html( CLCT_THEME_NAME ) . '" by <a href="' . esc_html( CLCT_AUTHOR_LINK ) . '">' . esc_html( CLCT_AUTHOR_NAME ) . '</a></p>';
			echo '</div>';
		}
	}
}
add_action( 'tha_footer_top', 'clct_display_site_footer' );
