<?php
/**
 * Template part for the content area
 *
 * @package  clct
 * @subpackage clct/template-parts
 * @author   Chip Sheppard
 * @since    1.0.0
 * @license  GPL-2.0+
 */

echo '<article id="post-' . get_the_ID() . '" class="' . join( ' ', get_post_class() ) . '">'; // WPCS: XSS OK.

if ( ! is_singular() && ! is_search() && ! has_post_format( 'aside' ) && ! has_post_format( 'status' ) && has_post_thumbnail() ) :

	echo '<a href="' . esc_url( get_permalink() ) . '" class="fi-link">';
	the_post_thumbnail( 'post-thumbnail', [
		'class' => 'featured-image',
		'title' => 'Feature image',
	] );
	echo '</a>';

elseif ( is_search() && has_post_thumbnail() ) :

	echo '<a href="' . esc_url( get_permalink() ) . '" class="fi-link">';
	the_post_thumbnail( 'thumbnail', [
		'class' => 'featured-image',
		'title' => 'Feature image',
	] );
	echo '</a>';

endif;

if ( is_singular() ) :
	echo '<div class="top-block">';
	echo '<div class="inner-wrap">';
endif;

echo '<header class="entry-header">';

if ( is_singular() ) :
	// Title for posts, attachments, pages, custom post types.
	the_title( '<h1 class="entry-title">', '</h1>' );
else :
	// Title for archives & search.
	the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
endif;

echo '</header>';

tha_entry_top();

if ( is_singular() ) :
	echo '</div>';
	echo '</div>';
endif;

echo '<div class="entry-content">';

tha_entry_content_before();

if ( is_singular() ) : // single posts, attachments, pages, custom post types.

	echo '<div class="inner-wrap">';

	the_content();

	wp_link_pages( array(
		'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'clct' ),
		'after'  => '</div>',
	) );

	echo '</div>';

else : // archives & search.

	the_excerpt();

endif;

tha_entry_content_after();

echo '</div>';

tha_entry_bottom();

echo '</article>';
