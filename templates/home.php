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

		<div class="top-left col-1-2 first">
			<?php
			$t1_image = get_field( 'top_image' );
			if ( ! empty( $t1_image ) ) :
				$t1_url = $t1_image['url'];
				$t1_title = $t1_image['title'];
				$t1_alt = $t1_image['alt'];
				$t1_caption = $t1_image['caption'];
				$t1_size = 'large';
				$t1_width = $t1_image['sizes'][ $t1_size . '-width' ];
				$t1_height = $t1_image['sizes'][ $t1_size . '-height' ];
				?>
				 <img src="<?php echo esc_url( $t1_url ); ?>" alt="<?php echo esc_attr( $t1_alt ); ?>" width="<?php echo esc_attr( $t1_width ); ?>" height="<?php echo esc_attr( $t1_height ); ?>" />
				<?php if ( $t1_caption ) : ?>
					<div class="message-image-caption"><span><?php echo esc_html( $t1_caption ); ?></span></div>
				<?php
				endif;
			endif;
			?>
		</div>

		<div class="top-right col-1-2">
			<h2><?php the_field( 'top_title' ); ?></h2>

			<div class="top-text">
				<?php the_field( 'top_text' ); ?>
			</div>
			<div class="top-button">
				<?php
				$t_link = get_field( 'top_link' );
				if ( $t_link ) :
					$t_link_url = $t_link['url'];
					$t_link_title = $t_link['title'];
					$t_link_target = $t_link['target'] ? $t_link['target'] : '_self';
					?>
					<a href="<?php echo esc_url( $t_link_url ); ?>" target="<?php echo esc_attr( $t_link_target ); ?>" class="btn alt"><?php echo esc_html( $t_link_title ); ?></a>
				<?php endif; ?>
			</div>
		</div>
		<div class="cf"></div>


		<div class="mid-left col-1-3 first">
			<?php
			$t2_image = get_field( 'mid_left_image' );
			if ( ! empty( $t2_image ) ) :
				$t2_url = $t2_image['url'];
				$t2_title = $t2_image['title'];
				$t2_alt = $t2_image['alt'];
				$t2_caption = $t2_image['caption'];
				$t2_size = 'medium';
				$t2_width = $t2_image['sizes'][ $t2_size . '-width' ];
				$t2_height = $t2_image['sizes'][ $t2_size . '-height' ];
				?>
				 <img src="<?php echo esc_url( $t2_url ); ?>" alt="<?php echo esc_attr( $t2_alt ); ?>" width="<?php echo esc_attr( $t2_width ); ?>" height="<?php echo esc_attr( $t2_height ); ?>" />
				<?php if ( $t2_caption ) : ?>
					<div class="message-image-caption"><span><?php echo esc_html( $t2_caption ); ?></span></div>
				<?php
				endif;
			endif;
			?>
			<div class="mid-left-stat">
				<?php the_field( 'mid_left_stat' ); ?>
			</div>
			<div class="mid-left-text">
				<?php the_field( 'mid_left_text' ); ?>
			</div>
		</div>

		<div class="mid-right col-2-3">
			<?php
			$t3_image = get_field( 'mid_right_image' );
			if ( ! empty( $t3_image ) ) :
				$t3_url = $t3_image['url'];
				$t3_title = $t3_image['title'];
				$t3_alt = $t3_image['alt'];
				$t3_caption = $t3_image['caption'];
				$t3_size = 'large';
				$t3_width = $t3_image['sizes'][ $t3_size . '-width' ];
				$t3_height = $t3_image['sizes'][ $t3_size . '-height' ];
				?>
				 <img src="<?php echo esc_url( $t3_url ); ?>" alt="<?php echo esc_attr( $t3_alt ); ?>" width="<?php echo esc_attr( $t3_width ); ?>" height="<?php echo esc_attr( $t3_height ); ?>" />
				<?php if ( $t3_caption ) : ?>
					<div class="message-image-caption"><span><?php echo esc_html( $t3_caption ); ?></span></div>
				<?php
				endif;
			endif;
			?>
		</div>
		<div class="cf"></div>

	</div><!-- /inner-wrap -->

	<div class="home-bottom">

		<div class="lower-left">
			<?php
			$ll_image = get_field( 'lower_left_image' );
			if ( ! empty( $ll_image ) ) :
				$ll_url = $ll_image['url'];
				$ll_caption = $ll_image['caption'];
				?>
				<div class="ibg" style="background-image:url(<?php echo esc_url( $ll_url ); ?>)"></div>
				<?php if ( $ll_caption ) : ?>
					<div class="message-image-caption"><span><?php echo esc_html( $ll_caption ); ?></span></div>
				<?php
				endif;
			endif;
			?>
		</div>

		<div class="lower-right">
			<?php
			$lr_image = get_field( 'lower_right_image' );
			if ( ! empty( $lr_image ) ) :
				$lr_url = $lr_image['url'];
				$lr_caption = $lr_image['caption'];
				?>
				<div class="ibg" style="background-image:url(<?php echo esc_url( $lr_url ); ?>)"></div>
				<?php if ( $lr_caption ) : ?>
					<div class="message-image-caption"><span><?php echo esc_html( $lr_caption ); ?></span></div>
				<?php
				endif;
			endif;
			?>
		</div>
		<div class="cf"></div>

		<div class="inner-wrap">

			<div class="bottom-left col-1-2 first">
				<h2><?php the_field( 'bottom_title' ); ?></h2>

				<div class="bottom-text">
					<?php the_field( 'bottom_text' ); ?>
				</div>
				<div class="bottom-button">
					<?php
					$b_link = get_field( 'bottom_link' );
					if ( $b_link ) :
						$b_link_url = $b_link['url'];
						$b_link_title = $b_link['title'];
						$b_link_target = $b_link['target'] ? $b_link['target'] : '_self';
						?>
						<a href="<?php echo esc_url( $b_link_url ); ?>" target="<?php echo esc_attr( $b_link_target ); ?>" class="btn olive"><?php echo esc_html( $b_link_title ); ?></a>
					<?php endif; ?>
				</div>
			</div>

			<div class="bottom-right col-1-2">
				<?php
				$b_image = get_field( 'bottom_image' );
				if ( ! empty( $b_image ) ) :
					$b_url = $b_image['url'];
					$b_title = $b_image['title'];
					$b_alt = $b_image['alt'];
					$b_caption = $b_image['caption'];
					$b_size = 'large';
					$b_width = $b_image['sizes'][ $b_size . '-width' ];
					$b_height = $b_image['sizes'][ $b_size . '-height' ];
					?>
					 <img src="<?php echo esc_url( $b_url ); ?>" alt="<?php echo esc_attr( $b_alt ); ?>" width="<?php echo esc_attr( $b_width ); ?>" height="<?php echo esc_attr( $b_height ); ?>" />
					<?php if ( $b_caption ) : ?>
						<div class="message-image-caption"><span><?php echo esc_html( $b_caption ); ?></span></div>
					<?php
					endif;
				endif;
				?>
			</div>
			<div class="cf"></div>


		</div><!-- /inner-wrap -->
	</div><!-- /home-bottom -->

<?php
}
add_action( 'tha_entry_content_before', 'clct_home' );


// Build the page.
get_template_part( 'index' );
