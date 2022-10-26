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
class axil_faq extends Widget_Base {

public function get_name() {
        return 'axil-faq';
    }    
    public function get_title() {
        return esc_html__( 'Faq', 'axil-elements' );
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
}      


    protected function render() {
        $settings = $this->get_settings();         
        ?>
        <?php if( $settings['faq_list'] ){ ?> 
            <div class="faq-accordion">               
             <div id="accordion-<?php echo $this->get_id(); ?>" class="accordion">
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
    <?php          

    }
}
