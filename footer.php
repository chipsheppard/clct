<?php
/**
 * Site footer
 *
 * @package  clct
 * @author   Chip Sheppard
 * @since    1.0.0
 * @license  GPL-2.0+
 */

tha_content_after();
echo '</div>'; // .site-content.

tha_footer_before();
echo '<footer id="colophon" class="site-footer" role="contentinfo">';
echo '<div class="inner-wrap">';
	tha_footer_top();
	tha_footer_bottom();
echo '</div>';
echo '</footer>';
tha_footer_after();

echo '</div>'; // .site.
tha_body_bottom();
wp_footer();

echo '</body></html>';
