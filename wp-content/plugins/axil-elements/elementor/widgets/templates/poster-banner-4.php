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
        $btn = '<a class="axil-btn btn-fill-primary btn-large" ' . $attr . '>' . $settings['btn_link_text'] . '</a>';
    }
    }else{
        $attr  = 'href="' . get_permalink($settings['btn_page_link']) . '"';
        $attr .= ' target="_self"';
        $attr .= ' rel="nofollow"';                        
        $btn = '<a class="axil-btn btn-fill-primary btn-large" ' . $attr . '>' . $settings['btn_link_text'] . '</a>';
    }

    $allowed_tags = wp_kses_allowed_html( 'post' );
    $imgbanner_shape    = wp_get_attachment_image( $settings['banner_img41']['id'], 'full' );
   ?>
     <div class="banner banner-style-4">
        <div class="container"> 
            <div class="banner-content">
                 <h1 class="title" data-sal="slide-up" data-sal-duration="1000" data-sal-delay="100">                      
                    <?php echo wp_kses( $settings['title'], $allowed_tags ); ?>
                </h1>
                <?php if ( $settings['subtitle'] ) { ?>
                    <p data-sal="slide-up" data-sal-duration="1000">
                         <?php echo wp_kses( $settings['subtitle'], $allowed_tags ); ?>                           
                    </p>
                <?php } ?>
                <div data-sal="slide-up" data-sal-duration="1000" data-sal-delay="200">
                       <?php echo wp_kses( $btn, $allowed_tags ); ?> 
                </div>
            </div>
            <?php if ( '' == $settings['banner_img41']['id'] )  { ?>
                 <div class="banner-thumbnail">
                    <div class="large-thumb" data-sal="slide-left" data-sal-duration="800" data-sal-delay="400">
                       <img class="paralax-image"  src="<?php echo esc_attr( $settings['banner_img41']['url'] );?>" alt="<?php esc_html__('Shape','axil-elements'); ?>">
                    </div>
                </div>
            <?php }else{ ?>

                <div class="banner-thumbnail">
                   <div class="large-thumb" data-sal="slide-left" data-sal-duration="800" data-sal-delay="400">
                       
                         <?php echo wp_kses( $imgbanner_shape, $allowed_tags ); ?> 
                    </div>
                </div>

            <?php  } ?> 

            <?php if($settings['show_social']  == 'yes' ){ ?> 
                <div class="banner-social" data-sal="slide-up" data-sal-duration="800">
                    <div class="border-line"></div>
                    <ul class="list-unstyled social-icon">
                        <?php   foreach ( $settings['sc_option_list'] as $sc_option_list ):
                            $size               = 'full';               
                            $img                = wp_get_attachment_image( $sc_option_list['image']['id'], $size );
                            ?>
                            <li class="<?php echo esc_attr( $sc_option_list['title']);?>">
                                <a href="<?php echo esc_url( $sc_option_list['url']['url'] ); ?>">                                
                                    <?php if ( $sc_option_list['icontype'] == 'image' ): ?>
                                       <?php echo wp_kses_post($img);?>
                                    <?php elseif ( $sc_option_list['icontype'] == 'quick' ): ?>
                                       <i class="<?php echo esc_attr( $sc_option_list['quick'] ); ?>"></i>
                                    <?php else: ?>
                                        <?php Icons_Manager::render_icon( $sc_option_list['icon'] ); ?>
                                    <?php endif; ?>  

                                    <?php echo esc_attr( $sc_option_list['title']);?>
                                </a>
                            </li>
                    <?php  endforeach;?> 
                    </ul>
                </div> 
            <?php  } ?>

        </div>

    <?php if($settings['shape_style_on4']  == 'yes' ){ 
        $shape1 =  $settings['shape41']['url'];
        $shape2 =  $settings['shape42']['url'];
        ?>
    <ul class="list-unstyled shape-group-19">
        <?php  if( $settings['shape31']['url']){ ?>
            <li class="shape shape-1" data-sal="slide-down" data-sal-duration="500" data-sal-delay="100">
                 <img src="<?php echo esc_url( $shape1 );?>" alt="<?php echo axil_Elements_Helper::axil_get_image_alt( $settings['shape41']['id'] );?>">
            </li>
        <?php  } ?>
        <?php  if( $settings['shape32']['url']){ ?>
            <li class="shape shape-2" data-sal="slide-left" data-sal-duration="500" data-sal-delay="200">
                <img src="<?php echo esc_url( $shape2 );?>" alt="<?php echo axil_Elements_Helper::axil_get_image_alt( $settings['shape42']['id'] );?>">
            </li>
        <?php  } ?>
    </ul>
    <?php  } ?>
</div>
