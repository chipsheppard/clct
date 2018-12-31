<?php
/**
 * Project Module - Content
 *
 * @package  clct
 * @subpackage clct/template-parts/projmods
 * @author   Chip Sheppard
 * @since    1.0.0
 * @license  GPL-2.0+
 */

if ( get_sub_field( 'image_left_offset' ) ) :
	$l = get_sub_field( 'image_left_offset' );
endif;

if ( get_sub_field( 'image_right_offset' ) ) :
	$r = get_sub_field( 'image_right_offset' );
endif;

$imageleft = get_sub_field( 'image_left' );
if ( ! empty( $imageleft ) ) :
	$lurl = $imageleft['url'];
	$ltitle = $imageleft['title'];
	$lalt = $imageleft['alt'];
	$lcaption = $imageleft['caption'];
	$lsize = 'medium';
	$lthumb = $imageleft['sizes'][ $lsize ];
	$lwidth = $imageleft['sizes'][ $lsize . '-width' ];
	$lheight = $imageleft['sizes'][ $lsize . '-height' ];
endif;

$imageright = get_sub_field( 'image_right' );
if ( ! empty( $imageright ) ) :
	$rurl = $imageright['url'];
	$rtitle = $imageright['title'];
	$ralt = $imageright['alt'];
	$rcaption = $imageright['caption'];
	$rsize = 'medium';
	$rthumb = $imageright['sizes'][ $rsize ];
	$rwidth = $imageright['sizes'][ $rsize . '-width' ];
	$rheight = $imageright['sizes'][ $rsize . '-height' ];
endif;
?>

<div class="projmod projmod-content">
<div class="inner-wrap">

	<div class="col-1-4 first projmod-content-left <?php echo esc_attr( $l ); ?>">
		<?php
		if ( $imageleft ) :
		?>
			<img src="<?php echo esc_url( $lurl ); ?>" alt="<?php echo esc_attr( $lalt ); ?>" width="<?php echo esc_attr( $lwidth ); ?>" height="<?php echo esc_attr( $lheight ); ?>" />
			<?php
			echo '<div class="projmod-content-left-caption caption">';
			echo esc_html( $lcaption );
			echo '</div>';
		else :
			echo '&nbsp;';
		endif;
		?>
	</div>

	<div class="col-1-2 projmod-content-text">
		<?php the_sub_field( 'text' ); ?>
	</div>

	<div class="col-1-4 projmod-content-right <?php echo esc_attr( $r ); ?>">
		<?php
		if ( $imageright ) :
		?>
			<img src="<?php echo esc_url( $rurl ); ?>" alt="<?php echo esc_attr( $ralt ); ?>" width="<?php echo esc_attr( $rwidth ); ?>" height="<?php echo esc_attr( $rheight ); ?>" />
			<?php
			echo '<div class="projmod-content-right-caption caption">';
			echo esc_html( $rcaption );
			echo '</div>';
		else :
			echo '&nbsp;';
		endif;
		?>
	</div>

</div>
</div>
