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
            $btn = '<a class="axil-btn2 btn-fill-primary btn-large" ' . $attr . '>' . $settings['btn_link_text'] . '</a>';
        }

    } else {
        $attr  = 'href="' . get_permalink($settings['btn_page_link']) . '"';
        $attr .= ' target="_self"';
        $attr .= ' rel="nofollow"';         
        if ( !empty( $settings['btn_link_text'] ) ) {               
        $btn = '<a class="axil-btn2 btn-fill-primary btn-large " ' . $attr . '>' . $settings['btn_link_text'] . '</a>';
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
            $btn2 = '<a class="about-btn" ' . $attr2 . '><i class="fab fa-youtube"></i> ' . $settings['btn_link_text2'] . '</a>';
        }

    } else {
        $attr2  = 'href="' . get_permalink($settings['btn_page_link2']) . '"';
        $attr2 .= ' target="_blank"';
        $attr2 .= ' rel="nofollow"';      
        if ( !empty( $settings['btn_link_text2'] ) ) {
                $btn2 = '<a class="about-btn" ' . $attr2 . '><i class="fab fa-youtube"></i> ' . $settings['btn_link_text2'] . '</a>';
        }                  
    } 
    $allowed_tags = wp_kses_allowed_html( 'post' );

    $shape1 =  $settings['shape61']['url'];
    $shape2 =  $settings['shape62']['url'];
    $shape3 =  $settings['shape63']['url'];
    $shape4 =  $settings['shape64']['url'];
    $shape5 =  $settings['shape65']['url'];
    $shape6 =  $settings['shape66']['url'];
    $shape7 =  $settings['shape67']['url'];    
    $shape8 =  $settings['shape68']['url'];    
    $shape9 =  $settings['shape69']['url'];   
    $shape10 =  $settings['shape70']['url'];    
    $shape11 =  $settings['shape71']['url'];    
   
    ?>
    <div class="banner banner-style-7">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="banner-content">
                        <h1 class="title" data-sal="slide-up" data-sal-duration="1000" data-sal-delay="200"><?php echo axil_kses_intermediate( $settings['title'] );?></h1>
                        <p class="subtitle" data-sal="slide-up" data-sal-duration="1000" data-sal-delay="100"><?php echo axil_kses_intermediate( $settings['subtitle'] );?></p>
                        <div class="btn-group" data-sal="slide-up" data-sal-duration="1000" data-sal-delay="300"> 
                            <?php echo wp_kses( $btn, $allowed_tags ); ?>   
                            <?php if ( !empty( $settings['btn_link_text2'] ) ) { ?> 
                                <?php echo wp_kses( $btn2, $allowed_tags ); ?> 
                            <?php  } ?>

                        </div>
                    </div>
                </div>
                  
            </div>
        </div>
        <?php if( $settings['shape3_style_on']  =='yes' ){ ?>
            <ul class="list-unstyled shape-group-26" class="paralax-image">
               
                <?php  if( $settings['shape61']['url']){ ?>
                    <li class="shape shape-1" data-sal="slide-right" data-sal-duration="500" data-sal-delay="700">
                        <img src="<?php echo esc_url( $shape1 );?>" alt="<?php echo axil_Elements_Helper::axil_get_image_alt( $settings['shape61']['id'] );?>">
                    </li>
                <?php  } ?>

                <?php  if( $settings['shape62']['url']){ ?>
                    <li class="shape shape-2" data-sal="slide-left" data-sal-duration="600" data-sal-delay="800">
                        <img src="<?php echo esc_url( $shape2 );?>" alt="<?php echo axil_Elements_Helper::axil_get_image_alt( $settings['shape62']['id'] );?>">
                    </li>
                <?php  } ?>

                <?php  if( $settings['shape63']['url']){ ?>
                    <li class="shape shape-3" data-sal="slide-right" data-sal-duration="600" data-sal-delay="800">
                        <img src="<?php echo esc_url( $shape3 );?>" alt="<?php echo axil_Elements_Helper::axil_get_image_alt( $settings['shape63']['id'] );?>">
                    </li>
                <?php } ?>

                <!-- <?php  if( $settings['shape64']['url']){ ?>
                    <li class="shape shape-4" data-sal="slide-left" data-sal-duration="500" data-sal-delay="700">
                        <img src="<?php echo esc_url( $shape4 );?>" alt="<?php echo axil_Elements_Helper::axil_get_image_alt( $settings['shape64']['id'] );?>">
                    </li>
                <?php } ?> 
                <?php  if( $settings['shape65']['url']){ ?>
                <li class="shape shape-5" data-sal="slide-left" data-sal-duration="500" data-sal-delay="700">
                    <img src="<?php echo esc_url( $shape5 );?>" alt="<?php echo axil_Elements_Helper::axil_get_image_alt( $settings['shape65']['id'] );?>">
                </li>
                <?php } ?> 

                <?php  if( $settings['shape66']['url']){ ?>
                <li class="shape shape-6" data-sal="slide-left" data-sal-duration="500" data-sal-delay="700">
                    <img src="<?php echo esc_url( $shape6 );?>" alt="<?php echo axil_Elements_Helper::axil_get_image_alt( $settings['shape66']['id'] );?>">
                </li>
                <?php  } ?>


                <?php  if( $settings['shape67']['url']){ ?>
                <li class="shape shape-7" data-sal="slide-left" data-sal-duration="500" data-sal-delay="700">
                    <img src="<?php echo esc_url( $shape7 );?>" alt="<?php echo axil_Elements_Helper::axil_get_image_alt( $settings['shape67']['id'] );?>">
                </li>
                <?php  } ?>

                
                <?php  if( $settings['shape68']['url']){ ?>
                <li class="shape shape-8" data-sal="slide-left" data-sal-duration="500" data-sal-delay="700">
                    <img src="<?php echo esc_url( $shape8 );?>" alt="<?php echo axil_Elements_Helper::axil_get_image_alt( $settings['shape68']['id'] );?>">
                </li>
                <?php  } ?>

                
                <?php  if( $settings['shape69']['url']){ ?>
                <li class="shape shape-9" data-sal="slide-left" data-sal-duration="500" data-sal-delay="700">
                    <img src="<?php echo esc_url( $shape9 );?>" alt="<?php echo axil_Elements_Helper::axil_get_image_alt( $settings['shape69']['id'] );?>">
                </li>
                <?php  } ?> -->

                
                <?php  if( $settings['shape70']['url']){ ?>
                <li class="shape shape-10" data-sal="slide-left" data-sal-duration="500" data-sal-delay="700">
                    <img src="<?php echo esc_url( $shape10 );?>" alt="<?php echo axil_Elements_Helper::axil_get_image_alt( $settings['shape70']['id'] );?>">
                </li>
                <?php  } ?> 
                
               <!--  <?php  if( $settings['shape71']['url']){ ?>
                <li class="shape shape-11" data-sal="slide-up" data-sal-duration="500" data-sal-delay="700">
                    <img src="<?php echo esc_url( $shape11 );?>" alt="<?php echo axil_Elements_Helper::axil_get_image_alt( $settings['shape71']['id'] );?>">
                </li>
                <?php  } ?>
 -->
                 
            </ul> 

         <?php  } ?> 
</div>