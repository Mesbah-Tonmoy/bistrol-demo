<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package abstrak
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
    $options = Helper::axil_get_options();
    ?>
    <meta name="theme-style-mode" content="<?php echo intval($options['active_dark_mode']); ?>">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php

if ( function_exists( 'wp_body_open' ) ) {
	wp_body_open();
}
?>
<div id="main-wrapper" class="main-wrapper">
<?php get_template_part('template-parts/header/header', 'main'); ?> 