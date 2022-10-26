<?php
/**
 * @author  AxilTheme
 * @since   1.0
 * @version 1.0
 */
?>
<?php 

$shape1 =  $settings['shape1']['url'];
$shape2 =  $settings['shape2']['url'];
$shape3 =  $settings['shape3']['url'];
?>
    <div class="section section-padding-equal bg-color-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 sal-animate" data-sal="slide-up" data-sal-duration="800">
                    <div class="about-us">
                        <div class="section-heading heading-left mb-0">
                            <?php  if( $settings['sub_title_before']){ ?>
                                <span class="subtitle"><?php echo axil_kses_intermediate( $settings['sub_title_before'] );?></span>
                            <?php  } ?> 
                             <?php  if( $settings['title']){ ?>
                                <h2 class="title mb--40"><?php echo axil_kses_intermediate( $settings['title'] );?></h2>
                            <?php  } ?> 

                            <?php  if($settings['sub_title']){ ?>
                              <p><?php echo axil_kses_intermediate( $settings['sub_title'] );?></p>
                            <?php  } ?>   
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-6 offset-xl-1 sal-animate" data-sal="slide-up" data-sal-duration="800" data-sal-delay="100">
                    <div class="contact-form-box">
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
            </div>
        </div>
    <?php if( $settings['shape_style_on']  == 'yes' ){ ?>
        <ul class="shape-group-6 list-unstyled">
            <?php if (!empty( $shape1 )) { ?>
                <li class="shape shape-1"><img src="<?php echo esc_url( $shape1 );?>" alt="<?php esc_html_e( 'Bubble', 'axil-elements' ); ?>"></li>
            <?php } ?>  
            <?php if (!empty( $shape2 )) { ?>
                <li class="shape shape-2"><img src="<?php echo esc_url( $shape2 );?>" alt="<?php esc_html_e( 'Bubble', 'axil-elements' ); ?>"></li>
            <?php } ?>  
            <?php if (!empty( $shape3 )) { ?>
                <li class="shape shape-3"><img src="<?php echo esc_url( $shape3 );?>" alt="<?php esc_html_e( 'Bubble', 'axil-elements' ); ?>"></li>
            <?php } ?>  
        </ul> 
     <?php } ?>
    </div>