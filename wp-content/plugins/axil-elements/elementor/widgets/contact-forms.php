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

class axil_Contact_Forms extends Widget_Base {
use \Elementor\AxilElementCommonFunctions;
 public function get_name() {
        return 'axil-contact-forms';
    }    
    public function get_title() {
        return __( 'Contact Forms 7', 'axil-elements' );
    }
    public function get_icon() {
        return 'eicon-icon-box';
    }
    public function get_categories() {
        return [ ABSTRAK_ELEMENTS_THEME_PREFIX . '-widgets' ];
    }
 public function axil_get_img($img)
    {
        $img = ABSTRAK_ELEMENTS_BASE_URL . 'assets/media/' . $img;
        return $img;
   }

    public function get_axil_contact_form(){
        if ( ! class_exists( 'WPCF7' ) ) {
            return;
        }
        $axil_cfa         = array();
        $axil_cf_args     = array( 'posts_per_page' => -1, 'post_type'=> 'wpcf7_contact_form' );
        $axil_forms       = get_posts( $axil_cf_args );
        $axil_cfa         = ['0' => esc_html__( 'Select Form', 'axil-elements' ) ];
        if( $axil_forms ){
            foreach ( $axil_forms as $axil_form ){
                $axil_cfa[$axil_form->ID] = $axil_form->post_title;
            }
        }else{
            $axil_cfa[ esc_html__( 'No contact form found', 'axil-elements' ) ] = 0;
        }
        return $axil_cfa;
    }
 
    protected function register_controls() {
   $this->start_controls_section(
            'axil_content_title',
            [
                'label' => esc_html__( 'Section Title', 'axil-elements' ),
                 
            ]
        );
           $this->add_control(
            'sub_title_before',
            [
                'label' => esc_html__( 'Title before', 'axil-elements' ),
                'type' => Controls_Manager::TEXT,
                'placeholder' => esc_html__( 'Type your Description here.', 'axil-elements' ),    
                 'default' => 'Section sub title here',     
                 'label_block' => true,       
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => esc_html__( 'Title', 'axil-elements' ),
                'type' => Controls_Manager::TEXTAREA,
                'placeholder' => esc_html__( 'Type your title here...', 'axil-elements' ),
                'default' => 'Section title here',
            ]
        );  
       
      
        $this->add_control(
            'sub_title',
            [
                'label' => esc_html__( 'Description', 'axil-elements' ),
                'type' => Controls_Manager::TEXTAREA,
                'placeholder' => esc_html__( 'Type your Description here.', 'axil-elements' ),    
                'default' => 'In vel varius turpis, non dictum sem. Aenean in efficitur ipsum, in egestas ipsum. Mauris in mi ac tellus.',            
            ]
        );
        $this->end_controls_section(); 
        $this->start_controls_section(
            'axil_content_shortcode',
            [
                'label' => esc_html__( 'Contact Form', 'axil-elements' ),
            ]
        );
          

        $this->add_control(
            'axil_content_form_title',
            [
                'label' => esc_html__('Form Title', 'axil-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Get a free axil-elements quote now',
                'placeholder' => esc_html__('Type Heading Text', 'axil-elements'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'axil_contact_form_tag',
            [
                'label' => esc_html__('Form Title HTML Tag', 'axil-elements'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'h1' => [
                        'title' => esc_html__('H1', 'axil-elements'),
                        'icon' => 'eicon-editor-h1'
                    ],
                    'h2' => [
                        'title' => esc_html__('H2', 'axil-elements'),
                        'icon' => 'eicon-editor-h2'
                    ],
                    'h3' => [
                        'title' => esc_html__('H3', 'axil-elements'),
                        'icon' => 'eicon-editor-h3'
                    ],
                    'h4' => [
                        'title' => esc_html__('H4', 'axil-elements'),
                        'icon' => 'eicon-editor-h4'
                    ],
                    'h5' => [
                        'title' => esc_html__('H5', 'axil-elements'),
                        'icon' => 'eicon-editor-h5'
                    ],
                    'h6' => [
                        'title' => esc_html__('H6', 'axil-elements'),
                        'icon' => 'eicon-editor-h6'
                    ]
                ],
                'default' => 'h2',
                'toggle' => false,
            ]
        );
        $this->add_control(
            'select_contact_form',
            [
                'label'   => esc_html__( 'Select Form', 'axil-elements' ),
                'type'    => Controls_Manager::SELECT,
                'default' => '0',
                'options' => $this->get_axil_contact_form(),
            ]
        );
      $this->end_controls_section();

   
        $this->axil_basic_style_controls('contact_pre_title', 'Section - Tag Line', '.section-heading .subtitle');
        $this->axil_basic_style_controls('contact_title', 'Section - Title', '.section-heading .title');        
        $this->axil_basic_style_controls('contact_description', 'Section - Description', '.section-heading p'); 

        $this->start_controls_section(
            'title_style_section',
            [
                'label' => __( 'Form Title', 'axil-elements' ),
                'tab' => Controls_Manager::TAB_STYLE,                
            ]
        );

        $this->add_control(
            'axil_title_color',
            [
                'label' => __( 'Color', 'axil-elements' ),
                'type' => Controls_Manager::COLOR,  
                'default' => '',
               
                'selectors' => array(
                    '{{WRAPPER}} .contact-form-box .title' => 'color: {{VALUE}}',
                ),
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'axil_title_font_size',
                'label' => __( 'Typography', 'axil-elements' ),                
                
                'selector' => '{{WRAPPER}} .contact-form-box .title',
            ]
        );

        $this->add_responsive_control(
            'axil_title_padding',
            [
                'label' => esc_html__('Padding', 'axil-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .contact-form-box .title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );
        
        $this->add_responsive_control(
            'axil_title_margin',
            [
                'label' => __( 'Margin', 'axil-elements' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                
                'selectors' => [
                    '{{WRAPPER}} .contact-form-box .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    
                ],
            ]
        );
        
    $this->end_controls_section();


    $this->start_controls_section(     

      'poster_shape',
            [
                'label' => esc_html__( 'Background Shapes', 'axil-elements' ),   
                            
                          
            ]
        );        

        $this->add_control(
            'shape_style_on',
            [
                'label' => __( 'Shape Condition', 'axil-elements' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on'    => __( 'On', 'axil-elements' ),
                'label_off'   => __( 'Off', 'axil-elements' ),
                'default'     => 'yes',
               
            ]
        );   
  
        $this->add_control(
            'shape1',
            [
                'label' => esc_html__('Shape 1','axil-elements'),
                'type'=>Controls_Manager::MEDIA,                    
                'default' => [
                    'url' =>  $this->axil_get_img( 'shape6/bubble-7.png' ),
                ],
                'dynamic' => [
                    'active' => true,
                ],
                 'condition' => array( 'shape_style_on' => array( 'yes' ) ), 
                    
            ]
        );      
        $this->add_control(
            'shape2',
            [
                'label' => esc_html__('Shape 2','axil-elements'),
                'type'=>Controls_Manager::MEDIA,                    
                'default' => [
                   'url' =>  $this->axil_get_img( 'shape6/line-4.png' ),
                ],
                'dynamic' => [
                    'active' => true,
                ],
                 'condition' => array( 'shape_style_on' => array( 'yes' ) ), 
                    
            ]
        );      
        $this->add_control(
            'shape3',
            [
                'label' => esc_html__('Shape 31','axil-elements'),
                'type'=>Controls_Manager::MEDIA,                    
                'default' => [
                   'url' =>  $this->axil_get_img( 'shape6/line-5.png' ),
                ],
                'dynamic' => [
                    'active' => true,
                ],
                 'condition' => array( 'shape_style_on' => array( 'yes' ) ), 
                    
            ]
        ); 
        $this->end_controls_section(); 


}

protected function render() {
    $settings = $this->get_settings(); 

    $template = 'contact-forms';
    return axil_Elements_Helper::axiltheme_element_template( $template, $settings );

    }
}