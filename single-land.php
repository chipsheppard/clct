<?php
/**
 * Template for a single Land page.
 *
 * @package  clct
 * @author   Chip Sheppard
 * @since    1.0.0
 * @license  GPL-2.0+
 */

add_filter( 'body_class', function( $classes ) {
	return array_merge( $classes, array( 'single-land' ) );
} );

/**
 * Test Function
 */
function clct_test_funk() {
	echo 'Single Land';
}
add_action( 'tha_entry_content_before', 'clct_test_funk' );

// Build the page.
get_template_part( 'index' );
