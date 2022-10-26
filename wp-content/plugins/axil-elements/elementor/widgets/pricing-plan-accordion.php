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
class axil_faq_section_title extends Widget_Base {
use \Elementor\AxilElementCommonFunctions;
public function get_name() {
        return 'axil-faq-section';
    }    
    public function get_title() {
        return esc_html__( 'Faq & Section Title', 'axil-elements' );
    }
    public function get_icon() {
        return 'eicon-post-list';
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
        $this->axil_section_title('faq_section_title', 'Section Title', 'h2', true, 'left');
        $this->axil_basic_style_controls('faq_section_title_pre_title', 'Tag Line', '.section-heading .subtitle');
        $this->axil_basic_style_controls('faq_section_title_title', 'Title', '.faq-area .section-heading .title');
        $this->axil_basic_style_controls('faq_section_title_description', 'Description', '.faq-area .section-heading p');

        $this->start_controls_section(
            'faq_section',
            [
                'label' => esc_html__( 'Accordion', 'axil-elements' ),
            ]
        ); 
        $repeater = new Repeater();
        $repeater->add_control(
            'faq_title', [
                'label' => esc_html__('Title', 'axil-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Accordion Title', 'axil-elements'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'faq_content',
            [
                'label' => esc_html__('Description', 'axil-elements'),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 10,
                'default' => esc_html__('We design professional looking yet simple websites. Our designs are search engine and user friendly.', 'axil-elements'),
                'placeholder' => esc_html__('Type your description here', 'axil-elements'),
            ]
        );
        $this->add_control(
            'faq_list',
            [
                'label' => esc_html__('Accordion List', 'axil-elements'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'faq_title' => esc_html__('Strategy', 'axil-elements'),
                        'faq_content' => esc_html__('Aenean hendrerit laoreet vehicula. Nullam convallis augue at enim gravida pellentesque.', 'axil-elements'),
                    ],
                    [
                        'faq_title' => esc_html__('Design', 'axil-elements'),
                        'faq_content' => esc_html__('Aenean hendrerit laoreet vehicula. Nullam convallis augue at enim gravida pellentesque.', 'axil-elements'),
                    ],
                    [
                        'faq_title' => esc_html__('Development', 'axil-elements'),
                        'faq_content' => esc_html__('Aenean hendrerit laoreet vehicula. Nullam convallis augue at enim gravida pellentesque.', 'axil-elements'),
                    ],
                ],
                'title_field' => '{{{ faq_title }}}',
            ]
        );
    $this->end_controls_section();
    $this->start_controls_section(
            'title_style_section',
            [
                'label' => esc_html__( 'Faq Title', 'axil-elements' ),
                'tab' => Controls_Manager::TAB_STYLE,                
            ]
        );
        $this->add_control(
            'title_color',
            [
                'label' => esc_html__( 'Color', 'axil-elements' ),
                'type' => Controls_Manager::COLOR,  
                'default' => '',
                
                'selectors' => array(
                    '{{WRAPPER}} .faq-accordion .accordion-item .accordion-button.collapsed' => 'color: {{VALUE}}',
                ),
            ]
        ); 
        $this->add_control(
            'title_hover_color',
            [
                'label' => esc_html__( 'Active Color', 'axil-elements' ),
                'type' => Controls_Manager::COLOR,  
                'default' => '',
                
                'selectors' => array(
                    '{{WRAPPER}} .faq-accordion  .accordion-item .accordion-button' => 'color: {{VALUE}}',
                ),
            ]
        ); 
        $this->add_control(
            'title_bg_color',
            [
                'label' => esc_html__( ' background Color', 'axil-elements' ),
                'type' => Controls_Manager::COLOR,  
                'default' => '',
                
                'selectors' => array(
                    '{{WRAPPER}} .faq-accordion .accordion-item  .accordion-button.collapsed' => 'background: {{VALUE}}',
                ),
            ]
        ); 
        $this->add_control(
            'title_bg_active_color',
            [
                'label' => esc_html__( 'Active background Color', 'axil-elements' ),
                'type' => Controls_Manager::COLOR,  
                'default' => '',
                
                'selectors' => array(
                    '{{WRAPPER}} .faq-accordion .accordion-item  .accordion-button' => 'background: {{VALUE}}',
                ),
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_font_size',
                'label' => esc_html__( 'Typography', 'axil-elements' ),                
                 
                'selector' => '{{WRAPPER}} .faq-accordion  .accordion-item .accordion-button.collapsed, {{WRAPPER}} .faq-accordion  .accordion-item .accordion-button',
            ]
        );
        $this->add_responsive_control(
            'title_padding',
            [
                'label' => esc_html__( 'Margin', 'axil-elements' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                 
                'selectors' => [
                    '{{WRAPPER}} .faq-accordion  .accordion-item .accordion-button.collapsed' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    
                ],
            ]
        );
       
    $this->end_controls_section();
    $this->start_controls_section(
            'subtitle_style_section',
            [
                'label' => __( 'Faq Content', 'axil-elements' ),
                'tab' => Controls_Manager::TAB_STYLE,                
            ]
        );
        $this->add_control(
            'subtitle_color',
            [
                'label' => __( 'Color', 'axil-elements' ),
                'type' => Controls_Manager::COLOR,  
                'default' => '',
                
                'selectors' => array(
                    '{{WRAPPER}} .faq-accordion .accordion-body' => 'color: {{VALUE}}',
                ),
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle_font_size',
                'label' => __( 'Typography', 'axil-elements' ),                
                 
                'selector' => '{{WRAPPER}} .faq-accordion .accordion-body',
            ]
        );
        $this->add_responsive_control(
            'subtitle_padding',
            [
                'label' => __( 'Padding', 'axil-elements' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                 
                'selectors' => [
                    '{{WRAPPER}} .faq-accordion .accordion-body' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    
                ],
            ]
        );
        
    $this->end_controls_section();  

    $this->start_controls_section(       
    'poster_shape6',
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
            'condition' => array( 'shape_style_on' => array( 'yes' ) ),
                
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
            'condition' => array( 'shape_style_on' => array( 'yes' ) ),
                
        ]
    );      
     $this->add_control(
        'shape63',
        [
            'label' => esc_html__('Shape 3','axil-elements'),
            'type'=>Controls_Manager::MEDIA,                    
            'default' => [
               'url' =>  $this->axil_get_img( 'shape6/poses-lady.png' ),
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
        ?> 
        <div class="section section-padding-equal bg-color-light faq-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-xl-4"> 
                    <?php if( $settings['seation_faq_section_title_title_on'] =='yes' ){ ?>
                        <div class="section-heading  heading-dark-<?php echo esc_attr( $settings['axil_faq_section_title_align'] );?>">            
                            <?php  if($settings['axil_faq_section_title_title_before']){ ?>
                                <span class="subtitle"><?php echo esc_attr( $settings['axil_faq_section_title_title_before'] );?></span>
                            <?php  } ?> 
                            <?php if ($settings['axil_faq_section_title_title_tag']) : ?>
                                <?php  if($settings['axil_faq_section_title_title']){ ?>
                                    <<?php echo esc_html( $settings['axil_faq_section_title_title_tag'] );?> class="title">
                                        <?php echo esc_attr( $settings['axil_faq_section_title_title'] );?>
                                    </<?php echo esc_html( $settings['axil_faq_section_title_title_tag'] );?>> 
                                <?php  } ?>             
                            <?php endif; ?>
                            <?php  if($settings['axil_sub_faq_section_title_title']){ ?>
                                <p><?php echo esc_attr( $settings['axil_sub_faq_section_title_title'] );?></p>
                            <?php  } ?>
                        </div>
                    <?php } ?> 
                </div>
                <div class="col-lg-7 col-xl-8"> 
                   
                   <?php if( $settings['faq_list'] ){ ?> 
                       <div class="faq-accordion">               
                        <div id="accordion-<?php echo $this->get_id(); ?>" class="accordion" data-sal="slide-up" data-sal-duration="800" data-sal-delay="100">
                          <?php foreach ($settings['faq_list'] as $index => $accordion){

                               $expanded = ( $index == 0 ) ? "true" : "false";
                               $show = ( $index == 0 ) ? "show" : "";
                               $collapsed = ( $index !== 0 ) ? "collapsed" : "";
                               ?>

                               <div class="accordion-item elementor-repeater-item-<?php echo $accordion['_id']; ?>">
                                   <h6 class="accordion-header" id="headingOne-<?php echo esc_attr( $index ); ?>">
                                       <button class="accordion-button <?php echo esc_attr( $collapsed ); ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-<?php echo esc_attr($index); ?>" aria-expanded="<?php echo esc_attr($expanded); ?>" aria-controls="collapse-<?php echo esc_attr( $index ); ?>">   
                                           <span><?php echo esc_html( $accordion['faq_title'] ); ?></span>
                                       </button>
                                   </h6>
                                   <div id="collapse-<?php echo esc_attr($index); ?>" class="accordion-collapse collapse <?php echo esc_attr( $show ); ?>" aria-labelledby="headingOne-<?php echo esc_attr($index); ?>" data-bs-parent="#accordion-<?php echo $this->get_id(); ?>">
                                       <div class="accordion-body">
                                         <p><?php echo axil_kses_intermediate( $accordion['faq_content'] ); ?></p> 
                                       </div>
                                   </div>
                               </div>                        
                           <?php } ?>
                           </div>
                       </div>
                   <?php } ?>
                </div>
            </div>
        </div>
        <?php 
        $shape1 =  $settings['shape61']['url'];
        $shape2 =  $settings['shape62']['url'];
        $shape3 =  $settings['shape63']['url'];
            
         ?>
        <?php if( $settings['shape_style_on'] == 'yes' ){  ?>

        <ul class="shape-group-6 list-unstyled">
            <?php if( $shape1 ){ ?>     
                <li class="shape shape-1" data-sal="slide-right" data-sal-duration="800" data-sal-delay="100"><img src="<?php echo esc_url( $shape1 );?>" alt="<?php echo axil_Elements_Helper::axil_get_image_alt( $settings['shape61']['id'] );?>"></li>
            <?php } ?> 
            <?php if( $shape2 ){ ?>     
                <li class="shape shape-2" data-sal="slide-down" data-sal-duration="800" data-sal-delay="100"><img src="<?php echo esc_url( $shape2 );?>" alt="<?php echo axil_Elements_Helper::axil_get_image_alt( $settings['shape62']['id'] );?>"></li>
            <?php } ?> 
            <?php if( $shape3 ){ ?>  
                <li class="shape shape-4" data-sal="slide-right" data-sal-duration="800" data-sal-delay="100"><img src="<?php echo esc_url( $shape3 );?>" alt="<?php echo axil_Elements_Helper::axil_get_image_alt( $settings['shape63']['id'] );?>"></li>
            <?php } ?> 
        </ul>
 


        <?php } ?> 
        </div>


    <?php          

    }
}
