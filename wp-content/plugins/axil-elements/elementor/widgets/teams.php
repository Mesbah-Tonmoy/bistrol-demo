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
use Elementor\Group_Control_Image_Size;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
class Axil_Team_Grid extends Widget_Base {
use \Elementor\AxilElementCommonFunctions;
    public function get_name() {
        return 'axil-team-grid';
    }    
    public function get_title() {
        return __('Team Grid', 'axil-elements' );
    }
    public function get_icon() {
        return 'eicon-person';
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
        $terms  = get_terms( array( 'taxonomy' => "axil_team_category", 'fields' => 'id=>name' ) );
        $category_dropdown = array( '0' => esc_html__( 'All Categories', 'axil-elements' ) );

        foreach ( $terms as $id => $name ) {
            $category_dropdown[$id] = $name; 

        }    

        $this->axil_section_title('team_section', 'Section Title', 'h2', true, 'center');        
        $this->axil_basic_style_controls('team_title_pre_title', 'Tag Line', '.section-title span.subtitle');
        $this->axil_basic_style_controls('team_title_title', 'Title', '.section-heading .title');
        $this->axil_basic_style_controls('team_title_description', 'Description', '.section-heading p');

        $this->start_controls_section(
         'sec_query',
                [
                    'label' => __( 'Query', 'axil-elements' ),
                ]
            );
           
            $this->add_control(
            'number',
                [
                    'label'   => __( 'Number', 'axil-elements' ),
                    'type'    => Controls_Manager::NUMBER,
                    'default' => -1,  
                    'description' => __( 'Write -1 to show all', 'axil-elements' ),  
                ]

            );
            $this->add_control(
                'cat_list',
                [
                    'label' => __( 'Categories', 'axil-elements' ),
                    'type' => Controls_Manager::SELECT2,
                     'default' => '0',                
                    'options' => $category_dropdown,
                ] 
            ); 
            $this->add_control(
                'orderby',
                [
                    'label' => __( 'Order By', 'axil-elements' ),
                    'type' => Controls_Manager::SELECT2,
                    'options' => array(
                        'date'        => __( 'Date (Recents comes first)', 'axil-elements' ),
                        'title'       => __( 'Title', 'axil-elements' ),
                        'menu_order'  => __( 'Custom Order (Available via Order field inside Page Attributes box)', 'axil-elements' ),
                    ),
                        'default' => 'date',
                ] 
            );
        

         $this->add_control(
            'designation_display',
            [
                
                'type' => Controls_Manager::SWITCHER,
                'label'       => __( 'Designation Display', 'axil-elements' ),
                'label_on'    => __( 'On', 'axil-elements' ),
                'label_off'   => __( 'Off', 'axil-elements' ),
                'default'     => 'yes',
                'description' => __( 'Show or Hide Designation. Default: On', 'axil-elements' ),
            ] 
        );   
         $this->add_control(
            'department_display',
            [
                
                'type' => Controls_Manager::SWITCHER,
                'label'       => __( 'Department Display', 'axil-elements' ),
                'label_on'    => __( 'On', 'axil-elements' ),
                'label_off'   => __( 'Off', 'axil-elements' ),
                'default'     => 'yes',
                'description' => __( 'Show or Hide Department. Default: On', 'axil-elements' ),
            ] 
        );   
         $this->add_control(
            'social_display',
            [
                
                'type' => Controls_Manager::SWITCHER,
                'label'       => __( 'Social Media Display', 'axil-elements' ),
                'label_on'    => __( 'On', 'axil-elements' ),
                'label_off'   => __( 'Off', 'axil-elements' ),
                'default'     => 'yes',
                'description' => __( 'Show or Hide Social Medias. Default: On', 'axil-elements' ),
            ] 
        ); 
         $this->add_control(
            'content_display',
            [                
                'type' => Controls_Manager::SWITCHER,
                'label'       => __( 'Content Display', 'axil-elements' ),
                'label_on'    => __( 'On', 'axil-elements' ),
                'label_off'   => __( 'Off', 'axil-elements' ),
                'default'     => 'yes',
                'description' => __( 'Show or Hide Content. Default: On', 'axil-elements' ),
                'condition'   => array( 'style' => array( '2') ), 
            ] 
        );
         $this->add_responsive_control(
            'radius',
            [
                'label' => esc_html__( 'Border Radius', 'axil-elements' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],                  
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 1000,
                            'step' => 5,
                        ],
                        '%' => [
                            'min' => 0,
                            'max' => 100,
                        ],
                    ],
                                
                'devices' => [ 'desktop', 'tablet', 'mobile' ],     
                'desktop_default' => [
                    'size' => 40,
                    'unit' => 'px',
                ],
                'tablet_default' => [
                    'size' => 40,
                    'unit' => 'px',
                ],
                'mobile_default' => [
                    'size' => 40,
                    'unit' => 'px',
                ],      
                'selectors' => [
                    '{{WRAPPER}} .team-grid .thumbnail img' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

     $this->end_controls_section();
     $this->start_controls_section(
            'axil_responsive',
                [
                'label' => __( 'Responsive Columns', 'axil-elements' ),
                ]
            );

            $this->add_control(
                'col_lg',
                [
                    'label' => __( 'Desktops: > 1199px', 'axil-elements' ),
                    'type' => Controls_Manager::SELECT,
                    'options' => [
                        '12'  => esc_html__( '1 Col', 'axil-elements' ),
                        '6'  => esc_html__( '2 Col', 'axil-elements' ),
                        '4'  => esc_html__( '3 Col', 'axil-elements' ),
                        '3'  => esc_html__( '4 Col', 'axil-elements' ),                        
                        '2'  => esc_html__( '6 Col', 'axil-elements' ),
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
                        '12'  => esc_html__( '1 Col', 'axil-elements' ),
                        '6'  => esc_html__( '2 Col', 'axil-elements' ),
                        '4'  => esc_html__( '3 Col', 'axil-elements' ),
                        '3'  => esc_html__( '4 Col', 'axil-elements' ),                        
                        '2'  => esc_html__( '6 Col', 'axil-elements' ),
                        ],
                    'default' => '2',
                ] 
            );
            $this->add_control(
            'col_sm',
                [
                    'label' => __( 'Tablets: > 767px', 'axil-elements' ),
                    'type' => Controls_Manager::SELECT,
                    'options' => [
                            '12'  => esc_html__( '1 Col', 'axil-elements' ),
                            '6'  => esc_html__( '2 Col', 'axil-elements' ),
                            '4'  => esc_html__( '3 Col', 'axil-elements' ),
                            '3'  => esc_html__( '4 Col', 'axil-elements' ),                        
                            '2'  => esc_html__( '6 Col', 'axil-elements' ),
                        ],
                    'default' => '12',
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
                    'url' =>  $this->axil_get_img( 'shape10/circle-1.png' ),
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
                   'url' =>  $this->axil_get_img( 'shape10/line-3.png' ),
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
        $template   = 'team-1';  
        return axil_Elements_Helper::axiltheme_element_template( $template, $settings );

    }
}
