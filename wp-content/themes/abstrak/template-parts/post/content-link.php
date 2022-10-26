<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package abstrak
 */

$custom_link = axil_get_acf_data("axil_custom_link");
$link = !empty($custom_link) ? $custom_link : get_the_permalink();
$axil_options = Helper::axil_get_options();
$sidebar = Helper::axil_sidebar_options();
$thumb_size = ($sidebar === 'full')  || !is_active_sidebar( 'sidebar-1' )? 'axil-single-blog-thumb':'axil-blog-md';
$thumb_size_class = has_post_thumbnail() ? '':'blog-without-thumb';
?>

<div  id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="blog-grid <?php echo esc_attr( $thumb_size_class ) ?>">
        <h3 class="title"><a href="<?php echo esc_url($link); ?>"><?php the_title(); ?></a></h3>
        <?php Helper::axil_postmeta(); ?>
         <?php if(has_post_thumbnail()){ ?>
            <div class="post-thumbnail">
                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail($thumb_size) ?>
                </a>
            </div>
        <?php } ?>    
          
            <?php the_excerpt();?>
            <?php if ( $axil_options['axil_read_more_btn'] != "no" ) { ?>  
                <a href="<?php the_permalink();?>" class="axil-btn btn-borderd btn-large"><?php  echo esc_attr( $axil_options['axil_read_more_btn_txt'] );?></a>
            <?php } ?>
            
    </div>
</div>
