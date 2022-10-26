<?php
/**
 * @author  AxilTheme
 * @since   1.0
 * @version 1.0
 */

namespace axiltheme\abstrak_elements;


use Elementor\Widget_Base;
use Elementor\Group_Control_Css_Filter;
use Elementor\Repeater;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Image_Size;
use Elementor\Utils;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Scheme_Color;
use Elementor\DATE_TIME;
use Elementor\SLIDER;
use Elementor\CHOOSE;
use Elementor\Icons_Manager;


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Pricing_Table  extends Widget_Base {

 public function get_name() {
        return 'abstrak-pricing-table';
    }    
    public function get_title() {
        return esc_html__( 'Pricing Table ', 'axil-elements' );
    }
    public function get_icon() {
        return 'eicon-price-table';
    }
    public function get_categories() {
        return [ ABSTRAK_ELEMENTS_THEME_PREFIX . '-widgets' ];
    }

    protected function register_controls() {
        $this->start_controls_section(
            'pricing_layout',
            [
                'label' => esc_html__( 'General', 'axil-elements' ),
            ]
        );
 
          $this->add_control(
            'layout',
            [
                'label' => esc_html__( 'Background Style', 'axil-elements' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'style1',
                'options' => [
                    'style1'    => esc_html__( 'Layout 1', 'axil-elements' ),
                    'style2'    => esc_html__( 'Layout 2', 'axil-elements' ),
                                      
                    
                ],
            ] 
        );

        $this->add_control(
		    'header_title',
		    [
		        'label' => esc_html__( 'Header Title', 'axil-elements' ),
		        'type' => Controls_Manager::TEXTAREA,
		        'default' => esc_html__( 'Professional', 'axil-elements' ),
		        'placeholder' => esc_html__( 'Title', 'axil-elements' ),
		    ]
		);
		
        $this->add_control(
		    'subtitle',
		    [
		        'label' => esc_html__( 'Sub Title', 'axil-elements' ),
		        'type' => Controls_Manager::TEXTAREA,
		        'default' => esc_html__( 'A beautiful, simple website', 'axil-elements' ),
		        'placeholder' => esc_html__( 'Sub title', 'axil-elements' ),
		    ]
		);
        $this->add_control(
                'amount',
                [
                    'label'   => esc_html__( 'Amount Text', 'axil-elements' ),
                    'type'    => Controls_Manager::TEXT,
                    'default' => '$19.99',
                ]
            );     

            $this->add_control(
                'duration',
                [
                    'label'   => esc_html__( 'Duration', 'axil-elements' ),
                    'type'    => Controls_Manager::TEXT,
                    'default' => esc_html__( ' / manth', 'axil-elements' ),
                ]
            );    

             $this->add_control(
                'recommended_icon_on',
                [
                    'label' => esc_html__( 'Recommended Icon', 'axil-elements' ),
                    'type' => Controls_Manager::SWITCHER,
                    'label_on'    => esc_html__( 'On', 'axil-elements' ),
                    'label_off'   => esc_html__( 'Off', 'axil-elements' ),
                    'default'     => 'no',
                   
                ]
            );

            $this->add_control(
                'icon',
                [
                    'label' => __( 'Recommended Top Icons', 'axil-elements' ),
                    'type' => Controls_Manager::ICONS,
                     'condition' => array( 'recommended_icon_on' => array( 'yes' ) ),
                    'default' => [
                        'value' => 'fas fa-star',
                        'library' => 'solid',
                    ],
                         
                ]
            ); 
             $this->add_control(
                'detail_txt',
                [
                    'label'   => esc_html__( 'Detail Text', 'axil-elements' ),
                    'type'    => Controls_Manager::TEXT,                  
                    'default' => esc_html__( 'Get Started Today', 'axil-elements' ),
                    'label'   => esc_html__( 'Detail Text', 'axil-elements' ),
                ]
            );     

            $this->add_control(
                'url',
                [
                    'label'   => esc_html__( 'Detail URL', 'axil-elements' ),
                    'type'    => Controls_Manager::URL,
                    'placeholder' => 'https://your-link.com',              
                ]
            );     

            $this->add_control(
                'recommended_on',
                [
                    'label' => esc_html__( 'Active', 'axil-elements' ),
                    'type' => Controls_Manager::SWITCHER,
                    'label_on'    => esc_html__( 'On', 'axil-elements' ),
                    'label_off'   => esc_html__( 'Off', 'axil-elements' ),
                    'default'     => 'no',
                   
                ]
            );
            $this->add_control(
                'border_on',
                [
                    'label' => esc_html__( 'Has Border', 'axil-elements' ),
                    'type' => Controls_Manager::SWITCHER,
                    'label_on'    => esc_html__( 'On', 'axil-elements' ),
                    'label_off'   => esc_html__( 'Off', 'axil-elements' ),
                    'default'     => 'no',
                   
                ]
            );
              		
        $this->end_controls_section(); 
        $this->start_controls_section(
            'sec_option_list',
            [
                'label' => esc_html__('Option List','axil-elements'),
                
            ]
        );

        $repeater = new Repeater();
        $repeater->add_control(
            'list_title',
            [
                'label' => esc_html__('List Title','axil-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('10 Pages Responsive Website','axil-elements'),
                'placeholder' => esc_html__('Type Heading Text','axil-elements'),
                'label_block' => true,
            ]
        );
              
        $this->add_control(
            'option_list',
            [
                'label' => esc_html__('option List','axil-elements'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'list_title' => esc_html__('10 Pages Responsive Website','axil-elements'),
                        
                    ],
                    [
                        'list_title' => esc_html__('5 PPC Campaigns','axil-elements'),
                        
                    ],
                    [
                        'list_title' => esc_html__('10 SEO Keywords','axil-elements'),
                        
                    ],
                    [
                        'list_title' => esc_html__('5 Facebook Camplaigns','axil-elements'),
                        
                    ]
                ],
                'title_field' => '{{{ list_title }}}',
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'title_style_section',
            [
                'label' => esc_html__( 'Title', 'axil-elements' ),
                'tab' => Controls_Manager::TAB_STYLE,                
            ]
        );
        
          $this->add_control(
            'title_color',
            [
                'label' => esc_html__( 'Color', 'axil-elements' ),
                'type' => Controls_Manager::COLOR,  
                'default' => '',
               
                'selectors' => array(
                    '{{WRAPPER}} .title' => 'color: {{VALUE}}',
                ),
            ]
        );

         $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_font_size',
                'label' => esc_html__( 'Typography', 'axil-elements' ),                
                
                'selector' => '{{WRAPPER}} .title',
            ]
        );
       
        $this->add_responsive_control(
            'title_margin',
            [
                'label' => esc_html__( 'Margin', 'axil-elements' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                
                'selectors' => [
                    '{{WRAPPER}} .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    
                ],
            ]
        );
        
    $this->end_controls_section();
    $this->start_controls_section(
            'subtitle_style_section',
            [
                'label' => esc_html__( 'Content or Subtitle', 'axil-elements' ),
                'tab' => Controls_Manager::TAB_STYLE,                
            ]
        );
    $this->add_control(
            'subtitle_color',
            [
                'label' => esc_html__( 'Color', 'axil-elements' ),
                'type' => Controls_Manager::COLOR,  
                'default' => '',
               
                'selectors' => array(
                    '{{WRAPPER}} .pricing-header .subtitle' => 'color: {{VALUE}}',
                ),
            ]
        );
    $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle_font_size',
                'label' => esc_html__( 'Typography', 'axil-elements' ),                
                
                'selector' => '{{WRAPPER}} .pricing-header .subtitle',
            ]
        );
    $this->add_responsive_control(
            'subtitle_margin',
            [
                'label' => esc_html__( 'Margin', 'axil-elements' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                
                'selectors' => [
                    '{{WRAPPER}} .pricing-header .subtitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    
                ],
            ]
        );
        
    $this->end_controls_section(); 
    $this->start_controls_section(
            'amount_style_section',
            [
                'label' => esc_html__( 'Amount', 'axil-elements' ),
                'tab' => Controls_Manager::TAB_STYLE,                
            ]
        );
    $this->add_control(
            'amount_color',
            [
                'label' => esc_html__( 'Color', 'axil-elements' ),
                'type' => Controls_Manager::COLOR,  
                'default' => '',
               
                'selectors' => array(
                    '{{WRAPPER}}  .pricing-header .price-wrap .amount' => 'color: {{VALUE}}',
                ),
            ]
        );
    $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'amount_font_size',
                'label' => esc_html__( 'Typography', 'axil-elements' ),                
                
                'selector' => '{{WRAPPER}} .pricing-header .price-wrap .amount',
            ]
        );
    $this->add_responsive_control(
            'amount_margin',
            [
                'label' => esc_html__( 'Margin', 'axil-elements' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                
                'selectors' => [
                    '{{WRAPPER}} .pricing-header .price-wrap .amount' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    
                ],
            ]
        );
    $this->end_controls_section();
    $this->start_controls_section(
        'list_style_section',
        [
            'label' => esc_html__( 'List', 'axil-elements' ),
            'tab' => Controls_Manager::TAB_STYLE,                
        ]
    );
    $this->add_control(
        'list_color',
        [
            'label' => esc_html__( 'Color', 'axil-elements' ),
            'type' => Controls_Manager::COLOR,  
            'default' => '',
           
            'selectors' => array(
                '{{WRAPPER}} .pricing-table .pricing-body li' => 'color: {{VALUE}}',
            ),
        ]
    );

     $this->add_group_control(
        Group_Control_Typography::get_type(),
        [
            'name' => 'list_font_size',
            'label' => esc_html__( 'Typography', 'axil-elements' ),                
            
            'selector' => '{{WRAPPER}} .pricing-table .pricing-body li',
        ]
    );
   
    $this->add_responsive_control(
        'list_margin',
        [
            'label' => esc_html__( 'Margin', 'axil-elements' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em' ],
            
            'selectors' => [
                '{{WRAPPER}} .pricing-table .pricing-body li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                
            ],
        ]
    );
    $this->end_controls_section();
}

	protected function render() {
		$settings = $this->get_settings();	 
        $template   = 'pricing-table-' . str_replace("style", "", $settings['layout']);  
        return axil_Elements_Helper::axiltheme_element_template( $template, $settings );
 
     
	}
}