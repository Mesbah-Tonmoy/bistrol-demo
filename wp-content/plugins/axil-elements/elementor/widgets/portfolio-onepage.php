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
class axil_Projects_onepage extends Widget_Base {

 use \Elementor\AxilElementCommonFunctions;

 public function get_name() {
        return 'axil-Project-isotope-onepage';
    }    
    public function get_title() {
        return esc_html__( 'Projects - One page', 'axil-elements' );
    }
    public function get_icon() {
        return 'eicon-gallery-grid';
    }
    public function get_categories() {
        return [ ABSTRAK_ELEMENTS_THEME_PREFIX . '-widgets' ];
    }
    public function axil_get_img($img)
    {
        $img = ABSTRAK_ELEMENTS_BASE_URL . 'assets/media/' . $img;
        return $img;
   }
    public function get_keywords()
    {
        return ['project', 'portfolio', 'axil-elements'];
    }
	protected function register_controls() {
    $this->axil_section_title('projects', 'Section Title', 'h2', true, 'left');

      $this->axil_query_controls('query', 'Project', 'axil-projects', 'axil-projects-category');
        $this->start_controls_section(
            '_project_filter',
            [
                'label' => esc_html__('Extra Options', 'axil-elements'),
            ]
        );

        $this->add_control(
            'container_fluid',
            [
                'label'        => esc_html__('Container fluid ?', 'axil-elements'),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => esc_html__('Yes', 'axil-elements'),
                'label_off'    => esc_html__('No', 'axil-elements'),
                'return_value' => 'yes',
                'separator'    => 'before',
                'default'      => 'no'
            ]
        );

        $this->add_control(
            'bdtype',
            [
                'label' => esc_html__( 'Background Type', 'axil-elements' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'bg-color-light',
               
                'options' => [
                    'bg-color-emty'   => esc_html__( 'Empty', 'axil-elements' ),                  
                    'bg-color-light'   => esc_html__( 'Light', 'axil-elements' ),
                    
                ],
            ] 
        );
        $this->add_control(
            'project_filter',
            [
                'label'        => esc_html__('Filter ?', 'axil-elements'),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => esc_html__('Yes', 'axil-elements'),
                'label_off'    => esc_html__('No', 'axil-elements'),
                'return_value' => 'yes',
                'separator'    => 'before',
                'default'      => 'yes'
            ]
        );
         $this->add_responsive_control(
                'axil_filter_align',
                [
                    'label' => esc_html__( 'Filter Alignment', 'axil-elements' ),
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
                     'condition' => array( 'project_filter' => array( 'yes' ) ),
                    'default' => 'left',
                 
                    'toggle' => true,
                    'selectors' => array(
                        '{{WRAPPER}} .isotope-button' => 'text-align: {{VALUE}}',
                    ),
                ]
            );
      
        $this->add_control(
            'project_filter_all_button_label',
            [
                'label' => esc_html__('All Button Label', 'axil-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('All', 'axil-elements'),
                'placeholder' => esc_html__('Type all project button label here', 'axil-elements'),
                'condition' => [
                    'project_filter' => 'yes'
                ]
            ]
        );
 
        $this->axil_link_controls2('project_button', 'Discover More Projects Button', 'Discover More Projects', true, true);

        $this->end_controls_section(); 

        $this->axil_basic_style_controls('project_title_pre_title', 'Tag Line', '.section-title span.sub-title');
        $this->axil_basic_style_controls('project_title_title', 'Title', '.section-title .title');
        $this->axil_basic_style_controls('project_title_description', 'Description', '.section-title p');

        $this->axil_basic_style_controls('project_title', 'Project Title', '.portfolio .inner .port-overlay-info .hover-action .title');
        $this->axil_basic_style_controls('project_category', 'Project Category', '.portfolio .inner .port-overlay-info .hover-action span.category');
        
        $this->axil_link_controls_style('project_button_style', 'Discover More Button', '.axil-button', 'btn-size-md');
        
        $this->axil_section_style_controls('project_area', 'Project Area', '.axil-portfolio-area');
        
        $this->start_controls_section(
            'axil_responsive',
                [
                'label' => __( 'Custom Grid', 'axil-elements' ),
                ]
            );

            $this->add_control(
                'col_gap',
                [
                    'label' => __( 'Column Gap (px)', 'axil-elements' ),
                    'type' => Controls_Manager::SELECT,
                    'options' => [
                        'row-15' => esc_html__( '15', 'axil-elements' ),                       
                        'row-35' => esc_html__( '35', 'axil-elements' ),
                        'row-40'  => esc_html__( '40', 'axil-elements' ),
                        'row-45'  => esc_html__( '45', 'axil-elements' ),
                        
                        ],
                    'default' => 'row-35',
                ] 
            );

            $this->add_control(
                'col_xl',
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
                    'default' => '4',
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
                    'default' => '6',
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
                    'default' => '12',
                ] 
            );          
        $this->end_controls_section();
            $this->start_controls_section(       
            'poster_shape7',
                [
                    'label' => esc_html__( 'Background Shapes', 'axil-elements' ),        
                       
                              
                ]
            );  
            $this->add_control(
                'shape_style_on',
                [
                    'label' => __( 'Shape Condition', 'axil-elements' ),
                   

                    'type'         => Controls_Manager::SWITCHER,
                    'label_on'     => esc_html__('Yes', 'axil-elements'),
                    'label_off'    => esc_html__('No', 'axil-elements'),
                    'return_value' => 'yes',
                    'separator'    => 'before',
                    'default'      => 'yes'
                ]
            );   
            $this->add_control(
            'shape_7_1',
            [
                'label' => esc_html__('Shape 1','axil-elements'),
                'type'=>Controls_Manager::MEDIA,                    
                'default' => [
                    'url' =>  $this->axil_get_img( 'shape7/circle-2.png' ),
                ],
                'condition' => array( 'shape_style_on' => array( 'yes' ) ),
                'dynamic' => [
                    'active' => true,
                ],
                    
            ]
            );      
            $this->add_control(
            'shape_7_2',
            [
                'label' => esc_html__('Shape 2','axil-elements'),
                'type'=>Controls_Manager::MEDIA,                    
                'default' => [
                   'url' =>  $this->axil_get_img( 'shape7/bubble-2.png' ),
                ],
                'condition' => array( 'shape_style_on' => array( 'yes' ) ),
                'dynamic' => [
                    'active' => true,
                ],
                    
            ]
            );      
            $this->add_control(
                'shape_7_3',
                [
                    'label' => esc_html__('Shape 3','axil-elements'),
                    'type'=>Controls_Manager::MEDIA,                    
                    'default' => [
                       'url' =>  $this->axil_get_img( 'shape7/bubble-1.png' ),
                    ],
                    'condition' => array( 'shape_style_on' => array( 'yes' ) ),
                    'dynamic' => [
                        'active' => true,
                    ],
                        
                ]
            );  

        $this->end_controls_section(); 

	} 

	private function isotope_load_scripts(){
		wp_enqueue_script('isotope-pkgd');
		wp_enqueue_script('imagesloaded');
	}

	protected function render() {
		$settings = $this->get_settings();		
		$this->isotope_load_scripts();
		$settings = $this->get_settings_for_display();
        $this->add_render_attribute('title_args', 'class', 'title wow mb--0');
  
        /**
         * Setup the post arguments.
         */
        $query_args = axil_Elements_Helper::axil_get_query_args('axil-projects', 'axil-projects-category', $this->get_settings());

        // The Query
        $query = new \WP_Query($query_args);
        $elemid = 'portfolio-' . rand(000000, 999999);

        $row_class = ( $settings['project_filter'] == 'yes') ? "col-lg-5 col-md-12" : "col-12";
        $container_fluid = ( $settings['container_fluid'] == 'yes') ? "container-fluid plr--30" : "container";

        $col_class = "col-xl-{$settings['col_xl']} col-lg-{$settings['col_lg']} col-md-{$settings['col_md']} col-sm-{$settings['col_sm']} project";
        $col_gap = $settings['col_gap'];
        $allowed_tags = wp_kses_allowed_html( 'post' );
        ?>
 
     <!-- Start Portfolio Area -->
     <div class="axil-portfolio-area project-column-<?php echo esc_attr($settings['col_xl']); ?>  section section-padding-2 <?php echo esc_attr($settings['bdtype']); ?>  filter-area-<?php echo esc_attr($this->get_id()); ?>" data-unique-id="filter-area-<?php echo esc_attr($this->get_id()); ?>">
        <div class="<?php echo esc_attr( $container_fluid  ); ?> axil-masonary-wrapper">              
            
            <?php if( $settings['seation_projects_title_on'] =='yes' ){ ?> 
                <div class="section-heading heading-dark-<?php echo esc_attr($settings['axil_projects_align']); ?>">
                    <?php axil_Elements_Helper::axil_section_title_render( 'projects','extra07-color', $settings ); ?>                       
                </div>
            <?php } ?>  
                <div class="axil-isotope-wrapper">
                    <?php if( $settings['project_filter'] == 'yes'){
                        $category_list = '';
                        if (!empty($settings['category'])) {
                            $category_list = implode(" ", $settings['category']);
                        }
                        $category_list_value = explode(" ", $category_list);
                        ?>
                        <?php if ($category_list_value && !is_wp_error($category_list_value)): ?>

                            <div class="messonry-button isotope-button isotope-project-btn" data-isotope-id="#<?php echo $elemid ?>">
                                <button data-filter="*" class="is-checked"><span class="filter-text"><?php echo esc_html($settings['project_filter_all_button_label']); ?></span>
                                </button>
                                <?php if (!empty($settings['category'])) {
                                    foreach ($category_list_value as $category) {
                                        $categoryName = get_term_by('slug', $category, 'axil-projects-category');
                                        ?>
                                        <button data-filter=".<?php echo esc_attr($category); ?>"><span
                                                    class="filter-text"><?php echo esc_html($categoryName->name); ?></span>
                                        </button>
                                    <?php }
                                } else {
                                    $terms = get_terms(array(
                                        'taxonomy' => 'axil-projects-category',
                                        'hide_empty' => true,
                                    ));
                                    if ($terms && !is_wp_error($terms)) {
                                        foreach ($terms as $term) { ?>
                                        <button data-filter=".<?php echo esc_attr($term->slug); ?>"><span
                                                    class="filter-text"><?php echo esc_html($term->name); ?></span>
                                            </button><?php
                                        }
                                    }
                                } ?>
                            </div>                            
                        <?php endif ?>
                    <?php } ?>               
                <?php $i = 1;
                ?>
                <?php if ($query->have_posts()) { ?>
                    <div  id="<?php echo esc_attr($elemid) ?>" class="row <?php echo esc_attr($col_gap); ?> isotope-list">
                        <?php while ($query->have_posts()) {
                            global $post;
                            $query->the_post();
                            $terms = get_the_terms($post->ID, 'axil-projects-category');
                            if ($terms && !is_wp_error($terms)) {
                                $termsList = array();
                                foreach ($terms as $category) {
                                    $termsList[] = $category->slug;
                                }
                                $termsAssignedCat = join(" ", $termsList);
                            } else {
                                $termsAssignedCat = '';
                            }
                            $active = ($i == 1) ? 'active' : '';
                            $popup_content = get_field( "popup_content");
                            $modal_img_atts = get_the_post_thumbnail($post->ID, 'full', array('class' => 'modal-thumb'));  
                            ?>
                            <!-- Start Single Portfolio -->
                            <div class="<?php echo esc_attr($col_class); ?>  <?php echo esc_attr($active); ?> <?php echo esc_attr($termsAssignedCat); ?>">
                                 <div class="project-grid">
                                        <div class="thumbnail">
                                           <a href="<?php the_permalink(); ?>"> <?php the_post_thumbnail('axil-project-thumb'); ?></a>
                                            <?php echo $modal_img_atts; ?>
                                        </div>
                                        <div class="content">
                                           <h4 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> </h4>                     
                                        <?php if ($terms && !is_wp_error($terms)): ?>
                                            <span class="subtitle">                                       
                                                <span><?php echo axil_Elements_Helper::axil_get_projects_cat( get_the_id()); ?></span>
                                            </span>
                                        <?php endif ?> 
                                             <div class="details-description">
                                                 <?php echo $popup_content; ?>      
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                                <!-- End Single Portfolio -->
                                <?php
                                    $i++;
                                } ?>
                                <?php wp_reset_postdata(); ?>
                            </div>
                            <?php if ( $settings['axil_project_button_show'] == 'yes' ) { 
                                $attr = '';
                                $btn = '';

                                if ('1' == $settings['axil_project_button_link_type']) {
                                    if ( !empty( $settings['axil_project_button_link']['url'] ) ) {
                                        $attr  = 'href="' . $settings['axil_project_button_link']['url'] . '"';
                                        $attr .= !empty( $settings['axil_project_button_link']['is_external'] ) ? ' target="_blank"' : '';
                                        $attr .= !empty( $settings['axil_project_button_link']['nofollow'] ) ? ' rel="nofollow"' : '';
                                         
                                    }
                                    if ( !empty( $settings['axil_project_button_text'] ) ) {
                                        $btn = '<a class="axil-btn btn-fill-primary" ' . $attr . '>' . $settings['axil_project_button_text'] . '</a>';
                                    }

                                }elseif( '2' == $settings['axil_project_button_link_type'] ) {
                                    $attr  = 'href="' . get_permalink( $settings['axil_project_button_page_link'] ) . '"';
                                    $attr .= ' target="_self"';
                                    $attr .= ' rel="nofollow"';                        
                                    $btn = '<a class="axil-btn btn-fill-primary" ' . $attr . '>' . $settings['axil_project_button_text'] . '</a>';
                                }elseif('3' == $settings['axil_project_button_link_type']){
                                    $attr  = 'href="' . get_post_type_archive_link('axil-projects') . '"';
                                    $attr .= ' target="_self"';
                                    $attr .= ' rel="nofollow"';                        
                                    $btn = '<a class="axil-btn btn-fill-primary" ' . $attr . '>' . $settings['axil_project_button_text'] . '</a>';
                              }else{                                                          
                                    $btn = '';
                                }    
                            ?>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="more-project-btn case-study-btn text-center">
                                            <?php if ('4' == $settings['axil_project_button_link_type']) { ?>  
                                                <div class="pagination justify-content-center"> 
                                                   <?php
                                                   $big = 999999999; // need an unlikely integer

                                                   if (get_query_var('paged')) {
                                                       $paged = get_query_var('paged');
                                                   } else if (get_query_var('page')) {
                                                       $paged = get_query_var('page');
                                                   } else {
                                                       $paged = 1;
                                                   }
                                                   echo paginate_links( array(
                                                       'base'       => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
                                                       'format'     => '?paged=%#%',
                                                       'current'    => $paged,
                                                       'total'      => $query->max_num_pages,
                                                       'type'       =>'list',
                                                       'prev_text'  =>'<i class="fas fa-arrow-left"></i>',
                                                       'next_text'  =>'<i class="fas fa-arrow-right"></i>',
                                                       'show_all'   => false,
                                                       'end_size'   => 1,
                                                       'mid_size'   => 4,
                                                   ) );
                                                   ?>
                                               </div>
                                            <?php }else{ ?>                                                       
                                               <?php echo wp_kses( $btn, $allowed_tags ); ?>
                                            <?php }  ?>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>               
                <?php } ?>
            </div>

            <?php if( $settings['shape_style_on'] == 'yes' ){ 
                $shape1 =  $settings['shape_7_1']['url'];
                $shape2 =  $settings['shape_7_2']['url'];
                $shape3 =  $settings['shape_7_3']['url'];
                ?>

                <ul class="shape-group-7 list-unstyled">
                    <?php if( $shape1 ){ ?>     
                        <li class="shape shape-1"><img src="<?php echo esc_url( $shape1 );?>" alt="<?php esc_html__( 'circle', 'axil-elements' ); ?>"></li>
                    <?php } ?> 
                    <?php if( $shape2 ){ ?>     
                        <li class="shape shape-2"><img src="<?php echo esc_url( $shape2 );?>" alt="<?php esc_html__( 'Line', 'axil-elements' ); ?>"></li>
                    <?php } ?> 
                    <?php if( $shape3 ){ ?>     
                        <li class="shape shape-3"><img src="<?php echo esc_url( $shape3 );?>" alt="<?php esc_html__( 'Line', 'axil-elements' ); ?>"></li>
                    <?php } ?> 
                </ul>
            <?php } ?>  
        </div> 
         <!-- Portfolio Modal Box -->
            <div class="op-portfolio-modal op-modal-wrap">
                <div class="op-modal-inner">
                    <button class="close"><i class="far fa-times"></i></button>
                    <div class="op-modal-content">
                        <div class="portfolio-thumbnail"></div>
                        <div class="portfolio-content"></div>
                    </div>
                </div>
            </div>
            <!-- Portfolio Modal Box -->
        <?php
		
	}
}