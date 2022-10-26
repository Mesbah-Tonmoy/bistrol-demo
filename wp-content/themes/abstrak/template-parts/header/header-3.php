<?php
/**
 * Template part for displaying header layout one
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package abstrak
 */

// Get Value
$axil_options = Helper::axil_get_options();
$axil_active_onepage = get_field( "axil_active_onepage");
if ( $axil_active_onepage == 'yes' ) { 
    $axil_nav_menu_args = Helper::axil_nav_menu_args_onepage();
}else{ 
    $axil_nav_menu_args = Helper::axil_nav_menu_args();
}
// Menu
$axil_nav_menu_args = Helper::axil_nav_menu_args();
// Get logo
$logo       = empty($axil_options['axil_light_head_logo']['url'] ) ? Helper::get_img( 'logo/logo.png' ) :$axil_options['axil_light_head_logo']['url'];
$darklogo   = empty($axil_options['axil_dark_header_logo']['url'] ) ? Helper::get_img( 'logo/logo-3.svg' ) :$axil_options['axil_dark_header_logo']['url'];
$stickylogo  = empty($axil_options['axil_sticky_header_logo']['url'] ) ? Helper::get_img( 'logo/logo-2.svg' ) :$axil_options['axil_sticky_header_logo']['url'];

$axil_enable_offcanvas  = $axil_options['axil_enable_offcanvas'];
$axil_enable_social  = $axil_options['axil_enable_menu_social'];

$axil_button_layout = Helper::axil_header_button_layout();


$shopping_cart           = $axil_button_layout['shopping_cart'];
$axil_enable_offcanvas   = $axil_button_layout['offcanvas_button'];
$header_button          = $axil_button_layout['header_button'];
$button_url             = $axil_button_layout['header_button_url'];


?>    

<header class="header axil-header header-style-3">
    <div id="axil-sticky-placeholder"></div>
    <div class="axil-mainmenu">
        <div class="container">
            <div class="header-navbar">
                <div class="header-logo"> 
                    <?php if (isset($axil_options['axil_logo_type'])): ?>
                        <a href="<?php echo esc_url(home_url('/')); ?>"
                           title="<?php echo esc_attr(get_bloginfo('name')); ?>" rel="<?php echo esc_attr__( 'home', 'abstrak' ); ?>">
                            <?php if ('image' == $axil_options['axil_logo_type']): ?>
                                  <?php if($axil_options['axil_light_head_logo']){ ?>
                                    <img class="light-version-logo" src="<?php echo esc_url( $logo ); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
                                <?php } ?>       
                                <?php if($axil_options['axil_dark_header_logo']){ ?>                      
                                    <img class="dark-version-logo" src="<?php echo esc_url( $darklogo ); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
                                <?php } ?>  
                                <?php if($axil_options['axil_sticky_header_logo']){ ?>
                                    <img class="sticky-logo" src="<?php echo esc_url( $stickylogo ); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
                                <?php } ?> 
                                                 
                            <?php else: ?>
                                <?php if ('text' == $axil_options['axil_logo_type']): ?>
                                    <?php echo esc_html($axil_options['axil_logo_text']); ?>
                                <?php endif ?>
                            <?php endif ?>

                        </a>
                    <?php else: ?>
                        <h3>
                            <a href="<?php echo esc_url(home_url('/')); ?>"
                               title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="<?php echo esc_attr__( 'home', 'abstrak' ); ?>">
                                <?php if (isset($axil_options['axil_logo_text']) ? $axil_options['axil_logo_text'] : '') {
                                    echo esc_html($axil_options['axil_logo_text']);
                                } else {
                                    bloginfo('name');
                                }
                                ?>
                            </a>
                        </h3>
                        <?php $description = get_bloginfo('description', 'display');
                        if ($description || is_customize_preview()) { ?>
                            <p class="site-description"><?php echo esc_html($description); ?> </p>
                        <?php } ?>
                    <?php endif ?>
                </div>
                <div class="header-action">
                    <ul class="list-unstyled"> 
                      
                        
                    <?PHP if ( "0" !== $axil_enable_social):?>  
                    <li class="header-social-link">
                            <?php if (!empty( $axil_options['axil_social_icons'] ) ) { ?>
                                <ul class="social-icon-list list-unstyled">
                           <?php
                                    foreach ($axil_options['axil_social_icons'] as $key => $value) {
                                        if ($value != '') {
                                            echo '<li><a class="' . esc_html($key) . ' social-icon" href="' . esc_url($value) . '"  target="_blank"><i class="fab fa-' . esc_html($key) . '"></i></a></li>';
                                        }
                                    }
                                 ?>
                                  </ul>  
                            <?php } ?>    
                            </li>
                        <?php endif ?>
                          <?php if ("no" !== $header_button && "0" !== $header_button):?>
                            <li class="header-btn">
                                <a href="<?php echo esc_url( $button_url ); ?>" class="axil-btn btn-fill-primary"><?php echo esc_html($axil_options['button_txt']); ?> </a>
                            </li>
                        <?php endif; ?>
                        <?php if ("no" !== $shopping_cart && "0" !== $shopping_cart):?>
                        <li>        
                            <?php global $woocommerce;
                            $minicart_icon = isset($axil_options['minicart_icon']) ? $axil_options['minicart_icon'] : false;
                            ?>
                            <?php if (class_exists('woocommerce') && $minicart_icon): ?>
                                <div class="ax-search-area">
                                    <a href="<?php echo wc_get_cart_url(); ?>"><span class="mini-cart"><i class="far fa-shopping-cart"></i><span
                                                class="aw-cart-count"><?php echo esc_html($woocommerce->cart->cart_contents_count); ?></span></span></a>
                                </div>
                            <?php endif; ?>
                        </li>
                          <?php endif; ?>

                        <?php if ("no" !== $axil_enable_offcanvas && "0" !== $axil_enable_offcanvas):?>
                            <li class="sidemenu-btn">
                            <button class="btn-wrap" data-bs-toggle="offcanvas" data-bs-target="#offcanvasMenuRight">
                                <span></span>
                                <span></span>
                                <span></span>
                            </button>
                        </li>
                        <?php endif ?> 

                        <?php  if (isset($axil_options['show_ld_switcher_form_user_end'])) {
                        if ($axil_options['show_ld_switcher_form_user_end'] === 'on' || $axil_options['show_ld_switcher_form_user_end'] == 1) {
                            ?> 
 
                        <li class="my_switcher d-block d-lg-none">
                            <ul>
                                <li title="Light Mode">
                                    <a href="javascript:void(0)" class="setColor light" data-theme="light">
                                        <i class="fal fa-lightbulb-on"></i>
                                    </a>
                                </li>
                                <li title="Dark Mode">
                                    <a href="javascript:void(0)" class="setColor dark" data-theme="dark">
                                        <i class="fas fa-moon"></i>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <?php  }
                        } 
                    ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>
