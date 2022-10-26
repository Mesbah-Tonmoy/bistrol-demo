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

class axil_single_process_box extends Widget_Base {

 public function get_name() {
        return 'axil-single-process-box';
    }    
    public function get_title() {
        return __( 'Single Process Box', 'axil-elements' );
    }
    public function get_icon() {
        return 'eicon-date';
    }
    public function get_categories() {
        return [ ABSTRAK_ELEMENTS_THEME_PREFIX . '-widgets' ];
    }

    protected function register_controls() {
              
        $this->start_controls_section(
            'process_layout',
            [
                'label' => __( 'General', 'axil-elements' ),
            ]
        );
        $this->add_control(
		    'process_number',
		    [
		         'label' => esc_html__('Number', 'axil-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('1', 'axil-elements'),
                'label_block' => true,
		    ]
		);
                   
        $this->add_control(
            'title',
            [
                'label' => __( 'Title', 'axil-elements' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __( 'Act in a way that makes all of us proud', 'axil-elements' ),
                'placeholder' => __( 'Title', 'axil-elements' ),
            ]
        );
		$this->add_control(
		    'subtitle',
		    [
		        'label' => __( 'Sub Title', 'axil-elements' ),
		        'type' => Controls_Manager::TEXTAREA,
		        'default' => __( 'Proin dignissim facilisis tortor a mattis. Morbi non maximus nunc, ut mattis tellus. In hac habitasse platea dictumst. Mauris viverra enim tellus, vel ultrices dolor aliquam non', 'axil-elements' ),
		        'placeholder' => __( 'Sub title', 'axil-elements' ),
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
                    '{{WRAPPER}} .about-quality .title' => 'color: {{VALUE}}',
                ),
            ]
        );

         $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_font_size',
                'label' => __( 'Typography', 'axil-elements' ),    
                'selector' => '{{WRAPPER}} .about-quality .title',
            ]
        );
       
        $this->add_responsive_control(
            'title_margin',
            [
                'label' => __( 'Margin', 'axil-elements' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .about-quality .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    
                ],
            ]
        );
        
    $this->end_controls_section();
    $this->start_controls_section(
            'subtitle_style_section',
            [
                'label' => __( 'Content or Subtitle', 'axil-elements' ),
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
                    '{{WRAPPER}} .about-quality .subtitle' => 'color: {{VALUE}}',
                ),
            ]
        );

         $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle_font_size',
                'label' => __( 'Typography', 'axil-elements' ),                
                
                'selector' => '{{WRAPPER}} .about-quality .subtitle',
            ]
        );
       
        $this->add_responsive_control(
            'subtitle_margin',
            [
                'label' => __( 'Margin', 'axil-elements' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                
                'selectors' => [
                    '{{WRAPPER}} .about-quality .subtitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    
                ],
            ]
        );
        $this->end_controls_section();
  
    }

	protected function render() {
	$settings =  $this->get_settings();	
    $active =  $settings['recommended_on'] == 'yes' ? 'active' : 'no-active';  
    ?>
    <div class="about-quality <?php echo esc_attr( $active );?>">
        <?php if ($settings['process_number'] != '') { ?>  
            <h3 class="sl-number"><?php echo esc_attr( $settings['process_number'] );?></h3>
        <?php } ?>    
        <h5 class="title"><?php echo esc_attr( $settings['title'] );?></h5>
        <?php if ($settings['subtitle'] != '') { ?>       
             <p class="subtitle"><?php echo esc_attr( $settings['subtitle'] );?></p>
        <?php } ?> 
    </div>
<?php
	}
}