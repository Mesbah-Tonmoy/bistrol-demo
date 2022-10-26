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
use Elementor\Utils;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Scheme_Color;
use Elementor\DATE_TIME;
use Elementor\SLIDER;
use Elementor\CHOOSE;
use Elementor\Icons_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class axil_plan_library_tabs extends Widget_Base {
  use \Elementor\AxilElementCommonFunctions;
 public function get_name() {
        return 'axil-library-plan-tab';
    }    
    public function get_title() {
        return __( 'Pricing Tabs', 'axil-elements' );
    }
    public function get_icon() {
        return 'eicon-accordion';
    }
    public function get_categories() {
        return [ ABSTRAK_ELEMENTS_THEME_PREFIX . '-widgets' ];
    }
    public function axil_get_img($img)
    {
        $img = ABSTRAK_ELEMENTS_BASE_URL . 'assets/media/' . $img;
        return $img;
    }

    public function get_post_template( $type = 'page' ) {
    $posts = get_posts(
      array(
        'post_type'      => 'elementor_library',
        'orderby'        => 'title',
        'order'          => 'ASC',
        'posts_per_page' => '-1',
        'tax_query'      => array(
          array(
            'taxonomy' => 'elementor_library_type',
            'field'    => 'slug',
            'terms'    => $type,
          ),
        ),
      )
    );
    $templates = array();
    foreach ( $posts as $post ) {
      $templates[] = array(
        'id'   => $post->ID,
        'name' => $post->post_title,
      );
    }
    return $templates;
  }

  public function get_saved_data( $type = 'section' ) {
    $saved_widgets = $this->get_post_template( $type );
    $options[-1]   = __( 'Select', 'axil-elements' );
    if ( count( $saved_widgets ) ) {
      foreach ( $saved_widgets as $saved_row ) {
        $options[ $saved_row['id'] ] = $saved_row['name'];
      }
    } else {
      $options['no_template'] = __( 'It seems that, you have not saved any template yet.', 'axil-elements' );
    }
    return $options;
  }

  public function get_content_type() {
    $content_type = array(
      'content'              => esc_html__( 'Content', 'axil-elements' ),
      'saved_rows'           => esc_html__( 'Saved Section', 'axil-elements' ),
      'saved_page_templates' => esc_html__( 'Saved Page', 'axil-elements' ),
    );
    return $content_type;
  }

	protected function register_controls() {


  $this->start_controls_section(
            'price_section',
            [
                'label' => esc_html__( ' Layout', 'axil-elements' ),
            ]
        ); 

          $this->add_control(
            'layout',
            [
                'label' => esc_html__( 'Layout', 'axil-elements' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'style1',
                'options' => [
                    'style1'    => esc_html__( 'Layout 1', 'axil-elements' ),
                    'style2'    => esc_html__( 'Layout 2', 'axil-elements' ),
                                      
                    
                ],
            ] 
        );
       $this->add_control(
            'price_bg_type',
            [
                'label' => esc_html__( 'Section Background Color', 'axil-elements' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'bg-color-light',               
                'options' => [
                    'bg-color-transparent'   => esc_html__( 'Light', 'axil-elements' ),
                    'bg-color-light'   => esc_html__( 'Grey', 'axil-elements' ),                  
                    
                ],
            ] 
        );


        $this->add_responsive_control(
            'section_padding',
            [
                'label' => __( 'Section Padding', 'axil-elements' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                 
                'selectors' => [
                    '{{WRAPPER}} .section.bg-color-transparent.section-padding' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    
                ],
            ]
        );

    $this->end_controls_section();  

    $this->axil_section_title('pricing_library', 'Section title', 'h2', true, 'center');
   
    $this->axil_basic_style_controls('pricing_library_pre_title', 'Section - Tag Line', '.section-heading .subtitle');
    $this->axil_basic_style_controls('pricing_library_title', 'Section - Title', '.section-heading .title');        
    $this->axil_basic_style_controls('pricing_library_description', 'Section - Description', '.section-heading p');
    $this->start_controls_section(
        'library_tab_content',
            [
                'label' => esc_html__( 'Yearly / Monthly Tabs', 'axil-elements' ),
            ]
        );
        
        $this->add_control(
        'tab_nav1',
            [
                'label'   => esc_html__( 'Nav Title', 'axil-elements' ),
                'type'    => Controls_Manager::TEXT,
                'default' =>  esc_html__( ' Billed yearly', 'axil-elements' ),
            ]
        );
        $this->add_control(
            'tab_nav2',
                [
                    'label'   => esc_html__( 'Nav Title', 'axil-elements' ),
                    'type'    => Controls_Manager::TEXT,
                    'default' =>  esc_html__( 'Billed monthly', 'axil-elements' ),
                ]
            );     
         $this->end_controls_section();
 

 
        $this->start_controls_section(
            'sec_pricing_list',
            [
                'label' => esc_html__('Pricing Boxs','axil-elements'),
                  
                
            ]
        );

        $repeater = new Repeater(); 
 
          $repeater->add_control(
            'header_title',
            [
                'label' => esc_html__( 'Header Title', 'axil-elements' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'Professional', 'axil-elements' ),
                'placeholder' => esc_html__( 'Title', 'axil-elements' ),
            ]
        );
        
          $repeater->add_control(
            'subtitle',
            [
                'label' => esc_html__( 'Sub Title', 'axil-elements' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'A beautiful, simple website', 'axil-elements' ),
                'placeholder' => esc_html__( 'Sub title', 'axil-elements' ),
            ]
        );
          $repeater->add_control(
                'amount',
                [
                    'label'   => esc_html__( 'Yearly Amount', 'axil-elements' ),
                    'type'    => Controls_Manager::TEXT,
                    'default' => '$19.99',
                ]
            );    
            $repeater->add_control(
                'duration',
                [
                    'label'   => esc_html__( 'Duration', 'axil-elements' ),
                    'type'    => Controls_Manager::TEXT,
                    'default' => esc_html__( ' / Yearly', 'axil-elements' ),
                ]
            );     
          $repeater->add_control(
                'amount2',
                [
                    'label'   => esc_html__( 'Monthly Amount', 'axil-elements' ),
                    'type'    => Controls_Manager::TEXT,
                    'default' => '$19.99',
                ]
            );     

              $repeater->add_control(
                'duration2',
                [
                    'label'   => esc_html__( 'Duration', 'axil-elements' ),
                    'type'    => Controls_Manager::TEXT,
                    'default' => esc_html__( ' / monthly', 'axil-elements' ),
                ]
            );    

               $repeater->add_control(
                'recommended_icon_on',
                [
                    'label' => esc_html__( 'Recommended Icon', 'axil-elements' ),
                    'type' => Controls_Manager::SWITCHER,
                    'label_on'    => esc_html__( 'On', 'axil-elements' ),
                    'label_off'   => esc_html__( 'Off', 'axil-elements' ),
                    'default'     => 'no',
                   
                ]
            );

              $repeater->add_control(
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
               $repeater->add_control(
                'detail_txt',
                [
                    'label'   => esc_html__( 'Detail Text', 'axil-elements' ),
                    'type'    => Controls_Manager::TEXT,                  
                    'default' => esc_html__( 'Get Started Today', 'axil-elements' ),
                    'label'   => esc_html__( 'Detail Text', 'axil-elements' ),
                ]
            );     

              $repeater->add_control(
                'url',
                [
                    'label'   => esc_html__( 'Detail URL', 'axil-elements' ),
                    'type'    => Controls_Manager::URL,
                    'placeholder' => 'https://your-link.com',              
                ]
            );     

              $repeater->add_control(
                'recommended_on',
                [
                    'label' => esc_html__( 'Active', 'axil-elements' ),
                    'type' => Controls_Manager::SWITCHER,
                    'label_on'    => esc_html__( 'On', 'axil-elements' ),
                    'label_off'   => esc_html__( 'Off', 'axil-elements' ),
                    'default'     => 'no',
                   
                ]
            );
              $repeater->add_control(
                'border_on',
                [
                    'label' => esc_html__( 'Has Border', 'axil-elements' ),
                    'type' => Controls_Manager::SWITCHER,
                    'label_on'    => esc_html__( 'On', 'axil-elements' ),
                    'label_off'   => esc_html__( 'Off', 'axil-elements' ),
                    'default'     => 'no',
                   
                ]
            );
            $repeater->add_control(
                'library_tab_library',
                [
                    'label' => __( 'List Elementor Library', 'uiart-elements' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => '',
                    'options' => $this->get_saved_data('section'),
                ]
            );
 
   
            $this->add_control(
            'pricing_table_list',
            [
                'label' => esc_html__('Pricing Table List','axil-elements'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),

                'default' => [

                    [
                        'header_title' => esc_html__('Professional.','axil-elements'),                        
                        'subtitle' => esc_html__('A beautiful, simple website.','axil-elements'),                        
                        'amount' => '$119.99',                        
                        'duration' => esc_html__('/ yearly','axil-elements'),                        
                    ],
                     [
                        'header_title' => esc_html__('Professional.','axil-elements'),                        
                        'subtitle' => esc_html__('A beautiful, simple website.','axil-elements'),                        
                        'amount' => '$119.99',                        
                        'duration' => esc_html__('/ yearly','axil-elements'), 
                    ],
                    [ 
                        'header_title' => esc_html__('Professional.','axil-elements'),                        
                        'subtitle' => esc_html__('A beautiful, simple website.','axil-elements'),                        
                        'amount' => '$119.99',                        
                        'duration' => esc_html__('/ yearly','axil-elements'), 
                    ],
                                           
                ],
                'title_field' => '{{{ header_title }}}',
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
            'poster_shape3',
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
                'shape31',
                [
                    'label' => esc_html__('Shape 1','axil-elements'),
                    'type'=>Controls_Manager::MEDIA,                    
                    'default' => [
                        'url' =>  $this->axil_get_img( 'shape3/line-1.png' ),
                    ],
                    'dynamic' => [
                        'active' => true,
                    ],
                     'condition' => array( 'shape_style_on' => array( 'yes' ) ),
                        
                ]
            );      
                $this->add_control(
                    'shape32',
                    [
                        'label' => esc_html__('Shape 2','axil-elements'),
                        'type'=>Controls_Manager::MEDIA,                    
                        'default' => [
                           'url' =>  $this->axil_get_img( 'shape3/bubble-4.png' ),
                        ],
                        'dynamic' => [
                            'active' => true,
                        ],
                        'condition' => array( 'shape_style_on' => array( 'yes' ) ),
                            
                    ]
                );      
                $this->add_control(
                    'shape33',
                    [
                        'label' => esc_html__('Shape 3','axil-elements'),
                        'type'=>Controls_Manager::MEDIA,                    
                        'default' => [
                           'url' =>  $this->axil_get_img( 'shape3/hand-1.png' ),
                        ],
                        'dynamic' => [
                            'active' => true,
                        ],
                         'condition' => array( 'shape_style_on' => array( 'yes' ) ),
                            
                    ]
                );  

              
            $this->end_controls_section(); 

             $this->start_controls_section(
            'axil_responsive',
                [
                'label' => __( 'Custom Grid', 'axil-elements' ),
                ]
            );

             
            $this->add_control(
                'col_lg',
                [
                    'label' => __( 'Desktops: > 1199px', 'axil-elements' ),
                    'type' => Controls_Manager::SELECT,
                    'options' => [
                        '12' => esc_html__( '1 Col', 'axil-elements' ),
                        '6'  => esc_html__( '2 Col', 'axil-elements' ),
                        '4'  => esc_html__( '3 Col', 'axil-elements' ),
                        '3'  => esc_html__( '4 Col', 'axil-elements' ),    
                        ],
                    'default' => '4',
                ] 
            );
            $this->add_control(
            'col_md',
                [
                    'label' => __( 'Desktops: > 991px', 'axil-elements' ),
                    'type' => Controls_Manager::SELECT,
                    'options' => [
                        '12' => esc_html__( '1 Col', 'axil-elements' ),
                        '6'  => esc_html__( '2 Col', 'axil-elements' ),
                        '4'  => esc_html__( '3 Col', 'axil-elements' ),
                        '3'  => esc_html__( '4 Col', 'axil-elements' ),    
                        ],
                    'default' => '12',
                ] 
            );
            $this->add_control(
            'col_sm',
                [
                    'label' => __( 'Tablets: > 767px', 'axil-elements' ),
                    'type' => Controls_Manager::SELECT,
                    'options' => [
                        '12' => esc_html__( '1 Col', 'axil-elements' ),
                        '6'  => esc_html__( '2 Col', 'axil-elements' ),
                        '4'  => esc_html__( '3 Col', 'axil-elements' ),
                        '3'  => esc_html__( '4 Col', 'axil-elements' ),    
                        ],
                    'default' => '12',
                ] 
            );          
        $this->end_controls_section();
	}


	protected function render() {
		$settings = $this->get_settings();
        
        $template   = 'plan-library-tabs-' . str_replace("style", "", $settings['layout']);  
        return axil_Elements_Helper::axiltheme_element_template( $template, $settings );
 
	}
}