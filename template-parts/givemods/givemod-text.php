<?php
/**
 * GIVE Module - Text
 *
 * @package  clct
 * @subpackage clct/template-parts/givemods
 * @author   Chip Sheppard
 * @since    1.0.0
 * @license  GPL-2.0+
 */

?>
<a name="<?php the_sub_field( 'onpage_menu_anchor' ); ?>"></a>
<div class="givemod givemod-text">
	<div class="inner-wrap">
		<h2><?php the_sub_field( 'givemod_text_title' ); ?></h2>
		<?php the_sub_field( 'givemod_text_text' ); ?>
	</div>
</div>
