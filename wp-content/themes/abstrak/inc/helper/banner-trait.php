<?php
/**
 * @author  axiltheme
 * @since   1.0
 * @version 1.0
 * @package abstrak
 */
trait BannerTrait
{
 /** layout settings */
    public static function axil_layout_settings()
    { 
     
        if (is_single() || is_page()) {
            $post_type = get_post_type();
            $post_id = get_the_id();

            switch ($post_type) {
                case 'page':
                    $themepfix = 'axil_page';
                    break;
                case 'post':
                    $themepfix = 'axil_single_post';
                    break;
                case 'axil_team':
                    $themepfix = 'axil_team_single';
                    break;
                case 'axil-projects':
                    $themepfix = 'axil_projects_single';
                    break;
                case 'axil_services':
                    $themepfix = 'axil_services_single';
                    break; 
                case 'axil-case-study':
                    $themepfix = 'axil_case_study_single';
                    break;               
                case 'product':
                    $themepfix = 'axil_products';
                    break;
                default:
                    $themepfix = 'axil_single_post';
                    break;
            }
        } elseif (is_home() || is_archive() || is_search() || is_404()) {
            if (is_author()) {
                $themepfix = 'axil_blog';
            }elseif (is_search()) {
                $themepfix = 'axil_blog';
            } elseif (is_post_type_archive("axil_team") || is_tax("axil_team_category")) {
                $themepfix = 'axil_team_archive';
            } elseif (is_post_type_archive("axil_services") || is_tax("axil_services_category")) {
                $themepfix = 'axil_services_archive';           
            } elseif (is_post_type_archive("axil-projects") || is_tax("axil-projects-category")) {
                $themepfix = 'axil_projects_archive'; 
            } elseif (is_post_type_archive("axil-case-study") || is_tax("axil-case-studies-cat")) {
                $themepfix = 'axil_case_study_archive';
            } elseif (function_exists('is_woocommerce') && is_woocommerce()) {
                $themepfix = 'axil_shop';
            } else {
                $themepfix = 'axil_blog';
            }
        }
        return $themepfix;
    } 

    /**
     * @return array
     * Banner Layout
     */

    public static function axil_banner_layout()
    {
        $axil_options = Helper::axil_get_options();
        $size = 'full';
       
        $themepfix         = AXIL_THEME_FIX;
        $condipfix         = Helper::axil_layout_settings();

        if (is_single() || is_page()) {

            $banner_style   = axil_get_acf_data('axil_select_banner_style');
            $banner_style   = (!empty($banner_style)) ? $banner_style : $axil_options[$condipfix . '_banner_template'];

            $sub_title        = axil_get_acf_data('axil_custom_sub_title');
            $sub_title        = ( empty( $sub_title ) ) ? $axil_options[$condipfix . '_subtitle'] : $sub_title;

            $banner_shape = axil_get_acf_data('axil_select_banner_shape');   
           
            $banner_shape_id = isset($axil_options[$condipfix . '_banner_img']['id']) && !empty($axil_options[$condipfix . '_banner_img']['id']) ? $axil_options[$condipfix . '_banner_img']['id'] : "";


            $banner_shape = (!empty($banner_shape)) ? $banner_shape : $banner_shape_id ;

            if ( !empty($banner_shape)) {
                $thumbnail_url = wp_get_attachment_image_src( $banner_shape, $size );
                $banner_shape = $thumbnail_url[0];
            } else {
                $banner_shape =  $axil_options[$condipfix . '_banner_shape']['url'];
            }

            $banner_shape2 = axil_get_acf_data('axil_select_banner_shape2');   
             $banner_shape2_id = isset($axil_options[$condipfix . '_banner_shape2']['id']) && !empty($axil_options[$condipfix . '_banner_shape2']['id']) ? $axil_options[$condipfix . '_banner_shape2']['id'] : "";

            $banner_shape2 = (!empty($banner_shape2)) ? $banner_shape2 : $banner_shape2_id;

            if ( !empty($banner_shape2)) {
                $thumbnail_url2 = wp_get_attachment_image_src( $banner_shape2, $size );
                $banner_shape2 = $thumbnail_url2[0];
            } else {
                $banner_shape2 =  $axil_options[$condipfix . '_banner_shape2']['url'];
            }
           
            $banner_img = axil_get_acf_data('axil_select_banner_img');   

            $banner_id = isset($axil_options[$condipfix . '_banner_img']['id']) && !empty($axil_options[$condipfix . '_banner_img']['id']) ? $axil_options[$condipfix . '_banner_img']['id'] : "";

            $banner_img = (!empty($banner_img)) ? $banner_img : $banner_id;
            $image_alt = get_post_meta($banner_img, '_wp_attachment_image_alt', TRUE);


            if ( !empty($banner_img)) {
                $thumbnail_url = wp_get_attachment_image_src( $banner_img, $size );
                $banner_img = $thumbnail_url[0];
            } else {
                $banner_img =  $axil_options[$condipfix . '_banner_img']['url'];
            }
            $banner_img   = empty( $banner_img ) ? Helper::get_img( 'banner/banner-thumb-3.png' ) :$banner_img;
            
             $breadcrumbs = axil_get_acf_data('axil_breadcrumbs_enable');
             $breadcrumbs = (!empty($breadcrumbs)) ? $breadcrumbs : $axil_options[$condipfix . '_breadcrumb_enable'];
            
             $banner_area = axil_get_acf_data('axil_title_wrapper_show');
             $banner_area = (!empty($banner_area)) ? $banner_area : $axil_options[$condipfix . '_banner_enable'];

        } elseif (is_home() || is_archive() || is_search() || is_404()) {       
            
            $sub_title    =  $axil_options[$condipfix . '_subtitle'];
           
           $banner_img = isset($axil_options[$condipfix . '_banner_img']['id']) && !empty($axil_options[$condipfix . '_banner_img']['id']) ? $axil_options[$condipfix . '_banner_img']['id'] : "";
           $banner_shape = isset($axil_options[$condipfix . '_banner_shape']['id']) && !empty($axil_options[$condipfix . '_banner_shape']['id']) ? $axil_options[$condipfix . '_banner_shape']['id'] : "";
 
            $image_alt = get_post_meta($banner_img, '_wp_attachment_image_alt', TRUE);
            if ( !empty($banner_shape)) {
            $thumbnail_url = wp_get_attachment_image_src( $banner_shape, $size );
            $banner_shape = $thumbnail_url[0];
            } else {
                $banner_shape =  $axil_options[$condipfix . '_banner_shape']['url'];
            }

            if ( !empty($banner_img)) {
            $thumbnail_url = wp_get_attachment_image_src( $banner_img, $size );
                $banner_img = $thumbnail_url[0];
            } else {
                $banner_img =  $axil_options[$condipfix . '_banner_img']['url'];
            }
           
            $breadcrumbs = $axil_options[$condipfix . '_breadcrumb_enable'];
            $banner_area = $axil_options[$condipfix . '_banner_enable'];
            $banner_style = $axil_options[$condipfix . '_banner_template']; 
 
            $banner_shape2 = isset($axil_options[$condipfix . '_banner_shape2']['id']) && !empty($axil_options[$condipfix . '_banner_shape2']['id']) ? $axil_options[$condipfix . '_banner_shape2']['id'] : "";
            
            if ( !empty($banner_shape2)) {
                $thumbnail_url2 = wp_get_attachment_image_src( $banner_shape2, $size );
                $banner_shape2 = $thumbnail_url2[0];
            }else {
                $banner_shape2 =  $axil_options[$condipfix . '_banner_shape2']['url'];
            } 

        } 

        $banner_layout = [
            'banner_area'   => $banner_area,           
            'banner_img'    => $banner_img,
            'sub_title'     => $sub_title,
            'breadcrumbs'   => $breadcrumbs,
            'banner_shape'  => $banner_shape,
            'banner_style'  => $banner_style,
            'banner_shape2'  => $banner_shape2,
            'image_alt'  => $image_alt,
        ];

        return $banner_layout;

    }
    
}


