<?php
/**
 * Widgets.
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

/**
 * Register widget areas.
 */
function clct_widgets_init() {

	register_sidebar( array(
		'name' => esc_html__( 'Footer Widget Area', 'clct' ),
		'id' => 'footer',
		'description' => esc_html__( 'An optional widget area for your site footer. Displays at the very bottom of your website.', 'clct' ),
		'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );

}

add_action( 'widgets_init', 'clct_widgets_init' );
