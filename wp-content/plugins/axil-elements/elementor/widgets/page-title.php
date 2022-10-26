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
class Page_Title extends Widget_Base {  
  use \Elementor\AxilElementCommonFunctions;
 public function get_name() {
        return 'axil-page-title';
    }    
    public function get_title() {
        return esc_html__( 'Page Title', 'axil-elements' );
    }
    public function get_icon() {
        return ' eicon-archive-title';
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
            'page_layout_section',
            [
                'label' => esc_html__( 'Layout', 'axil-elements' ),
            ]
        );
            
        $this->add_control(
            'style',
            [
                'label' => esc_html__( 'Style', 'axil-elements' ),
                'type' => Controls_Manager::SELECT,
                'default' => '1',
                'options' => [
                    '1'   => esc_html__( 'Style One', 'axil-elements' ),
                    '2'   => esc_html__( 'Style Two', 'axil-elements' ),                  
                    
                ],
            ] 
        );

    $this->end_controls_section();
     $this->start_controls_section(
            'page_title_section',
            [
                'label' => esc_html__( 'Page Title', 'axil-elements' ),
            ]
        );
         
        $this->add_responsive_control(
            'sec_title_tag',
            [
                'label' => esc_html__( 'Title HTML Tag', 'axil-elements' ),
                'type' => Controls_Manager::CHOOSE,
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
            'title',
            [
                'label' => esc_html__( 'Title', 'axil-elements' ),
                'type' => Controls_Manager::TEXTAREA,
                'placeholder' => esc_html__( 'Type your title here...', 'axil-elements' ),
                'default' => 'Section title here',
            ]
        );  
       
      
        $this->add_control(
            'sub_title',
            [
                'label' => esc_html__( 'Description', 'axil-elements' ),
                'type' => Controls_Manager::TEXTAREA,
                'placeholder' => esc_html__( 'Type your Description here.', 'axil-elements' ),    
                'default' => 'In vel varius turpis, non dictum sem. Aenean in efficitur ipsum, in egestas ipsum. Mauris in mi ac tellus.',            
            ]
        );
       
        $this->end_controls_section();

        $this->start_controls_section(     
        'poster_img',
            [
                'label' => esc_html__( 'Banner Image', 'axil-elements' ),                   
                          
            ]
        );        
        $this->add_control(
            'shape3',
            [
                'label' => esc_html__('Shape 3','axil-elements'),
                'type'=>Controls_Manager::MEDIA,                    
                'default' => [
                   'url' =>  $this->axil_get_img( 'page-title/banner-thumb-1.png' ),
                ],
                'dynamic' => [
                    'active' => true,
                ],
                
                    
            ]
        );  
        $this->end_controls_section();  
        $this->start_controls_section(     
        'poster_shape',
            [
                'label' => esc_html__( 'Poster Shapes', 'axil-elements' ),                   
                          
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
                    'url' =>  $this->axil_get_img( 'page-title/bubble-9.png' ),
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
                'label' => esc_html__('Shape 2','axil-elements'),
                'type'=>Controls_Manager::MEDIA,                    
                'default' => [
                   'url' =>  $this->axil_get_img( 'page-title/line-4.png' ),
                ],
                'dynamic' => [
                    'active' => true,
                ],
                 'condition' => array( 'shape_style_on' => array( 'yes' ) ),
                    
            ]
        );      
        
        $this->add_control(
            'shape4',
            [
                'label' => esc_html__('Shape 4','axil-elements'),
                'type'=>Controls_Manager::MEDIA,                    
                'default' => [
                   'url' =>  $this->axil_get_img( 'page-title/bubble-20.png' ),
                ],
                'dynamic' => [
                    'active' => true,
                ],
                 'condition' => array( 'shape_style_on' => array( 'yes' ) ),
                    
            ]
        ); 
        $this->end_controls_section(); 
       

        $this->axil_basic_style_controls('banner_page_title', 'Title', '.breadcrumb-banner .section-heading .title');
        $this->axil_basic_style_controls('banner_page_sub_title', 'Sub Title', '.breadcrumb-banner .section-heading p');

  }

    protected function render() {
        $settings = $this->get_settings();
        $shape1 =  $settings['shape1']['url'];
        $shape2 =  $settings['shape2']['url'];
        $shape3 =  $settings['shape3']['url'];
        $shape4 =  $settings['shape4']['url'];

        if ( $settings['style'] == '1' ) { ?>
 
             <div class="breadcrum-area breadcrumb-banner">
                <div class="container">
                    <div class="section-heading heading-left sal-animate" data-sal="slide-right" data-sal-duration="1000" data-sal-delay="300">
                    <?php  if($settings['title']){ ?>
                        <<?php echo esc_html( $settings['sec_title_tag'] );?> class="title"><?php echo wp_kses_post( $settings['title'] );?></<?php echo esc_html( $settings['sec_title_tag'] );?>> 
                    <?php  } ?> 
                    <?php  if($settings['sub_title']){ ?>
                        <p><?php echo wp_kses_post( $settings['sub_title'] );?></p>
                    <?php  } ?>    
                    </div>
                    <div class="banner-thumbnail" data-sal="slide-up" data-sal-duration="1000" data-sal-delay="400">
                        <img class="paralax-image" src="<?php echo esc_url( $shape3 );?>" alt="<?php echo axil_Elements_Helper::axil_get_image_alt( $settings['shape3']['id'] );?>">
                    </div>      
                </div>
                 <?php if( $settings['shape_style_on']  =='yes' ){ ?>
                    <ul class="shape-group-8 list-unstyled">
                        <li class="shape shape-1" data-sal="slide-right" data-sal-duration="500" data-sal-delay="100">
                            <img src="<?php echo esc_url( $shape1 );?>" alt="<?php echo axil_Elements_Helper::axil_get_image_alt( $settings['shape1']['id'] );?>">
                        </li>
                        <li class="shape shape-2" data-sal="slide-left" data-sal-duration="500" data-sal-delay="200">
                            <img src="<?php echo esc_url( $shape4 );?>" alt="<?php echo axil_Elements_Helper::axil_get_image_alt( $settings['shape4']['id'] );?>">
                        </li>
                        <li class="shape shape-3" data-sal="slide-up" data-sal-duration="500" data-sal-delay="300">
                            <img src="<?php echo esc_url( $shape2 );?>" alt="<?php echo axil_Elements_Helper::axil_get_image_alt( $settings['shape2']['id'] );?>">
                        </li>
                    </ul>
                <?php } ?>
            </div>

        <?php }else{ ?>

                <div class="breadcrum-area breadcrumb-banner single-breadcrumb">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-6">
                                <div class="section-heading heading-left" data-sal="slide-right" data-sal-duration="1000" data-sal-delay="300">
                                    <?php  if($settings['title']){ ?>
                                    <<?php echo esc_html( $settings['sec_title_tag'] );?> class="title"><?php echo wp_kses_post( $settings['title'] );?></<?php echo esc_html( $settings['sec_title_tag'] );?>> 
                                    <?php  } ?> 
                                    <?php  if($settings['sub_title']){ ?>
                                    <p><?php echo wp_kses_post( $settings['sub_title'] );?></p>
                                    <?php  } ?>    
                                </div>
                            </div>
                            <div class="col-lg-6">
                                 <?php if ( !empty($shape3) ) { ?>
                                    <div class="banner-thumbnail" data-sal="slide-up" data-sal-duration="1000" data-sal-delay="400">

                                        <img class="paralax-image" src="<?php echo esc_url( $shape3 );?>" alt="<?php echo axil_Elements_Helper::axil_get_image_alt( $settings['shape3']['id'] );?>">

                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <?php if( $settings['shape_style_on']  =='yes' ){ ?>
                    <ul class="shape-group-8 list-unstyled">
                         <?php if ( !empty($shape1) ) { ?>
                       <li class="shape shape-1" data-sal="slide-right" data-sal-duration="500" data-sal-delay="100">
                           <img src="<?php echo esc_url( $shape1 );?>" alt="<?php echo axil_Elements_Helper::axil_get_image_alt( $settings['shape1']['id'] );?>">
                       </li>
                       <?php } ?>
                        <?php if ( !empty($shape4) ) { ?>
                       <li class="shape shape-2" data-sal="slide-left" data-sal-duration="500" data-sal-delay="200">
                           <img src="<?php echo esc_url( $shape4 );?>" alt="<?php echo axil_Elements_Helper::axil_get_image_alt( $settings['shape4']['id'] );?>">
                       </li>
                       <?php } ?>
                        <?php if ( !empty($shape2) ) { ?>
                       <li class="shape shape-3" data-sal="slide-up" data-sal-duration="500" data-sal-delay="300">
                           <img src="<?php echo esc_url( $shape2 );?>" alt="<?php echo axil_Elements_Helper::axil_get_image_alt( $settings['shape2']['id'] );?>">
                       </li>
                       <?php } ?>
                    </ul>
                    <?php } ?>
                </div>

        <?php }
    }
}
