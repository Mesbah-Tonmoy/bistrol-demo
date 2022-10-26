<?php
/**
 * Contains methods for customizing the theme customization screen.
 *
 * @link http://codex.wordpress.org/Theme_Customization_API
 * @since axil 1.0
 */
/**
 * axil_custom_customize_register
 */
if (!function_exists('axil_custom_customize_register')) {
    function axil_custom_customize_register()
    {
        /**
         * Custom Separator
         */
        class abstrak_Separator_Custom_control extends WP_Customize_Control
        {
            public $type = 'separator';

            public function render_content()
            {
                ?>
                <p>
                <hr></p>
                <?php
            }
        }
    }

    add_action('customize_register', 'axil_custom_customize_register');
}

/**
 * Start axil_Customize
 */
class axil_Customize
{
    /**
     * This hooks into 'customize_register' (available as of WP 3.4) and allows
     * you to add new sections and controls to the Theme Customize screen.
     *
     * Note: To enable instant preview, we have to actually write a bit of custom
     * javascript. See axil_live_preview() for more.
     *
     * @see add_action('customize_register',$func)
     * @param \WP_Customize_Manager $wp_customize
     * @link http://ottopress.com/2012/how-to-leverage-the-theme-customizer-in-your-own-themes/
     * @since axil 1.0
     */
    public static function register($wp_customize)
    {

        //1. Define a new section (if desired) to the Theme Customizer
        $wp_customize->add_panel('axil_colors_options',
            array(
                'title' => esc_html__('Abstrak Colors Options', 'abstrak'), //Visible title of section
                'priority' => 35, //Determines what order this appears in
                'capability' => 'edit_theme_options', //Capability needed to tweak
                'description' => esc_html__('Allows you to customize some example settings for axil.', 'abstrak'), //Descriptive tooltip
            )
        );

        $wp_customize->add_section('axil_colors_main_options',
            array(
                'title' => esc_html__('General', 'abstrak'), //Visible title of section
                'priority' => 10, //Determines what order this appears in
                'capability' => 'edit_theme_options', //Capability needed to tweak
                'panel' => 'axil_colors_options',
            )
        );

        /*************************
         * Primary
         ************************/
        $wp_customize->add_setting('color_primary',
            array(
                'default' => '#5956E9',
                'type' => 'theme_mod',
                'capability' => 'edit_theme_options',
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_hex_color'
            )
        );
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'axil_color_primary',
            array(
                'label' => esc_html__('Primary Color', 'abstrak'),
                'settings' => 'color_primary',
                'priority' => 10,
                'section' => 'axil_colors_main_options',
            )
        ));

        /*************************
         * Secondary
         ************************/
        $wp_customize->add_setting('color_secondary',
            array(
                'default' => '#C75C6F',
                'type' => 'theme_mod',
                'capability' => 'edit_theme_options',
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_hex_color'
            )
        );
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'axil_color_secondary',
            array(
                'label' => esc_html__('Secondary Color', 'abstrak'),
                'settings' => 'color_secondary',
                'priority' => 10,
                'section' => 'axil_colors_main_options',
            )
        ));

        /*************************
         * Secondary Alt
         ************************/
        $wp_customize->add_setting('color_tertiary',
            array(
                'default' => '#FAB8C4',
                'type' => 'theme_mod',
                'capability' => 'edit_theme_options',
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_hex_color'
            )
        );
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'axil_color_tertiary',
            array(
                'label' => esc_html__('Accent Color', 'abstrak'),
                'settings' => 'color_tertiary',
                'priority' => 10,
                'section' => 'axil_colors_main_options',
            )
        ));

        /*************************
         * Secondary Alt
         ************************/
        $wp_customize->add_setting('color_tertiary2',
            array(
                'default' => '#FFDC60',
                'type' => 'theme_mod',
                'capability' => 'edit_theme_options',
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_hex_color'
            )
        );
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'axil_color_tertiary2',
            array(
                'label' => esc_html__('Accent Color 2', 'abstrak'),
                'settings' => 'color_tertiary2',
                'priority' => 10,
                'section' => 'axil_colors_main_options',
            )
        ));

      

        /**
         * Separator
         */
        $wp_customize->add_setting('axil_separator_heading_hover', array(
            'default' => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new abstrak_Separator_Custom_control($wp_customize, 'axil_separator_heading_hover', array(
            'settings' => 'axil_separator_heading_hover',
            'section' => 'axil_colors_main_options',
        )));
        // Heading Color
        $wp_customize->add_setting('color_heading',
            array(
                // 'default' => '#292930',
                'type' => 'theme_mod',
                'capability' => 'edit_theme_options',
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_hex_color'
            )
        );
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'axil_color_heading',
            array(
                'label' => esc_html__('Heading Color', 'abstrak'),
                'settings' => 'color_heading',
                'priority' => 10,
                'section' => 'axil_colors_main_options',
            )
        ));

        /**
         * Separator
         */
        $wp_customize->add_setting('axil_separator_body_color', array(
            'default' => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new abstrak_Separator_Custom_control($wp_customize, 'axil_separator_body_color', array(
            'settings' => 'axil_separator_body_color',
            'section' => 'axil_colors_main_options',
        )));

        // Body Color
        $wp_customize->add_setting('color_body',
            array(
                // 'default' => '#525260',
                'type' => 'theme_mod',
                'capability' => 'edit_theme_options',
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_hex_color'
            )
        );
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'axil_color_body',
            array(
                'label' => esc_html__('Body Color', 'abstrak'),
                'settings' => 'color_body',
                'priority' => 10,
                'section' => 'axil_colors_main_options',
            )
        ));




        /**
         * Separator
         */
        $wp_customize->add_setting('axil_separator_meta_color2', array(
            'default' => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new abstrak_Separator_Custom_control($wp_customize, 'axil_separator_meta_color2', array(
            'settings' => 'axil_separator_meta_color2',
            'section' => 'axil_colors_main_options',
        )));

        // Meta Color
        $wp_customize->add_setting('color_meta',
            array(
                // 'default' => '#999FAE',
                'type' => 'theme_mod',
                'capability' => 'edit_theme_options',
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_hex_color'
            )
        );
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'axil_color_meta',
            array(
                'label' => esc_html__('Meta Text Color', 'abstrak'),
                'settings' => 'color_meta',
                'priority' => 10,
                'section' => 'axil_colors_main_options',
            )
        ));
        // Meta Color
        $wp_customize->add_setting('link_color_meta',
            array(
                // 'default' => '#999FAE',
                'type' => 'theme_mod',
                'capability' => 'edit_theme_options',
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_hex_color'
            )
        );
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'axil_link_color_meta',
            array(
                'label' => esc_html__('Meta Link Color', 'abstrak'),
                'settings' => 'link_color_meta',
                'priority' => 10,
                'section' => 'axil_colors_main_options',
            )
        ));
        // Meta hover Color
        $wp_customize->add_setting('color_meta_hover',
            array(
                // 'default' => '#5956E9',
                'type' => 'theme_mod',
                'capability' => 'edit_theme_options',
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_hex_color'
            )
        );
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'axil_color_meta_hover',
            array(
                'label' => esc_html__('Meta Link Hover Color', 'abstrak'),
                'settings' => 'color_meta_hover',
                'priority' => 10,
                'section' => 'axil_colors_main_options',
            )
        ));

        /*************************
         * Header Color
         ************************/

        $wp_customize->add_section('axil_colors_header_options',
            array(
                'title' => esc_html__('Header', 'abstrak'), //Visible title of section
                'priority' => 10, //Determines what order this appears in
                'capability' => 'edit_theme_options', //Capability needed to tweak
                'panel' => 'axil_colors_options',
            )
        );
        // Link Color
        $wp_customize->add_setting('color_header_link_color',
            array(
                // 'default' => '#121213',
                'type' => 'theme_mod',
                'capability' => 'edit_theme_options',
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_hex_color'
            )
        );
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'axil_color_header_link_color',
            array(
                'label' => esc_html__('Navigation Link Color', 'abstrak'),
                'settings' => 'color_header_link_color',
                'priority' => 10,
                'section' => 'axil_colors_header_options',
            )
        ));
        // Link Hover Color
        $wp_customize->add_setting('color_header_link_hover_color',
            array(
                // 'default' => '#5956E9',
                'type' => 'theme_mod',
                'capability' => 'edit_theme_options',
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_hex_color'
            )
        );
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'axil_color_header_link_hover_color',
            array(
                'label' => esc_html__('Navigation Link Hover + Active Color', 'abstrak'),
                'settings' => 'color_header_link_hover_color',
                'priority' => 10,
                'section' => 'axil_colors_header_options',
            )
        ));
        // BG Color
        $wp_customize->add_setting('color_header_bg',
            array(
                // 'default' => '',
                'type' => 'theme_mod',
                'capability' => 'edit_theme_options',
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_hex_color'
            )
        );
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'axil_color_header_bg',
            array(
                'label' => esc_html__('Navigation Background Color', 'abstrak'),
                'settings' => 'color_header_bg',
                'priority' => 10,
                'section' => 'axil_colors_header_options',
            )
        ));
        // Border Color

        

        //  Footer
        $wp_customize->add_section('axil_colors_footer_options',
            array(
                'title' => esc_html__('Footer', 'abstrak'), //Visible title of section
                'priority' => 35, //Determines what order this appears in
                'capability' => 'edit_theme_options', //Capability needed to tweak
                'panel' => 'axil_colors_options',
            )
        );

        // Footer Heading Color
        $wp_customize->add_setting('color_footer_heading_color',
            array(
                // 'default' => '#292930',
                'type' => 'theme_mod',
                'capability' => 'edit_theme_options',
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_hex_color'
            )
        );
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'axil_color_footer_heading_color',
            array(
                'label' => esc_html__('Title Color', 'abstrak'),
                'settings' => 'color_footer_heading_color',
                'priority' => 10,
                'section' => 'axil_colors_footer_options',
            )
        ));

        // Text Color
        $wp_customize->add_setting('color_footer_body_color',
            array(
                // 'default' => '#6b7074',
                'type' => 'theme_mod',
                'capability' => 'edit_theme_options',
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_hex_color'
            )
        );
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'axil_color_footer_body_color',
            array(
                'label' => esc_html__('Text Color', 'abstrak'),
                'settings' => 'color_footer_body_color',
                'priority' => 10,
                'section' => 'axil_colors_footer_options',
            )
        ));

        // Link Color
        $wp_customize->add_setting('color_footer_link_color',
            array(
                // 'default' => '#6b7074',
                'type' => 'theme_mod',
                'capability' => 'edit_theme_options',
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_hex_color'
            )
        );
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'axil_color_footer_link_color',
            array(
                'label' => esc_html__('Link Color', 'abstrak'),
                'settings' => 'color_footer_link_color',
                'priority' => 10,
                'section' => 'axil_colors_footer_options',
            )
        ));

        // Link Hover Color
        $wp_customize->add_setting('color_footer_link_hover_color',
            array(
                // 'default' => '#5956E9',
                'type' => 'theme_mod',
                'capability' => 'edit_theme_options',
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_hex_color'
            )
        );
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'axil_color_footer_link_hover_color',
            array(
                'label' => esc_html__('Link Hover Color', 'abstrak'),
                'settings' => 'color_footer_link_hover_color',
                'priority' => 10,
                'section' => 'axil_colors_footer_options',
            )
        ));

        // Footer Bottom Border Top Color
        $wp_customize->add_setting('color_footer_bottom_border_color',
            array(
                'type' => 'theme_mod',
                'capability' => 'edit_theme_options',
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_hex_color'
            )
        );
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'axil_color_footer_bottom_border_color',
            array(
                'label' => esc_html__('Footer Bottom Border Color', 'abstrak'),
                'settings' => 'color_footer_bottom_border_color',
                'priority' => 10,
                'section' => 'axil_colors_footer_options',
            )
        ));
        // Background Color
        $wp_customize->add_setting('color_footer_bg_color',
            array(
                'type' => 'theme_mod',
                'capability' => 'edit_theme_options',
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_hex_color'
            )
        );
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'axil_color_footer_bg_color',
            array(
                'label' => esc_html__('Footer Background Color', 'abstrak'),
                'settings' => 'color_footer_bg_color',
                'priority' => 10,
                'section' => 'axil_colors_footer_options',
            )
        ));

    }

    /**
     * This will output the custom WordPress settings to the live theme's WP head.
     *
     * Used by hook: 'wp_head'
     *
     * @see add_action('wp_head',$func)
     * @since axil 1.0
     */
    public static function axil_custom_color_output()
    {

        $color_primary = get_theme_mod('color_primary', '#5956E9');
         

        ?>         
    <style type="text/css"><?php self::axil_generate_css('body, p, ul, ol, ol li', 'color ', 'color_body'); ?>
        <?php self::axil_generate_css('ul.blog-meta li, .axil-single-widget .small-post .content ul.blog-meta li, ul.post-meta-list li, ul.post-meta-list', 'color ', 'color_meta'); ?>
        <?php self::axil_generate_css('.axil-blog-list .blog-top .author .info ul.blog-meta li a, .axil-blog-details-area .blog-top .author .info ul.blog-meta li a, ul.post-meta-list li a, ul.post-meta-list a, .post-meta a, .post-meta h6 a, ul.social-share-transparent li a , ul.social-share-transparent li button ', 'color ', 'link_color_meta'); ?>
        <?php self::axil_generate_css('.axil-blog-list .blog-top .author .info ul.blog-meta li a:hover, .axil-blog-details-area .blog-top .author .info ul.blog-meta li a:hover,  ul.post-meta-list li a:hover, ul.post-meta-list a:hover, .post-meta a:hover, .post-meta h6 a:hover, ul.social-share-transparent li a:hover, ul.social-share-transparent li button:hover', 'color ', 'color_meta_hover', '', ' !important'); ?>
        <?php self::axil_generate_css('.axil-header, .ax-header, .haeder-default.sticky, ul.mainmenu li.has-dropdown ul.axil-submenu', 'background-color ', 'color_header_bg', '', ' !important'); ?>
        <?php self::axil_generate_css('.axil-header.header-style-3 .header-bottom, .mainmenu-nav ul.mainmenu > li.megamenu-wrapper .megamenu-sub-menu .megamenu-item .axil-vertical-nav', 'border-color ', 'color_header_border_color', '', ' !important'); ?>
        

        <?php self::axil_generate_css('.mainmenu-nav ul.mainmenu > li > a, .mainmenu-nav ul li, .mainmenu-nav ul.mainmenu > li.menu-item-has-children .axil-submenu li a, .mainmenu-nav ul.mainmenu > li.megamenu-wrapper .megamenu-sub-menu .megamenu-item .axil-vertical-nav .vertical-nav-item a, .mainmenu-nav ul.mainmenu > li.megamenu-wrapper .megamenu-sub-menu .megamenu-item .axil-vertical-nav .vertical-nav-item a.hover-flip-item-wrapper span::before', 'color ', 'color_header_link_color' , '', ' !important' ); ?>




        <?php self::axil_generate_css('.mainmenu-nav ul.mainmenu > li > a:hover, .mainmenu-nav ul.mainmenu > li.menu-item-has-children .axil-submenu li:hover > a, .mainmenu-nav ul.mainmenu > li.megamenu-wrapper .megamenu-sub-menu .megamenu-item .axil-vertical-nav .vertical-nav-item a.hover-flip-item-wrapper span::after, .mainmenu-nav ul.mainmenu > li.megamenu-wrapper .megamenu-sub-menu .megamenu-item .axil-vertical-nav .vertical-nav-item.active a, .mainmenu-nav ul.mainmenu > li.megamenu-wrapper .megamenu-sub-menu .megamenu-item .axil-vertical-nav .vertical-nav-item.active a.hover-flip-item-wrapper span::before', 'color ', 'color_header_link_hover_color', '', ' !important'); ?>




        <?php self::axil_generate_css('.active-dark-mode .mainmenu li a::before', 'background ', 'color_header_link_color', '', ' !important'); ?>
        <?php self::axil_generate_css('.mainmenu-nav ul.mainmenu > li > a::after', 'color ', 'color_header_link_color', '', ' !important'); ?>


        
        <?php self::axil_generate_css('.mainmenu > li > a::before', 'background ', 'color_header_link_hover_color' , '', ' !important'); ?>
        <?php self::axil_generate_css('.mainmenu > .menu-item-has-children .axil-submenu li a::after', 'background ', 'color_header_link_hover_color' , '', ' !important'); ?>
        <?php self::axil_generate_css('.axil-header-top', 'background-color ', 'color_header_top_bg', '', ' !important'); ?>
        <?php self::axil_generate_css('.axil-header .axil-header-top .quick-link li a', 'color ', 'color_header_top_link_color'); ?>
        <?php self::axil_generate_css('.axil-header .axil-header-top p', 'color ', 'color_header_top_link_color'); ?>
        <?php self::axil_generate_css('.axil-header .axil-header-top .quick-link li a:hover', 'color ', 'color_header_top_link_hover_color', '', '!important'); ?>
        <?php self::axil_generate_css('ul.social-icon.color-white li a:hover', 'background ', 'color_header_top_link_hover_color', '', '!important'); ?>

        <?php self::axil_generate_css(':root', '--color-primary',            'color_primary'); ?>
        <?php self::axil_generate_css(':root', '--color-rose',               'color_secondary'); ?>
        <?php self::axil_generate_css(':root', '--color-accent1',           'color_tertiary2'); ?>
        <?php self::axil_generate_css(':root', '--color-accent2',           'color_tertiary'); ?>

        <?php self::axil_generate_css(':root', '--color-text-dark',          'color_heading'); ?>
        <?php self::axil_generate_css(':root', '--color-body',               'color_body'); ?>
        <?php self::axil_generate_css(':root', '--color-gray-2',               'color_meta'); ?>
        <?php self::axil_generate_css(':root', '--color-link',               'color_primary'); ?>

        <?php self::axil_generate_css('.about-quality .title', 'background ', 'color_heading'); ?>
        <?php self::axil_generate_css('.about-quality p', 'background ', 'color_body'); ?>
        <?php self::axil_generate_css('.axil-footer-area', 'background-color ', 'color_footer_bg_color'); ?>
        <?php self::axil_generate_css('.footer-widget .widget-title,.footer-newsletter .title', 'color ', 'color_footer_heading_color'); ?>
        <?php self::axil_generate_css('.footer-widget, .footer-widget p, .footer-copyright .copyright-text, .footer-widget ul li', 'color ', 'color_footer_body_color'); ?>
        <?php self::axil_generate_css('.widget.widget_pages ul li a, .widget.widget_meta ul li a, .widget.widget_recent_comments ul li a, .widget.widget_recent_entries ul li a, .widget.widget_nav_menu ul li a', 'color ', 'color_footer_link_color'); ?>
        <?php self::axil_generate_css('.widget.widget_pages ul li a:hover, .widget.widget_meta ul li a:hover, .widget.widget_recent_comments ul li a:hover, .widget.widget_recent_entries ul li a:hover, .widget.widget_nav_menu ul li a:hover', 'color ', 'color_footer_link_hover_color'); ?>
        <?php self::axil_generate_css('.axil-footer-widget .inner ul li a, .copyright-default .quick-link li a,.footer-bottom-link ul li a', 'color ', 'color_footer_link_color'); ?>
        <?php self::axil_generate_css('.footer-widget-item ul li a:hover, .footer-widget-item ul.menu li a:hover, .copyright-default .quick-contact ul li a:hover, .copyright a:hover, .copyright-area .mainmenu li a:hover, .copyright-area .copyright-right p a:hover, .copyright-default p a:hover, .axil-footer-widget .inner ul li a:hover,.footer-bottom-link ul li a:hover  ', 'color ', 'color_footer_link_hover_color'); ?>

        <?php self::axil_generate_css('ul.social-icon li a:hover', 'color ', 'color_footer_link_hover_color'); ?>
        <?php self::axil_generate_css('.footer-bottom', 'border-color ', 'color_footer_bottom_border_color'); ?>
        <?php self::axil_generate_css('.footer-area', 'background ', 'color_footer_bg_color'); ?>        
        <?php self::axil_generate_css('ul.social-icon li a:hover', 'color ', 'color_footer_link_hover_color'); ?>
            
             <?php self::rbt_generate_box_shadow('.banner .banner-content .axil-btn', '0 44px 84px -24px '. $color_primary .''); ?>


        </style>
<?php

}

 /**
     * @param $selector
     * @param $attributes
     * @param bool $echo
     * @return string
     */
    public static function rbt_generate_box_shadow($selector, $attributes, $echo = true)
    {
        $return = '';
        if ($attributes) {
            $return = sprintf('%s { box-shadow: %s; }',
                $selector,
                $attributes
            );
            if ($echo) {
                echo awescapeing($return);
            }
        }
        return $return;
    }

    /**
     * This will generate a line of CSS for use in header output. If the setting
     * ($mod_name) has no defined value, the CSS will not be output.
     *
     * @uses get_theme_mod()
     * @param string $selector CSS selector
     * @param string $style The name of the CSS *property* to modify
     * @param string $mod_name The name of the 'theme_mod' option to fetch
     * @param string $prefix Optional. Anything that needs to be output before the CSS property
     * @param string $postfix Optional. Anything that needs to be output after the CSS property
     * @param bool $echo Optional. Whether to print directly to the page (default: true).
     * @return string Returns a single line of CSS with selectors and a property.
     * @since axil 1.0
     */
    public static function axil_generate_css($selector, $style, $mod_name, $prefix = '', $postfix = '', $echo = true)
    {
        $return = '';
        $mod = get_theme_mod($mod_name);
        if (!empty($mod)) {
            $return = sprintf('%s { %s:%s; }',
                $selector,
                $style,
                $prefix . $mod . $postfix
            );
            if ($echo) {
                echo awescapeing($return);
            }
        }
        return $return;
    }
}

// Setup the Theme Customizer settings and controls...
add_action('customize_register', array('axil_Customize', 'register'));

// Output custom CSS to live site
add_action('wp_head', array('axil_Customize', 'axil_custom_color_output'));