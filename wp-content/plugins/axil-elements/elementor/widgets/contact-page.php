<?php
/**
 * @author  AxilTheme
 * @since   1.0
 * @version 1.0
 */

namespace axiltheme\abstrak_elements;

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


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class axil_Contact_Page extends Widget_Base {
use \Elementor\AxilElementCommonFunctions;
 public function get_name() {
        return 'axil-contact-page';
    }    
    public function get_title() {
        return __( 'Contact Page', 'axil-elements' );
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

    public function get_axil_contact_form(){
        if ( ! class_exists( 'WPCF7' ) ) {
            return;
        }
        $axil_cfa         = array();
        $axil_cf_args     = array( 'posts_per_page' => -1, 'post_type'=> 'wpcf7_contact_form' );
        $axil_forms       = get_posts( $axil_cf_args );
        $axil_cfa         = ['0' => esc_html__( 'Select Form', 'axil-elements' ) ];
        if( $axil_forms ){
            foreach ( $axil_forms as $axil_form ){
                $axil_cfa[$axil_form->ID] = $axil_form->post_title;
            }
        }else{
            $axil_cfa[ esc_html__( 'No contact form found', 'axil-elements' ) ] = 0;
        }
        return $axil_cfa;
    }
 
    protected function register_controls() { 
 
        $this->start_controls_section(
            'axil_content_shortcode',
                [
                    'label' => esc_html__( 'Contact Form', 'axil-elements' ),
                ]
            );
       
            $this->add_control(
                'axil_content_form_title',
                [
                    'label' => esc_html__('Form Title', 'axil-elements'),
                    'type' => Controls_Manager::TEXT,
                    'default' => 'Get a free axil-elements quote now',
                    'placeholder' => esc_html__('Type Heading Text', 'axil-elements'),
                    'label_block' => true,
                ]
            );

            $this->add_control(
                'axil_contact_form_tag',
                [
                    'label' => esc_html__('Form Title HTML Tag', 'axil-elements'),
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
                    'toggle' => false,
                ]
            );


            $this->add_control(
                'select_contact_form',
                [
                    'label'   => esc_html__( 'Select Form', 'axil-elements' ),
                    'type'    => Controls_Manager::SELECT,
                    'default' => '0',
                    'options' => $this->get_axil_contact_form(),
                ]
            );
        $this->end_controls_section(); 

        $this->axil_basic_style_controls('form_title', 'Form Title', '.contact-form-box .title'); 
        $this->start_controls_section( 
            'phone_contact_card',
            [
                'label' => esc_html__( 'Phone Card', 'axil-elements' ),   
                              
                          
            ]
        );  

        $this->add_control(
            'card_title',
            [
                'label' => esc_html__('Card Title', 'axil-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Phone',
                'placeholder' => esc_html__('Type Heading Text', 'axil-elements'),
                'label_block' => true,
                  
            ]
        );
        $this->add_control(
            'card_subtitle',
            [
                'label' => esc_html__( 'Card Sub Title', 'axil-elements' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'Our customer care is open from Mon-Fri, 10:00 am to 6:00 pm', 'axil-elements' ),
                'placeholder' => esc_html__( 'Type Sub title', 'axil-elements' ),
                  
            ]
        );

        $this->add_control(
            'card_phone',
            [
                'label' => esc_html__('Card Phone', 'axil-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => '(123) 456 7890',
                'placeholder' => esc_html__('Type Phone', 'axil-elements'),
                'label_block' => true,
            ]
        );
 
    $this->end_controls_section(); 
    $this->start_controls_section(     

      'email_contact_card',
            [
                'label' => esc_html__( 'Email Card', 'axil-elements' ),   
                              
                          
            ]
        );  

        $this->add_control(
            'card_title2',
            [
                'label' => esc_html__('Card Title', 'axil-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Email',
                'placeholder' => esc_html__('Type Heading Text', 'axil-elements'),
                'label_block' => true,
                  
            ]
        );
        $this->add_control(
            'card_subtitle2',
            [
                'label' => esc_html__( 'Card Sub Title', 'axil-elements' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'Our customer care is open from Mon-Fri, 10:00 am to 6:00 pm', 'axil-elements' ),
                'placeholder' => esc_html__( 'Type Sub title', 'axil-elements' ),
                  
            ]
        );

        $this->add_control(
            'card_email',
            [
                'label' => esc_html__('Card Email', 'axil-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => 'info@example.com',
                'placeholder' => esc_html__('Type Email Text', 'axil-elements'),
                'label_block' => true,
            ]
        );
    $this->end_controls_section(); 

    $this->axil_basic_style_controls('card_title', 'Card Title', '.contact-info .title'); 
    $this->axil_basic_style_controls('card_sub_title', 'Card Sub Title', '.contact-info p'); 
    $this->axil_basic_style_controls('card_email_phone', 'Card Email/Phone', '.contact-info .phone-number');
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
                    'url' =>  $this->axil_get_img( 'shape12/bubble-2.png' ),
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
                   'url' =>  $this->axil_get_img( 'shape12/bubble-1.png' ),
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
                'label' => esc_html__('Shape 31','axil-elements'),
                'type'=>Controls_Manager::MEDIA,                    
                'default' => [
                   'url' =>  $this->axil_get_img( 'shape12/circle-3.png' ),
                ],
                'dynamic' => [
                    'active' => true,
                ],
                 'condition' => array( 'shape_style_on' => array( 'yes' ) ), 
                    
            ]
        ); 
        $this->end_controls_section(); 

}


protected function render() {
    $settings = $this->get_settings(); 

    $shape1 =  $settings['shape1']['url'];
    $shape2 =  $settings['shape2']['url'];
    $shape3 =  $settings['shape3']['url'];

    $allowed_tags = wp_kses_allowed_html( 'post' );
    $phoneNumber = preg_replace("/[^0-9+]/", '', $settings['card_phone'] );
    ?>
 <div class="section section-padding">
    <div class="container">
        <div class="row">
            <div class="col-xl-5 col-lg-6">
                <div class="contact-form-box shadow-box mb--30">
                    <?php if ($settings['axil_contact_form_tag']) : ?>
                    <<?php echo tag_escape( $settings['axil_contact_form_tag'] ); ?> 
                    class="title">
                    <?php echo wp_kses_post( $settings['axil_content_form_title']); ?>
                    </<?php echo tag_escape( $settings['axil_contact_form_tag'] ) ?>>
                    <?php endif; ?>
                    <?php if( !empty($settings['select_contact_form']) ){ 
                    echo do_shortcode( '[contact-form-7  id="'.$settings['select_contact_form'].'"]' );                               
                    } else {
                    echo '<div class="alert alert-info"><p>' . __('Please Select contact form.', 'axil-elements' ). '</p></div>';
                    }
                ?> 
                </div>
            </div>
            <div class="col-xl-5 col-lg-6 offset-xl-1">
                <div class="contact-info mb--100 mb_md--30 mt_md--0 mt--150">
                        
                    <?php if ($settings['card_title']) : ?>
                        <h4 class="title"><?php echo wp_kses( $settings['card_title'], $allowed_tags ); ?></h4>
                    <?php endif; ?>

                    <?php if ($settings['card_subtitle']) : ?>
                        <p class="subtitle"><?php echo wp_kses( $settings['card_subtitle'], $allowed_tags ); ?></p>
                    <?php endif; ?>

                    <?php if ($settings['card_phone']) : ?>
                        <h4 class="phone-number"><a href="tel:<?php echo wp_kses_post( $phoneNumber ); ?>"><?php echo esc_attr( $settings['card_phone'] ); ?></a></h4>
                    <?php endif; ?>

                </div>
                <div class="contact-info mb--30">
                    <?php if ($settings['card_title2']) : ?>
                        <h4 class="title"><?php echo wp_kses( $settings['card_title2'], $allowed_tags ); ?></h4>
                    <?php endif; ?>

                    <?php if ($settings['card_subtitle2']) : ?>
                        <p class="subtitle"><?php echo wp_kses( $settings['card_subtitle2'], $allowed_tags ); ?></p>
                    <?php endif; ?>
                  
                    <?php if ( $settings['card_email'] ) : ?>
                        <h4 class="phone-number"><a href="mailto:<?php echo wp_kses_post( $settings['card_email'] ); ?>"><?php echo esc_attr( $settings['card_email'] ); ?></a></h4>
                     <?php endif; ?>
 
                </div>
            </div>
        </div>
    </div>
    <?php if( $settings['shape_style_on']  == 'yes' ){ ?>
        <ul class="shape-group-12 list-unstyled">          
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