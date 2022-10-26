<?php
/**
 * Template part for displaying header page title
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package abstrak
 */

// Get Value
$axil_options = Helper::axil_get_options(); 
$banner_layout      = Helper::axil_banner_layout();
$banner_area        = $banner_layout['banner_area'];
$banner_img         = $banner_layout['banner_img'];
$banner_shape       = $banner_layout['banner_shape'];
$banner_shape2      = $banner_layout['banner_shape2'];
$sub_title          = $banner_layout['sub_title'];
$breadcrumb_enable  = $banner_layout['breadcrumbs'];
$banner_style       = $banner_layout['banner_style'];
$image_alt          = $banner_layout['image_alt'];

$condipfix                = Helper::axil_layout_settings();

$other_shape_enable       = $axil_options[$condipfix . '_banner_other_shape_enable'];
$banner_image_class             =      $condipfix . '_image_size';

$allowed_tags       = wp_kses_allowed_html( 'post' );

 if ("no" !== $banner_area && "0" !== $banner_area) { 

    $allowed_tags           = wp_kses_allowed_html( 'post' ); 

    if ( $banner_style == '1' ) { ?>
        <div class="breadcrum-area">
            <div class="container">
                <div class="breadcrumb">
                 <?php if ( "no" !== $breadcrumb_enable && "0" !== $breadcrumb_enable ) { ?>
                        <?php axil_breadcrumbs(); ?>            
                    <?php } ?>
                    <h1 class="title h2"><?php echo axil_get_page_title();?></h1>   

                </div>
            </div>
               <ul class="shape-group-8 list-unstyled">

              <?php  if ( $other_shape_enable) {  ?>
                <li class="shape shape-1 sal-animate" data-sal="slide-right" data-sal-duration="500" data-sal-delay="100">
                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/media/others/bubble-9.png" alt="<?php echo esc_attr( 'circle', 'abstrak' ); ?>">
                </li>
                <?php } ?>
                <?php if ( !empty($banner_shape) ) { ?>
                    <li class="shape shape-2 sal-animate" data-sal="slide-left" data-sal-duration="500" data-sal-delay="200">
                        <img src="<?php echo esc_url( $banner_shape ); ?>" alt="<?php echo  esc_attr( 'circle', 'abstrak' ); ?>">
                    </li>
                <?php } ?>

                <?php  if ( $other_shape_enable) {  ?>

                    <li class="shape shape-3 sal-animate" data-sal="slide-up" data-sal-duration="500" data-sal-delay="300">
                        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/media/others/line-4.png" alt="<?php echo  esc_attr( 'circle', 'abstrak' ); ?>">
                    </li>
            <?php } ?>
            </ul>
        </div>

        <?php  }elseif($banner_style == '2' ){ ?>

        <div class="breadcrum-area breadcrumb-banner">
            <div class="container">
                <div class="section-heading heading-left sal-animate" data-sal="slide-right" data-sal-duration="1000" data-sal-delay="300">
                     
                    <h1 class="title h2"><?php echo axil_get_page_title();?></h1>
                     <?php if( $sub_title ){ ?>
                            <p><?php echo esc_html( $sub_title ); ?></p>
                    <?php } ?>
                </div>
            <?php if ( !empty($banner_img) ) { ?>
                <div class="banner-thumbnail sal-animate banner-<?php echo esc_attr( $banner_image_class ); ?>" data-sal="slide-up" data-sal-duration="1000" data-sal-delay="400">
                    <img  class="paralax-image" src="<?php echo esc_url( $banner_img ); ?>" alt="<?php echo esc_attr( $image_alt ); ?>">
                </div>
                 <?php } ?>
            </div>
            <ul class="shape-group-8 list-unstyled">
                <?php  if ( $other_shape_enable) {  ?>
                <li class="shape shape-1 sal-animate" data-sal="slide-right" data-sal-duration="500" data-sal-delay="100">
                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/media/others/bubble-9.png" alt="Bubble">
                </li>
                <?php } ?>
                   <?php if ( !empty($banner_shape2) ) { ?>
                <li class="shape shape-2 sal-animate" data-sal="slide-left" data-sal-duration="500" data-sal-delay="200">
                    <img src="<?php echo esc_url( $banner_shape2 ); ?>" alt="Bubble">
                </li>
                <?php } ?>
                <?php  if ( $other_shape_enable) {  ?>
                <li class="shape shape-3 sal-animate" data-sal="slide-up" data-sal-duration="500" data-sal-delay="300">
                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/media/others/line-4.png" alt="Line">
                </li>
                <?php } ?>
            </ul>
        </div>

        <?php }else{ ?>
            <div class="breadcrum-area breadcrumb-banner single-breadcrumb">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="section-heading heading-left" data-sal="slide-right" data-sal-duration="1000" data-sal-delay="300">
                                <h1 class="title h2"><?php echo axil_get_page_title();?></h1>
                                <p><?php echo esc_html( $sub_title ); ?></p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                             <?php if ( !empty($banner_img) ) { ?>
                                <div class="banner-thumbnail" data-sal="slide-up" data-sal-duration="1000" data-sal-delay="400">

                                   <img  class="paralax-image" src="<?php echo esc_url( $banner_img ); ?>" alt="<?php echo esc_attr( $image_alt ); ?>">

                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                    <ul class="shape-group-8 list-unstyled">
                         <?php  if ( $other_shape_enable) {  ?>
                            <li class="shape shape-1 sal-animate" data-sal="slide-right" data-sal-duration="500" data-sal-delay="100">
                                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/media/others/bubble-9.png" alt="Bubble">
                            </li>
                        <?php } ?>
                          <?php if ( !empty($banner_shape2) ) { ?>
                            <li class="shape shape-2 sal-animate" data-sal="slide-left" data-sal-duration="500" data-sal-delay="200">
                                <img src="<?php echo esc_url( $banner_shape2 ); ?>" alt="Bubble">
                            </li>
                        <?php } ?>
                        <?php  if ( $other_shape_enable) {  ?>
                            <li class="shape shape-3 sal-animate" data-sal="slide-up" data-sal-duration="500" data-sal-delay="300">
                                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/media/others/line-4.png" alt="Line">
                            </li>
                        <?php } ?>
                </ul>
            </div> 
    <?php } ?> 
<?php } ?> 