<?php
/**
 * @author  AxilTheme
 * @since   1.0
 * @version 1.0
 */

$shape1 =  $settings['shape1']['url'];
$shape2 =  $settings['shape2']['url'];
$shape3 =  $settings['shape3']['url'];
$shape4 =  $settings['shape4']['url'];

if (get_query_var('paged')) {
    $paged = get_query_var('paged');
} else if (get_query_var('page')) {
    $paged = get_query_var('page');
} else {
    $paged = 1;
}


?>
<div class="section section-padding-equal"> 	

    <div class="container">
	     <?php if( $settings['seation_post_grid_title_on'] =='yes' ){ ?>
		    <div class="section-heading  heading-dark-<?php echo esc_attr( $settings['axil_post_grid_align'] );?>">            
		        <?php  if($settings['axil_post_grid_title_before']){ ?>
		            <span class="subtitle"><?php echo esc_attr( $settings['axil_post_grid_title_before'] );?></span>
		        <?php  } ?> 
			    <?php if ($settings['axil_post_grid_title_tag']) : ?>
			        <?php  if($settings['axil_post_grid_title']){ ?>
			            <<?php echo esc_html( $settings['axil_post_grid_title_tag'] );?> class="title">
			                <?php echo esc_attr( $settings['axil_post_grid_title'] );?>
			            </<?php echo esc_html( $settings['axil_post_grid_title_tag'] );?>> 
			        <?php  } ?>             
			    <?php endif; ?>
		        <?php  if($settings['axil_sub_post_grid_title']){ ?>
		            <p><?php echo esc_attr( $settings['axil_sub_post_grid_title'] );?></p>
		        <?php  } ?>
    		</div>
        <?php } ?> 

         <div class="row g-0">
		<?php
			$post_sorting = $settings['post_sorting'];
			$post_ordering = $settings['post_ordering'];
			$title_limit = $settings['post_title_length'];
			$content_limit = $settings['post_content_length'];					
			$post_details_text = $settings['post_details_text'];					
			// number
			 $number_of_post = $settings['number_of_post'];
            $p_ids = array();

            if ( !empty($settings['posts_not_in'])){
                foreach ( $settings['posts_not_in'] as $p_idsn ) {
                    $p_ids[] = $p_idsn;
                }
            }
			$cat_single_list = $settings['cat_single_list'];			
			$args = array(
				'cat' => $cat_single_list,
				'post_status' => 'publish',
				'order' => $post_ordering,
				'posts_per_page' => $number_of_post,
				'paged'          => $paged,		
				'suppress_filters'    => false,
            	'ignore_sticky_posts' => true,	
				'post__not_in'   => $p_ids

			);
				
			if ( $post_sorting == 'view' ) {
				$args['orderby']  = 'meta_value_num';
				$args['meta_key'] = 'axil_views';
			} else {
				$args['orderby'] = $post_sorting;
			}

			$query = new WP_Query( $args );			
			$temp = Helper::wp_set_temp_query( $query );			
			if ( $query->have_posts() ) {	
				while ( $query->have_posts() ) {
				$query->the_post();
				$post_id = get_the_ID();
				$excerpt = wp_trim_words(get_the_excerpt(), $content_limit, '');
				$ptitle = wp_trim_words(get_the_title(), $title_limit, '...');
				$border_start = '';
				if( $query->current_post%2 == 1 ){
                    $border_start =   ' border-start';
                }
	 
 				$modal_img_atts = get_the_post_thumbnail($post_id, 'full', array('class' => 'modal-thumb')); 
				?>
                    <div class="col-xl-6">

                        <div class="blog-list <?php echo esc_attr( $border_start );?>">
                        	<?php if( $settings['post_img_display'] ){ ?>
					        <?php if(has_post_thumbnail()){ ?>
					            <div class="post-thumbnail">
					                <a href="#">
					                    <?php the_post_thumbnail('axil-blog-sm') ?>
					                </a>
					                 <?php echo $modal_img_atts; ?>
					            </div>
					        <?php } ?>                               
				        <?php } ?> 
				        <div class="post-content">
                                <h5 class="blog-title title"><a href="#"><?php echo esc_attr( $ptitle );?></a></h5>
                               <?php if( $settings['content_display'] ){ ?>
                               		 <p class="blog-content"><?php echo esc_attr( $excerpt );?></p>
                                 <?php } ?> 
                                <?php if( $settings['post_details'] ){ ?>
                                <a href="#" class="more-btn"><?php echo esc_attr( $post_details_text );?><i class="far fa-angle-right"></i></a>
                                <?php } ?>  
  								<div class="details-description">
                                    <?php the_content();?>
                                </div>
                            </div>
                        </div>
                    </div>
                    
             <?php } ?>			
				</div>
 			</div>
	 		<?php if($settings['shape_style_on']  == 'yes' ){ ?>
				<ul class="shape-group-1 list-unstyled">
				<?php if( $shape1 ){ ?>             
						<li class="shape shape-1"><img src="<?php echo esc_url( $shape1 );?>" alt="<?php echo Helper::axil_get_image_alt2( $settings['shape1']['id'] );?>"></li>
				<?php } ?> 
				<?php if( $shape2 ){ ?>   
						<li class="shape shape-2"><img src="<?php echo esc_url( $shape2 );?>" alt="<?php echo Helper::axil_get_image_alt2( $settings['shape2']['id'] );?>"></li>
				<?php } ?> 
				<?php if( $shape3 ){ ?>   
						<li class="shape shape-3"><img src="<?php echo esc_url( $shape3 );?>" alt="<?php echo Helper::axil_get_image_alt2( $settings['shape3']['id'] );?>"></li>
				<?php } ?> 
				<?php if( $shape4 ){ ?>   
						<li class="shape shape-4"><img src="<?php echo esc_url( $shape4 );?>" alt="<?php echo Helper::axil_get_image_alt2( $settings['shape4']['id'] );?>"></li>
				<?php } ?> 
				</ul>
             <?php } ?>  
		<?php Helper::wp_reset_temp_query( $temp );
	 	} ?>
	
</div>
 

    <!-- Blog Modal Box -->
    <div class="op-blog-modal op-modal-wrap">
        <div class="op-modal-inner">
            <button class="close"><i class="far fa-times"></i></button>
            <div class="op-modal-content">
                <div class="post-thumbnail"></div>
                <div class="post-content"></div>
            </div>
        </div>
    </div>
    <!-- Blog Modal Box -->