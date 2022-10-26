<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package abstrak
 */
$axil_options = Helper::axil_get_options();
$axil_quote_author_name = axil_get_acf_data("axil_quote_author_name");
$axil_quote_author = !empty($axil_quote_author_name) ? $axil_quote_author_name : get_the_author();
$axil_quote_author_name_designation = axil_get_acf_data("axil_quote_author_name_designation");
$sidebar = Helper::axil_sidebar_options();
$thumb_size = ($sidebar === 'full')  || !is_active_sidebar( 'sidebar-1' )? 'axil-single-blog-thumb':'axil-blog-md';
$post_share_icon = (isset($axil_options['axil_show_post_share_icon'])) ? $axil_options['axil_show_post_share_icon'] : 'yes';
?>
<div id="post-<?php the_ID(); ?>" <?php post_class('content-block post-list-view format-quote mt--30'); ?>>
     <div class="blog-grid blog-without-thumb blog-quote-post">
        <h5 class="title"><a href="<?php the_permalink(); ?>">“ <?php the_title(); ?> ”</a></h5>          
          <?php Helper::axil_quote_postmeta(); ?>  
    </div>
</div>