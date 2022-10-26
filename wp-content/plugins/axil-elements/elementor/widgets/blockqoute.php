<?php
/**
 * @author  AxilTheme
 * @since   1.0
 * @version 1.0
 */

namespace axiltheme\abstrak_elements;

use Elementor\Controls_Manager;
use Elementor\Plugin;
use Elementor\Widget_Base;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
class axil_Blockqoute extends Widget_Base {  
use \Elementor\AxilElementCommonFunctions;
 public function get_name() {
        return 'axil-blockqoute';
    }    
    public function get_title() {
        return esc_html__( 'Abstrak Blockqoute', 'axil-elements' );
    }
    public function get_icon() {
        return 'eicon-post-title';
    }
    public function get_categories() {
        return [ ABSTRAK_ELEMENTS_THEME_PREFIX . '-widgets' ];
    }
  
  protected function register_controls() {

     $this->start_controls_section(
            'title_section',
            [
                'label' => esc_html__( 'Blockqoute', 'axil-elements' ),
            ]
        ); 
    
        $this->add_control(
            'blockqoute_content',
            [
                'label' => esc_html__( 'Content', 'axil-elements' ),
                'type' => Controls_Manager::TEXTAREA,
                'placeholder' => esc_html__( 'Type your title here...', 'axil-elements' ),
                'default' => esc_html__( '“Nunc sed mattis diam. Suspendisse mi libero, sagittis nec varius quis, pulvinar eu nisl. Nulla in accumsan orci, a varius velit. Maecenas tincidunt mauris rutrum, eleifend sem at, sollicitudin ante.”', 'axil-elements' ),
                 
            ]
        );  

        $this->end_controls_section();    
        $this->axil_basic_style_controls('section_blockqoute_content', 'Content', '.wp-block-quote');
  }


    protected function render() {
        $settings = $this->get_settings();
        ?>
        <?php  if($settings['blockqoute_content']){ ?>
            <blockquote class="wp-block-quote axil-blockqoute"> 
                <p><?php echo wp_kses_post( $settings['blockqoute_content'] );?></p>         
            </blockquote>
        <?php  } ?>    
<?php

    }
}
