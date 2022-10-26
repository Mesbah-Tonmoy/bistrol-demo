<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package abstrak
 */

/**
 * Enqueue scripts and styles.
 */
if (!function_exists('abstrak_content_estimated_reading_time')) {
    /**
     * Function that estimates reading time for a given $content.
     * @param string $content Content to calculate read time for.
     * @paramint $wpm Estimated words per minute of reader.
     * @returns int $time Esimated reading time.
     */
    function abstrak_content_estimated_reading_time($content = '', $wpm = 200)
    {


            
        $axil_options   = Helper::axil_get_options();
        $read_time_txt  = $axil_options['axil_read_time_view_txt'];

        $clean_content = strip_shortcodes($content);
        $clean_content = strip_tags($clean_content);
        $word_count = str_word_count($clean_content);
        $time = ceil($word_count / $wpm);
        $output = $time . $read_time_txt;
        return $output;
    }
}

/**
 * Escapeing
 */
if ( !function_exists('awescapeing') ) {
    function awescapeing($html){
        return $html;
    }
}

/**
 *  Convert Get Theme Option global to function
 */
if(!function_exists('axil_get_opt')){
    function axil_get_opt(){
        global $axil_option;
        return $axil_option;
    }
}

/**
 * Get terms
 */

function axil_get_terms_gb( $term_type = null, $hide_empty = false ) {
    if(!isset( $term_type )){
        return;
    }
    $axil_custom_terms = array();
    $terms = get_terms( $term_type, array( 'hide_empty' => $hide_empty ) );
    array_push( $axil_custom_terms, esc_html__( '--- Select ---', 'abstrak' ) );
    if ( is_array( $terms ) && ! empty( $terms ) ) {
        foreach ( $terms as $single_term ) {
            if ( is_object( $single_term ) && isset( $single_term->name, $single_term->slug ) ) {
                $axil_custom_terms[ $single_term->slug ] = $single_term->name;
            }
        }
    }
    return $axil_custom_terms;
}

/**
 * Blog Pagination
 */

if(!function_exists('axil_blog_pagination')){
    function axil_blog_pagination(){
        GLOBAL $wp_query;
        if ($wp_query->post_count < $wp_query->found_posts) {
            ?>
            <div class="post-pagination"> <?php
                the_posts_pagination(array(
                    'prev_text'          => '<i class="fal fa-arrow-left"></i>',
                    'next_text'          => '<i class="fal fa-arrow-right"></i>',
                    'type'               => 'list',
                    'show_all'  	     => false,
                    'end_size'           => 1,
                    'mid_size'           => 8,
                )); ?>
            </div>
            <?php
        }
    }
}

/**
 * Short Title
 */

if (!function_exists('axil_short_title')){
    function axil_short_title($title, $length = 30) {
        if (strlen($title) > $length) {
            return substr($title, 0, $length) . ' ...';
        }else {
            return $title;
        }
    }
}


/**
 * Get ACF data conditionally
 */

if( !function_exists('axil_get_acf_data') ){
    function axil_get_acf_data($fields){
        return (class_exists('ACF') && get_field_object($fields)) ? get_field($fields) : false;
    }

}

/**
 * @param $url
 * @return string
 */

if ( !function_exists('axil_getEmbedUrl') ){
    function axil_getEmbedUrl($url) {
        // function for generating an embed link
        $finalUrl = '';

        if (strpos($url, 'facebook.com/') !== false) {
            // Facebook Video
            $finalUrl.='https://www.facebook.com/plugins/video.php?href='.rawurlencode($url).'&show_text=1&width=200';

        } else if(strpos($url, 'vimeo.com/') !== false) {
            // Vimeo video
            $videoId = isset(explode("vimeo.com/",$url)[1]) ? explode("vimeo.com/",$url)[1] : null;
            if (strpos($videoId, '&') !== false){
                $videoId = explode("&",$videoId)[0];
            }
            $finalUrl.='https://player.vimeo.com/video/'.$videoId;

        } else if (strpos($url, 'youtube.com/') !== false) {
            // Youtube video
            $videoId = isset(explode("v=",$url)[1]) ? explode("v=",$url)[1] : null;
            if (strpos($videoId, '&') !== false){
                $videoId = explode("&",$videoId)[0];
            }
            $finalUrl.='https://www.youtube.com/embed/'.$videoId;

        } else if(strpos($url, 'youtu.be/') !== false) {
            // Youtube  video
            $videoId = isset(explode("youtu.be/",$url)[1]) ? explode("youtu.be/",$url)[1] : null;
            if (strpos($videoId, '&') !== false) {
                $videoId = explode("&",$videoId)[0];
            }
            $finalUrl.='https://www.youtube.com/embed/'.$videoId;

        } else if (strpos($url, 'dailymotion.com/') !== false) {
            // Dailymotion Video
            $videoId = isset(explode("dailymotion.com/",$url)[1]) ? explode("dailymotion.com/",$url)[1] : null;
            if (strpos($videoId, '&') !== false) {
                $videoId = explode("&",$videoId)[0];
            }
            $finalUrl.='https://www.dailymotion.com/embed/'.$videoId;

        } else{
            $finalUrl.=$url;
        }

        return $finalUrl;
    }
}


/**
 * @param $prefix
 * @param $title
 * @param string $subtitle
 * @return array
 */

function axil_redux_add_fields($prefix, $title, $subtitle = '')
{
    return array(
        array(
            'id' => $prefix . '_sec',
            'type' => 'section',
            'title' => $title,
            'subtitle' => $subtitle,
            'indent' => true,
        ),
        array(
            'id' => $prefix . '_activate',
            'type' => 'switch',
            'title' => esc_html__('Activate Ad', 'abstrak'),
            'on' => esc_html__('Enabled', 'abstrak'),
            'off' => esc_html__('Disabled', 'abstrak'),
            'default' => false,
        ),
        array(
            'id' => $prefix . '_type',
            'type' => 'button_set',
            'title' => esc_html__('Ad Type', 'abstrak'),
            'options' => array(
                'image' => esc_html__('Image Link', 'abstrak'),
                'code' => esc_html__('Custom Code', 'abstrak'),
            ),
            'default' => 'image',
            'required' => array($prefix . '_activate', 'equals', true)
        ),
        array(
            'id' => $prefix . '_image',
            'type' => 'media',
            'title' => esc_html__('Image', 'abstrak'),
            'default' => '',
            'required' => array($prefix . '_type', 'equals', 'image')
        ),
        array(
            'id' => $prefix . '_url',
            'type' => 'text',
            'title' => esc_html__('Link', 'abstrak'),
            'default' => '',
            'required' => array($prefix . '_type', 'equals', 'image')
        ),

        array(
            'id' => $prefix . '_link_type',
            'type' => 'button_set',
            'title' => esc_html__('Open Advertisement Tab', 'abstrak'),
            'options' => array(
                'blank' => esc_html__('Open in new tab', 'abstrak'),
                'same' => esc_html__('Open in Same tab', 'abstrak'),
            ),
            'required' => array($prefix . '_type', 'equals', 'image'),
            'default' => 'blank',

        ),
        array(
            'id' => $prefix . '_code',
            'type' => 'textarea',
            'title' => esc_html__('Custom Code', 'abstrak'),
            'default' => '',
            'subtitle' => esc_html__('Supports: Shortcode, Adsense, Text, HTML, Scripts', 'abstrak'),
            'required' => array($prefix . '_type', 'equals', 'code')
        ),
    );
}

/***
 * pt_like_it
 */

add_action( 'wp_ajax_nopriv_pt_like_it', 'pt_like_it' );
add_action( 'wp_ajax_pt_like_it', 'pt_like_it' );
if(!function_exists('pt_like_it')){
    function pt_like_it() {

        if ( ! wp_verify_nonce( $_REQUEST['nonce'], 'pt_like_it_nonce' ) || ! isset( $_REQUEST['nonce'] ) ) {
            exit( "No naughty business please" );
        }

        $likes = get_post_meta( $_REQUEST['post_id'], '_pt_likes', true );
        $likes = ( empty( $likes ) ) ? 0 : $likes;
        $new_likes = $likes + 1;

        update_post_meta( $_REQUEST['post_id'], '_pt_likes', $new_likes );

        if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
            echo esc_html($new_likes);
            die();
        }
        else {
            wp_redirect( get_permalink( $_REQUEST['post_id'] ) );
            exit();
        }
    }
}



/**
 * @param $tags
 * @param $context
 * @return array
 */
if (! function_exists('abstrak_kses_allowed_html')){
    function abstrak_kses_allowed_html($tags, $context) {
        switch($context) {
            case 'social':
                $tags = array(
                    'a' => array('href' => array()),
                    'b' => array()
                );
                return $tags;
            case 'allow_link':
                $tags = array(
                    'a' => array(
                        'class' => array(),
                        'href' => array(),
                        'rel' => array(),
                        'title' => array(),
                        'target' => array(),
                    ),
                    'b' => array()
                );
                return $tags;
            case 'allow_title':
                $tags = array(
                    'a' => array(
                        'class' => array(),
                        'href' => array(),
                        'rel' => array(),
                        'title' => array(),
                        'target' => array(),
                    ),
                    'span' => array(
                        'class' => array(),
                        'style' => array(),
                    ),
                    'b' => array()
                );
                return $tags;

            case 'alltext_allow':
                $tags = array(
                    'a' => array(
                        'class' => array(),
                        'href' => array(),
                        'rel' => array(),
                        'title' => array(),
                        'target' => array(),
                    ),
                    'abbr' => array(
                        'title' => array(),
                    ),
                    'b' => array(),
                    'br' => array(),
                    'blockquote' => array(
                        'cite' => array(),
                    ),
                    'cite' => array(
                        'title' => array(),
                    ),
                    'code' => array(),
                    'del' => array(
                        'datetime' => array(),
                        'title' => array(),
                    ),
                    'dd' => array(),
                    'div' => array(
                        'class' => array(),
                        'title' => array(),
                        'style' => array(),
                        'id' => array(),
                    ),
                    'dl' => array(),
                    'dt' => array(),
                    'em' => array(),
                    'h1' => array(),
                    'h2' => array(),
                    'h3' => array(),
                    'h4' => array(),
                    'h5' => array(),
                    'h6' => array(),
                    'i' => array(
                        'class' => array(),
                    ),
                    'img' => array(
                        'alt' => array(),
                        'class' => array(),
                        'height' => array(),
                        'src' => array(),
                        'srcset' => array(),
                        'width' => array(),
                    ),
                    'li' => array(
                        'class' => array(),
                    ),
                    'ol' => array(
                        'class' => array(),
                    ),
                    'p' => array(
                        'class' => array(),
                    ),
                    'q' => array(
                        'cite' => array(),
                        'title' => array(),
                    ),
                    'span' => array(
                        'class' => array(),
                        'title' => array(),
                        'style' => array(),
                    ),
                    'strike' => array(),
                    'strong' => array(),
                    'ul' => array(
                        'class' => array(),
                    ),
                );
                return $tags;
            default:
                return $tags;
        }
    }
    add_filter( 'wp_kses_allowed_html', 'abstrak_kses_allowed_html', 10, 2);
}

if (!function_exists('abstrak_get_page_title')) :

    function abstrak_get_page_title() {     
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
          }
          else {

            if ( isset( $axil_options['axil_blog_text'] ) && !empty( $axil_options['axil_blog_text'] ) ){
                $axil_title =  $axil_options['axil_blog_text'] ;
            } else {                
                $axil_title     = apply_filters( "{$themepfix}_blog_title", esc_html__( 'Blog', 'abstrak' ) );
            }  

          }
        }
        elseif ( is_archive() ) {
          $condipfix    = AXIL_THEME_FIX;
          if ( is_post_type_archive( "{$condipfix}_team" ) ) {
            $axil_title = esc_html__( 'All Team Member', 'abstrak' );
          }elseif( is_post_type_archive( "{$condipfix}_services" ) ){
            $axil_title = esc_html__( 'All Services', 'abstrak' );
          }elseif ( is_post_type_archive( "{$condipfix}_projects" ) ){
            $axil_title = esc_html__( 'All Projects', 'abstrak' ); 
         }elseif ( is_post_type_archive( "{$condipfix}_projects" ) ){
            $axil_title = esc_html__( 'All Projects', 'abstrak' );
          }else {
            $axil_title = get_the_archive_title();
          }
        }elseif (is_single()) {
          $axil_title  = get_the_title();

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

/**
 * Style Preloader
 * add_action( 'wp_head', 'noscript_hide_preloader', 1 );
 * add_action( 'wp_body_open', 'preloader');
 */
function noscript_hide_preloader(){
    // Hide preloader if js is disabled
    echo '<noscript><style>#backto-top{display:none;}</style></noscript>';
}

function preloader(){  
    $axil_options = Helper::axil_get_options();
    $preloader_default_image = AXIL_THEME_URI . '/assets/images/preloader.gif';
    if ( $axil_options['axil_preloader'] !== 'no' ) {
        if ( !empty( $axil_options['axil_preloader_image']['url'] ) ) {
            $preloader_img = $axil_options['axil_preloader_image']['url'];
            echo '<div class="preloader bgimg" id="preloader" style="background-image:url(' . esc_url( $preloader_img ) . ');"></div>';
        }else{
            echo '<div class="preloader bgimg" id="preloader" style="background-image:url(' . esc_url($preloader_default_image) . ');"></div>';
        }
    }
}

/**
 * Style Switcher
 */
add_action('wp_body_open', 'axil_style_switcher' );

if (!function_exists('axil_style_switcher')) {
function axil_style_switcher()
    {
    $axil_options = Helper::axil_get_options();
 
    if (isset($axil_options['show_ld_switcher_form_user_end'])) {
        if ($axil_options['show_ld_switcher_form_user_end'] === 'on' || $axil_options['show_ld_switcher_form_user_end'] == 1) {
            ?>

                    <div class="my_switcher d-none d-lg-block">
                        <ul>
                            <li title="Light Mode">
                                <a href="javascript:void(0)" class="setColor light" data-theme="light">
                                    <i class="fal fa-lightbulb-on"></i>
                                </a>
                            </li>
                            <li title="Dark Mode">
                                <a href="javascript:void(0)" class="setColor dark" data-theme="dark">
                                    <i class="fas fa-moon"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                <?php
            }
        }
     }
 }
 
add_action( 'wp_footer', 'axil_scroll_to_top_html', 5 );
function axil_scroll_to_top_html(){
    $axil_options   = Helper::axil_get_options();   
    if($axil_options['axil_scroll_to_top_enable'] == 'yes'){ ?>
        <!-- Start Back To Top  -->
        <a class="back-to-top" id="backto-top"> <i class="far fa-angle-double-up"></i></a>
        <!-- End Back To Top  -->
    <?php }
}

add_filter('widget_nav_menu_args', function ($nav_menu_args, $nav_menu, $args, $instance) {
    $nav_menu_args['menu_class']  = "list-unstyled";
   return $nav_menu_args;

}, 10, 4);


/**
 * Get a list of all the allowed html tags.
 *
 * @param string $level Allowed levels are basic and intermediate
 * @return array
 */
function axil_get_allowed_html_tags($level = 'basic')
{
    $allowed_html = [
        'b' => [],
        'i' => [],
        'u' => [],
        'em' => [],
        'br' => [],
        'abbr' => [
            'title' => [],
        ],
        'span' => [
            'class' => [],
        ],
        'strong' => [],
    ];

    if ($level === 'intermediate') {
        $allowed_html['a'] = [
            'href' => [],
            'title' => [],
            'class' => [],
            'id' => [],
        ];
    }

    return $allowed_html;
}

/**
 * Strip all the tags except allowed html tags
 *
 * The name is based on inline editing toolbar name
 *
 * @param string $string
 * @return string
 */
function axil_kses_intermediate($string = '')
{
    return wp_kses($string, axil_get_allowed_html_tags('intermediate'));
}

/**
 * Strip all the tags except allowed html tags
 *
 * The name is based on inline editing toolbar name
 *
 * @param string $string
 * @return string
 */
function axil_kses_basic($string = '')
{
    return wp_kses($string, axil_get_allowed_html_tags('basic'));
}

/**
 * Get a translatable string with allowed html tags.
 *
 * @param string $level Allowed levels are basic and intermediate
 * @return string
 */
function axil_get_allowed_html_desc($level = 'basic')
{
    if (!in_array($level, ['basic', 'intermediate'])) {
        $level = 'basic';
    }

    $tags_str = '<' . implode('>,<', array_keys(axil_get_allowed_html_tags($level))) . '>';
    return sprintf(__('This input field has support for the following HTML tags: %1$s', 'abstrak'), '<code>' . esc_html($tags_str) . '</code>');
}

/** this code filters the Categories archive widget to include the post count inside the link */
add_filter('wp_list_categories', 'axil_cat_count_span');
function axil_cat_count_span($links) {
  $links = str_replace('</a> (', '</a> <span class="category-number">(', $links);
  $links = str_replace(')', ')</span>', $links);
  return $links;
}

/* This code filters the Archive widget to include the post count inside the link */
add_filter('get_archives_link', 'axil_archive_count_span');
function axil_archive_count_span($links) {
    $links = str_replace('</a>&nbsp;(', '</a> <span class="archive-number">(', $links);
    $links = str_replace(')', ')</span>', $links);
return $links;
} 

/**
 * Get Google Fonts.
 *
 */
 function axil_fonts_url()
    {
        $fonts_url = '';
        $fonts = array();
        $subsets = 'latin,latin-ext';
         /* translators: If there are characters in your language that are not supported by Poppins, translate this to 'off'. Do not translate into your own language. */
        if ('off' !== _x('on', 'Poppins font: on or off', 'abstrak')) {
            $fonts[] = 'Poppins:wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,700';
            
        }
        /* translators: If there are characters in your language that are not supported by Yantramanav, translate this to 'off'. Do not translate into your own language. */
        
        if ('off' !== _x('on', 'DM Sans: on or off', 'abstrak')) {
            $fonts[] = 'DM Sans:ital,wght@0,400;0,500;0,700;1,400';
        }
        if ($fonts) {
            $fonts_url = add_query_arg(array(
                'family' => urlencode(implode('|', $fonts)),
                'subset' => urlencode($subsets),
            ), 'https://fonts.googleapis.com/css');
        }
        return $fonts_url;
    }