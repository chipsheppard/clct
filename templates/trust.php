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

			<div class="col-1-3 first onpage-menu"><div class="opm">
				<?php
				if ( have_rows( 'onpage_menu' ) ) :
					echo '<div class="onpage-menu-menu opm-menu">';
					$c = 0;
					while ( have_rows( 'onpage_menu' ) ) :
						the_row();
						$c++
						?>
						<div class="onpage-menu-item"><a href="#p<?php echo esc_html( $c ); ?>"><?php the_sub_field( 'menu_text' ); ?></a></div>
						<?php
					endwhile;
					echo '</div>';
				endif;
				?>
			</div></div><!-- /onpage-menu -->

			<div class="col-1-3 left">
				<?php the_field( 'top_left' ); ?>
			</div>
			<div class="col-1-3 right">
				<?php the_field( 'top_right' ); ?>
			</div>
			<div class="cf"></div>

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
		<div class="trust-image-image">
			<img src="<?php echo esc_url( $fw_url ); ?>" alt="<?php echo esc_attr( $fw_alt ); ?>" width="<?php echo esc_attr( $fw_width ); ?>" height="<?php echo esc_attr( $fw_height ); ?>" />
			<?php
			$t_link = get_field( 'trust_image_caption' );
			if ( $t_link ) :
				$t_url = $t_link['url'];
				$t_title = $t_link['title'];
			?>
			<div class="image-caption">
				<div class="inner-wrap">
					<a href="<?php echo esc_url( $t_url ); ?>"><?php echo esc_html( $t_title ); ?></a>
				</div>
			</div>
			<?php endif; ?>
		</div>
		<div class="cf"></div>
	</div><!-- /trust-image -->
	<?php endif; ?>


<div id="p1"></div>
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
						<?php
						$l_link = get_field( 'col_image_caption' );
						if ( $l_link ) :
							$l_url = $l_link['url'];
							$l_title = $l_link['title'];
							?>
							<div class="image-caption">
								<a href="<?php echo esc_url( $l_url ); ?>"><?php echo esc_html( $l_title ); ?></a>
							</div>
						<?php
						endif;
					endif;
					?>
				</div>
				<div class="cf"></div>
			</div><!-- /trust-cols -->



<div id="p2"></div>
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
				<div class="desktop-only">&nbsp;</div>
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
						<?php
						$ml_link = get_field( 'message_image_caption' );
						if ( $ml_link ) :
							$ml_url = $ml_link['url'];
							$ml_title = $ml_link['title'];
							?>
							<div class="image-caption pad-l">
								<a href="<?php echo esc_url( $ml_url ); ?>"><?php echo esc_html( $ml_title ); ?></a>
							</div>
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



<div id="p3"></div>
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
						?>
						<img src="<?php echo esc_url( $t_url ); ?>" alt="<?php echo esc_attr( $t_alt ); ?>" width="<?php echo esc_attr( $t_width ); ?>" height="<?php echo esc_attr( $t_height ); ?>" />
					<?php endif; ?>
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
						?>
						<img src="<?php echo esc_url( $d_url ); ?>" alt="<?php echo esc_attr( $d_alt ); ?>" width="<?php echo esc_attr( $d_width ); ?>" height="<?php echo esc_attr( $d_height ); ?>" />
					<?php endif; ?>
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


	<?php if ( have_rows( 'team_members' ) ) : ?>
	<div class="team inner-wrap">
		<div class="section-title"><?php the_field( 'team_section_header' ); ?></div>
		<h2><?php the_field( 'team_section_title' ); ?></h2>
		<?php
		echo '<div class="team-list">';
		while ( have_rows( 'team_members' ) ) :
			the_row();
			?>
			<div class="portrait">
				<?php
				$tm_image = get_sub_field( 'team_image' );
				if ( ! empty( $tm_image ) ) :
					$tm_url = $tm_image['url'];
					$tm_alt = $tm_image['alt'];
					$tm_size = 'medium';
					$tm_thumb = $tm_image['sizes'][ $tm_size ];
					$tm_width = $tm_image['sizes'][ $tm_size . '-width' ];
					$tm_height = $tm_image['sizes'][ $tm_size . '-height' ];
					?>
					<img src="<?php echo esc_url( $tm_url ); ?>" alt="<?php echo esc_attr( $tm_alt ); ?>" width="<?php echo esc_attr( $tm_width ); ?>" height="<?php echo esc_attr( $tm_height ); ?>" />
				<?php endif; ?>
				<div class="title"><?php the_sub_field( 'team_title' ); ?></div>
				<h3><?php the_sub_field( 'team_name' ); ?></h3>
				<?php the_sub_field( 'team_text' ); ?>
			</div>
			<?php
		endwhile;
		echo '<div class="cf"></div>';
		echo '</div>';
		?>
	</div>
	<?php
	endif;

}
add_action( 'tha_entry_content_before', 'clct_trust' );


// Build the page.
get_template_part( 'index' );
