<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package abstrak
 */

$video_url = axil_get_acf_data("axil_video_link");
$axil_options = Helper::axil_get_options();
$sidebar = Helper::axil_sidebar_options();
$thumb_size = ($sidebar === 'full')  || !is_active_sidebar( 'sidebar-1' )? 'axil-single-blog-thumb':'axil-blog-md';
$post_share_icon = (isset($axil_options['axil_show_post_share_icon'])) ? $axil_options['axil_show_post_share_icon'] : 'yes';
$thumb_size_class = has_post_thumbnail() ? '':'blog-without-thumb';
?>
<div  id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="blog-grid <?php echo esc_attr( $thumb_size_class ) ?>">
        <h3 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        <?php Helper::axil_postmeta(); ?>
         <?php if(has_post_thumbnail()){ ?>
            <div class="post-thumbnail">
                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail($thumb_size) ?>
                </a>
                <div class="popup-video">
                    <a href="<?php echo esc_url( $video_url ); ?>" class="play-btn popup-youtube"><i class="fas fa-play"></i></a>
                </div>
            </div>
        <?php } ?>    
         
            <?php the_excerpt();?>
             <?php if ( $axil_options['axil_read_more_btn'] != "no" ) { ?>  
                <a href="<?php the_permalink();?>" class="axil-btn btn-borderd btn-large"><?php  echo esc_attr( $axil_options['axil_read_more_btn_txt'] );?></a>
            <?php } ?>
    </div>
</div>
