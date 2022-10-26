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
use Elementor\Icons_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
    class axil_process_box extends Widget_Base {
    use \Elementor\AxilElementCommonFunctions;
    public function get_name() {
            return 'axil-process-box';
        }    
        public function get_title() {
            return esc_html__( 'Process Area', 'axil-elements' );
        }
        public function get_icon() {
            return 'eicon-flip-box';
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

    $this->axil_section_title('process_boxs', 'Section Title', 'h2', true, 'center');
    $this->start_controls_section(
            'process_layout',
            [
                'label' => esc_html__('Process', 'axil-elements'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'process_two_image',
            [
                'label' => esc_html__('Upload Image', 'axil-elements'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                   'url' =>  $this->axil_get_img( 'banner/process-1.png' ),
                ],
            ]
        );
         
        $repeater->add_control(
            'process_two_before_title',
            [
                'label' => esc_html__('Tag Line', 'axil-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('our four step process', 'axil-elements'),
                'placeholder' => esc_html__('Type Before Heading Text', 'axil-elements'),
                'label_block' => true,
            ]
        );
         
        $repeater->add_control(
            'process_two_title', [
                'label' => esc_html__('Title', 'axil-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Process Title', 'axil-elements'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'process_two_content',
            [
                'label' => esc_html__('Description', 'axil-elements'),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 10,
                'default' => 'Donec metus lorem, vulputate at sapien sit amet, auctor iaculis lorem. In vel hendrerit nisi. Vestibulum eget risus velit. Aliquam tristique libero at dui sodales, et placerat orci lobortis. Maecenas ipsum neque, elementum id dignissim et, imperdiet vitae mauris.',
                'placeholder' => esc_html__('Type your description here', 'axil-elements'),
            ]
        );
        $this->add_control(
            'process_two_list',
            [
                'label' => esc_html__('Process List', 'axil-elements'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'process_two_title' => esc_html__('Discover', 'axil-elements'), 
                        'process_two_content' => esc_html__('Donec metus lorem, vulputate at sapien sit amet, auctor iaculis lorem. In vel hendrerit nisi. Vestibulum eget risus velit. Aliquam tristique libero at dui sodales, et placerat orci lobortis. Maecenas ipsum neque, elementum id dignissim et, imperdiet vitae mauris.', 'axil-elements'),
                    ],
                    [
                        'process_two_title' => esc_html__('Prototype', 'axil-elements'),
                        
                        'process_two_content' => esc_html__('Donec metus lorem, vulputate at sapien sit amet, auctor iaculis lorem. In vel hendrerit nisi. Vestibulum eget risus velit. Aliquam tristique libero at dui sodales, et placerat orci lobortis. Maecenas ipsum neque, elementum id dignissim et, imperdiet vitae mauris.', 'axil-elements'),
                    ],
                    [
                        'process_two_title' => esc_html__('Development', 'axil-elements'),
                        
                        'process_two_content' => esc_html__('Donec metus lorem, vulputate at sapien sit amet, auctor iaculis lorem. In vel hendrerit nisi. Vestibulum eget risus velit. Aliquam tristique libero at dui sodales, et placerat orci lobortis. Maecenas ipsum neque, elementum id dignissim et, imperdiet vitae mauris.', 'axil-elements'),
                    ],
                    [
                        'process_two_title' => esc_html__('Build', 'axil-elements'),
                        
                        'process_two_content' => esc_html__('Donec metus lorem, vulputate at sapien sit amet, auctor iaculis lorem. In vel hendrerit nisi. Vestibulum eget risus velit. Aliquam tristique libero at dui sodales, et placerat orci lobortis. Maecenas ipsum neque, elementum id dignissim et, imperdiet vitae mauris.', 'axil-elements'),
                    ],
                ],
                'title_field' => '{{{ process_two_title }}}',
            ]
        );

        $this->end_controls_section();
        $this->start_controls_section(       
        'poster_shape17',
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
        'shape_17_1',
        [
            'label' => esc_html__('Shape 1','axil-elements'),
            'type'=>Controls_Manager::MEDIA,                    
            'default' => [
                'url' =>  $this->axil_get_img( 'shape17/bubble-24.png' ),
            ],
            'condition' => array( 'shape_style_on' => array( 'yes' ) ),
            'dynamic' => [
                'active' => true,
            ],
                
        ]
    );      
    $this->add_control(
        'shape_17_2',
        [
            'label' => esc_html__('Shape 2','axil-elements'),
            'type'=>Controls_Manager::MEDIA,                    
            'default' => [
               'url' =>  $this->axil_get_img( 'shape17/bubble-23.png' ),
            ],
            'condition' => array( 'shape_style_on' => array( 'yes' ) ),
            'dynamic' => [
                'active' => true,
            ],
                
        ]
    );      
    $this->add_control(
        'shape_17_3',
        [
            'label' => esc_html__('Shape 3','axil-elements'),
            'type'=>Controls_Manager::MEDIA,                    
            'default' => [
               'url' =>  $this->axil_get_img( 'shape17/line-4.png' ),
            ],
            'condition' => array( 'shape_style_on' => array( 'yes' ) ),
            'dynamic' => [
                'active' => true,
            ],
                
        ]
    );   
    $this->add_control(
        'shape_17_4',
        [
            'label' => esc_html__('Shape 1','axil-elements'),
            'type'=>Controls_Manager::MEDIA,                    
            'default' => [
                'url' =>  $this->axil_get_img( 'shape17/line-5.png' ),
            ],
            'condition' => array( 'shape_style_on' => array( 'yes' ) ),
            'dynamic' => [
                'active' => true,
            ],
                
        ]
    );      
    $this->add_control(
        'shape_17_5',
        [
            'label' => esc_html__('Shape 2','axil-elements'),
            'type'=>Controls_Manager::MEDIA,                    
            'default' => [
               'url' =>  $this->axil_get_img( 'shape17/line-4.png' ),
            ],
            'condition' => array( 'shape_style_on' => array( 'yes' ) ),
            'dynamic' => [
                'active' => true,
            ],
                
        ]
    );      
    $this->add_control(
        'shape_17_6',
        [
            'label' => esc_html__('Shape 3','axil-elements'),
            'type'=>Controls_Manager::MEDIA,                    
            'default' => [
               'url' =>  $this->axil_get_img( 'shape17/line-5.png' ),
            ],
            'condition' => array( 'shape_style_on' => array( 'yes' ) ),
            'dynamic' => [
                'active' => true,
            ],
                
        ]
    );  

    $this->end_controls_section();
    $this->axil_basic_style_controls('process_two_pre_title', '- Tag Line', '.section-heading .subtitle');
    $this->axil_basic_style_controls('process_two_title', 'Title', '.section-heading .title');
    $this->axil_basic_style_controls('process_two_content', 'Content', '.section-heading p');
    $this->axil_basic_style_controls('process_two_process_pre_title', 'Process -Tag Lin', '.process-work .content .subtitle');
    $this->axil_basic_style_controls('process_two_process_title', 'Process Title', '.process-work .content .title');
    $this->axil_basic_style_controls('process_two_process_content', 'Process Content', '.process-work .content p');
   
}   
protected function render() {
    $settings = $this->get_settings();   
    ?>
        <section class="section section-padding bg-color-light pb--60 pb_lg--20">
            <div class="container">
                <?php if( $settings['seation_process_boxs_title_on'] =='yes' ){ ?>  
                    <div class="section-heading mb--90 heading-dark-<?php echo esc_attr( $settings['axil_process_boxs_align'] );?>">            
                        <?php  if($settings['axil_process_boxs_title_before']){ ?>
                            <span class="subtitle"><?php echo esc_attr( $settings['axil_process_boxs_title_before'] );?></span>
                        <?php  } ?> 
                    <?php if ($settings['axil_process_boxs_title_tag']) : ?>
                        <?php  if($settings['axil_process_boxs_title']){ ?>
                            <<?php echo esc_html( $settings['axil_process_boxs_title_tag'] );?> class="title">
                                <?php echo esc_attr( $settings['axil_process_boxs_title'] );?>
                            </<?php echo esc_html( $settings['axil_process_boxs_title_tag'] );?>> 
                        <?php  } ?>             
                    <?php endif; ?>
                    <?php  if($settings['axil_sub_process_boxs_title']){ ?>
                            <p><?php echo esc_attr( $settings['axil_sub_process_boxs_title'] );?></p>
                        <?php  } ?>
                    </div>
                <?php } ?>        
                <?php if($settings['process_two_list']){ ?> 
                <?php foreach ($settings['process_two_list'] as $index => $process){
                    $even = ($index % 2 !== 0) ? 'content-reverse' : '';
                    $text_align = ($index % 2 !== 0) ? 'text-left' : '';

                    $sal = ($index % 2 !== 0) ? 'slide-left' : 'slide-right';
                ?>

                <div class="process-work <?php echo esc_attr($even); ?> <?php echo esc_attr($text_align); ?> elementor-repeater-item-<?php echo $process['_id']; ?>" data-sal="<?php echo esc_attr($sal); ?>" data-sal-duration="1000" data-sal-delay="100">

                     
                        <div class="thumbnail">
                            <?php echo Group_Control_Image_Size::get_attachment_image_html($process, 'full', 'process_two_image'); ?>
                        </div>
                        <div class="content">
                            <?php if(!empty($process['process_two_before_title'])){ ?>
                            <span class="subtitle"><?php echo axil_kses_intermediate($process['process_two_before_title']); ?></span>
                            <?php } ?>
                            <?php if(!empty($process['process_two_title'])){ ?>
                            <h3 class="title"><?php echo axil_kses_intermediate($process['process_two_title']); ?></h3>
                            <?php } ?>
                            <?php if(!empty($process['process_two_content'])){ ?>
                            <p class="subtitle-2"><?php echo axil_kses_intermediate($process['process_two_content']); ?></p>
                            <?php } ?>
                       </div> 
                    </div> 
                <?php } ?>
            <?php } ?>
            </div>
            <?php if($settings['shape_style_on']  == 'yes' ){ 
                $shape1 =  $settings['shape_17_1']['url'];
                $shape2 =  $settings['shape_17_2']['url'];
                $shape3 =  $settings['shape_17_3']['url'];
                $shape4 =  $settings['shape_17_4']['url'];
                $shape5 =  $settings['shape_17_5']['url'];
                $shape6 =  $settings['shape_17_6']['url'];
                ?>
                <ul class="shape-group-17 list-unstyled">
                <?php if( $shape1 ){ ?>     
                    <li class="shape shape-1"><img src="<?php echo esc_url( $shape1 );?>" alt="<?php echo axil_Elements_Helper::axil_get_image_alt( $settings['shape_17_1']['id'] );?>"></li>
                <?php } ?>  
                <?php if( $shape2 ){ ?>     
                    <li class="shape shape-2"><img src="<?php echo esc_url( $shape2);?>" alt="<?php echo axil_Elements_Helper::axil_get_image_alt( $settings['shape_17_2']['id'] );?>"></li>
                <?php } ?> 
                <?php if( $shape3 ){ ?>     
                    <li class="shape shape-3"><img src="<?php echo esc_url( $shape3 );?>" alt="<?php echo axil_Elements_Helper::axil_get_image_alt( $settings['shape_17_3']['id'] );?>"></li>
                <?php } ?> 
                <?php if( $shape4 ){ ?>     
                    <li class="shape shape-4"><img src="<?php echo esc_url( $shape4 );?>" alt="<?php echo axil_Elements_Helper::axil_get_image_alt( $settings['shape_17_4']['id'] );?>"></li>
                <?php } ?> 
                <?php if( $shape5 ){ ?>     
                    <li class="shape shape-5"><img src="<?php echo esc_url( $shape5 );?>" alt="<?php echo axil_Elements_Helper::axil_get_image_alt( $settings['shape_17_5']['id'] );?>"></li>
                <?php } ?> 
                <?php if( $shape6 ){ ?>     
                    <li class="shape shape-6"><img src="<?php echo esc_url( $shape6 );?>" alt="<?php echo axil_Elements_Helper::axil_get_image_alt( $settings['shape_17_6']['id'] );?>"></li>
                <?php } ?> 
            </ul>
        <?php } ?>
    </section>
    <?php  
    }
}
