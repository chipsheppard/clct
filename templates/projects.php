<?php
/**
 * Template for Projects page.
 *
 * Template Name: Projects
 *
 * @package  clct
 * @author   Chip Sheppard
 * @since    1.0.0
 * @license  GPL-2.0+
 */

add_filter( 'body_class', function( $classes ) {
	return array_merge( $classes, array( 'projects' ) );
} );

/**
 * Projects
 */
function clct_projects() {
?>
<div class="top-block">
<div class="inner-wrap">

	<div class="col-3-7 first">
		<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
		</header>
		<div class="entry-content">
			<?php the_content(); ?>
		</div>
	</div>

</div>
</div>
<?php
}
add_action( 'tha_entry_content_before', 'clct_projects' );


// Build the page.
get_template_part( 'index' );
