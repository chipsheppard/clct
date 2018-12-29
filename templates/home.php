<?php
/**
 * The template for displaying the homepage.
 *
 * Template Name: Homepage
 *
 * @package  clct
 * @author   Chip Sheppard
 * @since    1.0.0
 * @license  GPL-2.0+
 */

add_filter( 'body_class', function( $classes ) {
	return array_merge( $classes, array( 'homepage' ) );
} );

/**
 * Top Block
 */
function clct_home() {
	$colorclass = 'brown';
	include( locate_template( 'template-parts/topblock-page.php', false, false ) );
	?>

	<div class="inner-wrap">
		Image - Land & Properties
		<br>
		Smaller image 900 - big image
		<br><br>
		2 Properties
		<br>
		Featured Property
	</div>

	<?php
}
add_action( 'tha_entry_content_before', 'clct_home' );


// Build the page.
get_template_part( 'index' );
