<?php
/**
 * Template part for displaying a message that posts cannot be found.
 *
 * @package  clct
 * @subpackage clct/template-parts
 * @author   Chip Sheppard
 * @since    1.0.0
 * @license  GPL-2.0+
 */

echo '<section class="no-results not-found">';
echo '<div class="top-block">';
echo '<div class="inner-wrap">';
echo '<header class="page-header">';
	echo '<div class="inner-wrap title-wrap">';
		echo '<h1 class="page-title">' . esc_html__( 'Nothing Found', 'clct' ) . '</h1>';
	echo '</div>';
echo '</header>';
echo '</div>';
echo '</div>';

echo '<div class="page-content">';
echo '<div class="inner-wrap">';

if ( is_home() && current_user_can( 'publish_posts' ) ) :

	echo '<p>' . esc_html__( 'No posts to display.', 'clct' ) . '</p>';

elseif ( is_search() ) :

	echo '<p>' . esc_html__( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'clct' ) . '</p>';
	get_search_form();

else :

	echo '<p>' . esc_html__( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'clct' ) . '</p>';
	get_search_form();

endif;
echo '</div>';
echo '</div>';
echo '</section>';
