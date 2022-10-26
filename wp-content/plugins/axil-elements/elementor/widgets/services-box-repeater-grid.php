<?php
/**
 * @author  AxilTheme
 * @since   1.0
 * @version 1.0
 */

namespace axiltheme\abstrak_elements;

use Elementor\Plugin;
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
use Elementor\Repeater;
 

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class axil_services_box_repeater extends Widget_Base {
use \Elementor\AxilElementCommonFunctions;
 public function get_name() {
        return 'axil-services-box-repeater';
    }    
    public function get_title() {
        return __( 'Services Boxs Grid', 'axil-elements' );
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

    protected function register_controls() {
              

        $this->start_controls_section(
            'services_grid_layout',
            [
                'label' => esc_html__('Layout', 'axil-elements'),
            ]
        );
         $this->add_control(
            'layout',
            [
                'label' => esc_html__( 'Layout', 'axil-elements' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'layout1',
                'options' => [
                    'layout1'    => esc_html__( 'Layout 1', 'axil-elements' ),
                    'layout2'    => esc_html__( 'Layout 2', 'axil-elements' ),
                    'layout3'    => esc_html__( 'Layout 3', 'axil-elements' ),
                    'layout4'    => esc_html__( 'Layout 4', 'axil-elements' ), 
                    
                ],
            ] 
        );  
         $this->add_control(
            'bgstyle',
            [
                'label' => esc_html__( 'Background Style', 'axil-elements' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'dark',
                'condition' => array( 'layout' => array( 'layout1' ) ),
                'options' => [
                    'no'    => esc_html__( 'Light', 'axil-elements' ),
                    'dark'    => esc_html__( 'Dark', 'axil-elements' ),
                    'light'   => esc_html__( 'Grey', 'axil-elements' ),                  
                    
                ],
            ] 
        );

         $this->add_control(
            'seation_services_grid_title_on',
            [
                'label' => esc_html__( 'Section Title', 'axil-elements' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on'    => esc_html__( 'On', 'axil-elements' ),
                'label_off'   => esc_html__( 'Off', 'axil-elements' ),
                'default'     => 'yes',
                'separator'     => 'before',
               
            ]
        );   
        $this->add_control(
            'axil_services_grid_title_before',
            [
                'label' => __( 'Title before', 'axil-elements' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'placeholder' => __( 'Type your Description here.', 'axil-elements' ),    
                'default' => 'Section sub title here',     
                'condition' => array( 'seation_services_grid_title_on' => array( 'yes' ) ),       
            ]
        );
  
        $this->add_control(
            'axil_services_grid_title',
            [
                'label' => esc_html__('Title', 'axil-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Section Title',
                'placeholder' => esc_html__('Type Heading Text', 'axil-elements'),
                'label_block' => true,
                'condition' => array( 'seation_services_grid_title_on' => array( 'yes' ) ),
            ]
        );
        $this->add_control(
            'axil_sub_services_grid_title',
            [
                'label' => __( 'Description', 'axil-elements' ),
                'type' => Controls_Manager::TEXTAREA,
                'condition' => array( 'seation_services_grid_title_on' => array( 'yes' ) ),
                'placeholder' => __( 'Type your Description here.', 'axil-elements' ),    
                'default' => 'In vel varius turpis, non dictum sem. Aenean in efficitur ipsum, in egestas ipsum. Mauris in mi ac tellus.',            
            ]
        );    
        $this->add_control(
            'axil_services_grid_title_tag',
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
                'condition' => array( 'seation_services_grid_title_on' => array( 'yes' ) ),
                'toggle' => false,
            ]
        );
        
            $this->add_responsive_control(
                'axil_services_grid_align',
                [
                    'label' => esc_html__( 'Alignment', 'axil-elements' ),
                    'type' => Controls_Manager::CHOOSE,
                    'options' => [
                        'left' => [
                            'title' => esc_html__( 'Left', 'axil-elements' ),
                            'icon' => 'eicon-h-align-left',
                        ],
                        'center' => [
                            'title' => esc_html__( 'Center', 'axil-elements' ),
                            'icon' => 'eicon-h-align-center',
                        ],
                        'right' => [
                            'title' => esc_html__( 'Right', 'axil-elements' ),
                            'icon' => 'eicon-h-align-right',
                        ],
                    ],
                    'default' => 'left',
                    'condition' => array( 'seation_services_grid_title_on' => array( 'yes' ) ),
                    'toggle' => true,
                ]
            );
        

        $this->end_controls_section(); 






        $this->start_controls_section(
            'services_grid_repeater',
            [
                'label' => __( 'Services List', 'axil-elements' ),
            ]
        ); 
        $repeater = new Repeater();



        $repeater->add_control(
            'title',
            [
                'label' => __( 'Title', 'axil-elements' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __( 'Design', 'axil-elements' ),
                'placeholder' => __( 'Title', 'axil-elements' ),
            ]
        );
       $repeater->add_control(
            'subtitle',
            [
                'label' => __( 'Sub Title', 'axil-elements' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __( 'Simply drag and drop photos and videos into your workspace to automatically add them to your Collab Cloud library.', 'axil-elements' ),
                'placeholder' => __( 'Sub title', 'axil-elements' ),
            ]
        );
        $repeater->add_control(
                'icontype',
                [
                    'label' => __( 'Style', 'axil-elements' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => 'image',                  
                    'options' => [
                        'icon'  => esc_html__( 'Icon', 'axil-elements' ),
                        'image' => esc_html__( 'Custom Image', 'axil-elements' ),
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
                        'url' => $this->axil_get_img( 'services/icon-1-1.png' ),
                    ],
                    'dynamic' => [
                        'active' => true,
                    ],
                    'condition' => [
                            'icontype' =>'image',
                        ],      
                ]
            );
           $repeater->add_group_control(
                Group_Control_Image_Size::get_type(),
                [
                    'name' => 'image_size',
                    'default' => 'full',
                    'separator' => 'none',
                     'condition' => [
                                'icontype' =>'image',
                            ], 
                ]
            );
           $repeater->add_control(
                'detail_txt',
                [
                    'label'   => esc_html__( 'Detail Text', 'axil-elements' ),
                    'type'    => Controls_Manager::TEXT,
                    'default' => 'Find out more',
                     'separator'     => 'before',
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
                    'separator'     => 'before',
                   
                ]
            );    
 
        
        $repeater->add_control(
            'icon_color',
            [
                'label' => __( 'Icon Color(/layout3)', 'axil-elements' ),
                'type' => Controls_Manager::COLOR,  
                'default' => '',
                'separator'     => 'before',
                //'condition' => array( 'layout' => array( 'layout3' ) ),
                'selectors' => array(
                    '{{WRAPPER}} {{CURRENT_ITEM}} .thumbnail i' => 'color: {{VALUE}}',
                ),
            ]
        );  
         $repeater->add_control(
            'icon_bg_color',
            [
                'label' => __( 'Icon background (/layout3)', 'axil-elements' ),
                'type' => Controls_Manager::COLOR,  
                'default' => '',
               // 'condition' => array( 'layout' => array( 'layout3' ) ),
                'selectors' => array(
                    '{{WRAPPER}} {{CURRENT_ITEM}} .thumbnail' => 'background-color: {{VALUE}}',
                ),
            ]
        );


             $this->add_control(
                 'services_list',
                 [
                     'label' => esc_html__( 'Services List', 'axil-elements' ),
                     'type' => Controls_Manager::REPEATER,
                     'fields' =>  $repeater->get_controls(),
                     'default' => [
                         [
                             'title'            => esc_html__( 'Design', 'axil-elements' ),
                             'subtitle'         => esc_html__( 'We design professional looking yet simple Logo. Our designs are search engine and user friendly.', 'axil-elements' ),
                             'icon'             => [
                                                'value' => 'fas fa-check',
                                                'library' => 'fa-solid', ],
                            'image'         => ['url' => $this->axil_get_img( 'services/icon-1-1.png' ), ],
                            'detail_txt'   => esc_html__( 'Find out more', 'axil-elements' ),
                         ], 
                         [
                             'title'            => esc_html__( 'Development', 'axil-elements' ),
                             'subtitle'         => esc_html__( 'We design professional looking yet simple Logo. Our designs are search engine and user friendly.', 'axil-elements' ),
                             'icon'             => [
                                                'value' => 'fas fa-check',
                                                'library' => 'fa-solid', ],
                            'image'         => ['url' => $this->axil_get_img( 'services/icon-1-2.png' ), ],
                            'detail_txt'   => esc_html__( 'Find out more', 'axil-elements' ),
                         ], 
                         [
                             'title'            => esc_html__( 'Content strategy', 'axil-elements' ),
                             'subtitle'         => esc_html__( 'We design professional looking yet simple Logo. Our designs are search engine and user friendly.', 'axil-elements' ),
                             'icon'             => [
                                                'value' => 'fas fa-check',
                                                'library' => 'fa-solid', ],
                            'image'         => ['url' => $this->axil_get_img( 'services/icon-1-3.png' ), ],
                            'detail_txt'   => esc_html__( 'Find out more', 'axil-elements' ),
                         ], 
                         [
                             'title'            => esc_html__( 'Business', 'axil-elements' ),
                             'subtitle'         => esc_html__( 'We design professional looking yet simple Logo. Our designs are search engine and user friendly.', 'axil-elements' ),
                             'icon'             => [
                                                'value' => 'fas fa-check',
                                                'library' => 'fa-solid', ],
                            'image'         => ['url' => $this->axil_get_img( 'services/icon-1-4.png' ), ],
                            'detail_txt'   => esc_html__( 'Find out more', 'axil-elements' ),
                         ], 
                         [
                             'title'            => esc_html__( 'Technology', 'axil-elements' ),
                             'subtitle'         => esc_html__( 'We design professional looking yet simple Logo. Our designs are search engine and user friendly.', 'axil-elements' ),
                             'icon'             => [
                                                'value' => 'fas fa-check',
                                                'library' => 'fa-solid', ],
                            'image'         => ['url' => $this->axil_get_img( 'services/icon-1-5.png' ), ],
                            'detail_txt'   => esc_html__( 'Find out more', 'axil-elements' ),
                         ], 
                         [
                             'title'            => esc_html__( 'Online Marketing', 'axil-elements' ),
                             'subtitle'         => esc_html__( 'We design professional looking yet simple Logo. Our designs are search engine and user friendly.', 'axil-elements' ),
                             'icon'             => [
                                                'value' => 'fas fa-check',
                                                'library' => 'fa-solid', ],
                            'image'         => ['url' => $this->axil_get_img( 'services/icon-1-6.png' ), ],
                            'detail_txt'   => esc_html__( 'Find out more', 'axil-elements' ),
                         ], 

                     ],
                     'title_field' => '{{{ title }}}',
                 ]
             );

          $this->end_controls_section();
 


        $this->start_controls_section(
            'services_grid_extra',
            [
                'label' => esc_html__('Others Options', 'axil-elements'),
                 'condition' => array( 'layout' => array( 'layout3','layout4'  ) ),

            ]
        ); 
        
        $this->add_control(
            'btn_type',
            [
                'label' => esc_html__('Button Type','axil-elements'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'btn-fill-primary' => 'Fill Primary',
                    'btn-fill-white'   => 'Fill White',
                ],
                'default' => 'btn-fill-primary',
            ]
        );

        $this->add_control(
            'furltext',
            [
                'label' => esc_html__( 'Find out more Text', 'axil-elements' ),
                'type' => Controls_Manager::TEXT,
                'placeholder' => esc_html__( 'Type your title here...', 'axil-elements' ),
                'default' =>  esc_html__( 'Find out more', 'axil-elements' ),
            ]
        );  

         $this->add_control(
            'furl',
            [
                'label'   => esc_html__( 'Detail URL', 'axil-elements' ),
                'type'    => Controls_Manager::URL,
                'placeholder' => 'https://your-link.com',              
            ]
        );    
             
        $this->end_controls_section();


         $this->start_controls_section(
            'axil_responsive',
                [
                'label' => __( 'Custom Grid', 'axil-elements' ),
                 'condition' => array( 'layout' => array( 'layout1', 'layout3', 'layout4' ) ),
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
                    'default' => '12',
                ] 
            );          
        $this->end_controls_section();




        $this->start_controls_section(       
        'poster_shape7new',
            [
                'label' => esc_html__( 'Background Shapes', 'axil-elements' ),        
                'condition'   => array( 'layout' => 'layout3' ),              
                          
            ]
        );      
        $this->add_control(
            'shape_style_on2new',
            [
                'label' => __( 'Shape Condition', 'axil-elements' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on'    => __( 'On', 'axil-elements' ),
                'label_off'   => __( 'Off', 'axil-elements' ),
                'default'     => 'yes',
               
            ]
        );       
         $this->add_control(
            'shape_7_1new',
            [
                'label' => esc_html__('Shape 1','axil-elements'),
                'type'=>Controls_Manager::MEDIA,                    
                'default' => [
                    'url' =>  $this->axil_get_img( 'poster-banner/bubble-14.png ' ),
                ],
                'dynamic' => [
                    'active' => true,
                ],
                 'condition' => array( 'shape_style_on2new' => array( 'yes' ) ),
                    
            ]
        );      
        $this->add_control(
            'shape_7_2new',
            [
                'label' => esc_html__('Shape 2','axil-elements'),
                'type'=>Controls_Manager::MEDIA,                    
                'default' => [
                   'url' =>  $this->axil_get_img( 'poster-banner/line-7.png' ),
                ],
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => array( 'shape_style_on2new' => array( 'yes' ) ),
                    
            ]
        );             
    $this->end_controls_section(); 



        $this->start_controls_section(       
        'poster_shape7',
            [
                'label' => esc_html__( 'Background Shapes', 'axil-elements' ),        
                'condition'   => array( 'layout' => 'layout2' ),              
                          
            ]
        );      
        $this->add_control(
            'shape_style_on2',
            [
                'label' => __( 'Shape Condition', 'axil-elements' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on'    => __( 'On', 'axil-elements' ),
                'label_off'   => __( 'Off', 'axil-elements' ),
                'default'     => 'yes',
               
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
                'dynamic' => [
                    'active' => true,
                ],
                 'condition' => array( 'shape_style_on2' => array( 'yes' ) ),
                    
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
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => array( 'shape_style_on2' => array( 'yes' ) ),
                    
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
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => array( 'shape_style_on2' => array( 'yes' ) ),
                    
            ]
        );          
    $this->end_controls_section(); 

    $this->start_controls_section(       
        'poster_shape10',
            [
                'label' => esc_html__( 'Background Shapes', 'axil-elements' ),        
                'condition' => array( 'layout' => array( 'layout1' ) ),
                          
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
        'shape10_1',
        [
            'label' => esc_html__('Shape 1','axil-elements'),
            'type'=>Controls_Manager::MEDIA,                    
            'default' => [
                'url' =>  $this->axil_get_img( 'shape10/line-9.png' ),
            ],
            'condition' => array( 'shape_style_on' => array( 'yes' ) ),
            'dynamic' => [
                'active' => true,
            ],
                
        ]
    );      
        $this->add_control(
            'shape10_2',
            [
                'label' => esc_html__('Shape 2','axil-elements'),
                'type'=>Controls_Manager::MEDIA,                    
                'default' => [
                   'url' =>  $this->axil_get_img( 'shape10/bubble-42.png' ),
                ],
                'condition' => array( 'shape_style_on' => array( 'yes' ) ),
                'dynamic' => [
                    'active' => true,
                ],
                    
            ]
        );      
        $this->add_control(
            'shape10_3',
            [
                'label' => esc_html__('Shape 3','axil-elements'),
                'type'=>Controls_Manager::MEDIA,                    
                'default' => [
                   'url' =>  $this->axil_get_img( 'shape10/bubble-43.png' ),
                ],
                'condition' => array( 'shape_style_on' => array( 'yes' ) ),
                'dynamic' => [
                    'active' => true,
                ],
                    
            ]
        );  
        $this->end_controls_section(); 

        $this->axil_basic_style_controls('services_grid_pre_title', 'Section - Tag Line', '.section-heading .subtitle');
        $this->axil_basic_style_controls('services_grid_title', 'Section - Title', '.section-heading .title');        
        $this->axil_basic_style_controls('services_grid_description', 'Section - Description', '.section-heading p'); 
        $this->axil_basic_style_controls('services_grid_box_title', 'Services Title', '.services-grid  .content .title,.services-grid  .content .title a');    
        $this->axil_basic_style_controls('services_grid_box_category', 'Services Subtitle', '.services-grid  .content .item-subtitle');

  
    }
	protected function render() {
	$settings = $this->get_settings();	       
    $template   = 'services-box-repeater-grid-' . str_replace("layout", "", $settings['layout']);  
    return axil_Elements_Helper::axiltheme_element_template( $template, $settings ); 
	}
}