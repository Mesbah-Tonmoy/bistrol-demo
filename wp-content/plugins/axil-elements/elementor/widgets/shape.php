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
class Abstrak_shape extends Widget_Base {
use \Elementor\AxilElementCommonFunctions;
public function get_name() {
        return 'abstrak-shape';
    }    
    public function get_title() {
        return esc_html__( 'Shape', 'axil-elements' );
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
    

    $this->start_controls_section(       
        'poster_shape_style',
            [
                'label' => esc_html__( 'Shapes Layout', 'axil-elements' ),                   
                          
            ]
        );          
       $this->add_control(
            'style',
            [
                'label' => esc_html__( 'Shape Style', 'axil-elements' ),
                'type' => Controls_Manager::SELECT,
                'default' => '1',
                'options' => [
                    '1'   => esc_html__( 'Style 1', 'axil-elements' ),
                    '2'   => esc_html__( 'Style 2', 'axil-elements' ),
                    '3'   => esc_html__( 'Style 3', 'axil-elements' ),                           
                    '4'   => esc_html__( 'Style 4', 'axil-elements' ),                           
                    '5'   => esc_html__( 'Style 5', 'axil-elements' ),                           
                    '6'   => esc_html__( 'Style 6', 'axil-elements' ),                           
                    '7'   => esc_html__( 'Style 7', 'axil-elements' ),                           
                    '8'   => esc_html__( 'Style 8', 'axil-elements' ),                           
                    '9'   => esc_html__( 'Style 9', 'axil-elements' ),                           
                    '10'   => esc_html__( 'Style 10', 'axil-elements' ),                           
                    '11'   => esc_html__( 'Style 11', 'axil-elements' ),                           
                    '12'   => esc_html__( 'Style 12', 'axil-elements' ),                           
                   
                ],
            ] 
        );
    $this->end_controls_section();  

$this->start_controls_section(       
    'poster_shape2',
        [
            'label' => esc_html__( 'Background Shapes', 'axil-elements' ),        
               'condition'   => array( 'style' => '2' ),              
                      
        ]
    );          
    $this->add_control(
        'shape21',
        [
            'label' => esc_html__('Shape 1','axil-elements'),
            'type'=>Controls_Manager::MEDIA,                    
            'default' => [
                'url' =>  $this->axil_get_img( 'shape2/circle-1.png' ),
            ],
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
               'url' =>  $this->axil_get_img( 'shape2/line-3.png' ),
            ],
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
                   'url' =>  $this->axil_get_img( 'shape2/bubble-3.png' ),
                ],
                'dynamic' => [
                    'active' => true,
                ],
                    
            ]
        );  

     $this->end_controls_section();  


   $this->start_controls_section(       
    'poster_shape3',
        [
            'label' => esc_html__( 'Background Shapes', 'axil-elements' ),        
            'condition'   => array( 'style' => '3' ),              
                      
        ]
    );          
    $this->add_control(
        'shape31',
        [
            'label' => esc_html__('Shape 1','axil-elements'),
            'type'=>Controls_Manager::MEDIA,                    
            'default' => [
                'url' =>  $this->axil_get_img( 'shape3/line-1.png' ),
            ],
            'dynamic' => [
                'active' => true,
            ],
                
        ]
    );      
        $this->add_control(
            'shape32',
            [
                'label' => esc_html__('Shape 2','axil-elements'),
                'type'=>Controls_Manager::MEDIA,                    
                'default' => [
                   'url' =>  $this->axil_get_img( 'shape3/bubble-4.png' ),
                ],
                'dynamic' => [
                    'active' => true,
                ],
                    
            ]
        );      
        $this->add_control(
            'shape33',
            [
                'label' => esc_html__('Shape 3','axil-elements'),
                'type'=>Controls_Manager::MEDIA,                    
                'default' => [
                   'url' =>  $this->axil_get_img( 'shape3/hand-1.png' ),
                ],
                'dynamic' => [
                    'active' => true,
                ],
                    
            ]
        );  

      
    $this->end_controls_section(); 


   $this->start_controls_section(       
    'poster_shape4',
        [
            'label' => esc_html__( 'Background Shapes', 'axil-elements' ),        
            'condition'   => array( 'style' => '4' ),              
                      
        ]
    );          
    $this->add_control(
        'shape41',
        [
            'label' => esc_html__('Shape','axil-elements'),
            'type'=>Controls_Manager::MEDIA,                    
            'default' => [
                'url' =>  $this->axil_get_img( 'shape4/bubble-1.png' ),
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
            'label' => esc_html__( 'Background Shapes', 'axil-elements' ),        
            'condition'   => array( 'style' => '5' ),              
                      
        ]
    );          
    $this->add_control(
        'shape51',
        [
            'label' => esc_html__('Shape 1','axil-elements'),
            'type'=>Controls_Manager::MEDIA,                    
            'default' => [
                'url' =>  $this->axil_get_img( 'shape5/circle-1.png' ),
            ],
            'dynamic' => [
                'active' => true,
            ],
                
        ]
    );      
        $this->add_control(
            'shape52',
            [
                'label' => esc_html__('Shape 2','axil-elements'),
                'type'=>Controls_Manager::MEDIA,                    
                'default' => [
                   'url' =>  $this->axil_get_img( 'shape5/line-3.png' ),
                ],
                'dynamic' => [
                    'active' => true,
                ],
                    
            ]
        );      
        $this->add_control(
            'shape53',
            [
                'label' => esc_html__('Shape 3','axil-elements'),
                'type'=>Controls_Manager::MEDIA,                    
                'default' => [
                   'url' =>  $this->axil_get_img( 'shape5/bubble-5.png' ),
                ],
                'dynamic' => [
                    'active' => true,
                ],
                    
            ]
        );  
        $this->add_control(
            'shape54',
            [
                'label' => esc_html__('Shape 4','axil-elements'),
                'type'=>Controls_Manager::MEDIA,                    
                'default' => [
                   'url' =>  $this->axil_get_img( 'shape5/bubble-6.png' ),
                ],
                'dynamic' => [
                    'active' => true,
                ],
                    
            ]
        );  

      
    $this->end_controls_section(); 



   $this->start_controls_section(       
    'poster_shape6',
        [
            'label' => esc_html__( 'Background Shapes', 'axil-elements' ),        
            'condition'   => array( 'style' => '6' ),              
                      
        ]
    );          
    $this->add_control(
        'shape61',
        [
            'label' => esc_html__('Shape 1','axil-elements'),
            'type'=>Controls_Manager::MEDIA,                    
            'default' => [
                'url' =>  $this->axil_get_img( 'shape6/bubble-7.png' ),
            ],
            'dynamic' => [
                'active' => true,
            ],
                
        ]
    );      
        $this->add_control(
            'shape62',
            [
                'label' => esc_html__('Shape 2','axil-elements'),
                'type'=>Controls_Manager::MEDIA,                    
                'default' => [
                   'url' =>  $this->axil_get_img( 'shape6/line-4.png' ),
                ],
                'dynamic' => [
                    'active' => true,
                ],
                    
            ]
        );      
        $this->add_control(
            'shape63',
            [
                'label' => esc_html__('Shape 3','axil-elements'),
                'type'=>Controls_Manager::MEDIA,                    
                'default' => [
                   'url' =>  $this->axil_get_img( 'shape6/line-5.png' ),
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
            'label' => esc_html__( 'Background Shapes One', 'axil-elements' ),        
               'condition'   => array( 'style' => '1' ),              
                      
        ]
    );          
    $this->add_control(
        'shape1',
        [
            'label' => esc_html__('Shape 1','axil-elements'),
            'type'=>Controls_Manager::MEDIA,                    
            'default' => [
                'url' =>  $this->axil_get_img( 'blog/bubble-1.png' ),
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
                'default' => [
                   'url' =>  $this->axil_get_img( 'blog/line-1.png' ),
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
                'default' => [
                   'url' =>  $this->axil_get_img( 'blog/line-2.png' ),
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
                'default' => [
                   'url' =>  $this->axil_get_img( 'blog/bubble-2.png' ),
                ],
                'dynamic' => [
                    'active' => true,
                ],
                    
            ]
        ); 
    $this->end_controls_section(); 

   


   $this->start_controls_section(       
        'poster_shape7',
            [
                'label' => esc_html__( 'Background Shapes One', 'axil-elements' ),        
                   'condition'   => array( 'style' => '7' ),              
                          
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
                    
            ]
        );          
    $this->end_controls_section(); 



       $this->start_controls_section(       
        'poster_shape10',
            [
                'label' => esc_html__( 'Background Shapes One', 'axil-elements' ),        
                   'condition'   => array( 'style' => '10' ),              
                          
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
                    'dynamic' => [
                        'active' => true,
                    ],
                        
                ]
            );              
            $this->end_controls_section(); 

       $this->start_controls_section(       
        'poster_shape12',
            [
                'label' => esc_html__( 'Background Shapes One', 'axil-elements' ),        
                   'condition'   => array( 'style' => '12' ),              
                          
            ]
        );          

        $this->add_control(
            'shape_12_1',
            [
                'label' => esc_html__('Shape 1','axil-elements'),
                'type'=>Controls_Manager::MEDIA,                    
                'default' => [
                    'url' =>  $this->axil_get_img( 'shape12/bubble-2.png' ),
                ],
                'dynamic' => [
                    'active' => true,
                ],
                    
            ]
        );      

        $this->axil_shape_position( 'shape12_1' );

        $this->add_control(
                'shape_12_2',
                [
                    'label' => esc_html__('Shape 2','axil-elements'),
                    'type'=>Controls_Manager::MEDIA,                    
                    'default' => [
                       'url' =>  $this->axil_get_img( 'shape12/bubble-1.png' ),
                    ],
                    'dynamic' => [
                        'active' => true,
                    ],
                        
                ]
            );      
             $this->axil_shape_position( 'shape12_2' );
             
            $this->add_control(
                'shape_12_3',
                [
                    'label' => esc_html__('Shape 3','axil-elements'),
                    'type'=>Controls_Manager::MEDIA,                    
                    'default' => [
                       'url' =>  $this->axil_get_img( 'shape12/circle-3.png' ),
                    ],
                    'dynamic' => [
                        'active' => true,
                    ],
                        
                ]
            );             

            $this->axil_shape_position( 'shape12_3', 'shape-group-12', 'shape-group-12' ); 
            $this->end_controls_section(); 
            



        }      


    protected function render() {
    $settings = $this->get_settings();  

    if ($settings['style'] == '2') {       
        $shape21 =  $settings['shape21']['url'];
        $shape22 =  $settings['shape22']['url'];
        $shape23 =  $settings['shape23']['url'];
            ?>
        <ul class="shape-group-2 list-unstyled">

            <li class="shape shape-1"><img src="<?php echo esc_url( $shape21 );?>" alt="<?php esc_html__( 'circle', 'axil-elements' ); ?>"></li>
            <li class="shape shape-2"><img src="<?php echo esc_url( $shape22 );?>" alt="<?php esc_html__( 'circle', 'axil-elements' ); ?>"></li>
            <li class="shape shape-3"><img src="<?php echo esc_url( $shape23 );?>" alt="<?php esc_html__( 'circle', 'axil-elements' ); ?>"></li>
        </ul>

    <?php }elseif($settings['style'] == '3') {

        $shape1 =  $settings['shape31']['url'];
        $shape2 =  $settings['shape32']['url'];
        $shape3 =  $settings['shape33']['url']
     ?>

        <ul class="shape-group-3 list-unstyled">
            <?php if( $shape1 ){ ?>     
                <li class="shape shape-1"><img src="<?php echo esc_url( $shape1 );?>" alt="<?php esc_html__( 'circle', 'axil-elements' ); ?>"></li>
            <?php } ?> 
            <?php if( $shape2 ){ ?>     
                <li class="shape shape-2"><img src="<?php echo esc_url( $shape2 );?>" alt="<?php esc_html__( 'Line', 'axil-elements' ); ?>"></li>
            <?php } ?> 
            <?php if( $shape3 ){ ?>     
                <li class="shape shape-3"><img src="<?php echo esc_url( $shape3 );?>" alt="<?php esc_html__( 'Line', 'axil-elements' ); ?>"></li>
            <?php } ?> 
        </ul>  

    <?php }elseif($settings['style'] == '7') {

        $shape1 =  $settings['shape_7_1']['url'];
        $shape2 =  $settings['shape_7_2']['url'];
        $shape3 =  $settings['shape_7_3']['url']
     ?>


        <ul class="shape-group-7 list-unstyled">
            <?php if( $shape1 ){ ?>     
                <li class="shape shape-1"><img src="<?php echo esc_url( $shape1 );?>" alt="<?php esc_html__( 'circle', 'axil-elements' ); ?>"></li>
            <?php } ?> 
            <?php if( $shape2 ){ ?>     
                <li class="shape shape-2"><img src="<?php echo esc_url( $shape2 );?>" alt="<?php esc_html__( 'Line', 'axil-elements' ); ?>"></li>
            <?php } ?> 
            <?php if( $shape3 ){ ?>     
                <li class="shape shape-3"><img src="<?php echo esc_url( $shape3 );?>" alt="<?php esc_html__( 'Line', 'axil-elements' ); ?>"></li>
            <?php } ?> 
        </ul> 

 <?php }elseif($settings['style'] == '5') {

        $shape1 =  $settings['shape51']['url'];
        $shape2 =  $settings['shape52']['url'];
        $shape3 =  $settings['shape53']['url'];
        $shape4 =  $settings['shape54']['url'];
     ?>

        <ul class="shape-group-5 list-unstyled">
            <?php if( $shape1 ){ ?>     
                <li class="shape shape-1"><img src="<?php echo esc_url( $shape1 );?>" alt="<?php esc_html__( 'circle', 'axil-elements' ); ?>"></li>
            <?php } ?> 
            <?php if( $shape2 ){ ?>     
                <li class="shape shape-2"><img src="<?php echo esc_url( $shape2 );?>" alt="<?php esc_html__( 'Line', 'axil-elements' ); ?>"></li>
            <?php } ?> 
            <?php if( $shape3 ){ ?>     
                <li class="shape shape-3"><img src="<?php echo esc_url( $shape3 );?>" alt="<?php esc_html__( 'Line', 'axil-elements' ); ?>"></li>
            <?php } ?> 
            <?php if( $shape4 ){ ?>     
                <li class="shape shape-4"><img src="<?php echo esc_url( $shape4 );?>" alt="<?php esc_html__( 'Line', 'axil-elements' ); ?>"></li>
            <?php } ?> 
        </ul> 

        <?php }elseif($settings['style'] == '6') {
            
            $shape1 =  $settings['shape61']['url'];
            $shape2 =  $settings['shape62']['url'];
            $shape3 =  $settings['shape63']['url'];
         ?>

        <ul class="shape-group-6 list-unstyled">
            <?php if( $shape1 ){ ?>     
                <li class="shape shape-1"><img src="<?php echo esc_url( $shape1 );?>" alt="<?php esc_html__( 'circle', 'axil-elements' ); ?>"></li>
            <?php } ?> 
            <?php if( $shape2 ){ ?>     
                <li class="shape shape-2"><img src="<?php echo esc_url( $shape2 );?>" alt="<?php esc_html__( 'Line', 'axil-elements' ); ?>"></li>
            <?php } ?> 
            <?php if( $shape3 ){ ?>     
                <li class="shape shape-3"><img src="<?php echo esc_url( $shape3 );?>" alt="<?php esc_html__( 'Line', 'axil-elements' ); ?>"></li>
            <?php } ?> 
        </ul>

  <?php }elseif($settings['style'] == '10') {

        $shape1 =  $settings['shape_10_1']['url'];
        $shape2 =  $settings['shape_10_2']['url'];
        $shape3 =  $settings['shape_10_3']['url'];
     ?>

    <ul class="shape-group-10 list-unstyled">
        <?php if( $shape1 ){ ?>     
            <li class="shape shape-1"><img src="<?php echo esc_url( $shape1 );?>" alt="<?php esc_html__( 'circle', 'axil-elements' ); ?>"></li>
        <?php } ?> 
        <?php if( $shape2 ){ ?>     
            <li class="shape shape-2"><img src="<?php echo esc_url( $shape2 );?>" alt="<?php esc_html__( 'Line', 'axil-elements' ); ?>"></li>
        <?php } ?> 
        <?php if( $shape3 ){ ?>     
            <li class="shape shape-3"><img src="<?php echo esc_url( $shape3 );?>" alt="<?php esc_html__( 'Line', 'axil-elements' ); ?>"></li>
        <?php } ?> 
    </ul>

    <?php }elseif($settings['style'] == '12') {

        $shape1 =  $settings['shape_12_1']['url'];
        $shape2 =  $settings['shape_12_2']['url'];
        $shape3 =  $settings['shape_12_3']['url'];
     ?>

    <ul class="shape-group-12 list-unstyled">
        <?php if( $shape1 ){ ?>     
            <li class="shape shape-1 ax-pos-<?php echo esc_attr( $settings['axil_shape12_1_pos_y_type'] );?> ax-pos-<?php echo esc_attr( $settings['axil_shape12_1_pos_x_type'] );?>"><img src="<?php echo esc_url( $shape1 );?>" alt="<?php esc_html__( 'circle', 'axil-elements' ); ?>"></li>
        <?php } ?> 
        <?php if( $shape2 ){ ?>     
            <li class="shape shape-2 ax-pos-<?php echo esc_attr( $settings['axil_shape12_2_pos_y_type'] );?> ax-pos-<?php echo esc_attr( $settings['axil_shape12_2_pos_x_type'] );?>"><img src="<?php echo esc_url( $shape2 );?>" alt="<?php esc_html__( 'Line', 'axil-elements' ); ?>"></li>
        <?php } ?> 
        <?php if( $shape3 ){ ?>     
            <li class="shape shape-3 ax-pos-<?php echo esc_attr( $settings['axil_shape12_3_pos_y_type'] );?> ax-pos-<?php echo esc_attr( $settings['axil_shape12_3_pos_x_type'] );?>"><img src="<?php echo esc_url( $shape3 );?>" alt="<?php esc_html__( 'Line', 'axil-elements' ); ?>"></li>
        <?php } ?> 
    </ul>


    <?php }else { 
        $shape1 =  $settings['shape1']['url'];
        $shape2 =  $settings['shape2']['url'];
        $shape3 =  $settings['shape3']['url'];
        $shape4 =  $settings['shape4']['url']; 
        ?> 
         <ul class="shape-group-1 list-unstyled">
            <?php if( $shape1 ){ ?>             
            <li class="shape shape-1"><img src="<?php echo esc_url( $shape1 );?>" alt="bubble"></li>
            <?php } ?> 
            <?php if( $shape2 ){ ?>   
            <li class="shape shape-2"><img src="<?php echo esc_url( $shape2 );?>" alt="bubble"></li>
            <?php } ?> 
            <?php if( $shape3 ){ ?>   
            <li class="shape shape-3"><img src="<?php echo esc_url( $shape3 );?>" alt="bubble"></li>
            <?php } ?> 
            <?php if( $shape4 ){ ?>   
            <li class="shape shape-4"><img src="<?php echo esc_url( $shape4 );?>" alt="bubble"></li>
            <?php } ?> 
        </ul>
    <?php  } 
        
    ?>

       <?php   

    }
}
