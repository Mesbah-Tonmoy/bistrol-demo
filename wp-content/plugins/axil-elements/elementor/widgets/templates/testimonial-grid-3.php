<?php
/**
 * @author  AxilTheme
 * @since   1.0
 * @version 1.0
 */

namespace axiltheme\abstrak_elements;
use Elementor\Group_Control_Image_Size;
$home_style_active = ( $settings['home_style_active'] == 'yes') ? 'customer-review-area ' : 'customer-review-inner' ;
?> 
<div class="section   <?php echo esc_attr( $home_style_active );?> bg-color-gray overflow-hidden">
    <div class="container"> 
        <?php if( $settings['seation_title_on'] =='yes' ){ ?>   
              <?php if(!empty($settings['testimonial_source_logo']['id'])){ ?>  
                <div class="row">
                    <div class="col-lg-8">
                        <?php if( $settings['seation_title_on'] =='yes' ){ ?>    
                            <div class="section-heading heading-center">
                                <?php  if($settings['sub_title_before']){ ?>
                                    <span class="subtitle"><?php echo wp_kses_post( $settings['sub_title_before'] );?></span>
                                <?php  } ?> 
                                <?php  if($settings['title']){ ?>
                                    <<?php echo esc_html( $settings['sec_title_tag'] );?> class="title"><?php echo wp_kses_post( $settings['title'] );?></<?php echo esc_html( $settings['sec_title_tag'] );?>> 
                                <?php  } ?> 
                                <?php  if($settings['sub_title']){ ?>
                                    <p class="color-gray-4"><?php echo wp_kses_post( $settings['sub_title'] );?></p>
                                <?php  } ?>
                            </div>
                        <?php } ?> 
                       
                    </div>
                    <div class="col-lg-4">
                        <div class="review-site-logo">
                           <?php echo Group_Control_Image_Size::get_attachment_image_html( $settings, 'full', 'testimonial_source_logo' ); ?>
                        </div>
                    </div>
                </div>
             <?php } else { ?> 
            <div class="row">
                <div class="col-lg-12">
                    <?php if( $settings['seation_title_on'] =='yes' ){ ?>    
                        <div class="section-heading heading-center">
                            <?php  if($settings['sub_title_before']){ ?>
                                <span class="subtitle"><?php echo wp_kses_post( $settings['sub_title_before'] );?></span>
                            <?php  } ?> 
                            <?php  if($settings['title']){ ?>
                                <<?php echo esc_html( $settings['sec_title_tag'] );?> class="title"><?php echo wp_kses_post( $settings['title'] );?></<?php echo esc_html( $settings['sec_title_tag'] );?>> 
                            <?php  } ?> 
                            <?php  if($settings['sub_title']){ ?>
                                <p class="color-gray-4"><?php echo wp_kses_post( $settings['sub_title'] );?></p>
                            <?php  } ?>
                        </div>
                    <?php } ?>                
                </div>           
            </div>
        <?php } ?> 
        <?php } ?>  
        
        <div id="no-equal-gallery" class="row row-10">
            <?php  foreach ($settings['reviews_list'] as $item){ ?> 
                <div class="col-lg-3 no-equal-item">
                    <div class="testimonial-grid3 testimonial-gray"> 
                        <div class="author-info"> 
                            <?php if ( ! empty( $item['reviewer_image']['url'] ) ) : ?>
                                <div class="thumb">
                                    <?php echo Group_Control_Image_Size::get_attachment_image_html( $item, 'thumbnail', 'reviewer_image' ); ?>
                                </div>
                            <?php endif; ?> 
                            <div class="content">
                                <span class="name"><?php echo esc_html($item['reviewer_name']); ?></span>
                                <span class="designation"><?php echo esc_html($item['reviewer_title']); ?></span>
                            </div>
                        </div>
                        <?php if ( $item['social_mediar_image_type'] == 'image' ): ?>
                        <?php if ( ! empty( $item['social_mediar_image']['id']) ) : ?>
                        <div class="social-media">
                            <?php echo Group_Control_Image_Size::get_attachment_image_html( $item, 'full', 'social_mediar_image' );?> 
                        </div>
                        <?php endif; ?>
                    <?php else: ?>
                        <?php if ( ! empty( $item['social_media']) ) : ?>
                            <span class="social-media"><?php echo esc_html($item['social_media']); ?></span>
                        <?php endif; ?>
                    <?php endif; ?>  

                            <?php if(!empty($item['review_content'])){ ?>
                                <p class="subtitle"><?php echo esc_html($item['review_content']); ?></p> 
                            <?php } ?>
                            
                    </div>
                </div> 
         <?php } ?>           
        </div>
    </div> 
</div>
        