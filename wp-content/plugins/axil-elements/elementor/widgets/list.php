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

class axil_list  extends Widget_Base {

 public function get_name() {
        return 'abstrak-list';
    }    
    public function get_title() {
        return esc_html__( 'Abstrak List ', 'axil-elements' );
    }
    public function get_icon() {
        return 'eicon-price-table';
    }
    public function get_categories() {
        return [ ABSTRAK_ELEMENTS_THEME_PREFIX . '-widgets' ];
    }

    protected function register_controls() {
         
        $this->start_controls_section(
            'sec_option_list',
            [
                'label' => esc_html__('Option List','axil-elements'),
                
            ]
        );

        $repeater = new Repeater();
        $repeater->add_control(
            'list_title',
            [
                'label' => esc_html__('List Title','axil-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('10 Pages Responsive Website','axil-elements'),
                'placeholder' => esc_html__('Type Heading Text','axil-elements'),
                'label_block' => true,
            ]
        );
              
        $this->add_control(
            'option_list',
            [
                'label' => esc_html__('option List','axil-elements'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'list_title' => esc_html__('10 Pages Responsive Website','axil-elements'),
                        
                    ],
                    [
                        'list_title' => esc_html__('5 PPC Campaigns','axil-elements'),
                        
                    ],
                    [
                        'list_title' => esc_html__('10 SEO Keywords','axil-elements'),
                        
                    ],
                    [
                        'list_title' => esc_html__('5 Facebook Camplaigns','axil-elements'),
                        
                    ]
                ],
                'title_field' => '{{{ list_title }}}',
            ]
        );
        $this->end_controls_section();
        
    $this->start_controls_section(
        'list_style_section',
        [
            'label' => esc_html__( 'List', 'axil-elements' ),
            'tab' => Controls_Manager::TAB_STYLE,                
        ]
    );
    $this->add_control(
        'list_color',
        [
            'label' => esc_html__( 'Color', 'axil-elements' ),
            'type' => Controls_Manager::COLOR,  
            'default' => '',
           
            'selectors' => array(
                '{{WRAPPER}} .pricing-table .pricing-body li' => 'color: {{VALUE}}',
                '{{WRAPPER}} .abstrak-list li' => 'color: {{VALUE}}',
            ),
        ]
    );

     $this->add_group_control(
        Group_Control_Typography::get_type(),
        [
            'name' => 'list_font_size',
            'label' => esc_html__( 'Typography', 'axil-elements' ),                
            
            'selector' => '{{WRAPPER}} .pricing-table .pricing-body li, {{WRAPPER}} .abstrak-list li',
        ]
    );
   
    $this->add_responsive_control(
        'list_margin',
        [
            'label' => esc_html__( 'Margin', 'axil-elements' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em' ],
            
            'selectors' => [
                '{{WRAPPER}} .pricing-table .pricing-body li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                '{{WRAPPER}} .abstrak-list li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );
    $this->end_controls_section();
}
	protected function render() {
		$settings = $this->get_settings();	
        
		?>	
         
        <ul class="list-unstyled abstrak-list">
            <?php foreach ($settings['option_list'] as $option_list) { ?>
                <li><?php echo esc_attr( $option_list['list_title'] );?></li>
            <?php } ?>  
        </ul>
            
    <?php
	}
}