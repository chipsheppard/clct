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

	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</header>


	<div class="col-1-4 first top-left">
		<?php the_field( 'top_left_block' ); ?>
	</div>
	<div class="col-3-4 featured-project">
		<?php
		$featured_project = get_field( 'featured_project' );

		if ( $featured_project ) :
			// override $post.
			global $post;
			$post = $featured_project;
			setup_postdata( $post );
			?>

			<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'large' ); ?></a>

			<div class="col-1-2 first fp-title">
				<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
			</div>
			<div class="col-1-2 fp-content">
				<?php the_content(); ?>
				<a href="<?php the_permalink(); ?>" class="btn">Read more about this project</a>
			</div>
			<?php
			wp_reset_postdata(); // IMPORTANT.
		endif;
		?>
	</div>
	<div class="cf"></div>


	<div class="project-list-wrap">
		<div class="view-all">
			<span class="cssicon-plusminus plus"></span>
			<div class="view-text">View <span class="m">all</span><span class="l">less</span></div>
		</div>
		<div class="project-list">
			<?php
			$query = new WP_Query( array(
				'post_type' => 'project',
				'posts_per_page' => 3,
				'order' => 'DESC',
				'orderby' => 'date',
			) );

			if ( $query->have_posts() ) {
				while ( $query->have_posts() ) :
					$query->the_post();
					echo '<div class="proj-block">';

					if ( has_post_thumbnail() ) :
						echo '<div class="proj-thumb">';
						the_post_thumbnail( 'medium' );
						echo '</div>';
					endif;

					?>
					<div class="excerpt"><?php the_excerpt(); ?></div>
					<h4><a href="<?php the_permalink(); ?>" title="<?php esc_attr( the_title_attribute() ); ?>"><?php the_title(); ?></a></h4>
				</div>
				<?php
				endwhile;
				wp_reset_postdata();
			}
			?>
			<div class="cf"></div>
		</div>
	</div>

</div>
</div>
<?php
}
add_action( 'tha_entry_content_before', 'clct_projects' );


// Build the page.
get_template_part( 'index' );
