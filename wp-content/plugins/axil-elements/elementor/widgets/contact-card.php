<?php
/**
 * @author  AxilTheme
 * @since   1.0
 * @version 1.0
 */

namespace axiltheme\abstrak_elements;

use Elementor\Widget_Base;
use Elementor\Group_Control_Css_Filter;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Image_Size;
use Elementor\Utils;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Scheme_Color;
use Elementor\Icons_Manager;


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class axil_contact_card extends Widget_Base {

 public function get_name() {
        return 'axil-contact-card';
    }    
    public function get_title() {
        return __( 'Contact Card', 'axil-elements' );
    }
    public function get_icon() {
        return 'eicon-menu-card';
    }
    public function get_categories() {
        return [ ABSTRAK_ELEMENTS_THEME_PREFIX . '-widgets' ];
    }
    protected function register_controls() {

        $this->start_controls_section(
            'axil_content_shortcode',
            [
                'label' => esc_html__( 'Contact Form', 'axil-elements' ),
            ]
        );
 
        $this->add_control(
            'style',
            [
                'label' => esc_html__( 'Layouts', 'axil-elements' ),
                'type' => Controls_Manager::SELECT,
                'default' => '1',                
                'options' => [
                    '1'   => esc_html__( 'Layouts One', 'axil-elements' ),
                    '2'   => esc_html__( 'Layouts Two', 'axil-elements' ),                  
                    
                ],
            ] 
        );

        $this->add_control(
            'card_title',
            [
                'label' => esc_html__('Card Title', 'axil-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Phone',
                'placeholder' => esc_html__('Type Heading Text', 'axil-elements'),
                'label_block' => true,
                 'condition' => array( 'style' => array( '1' ) ),
            ]
        );
        $this->add_control(
            'card_subtitle',
            [
                'label' => esc_html__( 'Card Sub Title', 'axil-elements' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'Our customer care is open from Mon-Fri, 10:00 am to 6:00 pm', 'axil-elements' ),
                'placeholder' => esc_html__( 'Type Sub title', 'axil-elements' ),
                 'condition' => array( 'style' => array( '1' ) ),
            ]
        );

        $this->add_control(
            'card_phone_label',
            [
                'label' => esc_html__('Phone label', 'axil-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Phone',
                'placeholder' => esc_html__('Type Mail Text', 'axil-elements'),
                'label_block' => true,
                'condition' => array( 'style' => array( '2' ) ),
            ]
        );


        $this->add_control(
            'card_phone',
            [
                'label' => esc_html__('Card Phone', 'axil-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => '(123) 456 7890',
                'placeholder' => esc_html__('Type Phone', 'axil-elements'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'card_address_label',
            [
                'label' => esc_html__('Address label', 'axil-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Address',
                'placeholder' => esc_html__('Type Mail Text', 'axil-elements'),
                'label_block' => true,
                'condition' => array( 'style' => array( '2' ) ),
            ]
        );
        $this->add_control(
            'card_address',
            [
                'label' => esc_html__('Card Address', 'axil-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Warnwe Park Streetperrine, FL 33157 New York City',
                'placeholder' => esc_html__('Type Phone', 'axil-elements'),
                'label_block' => true,
                 'condition' => array( 'style' => array( '2' ) ),
            ]
        );


        $this->add_control(
            'card_email_label',
            [
                'label' => esc_html__('Email label', 'axil-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Mail',
                'placeholder' => esc_html__('Type Mail Text', 'axil-elements'),
                'label_block' => true,
                'condition' => array( 'style' => array( '2' ) ),
            ]
        );

        $this->add_control(
            'card_email',
            [
                'label' => esc_html__('Card Email', 'axil-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => 'info@example.com',
                'placeholder' => esc_html__('Type Email Text', 'axil-elements'),
                'label_block' => true,
            ]
        );


     $this->end_controls_section();
     $this->start_controls_section(
            'title_style_section',
            [
                'label' => __( 'Title', 'axil-elements' ),
                'tab' => Controls_Manager::TAB_STYLE,    
                 'condition' => array( 'style' => array( '1' ) ),

            ]
        );
       
        $this->add_control(
            'card_title_color',
            [
                'label' => __( 'Color', 'axil-elements' ),
                'type' => Controls_Manager::COLOR,  
                'default' => '',                
                'selectors' => array(
                    '{{WRAPPER}} .contact-info .title' => 'color: {{VALUE}}',
                ),
            ]
        );

         $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'card_title_font_size',
                'label' => __( 'Typography', 'axil-elements' ),                
               
                'selector' => '{{WRAPPER}} .contact-info .title',
            ]
        );

        $this->add_responsive_control(
            'card_title_padding',
            [
                'label' => esc_html__('Padding', 'axil-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .contact-info .title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );
        
        $this->add_responsive_control(
            'card_title_margin',
            [
                'label' => __( 'Margin', 'axil-elements' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
               
                'selectors' => [
                    '{{WRAPPER}} .contact-info .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    
                ],
            ]
        );
        
    $this->end_controls_section();
    $this->start_controls_section(
            'sub_title_style_section',
            [
                'label' => __( 'Sub Title', 'axil-elements' ),
                'tab' => Controls_Manager::TAB_STYLE,       
                 'condition' => array( 'style' => array( '1' ) ),         
            ]
        );
       
        $this->add_control(
            'card_sub_title_color',
            [
                'label' => __( 'Color', 'axil-elements' ),
                'type' => Controls_Manager::COLOR,  
                'default' => '',                
                'selectors' => array(
                    '{{WRAPPER}} .contact-info .subtitle' => 'color: {{VALUE}}',
                ),
            ]
        );

         $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'card_sub_title_font_size',
                'label' => __( 'Typography', 'axil-elements' ),                
               
                'selector' => '{{WRAPPER}} .contact-info .subtitle',
            ]
        );

        $this->add_responsive_control(
            'card_sub_title_padding',
            [
                'label' => esc_html__('Padding', 'axil-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .contact-info .subtitle' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );
        
        $this->add_responsive_control(
            'card_sub_title_margin',
            [
                'label' => __( 'Margin', 'axil-elements' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
               
                'selectors' => [
                    '{{WRAPPER}} .contact-info .subtitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    
                ],
            ]
        );
        
    $this->end_controls_section();
    $this->start_controls_section(
            'pe_style_section_label',
            [
                'label' => __( 'Phone / Email / Address Label', 'axil-elements' ),
                'tab' => Controls_Manager::TAB_STYLE, 
                'condition' => array( 'style' => array( '2' ) ),                
            ]
        );
       
        $this->add_control(
            'card_pe_color_label',
            [
                'label' => __( 'Color', 'axil-elements' ),
                'type' => Controls_Manager::COLOR,  
                'default' => '',                
                'selectors' => array(
                    '{{WRAPPER}} .contact-address .address .title' => 'color: {{VALUE}}',
                ),
            ]
        );

         $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'card_pe_font_size_label',
                'label' => __( 'Typography', 'axil-elements' ),                
               
                'selector' => '{{WRAPPER}} .contact-address .address .title',
            ]
        );

        $this->add_responsive_control(
            'card_pe_padding_label',
            [
                'label' => esc_html__('Padding', 'axil-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .contact-address .address .title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    
                ],
                'separator' => 'before',
            ]
        );
        
        $this->add_responsive_control(
            'card_pe_margin_label',
            [
                'label' => __( 'Margin', 'axil-elements' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
               
                'selectors' => [
                    '{{WRAPPER}} .contact-address .address .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    
                ],
            ]
        );
        
    $this->end_controls_section();
    $this->start_controls_section(
            'pe_style_section',
            [
                'label' => __( 'Phone / Email / Address', 'axil-elements' ),
                'tab' => Controls_Manager::TAB_STYLE,                
            ]
        );
       
        $this->add_control(
            'card_pe_color',
            [
                'label' => __( 'Color', 'axil-elements' ),
                'type' => Controls_Manager::COLOR,  
                'default' => '',                
                'selectors' => array(
                    '{{WRAPPER}} .contact-info .phone-number' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .contact-address .address p' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .contact-address .address p a' => 'color: {{VALUE}}',
                ),
            ]
        );

         $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'card_pe_font_size',
                'label' => __( 'Typography', 'axil-elements' ),                
               
                'selector' => '{{WRAPPER}} .contact-info .phone-number, {{WRAPPER}} .contact-address .address p',
            ]
        );

        $this->add_responsive_control(
            'card_pe_padding',
            [
                'label' => esc_html__('Padding', 'axil-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .contact-info .phone-number' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .contact-address .address p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );
        
        $this->add_responsive_control(
            'card_pe_margin',
            [
                'label' => __( 'Margin', 'axil-elements' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
               
                'selectors' => [
                    '{{WRAPPER}} .contact-info .phone-number' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .contact-address .address p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    
                ],
            ]
        );
        
    $this->end_controls_section();
}


protected function render() {
	$settings = $this->get_settings(); 
    $allowed_tags = wp_kses_allowed_html( 'post' );
    $phoneNumber = preg_replace("/[^0-9+]/", '', $settings['card_phone'] );  
   
        if ($settings['style'] == '1') {  
        ?>

            <div class="contact-info">
                <?php if ($settings['card_title']) : ?>
                    <h4 class="title"><?php echo wp_kses( $settings['card_title'], $allowed_tags ); ?></h4>
                <?php endif; ?>
                <?php if ($settings['card_subtitle']) : ?>
                    <p class="subtitle"><?php echo wp_kses( $settings['card_subtitle'], $allowed_tags ); ?></p>
                <?php endif; ?>
                <?php if ($settings['card_phone']) : ?>
                    <h4 class="phone-number"><a href="tel:<?php echo wp_kses( $phoneNumber, $allowed_tags ); ?>"><?php echo esc_attr( $settings['card_phone'] ); ?></a></h4>
                 <?php endif; ?>
                <?php if ( $settings['card_email'] ) : ?>
                    <h4 class="phone-number"><a href="mailto:<?php echo wp_kses( $settings['card_email'], $allowed_tags ); ?>"><?php echo esc_attr( $settings['card_email'] ); ?></a></h4>
                 <?php endif; ?>
            </div>
        <?php }else {  ?>
             <div class="contact-address">                           
                <div class="address-list">
                    <div class="address">
                        <?php if ( $settings['card_email_label'] ) : ?>
                                 <h6 class="title"><?php echo esc_attr( $settings['card_email_label'] ); ?></h6>
                        <?php endif; ?>
                        <?php if ( $settings['card_email'] ) : ?>
                            <p><a href="mailto:<?php echo wp_kses( $settings['card_email'], $allowed_tags ); ?>"><?php echo esc_attr( $settings['card_email'] ); ?></a></p>
                         <?php endif; ?>
                    </div>
                    <div class="address">
                        <?php if ( $settings['card_address_label'] ) : ?>
                            <h6 class="title"><?php echo esc_attr( $settings['card_address_label'] ); ?></h6>
                        <?php endif; ?>
                        <?php if ( $settings['card_address'] ) : ?>
                            <p><?php echo esc_attr( $settings['card_address'] ); ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="address">
                        <?php if ( $settings['card_phone_label'] ) : ?>
                            <h6 class="title"><?php echo esc_attr( $settings['card_phone_label'] ); ?></h6>
                        <?php endif; ?>
                        <?php if ( $settings['card_phone'] ) : ?>
                            <p><a href="tel:<?php echo wp_kses( $phoneNumber, $allowed_tags ); ?>"><?php echo esc_attr( $settings['card_phone'] ); ?></a></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
     <?php } ?>
    <?php 
	}
}