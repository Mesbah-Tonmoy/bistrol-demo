<?php
/**
 * @author  AxilTheme
 * @since   1.0
 * @version 1.0
 */

namespace axiltheme\abstrak_elements;

use Elementor\Controls_Manager;
use Elementor\Plugin;
use Elementor\Widget_Base;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
class Title extends Widget_Base {  
use \Elementor\AxilElementCommonFunctions;
 public function get_name() {
        return 'axil-title';
    }    
    public function get_title() {
        return esc_html__( 'Section Title', 'axil-elements' );
    }
    public function get_icon() {
        return 'eicon-post-title';
    }
    public function get_categories() {
        return [ ABSTRAK_ELEMENTS_THEME_PREFIX . '-widgets' ];
    }
  
  protected function register_controls() {

     $this->start_controls_section(
            'title_section',
            [
                'label' => esc_html__( 'Section Title Layout', 'axil-elements' ),
            ]
        );
      

       $this->add_control(
            'heading_color',
            [
                'label' => esc_html__( 'Heading Color', 'axil-elements' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'dark',
                'options' => [
                    'light'   => esc_html__( 'Light', 'axil-elements' ),
                    'dark'   => esc_html__( 'Dark', 'axil-elements' ),                  
                    
                ],
            ] 
        );
       

        $this->add_responsive_control(
            'section_title_margin',
            [
                'label' => __( 'Margin', 'axil-elements' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                
                'selectors' => [
                    '{{WRAPPER}} .section-heading' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    
                ],
            ]
        );

        $this->end_controls_section();     
        $this->axil_section_title('section_section', 'Section Title', 'h2', true, 'center');
        $this->axil_basic_style_controls('section_title_pre_title', 'Tag Line', '.section-heading span.subtitle');
        $this->axil_basic_style_controls('section_title_title', 'Title', '.section-heading .title');
        $this->axil_basic_style_controls('section_title_description', 'Description', '.section-heading p');
  }


    protected function render() {
        $settings = $this->get_settings();
        $template   = 'title-1';                 
        return axil_Elements_Helper::axiltheme_element_template( $template, $settings );
    }
}
