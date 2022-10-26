<?php
/**
 * @author  AxilTheme
 * @since   1.0
 * @version 1.0
 */

namespace axiltheme\abstrak_elements;
class axil_Elements_Helper {


     public static function axil_pagination2( $max_num_pages = false ) {
        global $wp_query;

        $max = $max_num_pages ? $max_num_pages : $wp_query->max_num_pages;
        $max = intval( $max );

        /** Stop execution if there's only 1 page */
        if( $max <= 1 ) return;

        $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;

        /** Add current page to the array */
        if ( $paged >= 1 )
            $links[] = $paged;

        /** Add the pages around the current page to the array */
        if ( $paged >= 3 ) {
            $links[] = $paged - 1;
            $links[] = $paged - 2;
        }

        if ( ( $paged + 2 ) <= $max ) {
            $links[] = $paged + 2;
            $links[] = $paged + 1;
        }
        include AXIL_FREAMWORK_DIRECTORY . 'pagination.php';
    }


    
    public static function axil_get_image_alt( $image_id ){ 

            $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', TRUE);

            return $image_alt;
        }
         public static function axil_get_img_alt( $thumb_id ){ 
           
            $alt = get_post_meta($thumb_id, '_wp_attachment_image_alt', true);
            if( $alt ):
                echo esc_attr($alt);
            endif;
        }
    public static function axil_get_projects_cat_text($postID){  
    
    $terms = wp_get_post_terms( $postID, "axil-projects-category", array( 'fields' => 'all' ) );
    if(!empty($terms)){ 
      foreach($terms as $index =>  $term){  ?>   
        <?php echo esc_html( $term->name); ?>
        <?php echo esc_html( self::generate_array_iterator_postfix( $terms, $index, "," ) ) ?>
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


public static function generate_array_iterator_postfix( $array, $index, $postfix = ',' ) {
   $length = count($array);
   if ($length) {
     $last_index = $length - 1;
     return $index < $last_index ? $postfix :'';
   }
 }
 

public static function axiltheme_element_template( $template, $settings ) {
	$template_name = "/abstrak-widgets/templates/{$template}.php";
	if ( file_exists( STYLESHEETPATH . $template_name ) ) {
		$file = STYLESHEETPATH . $template_name;
	}
	elseif ( file_exists( TEMPLATEPATH . $template_name ) ) {
		$file = TEMPLATEPATH . $template_name;
	}
	else {
		$file = __DIR__ . "/widgets/templates/{$template}.php";
	}
	ob_start();
	include $file;
	echo ob_get_clean();
	}


/**
 * Get Post Categories
 */

public static function axil_get_categories( $taxonomy )
    {
        $terms = get_terms(array(
            'taxonomy' => $taxonomy,
            'hide_empty' => true,
        ));
        $options = array();
        if (!empty($terms) && !is_wp_error($terms)) {
            foreach ($terms as $term) {
                $options[$term->slug] = $term->name;
            }
        }
        return $options;
    }

/**
 * Get Post Categories
 */

    public static function axil_get_categories_id( $taxonomy )
    {
        $terms = get_terms(array(
            'taxonomy' => $taxonomy,
            'hide_empty' => true,
        ));
        $options = array();
        if (!empty($terms) && !is_wp_error($terms)) {
            foreach ($terms as $term) {
                $options[$term->term_id] = $term->name;
            }
        }
        return $options;
    }


/**
 * Get all Pages
 */
 public static  function axil_get_pages()
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


/*
 * All Post Name
 * return array
 */

     public static function axil_get_all_posts($post_type = 'post')
    {
        $options = array();
        $options = ['0' => esc_html__('None', 'axil-elements')];
        $axil_post = array('posts_per_page' => -1, 'post_type' => $post_type);
        $axil_post_terms = get_posts($axil_post);
        if (!empty($axil_post_terms) && !is_wp_error($axil_post_terms)) {
            foreach ($axil_post_terms as $term) {
                $options[$term->ID] = $term->post_title;
            }
            return $options;
        }
    }


    /**
    * Get all types of post.
    */

public static  function axil_get_all_types_post( $post_type )
    {
        $posts_args = get_posts(array(
            'post_type' => $post_type,
            'orderby' => 'date',
            'order' => 'DESC',
            'post_status' => 'publish',
            'posts_per_page' => -1,
        ));

        $posts = array();

        if (!empty($posts_args) && !is_wp_error($posts_args)) {
            foreach ($posts_args as $post) {
                $posts[$post->ID] = $post->post_title;
            }
        }

        return $posts;
    }


/**
 * Post Orderby Options
 */

public static  function axil_get_orderby_options()
    {
        $orderby = array(
            'ID' => 'Post ID',
            'author' => 'Post Author',
            'title' => 'Title',
            'date' => 'Date',
            'modified' => 'Last Modified Date',
            'parent' => 'Parent Id',
            'rand' => 'Random',
            'comment_count' => 'Comment Count',
            'menu_order' => 'Menu Order',
        );
        return $orderby;
    }
    /**
    * Get all Pages
    */
   public static function axil_get_all_pages()
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

    /**
     * Render Section Title
     *
     * @param null $control_id
     * @param $settings
     */


     public static function axil_section_title_render( $control_id = null, $extra07color, $settings)
    {
        //$this->add_render_attribute('title_args', 'class', 'title');
      
       
        ?>

        <?php if( $settings['seation_' . $control_id . '_title_on'] =='yes' ){ ?>  

          
                <?php  if($settings['axil_' . $control_id . '_title_before']){ ?>
                    <span class="subtitle"><?php echo axil_kses_basic( $settings['axil_' . $control_id . '_title_before'] );?></span>
                <?php  } ?> 


            <?php if ($settings['axil_'.$control_id.'_title_tag']) : ?>

                <?php  if($settings['axil_' . $control_id . '_title']){ ?>
                    <<?php echo esc_html( $settings['axil_'.$control_id.'_title_tag'] );?> class="title">
                        <?php echo axil_kses_basic( $settings['axil_' . $control_id . '_title'] );?>
                    </<?php echo esc_html( $settings['axil_'.$control_id.'_title_tag'] );?>> 
                <?php  } ?> 
                
            <?php endif; ?>

            <?php  if($settings['axil_sub_' . $control_id . '_title']){ ?>
                <p><?php echo axil_kses_basic( $settings['axil_sub_' . $control_id . '_title'] );?></p>
            <?php  } ?>
       
        <?php } ?> 



        <?php
    }



    public static function axil_get_query_args($posttype, $taxonomy, $settings)
    {

     if (get_query_var('paged')) {
            $paged = get_query_var('paged');
        } else if (get_query_var('page')) {
            $paged = get_query_var('page');
        } else {
            $paged = 1;
        }

        $category_list = '';
        if (!empty($settings['category'])) {
            $category_list = implode(", ", $settings['category']);
        }
        $category_list_value = explode(" ", $category_list);


        $exclude_category_list = '';
        if (!empty($settings['exclude_category'])) {
            $exclude_category_list = implode(", ", $settings['exclude_category']);
        }
        $exclude_category_list_value = explode(" ", $exclude_category_list);

        $posts_per_page = (!empty($settings['posts_per_page'])) ? $settings['posts_per_page'] : '-1';
        $orderby = (!empty($settings['orderby'])) ? $settings['orderby'] : 'post_date';
        $order = (!empty($settings['order'])) ? $settings['order'] : 'desc';
        $offset_value = (!empty($settings['offset'])) ? $settings['offset'] : '0';


        // number
        $off = (!empty($offset_value)) ? $offset_value : 0;
        $offset = $off + (($paged - 1) * $posts_per_page);
        $p_ids = array();


        // Post in
        $post_in = '';
        if ($post_in >= 1 && !empty($post_in)) {
            $post_in_ids = implode(', ', $post_in);
        } else {
            $post_in_ids = '';
        }
        $in_posts = explode(',', $post_in_ids);

        $args = array(
            'post_type' => $posttype,
            'post_status' => 'publish',
            'posts_per_page' => $posts_per_page,
            'orderby' => $orderby,
            'order' => $order,
            'offset' => $offset,
            'paged' => $paged,
            'category__not_in' => $exclude_category_list_value,
        );

        // ignore_sticky_posts and manually Exclude
        $sticky = get_option( 'sticky_posts' );
        if (!empty($settings['ignore_sticky_posts']) && $settings['ignore_sticky_posts'] == 'yes') {
            $args['ignore_sticky_posts'] = 1;

            if ( !empty($settings['post__not_in']) ) {
                $post__not_in = $settings['post__not_in'];
                $posts_not_in = array_merge($post__not_in,$sticky);
                $args['post__not_in'] = $posts_not_in;
            } else {
                $args['post__not_in'] = $sticky;
            }

        } else {
            if (!empty($settings['post__not_in'])) {
                $post__not_in = $settings['post__not_in'];
                $args['post__not_in'] = $post__not_in;
            }
        }

        // show_sticky_posts and manually Exclude
        if (!empty($settings['show_only_sticky_posts']) && $settings['show_only_sticky_posts'] == 'yes') {
            $args['ignore_sticky_posts'] = 1;
            // post__in
            if ("0" != $in_posts && !empty($settings['post__in'])) {
                $posts_in = array_merge($in_posts,$sticky);
                $args['post__in'] = $posts_in;
            } else{
                $args['post__in'] = $sticky;
            }
        } else {
            // post__in
            if ("0" != $in_posts && !empty($settings['post__in'])) {
                $args['post__in'] = $in_posts;
            }
        }


        if (!empty($settings['category'])) {
            $args['tax_query'][] = [
                'taxonomy' => $taxonomy,
                'field' => 'slug',
                'terms' => $category_list_value,
            ];
        }

        if (!empty($settings['post_format'])) {
            $args['tax_query'][] = [
                'taxonomy' => 'post_format',
                'field' => 'slug',
                'terms' => $settings['post_format'],
            ];
        }

        return $args;
    }


}



/**
 * Get all Pages
 */
if ( !function_exists('axil_get_all_pages') ) {
    function axil_get_all_pages() {

        $page_list = get_posts( array(
            'post_type'         => 'page',
            'orderby'           => 'date',
            'order'             => 'DESC',
            'posts_per_page'    => -1,
        ) );

        $pages = array();

        if ( ! empty( $page_list ) && ! is_wp_error( $page_list ) ) {
            foreach ( $page_list as $page ) {
               $pages[ $page->post_name ] = $page->post_title;
            }
        }

        return $pages;
    }
}
