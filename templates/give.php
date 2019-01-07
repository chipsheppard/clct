<?php
/**
 * Template for Give.
 *
 * Template Name: Give
 *
 * @package  clct
 * @author   Chip Sheppard
 * @since    1.0.0
 * @license  GPL-2.0+
 */

add_filter( 'body_class', function( $classes ) {
	return array_merge( $classes, array( 'give' ) );
} );

/**
 * GIVE
 */
function clct_give() {
	$colorclass = 'brown';
	include( locate_template( 'template-parts/topblock-page.php', false, false ) );
	?>

	<div class="inner-wrap">

		<div class="callout">
			<div class="col-1-2 first left">
				<?php the_field( 'callout_text' ); ?>
			</div>
			<div class="col-1-2 right">
				<?php
				$link = get_field( 'callout_link' );
				if ( $link ) :
					$link_url = $link['url'];
					$link_title = $link['title'];
					$link_target = $link['target'] ? $link['target'] : '_self';
					?>
					<a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" class="btn bluealt wide"><?php echo esc_html( $link_title ); ?></a>
				<?php endif; ?>
			</div>
			<div class="cf"></div>
		</div><!-- /callout -->

		<div class="col-1-3 first onpage-menu">
			<?php
			if ( have_rows( 'onpage_menu' ) ) :
				echo '<div class="onpage-menu-menu">';
				while ( have_rows( 'onpage_menu' ) ) :
					the_row();
					?>
					<div class="onpage-menu-item"><a href="#<?php the_sub_field( 'onpage_menu_link' ); ?>"><?php the_sub_field( 'onpage_menu_text' ); ?></a></div>
					<?php
				endwhile;
				echo '</div>';
			endif;
			?>
		</div><!-- /onpage-menu -->

		<div class="col-2-3 give-modules">
			<?php get_template_part( 'template-parts/give', 'modules' ); ?>
		</div><!-- /give-modules -->

		<div class="cf"></div>
	</div><!-- /inner-wrap -->


	<div class="message">
		<div class="inner-wrap">
			<div class="col-1-2 first">
				<h2><?php the_field( 'message_title' ); ?></h2>
				<div class="sub-text"><?php the_field( 'message_text' ); ?></div>
			</div>
			<div class="col-1-2">
				<div class="message-image">
					<?php
					$image = get_field( 'message_image' );
					if ( ! empty( $image ) ) :
						$url = $image['url'];
						$title = $image['title'];
						$alt = $image['alt'];
						$caption = $image['caption'];
						$width = $image['width'];
						$height = $image['height'];
						?>
						 <img src="<?php echo esc_url( $url ); ?>" alt="<?php echo esc_attr( $alt ); ?>" width="<?php echo esc_attr( $width ); ?>" height="<?php echo esc_attr( $height ); ?>" />
						<?php if ( $caption ) : ?>
							<div class="message-image-caption"><span><?php echo esc_html( $caption ); ?></span></div>
						<?php
						endif;
					endif;
					?>
				</div>
			</div>
		</div>
	</div><!-- /message -->

<?php
}
add_action( 'tha_entry_content_before', 'clct_give' );


// Build the page.
get_template_part( 'index' );
