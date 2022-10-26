<?php
/**
 * Template part for displaying footer layout one
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package abstrak
 */

$axil_options = Helper::axil_get_options();
$axil_footer_bottom_menu_args = Helper::axil_footer_bottom_menu_args();
$lineclass = (is_active_sidebar('footer-1') || is_active_sidebar('footer-2') || is_active_sidebar('footer-3') || is_active_sidebar('footer-4') ) ? "has-footer-elementor" : "has-no-footer-elementor";
$allowed_tags = wp_kses_allowed_html( 'post' );
$footer_top_layout              = Helper::axil_footer_top_layout();
$footer_top_area                = $footer_top_layout['footer_top_area'];

if ( "no" !== $footer_top_area && "0" !== $footer_top_area && !is_404()) { 
    $footer_top_on = "  no-padding" ;
}else{
   $footer_top_on = " has-no-footer-top"; 
}
?>
<footer class="footer-area footer-dark <?php echo esc_attr( $footer_top_on );?>">
    <div class="container">
        <div class="footer-bottom" data-sal="slide-up" data-sal-duration="500" data-sal-delay="100">
            <div class="row">
                <?php if(!empty($axil_options['axil_copyright_contact'])){ ?>             
                    <div class="col-md-6">
                        <div class="footer-copyright">
                            <span class="copyright-text"><?php echo wp_kses( $axil_options['axil_copyright_contact'], $allowed_tags ); ?></span>
                        </div>
                    </div>
                <?php } ?>
                <div class="col-md-6">
                    <?php if( $axil_options['axil_footer_footerbottom'] ){ ?>
                    <div class="footer-bottom-link">                            
                        <?php if (has_nav_menu('footerbottom')) { ?>
                            <?php wp_nav_menu($axil_footer_bottom_menu_args); ?>
                        <?php } ?>
                    </div>
                <?php } ?>
                </div>
            </div>
        </div>
    </div>
</footer>