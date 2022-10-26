<?php
/**
 * @author  AxilTheme
 * @since   1.0
 * @version 1.0
 */

namespace axiltheme\abstrak_elements;
use Elementor\Icons_Manager;


    $attr = $btn = '';       

    if ( !empty( $settings['url']['url'] ) ) {
        $attr  = 'href="' . $settings['url']['url'] . '"';
        $attr .= !empty( $settings['url']['is_external'] ) ? ' target="_blank"' : '';
        $attr .= !empty( $settings['url']['nofollow'] ) ? ' rel="nofollow"' : '';
    }

    if ( $settings['url']['url'] ) {
        $btn = '<a class="axil-btn2 btn-large btn-borderd" ' . $attr . '>'.$settings['detail_txt'] .'</a>';
    }
    $allowed_tags = wp_kses_allowed_html( 'post' );
    $active =    $settings['recommended_on'] == 'yes' ? 'active' : 'no-active';  
    $hasborder =  $settings['border_on'] == 'yes' ? 'pricing-borderd' : 'no-pricing-borderd';  
	?>	
    <div class="pricing-table2 <?php echo esc_attr( $active );?>  <?php echo esc_attr( $hasborder );?> ">
        <?php if ( $settings['recommended_icon_on'] == 'yes' ) { ?>  
            <div class="star-icon">
               <?php Icons_Manager::render_icon( $settings['icon'] ); ?>
            </div>
         <?php } ?>  
        <div class="pricing-header">
            <h3 class="title"><?php echo esc_attr( $settings['header_title'] );?></h3>
           
            <div class="price-wrap">
                <span class="amount"><?php echo esc_attr( $settings['amount'] );?></span>
                <span class="duration"><?php echo esc_attr( $settings['duration'] );?></span>
            </div>
             <span class="subtitle"><?php echo esc_attr( $settings['subtitle'] );?></span>
           
        </div>
        <div class="pricing-body">
            <ul class="list-unstyled">
                <?php foreach ($settings['option_list'] as $option_list) { ?>
                    <li><?php echo esc_attr( $option_list['list_title'] );?></li>
                <?php } ?>     

            </ul>
        </div>
         <div class="pricing-btn">
                 <?php echo wp_kses( $btn, $allowed_tags ); ?>
               
            </div>
    </div>
