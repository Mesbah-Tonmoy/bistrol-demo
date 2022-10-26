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
 

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
class Customer_Review extends Widget_Base {
   
    public function get_name() {       
        return 'axil-customer-review';
    }    
    public function get_title() {      
          return esc_html__( 'Customer Review', 'axil-elements' );
    }
    public function get_icon() {
        return 'eicon-testimonial-carousel';
    }
    public function get_categories() {
        return [ ABSTRAK_ELEMENTS_THEME_PREFIX . '-widgets' ];
    }
    protected function register_controls() {

          $this->start_controls_section(
            'review_layout',
            [
                'label' => esc_html__( 'Layout', 'axil-elements' ),
            ]
        );

		$this->add_control(
		    'style',
		    [
		        'label' => esc_html__( 'Style', 'axil-elements' ),
		        'type' => Controls_Manager::SELECT,
		        'default' => '1',
		        'options' => [
		            '1'   => esc_html__( 'Style One', 'axil-elements' ),
		            '2'   => esc_html__( 'Style Two', 'axil-elements' ),		        
		        ],
		    ] 
		);  
 
		$this->add_control(
		    'reviewer_image',
		    [
		        'label' => esc_html__( 'Testimonial Logo', 'axil-elements' ),
		        'type' => Controls_Manager::MEDIA,
		        'default' => [
		            'url' => Utils::get_placeholder_image_src(),
		        ],
		    ]
		);
		$this->add_control(
                Group_Control_Image_Size::get_type(),
                [
                    'name' => 'thumbnail',
                    'default' => 'full',
                    'exclude' => ['custom'],
                    'separator' => 'none',
                ]
            );

		$this->add_control(
		    'reviewer_name',
		    [
		        'label'   => esc_html__('Name', 'axil-elements' ),
		        'type'    => Controls_Manager::TEXT,
		        'default' => 'Lorem Ipsum',
		    ]
		);
		$this->add_control(
		    'designation',
		    [
		        'label'   => esc_html__('Designation', 'axil-elements' ),
		        'type'    => Controls_Manager::TEXTAREA,
		        'default' => 'Lorem Ipsum',
		    ]
		);
		$this->add_control(
		    'review_content',
		    [
		        'label'   => esc_html__('Content', 'axil-elements' ),
		        'type'    => Controls_Manager::TEXTAREA,		        
		        'default' => esc_html__( 'Very good Design. Flexible. Fast Support.', 'axil-elements' ),  
		    ]
		); 
		  
        $this->end_controls_section();

        $this->start_controls_section(
            'title_style_section',
            [
                'label' => esc_html__( 'Testimonial Content', 'axil-elements' ),
                'tab' => Controls_Manager::TAB_STYLE,                
            ]
        );
 

 
          $this->add_control(
            'content_color',
            [
                'label' => esc_html__( 'Color', 'axil-elements' ),
                'type' => Controls_Manager::COLOR,  
                'default' => '',  
                'selectors' => array(
                    '{{WRAPPER}} .review-grid-1 p.subtitle' => 'color: {{VALUE}}',
                     
                ),
            ]
        );

         $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'content_font_size',
                'label' => esc_html__( 'Typography', 'axil-elements' ),     
                'selector' => '{{WRAPPER}} .review-grid-1 p.subtitle',
            ]
        );
       
        $this->add_responsive_control(
            'content_title_margin',
            [
                'label' => esc_html__( 'Margin', 'axil-elements' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ], 

                'selectors' => [
                    '{{WRAPPER}} .review-grid-1 p.subtitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    
                    
                ],
            ]
        );
        
    $this->end_controls_section();


        $this->start_controls_section(
            'section_title_style',
            [
                'label' => __( 'Testimonial Title', 'axil-elements' ),
                'tab' => Controls_Manager::TAB_STYLE,                
            ]
        );
  
          $this->add_control(
            'stitle_color',
            [
                'label' => __( 'Color', 'axil-elements' ),
                'type' => Controls_Manager::COLOR,  
                'default' => '',
               
                'selectors' => array(
                    '{{WRAPPER}} .review-grid-1 .author-info .content .name' => 'color: {{VALUE}}',
                   
                ),
            ]
        );

         $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'stitle_font_size',
                'label' => __( 'Typography', 'axil-elements' ),   
                'selector' => '{{WRAPPER}} .review-grid-1 .author-info .content .name',
            ]
        );
       
        $this->add_responsive_control(
            'stitle_margin',
            [
                'label' => __( 'Margin', 'axil-elements' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                
                'selectors' => [
                    '{{WRAPPER}} .review-grid-1 .author-info .content .name', 
                    
                ],
            ]
        );
       
    $this->end_controls_section();

        $this->start_controls_section(
            'sub_title_style_section',
            [
                'label' => __( 'Testimonial Sub Title', 'axil-elements' ),
                'tab' => Controls_Manager::TAB_STYLE,                
            ]
        );
 
        $this->add_control(
            'sub_title_color',
            [
                'label' => __( 'Color', 'axil-elements' ),
                'type' => Controls_Manager::COLOR,  
                'default' => '',
               
                'selectors' => array(
                    '{{WRAPPER}} .review-grid-1 .author-info .content .designation' => 'color: {{VALUE}}',
                     
                ),
            ]
        );

         $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'sub_title_font_size',
                'label' => __( 'Typography', 'axil-elements' ),                
                
                'selector' => '{{WRAPPER}} .review-grid-1 .author-info .content .designation',
            ]
        );
       
        $this->add_responsive_control(
            'sub_title_margin',
            [
                'label' => __( 'Margin', 'axil-elements' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                
                'selectors' => [
                    '{{WRAPPER}} .review-grid-1 .author-info .content .designation' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                    
                    
                ],
            ]
        );
       
    $this->end_controls_section();


    }
 
		
	protected function render() {
			$settings = $this->get_settings();	
			 ?>

               <div class="review-grid-1 review-light"> 

                <svg width="41" height="31" viewBox="0 0 41 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M30.9555 18.9721C31.4009 18.9721 31.8282 18.9042 32.2536 18.8423C32.1158 19.3056 31.974 19.7769 31.7463 20.2003C31.5187 20.8154 31.1632 21.3486 30.8097 21.8858C30.5142 22.467 29.9929 22.8604 29.6095 23.3576C29.2081 23.8409 28.6609 24.1625 28.2275 24.5639C27.8022 24.9832 27.245 25.1929 26.8016 25.4885C26.3383 25.7541 25.9349 26.0477 25.5036 26.1875L24.4271 26.6308L23.4805 27.0242L24.4491 30.8945L25.6413 30.607C26.0228 30.5111 26.4881 30.3993 27.0173 30.2655C27.5585 30.1656 28.1357 29.892 28.7787 29.6424C29.4138 29.3588 30.1487 29.1671 30.8317 28.7117C31.5187 28.2764 32.3115 27.9129 33.0105 27.3298C33.6875 26.7287 34.5043 26.2074 35.1074 25.4426C35.7664 24.7276 36.4175 23.9767 36.9227 23.122C37.5079 22.3072 37.9053 21.4125 38.3247 20.5278C38.7041 19.6431 39.0096 18.7384 39.2593 17.8597C39.7326 16.0983 39.9443 14.4248 40.0261 12.9929C40.094 11.559 40.0541 10.3668 39.9702 9.50406C39.9403 9.09666 39.8844 8.70124 39.8444 8.42765L39.7945 8.09214L39.7426 8.10412C39.3874 6.44491 38.5697 4.92016 37.3841 3.70625C36.1985 2.49233 34.6935 1.63887 33.0432 1.24458C31.3928 0.850298 29.6645 0.931301 28.0583 1.47822C26.452 2.02514 25.0334 3.01563 23.9666 4.33511C22.8998 5.65459 22.2283 7.24914 22.0298 8.93431C21.8314 10.6195 22.1141 12.3264 22.8452 13.8576C23.5763 15.3888 24.726 16.6818 26.1613 17.5868C27.5965 18.4919 29.2587 18.9722 30.9555 18.9721ZM8.9879 18.9721C9.43325 18.9721 9.86061 18.9042 10.286 18.8423C10.1482 19.3056 10.0064 19.7769 9.77874 20.2003C9.55107 20.8154 9.1956 21.3486 8.84212 21.8858C8.54655 22.467 8.02532 22.8604 7.64189 23.3576C7.24048 23.8409 6.69329 24.1625 6.25993 24.5639C5.83455 24.9832 5.27737 25.1929 4.83403 25.4885C4.37071 25.7541 3.96731 26.0477 3.53594 26.1875L2.45953 26.6308L1.51292 27.0242L2.48149 30.8945L3.67374 30.607C4.05518 30.5111 4.52049 30.3993 5.04971 30.2655C5.59091 30.1656 6.16806 29.892 6.81111 29.6424C7.44418 29.3568 8.18109 29.1671 8.86408 28.7098C9.55107 28.2744 10.3439 27.9109 11.0429 27.3278C11.7199 26.7267 12.5367 26.2054 13.1398 25.4426C13.7988 24.7276 14.4499 23.9767 14.9551 23.122C15.5402 22.3072 15.9377 21.4125 16.357 20.5278C16.7365 19.6431 17.042 18.7384 17.2917 17.8597C17.765 16.0983 17.9767 14.4248 18.0585 12.9929C18.1264 11.559 18.0865 10.3668 18.0026 9.50406C17.9727 9.09666 17.9167 8.70124 17.8768 8.42765L17.8269 8.09214L17.7749 8.10412C17.4198 6.44491 16.6021 4.92016 15.4165 3.70625C14.2309 2.49233 12.7259 1.63887 11.0755 1.24458C9.42518 0.850298 7.69692 0.931301 6.09067 1.47822C4.48442 2.02514 3.06583 3.01563 1.99899 4.33511C0.932159 5.65459 0.260674 7.24914 0.0622253 8.93431C-0.136223 10.6195 0.146465 12.3264 0.877594 13.8576C1.60872 15.3888 2.75841 16.6818 4.19367 17.5868C5.62893 18.4919 7.2911 18.9722 8.9879 18.9721Z" fill="#EFC0A6"/>
                </svg>

                <?php if(!empty($settings['review_content'])){ ?>
                    <p class="subtitle"><?php echo esc_html($settings['review_content']); ?></p> 
                <?php } ?> 
                    <div class="author-info"> 
                        <?php if ( ! empty( $settings['reviewer_image']['url'] ) ) : ?>
                            <div class="thumb">
                                <?php echo Group_Control_Image_Size::get_attachment_image_html( $settings, 'thumbnail', 'reviewer_image' ); ?>
                            </div>
                        <?php endif; ?> 
                        <div class="content">
                            <span class="name"><?php echo esc_html($settings['reviewer_name']); ?></span>
                            <span class="designation"><?php echo esc_html($settings['designation']); ?></span>
                        </div>
                    </div> 
                </div>
            <?php
        }

    }
