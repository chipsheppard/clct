<?php
/**
 * Template for a single Project page.
 *
 * @package  clct
 * @author   Chip Sheppard
 * @since    1.0.0
 * @license  GPL-2.0+
 */

add_filter( 'body_class', function( $classes ) {
	return array_merge( $classes, array( 'single-project' ) );
} );

/**
 * The content
 */
function clct_project() {
	?>
	<div class="top-block">
	<div class="inner-wrap">

		<div class="col-2-3 first">
			<header class="entry-header">
				<div class="return"><a href="/projects-events/">View all projects</a></div>
				<h1 class="entry-title"><?php the_title(); ?></h1>
			</header>
		</div>
		<div class="cf"></div>
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
	</div>

	<?php get_template_part( 'template-parts/project', 'modules' ); ?>

	<div class="projects-footer">
		<div class="inner-wrap">
			<?php
			$link = get_field( 'link', 'option' );
			if ( $link ) :
				$link_url = $link['url'];
				$link_title = $link['title'];
				$link_target = $link['target'] ? $link['target'] : '_self';
				?>
				<a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
			<?php endif; ?>

			<h3><?php the_field( 'title', 'option' ); ?></h3>

			<div class="col-1-3 first">
				<?php the_field( 'column_1', 'option' ); ?>
			</div>
			<div class="col-1-3">
				<?php the_field( 'column_2', 'option' ); ?>
			</div>
			<div class="col-1-3">
				<?php the_field( 'column_3', 'option' ); ?>
			</div>
			<div class="cf"></div>
		</div>
	</div>

<?php
}
add_action( 'tha_entry_content_before', 'clct_project' );


// Build the page.
get_template_part( 'index' );
