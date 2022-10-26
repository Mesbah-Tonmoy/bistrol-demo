<?php
/**
 * @author  AxilTheme
 * @since   1.0
 * @version 1.0
 */

namespace axiltheme\abstrak_elements;

use Elementor\Widget_Base;
use Elementor\Repeater;
use Elementor\Controls_Manager;
use Elementor\Utils;
use Elementor\Group_Control_Typography;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Axil_Banner_Slider extends Widget_Base {

 public function get_name() {
        return 'axil-banner-slider';
    }    
    public function get_title() {
        return esc_html__( 'Banner Slider', 'axil-elements' );
    }
    public function get_icon() {
        return ' eicon-banner';
    }
    public function get_categories() {
        return [ ABSTRAK_ELEMENTS_THEME_PREFIX . '-widgets' ];
    }

    protected function register_controls() {
        $this->start_controls_section(
            'axilbanner_content_sec',
                [
                    'label' => esc_html__( 'Layout / Banner Content', 'axil-elements' ),                      
                              
                ]
            );    
        $this->add_control(
            'axilstyle',
            [
                'label' => esc_html__( 'Layout', 'axil-elements' ),
                'type' => Controls_Manager::SELECT,
                'default' => '2',
                'options' => [
                    '1'   => esc_html__( 'Style 1', 'axil-elements' ),
                    '2'   => esc_html__( 'Style 2', 'axil-elements' ),                                          
                ],
            ] 
        );   

       $repeater = new Repeater();

        $repeater->add_control(
            'list_title', 
            [
                'label' => esc_html__( 'Title', 'axil-elements' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'List Title' , 'axil-elements' ),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'list_content', 
            [
                'label' => esc_html__( 'Content or Subtitle', 'axil-elements' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'List Content' , 'axil-elements' ),
                 'label_block' => true,
            ]
        );
        $repeater->add_control(
             'image',
                [
                    'label' => esc_html__('Replace Product Image','axil-elements'),
                    'type'=>Controls_Manager::MEDIA,
                    'default' => [
                        'url' => Utils::get_placeholder_image_src(),
                    ],
                    'dynamic' => [
                        'active' => true,
                    ],
                        
                ]
        );       

         $repeater->add_control(
            'list_btntext',
            [
                'label'   => esc_html__( 'Button Text', 'axil-elements' ),
                'type'    => Controls_Manager::TEXT,
                'default' => esc_html__( 'Shop Collection', 'axil-elements' ),
            ]
        );      

        $repeater->add_control(
            'list_url',
            [
                'label'   => esc_html__( 'Button Link', 'axil-elements' ),
                'type'    => Controls_Manager::URL,
                'placeholder' => 'https://your-link.com',
                
            ]
         );  


        $this->add_control(
            'list',
            [
                'label' => esc_html__( 'Slider List', 'axil-elements' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'list_title' => esc_html__( 'Shop Your 1st <br> New Year’s Fave', 'axil-elements' ),
                        'list_content' => esc_html__( '- Try Newest', 'axil-elements' ),
                    ],
                    [
                        'list_title' => esc_html__( 'Shop Your 1st <br> New Year’s Fave', 'axil-elements' ),
                        'list_content' => esc_html__( '- Try Newest', 'axil-elements' ),
                    ],
                ],
                'title_field' => '{{{ list_title }}}',
            ]
        );

        $this->end_controls_section();


     $this->start_controls_section(
            'subtitle_style_section',
            [
                'label' => esc_html__( 'Sub Title or Title Before', 'axil-elements' ),
                'tab' => Controls_Manager::TAB_STYLE,                
            ]
        );

         $this->add_control(
            'subtitle_style_on',
            [
                'label' => esc_html__( 'Customize', 'axil-elements' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on'    => esc_html__( 'On', 'axil-elements' ),
                'label_off'   => esc_html__( 'Off', 'axil-elements' ),
                'default'     => 'no',
               
            ]
        );   

 
          $this->add_control(
            'subtitle_color',
            [
                'label' => esc_html__( 'Color', 'axil-elements' ),
                'type' => Controls_Manager::COLOR,  
                'default' => '',
                'condition' => array( 'subtitle_style_on' => array( 'yes' ) ),
                'selectors' => array(
                    '{{WRAPPER}} .inner .titlehighlighter' => 'color: {{VALUE}}',
                ),
            ]
        );

         $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle_font_size',
                'label' => esc_html__( 'Typography', 'axil-elements' ),                
                 'condition' => array( 'subtitle_style_on' => array( 'yes' ) ),
                'selector' => '{{WRAPPER}} .inner .titlehighlighter',
            ]
        );
       
        $this->add_responsive_control(
            'subtitle_margin',
            [
                'label' => esc_html__( 'Margin', 'axil-elements' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                 'condition' => array( 'subtitle_style_on' => array( 'yes' ) ),
                'selectors' => [
                    '{{WRAPPER}} .inner .titlehighlighter' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                    
                ],
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
            'title_style_on',
            [
                'label' => esc_html__( 'Customize', 'axil-elements' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on'    => esc_html__( 'On', 'axil-elements' ),
                'label_off'   => esc_html__( 'Off', 'axil-elements' ),
                'default'     => 'no',
               
            ]
        );

         $this->add_control(
            'title_color',
            [
                'label' => esc_html__( 'Color', 'axil-elements' ),
                'type' => Controls_Manager::COLOR,  
                'default' => '',
                'condition' => array( 'title_style_on' => array( 'yes' ) ),
                'selectors' => array(
                    '{{WRAPPER}} .inner .title' => 'color: {{VALUE}}',
                ),
            ]
        );

         $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_font_size',
                'label' => esc_html__( 'Typography', 'axil-elements' ),                
                 'condition' => array( 'title_style_on' => array( 'yes' ) ),
                'selector' => '{{WRAPPER}} .inner .title',
            ]
        );
       
        $this->add_responsive_control(
            'title_margin',
            [
                'label' => esc_html__( 'Margin', 'axil-elements' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                 'condition' => array( 'title_style_on' => array( 'yes' ) ),
                'selectors' => [
                    '{{WRAPPER}} .inner .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                    
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

    protected function render() {      
        $settings = $this->get_settings();
       $this->slick_load_scripts();	      

        $template   = 'banner-slider-' . str_replace("style", "", $settings['axilstyle']);   
		return axil_Elements_Helper::axiltheme_element_template( $template, $settings );
    }

}