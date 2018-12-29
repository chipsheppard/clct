<?php
/**
 * The main template file.
 *
 * @package  clct
 * @author   Chip Sheppard
 * @since    1.0.0
 * @license  GPL-2.0+
 */

do_action( 'clct_init' );

get_header();

echo '<div id="primary" class="content-area">';
	tha_content_wrap_before();
	echo '<main id="main" class="site-main" role="main">';
	tha_content_top();
	tha_content_loop();
	tha_content_bottom();
	echo '</main>';
	tha_content_wrap_after();
echo '</div>';

get_footer();
