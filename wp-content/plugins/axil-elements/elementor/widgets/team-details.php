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
use Elementor\Icons_Manager;


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
class axil_team_details extends Widget_Base {
 use \Elementor\AxilElementCommonFunctions;

 public function get_name() {
        return 'axil-team-details';
    }    

    public function get_title() {
        return esc_html__( 'Team Details', 'axil-elements' );
    }
    public function get_icon() {
          return 'eicon-single-page';
    }

    public function get_categories() {
        return [ ABSTRAK_ELEMENTS_THEME_PREFIX . '-widgets' ];
    }


	protected function register_controls() {
      
		$this->start_controls_section(
            'axil_team_followers',
            [
                'label' => esc_html__('Team Details' , 'axil-elements'),
            ]
        );


        $this->add_control(
            'title',
            [
                'label' => __( 'Title', 'axil-elements' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( 'Ralph Edwards', 'axil-elements' ),
                'placeholder' => __( 'Title', 'axil-elements' ),
                 'label_block' => true,
            ]
        );
        $this->add_control(
            'subtitle',
            [
                'label' => __( 'Sub Title', 'axil-elements' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( 'Communications Strategist', 'axil-elements' ),
                'placeholder' => __( 'Sub title', 'axil-elements' ),
                 'label_block' => true,
            ]
        );

        $this->add_control(
            'social_display',
            [
                
                'type' => Controls_Manager::SWITCHER,
                'label'       => __( 'Social Media Display', 'axil-elements' ),
                'label_on'    => __( 'On', 'axil-elements' ),
                'label_off'   => __( 'Off', 'axil-elements' ),
                'default'     => 'yes',
               
            ] 
        );  
        $repeater = new Repeater();
        $repeater->add_control(
            'followers_link',
            [
                'label' => esc_html__('Link', 'axil-elements'),
                'type' => Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'axil-elements'),
                'show_external' => true,
                
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );
        $repeater->add_control(
                'followers_icon',
                [
                    'label' => __( 'Icons', 'axil-elements' ),
                    'type' => Controls_Manager::ICONS,
                    
                    
                         
                ]
            );

        $this->add_control(
            'followers',
            [
                'label' => esc_html__('Repeater Followers', 'axil-elements'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'condition' => array( 'social_display' => array( 'yes' ) ),
                'default' => [
                    [
                        'followers_title' => esc_html__('Facebook', 'axil-elements'),
                         
                        'followers_icon' => [
                            'value' => 'fab fa-facebook-f',
                            'library' => 'fa-solid',
                        ],
                        

                    ],
                    [
                         'followers_title' => esc_html__('Twitter', 'axil-elements'),

                        'followers_icon' => [
                            'value' => 'fab fa-twitter',
                            'library' => 'fa-solid',
                        ],
                         
                        
                    ],
                    [
                         'followers_title' => esc_html__('Pinterest', 'axil-elements'),
                        
                        'followers_icon' => [
                            'value' => 'fab fa-pinterest-p',
                            'library' => 'fa-solid',
                        ],
                        
                    ],
                    [
                         'followers_title' => esc_html__('Instagram', 'axil-elements'),
                          
                        'followers_icon' => [
                            'value' => 'fab fa-instagram',
                            'library' => 'fa-solid',
                        ],
                        
                    ],
                    [
                         'followers_title' => esc_html__('Linkedin', 'axil-elements'),
                         'followers_icon' => 'fab fa-linkedin-in',

                        'followers_icon' => [
                            'value' => 'fab fa-linkedin-in',
                            'library' => 'fa-solid',
                        ],
                        
                    ],
                    [
                         'followers_title' => esc_html__('Vimeo', 'axil-elements'), 

                        'followers_icon' => [
                            'value' => 'fab fa-vimeo-v',
                            'library' => 'fa-solid',
                        ],
                        
                    ],
                    [
                         'followers_title' => esc_html__('Dribbble', 'axil-elements'),
                         
                        'followers_icon' => [
                            'value' => 'fab fa-dribbble',
                            'library' => 'fa-solid',
                        ],
                        
                    ],
                    [
                         'followers_title' => esc_html__('Behance', 'axil-elements'),
                         
                         'followers_icon' => [
                            'value' => 'fab fa-behance',
                            'library' => 'fa-solid',
                        ],
                        
                    ],


                ],
                'title_field' => '{{{ followers_title }}}',
            ]
        );

        $this->add_control(
            'content',
            [
                'label' => __( 'Content', 'axil-elements' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __( 'Phasellus in libero et nunc malesuada tincidunt. Morbi auctor tristique semper. Nunc condimentum dapibus felis, non volutpat ligula dapibus non. Quisque varius massa magna, eget iaculis ipsum tincidunt sed. Sed tempus magna id nunc posuere auctor. Morbi aliquam a justo eget cursus. Donec at quam id ex mollis dapibus eget ac sem. Maecenas pharetra bibendum massa, ut tincidunt lectus.', 'axil-elements' ),
                'placeholder' => __( 'Content Details', 'axil-elements' ),
            ]
        );
        $this->end_controls_section();

        $this->axil_basic_style_controls('team_details_title',      'Title', '.team-details-content .title');
        $this->axil_basic_style_controls('team_details_subtitle',   'Sub Title', '.team-details-content .subtitle');
        $this->axil_basic_style_controls('team_details_icon_list',  'Icon List', '.team-details-content .social-share li a');
        $this->axil_basic_style_controls('team_details_content',    'Details Content', '.team-details-content p');
	} 
    protected function render() {
		$settings = $this->get_settings();
        ?> 
        <div class="team-details-content">
            <?php  if ($settings['title']) { ?>
            <h2 class="title"><?php echo esc_attr( $settings['title'] ); ?></h2>
            <?php } ?>
            <?php  if ($settings['subtitle']) { ?>
                <span class="subtitle"><?php echo esc_attr( $settings['subtitle'] ); ?></span>
            <?php } ?>
                <?php  if ($settings['social_display']) { ?>
                    <ul class="social-share list-unstyled">
                        <?php foreach ($settings['followers'] as $item) { ?>
                            <li><a href="<?php echo esc_attr( $item['followers_link']['url'] ); ?>"><?php Icons_Manager::render_icon( $item['followers_icon'] ); ?></a></li>
                        <?php } ?>
                    </ul>
               <?php } ?>
                <?php  if ($settings['content']) { ?>
                     <p><?php echo axil_kses_intermediate( $settings['content'] ); ?> </p>
                <?php } ?>
        </div>                      
        <?php 		
	}
}