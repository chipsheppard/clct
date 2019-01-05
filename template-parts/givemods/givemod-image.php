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
<div class="givemod-image">

<?php if ( $image ) : ?>
	<div class="givemod-image-image">
		<img src="<?php echo esc_url( $url ); ?>" alt="<?php echo esc_attr( $alt ); ?>" width="<?php echo esc_attr( $width ); ?>" height="<?php echo esc_attr( $height ); ?>" />
		<div class="givemod-image-caption">
			<div class="inner-wrap">
				<span><?php echo esc_html( $caption ); ?></span>
			</div>
		</div>
	</div>
<?php endif; ?>
<div class="cf"></div>

</div>
