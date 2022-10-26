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
    class Video_Popup extends Widget_Base {
        use \Elementor\AxilElementCommonFunctions;

        public function get_name() {
            return 'axil-video-popup';
        }
        
        public function get_title() {
            return esc_html__( 'Video Popup', 'axil-elements' );
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
            'video_layout',
            [
                'label' => esc_html__( 'Layout', 'axil-elements' ),
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
                                         
                ],
            ] 
        );         
         $this->end_controls_section();   


        $this->axil_section_title('video_section', 'Section Title', 'h2', true, 'center');
        $this->axil_basic_style_controls('video_section_pre_title', 'Section - Tag Line', '.section-heading .subtitle');
        $this->axil_basic_style_controls('video_section_title', 'Section - Title', '.section-heading .title');        
        $this->axil_basic_style_controls('video_section_description', 'Section - Description', '.section-heading p'); 

        $this->start_controls_section(
            'img_v_content',
            [
                'label' => esc_html__( 'Images & Video', 'axil-elements' ),
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
			    'label'   => esc_html__( 'Video Popup URL', 'axil-elements' ),
			    'type'    => Controls_Manager::URL,
			    'placeholder' => 'https://your-link.com',
			]
		);         

	    $this->end_controls_section();	



       $this->start_controls_section(       
        'frame_shape',
            [
                'label' => esc_html__( 'Frame Images', 'axil-elements' ),  
                'condition'   => array( 'style' => array( '1') ),                  
                          
            ]
        );          
      


        $this->add_control(
            'frame1',
            [
                'label' => esc_html__('Shape 1','axil-elements'),
                'type'=>Controls_Manager::MEDIA,                    
                'default' => [
                    'url' =>  $this->axil_get_img( 'shape16/frame-1.png' ),
                ],               
                'dynamic' => [
                    'active' => true,
                ],
                    
            ]
        );      
        $this->add_control(
            'frame2',
            [
                'label' => esc_html__('Shape 2','axil-elements'),
                'type'=>Controls_Manager::MEDIA,                    
                'default' => [
                   'url' =>  $this->axil_get_img( 'shape16/frame-2.png' ),
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
                'label' => esc_html__( 'Background Shapes', 'axil-elements' ),    
                'condition'   => array( 'style' => array( '1') ),                
                          
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
                    'url' =>  $this->axil_get_img( 'shape16/circle-2.png' ),
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
                   'url' =>  $this->axil_get_img( 'shape16/bubble-2.png' ),
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
                   'url' =>  $this->axil_get_img( 'shape16/bubble-1.png' ),
                ],
                 'condition' => array( 'shape_style_on' => array( 'yes' ) ),
                'dynamic' => [
                    'active' => true,
                ],
                    
            ]
        );  
       
        $this->end_controls_section();

       $this->start_controls_section(       
        'poster_shape2',
            [
                'label' => esc_html__( 'Background Shapes', 'axil-elements' ),    
                'condition'   => array( 'style' => array( '2') ),                
                          
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
                    'url' =>  $this->axil_get_img( 'shape10/bubble-2.png' ),
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
                   'url' =>  $this->axil_get_img( 'shape10/bubble-1.png' ),
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
    		$shape1 		=  $settings['shape1']['url'];
    		$shape2 		=  $settings['shape2']['url'];
    		$shape3 		=  $settings['shape3']['url'];
            
            $frame1         =  $settings['frame1']['url'];
            $frame2         =  $settings['frame2']['url'];

            $shape21         =  $settings['shape21']['url'];
            $shape22         =  $settings['shape22']['url'];
        if ( '1' == $settings['style']) {
	       ?>	 
        <div class="section section-padding-equal">
            <div class="container">
                <?php if( $settings['seation_video_section_title_on'] =='yes' ){ ?>  

                    <div class="section-heading text-<?php echo esc_attr( $settings['axil_video_section_align'] );?>">            
                        <?php  if($settings['axil_video_section_title_before']){ ?>
                            <span class="subtitle"><?php echo esc_attr( $settings['axil_video_section_title_before'] );?></span>
                        <?php  } ?> 

                    <?php if ($settings['axil_video_section_title_tag']) : ?>
                        <?php  if($settings['axil_video_section_title']){ ?>
                            <<?php echo esc_html( $settings['axil_video_section_title_tag'] );?> class="title">
                                <?php echo axil_kses_intermediate( $settings['axil_video_section_title'] );?>
                            </<?php echo esc_html( $settings['axil_video_section_title_tag'] );?>> 
                        <?php  } ?>             
                    <?php endif; ?>
                        <?php  if($settings['axil_sub_video_section_title']){ ?>
                            <p><?php echo axil_kses_intermediate( $settings['axil_sub_video_section_title'] );?></p>
                        <?php  } ?>
                    </div>
                <?php } ?>  
               <div class="about-expert">
                   <div class="thumbnail">
                      <?php echo Group_Control_Image_Size::get_attachment_image_html( $settings, 'image_size', 'image' );?>
                     
                     <?php if ( !empty( $settings['videourl']['url'] ) ): ?>
                       <div class="popup-video">
                           <a href="<?php echo esc_url( $simagev );?>" class="play-btn popup-youtube"><i class="fas fa-play"></i></a>
                       </div>
                <?php endif; ?>
                   </div>
                   <ul class="frame-shape">
                       <?php if( $frame1 ){ ?>   
                           <li class="shape shape-1"><img src="<?php echo esc_url( $frame1 );?>" alt="<?php echo axil_Elements_Helper::axil_get_image_alt( $settings['frame1']['id'] );?>"></li>
                       <?php } ?> 
                        <?php if( $frame2 ){ ?>  
                           <li class="shape shape-2"><img src="<?php echo esc_url( $frame2 );?>" alt="<?php echo axil_Elements_Helper::axil_get_image_alt( $settings['frame2']['id'] );?>"></li>
                        <?php } ?> 
                   </ul>
               </div>   
            </div>
            <?php if( $settings['shape_style_on']  =='yes' ){ ?>
                <ul class="shape-group-16 list-unstyled">
                    <?php if( $shape1 ){ ?>             
                        <li class="shape shape-1"><img src="<?php echo esc_url( $shape1 );?>" alt="<?php echo axil_Elements_Helper::axil_get_image_alt( $settings['shape1']['id'] );?>"></li>
                    <?php } ?> 
                    <?php if( $shape2 ){ ?>   
                        <li class="shape shape-2"><img src="<?php echo esc_url( $shape2 );?>" alt="<?php echo axil_Elements_Helper::axil_get_image_alt( $settings['shape2']['id'] );?>"></li>
                    <?php } ?> 
                    <?php if( $shape3 ){ ?>   
                        <li class="shape shape-3"><img src="<?php echo esc_url( $shape3 );?>" alt="<?php echo axil_Elements_Helper::axil_get_image_alt( $settings['shape3']['id'] );?>"></li>
                    <?php } ?>            
                </ul>
             <?php } ?>  
        </div>
        <?php }else{ ?>
        <div class="section-padding-equal case-study-solution bg-color-light">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                         <?php if( $settings['seation_video_section_title_on'] =='yes' ){ ?>  
                            <div class="section-heading heading-left heading-<?php echo esc_attr( $settings['axil_video_section_align'] );?>">            
                                <?php  if($settings['axil_video_section_title_before']){ ?>
                                    <span class="subtitle"><?php echo esc_attr( $settings['axil_video_section_title_before'] );?></span>
                                <?php  } ?> 

                            <?php if ($settings['axil_video_section_title_tag']) : ?>
                                <?php  if($settings['axil_video_section_title']){ ?>
                                    <<?php echo esc_html( $settings['axil_video_section_title_tag'] );?> class="title">
                                        <?php echo axil_kses_intermediate( $settings['axil_video_section_title'] );?>
                                    </<?php echo esc_html( $settings['axil_video_section_title_tag'] );?>> 
                                <?php  } ?>             
                            <?php endif; ?>
                                <?php  if($settings['axil_sub_video_section_title']){ ?>
                                    <p><?php echo axil_kses_intermediate( $settings['axil_sub_video_section_title'] );?></p>
                                <?php  } ?>
                            </div>
                        <?php } ?>  
                        <div class="about-expert">
                             <div class="thumbnail paralax-image">
                                <?php echo Group_Control_Image_Size::get_attachment_image_html( $settings, 'image_size', 'image' );?>
                               
                               <?php if ( !empty( $settings['videourl']['url'] ) ): ?>
                                 <div class="popup-video">
                                     <a href="<?php echo esc_url( $simagev );?>" class="play-btn popup-youtube"><i class="fas fa-play"></i></a>
                                 </div>
                                <?php endif; ?>
                             </div> 
                        </div> 
                    </div>
                </div>
            </div>
            <?php if( $settings['shape_style_on2']  =='yes' ){ ?>
            <ul class="shape-group-10 list-unstyled">
                <?php if( $shape21 ){ ?>             
                    <li class="shape shape-2"><img src="<?php echo esc_url( $shape21 );?>" alt="<?php echo axil_Elements_Helper::axil_get_image_alt( $settings['shape21']['id'] );?>"></li>
                <?php } ?> 
                <?php if( $shape22 ){ ?>   
                    <li class="shape shape-3"><img src="<?php echo esc_url( $shape22 );?>" alt="<?php echo axil_Elements_Helper::axil_get_image_alt( $settings['shape22']['id'] );?>"></li>
                <?php } ?>                            
            </ul>
            <?php } ?> 
        </div>
   <?php   }
     }
}