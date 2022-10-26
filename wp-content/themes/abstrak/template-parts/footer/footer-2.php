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
 <footer class="<?php echo esc_attr( $lineclass );?> footer-area <?php echo esc_attr( $footer_top_on );?>">
    <div class="container">
         <?php if(!empty($axil_options['axil_footer_social_enable']) ){ ?>    
            <div class="footer-top">
                <div class="footer-social-link">
                    <ul class="list-unstyled">
                    <?php
                        foreach ($axil_options['axil_social_icons'] as $key => $value) {
                            if ($value != '') {
                                echo '<li><a class="' . esc_attr($key) . ' social-icon" href="' . esc_url($value) . '" title="' . esc_attr(ucwords(esc_attr($key))) . '" target="_blank"><i class="fab fa-' . esc_attr($key) . '"></i></a></li>';
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>
         <?php } ?> 
        <?php if(is_active_sidebar('footer-1') || is_active_sidebar('footer-2') || is_active_sidebar('footer-3') || is_active_sidebar('footer-4')){ ?>
        <div class="footer-main">
            <div class="row">
                 <?php if (is_active_sidebar('footer-1')) { ?>
                        <!-- Start Single Widget -->
                        <div class="col-xl-6 col-lg-4">
                            <div class="footer-widget border-end">
                                <?php dynamic_sidebar('footer-1'); ?>
                            </div>
                        </div><!-- End Single Widget -->
                    <?php } ?>

                <div class="col-xl-6 col-lg-8">

                    <div class="row">                        
                        <?php if (is_active_sidebar('footer-2')) { ?>
                            <!-- Start Single Widget -->
                            <div class="col-xl-6 col-lg-4 col-md-4">
                                <?php dynamic_sidebar('footer-2'); ?>                            
                            </div>
                        <?php } ?> 

                        <?php if (is_active_sidebar('footer-3')) { ?>
                            <!-- Start Single Widget -->
                            <div class="col-xl-3 col-lg-4 col-md-4">
                                <?php dynamic_sidebar('footer-3'); ?>                            
                            </div>
                        <?php } ?>  
                        <?php if (is_active_sidebar('footer-4')) { ?>
                            <!-- Start Single Widget -->
                            <div class="col-xl-3 col-lg-4 col-md-4">
                                <?php dynamic_sidebar('footer-4'); ?>                            
                            </div>
                        <?php } ?>

                    </div>
                    
                </div>
            </div>
        </div>
        <?php } ?>

        <div class="footer-bottom">
            <div class="row">
                 <?php if(!empty($axil_options['axil_copyright_contact'])){ ?>             
                <div class="col-md-6">
                    <div class="footer-copyright">
                        <span class="copyright-text"><?php echo wp_kses( $axil_options['axil_copyright_contact'], $allowed_tags ); ?></span>
                    </div>
                </div>
                <?php } ?>

                <?php if(!empty($axil_options['axil_footer_footerbottom'])){ ?>
                <div class="col-md-6">
                    <div class="footer-bottom-link">

                     <?php if (has_nav_menu('footerbottom')) { ?>
                            <?php wp_nav_menu($axil_footer_bottom_menu_args); ?>
                        <?php } ?> 

                    </div>
                </div>
                    <?php } ?>
            </div>
        </div>
    </div>
</footer>

<!-- End Footer Area  -->


