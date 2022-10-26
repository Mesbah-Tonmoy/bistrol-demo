<?php
/**
 * @author  axiltheme
 * @since   1.0
 * @version 1.0
 * @package abstrak
 */
trait MenuAreaTrait
{



    public static function axil_nav_menu_args_onepage(){     
            $pagemenu = false;
                if ( ( is_single() || is_page() ) ) {
                $haspagemenu = get_post_meta( get_the_id(), "axil_select_nav_menu", true );
                if ( !empty( $haspagemenu ) ) {
                    $menuid = $haspagemenu;
                } else {
                    $menuid = '';
                }   

                if ( !empty( $menuid ) && $menuid != 'default' ) {
                    $pagemenu = $menuid;
                }
            }
        if ( $pagemenu ) {
                $nav_menu_args = array( 
                    'menu'            => $pagemenu,
                    'theme_location' => 'primary',
                    'container' => 'nav',
                    'container_class' => 'mainmenu-nav',
                    'container_id' => 'onepagemenu',
                    'menu_class' => 'mainmenu nav',
                    'menu_id' => 'onepagemenu-axil',
                    'fallback_cb' => false,
                    'walker' => new AxilNavWalker(),
                );
            }
            else {
                $nav_menu_args = array(
                    'theme_location' => 'primary',
                    'container' => 'nav',
                    'container_class' => 'mainmenu-nav navbar',
                    'container_id' => 'onepagemenu',
                    'menu_class' => 'mainmenu nav',
                    'menu_id' => 'onepagemenu-axil',
                    'fallback_cb'     => false,
                    'walker'          => new AxilNavWalker(),                
                );
            }

            return $nav_menu_args;
        }

    public static function axil_nav_menu_args(){     
            $pagemenu = false;
                if ( ( is_single() || is_page() ) ) {
                $haspagemenu = get_post_meta( get_the_id(), "axil_select_nav_menu", true );
                if ( !empty( $haspagemenu ) ) {
                    $menuid = $haspagemenu;
                } else {
                    $menuid = '';
                }   

                if ( !empty( $menuid ) && $menuid != 'default' ) {
                    $pagemenu = $menuid;
                }
            }
        if ( $pagemenu ) {
                $nav_menu_args = array( 
                    'menu'            => $pagemenu,
                    'theme_location' => 'primary',
                    'container' => 'nav',
                    'container_class' => 'mainmenu-nav',
                    'container_id' => '',
                    'menu_class' => 'mainmenu',
                    'menu_id' => 'onepagemenu',
                    'fallback_cb' => false,
                    'walker' => new AxilNavWalker(),
                );
            }
            else {
                $nav_menu_args = array(
                    'theme_location' => 'primary',
                    'container' => 'nav',
                    'container_class' => 'mainmenu-nav',
                    'container_id' => 'sideNav',
                    'menu_class' => 'mainmenu',
                    'menu_id' => 'onepagemenu',
                    'fallback_cb'     => false,
                    'walker'          => new AxilNavWalker(),                
                );
            }

            return $nav_menu_args;
        }

    public static function axil_nav_menu_args2(){     
            $pagemenu = false;
                if ( ( is_single() || is_page() ) ) {
                $haspagemenu = get_post_meta( get_the_id(), "axil_select_nav_menu", true );
                if ( !empty( $haspagemenu ) ) {
                    $menuid = $haspagemenu;
                } else {
                    $menuid = '';
                }   

                if ( !empty( $menuid ) && $menuid != 'default' ) {
                    $pagemenu = $menuid;
                }
            }
        if ( $pagemenu ) {
                $nav_menu_args = array( 
                    'menu'            => $pagemenu,
                    'theme_location' => 'primary',
                    'container' => 'div',
                    'container_class' => '',
                    'container_id' => '',
                    'menu_class' => 'main-navigation list-unstyled',
                    'menu_id' => 'onepagemenu',
                    'fallback_cb' => false,
                    'walker' => new AxilNavWalker(),
                );
            }
            else {
                $nav_menu_args = array(
                    'theme_location'    => 'primary',
                    'container'         => 'div',
                    'container_class'   => '',
                    'container_id'      => '',
                    'menu_class'        => 'main-navigation list-unstyled',
                    'menu_id'           => 'onepagemenu',
                    'fallback_cb'     => false,
                    'walker'          => new AxilNavWalker(),                
                );
            }

            return $nav_menu_args;
        }

    // Nav Menu Call
    public static function abstrak_nav_menu_args()
    {
        $axil_nav_menu_args = array(
            'theme_location' => 'primary',
            'container' => 'nav',
            'container_class' => 'mainmenu-nav',
            'container_id' => '',
            'menu_class' => 'mainmenu',
            'menu_id' => 'main-menu',
            'fallback_cb' => false,
            'walker' => new AxilNavWalker(),
        );

        return $axil_nav_menu_args;
    } 
    
    // Mobile Menu
    public static function axil_mobile_menu_args()
    {
        $nav_menu_args = array(
            'theme_location' => 'primary',
            'container' => 'nav',
            'container_class' => 'menu-item',
            'menu_class' => 'mainmenu-item',
            'menu_id' => 'mobile-menu',
            'fallback_cb' => false,
            'walker' => new AxilMobileWalker(),
        );

        return $nav_menu_args;
    }

    // Off-Canvas Menu args
    public static function axil_offcanvas_menu_args()
    {
        $axil_offcanvas_menu_args = array(
            'theme_location' => 'offcanvas',
            'container' => 'div',
            'menu_class' => "main-navigation list-unstyled",
            'fallback_cb' => false
        );

        return $axil_offcanvas_menu_args;
    }

    // Footer bottom Menu args
    public static function axil_footer_bottom_menu_args()
    {
        $axil_footer_bottom_menu_args = array(
            'theme_location' => 'footerbottom',
            'container' => '',
            'menu_class' => "quick-link",
            'depth' => 1,
            'fallback_cb' => false
        );

        return $axil_footer_bottom_menu_args;
    }

}