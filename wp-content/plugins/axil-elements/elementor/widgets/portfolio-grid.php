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
class Portfolio_Isotope extends Widget_Base {
 use \Elementor\AxilElementCommonFunctions;
 public function get_name() {
        return 'abstrak-portfolio-isotope';
    }    
    public function get_title() {
        return esc_html__( 'Portfolio', 'axil-elements' );
    }
    public function get_icon() {
        return 'eicon-gallery-grid';
    }
    public function get_categories() {
        return [ ABSTRAK_ELEMENTS_THEME_PREFIX . '-widgets' ];
    }
    public function axil_get_img($img)
    {
        $img = ABSTRAK_ELEMENTS_BASE_URL . 'assets/media/' . $img;
        return $img;
   }

	protected function register_controls() {
      
		$category_dropdown = array();
		$terms = get_terms( array( 'taxonomy' => "axil-projects-category", 'fields' => 'id=>name' ) );	
		foreach ( $terms as $id => $name ) {
			$category_dropdown[$id] = $name;
		}
        
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
                'default'     => 'no',
                'separator'     => 'after',
               
            ]
        );
        $this->add_control(
            'style',
            [
                'label' => esc_html__( 'Style', 'axil-elements' ),
                'type' => Controls_Manager::SELECT,
                'default' => '1',
                'condition' => array( 'seation_title_on' => array( 'yes' ) ),
                'options' => [
                    '1'   => esc_html__( 'Style One', 'axil-elements' ),
                    '2'   => esc_html__( 'Style Two', 'axil-elements' ),                  
                    
                ],
            ] 
        );

       $this->add_control(
            'heading_color',
            [
                'label' => esc_html__( 'Heading Color', 'axil-elements' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'Light',
                'condition' => array( 'seation_title_on' => array( 'yes' ) ),
                'options' => [
                    'light'   => esc_html__( 'Light', 'axil-elements' ),
                    'dark'   => esc_html__( 'Dark', 'axil-elements' ),                  
                    
                ],
            ] 
        );
      
       
        $this->add_responsive_control(
            'title_align',
            [
                'label'   => esc_html__( 'Text Alignment', 'axil-elements' ),
                'type'    => Controls_Manager::CHOOSE,  
                    'condition' => array( 'seation_title_on' => array( 'yes' ) ),              
                'options' => [
                    'left'    => [
                        'title' => esc_html__( 'Left', 'axil-elements' ),
                        'icon'  => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__( 'Center', 'axil-elements' ),
                        'icon'  => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__( 'Right', 'axil-elements' ),
                        'icon'  => 'fa fa-align-right',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .section-heading'   => 'text-align: {{VALUE}}',
                    
                ],
                'default' => 'left',
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
                'type' => Controls_Manager::TEXTAREA,
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

        $this->axil_query_controls('project_query', 'Project', 'axil-projects', 'axil-projects-category');
			

		//$this->axil_query_controls('casestudy_project_query', 'Case Study', 'axil-case-study', 'axil-case-studies-cat');
		

		$this->start_controls_section(
            'services_box_title',
            [
                'label' => __( 'Layout ', 'axil-elements' ),
            ]
        );


		$this->add_control(
		    'layout',
		    [
		        'label' => __( 'Layout', 'axil-elements' ),
		        'type' => Controls_Manager::SELECT,
		        'default' => '1',
		        'options' => [
		            'layout1'   => __( 'Style One', 'axil-elements' ),
		            'layout2'   => __( 'Style Two', 'axil-elements' ),
		        ],
		    ] 
		);			  

		
			$this->add_control(
			    'filter',
			    [
			        'label'   => __( 'Filter Tabs', 'axil-elements' ),
			        'type'    => Controls_Manager::SWITCHER,
			        'default' => 'yes',
			        'return_value' => 'yes',
			       'description' => esc_html__( 'Filter Tabs. Default: On', 'axil-elements' ),   
			               
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
                    'default' => '6',
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
                    'default' => '6',
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
                    'default' => '1',
                ] 
            );			
		$this->end_controls_section();

			 $this->start_controls_section(
	            'portfolio_style_section',
	            [
	                'label' => __( 'Portfolio Style', 'axil-elements' ),
	                'tab' => Controls_Manager::TAB_STYLE,                
	            ]
	        );

	         $this->add_control(
	            'portfolio_style_on',
	            [
	                'label' => __( 'Customize', 'axil-elements' ),
	                'type' => Controls_Manager::SWITCHER,
	                'label_on'    => __( 'On', 'axil-elements' ),
	                'label_off'   => __( 'Off', 'axil-elements' ),
	                'default'     => 'no',               
	            ]
	        );   
	         $this->add_control(
			    'hr-1',
			    [		        
			        'type' 			=> Controls_Manager::DIVIDER,		       
			        'description' 	=> __( 'Write -1 to show all', 'axil-elements' ),		
			        'style' => 'thick',							        
			    ]

			);
	          $this->add_control(
	            'title_color',
	            [
	                'label' => __( 'Title Color', 'axil-elements' ),
	                'type' => Controls_Manager::COLOR,  
	                'default' => '#7b8095',
	                'condition' => array( 'portfolio_style_on' => array( 'yes' ) ),
	                'selectors' => array(
	                    '{{WRAPPER}} .title-custom a' => 'color: {{VALUE}}',                    
	                ),
	            ]
	        ); 
	          $this->add_control(
	            'title_hover_color',
	            [
	                'label' => __( 'Title Hover Color', 'axil-elements' ),
	                'type' => Controls_Manager::COLOR,  
	                'default' => '#7b8095',
	                'condition' => array( 'portfolio_style_on' => array( 'yes' ) ),
	                'selectors' => array(
	                    '{{WRAPPER}} .title-custom a:hover' => 'color: {{VALUE}}',                    
	                ),
	            ]
	        );
			$this->add_group_control(
			    Group_Control_Typography::get_type(),
			    [
			        'name' => 'title_font_size',
			        'label' => __( 'Typography', 'axil-elements' ),
			         'condition' => array( 'portfolio_style_on' => array( 'yes' ) ),
			        'selector' => '{{WRAPPER}} .title-custom a',
			    ]
			); 
			$this->add_control(
			    'hr-2',
			    [		        
			        'type' 			=> Controls_Manager::DIVIDER,		       
			        'description' 	=> __( 'Write -1 to show all', 'axil-elements' ),		
			        'style' => 'thick',							        
			    ]

			);
			$this->add_control(
	            'cats_color',
	            [
	                'label' => __( 'Category Color', 'axil-elements' ),
	                'type' => Controls_Manager::COLOR,  
	                'default' => '#7b8095',
	                'condition' => array( 'portfolio_style_on' => array( 'yes' ) ),
	                'selectors' => array(
	                    '{{WRAPPER}} .cats-custom a' => 'color: {{VALUE}}',                    
	                ),
	            ]
	        );
	        $this->add_control(
	            'cats_hover_color',
	            [
	                'label' => __( 'Category Hover Color', 'axil-elements' ),
	                'type' => Controls_Manager::COLOR,  
	                'default' => '#7b8095',
	                'condition' => array( 'portfolio_style_on' => array( 'yes' ) ),
	                'selectors' => array(
	                    '{{WRAPPER}} .cats-custom a:hover' => 'color: {{VALUE}}',                    
	                ),
	            ]
	        );
			$this->add_group_control(
			    Group_Control_Typography::get_type(),
			    [
			        'name' => 'cats_font_size',
			        'label' => __( 'Typography', 'axil-elements' ),
			         'condition' => array( 'portfolio_style_on' => array( 'yes' ) ),
			        'selector' => '{{WRAPPER}} .cats-custom a',
			    ]
			);

        $this->end_controls_section();
        $this->start_controls_section(       
	    'poster_shape7',
	        [
	            'label' => esc_html__( 'Background Shapes One', 'axil-elements' ),        
	               
	                      
	        ]
	    );
        $this->add_control(
            'shape_style_on',
            [
                'label' => __( 'Shape Condition', 'axil-elements' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on'    => __( 'On', 'axil-elements' ),
                'label_off'   => __( 'Off', 'axil-elements' ),
                'default'     => 'no',
               
            ]
        );   
      $this->add_control(
        'shape_7_1',
        [
            'label' => esc_html__('Shape 1','axil-elements'),
            'type'=>Controls_Manager::MEDIA,                    
            'default' => [
                'url' =>  $this->axil_get_img( 'shape7/circle-2.png' ),
            ],
            'condition' => array( 'shape_style_on' => array( 'yes' ) ),
            'dynamic' => [
                'active' => true,
            ],
                
        ]
    );      
    $this->add_control(
        'shape_7_2',
        [
            'label' => esc_html__('Shape 2','axil-elements'),
            'type'=>Controls_Manager::MEDIA,                    
            'default' => [
               'url' =>  $this->axil_get_img( 'shape7/bubble-2.png' ),
            ],
            'condition' => array( 'shape_style_on' => array( 'yes' ) ),
            'dynamic' => [
                'active' => true,
            ],
                
        ]
    );      
        $this->add_control(
            'shape_7_3',
            [
                'label' => esc_html__('Shape 3','axil-elements'),
                'type'=>Controls_Manager::MEDIA,                    
                'default' => [
                   'url' =>  $this->axil_get_img( 'shape7/bubble-1.png' ),
                ],
                'condition' => array( 'shape_style_on' => array( 'yes' ) ),
                'dynamic' => [
                    'active' => true,
                ],
                    
            ]
        );  
        
        $this->end_controls_section(); 
	} 

	private function isotope_load_scripts(){
		wp_enqueue_script('imagesloaded');
		wp_enqueue_script('isotope-pkgd');
	}

	protected function render() {
		$settings = $this->get_settings();		
		$this->isotope_load_scripts();
		$template   = 'portfolio-isotope-' . str_replace("layout", "", $settings['layout']); 
    	   return axil_Elements_Helper::axiltheme_element_template( $template, $settings );
		
	}
}