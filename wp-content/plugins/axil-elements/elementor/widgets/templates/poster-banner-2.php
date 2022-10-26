<?php
/**
 * @author  AxilTheme
 * @since   1.0
 * @version 1.0
 */

namespace axiltheme\abstrak_elements;

$attr = '';    
if ('1' == $settings['btn_link_type']) {

    if ( !empty( $settings['btn_link']['url'] ) ) {
        $attr  = 'href="' . $settings['btn_link']['url'] . '"';
        $attr .= !empty( $settings['btn_link']['is_external'] ) ? ' target="_blank"' : '';
        $attr .= !empty( $settings['btn_link']['nofollow'] ) ? ' rel="nofollow"' : '';
        $title = '<a ' . $attr . '>' . $settings['title'] . '</a>';
    }
    if ( !empty( $settings['btn_link_text'] ) ) {
        $btn = '<a class="axil-btn btn-fill-white btn-large" ' . $attr . '>' . $settings['btn_link_text'] . '</a>';
    }

} else {
    $attr  = 'href="' . get_permalink($settings['btn_page_link']) . '"';
    $attr .= ' target="_self"';
    $attr .= ' rel="nofollow"';                        
    $btn = '<a class="axil-btn btn-fill-white btn-large" ' . $attr . '>' . $settings['btn_link_text'] . '</a>';
} 
$allowed_tags = wp_kses_allowed_html( 'post' );

$shape1 =  $settings['shape21']['url'];
$shape2 =  $settings['shape22']['url'];
$shape3 =  $settings['shape23']['url'];
$shape4 =  $settings['shape24']['url'];
$shape5 =  $settings['shape25']['url'];
$shape6 =  $settings['shape26']['url']; 
$shape7 =  $settings['shape27']['url']; 
?> 
<div class="banner banner-style-2">    
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="banner-content sal-animate" data-sal="slide-up" data-sal-duration="1000" data-sal-delay="100">
                    <h1 class="title"><?php echo wp_kses( $settings['title'], $allowed_tags ); ?> </h1>
                    <?php  if ( !empty( $settings['btn_link_text'] ) ) { ?>
                        <?php echo wp_kses( $btn, $allowed_tags ); ?>        
                    <?php } ?>       
                </div>
            </div>
        </div>
    </div>
  <?php if( $settings['shape2_style_on']  =='yes' ){ ?>
        <ul class="list-unstyled shape-group-18">
            <?php  if( $settings['shape21']['url']){ ?>
                <li class="shape shape-1" data-sal="slide-left" data-sal-duration="1000" data-sal-delay="100"><img src="<?php echo esc_url( $shape1 );?>" alt="<?php echo axil_Elements_Helper::axil_get_image_alt( $settings['shape21']['id'] );?>"></li>
            <?php  } ?>  
            <?php  if( $settings['shape22']['url']){ ?>
                 <li class="shape shape-2" data-sal="slide-right" data-sal-duration="1000" data-sal-delay="100"><img src="<?php echo esc_url( $shape2 );?>" alt="<?php echo axil_Elements_Helper::axil_get_image_alt( $settings['shape22']['id'] );?>"></li>
            <?php  } ?> 
            <?php  if( $settings['shape23']['url']){ ?>
                <li class="shape shape-3" data-sal="zoom-in" data-sal-duration="500" data-sal-delay="600"><img src="<?php echo esc_url( $shape3 );?>" alt="<?php echo axil_Elements_Helper::axil_get_image_alt( $settings['shape23']['id'] );?>"></li>
            <?php  } ?>
            <?php  if( $settings['shape24']['url']){ ?>
                 <li class="shape shape-4" data-sal="zoom-in" data-sal-duration="500" data-sal-delay="600"><img src="<?php echo esc_url( $shape4 );?>" alt="<?php echo axil_Elements_Helper::axil_get_image_alt( $settings['shape24']['id'] );?>"></li>
            <?php  } ?>
            <?php  if( $settings['shape25']['url']){ ?>
                <li class="shape shape-5" data-sal="zoom-in" data-sal-duration="500" data-sal-delay="600"><img src="<?php echo esc_url( $shape5 );?>" alt="<?php echo axil_Elements_Helper::axil_get_image_alt( $settings['shape25']['id'] );?>"></li>
            <?php  } ?>
            <?php  if( $settings['shape26']['url']){ ?>
                <li class="shape shape-6" data-sal="zoom-in" data-sal-duration="500" data-sal-delay="600"><img src="<?php echo esc_url( $shape6 );?>" alt="<?php echo axil_Elements_Helper::axil_get_image_alt( $settings['shape26']['id'] );?>"></li>
            <?php  } ?> 
            <?php  if( $settings['shape27']['url']){ ?>
                <li class="shape shape-7" data-sal="slide-down" data-sal-duration="500" data-sal-delay="600"><img src="<?php echo esc_url( $shape7 );?>" alt="<?php echo axil_Elements_Helper::axil_get_image_alt( $settings['shape27']['id'] );?>"></li>
            <?php  } ?> 
        </ul>
    <?php  } ?>
</div>
