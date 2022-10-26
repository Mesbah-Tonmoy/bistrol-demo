<?php
/**
 * @author  AxilTheme
 * @since   1.0
 * @version 1.0
 */

namespace axiltheme\abstrak_elements;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

    class abstrak_Widgets_Control{
        public function __construct(){
            $this->abstrak_widgets_control();   
         }

    public function abstrak_widgets_control(){
        $sectiontitle = 'on';
        $widgets_manager = \Elementor\Plugin::instance()->widgets_manager; 
      
         $widget_files = [
             [
                'section_title' => 'on',
                'file_path' => 'elementor/widgets/title.php',
                'class' => 'Title',
            ],     
            [
                'section_title' => 'on',
                'file_path' => 'elementor/widgets/page-title.php',
                'class' => 'Page_Title',
            ],  
            [
                'section_title' => 'on',
                'file_path' => 'elementor/widgets/button.php',
                'class' => 'Axil_Button',
            ],      
            [
                'section_title' => 'on',
                'file_path' => 'elementor/widgets/accordion.php',
                'class' => 'axil_Accordion',
            ], 
            [
                'section_title' => 'on',
                'file_path' => 'elementor/widgets/funfact.php',
                'class' => 'axil_funfact_box',
            ],  
            [
                'section_title' => 'on',
                'file_path' => 'elementor/widgets/funfact-group.php',
                'class' => 'axil_funfact_group',
            ],           
            [
                'section_title' => 'on',
                'file_path' => 'elementor/widgets/faq.php',
                'class' => 'axil_faq',
            ],     
            [
                'section_title' => 'on',
                'file_path' => 'elementor/widgets/process-box.php',
                'class' => 'axil_process_box',
            ], 
            [
                'section_title' => 'on',
                'file_path' => 'elementor/widgets/single-process-box.php',
                'class' => 'axil_single_process_box',
            ],      
             
            [
                'section_title' => 'on',
                'file_path' => 'elementor/widgets/video-popup.php',
                'class' => 'Video_Popup',
            ],   
             
            [
                'section_title' => 'on',
                'file_path' => 'elementor/widgets/pricing-table.php',
                'class' => 'Pricing_Table',
            ], 
            [
                'section_title' => 'on',
                'file_path' => 'elementor/widgets/plan-library-tabs.php',
                'class' => 'axil_plan_library_tabs',
            ], 
            [
                'section_title' => 'on',
                'file_path' => 'elementor/widgets/poster-banner.php',
                'class' => 'Poster_banner',
            ],    
            [
                'section_title' => 'on',
                'file_path' => 'elementor/widgets/corporate-agency-banner.php',
                'class' => 'axil_Corporate_Agency_Banner',
            ],  
            // [
            //     'section_title' => 'on',
            //     'file_path' => 'elementor/widgets/shape.php',
            //     'class' => 'Abstrak_shape',
            // ],  
            [
                'section_title' => 'on',
                'file_path' => 'elementor/widgets/brand.php',
                'class' => 'Abstrak_brand',
            ],   
             
            [
                'section_title' => 'on',
                'file_path' => 'elementor/widgets/testimonial-grid.php',
                'class' => 'Testimonial_grid',
            ], 
            [
                'section_title' => 'on',
                'file_path' => 'elementor/widgets/case-study.php',
                'class' => 'Abstrak_case_study',
            ], 
            [
                'section_title' => 'on',
                'file_path' => 'elementor/widgets/case-study-slider.php',
                'class' => 'Abstrak_case_study_slider',
            ], 
            [
                'section_title' => 'on',
                'file_path' => 'elementor/widgets/case-study-slider-onepage.php',
                'class' => 'Abstrak_case_study_slider_onepage',
            ], 
            [
                'section_title' => 'on',
                'file_path' => 'elementor/widgets/casestudy-grid.php',
                'class' => 'axil_Case_Study',
            ],
            [
                'section_title' => 'on',
                'file_path' => 'elementor/widgets/casestudy-grid-onepage.php',
                'class' => 'axil_Case_Study_Onepage',
            ],
            [
                'section_title' => 'on',
                'file_path' => 'elementor/widgets/portfolio.php',
                'class' => 'axil_Projects',
            ],
            [
                'section_title' => 'on',
                'file_path' => 'elementor/widgets/portfolio-onepage.php',
                'class' => 'axil_Projects_onepage',
            ],
            [
                'section_title' => 'on',
                'file_path' => 'elementor/widgets/teams.php',
                'class' => 'Axil_Team_Grid',
            ],   
            [
                'section_title' => 'on',
                'file_path' => 'elementor/widgets/team-details.php',
                'class' => 'axil_team_details',
            ],   
            [
                'section_title' => 'on',
                'file_path' => 'elementor/widgets/services-box.php',
                'class' => 'axil_services_box',
            ], 
            [
                'section_title' => 'on',
                'file_path' => 'elementor/widgets/service-area.php',
                'class' => 'axil_services_grid',
            ], 
            [
                'section_title' => 'on',
                'file_path' => 'elementor/widgets/service-area-onepage.php',
                'class' => 'axil_services_grid_onepage',
            ], 

            [
                'section_title' => 'on',
                'file_path' => 'elementor/widgets/services-navigation.php',
                'class' => 'axil_services_navigation',
            ],  
            [
                'section_title' => 'on',
                'file_path' => 'elementor/widgets/post-grid.php',
                'class' => 'Abstrak_post_grid',
            ],  
            [
                'section_title' => 'on',
                'file_path' => 'elementor/widgets/post-grid-onepage.php',
                'class' => 'Abstrak_post_grid_onepage',
            ], 
            [
                'section_title' => 'on',
                'file_path' => 'elementor/widgets/contact-page.php',
                'class' => 'axil_Contact_Page',
            ], 
            [
                'section_title' => 'on',
                'file_path' => 'elementor/widgets/contact-forms.php',
                'class' => 'axil_Contact_Forms',
            ],   
            [
                'section_title' => 'on',
                'file_path' => 'elementor/widgets/contact-forms2.php',
                'class' => 'axil_Contact_Forms2',
            ],   
            [
                'section_title' => 'on',
                'file_path' => 'elementor/widgets/contact-card.php',
                'class' => 'axil_contact_card',
            ],  
            [
                'section_title' => 'on',
                'file_path' => 'elementor/widgets/followers.php',
                'class' => 'axil_followers',
            ],   
            [
                'section_title' => 'on',
                'file_path' => 'elementor/widgets/our-office.php',
                'class' => 'axil_office',
            ],   
            [
                'section_title' => 'on',
                'file_path' => 'elementor/widgets/list.php',
                'class' => 'axil_list',
            ],   
            [
                'section_title' => 'on',
                'file_path' => 'elementor/widgets/blockqoute.php',
                'class' => 'axil_Blockqoute',
            ],   
            [
                'section_title' => 'on',
                'file_path' => 'elementor/widgets/pricing-plan-accordion.php',
                'class' => 'axil_faq_section_title',
            ],  
            [
                'section_title' => 'on',
                'file_path' => 'elementor/widgets/customer-review.php',
                'class' => 'Customer_Review',
            ],   
            [
                'section_title' => 'on',
                'file_path' => 'elementor/widgets/youtube-popup.php',
                'class' => 'YouTube_Popup',
            ],  
            [
                'section_title' => 'on',
                'file_path' => 'elementor/widgets/services-box-repeater-grid.php',
                'class' => 'axil_services_box_repeater',
            ],    

            
        ];
        foreach ($widget_files as $widget_file) {
            if ( file_exists( ABSTRAK_ELEMENTS_BASE_DIR . $widget_file['file_path'] ) && $widget_file['section_title'] == 'on' ) {                
                require_once ABSTRAK_ELEMENTS_BASE_DIR. $widget_file['file_path'];
                $class_name_with_namespace = "axiltheme\\abstrak_elements\\" . $widget_file['class'];
                $widgets_manager->register_widget_type( new $class_name_with_namespace() );
            }
        }


    }
}    
new abstrak_Widgets_Control();