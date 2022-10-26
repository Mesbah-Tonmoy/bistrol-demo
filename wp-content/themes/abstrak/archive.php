<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package abstrak
 */

$prex = AXIL_THEME_FIX;
if ( is_post_type_archive( "{$prex}_team" ) || is_tax( "{$prex}_team_category" )) {
    get_template_part( 'template-parts/archive/team/archive', 'team' );
    return;
}
if ( is_post_type_archive( "{$prex}-projects" ) || is_tax( "{$prex}-projects-category" )) {
    get_template_part( 'template-parts/archive/projects/archive', 'projects' );
    return;
}
if ( is_post_type_archive( "{$prex}_services" ) || is_tax( "{$prex}_services_category" )) {
    get_template_part( 'template-parts/archive/services/archive', 'services' );
    return;
}
if ( is_post_type_archive( "{$prex}-case-study" ) || is_tax( "{$prex}-case-studies-cat" )) {
    get_template_part( 'template-parts/archive/case-study/archive', 'case-study' );
    return;
}

get_header();
// Get Value
$axil_options = Helper::axil_get_options();
$axil_blog_sidebar_class = ($axil_options['axil_blog_sidebar'] === 'no') || !is_active_sidebar( 'sidebar-1' ) ? 'col-lg-12 axil-post-wrapper':'col-lg-8 axil-post-wrapper';
?>
<!-- Start Blog Area  -->
<div class="axil-blog-area section-padding-equal">
    <div class="container">
        <div class="row row-40">
            <?php if ( is_active_sidebar( 'sidebar-1' ) && $axil_options['axil_blog_sidebar'] == 'left') { ?>
                <div class="col-lg-4 col-md-12 col-12 mt_md--40 mt_sm--40">
                    <aside class="axil-sidebar-area">
                      
                        <?php dynamic_sidebar(); ?>
                       
                    </aside>
                </div>
            <?php } ?>
            <div class="<?php echo esc_attr($axil_blog_sidebar_class); ?>">
              
                <?php
                if ( have_posts() ) :

                    /* Start the Loop */
                    while ( have_posts() ) :
                        the_post();

                        /*
                         * Include the Post-Format-specific template for the content.
                         * If you want to override this in a child theme, then include a file
                         * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                         */
                        get_template_part( 'template-parts/post/content', get_post_format() );

                    endwhile;

                    axil_blog_pagination();

                else :

                    get_template_part( 'template-parts/content', 'none' );

                endif;
                ?>
            </div>
            <?php if ( is_active_sidebar( 'sidebar-1' ) && $axil_options['axil_blog_sidebar'] == 'right') { ?>
                <div class="col-lg-4 col-md-12 col-12 mt_md--40 mt_sm--40">
                    <aside class="axil-sidebar-area">
                      <?php dynamic_sidebar(); ?>                  
                    </aside>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<!-- End Blog Area  -->
<?php
get_footer();