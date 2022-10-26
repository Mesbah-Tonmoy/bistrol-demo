<?php
/**
 * Template part for displaying header layout one
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package abstrak
 */
$axil_options       = Helper::axil_get_options();
$header_layout      = Helper::axil_header_layout();
$axil_active_onepage = get_field( "axil_active_onepage");
if ( $axil_active_onepage == 'yes' ) { 
    $axil_nav_menu_args = Helper::axil_nav_menu_args_onepage();
}else{ 
    $axil_nav_menu_args = Helper::axil_nav_menu_args();
}

$header_sticky      = $header_layout['header_sticky'];
$header_sticky      = ("1" !== $header_sticky && "0" !== $header_sticky) ? " header-sticky " : "";
$axil_nav_menu_args = Helper::axil_nav_menu_args();
$logo               = empty($axil_options['axil_light_head_logo2']['url'] ) ? Helper::get_img( 'logo/logo.png' ) :$axil_options['axil_light_head_logo2']['url'];
$darklogo           = empty($axil_options['axil_dark_header_logo']['url'] ) ? Helper::get_img( 'logo/logo-3.svg' ) :$axil_options['axil_dark_header_logo']['url'];
$stickylogo         = empty($axil_options['axil_sticky_header_logo']['url'] ) ? Helper::get_img( 'logo/logo-2.svg' ) :$axil_options['axil_sticky_header_logo']['url'];

$axil_button_layout = Helper::axil_header_button_layout();


$shopping_cart           = $axil_button_layout['shopping_cart'];
$axil_enable_offcanvas   = $axil_button_layout['offcanvas_button'];
$header_button          = $axil_button_layout['header_button'];
$button_url             = $axil_button_layout['header_button_url'];

?>
<header class="header axil-header header-style-2">
 <div id="axil-sticky-placeholder"></div>
    <div class="axil-mainmenu">
        <div class="container-fluid">
            <div class="header-navbar">
                <div class="header-logo">
                  <?php if (isset($axil_options['axil_logo_type'])): ?>
                            <a href="<?php echo esc_url(home_url('/')); ?>"
                               title="<?php echo esc_attr(get_bloginfo('name')); ?>" rel="<?php echo esc_attr__( 'home', 'abstrak' ); ?>">
                                <?php if ('image' == $axil_options['axil_logo_type']): ?>
                                      <?php if($axil_options['axil_light_head_logo2']){ ?>
                                    <img class="light-version-logo" src="<?php echo esc_url( $logo ); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
                                <?php } ?>       
                                <?php if($axil_options['axil_dark_header_logo']){ ?>                      
                                    <img class="dark-version-logo" src="<?php echo esc_url( $darklogo ); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
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
                <div class="header-main-nav" id="mobilemenu-popup">
                 <div class="d-block d-lg-none">
                    <div class="mobile-nav-header">
                        <div class="mobile-nav-logo">
                            <a href="<?php echo esc_url(home_url('/')); ?>">
                              <img class="light-mode" src="<?php echo esc_url( $stickylogo ); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
                              <img class="dark-mode" src="<?php echo esc_url( $darklogo ); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
                            </a>
                        </div>
                        <button class="mobile-menu-close" data-bs-dismiss="offcanvas"><i class="fas fa-times"></i></button>
                    </div>
                </div>
                    <?php if (has_nav_menu('primary')) {
                         wp_nav_menu($axil_nav_menu_args);
                    } ?>
                </div>
                <div class="header-action">
                    <ul class="list-unstyled">
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
                                    <a href="<?php echo wc_get_cart_url(); ?>"><span class="mini-cart"><i class="far fa-shopping-cart"></i><span class="aw-cart-count"><?php echo esc_html($woocommerce->cart->cart_contents_count); ?></span></span></a>
                                </div>
                            <?php endif; ?>
                        </li>
                         <?php endif; ?>
                         <?php if ("no" !== $axil_enable_offcanvas && "0" !== $axil_enable_offcanvas):?>
 
                            <li class="sidemenu-btn d-lg-block d-none">
                                <button class="btn-wrap btn-dark" data-bs-toggle="offcanvas" data-bs-target="#offcanvasMenuRight">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </button>
                            </li>
                        <?php endif ?>

                        <li class="mobile-menu-btn sidemenu-btn d-lg-none d-block">
                            <button class="btn-wrap btn-dark" data-bs-toggle="offcanvas" data-bs-target="#mobilemenu-popup">
                                <span></span>
                                <span></span>
                                <span></span>
                            </button>
                        </li>
                        
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