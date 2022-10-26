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

class axil_Corporate_Agency_Banner extends Widget_Base {
use \Elementor\AxilElementCommonFunctions;
 public function get_name() {
        return 'axil-corporate-agency-banner';
    }    
    public function get_title() {
        return __( 'Corporate Agency Banner', 'axil-elements' );
    }
    public function get_icon() {
        return 'eicon-icon-box';
    }
    public function get_categories() {
        return [ ABSTRAK_ELEMENTS_THEME_PREFIX . '-widgets' ];
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
     private function axil_get_all_pages()
        {

            $page_list = get_posts(array(
                'post_type' => 'page',
                'orderby' => 'date',
                'order' => 'DESC',
                'posts_per_page' => -1,
            ));

            $pages = array();

            if (!empty($page_list) && !is_wp_error($page_list)) {
                foreach ($page_list as $page) {
                    $pages[$page->ID] = $page->post_title;
                }
            }

            return $pages;
        }
    protected function register_controls() {
              
        $this->start_controls_section(
            'axil_corporate_agency_banner_section_title',
            [
                'label' => esc_html__('Banner Content', 'axil-elements'),
            ]
        );      

        $this->add_control(
            'axil_corporate_agency_banner_title',
            [
                'label' => esc_html__('Title', 'axil-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Technology <br /> & design studio',
                'placeholder' => esc_html__('Type Heading Text', 'axil-elements'),
                'label_block' => true,
            ]
        ); 
        
        $this->add_control(
            'axil_corporate_agency_banner_content',
            [
                'label' => esc_html__('Content', 'axil-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => '',
                'placeholder' => esc_html__('Type Content Text', 'axil-elements'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'axil_corporate_agency_banner_title_tag',
            [
                'label' => esc_html__('Title HTML Tag', 'axil-elements'),
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
            'axil_corporate_agency_banner_link_text',
            [
                'label' => esc_html__( 'View Showcase Button Text', 'axil-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => 'View Showcase',
                'title' => esc_html__('Enter button text', 'axil-elements'),
                'label_block' => true
            ]
        );
        $this->add_control(
            'axil_corporate_agency_banner_link_type',
            [
                'label' => esc_html__( 'View Showcase Button Link Type', 'axil-elements'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    '1' => 'Custom Link',
                    '2' => 'Internal Page',
                ],
                'default' => '1',
                'label_block' => true
            ]
        );
        $this->add_control(
            'axil_corporate_agency_banner_link',
            [
                'label' => esc_html__( 'View Showcase Button link', 'axil-elements'),
                'type' => Controls_Manager::URL,
                'dynamic' => [
                    'active' => true,
                ],
                'placeholder' => esc_html__('https://your-link.com', 'axil-elements'),
                'show_external' => true,
                'default' => [
                    'url' => '#',
                    'is_external' => false,
                    'nofollow' => false,
                ],
                'condition' => [
                    'axil_corporate_agency_banner_link_type' => '1'
                ],
                'label_block' => true
            ]
        );
        $this->add_control(
            'axil_corporate_agency_banner_page_link',
            [
                'label' => esc_html__('Select View Showcase Button Page', 'axil-elements'),
                'type' => Controls_Manager::SELECT2,
                'label_block' => true,
                'options' => $this-> axil_get_all_pages(),
                'condition' => [
                    'axil_corporate_agency_banner_link_type' => '2'
                ]
            ]
        );

        
        $this->add_control(
            'axil_corporate_agency_banner_link_text2',
            [
                'label' => esc_html__( 'View Showcase Button Text 2', 'axil-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => '',
                'title' => esc_html__('Enter button text', 'axil-elements'),
                'label_block' => true
            ]
        );
        $this->add_control(
            'axil_corporate_agency_banner_link_type2',
            [
                'label' => esc_html__( 'View Showcase Button Link Type 2', 'axil-elements'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    '1' => 'Custom Link',
                    '2' => 'Internal Page',
                ],
                'default' => '1',
                'label_block' => true
            ]
        );
        $this->add_control(
            'axil_corporate_agency_banner_link2',
            [
                'label' => esc_html__( 'View Showcase Button link 2', 'axil-elements'),
                'type' => Controls_Manager::URL,
                'dynamic' => [
                    'active' => true,
                ],
                'placeholder' => esc_html__('https://your-link.com', 'axil-elements'),
                'show_external' => true,
                'default' => [
                    'url' => '#',
                    'is_external' => false,
                    'nofollow' => false,
                ],
                'condition' => [
                    'axil_corporate_agency_banner_link_type2' => '1'
                ],
                'label_block' => true
            ]
        );
        $this->add_control(
            'axil_corporate_agency_banner_page_link2',
            [
                'label' => esc_html__('Select View Showcase Button Page 2', 'axil-elements'),
                'type' => Controls_Manager::SELECT2,
                'label_block' => true,
                'options' => $this-> axil_get_all_pages(),
                'condition' => [
                    'axil_corporate_agency_banner_link_type2' => '2'
                ]
            ]
        );




        $this->end_controls_section();


        $this->start_controls_section(
            'axil_corporate_agency_banner_section_img',
            [
                'label' => esc_html__('Banner background Image', 'axil-elements'),
            ]
        );       

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
                [
                    'name' => 'background',
                    'label' => __( 'Background', 'axil-elements' ),
                    'types' => [ 'classic', 'gradient' ],
                    'selector' => '{{WRAPPER}} .banner.banner-style-5', 
                                  
                ]
            );
 

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
                [
                    'name' => 'background_overlay',
                    'label' => __( 'Image Overlay', 'axil-elements' ),
                    'types' => [ 'classic', 'gradient' ],
                    'selector' => '{{WRAPPER}} .banner.banner-style-5::after', 
                                  
                ]
            );

        $this->end_controls_section();

        $this->start_controls_section(
            'axil-elements_corporate_agency_banner_shortcode',
            [
                'label' => esc_html__( 'Contact Form', 'axil-elements' ),
            ]
        );


        $this->add_control(
            'axil_corporate_contact_form_title',
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

       /* $this->add_responsive_control(
            'axil-elements_corporate_agency_banner_box_position_vertical',
            [
                'label'       => __( 'Box Vertical Position', 'axil-elements' ),
                'type'        => Controls_Manager::SLIDER,
                'size_units' => [ '%' ],
                'default' => [
                    'unit' => '%'
                ],
                'range'       => [
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors'   => [
                    '{{WRAPPER}} .banner.banner-style-5 .banner-form' => 'bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'axil-elements_corporate_agency_banner_box_position_horizontal',
            [
                'label'       => __( 'Box Horizontal Position', 'axil-elements' ),
                'type'        => Controls_Manager::SLIDER,
                'size_units' => [ '%' ],
                'default' => [
                    'unit' => '%'
                ],
                'range'       => [
                    '%' => [
                        'min' => -100,
                        'max' => 100,
                    ],
                ],
                'selectors'   => [
                    '{{WRAPPER}} .banner.banner-style-5 .banner-form' => 'right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
*/
        $this->end_controls_section(); 

	
     $this->start_controls_section(
            'title_style_section',
            [
                'label' => __( 'Banner Title', 'axil-elements' ),
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
                    '{{WRAPPER}} .banner-content .title' => 'color: {{VALUE}}',
                ),
            ]
        );

         $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'axil_title_font_size',
                'label' => __( 'Typography', 'axil-elements' ),                
                
                'selector' => '{{WRAPPER}} .banner-content .title',
            ]
        );

        $this->add_responsive_control(
            'axil_title_padding',
            [
                'label' => esc_html__('Padding', 'axil-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                
                'selectors' => [
                    '{{WRAPPER}} .banner-content .title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .banner-content .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    
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
            'subtitle_color',
            [
                'label' => __( 'Color', 'axil-elements' ),
                'type' => Controls_Manager::COLOR,  
                'default' => '',
                
                'selectors' => array(
                    '{{WRAPPER}} .banner-sub-content' => 'color: {{VALUE}}',
                ),
            ]
        );

         $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle_font_size',
                'label' => __( 'Typography', 'axil-elements' ),                
                 
                'selector' => '{{WRAPPER}} .banner-sub-content',
            ]
        );
        $this->add_responsive_control(
            'axil_subtitle_padding',
            [
                'label' => esc_html__('Padding', 'axil-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                
                'selectors' => [
                    '{{WRAPPER}} .banner-sub-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );
        
        $this->add_responsive_control(
            'subtitle_margin',
            [
                'label' => __( 'Margin', 'axil-elements' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                 
                'selectors' => [
                    '{{WRAPPER}} .banner-sub-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    
                ],
            ]
        );
        
        $this->end_controls_section();


    $this->axil_link_controls_style('corporate_banner_button_style', 'Discover More Button', '.banner-content .axil-btn', 'btn-large'); 

        $this->start_controls_section(
            'form_title_style_section',
            [
                'label' => __( 'Form Title', 'axil-elements' ),
                'tab' => Controls_Manager::TAB_STYLE,                
            ]
        );
        $this->add_control(
            'axil_form_title_color',
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
                'name' => 'axil_form_title_font_size',
                'label' => __( 'Typography', 'axil-elements' ),                
                 
                'selector' => '{{WRAPPER}} .contact-form-box .title',
            ]
        );
        $this->add_responsive_control(
            'axil_form_title_padding',
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
            'axil_form_title_margin',
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
	$settings = $this->get_settings();	 

        $attr = '';
        $btn = '';  
        if ( '1' == $settings['axil_corporate_agency_banner_link_type'] ) {

            if ( !empty( $settings['axil_corporate_agency_banner_link']['url'] ) ) {
                $attr  = 'href="' . $settings['axil_corporate_agency_banner_link']['url'] . '"';
                $attr .= !empty( $settings['axil_corporate_agency_banner_link']['is_external'] ) ? ' target="_blank"' : '';
                $attr .= !empty( $settings['axil_corporate_agency_banner_link']['nofollow'] ) ? ' rel="nofollow"' : '';
              
            }
            if ( !empty( $settings['axil_corporate_agency_banner_link_text'] ) ) {
                $btn = '<div data-sal="slide-up" data-sal-duration="1000" data-sal-delay="100"><a class="axil-btn btn-fill-white btn-large" ' . $attr . '>' . $settings['axil_corporate_agency_banner_link_text'] . '</a></div>';
            }

        } else {

            $attr  = 'href="' . get_permalink( $settings['axil_corporate_agency_banner_page_link'] ) . '"';
            $attr .= ' target="_blank"';
            $attr .= ' rel="nofollow"';                        
            $btn = '<div data-sal="slide-up" data-sal-duration="1000" data-sal-delay="100"><a class="axil-btn btn-fill-white btn-large" ' . $attr . '>' . $settings['axil_corporate_agency_banner_link_text'] . '</a></div>';

        }



        $attr2 = '';
        $btn2 = '';  
        if ( '1' == $settings['axil_corporate_agency_banner_link_type2'] ) {

            if ( !empty( $settings['axil_corporate_agency_banner_link2']['url'] ) ) {
                $attr2  = 'href="' . $settings['axil_corporate_agency_banner_link2']['url'] . '"';
                $attr2 .= !empty( $settings['axil_corporate_agency_banner_link2']['is_external'] ) ? ' target="_blank"' : '';
                $attr2 .= !empty( $settings['axil_corporate_agency_banner_link2']['nofollow'] ) ? ' rel="nofollow"' : '';
              
            }
            if ( !empty( $settings['axil_corporate_agency_banner_link_text2'] ) ) {
                $btn2 = '<div data-sal="slide-up" data-sal-duration="1000" data-sal-delay="100"><a class="axil-btn btn-fill-white btn-large" ' . $attr2 . '>' . $settings['axil_corporate_agency_banner_link_text2'] . '</a></div>';
            }

        } else {

            $attr2  = 'href="' . get_permalink( $settings['axil_corporate_agency_banner_page_link2'] ) . '"';
            $attr2 .= ' target="_blank"';
            $attr2 .= ' rel="nofollow"';                        
            $btn2 = '<div data-sal="slide-up" data-sal-duration="1000" data-sal-delay="100"><a class="axil-btn btn-fill-white btn-large" ' . $attr2 . '>' . $settings['axil_corporate_agency_banner_link_text2'] . '</a></div>';

        }



    ?>
    <div class="banner banner-style-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="banner-content">                 
                            <?php if ($settings['axil_corporate_agency_banner_title_tag']) : ?>
                                <<?php echo tag_escape( $settings['axil_corporate_agency_banner_title_tag'] ); ?> 
                                class="title" data-sal="slide-up" data-sal-duration="1000" data-sal-delay="200">
                                <?php echo wp_kses_post( $settings['axil_corporate_agency_banner_title']); ?>
                                </<?php echo tag_escape( $settings['axil_corporate_agency_banner_title_tag'] ) ?>>
                            <?php endif; ?>
                                <?php if ($settings['axil_corporate_agency_banner_title_tag']) : ?>
                                    <p class="banner-sub-content"><?php echo wp_kses_post( $settings['axil_corporate_agency_banner_content']); ?></p>
                                <?php endif; ?>
                                
                               <div class="btn-set-update d-flex gap-3">
                                <?php echo wp_kses_post( $btn );?>    
                                <?php echo wp_kses_post( $btn2 );?>  
                            </div>  
                            
                        </div>
                    </div>
                    <div class="col-lg-5" data-sal="slide-up" data-sal-duration="1000" data-sal-delay="100">

                            <?php if(!empty($settings['select_contact_form'])){ ?>
                           
                                <div class="banner-form">
                                    <div class="contact-form-box shadow-box">
                                        <?php if ($settings['axil_contact_form_tag']) : ?>
                                        <<?php echo tag_escape( $settings['axil_contact_form_tag'] ); ?> 
                                        class="title">
                                        <?php echo wp_kses_post( $settings['axil_corporate_contact_form_title']); ?>
                                        </<?php echo tag_escape( $settings['axil_contact_form_tag'] ) ?>>
                                        <?php endif; ?>

                                        <?php if( !empty($settings['select_contact_form']) ){ 
                                            echo do_shortcode( '[contact-form-7  id="'.$settings['select_contact_form'].'"]' );                               
                                        } else {
                                            echo '<div class="alert alert-info"><p>' . __('Please Select contact form.', 'axil-elements' ). '</p></div>';
                                        }
                                         ?>                                        
                                    </div>
                                </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    <?php 
	}
}