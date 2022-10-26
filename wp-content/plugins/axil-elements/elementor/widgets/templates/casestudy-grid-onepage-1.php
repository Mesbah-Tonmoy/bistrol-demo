<?php
/**
 * @author  AxilTheme
 * @since   1.0
 * @version 1.0
 */

/**
* Setup the case-study arguments.
*/

namespace axiltheme\abstrak_elements;
$query_args = axil_Elements_Helper::axil_get_query_args( 'axil-case-study', 'axil-case-studies-cat', $settings);
// The Query
$query = new \WP_Query($query_args);
$attr = '';
$btn = '';

if ('1' == $settings['axil_casestudy_project_button_link_type']) {
    if ( !empty( $settings['axil_casestudy_project_button_link']['url'] ) ) {
        $attr  = 'href="' . $settings['axil_casestudy_project_button_link']['url'] . '"';
        $attr .= !empty( $settings['axil_casestudy_project_button_link']['is_external'] ) ? ' target="_blank"' : '';
        $attr .= !empty( $settings['axil_casestudy_project_button_link']['nofollow'] ) ? ' rel="nofollow"' : '';
         
    }
    if ( !empty( $settings['axil_casestudy_project_button_text'] ) ) {
        $btn = '<a class="axil-btn btn-fill-white" ' . $attr . '>' . $settings['axil_casestudy_project_button_text'] . '</a>';
    }

}elseif('2' == $settings['axil_casestudy_project_button_link_type']){
    $attr  = 'href="' . get_permalink( $settings['axil_casestudy_project_button_page_link'] ) . '"';
    
    $attr .= ' rel="nofollow"';                        
    $btn = '<a class="axil-btn btn-fill-white" ' . $attr . '>' . $settings['axil_casestudy_project_button_text'] . '</a>';
 }elseif('3' == $settings['axil_casestudy_project_button_link_type']){
    $attr  = 'href="' . get_post_type_archive_link('axil-case-study') . '"';
    
    $attr .= ' rel="nofollow"';                        
    $btn = '<a class="axil-btn btn-fill-white" ' . $attr . '>' . $settings['axil_casestudy_project_button_text'] . '</a>';
}else{                                                          
    $btn = '';
} 
$row_gap = $settings['row_gap'];

if ( $settings['bdtype'] == 'bg-color-ship-gray' ) {
   $bdtype = 'light'; 
}elseif($settings['bdtype'] == 'bg-color-dark'){
   $bdtype = 'light'; 

}else{
    
    $bdtype = 'dark'; 
}

$allowed_tags = wp_kses_allowed_html( 'post' );
?>

 <div class="section section-padding-3 <?php echo esc_attr($settings['bdtype']); ?>">   
        <div class="container">
            
            <?php if( $settings['seation_casestudy_project_title_on'] =='yes' ){ ?>  

                <div class="section-heading heading-<?php echo esc_attr( $bdtype ); ?>-<?php echo esc_attr( $settings['axil_casestudy_project_align'] );?>">            
                    <?php  if($settings['axil_casestudy_project_title_before']){ ?>
                        <span class="subtitle"><?php echo axil_kses_intermediate( $settings['axil_casestudy_project_title_before'] );?></span>
                    <?php  } ?> 
                <?php if ($settings['axil_casestudy_project_title_tag']) : ?>
                    <?php  if($settings['axil_casestudy_project_title']){ ?>
                        <<?php echo esc_html( $settings['axil_casestudy_project_title_tag'] );?> class="title">
                            <?php echo axil_kses_intermediate( $settings['axil_casestudy_project_title'] );?>
                        </<?php echo esc_html( $settings['axil_casestudy_project_title_tag'] );?>> 
                    <?php  } ?>             
                <?php endif; ?>
                    <?php  if($settings['axil_sub_casestudy_project_title']){ ?>
                        <p><?php echo axil_kses_intermediate( $settings['axil_sub_casestudy_project_title'] );?></p>
                    <?php  } ?>
                </div> 

        <?php } ?>
    <?php
    $i = 1;
    if ($query->have_posts()) { ?>
        <div class="row <?php echo esc_attr($row_gap); ?>">
       <?php
        while ($query->have_posts()) {
            $query->the_post();
            global $post;
                $terms = get_the_terms($post->ID, 'axil-case-studies-cat');

                $featured_class = ' project-grid project-style-2 project-grid-style';
                $col_class = "move-up wow col-lg-{$settings['col_lg']} col-md-{$settings['col_md']} col-sm-{$settings['col_sm']}";

                if($settings['casestudy_first_project_featured'] == 'yes'){
                    $featured_class = ($i == 1) ? ' project-add-banner project-grid-style' : ' project-grid project-style-2 project-grid-style';
                    $col_class = ($i == 1) ? 'col-lg-12 col-12 move-up wow' : $col_class;
                }
                $modal_img_atts = get_the_post_thumbnail($post->ID, 'full', array('class' => 'modal-thumb')); 
                 $popup_content = get_field( "popup_content");
            ?>            
           <div class="<?php echo esc_attr($col_class); ?>">
				<div class="<?php echo esc_attr($featured_class); ?>">

				<?php if( $settings['casestudy_first_project_featured'] == 'yes' && $i == 1){ ?>

				    <?php } else { ?>
				        <div class="thumbnail">
				            <a href="#">
				                <?php the_post_thumbnail($settings['casestudy_image_size_size'], ['class' => 'w-100', 'title' => get_the_title() ]); ?>
				            </a>
                             <?php echo $modal_img_atts; ?>
                          
				        </div>
				    <?php } ?>  

                    <div class="content">
                    	<?php if ($terms && !is_wp_error($terms)): ?>
                            <span class="subtitle">
                                <?php foreach ($terms as $term) { ?>
                                    <span><?php echo esc_html($term->name); ?></span>
                                <?php } ?>
                             </span>
                        <?php endif ?>
                       <h3 class="title"><a href="#"><?php the_title(); ?></a></h3>  
                       
                        <div class="details-description">
                            <?php echo wp_kses_post( $popup_content );?>     
                        </div>   
                        
						<?php if( $settings['casestudy_first_project_featured'] == 'yes' && $i == 1 ){ ?>
							<div class="brand-logo">
							  <?php  echo wp_get_attachment_image( $settings['casestudy_first_project_featured_brand_logo']['id'], 'full' ); ?>
							</div>
 						<?php } ?>  
                    </div>

                    <?php
                    if (!empty($settings['casestudy_first_project_featured_brand']) && $i == 1){ ?>
                        <div class="thumbnail">
                            <?php
                            // Get image 'thumbnail' by ID
                            echo wp_get_attachment_image( $settings['casestudy_first_project_featured_brand']['id'], 'full' );
                            ?>

                        </div>
                    <?php } ?>

                </div>
            </div>

		  <!-- End Single Case Study  -->
        
		    <?php $i++; } ?>
		    <?php wp_reset_postdata(); ?>
		</div>

        <?php if ( !empty($settings['axil_casestudy_project_button_show'])) { ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="more-project-btn case-study-btn text-center move-up wow mb--60">

                            <?php if ('4' == $settings['axil_casestudy_project_button_link_type']) { ?>  
                                <div class="pagination justify-content-center"> 
                               <?php
                               $big = 999999999; // need an unlikely integer

                               if (get_query_var('paged')) {
                                   $paged = get_query_var('paged');
                               } else if (get_query_var('page')) {
                                   $paged = get_query_var('page');
                               } else {
                                   $paged = 1;
                               }
                               echo paginate_links( array(
                                   'base'       => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
                                   'format'     => '?paged=%#%',
                                   'current'    => $paged,
                                   'total'      => $query->max_num_pages,
                                   'type'       =>'list',
                                   'prev_text'  =>'<i class="fas fa-arrow-left"></i>',
                                   'next_text'  =>'<i class="fas fa-arrow-right"></i>',
                                   'show_all'   => false,
                                   'end_size'   => 1,
                                   'mid_size'   => 4,
                               ) );
                               ?>
                           </div>
                            <?php }else{ ?>                                                       
                                <?php echo wp_kses( $btn, $allowed_tags ); ?>
                            <?php }  ?> 
                    	 
                    </div>
            	</div>
            </div>
        <?php } ?>

		<?php } ?>
  </div> 
        <?php if( $settings['bdtype'] == 'bg-color-dark' || $settings['bdtype'] == 'bg-color-ship-gray' ){ ?>

            <?php if( $settings['shape_style_on'] == 'yes' ){ 
                $shape1 =  $settings['shape_10_1']['url'];
                $shape2 =  $settings['shape_10_2']['url'];
                $shape3 =  $settings['shape_10_3']['url'];
                ?>
            <ul class="shape-group-10 list-unstyled">
                <?php if( $shape1 ){ ?>     
                    <li class="shape shape-1"><img src="<?php echo esc_url( $shape1 );?>" alt="<?php echo axil_Elements_Helper::axil_get_image_alt( $settings['shape_10_1']['id'] );?>"></li>
                <?php } ?> 
                <?php if( $shape2 ){ ?>     
                    <li class="shape shape-2"><img src="<?php echo esc_url( $shape2 );?>" alt="<?php echo axil_Elements_Helper::axil_get_image_alt( $settings['shape_10_2']['id'] );?>"></li>
                <?php } ?> 
                <?php if( $shape3 ){ ?>     
                    <li class="shape shape-3"><img src="<?php echo esc_url( $shape3 );?>" alt="<?php echo axil_Elements_Helper::axil_get_image_alt( $settings['shape_10_3']['id'] );?>"></li>
                <?php } ?> 
            </ul>
        <?php } ?> 
    <?php } ?> 
       
</div>
<!-- Portfolio Modal Box -->
<div class="op-portfolio-modal op-modal-wrap">
    <div class="op-modal-inner">
        <button class="close"><i class="far fa-times"></i></button>
        <div class="op-modal-content">
            <div class="portfolio-thumbnail"></div>
            <div class="portfolio-content"></div>
        </div>
    </div>
</div>
<!-- Portfolio Modal Box -->