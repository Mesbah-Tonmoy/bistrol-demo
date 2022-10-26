<?php
/**
 * @author  AxilTheme
 * @since   1.0
 * @version 1.0
 */

/**
* Setup the post arguments.
*/

namespace axiltheme\abstrak_elements;
$query_args = axil_Elements_Helper::axil_get_query_args( 'axil_services', 'axil_services_category', $settings);
// The Query
$query      = new \WP_Query($query_args);
$col_class  = "col-lg-{$settings['col_lg']} col-md-{$settings['col_md']} col-sm-{$settings['col_sm']}";
$thumb_size = "full";
$i = 1; 
?>
<div class="section section-padding">
    <div class="container">
         <?php if( $settings['seation_services_grid_title_on'] =='yes' ){ ?>   
          
            <div class="mb--20 mb_md--70 section-heading heading-<?php echo esc_attr( $settings['axil_services_grid_align'] );?>">            
                 <?php  if($settings['axil_services_grid_title_before']){ ?>
                     <span class="subtitle"><?php echo esc_attr( $settings['axil_services_grid_title_before'] );?></span>
                 <?php  } ?> 

                <?php if ($settings['axil_services_grid_title_tag']) : ?>
                 <?php  if($settings['axil_services_grid_title']){ ?>
                     <<?php echo esc_html( $settings['axil_services_grid_title_tag'] );?> class="title">
                         <?php echo axil_kses_intermediate( $settings['axil_services_grid_title'] );?>
                     </<?php echo esc_html( $settings['axil_services_grid_title_tag'] );?>> 
                 <?php  } ?>             
                <?php endif; ?>
                 <?php  if($settings['axil_sub_services_grid_title']){ ?>
                     <p><?php echo axil_kses_intermediate( $settings['axil_sub_services_grid_title'] );?></p>
                 <?php  } ?>
            </div>
        <?php } ?> 

         <?php if ($query->have_posts()) { ?>
             <div class="row">
            <?php
             while ($query->have_posts()) {
                 $query->the_post();
                $top_active =   '';
               
                if( $i==1 ){
                    $top_mt =   'mt--200 ';
                    $top_active =   ' active ';
                }elseif( $i==2 ) {
                    $top_mt =   'mt--100 ';
                    $top_active =   ''; 
                }elseif( $i==3 ) {
                    $top_mt =   'mt-0 ';
                    $top_active =   '';
                }elseif( $i==4 ) {
                    $top_mt =   'mt-0 ';
                    $top_active =   ''; 
                }elseif( $i==5 ) {
                    $top_mt =   'mt---100 ';
                    $top_active =   '';
                }elseif( $i==6 ) {
                    $top_mt =   'mt---200 ';
                    $top_active =   '';
                }else{
                     $top_mt =   'mt-0 ';
                     $top_active =   '';
                }
                $i++;
                 ?>    
                 <div class="<?php echo esc_attr($col_class); ?>  mt_md--0 <?php echo esc_attr($top_mt); ?> sal-animate" data-sal="slide-up" data-sal-duration="800" data-sal-delay="200">
                        <div class="services-grid service-style-2 <?php echo esc_attr( $top_active ); ?>">
                         <?php   if ( has_post_thumbnail() ){ ?>
                             <div class="thumbnail">
                                                                  
                                     <?php the_post_thumbnail( $thumb_size ); ?>                                       
                                 
                             </div>
                        <?php } ?>
                            <div class="content">
                                <h5 class="title"> <?php the_title();?></h5>
                               <?php the_excerpt()?>
                                
                            </div>
                        </div>
                    </div>  
                 <?php } ?>
                 <?php wp_reset_postdata(); ?>
             </div>
         <?php } ?>
     </div>
    <?php if( $settings['shape_style_on2']  =='yes' ){ 
            $shape1 =  $settings['shape_7_1']['url'];
            $shape2 =  $settings['shape_7_2']['url'];
            $shape3 =  $settings['shape_7_3']['url']
         ?>
    <ul class="shape-group-7 list-unstyled">
            <?php if( $shape1 ){ ?>     
                <li class="shape shape-1"><img src="<?php echo esc_url( $shape1 );?>" alt="<?php echo axil_Elements_Helper::axil_get_image_alt( $settings['shape_7_1']['id'] );?>"></li>
            <?php } ?> 
            <?php if( $shape2 ){ ?>     
                <li class="shape shape-2"><img src="<?php echo esc_url( $shape2 );?>" alt="<?php echo axil_Elements_Helper::axil_get_image_alt( $settings['shape_7_2']['id'] );?>"></li>
            <?php } ?> 
            <?php if( $shape3 ){ ?>     
                <li class="shape shape-3"><img src="<?php echo esc_url( $shape3 );?>" alt="<?php echo axil_Elements_Helper::axil_get_image_alt( $settings['shape_7_3']['id'] );?>"></li>
            <?php } ?> 
        </ul> 
    <?php } ?>   
</div>

