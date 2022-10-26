<?php

/**
 * @author  axiltheme
 * @since   1.0
 * @version 1.0
 * @package abstrak
 */

class Helper
{
    use MenuAreaTrait;
    use LayoutTrait;
    use PostMeta;
    use BannerTrait;    
    use OptionsTrait;
    
    public static function axil_get_case_study_cat($postID){  

    $terms = wp_get_post_terms( $postID, "axil-case-studies-cat", array( 'fields' => 'all' ) );
    if(!empty($terms)){ 
      foreach($terms as $index =>  $term){  ?>   
        <a href="<?php echo get_category_link( $term->term_id); ?>"><?php echo esc_html( $term->name); ?></a> 
        <?php echo esc_html( self::generate_array_iterator_postfix( $terms, $index, "," ) ) ?>
    <?php 
      } 
    }
    return;
    }

    public static function axil_get_projects_cat_text($postID){  

    $terms = wp_get_post_terms( $postID, "axil-projects-category", array( 'fields' => 'all' ) );
    if(!empty($terms)){ 
      foreach($terms as $index =>  $term){  ?>   
        <?php echo esc_html( $term->name); ?>
        <?php echo esc_html( self::generate_array_iterator_postfix( $terms, $index, "|" ) ) ?>
    <?php 
      } 
    }
    return;
    }

    public static function axil_get_projects_cat($postID){  

    $terms = wp_get_post_terms( $postID, "axil-projects-category", array( 'fields' => 'all' ) );
    if(!empty($terms)){ 
      foreach($terms as $index =>  $term){  ?>   
        <a href="<?php echo get_category_link( $term->term_id); ?>"><?php echo esc_html( $term->name); ?></a> 
        <?php echo esc_html( self::generate_array_iterator_postfix( $terms, $index, "," ) ) ?>
    <?php 
      } 
    }
    return;
    }

    public static function generate_array_iterator_postfix($array, $index, $postfix = ', ') {
       $length = count($array);
       if ($length) {
         $last_index = $length - 1;
         return $index < $last_index ? $postfix : '';
       }
     }
    
    public static function wp_set_temp_query( $query ) {
        global $wp_query;
        $temp = $wp_query;
        $wp_query = $query;
        return $temp;
    }

    public static function wp_reset_temp_query( $temp ) {
        global $wp_query;
        $wp_query = $temp;
        wp_reset_postdata();
    }
    
    /**
     * Generate Excerpt
     */
    public static function generate_excerpt($post, $length = 55, $dot = false)
    {
        if (has_excerpt($post)) {
            $final_content = wp_trim_words(get_the_excerpt($post), $length, '');
        }

        $post = get_post($post);
        $content = wp_strip_all_tags($post->post_content);
        $final_content = wp_trim_words($content, $length, '');

        if ($dot) {
            $final_content = "$final_content $dot";
        }
        return $final_content;
    }

    /**
     * File Requires
     */
    public static function file_requires($filename, $dir = false)
    {
        if ($dir) {
            $child_file = get_stylesheet_directory() . '/' . $dir . '/' . $filename;

            if (file_exists($child_file)) {
                $file = $child_file;
            } else {
                $file = get_template_directory() . '/' . $dir . '/' . $filename;
            }
        } else {
            $child_file = get_stylesheet_directory() . '/inc/' . $filename;

            if (file_exists($child_file)) {
                $file = $child_file;
            } else {
                $file = AXIL_FREAMWORK_DIRECTORY . $filename;
            }
        }

        require_once $file;
    }

    /**
     * Get Images Form Assets img folder
     */
    public static function get_img($img)
    {
        $img = get_template_directory_uri() . '/assets/images/' . $img;
        return $img;
    }
    /**
     * Get CSS Form Assets CSS Folder
     */
    public static function get_css_($file)
    {
        $file = get_template_directory_uri() . '/assets/css/' . $file . '.css';
        return $file;
    }
    /**
     * Convert hex2rgb
     */
    public static function hex2rgb($hex)
    {
        $hex = str_replace("#", "", $hex);
        if (strlen($hex) == 3) {
            $r = hexdec(substr($hex, 0, 1) . substr($hex, 0, 1));
            $g = hexdec(substr($hex, 1, 1) . substr($hex, 1, 1));
            $b = hexdec(substr($hex, 2, 1) . substr($hex, 2, 1));
        } else {
            $r = hexdec(substr($hex, 0, 2));
            $g = hexdec(substr($hex, 2, 2));
            $b = hexdec(substr($hex, 4, 2));
        }
        $rgb = "$r, $g, $b";
        return $rgb;
    }
    public static function the_breadcrumb() {
        if ( function_exists( 'bcn_display') ) {
            bcn_display();
        }
        else {
            Helper::requires( 'breadcrumbs.php' );
            $args = array(
                'show_browse'   => false,
                'post_taxonomy' => array( 'product' =>'product_cat' )
            );
            $breadcrumb = new axiltheme_Breadcrumb( $args );
            return $breadcrumb->trail();
        }
    }
    
    public static function filter_content( $content ){
        // wp filters
        $content = wptexturize( $content );
        $content = convert_smilies( $content );
        $content = convert_chars( $content );
        $content = wpautop( $content );
        $content = shortcode_unautop( $content );

        // remove shortcodes
        $pattern= '/\[(.+?)\]/';
        $content = preg_replace( $pattern,'',$content );

        // remove tags
        $content = strip_tags( $content );

        return $content;
    }

    public static function is_page( $arg ) {
        if ( function_exists( $arg ) && call_user_func( $arg ) ) {
            return true;
        }
        return false;
    }
 
    public static function maybe_rtl( $filename ){
        if ( is_rtl() ) {
            $file =get_template_directory_uri() . '/assets/css-auto-rtl/' . $filename . '.css';
            return $file;
        }
        else {
            $file = get_template_directory_uri() . '/assets/css/' . $filename . '.css';
            return $file;
        }
    }
    public static function maybe_vendors_rtl( $filename ){
        if ( is_rtl() ) {
            $file =get_template_directory_uri() . '/assets/css-auto-rtl/' . $filename . '.css';
            return $file;
        }
        else {
            $file = get_template_directory_uri() . '/assets/css/vendor/' . $filename . '.css';
            return $file;
        }
    }

    public static function requires( $filename, $dir = false ){
        require_once self::get_file_path( $filename, $dir );
    }

    public static function includes( $filename, $dir = false ){
        include self::get_file_path( $filename, $dir );
    }

    public static function get_admin_js( $filename ){
        $path = '/assets/admin/js/' . $filename . '.js';
        return self::get_file_uri( $path );
    } 
    public static function get_admin_css( $filename ){
        $path = '/assets/admin/css/' . $filename . '.css';
        return self::get_file_uri( $path );
    } 

    public static function get_wooc_js( $filename ){
        $path = '/woocommerce/inc/admin/js/' . $filename . '.js';
        return self::get_file_uri( $path );
    }

    public static function get_js( $filename ){
        $path = '/assets/js/' . $filename . '.js';
        return self::get_file_uri( $path );
    } 
    public static function get_css( $filename ){
        $path = '/assets/css/' . $filename . '.css';
        return self::get_file_uri( $path );
    } 

    public static function get_assets_css( $filename ){
        $path = '/assets/' . $filename . '.css';
        return self::get_file_uri( $path );
    } 

    public static function get_vendor_js( $filename ){
        $path = '/assets/js/vendor/' . $filename . '.js';
        return self::get_file_uri( $path );
    } 
    public static function get_vendor_css( $filename ){
        $path = '/assets/css/vendor/' . $filename . '.css';
        return self::get_file_uri( $path );
    }

    public static function get_vendor_assets( $file ){
        $path = '/assets/vendor/' . $file;
        return self::get_file_uri( $path );
    }
    public static function wooc_get_icons_css( $file ){
        $path = '/assets/icons/' . $file;
        return self::get_file_uri( $path );
    }

    public static function wooc_get_icons_name( $file ){
        $path = '/assets/icons/all.svg#' . $file;
        return self::get_file_uri( $path );
    }

    public static function get_template_part( $template, $args = array() ){
        extract( $args );

        $template = '/' . $template . '.php';

        if ( file_exists( get_stylesheet_directory() . $template ) ) {
            $file = get_stylesheet_directory() . $template;
        }
        else {
            $file = get_template_directory() . $template;
        }

        require $file;
    }

    public static function get_template_content( $template ) {
        ob_start();
        get_template_part( $template );
        return ob_get_clean();
    }
 
    private static function get_file_uri( $path ){
        $filepath = get_stylesheet_directory() . $path;
        $file     = get_stylesheet_directory_uri() . $path;
        if ( !file_exists( $filepath ) ) {
            $file = get_template_directory_uri() . $path;
        }
        return $file;
    }

    public static function axil_get_image_alt2( $image_id ){ 

    $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', TRUE);

    return $image_alt;

 }

}