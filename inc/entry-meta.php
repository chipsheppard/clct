<?php
/**
 * Entry Meta functions
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
 * Date - Posted on.
 */
function clct_posted_on() {

	$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date( 'M j, Y' ) )
	);

	$posted_on = sprintf(
		esc_html( '%s', 'post date', 'clct' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	echo '<span class="posted-on">' . $posted_on . '</span> '; // WPCS: XSS OK.
}

/**
 * Date - Updated.
 */
function clct_updated_on() {

	if ( get_the_time( 'U' ) === get_the_modified_time( 'U' ) ) {
		return;
	}

	$updated_string = '<time class="entry-date updated" datetime="%1$s">%2$s</time>';

	$updated_string = sprintf( $updated_string,
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date( 'm/d/Y' ) )
	);
	$updated_on = sprintf(
		/* translators: %s: modified date. */
		esc_html_x( 'updated %s', 'modified date', 'clct' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $updated_string . '</a>'
	);

	echo '<span class="updated-on">' . $updated_on . '</span>'; // WPCS: XSS OK.
}

/**
 * Current Author.
 */
function clct_posted_by() {

	$byline = sprintf(
		/* translators: %s: post author */
		esc_html_x( 'by %s', 'post author', 'clct' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="byline">' . $byline . '</span>'; // WPCS: XSS OK.
}

/**
 * Comments Count.
 */
function clct_comment_count() {

	$num_comments = get_comments_number();

	if ( ! is_single() && ! post_password_required() && comments_open() && ( $num_comments > 0 ) ) {
		echo '<span class="comments-link">';
		comments_popup_link(
			sprintf(
				wp_kses(
					/* translators: %s: post title */
					__( 'Comment<span class="screen-reader-text"> on %s</span>', 'clct' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			)
		);
		echo '</span>';
	}
}

/**
 * DISPLAY the entry meta
 */
function clct_display_entry_meta() {
	if ( 'post' === get_post_type() ) :
		echo '<div class="entry-meta">';
		clct_posted_on();
		clct_posted_by();
		clct_comment_count();
		clct_updated_on();
		echo '</div>';
	endif;
}
add_action( 'tha_entry_top', 'clct_display_entry_meta' );
