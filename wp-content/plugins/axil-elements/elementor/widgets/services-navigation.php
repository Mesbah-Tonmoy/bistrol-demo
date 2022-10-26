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
use Elementor\Repeater;


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class axil_services_navigation extends Widget_Base {

use \Elementor\AxilElementCommonFunctions;

 public function get_name() {
        return 'axil-services-navigation';
    }    
    public function get_title() {
        return __( 'Services Navigation', 'axil-elements' );
    }
    public function get_icon() {
        return 'eicon-nav-menu';
    }
    public function get_categories() {
        return [ ABSTRAK_ELEMENTS_THEME_PREFIX . '-widgets' ];
    }

    protected function register_controls() {
              
        $this->start_controls_section(
            'axil_services_navigation',
            [
                'label' => esc_html__( 'Services Navigation', 'axil-elements' ),
            ]
        );


        $repeater = new Repeater();

        $repeater->add_control(
            'navigation_title', [
                'label' => esc_html__( 'Title', 'axil-elements' ),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__( 'Section Name' , 'axil-elements' ),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'navigation_id', [
                'label' => esc_html__( 'Section ID', 'axil-elements' ),
                'description' => esc_html__( 'Add ID without #', 'axil-elements' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'navigations',
            [
                'label' => esc_html__( 'Services Navigations', 'axil-elements' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'navigation_title' => esc_html__( 'Section Name #1', 'axil-elements' ),
                    ],
                    [
                        'navigation_title' => esc_html__( 'Section Name #2', 'axil-elements' ),
                    ],
                    [
                        'navigation_title' => esc_html__( 'Section Name #3', 'axil-elements' ),
                    ],
                    [
                        'navigation_title' => esc_html__( 'Section Name #4', 'axil-elements' ),
                    ],
                ],
                'title_field' => '{{{ navigation_title }}}',
            ]
        );


      $this->end_controls_section();

      // Start Style Tabs
      
      $this->axil_basic_style_controls('navigations_title', 'Link Title', '.service-scroll-nav .nav .nav-item a');
      $this->axil_basic_style_controls('navigations_title_active', 'Link Title Active', '.service-scroll-nav .nav .nav-item a.active');
      $this->axil_basic_style_controls('navigations_title_hover', 'Link Title Hover', '.service-scroll-nav .nav .nav-item a:hover');
      $this->axil_basic_style_controls('navigations_area', 'Area Style', 'nav.axil-scroll-nav.navbar.navbar-example2');
  
    }

	protected function render() {
	$settings = $this->get_settings();	        


        if (!array($settings['navigations'])){
            return;
        }
        
        if($settings['navigations']){ ?>
           <!-- Start Navigation Nav  -->
            <nav id="onepagenav" class="service-scroll-nav navbar onepagefixed">
                 <div class="container">
                        <ul class="nav nav-pills">
                            <?php
                            foreach ($settings['navigations'] as $index => $nav ){
                                $active = ($index == 0) ? 'current' : '';
                                ?><li class="nav-item <?php echo esc_attr($active); ?>"><a class="nav-link" href="#<?php echo esc_attr($nav['navigation_id']) ?>"><?php echo esc_html($nav['navigation_title']) ?></a></li><?php
                            }
                            ?>
                        </ul>
                   </div>
            </nav>
            <!-- End Navigation Nav  -->
    <?php }
	}
}