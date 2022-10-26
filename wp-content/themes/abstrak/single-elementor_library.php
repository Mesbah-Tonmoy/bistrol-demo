<?php
/**
 * The template for displaying elementor template
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package abstrak
 */
get_header(); 
while ( have_posts() ) : the_post(); ?>
	<div class="page-wrapper blog-story-area clear">		
		<div class="elementor-template-preview">
			<?php the_content(); 

				// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;?>

			

		</div>
	</div>
<?php
endwhile; // End of the loop.
get_footer();