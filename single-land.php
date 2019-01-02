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
 * The Content
 */
function clct_land() {
	?>
	<div class="top-block">
	<div class="inner-wrap">

		<header class="entry-header">
			<div class="return"><a href="/lands/">View all land</a></div>
			<h1 class="entry-title"><?php the_title(); ?></h1>
		</header>

		<div class="col-1-4 first top-left">
			Acquired  /  2009
			Size  /  109 acres
			Properties  /  1
			Trails  /  11
		</div>
		<div class="col-3-4 featured-land">
			<?php
			if ( has_post_thumbnail() ) :
				echo '<div class="fi">';
				the_post_thumbnail( 'full', [
					'class' => 'featured-image',
					'title' => 'Feature image',
				] );
				echo '</div>';
			endif;
			?>
		</div>
		<div class="cf"></div>

	</div>
	</div>


	<div class="land-content">
	<div class="inner-wrap">

		<div class="col-1-2 first">
			<?php the_content(); ?>
		</div>
		<div class="col-1-2">
			<?php the_field( 'column_2' ); ?>
		</div>

	</div>
	</div>


	<div class="land-map">
	</div>

	<div class="featured-callout">
	</div>

	<div class="land-list-wrap">
		<h2></h2>

		<div class="land-list">
		</div>

	</div>


	<!-- ACF OPTIONS - land-regulations -->
	<div class="land-regulations">
		<div class="inner-wrap">

			<h3><?php the_field( 'reg_title', 'option' ); ?></h3>

			<div class="col-1-3 first">
				<?php the_field( 'reg_column_1', 'option' ); ?>
			</div>
			<div class="col-1-3">
				<?php the_field( 'reg_column_2', 'option' ); ?>
			</div>
			<div class="col-1-3">
				<?php the_field( 'reg_column_3', 'option' ); ?>
			</div>
			<div class="cf"></div>

		</div>
	</div>

<?php
}
add_action( 'tha_entry_content_before', 'clct_land' );

// Build the page.
get_template_part( 'index' );
