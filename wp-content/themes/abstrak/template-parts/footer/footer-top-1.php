<?php
/**
 * Template part for displaying footer top layout one
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package abstrak
 */

// Get Value
$axil_options              = Helper::axil_get_options();
$ot_footer_top_area        = $axil_options['axil_footer_top_enable'];
$title                     = (!empty($axil_options['axil_ft_title'])) ? $axil_options['axil_ft_title'] : "";
$subtitle                  = (!empty($axil_options['axil_ft_sub_title'])) ? $axil_options['axil_ft_sub_title'] : "";
$btntext                   = (!empty($axil_options['axil_ft_btn_txt'])) ? $axil_options['axil_ft_btn_txt'] : "";
$btnurl                    = (!empty($axil_options['axil_ft_btn_url'])) ? $axil_options['axil_ft_btn_url'] : "";
$pcimg              = empty( $axil_options['axil_ft_btn_img']['url'] ) ? '' :$axil_options['axil_ft_btn_img']['url'];
$pcimg1             = empty( $axil_options['axil_ft_btn_img1']['url'] ) ? '' :$axil_options['axil_ft_btn_img1']['url'];
$pcimg2             = empty( $axil_options['axil_ft_btn_img2']['url'] ) ? '' :$axil_options['axil_ft_btn_img2']['url'];
$pcimg3             = empty( $axil_options['axil_ft_btn_img3']['url'] ) ? '' :$axil_options['axil_ft_btn_img3']['url'];
$pcimg4             = empty( $axil_options['axil_ft_btn_img4']['url'] ) ? '' :$axil_options['axil_ft_btn_img4']['url'];
$pcimg5             = empty( $axil_options['axil_ft_btn_img5']['url'] ) ? '' :$axil_options['axil_ft_btn_img5']['url'];
$axil_ft_btn_img_id = isset($axil_options['axil_ft_btn_img']['id']) && !empty($axil_options['axil_ft_btn_img']['id']) ? $axil_options['axil_ft_btn_img']['id'] : "";
$pcimg_alt_text     = get_post_meta($axil_ft_btn_img_id , '_wp_attachment_image_alt', true);
$has_img            = (!empty($axil_options['axil_footer_top_img_enable'])) ? 'has-image' : "has-no-image";
?>
<section class="section call-to-action-area <?php echo esc_attr( $has_img ); ?>">
    <div class="container">
        <div class="call-to-action">
           <div class="section-heading heading-light">
                 <?php if(!empty($subtitle) ){ ?>    
                        <span class="subtitle"><?php echo esc_html($subtitle); ?></span>
                 <?php } ?> 
                <?php if(!empty($title) ){ ?> 
                     <h2 class="title"><?php echo esc_html($title); ?></h2>
                <?php } ?> 
                <?php if(!empty($btnurl) ){ ?> 
                    <a href="<?php echo esc_url($btnurl); ?>" class="axil-btn btn-large btn-fill-white"><?php echo esc_html($btntext); ?></a>
                <?php } ?> 
            </div>
                <?php if(!empty($axil_options['axil_footer_top_img_enable']) ){ ?>  
                   <div class="thumbnail">
                        <div class="larg-thumb" data-sal="zoom-in" data-sal-duration="600" data-sal-delay="100"> 
                             <img class="dark-logo" src="<?php echo esc_url( $pcimg ); ?>" alt="<?php echo esc_attr($pcimg_alt_text); ?>">
                        </div> 
                         <ul class="list-unstyled small-thumb">
                             <?php if(!empty( $pcimg1 ) ){ ?>
                                <li class="shape shape-1" data-sal="slide-right" data-sal-duration="800" data-sal-delay="400">
                                    <img class="paralax-image" src="<?php echo esc_url( $pcimg1 ); ?>" alt="<?php echo esc_attr('right image', 'abstrak');?>">
                                </li>
                            <?php } ?>
                             <?php if(!empty( $pcimg2 ) ){ ?>
                                <li class="shape shape-2" data-sal="slide-left" data-sal-duration="800" data-sal-delay="300">
                                    <img class="paralax-image" src="<?php echo esc_url( $pcimg2 ); ?>" alt="<?php echo esc_attr('Left Image', 'abstrak');?>">
                                </li>
                            <?php } ?> 
                        </ul>  
                    </div>   
              <?php } ?> 
        </div>
    </div>
     <?php if(!empty($axil_options['axil_footer_top_shape_group_enable']) ){ ?>   
        <ul class="list-unstyled shape-group-9">
            <li class="shape shape-1"><img src="<?php echo Helper::get_img( 'footer/bubble-12.png'); ?>" alt="<?php echo esc_attr('bubble-12', 'abstrak');?>"></li>
            <li class="shape shape-2"><img src="<?php echo Helper::get_img( 'footer/bubble-16.png'); ?>" alt="<?php echo esc_attr('bubble-16', 'abstrak');?>"></li>
            <li class="shape shape-3"><img src="<?php echo Helper::get_img( 'footer/bubble-13.png'); ?>" alt="<?php echo esc_attr('bubble-13', 'abstrak');?>"></li>
            <li class="shape shape-4"><img src="<?php echo Helper::get_img( 'footer/bubble-14.png'); ?>" alt="<?php echo esc_attr('bubble-14', 'abstrak');?>"></li>
            <li class="shape shape-5"><img src="<?php echo Helper::get_img( 'footer/bubble-16.png'); ?>" alt="<?php echo esc_attr('bubble-16', 'abstrak');?>"></li>
            <li class="shape shape-6"><img src="<?php echo Helper::get_img( 'footer/bubble-15.png'); ?>" alt="<?php echo esc_attr('bubble-15', 'abstrak');?>"></li>
            <li class="shape shape-7"><img src="<?php echo Helper::get_img( 'footer/bubble-16.png'); ?>" alt="<?php echo esc_attr('bubble-16', 'abstrak');?>"></li>
        </ul>
    <?php } ?> 
</section>
