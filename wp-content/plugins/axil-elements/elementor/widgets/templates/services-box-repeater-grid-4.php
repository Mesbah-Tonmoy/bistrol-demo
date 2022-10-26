<?php
/**
 * @author  AxilTheme
 * @since   1.0
 * @version 1.0
 */
namespace axiltheme\abstrak_elements;
use Elementor\Group_Control_Image_Size;
use Elementor\Icons_Manager;


$col_class  = "col-lg-{$settings['col_lg']} col-md-{$settings['col_md']} col-sm-{$settings['col_sm']}";
$thumb_size = "full";
$bgstyle    = $settings['bgstyle'];

$i  = 1;
$gridstyle  = ( $settings['bgstyle'] == 'dark') ? 'service-style-1' : 'service-style-2' ;
$gridstyle2 = ( $settings['bgstyle'] == 'dark') ? 'light' : 'dark' ;
?>

<div class="section section-padding">
    <div class="container"> 
      <?php if( $settings['seation_services_grid_title_on'] =='yes' ){ ?>  
             <div class="section-heading heading-dark-<?php echo esc_attr( $settings['axil_services_grid_align'] );?>">            
                 <?php  if( $settings['axil_services_grid_title_before']){ ?>
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
        
        <div class="row"> 
            <?php foreach ($settings['services_list'] as $services) { 
 
                    $top_active =   '';
                    $i++;
                    if( $i==1 ){
                        
                        $top_active =   'active ';
                    }

                    $attr = $btn = '';  
                    if ( !empty( $services['url']['url'] ) ) {
                        $attr  = 'href="' . $services['url']['url'] . '"';
                        $attr .= !empty( $services['url']['is_external'] ) ? ' target="_blank"' : '';
                        $attr .= !empty( $services['url']['nofollow'] ) ? ' rel="nofollow"' : '';
                    }
                    if ( $services['url']['url'] ) {
                    $btn = '<a class="more-btn" ' . $attr . '>'.$services['detail_txt'] .'</a>';
                    }
                    $allowed_tags = wp_kses_allowed_html( 'post' );
                    $active =  $services['recommended_on'] == 'yes' ? 'active' : 'no-active'; 

                    if ( $services['url']['url'] ) {
                        $title = '<h5 class="title"><a class="title-more-btn" ' . $attr . '>'.$services['title'] .'</a></h5>';
                    }else{
                        $title = '<h5 class="title">'.$services['title'] .'</h5>';
                    }
 
                ?>  
                    <div class="<?php echo esc_attr($col_class); ?> elementor-repeater-item-<?php echo esc_attr( $services['_id'] );?>" data-sal="slide-up" data-sal-duration="800" data-sal-delay="100"> 
   
                        <div class="services-grid service-style-4  <?php  echo esc_attr( $active );?>">
                            <?php if ( $services['icontype'] == 'image' ): ?>
                                <div class="thumbnail">
                                    <?php echo Group_Control_Image_Size::get_attachment_image_html( $services, 'image_size', 'image' );?> 
                                </div>
                            <?php else: ?>
                                <div class="thumbnail-icon">
                                    <?php Icons_Manager::render_icon( $services['icon'] ); ?>
                                </div>
                            <?php endif; ?>  
                            <div class="content">
                                <?php echo wp_kses( $title, $allowed_tags ); ?> 
                                <?php if ( $services['subtitle'] ): ?>
                                    <p class="item-subtitle"><?php echo wp_kses_post( $services['subtitle'] );?></p>
                                <?php endif; ?>

                                <?php echo wp_kses( $btn, $allowed_tags ); ?>
                            </div>
                    </div>  
                </div>  
                <?php } ?>   
            </div> 
            <?php   
                $attr = $btn = ''; 
                if ( !empty( $settings['furl']['url'] ) ) {
                    $attr  = 'href="' . $settings['furl']['url'] . '"';
                    $attr .= !empty( $settings['furl']['is_external'] ) ? ' target="_blank"' : '';
                    $attr .= !empty( $settings['furl']['nofollow'] ) ? ' rel="nofollow"' : '';
                }
                if ( $settings['furl']['url'] ) {
                    $btn = ' <div class="btn-wrp-new has-icon text-center" data-sal="slide-up" data-sal-duration="800" data-sal-delay="100"> <a class="btn-large axil-btn  ' . $settings['btn_type'] . '" ' . $attr . '>'.$settings['furltext'] .'</div></a>';
                } ?>
                 <?php echo wp_kses( $btn, $allowed_tags ); ?>
                 
            </div>
       <?php  

       if( $settings['shape_style_on2new']  =='yes' ){ 
        $shape1 =  $settings['shape_7_1new']['url'];
        $shape2 =  $settings['shape_7_2new']['url'];
         
        ?>
        <ul class="shape-group-7 shape-group-7new list-unstyled">
            <?php if( $shape1 ){ ?>     
                <li class="shape shape-1"><img src="<?php echo esc_url( $shape1 );?>" alt="<?php echo axil_Elements_Helper::axil_get_image_alt( $settings['shape_7_1']['id'] );?>"></li>
            <?php } ?> 
             
            <?php if( $shape2 ){ ?>     
                <li class="shape shape-3"><img src="<?php echo esc_url( $shape2 );?>" alt="<?php echo axil_Elements_Helper::axil_get_image_alt( $settings['shape_7_2']['id'] );?>"></li>
            <?php } ?> 
            
        </ul> 
    <?php } ?>       
</div> 