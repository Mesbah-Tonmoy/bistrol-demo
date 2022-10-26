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
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Border;
use Elementor\Scheme_Typography; 
use Elementor\Scheme_Color;
use Elementor\DATE_TIME;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Abstrak_case_study_slider extends Widget_Base {
use \Elementor\AxilElementCommonFunctions;
 public function get_name() {
        return 'abstrak-casestudy-slider';
    }    
    public function get_title() {
        return __( 'CaseStudy Carousel ', 'axil-elements' );
    }
    public function get_icon() {
        return ' eicon-countdown';
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

     private function axil_get_single_all_pages()
        {

            $page_list = get_posts(array(
                'post_type' => 'axil-case-study',
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

   // CaseStudys group
        $this->start_controls_section(
            'casestudys',
            [
                'label' => esc_html__('Case Study','axil-elements'),
                //'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $repeater = new Repeater();


        $repeater->add_control(
            'pre_title',
            [
                'label' => esc_html__('Pre Title','axil-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => 'featured case study',
                'placeholder' => esc_html__('Type Pre Heading Text','axil-elements'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'title',
            [
                'label' => esc_html__('Title','axil-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Logo, identity & web design for Uber',
                'placeholder' => esc_html__('Type Heading Text','axil-elements'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'title_tag',
            [
                'label' => esc_html__('Title HTML Tag','axil-elements'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'h1' => [
                        'title' => esc_html__('H1','axil-elements'),
                        'icon' => 'eicon-editor-h1'
                    ],
                    'h2' => [
                        'title' => esc_html__('H2','axil-elements'),
                        'icon' => 'eicon-editor-h2'
                    ],
                    'h3' => [
                        'title' => esc_html__('H3','axil-elements'),
                        'icon' => 'eicon-editor-h3'
                    ],
                    'h4' => [
                        'title' => esc_html__('H4','axil-elements'),
                        'icon' => 'eicon-editor-h4'
                    ],
                    'h5' => [
                        'title' => esc_html__('H5','axil-elements'),
                        'icon' => 'eicon-editor-h5'
                    ],
                    'h6' => [
                        'title' => esc_html__('H6','axil-elements'),
                        'icon' => 'eicon-editor-h6'
                    ]
                ],
                'default' => 'h2',
                'toggle' => false,
                'label_block' => true,

            ]
        );

        $repeater->add_control(
            'desctiption',
            [
                'label' => esc_html__('Description','axil-elements'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Donec metus lorem, vulputate at sapien sit amet, auctor iaculis lorem. In vel hendrerit nisi. Vestibulum eget risus velit. Aliquam tristique libero at dui sodales, et placerat orci lobortis. Maecenas ipsum neque, elementum id dignissim et, imperdiet vitae mauris.',
                'placeholder' => esc_html__('Type casestudy description here','axil-elements'),
            ]
        );

        /**
         * Start Link
         */
        $repeater->add_control(
            'casestudy_link_text',
            [
                'label' => esc_html__('CaseStudy Link Text','axil-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Read Case Study',
                'title' => esc_html__('Enter button text','axil-elements'),
            ]
        );

        $repeater->add_control(
            'casestudy_link_type',
            [
                'label' => esc_html__('CaseStudy Link Type','axil-elements'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    '1' => 'Custom Link',
                    '2' => 'Internal Page',
                    '3' => 'Single CaseStudy Page',
                ],
                'default' => '1',
            ]
        );
        $repeater->add_control(
            'casestudy_link',
            [
                'label' => esc_html__('CaseStudy Link link','axil-elements'),
                'type' => Controls_Manager::URL,
                'dynamic' => [
                    'active' => true,
                ],
                'placeholder' => esc_html__('https://your-link.com','axil-elements'),
                'show_external' => true,
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                ],
                'condition' => [
                    'casestudy_link_type' => '1'
                ]
            ]
        );
        $repeater->add_control(
            'casestudy_page_link',
            [
                'label' => esc_html__('Select CaseStudy Link Page','axil-elements'),
                'type' => Controls_Manager::SELECT2,
                'label_block' => true,
                'options' =>  $this-> axil_get_all_pages(),
                'condition' => [
                    'casestudy_link_type' => '2'
                ]
            ]
        );
        $repeater->add_control(
            'casestudy_single_page_link',
            [
                'label' => esc_html__('Select CaseStudy SIngle Link Page','axil-elements'),
                'type' => Controls_Manager::SELECT2,
                'label_block' => true,
                'options' =>  $this-> axil_get_single_all_pages(),
                'condition' => [
                    'casestudy_link_type' => '3'
                ]
            ]
        );
       
        /**
         * Start Funfact
         */
        $repeater->add_control(
            'casestudy_funfact_one_number',
            [
                'label' => esc_html__('CaseStudy Funfact One Number','axil-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => '45',
                'title' => esc_html__('Enter funfact number','axil-elements'),
                'label_block' => true,
            ]
        );
        

        $repeater->add_control(
            'casestudy_funfact_one_number_sup',
            [
                'label' => esc_html__('CaseStudy Funfact One Number Sup','axil-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => '%',
                
                'label_block' => true,
            ]
        );


        $repeater->add_control(
            'casestudy_funfact_one_title',
            [
                'label' => esc_html__('CaseStudy Funfact One Title','axil-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => 'ROI increase',
                'title' => esc_html__('Enter funfact One Title','axil-elements'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'casestudy_funfact_two_title_hr',
            [
                'type' => Controls_Manager::DIVIDER,
            ]
        );
        $repeater->add_control(
            'casestudy_funfact_two_number',
            [
                'label' => esc_html__('CaseStudy Funfact Two Number','axil-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => '19',
                'title' => esc_html__('Enter funfact number','axil-elements'),
                'label_block' => true,
            ]
        );
         
         $repeater->add_control(
            'casestudy_funfact_two_number_sup',
            [
                'label' => esc_html__('CaseStudy Funfact Two Number Sup','axil-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => 'K',
                
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'casestudy_funfact_two_title',
            [
                'label' => esc_html__('CaseStudy Funfact Two Title','axil-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Monthly website visits',
                'title' => esc_html__('Enter funfact Two Title','axil-elements'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'casestudy_thumbnail',
            [
                'label' => esc_html__('Case Study Thumbnail','axil-elements'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],

            ]
        );
        $this->add_control(
            'casestudy_list',
            [
                'label' => esc_html__('CaseStudys List','axil-elements'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'casestudy_title' => esc_html__('Logo, identity & web design for Uber #1','axil-elements'),
                        'casestudy_content' => esc_html__('Donec metus lorem, vulputate at sapien sit amet, auctor iaculis lorem. In vel hendrerit nisi. Vestibulum eget risus velit. Aliquam tristique libero at dui sodales, et placerat orci lobortis. Maecenas ipsum neque, elementum id dignissim et, imperdiet vitae mauris.','axil-elements'),
                        'casestudy_link_text' => esc_html__('Read Case Study','axil-elements'),
                    ],
                    [
                        'casestudy_title' => esc_html__('Logo, identity & web design for Uber #2','axil-elements'),
                        'casestudy_content' => esc_html__('Donec metus lorem, vulputate at sapien sit amet, auctor iaculis lorem. In vel hendrerit nisi. Vestibulum eget risus velit. Aliquam tristique libero at dui sodales, et placerat orci lobortis. Maecenas ipsum neque, elementum id dignissim et, imperdiet vitae mauris.','axil-elements'),
                        'casestudy_link_text' => esc_html__('Read Case Study','axil-elements'),
                    ],
                    [
                        'casestudy_title' => esc_html__('Logo, identity & web design for Uber #3','axil-elements'),
                        'casestudy_content' => esc_html__('Donec metus lorem, vulputate at sapien sit amet, auctor iaculis lorem. In vel hendrerit nisi. Vestibulum eget risus velit. Aliquam tristique libero at dui sodales, et placerat orci lobortis. Maecenas ipsum neque, elementum id dignissim et, imperdiet vitae mauris.','axil-elements'),
                        'casestudy_link_text' => esc_html__('Read Case Study','axil-elements'),
                    ]
                ],
                'title_field' => '{{{ casestudy_title }}}',
            ]
        );

        $this->end_controls_section();

	$this->start_controls_section(
	    'axil_casestudy_title_pre_title_styling',
    	    [
    	        'label' => esc_html__( 'Pre title', 'axil-elements'),
    	        'tab' => Controls_Manager::TAB_STYLE,
    	    ]
		);
		$this->add_control(
		    'axil_casestudy_title_pre_title_color',
		    [
		        'label' => esc_html__('Color', 'axil-elements'),
		        'type' => Controls_Manager::COLOR,
		        'selectors' => [
		            '{{WRAPPER}} .section-heading .subtitle' => 'color: {{VALUE}} !important;',
		        ],
		    ]
		);
		$this->add_group_control(
		    Group_Control_Typography::get_type(),
		    [
		        'name' => 'axil_casestudy_title_pre_title_typography',
		        'label' => esc_html__('Typography', 'axil-elements'),
		        'selector' => '{{WRAPPER}} .section-heading .subtitle',
		    ]
		);
		$this->add_responsive_control(
		    'axil_casestudy_title_pre_title_padding',
		    [
		        'label' => esc_html__('Padding', 'axil-elements'),
		        'type' => Controls_Manager::DIMENSIONS,
		        'size_units' => ['px', '%', 'em'],
		        'selectors' => [
		            '{{WRAPPER}} .section-heading .subtitle' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		        ],
		        'separator' => 'before',
		    ]
		);
		$this->add_responsive_control(
		    'axil_casestudy_title_pre_title_margin',
		    [
		        'label' => esc_html__('Margin', 'axil-elements'),
		        'type' => Controls_Manager::DIMENSIONS,
		        'size_units' => ['px', '%', 'em'],
		        'selectors' => [
		            '{{WRAPPER}} .section-heading .subtitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		        ],
		        'separator' => 'before',
		    ]
		);
		$this->end_controls_section();


	$this->start_controls_section(
		    'axil_casestudy_title_styling',
		    [
		        'label' => esc_html__( 'Title', 'axil-elements'),
		        'tab' => Controls_Manager::TAB_STYLE,
		    ]
		);
		$this->add_control(
		    'axil_casestudy_title_color',
		    [
		        'label' => esc_html__('Color', 'axil-elements'),
		        'type' => Controls_Manager::COLOR,
		        'selectors' => [
		            '{{WRAPPER}} .case-study-featured .section-heading .title' => 'color: {{VALUE}} !important;',
		        ],
		    ]
		);
		$this->add_group_control(
		    Group_Control_Typography::get_type(),
		    [
		        'name' => 'axil_casestudy_title_typography',
		        'label' => esc_html__('Typography', 'axil-elements'),
		        'selector' => '{{WRAPPER}} .case-study-featured .section-heading .title',
		    ]
		);
		$this->add_responsive_control(
		    'axil_casestudy_title_padding',
		    [
		        'label' => esc_html__('Padding', 'axil-elements'),
		        'type' => Controls_Manager::DIMENSIONS,
		        'size_units' => ['px', '%', 'em'],
		        'selectors' => [
		            '{{WRAPPER}} .case-study-featured .section-heading .title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		        ],
		        'separator' => 'before',
		    ]
		);
		$this->add_responsive_control(
		    'axil_casestudy_title_margin',
		    [
		        'label' => esc_html__('Margin', 'axil-elements'),
		        'type' => Controls_Manager::DIMENSIONS,
		        'size_units' => ['px', '%', 'em'],
		        'selectors' => [
		            '{{WRAPPER}} .case-study-featured .section-heading .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		        ],
		        'separator' => 'before',
		    ]
		);
		$this->end_controls_section();

		$this->start_controls_section(
		    'axil_casestudy_description_styling',
		    [
		        'label' => esc_html__( 'Description', 'axil-elements'),
		        'tab' => Controls_Manager::TAB_STYLE,
		    ]
		);
		$this->add_control(
		    'axil_casestudy_description_color',
		    [
		        'label' => esc_html__('Color', 'axil-elements'),
		        'type' => Controls_Manager::COLOR,
		        'selectors' => [
		            '{{WRAPPER}} .case-study-featured .section-heading p' => 'color: {{VALUE}} !important;',
		        ],
		    ]
		);
		$this->add_group_control(
		    Group_Control_Typography::get_type(),
		    [
		        'name' => 'axil_casestudy_description_typography',
		        'label' => esc_html__('Typography', 'axil-elements'),
		        'selector' => '{{WRAPPER}} .case-study-featured .section-heading p',
		    ]
		);
		$this->add_responsive_control(
		    'axil_casestudy_description_padding',
		    [
		        'label' => esc_html__('Padding', 'axil-elements'),
		        'type' => Controls_Manager::DIMENSIONS,
		        'size_units' => ['px', '%', 'em'],
		        'selectors' => [
		            '{{WRAPPER}} .case-study-featured .section-heading p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		        ],
		        'separator' => 'before',
		    ]
		);
		$this->add_responsive_control(
		    'axil_casestudy_description_margin',
		    [
		        'label' => esc_html__('Margin', 'axil-elements'),
		        'type' => Controls_Manager::DIMENSIONS,
		        'size_units' => ['px', '%', 'em'],
		        'selectors' => [
		            '{{WRAPPER}} .case-study-featured .section-heading p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		        ],
		        'separator' => 'before',
		    ]
		);
		$this->end_controls_section();

        $this->axil_link_controls_style('casestudy_button_style', 'Discover More Button', '.case-study-featured .axil-btn.btn-large', 'btn-large');
		$this->start_controls_section(
		    'axil_casestudy_title_funfact_number_styling',
		    [
		        'label' => esc_html__( 'FunFact Number', 'axil-elements'),
		        'tab' => Controls_Manager::TAB_STYLE,
		    ]
		);
		$this->add_control(
		    'axil_casestudy_title_funfact_number_color',
		    [
		        'label' => esc_html__('Color', 'axil-elements'),
		        'type' => Controls_Manager::COLOR,
		        'selectors' => [
		            '{{WRAPPER}} .case-study-counterup .count-number' => 'color: {{VALUE}} !important;',
		        ],
		    ]
		);
		$this->add_group_control(
		    Group_Control_Typography::get_type(),
		    [
		        'name' => 'axil_casestudy_title_funfact_number_typography',
		        'label' => esc_html__('Typography', 'axil-elements'),
		        'selector' => '{{WRAPPER}} .case-study-counterup .count-number',
		    ]
		);
		$this->add_responsive_control(
		    'axil_casestudy_title_funfact_number_padding',
		    [
		        'label' => esc_html__('Padding', 'axil-elements'),
		        'type' => Controls_Manager::DIMENSIONS,
		        'size_units' => ['px', '%', 'em'],
		        'selectors' => [
		            '{{WRAPPER}} .case-study-counterup .count-number' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		        ],
		        'separator' => 'before',
		    ]
		);
		$this->add_responsive_control(
		    'axil_casestudy_title_funfact_number_margin',
		    [
		        'label' => esc_html__('Margin', 'axil-elements'),
		        'type' => Controls_Manager::DIMENSIONS,
		        'size_units' => ['px', '%', 'em'],
		        'selectors' => [
		            '{{WRAPPER}} .case-study-counterup .count-number' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		        ],
		        'separator' => 'before',
		    ]
		);
		$this->end_controls_section();


		$this->start_controls_section(
		    'axil_casestudy_title_funfact_title_styling',
		    [
		        'label' => esc_html__( 'FunFact Title', 'axil-elements'),
		        'tab' => Controls_Manager::TAB_STYLE,
		    ]
		);
		$this->add_control(
		    'axil_casestudy_title_funfact_title_color',
		    [
		        'label' => esc_html__('Color', 'axil-elements'),
		        'type' => Controls_Manager::COLOR,
		        'selectors' => [
		            '{{WRAPPER}} .case-study-counterup .counter-title' => 'color: {{VALUE}} !important;',
		        ],
		    ]
		);
		$this->add_group_control(
		    Group_Control_Typography::get_type(),
		    [
		        'name' => 'axil_casestudy_title_funfact_title_typography',
		        'label' => esc_html__('Typography', 'axil-elements'),
		        'selector' => '{{WRAPPER}} .case-study-counterup .counter-title',
		    ]
		);
		$this->add_responsive_control(
		    'axil_casestudy_title_funfact_title_padding',
		    [
		        'label' => esc_html__('Padding', 'axil-elements'),
		        'type' => Controls_Manager::DIMENSIONS,
		        'size_units' => ['px', '%', 'em'],
		        'selectors' => [
		            '{{WRAPPER}} .case-study-counterup .counter-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		        ],
		        'separator' => 'before',
		    ]
		);
		$this->add_responsive_control(
		    'axil_casestudy_title_funfact_title_margin',
		    [
		        'label' => esc_html__('Margin', 'axil-elements'),
		        'type' => Controls_Manager::DIMENSIONS,
		        'size_units' => ['px', '%', 'em'],
		        'selectors' => [
		            '{{WRAPPER}} .case-study-counterup .counter-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		        ],
		        'separator' => 'before',
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
                    'url' =>  $this->axil_get_img( 'casestudy/bubble-13.png' ),
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
                'label' => esc_html__('Shape 1','axil-elements'),
                'type'=>Controls_Manager::MEDIA,                    
                'default' => [
                   'url' =>  $this->axil_get_img( 'casestudy/bubble-14.png' ),
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
                'label' => esc_html__('Shape 1','axil-elements'),
                'type'=>Controls_Manager::MEDIA,                    
                'default' => [
                   'url' =>  $this->axil_get_img( 'casestudy/bubble-15.png' ),
                ],
                'dynamic' => [
                    'active' => true,
                ],
                 'condition' => array( 'shape_style_on' => array( 'yes' ) ), 
                    
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
		$attr = '';
		$btn = '';
		
        if ( !empty( $settings['casestudy_link']['url'] ) ) {
			$attr  = 'href="' . $settings['casestudy_link']['url'] . '"';
			$attr .= !empty( $settings['casestudy_link']['is_external'] ) ? ' target="_blank"' : '';
			$attr .= !empty( $settings['casestudy_link']['nofollow'] ) ? ' rel="nofollow"' : '';
			$title = '<a ' . $attr . '>' . $settings['title'] . '</a>';
		}
		if ( !empty( $settings['casestudy_link_text'] ) ) {
			$btn = '<a class="axil-btn btn-fill-primary btn-large" ' . $attr . '>' . $settings['casestudy_link_text'] . '</a>';
		}

        $shape1 =  $settings['shape1']['url'];
        $shape2 =  $settings['shape2']['url'];
        $shape3 =  $settings['shape3']['url'];
		?>
        <div class="case-study-featured-area">           
            <div class="row">
                <div class="col-lg-5">
                   
                    <div class="slick-slider slick-dot-nav featured-content" data-slick='{"infinite": true,"arrows": false, "dots": true, "slidesToShow": 1, "asNavFor": ".featured-thumbnail"}'>
                    <?php foreach ($settings['casestudy_list'] as $casestudy) { 

                        $attr = '';
                        $btn = '';                          

                        // Link
                        if ( '1' == $casestudy['casestudy_link_type']) {

                            if ( !empty( $casestudy['casestudy_link']['url'] ) ) {
                                $attr  = 'href="' . $casestudy['casestudy_link']['url'] . '"';
                                $attr .= !empty( $casestudy['casestudy_link']['is_external'] ) ? ' target="_blank"' : '';
                                $attr .= !empty( $casestudy['casestudy_link']['nofollow'] ) ? ' rel="nofollow"' : '';
                                $title = '<a ' . $attr . '>' . $casestudy['title'] . '</a>';
                            }
                            if ( !empty( $casestudy['casestudy_link_text'] ) ) {
                                $btn = '<a class="axil-btn btn-fill-primary btn-large" ' . $attr . '>' . $casestudy['casestudy_link_text'] . '</a>';
                            }
                        } elseif('2' == $casestudy['casestudy_link_type']) {

                            $attr  = 'href="' . get_permalink($casestudy['casestudy_page_link']) . '"';
                            $attr .= ' target="_blank"';
                            $attr .= ' rel="nofollow"';                        
                            $btn = '<a class="axil-btn btn-fill-primary btn-large" ' . $attr . '>' . $casestudy['casestudy_link_text'] . '</a>';

                        }else{
                             $attr  = 'href="' . get_permalink($casestudy['casestudy_single_page_link']) . '"';
                            $attr .= ' target="_blank"';
                            $attr .= ' rel="nofollow"';                        
                            $btn = '<a class="axil-btn btn-fill-primary btn-large" ' . $attr . '>' . $casestudy['casestudy_link_text'] . '</a>';
                        }
                        ?>
                        <div class="slick-slide">
                            <div class="case-study-featured">
                                <div class="section-heading heading-left">                                           
                                    <?php if (!empty($casestudy['pre_title'])) { ?>
                                    <span class="subtitle"><?php echo axil_kses_intermediate($casestudy['pre_title']); ?></span>
                                    <?php } ?>
                                    <h2 class="title"><?php echo axil_kses_intermediate($casestudy['title']); ?></h2>
                                    <p><?php echo axil_kses_intermediate($casestudy['desctiption']); ?></p>

                                    <?php echo axil_kses_intermediate( $btn );?>
                                    
                                </div>
                              <div class="case-study-counterup">
                                 
                                 <?php if (!empty($casestudy['casestudy_funfact_one_number']) || !empty($casestudy['casestudy_funfact_one_title'])) { ?>
                                    <div class="single-counterup">
                                         <?php if (!empty($casestudy['casestudy_funfact_one_number'])) { ?>
                                            <h2 class="count-number">
                                                <span class="number count" data-count="<?php echo esc_html($casestudy['casestudy_funfact_one_number']); ?>"><?php echo esc_html($casestudy['casestudy_funfact_one_number']); ?></span>
                                                <span class="symbol"><?php echo esc_attr($casestudy['casestudy_funfact_one_number_sup']) ?></span> 
                                            </h2>
                                        <?php } ?>
                                        <?php if (!empty($casestudy['casestudy_funfact_one_title'])) { ?>
                                            <span class="counter-title"><?php echo esc_html($casestudy['casestudy_funfact_one_title']); ?></span>
                                        <?php } ?>
                                    </div>
                                <?php } ?>

                                <?php if (!empty($casestudy['casestudy_funfact_two_number']) || !empty($casestudy['casestudy_funfact_two_title'])) { ?>
                                    <!-- Start Counterup -->
                                    <div class="single-counterup counterup-style-1">
                                        <?php if (!empty($casestudy['casestudy_funfact_two_number'])) { ?>
                                            <h2 class="count-number <?php echo esc_attr($casestudy['casestudy_funfact_two_number_sup']) ?> ">
                                                <span class="number count"  data-count="<?php echo esc_html($casestudy['casestudy_funfact_two_number']); ?>"><?php echo esc_html($casestudy['casestudy_funfact_two_number']); ?></span>
                                                <span class="symbol"><?php echo esc_attr($casestudy['casestudy_funfact_two_number_sup']) ?></span>
                                            </h2>
                                        <?php } ?>
                                        <?php if (!empty($casestudy['casestudy_funfact_two_title'])) { ?>
                                           <span class="counter-title"><?php echo esc_html($casestudy['casestudy_funfact_two_title']); ?></span>
                                        <?php } ?>
                                    </div>
                                    <!-- End Counterup -->
                                <?php } ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>                    
                </div>
            </div>
            <div class="col-lg-7">                
                <div class="slick-slider slick-dot-nav featured-thumbnail" data-slick='{"infinite": true,"arrows": false, "dots": false, "fade": true, "slidesToShow": 1, "asNavFor": ".featured-content"}'>
                    <?php foreach ($settings['casestudy_list'] as $casestudy) { ?>
                        <?php if (!empty($casestudy['casestudy_thumbnail'])) { ?>
                            <div class="slick-slide">
                                <div class="case-study-featured-thumb">
                                    <?php echo Group_Control_Image_Size::get_attachment_image_html($casestudy, 'axil-casestudy-thumb', 'casestudy_thumbnail'); ?>
                                </div>
                            </div>
                        <?php } ?>  
                     <?php } ?>                           
                </div>
            </div>           
        </div>
        <?php if( $settings['shape_style_on']  == 'yes' ){ ?>
            <ul class="list-unstyled shape-group-14">
                <?php if (!empty( $shape1 )) { ?>
                    <li class="shape shape-1"><img src="<?php echo esc_url( $shape1 );?>" alt="<?php echo axil_Elements_Helper::axil_get_image_alt( $settings['shape1']['id'] );?>"></li>
                <?php } ?>  
                <?php if (!empty( $shape2 )) { ?>
                    <li class="shape shape-2"><img src="<?php echo esc_url( $shape2 );?>" alt="<?php echo axil_Elements_Helper::axil_get_image_alt( $settings['shape2']['id'] );?>"></li>
                <?php } ?>  
                <?php if (!empty( $shape3 )) { ?>
                    <li class="shape shape-3"><img src="<?php echo esc_url( $shape3 );?>" alt="<?php echo axil_Elements_Helper::axil_get_image_alt( $settings['shape3']['id'] );?>"></li>
                <?php } ?>  
            </ul>
      <?php } ?>  
    </div>
 <?php	
    }

}