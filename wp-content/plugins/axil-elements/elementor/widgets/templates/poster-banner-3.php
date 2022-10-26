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
            $attr .= !empty( $settings['btn_link']['is_external'] ) ? ' target="_blank"' : '';
            $attr .= !empty( $settings['btn_link']['nofollow'] ) ? ' rel="nofollow"' : '';
            
        }
        if ( !empty( $settings['btn_link_text'] ) ) {
            $btn = '<a class="axil-btn btn-fill-primary btn-large" ' . $attr . '>' . $settings['btn_link_text'] . '</a>';
        }

    } else {
        $attr  = 'href="' . get_permalink($settings['btn_page_link']) . '"';
        $attr .= ' target="_self"';
        $attr .= ' rel="nofollow"';         
        if ( !empty( $settings['btn_link_text'] ) ) {               
        $btn = '<a class="axil-btn btn-fill-primary btn-large " ' . $attr . '>' . $settings['btn_link_text'] . '</a>';
        }
    }
     
   $attr2 = ''; 
    $btn2 = '';     
   if ('1' == $settings['btn_link_type2']) {

        if ( !empty( $settings['btn_link2']['url'] ) ) {
            $attr2  = 'href="' . $settings['btn_link2']['url'] . '"';
            $attr2 .= !empty( $settings['btn_link2']['is_external'] ) ? ' target="_blank"' : '';
            $attr2 .= !empty( $settings['btn_link2']['nofollow'] ) ? ' rel="nofollow"' : '';
            
        }
        if ( !empty( $settings['btn_link_text2'] ) ) {
            $btn2 = '<a class="about-btn" ' . $attr2 . '>' . $settings['btn_link_text2'] . '</a>';
        }

    } else {
        $attr2  = 'href="' . get_permalink($settings['btn_page_link2']) . '"';
        $attr2 .= ' target="_blank"';
        $attr2 .= ' rel="nofollow"';      
        if ( !empty( $settings['btn_link_text2'] ) ) {
                $btn2 = '<a class="about-btn" ' . $attr2 . '>' . $settings['btn_link_text2'] . '</a>';
        }                  
    } 
    $allowed_tags = wp_kses_allowed_html( 'post' );

    $shape1 =  $settings['shape31']['url'];
    $shape2 =  $settings['shape32']['url'];
    $shape3 =  $settings['shape33']['url'];
    $shape4 =  $settings['shape34']['url'];
    $shape4 =  $settings['shape34']['url'];
    $shape5 =  $settings['shape35']['url'];
    $shape6 =  $settings['shape36']['url'];    
    $banner_img31 =  $settings['banner_img31']['url'];
    $banner_img32 =  $settings['banner_img32']['url'];
     
    ?>
    <div class="banner banner-style-3">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="banner-content">
                        <span class="subtitle" data-sal="slide-up" data-sal-duration="1000" data-sal-delay="100"><?php echo axil_kses_intermediate( $settings['subtitle'] );?></span>
                        <h1 class="title" data-sal="slide-up" data-sal-duration="1000" data-sal-delay="200"><?php echo axil_kses_intermediate( $settings['title'] );?></h1>
                        <div class="btn-group" data-sal="slide-up" data-sal-duration="1000" data-sal-delay="300"> 
                            <?php echo wp_kses( $btn, $allowed_tags ); ?>   
                            <?php if ( !empty( $settings['btn_link_text2'] ) ) { ?> 
                                <?php echo wp_kses( $btn2, $allowed_tags ); ?> 
                            <?php  } ?>

                        </div>
                    </div>
                </div>
                  <?php if( $settings['img3_style_on']  =='yes' ){ ?>
                <div class="col-lg-6">
                    <?php  if( $settings['banner_img31']['url']){ ?>
                       <div class="banner-thumbnail">
                            <div class="large-thumb" data-sal="slide-up" data-sal-duration="800" data-sal-delay="500">
                               <img  class="paralax-image" src="<?php echo esc_url( $banner_img31 );?>" alt="Shape">
                           </div>
                       </div>
                    <?php  } ?>
                </div>
            <?php  } ?>
            </div>
        </div>
        <?php if( $settings['shape3_style_on']  =='yes' ){ ?>
            <ul class="list-unstyled shape-group-20">
                <?php  if( $settings['shape31']['url']){ ?>
                    <li class="shape shape-1" data-sal="slide-down" data-sal-duration="500" data-sal-delay="100">
                        <img src="<?php echo esc_url( $shape1 );?>" alt="<?php echo axil_Elements_Helper::axil_get_image_alt( $settings['shape31']['id'] );?>">
                    </li>
                <?php  } ?>
                <?php  if( $settings['shape32']['url']){ ?>
                    <li class="shape shape-2" data-sal="slide-left" data-sal-duration="500" data-sal-delay="200">
                        <img src="<?php echo esc_url( $shape2 );?>" alt="<?php echo axil_Elements_Helper::axil_get_image_alt( $settings['shape32']['id'] );?>">
                    </li>
                <?php  } ?>
                <?php  if( $settings['shape33']['url']){ ?>
                    <li class="shape shape-4" data-sal="slide-left" data-sal-duration="500" data-sal-delay="700">
                        <img src="<?php echo esc_url( $shape3 );?>" alt="<?php echo axil_Elements_Helper::axil_get_image_alt( $settings['shape33']['id'] );?>">
                    </li>
                <?php } ?>
                <?php  if( $settings['shape34']['url']){ ?>
                    <li class="shape shape-5" data-sal="slide-left" data-sal-duration="500" data-sal-delay="700">
                        <img src="<?php echo esc_url( $shape4 );?>" alt="<?php echo axil_Elements_Helper::axil_get_image_alt( $settings['shape34']['id'] );?>">
                    </li>
                <?php } ?> 
                <?php  if( $settings['shape35']['url']){ ?>
                <li class="shape shape-6" data-sal="slide-left" data-sal-duration="500" data-sal-delay="700">
                    <img src="<?php echo esc_url( $shape5 );?>" alt="<?php echo axil_Elements_Helper::axil_get_image_alt( $settings['shape35']['id'] );?>">
                </li>
                <?php } ?> 
                <?php  if( $settings['shape36']['url']){ ?>
                <li class="shape shape-7" data-sal="slide-left" data-sal-duration="500" data-sal-delay="700">
                    <img src="<?php echo esc_url( $shape6 );?>" alt="<?php echo axil_Elements_Helper::axil_get_image_alt( $settings['shape36']['id'] );?>">
                </li>
                <?php  } ?>

                <?php  if( $settings['marque_style_on'] == 'yes'){ ?>
                    <?php  if( $settings['banner_img32']['url']){ ?>
                        <li  style="background-image: url('<?php echo esc_attr( $banner_img32 );?>')" class="shape shape-8 marque-images"></li>
                    <?php  } ?>
                <?php  } ?>

            </ul> 

         <?php  } ?>
        
</div>