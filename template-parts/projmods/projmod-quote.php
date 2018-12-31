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
	<div class="col-1-4 first">&nbsp;</div>
	<div class="col-1-2">
		<blockquote>
			<?php the_sub_field( 'quote' ); ?>
		</blockquote>
	</div>
	<div class="col-1-4">&nbsp;</div>
</div>
</div>
