<?php
/**
 * The template for displaying 404 pages (not found).
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
echo '<section class="error-404 not-found">';
echo '<div class="top-block">';
echo '<div class="inner-wrap">';

	echo '<header class="page-header">';
		echo '<div class="title-wrap">';
		echo '<h1 class="page-title">' . esc_html__( 'Page not found.', 'clct' ) . '</h1>';
		echo '<p>' . esc_html__( 'Please use the menu in the header or try a search.', 'clct' ) . '</p>';
		get_search_form();
		echo '</div>';
	echo '</header>';

echo '</div>';
echo '</div>';

echo '</div>';
echo '</div>';
echo '</section>';
tha_content_bottom();
echo '</main>';
tha_content_wrap_after();
echo '</div>';

get_footer();
