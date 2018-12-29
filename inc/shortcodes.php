<?php
/**
 * Shortcodes.
 *
 * @package  clct
 * @subpackage clct/inc
 * @author   Chip Sheppard
 * @since    1.0.0
 * @license  GPL-2.0+
 */

/*
 * Enable shortcodes in text widgets.
 */
add_filter( 'widget_text', 'do_shortcode' );

/**
 * [c] Copyright Symbol Shortcode
 *
 * Returns the Copyright Symbol.
 *
 * @return string  HTML for a Copyright symbol
 */
function clct_c_shortcode() {
	return '&copy;';
}
add_shortcode( 'c', 'clct_c_shortcode' );


/**
 * [y] Year Shortcode
 *
 * Returns the Current Year as a string in four digits.
 *
 * @return string  Current Year
 */
function clct_y_shortcode() {
	$year = date( 'Y' );
	return $year;
}
add_shortcode( 'y', 'clct_y_shortcode' );


/**
 * [s] - Site Link Shortcode
 *
 * Returns the Site Name linked to the homepage.
 *
 * @return string  HTML for a linked site title
 */
function clct_s_shortcode() {
	 $sitelink = '<a href="' . esc_url( home_url() ) . '" rel="home">' . get_bloginfo( 'name' ) . '</a>';
	 return $sitelink;
}
add_shortcode( 's', 'clct_s_shortcode' );
