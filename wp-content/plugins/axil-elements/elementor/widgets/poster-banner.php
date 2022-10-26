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
 
use Elementor\Scheme_Color;
use Elementor\DATE_TIME;
use Elementor\SLIDER;
use Elementor\CHOOSE;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Poster_banner extends Widget_Base {
use \Elementor\AxilElementCommonFunctions;

 public function get_name() {
        return 'axil-poster-banner';
    }    
    public function get_title() {
        return esc_html__( 'Poster Banner', 'axil-elements' );
    }
    public function get_icon() {
        return 'eicon-banner';
    }
    public function get_categories() {
        return [ ABSTRAK_ELEMENTS_THEME_PREFIX . '-widgets' ];
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
	    
  public function axil_get_img($img)
    {
        $img = ABSTRAK_ELEMENTS_BASE_URL . 'assets/media/' . $img;
        return $img;
   }

    protected function register_controls() {
              
        $this->start_controls_section(
            'banner_layout',
            [
                'label' => esc_html__( 'General Content', 'axil-elements' ),
            ]
        );
        $this->add_control(
	        'style',
	        [
	            'label' => esc_html__( 'Layout', 'axil-elements' ),
	            'type' => Controls_Manager::SELECT,
	            'default' => '1',
	            'options' => [
	                '1' => esc_html__( 'Style 1', 'axil-elements' ),
					'2' => esc_html__( 'Style 2', 'axil-elements' ),			                 
					'3' => esc_html__( 'Style 3', 'axil-elements' ),			                 
					'4' => esc_html__( 'Style 4', 'axil-elements' ),			                 
                    '5' => esc_html__( 'Style 5', 'axil-elements' ),                             
                    '6' => esc_html__( 'Style 6', 'axil-elements' ),                             
                    '7' => esc_html__( 'Style 7', 'axil-elements' ),                             
								                 
						                 
	            ],
	        ] 
	    );    
         $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
                [
                    'name' => 'background',
                    'label' => __( 'Background', 'axil-elements' ),
                    'types' => [ 'classic', 'gradient' ],
                    'selector' => '{{WRAPPER}} .banner.banner-style-2, {{WRAPPER}} .banner.banner-style-7', 
                     'condition' => array( 'style' => array( '2','6' ) ),   
                                  
                ]
            ); 

        $this->add_control(
		    'title',
		    [
		        'label' => esc_html__( 'Title', 'axil-elements' ),
		        'type' => Controls_Manager::TEXTAREA,
		        'default' => esc_html__( 'Build stunning websites & apps.', 'axil-elements' ),
		        'placeholder' => esc_html__( 'Title', 'axil-elements' ),
		         'separator'     => 'before',
		    ]
		);

		$this->add_control(
		    'subtitle',
		    [
		        'label' => esc_html__( 'Before / Sub Title', 'axil-elements' ),
		        'type' => Controls_Manager::TEXTAREA,
		        'default' => esc_html__( 'Create live segments and target the right people for messages based on their behaviors.', 'axil-elements' ),
		        'placeholder' => esc_html__( 'Sub title', 'axil-elements' ),
		         'condition' => array( 'style' => array( '1','3','4','5','6','7' ) ),		
		    ]
		);

        
        $this->add_control(
            'btn_link_text',
            [
                'label' => esc_html__('Link Text','axil-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Read Case Study',
                'title' => esc_html__('Enter button text','axil-elements'),
                 'separator'     => 'before',
            ]
        );
        $this->add_control(
            'shape_btn_icon',
            [
                'label' => __( 'Button Icon', 'axil-elements' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on'    => __( 'On', 'axil-elements' ),
                'label_off'   => __( 'Off', 'axil-elements' ),
                'default'     => 'no',
               
            ]
        );
       $this->add_control(
            'btn_link_type',
            [
                'label' => esc_html__('Link Type','axil-elements'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    '1' => 'Custom Link',
                    '2' => 'Internal Page',
                ],
                'default' => '1',
            ]
        );
       $this->add_control(
            'btn_link',
            [
                'label' => esc_html__('Link link','axil-elements'),
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
                    'btn_link_type' => '1'
                ]
            ]
        );
       $this->add_control(
            'btn_page_link',
            [
                'label' => esc_html__('Select Link Page','axil-elements'),
                'type' => Controls_Manager::SELECT2,
                'label_block' => true,
                'options' =>  $this-> axil_get_all_pages(),
                'condition' => [
                    'btn_link_type' => '2'
                ]
            ]
        );  
 
		 $this->add_control(
            'btn_link_text2',
            [
                'label' => esc_html__('Link Text','axil-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => 'About Me',
                 'separator'     => 'before',
                'title' => esc_html__('Enter button text','axil-elements'),
                'condition' => [
                    'style' => '3',
                    
                    
                ]
            ]
        );

       $this->add_control(
            'btn_link_type2',
            [
                'label' => esc_html__('Link Type','axil-elements'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    '1' => 'Custom Link',
                    '2' => 'Internal Page',
                ],
                'default' => '1',
                 
            ]
        );
       $this->add_control(
            'btn_link2',
            [
                'label' => esc_html__('Link link','axil-elements'),
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
                    'btn_link_type2' => '1',
                    'style' => '3'
                ]
            ]
        );
       $this->add_control(
            'btn_page_link2',
            [
                'label' => esc_html__('Select Link Page','axil-elements'),
                'type' => Controls_Manager::SELECT2,
                'label_block' => true,
                'options' =>  $this-> axil_get_all_pages(),
                'condition' => [
                    'btn_link_type2' => '2',
                    'style' => '3'
                ]
            ]
        );   

		$this->add_control(
		    'banner_thumbnail',
		    [
		        'label' => esc_html__('Banner Thumbnail','axil-elements'),
		        'type'=>Controls_Manager::MEDIA,			
		         'condition' => array( 'style' => array( '1', '2', '4' ) ),		        
		        'default' => [
		            'url' =>  $this->axil_get_img( 'banner/laptop.png' ),
		        ],
		        'dynamic' => [
		            'active' => true,
		        ],
		            
		    ]
		);	
    $this->end_controls_section(); 
       
	$this->start_controls_section(		
		'poster_img4',
		    [
		        'label' => esc_html__( 'Poster Images', 'axil-elements' ),  	
		        'condition' => array( 'style' => array( '4', '5' ) ),		         
		                  
		    ]
		);    		
		$this->add_control(
		    'banner_img41',
		    [
		        'label' => esc_html__('Shape','axil-elements'),
		        'type'=>Controls_Manager::MEDIA,			        
		        'default' => [
		            'url' =>  $this->axil_get_img( 'poster-banner/banner-thumb-7.png' ),
		        ],
		        'dynamic' => [
		            'active' => true,
		        ],
		            
		    ]
		);			
	$this->end_controls_section();

    $this->start_controls_section(      
        'poster_shape5',
            [
                'label' => esc_html__( 'Poster Shapes', 'axil-elements' ),  
               'condition' => array( 'style' => array( '5' ) ),          
                          
            ]
        );          


        $this->add_control(
            'shape_style_on5',
            [
                'label' => __( 'Shape Condition', 'axil-elements' ),
               

                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => esc_html__('Yes', 'axil-elements'),
                'label_off'    => esc_html__('No', 'axil-elements'),
                'return_value' => 'yes',
                'separator'    => 'before',
                'default'      => 'yes'
            ]
        );   

        $this->add_control(
            'shape51',
            [
                'label' => esc_html__('Shape','axil-elements'),
                'type'=>Controls_Manager::MEDIA,                    
                'default' => [
                    'url' =>  $this->axil_get_img( 'poster-banner/5-1.png' ),
                ],
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => array( 'shape_style_on5' => array( 'yes' ) ),
                    
            ]
        );    

        $this->add_control(
            'shape52',
            [
                'label' => esc_html__('Shape','axil-elements'),
                'type'=>Controls_Manager::MEDIA,                    
                'default' => [
                    'url' =>  $this->axil_get_img( 'poster-banner/5-2.png' ),
                ],
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => array( 'shape_style_on5' => array( 'yes' ) ),
                    
            ]
        );   

        $this->add_control(
            'shape53',
            [
                'label' => esc_html__('Shape','axil-elements'),
                'type'=>Controls_Manager::MEDIA,                    
                'default' => [
                    'url' =>  $this->axil_get_img( 'poster-banner/5-3.png' ),
                ],
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => array( 'shape_style_on5' => array( 'yes' ) ),
                    
            ]
        );        
           
        
    $this->end_controls_section();  

    

	$this->start_controls_section(		
		'poster_shape4',
		    [
		        'label' => esc_html__( 'Poster Shapes', 'axil-elements' ),  
		       'condition' => array( 'style' => array( '4' ) ),	         
		                  
		    ]
		);    		


        $this->add_control(
            'shape_style_on4',
            [
                'label' => __( 'Shape Condition', 'axil-elements' ),
               

                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => esc_html__('Yes', 'axil-elements'),
                'label_off'    => esc_html__('No', 'axil-elements'),
                'return_value' => 'yes',
                'separator'    => 'before',
                'default'      => 'yes'
            ]
        );   
    	$this->add_control(
    	    'shape41',
        	    [
        	        'label' => esc_html__('Shape 1','axil-elements'),
        	        'type'=>Controls_Manager::MEDIA,			        
        	        'default' => [
        	            'url' =>  $this->axil_get_img( 'poster-banner/bubble-29.png' ),
        	        ],
        	        'dynamic' => [
        	            'active' => true,
        	        ],
        	        'condition' => array( 'shape_style_on4' => array( 'yes' ) ),
        	            
        	    ]
    		);		
    		$this->add_control(
    		    'shape42',
    		    [
    		        'label' => esc_html__('Shape 2','axil-elements'),
    		        'type'=>Controls_Manager::MEDIA,			        
    		        'default' => [
    		           'url' =>  $this->axil_get_img( 'poster-banner/line-7.png' ),
    		        ],
    		        'dynamic' => [
    		            'active' => true,
    		        ],
    		        'condition' => array( 'shape_style_on4' => array( 'yes' ) ),
    		            
    		    ]
    		);	
	$this->end_controls_section();  


 	$this->start_controls_section(
            'sec_option_list',
                [
                    'label' => esc_html__('Social List','axil-elements'),
                     'condition' => array( 'style' => array( '4' ) ),
                    
                ]
            );

         $this->add_control(
                'show_social',
                [
                    'label' => __( ' Show Social', 'axil-elements' ),
                    'type' => Controls_Manager::SWITCHER,
                    'label_on'    => __( 'On', 'axil-elements' ),
                    'label_off'   => __( 'Off', 'axil-elements' ),
                    'default'     => 'yes',
                   
                ]
            );

          $repeater = new Repeater(); 
          $repeater->add_control(
                'title',
                [
                    'label'   => esc_html__('Social List Title', 'axil-elements' ),           
                    'type'    => Controls_Manager::TEXT,
                    'default' => esc_html__('Developer.', 'axil-elements' ),
                ]
            );
           
            $repeater->add_control(
                    'icontype',
                    [
                        'label' => __( 'Icon Type', 'axil-elements' ),
                        'type' => Controls_Manager::SELECT,
                        'default' => 'quick',                   
                        'options' => [
                            'quick'  => esc_html__( 'Quick Set', 'axil-elements' ),
                            'icon'  => esc_html__( 'Icon', 'axil-elements' ),
                            'image' => esc_html__( 'Custom Image', 'axil-elements' ),
                        ],
                    ] 
                );


            $repeater->add_control(
                'quick',
                [
                    'label' => __( 'Quick Select', 'axil-elements' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => 'feather-facebook',
                    'condition' => [
                                'icontype' =>'quick',
                        ],  
                    'options' => [
                        'fab fa-facebook-f'      	 => 'Facebook',
                        'fab fa-twitter'      		 => 'Twitter',
                        'fab fa-linkedin-in'      	 => 'Linkedin',
                        'fab fa-youtube'      		 => 'Youtube',
                        'fab fa-instagram'     		 => 'Instagram',                   
                    ],
                ] 
            );
            $repeater->add_control(
                'icon',
                [
                    'label' => __( 'Icons', 'axil-elements' ),
                    'type' => Controls_Manager::ICONS,
                    'default' => [
                        'value' => 'fa fa-university',
                        'library' => 'solid',
                    ],
                    'condition' => [
                            'icontype' =>'icon',
                    ],      
                ]
            );

             $repeater->add_control(
                'image',
                [
                    'label' => __('Image','axil-elements'),
                    'type'=>Controls_Manager::MEDIA,
                    'default' => [
                        'url' => Utils::get_placeholder_image_src(),
                    ],
                    'dynamic' => [
                        'active' => true,
                    ],
                    'condition' => [
                        'icontype' =>'image',
                    ],      
                ]
            );            
               
            $repeater->add_control(
                'url',
                [
                    'label'   => esc_html__( 'Social URL', 'axil-elements' ),
                    'type'    => Controls_Manager::URL,
                    'placeholder' => 'https://your-link.com',              
                ]
            );   
            
       
            $this->add_control(
                'sc_option_list',
                [
                    'label' => esc_html__('Social List','axil-elements'),
                    'type' => Controls_Manager::REPEATER,
                    'fields' => $repeater->get_controls(),
                    'condition' => array( 'show_social' => array( 'yes' ) ),
                    'default' => [

                        [
                            'title' => esc_html__('facebook.','axil-elements'),                        
                            'quick' => 'feather-facebook',                        
                        ],
                            [
                            'title' => esc_html__('twitter','axil-elements'), 
                            'quick' => 'feather-twitter',  
                        ],
                        [                       
                            'title' => esc_html__('linkedin.','axil-elements'),    
                            'quick' => 'feather-linkedin',   
                        ],
                                               
                    ],
                    'title_field' => '{{{ title }}}',
                ]
            );
    $this->end_controls_section();

    $this->start_controls_section(		
		'poster_shape3',
		    [
		        'label' => esc_html__( 'Poster Shapes', 'axil-elements' ),  
		       'condition' => array( 'style' => array( '3' ) ),		         
		                  
		    ]
		);    		
       $this->add_control(
            'shape3_style_on',
            [
                'label' => esc_html__( 'Customize', 'axil-elements' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on'    => esc_html__( 'On', 'axil-elements' ),
                'label_off'   => esc_html__( 'Off', 'axil-elements' ),
                'default'     => 'yes',
               
            ]
        );
		$this->add_control(
		    'shape31',
		    [
		        'label' => esc_html__('Shape 1','axil-elements'),
		        'type'=>Controls_Manager::MEDIA,			        
		        'default' => [
		            'url' =>  $this->axil_get_img( 'poster-banner/bubble-32.png' ),
		        ],
		        'dynamic' => [
		            'active' => true,
		        ],
                'condition' => array( 'shape3_style_on' => array( 'yes' ) ),  
		            
		    ]
		);		
		$this->add_control(
		    'shape32',
		    [
		        'label' => esc_html__('Shape 2','axil-elements'),
		        'type'=>Controls_Manager::MEDIA,			        
		        'default' => [
		           'url' =>  $this->axil_get_img( 'poster-banner/bubble-33.png' ),
		        ],
		        'dynamic' => [
		            'active' => true,
		        ],
                 'condition' => array( 'shape3_style_on' => array( 'yes' ) ), 
		            
		    ]
		);		
		$this->add_control(
		    'shape33',
		    [
		        'label' => esc_html__('Shape 3','axil-elements'),
		        'type'=>Controls_Manager::MEDIA,			        
		        'default' => [
		           'url' =>  $this->axil_get_img( 'poster-banner/bubble-14.png"' ),
		        ],
		        'dynamic' => [
		            'active' => true,
		        ],
                 'condition' => array( 'shape3_style_on' => array( 'yes' ) ), 
		            
		    ]
		);		
		$this->add_control(
		    'shape34',
		    [
		        'label' => esc_html__('Shape 4','axil-elements'),
		        'type'=>Controls_Manager::MEDIA,			        
		        'default' => [
		           'url' =>  $this->axil_get_img( 'poster-banner/bubble-4.png"' ),
		        ],
		        'dynamic' => [
		            'active' => true,
		        ],
                 'condition' => array( 'shape3_style_on' => array( 'yes' ) ), 
		            
		    ]
		);		
		$this->add_control(
		    'shape35',
		    [
		        'label' => esc_html__('Shape 5','axil-elements'),
		        'type'=>Controls_Manager::MEDIA,			        
		        'default' => [
		           'url' =>  $this->axil_get_img( 'poster-banner/bubble-30.png"' ),
		        ],
		        'dynamic' => [
		            'active' => true,
		        ],
                 'condition' => array( 'shape3_style_on' => array( 'yes' ) ), 
		            
		    ]
		);		
		$this->add_control(
            'shape36',
            [
                'label' => esc_html__('Shape 6','axil-elements'),
                'type'=>Controls_Manager::MEDIA,                    
                'default' => [
                   'url' =>  $this->axil_get_img( 'poster-banner/bubble-31.png"' ),
                ],
                'dynamic' => [
                    'active' => true,
                ],
                 'condition' => array( 'shape3_style_on' => array( 'yes' ) ), 
                    
            ]
        );      
        
	$this->end_controls_section();    


    $this->start_controls_section(       
        'poster_shape6',
            [
                'label' => esc_html__( 'Poster Shapes', 'axil-elements' ),  
               'condition' => array( 'style' => array( '6' ) ),                 
                          
            ]
        );   



       $this->add_control(
            'shape6_style_on',
            [
                'label' => esc_html__( 'Customize', 'axil-elements' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on'    => esc_html__( 'On', 'axil-elements' ),
                'label_off'   => esc_html__( 'Off', 'axil-elements' ),
                'default'     => 'yes',
               
            ]
        );
        $this->add_control(
            'shape61',
            [
                'label' => esc_html__('Shape 1','axil-elements'),
                'type'=>Controls_Manager::MEDIA,                    
                'default' => [
                    'url' =>  $this->axil_get_img( 'poster-banner/61.png' ),
                ],
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => array( 'shape6_style_on' => array( 'yes' ) ),  
                    
            ]
        );      
        $this->add_control(
            'shape62',
            [
                'label' => esc_html__('Shape 2','axil-elements'),
                'type'=>Controls_Manager::MEDIA,                    
                'default' => [
                   'url' =>  $this->axil_get_img( 'poster-banner/62.png' ),
                ],
                'dynamic' => [
                    'active' => true,
                ],
                 'condition' => array( 'shape6_style_on' => array( 'yes' ) ), 
                    
            ]
        );      
        $this->add_control(
            'shape63',
            [
                'label' => esc_html__('Shape 3','axil-elements'),
                'type'=>Controls_Manager::MEDIA,                    
                'default' => [
                   'url' =>  $this->axil_get_img( 'poster-banner/63.png' ),
                ],
                'dynamic' => [
                    'active' => true,
                ],
                 'condition' => array( 'shape6_style_on' => array( 'yes' ) ), 
                    
            ]
        );      
        $this->add_control(
            'shape64',
            [
                'label' => esc_html__('Shape 4','axil-elements'),
                'type'=>Controls_Manager::MEDIA,                    
                'default' => [
                   'url' =>  $this->axil_get_img( 'poster-banner/64.png' ),
                ],
                'dynamic' => [
                    'active' => true,
                ],
                 'condition' => array( 'shape6_style_on' => array( 'yes' ) ), 
                    
            ]
        );      
        $this->add_control(
            'shape65',
            [
                'label' => esc_html__('Shape 5','axil-elements'),
                'type'=>Controls_Manager::MEDIA,                    
                'default' => [
                   'url' =>  $this->axil_get_img( 'poster-banner/65.png' ),
                ],
                'dynamic' => [
                    'active' => true,
                ],
                 'condition' => array( 'shape6_style_on' => array( 'yes' ) ), 
                    
            ]
        );      
        $this->add_control(
            'shape66',
            [
                'label' => esc_html__('Shape 6','axil-elements'),
                'type'=>Controls_Manager::MEDIA,                    
                'default' => [
                   'url' =>  $this->axil_get_img( 'poster-banner/66.png' ),
                ],
                'dynamic' => [
                    'active' => true,
                ],
                 'condition' => array( 'shape6_style_on' => array( 'yes' ) ), 
                    
            ]
        );    

        $this->add_control(
            'shape67',
            [
                'label' => esc_html__('Shape 7','axil-elements'),
                'type'=>Controls_Manager::MEDIA,                    
                'default' => [
                   'url' =>  $this->axil_get_img( 'poster-banner/67.png' ),
                ],
                'dynamic' => [
                    'active' => true,
                ],
                 'condition' => array( 'shape6_style_on' => array( 'yes' ) ), 
                    
            ]
        );      

         $this->add_control(
            'shape68',
            [
                'label' => esc_html__('Shape 8','axil-elements'),
                'type'=>Controls_Manager::MEDIA,                    
                'default' => [
                   'url' =>  $this->axil_get_img( 'poster-banner/68.png' ),
                ],
                'dynamic' => [
                    'active' => true,
                ],
                 'condition' => array( 'shape6_style_on' => array( 'yes' ) ), 
                    
            ]
        );      
        

         $this->add_control(
            'shape69',
            [
                'label' => esc_html__('Shape 9','axil-elements'),
                'type'=>Controls_Manager::MEDIA,                    
                'default' => [
                   'url' =>  $this->axil_get_img( 'poster-banner/69.png' ),
                ],
                'dynamic' => [
                    'active' => true,
                ],
                 'condition' => array( 'shape6_style_on' => array( 'yes' ) ), 
                    
            ]
        );      
        
         $this->add_control(
            'shape70',
            [
                'label' => esc_html__('Shape 10','axil-elements'),
                'type'=>Controls_Manager::MEDIA,                    
                'default' => [
                   'url' =>  $this->axil_get_img( 'poster-banner/72.png' ),
                ],
                'dynamic' => [
                    'active' => true,
                ],
                 'condition' => array( 'shape6_style_on' => array( 'yes' ) ), 
                    
            ]
        );     

         $this->add_control(
            'shape71',
            [
                'label' => esc_html__('Shape 11','axil-elements'),
                'type'=>Controls_Manager::MEDIA,                    
                'default' => [
                   'url' =>  $this->axil_get_img( 'poster-banner/new.png' ),
                ],
                'dynamic' => [
                    'active' => true,
                ],
                 'condition' => array( 'shape6_style_on' => array( 'yes' ) ), 
                    
            ]
        );      
        
    $this->end_controls_section();     



	$this->start_controls_section(		
    		'poster_img3',
    		    [
    		        'label' => esc_html__( 'Poster Images', 'axil-elements' ),  	
    		        'condition' => array( 'style' => array( '3'  ) ),		         
    		                  
    		    ]
    		);    		
         $this->add_control(
                'img3_style_on',
                [
                    'label' => esc_html__( 'Customize', 'axil-elements' ),
                    'type' => Controls_Manager::SWITCHER,
                    'label_on'    => esc_html__( 'On', 'axil-elements' ),
                    'label_off'   => esc_html__( 'Off', 'axil-elements' ),
                    'default'     => 'yes',
                   
                ]
            );
    		$this->add_control(
    		    'banner_img31',
    		    [
    		        'label' => esc_html__('Shape 1','axil-elements'),
    		        'type'=>Controls_Manager::MEDIA,			        
    		        'default' => [
    		            'url' =>  $this->axil_get_img( 'banner/banner-thumb-6.png' ),
    		        ],
    		        'dynamic' => [
    		            'active' => true,
    		        ],
                     'condition' => array( 'img3_style_on' => array( 'yes' ) ), 
    		            
    		    ]
    		);	
         
	$this->end_controls_section();


    $this->start_controls_section(      
            'poster_marque',
                [
                    'label' => esc_html__( 'Marque images', 'axil-elements' ),      
                    'condition' => array( 'style' => array( '3' ) ),                 
                              
                ]
            );          
         $this->add_control(
                'marque_style_on',
                [
                    'label' => esc_html__( 'Customize', 'axil-elements' ),
                    'type' => Controls_Manager::SWITCHER,
                    'label_on'    => esc_html__( 'On', 'axil-elements' ),
                    'label_off'   => esc_html__( 'Off', 'axil-elements' ),
                    'default'     => 'yes',
                   
                ]
            );
             
            $this->add_control(
                'banner_img32',
                [
                    'label' => esc_html__('Marque images','axil-elements'),
                    'type'=>Controls_Manager::MEDIA,                    
                    'default' => [
                        'url' =>  $this->axil_get_img( 'banner/designer-text.png' ),
                    ],
                    'dynamic' => [
                        'active' => true,
                    ],
                    'condition' => array( 'marque_style_on' => array( 'yes' ) ), 
                        
                ]
            );          
    $this->end_controls_section();



   $this->start_controls_section(		
		'poster_shape2',
		    [
		        'label' => esc_html__( 'Poster Shapes', 'axil-elements' ),  
		       'condition' => array( 'style' => array( '2' ) ),		         
		                  
		    ]
		);    	
        $this->add_control(
            'shape2_style_on',
            [
                'label' => esc_html__( 'Customize', 'axil-elements' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on'    => esc_html__( 'On', 'axil-elements' ),
                'label_off'   => esc_html__( 'Off', 'axil-elements' ),
                'default'     => 'yes',
               
            ]
        );
		$this->add_control(
		    'shape21',
		    [
		        'label' => esc_html__('Shape 1','axil-elements'),
		        'type'=>Controls_Manager::MEDIA,			        
		        'default' => [
		           'url' =>  $this->axil_get_img( 'poster-banner/banner-shape-1.png' ),
		        ],
		        'dynamic' => [
		            'active' => true,
		        ],
                 'condition' => array( 'shape2_style_on' => array( 'yes' ) ),   
		            
		    ]
		);			
		$this->add_control(
		    'shape22',
		    [
		        'label' => esc_html__('Shape 2','axil-elements'),
		        'type'=>Controls_Manager::MEDIA,			        
		        'default' => [
		           'url' =>  $this->axil_get_img( 'poster-banner/banner-shape-2.png' ),
		        ],
		        'dynamic' => [
		            'active' => true,
		        ],
                  'condition' => array( 'shape2_style_on' => array( 'yes' ) ),   
		            
		    ]
		);

		$this->add_control(
		    'shape23',
		    [
		        'label' => esc_html__('Shape 3','axil-elements'),
		        'type'=>Controls_Manager::MEDIA,			        
		        'default' => [
		            'url' =>  $this->axil_get_img( 'poster-banner/bubble-16.png' ),
		        ],
		        'dynamic' => [
		            'active' => true,
		        ],
                  'condition' => array( 'shape2_style_on' => array( 'yes' ) ),   
		            
		    ]
		);		

		$this->add_control(
		    'shape24',
		    [
		        'label' => esc_html__('Shape 4','axil-elements'),
		        'type'=>Controls_Manager::MEDIA,			        
		        'default' => [
		           'url' =>  $this->axil_get_img( 'poster-banner/bubble-15.png' ),
		        ],
		        'dynamic' => [
		            'active' => true,
		        ],
                  'condition' => array( 'shape2_style_on' => array( 'yes' ) ),   
		            
		    ]
		);		
		$this->add_control(
		    'shape25',
		    [
		        'label' => esc_html__('Shape 5','axil-elements'),
		        'type'=>Controls_Manager::MEDIA,			        
		        'default' => [
		           'url' =>  $this->axil_get_img( 'poster-banner/bubble-14.png' ),
		        ],
		        'dynamic' => [
		            'active' => true,
		        ],
                  'condition' => array( 'shape2_style_on' => array( 'yes' ) ),   
		            
		    ]
		); 
        $this->add_control(
		    'shape26',
		    [
		        'label' => esc_html__('Shape 6','axil-elements'),
		        'type'=>Controls_Manager::MEDIA,			        
		        'default' => [
		           'url' =>  $this->axil_get_img( 'poster-banner/bubble-16.png' ),
		        ],
		        'dynamic' => [
		            'active' => true,
		        ],
                  'condition' => array( 'shape2_style_on' => array( 'yes' ) ),   
		            
		    ]
		); 
          $this->add_control(
            'shape27',
            [
                'label' => esc_html__('Shape 7','axil-elements'),
                'type'=>Controls_Manager::MEDIA,                    
                'default' => [
                   'url' =>  $this->axil_get_img( 'poster-banner/bubble-26.png' ),
                ],
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => array( 'shape2_style_on' => array( 'yes' ) ),
                    
            ]
        ); 
    $this->end_controls_section();     

    $this->start_controls_section(     
        'poster_img',
            [
                'label' => esc_html__( 'Poster Images', 'axil-elements' ),      
                'condition' => array( 'style' => array( '1','7' ) ),                 
                          
            ]
        );    
         $this->add_control(
                'img1_style_on',
                [
                    'label' => esc_html__( 'Customize', 'axil-elements' ),
                    'type' => Controls_Manager::SWITCHER,
                    'label_on'    => esc_html__( 'On', 'axil-elements' ),
                    'label_off'   => esc_html__( 'Off', 'axil-elements' ),
                    'default'     => 'yes',

                   
                ]
            );      
         
        $this->add_control(
            'banner_img1',
            [
                'label' => esc_html__('Shape 1','axil-elements'),
                'type'=>Controls_Manager::MEDIA,            
                 'condition' => array( 'img1_style_on' => array( 'yes' ) ),        
                'default' => [
                    'url' =>  $this->axil_get_img( 'poster-banner/window.png' ),
                ],
                'dynamic' => [
                    'active' => true,
                ],
                    
            ]
        );      
        $this->add_control(
            'banner_img2',
            [
                'label' => esc_html__('Shape 1','axil-elements'),
                'type'=>Controls_Manager::MEDIA,                    
                'default' => [
                   'url' =>  $this->axil_get_img( 'poster-banner/laptop-poses.png' ),
                ],
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => array( 'img1_style_on' => array( 'yes' ) ),
                    
            ]
        );      
        $this->add_control(
            'banner_img3',
            [
                'label' => esc_html__('Shape 1','axil-elements'),
                'type'=>Controls_Manager::MEDIA,                    
                'default' => [
                   'url' =>  $this->axil_get_img( 'poster-banner/chat-group.png' ),
                ],
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => array( 'img1_style_on' => array( 'yes' ) ),
                    
            ]
        ); 
    $this->end_controls_section();



	   $this->start_controls_section(		
		'poster_shape',
		    [
		        'label' => esc_html__( 'Poster Shapes', 'axil-elements' ),  
		       'condition' => array( 'style' => array( '1','7' ) ),		         
		                  
		    ]
		);    		
        $this->add_control(
                'shape1_style_on',
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
                'condition' => array( 'shape1_style_on' => array( 'yes' ) ),	        
		        'default' => [
		            'url' =>  $this->axil_get_img( 'poster-banner/bubble-39.png' ),
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
                'condition' => array( 'shape1_style_on' => array( 'yes' ) ),		        
		        'default' => [
		           'url' =>  $this->axil_get_img( 'poster-banner/bubble-38.png' ),
		        ],
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
                'condition' => array( 'shape1_style_on' => array( 'yes' ) ),		        
		        'default' => [
		           'url' =>  $this->axil_get_img( 'poster-banner/bubble-14.png' ),
		        ],
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
                'condition' => array( 'shape1_style_on' => array( 'yes' ) ),              
                'default' => [
                   'url' =>  $this->axil_get_img( 'poster-banner/bubble-14.png' ),
                ],
                'dynamic' => [
                    'active' => true,
                ],
                    
            ]
        );      
        $this->add_control(
            'shape5',
            [
                'label' => esc_html__('Shape 5','axil-elements'),
                'type'=>Controls_Manager::MEDIA,   
                'condition' => array( 'shape1_style_on' => array( 'yes' ) ),                 
                'default' => [
                   'url' =>  $this->axil_get_img( 'poster-banner/bubble-14.png' ),
                ],
                'dynamic' => [
                    'active' => true,
                ],
                    
            ]
        ); 

         $this->add_control(
            'shape6',
            [
                'label' => esc_html__('Shape 6','axil-elements'),
                'type'=>Controls_Manager::MEDIA,      
                'condition' => array( 'shape1_style_on' => array( 'yes' ) ),              
                'default' => [
                   'url' =>  $this->axil_get_img( 'poster-banner/bubble-40.png' ),
                ],
                'dynamic' => [
                    'active' => true,
                ],
                    
            ]
        );      
        $this->add_control(
            'shape7',
            [
                'label' => esc_html__('Shape 7','axil-elements'),
                'type'=>Controls_Manager::MEDIA,   
                'condition' => array( 'shape1_style_on' => array( 'yes' ) ),                 
                'default' => [
                   'url' =>  $this->axil_get_img( 'poster-banner/bubble-41.png' ),
                ],
                'dynamic' => [
                    'active' => true,
                ],
                    
            ]
        ); 

	$this->end_controls_section();

 

    $this->start_controls_section(
            'sec_style_color',
            [
                'label' => esc_html__( 'Color', 'axil-elements' ),
                'tab' => Controls_Manager::TAB_STYLE,   
            ]
        );

		$this->add_control(
            'title_color',
            [
                'label' => esc_html__( 'Title Color', 'axil-elements' ),
                'type' => Controls_Manager::COLOR,      
                
				'selectors' => array( 
					'{{WRAPPER}} .banner .banner-content .title' => 'color: {{VALUE}} !important',
					
				),                                  
                
            ]
        );

		$this->add_control(
            'subtitle_color',
            [
                'label' => esc_html__( 'Subtitle Color', 'axil-elements' ),
                'type' => Controls_Manager::COLOR,   
				'selectors' => array( 
					'{{WRAPPER}} .banner .banner-content .subtitle' => 'color: {{VALUE}}' ,
							
					),                                
             
            ]
        );		
		
    $this->end_controls_section();   

    $this->start_controls_section(
            'sec_typography_type',
            [
                'label' => esc_html__( 'Title Typography', 'axil-elements' ),
                'tab' => Controls_Manager::TAB_STYLE,   
            ]
        );


	$this->add_group_control(
		Group_Control_Typography::get_type(),
			[
			    'name' => 'title_typo',
			    'label' => esc_html__( 'Typography', 'axil-elements' ),  
			     'devices' => [ 'desktop', 'tablet', 'mobile' ],	
			   'selector' => '{{WRAPPER}} .banner .banner-content .title',
			]
		);

	$this->add_responsive_control(
			'title_typo_margin',
				[
				    'label' => esc_html__( 'Title Margin', 'axil-elements' ),
				    'type' => Controls_Manager::DIMENSIONS,
				    'size_units' => [ 'px', '%', 'em' ],
				    'devices' => [ 'desktop', 'tablet', 'mobile' ],					    
				    'selectors' => [
				        '{{WRAPPER}} .banner.banner-style-1 .banner-content .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				        
				    ],
				]
			);


	$this->add_group_control(
		Group_Control_Typography::get_type(),
			[
			    'name' => 'subtitle_typo',
			    'label' => esc_html__( 'Subtitle Typography', 'axil-elements' ),  
			     'devices' => [ 'desktop', 'tablet', 'mobile' ],	
			   'label'    => esc_html__( 'Subtitle', 'axil-elements' ),
				'selector' => '{{WRAPPER}} .banner .banner-content .subtitle',
			]
		);

	$this->add_responsive_control(
			'subtitle_typo_margin',
				[
				    'label' => esc_html__( 'Subtitle Margin', 'axil-elements' ),
				    'type' => Controls_Manager::DIMENSIONS,
				    'size_units' => [ 'px', '%', 'em' ],
				    'devices' => [ 'desktop', 'tablet', 'mobile' ],					    
				    'selectors' => [
				        '{{WRAPPER}} .banner .banner-content .subtitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				        
				    ],
				]
			);

	$this->end_controls_section(); 
    $this->axil_link_controls_style('poster_banner_button_style', 'Discover More Button', '.banner .banner-content .axil-btn,.banner .banner-content .axil-btn2', 'btn-large');  
 
     $this->start_controls_section(
            'sec_btn_color_shadow',
            [
                'label' => esc_html__( 'Button Box Shadow', 'axil-elements' ),
                'tab' => Controls_Manager::TAB_STYLE,   
            ]
        );

      $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'followers_icon_color_shadow',
                'label' => esc_html__( 'Box Shadow', 'axil-elements' ),
                'selector' => '{{WRAPPER}} .banner .banner-content .axil-btn, {{WRAPPER}} .banner .banner-content .axil-btn2',
            ]
        ); 

    }

	protected function render() {
    	$settings = $this->get_settings();  
    	$template   = 'poster-banner-' . str_replace("style", "", $settings['style']); 
    	return axil_Elements_Helper::axiltheme_element_template( $template, $settings );

	}
}

