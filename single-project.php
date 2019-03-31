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

		<header class="entry-header">
			<div class="return"><a href="<?php echo esc_url( home_url( '/projects-events' ) ); ?>">View all projects</a></div>
			<h1 class="entry-title"><?php the_title(); ?></h1>
		</header>
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


	<div class="project-list-wrap">
		<div class="inner-wrap">

			<div class="view-all">
				<!--a href="<?php echo esc_url( home_url( '/projects-events' ) ); ?>" class="vm">
				<div class="cssicon-arrow-r"></div>
				<div class="view-text">View more</div>
			</a-->
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
						echo '<div class="proj-block"><a href="';
						the_permalink();
						echo '" alt="';
						the_title_attribute();
						echo '">';

						if ( has_post_thumbnail() ) :
							echo '<div class="proj-thumb">';
							the_post_thumbnail( 'medium' );
							echo '</div>';
						endif;

						?>
						<div class="excerpt"><?php the_excerpt(); ?></div>
						<h4><?php the_title(); ?></h4>
					</a></div>
					<?php
					endwhile;
					wp_reset_postdata();
				}
				?>
				<div class="cf"></div>
			</div><!-- /projects-list -->

			<div class="project-list extended">
				<?php
				$equery = new WP_Query( array(
					'post_type' => 'project',
					'posts_per_page' => 30,
					'order' => 'DESC',
					'orderby' => 'date',
					'offset'  => 3,
				) );

				if ( $equery->have_posts() ) {
					while ( $equery->have_posts() ) :
						$equery->the_post();
						echo '<div class="proj-block"><a href="';
						the_permalink();
						echo '" alt="';
						the_title_attribute();
						echo '">';

						if ( has_post_thumbnail() ) :
							echo '<div class="proj-thumb">';
							the_post_thumbnail( 'medium' );
							echo '</div>';
						endif;

						?>
						<div class="excerpt"><?php the_excerpt(); ?></div>
						<h4><?php the_title(); ?></h4>
					</a></div>
					<?php
					endwhile;
					wp_reset_postdata();
				}
				?>
				<div class="cf"></div>
			</div><!-- /projects extended -->

		</div><!-- /inner-wrap -->
	</div><!-- /project-list-wrap -->



	<!-- ACF OPTIONS - project footer -->
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
