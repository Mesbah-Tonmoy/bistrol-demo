<?php
/**
 * @author  AxilTheme
 * @since   1.0
 * @version 1.0
 */

namespace axiltheme\abstrak_elements;

   $attr = ''; 
   if ('yes' == $settings['shape_btn_icon']) {
            $icon        = '<i class="fas fa-long-arrow-alt-right"></i>';
            $icon_classs = 'has-icon';
        }else{
            $icon = '';
            $icon_classs = '';
        }
 
    if ('1' == $settings['btn_link_type']) {
        if ( !empty( $settings['btn_link']['url'] ) ) {
            $attr  = 'href="' . $settings['btn_link']['url'] . '"';
            $attr .= !empty( $settings['btn_link']['is_external'] ) ? ' target="_blank"' : '';
            $attr .= !empty( $settings['btn_link']['nofollow'] ) ? ' rel="nofollow"' : '';
            $title = '<a ' . $attr . '>' . $settings['title'] . '</a>';
        }
    if ( !empty( $settings['btn_link_text'] ) ) {
        $btn = '<a class="axil-btn2 btn-fill-primary btn-large" ' . $attr . '>' . $settings['btn_link_text']  . $icon .  '</a>';
    }
    }else{
        $attr  = 'href="' . get_permalink($settings['btn_page_link']) . '"';
        $attr .= ' target="_self"';
        $attr .= ' rel="nofollow"';                        
        $btn = '<a class="axil-btn2 btn-fill-primary btn-large" ' . $attr . '>' . $settings['btn_link_text']  . $icon .  '</a>';
    }

    $allowed_tags       = wp_kses_allowed_html( 'post' );
    $imgbanner_shape    = wp_get_attachment_image( $settings['banner_img41']['id'], 'full' );
   ?>
     <div class="banner banner-style-6">
        <div class="container position-relative"> 
            <div class="banner-content">
                 <h1 class="title" data-sal="slide-up" data-sal-duration="1000" data-sal-delay="100">                      
                    <?php echo wp_kses( $settings['title'], $allowed_tags ); ?>
                </h1>
                <?php if ( $settings['subtitle'] ) { ?>
                    <p data-sal="slide-up" data-sal-duration="1000">
                         <?php echo wp_kses( $settings['subtitle'], $allowed_tags ); ?>                           
                    </p>
                <?php } ?>
                <div class="<?php echo axil_kses_intermediate( $icon_classs );?> btn-wrp-new" data-sal="slide-up" data-sal-duration="1000" data-sal-delay="200">
                       <?php echo wp_kses( $btn, $allowed_tags ); ?> 
                </div>
            </div>    
             <div class="banner-thumbnail">
                <div class="large-thumb" data-sal="slide-left" data-sal-duration="600" data-sal-delay="200">
                   <img class="paralax-image"  src="<?php echo esc_attr( $settings['banner_img41']['url'] );?>" alt="<?php esc_html__('Shape','axil-elements'); ?>">
                </div>
 
                <?php if($settings['shape_style_on4']  == 'yes' ){ 
                    $shape1 =  $settings['shape51']['url']; 
                    $shape2 =  $settings['shape52']['url']; 
                    $shape3 =  $settings['shape53']['url']; 
               
                    ?>
                    <ul class="list-unstyled shape-group-19">
                        <?php  if( $settings['shape51']['url']){ ?>
                            <li class="shape shape-1" data-sal="slide-fade" data-sal-duration="700" data-sal-delay="700">
                                 <img src="<?php echo esc_url( $shape1 );?>" alt="<?php echo axil_Elements_Helper::axil_get_image_alt( $settings['shape51']['id'] );?>">
                            </li>
                        <?php  } ?> 

                        <?php  if( $settings['shape52']['url']){ ?>
                            <li class="shape shape-2" data-sal="slide-up" data-sal-duration="400" data-sal-delay="400">
                                 <img src="<?php echo esc_url( $shape2 );?>" alt="<?php echo axil_Elements_Helper::axil_get_image_alt( $settings['shape52']['id'] );?>">
                            </li>
                        <?php  } ?> 

                           <?php  if( $settings['shape53']['url']){ ?>
                            <li class="shape shape-3" data-sal="slide-down" data-sal-duration="500" data-sal-delay="500">
                                 <img src="<?php echo esc_url( $shape3 );?>" alt="<?php echo axil_Elements_Helper::axil_get_image_alt( $settings['shape53']['id'] );?>">
                            </li>
                        <?php  } ?> 

                     


                    </ul>
                <?php  } ?>


            </div>     
        </div>




</div>
