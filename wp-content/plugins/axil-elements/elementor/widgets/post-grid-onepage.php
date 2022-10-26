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


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
class Abstrak_post_grid_onepage extends Widget_Base {
 use \Elementor\AxilElementCommonFunctions;
public function get_name() {
        return 'abstrak-post-grid-onepage';
    }    
    public function get_title() {
        return esc_html__( 'Blog Post - One page', 'axil-elements' );
    }
    public function get_icon() {
        return 'eicon-posts-grid';
    }
    public function get_categories() {
        return [ ABSTRAK_ELEMENTS_THEME_PREFIX . '-widgets' ];
    }
      public function axil_get_img($img)
    {
        $img = ABSTRAK_ELEMENTS_BASE_URL . 'assets/media/' . $img;
        return $img;
   }

    public function get_post_name ( $post_type = 'post' ){
        $options = array();
        $options = ['0' => esc_html__( 'None', 'axil-elements' )];
        $abc_post = array( 'posts_per_page' => -1, 'post_type'=> $post_type );
        $abc_post_terms = get_posts( $abc_post );
        if ( ! empty( $abc_post_terms ) && ! is_wp_error( $abc_post_terms ) ){
            foreach ( $abc_post_terms as $term ) {
                $options[ $term->ID ] = $term->post_title;
            }
            return $options;
        }
    }

   protected function register_controls() {

        $terms  = get_terms( array( 'taxonomy' => 'category', 'fields' => 'id=>name' ) );
        $category_dropdown = array( '0' => esc_html__( 'All Categories', 'axil-elements' ) );

        foreach ( $terms as $id => $name ) {
            $category_dropdown[$id] = $name;
        }    


        
        $this->axil_section_title('post_grid', 'Section Title', 'h2', true, 'center');

        $this->start_controls_section(
            'axil_sub_title_style_section',
            [
                'label' => esc_html__( 'Before Title', 'axil-elements' ),
                'tab' => Controls_Manager::TAB_STYLE,                
            ]
        );

        
      $this->add_control(
        'sub_title_color',
        [
            'label' => esc_html__( 'Color', 'axil-elements' ),
            'type' => Controls_Manager::COLOR,  
            'default' => '',
          
            'selectors' => array(
                '{{WRAPPER}} .subtitle' => 'color: {{VALUE}}',
            ),
        ]
    );

         $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'sub_title_font_size',
                'label' => esc_html__( 'Typography', 'axil-elements' ),                
                
                'selector' => '{{WRAPPER}} .subtitle',
            ]
        );
       
        $this->add_responsive_control(
            'sub_title_margin',
            [
                'label' => esc_html__( 'Margin', 'axil-elements' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                
                'selectors' => [
                    '{{WRAPPER}} .subtitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    
                ],
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
        'axil_con_title_style_section',
        [
            'label' => esc_html__( 'Sub Content', 'axil-elements' ),
            'tab' => Controls_Manager::TAB_STYLE,                
        ]
    );

        
      $this->add_control(
        'con_title_color',
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
                'name' => 'con_title_font_size',
                'label' => esc_html__( 'Typography', 'axil-elements' ),                
                
                'selector' => '{{WRAPPER}} .section-heading p',
            ]
        );
       
        $this->add_responsive_control(
            'con_title_margin',
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

            'sec_query',
                [
                    'label' => esc_html__( 'Query', 'axil-elements' ),
                ]
            );
              $this->add_control(      
                'post_sorting',
                    [
                        'label' => esc_html__( 'Post Sorting', 'axil-elements' ),
                        'type' => Controls_Manager::SELECT2,
                            'options' => [
                                'recent'        => esc_html__( 'Recent Post', 'axil-elements' ),
                                'rand'          => esc_html__( 'Random Post', 'axil-elements' ),
                                'modified'      => esc_html__( 'Last Modified Post', 'axil-elements' ),
                                'comment_count' => esc_html__( 'Most commented Post', 'axil-elements' ),
                                'view'          => esc_html__( 'Most viewed Post', 'axil-elements' ),
                            ],
                        'default' => 'recent',
                    ] 
                );

                $this->add_control(      
                    'post_ordering',
                        [
                            'label' => esc_html__( 'Post Ordering', 'axil-elements' ),
                            'type' => Controls_Manager::SELECT2,
                            'options' => array(
                               'DESC'  => esc_html__( 'Desecending', 'axil-elements' ),
                               'ASC'   => esc_html__( 'Ascending', 'axil-elements' ),
                            ),
                         'default' => 'DESC',
                        ] 
                    );

                $this->add_control(
                'cat_single_list',
                    [
                        'label' => esc_html__( 'Categories', 'axil-elements' ),
                        'type' => Controls_Manager::SELECT2,
                         'default' => '0',
                         'multiple' => true,
                        'options' => $category_dropdown,
                    ] 
                ); 


                $this->add_control(
                'number_of_post',
                    [
                        'label'   => esc_html__( 'Number', 'axil-elements' ),
                        'type'    => Controls_Manager::NUMBER,
                        'default' => '2',  
                        'description' => esc_html__( 'Write -1 to show all', 'axil-elements' ),  
                    ]

                );
               $this->add_control(      
                'posts_not_in',
                    [
                    'label' => esc_html__( 'Select The Posts that will not display', 'axil-elements' ),
                    'type' => Controls_Manager::SELECT2,
                    'options'       => $this->get_post_name(),                  
                    'label_block'   => true,
                    'multiple'      => true,
                    'separator'     => 'before',
                    ] 
                );
                $this->end_controls_section();

                $this->start_controls_section(
                    'display_options_section',
                    [
                        'label' => esc_html__( 'Display Options', 'axil-elements' ),
                    ]
                );
                
                 $this->add_control(
                    'post_img_display',
                    [                
                        'type'          => Controls_Manager::SWITCHER,
                        'label'         => esc_html__( 'Post image Display', 'axil-elements' ),
                        'label_on'      => esc_html__( 'On', 'axil-elements' ),
                        'label_off'     => esc_html__( 'Off', 'axil-elements' ),
                        'default'       => 'yes',
                        'description'   => esc_html__( 'Show or Hide Post image. Default: On', 'axil-elements' ),
                      
                        'separator'     => 'before',
                    ] 
                );
                $this->add_control(
                'post_title_length',
                        [
                            'label'   => esc_html__( 'Post Title Length', 'axil-elements' ),
                            'type'    => Controls_Manager::NUMBER,
                            'default' => 10,                              

                        ]

                    );
                 $this->add_control(
                    'content_display',
                    [                
                        'type'          => Controls_Manager::SWITCHER,
                        'label'         => esc_html__( 'Content Display', 'axil-elements' ),
                        'label_on'      => esc_html__( 'On', 'axil-elements' ),
                        'label_off'     => esc_html__( 'Off', 'axil-elements' ),
                        'default'       => 'yes',
                        'description'   => esc_html__( 'Show or Hide Content. Default: On', 'axil-elements' ),
                      
                        'separator'     => 'before',
                    ] 
                );
                
                $this->add_control(
                    'post_content_length',
                        [
                            'label'     => esc_html__( 'Post Excerpt Length', 'axil-elements' ),
                            'type'      => Controls_Manager::NUMBER,
                            'default'   => 20,                                                                                  
                                                          
                        ]

                    );
              

                $this->add_control(
                    'post_details',
                    [
                        
                        'type' => Controls_Manager::SWITCHER,
                        'label'       => esc_html__( 'Post Details', 'axil-elements' ),
                        'label_on'    => esc_html__( 'On', 'axil-elements' ),
                        'label_off'   => esc_html__( 'Off', 'axil-elements' ),
                        'default'     => 'yes',
                        'description' => esc_html__( 'Show or Hide Details. Default: On', 'axil-elements' ),
                         'separator'     => 'before',
                         
                    ] 
                );  
                 $this->add_control(
                    'post_details_text',
                    [
                        'label'   => esc_html__( 'Detail Text', 'axil-elements' ),
                        'type'    => Controls_Manager::TEXT,
                        'default' => 'LOREM IPSUM',
                           'condition' => array( 'post_details' => array( 'yes' ) ),
                        
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
                    'label' => esc_html__( 'Customize', 'axil-elements' ),
                    'type' => Controls_Manager::SWITCHER,
                    'label_on'    => esc_html__( 'On', 'axil-elements' ),
                    'label_off'   => esc_html__( 'Off', 'axil-elements' ),
                    'default'     => 'no',
                   
                ]
            );   



        $this->add_control(
            'shape1',
            [
                'label' => esc_html__('Shape 1','axil-elements'),
                'type'=>Controls_Manager::MEDIA,                    
                'default' => [
                    'url' =>  $this->axil_get_img( 'blog/bubble-1.png' ),
                ],
                 'condition' => array( 'shape_style_on' => array( 'yes' ) ),
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
                'default' => [
                   'url' =>  $this->axil_get_img( 'blog/line-1.png' ),
                ],
                 'condition' => array( 'shape_style_on' => array( 'yes' ) ),
                'dynamic' => [
                    'active' => true,
                ],
                    
            ]
        );      
        $this->add_control(
            'shape3',
            [
                'label' => esc_html__('Shape 3','axil-elements'),
                'type'=>Controls_Manager::MEDIA,                    
                'default' => [
                   'url' =>  $this->axil_get_img( 'blog/line-2.png' ),
                ],
                 'condition' => array( 'shape_style_on' => array( 'yes' ) ),
                'dynamic' => [
                    'active' => true,
                ],
                    
            ]
        );  

        $this->add_control(
            'shape4',
            [
                'label' => esc_html__('Shape 4','axil-elements'),
                'type'=>Controls_Manager::MEDIA,                    
                'default' => [
                   'url' =>  $this->axil_get_img( 'blog/bubble-2.png' ),
                ],
                 'condition' => array( 'shape_style_on' => array( 'yes' ) ),
                'dynamic' => [
                    'active' => true,
                ],
                    
            ]
        ); 
        $this->end_controls_section();     

            // Style Title tab section
            $this->start_controls_section(
                'blog_title_style_section',
                [
                    'label' => esc_html__( 'Blog Title', 'axil-elements' ),
                    'tab' => Controls_Manager::TAB_STYLE,                
                ]
            );

                            
            $this->add_control(
                'blog_title_color',
                [
                'label' => esc_html__( 'Color', 'axil-elements' ),
                'type' => Controls_Manager::COLOR,
                'default'=>'#333',
                'selectors' => [
                '{{WRAPPER}} .blog-title' => 'color: {{VALUE}}',
                '{{WRAPPER}} .blog-title a' => 'color: {{VALUE}}',
                ],

                   
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'blog_title_typography',
                    'label' => esc_html__( 'Typography', 'axil-elements' ),   
                    'selector' => '{{WRAPPER}} .blog-title',
                    
                ]
            );
            $this->add_responsive_control(
                'blog_title_margin',
                [
                    'label' => esc_html__( 'Margin', 'axil-elements' ),
                    'type' => Controls_Manager::DIMENSIONS,                        
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .blog-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        
                    ],
                ]
            );
            $this->add_responsive_control(
                'blog_title_padding',
                [
                    'label' => esc_html__( 'Padding', 'axil-elements' ),
                     'type' => Controls_Manager::DIMENSIONS,                        
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .blog-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                       
                    ],
                ]
            );

            $this->end_controls_section();

            // Style Title tab section
                $this->start_controls_section(
                    'blog_content_style_section',
                    [
                        'label' => esc_html__( 'Blog Content', 'axil-elements' ),
                        'tab' => Controls_Manager::TAB_STYLE,                
                    ]
                );

                
                $this->add_control(
                    'blog_content_color',
                    [
                    'label' => esc_html__( 'Color', 'axil-elements' ),
                    'type' => Controls_Manager::COLOR,
                    'default'=>'',
                    'selectors' => [
                    '{{WRAPPER}} .blog-content' => 'color: {{VALUE}}',                  
                    ],

                        
                    ]
                );
                $this->add_group_control(
                    Group_Control_Typography::get_type(),
                    [
                        'name' => 'blog_content_typography',
                        'label' => esc_html__( 'Typography', 'axil-elements' ),                       
                        
                        'selector' => '{{WRAPPER}} .blog-content',
                        
                    ]
                );
                $this->add_responsive_control(
                    'blog_content_margin',
                    [
                        'label' => esc_html__( 'Margin', 'axil-elements' ),
                        'type' => Controls_Manager::DIMENSIONS,
                          
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                            '{{WRAPPER}} .blog-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            
                        ],
                    ]
                );
                $this->add_responsive_control(
                    'blog_content_padding',
                    [
                        'label' => esc_html__( 'Padding', 'axil-elements' ),
                        'type' => Controls_Manager::DIMENSIONS,
                          
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                            '{{WRAPPER}} .blog-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                           
                        ],
                    ]
                );
            $this->end_controls_section();
            //Style Meta tab section
                $this->start_controls_section(
                    'blog_meta_style_section',
                    [
                        'label' => esc_html__( 'Read More', 'axil-elements' ),
                        'tab' => Controls_Manager::TAB_STYLE,                
                    ]
                );
                
                $this->add_control(
                    'blog_meta_color',
                    [
                    'label' => esc_html__( 'Color', 'axil-elements' ),
                    'type' => Controls_Manager::COLOR,
                    'default'=>'#333',
                    'selectors' => [                                     
                    '{{WRAPPER}} .blog-list .post-content .more-btn' => 'color: {{VALUE}}',                  
                                    
                    ],

                     
                    ]
                ); 
                $this->add_control(
                    'blog_meta_hover_color',
                    [
                    'label' => esc_html__( 'Hover Color', 'axil-elements' ),
                    'type' => Controls_Manager::COLOR,
                    'default'=>'#333',
                    'selectors' => [                                     
                    '{{WRAPPER}} .blog-list .post-content .more-btn:hover' => 'color: {{VALUE}}',                  
                                    
                    ],

                     
                    ]
                );


                $this->add_group_control(
                    Group_Control_Typography::get_type(),
                    [
                        'name' => 'blog_meta_typography',
                        'label' => esc_html__( 'Typography', 'axil-elements' ),
                        
                     
                        'selector' => '{{WRAPPER}} .blog-list .post-content .more-btn',
                        
                    ]
                );
                $this->add_responsive_control(
                    'blog_meta_margin',
                    [
                        'label' => esc_html__( 'Margin', 'axil-elements' ),
                        'type' => Controls_Manager::DIMENSIONS,
                       
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                            '{{WRAPPER}}  .blog-list .post-content .more-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            
                        ],
                    ]
                );
                $this->add_responsive_control(
                    'blog_meta_padding',
                    [
                        'label' => esc_html__( 'Padding', 'axil-elements' ),
                        'type' => Controls_Manager::DIMENSIONS,
                        
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                            '{{WRAPPER}} .blog-list .post-content .more-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            
                           
                        ],
                    ]
                );
            $this->end_controls_section();

        }      
     protected function render() {
        $settings = $this->get_settings(); 

        $template = 'post-grid-onepage-1';
        return axil_Elements_Helper::axiltheme_element_template( $template, $settings );
    }
}
