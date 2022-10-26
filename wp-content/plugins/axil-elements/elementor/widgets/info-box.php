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

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Info_Box extends Widget_Base {

 public function get_name() {
        return 'axil-info-box';
    }    
    public function get_title() {
        return esc_html__( 'Info Banner', 'axil-elements' );
    }
    public function get_icon() {
        return 'eicon-banner';
    }
    public function get_categories() {
        return [ ABSTRAK_ELEMENTS_THEME_PREFIX . '-widgets' ];
    }

    protected function register_controls() {
        $this->start_controls_section(
            'info-layout',
            [
                'label' => esc_html__( 'General', 'axil-elements' ),
            ]
        );
       $this->add_control(
            'layout',
            [
                'label' => esc_html__( 'Layout', 'axil-elements' ),
                'type' => Controls_Manager::SELECT,
                'default' => '1',
                'options' => [
                   '1' => esc_html__( 'Layout 1 ( Single Image )', 'axil-elements' ),
				   '2' => esc_html__( 'Layout 2', 'axil-elements' ),				                 
				   			                 
                ],
            ] 
        );             
		$this->add_control(
		    'subtitle',
		    [
		        'label' => esc_html__( 'Before Title', 'axil-elements' ),
		        'type' => Controls_Manager::TEXTAREA,
		        'default' => esc_html__( 'Sub title', 'axil-elements' ),
		        'placeholder' => esc_html__( 'Sub title', 'axil-elements' ),
		    ]
		);

		$this->add_control(
		    'title',
		    [
		        'label' => esc_html__( 'Title', 'axil-elements' ),
		        'type' => Controls_Manager::TEXTAREA,
		        'default' => esc_html__( '- Welcome to eBaz', 'axil-elements' ),
		        'placeholder' => esc_html__( 'Title', 'axil-elements' ),
		    ]
		);
		$this->add_control(
		    'detail_txt',
		    [
		        'label'   => esc_html__( 'Detail Text', 'axil-elements' ),
		        'type'    => Controls_Manager::TEXT,
		        'default' => 'Shop Now',
		    ]
		);     

		$this->add_control(
		    'url',
		    [
		        'label'   => esc_html__( 'Detail URL', 'axil-elements' ),
		        'type'    => Controls_Manager::URL,
		        'placeholder' => 'https://your-link.com',		       
		    ]
		);   

		$this->add_responsive_control(
			'height',
			[
				'label' => esc_html__( 'Banner Height', 'axil-elements' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
					],
				],
				'devices' => [ 'desktop', 'tablet', 'mobile' ],
				'desktop_default' => [
					'size' => 700,
					'unit' => 'px',
				],
				'tablet_default' => [
					'size' => 650,
					'unit' => 'px',
				],
				'mobile_default' => [
					'size' => 500,
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .info-box' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'radius',
			[
				'label' => esc_html__( 'Border Radius', 'axil-elements' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],					
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 1000,
							'step' => 5,
						],
						'%' => [
							'min' => 0,
							'max' => 100,
						],
					],
								
				'devices' => [ 'desktop', 'tablet', 'mobile' ],		
				'desktop_default' => [
					'size' => 40,
					'unit' => 'px',
				],
				'tablet_default' => [
					'size' => 40,
					'unit' => 'px',
				],
				'mobile_default' => [
					'size' => 40,
					'unit' => 'px',
				],		
				'selectors' => [
					'{{WRAPPER}} .info-box' => 'border-radius: {{SIZE}}{{UNIT}};',
				],
			]
		);
       $this->end_controls_section();  


        $this->start_controls_section(
            'sec_bg',
            [
                'label' => esc_html__( 'Background', 'axil-elements' ),
                 'condition'   => array( 'layout' => '1' ),
            ]
        );

		$this->add_group_control(
		\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'background',
				'label' => esc_html__( 'Background', 'axil-elements' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .info-box',
			]
		);
       $this->end_controls_section(); 
		

        $this->start_controls_section(
            'sec_style_color',
            [
                'label' => esc_html__( 'Color', 'axil-elements' ),
                'tab' => Controls_Manager::TAB_STYLE,   
            ]
        );

		$this->add_control(
            'title_color',
            [
                'label' => esc_html__( 'Title Color', 'axil-elements' ),
                'type' => Controls_Manager::COLOR,      
				'selectors' => array( 
					'{{WRAPPER}} .info-title' => 'color: {{VALUE}}',
					'{{WRAPPER}} .wooc-title' => 'color: {{VALUE}}' 
				),                                  
                
            ]
        );

		$this->add_control(
            'subtitle_color',
            [
                'label' => esc_html__( 'Before Title Color', 'axil-elements' ),
                'type' => Controls_Manager::COLOR,   
				'selectors' => array( 
					'{{WRAPPER}} .info-subtitle' => 'color: {{VALUE}}' , 
					'{{WRAPPER}} .wooc-subtitle' => 'color: {{VALUE}}'
					),                                
             
            ]
        );		
		

       $this->end_controls_section();   
		$this->start_controls_section(
            'search_layout_img',
            [
                'label' => __( 'Banner Images', 'axil-elements' ),
                'condition'   => array( 'layout' => '2' ), 
            ]
        );

        $this->add_control(
            'image1',
            [
                'label' => __('Image 1','axil-elements'),
                'type'=>Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ],
                            
            ]
        );
        $this->add_control(
            'image2',
            [
                'label' => __('Image 2','axil-elements'),
                'type'=>Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ],
                            
            ]
        ); 
        $this->add_control(
            'image3',
            [
                'label' => __('Image 3','axil-elements'),
                'type'=>Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ],
                            
            ]
        );
        $this->add_control(
            'image4',
            [
                'label' => __('Image 4','axil-elements'),
                'type'=>Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ],
                            
            ]
        );
       
        $this->end_controls_section();  
        $this->start_controls_section(
            'sec_typography_type',
            [
                'label' => esc_html__( 'Typography', 'axil-elements' ),
                'tab' => Controls_Manager::TAB_STYLE,   
            ]
        );


		$this->add_group_control(
		Group_Control_Typography::get_type(),
			[
			    'name' => 'title_typo',
			    'label' => esc_html__( 'Title Typography', 'axil-elements' ),  
			     'devices' => [ 'desktop', 'tablet', 'mobile' ],	
			   'selector' => '{{WRAPPER}} .info-title',
			]
		);

		$this->add_responsive_control(
			'title_typo_margin',
				[
				    'label' => esc_html__( 'Title Margin', 'axil-elements' ),
				    'type' => Controls_Manager::DIMENSIONS,
				    'size_units' => [ 'px', '%', 'em' ],
				    'devices' => [ 'desktop', 'tablet', 'mobile' ],					    
				    'selectors' => [
				        '{{WRAPPER}}  .info-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				        
				    ],
				]
			);


		$this->add_group_control(
		Group_Control_Typography::get_type(),
			[
			    'name' => 'subtitle_typo',
			    'label' => esc_html__( 'Before Title Typography', 'axil-elements' ),  
			     'devices' => [ 'desktop', 'tablet', 'mobile' ],	
			   'label'    => esc_html__( 'Subtitle', 'axil-elements' ),
				'selector' => '{{WRAPPER}} .info-subtitle',
			]
		);
       $this->end_controls_section();  
    }

	protected function render() {
		$settings = $this->get_settings();
		$attr = $btn = '';		
		if ( !empty( $settings['url']['url'] ) ) {
		    $attr  = 'href="' . $settings['url']['url'] . '"';
		    $attr .= !empty( $settings['url']['is_external'] ) ? ' target="_blank"' : '';
		    $attr .= !empty( $settings['url']['nofollow'] ) ? ' rel="nofollow"' : '';
		}
		if ( $settings['url']['url'] ) {
		    $btn = '<a class="axil-btn" ' . $attr . '>'. $settings['detail_txt'] .'</a>';		    
		    }
		    $allowed_tags = wp_kses_allowed_html( 'post' );

        $simage1 =  $settings['image1']['url'];
        $simage2 =  $settings['image2']['url'];
        $simage3 =  $settings['image3']['url'];
        $simage4 =  $settings['image4']['url'];
		?>
		<div class="axil-slider-area">
			<div class="axil-slider info-box has-radius-wrapper  bg-tertiary bg-gradient-7">		  
			    <div class="row">
			        <div class="col-lg-6 col-md-12">
			            <div class="inner text-left">
			                <?php if ( $settings['subtitle'] ): ?>
			                    <span class="info-subtitle title-highlighter mb--10"><?php echo wp_kses( $settings['subtitle'], $allowed_tags ); ?></span>
			                <?php endif; ?> 
			                <h1 class="h2 info-title"> <?php echo wp_kses( $settings['title'], $allowed_tags ); ?></h1>		               
			               <?php echo wp_kses( $btn, $allowed_tags ); ?>
			            </div>
			        </div>
			     </div>
	  				<?php if ( '2' == $settings['layout'] ): ?>
					<div class="slider-bg-thumb">
						<img src="<?php echo esc_url( $simage1 );?>" class="thumb thumb1" alt="Women" data-sal="slide-right" data-sal-duration="1000" data-sal-delay="400">
						<img src="<?php echo esc_url( $simage2 );?>" class="thumb thumb2" alt="Women" data-sal="slide-left" data-sal-duration="1000" data-sal-delay="400">
						<img src="<?php echo esc_url( $simage3 );?>" class="thumb thumb3" alt="Women" data-sal="slide-up" data-sal-duration="1000" data-sal-delay="300">
						<img src="<?php echo esc_url( $simage4 );?>" class="thumb thumb4" alt="Women" data-sal="zoom-out" data-sal-duration="1000" data-sal-delay="900">
					</div>
				<?php endif; ?> 
			    </div>		   		
			</div>
			<?php 
		}
	}

?>
