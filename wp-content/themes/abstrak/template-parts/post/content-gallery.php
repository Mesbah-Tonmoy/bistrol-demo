<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package abstrak
 */

$images = axil_get_acf_data("axil_gallery_image");

$axil_options = Helper::axil_get_options();
$sidebar = Helper::axil_sidebar_options();
$thumb_size = ($sidebar === 'full')  || !is_active_sidebar( 'sidebar-1' )? 'axil-single-blog-thumb':'axil-blog-md';

$post_share_icon = (isset($axil_options['axil_show_post_share_icon'])) ? $axil_options['axil_show_post_share_icon'] : 'yes';
$thumb_size_class = has_post_thumbnail() ? '':'blog-without-thumb';
?>
<!-- Start Post List  -->

<div  id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="blog-grid blog-thumb-slide <?php echo esc_attr( $thumb_size_class ) ?>">
        <h3 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        <?php Helper::axil_postmeta(); ?> 
         <?php
            if($images){ ?>
                <div class="post-thumbnail">
                      <div class="slick-slider slick-arrow-nav slick-dot-nav" data-slick='{"infinite": true, "autoplay": true, "arrows": true, "dots": true, "slidesToShow": 1}'>
                    <?php foreach( $images as $image ): ?>
                        <div class="slick-slide">
                            <a href="<?php the_permalink(); ?>">
                                <img class="w-100"  src="<?php echo esc_url( $image['sizes'][$thumb_size]); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                            </a>
                        </div>
                    <?php endforeach; ?>
                    </div>
                </div>
                <?php } else { ?> 
                <?php if(has_post_thumbnail()){ ?>
                    <div class="post-thumbnail">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail($thumb_size) ?>
                        </a>
                    </div>
                <?php } ?>
            <?php } ?> 
            <?php the_excerpt();?>
            <?php if ( $axil_options['axil_read_more_btn'] != "no" ) { ?>  
                <a href="<?php the_permalink();?>" class="axil-btn btn-borderd btn-large"><?php echo esc_attr( $axil_options['axil_read_more_btn_txt'] );?></a>
            <?php } ?>

    </div>
</div>
