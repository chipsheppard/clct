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

	$count = count( get_field( 'properties' ) );
?>
<div class="top-block">
	<div class="inner-wrap">

		<header class="entry-header">
			<div class="return"><a href="/lands/">View all land</a></div>
			<h1 class="entry-title"><?php the_title(); ?></h1>
		</header>

		<div class="col-1-4 first top-left">
			<div class="land-stats">
				<div>Acquired <span class="sep">/</span> <span class="num"><?php the_field( 'year_acquired' ); ?></span></div>
				<div>Size <span class="sep">/</span> <span class="num"><?php the_field( 'size' ); ?></span> acres</div>
				<?php if ( $count ) : ?>
					<div>Properties <span class="sep">/</span> <span class="num"><?php echo esc_html( $count ); ?></span></div>
				<?php endif; ?>
				<div>Trails <span class="sep">/</span> <span class="num"><?php the_field( 'trails' ); ?></span></div>
			</div>
		</div>
		<div class="col-3-4 top-right">
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
</div><!-- /top-block -->


<div class="land-content">
	<div class="inner-wrap">

		<div class="col-1-2 first land-content-left">
			<?php the_content(); ?>
		</div>
		<div class="col-1-2 land-content-right">
			<h3>Features</h3>
			<p><?php the_field( 'features' ); ?></p>
			<h3>Trail Conditions</h3>
			<p><?php the_field( 'trial_conditions' ); ?></p>
			<h3>Entrances <spanclass="sep">/</span> parking</h3>
			<p><?php the_field( 'entpark' ); ?></p>
		</div>

	</div>
</div><!-- /land-content -->


<div class="properties-map">
	<?php
	$image = get_field( 'map_image' );
	if ( ! empty( $image ) ) :
		$url = $image['url'];
		$title = $image['title'];
		$alt = $image['alt'];
		$caption = $image['caption'];
		$size = 'large';
		$thumb = $image['sizes'][ $size ];
		$width = $image['sizes'][ $size . '-width' ];
		$height = $image['sizes'][ $size . '-height' ];
	endif;
	?>
	<img src="<?php echo esc_url( $url ); ?>" alt="<?php echo esc_attr( $alt ); ?>" width="<?php echo esc_attr( $width ); ?>" height="<?php echo esc_attr( $height ); ?>" />

	<div class="inner-wrap">
		<div class="map-link">
			<?php
			$file = get_field( 'map_pdf' );
			if ( $file ) :
				$file_url = $file['url'];
				$file_title = $file['title'];
				$file_caption = $file['caption'];
				if ( $file_caption ) :
				?>
				<span class="map-link-caption"><?php echo esc_html( $file_caption ); ?></span>
				<?php endif; ?>
				<a href="<?php echo esc_url( $file_url ); ?>" title="<?php echo esc_attr( $file_title ); ?>" target="_blank"><?php echo esc_html( $file_title ); ?></a>
			<?php endif; ?>
		</div><!-- /map-link -->
	</div>
</div><!-- /properties-map -->


<div class="properties">
	<div class="inner-wrap">

		<h2><?php the_field( 'properties_section_title' ); ?></h2>

		<div class="property-list">
			<?php
			if ( have_rows( 'properties' ) ) :
				while ( have_rows( 'properties' ) ) :
					the_row();
					?>

					<div class="property">
						<?php
						$p_image = get_sub_field( 'image' );
						if ( ! empty( $p_image ) ) :
							$p_url = $p_image['url'];
							$p_title = $p_image['title'];
							$p_alt = $p_image['alt'];
							$p_caption = $p_image['caption'];
							$p_size = 'large';
							$p_thumb = $p_image['sizes'][ $p_size ];
							$p_width = $p_image['sizes'][ $p_size . '-width' ];
							$p_height = $p_image['sizes'][ $p_size . '-height' ];
						endif;
						?>
						<img src="<?php echo esc_url( $p_url ); ?>" alt="<?php echo esc_attr( $p_alt ); ?>" width="<?php echo esc_attr( $p_width ); ?>" height="<?php echo esc_attr( $p_height ); ?>" />
						<h3><span><?php the_sub_field( 'title' ); ?></span></h3>
						<div class="property-text"><?php the_sub_field( 'text' ); ?></div>
					</div>

					<?php
				endwhile;
			endif;
			?>
		</div>
	</div>
</div>

<div class="land-list-wrap">
	<div class="inner-wrap">
		<h2><?php the_field( 'land_section_title' ); ?></h2>

		<div class="land-list">
			<?php
			$query = new WP_Query( array(
				'post_type' => 'land',
				'posts_per_page' => 3,
				'orderby' => 'date',
				'order' => 'DESC',
			) );

			if ( $query->have_posts() ) {
				while ( $query->have_posts() ) :
					$query->the_post();
					echo '<div class="land-block">';

					if ( has_post_thumbnail() ) :
						echo '<div class="land-thumb">';
						the_post_thumbnail( 'medium' );
						echo '</div>';
					endif;
					$pcount = count( get_field( 'properties', $query->ID ) );
					?>
					<div class="excerpt">
						<span class="num"><?php echo esc_html( $pcount ); ?></span> properties - <span class="num"><?php the_field( 'trails' ); ?></span> trails
					</div>
					<h4><a href="<?php the_permalink(); ?>" title="<?php esc_attr( the_title_attribute() ); ?>"><?php the_title(); ?></a></h4>
					<div class="prop-feats"><?php the_field( 'features' ); ?></div>
				</div>
				<?php
				endwhile;
				wp_reset_postdata();
			}
			?>
			<div class="cf"></div>
		</div><!-- /land-list -->

		<div class="view-more">
			<a href="/lands/" class="vm">
				<div class="cssicon-arrow-r"></div>
				<div class="view-text">View all</div>
			</a>
		</div>

	</div><!-- /inner-wrap -->
</div><!-- /land-list-wrap -->


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
