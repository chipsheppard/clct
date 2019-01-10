<?php
/**
 * Main Functions File
 *
 * @package  clct
 * @author   Chip Sheppard
 * @since    1.0.0
 * @license  GPL-2.0+
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// Theme data.
define( 'CLCT_VERSION', '1.0.0' );
define( 'CLCT_THEME_NAME', 'CLCT' );
define( 'CLCT_AUTHOR_NAME', 'Sheppco' );
define( 'CLCT_AUTHOR_LINK', 'https://sheppco.com' );

/**
 * Load the extra stuff.
 */
require get_template_directory() . '/inc/tha-theme-hooks.php';
require get_template_directory() . '/inc/wordpress-cleanup.php';
require get_template_directory() . '/inc/widgets.php';
require get_template_directory() . '/inc/entry-meta.php';
require get_template_directory() . '/inc/theme-functions.php';
require get_template_directory() . '/inc/loop.php';
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/shortcodes.php';

/**
 * Enqueue scripts and styles.
 */
function clct_scripts() {
	wp_enqueue_style( 'clct-style', get_stylesheet_uri(), array(), CLCT_VERSION );
	wp_enqueue_script( 'clct-headroom', get_template_directory_uri() . '/assets/js/headroom-min.js', array(), CLCT_VERSION, true );
	wp_enqueue_script( 'clct-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix-min.js', array(), CLCT_VERSION, true );
	wp_enqueue_script( 'clct-globaljs', get_template_directory_uri() . '/assets/js/global-min.js', array( 'jquery' ), CLCT_VERSION, true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'clct_scripts' );

/**
 * Enqueue editor styles for Gutenberg
 */
function clct_gutenberg_editor_styles() {
	wp_enqueue_style( 'clct_gutenberg-editor-style', get_template_directory_uri() . '/assets/css/editor-style.css' );
}
add_action( 'enqueue_block_editor_assets', 'clct_gutenberg_editor_styles' );



if ( ! function_exists( 'clct_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * @since 0.1
	 */
	function clct_setup() {

		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'post-formats', array( 'aside', 'status' ) );
		add_theme_support( 'align-wide' );
		add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Set the content width in pixels, based on the theme's design and stylesheet.
		$GLOBALS['content_width'] = apply_filters( 'clct_content_width', 1200 );

		// Custom Logo.
		add_theme_support( 'custom-logo', array(
			'height'      => 324,
			'width'       => 224,
			'flex-height' => true,
			'flex-width'  => true,
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'clct_custom_background_args', array(
			'default-color' => '000000',
			'default-image' => '',
		) ) );

		// wp_nav_menu() in 1 location.
		register_nav_menus( array(
			'primary' => __( 'Primary Menu', 'clct' ),
		) );

		// Make theme available for translation.
		load_theme_textdomain( 'clct', get_template_directory() . '/languages' );

		// Theme styles for the visual editor.
		add_editor_style( 'assets/css/editor-style.css' );
	}
endif;
add_action( 'after_setup_theme', 'clct_setup' );


/**
 * Limit the number of post revisions.
 *
 * @param string $num The number of post revisions to keep.
 * @param object $post The post object.
 */
function clct_set_revision_max( $num, $post ) {
	$num = 10;
	return $num;
}
add_filter( 'wp_revisions_to_keep', 'clct_set_revision_max', 10, 2 );

// ACF Options.
if ( function_exists( 'acf_add_options_page' ) ) {

	acf_add_options_page();
	acf_add_options_sub_page( 'Projects Footer' );
	acf_add_options_sub_page( 'Regulations' );

}

// Load Jetpack compatibility file.
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/*
 * Add Theme support for WooCommerce
 * http://www.wpexplorer.com/woocommerce-compatible-theme/
 */
define( 'WPEX_WOOCOMMERCE_ACTIVE', class_exists( 'WooCommerce' ) );
// Checking if WooCommerce is active.
if ( WPEX_WOOCOMMERCE_ACTIVE ) {
	require get_template_directory() . '/inc/woocommerce.php';
}
