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

$per_page = ( $axil_options['axil_team_archive_post_per_page'] ) ? $axil_options['axil_team_archive_post_per_page'] : '-1' ;

if (get_query_var('paged')) {
    $paged = get_query_var('paged');
} else if (get_query_var('page')) {
    $paged = get_query_var('page');
} else {
    $paged = 1;
}

?>
<?php get_header(); ?>

 <section class="section section-padding bg-color-dark pb--70 pb_lg--20 pb_md--0">
    <div class="container">
          <?php if ( have_posts() ) :?>
            <div class="row">
                 <?php                    
                    query_posts(array( 
                        'post_type' => 'axil_team',
                        'showposts' => $per_page,
                         'paged' => $paged,
                    ) );
                    while ( have_posts() ) : the_post();  
                        get_template_part( 'template-parts/archive/team/content-team-1', get_post_format() ); 
                    endwhile;?>
            </div>                  
                   <?php  Helper::axil_pagination();?>                      
            <?php else: ?>
                       <?php get_template_part( 'template-parts/content', 'none' );?>
            <?php endif; ?>
        </div> 
</section>
<?php get_footer(); 
?>