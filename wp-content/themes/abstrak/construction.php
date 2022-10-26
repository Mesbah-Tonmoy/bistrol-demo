<?php
/**
 * Template Name: Maintenance
 * Maintenance / Coming Soon Mode Template.
 *
 * @author  axiltheme
 * @since   1.0
 * @version 1.0
 * @package abstrak
 */
$axil_options = Helper::axil_get_options();
 
$under_construction_mailchimp_form_shortcode = $axil_options['under_construction_mailchimp_form_shortcode'];

$logo           = empty($axil_options['axil_light_head_logo']['url'] ) ? Helper::get_img( 'logo/logo.svg' ) :$axil_options['axil_light_head_logo']['url'];
$darklogo       = empty($axil_options['axil_dark_header_logo']['url'] ) ? Helper::get_img( 'logo/logo-3.svg' ) :$axil_options['axil_dark_header_logo']['url'];
$stickylogo     = empty($axil_options['axil_sticky_header_logo']['url'] ) ? Helper::get_img( 'logo/logo-2.svg' ) :$axil_options['axil_sticky_header_logo']['url'];
 
$ucimage     = empty($axil_options['under_construction_page_image']['url'] ) ? Helper::get_img( 'logo/logo-2.svg' ) :$axil_options['under_construction_page_image']['url'];
$ucshape     = empty($axil_options['under_construction_page_shape']['url'] ) ? Helper::get_img( 'logo/logo-2.svg' ) :$axil_options['under_construction_page_shape']['url'];
$ucline      = empty($axil_options['under_construction_page_line']['url'] ) ? Helper::get_img( 'logo/logo-2.svg' ) :$axil_options['under_construction_page_line']['url'];

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php echo esc_attr(get_bloginfo('charset')) ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0"/>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php

if ( function_exists( 'wp_body_open' ) ) {
    wp_body_open();
} ?>

<div id="main-wrapper" class="main-wrapper"> 
    <div class="coming-soon-area onepage-screen-area">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-12">
                    <div class="header-logo">                             
                    <?php if (isset( $axil_options['axil_logo_type'] )): ?>
                        <a href="<?php echo esc_url(home_url('/')); ?>"
                           title="<?php echo esc_attr(get_bloginfo('name')); ?>" rel="home">
                            <?php if ('image' == $axil_options['axil_logo_type']): ?>
                               
                                <?php if($axil_options['axil_light_head_logo']){ ?>
                                    <img class="light-version-logo" src="<?php echo esc_url( $logo ); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
                                <?php } ?>       
                                <?php if($axil_options['axil_dark_header_logo']){ ?>                      
                                    <img class="dark-version-logo" src="<?php echo esc_url( $darklogo ); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
                                <?php } ?>  
                                <?php if($axil_options['axil_sticky_header_logo']){ ?>
                                    <img class="sticky-logo" src="<?php echo esc_url( $stickylogo ); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
                                <?php } ?> 
                        <?php else: ?>
                            <?php if ('text' == $axil_options['axil_logo_type']): ?>
                                <?php echo esc_html($axil_options['axil_logo_text']); ?>
                            <?php endif ?>
                        <?php endif ?>
                    </a>
                <?php else: ?>
                    <h3>
                        <a href="<?php echo esc_url(home_url('/')); ?>"
                           title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home">
                            <?php if (isset($axil_options['axil_logo_text']) ? $axil_options['axil_logo_text'] : '') {
                                echo esc_html($axil_options['axil_logo_text']);
                            } else {
                                bloginfo('name');
                            }
                            ?>
                        </a>
                    </h3>
                    <?php $description = get_bloginfo('description', 'display');
                    if ($description || is_customize_preview()) { ?>
                        <p class="site-description"><?php echo esc_html($description); ?> </p>
                    <?php } ?>
                <?php endif ?>
            </div>
                </div>
                <div class="col-xl-6 col-lg-8">
                    <div class="content">
                        <h2 class="title"><?php echo esc_html($axil_options['under_construction_title_text']); ?></h2>
                        <p><?php echo esc_html($axil_options['under_construction_subtitle_text']); ?></p>                       
                        <div data-countdown="<?php echo esc_html($axil_options['under_construction_date']); ?>" class="countdown"></div>
                        <div class="d-none-com">
                            <?php if (!empty($under_construction_mailchimp_form_shortcode) ) { ?>
                             <?php echo do_shortcode( $under_construction_mailchimp_form_shortcode ); ?>
                              <?php } ?>                                
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="thumbnail" data-sal="zoom-in" data-sal-duration="500" data-sal-delay="100">
                        <img src="<?php echo esc_url( $ucimage ); ?>" alt="<?php echo esc_attr__( 'Coming Soon', 'abstrak' ); ?>">
                    </div>
                </div>
            </div>
        </div>
        <ul class="shape-group-8 list-unstyled">
            <li class="shape shape-2" data-sal="slide-left" data-sal-duration="500" data-sal-delay="200">
                <img src="<?php echo esc_url( $ucshape ); ?>" alt="<?php echo esc_attr__( 'Bubble', 'abstrak' ); ?>">
            </li>
            <li class="shape shape-3" data-sal="slide-up" data-sal-duration="500" data-sal-delay="300">
                <img src="<?php echo esc_url( $ucline ); ?>" alt="<?php echo esc_attr__( 'Bubble', 'abstrak' ); ?>">
            </li>
        </ul>
    </div>
</div>
<?php wp_footer(); ?>
</body>
</html>