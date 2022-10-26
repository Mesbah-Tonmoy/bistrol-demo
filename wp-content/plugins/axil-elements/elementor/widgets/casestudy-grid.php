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
class axil_Case_Study extends Widget_Base {

  use \Elementor\AxilElementCommonFunctions;

 public function get_name() {
        return 'axil-casestudy';
    }    
    public function get_title() {
        return esc_html__( 'Dynamic - Case Study ', 'axil-elements' );
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
      

      $this->start_controls_section(
            'casestudy_project_section_layout',
            [
                'label' => esc_html__('Section Background', 'axil-elements'),
            ]
        );
          $this->add_control(
            'bdtype',
            [
                'label' => esc_html__( 'Background Type', 'axil-elements' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'bg-color-light',
               
                'options' => [
                    'bg-color-light-light'      => esc_html__( 'Light', 'axil-elements' ),                  
                    'bg-color-light'      => esc_html__( 'Gray', 'axil-elements' ),                  
                    'bg-color-ship-gray'        => esc_html__( 'Ship Gray', 'axil-elements' ),
                    'bg-color-dark'            => esc_html__( 'Dark', 'axil-elements' ),
                    
                ],
            ] 
        );
       
        $this->end_controls_section();
        $this->axil_section_title('casestudy_project', 'case study', 'h2', true, 'left');


        $this->axil_query_controls('casestudy_project_query', 'Case Study', 'axil-case-study', 'axil-case-studies-cat');


        $this->start_controls_section(
            'casestudy_project_extra',
            [
                'label' => esc_html__('Others Options', 'axil-elements'),
            ]
        );
          
       
        $this->axil_link_controls2('casestudy_project_button', 'Discover More Projects Button', 'Discover More casestudy', false, true);

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'casestudy_image_size',
                'default' => 'axil-project-vlg',
                'exclude' => ['custom'],
                'separator' => 'none',
            ]
        );

        $this->add_control(
            'casestudy_first_project_featured',
            [
                'label' => esc_html__('First Case Study Featured?', 'axil-elements'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'axil-elements'),
                'label_off' => esc_html__('No', 'axil-elements'),
                'return_value' => 'yes',
            ]
        );
        $this->add_control(
            'casestudy_first_project_featured_brand',
            [
                'label' => esc_html__('Upload Featured Case Study Brand Image', 'axil-elements'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' =>  $this->axil_get_img( 'casestudy/mobile-mockup.png' ),
                ],
                'condition' => [
                    'casestudy_first_project_featured' => 'yes'
                ]

            ]
        );
        
        $this->add_control(
            'casestudy_first_project_featured_brand_logo',
            [
                'label' => esc_html__('Upload Featured Case Study Brand Logo Image', 'axil-elements'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                   'url' =>  $this->axil_get_img( 'casestudy/godaddy.png' ),
                ],
                'condition' => [
                    'casestudy_first_project_featured' => 'yes'
                ]

            ]
        );

        $this->end_controls_section();

        $this->axil_basic_style_controls('casestudy_project_pre_title', 'Section - Tag Line', '.section-heading .subtitle');
        $this->axil_basic_style_controls('casestudy_project_title', 'Section - Title', '.section-heading .title');        
        $this->axil_basic_style_controls('casestudy_project_description', 'Section - Description', '.section-heading p');
        $this->axil_basic_style_controls('casestudy_project_box_title', 'Project Title', '.project-grid-style .content .title');        
        $this->axil_basic_style_controls('casestudy_project_box_category', 'Project Category', '.project-grid-style .content .subtitle');
       
        $this->axil_link_controls_style('casestudy_project_button_style', 'Discover More Button', '.more-project-btn .axil-btn.btn-fill-white', 'btn-size-md');

        $this->start_controls_section(
            'axil_responsive',
                [
                'label' => __( 'Custom Grid', 'axil-elements' ),
                ]
            );

            $this->add_control(
                'row_gap',
                [
                    'label' => __( 'Row Gap', 'axil-elements' ),
                    'type' => Controls_Manager::SELECT,
                    'options' => [
                        'row-45' => esc_html__( '45px', 'axil-elements' ),
                        'row-35'  => esc_html__( '35px', 'axil-elements' ),
                        'row-30'  => esc_html__( '30px', 'axil-elements' ),
                        'row-20'  => esc_html__( '20px', 'axil-elements' ),
                        'row-15'  => esc_html__( '15px', 'axil-elements' ),
                        'g-0'  => esc_html__( 'No gap', 'axil-elements' ),
                         
                        ],
                    'default' => 'row-45',
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
                    'default' => '12',
                ] 
            );          
        $this->end_controls_section();



       $this->start_controls_section(       
            'poster_shape10',
                [
                    'label' => esc_html__( 'Background Shapes', 'axil-elements' ),        
                    'condition' => array( 
                        'bdtype' => array( 'bg-color-ship-gray','bg-color-dark' ),
                       
                         ),  
                              
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
            'shape_10_1',
            [
                'label' => esc_html__('Shape 1','axil-elements'),
                'type'=>Controls_Manager::MEDIA,                    
                'default' => [
                    'url' =>  $this->axil_get_img( 'shape10/circle-1.png' ),
                ],
                'condition' => array( 'shape_style_on' => array( 'yes' ) ),
                'dynamic' => [
                    'active' => true,
                ],
                    
            ]
        );      
        $this->add_control(
            'shape_10_2',
            [
                'label' => esc_html__('Shape 2','axil-elements'),
                'type'=>Controls_Manager::MEDIA,                    
                'default' => [
                   'url' =>  $this->axil_get_img( 'shape10/line-3.png' ),
                ],
                'condition' => array( 'shape_style_on' => array( 'yes' ) ),
                'dynamic' => [
                    'active' => true,
                ],
                    
            ]
        );      
            $this->add_control(
                'shape_10_3',
                [
                    'label' => esc_html__('Shape 3','axil-elements'),
                    'type'=>Controls_Manager::MEDIA,                    
                    'default' => [
                       'url' =>  $this->axil_get_img( 'shape10/bubble-5.png' ),
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
		
		$template   = 'casestudy-grid-1'; 
    	return axil_Elements_Helper::axiltheme_element_template( $template, $settings );
		
	}
}