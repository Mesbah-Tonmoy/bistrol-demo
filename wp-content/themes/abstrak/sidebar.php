<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package abstrak
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>
<div id="axil-blog-sidebar" class="widget-area axil-sidebar">
    <?php dynamic_sidebar('sidebar-1');?>
</div><!-- #secondary -->