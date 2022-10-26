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
class axil_Accordion extends Widget_Base {

 use \Elementor\AxilElementCommonFunctions;

public function get_name() {
        return 'axil-accordion';
    }    
    public function get_title() {
        return esc_html__( 'Accordion', 'axil-elements' );
    }
    public function get_icon() {
        return 'eicon-accordion';
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
            'accordion_section',
            [
                'label' => esc_html__( 'Accordion', 'axil-elements' ),
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'accordion_icon_type',
            [
                'label' => esc_html__('Select Icon Type', 'axil-elements'),
                'type' => Controls_Manager::SELECT,
                'default' => 'icon',
                'options' => [
                    'image' => esc_html__('Image', 'axil-elements'),
                    'icon' => esc_html__('Icon', 'axil-elements'),
                    'text' => esc_html__('Text', 'axil-elements'),
                ],
            ]
        );
        $repeater->add_control(
            'accordion_image',
            [
                'label' => esc_html__('Upload Image', 'axil-elements'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'accordion_icon_type' => 'image'
                ]

            ]
        );
        $repeater->add_control(
            'accordion_number', [
                'label' => esc_html__('Number', 'axil-elements'),
                'type' => Controls_Manager::TEXT,                
                'label_block' => true,
                'condition' => [
                    'accordion_icon_type' => 'text'
                ]
            ]
        );
        $repeater->add_control(
            'accordion_selected_icon',
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
                    'accordion_icon_type' => 'icon'
                ]

            ]
        );
        $repeater->add_control(
            'accordion_title', [
                'label' => esc_html__('Title', 'axil-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Accordion Title', 'axil-elements'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'accordion_content',
            [
                'label' => esc_html__('Description', 'axil-elements'),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 10,
                'default' => 'We design professional looking yet simple websites. Our designs are search engine and user friendly.',
                'placeholder' => esc_html__('Type your description here', 'axil-elements'),
            ]
        );
        $this->add_control(
            'accordion_list',
            [
                'label' => esc_html__('Accordion List', 'axil-elements'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'accordion_title' => esc_html__('Strategy', 'axil-elements'),
                        'accordion_content' => esc_html__('Aenean hendrerit laoreet vehicula. Nullam convallis augue at enim gravida pellentesque.', 'axil-elements'),
                    ],
                    [
                        'accordion_title' => esc_html__('Design', 'axil-elements'),
                        'accordion_content' => esc_html__('Aenean hendrerit laoreet vehicula. Nullam convallis augue at enim gravida pellentesque.', 'axil-elements'),
                    ],
                    [
                        'accordion_title' => esc_html__('Development', 'axil-elements'),
                        'accordion_content' => esc_html__('Aenean hendrerit laoreet vehicula. Nullam convallis augue at enim gravida pellentesque.', 'axil-elements'),
                    ],
                ],
                'title_field' => '{{{ accordion_title }}}',
            ]
        );
        $this->end_controls_section();
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
                'default' => '',
                
                'selectors' => array(
                    '{{WRAPPER}} .why-choose-us .accordion-item .accordion-button.collapsed' => 'color: {{VALUE}}',
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
                    '{{WRAPPER}} .why-choose-us .accordion-item .accordion-button' => 'color: {{VALUE}}',
                ),
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_font_size',
                'label' => esc_html__( 'Typography', 'axil-elements' ),                
                 
                'selector' => '{{WRAPPER}} .why-choose-us .accordion-item .accordion-button.collapsed, {{WRAPPER}} .why-choose-us .accordion-item .accordion-button',
            ]
        );
       
        $this->add_responsive_control(
            'title_padding',
            [
                'label' => esc_html__( 'Margin', 'axil-elements' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                 
                'selectors' => [
                    '{{WRAPPER}} .why-choose-us .accordion-item .accordion-button.collapsed' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    
                ],
            ]
        );
       
    $this->end_controls_section();
    $this->axil_basic_style_controls('accordion_pre_content', 'Content', '.why-choose-us .accordion-item .accordion-body');

}      


    protected function render() {
        $settings = $this->get_settings();         
        ?>
            <?php if( $settings['accordion_list'] ){ ?>
 
                <div class="why-choose-us">
               
                 <div id="accordion-<?php echo $this->get_id(); ?>" class="accordion">
                   <?php foreach ($settings['accordion_list'] as $index => $accordion){

                        $expanded = ( $index == 0 ) ? "true" : "false";
                        $show = ( $index == 0 ) ? "show" : "";
                        $collapsed = ( $index !== 0 ) ? "collapsed" : "";
                        ?>

                        <div class="accordion-item elementor-repeater-item-<?php  echo esc_attr( $accordion['_id'] ); ?>">
                            <h2 class="accordion-header" id="headingOne-<?php echo esc_attr($index); ?>">
                                <button class="accordion-button <?php echo esc_attr($collapsed); ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-<?php echo esc_attr($index); ?>" aria-expanded="<?php echo esc_attr($expanded); ?>" aria-controls="collapse-<?php echo esc_attr($index); ?>">                               
                                    <?php
                                    if ($accordion['accordion_icon_type'] === 'icon') { ?>
                                        <?php if (!empty($accordion['accordion_icon']) || !empty( $accordion['accordion_selected_icon']['value'])) : ?>

                                            <?php Icons_Manager::render_icon( $accordion['accordion_selected_icon'] ); ?>

                                        <?php endif; ?>
                                    <?php } elseif ($accordion['accordion_icon_type'] === 'image') {
                                        if (!empty($accordion['accordion_image'])) { ?>
                                            <?php echo Group_Control_Image_Size::get_attachment_image_html($accordion, 'full', 'accordion_image'); ?>
                                        <?php } ?>
                                     <?php } elseif ($accordion['accordion_icon_type'] === 'text') { ?>
                                        <span><?php echo esc_html($accordion['accordion_number']); ?></span>
                                    <?php }  ?>

                                    <span><?php echo esc_html($accordion['accordion_title']); ?></span>
                                </button>
                            </h2>

                            <div id="collapse-<?php echo esc_attr($index); ?>" class="accordion-collapse collapse <?php echo esc_attr($show); ?>" aria-labelledby="headingOne-<?php echo esc_attr($index); ?>" data-bs-parent="#accordion-<?php echo $this->get_id(); ?>">
                                <div class="accordion-body">
                                   <?php echo esc_attr($accordion['accordion_content']); ?>
                                </div>
                            </div>
                        </div>
                        
                         <?php } ?>


                    </div>
                </div>
            <?php } ?>

        <?php          

    }
}
