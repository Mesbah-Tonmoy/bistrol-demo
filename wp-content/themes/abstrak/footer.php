<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package abstrak
 */

$axil_options           = Helper::axil_get_options();
$footer_layout 			= Helper::axil_footer_layout();
$footer_area 			= $footer_layout['footer_area'];
$footer_style           = $footer_layout['footer_style'];

$footer_top_layout      = Helper::axil_footer_top_layout();
$footer_top_area        = $footer_top_layout['footer_top_area'];
$footer_top_style       = $footer_top_layout['footer_top_style'];

    if ( "no" !== $footer_top_area && "0" !== $footer_top_area && !is_404()) {
        get_template_part('template-parts/footer/footer-top', $footer_top_style );
    }
    if(  "no" !== $footer_area && "0" !== $footer_area  ){
        get_template_part('template-parts/footer/footer', $footer_style );
    }
?>
</div>
<?php wp_footer(); ?>
</body>
</html>
