<?php
/**
 * @author  AxilTheme
 * @since   1.0
 * @version 1.0
 */
namespace axiltheme\abstrak_elements;

$shape1 =  $settings['shape1']['url'];
$shape2 =  $settings['shape2']['url'];
$shape3 =  $settings['shape3']['url'];

$allowed_tags = wp_kses_allowed_html( 'post' );
$phoneNumber = preg_replace("/[^0-9+]/", '', $settings['card_phone'] );
?>
 <div class="section section-padding">
    <div class="container">
        <div class="row">
            <div class="col-xl-5 col-lg-6">
                <div class="contact-form-box shadow-box mb--30">
                    <?php if ($settings['axil_contact_form_tag']) : ?>
                    <<?php echo tag_escape( $settings['axil_contact_form_tag'] ); ?> 
                    class="title">
                    <?php echo wp_kses_post( $settings['axil_content_form_title']); ?>
                    </<?php echo tag_escape( $settings['axil_contact_form_tag'] ) ?>>
                    <?php endif; ?>
                    <?php if( !empty($settings['select_contact_form']) ){ 
                    echo do_shortcode( '[contact-form-7  id="'.$settings['select_contact_form'].'"]' );                               
                    } else {
                    echo '<div class="alert alert-info"><p>' . __('Please Select contact form.', 'axil-elements' ). '</p></div>';
                    }
                ?> 
                </div>
            </div>
            <div class="col-xl-5 col-lg-6 offset-xl-1">
                <div class="contact-info mb--100 mb_md--30 mt_md--0 mt--150">
                        
                    <?php if ($settings['card_title']) : ?>
                        <h4 class="title"><?php echo wp_kses( $settings['card_title'], $allowed_tags ); ?></h4>
                    <?php endif; ?>

                    <?php if ($settings['card_subtitle']) : ?>
                        <p class="subtitle"><?php echo wp_kses( $settings['card_subtitle'], $allowed_tags ); ?></p>
                    <?php endif; ?>

                    <?php if ($settings['card_phone']) : ?>
                        <h4 class="phone-number"><a href="tel:<?php echo wp_kses_post( $phoneNumber ); ?>"><?php echo esc_attr( $settings['card_phone'] ); ?></a></h4>
                    <?php endif; ?>

                </div>
                <div class="contact-info mb--30">
                    <?php if ($settings['card_title2']) : ?>
                        <h4 class="title"><?php echo wp_kses( $settings['card_title2'], $allowed_tags ); ?></h4>
                    <?php endif; ?>

                    <?php if ($settings['card_subtitle2']) : ?>
                        <p class="subtitle"><?php echo wp_kses( $settings['card_subtitle2'], $allowed_tags ); ?></p>
                    <?php endif; ?>
                  
                    <?php if ( $settings['card_email'] ) : ?>
                        <h4 class="phone-number"><a href="mailto:<?php echo wp_kses_post( $settings['card_email'] ); ?>"><?php echo esc_attr( $settings['card_email'] ); ?></a></h4>
                     <?php endif; ?>
 
                </div>
            </div>
        </div>
    </div>
    <?php if( $settings['shape_style_on']  == 'yes' ){ ?>
        <ul class="shape-group-12 list-unstyled">          
            <?php if (!empty( $shape1 )) { ?>
                <li class="shape shape-1"><img src="<?php echo esc_url( $shape1 );?>" alt="<?php echo axil_Elements_Helper::axil_get_image_alt( $settings['shape1']['id'] );?>"></li>
            <?php } ?>  
            <?php if (!empty( $shape2 )) { ?>
                <li class="shape shape-2"><img src="<?php echo esc_url( $shape2 );?>" alt="<?php echo axil_Elements_Helper::axil_get_image_alt( $settings['shape2']['id'] );?>"></li>
            <?php } ?>  
            <?php if (!empty( $shape3 )) { ?>
                <li class="shape shape-3"><img src="<?php echo esc_url( $shape3 );?>" alt="<?php echo axil_Elements_Helper::axil_get_image_alt( $settings['shape3']['id'] );?>"></li>
            <?php } ?>  
        </ul> 
     <?php } ?>  
 </div>
 