<?php
/**
 * GIVE content modules
 *
 * @package  clct
 * @subpackage clct/template-parts
 * @author   Chip Sheppard
 * @since    1.0.0
 * @license  GPL-2.0+
 */

if ( have_rows( 'give_modules' ) ) :
	while ( have_rows( 'give_modules' ) ) :
		the_row();

		switch ( get_row_layout() ) {

			case 'text_block':
				get_template_part( 'template-parts/givemods/givemod-text' );
				break;

			case 'image_block':
				get_template_part( 'template-parts/givemods/givemod-image' );
				break;
		}

	endwhile;
endif;
