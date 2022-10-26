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

class axil_Contact_Forms2 extends Widget_Base {
use \Elementor\AxilElementCommonFunctions;
 public function get_name() {
        return 'axil-contact-forms2';
    }    
    public function get_title() {
        return __( 'Contact Forms 7 -2 ', 'axil-elements' );
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

 


}

protected function render() {
    $settings = $this->get_settings(); ?>
         
    <div class="contact-form-box shadow-box mb--30">
        <?php if ($settings['axil_contact_form_tag']) : ?>
        <<?php echo tag_escape( $settings['axil_contact_form_tag'] ); ?> 
        class="title">
        <?php echo wp_kses_post( $settings['axil_content_form_title']); ?>
        </<?php echo tag_escape( $settings['axil_contact_form_tag'] ) ?>>
        <?php endif; ?>
            <?php if( !empty($settings['select_contact_form']) ){ 
                echo do_shortcode( '[contact-form-7  id="'.$settings['select_contact_form'].'"]' );                               
            } else {
                echo '<div class="alert alert-info"><p>' . __('Please Select contact form.', 'axil-elements' ). '</p></div>';
            }
        ?> 
    </div>
    <?php  
    }
}