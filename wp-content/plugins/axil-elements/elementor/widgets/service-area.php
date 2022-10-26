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
class axil_services_grid extends Widget_Base {
  use \Elementor\AxilElementCommonFunctions;
    public function get_name() {
        return 'axil-services-grid';
    }    
    public function get_title() {
        return __('Dynamic - Services Grid', 'axil-elements' );
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
                'label' => esc_html__( 'Background Style', 'axil-elements' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'layout1',
                'options' => [
                    'layout1'    => esc_html__( 'Layout 1', 'axil-elements' ),
                    'layout2'    => esc_html__( 'Layout 2', 'axil-elements' ),
                                      
                    
                ],
            ] 
        );
       
       
        $this->end_controls_section();

        $this->axil_section_title('services_grid', 'Section Title', 'h2', true, 'left');
        $this->axil_query_controls('services_grid_query', 'Services', 'axil_services', 'axil_services_category');
        $this->start_controls_section(
            'services_grid_extra',
            [
                'label' => esc_html__('Others Options', 'axil-elements'),
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
            'urltext',
            [
                'label' => esc_html__( 'Find out more Text', 'axil-elements' ),
                'type' => Controls_Manager::TEXT,
                'placeholder' => esc_html__( 'Type your title here...', 'axil-elements' ),
                'default' =>  esc_html__( 'Find out more', 'axil-elements' ),
            ]
        );  
        $this->add_control(
            'active_detailurl',
            [
                'label' => __( 'Active Custom link Condition', 'axil-elements' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on'    => __( 'On', 'axil-elements' ),
                'label_off'   => __( 'Off', 'axil-elements' ),
                'default'     => 'no',
               
            ]
        );       

       $this->add_control(
            'detailurl',
            [
                'label'   => esc_html__( 'Detail URL', 'axil-elements' ),
                'type'    => Controls_Manager::URL,
                'placeholder' => 'https://your-link.com',    
                 'condition' => array( 'active_detailurl' => array( 'yes' ) ),          
            ]
        );   

        $this->end_controls_section();

        $this->axil_basic_style_controls('services_grid_pre_title', 'Section - Tag Line', '.section-heading .subtitle');
        $this->axil_basic_style_controls('services_grid_title', 'Section - Title', '.section-heading .title');        
        $this->axil_basic_style_controls('services_grid_description', 'Section - Description', '.section-heading p');

        $this->axil_basic_style_controls('services_grid_box_title', 'Services Title', '.project-grid-style .content .title');        
        $this->axil_basic_style_controls('services_grid_box_category', 'Services Category', '.project-grid-style .content .subtitle');
        $this->start_controls_section(
            'axil_responsive',
                [
                'label' => __( 'Custom Grid', 'axil-elements' ),
                 'condition' => array( 'layout' => array( 'layout1' ) ),
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

}   


 protected function render() {
        $settings = $this->get_settings(); 
    
        $template   = 'services-grid-' . str_replace("layout", "", $settings['layout']);                 
        return axil_Elements_Helper::axiltheme_element_template( $template, $settings );

    }
}
