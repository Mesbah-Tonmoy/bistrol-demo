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

class axil_services_box extends Widget_Base {

 public function get_name() {
        return 'axil-services-box';
    }    
    public function get_title() {
        return __( 'Services Box', 'axil-elements' );
    }
    public function get_icon() {
        return 'eicon-icon-box';
    }
    public function get_categories() {
        return [ ABSTRAK_ELEMENTS_THEME_PREFIX . '-widgets' ];
    }

    protected function register_controls() {
              
        $this->start_controls_section(
            'icon_layout',
            [
                'label' => __( 'General', 'axil-elements' ),
            ]
        );

          $this->add_control(
            'style',
            [
                'label' => esc_html__( 'Layout', 'axil-elements' ),
                'type' => Controls_Manager::SELECT,
                'default' => '1',
                'options' => [
                    '1' => esc_html__( 'Style 1', 'axil-elements' ),
                    '2' => esc_html__( 'Style 2', 'axil-elements' ),                             
                    '3' => esc_html__( 'Style 3', 'axil-elements' ),                             
                    '4' => esc_html__( 'Style 4', 'axil-elements' ),                             
                                                
                                         
                ],
            ] 
        ); 
        $this->add_control(
		    'title',
		    [
		        'label' => __( 'Title', 'axil-elements' ),
		        'type' => Controls_Manager::TEXT,
		        'default' => __( 'Design', 'axil-elements' ),
		        'placeholder' => __( 'Title', 'axil-elements' ),
		    ]
		);
		$this->add_control(
		    'subtitle',
		    [
		        'label' => __( 'Sub Title', 'axil-elements' ),
		        'type' => Controls_Manager::TEXTAREA,
		        'default' => __( 'Simply drag and drop photos and videos into your workspace to automatically add them to your Collab Cloud library.', 'axil-elements' ),
		        'placeholder' => __( 'Sub title', 'axil-elements' ),
		    ]
		);
		$this->add_control(
			    'icontype',
			    [
			        'label' => __( 'Style', 'axil-elements' ),
			        'type' => Controls_Manager::SELECT,
			        'default' => 'image',			       
			        'options' => [
						'icon'  => esc_html__( 'Icon', 'axil-elements' ),
						'image' => esc_html__( 'Custom Image', 'axil-elements' ),
			        ],
			    ] 
			);
        $this->add_control(
			    'icon',
			    [
			        'label' => __( 'Icons', 'axil-elements' ),
			        'type' => Controls_Manager::ICONS,
			        'default' => [
			            'value' => 'fa fa-university',
			            'library' => 'solid',
			        ],
                    'condition' => [
                            'icontype' =>'icon',
                    ],      
			    ]
			);

			$this->add_control(
			    'image',
			    [
			        'label' => __('Image','axil-elements'),
			        'type'=>Controls_Manager::MEDIA,
			        'default' => [
			            'url' => Utils::get_placeholder_image_src(),
			        ],
			        'dynamic' => [
			            'active' => true,
			        ],
			        'condition' => [
				                'icontype' =>'image',
				            ],      
			    ]
			);
            $this->add_group_control(
                Group_Control_Image_Size::get_type(),
                [
                    'name' => 'image_size',
                    'default' => 'full',
                    'separator' => 'none',
                     'condition' => [
				                'icontype' =>'image',
				            ], 
                ]
            );
            $this->add_control(
            'detail_txt',
            [
                'label'   => esc_html__( 'Detail Text', 'axil-elements' ),
                'type'    => Controls_Manager::TEXT,
                'default' => 'Find out more',
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
       $this->end_controls_section();  
       $this->start_controls_section(
            'title_style_section',
            [
                'label' => __( 'Title', 'axil-elements' ),
                'tab' => Controls_Manager::TAB_STYLE,                
            ]
        );
       $this->add_control(
            'title_style_on',
            [
                'label' => __( 'Customize', 'axil-elements' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on'    => __( 'On', 'axil-elements' ),
                'label_off'   => __( 'Off', 'axil-elements' ),
                'default'     => 'no',
               
            ]
        );
         $this->add_control(
            'title_color',
            [
                'label' => __( 'Color', 'axil-elements' ),
                'type' => Controls_Manager::COLOR,  
                'default' => '',
                'condition' => array( 'title_style_on' => array( 'yes' ) ),
                'selectors' => array(
                    '{{WRAPPER}} .title' => 'color: {{VALUE}}',
                ),
            ]
        );
         $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_font_size',
                'label' => __( 'Typography', 'axil-elements' ),                
                 'condition' => array( 'title_style_on' => array( 'yes' ) ),
                'selector' => '{{WRAPPER}} .title',
            ]
        );
         $this->add_responsive_control(
            'title_margin',
            [
                'label' => __( 'Margin', 'axil-elements' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                 'condition' => array( 'title_style_on' => array( 'yes' ) ),
                'selectors' => [
                    '{{WRAPPER}} .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    
                ],
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'subtitle_style_section',
            [
                'label' => __( 'Content or Subtitle', 'axil-elements' ),
                'tab' => Controls_Manager::TAB_STYLE,                
            ]
        );

         $this->add_control(
            'subtitle_style_on',
            [
                'label' => __( 'Customize', 'axil-elements' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on'    => __( 'On', 'axil-elements' ),
                'label_off'   => __( 'Off', 'axil-elements' ),
                'default'     => 'no',
               
            ]
        );   
        $this->add_control(
            'subtitle_color',
            [
                'label' => __( 'Color', 'axil-elements' ),
                'type' => Controls_Manager::COLOR,  
                'default' => '',
                'condition' => array( 'subtitle_style_on' => array( 'yes' ) ),
                'selectors' => array(
                    '{{WRAPPER}} .item-subtitle' => 'color: {{VALUE}}',
                ),
            ]
        );

         $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle_font_size',
                'label' => __( 'Typography', 'axil-elements' ),                
                 'condition' => array( 'subtitle_style_on' => array( 'yes' ) ),
                'selector' => '{{WRAPPER}} .item-subtitle',
            ]
        );
       
        
        $this->add_responsive_control(
            'subtitle_margin',
            [
                'label' => __( 'Margin', 'axil-elements' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                 'condition' => array( 'subtitle_style_on' => array( 'yes' ) ),
                'selectors' => [
                    '{{WRAPPER}} .item-subtitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    
                ],
            ]
        );
        
    $this->end_controls_section();


    $this->start_controls_section(
            'icon_style_section',
            [
                'label' => __( 'Icon Box', 'axil-elements' ),
                'tab' => Controls_Manager::TAB_STYLE,     
                'condition' => array( 'style' => array( '3' ) ),           
            ]
        );

        
        $this->add_control(
            'icon_color',
            [
                'label' => __( 'Icon Color', 'axil-elements' ),
                'type' => Controls_Manager::COLOR,  
                'default' => '',
                'condition' => array( 'subtitle_style_on' => array( 'yes' ) ),
                'selectors' => array(
                    '{{WRAPPER}} .services-grid.service-style-3 .thumbnail i' => 'color: {{VALUE}}',
                ),
            ]
        ); 


        $this->add_control(
            'icon_bg_color',
            [
                'label' => __( 'Icon background Color', 'axil-elements' ),
                'type' => Controls_Manager::COLOR,  
                'default' => '',
                'condition' => array( 'subtitle_style_on' => array( 'yes' ) ),
                'selectors' => array(
                    '{{WRAPPER}} .services-grid.service-style-3 .thumbnail' => 'background-color: {{VALUE}}',
                ),
            ]
        );
 
    $this->end_controls_section();


  
    }
	protected function render() {
	$settings = $this->get_settings();	       
    $template   = 'services-box-' . str_replace("style", "", $settings['style']);  
    return axil_Elements_Helper::axiltheme_element_template( $template, $settings ); 
	}
}