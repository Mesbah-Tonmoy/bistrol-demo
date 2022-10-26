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

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
class Testimonial_Grid extends Widget_Base {
   
    public function get_name() {       
        return 'axil-testimonial-grid';
    }    
    public function get_title() {      
          return esc_html__( 'Testimonial', 'axil-elements' );
    }
    public function get_icon() {
        return 'eicon-testimonial-carousel';
    }
    public function get_categories() {
        return [ ABSTRAK_ELEMENTS_THEME_PREFIX . '-widgets' ];
    }

    public function axil_get_img($img)
    {
        $img = ABSTRAK_ELEMENTS_BASE_URL . 'assets/media/' . $img;
        return $img;
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
            'review_section',
            [
                'label' => esc_html__( 'Review', 'axil-elements' ),
            ]
        ); 
       $this->add_control(
            'review_type',
            [
                'label' => esc_html__( 'Background Color', 'axil-elements' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'style1',               
                'options' => [
                    'style1'   => esc_html__( 'Light', 'axil-elements' ),
                    'style2'   => esc_html__( 'Dark', 'axil-elements' ),                  
                    'style3'   => esc_html__( 'Gray', 'axil-elements' ),                  
                    
                ],
            ] 
        );

    $this->add_control(
        'home_style_active',
        [
            'label' => esc_html__( 'Home Page ? ', 'axil-elements' ),
            'type' => Controls_Manager::SWITCHER,
            'label_on'    => esc_html__( 'Yes', 'axil-elements' ),
            'label_off'   => esc_html__( 'NO', 'axil-elements' ),
            'default'     => 'yes',
           
        ]
    );   


    $this->end_controls_section();  

    $this->start_controls_section(
            'title_section',
            [
                'label' => esc_html__( 'Section Title', 'axil-elements' ),
            ]
        );

        $this->add_control(
            'seation_title_on',
            [
                'label' => esc_html__( 'Section Title', 'axil-elements' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on'    => esc_html__( 'On', 'axil-elements' ),
                'label_off'   => esc_html__( 'Off', 'axil-elements' ),
                'default'     => 'yes',
                'separator'     => 'after',
               
            ]
        );  
        $this->add_responsive_control(
            'sec_title_tag',
            [
                'label' => esc_html__( 'Title HTML Tag', 'axil-elements' ),
                'type' => Controls_Manager::CHOOSE,    
                'condition' => array( 'seation_title_on' => array( 'yes' ) ),
                 'options' => [
                      'h1'  => [
                        'title' => esc_html__( 'H1', 'axil-elements' ),
                        'icon' => 'eicon-editor-h1'
                    ],
                    'h2'  => [
                        'title' => esc_html__( 'H2', 'axil-elements' ),
                        'icon' => 'eicon-editor-h2'
                    ],
                    'h3'  => [
                        'title' => esc_html__( 'H3', 'axil-elements' ),
                        'icon' => 'eicon-editor-h3'
                    ],
                    'h4'  => [
                        'title' => esc_html__( 'H4', 'axil-elements' ),
                        'icon' => 'eicon-editor-h4'
                    ],
                    'h5'  => [
                        'title' => esc_html__( 'H5', 'axil-elements' ),
                        'icon' => 'eicon-editor-h5'
                    ],
                    'h6'  => [
                        'title' => esc_html__( 'H6', 'axil-elements' ),
                        'icon' => 'eicon-editor-h6'
                    ],
                    'div'  => [
                        'title' => esc_html__( 'div', 'axil-elements' ),
                        'icon' => 'eicon-font'
                    ]
                ],
                'default' => 'h2',               

            ]
        );

       $this->add_control(
            'sub_title_before',
            [
                'label' => __( 'Title before', 'axil-elements' ),
                'type' => Controls_Manager::TEXT,
                'placeholder' => __( 'Type your Description here.', 'axil-elements' ),    
                 'default' => 'Section sub title here',     
                 'condition' => array( 'seation_title_on' => array( 'yes' ) ),       
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __( 'Title', 'axil-elements' ),
                'type' => Controls_Manager::TEXTAREA,
                'placeholder' => __( 'Type your title here...', 'axil-elements' ),
                'default' => 'Section title here',
                    'condition' => array( 'seation_title_on' => array( 'yes' ) ),
            ]
        );         
      
        $this->add_control(
            'sub_title',
            [
                'label' => __( 'Description', 'axil-elements' ),
                'type' => Controls_Manager::TEXTAREA,
                    'condition' => array( 'seation_title_on' => array( 'yes' ) ),
                'placeholder' => __( 'Type your Description here.', 'axil-elements' ),    
                'default' => 'In vel varius turpis, non dictum sem. Aenean in efficitur ipsum, in egestas ipsum. Mauris in mi ac tellus.',            
            ]
        );       
        $this->end_controls_section();   
        

        $this->start_controls_section(
            '_testimonial_source_logo',
            [
                'label' => esc_html__( 'Review Source Logo', 'axil-elements' ),
            ]
        );
        $this->add_control(
            'testimonial_source_logo',
            [
                'label' => esc_html__( 'Review Source Logo', 'axil-elements' ),
                'type' => Controls_Manager::MEDIA,
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );        
        $this->end_controls_section();

        $this->start_controls_section(
            'review_list',
            [
                'label' => esc_html__( 'Review List', 'axil-elements' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new Repeater();

            $repeater->add_control(
                'social_mediar_image_type',
                [
                    'label' => __( 'Type', 'axil-elements' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => 'txt',                  
                    'options' => [
                        'txt'  => esc_html__( 'Text', 'axil-elements' ),
                        'image' => esc_html__( 'Custom Image', 'axil-elements' ),
                    ],
                ] 
            ); 
           
            $repeater->add_control(
                'social_mediar_image',
                [
                    'label' => esc_html__( 'Media Image', 'axil-elements' ),
                    'type' => Controls_Manager::MEDIA,
                    'default' => [
                        'url' => Utils::get_placeholder_image_src(),
                    ],
                    'dynamic' => [
                        'active' => true,
                    ],
                    'condition' => [
                            'social_mediar_image_type' =>'image',
                        ],    
                ]
            );
            
            $repeater->add_control(
                'social_media', [
                    'label' => esc_html__( 'Social Media', 'axil-elements' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => esc_html__( 'Google' , 'axil-elements' ),
                    'label_block' => true,
                     'condition' => [
                            'social_mediar_image_type' =>'txt',
                        ], 
                ]
            );

            $repeater->add_control(
                'reviewer_image',
                [
                    'label' => esc_html__( 'Reviewer Image', 'axil-elements' ),
                    'type' => Controls_Manager::MEDIA,
                    'default' => [
                        'url' => Utils::get_placeholder_image_src(),
                    ],
                    'dynamic' => [
                        'active' => true,
                    ]
                ]
            );
            $repeater->add_group_control(
                Group_Control_Image_Size::get_type(),
                [
                    'name' => 'thumbnail',
                    'default' => 'full',
                    'exclude' => ['custom'],
                    'separator' => 'none',
                ]
            );

            $repeater->add_control(
                'reviewer_name', [
                    'label' => esc_html__( 'Reviewer Name', 'axil-elements' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => esc_html__( 'Martha Maldonado' , 'axil-elements' ),
                    'label_block' => true,
                ]
            );
            $repeater->add_control(
                'reviewer_title', [
                    'label' => esc_html__( 'Reviewer Title', 'axil-elements' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => esc_html__( 'Martha Maldonado' , 'axil-elements' ),
                    'label_block' => true,
                ]
            );
            $repeater->add_control(
                'review_content',
                [
                    'label' => esc_html__( 'Review Content', 'axil-elements' ),
                    'type' => Controls_Manager::TEXTAREA,
                    'rows' => 10,
                    'default' => 'Donec metus lorem, vulputate at sapien sit amet, auctor iaculis lorem. In vel hendrerit nisi. Vestibulum eget risus velit.',
                    'placeholder' => esc_html__( 'Type your review content here', 'axil-elements' ),
                ]
            );

        $this->add_control(
            'reviews_list',
            [
                'label' => esc_html__( 'Review List', 'axil-elements' ),
                'type' => Controls_Manager::REPEATER,
                'fields' =>  $repeater->get_controls(),
                'default' => [
                    [
                        'reviewer_name' => esc_html__( 'Martha Maldonado', 'axil-elements' ),
                        'reviewer_title' => esc_html__( 'Executive Chairman @ Google', 'axil-elements' ),
                        'review_content' => esc_html__( 'Donec metus lorem, vulputate at sapien sit amet, auctor iaculis lorem. In vel hendrerit nisi. Vestibulum eget risus velit.', 'axil-elements' ),
                    ],
                    [
                        'reviewer_name' => esc_html__( 'Martha Maldonado', 'axil-elements' ),
                        'reviewer_title' => esc_html__( 'Executive Chairman @ Google', 'axil-elements' ),
                        'review_content' => esc_html__( 'Donec metus lorem, vulputate at sapien sit amet, auctor iaculis lorem. In vel hendrerit nisi. Vestibulum eget risus velit.', 'axil-elements' ),
                    ],
                    [
                        'reviewer_name' => esc_html__( 'Martha Maldonado', 'axil-elements' ),
                        'reviewer_title' => esc_html__( 'Executive Chairman @ Google', 'axil-elements' ),
                        'review_content' => esc_html__( 'Donec metus lorem, vulputate at sapien sit amet, auctor iaculis lorem. In vel hendrerit nisi. Vestibulum eget risus velit.', 'axil-elements' ),
                    ],

                ],
                'title_field' => '{{{ reviewer_name }}}',
            ]
        );

     $this->end_controls_section();


    $this->start_controls_section(
        'title_before_style_section',
        [
            'label' => esc_html__( 'Section Title Before', 'axil-elements' ),
            'tab' => Controls_Manager::TAB_STYLE,                
        ]
    ); 
      $this->add_control(
        'title_before_color',
        [
            'label' => esc_html__( 'Color', 'axil-elements' ),
            'type' => Controls_Manager::COLOR,  
            'default' => '',
            
            'selectors' => array(
                '{{WRAPPER}} .section-heading .subtitle' => 'color: {{VALUE}}',
            ),
        ]
    );
     $this->add_group_control(
        Group_Control_Typography::get_type(),
        [
            'name' => 'title_before_font_size',
            'label' => esc_html__( 'Typography', 'axil-elements' ),                
             
            'selector' => '{{WRAPPER}} .section-heading .subtitle',
        ]
    );
   
    $this->add_responsive_control(
        'title_before_margin',
        [
            'label' => esc_html__( 'Margin', 'axil-elements' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em' ],                 
            'selectors' => [
                '{{WRAPPER}} .section-heading .subtitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                
            ],
        ]
    );       
    $this->end_controls_section();



    $this->start_controls_section(
        'title_style_section',
        [
            'label' => esc_html__( 'Section Title', 'axil-elements' ),
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
                '{{WRAPPER}} .section-heading .title' => 'color: {{VALUE}}',
            ),
        ]
    );
     $this->add_group_control(
        Group_Control_Typography::get_type(),
        [
            'name' => 'title_font_size',
            'label' => esc_html__( 'Typography', 'axil-elements' ),                
             
            'selector' => '{{WRAPPER}} .section-heading .title',
        ]
    );
   
    $this->add_responsive_control(
        'title_margin',
        [
            'label' => esc_html__( 'Margin', 'axil-elements' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em' ],                 
            'selectors' => [
                '{{WRAPPER}} .section-heading .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                
            ],
        ]
    );       
    $this->end_controls_section();


    $this->start_controls_section(
        'content_style_section',
        [
            'label' => esc_html__( 'Section Sub Title', 'axil-elements' ),
            'tab' => Controls_Manager::TAB_STYLE,                
        ]
    ); 
      $this->add_control(
        'content_color',
        [
            'label' => esc_html__( 'Color', 'axil-elements' ),
            'type' => Controls_Manager::COLOR,  
            'default' => '',
            
            'selectors' => array(
                '{{WRAPPER}} .section-heading p' => 'color: {{VALUE}}',
            ),
        ]
    );
     $this->add_group_control(
        Group_Control_Typography::get_type(),
        [
            'name' => 'content_font_size',
            'label' => esc_html__( 'Typography', 'axil-elements' ),                
             
            'selector' => '{{WRAPPER}} .section-heading p',
        ]
    );
   
    $this->add_responsive_control(
        'content_margin',
        [
            'label' => esc_html__( 'Margin', 'axil-elements' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em' ],                 
            'selectors' => [
                '{{WRAPPER}} .section-heading p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                
            ],
        ]
    );       
    $this->end_controls_section();



    $this->start_controls_section(
        'reviews_title_style_section',
        [
            'label' => esc_html__( 'Reviews Social Title', 'axil-elements' ),
            'tab' => Controls_Manager::TAB_STYLE,                
        ]
    ); 

    $this->add_control(
        'reviews_color',
        [
            'label' => esc_html__( 'Color', 'axil-elements' ),
            'type' => Controls_Manager::COLOR,  
            'default' => '',
            
            'selectors' => array(
                '{{WRAPPER}} .testimonial-grid .social-media' => 'color: {{VALUE}}',
            ),
        ]
    );
     $this->add_group_control(
        Group_Control_Typography::get_type(),
        [
            'name' => 'reviews_font_size',
            'label' => esc_html__( 'Typography', 'axil-elements' ),                
             
            'selector' => '{{WRAPPER}} .testimonial-grid .social-media',
        ]
    );
   
    $this->add_responsive_control(
        'reviews_margin',
        [
            'label' => esc_html__( 'Margin', 'axil-elements' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em' ],                 
            'selectors' => [
                '{{WRAPPER}} .testimonial-grid .social-media' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                
            ],
        ]
    );       
    $this->end_controls_section(); 

    $this->start_controls_section(
        'reviews_content_style_section',
        [
            'label' => esc_html__( 'Reviews Text', 'axil-elements' ),
            'tab' => Controls_Manager::TAB_STYLE,                
        ]
    ); 

    $this->add_control(
        'reviews_content_color',
        [
            'label' => esc_html__( 'Color', 'axil-elements' ),
            'type' => Controls_Manager::COLOR,  
            'default' => '',
            
            'selectors' => array(
                '{{WRAPPER}} .testimonial-grid p' => 'color: {{VALUE}}',
            ),
        ]
    );
     $this->add_group_control(
        Group_Control_Typography::get_type(),
        [
            'name' => 'reviews_content_font_size',
            'label' => esc_html__( 'Typography', 'axil-elements' ),                
             
            'selector' => '{{WRAPPER}} .testimonial-grid p',
        ]
    );
   
    $this->add_responsive_control(
        'reviews_content_margin',
        [
            'label' => esc_html__( 'Margin', 'axil-elements' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em' ],                 
            'selectors' => [
                '{{WRAPPER}} .testimonial-grid p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                
            ],
        ]
    );       
    $this->end_controls_section();


    $this->start_controls_section(
        'reviews_name_style_section',
        [
            'label' => esc_html__( 'Reviews Name', 'axil-elements' ),
            'tab' => Controls_Manager::TAB_STYLE,                
        ]
    ); 

    $this->add_control(
        'reviews_name_color',
        [
            'label' => esc_html__( 'Color', 'axil-elements' ),
            'type' => Controls_Manager::COLOR,  
            'default' => '',
            
            'selectors' => array(
                '{{WRAPPER}} .testimonial-grid .author-info .content .name' => 'color: {{VALUE}}',
            ),
        ]
    );
     $this->add_group_control(
        Group_Control_Typography::get_type(),
        [
            'name' => 'reviews_name_font_size',
            'label' => esc_html__( 'Typography', 'axil-elements' ),                
             
            'selector' => '{{WRAPPER}} .testimonial-grid .author-info .content .name',
        ]
    );
   
    $this->add_responsive_control(
        'reviews_name_margin',
        [
            'label' => esc_html__( 'Margin', 'axil-elements' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em' ],                 
            'selectors' => [
                '{{WRAPPER}} .testimonial-grid .author-info .content .name' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                
            ],
        ]
    );       
    $this->end_controls_section();


    $this->start_controls_section(
        'reviews_designation_style_section',
        [
            'label' => esc_html__( 'Reviews Designation', 'axil-elements' ),
            'tab' => Controls_Manager::TAB_STYLE,                
        ]
    ); 

    $this->add_control(
        'reviews_designation_color',
        [
            'label' => esc_html__( 'Color', 'axil-elements' ),
            'type' => Controls_Manager::COLOR,  
            'default' => '',
            
            'selectors' => array(
                '{{WRAPPER}} .author-info .content .designation' => 'color: {{VALUE}}',
            ),
        ]
    );
     $this->add_group_control(
        Group_Control_Typography::get_type(),
        [
            'name' => 'reviews_designation_font_size',
            'label' => esc_html__( 'Typography', 'axil-elements' ),                
             
            'selector' => '{{WRAPPER}} .author-info .content .designation',
        ]
    );
   
    $this->add_responsive_control(
        'reviews_designation_margin',
        [
            'label' => esc_html__( 'Margin', 'axil-elements' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em' ],                 
            'selectors' => [
                '{{WRAPPER}} .author-info .content .designation' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                
            ],
        ]
    );       
    $this->end_controls_section();


   $this->start_controls_section(       
    'poster_shape',
        [
            'label' => esc_html__( 'Background Shapes', 'axil-elements' ),        
            'condition' => array( 'review_type' => array( 'style1' ) ), 
                      
        ]
    );      

    $this->add_control(
        'shape_style_on',
        [
            'label' => esc_html__( 'Customize', 'axil-elements' ),
            'type' => Controls_Manager::SWITCHER,
            'label_on'    => esc_html__( 'On', 'axil-elements' ),
            'label_off'   => esc_html__( 'Off', 'axil-elements' ),
            'default'     => 'yes',
           
        ]
    );   


    $this->add_control(
        'shape',
        [
            'label' => esc_html__('Shape','axil-elements'),
            'type'=>Controls_Manager::MEDIA,  
              'condition' => array( 'shape_style_on' => array( 'yes' ) ),                  
            'default' => [
                'url' =>  $this->axil_get_img( 'shape4/bubble-1.png' ),
            ],
            'dynamic' => [
                'active' => true,
            ],
                
        ]
    );                  
    $this->end_controls_section(); 

   $this->start_controls_section(       
    'poster_shape2',
        [
            'label' => esc_html__( 'Background Shapes', 'axil-elements' ),        
         'condition' => array( 'review_type' => array( 'style2' ) ),  
        ]
    );      

    $this->add_control(
        'shape_style_on2',
        [
            'label' => esc_html__( 'Customize', 'axil-elements' ),
            'type' => Controls_Manager::SWITCHER,
            'label_on'    => esc_html__( 'On', 'axil-elements' ),
            'label_off'   => esc_html__( 'Off', 'axil-elements' ),
            'default'     => 'yes',
           
        ]
    );   


    $this->add_control(
        'shape1',
        [
            'label' => esc_html__('Shape 1','axil-elements'),
            'type'=>Controls_Manager::MEDIA,  
              'condition' => array( 'shape_style_on2' => array( 'yes' ) ),                  
            'default' => [
                'url' =>  $this->axil_get_img( 'shape11/line-6.png' ),
            ],
            'dynamic' => [
                'active' => true,
            ],
                
        ]
    );          

    $this->add_control(
        'shape2',
        [
            'label' => esc_html__('Shape 2','axil-elements'),
            'type'=>Controls_Manager::MEDIA,  
            'condition' => array( 'shape_style_on2' => array( 'yes' ) ),                  
            'default' => [
                'url' =>  $this->axil_get_img( 'shape11/circle-3.png' ),
            ],
            'dynamic' => [
                'active' => true,
            ],
                
        ]
    );                      
    $this->end_controls_section();   
    }

    private function isotope_load_scripts(){
        wp_enqueue_script('isotope-pkgd');
        wp_enqueue_script('imagesloaded');
    }



    protected function render() {
    			$settings = $this->get_settings();	
                $this->isotope_load_scripts();		
       			$template   = 'testimonial-grid-' . str_replace("style", "", $settings['review_type']);  
    			return axil_Elements_Helper::axiltheme_element_template( $template, $settings );
    	}
    }
