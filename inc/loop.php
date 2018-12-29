<?php
/**
 * The Loop
 *
 * @package  clct
 * @subpackage clct/inc
 * @author   Chip Sheppard
 * @since    1.0.0
 * @license  GPL-2.0+
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Default Loop
 */
function clct_default_loop() {

	if ( have_posts() ) :

		tha_content_while_before();

		while ( have_posts() ) :
			the_post();

			tha_entry_before();
			if ( is_page_template( array( 'templates/home.php', 'templates/give.php', 'templates/land.php', 'templates/projects.php', 'templates/trust.php', 'templates/single-land.php', 'templates/single-project.php', '404.php' ) ) ) :
				get_template_part( 'template-parts/content', 'acf' );
			else :
				get_template_part( 'template-parts/content', get_post_format() );
			endif;
			tha_entry_after();

		endwhile;

		tha_content_while_after();

	else :

		tha_entry_before();
		get_template_part( 'template-parts/content', 'none' );
		tha_entry_after();

	endif;
}
add_action( 'tha_content_loop', 'clct_default_loop' );


/**
 * Archive & Search Page Titles
 */
function clct_archive_top() {
	if ( is_home() && ! is_front_page() || is_archive() || is_search() ) :
		echo '<div class="top-block">';
		echo '<div class="inner-wrap">';
		echo '<header class="page-header">';

		if ( is_search() ) :
			echo '<h1 class="page-title">';
			/* translators: %$2s: is the search term */
			printf( '<span>' . esc_html__( 'Search Results for:%1$s %2$s', 'clct' ), '</span>', get_search_query() );
			echo '</h1>';
		else :
			the_archive_title( '<h1 class="page-title">', '</h1>' );
			the_archive_description( '<div class="archive-description">', '</div>' );
		endif;

		echo '</header>';
		echo '</div>';
		echo '</div>';
		echo '<div class="inner-wrap">';
	endif;
}
add_action( 'tha_content_while_before', 'clct_archive_top' );

/**
 * Archive & Search end wrap
 */
function clct_archive_end_wrap() {
	if ( is_home() && ! is_front_page() || is_archive() || is_search() ) :
		echo '</div>';
	endif;
}
add_action( 'tha_content_while_after', 'clct_archive_end_wrap', 15 );


/**
 * Archive Pagination (<< 1 of 10 >>)
 */
function clct_postpagination() {

	if ( is_archive() || is_home() ) :
		the_posts_pagination( array(
			'mid_size' => 2,
			'prev_text' => __( '&laquo; Previous', 'clct' ),
			'next_text' => __( 'Next &raquo;', 'clct' ),
		) );
	endif;

}
add_action( 'tha_content_while_after', 'clct_postpagination', 10 );


/**
 * Post Navigation (prev - next)
 */
function clct_postnav() {

	if ( is_single() ) :
		echo '<div class="inner-wrap">';

		the_post_navigation( array(
			'prev_text' => __( '<span>previous</span> %title', 'clct' ),
			'next_text' => __( '<span>next</span> %title', 'clct' ),
		) );
		echo '</div>';
	endif;

}
add_action( 'tha_entry_after', 'clct_postnav' );


/**
 * Post Comments
 */
function clct_comments() {

	if ( is_singular() && ( comments_open() || get_comments_number() ) ) {
		echo '<div class="inner-wrap">';
		comments_template();
		echo '</div>';
	}

}
add_action( 'tha_content_while_after', 'clct_comments' );
