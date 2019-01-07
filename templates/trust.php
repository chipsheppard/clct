<?php
/**
 * Template for Trust.
 *
 * Template Name: Trust
 *
 * @package  clct
 * @author   Chip Sheppard
 * @since    1.0.0
 * @license  GPL-2.0+
 */

add_filter( 'body_class', function( $classes ) {
	return array_merge( $classes, array( 'trust' ) );
} );

/**
 * TRUST
 */
function clct_trust() {
	$colorclass = 'blue';
	include( locate_template( 'template-parts/topblock-page.php', false, false ) );
	?>

	<div class="trust-top">
		<div class="inner-wrap">

			<div class="col-1-3 first onpage-menu">
				<?php
				if ( have_rows( 'onpage_menu' ) ) :
					echo '<div class="onpage-menu-menu">';
					$c = 0;
					while ( have_rows( 'onpage_menu' ) ) :
						the_row();
						$c++
						?>
						<div class="onpage-menu-item"><a href="#<?php echo 't' . esc_html( $c ); ?>"><?php the_sub_field( 'menu_text' ); ?></a></div>
						<?php
					endwhile;
					echo '</div>';
				endif;
				?>
			</div><!-- /onpage-menu -->

			<div class="col-1-3 left">
				<?php the_field( 'top_left' ); ?>
			</div>
			<div class="col-1-3 right">
				<?php the_field( 'top_right' ); ?>
			</div>

		</div><!-- /inner-wrap -->
	</div><!-- /trust-top -->



	<?php
	$fw_image = get_field( 'trust_image' );
	if ( ! empty( $fw_image ) ) :
		$fw_url = $fw_image['url'];
		$fw_alt = $fw_image['alt'];
		$fw_caption = $fw_image['caption'];
		$fw_width = $fw_image['width'];
		$fw_height = $fw_image['height'];
	?>
	<div class="trust-image">
		<?php if ( $fw_image ) : ?>
		<div class="trust-image-image">
			<img src="<?php echo esc_url( $fw_url ); ?>" alt="<?php echo esc_attr( $fw_alt ); ?>" width="<?php echo esc_attr( $fw_width ); ?>" height="<?php echo esc_attr( $fw_height ); ?>" />
			<?php if ( $fw_caption ) : ?>
			<div class="trust-image-caption">
				<div class="inner-wrap">
					<span><?php echo esc_html( $fw_caption ); ?></span>
				</div>
			</div>
			<?php endif; ?>
		</div>
		<?php endif; ?>
		<div class="cf"></div>
	</div><!-- /trust-image -->
	<?php endif; ?>


	<a name="t1"></a>
	<div class="trust-mid">
		<div class="inner-wrap">

			<h2><?php the_field( 'mid_header_one' ); ?></h2>

			<div class="trust-cols">

				<div class="col-1-3 first col-txt">
					<h3><?php the_field( 'col_one_head' ); ?></h3>
					<div class="text">
						<?php the_field( 'col_one_text' ); ?>
					</div>
					<?php if ( get_field( 'col_one_extra' ) ) : ?>
						<div class="extra">
							<?php the_field( 'col_one_extra' ); ?>
						</div>
						<div class="expand"><span class="e">Expand to read more</span><span class="c">Collapse</span></div>
					<?php endif; ?>
				</div>
				<div class="col-1-3 col-txt">
					<h3><?php the_field( 'col_two_head' ); ?></h3>
					<div class="text">
						<?php the_field( 'col_two_text' ); ?>
					</div>
					<?php if ( get_field( 'col_two_extra' ) ) : ?>
						<div class="extra">
							<?php the_field( 'col_two_extra' ); ?>
						</div>
						<div class="expand"><span class="e">Expand to read more</span><span class="c">Collapse</span></div>
					<?php endif; ?>
				</div>
				<div class="col-1-3 col-txt">
					<h3><?php the_field( 'col_three_head' ); ?></h3>
					<div class="text">
						<?php the_field( 'col_three_text' ); ?>
					</div>
					<?php if ( get_field( 'col_three_extra' ) ) : ?>
						<div class="extra">
							<?php the_field( 'col_three_extra' ); ?>
						</div>
						<div class="expand"><span class="e">Expand to read more</span><span class="c">Collapse</span></div>
					<?php endif; ?>
				</div>
				<div class="col-1-3 first nm col-txt">
					<h3><?php the_field( 'col_four_head' ); ?></h3>
					<div class="text">
						<?php the_field( 'col_four_text' ); ?>
					</div>
					<?php if ( get_field( 'col_four_extra' ) ) : ?>
						<div class="extra">
							<?php the_field( 'col_four_extra' ); ?>
						</div>
						<div class="expand"><span class="e">Expand to read more</span><span class="c">Collapse</span></div>
					<?php endif; ?>
				</div>
				<div class="col-2-3 col-image">
					<?php
					$image = get_field( 'col_image' );
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
							<div class="col-image-caption"><span><?php echo esc_html( $caption ); ?></span></div>
						<?php
						endif;
					endif;
					?>
				</div>
				<div class="cf"></div>
			</div><!-- /trust-cols -->

			<a name="t2"></a>
			<h2><?php the_field( 'mid_header_two' ); ?></h2>

			<div class="trust-cols">
				<div class="col-1-3 first col-txt">
					<h3><?php the_field( 'col_five_head' ); ?></h3>
					<div class="text">
						<?php the_field( 'col_five_text' ); ?>
					</div>
					<?php if ( get_field( 'col_five_extra' ) ) : ?>
						<div class="extra">
							<?php the_field( 'col_five_extra' ); ?>
						</div>
						<div class="expand"><span class="e">Expand to read more</span><span class="c">Collapse</span></div>
					<?php endif; ?>
				</div>
				<div class="col-1-3 col-txt">
					<h3><?php the_field( 'col_six_head' ); ?></h3>
					<div class="text">
						<?php the_field( 'col_six_text' ); ?>
					</div>
					<?php if ( get_field( 'col_six_extra' ) ) : ?>
						<div class="extra">
							<?php the_field( 'col_six_extra' ); ?>
						</div>
						<div class="expand"><span class="e">Expand to read more</span><span class="c">Collapse</span></div>
					<?php endif; ?>
				</div>
				<div class="col-1-3 col-txt">
					<h3><?php the_field( 'col_seven_head' ); ?></h3>
					<div class="text">
						<?php the_field( 'col_seven_text' ); ?>
					</div>
					<?php if ( get_field( 'col_seven_extra' ) ) : ?>
						<div class="extra">
							<?php the_field( 'col_seven_extra' ); ?>
						</div>
						<div class="expand"><span class="e">Expand to read more</span><span class="c">Collapse</span></div>
					<?php endif; ?>
				</div>
				<div class="cf"></div>

			</div><!-- /trust-cols -->
		</div><!-- /inner-wrap -->
	</div><!-- /land-mid -->



	<div class="message">
		<div class="inner-wrap">
			<div class="col-1-2 first">
				&nbsp;
				<div class="message-image">
					<?php
					$m_image = get_field( 'message_image' );
					if ( ! empty( $m_image ) ) :
						$m_url = $m_image['url'];
						$m_alt = $m_image['alt'];
						$m_caption = $m_image['caption'];
						$m_width = $m_image['width'];
						$m_height = $m_image['height'];
						?>
						<img src="<?php echo esc_url( $m_url ); ?>" alt="<?php echo esc_attr( $m_alt ); ?>" width="<?php echo esc_attr( $m_width ); ?>" height="<?php echo esc_attr( $m_height ); ?>" />
						<?php if ( $m_caption ) : ?>
							<div class="message-image-caption"><span><?php echo esc_html( $m_caption ); ?></span></div>
						<?php
						endif;
					endif;
					?>
				</div>
			</div>
			<div class="col-1-2">
				<div class="text"><?php the_field( 'message_text' ); ?></div>
			</div>
			<div class="cf"></div>
		</div>
	</div><!-- /message -->



	<a name="t3"></a>
	<div class="trustees inner-wrap">
		<div class="section-title"><?php the_field( 'trustee_section_header' ); ?></div>
		<h2><?php the_field( 'trustee_section_title' ); ?></h2>
		<?php
		if ( have_rows( 'trustees' ) ) :
			echo '<div class="team-list">';
			while ( have_rows( 'trustees' ) ) :
				the_row();
				?>
				<div class="portrait">
					<?php
					$t_image = get_sub_field( 'trustee_image' );
					if ( ! empty( $t_image ) ) :
						$t_url = $t_image['url'];
						$t_alt = $t_image['alt'];
						$t_size = 'medium';
						$t_thumb = $t_image['sizes'][ $t_size ];
						$t_width = $t_image['sizes'][ $t_size . '-width' ];
						$t_height = $t_image['sizes'][ $t_size . '-height' ];
					endif;
					?>
					<img src="<?php echo esc_url( $t_url ); ?>" alt="<?php echo esc_attr( $t_alt ); ?>" width="<?php echo esc_attr( $t_width ); ?>" height="<?php echo esc_attr( $t_height ); ?>" />
					<div class="title"><?php the_sub_field( 'trustee_title' ); ?></div>
					<h3><?php the_sub_field( 'trustee_name' ); ?></h3>
					<?php the_sub_field( 'trustee_text' ); ?>
				</div>
				<?php
			endwhile;
			echo '<div class="cf"></div>';
			echo '</div>';
		endif;
		?>
	</div>


	<div class="directors inner-wrap">
		<div class="section-title"><?php the_field( 'director_section_header' ); ?></div>
		<h2><?php the_field( 'director_section_title' ); ?></h2>
		<?php
		if ( have_rows( 'directors' ) ) :
			echo '<div class="team-list">';
			while ( have_rows( 'directors' ) ) :
				the_row();
				?>
				<div class="portrait">
					<?php
					$d_image = get_sub_field( 'director_image' );
					if ( ! empty( $d_image ) ) :
						$d_url = $d_image['url'];
						$d_alt = $d_image['alt'];
						$d_size = 'medium';
						$d_thumb = $d_image['sizes'][ $d_size ];
						$d_width = $d_image['sizes'][ $d_size . '-width' ];
						$d_height = $d_image['sizes'][ $d_size . '-height' ];
					endif;
					?>
					<img src="<?php echo esc_url( $d_url ); ?>" alt="<?php echo esc_attr( $d_alt ); ?>" width="<?php echo esc_attr( $d_width ); ?>" height="<?php echo esc_attr( $d_height ); ?>" />
					<div class="title"><?php the_sub_field( 'director_title' ); ?></div>
					<h3><?php the_sub_field( 'director_name' ); ?></h3>
					<?php the_sub_field( 'director_text' ); ?>
				</div>
				<?php
			endwhile;
			echo '<div class="cf"></div>';
			echo '</div>';
		endif;
		?>
	</div>

	<?php
}
add_action( 'tha_entry_content_before', 'clct_trust' );


// Build the page.
get_template_part( 'index' );
