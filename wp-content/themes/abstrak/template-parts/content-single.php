<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package abstrak
 */

// Get Value

$axil_options = Helper::axil_get_options();
$sidebar = Helper::axil_sidebar_options();
$axil_single_blog_sidebar_class = ($sidebar === 'full')  || !is_active_sidebar( 'sidebar-1' )? ' col-lg-12':' col-lg-8';
$alignwide = ($sidebar === 'full')  || !is_active_sidebar( 'sidebar-1' )? 'wp-block-image alignwide':'';

$images = axil_get_acf_data('axil_gallery_image');
$audio_url = axil_get_acf_data('axil_upload_audio');
$custom_link = axil_get_acf_data('axil_custom_link');

$link = !empty($custom_link) ? $custom_link : get_the_permalink();
$axil_quote_author_name = axil_get_acf_data("axil_quote_author_name");
$axil_quote_author = !empty($axil_quote_author_name) ? $axil_quote_author_name : get_the_author();
$axil_quote_author_name_designation = axil_get_acf_data("axil_quote_author_name_designation");
$video_url = axil_get_acf_data("axil_video_link");
$thumb_size = ($sidebar === 'full')  || !is_active_sidebar( 'sidebar-1' )? 'axil-single-blog-thumb':'axil-blog-md';
$header_layout = Helper::axil_post_banner_style();

// Review
$review_area = axil_get_acf_data('axil_post_review_box');
$review_box_position = axil_get_acf_data('axil_post_review_box_position');

?>
<section class="section-padding-3">
    <div class="container">
        <div class="row row-40">
            <?php if ( is_active_sidebar( 'sidebar-1' ) && $sidebar == 'left') { ?>
                <div class="col-lg-4">
                    <div class="axil-sidebar">
                       <?php dynamic_sidebar(); ?>                        
                    </div>
                </div>
            <?php } ?>
        <div class="<?php echo esc_attr( $axil_single_blog_sidebar_class ); ?>">
            <div class="single-blog">                
                <div class="single-blog-content blog-grid">   
                <?php
                if (has_post_format('gallery')) {
                    if ($images): ?>
                    <div class="post-thumbnail gallery-thumbnail">
                        <div class="slick-slider slick-arrow-nav slick-dot-nav" data-slick='{"infinite": true, "autoplay": true, "arrows": true, "dots": true, "slidesToShow": 1}'>                           
                        <?php foreach( $images as $image ): ?>
                            <div class="slick-slide">
                                <img src="<?php echo esc_url($image['sizes'][$thumb_size]); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                            </div>
                        <?php endforeach; ?>               
                        </div>
                    </div>
                    <?php endif;
                    }elseif (has_post_format( 'audio' ) ) { ?>  
                        <?php
                        if ( has_post_thumbnail() ) { ?>
                            <div class="post-thumbnail position-relative">
                                <?php the_post_thumbnail($thumb_size, ['class' => 'w-100']) ?>
                            </div>
                        <?php } ?>
                        <?php if ($audio_url): ?>
                            <div class="green-player audio-player">                                   
                                <audio controls>
                                    <source src="<?php echo esc_url($audio_url['url']); ?>" type="audio/ogg">
                                    <source src="<?php echo esc_url($audio_url['url']); ?>" type="audio/mpeg">
                                    <?php esc_html_e('Your browser does not support the audio tag.', 'abstrak'); ?>
                                </audio>    
                            </div>
                        <?php endif;
                        ?>

                    <?php }elseif( has_post_format('link') ) { ?>

                    <?php } elseif( has_post_format( 'quote' ) ) { ?>

                            <!-- Start Single Blog  -->

                            <div class="blog-grid blog-without-thumb blog-quote-post mb--40">
                                    <blockquote>
                                        <h5 class="title">“ <?php the_title(); ?> ”</h5>
                                    </blockquote>
                                   <?php Helper::abstrak_singlepostmeta(); ?> 

                             </div> 

                        <!-- End Single Blog  -->
                    <?php } elseif( has_post_format( 'video' ) ) {
                                $convar_emb_link = '';
                                if (function_exists('axil_getEmbedUrl')){
                                    $convar_emb_link = axil_getEmbedUrl( $video_url );
                                }
                                if(!empty($convar_emb_link)){ ?>
                                    <div class="post-thumbnail">
                                        <div class="embed-responsive embed-responsive-16by9">
                                            <iframe src="<?php echo esc_url($convar_emb_link); ?>"  allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
                                        </div>
                                    </div>
                                <?php }

                            } else {

                            if (has_post_thumbnail()) { ?>
                                <div class="post-thumbnail">
                                    <?php the_post_thumbnail($thumb_size) ?>
                                </div>
                            <?php }
                        }
                        ?>
                    <?php if (!has_post_format('quote')) { ?>
                        <?php Helper::abstrak_singlepostmeta(); ?>                       
                    <?php } ?>
                 <?php                       
                the_content();
                wp_link_pages(array(
                    'before' => '<div class="axil-page-links"><span class="page-link-holder">' . esc_html__('Pages:', 'abstrak') . '</span>',
                    'after' => '</div>',
                    'link_before' => '<span>',
                    'link_after' => '</span>',
                ));
                   ?>                       
            </div> 

             <!-- Start Blog Author  -->
                    <?php
                    if ($axil_options['axil_blog_details_show_author_info']) {
                        get_template_part('template-parts/biography');
                    }
                    ?>
                    <!-- End Blog Author  -->
                    
            <?php
            /**
             *  Output comments wrapper if it's a post, or if comments are open,
             * or if there's a comment number – and check for password.
             * */

            if ((is_single() || is_page()) && (comments_open() || get_comments_number()) && !post_password_required()) {
                ?>
                <div class="axil-comment-area">
                    
                    <?php comments_template(); ?>

                </div><!-- .comments-wrapper -->

                <?php
            }
            ?>
            </div>
            </div>
            <?php if ( is_active_sidebar( 'sidebar-1' ) && $sidebar == 'right') { ?>
                <div class="col-lg-4">
                    <div class="axil-sidebar">
                       <?php dynamic_sidebar(); ?>                        
                    </div>
                </div>
            <?php } ?>
        </div>
        </div>
  </section>
<?php
get_footer();