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

class axil_funfact_box extends Widget_Base {

 public function get_name() {
        return 'axil-funfact-box';
    }    
    public function get_title() {
        return __( 'Counterup Box', 'axil-elements' );
    }
    public function get_icon() {
        return 'eicon-icon-box';
    }
    public function get_categories() {
        return [ ABSTRAK_ELEMENTS_THEME_PREFIX . '-widgets' ];
    }

    protected function register_controls() {
              
        $this->start_controls_section(
            'funfact_layout_panel',
            [
                'label' => __( 'General', 'axil-elements' ),
            ]
        ); 
      
        $this->add_control(
            'style',
            [
                'label' => esc_html__( 'Layouts', 'axil-elements' ),
                'type' => Controls_Manager::SELECT,
                'default' => '1',                
                'options' => [
                    '1'   => esc_html__( 'Layouts One', 'axil-elements' ),
                    '2'   => esc_html__( 'Layouts Two', 'axil-elements' ),                  
                    
                ],
            ] 
        );

          $this->add_control(
                'recommended_on',
                [
                    'label' => esc_html__( 'Active', 'axil-elements' ),
                    'type' => Controls_Manager::SWITCHER,
                    'label_on'    => esc_html__( 'On', 'axil-elements' ),
                    'label_off'   => esc_html__( 'Off', 'axil-elements' ),
                    'default'     => 'no',
                   
                ]
            );

        $this->add_control(
            'funfact_icon_type',
            [
                'label' => esc_html__('Select Light Icon Type', 'axil-elements'),
                'type' =>  Controls_Manager::SELECT,
                'default' => 'image',
                'options' => [
                    'image' => esc_html__('Image', 'axil-elements'),
                    'icon' => esc_html__('Icon', 'axil-elements'),
                ],
            ]
        );

         $this->add_control(
            'funfact_image',
            [
                'label' => esc_html__('Upload Image', 'axil-elements'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'funfact_icon_type' => 'image'
                ]

            ]
        );
        $this->add_group_control(
                Group_Control_Image_Size::get_type(),
                [
                    'name' => 'image_size',
                    'default' => 'large',
                    'separator' => 'none',
                     'condition' => [
                                'funfact_icon_type' =>'image',
                            ], 
                ]
            );
    
         
        $this->add_control(
            'funfact_selected_icon',
            [
                'show_label' => false,
                'type' => Controls_Manager::ICONS,
                'fa4compatibility' => 'icon',
                'label_block' => true,
                'default' => [
                    'value' => 'fas fa-pen-nib',
                    'library' => 'fa-solid',
                ],
                'condition' => [
                    'funfact_icon_type' => 'icon'
                ]
            ]
        );



         $this->add_control(
            'funfact_icon_type2',
            [
                'label' => esc_html__('Select Dark Icon Type', 'axil-elements'),
                'type' =>  Controls_Manager::SELECT,
                'default' => 'image',
                'options' => [
                    'image' => esc_html__('Image', 'axil-elements'),
                    'icon' => esc_html__('Icon', 'axil-elements'),
                ],
                 'condition' => [
                        'style' =>'2',
                    ], 
            ]
        );

         $this->add_control(
            'funfact_image2',
            [
                'label' => esc_html__('Upload Image', 'axil-elements'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'funfact_icon_type2' => 'image',
                      'style' =>'2'
                ]

            ]
        );
        $this->add_group_control(
                Group_Control_Image_Size::get_type(),
                [
                    'name' => 'image_size2',
                    'default' => 'large',
                    'separator' => 'none',
                     'condition' => [
                                'funfact_icon_type2' =>'image',
                                  'style' =>'2',
                            ], 
                ]
            );
    
         
        $this->add_control(
            'funfact_selected_icon2',
            [
                'show_label' => false,
                'type' => Controls_Manager::ICONS,
                'fa4compatibility' => 'icon',
                'label_block' => true,
                'default' => [
                    'value' => 'fas fa-pen-nib',
                    'library' => 'fa-solid',
                ],
                'condition' => [
                    'funfact_icon_type2' => 'icon',
                      'style' =>'2',
                ]
            ]
        );



      $this->add_control(
            'funfact_title', [
                'label' => esc_html__('Title', 'axil-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Funfact Title', 'axil-elements'),
                'label_block' => true,
            ]
        );

       $this->add_control(
            'funfact_number',
            [
                'label' => esc_html__('Number', 'axil-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => '50',
                'label_block' => true,
            ]
        ); 

       $this->add_control(
            'funfact_number_sup',
            [
                'label' => esc_html__('Funfact Number Sup', 'axil-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => '+',
                'label_block' => true,
            ]
        );


       $this->end_controls_section();  

	
     $this->start_controls_section(
        'title_style_section',
            [
                'label' => __( 'Title', 'axil-elements' ),
                'tab' => Controls_Manager::TAB_STYLE,                
            ]
        );
        $this->add_control(
            'title_color',
            [
                'label' => __( 'Color', 'axil-elements' ),
                'type' => Controls_Manager::COLOR,  
                'default' => '',               
                'selectors' => array(
                    '{{WRAPPER}} .title' => 'color: {{VALUE}}',
                ),
            ]
        );

         $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_font_size',
                'label' => __( 'Typography', 'axil-elements' ),                
                
                'selector' => '{{WRAPPER}} .title',
            ]
        );
       
        $this->add_responsive_control(
            'title_margin',
            [
                'label' => __( 'Margin', 'axil-elements' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                
                'selectors' => [
                    '{{WRAPPER}} .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    
                ],
            ]
        );
        
    $this->end_controls_section();

    $this->start_controls_section(
            'subtitle_style_section',
            [
                'label' => __( 'Number', 'axil-elements' ),
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
                    '{{WRAPPER}} .count-number span' => 'color: {{VALUE}}',
                ),
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle_font_size',
                'label' => __( 'Typography', 'axil-elements' ),                
                 
                'selector' => '{{WRAPPER}} .count-number span',
            ]
        );
        $this->add_responsive_control(
            'subtitle_margin',
            [
                'label' => __( 'Margin', 'axil-elements' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                 
                'selectors' => [
                    '{{WRAPPER}} .count-number span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    
                ],
            ]
        );
        
    $this->end_controls_section();
  
}
	protected function render() {
	$settings = $this->get_settings();
    $active =    $settings['recommended_on'] == 'yes' ? 'active' : 'no-active'; 

    if ($settings['style'] == '1') {   
    ?>
     <div class="counterup-progress <?php echo esc_attr( $active );?>">
        <?php if ( $settings['funfact_icon_type'] == 'image' ): ?>
            <div class="icon">
                <?php echo Group_Control_Image_Size::get_attachment_image_html( $settings, 'image_size', 'funfact_image' );?> 
            </div>
        <?php else: ?>
            <div class="icon">
                <?php Icons_Manager::render_icon( $settings['funfact_selected_icon'] ); ?>
            </div>
        <?php endif; ?>  

        <div class="count-number h2">
            <span class="number count" data-count="<?php echo esc_attr( $settings['funfact_number'] );?>"><?php echo esc_attr( $settings['funfact_number'] );?></span>
            <span class="symbol"><?php echo esc_attr( $settings['funfact_number_sup'] ); ?></span>
        </div>
        <h6 class="title"><?php echo esc_attr( $settings['funfact_title'] );?></h6>
    </div>
    <?php }else {  ?>
     <div class="counterup-progress  counterup-style-2 <?php echo esc_attr( $active );?>">
        <?php if ( $settings['funfact_icon_type'] == 'image' ): ?>
            <div class="icon">
                <?php 
                echo wp_get_attachment_image( $settings['funfact_image']['id'], array('60', '60'), "", array( "class" => "dark-icon" ) );  
                echo wp_get_attachment_image( $settings['funfact_image2']['id'], array('60', '60'), "", array( "class" => "light-icon" ) );  
  
                ?> 
            </div>
        <?php else: ?>
            <div class="icon">
                <?php Icons_Manager::render_icon( $settings['funfact_selected_icon'] ); ?>
            </div>
        <?php endif; ?>  

        <div class="count-number h2">
            <span class="number count"  data-count="<?php echo esc_attr( $settings['funfact_number'] );?>"><?php echo esc_attr( $settings['funfact_number'] );?></span>
            <span class="symbol"><?php echo esc_attr( $settings['funfact_number_sup'] ); ?></span>
        </div>
        <h6 class="title"><?php echo esc_attr( $settings['funfact_title'] );?></h6>
    </div>
    <?php } ?>
    <?php 
	}
}