<?php
/**
 * Project Module - Quote
 *
 * @package  clct
 * @subpackage clct/template-parts/projmods
 * @author   Chip Sheppard
 * @since    1.0.0
 * @license  GPL-2.0+
 */

?>
<div class="projmod projmod-quote">
<div class="inner-wrap">
	<div class="col-1-4 first desktop-only">&nbsp;</div>
	<div class="col-1-2">
		<blockquote>
			<?php the_sub_field( 'quote' ); ?>
			<?php if ( get_sub_field( 'quote_citation' ) ) : ?>
			<cite><?php the_sub_field( 'quote_citation' ); ?></cite>
			<?php endif; ?>
		</blockquote>
	</div>
	<div class="col-1-4 desktop-only">&nbsp;</div>
</div>
</div>
