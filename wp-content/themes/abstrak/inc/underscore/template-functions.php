<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package abstrak
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */

/**
 * trydo_get_nav_menus
 */

if (!function_exists('axil_get_nav_menus')){
    function axil_get_nav_menus(){

        $menus = wp_get_nav_menus();
        $menus_data = array(
                'default' => esc_html__('Default', 'abstrak')
        );
        if (!empty($menus) && !is_wp_error($menus)){
            foreach ( $menus as $item ) {
                $menus_data[ $item->slug ] = $item->name;
            }
        }
        return $menus_data;
    }
}


function is_blog () {
    return ( is_archive() || is_author() || is_category() || is_home() || is_single() || is_tag()) && 'post' == get_post_type();
}

/**
 * @param $classes
 * @return array
 */
function abstrak_body_classes( $classes ) {

    $axil_options = Helper::axil_get_options();

    global $post;
    if ( isset( $post ) ) {
        $classes[] = $post->post_type . '-' . $post->post_name;
    }

	// Adds a class of hfeed to non-singular pages.
	if ( is_singular() ) {
		//$classes[] = ' overflow-visible';
	}

    // Run code only for Single post page
    if ( is_single() && 'post' == get_post_type() ) {
        //$classes[] = ' overflow-visible';
    }

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = ' has-siderbar';
	}

    // Adds a class of no-sidebar when there is no sidebar present.
    if ( is_page() ) {

        $axil_active_onepage = get_field( "axil_active_onepage");
        $classes[] = (empty($axil_active_onepage)) ? ' mup-template' : ' onepage-template';
 
    }


    // Add dark / light body class conditions
    $global_dark_light_options = $axil_options['active_dark_mode'];
    $client_cookie_key = $global_dark_light_options == 1 ? 'client_dark_mode_style_cookie' : 'client_light_mode_style_cookie';
    if (isset($_COOKIE[$client_cookie_key])) {
        $styleModeClass = $_COOKIE[$client_cookie_key] == 'dark' ? 'active-dark-mode':'active-light-mode';
    } else {
        $styleModeClass = $global_dark_light_options == 1 ? 'active-dark-mode':'active-light-mode';
    }
    $classes[] = $styleModeClass;

    // Header sticky and transparent
    $header_layout = Helper::axil_header_layout();
    $header_sticky = $header_layout['header_sticky'];
    $header_style = $header_layout['header_style'];
    $classes[] = ("no" !== $header_sticky && "0" !== $header_sticky) ? "sticky-header" : "";
     

	return $classes;
}
add_filter( 'body_class', 'abstrak_body_classes' );

/**
 * @param $classes
 * @return string
 */
function abstrak_admin_body_classes($classes){
    global $post;
    if ( isset( $post ) ) {
        return $post->post_type . '-' . $post->post_name;
    }
}
add_filter( 'admin_body_class', 'abstrak_admin_body_classes');

/**
 * Get unique ID.
 */
function abstrak_unique_id($prefix = '')
{
    static $id_counter = 0;
    if (function_exists('wp_unique_id')) {
        return wp_unique_id($prefix);
    }
    return $prefix . (string)++$id_counter;
}

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function abstrak_pingback_header()
{
    if (is_singular() && pings_open()) {
        printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
    }
}

add_action('wp_head', 'abstrak_pingback_header');

/**
 * Comment navigation
 */
function abstrak_get_post_navigation()
{
    if (get_comment_pages_count() > 1 && get_option('page_comments')):
        require(get_template_directory() . '/inc/comment-nav.php');
    endif;
}

require get_template_directory() . '/inc/comment-form.php';


if (!function_exists('axil_get_page_title')) :

    function axil_get_page_title() {     
      $themepfix    = AXIL_THEME_FIX;
         $axil_options = Helper::axil_get_options();

        if ( is_404() ) {
          $axil_title = $axil_options['error_title'];
        }
        elseif ( is_search() ) {
          $axil_title = esc_html__( 'Search Results for : ', 'abstrak' ) . get_search_query();
        }
        elseif ( is_home() ) {
          if ( get_option( 'page_for_posts' ) ) {
            $axil_title = get_the_title( get_option( 'page_for_posts' ) );
          }else {
            if ( isset( $axil_options['axil_blog_title'] ) && !empty( $axil_options['axil_blog_title'] ) ){
                $axil_title =  $axil_options['axil_blog_title'] ;
            } else {                
                $axil_title     =  esc_html__( 'Blog', 'abstrak' );
            }  
          }
        }
        elseif ( is_archive() ) {

          $condipfix    = AXIL_THEME_FIX;
          if ( is_post_type_archive( "{$condipfix}_team" ) ) {

            if ( isset( $axil_options['axil_team_archive_title'] ) && !empty( $axil_options['axil_team_archive_title'] ) ){
                $axil_title =  $axil_options['axil_team_archive_title'] ;
            }else{
                 $axil_title = esc_html__( 'All Team Member', 'abstrak' );
            } 

          }elseif( is_post_type_archive( "{$condipfix}_services" ) ){

            if ( isset( $axil_options['axil_services_archive_title'] ) && !empty( $axil_options['axil_services_archive_title'] ) ){
                $axil_title =  $axil_options['axil_services_archive_title'] ;
            }else{
                 $axil_title = esc_html__( 'All Services', 'abstrak' );
            } 


          }elseif ( is_post_type_archive( "{$condipfix}-projects" ) ){

            if ( isset( $axil_options['axil_projects_archive_title'] ) && !empty( $axil_options['axil_projects_archive_title'] ) ){
                $axil_title =  $axil_options['axil_projects_archive_title'] ;
            }else{
                 $axil_title = esc_html__( 'All Projects', 'abstrak' );
            } 


         }elseif ( is_post_type_archive( "{$condipfix}-case-study" ) ){
            $axil_title = esc_html__( 'All Case Study', 'abstrak' );

            
            if ( isset( $axil_options['axil_case_study_archive_title'] ) && !empty( $axil_options['axil_case_study_archive_title'] ) ){
                $axil_title =  $axil_options['axil_case_study_archive_title'] ;
            }else{
                 $axil_title = esc_html__( 'All Case Study', 'abstrak' );
            } 

          }else {
           
              $axil_title = get_the_archive_title();
             
          }
        }elseif (is_single()) {

           
            $banner_title           = axil_get_acf_data("axil_custom_title");
            if ( $banner_title ) {
             $axil_title            = axil_get_acf_data("axil_custom_title");
         
            }else{
                $axil_title = get_the_title();

            }

        }else{

            $banner_title           = axil_get_acf_data("axil_custom_title");
            if ( $banner_title ) {
             $axil_title            = axil_get_acf_data("axil_custom_title");
         
            }else{
                $axil_title = get_the_title();

            }


        }
      return $axil_title;
  }
endif;

if (!function_exists('axil_get_page_sub_title')) :

    function axil_get_page_sub_title() {     
      
       $axil_options = Helper::axil_get_options();

        if ( is_404() ) {
          $axil_subtitle = $axil_options['error_title'];
        }

        elseif ( is_search() ) {
          $axil_subtitle = esc_html__( 'Search Results for : ', 'abstrak' ) . get_search_query();
        }

        elseif ( is_home() ) {
          if ( get_option( 'page_for_posts' ) ) {
            $axil_subtitle = get_the_title( get_option( 'page_for_posts' ) );
          }
          else {
            if ( isset( $axil_options['axil_blog_subtitle'] ) && !empty( $axil_options['axil_blog_subtitle'] ) ){
                $axil_subtitle =  $axil_options['axil_blog_subtitle'] ;
            } else {                
                $axil_subtitle     = apply_filters( "axil_blog_sub_title", esc_html__( 'Best Cleaning Service Company', 'abstrak' ) );
            }  

          }
        }
        elseif ( is_archive() ) {

          $condipfix    = AXIL_THEME_FIX;
          


          if ( is_post_type_archive( "{$condipfix}_team" ) ) {

            if ( isset( $axil_options['axil_team_subtitle'] ) && !empty( $axil_options['axil_team_subtitle'] ) ){
                $axil_subtitle =  $axil_options['axil_team_subtitle'] ;
            } 

          }elseif( is_post_type_archive( "{$condipfix}_services" ) ){
          

            if ( isset( $axil_options['axil_services_subtitle'] ) && !empty( $axil_options['axil_services_subtitle'] ) ){
                $axil_subtitle =  $axil_options['axil_services_subtitle'] ;
            } 

          }elseif ( is_post_type_archive( "{$condipfix}-projects" ) ){

             if ( isset( $axil_options['axil_projects_subtitle'] ) && !empty( $axil_options['axil_projects_subtitle'] ) ){
                $axil_subtitle =  $axil_options['axil_projects_subtitle'] ;
            }

       

          }else {
               
          

            if ( is_tax( get_object_taxonomies( "{$prex}_services_category" ) ) ) {
                if ( isset( $axil_options['axil_services_subtitle'] ) && !empty( $axil_options['axil_services_subtitle'] ) ){
                    $axil_subtitle =  $axil_options['axil_services_subtitle'];

                } 
           }

           if ( is_tax( get_object_taxonomies( "{$prex}-projects-category" ) ) ) {
                if ( isset( $axil_options['axil_projects_subtitle'] ) && !empty( $axil_options['axil_projects_subtitle'] ) ){
                    $axil_subtitle =  $axil_options['axil_projects_subtitle'];

                } 
           }
            if (is_tax( get_object_taxonomies( "{$prex}_team_category" ) ) ) {
                if ( isset( $axil_options['axil_team_subtitle'] ) && !empty( $axil_options['axil_team_subtitle'] ) ){
                    $axil_subtitle =  $axil_options['axil_team_subtitle'];

                } 
           }    
           if (is_tax( get_object_taxonomies( "{$prex}-case-studies-cat" ) ) ) {
                if ( isset( $axil_options['axil_case_study_subtitle'] ) && !empty( $axil_options['axil_case_study_subtitle'] ) ){
                    $axil_subtitle =  $axil_options['axil_case_study_subtitle'];

                } 
           }



          }
        }elseif (is_single()) {

           
            $banner_title           = axil_get_acf_data("field_page_banner_sub_title_text");
            if ( $banner_title ) {
             $axil_subtitle            = axil_get_acf_data("field_page_banner_sub_title_text");
         
            }else{
                $axil_subtitle = get_the_title();

            }

        }else{

            $banner_title           = axil_get_acf_data("field_page_banner_sub_title_text");
            if ( $banner_title ) {
             $axil_subtitle            = axil_get_acf_data("field_page_banner_sub_title_text");
         
            }else{
                $axil_subtitle = get_the_title();

            }


        }
      return $axil_subtitle;
  }
endif;



if (!function_exists('axil_get_banner_layout')) :

    function axil_get_banner_layout() {     
      
       $axil_options = Helper::axil_get_options();

        if ( is_404() ) {
          $axil_banner_style = '1';
        }

        elseif ( is_search() ) {
          $axil_banner_style = '1';
        }

        elseif ( is_home() ) {
          if ( get_option( 'page_for_posts' ) ) {
                $axil_banner_style = '1';
          }
          else {
            if ( isset( $axil_options['axil_blog_banner_template'] ) && !empty( $axil_options['axil_blog_banner_template'] ) ){
                $axil_banner_style =  $axil_options['axil_blog_banner_template'] ;
            } else {                
                $axil_banner_style     = apply_filters( "axil_blog_sub_title", esc_html__( 'Best Cleaning Service Company', 'abstrak' ) );
            }  

          }
        }
        elseif ( is_archive() ) {

          $condipfix    = AXIL_THEME_FIX;
          


          if ( is_post_type_archive( "{$condipfix}_team" ) ) {

            if ( isset( $axil_options['axil_team_banner_template'] ) && !empty( $axil_options['axil_team_banner_template'] ) ){
                $axil_banner_style =  $axil_options['axil_team_banner_template'] ;
            } 

          }elseif( is_post_type_archive( "{$condipfix}_services" ) ){
          

            if ( isset( $axil_options['axil_services_banner_template'] ) && !empty( $axil_options['axil_services_banner_template'] ) ){
                $axil_banner_style =  $axil_options['axil_services_banner_template'] ;
            } 

          }elseif ( is_post_type_archive( "{$condipfix}-projects" ) ){

             if ( isset( $axil_options['axil_projects_banner_template'] ) && !empty( $axil_options['axil_projects_banner_template'] ) ){
                $axil_banner_style =  $axil_options['axil_projects_banner_template'] ;
            }

       

          }else {
               
          

            if ( is_tax( get_object_taxonomies( "{$prex}_services_category" ) ) ) {
                if ( isset( $axil_options['axil_services_banner_template'] ) && !empty( $axil_options['axil_services_banner_template'] ) ){
                    $axil_banner_style =  $axil_options['axil_services_banner_template'];

                } 
           }

           if ( is_tax( get_object_taxonomies( "{$prex}-projects-category" ) ) ) {
                if ( isset( $axil_options['axil_projects_banner_template'] ) && !empty( $axil_options['axil_projects_banner_template'] ) ){
                    $axil_banner_style =  $axil_options['axil_projects_banner_template'];

                } 
           }
            if (is_tax( get_object_taxonomies( "{$prex}_team_category" ) ) ) {
                if ( isset( $axil_options['axil_team_banner_template'] ) && !empty( $axil_options['axil_team_banner_template'] ) ){
                    $axil_banner_style =  $axil_options['axil_team_banner_template'];

                } 
           }    
           if (is_tax( get_object_taxonomies( "{$prex}-case-studies-cat" ) ) ) {
                if ( isset( $axil_options['axil_case_study_banner_template'] ) && !empty( $axil_options['axil_case_study_banner_template'] ) ){
                    $axil_banner_style =  $axil_options['axil_case_study_banner_template'];

                } 
           }



          }
        }elseif (is_single()) {

           
            $axil_banner_style           = axil_get_acf_data("axil_select_banner_style");

            $axil_banner_style = (!empty($axil_banner_style)) ? $axil_banner_style : $axil_options[$condipfix . '_banner_template'];
         
        }else{

            $axil_banner_style           = axil_get_acf_data("axil_select_banner_style");
            


        }
      return $axil_banner_style;
  }
endif;



/**
 * Maintenance Mode
 */

add_action( 'template_include', 'axil_underconstruction_mode_enable', 999 );

function axil_underconstruction_mode_enable($template)
{
     $axil_options = Helper::axil_get_options();

    if (!class_exists('ReduxFramework')) {
        return $template;
    }
    $enable = ( isset($axil_options['under_construction_mode_enable'])) ? $axil_options['under_construction_mode_enable'] : 'off';

    $enable = isset($_GET['emm']) ? '1' : $enable;

    if (is_user_logged_in() || 'off' === $enable) {
        return $template;
    }
    $maintenance_mode = true;
    if (!$maintenance_mode) {
        return $template;
    }
    $new_template = locate_template(array( 'construction.php' ));
    if ('' != $new_template) {
        return $new_template;
    }
    return $template;
}
function axil_highlight_results($text){
     if(is_search()){
     $sr = get_query_var('s');
     $keys = explode(" ",$sr);
     $text = preg_replace('/('.implode('|', $keys) .')/iu', '<strong class="search-excerpt"> '.$sr.' </strong>', $text);
     }
     return $text;
}
//add_filter('the_excerpt', 'axil_highlight_results');
 