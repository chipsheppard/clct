<?php
/**
 * Template for Land.
 *
 * Template Name: Land
 *
 * @package  clct
 * @author   Chip Sheppard
 * @since    1.0.0
 * @license  GPL-2.0+
 */

add_filter( 'body_class', function( $classes ) {
	return array_merge( $classes, array( 'land' ) );
} );

/**
 * Projects
 */
function clct_land() {
?>
<div class="top-block">

	<div class="inner-wrap">

		<header class="entry-header">
			<h1 class="entry-title"><?php the_title(); ?></h1>
		</header>
		<div class="entry-content col-1-2 first">
			<?php
			the_content();

			$link = get_field( 'content_link' );
			if ( $link ) :
				$link_url = $link['url'];
				$link_title = $link['title'];
				$link_target = $link['target'] ? $link['target'] : '_self';
				?>
				<a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" class="btn dark"><?php echo esc_html( $link_title ); ?></a>
			<?php endif; ?>

		</div>
		<div class="cf"></div>

		<div class="onpage-link">
			<a href="#landsend" class="scrollto"><span>View all land &amp; properties</span><div class="cssicon-arrow-d"></div></a>
		</div>

	</div><!-- /inner-wrap -->


	<div class="featured-lands">
		<?php
		$fl_query = new WP_Query( array(
			'post_type' => 'land',
			'category_name' => 'featured',
			'posts_per_page' => 3,
			'orderby' => array(
				'menu_order' => 'ASC',
				'date' => 'DESC',
			),
		) );

		if ( $fl_query->have_posts() ) {
			while ( $fl_query->have_posts() ) :
				$fl_query->the_post();
				echo '<div class="land-block">';

				if ( has_post_thumbnail() ) :
					$url = get_the_post_thumbnail_url();
					?>
					<div class="land-img-wrap" style="background-image: url(<?php echo esc_url( $url ); ?>)"><a class="bg-link-overlay" href="<?php the_permalink(); ?>"></a></div>
				<?php endif; ?>

				<div class="inner-wrap">
					<div class="col-1-2 first">
						<div class="land-stat">
							<?php $pcount = count( get_field( 'properties', $fl_query->ID ) ); ?>
							<span class="num"><?php echo esc_html( $pcount ); ?></span> properties - <span class="num"><?php the_field( 'trails' ); ?></span> trails
						</div>
						<h2><a href="<?php the_permalink(); ?>" title="<?php esc_attr( the_title_attribute() ); ?>"><?php the_title(); ?></a></h2>
						<div class="prop-feats"><?php the_field( 'features' ); ?></div>
					</div>
					<div class="col-1-2">
						<div class="land-link"><a href="<?php the_permalink(); ?>">Discover this land</a></div>
						<div class="excerpt"><?php the_excerpt(); ?></div>
						<?php
						$fl_file = get_field( 'map_pdf' );
						if ( $fl_file ) :
							$fl__url = $fl_file['url'];
							$fl_title = $fl_file['title'];
							$fl_caption = $fl_file['caption'];
							?>
							<a href="<?php echo esc_url( $fl__url ); ?>" title="<?php echo esc_attr( $fl_title ); ?>" class="map-link" target="_blank">Download map</a>
						<?php endif; ?>
					</div>
					<div class="cf"></div>
				</div>

				<?php
				echo '</div>';
			endwhile;
			wp_reset_postdata();
		}
		?>
		<div class="cf"></div>
	</div>
</div><!-- /top-block -->



<div class="lands-map">
	<div class="inner-wrap">
		<h2><?php the_field( 'map_section_title' ); ?></h2>
		<div class="land-map">
			<?php the_field( 'map_block' ); ?>
		</div>
	</div>
</div>


<div id="landsend" class="land-list-wrap">
	<div class="inner-wrap">

		<div class="land-list pullright">
			<?php
			$query = new WP_Query( array(
				'post_type' => 'land',
				'posts_per_page' => 30,
				'orderby' => 'date',
				'order' => 'DESC',
			) );

			if ( $query->have_posts() ) {
				while ( $query->have_posts() ) :
					$query->the_post();
					echo '<div class="land-block"><a href="';
					the_permalink();
					echo '" alt="';
					the_title_attribute();
					echo '">';

					if ( has_post_thumbnail() ) :
						echo '<div class="land-thumb">';
						the_post_thumbnail( 'medium' );
						echo '</div>';
					endif;
					$pcount = count( get_field( 'properties', $query->ID ) );
					?>
					<div class="land-stat">
						<span class="num"><?php echo esc_html( $pcount ); ?></span> properties - <span class="num"><?php the_field( 'trails' ); ?></span> trails
					</div>
					<h4><?php the_title(); ?></h4>
					<div class="prop-feats"><?php the_field( 'features' ); ?></div>
				</a></div>
				<?php
				endwhile;
				wp_reset_postdata();
			}
			?>
			<div class="cf"></div>
		</div><!-- /land-list -->

	</div>
</div>
<div class="cf"></div>


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
