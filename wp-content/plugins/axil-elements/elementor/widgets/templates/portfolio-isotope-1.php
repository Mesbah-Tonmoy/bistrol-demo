<?php
/**
 * @author  AxilTheme
 * @since   1.0
 * @version 1.0
 */

namespace axiltheme\abstrak_elements;

$thumb_size_full  	= "axil-project-lg";
$args = array(
	'post_type'         => "axil-projects",
	'posts_per_page' 	=> $settings['number'],
	'orderby'        	=> $settings['orderby'],
);

if ( !empty( $settings['category_list'] ) ) {
	$args['tax_query'] = array(
		array(
			'taxonomy' => "axil-projects-category",
			'field' => 'term_id',
			'terms' => $settings['category_list'],
		)
	);
}

switch ( $settings['orderby'] ) {
	case 'title':
	case 'menu_order':
	$args['order'] = 'ASC';
	break;
}
$posts = get_posts( $args );
$uniqueid = time() . rand( 1, 99 );
$portfolio = array();
$cats    = array();
foreach ( $posts as $post ) {
	$cats_comma       = array();
	$img              = get_the_post_thumbnail_url( $post, $thumb_size );
	$imgfull          = get_the_post_thumbnail_url( $post, $thumb_size_full );
	$terms            = get_the_terms( $post, "axil_projects_category" );
	$terms            = $terms ? $terms : array();

	$terms_info       = '';
	$terms_comma_html = '';
	if ( !$terms ) {
		continue;
	}	
	foreach ( $terms as $term ) {
		$terms_info  .= " {$uniqueid}-{$term->slug}";		
		$cats_comma[] = $term->name;
		if ( !isset( $cats[$term->slug] ) ) {
			$cats[$term->slug] = $term->name;
		}		
		$terms_link  = get_term_link($term);
	}
	$portfolios[] = array(
		'id'       		 	 => $post->ID,
		'imgfull'       	 => $imgfull,
		'img'       		 => $img,
		'title'     		 => $post->post_title,
		'url'       		 => get_the_permalink( $post ),		
		'cats'       		 => $terms_info,
		'cats_comma' 		 => implode(", ", $cats_comma ),
		'cats_link' 		 => $terms_link,
	);
}


$col_class = "project col-lg-{$settings['col_lg']} col-md-{$settings['col_md']} col-sm-{$settings['col_sm']}";

?>

<div class="isotope-recent-area">     
		<?php if( $settings['seation_title_on'] =='yes' ){ ?>    

			<div class="section-heading heading-<?php echo wp_kses_post( $settings['heading_color'] );?>-left heading-<?php echo wp_kses_post( $settings['title_align'] );?>">
			
				<?php  if($settings['sub_title_before']){ ?>
					<span class="subtitle"><?php echo wp_kses_post( $settings['sub_title_before'] );?></span>
				<?php  } ?> 
				<?php  if($settings['title']){ ?>
					<<?php echo esc_html( $settings['sec_title_tag'] );?> class="title"><?php echo wp_kses_post( $settings['title'] );?></<?php echo esc_html( $settings['sec_title_tag'] );?>> 
				<?php  } ?> 
				<?php  if($settings['sub_title']){ ?>
					<p><?php echo wp_kses_post( $settings['sub_title'] );?></p>
				<?php  } ?>
			</div>
		<?php } ?> 
     	<div class="axil-isotope-wrapper">
			<?php if($settings['filter'] == 'yes'){ ?>		
				<div class="isotope-button isotope-project-btn">
				<button data-filter="*" class="is-checked"><span class="filter-text"><?php esc_html_e( 'All Works', 'abc-elements' );?></span></button>					
					<?php foreach ( $cats as $key => $value): ?>
						<?php $cat_filter = "{$uniqueid}-{$key}";?>
					<button data-filter=".<?php echo esc_attr( $cat_filter );?>"><span class="filter-text"><?php echo esc_html( $value );?></span></button>
					<?php endforeach; ?>
				</div> 
			<?php  } ?>			
                <div class="row row-35 isotope-list">                    
		         <?php foreach ( $portfolios as $portfolio ): ?>
					<div class="<?php echo esc_attr( $col_class . $portfolio['cats'] );?>">
						<div class="project-grid">
						    <div class="thumbnail">
						        <img src="<?php echo esc_url( $portfolio['img'] );?>" alt="<?php echo esc_html( $portfolio['title'] );?>">
						    </div>
						    <div class="content">
						        <span class="subtitle"><?php echo axil_Elements_Helper::axil_get_projects_cat($portfolio['id']); ?></span>
						        <h4 class="title"><a href="<?php echo esc_url($portfolio['url']);?>"><?php echo esc_html( $portfolio['title'] );?></a></h4>				        
						    </div>
						</div>				
					</div>
				<?php endforeach;?>                 
                </div>
            </div>          
		<?php
			$shape1 =  $settings['shape_7_1']['url'];
			$shape2 =  $settings['shape_7_2']['url'];
			$shape3 =  $settings['shape_7_3']['url'];
		?>
		<?php if($settings['shape_style_on']  == 'yes' ){ ?>
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