<?php
/**
 * @author  AxilTheme
 * @since   1.0
 * @version 1.0
 */

namespace axiltheme\abstrak_elements;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Image_Size;
use Elementor\Utils;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Border;
use Elementor\Scheme_Typography;
use Elementor\Scheme_Color;
use Elementor\DATE_TIME;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Axil_Button extends Widget_Base {
 use \Elementor\AxilElementCommonFunctions;
 public function get_name() {
        return 'axil-button';
    }    
    public function get_title() {
        return __( 'Button', 'axil-elements' );
    }
    public function get_icon() {
        return ' eicon-button';
    }
    public function get_categories() {
        return [ ABSTRAK_ELEMENTS_THEME_PREFIX . '-widgets' ];
    }

 public function axil_get_img($img)
    {
        $img = ABSTRAK_ELEMENTS_BASE_URL . 'assets/media/' . $img;
        return $img;
   }

	private function axil_get_all_pages()
	    {

	        $page_list = get_posts(array(
	            'post_type' => 'page',
	            'orderby' => 'date',
	            'order' => 'DESC',
	            'posts_per_page' => -1,
	        ));

	        $pages = array();

	        if (!empty($page_list) && !is_wp_error($page_list)) {
	            foreach ($page_list as $page) {
	                $pages[$page->ID] = $page->post_title;
	            }
	        }

	        return $pages;
	    } 
     protected function register_controls() {


	    $this->start_controls_section(
	        'axil-button',
	        [
	            'label' => esc_html__('Button','axil-elements'),
	            
	        ]
	    );

      
       $this->add_control(
            'btn_size',
            [
                'label' => esc_html__('Button Type','axil-elements'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'btn-large'     => 'Large',
                    'btn-medium'    => 'Medium',
                    'btn-small'     => 'Small',
                ],
                'default' => 'btn-large',
            ]
        );

       $this->add_control(
            'btn_type',
            [
                'label' => esc_html__('Button Type','axil-elements'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'btn-fill-primary' => 'Fill Primary',
                    'btn-fill-white'   => 'Fill White',
                ],
                'default' => 'btn-fill-primary',
            ]
        );

       $this->add_control(
            'btn_link_text',
            [
                'label' => esc_html__('Link Text','axil-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Read Case Study',
                'title' => esc_html__('Enter button text','axil-elements'),
            ]
        );

       $this->add_control(
            'btn_link_type',
            [
                'label' => esc_html__('Link Type','axil-elements'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    '1' => 'Custom Link',
                    '2' => 'Internal Page',
                ],
                'default' => '1',
            ]
        );
       $this->add_control(
            'btn_link',
            [
                'label' => esc_html__('Link link','axil-elements'),
                'type' => Controls_Manager::URL,
                'dynamic' => [
                    'active' => true,
                ],
                'placeholder' => esc_html__('https://your-link.com','axil-elements'),
                'show_external' => true,
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                ],
                'condition' => [
                    'btn_link_type' => '1'
                ]
            ]
        );
       $this->add_control(
            'btn_page_link',
            [
                'label' => esc_html__('Select Link Page','axil-elements'),
                'type' => Controls_Manager::SELECT2,
                'label_block' => true,
                'options' =>  $this-> axil_get_all_pages(),
                'condition' => [
                    'btn_link_type' => '2'
                ]
            ]
        );      


       $this->add_control(
            'shape_btn_icon',
            [
                'label' => __( 'Button Icon', 'axil-elements' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on'    => __( 'On', 'axil-elements' ),
                'label_off'   => __( 'Off', 'axil-elements' ),
                'default'     => 'no',
               
            ]
        );  
        $this->add_responsive_control(
                'axil_btn_align',
                [
                    'label' => esc_html__( 'Alignment', 'axil-elements' ),
                    'type' => Controls_Manager::CHOOSE,
                    'options' => [
                        'left' => [
                            'title' => esc_html__( 'Left', 'axil-elements' ),
                            'icon' => 'eicon-h-align-left',
                        ],
                        'center' => [
                            'title' => esc_html__( 'Center', 'axil-elements' ),
                            'icon' => 'eicon-h-align-center',
                        ],
                        'right' => [
                            'title' => esc_html__( 'Right', 'axil-elements' ),
                            'icon' => 'eicon-h-align-right',
                        ],
                    ],
                    'default' => 'left', 
                    'toggle' => true,
                ]
            );
        $this->end_controls_section();

        $this->axil_link_controls_style('axil_button_style', 'Discover Button', '.axil-btn', 'btn-large'); 
    }
   

	protected function render() {
    		$settings = $this->get_settings();    			
    		$attr = '';
    		$btn = '';
    		$allowed_tags = wp_kses_allowed_html( 'post' );
 
            if ('yes' == $settings['shape_btn_icon']) {
                $icon        = '<i class="fas fa-long-arrow-alt-right"></i>';
                $icon_classs = 'has-icon';
            }else{
                $icon = '';
                $icon_classs = '';
            }


            if ('1' == $settings['btn_link_type']) {

                if ( !empty( $settings['btn_link']['url'] ) ) {
                    $attr  = 'href="' . $settings['btn_link']['url'] . '"';
                    $attr .= !empty( $settings['btn_link']['is_external'] ) ? ' target="_blank"' : '';
                    $attr .= !empty( $settings['btn_link']['nofollow'] ) ? ' rel="nofollow"' : '';
                    
                }
                if ( !empty( $settings['btn_link_text'] ) ) {
                    $btn = '<a class="' . $settings['btn_size'] .' axil-btn  ' . $settings['btn_type'] . '" ' . $attr . '>' . $settings['btn_link_text'] . $icon . '</a>';
                }

            } else {
                $attr  = 'href="' . get_permalink($settings['btn_page_link']) . '"';
                $attr .= ' target="_blank"';
                $attr .= ' rel="nofollow"';                        
                $btn = '<a class="' . $settings['btn_size'] .' axil-btn  ' . $settings['btn_type'] . '" ' . $attr . '>' . $settings['btn_link_text'] . $icon . '</a>';
            }

            ?>

           <div class="btn-wrp-new <?php echo axil_kses_intermediate( $icon_classs );?> text-<?php echo axil_kses_intermediate( $settings['axil_btn_align'] );?>">
            <?php echo wp_kses( $btn, $allowed_tags ); ?>
                
            </div> 
 
	<?php	}

	}