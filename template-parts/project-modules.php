<?php
/**
 * Project content modules
 *
 * @package  clct
 * @subpackage clct/template-parts
 * @author   Chip Sheppard
 * @since    1.0.0
 * @license  GPL-2.0+
 */

if ( have_rows( 'project_modules' ) ) :
	while ( have_rows( 'project_modules' ) ) :
		the_row();

		switch ( get_row_layout() ) {

			case 'content_block':
				get_template_part( 'template-parts/projmods/projmod-content' );
				break;

			case 'quote_block':
				get_template_part( 'template-parts/projmods/projmod-quote' );
				break;

			case 'heading_block':
				get_template_part( 'template-parts/projmods/projmod-heading' );
				break;

			case 'image_block':
				get_template_part( 'template-parts/projmods/projmod-image' );
				break;

		}

	endwhile;
endif;
