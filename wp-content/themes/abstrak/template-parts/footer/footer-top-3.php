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
 
$title                     = (!empty($axil_options['axil_ft_title2'])) ? $axil_options['axil_ft_title2'] : "";
$subtitle                  = (!empty($axil_options['axil_ft_sub_title2'])) ? $axil_options['axil_ft_sub_title2'] : "";
$btntext                   = (!empty($axil_options['axil_ft_btn_txt2'])) ? $axil_options['axil_ft_btn_txt2'] : "";
$btnurl                    = (!empty($axil_options['axil_ft_btn_url2'])) ? $axil_options['axil_ft_btn_url2'] : "";
?>

<section class="section call-to-action-area3">
    <div class="container">
        <div class="call-to-action3">
           <div class="section-heading heading-light">
                 <?php if(!empty($subtitle) ){ ?>    
                        <span class="subtitle"><?php echo esc_html($subtitle); ?></span>
                 <?php } ?> 
                <?php if(!empty($title) ){ ?> 
                     <h2 class="title"><?php echo esc_html($title); ?></h2>
                <?php } ?> 
                <?php if(!empty($btnurl) ){ ?> 
                    <a href="<?php echo esc_url($btnurl); ?>" class="btn-large axil-btn  btn-fill-primary"><?php echo esc_html($btntext); ?></a>
                <?php } ?> 
            </div>

         <?php if(!empty($axil_options['axil_footer_top_shape_group_enable']) ){ ?>   
            <ul class="list-unstyled shape-group-91">
            <li class="shape shape-1">
                <img class="paralax-image" src="<?php echo Helper::get_img( 'footer/shapes-2.png'); ?>" alt="<?php echo esc_attr('bubble-12', 'abstrak');?>">
            </li>
            <li class="shape shape-2">
                <img class="paralax-image" src="<?php echo Helper::get_img( 'footer/shapes-3.png'); ?>" alt="<?php echo esc_attr('bubble-16', 'abstrak');?>">
            </li> 
        </ul>
    <?php } ?> 
       </div>
    </div>    
</section>
