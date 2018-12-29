<?php
/**
 * Template part for PAGES
 *
 * @package  clct
 * @subpackage clct/template-parts
 * @author   Chip Sheppard
 * @since    1.0.0
 * @license  GPL-2.0+
 */

echo '<article id="post-' . get_the_ID() . '" class="' . join( ' ', get_post_class() ) . '">'; // WPCS: XSS OK.

tha_entry_top();

tha_entry_content_before();
tha_entry_content_after();

tha_entry_bottom();

echo '</article>';
