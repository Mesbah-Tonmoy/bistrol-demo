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

class Abstrak_case_study extends Widget_Base {

 public function get_name() {
        return 'abstrak-casestudy';
    }    
    public function get_title() {
        return __( 'CaseStudy', 'axil-elements' );
    }
    public function get_icon() {
        return ' eicon-countdown';
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
            'casestudys',
            [
                'label' => esc_html__('Case Study','axil-elements'),
                
            ]
        );

       $this->add_control(
            'pre_title',
            [
                'label' => esc_html__('Pre Title','axil-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => 'featured case study',
                'placeholder' => esc_html__('Type Pre Heading Text','axil-elements'),
                'label_block' => true,
            ]
        );
       $this->add_control(
            'title',
            [
                'label' => esc_html__('Title','axil-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Logo, identity & web design for Uber',
                'placeholder' => esc_html__('Type Heading Text','axil-elements'),
                'label_block' => true,
            ]
        );        

       $this->add_control(
            'desctiption',
            [
                'label' => esc_html__('Description','axil-elements'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Donec metus lorem, vulputate at sapien sit amet, auctor iaculis lorem. In vel hendrerit nisi. Vestibulum eget risus velit. Aliquam tristique libero at dui sodales, et placerat orci lobortis. Maecenas ipsum neque, elementum id dignissim et, imperdiet vitae mauris.',
                'placeholder' => esc_html__('Type casestudy description here','axil-elements'),
            ]
        );
       

       $this->add_control(
            'casestudy_link_text',
            [
                'label' => esc_html__('CaseStudy Link Text','axil-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Read Case Study',
                'title' => esc_html__('Enter button text','axil-elements'),
            ]
        );

       $this->add_control(
            'casestudy_link_type',
            [
                'label' => esc_html__('CaseStudy Link Type','axil-elements'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    '1' => 'Custom Link',
                    '2' => 'Internal Page',
                ],
                'default' => '1',
            ]
        );
       $this->add_control(
            'casestudy_link',
            [
                'label' => esc_html__('CaseStudy Link link','axil-elements'),
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
                    'casestudy_link_type' => '1'
                ]
            ]
        );
       $this->add_control(
            'casestudy_page_link',
            [
                'label' => esc_html__('Select CaseStudy Link Page','axil-elements'),
                'type' => Controls_Manager::SELECT2,
                'label_block' => true,
                'options' =>  $this-> axil_get_all_pages(),
                'condition' => [
                    'casestudy_link_type' => '2'
                ]
            ]
        );
       $this->add_control(
            'casestudy_funfact_one_number',
            [
                'label' => esc_html__('CaseStudy Funfact One Number','axil-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => '45',
                'title' => esc_html__('Enter funfact number','axil-elements'),
                'label_block' => true,
            ]
        ); 

       $this->add_control(
            'casestudy_funfact_one_number_sup',
            [
                'label' => esc_html__('CaseStudy Funfact One Number Sup','axil-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => '%',
                'title' => esc_html__('Enter funfact number','axil-elements'),
                'label_block' => true,
            ]
        );


       $this->add_control(
            'casestudy_funfact_one_title',
            [
                'label' => esc_html__('CaseStudy Funfact One Title','axil-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => 'ROI increase',
                'title' => esc_html__('Enter funfact One Title','axil-elements'),
                'label_block' => true,
            ]
        );
       $this->add_control(
            'casestudy_funfact_two_title_hr',
            [
                'type' => Controls_Manager::DIVIDER,
            ]
        );
       $this->add_control(
            'casestudy_funfact_two_number',
            [
                'label' => esc_html__('CaseStudy Funfact Two Number','axil-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => '19',
                'title' => esc_html__('Enter funfact number','axil-elements'),
                'label_block' => true,
            ]
        );
       

       $this->add_control(
            'casestudy_funfact_two_number_sup',
            [
                'label' => esc_html__('CaseStudy Funfact Two Number Sup','axil-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => 'K',
                'title' => esc_html__('Enter funfact number','axil-elements'),
                'label_block' => true,
            ]
        );

       $this->add_control(
            'casestudy_funfact_two_title',
            [
                'label' => esc_html__('CaseStudy Funfact Two Title','axil-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Monthly website visits',
                'title' => esc_html__('Enter funfact Two Title','axil-elements'),
                'label_block' => true,
            ]
        );    

        $this->end_controls_section();

	   $this->start_controls_section(
		    'axil_casestudy_title_pre_title_styling',
		    [
		        'label' => esc_html__( 'Pre title', 'axil-elements'),
		        'tab' => Controls_Manager::TAB_STYLE,
		    ]
		);
		$this->add_control(
		    'axil_casestudy_title_pre_title_color',
		    [
		        'label' => esc_html__('Color', 'axil-elements'),
		        'type' => Controls_Manager::COLOR,
		        'selectors' => [
		            '{{WRAPPER}} .subtitle' => 'color: {{VALUE}} !important;',
		        ],
		    ]
		);
		$this->add_group_control(
		    Group_Control_Typography::get_type(),
		    [
		        'name' => 'axil_casestudy_title_pre_title_typography',
		        'label' => esc_html__('Typography', 'axil-elements'),
		        'selector' => '{{WRAPPER}} .subtitle',
		    ]
		);
		$this->add_responsive_control(
		    'axil_casestudy_title_pre_title_padding',
		    [
		        'label' => esc_html__('Padding', 'axil-elements'),
		        'type' => Controls_Manager::DIMENSIONS,
		        'size_units' => ['px', '%', 'em'],
		        'selectors' => [
		            '{{WRAPPER}} .subtitle' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		        ],
		        'separator' => 'before',
		    ]
		);
		$this->add_responsive_control(
		    'axil_casestudy_title_pre_title_margin',
		    [
		        'label' => esc_html__('Margin', 'axil-elements'),
		        'type' => Controls_Manager::DIMENSIONS,
		        'size_units' => ['px', '%', 'em'],
		        'selectors' => [
		            '{{WRAPPER}} .subtitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		        ],
		        'separator' => 'before',
		    ]
		);
		$this->end_controls_section();


		$this->start_controls_section(
		    'axil_casestudy_title_styling',
		    [
		        'label' => esc_html__( 'Title', 'axil-elements'),
		        'tab' => Controls_Manager::TAB_STYLE,
		    ]
		);
		$this->add_control(
		    'axil_casestudy_title_color',
		    [
		        'label' => esc_html__('Color', 'axil-elements'),
		        'type' => Controls_Manager::COLOR,
		        'selectors' => [
		            '{{WRAPPER}} .section-heading .title' => 'color: {{VALUE}} !important;',
		        ],
		    ]
		);
		$this->add_group_control(
		    Group_Control_Typography::get_type(),
		    [
		        'name' => 'axil_casestudy_title_typography',
		        'label' => esc_html__('Typography', 'axil-elements'),
		        'selector' => '{{WRAPPER}} .section-heading .title',
		    ]
		);
		$this->add_responsive_control(
		    'axil_casestudy_title_padding',
		    [
		        'label' => esc_html__('Padding', 'axil-elements'),
		        'type' => Controls_Manager::DIMENSIONS,
		        'size_units' => ['px', '%', 'em'],
		        'selectors' => [
		            '{{WRAPPER}} .section-heading .title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		        ],
		        'separator' => 'before',
		    ]
		);
		$this->add_responsive_control(
		    'axil_casestudy_title_margin',
		    [
		        'label' => esc_html__('Margin', 'axil-elements'),
		        'type' => Controls_Manager::DIMENSIONS,
		        'size_units' => ['px', '%', 'em'],
		        'selectors' => [
		            '{{WRAPPER}} .section-heading .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		        ],
		        'separator' => 'before',
		    ]
		);
		$this->end_controls_section();

		$this->start_controls_section(
		    'axil_casestudy_description_styling',
		    [
		        'label' => esc_html__( 'Description', 'axil-elements'),
		        'tab' => Controls_Manager::TAB_STYLE,
		    ]
		);
		$this->add_control(
		    'axil_casestudy_description_color',
		    [
		        'label' => esc_html__('Color', 'axil-elements'),
		        'type' => Controls_Manager::COLOR,
		        'selectors' => [
		            '{{WRAPPER}} .section-heading p' => 'color: {{VALUE}} !important;',
		        ],
		    ]
		);
		$this->add_group_control(
		    Group_Control_Typography::get_type(),
		    [
		        'name' => 'axil_casestudy_description_typography',
		        'label' => esc_html__('Typography', 'axil-elements'),
		        'selector' => '{{WRAPPER}} .section-heading p',
		    ]
		);
		$this->add_responsive_control(
		    'axil_casestudy_description_padding',
		    [
		        'label' => esc_html__('Padding', 'axil-elements'),
		        'type' => Controls_Manager::DIMENSIONS,
		        'size_units' => ['px', '%', 'em'],
		        'selectors' => [
		            '{{WRAPPER}} .section-heading p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		        ],
		        'separator' => 'before',
		    ]
		);
		$this->add_responsive_control(
		    'axil_casestudy_description_margin',
		    [
		        'label' => esc_html__('Margin', 'axil-elements'),
		        'type' => Controls_Manager::DIMENSIONS,
		        'size_units' => ['px', '%', 'em'],
		        'selectors' => [
		            '{{WRAPPER}} .section-heading p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		        ],
		        'separator' => 'before',
		    ]
		);
		$this->end_controls_section();

		$this->start_controls_section(
		    'axil_casestudy_title_funfact_number_styling',
		    [
		        'label' => esc_html__( 'FunFact Number', 'axil-elements'),
		        'tab' => Controls_Manager::TAB_STYLE,
		    ]
		);
		$this->add_control(
		    'axil_casestudy_title_funfact_number_color',
		    [
		        'label' => esc_html__('Color', 'axil-elements'),
		        'type' => Controls_Manager::COLOR,
		        'selectors' => [
		            '{{WRAPPER}} .case-study-counterup .count-number' => 'color: {{VALUE}} !important;',
		        ],
		    ]
		);
		$this->add_group_control(
		    Group_Control_Typography::get_type(),
		    [
		        'name' => 'axil_casestudy_title_funfact_number_typography',
		        'label' => esc_html__('Typography', 'axil-elements'),
		        'selector' => '{{WRAPPER}} .case-study-counterup .count-number',
		    ]
		);
		$this->add_responsive_control(
		    'axil_casestudy_title_funfact_number_padding',
		    [
		        'label' => esc_html__('Padding', 'axil-elements'),
		        'type' => Controls_Manager::DIMENSIONS,
		        'size_units' => ['px', '%', 'em'],
		        'selectors' => [
		            '{{WRAPPER}} .case-study-counterup .count-number' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		        ],
		        'separator' => 'before',
		    ]
		);
		$this->add_responsive_control(
		    'axil_casestudy_title_funfact_number_margin',
		    [
		        'label' => esc_html__('Margin', 'axil-elements'),
		        'type' => Controls_Manager::DIMENSIONS,
		        'size_units' => ['px', '%', 'em'],
		        'selectors' => [
		            '{{WRAPPER}} .case-study-counterup .count-number' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		        ],
		        'separator' => 'before',
		    ]
		);
		$this->end_controls_section();


		$this->start_controls_section(
		    'axil_casestudy_title_funfact_title_styling',
		    [
		        'label' => esc_html__( 'FunFact Title', 'axil-elements'),
		        'tab' => Controls_Manager::TAB_STYLE,
		    ]
		);
		$this->add_control(
		    'axil_casestudy_title_funfact_title_color',
		    [
		        'label' => esc_html__('Color', 'axil-elements'),
		        'type' => Controls_Manager::COLOR,
		        'selectors' => [
		            '{{WRAPPER}} .counter-title' => 'color: {{VALUE}} !important;',
		        ],
		    ]
		);
		$this->add_group_control(
		    Group_Control_Typography::get_type(),
		    [
		        'name' => 'axil_casestudy_title_funfact_title_typography',
		        'label' => esc_html__('Typography', 'axil-elements'),
		        'selector' => '{{WRAPPER}} .counter-title',
		    ]
		);
		$this->add_responsive_control(
		    'axil_casestudy_title_funfact_title_padding',
		    [
		        'label' => esc_html__('Padding', 'axil-elements'),
		        'type' => Controls_Manager::DIMENSIONS,
		        'size_units' => ['px', '%', 'em'],
		        'selectors' => [
		            '{{WRAPPER}} .counter-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		        ],
		        'separator' => 'before',
		    ]
		);
		$this->add_responsive_control(
		    'axil_casestudy_title_funfact_title_margin',
		    [
		        'label' => esc_html__('Margin', 'axil-elements'),
		        'type' => Controls_Manager::DIMENSIONS,
		        'size_units' => ['px', '%', 'em'],
		        'selectors' => [
		            '{{WRAPPER}} .counter-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		        ],
		        'separator' => 'before',
		    ]
		);
		$this->end_controls_section();

    }
   

	protected function render() {
    		$settings = $this->get_settings();
    			
    		$attr = '';
    		$btn = '';
    		
            if ('1' == $settings['casestudy_link_type']) {

                if ( !empty( $settings['casestudy_link']['url'] ) ) {
                    $attr  = 'href="' . $settings['casestudy_link']['url'] . '"';
                    $attr .= !empty( $settings['casestudy_link']['is_external'] ) ? ' target="_blank"' : '';
                    $attr .= !empty( $settings['casestudy_link']['nofollow'] ) ? ' rel="nofollow"' : '';
                    $title = '<a ' . $attr . '>' . $settings['title'] . '</a>';
                }
                if ( !empty( $settings['casestudy_link_text'] ) ) {
                    $btn = '<a class="axil-btn btn-fill-primary btn-large" ' . $attr . '>' . $settings['casestudy_link_text'] . '</a>';
                }

            } else {

                $attr  = 'href="' . get_permalink($settings['casestudy_page_link']) . '"';
                $attr .= ' target="_blank"';
                $attr .= ' rel="nofollow"';                        
                $btn = '<a class="axil-btn btn-fill-primary btn-large" ' . $attr . '>' . $settings['casestudy_link_text'] . '</a>';

            }
            ?>
                 
                <div class="case-study-featured">
                    <div class="section-heading heading-left">                                           
                        <?php if (!empty($settings['pre_title'])) { ?>
                        <span class="subtitle"><?php echo wp_kses_post($settings['pre_title']); ?></span>
                        <?php } ?>
                        <h2 class="title"><?php echo esc_html($settings['title']); ?></h2>
                        <p><?php echo wp_kses_post($settings['desctiption']); ?></p>
                        <?php echo wp_kses_post( $btn );?>
                    </div>

                  <div class="case-study-counterup">
                     <?php if (!empty($settings['casestudy_funfact_one_number']) || !empty($settings['casestudy_funfact_one_title'])) { ?>
                        <div class="single-counterup">
                             <?php if (!empty($settings['casestudy_funfact_one_number'])) { ?>
                                <h2 class="count-number">
                                     <span class="number count" data-count="<?php echo esc_html($settings['casestudy_funfact_one_number']); ?>"><?php echo esc_html($settings['casestudy_funfact_one_number']); ?></span>
                                        <span class="symbol"><?php echo esc_attr($settings['casestudy_funfact_one_number_sup']) ?></span>  
                                    </h2>
                            <?php } ?>
                            <?php if (!empty($settings['casestudy_funfact_one_title'])) { ?>
                                <span class="counter-title"><?php echo esc_html($settings['casestudy_funfact_one_title']); ?></span>

                            <?php } ?>
                        </div>
                    <?php } ?>

                    <?php if (!empty($settings['casestudy_funfact_two_number']) || !empty($settings['casestudy_funfact_two_title'])) { ?>
                        <!-- Start Counterup -->
                        <div class="single-counterup counterup-style-1">
                            <?php if (!empty($settings['casestudy_funfact_two_number'])) { ?>

                                <h2 class="count-number">
                                <span class="number count" data-count="<?php echo esc_html($settings['casestudy_funfact_two_number']); ?>"><?php echo esc_html($settings['casestudy_funfact_two_number']); ?></span>
                                
                                  <span class="symbol"><?php echo esc_attr($settings['casestudy_funfact_two_number_sup']) ?> </span>
                                </h2>
                            <?php } ?>
                            <?php if (!empty($settings['casestudy_funfact_two_title'])) { ?>
                               <span class="counter-title"><?php echo esc_html($settings['casestudy_funfact_two_title']); ?></span>

                            <?php } ?>
                        </div>                                          
                    <?php } ?>
                    </div>
                </div>                        
 
	<?php	}

	}