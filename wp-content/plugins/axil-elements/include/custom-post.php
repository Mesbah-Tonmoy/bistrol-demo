<?php
include_once( ABSTRAK_ELEMENTS_BASE_DIR . '/include/custom-post-type-base.php');
/**
 * Megamenu
 */
$megamenu_args = array(
    'menu_icon' => 'dashicons-editor-kitchensink'
);
$megamenu = new Axil_Register_Custom_Post_Type( 'Megamenu', 'Mega Menus', $megamenu_args);

add_action('init', 'register_axil_team_postype');
function register_axil_team_postype()
    {
    $prefix             = ABSTRAK_PT_PREFIX;

        $axil_options           = Helper::axil_get_options();

    $team_slug          = ( !empty($axil_options['team_slug']) )? $axil_options['team_slug'] :'team';
    $team_cat_slug      = ( !empty($axil_options['team_cat_slug']) )? $axil_options['team_cat_slug'] :'team-cat';

    $labels = array(
        'name'                  => esc_html__('Team',                   'axil-elements'),
        'singular_name'         => esc_html__('Team',                   'axil-elements'),
        'add_new'               => esc_html__('Add New',                'axil-elements'),
        'add_new_item'          => esc_html__('Add New Team',           'axil-elements'),
        'edit_item'             => esc_html__('Edit Team',              'axil-elements'),
        'new_item'              => esc_html__('New Team',               'axil-elements'),
        'view_item'             => esc_html__('View Team',              'axil-elements'),
        'search_items'          => esc_html__('Search Team',            'axil-elements'),
        'not_found'             => esc_html__('No Team found',          'axil-elements'),
        'not_found_in_trash'    => esc_html__('No Team found in Trash', 'axil-elements'),
        'parent_item_colon'     => ''
    );
    
    register_post_type("{$prefix}_team", array(
        'labels'                => $labels,
        'public'                => true,
        'publicly_queryable'    => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'query_var'             => true,
        'show_in_nav_menus'     => true,
        'has_archive'           => true,
        'rewrite'               => true,        
        'hierarchical'          => false,   
        'show_in_rest'          => true, // To use Gutenberg editor.    
        'menu_position'         => 10,
        'menu_icon'             => 'dashicons-universal-access-alt',
        'supports'              => array( 'title', 'thumbnail', 'editor', 'excerpt', 'page-attributes' ),        
        'rewrite'               => array( 'slug' => esc_html__($team_slug , 'axil-elements' )),
    ));

    $labels = array(
        'name'              => _x( 'Team Categories', 'team categories',            'axil-elements' ),
        'singular_name'     => _x( 'Team Category', 'team category',                'axil-elements' ),
        'search_items'      => esc_html__('Search Team Categories' ,                'axil-elements'),
        'all_items'         => esc_html__('All Team Categories' ,                   'axil-elements'),
        'parent_item'       => esc_html__('Parent Team Category' ,                  'axil-elements'),
        'parent_item_colon' => esc_html__('Parent Team Category:' ,                 'axil-elements'),
        'edit_item'         => esc_html__('Edit Team Category' ,                    'axil-elements'),
        'update_item'       => esc_html__('Update Team Category' ,                  'axil-elements'),
        'add_new_item'      => esc_html__('Add New Team Category' ,                 'axil-elements'),
        'new_item_name'     => esc_html__('New Team Category Name' ,                'axil-elements'),
        'menu_name'         => esc_html__('Category' ,                         'axil-elements'),
    );
    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_in_nav_menus' => true,
        'show_ui'           => null,
        'show_admin_column' => true,
        'query_var'         => true,
       
        'rewrite'           => array( 'slug' => $team_cat_slug  ),

    );
    register_taxonomy( "{$prefix}_team_category", array( "{$prefix}_team" ), $args );    
}

add_action('init', 'register_axil_service_postype');
function register_axil_service_postype()
    {
    $prefix                     = ABSTRAK_PT_PREFIX;
        $axil_options           = Helper::axil_get_options();
    $service_slug               = (!empty($axil_options['services_slug']))? $axil_options['services_slug'] :'services';
    $service_cat_slug           = (!empty($axil_options['services_cat_slug']))? $axil_options['services_cat_slug'] :'services-cat'; 

    $labels = array(
        'name'                  => esc_html__('Services',                   'axil-elements'),
        'singular_name'         => esc_html__('Services',                   'axil-elements'),
        'add_new'               => esc_html__('Add New',                    'axil-elements'),
        'add_new_item'          => esc_html__('Add New Services',           'axil-elements'),
        'edit_item'             => esc_html__('Edit Services',              'axil-elements'),
        'new_item'              => esc_html__('New Services',               'axil-elements'),
        'view_item'             => esc_html__('View Services',              'axil-elements'),
        'search_items'          => esc_html__('Search Services',            'axil-elements'),
        'not_found'             => esc_html__('No Services found',          'axil-elements'),
        'not_found_in_trash'    => esc_html__('No Services found in Trash', 'axil-elements'),
        'parent_item_colon'     => ''
    );
    register_post_type("{$prefix}_services", array(
        'labels'                => $labels,
        'public'                => true,
        'publicly_queryable'    => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'query_var'             => true,
        'show_in_nav_menus'     => true,
        'has_archive'           => true,
        'rewrite'               => true,        
        'hierarchical'          => false, 
        'show_in_rest'          => true, // To use Gutenberg editor. 
        'menu_position'         => 11,
        'menu_icon'             => 'dashicons-list-view',
        'supports'              => array( 'title', 'thumbnail', 'editor', 'excerpt', 'page-attributes' ),       
        'rewrite'               => array( 'slug' => esc_html__($service_slug , 'axil-elements' )),
    ));
    $labels = array(
        'name'              => _x( 'Services Categories', 'services categories',        'axil-elements' ),
        'singular_name'     => _x( 'Services Category', 'services category',            'axil-elements' ),
        'search_items'      => esc_html__('Search Services Categories' ,                'axil-elements'),
        'all_items'         => esc_html__('All Services Categories' ,                   'axil-elements'),
        'parent_item'       => esc_html__('Parent Services Category' ,                  'axil-elements'),
        'parent_item_colon' => esc_html__('Parent Services Category:' ,                 'axil-elements'),
        'edit_item'         => esc_html__('Edit Services Category' ,                    'axil-elements'),
        'update_item'       => esc_html__('Update Services Category' ,                  'axil-elements'),
        'add_new_item'      => esc_html__('Add New Services Category' ,                 'axil-elements'),
        'new_item_name'     => esc_html__('New Services Category Name' ,                'axil-elements'),
        'menu_name'         => esc_html__('Category' ,                         'axil-elements'),
    );
    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_in_nav_menus' => true,
        'show_ui'           => null,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => $service_cat_slug  ),
    );
    register_taxonomy( "{$prefix}_services_category", array( "{$prefix}_services" ), $args );    
}

add_action('init', 'register_axil_projects_postype');

function register_axil_projects_postype()
    {
    $prefix                     = ABSTRAK_PT_PREFIX;
    $axil_options           = Helper::axil_get_options();
    $projects_slug              = ( !empty($axil_options['project_slug']) )? $axil_options['project_slug'] :'projects';
    $projects_cat_slug          = ( !empty($axil_options['projects_cat_slug']) )? $axil_options['projects_cat_slug'] :'projects-cat';   

    $labels = array(
        'name'                  => esc_html__('Projects',                   'axil-elements'),
        'singular_name'         => esc_html__('Projects',                   'axil-elements'),
        'add_new'               => esc_html__('Add New',                    'axil-elements'),
        'add_new_item'          => esc_html__('Add New Projects',           'axil-elements'),
        'edit_item'             => esc_html__('Edit Projects',              'axil-elements'),
        'new_item'              => esc_html__('New Projects',               'axil-elements'),
        'view_item'             => esc_html__('View Projects',              'axil-elements'),
        'search_items'          => esc_html__('Search Projects',            'axil-elements'),
        'not_found'             => esc_html__('No Projects found',          'axil-elements'),
        'not_found_in_trash'    => esc_html__('No Projects found in Trash', 'axil-elements'),
        'parent_item_colon'     => ''
    );
    register_post_type("{$prefix}-projects", array(
        'labels'                => $labels,
        'public'                => true,
        'publicly_queryable'    => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'query_var'             => true,
        'show_in_rest'          => true, // To use Gutenberg editor. 
        'show_in_nav_menus'     => true,
        'has_archive'           => true,
        'rewrite'               => true,        
        'hierarchical'          => false, 
        'menu_position'         => 12,
        'menu_icon'             => 'dashicons-grid-view',
        'supports'              => array( 'title', 'thumbnail', 'editor', 'excerpt', 'page-attributes' ),       
        'rewrite'               => array('slug' => esc_html__($projects_slug , 'axil-elements')),
    ));
    $labels = array(
        'name'              => _x( 'Projects Categories', 'projects categories',        'axil-elements' ),
        'singular_name'     => _x( 'Projects Category', 'projects category',            'axil-elements' ),
        'search_items'      => esc_html__('Search Projects Categories' ,                'axil-elements'),
        'all_items'         => esc_html__('All Projects Categories' ,                   'axil-elements'),
        'parent_item'       => esc_html__('Parent Projects Category' ,                  'axil-elements'),
        'parent_item_colon' => esc_html__('Parent Projects Category:' ,                 'axil-elements'),
        'edit_item'         => esc_html__('Edit Projects Category' ,                    'axil-elements'),
        'update_item'       => esc_html__('Update Projects Category' ,                  'axil-elements'),
        'add_new_item'      => esc_html__('Add New Projects Category' ,                 'axil-elements'),
        'new_item_name'     => esc_html__('New Projects Category Name' ,                'axil-elements'),
        'menu_name'         => esc_html__('Category' ,                         'axil-elements'),
    );
    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_in_nav_menus' => true,
        'show_ui'           => null,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => $projects_cat_slug  ),
    );
    register_taxonomy( "{$prefix}-projects-category", array( "{$prefix}-projects" ), $args );    
}



add_action('init', 'register_axil_case_studies_postype');

function register_axil_case_studies_postype()
    {
    $prefix                     = ABSTRAK_PT_PREFIX;
    $axil_options               = Helper::axil_get_options();
    $case_studies_slug          = ( !empty( $axil_options['case_studies_slug']) )? $axil_options['case_studies_slug'] :'case-study';
    $case_studies_cat_slug      = ( !empty( $axil_options['case_studies_cat_slug']) )? $axil_options['case_studies_cat_slug'] :'case-study-cat';   

    $labels = array(
        'name'                  => esc_html__('Case Study',                   'axil-elements'),
        'singular_name'         => esc_html__('Case Study',                   'axil-elements'),
        'add_new'               => esc_html__('Add New',                    'axil-elements'),
        'add_new_item'          => esc_html__('Add New Case Study',           'axil-elements'),
        'edit_item'             => esc_html__('Edit Case Study',              'axil-elements'),
        'new_item'              => esc_html__('New Case Study',               'axil-elements'),
        'view_item'             => esc_html__('View Case Study',              'axil-elements'),
        'search_items'          => esc_html__('Search Case Study',            'axil-elements'),
        'not_found'             => esc_html__('No Case Study found',          'axil-elements'),
        'not_found_in_trash'    => esc_html__('No Case Study found in Trash', 'axil-elements'),
        'parent_item_colon'     => ''
    );
    register_post_type("{$prefix}-case-study", array(
        'labels'                => $labels,
        'public'                => true,
        'publicly_queryable'    => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'query_var'             => true,
        'show_in_rest'          => true, // To use Gutenberg editor. 
        'show_in_nav_menus'     => true,
        'has_archive'           => true,
        'rewrite'               => true,        
        'hierarchical'          => false, 
        'menu_position'         => 12,
        'menu_icon'             => 'dashicons-sos',
        'supports'              => array( 'title', 'thumbnail', 'editor', 'excerpt', 'page-attributes' ),       
        'rewrite'               => array('slug' => esc_html__($case_studies_slug , 'axil-elements')),
    ));
    $labels = array(
        'name'              => _x( 'Categories', 'case-study categories',        'axil-elements' ),
        'singular_name'     => _x( 'Categories', 'case-study category',            'axil-elements' ),
        'search_items'      => esc_html__('Search Case Study Categories' ,                'axil-elements'),
        'all_items'         => esc_html__('All Case Study Categories' ,                   'axil-elements'),
        'parent_item'       => esc_html__('Parent Case Study Categories' ,                  'axil-elements'),
        'parent_item_colon' => esc_html__('Parent Case Study Categories:' ,                 'axil-elements'),
        'edit_item'         => esc_html__('Edit Case Study Categories' ,                    'axil-elements'),
        'update_item'       => esc_html__('Update Case Study Categories' ,                  'axil-elements'),
        'add_new_item'      => esc_html__('Add New Case Study Categories' ,                 'axil-elements'),
        'new_item_name'     => esc_html__('New Case Study Categories Name' ,                'axil-elements'),
        'menu_name'         => esc_html__('Categories' ,                         'axil-elements'),
    );
    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_in_nav_menus' => true,
        'show_ui'           => null,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => $case_studies_cat_slug ),
    );
    register_taxonomy( "{$prefix}-case-studies-cat", array( "{$prefix}-case-study" ), $args );    
}





