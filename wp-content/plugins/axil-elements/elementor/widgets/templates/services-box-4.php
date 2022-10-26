<?php
/**
 * @author  AxilTheme
 * @since   1.0
 * @version 1.0
 */

namespace axiltheme\abstrak_elements;
use Elementor\Group_Control_Image_Size;
use Elementor\Icons_Manager;

$attr = $btn = '';

if ( !empty( $settings['url']['url'] ) ) {
    $attr  = 'href="' . $settings['url']['url'] . '"';
    $attr .= !empty( $settings['url']['is_external'] ) ? ' target="_blank"' : '';
    $attr .= !empty( $settings['url']['nofollow'] ) ? ' rel="nofollow"' : '';
}
if ( $settings['url']['url'] ) {
    $btn = '<a class="more-btn" ' . $attr . '>'.$settings['detail_txt'] .'</a>';
}
$allowed_tags = wp_kses_allowed_html( 'post' );
$active =  $settings['recommended_on'] == 'yes' ? 'active' : 'no-active'; 

if ( $settings['url']['url'] ) {
    $title = '<h5 class="title"><a class="title-more-btn" ' . $attr . '>'.$settings['title'] .'</a></h5>';
}else{
    $title = '<h5 class="title">'.$settings['title'] .'</h5>';
}
?>

<div class="services-grid service-style-4  <?php echo esc_attr( $active );?>">
    <?php if ( $settings['icontype'] == 'image' ): ?>
        <div class="thumbnail">
            <?php echo Group_Control_Image_Size::get_attachment_image_html( $settings, 'image_size', 'image' );?> 
        </div>
    <?php else: ?>
        <div class="thumbnail">
            <?php Icons_Manager::render_icon( $settings['icon'] ); ?>
        </div>
    <?php endif; ?>  
    <div class="content">
        <?php echo wp_kses( $title, $allowed_tags ); ?> 
        <?php if ( $settings['subtitle'] ): ?>
            <p class="item-subtitle"><?php echo wp_kses_post( $settings['subtitle'] );?></p>
        <?php endif; ?>

        <?php echo wp_kses( $btn, $allowed_tags ); ?>
    </div>
</div>
