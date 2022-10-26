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
class axil_office extends Widget_Base {
  use \Elementor\AxilElementCommonFunctions;
    public function get_name() {
        return 'axil-our-office';
    }    
    public function get_title() {
        return esc_html__( 'Our office', 'axil-elements' );
    }
    public function get_icon() {
        return 'eicon-banner';
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
         $this->axil_section_title('office_section', 'Section Title', 'h2', true, 'left');
        
        $this->start_controls_section(
            'office',
            [
                'label' => esc_html__('Office List','axil-elements'),
                
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'office_thumbnail',
            [
                'label' => esc_html__('Office Thumbnail','axil-elements'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],

            ]
        );
        $repeater->add_control(
            'office_title',
            [
                'label' => esc_html__('Office Title','axil-elements'),
                'type' => Controls_Manager::TEXT,
                'default' =>  esc_html__('Virginia-HQ','axil-elements'),
                'placeholder' => esc_html__('Type Heading Text','axil-elements'),
                'label_block' => true,
            ]
        ); 
        $repeater->add_control(
            'office_address',
            [
                'label' => esc_html__('Office Address','axil-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => '(123) 456 7890',
                'placeholder' => esc_html__('Type Phone ','axil-elements'),
                'label_block' => true,
            ]
        );
  

        $this->add_control(
            'office_list',
            [
                'label' => esc_html__('Office List','axil-elements'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'office_title' => esc_html__('Virginia-HQ','axil-elements'),
                        'office_address' => esc_html__('435 Pouros Locks United States','axil-elements'),
                       
                        
                    ],
                    [
                        'office_title' => esc_html__('Nevada','axil-elements'),
                        'office_address' => esc_html__('46 Watsica Creek Suite 071 United States','axil-elements'),
                        
                    ],
                    [
                        'office_title' => esc_html__('Columbia','axil-elements'),
                        'office_address' => esc_html__('7140 Wehner Tunnel Washington, D.C','axil-elements'),
                        
                    ],
                    [
                      'office_title' => esc_html__('New Mexico','axil-elements'),
                        'office_address' => esc_html__('10 Maggie Valleys United States','axil-elements'),
                        
                    ]
                ],
                'title_field' => '{{{ office_title }}}',
            ]
        );
    $this->end_controls_section();

    $this->axil_basic_style_controls('office_section_pre_title', 'Section - Tag Line', '.section-heading .subtitle');
    $this->axil_basic_style_controls('office_section_title', 'Section - Title', '.section-heading .title');        
    $this->axil_basic_style_controls('office_section_description', 'Section - Description', '.section-heading p'); 
    $this->axil_basic_style_controls('office_title', 'Office Title', '.office-location .content .title'); 
    $this->axil_basic_style_controls('office_address', 'Office Address', '.office-location .content p'); 

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
                    'default'     => 'yes',
                   
                ]
            );    
        $this->add_control(
            'shape1',
            [
                'label' => esc_html__('Shape 1','axil-elements'),
                'type'=>Controls_Manager::MEDIA,                    
                'default' => [
                    'url' =>  $this->axil_get_img( 'shape11/line-6.png' ),
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
                   'url' =>  $this->axil_get_img( 'shape11/circle-3.png' ),
                ],
                 'condition' => array( 'shape_style_on' => array( 'yes' ) ),
                'dynamic' => [
                    'active' => true,
                ],
                    
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
                    'default' => '3',
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
                    'default' => '6',
                ] 
            );          
        $this->end_controls_section();
         
    }      


    protected function render() {
        $settings = $this->get_settings();  
            $shape1 =  $settings['shape1']['url'];
            $shape2 =  $settings['shape2']['url'];
           
            $col_class = "col-lg-{$settings['col_lg']} col-md-{$settings['col_md']} col-sm-{$settings['col_sm']}";
        ?>

        <div class="section section-padding bg-color-dark overflow-hidden">
            <div class="container"> 
                 <?php if( $settings['seation_office_section_title_on'] =='yes' ){ ?>  

                    <div class="section-heading heading-light-<?php echo esc_attr( $settings['axil_office_section_align'] );?>">            
                        <?php  if($settings['axil_office_section_title_before']){ ?>
                            <span class="subtitle"><?php echo esc_attr( $settings['axil_office_section_title_before'] );?></span>
                        <?php  } ?> 

                    <?php if ($settings['axil_office_section_title_tag']) : ?>
                        <?php  if($settings['axil_office_section_title']){ ?>
                            <<?php echo esc_html( $settings['axil_office_section_title_tag'] );?> class="title">
                                <?php echo esc_attr( $settings['axil_office_section_title'] );?>
                            </<?php echo esc_html( $settings['axil_office_section_title_tag'] );?>> 
                        <?php  } ?>             
                    <?php endif; ?>
                        <?php  if($settings['axil_sub_office_section_title']){ ?>
                            <p><?php echo esc_attr( $settings['axil_sub_office_section_title'] );?></p>
                        <?php  } ?>
                    </div>
                <?php } ?> 

                <div class="row">
                    <?php foreach ($settings['office_list'] as $office) { ?>
                        <div class="<?php echo esc_attr($col_class); ?>" data-sal="slide-up" data-sal-duration="500">
                             <div class="office-location">
                                <div class="thumbnail">
                                   <?php echo Group_Control_Image_Size::get_attachment_image_html( $office, 'full', 'office_thumbnail' ); ?>
                                </div>
                                <div class="content">
                                    <h4 class="title"><?php echo esc_attr( $office['office_title'] );?></h4>
                                    <p><?php echo esc_attr( $office['office_address'] );?></p>
                                </div>
                            </div> 
                        </div> 
                    <?php } ?>     
                </div>
            </div> 
             <?php if( $settings['shape_style_on']  =='yes' ){ ?>
                <ul class="shape-group-11 list-unstyled">
                    <?php if( $shape1 ){ ?>             
                        <li class="shape shape-1"><img src="<?php echo esc_url( $shape1 );?>" alt="<?php echo axil_Elements_Helper::axil_get_image_alt( $settings['shape1']['id'] );?>"></li>
                    <?php } ?> 
                    <?php if( $shape2 ){ ?>   
                        <li class="shape shape-2"><img src="<?php echo esc_url( $shape2 );?>" alt="<?php echo axil_Elements_Helper::axil_get_image_alt( $settings['shape2']['id'] );?>"></li>
                    <?php } ?> 
                             
                </ul>
             <?php } ?>   
        </div> 
        <?php    
    }
}
