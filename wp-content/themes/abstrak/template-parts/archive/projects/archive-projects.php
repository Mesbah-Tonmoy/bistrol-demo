<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package braskix
 */

$axil_options = Helper::axil_get_options();

$per_page = ( $axil_options['axil_projects_archive_post_per_page'] ) ? $axil_options['axil_projects_archive_post_per_page'] : '-1' ;

$axil_blog_sidebar_class = ($axil_options['axil_projects_archive_sidebar'] === 'no') || !is_active_sidebar( 'widgets-projects' ) ? 'col-lg-12 axil-post-wrapper':'col-lg-8 axil-post-wrapper';

    if (get_query_var('paged')) {
        $paged = get_query_var('paged');
    } else if (get_query_var('page')) {
        $paged = get_query_var('page');
    } else {
        $paged = 1;
    }

?>
<?php get_header(); ?>

 <section class="section-padding-2">
    <div class="container">
          <?php if ( have_posts() ) :?>
        <div class="row row-40">

            <?php if ( is_active_sidebar( 'widgets-projects' ) && $axil_options['axil_projects_archive_sidebar'] == 'left') { ?>
                <div class="col-lg-4 col-md-12 col-12 mt_md--40 mt_sm--40">
                    <aside class="axil-sidebar-area">
                      
                        <?php dynamic_sidebar('widgets-projects'); ?>
                       
                    </aside>
                </div>
            <?php } ?>
            <div class="<?php echo esc_attr($axil_blog_sidebar_class); ?>">
                <div class="row">

                     <?php
                        query_posts(array( 
                            'post_type' => 'axil-projects',
                            'showposts' => $per_page,
                            'paged' => $paged,
                        ) );


                        while ( have_posts() ) : the_post();  
                             get_template_part( 'template-parts/archive/projects/content-project-1', get_post_format() ); ?>  

                    <?php endwhile;?>
                               
                        <?php  Helper::axil_pagination();?>  

                    <?php else:?>
                          <?php get_template_part( 'template-parts/content', 'none' );?>
                    <?php endif;?>
                </div>   
            </div>   
            
            <?php if ( is_active_sidebar( 'widgets-projects' ) && $axil_options['axil_projects_archive_sidebar'] == 'right') { ?>
                <div class="col-lg-4 col-md-12 col-12 mt_md--40 mt_sm--40">
                    <aside class="axil-sidebar-area">
                      <?php dynamic_sidebar('widgets-projects'); ?>
                  
                </aside>
                </div>
            <?php } ?>
            </div>
        </div> 
</section> 
<?php get_footer(); ?>
