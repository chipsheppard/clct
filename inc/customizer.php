<?php
/**
 * Theme Customizer.
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
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function clct_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_control( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'clct_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'clct_customize_partial_blogdescription',
		) );
	}
}
add_action( 'customize_register', 'clct_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 */
function clct_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 */
function clct_customize_partial_blogdescription() {
	bloginfo( 'description' );
}


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 *
 * @since 0.1
 */
function clct_customizer_live_preview() {
	wp_enqueue_script( 'clct-themecustomizer', trailingslashit( get_template_directory_uri() ) . 'assets/js/customizer-min.js', array( 'customize-preview' ), CLCT_VERSION, true );
}
add_action( 'customize_preview_init', 'clct_customizer_live_preview' );
