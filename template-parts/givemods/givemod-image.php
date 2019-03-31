<?php
/**
 * GIVE Module - Image
 *
 * @package  clct
 * @subpackage clct/template-parts/givemods
 * @author   Chip Sheppard
 * @since    1.0.0
 * @license  GPL-2.0+
 */

$image = get_sub_field( 'givemod_image' );
$link = get_sub_field( 'givemod_caption' );
if ( ! empty( $image ) ) :
	$url = $image['url'];
	$title = $image['title'];
	$alt = $image['alt'];
	$caption = $image['caption'];
	$size = 'large';
	$thumb = $image['sizes'][ $size ];
	$width = $image['sizes'][ $size . '-width' ];
	$height = $image['sizes'][ $size . '-height' ];
	?>
	<div class="givemod-image opm-target">

	<?php if ( $image ) : ?>
		<div class="givemod-image-image">
			<img src="<?php echo esc_url( $url ); ?>" alt="<?php echo esc_attr( $alt ); ?>" width="<?php echo esc_attr( $width ); ?>" height="<?php echo esc_attr( $height ); ?>" />
			<div class="givemod-image-caption">
				<div class="inner-wrap">
					<?php
					if ( $link ) :
						$link_url = $link['url'];
						$link_title = $link['title'];
						?>
						<div class="image-caption"><a href="<?php echo esc_url( $link_url ); ?>"><?php echo esc_html( $link_title ); ?></a></div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	<?php endif; ?>
	<div class="cf"></div>
	</div>
<?php endif; ?>
