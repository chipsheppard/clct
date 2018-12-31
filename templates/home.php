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

		<div>
			<img src="" width="" height="" alt="">
			<div></div>
		</div>

		<div>
			<header class="entry-header">
				<h1><?php the_title(); ?></h1>
			</header>

			<div class="entry-content">
				<?php the_content(); ?>
			</div>
		</div>

		<div>
			<img src="" width="" height="" alt="">
			<div>900</div>
			<p></p>
		</div>

		<div>
			<img src="" width="" height="" alt="">
			<div></div>
		</div>

	</div>

	<?php
}
add_action( 'tha_entry_content_before', 'clct_home' );


// Build the page.
get_template_part( 'index' );
