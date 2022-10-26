<?php
/**
 * @author  AxilTheme
 * @since   1.0
 * @version 1.0
 */

namespace axiltheme\abstrak_elements;

$attr = '';	
$btn = ''; 
if ('1' == $settings['btn_link_type']) {
    if ( !empty( $settings['btn_link']['url'] ) ) {
        $attr  = 'href="' . $settings['btn_link']['url'] . '"';
        $attr .= !empty( $settings['btn_link']['is_external'] ) ? ' target=""' : '';
        $attr .= !empty( $settings['btn_link']['nofollow'] ) ? ' rel="nofollow"' : '';
        $title = '<a ' . $attr . '>' . $settings['title'] . '</a>';
    }
    if ( !empty( $settings['btn_link_text'] ) ) {
        $btn = '<a class="axil-btn btn-fill-primary btn-large" ' . $attr . '>' . $settings['btn_link_text'] . '</a>';
    }
    }else {
    $attr  = 'href="' . get_permalink($settings['btn_page_link']) . '"';
    $attr .= ' target="_self"';
    $attr .= ' rel="nofollow"';                        
    $btn = '<a class="axil-btn btn-fill-primary btn-large" ' . $attr . '>' . $settings['btn_link_text'] . '</a>';
}

$allowed_tags = wp_kses_allowed_html( 'post' );
$shape1 =  $settings['shape1']['url'];
$shape2 =  $settings['shape2']['url'];
$shape3 =  $settings['shape3']['url'];
$shape4 =  $settings['shape4']['url'];
$shape5 =  $settings['shape5']['url'];

$banner_img1 =  $settings['banner_img1']['url'];
$banner_img2 =  $settings['banner_img2']['url'];
$banner_img3 =  $settings['banner_img3']['url'];        
$banner_thumbnail =  $settings['banner_thumbnail']['url'];
?>

<div class="banner banner-style-1">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="banner-content" data-sal="slide-up" data-sal-duration="1000" data-sal-delay="100">
                    <h1 class="title"><?php echo axil_kses_intermediate( $settings['title'] );?></h1>
                    <span class="subtitle"><?php echo axil_kses_intermediate( $settings['subtitle'] );?></span>    
                    <?php  if ( !empty( $settings['btn_link_text'] ) ) { ?>                    
                        <?php echo wp_kses( $btn, $allowed_tags ); ?>
                    <?php } ?>  
                </div>
            </div>
            <div class="col-lg-6">
                <div class="banner-thumbnail">
                   <?php  if( $settings['banner_thumbnail']['url']){ ?>
                        <div class="large-thumb" data-sal="zoom-in" data-sal-duration="500" data-sal-delay="300">
                            <img src="<?php echo esc_url( $banner_thumbnail );?>" alt="<?php echo axil_Elements_Helper::axil_get_image_alt( $settings['banner_thumbnail']['id'] );?>">
                        </div>
                    <?php  } ?>  
                    <?php if( $settings['img1_style_on']  =='yes' ){ ?>
                    <ul class="list-unstyled shape-group">
                        <?php  if( $settings['banner_img1']['url']){ ?>
                            <li class="shape shape-1" data-sal="slide-right" data-sal-duration="500" data-sal-delay="400">
                                <img src="<?php echo esc_url( $banner_img1 );?>" alt="<?php echo axil_Elements_Helper::axil_get_image_alt( $settings['banner_img1']['id'] );?>">
                            </li>
                        <?php  } ?>  
                        <?php  if( $settings['banner_img2']['url']){ ?>
                            <li class="shape shape-2" data-sal="slide-right" data-sal-duration="500" data-sal-delay="500">
                                <img src="<?php echo esc_url( $banner_img2 );?>" alt="<?php echo axil_Elements_Helper::axil_get_image_alt( $settings['banner_img2']['id'] );?>">
                            </li>
                        <?php  } ?>  
                        <?php  if( $settings['banner_img3']['url']){ ?>
                            <li class="shape shape-3" data-sal="slide-left" data-sal-duration="500" data-sal-delay="600">
                                <img src="<?php echo esc_url( $banner_img3 );?>" alt="<?php echo axil_Elements_Helper::axil_get_image_alt( $settings['banner_img3']['id'] );?>">
                            </li>
                        <?php  } ?>  
                     </ul> 

                    <?php  } ?>
                </div>
            </div>
        </div>
    </div>
   <?php if( $settings['shape1_style_on']  =='yes' ){ ?>
    <ul class="list-unstyled shape-group-13">
        <?php  if( $settings['shape1']['url']){ ?>
            <li class="shape shape-1" data-sal="slide-down" data-sal-duration="500" data-sal-delay="100">
                <img src="<?php echo esc_url( $shape1 );?>" alt="<?php echo axil_Elements_Helper::axil_get_image_alt( $settings['shape1']['id'] );?>">
            </li>
        <?php  } ?>  
        <?php  if( $settings['shape2']['url']){ ?>      
            <li class="shape shape-2" data-sal="slide-left" data-sal-duration="500" data-sal-delay="200">
                <img src="<?php echo esc_url( $shape2 );?>" alt="<?php echo axil_Elements_Helper::axil_get_image_alt( $settings['shape2']['id'] );?>">
            </li>
        <?php  } ?>
        <?php  if( $settings['shape3']['url']){ ?>
            <li class="shape shape-3" data-sal="slide-left" data-sal-duration="500" data-sal-delay="700">
                <img src="<?php echo esc_url( $shape3 );?>" alt="<?php echo axil_Elements_Helper::axil_get_image_alt( $settings['shape3']['id'] );?>">
            </li>
        <?php  } ?>
        <?php  if( $settings['shape4']['url']){ ?>
            <li class="shape shape-4" data-sal="slide-left" data-sal-duration="500" data-sal-delay="700">
                <img src="<?php echo esc_url( $shape4 );?>" alt="<?php echo axil_Elements_Helper::axil_get_image_alt( $settings['shape4']['id'] );?>">
            </li>
        <?php  } ?>
        <?php  if( $settings['shape5']['url']){ ?>
            <li class="shape shape-5" data-sal="slide-left" data-sal-duration="500" data-sal-delay="700">
                <img src="<?php echo esc_url( $shape5 );?>" alt="<?php echo axil_Elements_Helper::axil_get_image_alt( $settings['shape5']['id'] );?>">
            </li>
        <?php  } ?>

    </ul>

<?php  } ?>

</div> 
