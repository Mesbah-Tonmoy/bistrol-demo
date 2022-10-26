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
 

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
class Testimonial_Carousel extends Widget_Base {
   
    public function get_name() {       
        return 'axil-testimonial';
    }    
    public function get_title() {      
          return esc_html__( 'Testimonial Carousel', 'axil-elements' );
    }
    public function get_icon() {
        return 'eicon-testimonial-carousel';
    }
    public function get_categories() {
        return [ ABSTRAK_ELEMENTS_THEME_PREFIX . '-widgets' ];
    }
    protected function register_controls() {

          $this->start_controls_section(
            'testimonial_layout',
            [
                'label' => esc_html__( 'Layout', 'axil-elements' ),
            ]
        );
		$this->add_control(
		    'style',
		    [
		        'label' => esc_html__( 'Style', 'axil-elements' ),
		        'type' => Controls_Manager::SELECT,
		        'default' => '1',
		        'options' => [
		            '1'   => esc_html__( 'Style One', 'axil-elements' ),
		            '2'   => esc_html__( 'Style Two', 'axil-elements' ),		        
		        ],
		    ] 
		);  

		$this->end_controls_section();
		$this->start_controls_section(
            'testimonial_content',
            [
                'label' => esc_html__( 'Testimonial', 'axil-elements' ),
            ]
        );

		$repeater = new Repeater();



		$repeater->add_control(
		    'testimonial_image',
		    [
		        'label' => esc_html__( 'Testimonial Logo', 'axil-elements' ),
		        'type' => Controls_Manager::MEDIA,
		        'default' => [
		            'url' => Utils::get_placeholder_image_src(),
		        ],
		    ]
		);
		
		$repeater->add_control(
		    'title',
		    [
		        'label'   => esc_html__('Title', 'axil-elements' ),
		        'type'    => Controls_Manager::TEXT,
		        'default' => 'Lorem Ipsum',
		    ]
		);
		$repeater->add_control(
		    'designation',
		    [
		        'label'   => esc_html__('Designation', 'axil-elements' ),
		        'type'    => Controls_Manager::TEXTAREA,
		        'default' => 'Lorem Ipsum',
		    ]
		);
		$repeater->add_control(
		    'content',
		    [
		        'label'   => esc_html__('Content', 'axil-elements' ),
		        'type'    => Controls_Manager::TEXTAREA,		        
		        'default' => esc_html__( 'Very good Design. Flexible. Fast Support.', 'axil-elements' ),  
		    ]
		);
		
		
		$repeater->add_control(

			'videourl',
			[
			    'label'   => esc_html__( 'Video Popup URL', 'axil-elements' ),
			    'type'    => Controls_Manager::URL,
			    'placeholder' => 'https://your-link.com',
			    
			] 
		 );




		    
	       $this->add_control(
            'list_testimonial',
            [
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'show_label' => false,
                'default' => [
                    [
                        'title' => esc_html__( 'Amy Smith', 'axil-elements' ),
                        'content' => 'This is the best website I have ordered something from. I highly recommend.',
                    ], 
                    [
                        'title' => esc_html__( 'Amy Smith', 'axil-elements' ),
                        'content' => 'This is the best website I have ordered something from. I highly recommend.',
                    ],
                    [
                        'title' => esc_html__( 'Amy Smith', 'axil-elements' ),
                        'content' => 'This is the best website I have ordered something from. I highly recommend.',
                    ],
                    [
                        'title' => esc_html__( 'Amy Smith', 'axil-elements' ),
                        'content' => 'This is the best website I have ordered something from. I highly recommend.',
                    ],

                ],
                 'title_field' => '{{{ title }}}',
            ]
        );

		$this->end_controls_section();

     $this->start_controls_section(
            'title_style_section',
            [
                'label' => esc_html__( 'Testimonial Content', 'axil-elements' ),
                'tab' => Controls_Manager::TAB_STYLE,                
            ]
        );

         $this->add_control(
            'content_style_on',
            [
                'label' => esc_html__( 'Customize', 'axil-elements' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on'    => esc_html__( 'On', 'axil-elements' ),
                'label_off'   => esc_html__( 'Off', 'axil-elements' ),
                'default'     => 'no',
               
            ]
        );   

 
          $this->add_control(
            'content_color',
            [
                'label' => esc_html__( 'Color', 'axil-elements' ),
                'type' => Controls_Manager::COLOR,  
                'default' => '',
                'condition' => array( 'content_style_on' => array( 'yes' ) ),
                'selectors' => array(
                    '{{WRAPPER}} .testimonial-style-one-content .thumb-content p' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .testimonial-style-two-wrapper .thumb-content p' => 'color: {{VALUE}}',
                ),
            ]
        );

         $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'content_font_size',
                'label' => esc_html__( 'Typography', 'axil-elements' ),                
                 'condition' => array( 'content_style_on' => array( 'yes' ) ),
                'selector' => '{{WRAPPER}} .testimonial-style-one-content .thumb-content p, {{WRAPPER}} .testimonial-style-two-wrapper .thumb-content p',
            ]
        );
       
        $this->add_responsive_control(
            'content_title_margin',
            [
                'label' => esc_html__( 'Margin', 'axil-elements' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                 'condition' => array( 'content_style_on' => array( 'yes' ) ),
                'selectors' => [
                    '{{WRAPPER}} .testimonial-style-one-content .thumb-content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .testimonial-style-two-wrapper .thumb-content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    
                ],
            ]
        );
        
    $this->end_controls_section();


        $this->start_controls_section(
            'section_title_style',
            [
                'label' => __( 'Testimonial Title', 'axil-elements' ),
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
            'stitle_color',
            [
                'label' => __( 'Color', 'axil-elements' ),
                'type' => Controls_Manager::COLOR,  
                'default' => '',
                'condition' => array( 'title_style_on' => array( 'yes' ) ),
                'selectors' => array(
                    '{{WRAPPER}} .testimonial-style-one-content .thumb-content .title' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .testimonial-style-two-wrapper .thumb-content .item-title' => 'color: {{VALUE}}',
                ),
            ]
        );

         $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'stitle_font_size',
                'label' => __( 'Typography', 'axil-elements' ),                
                 'condition' => array( 'title_style_on' => array( 'yes' ) ),
                'selector' => '{{WRAPPER}} .testimonial-style-one-content .thumb-content .title, {{WRAPPER}} .testimonial-style-two-wrapper .thumb-content .item-title',
            ]
        );
       
        $this->add_responsive_control(
            'stitle_margin',
            [
                'label' => __( 'Margin', 'axil-elements' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                 'condition' => array( 'title_style_on' => array( 'yes' ) ),
                'selectors' => [
                    '{{WRAPPER}} .testimonial-style-one-content .thumb-content .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                    '{{WRAPPER}} .testimonial-style-two-wrapper .thumb-content .item-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                    
                ],
            ]
        );
       
    $this->end_controls_section();

        $this->start_controls_section(
            'sub_title_style_section',
            [
                'label' => __( 'Testimonial Sub Title', 'axil-elements' ),
                'tab' => Controls_Manager::TAB_STYLE,                
            ]
        );

         $this->add_control(
            'sub_title_style_on',
            [
                'label' => __( 'Customize', 'axil-elements' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on'    => __( 'On', 'axil-elements' ),
                'label_off'   => __( 'Off', 'axil-elements' ),
                'default'     => 'no',
               
            ]
        );   

          $this->add_control(
            'sub_title_color',
            [
                'label' => __( 'Color', 'axil-elements' ),
                'type' => Controls_Manager::COLOR,  
                'default' => '',
                'condition' => array( 'sub_title_style_on' => array( 'yes' ) ),
                'selectors' => array(
                    '{{WRAPPER}} .testimonial-style-one-content .thumb-content .subtitle' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .testimonial-style-two-wrapper .thumb-content .subtitle' => 'color: {{VALUE}}',
                ),
            ]
        );

         $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'sub_title_font_size',
                'label' => __( 'Typography', 'axil-elements' ),                
                 'condition' => array( 'sub_title_style_on' => array( 'yes' ) ),
                'selector' => '{{WRAPPER}} .testimonial-style-one-content .thumb-content .subtitle, {{WRAPPER}}  .testimonial-style-two-wrapper .thumb-content .subtitle',
            ]
        );
       
        $this->add_responsive_control(
            'sub_title_margin',
            [
                'label' => __( 'Margin', 'axil-elements' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                 'condition' => array( 'sub_title_style_on' => array( 'yes' ) ),
                'selectors' => [
                    '{{WRAPPER}} .testimonial-style-one-content .thumb-content .subtitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                    
                    
                ],
            ]
        );
       
    $this->end_controls_section();


    }

	
    private function slick_load_scripts(){
        wp_enqueue_style(  'slick' );
        wp_enqueue_style(  'slick-theme' );
        wp_enqueue_script( 'slick' );
    }	

    private function magnific_load_scripts(){
        wp_enqueue_script(  'jquery-magnific-popup' );
        wp_enqueue_style(  'magnific-popup' );    
    }

		
	protected function render() {
			$settings = $this->get_settings();	
			$this->magnific_load_scripts();	
			$this->slick_load_scripts();
   			$template   = 'testimonial-carousel-' . str_replace("style", "", $settings['style']);  
			return axil_Elements_Helper::axiltheme_element_template( $template, $settings );
	}
  
}
