<?php
/**
 * Template part for displaying main header
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package abstrak
 */

$axil_options       = Helper::axil_get_options();
$header_layout      = Helper::axil_header_layout();
$header_area        = $header_layout['header_area'];
$header_style       = $header_layout['header_style'];

if ("no" !== $header_area && "0" !== $header_area) {
    get_template_part('template-parts/header/header', $header_style);
}

get_template_part('template-parts/header/side-nav');

if( !is_404() && !is_singular( "elementor_library" )){
    get_template_part('template-parts/title/title-wrapper');
}
?>