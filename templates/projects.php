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
		// POST OBJECT.
		$featured_project = get_field( 'featured_project' );
		$content = get_post_field( 'post_content', $featured_project->ID );
		?>

		<a href="<?php echo esc_url( get_permalink( $featured_project->ID ) ); ?>">
			<?php echo get_the_post_thumbnail( $featured_project->ID, 'large' ); ?>
		</a>

		<div class="col-1-2 first fp-title">
			<h3><a href="<?php echo esc_url( get_permalink( $featured_project->ID ) ); ?>"><?php echo get_the_title( $featured_project->ID ); ?></a></h3>
		</div>

		<div class="col-1-2 fp-content">
			<?php echo wp_kses_post( $content ); ?>
			<div class="fp_link"><a href="<?php echo esc_url( get_permalink( $featured_project->ID ) ); ?>" class="btn olive">Read more about this project</a></div>
		</div>

	</div><!-- /featured project -->
	<div class="cf"></div>


	<div class="project-list-wrap">
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

		<div class="view-all">
			<span class="cssicon-plusminus plus"></span>
			<div class="view-text">View <span class="m">all</span><span class="l">less</span></div>
		</div>

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

	</div><!-- /project-list-wrap -->

</div>
</div><!-- /top-block -->


<div class="events-block">

	<div class="inner-wrap">
		<h2><?php the_field( 'section_title' ); ?></h2>
	</div>

	<div class="events">
	<?php

	if ( have_rows( 'events' ) ) :
		while ( have_rows( 'events' ) ) :
			the_row();
			?>
			<div class="event-row">
			<div class="inner-wrap">

				<div class="col-1-3 first event-titles">
					<div class="event-sub-title"><?php the_sub_field( 'event_sub_title' ); ?></div>
					<h4 class="event-title"><?php the_sub_field( 'event_title' ); ?></h4>
				</div>
				<div class="col-1-3 event-text">
					<?php the_sub_field( 'event_text' ); ?>
				</div>
				<div class="col-1-6 event-time">
					<?php the_sub_field( 'event_time' ); ?>
				</div>
				<div class="col-1-6 event-link">
					<?php
					$linkstyle = get_sub_field( 'link_style' );
					if ( $linkstyle ) :
						$ls = ' btn alt wide';
					else :
						$ls = '';
					endif;

					$link = get_sub_field( 'event_link' );
					if ( $link ) :
						$link_url = $link['url'];
						$link_title = $link['title'];
						$link_target = $link['target'] ? $link['target'] : '_self';
						?>
						<a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" class="elink<?php echo esc_html( $ls ); ?>"><?php echo esc_html( $link_title ); ?></a>
					<?php endif; ?>
				</div>

			</div>
			</div>
			<?php
		endwhile;
	else :
	?>

		<div class="col-2-3 silo no-events">
			<?php the_field( 'no_events' ); ?>
		</div>

	<?php endif; ?>

	</div><!-- /events -->

	<div class="events-footnote">
		<div class="inner-wrap">
			<div class="col-1-2 pullright">
				<?php the_field( 'events_footnote' ); ?>
			</div>
		</div>
	</div>

</div><!-- /events-block -->

<?php
}
add_action( 'tha_entry_content_before', 'clct_projects' );


// Build the page.
get_template_part( 'index' );
