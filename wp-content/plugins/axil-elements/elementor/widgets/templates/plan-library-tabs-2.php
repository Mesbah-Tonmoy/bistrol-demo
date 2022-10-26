<?php
/**
 * @author  AxilTheme
 * @since   1.0
 * @version 1.0
 */

namespace axiltheme\abstrak_elements;
use Elementor\Icons_Manager;

$tab_nav1       = $settings['tab_nav1']; 
$tab_nav2       = $settings['tab_nav2']; 

$shape1 =  $settings['shape31']['url'];
$shape2 =  $settings['shape32']['url'];
$shape3 =  $settings['shape33']['url'];
$col_class = "col-lg-{$settings['col_lg']} col-md-{$settings['col_md']} col-sm-{$settings['col_sm']}";
?>     
<div class="section <?php echo esc_attr( $settings['price_bg_type'] );?> section-padding">
    <div class="container">
        <?php if( $settings['seation_pricing_library_title_on'] =='yes' ){ ?>  

        <div class="section-heading mb-0 heading-dark-<?php echo esc_attr( $settings['axil_pricing_library_align'] );?>">            
            <?php  if($settings['axil_pricing_library_title_before']){ ?>
                <span class="subtitle"><?php echo esc_attr( $settings['axil_pricing_library_title_before'] );?></span>
            <?php  } ?> 

        <?php if ($settings['axil_pricing_library_title_tag']) : ?>
            <?php  if($settings['axil_pricing_library_title']){ ?>
                <<?php echo esc_html( $settings['axil_pricing_library_title_tag'] );?> class="title">
                    <?php echo wp_kses_post( $settings['axil_pricing_library_title'] );?>
                </<?php echo esc_html( $settings['axil_pricing_library_title_tag'] );?>> 
            <?php  } ?>             
        <?php endif; ?>

            <?php  if($settings['axil_sub_pricing_library_title']){ ?>
                <p><?php echo wp_kses_post( $settings['axil_sub_pricing_library_title'] );?></p>
            <?php  } ?>
        </div>
    <?php } ?> 


     <div class="pricing-billing-duration">
            <ul>
                <li class="nav-item">
                    <button class="nav-link active" id="yearly-plan-btn" type="button"><?php echo wp_kses_post( $tab_nav1 );?></button>
                </li>
               
                <li class="nav-item">
                    <button class="nav-link" id="monthly-plan-btn" type="button"><?php echo wp_kses_post( $tab_nav2 );?></button>
                </li>
            </ul>
        </div>

        <div class="row">
            <?php 
                   
                  foreach ( $settings['pricing_table_list'] as $elementor_library ):
                    
                    $library_elementor_library = $elementor_library['library_tab_library'];              
                     $attr = $btn = '';       

                        if ( !empty( $elementor_library['url']['url'] ) ) {
                            $attr  = 'href="' . $elementor_library['url']['url'] . '"';
                            $attr .= !empty( $elementor_library['url']['is_external'] ) ? ' target="_blank"' : '';
                            $attr .= !empty( $elementor_library['url']['nofollow'] ) ? ' rel="nofollow"' : '';
                        }

                        if ( $elementor_library['url']['url'] ) {
                            $btn = '<a class="axil-btn btn-large-fluid btn-borderd" ' . $attr . '>'.$elementor_library['detail_txt'] .'</a>';
                        }
                        $allowed_tags = wp_kses_allowed_html( 'post' );
                        $active =    $elementor_library['recommended_on'] == 'yes' ? 'active' : 'no-active';  
                        $hasborder =  $elementor_library['border_on'] == 'yes' ? 'pricing-borderd' : 'no-pricing-borderd';  
                        ?>  



                        <div class="<?php echo esc_attr($col_class);?>" data-sal="slide-up" data-sal-duration="800" data-sal-delay="100">     
                            <div class="pricing-table2 <?php echo esc_attr( $active );?>  <?php echo esc_attr( $hasborder );?> ">
                                <?php if ( $elementor_library['recommended_icon_on'] == 'yes' ) { ?>  
                                    <div class="star-icon">
                                       <?php Icons_Manager::render_icon( $elementor_library['icon'] ); ?>
                                    </div>
                                 <?php } ?>  
                                <div class="pricing-header">
                                    <h3 class="title"><?php echo esc_attr( $elementor_library['header_title'] );?></h3>
                                    
                                    
                                    <div class="price-wrap">
                                        <div class="yearly-pricing">
                                           <span class="amount"><?php echo esc_attr( $elementor_library['amount2'] );?></span>
                                            <span class="duration"><?php echo esc_attr( $elementor_library['duration2'] );?></span>
                                        </div>
                                        <div class="monthly-pricing">
                                           <span class="amount"><?php echo esc_attr( $elementor_library['amount'] );?></span>
                                            <span class="duration"><?php echo esc_attr( $elementor_library['duration'] );?></span>
                                        </div>
                                    </div> 
                                    <span class="subtitle"><?php echo esc_attr( $elementor_library['subtitle'] );?></span>
                                </div>
                                <div class="pricing-body">
                                    <?php echo $content_1 = \Elementor\Plugin::$instance->frontend->get_builder_content_for_display( $library_elementor_library ) ;?>
                                </div>
                                <div class="pricing-btn">
                                         <?php echo wp_kses( $btn, $allowed_tags ); ?>
                                       
                                    </div>
                            </div>
                        </div> 
            <?php  endforeach;?>
            
        </div> 
 </div>
<?php if( $settings['shape_style_on'] == 'yes' ){  ?> 

     <ul class="shape-group-3 list-unstyled">
        <?php if( $shape1 ){ ?>     
            <li class="shape shape-1"><img src="<?php echo esc_url( $shape1 );?>" alt="<?php echo axil_Elements_Helper::axil_get_image_alt( $settings['shape31']['id'] );?>"></li>
        <?php } ?> 
        <?php if( $shape2 ){ ?>     
            <li class="shape shape-2"><img src="<?php echo esc_url( $shape2 );?>" alt="<?php echo axil_Elements_Helper::axil_get_image_alt( $settings['shape32']['id'] );?>"></li>
        <?php } ?> 
        <?php if( $shape3 ){ ?>     
            <li class="shape shape-3"><img src="<?php echo esc_url( $shape3 );?>" alt="<?php echo axil_Elements_Helper::axil_get_image_alt( $settings['shape33']['id'] );?>"></li>
        <?php } ?> 
    </ul>   
<?php } ?> 
</div>
