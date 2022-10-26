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

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
    class YouTube_Popup extends Widget_Base {

         

        public function get_name() {
            return 'axil-youtube-popup';
        }
        
        public function get_title() {
            return esc_html__( 'YouTube Popup', 'axil-elements' );
        }

        public function get_icon() {
            return 'eicon-video-playlist';
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
            'img_v_content',
            [
                'label' => esc_html__( 'Images & URL', 'axil-elements' ),
            ]
        );    

		$this->add_control(
		    'image',
		    [
		        'label' => esc_html__('Images','axil-elements'),
		        'type'=>Controls_Manager::MEDIA,
		        'default' => [
		            'url' => Utils::get_placeholder_image_src(),
		        ],
		        'dynamic' => [
		            'active' => true,
		        ],
		        'selectors' => [					
					'{{WRAPPER}} .axil-signin-banner' => 'background-image: url({{URL}});',
				],
		            
		    ]
		);		
		
	  $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'image_size',
                'default' => 'full',
                'separator' => 'none',                     
            ]
        );

		$this->add_control(
			'videourl',
			[
			    'label'   => esc_html__( 'YouTube Popup URL', 'axil-elements' ),
			    'type'    => Controls_Manager::URL,
			    'placeholder' => 'https://your-link.com',
			]
		);         

	    $this->end_controls_section();	
 

       $this->start_controls_section(       
        'poster_shape2',
            [
                'label' => esc_html__( 'Background Shapes', 'axil-elements' ),    
                        
                          
            ]
        );     

        $this->add_group_control(
           \Elementor\Group_Control_Background::get_type(),
               [
                   'name' => 'background',
                   'label' => __( 'Background', 'axil-elements' ),
                   'types' => [ 'classic', 'gradient' ],
                   'selector' => '{{WRAPPER}} .about-expert-wrp .youtube-popup-expert', 
                      
                                 
               ]
           ); 

            $this->add_responsive_control(
                'y_title_padding',
                [
                    'label' => esc_html__( 'Padding', 'axil-elements' ),
                     'type' => Controls_Manager::DIMENSIONS,                        
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .about-expert-wrp .youtube-popup-expert' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                       
                    ],
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
                    '{{WRAPPER}} .about-expert-wrp .youtube-popup-expert' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
                'shape_style_on2',
                [
                    'label' => esc_html__( 'Customize', 'axil-elements' ),
                    'type' => Controls_Manager::SWITCHER,
                    'label_on'    => esc_html__( 'On', 'axil-elements' ),
                    'label_off'   => esc_html__( 'Off', 'axil-elements' ),
                    'default'     => 'no',
                   
                ]
            );   


        $this->add_control(
            'shape21',
            [
                'label' => esc_html__('Shape 1','axil-elements'),
                'type'=>Controls_Manager::MEDIA,                    
                'default' => [
                    'url' =>  $this->axil_get_img( 'shape10/61.png' ),
                ],
                 'condition' => array( 'shape_style_on2' => array( 'yes' ) ),
                'dynamic' => [
                    'active' => true,
                ],
                    
            ]
        );      

        $this->add_control(
            'shape22',
            [
                'label' => esc_html__('Shape 2','axil-elements'),
                'type'=>Controls_Manager::MEDIA,                    
                'default' => [
                   'url' =>  $this->axil_get_img( 'shape10/2.png' ),
                ],
                 'condition' => array( 'shape_style_on2' => array( 'yes' ) ),
                'dynamic' => [
                    'active' => true,
                ],
                    
            ]
        );

        $this->add_control(
            'shape23',
            [
                'label' => esc_html__('Shape 3','axil-elements'),
                'type'=>Controls_Manager::MEDIA,                    
                'default' => [
                   'url' =>  $this->axil_get_img( 'shape10/3.png' ),
                ],
                 'condition' => array( 'shape_style_on2' => array( 'yes' ) ),
                'dynamic' => [
                    'active' => true,
                ],
                    
            ]
        );

         $this->add_control(
            'shape24',
            [
                'label' => esc_html__('Shape 4','axil-elements'),
                'type'=>Controls_Manager::MEDIA,                    
                'default' => [
                   'url' =>  $this->axil_get_img( 'shape10/4.png' ),
                ],
                 'condition' => array( 'shape_style_on2' => array( 'yes' ) ),
                'dynamic' => [
                    'active' => true,
                ],
                    
            ]
        );  
         $this->add_control(
            'shape25',
            [
                'label' => esc_html__('Shape 4','axil-elements'),
                'type'=>Controls_Manager::MEDIA,                    
                'default' => [
                   'url' =>  $this->axil_get_img( 'shape7/bubble-2.png' ),
                ],
                 'condition' => array( 'shape_style_on2' => array( 'yes' ) ),
                'dynamic' => [
                    'active' => true,
                ],
                    
            ]
        ); 
         $this->add_control(
            'shape26',
            [
                'label' => esc_html__('Shape 4','axil-elements'),
                'type'=>Controls_Manager::MEDIA,                    
                'default' => [
                   'url' =>  $this->axil_get_img( 'blog/bubble-2.png' ),
                ],
                 'condition' => array( 'shape_style_on2' => array( 'yes' ) ),
                'dynamic' => [
                    'active' => true,
                ],
                    
            ]
        );
        $this->end_controls_section();
    }
	

    private function magnific_load_scripts(){
        wp_enqueue_script(  'jquery-magnific-popup' );
        wp_enqueue_style(  'magnific-popup' );    
    }

	

    protected function render() {
    	$settings = $this->get_settings(); 
    	$this->magnific_load_scripts();	

		$simagev        =  $settings['videourl']['url'];  
		 
        $shape21         =  $settings['shape21']['url'];
        $shape22         =  $settings['shape22']['url'];
        $shape23         =  $settings['shape23']['url'];
        $shape24         =  $settings['shape24']['url'];
        $shape25         =  $settings['shape25']['url'];
        $shape26         =  $settings['shape26']['url'];

        ?>
            
        <div class="about-expert-wrp">
            <div class="youtube-popup-expert">

                 <div class="thumbnail">
                    <div class="thumbnail-holder paralax-image">
                        <?php echo Group_Control_Image_Size::get_attachment_image_html( $settings, 'image_size', 'image' );?>
                   </div>

                   <?php if ( !empty( $settings['videourl']['url'] ) ): ?>
                     <div class="popup-video">
                         <a href="<?php echo esc_url( $simagev );?>" class="play-btn popup-youtube"><i class="fas fa-play"></i></a>
                     </div>
                    <?php endif; ?>
                 </div> 
           
        
            <?php if( $settings['shape_style_on2']  =='yes' ){ ?>
            <ul class="shape-group-110 list-unstyled">
                <?php if( $shape21 ){ ?>             
                    <li class="shape shape-1"><img src="<?php echo esc_url( $shape21 );?>" alt="<?php echo axil_Elements_Helper::axil_get_image_alt( $settings['shape21']['id'] );?>"></li>
                <?php } ?> 
                <?php if( $shape22 ){ ?>   
                    <li class="shape shape-2"><img src="<?php echo esc_url( $shape22 );?>" alt="<?php echo axil_Elements_Helper::axil_get_image_alt( $settings['shape22']['id'] );?>"></li>
                <?php } ?>

                <?php if( $shape23 ){ ?>   
                    <li class="shape shape-3"><img src="<?php echo esc_url( $shape23 );?>" alt="<?php echo axil_Elements_Helper::axil_get_image_alt( $settings['shape23']['id'] );?>"></li>
                <?php } ?> 

                <?php if( $shape24 ){ ?>   
                    <li class="shape shape-4"><img src="<?php echo esc_url( $shape24 );?>" alt="<?php echo axil_Elements_Helper::axil_get_image_alt( $settings['shape24']['id'] );?>"></li>
                <?php } ?>    
                <?php if( $shape25 ){ ?>   
                    <li class="shape shape-5"><img src="<?php echo esc_url( $shape25 );?>" alt="<?php echo axil_Elements_Helper::axil_get_image_alt( $settings['shape25']['id'] );?>"></li>
                <?php } ?>      
                <?php if( $shape26 ){ ?>   
                    <li class="shape shape-6"><img src="<?php echo esc_url( $shape26 );?>" alt="<?php echo axil_Elements_Helper::axil_get_image_alt( $settings['shape26']['id'] );?>"></li>
                <?php } ?>      
                                      
        </ul>
        <?php } ?> 
    </div> 
    </div> 

   <?php 

     }
}