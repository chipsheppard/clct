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

		<?php if ( get_field( 'callout_text' ) ) : ?>
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
		</div>
		<?php endif; ?>

		<div class="col-1-3 first onpage-menu"><div class="opm">
			<?php
			if ( have_rows( 'give_modules' ) ) :
				echo '<div class="onpage-menu-menu opm-menu">';
				$c = 0;
				while ( have_rows( 'give_modules' ) ) :
					the_row();
					$c++;
					if ( get_sub_field( 'onpage_menu_anchor' ) ) :
					?>
						<div class="onpage-menu-item"><a href="#p<?php echo esc_html( $c ); ?>"><?php the_sub_field( 'onpage_menu_anchor' ); ?></a></div>
					<?php
					endif;
				endwhile;
				echo '</div>';
			endif;
			?>
		</div></div><!-- /onpage-menu -->

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
					$m_image = get_field( 'message_image' );
					$m_link = get_field( 'message_image_caption' );
					if ( ! empty( $m_image ) ) :
						$m_url = $m_image['url'];
						$m_title = $m_image['title'];
						$m_alt = $m_image['alt'];
						$m_width = $m_image['width'];
						$m_height = $m_image['height'];
						?>
						 <img src="<?php echo esc_url( $m_url ); ?>" alt="<?php echo esc_attr( $m_alt ); ?>" width="<?php echo esc_attr( $m_width ); ?>" height="<?php echo esc_attr( $m_height ); ?>" />
						<?php
						if ( $m_link ) :
							$m_link_url = $m_link['url'];
							$m_link_title = $m_link['title'];
							?>
							<div class="image-caption"><a href="<?php echo esc_url( $m_link_url ); ?>"><?php echo esc_html( $m_link_title ); ?></a></div>
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
