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

class axil_funfact_group extends Widget_Base {
  use \Elementor\AxilElementCommonFunctions;
 public function get_name() {
        return 'axil-funfact-group';
    }    
    public function get_title() {
        return __( 'Counterup - Group', 'axil-elements' );
    }
    public function get_icon() {
        return 'eicon-counter';
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
        
        $this->axil_section_title('funfact_group', 'Section Title', 'h2', true, 'center'); 
        $this->axil_basic_style_controls('funfact_group_pre_title', 'Section - Tag Line', '.section-heading .subtitle');
        $this->axil_basic_style_controls('funfact_group_title', 'Section - Title', '.section-heading .title');        
        $this->axil_basic_style_controls('funfact_group_description', 'Section - Description', '.section-heading p'); 


        $this->start_controls_section(
            'funfact_layout2_panel',
            [
                'label' => esc_html__('Layout & button','axil-elements'),
                
            ]
        );
        $this->add_control(
            'style',
            [
                'label' => esc_html__( 'Layouts', 'axil-elements' ),
                'type' => Controls_Manager::SELECT,
                'default' => '1',                
                'options' => [
                    '1'   => esc_html__( 'Layouts One', 'axil-elements' ),
                    '2'   => esc_html__( 'Layouts Two', 'axil-elements' ),                  
                    
                ],
            ] 
        ); 
         $this->add_control(
            'btn_link_text',
            [
                'label' => esc_html__('Link Text','axil-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Read Case Study',
                'title' => esc_html__('Enter button text','axil-elements'),
                 'separator'     => 'before',
                 'condition' => array( 'style' => array( '2' ) ),
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
                'condition' => array( 'style' => array( '2' ) ),
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
                    'btn_link_type' => '1',
                    'style' => '2'
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
                    'btn_link_type' => '2',
                    'style' => '2'
                ]
            ]
        ); 
       $this->end_controls_section();

        $this->start_controls_section(
            'funfact_layout_panel',
            [
                'label' => esc_html__('Counter Group','axil-elements'),
                
            ]
        );
         

        $repeater = new Repeater();
        $repeater->add_control(
                'recommended_on',
                [
                    'label' => esc_html__( 'Active', 'axil-elements' ),
                    'type' => Controls_Manager::SWITCHER,
                    'label_on'    => esc_html__( 'On', 'axil-elements' ),
                    'label_off'   => esc_html__( 'Off', 'axil-elements' ),
                    'default'     => 'no',
                   
                ]
            );
        
        $repeater->add_control(
            'funfact_icon_type',
            [
                'label' => esc_html__('Select Icon Type', 'axil-elements'),
                'type' =>  Controls_Manager::SELECT,
                'default' => 'image',
                'options' => [
                    'image' => esc_html__('Image', 'axil-elements'),
                    'icon' => esc_html__('Icon', 'axil-elements'),
                ],
            ]
        ); 

        $repeater->add_control(
            'funfact_image',
            [
                'label' => esc_html__('Upload Image', 'axil-elements'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'funfact_icon_type' => 'image'
                ]

            ]
        );
        $repeater->add_control(
                Group_Control_Image_Size::get_type(),
                [
                    'name' => 'image_size',
                    'default' => 'large',
                    'separator' => 'none',
                     'condition' => [
                                'funfact_icon_type' =>'image',
                            ], 
                ]
            ); 
       $repeater->add_control(
            'funfact_selected_icon',
            [
                'show_label' => false,
                'type' => Controls_Manager::ICONS,
                'fa4compatibility' => 'icon',
                'label_block' => true,
                'default' => [
                    'value' => 'fas fa-pen-nib',
                    'library' => 'fa-solid',
                ],
                'condition' => [
                    'funfact_icon_type' => 'icon'
                ]
            ]
        ); 
        $repeater->add_control(
            'funfact_title', [
                'label' => esc_html__('Title', 'axil-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Funfact Title', 'axil-elements'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'funfact_number',
            [
                'label' => esc_html__('Number', 'axil-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => '50',
                'label_block' => true,
            ]
        ); 

        $repeater->add_control(
            'funfact_number_sup',
            [
                'label' => esc_html__('Funfact Number Sup', 'axil-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => '+',
                'label_block' => true,
            ]
        );
 
        $this->add_control(
            'funfact_list',
            [
                'label' => esc_html__('Counter List','axil-elements'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                       'funfact_title' => esc_html__('Years of operation','axil-elements'),
                        'funfact_number' => '15',
                        'funfact_number_sup' => '+',
                        
                    ],
                    [
                        'funfact_title' => esc_html__('Projects deliverd','axil-elements'),
                        'funfact_number' => '360',
                        'funfact_number_sup' => '+',
                        
                    ],
                    [
                        'funfact_title' => esc_html__('Specialist','axil-elements'),
                        'funfact_number' => '600',
                        'funfact_number_sup' => '+',
                        
                    ],
                    [
                        'funfact_title' => esc_html__('Years of operation','axil-elements'),
                        'funfact_number' => '64',
                        'funfact_number_sup' => '+',
                        
                    ]
                ],
                'title_field' => '{{{ funfact_title }}}',
            ]
        );

        $this->end_controls_section();
        $this->start_controls_section(   

        'poster_shape5',
            [
                'label' => esc_html__( 'Background Shapes & Color', 'axil-elements' ),  
                'condition' => array( 'style' => array( '1' ) ), 
            ]
        );         
  
        $this->add_group_control(
        \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'background',
                'label' => __( 'Background', 'axil-elements' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .section.bg-color-dark', 
                 'condition' => array( 'style' => array( '1' ) ),   
                              
            ]
        ); 

         $this->add_control(
                'shape_style_on',
                [
                    'label' => esc_html__( 'Customize', 'axil-elements' ),
                    'type' => Controls_Manager::SWITCHER,
                    'label_on'    => esc_html__( 'On', 'axil-elements' ),
                    'label_off'   => esc_html__( 'Off', 'axil-elements' ),
                    'default'     => 'yes',
                   
                ]
            );    
        $this->add_control(
        'shape51',
        [
            'label' => esc_html__('Shape 1','axil-elements'),
            'type'=>Controls_Manager::MEDIA,                    
            'default' => [
                'url' =>  $this->axil_get_img( 'shape5/circle-1.png' ),
            ],
            'dynamic' => [
                'active' => true,
            ],
            'condition' => array( 'shape_style_on' => array( 'yes' ) ),
                
        ]
        );      
        $this->add_control(
            'shape52',
            [
                'label' => esc_html__('Shape 2','axil-elements'),
                'type'=>Controls_Manager::MEDIA,                    
                'default' => [
                   'url' =>  $this->axil_get_img( 'shape5/line-3.png' ),
                ],
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => array( 'shape_style_on' => array( 'yes' ) ),
                    
            ]
        );      
        $this->add_control(
            'shape53',
            [
                'label' => esc_html__('Shape 3','axil-elements'),
                'type'=>Controls_Manager::MEDIA,                    
                'default' => [
                   'url' =>  $this->axil_get_img( 'shape5/bubble-5.png' ),
                ],
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => array( 'shape_style_on' => array( 'yes' ) ),
                    
            ]
        );  
        $this->add_control(
            'shape54',
            [
                'label' => esc_html__('Shape 4','axil-elements'),
                'type'=>Controls_Manager::MEDIA,                    
                'default' => [
                   'url' =>  $this->axil_get_img( 'shape5/bubble-6.png' ),
                ],
                'dynamic' => [
                    'active' => true,
                ],
                    
                    'condition' => array( 'shape_style_on' => array( 'yes' ) ),
            ]
        );  


     $this->end_controls_section(); 
     $this->start_controls_section(
            'title_style_section',
            [
                'label' => __( 'Counter Title', 'axil-elements' ),
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
                    '{{WRAPPER}} .counterup-progress .title' => 'color: {{VALUE}}',
                ),
            ]
        );

         $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_font_size',
                'label' => __( 'Typography', 'axil-elements' ),                
                
                'selector' => '{{WRAPPER}} .counterup-progress .title',
            ]
        );
       
        $this->add_responsive_control(
            'title_margin',
            [
                'label' => __( 'Margin', 'axil-elements' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                
                'selectors' => [
                    '{{WRAPPER}} .counterup-progress .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    
                ],
            ]
        );
        
    $this->end_controls_section();
    $this->start_controls_section(
            'subtitle_style_section',
            [
                'label' => __( 'Counter Number', 'axil-elements' ),
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
                    '{{WRAPPER}} .count-number span' => 'color: {{VALUE}}',
                ),
            ]
        );

         $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle_font_size',
                'label' => __( 'Typography', 'axil-elements' ),                
                 
                'selector' => '{{WRAPPER}} .count-number span',
            ]
        );
       
        $this->add_responsive_control(
            'subtitle_margin',
            [
                'label' => __( 'Margin', 'axil-elements' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                 
                'selectors' => [
                    '{{WRAPPER}} .count-number span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    
                ],
            ]
        );
        
    $this->end_controls_section();
    $this->start_controls_section(
            'axil_responsive',
                [
                'label' => __( 'Custom Grid', 'axil-elements' ),
                'condition' => array( 'style' => array( '1' ) ), 
                ]
            );

           
            $this->add_control(
                'col_lg',
                [
                    'label' => __( 'Desktops: > 1199px', 'axil-elements' ),
                    'type' => Controls_Manager::SELECT,
                    'options' => [
                        '12' => esc_html__( '1 Col', 'axil-elements' ),
                        '6'  => esc_html__( '2 Col', 'axil-elements' ),
                        '4'  => esc_html__( '3 Col', 'axil-elements' ),
                        '3'  => esc_html__( '4 Col', 'axil-elements' ),    
                        ],
                    'default' => '3',
                ] 
            );
            $this->add_control(
            'col_md',
                [
                    'label' => __( 'Desktops: > 991px', 'axil-elements' ),
                    'type' => Controls_Manager::SELECT,
                    'options' => [
                        '12' => esc_html__( '1 Col', 'axil-elements' ),
                        '6'  => esc_html__( '2 Col', 'axil-elements' ),
                        '4'  => esc_html__( '3 Col', 'axil-elements' ),
                        '3'  => esc_html__( '4 Col', 'axil-elements' ),    
                        ],
                    'default' => '4',
                ] 
            );
            $this->add_control(
            'col_sm',
                [
                    'label' => __( 'Tablets: > 767px', 'axil-elements' ),
                    'type' => Controls_Manager::SELECT,
                    'options' => [
                        '12' => esc_html__( '1 Col', 'axil-elements' ),
                        '6'  => esc_html__( '2 Col', 'axil-elements' ),
                        '4'  => esc_html__( '3 Col', 'axil-elements' ),
                        '3'  => esc_html__( '4 Col', 'axil-elements' ),    
                        ],
                    'default' => '6',
                ] 
            );          
        $this->end_controls_section();
    }


	protected function render() {
	$settings = $this->get_settings();
    $allowed_tags = wp_kses_allowed_html( 'post' );
    
     $col_class = "col-lg-{$settings['col_lg']} col-md-{$settings['col_md']} col-sm-{$settings['col_sm']}"; 
        if ($settings['style'] == '1') { ?>
        <div class="section section-padding bg-color-dark">
            <div class="container">
               <?php if( $settings['seation_funfact_group_title_on'] =='yes' ){ ?>  

               <div class="section-heading heading-light heading-light-<?php echo esc_attr( $settings['axil_funfact_group_align'] );?>">            
                   <?php  if($settings['axil_funfact_group_title_before']){ ?>
                       <span class="subtitle"><?php echo esc_attr( $settings['axil_funfact_group_title_before'] );?></span>
                   <?php  } ?> 

               <?php if ($settings['axil_funfact_group_title_tag']) : ?>
                   <?php  if($settings['axil_funfact_group_title']){ ?>
                       <<?php echo esc_html( $settings['axil_funfact_group_title_tag'] );?> class="title">
                           <?php echo esc_attr( $settings['axil_funfact_group_title'] );?>
                       </<?php echo esc_html( $settings['axil_funfact_group_title_tag'] );?>> 
                   <?php  } ?>             
               <?php endif; ?> 

                   <?php  if($settings['axil_sub_funfact_group_title']){ ?>
                       <p><?php echo esc_attr( $settings['axil_sub_funfact_group_title'] );?></p>
                   <?php  } ?>
               </div>
           <?php } ?>  
                <div class="row">
                     <?php foreach ($settings['funfact_list'] as $funfact_list) { 
                         $active =    $funfact_list['recommended_on'] == 'yes' ? 'active' : 'no-active'; 
                         ?> 

                        <div class="<?php echo esc_attr($col_class); ?> sal-animate" data-sal="slide-up" data-sal-duration="800" data-sal-delay="100">

                             <div class="counterup-progress <?php echo esc_attr( $active );?>">
                                <?php if ( $funfact_list['funfact_icon_type'] == 'image' ): ?>
                                    <div class="icon">
                                        <?php echo Group_Control_Image_Size::get_attachment_image_html( $funfact_list, 'image_size', 'funfact_image' );?> 
                                    </div>
                                <?php else: ?>
                                    <div class="icon">
                                        <?php Icons_Manager::render_icon( $funfact_list['funfact_selected_icon'] ); ?>
                                    </div>
                                <?php endif; ?>  

                                <div class="count-number h2">
                                    <span class="number count" data-count="<?php echo esc_attr( $funfact_list['funfact_number'] );?>"><?php echo esc_attr( $funfact_list['funfact_number'] );?></span>
                                    <span class="symbol"><?php echo esc_attr( $funfact_list['funfact_number_sup'] ); ?></span>
                                </div>
                                <h6 class="title"><?php echo esc_attr( $funfact_list['funfact_title'] );?></h6>
                            </div> 
                        </div>
                    <?php } ?>  
                </div>
            </div> 

            <?php if( $settings['shape_style_on']  =='yes' ){ 
                $shape1 =  $settings['shape51']['url'];
                $shape2 =  $settings['shape52']['url'];
                $shape3 =  $settings['shape53']['url'];
                $shape4 =  $settings['shape54']['url']; 
                ?>
                <ul class="shape-group-5 list-unstyled">
                <?php if( $shape1 ){ ?>     
                    <li class="shape shape-1"><img src="<?php echo esc_url( $shape1 );?>" alt="<?php echo axil_Elements_Helper::axil_get_image_alt( $settings['shape51']['id'] );?>"></li>
                <?php } ?> 
                <?php if( $shape2 ){ ?>     
                    <li class="shape shape-2"><img src="<?php echo esc_url( $shape2 );?>" alt="<?php echo axil_Elements_Helper::axil_get_image_alt( $settings['shape52']['id'] );?>"></li>
                <?php } ?> 
                <?php if( $shape3 ){ ?>     
                    <li class="shape shape-3"><img src="<?php echo esc_url( $shape3 );?>" alt="<?php echo axil_Elements_Helper::axil_get_image_alt( $settings['shape53']['id'] );?>"></li>
                <?php } ?> 
                <?php if( $shape4 ){ ?>     
                    <li class="shape shape-4"><img src="<?php echo esc_url( $shape4 );?>" alt="<?php echo axil_Elements_Helper::axil_get_image_alt( $settings['shape54']['id'] );?>"></li>
                <?php } ?> 
               
                </ul>
            <?php } ?>     
        </div> 
    <?php }else{   
        $attr = ''; 
        $btn = ''; 
        if ('1' == $settings['btn_link_type']) {
        if ( !empty( $settings['btn_link']['url'] ) ) {
        $attr  = 'href="' . $settings['btn_link']['url'] . '"';
        $attr .= !empty( $settings['btn_link']['is_external'] ) ? ' target="_blank"' : '';
        $attr .= !empty( $settings['btn_link']['nofollow'] ) ? ' rel="nofollow"' : '';
      
        }
        if ( !empty( $settings['btn_link_text'] ) ) {
        $btn = '<a class="axil-btn btn-large btn-fill-primary" ' . $attr . '>' . $settings['btn_link_text'] . '</a>';
        }
        }else {
        $attr  = 'href="' . get_permalink($settings['btn_page_link']) . '"';
        $attr .= ' target="_blank"';
        $attr .= ' rel="nofollow"';                        
        $btn = '<a class="axil-btn btn-large btn-fill-primary" ' . $attr . '>' . $settings['btn_link_text'] . '</a>';
        }


        ?>
        
        <div class="section section-padding expert-counterup-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-5">

                        <?php if( $settings['seation_funfact_group_title_on'] =='yes' ){ ?>  

                           <div class="section-heading heading-dark-<?php echo esc_attr( $settings['axil_funfact_group_align'] );?>">            
                               <?php  if($settings['axil_funfact_group_title_before']){ ?>
                                   <span class="subtitle"><?php echo esc_attr( $settings['axil_funfact_group_title_before'] );?></span>
                               <?php  } ?> 

                           <?php if ($settings['axil_funfact_group_title_tag']) : ?>
                               <?php  if($settings['axil_funfact_group_title']){ ?>
                                   <<?php echo esc_html( $settings['axil_funfact_group_title_tag'] );?> class="title">
                                       <?php echo esc_attr( $settings['axil_funfact_group_title'] );?>
                                   </<?php echo esc_html( $settings['axil_funfact_group_title_tag'] );?>> 
                               <?php  } ?>             
                           <?php endif; ?>
                           <?php  if($settings['axil_sub_funfact_group_title']){ ?>
                                   <p class="mb--50"><?php echo esc_attr( $settings['axil_sub_funfact_group_title'] );?></p>
                               <?php  } ?> 
                        <?php  if ( !empty( $settings['btn_link_text'] ) ) { ?>                    
                            <?php echo wp_kses( $btn, $allowed_tags ); ?>
                        <?php } ?>  
                     </div>
                       <?php } ?> 
                     </div>
                    <div class="col-lg-6 offset-xl-1">
                        <div class="row" id="no-equal-gallery">   
                        <?php 
                        $i = 1; 
                            foreach ($settings['funfact_list'] as $funfact_list) {  
                          
                            if( $i == 1 ){
                                $top_mt =   '';
                                $top_active =   ' active ';
                            }elseif( $i == 2 ) {
                                $top_mt =   'mt--90 mt_md--0 ';
                                  $top_active =   ''; 
                            }elseif( $i==3 ) {
                                $top_mt =   'mt--0 ';
                                $top_active =   '';
                            }elseif( $i==4 ) {
                                $top_mt =   'mt--0 ';
                                $top_active =   ''; 
                            }elseif( $i==5 ) {
                                $top_mt =   ' ';
                                $top_active =   '';
                            }elseif( $i==6 ) {
                                $top_mt =   ' ';
                                $top_active =   '';
                            }else{
                                 $top_mt =   'mt--0 ';
                                 $top_active =   '';
                            }
                             $i++;
                            ?>     
 
                            <div class="col-sm-6 no-equal-item <?php echo esc_attr( $top_mt );?>" data-sal="slide-up" data-sal-duration="800" data-sal-delay="100"> 
                                 <div class="counterup-progress  counterup-style-2 <?php echo esc_attr( $top_active );?>">
                                <?php if ( $funfact_list['funfact_icon_type'] == 'image' ): ?>
                                    <div class="icon">
                                        <?php echo Group_Control_Image_Size::get_attachment_image_html( $funfact_list, 'image_size', 'funfact_image' );?> 
                                    </div>
                                <?php else: ?>
                                    <div class="icon">
                                        <?php Icons_Manager::render_icon( $funfact_list['funfact_selected_icon'] ); ?>
                                    </div>
                                <?php endif; ?>  

                                <div class="count-number h2">
                                    <span class="number count" data-count="<?php echo esc_attr( $funfact_list['funfact_number'] );?>"><?php echo esc_attr( $funfact_list['funfact_number'] );?></span>
                                    <span class="symbol"><?php echo esc_attr( $funfact_list['funfact_number_sup'] ); ?></span>
                                </div>
                                <h6 class="title"><?php echo esc_attr( $funfact_list['funfact_title'] );?></h6>
                            </div> 
                            </div>
                              <?php } ?>  
                        </div>
                    </div>
                </div>
            </div> 

        </div> 
    <?php } ?> 
    <?php 
	}
}
