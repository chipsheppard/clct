<?php
/**
 * Template part - Top Block for pages
 *
 * @package  clct
 * @subpackage clct/template-parts
 * @author   Chip Sheppard
 * @since    1.0.0
 * @license  GPL-2.0+
 */

?>

<div class="top-block">
<div class="inner-wrap">

	<div class="col-3-7 first">
		<div class="intro">
			<div class="intro-text"><?php the_content(); ?></div>
			<?php if ( get_field( 'button_url' ) ) : ?>
			<a href="<?php the_field( 'button_url' ); ?>" class="btn <?php echo esc_html( $colorclass ); ?>"><?php the_field( 'button_text' ); ?></a>
			<?php endif; ?>
		</div>
	</div>

	<div class="col-4-7 vid">
		<video id="homepage-video" muted autoplay loop poster="<?php the_field( 'poster_image' ); ?>" width="666" height="1000" src="<?php the_field( 'mp4_video' ); ?>">
		</video>
	</div>

</div>
</div>
