<?php
/**
 * @author  AxilTheme
 * @since   1.0
 * @version 1.0
 */

$thumb_size  = "axil-team-sm";
$args = array(
	'post_type'      => "axil_team",
	'posts_per_page' => $settings['number'],
	'orderby'        => $settings['orderby'],
);

if ( !empty( $settings['cat_list'] ) ) {
	$args['tax_query'] = array(
		array(
			'taxonomy' => "axil_team_category",
			'field' => 'term_id',
			'terms' => $settings['cat_list'],
		)
	);
}
switch ( $settings['orderby'] ) {
	case 'title':
	case 'menu_order':
	$args['order'] = 'ASC';
	break;
}
$query = new WP_Query( $args );
$col_class = "col-lg-{$settings['col_lg']} col-md-{$settings['col_md']} col-sm-{$settings['col_sm']}";
$temp = Helper::wp_set_temp_query( $query );
?> 
 <div class="section section-padding bg-color-dark pb--60 pb_lg--20 pb_md--0">
    <div class="container">
        <?php if( $settings['seation_team_section_title_on'] =='yes' ){ ?>
		    <div class="section-heading heading-light heading-light-<?php echo esc_attr( $settings['axil_team_section_align'] );?>">            
		        <?php  if($settings['axil_team_section_title_before']){ ?>
		            <span class="subtitle"><?php echo esc_attr( $settings['axil_team_section_title_before'] );?></span>
		        <?php  } ?> 
			    <?php if ($settings['axil_team_section_title_tag']) : ?>
			        <?php  if($settings['axil_team_section_title']){ ?>
			            <<?php echo esc_html( $settings['axil_team_section_title_tag'] );?> class="title">
			                <?php echo axil_kses_intermediate( $settings['axil_team_section_title'] );?>
			            </<?php echo esc_html( $settings['axil_team_section_title_tag'] );?>> 
			        <?php  } ?>             
			    <?php endif; ?>
		        <?php  if($settings['axil_sub_team_section_title']){ ?>
		            <p><?php echo axil_kses_intermediate( $settings['axil_sub_team_section_title'] );?></p>
		        <?php  } ?>
    		</div>
        <?php } ?> 
        <div class="row">
        <?php if ( $query->have_posts() ) :?>
		<?php while ( $query->have_posts() ) : $query->the_post();?>
		<?php
			$id             = get_the_id();
			$designation    = get_post_meta( $id, "team_designation", true );					
			$department     = get_post_meta( $id, "team_department", true ); 
			?>  
           <div class="<?php echo esc_attr( $col_class );?>">
				 <div class="team-grid">
					<?php 
					if ( has_post_thumbnail() ){ ?>
						<div class="thumbnail"> 
							<a href="<?php the_permalink();?>"><?php  the_post_thumbnail( $thumb_size );?></a> 
						</div>
					<?php } ?>
                    <div class="content">  
                        <h4 class="title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
                        <?php if ( $designation && $settings['designation_display']  == 'yes' ): ?>
            				<div class="designation"><?php echo esc_html( $designation );?></div>	
            			<?php endif; ?>
            			<?php //if ( $department && $settings['department_display']  == 'yes' ): ?>
            				<div class="designation"><?php echo esc_html( $department );?></div>	
            			<?php //endif; ?>

            		<?php if ($settings['social_display']  == 'yes'): ?>
					<?php 
						$rows = get_field('team_social_icons_field_5e4b96f6dc7f8');
						if( $rows ) {
						    echo '<ul class="list-unstyled social-icon">';
						    foreach( $rows as $row ) {

						    echo '<li><a href="'. $row['team_enter_social_icon_link'] .' ">'. $row['team_enter_social_icon_markup'] .'</a></li>';
						       
						    }
						    echo '</ul>';
						} ?>
					<?php endif ?>	 
                    </div>
                </div>
			</div> 
        <?php endwhile;?>
		<?php endif;?>
	<?php Helper::wp_reset_temp_query( $temp );?> 
    </div>
    </div>
		<?php if( $settings['shape_style_on']  =='yes' ){ 
		$shape1 		=  $settings['shape1']['url'];
		$shape2 		=  $settings['shape2']['url'];
		$shape3 		=  $settings['shape3']['url'];
		?>
	    <ul class="list-unstyled shape-group-10">
	        <?php if( $shape1 ){ ?>             
	            <li class="shape shape-1"><img src="<?php echo esc_url( $shape1 );?>" alt="<?php echo Helper::axil_get_image_alt2( $settings['shape1']['id'] );?>"></li>
	        <?php } ?> 
	        <?php if( $shape2 ){ ?>   
	            <li class="shape shape-2"><img src="<?php echo esc_url( $shape2 );?>" alt="<?php echo Helper::axil_get_image_alt2( $settings['shape2']['id'] );?>"></li>
	        <?php } ?> 
	        <?php if( $shape3 ){ ?>   
	            <li class="shape shape-3"><img src="<?php echo esc_url( $shape3 );?>" alt="<?php echo Helper::axil_get_image_alt2( $settings['shape3']['id'] );?>"></li>
	        <?php } ?>            
	    </ul>
	 <?php } ?> 
 </div>