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


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
class axil_followers extends Widget_Base {

  use \Elementor\AxilElementCommonFunctions;

 public function get_name() {
        return 'axil-followers';
    }    

    public function get_title() {
        return esc_html__( 'Followers', 'axil-elements' );
    }
    public function get_icon() {
          return 'eicon-social-icons';
    }

    public function get_categories() {
        return [ ABSTRAK_ELEMENTS_THEME_PREFIX . '-widgets' ];
    }
    protected function register_controls() {
      
		$this->start_controls_section(
            'axil-elements_followers',
            [
                'label' => esc_html__('Followers', 'axil-elements'),
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'followers_title', [
                'label' => esc_html__('Title', 'axil-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Followers Title', 'axil-elements'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'followers_link',
            [
                'label' => esc_html__('Link', 'axil-elements'),
                'type' => Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'axil-elements'),
                'show_external' => true,
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );
        $repeater->add_control(
            'followers_icon', [
                'label' => esc_html__('Add icons markup', 'axil-elements'),
                'description' => esc_html__('Add icon markup like: <i class="fab fa-dribbble"></i>', 'axil-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => '<i class="fab fa-dribbble"></i>',
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'followers_icon_color',
            [
                'label' => esc_html__('Color', 'axil-elements'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}} a i' => 'background-color: {{VALUE}} !important;',
                ],
            ]
        );
        $repeater->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'followers_icon_color_shadow',
                'label' => esc_html__( 'Box Shadow', 'axil-elements' ),
                'selector' => '{{WRAPPER}} {{CURRENT_ITEM}} a i',
            ]
        );
        $repeater->add_control(
            'followers_custom_class', [
                'label' => esc_html__('Add custom class', 'axil-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => 'dribbble',
                'label_block' => true,
            ]
        );

        $this->add_control(
            'followers',
            [
                'label' => esc_html__('Repeater Followers', 'axil-elements'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'followers_title' => esc_html__('60k Followers', 'axil-elements'),
                        'followers_icon' => '<i class="fab fa-dribbble"></i>',
                        'followers_icon_color' => '#EA4C89',
                        'followers_custom_class' => 'dribbble',
                    ],
                    [
                        'followers_title' => esc_html__('30k Followers', 'axil-elements'),
                        'followers_icon' => '<i class="fab fa-behance"></i>',
                        'followers_icon_color' => '#0067FF',
                        'followers_custom_class' => 'behance',
                    ],
                    [
                        'followers_title' => esc_html__('13k Followers', 'axil-elements'),
                        'followers_icon' => '<i class="fab fa-linkedin-in"></i>',
                        'followers_icon_color' => '#0177AC',
                        'followers_custom_class' => 'linkedin',
                    ],

                ],
                'title_field' => '{{{ followers_title }}}',
            ]
        );

        $this->end_controls_section();


            // Style Title tab section
            $this->start_controls_section(
                'title_style_section',
                [
                    'label' => esc_html__( 'Title', 'axil-elements' ),
                    'tab' => Controls_Manager::TAB_STYLE,                
                ]
            );

                            
            $this->add_control(
                'title_color',
                [
                'label' => esc_html__( 'Color', 'axil-elements' ),
                'type' => Controls_Manager::COLOR,
                'default'=>'',
                'selectors' => [
                    '{{WRAPPER}} .followers-list li a span' => 'color: {{VALUE}}',
                    
                ],

                   
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'title_typography',
                    'label' => esc_html__( 'Typography', 'axil-elements' ),   
                    'selector' => '{{WRAPPER}} .followers-list li a span',
                    
                ]
            );
            $this->add_responsive_control(
                'title_margin',
                [
                    'label' => esc_html__( 'Margin', 'axil-elements' ),
                    'type' => Controls_Manager::DIMENSIONS,                        
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .followers-list li a span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        
                    ],
                ]
            );
            $this->add_responsive_control(
                'title_padding',
                [
                    'label' => esc_html__( 'Padding', 'axil-elements' ),
                     'type' => Controls_Manager::DIMENSIONS,                        
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .followers-list li a span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                       
                    ],
                ]
            );

            $this->end_controls_section();
    } 
    protected function render() {
		$settings = $this->get_settings();		

            if ($settings['followers']) { ?>
            <div class="axil-followers">
                <ul class="followers-list mt-0 list-unstyled">
                    <?php
                    foreach ($settings['followers'] as $item) {
                        $target = $item['followers_link']['is_external'] ? ' target="_blank"' : '';
                        $nofollow = $item['followers_link']['nofollow'] ? ' rel="nofollow"' : '';
                        ?>
                        <li class="<?php echo esc_attr($item['followers_custom_class']); ?> elementor-repeater-item-<?php echo $item['_id']; ?>"><a
                                    href="<?php echo esc_url($item['followers_link']['url']); ?>" <?php echo esc_attr($target); ?> <?php echo esc_attr($nofollow); ?>><?php echo axil_escapeing($item['followers_icon']); ?>
                                <span><?php echo esc_html($item['followers_title']); ?></span></a></li>
                    <?php } ?>
                </ul>
            </div>                        
        <?php } 
		
	}
}