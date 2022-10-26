<?php
/**
 * ReduxFramework Sample Config File
 * For full documentation, please visit: http://docs.reduxframework.com/
 */
if (!class_exists('Redux')) {
    return;
}
$opt_name = AXIL_THEME_FIX . '_options';
$theme = wp_get_theme();
$args = array(
    // TYPICAL -> Change these values as you need/desire
    'opt_name' => $opt_name,
    // This is where your data is stored in the database and also becomes your global variable name.
    'disable_tracking' => true,
    'display_name' => $theme->get('Name'),
    // Name that appears at the top of your panel
    'display_version' => $theme->get('Version'),
    // Version that appears at the top of your panel
    'menu_type' => 'submenu',
    //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
    'allow_sub_menu' => true,
    // Show the sections below the admin menu item or not
    'menu_title' => esc_html__('Theme Options', 'abstrak'),
    'page_title' => esc_html__('Theme Options', 'abstrak'),
    // You will need to generate a Google API key to use this feature.
    // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
    //'google_api_key'       => 'AIzaSyC2GwbfJvi-WnYpScCPBGIUyFZF97LI0xs',
    // Set it you want google fonts to update weekly. A google_api_key value is required.
    'google_update_weekly' => false,
    // Must be defined to add google fonts to the typography module
    'async_typography' => false,
    // Use a asynchronous font on the front end or font string
    //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
    'admin_bar' => true,
    // Show the panel pages on the admin barff
    'admin_bar_icon' => 'dashicons-menu',
    // Choose an icon for the admin bar menu
    'admin_bar_priority' => 50,
    // Choose an priority for the admin bar menu
    'global_variable' => '',
    // Set a different name for your global variable other than the opt_name
    'dev_mode' => false,
    'forced_dev_mode_off' => false,
    // Show the time the page took to load, etc
    'update_notice' => false,
    // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
    'customizer' => false,
    // Enable basic customizer support
    //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
    //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

    // OPTIONAL -> Give you extra features
    'page_priority' => null,
    // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
    'page_parent' => 'themes.php',
    // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
    'page_permissions' => 'manage_options',
    // Permissions needed to access the options panel.
    'menu_icon' => '',
    // Specify a custom URL to an icon
    'last_tab' => '',
    // Force your panel to always open to a specific tab (by id)
    'page_icon' => 'icon-themes',
    // Icon displayed in the admin panel next to your menu_title
    'page_slug' => AXIL_THEME_FIX . '_options',
    // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
    'save_defaults' => true,
    // On load save the defaults to DB before user clicks save or not
    'default_show' => true,
    // If true, shows the default value next to each field that is not the default value.
    'default_mark' => '',
    // What to print by the field's title if the value shown is default. Suggested: *
    'show_import_export' => true,
    // Shows the Import/Export panel when not used as a field.

    // CAREFUL -> These options are for advanced use only
    'transient_time' => 60 * MINUTE_IN_SECONDS,
    'output' => true,
    // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
    'output_tag' => true,
    // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
    'footer_credit' => '&nbsp;',
    // Disable the footer credit of Redux. Please leave if you can help it.

    // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
    'database' => '',
    // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
    'use_cdn' => true,
    // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.
    'hide_expand' => true,
    // This variable determines if the ‘Expand Options’ buttons is visible on the options panel.
);

Redux::setArgs($opt_name, $args);

/*
 * ---> END ARGUMENTS
 */

// -> START Basic Fields

/**
 * General
 */
Redux::setSection($opt_name, array(
    'title' => esc_html__('General', 'abstrak'),
    'id' => 'axil_general',
    'icon' => 'el el-cog',
));
Redux::setSection($opt_name, array(
    'title' => esc_html__('General Setting', 'abstrak'),
    'id' => 'axil-general-setting',
    'icon' => 'el el-adjust-alt',
    'subsection' => true,
    'fields' => array(
      

        array(
            'id' => 'active_dark_mode',
            'type' => 'switch',
            'title' => esc_html__('Switch to Dark Mode', 'abstrak'),
            'on' => esc_html__('Yes', 'abstrak'),
            'off' => esc_html__('No', 'abstrak'),
            'default' => false,
        ),
        array(
            'id' => 'show_ld_switcher_form_user_end',
            'type' => 'switch',
            'title' => esc_html__('Enabled Dark/Light Switcher Form User End', 'abstrak'),
            'on' => esc_html__('Enabled', 'abstrak'),
            'off' => esc_html__('Disabled', 'abstrak'),
            'default' => true,
        ),

        array(
            'id' => 'axil_logo_type',
            'type' => 'button_set',
            'title' => esc_html__('Select Logo Type', 'abstrak'),
            'subtitle' => esc_html__('Select logo type, if the image is chosen the existing options of  image below will work, or text option will work. (Note: Used when Transparent Header is enabled.)', 'abstrak'),
            'options' => array(
                'image' => 'Image',
                'text' => 'Text',
            ),
            'default' => 'image',
        ),
        array(
            'id' => 'axil_light_head_logo',
            'title' => esc_html__('Default Light Logo', 'abstrak'),
            'subtitle' => esc_html__('Upload the main logo of your site. ( Recommended size: Width 267px and Height: 70px )', 'abstrak'),
            'type' => 'media',
            'default' => array(
                'url' => AXIL_IMG_URL . 'logo/logo.svg'
            ),
            'required' => array('axil_logo_type', 'equals', 'image'),
        ), 

        array(
            'id' => 'axil_light_head_logo2',
            'title' => esc_html__('Default Light Logo 2', 'abstrak'),
            'subtitle' => esc_html__('Upload the main logo of your site. ( Recommended size: Width 267px and Height: 70px )', 'abstrak'),
            'type' => 'media',
            'default' => array(
                'url' => AXIL_IMG_URL . 'logo/logo-2.svg'
            ),
            'required' => array('axil_logo_type', 'equals', 'image'),
        ),

        array(
            'id' => 'axil_dark_header_logo',
            'title' => esc_html__('Header Dark Logo', 'abstrak'),
            'subtitle' => esc_html__('Upload the main logo of your site. ( Recommended size: Width 267px and Height: 70px )', 'abstrak'),
            'type' => 'media',
            'default' => array(
                'url' => AXIL_IMG_URL . 'logo/logo-3.svg'
            ),
            'required' => array('axil_logo_type', 'equals', 'image'),
        ),
        array(
            'id' => 'axil_sticky_header_logo',
            'title' => esc_html__('Header sticky Logo', 'abstrak'),
            'subtitle' => esc_html__('Upload the main logo of your site. ( Recommended size: Width 267px and Height: 70px )', 'abstrak'),
            'type' => 'media',
            'default' => array(
                'url' => AXIL_IMG_URL . 'logo/logo-2.svg'
            ),
            'required' => array('axil_logo_type', 'equals', 'image'),
        ),
       
        array(
            'id' => 'axil_logo_max_height',
            'type' => 'dimensions',
            'units_extended' => true,
            'units' => array('rem', 'px', '%'),
            'title' => esc_html__('Logo Height', 'abstrak'),
            'subtitle' => esc_html__('Set custom logo height. Default value: 50px', 'abstrak'),
            'width' => false,
            'output' => array(
                'max-height' => '.header-logo img'
            ),
            'required' => array('axil_logo_type', 'equals', 'image'),
        ),
        array(
            'id' => 'axil_logo_padding',
            'type' => 'spacing',
            'title' => esc_html__('Logo Padding', 'abstrak'),
            'subtitle' => esc_html__('Controls the top, right, bottom and left padding of the logo. (Note: Used when Transparent Header is enabled.)', 'abstrak'),
            'mode' => 'padding',
            'units' => array('em', 'px'),
            'default' => array(
                'padding-top' => 'px',
                'padding-right' => 'px',
                'padding-bottom' => 'px',
                'padding-left' => 'px',
                'units' => 'px',
            ),

            'output'         => array('.header-logo a, .menu-item.logo a'),

            'required' => array('axil_logo_type', 'equals', 'image'),
        ),
        array(
            'id' => 'axil_logo_text',
            'type' => 'text',
            'required' => array('axil_logo_type', 'equals', 'text'),
            'title' => esc_html__('Site Title', 'abstrak'),
            'subtitle' => esc_html__('Enter your site title here. (Note: Used when Transparent Header is enabled.)', 'abstrak'),
            'default' => get_bloginfo('name')
        ),
        array(
            'id' => 'axil_logo_text_font',
            'type' => 'typography',
            'title' => esc_html__('Site Title Font Settings', 'abstrak'),
            'required' => array('axil_logo_type', 'equals', 'text'),
            'google' => true,
            'subsets' => false,
            'line-height' => false,
            'text-transform' => true,
            'transition' => false,
            'text-align' => false,
            'preview' => false,
            'all_styles' => true,
            'output' => array('.header-logo a, .haeder-default .header-logo a'),
            'units' => 'px',
            'subtitle' => esc_html__('Controls the font settings of the site title. (Note: Used when Transparent Header is enabled.)', 'abstrak'),
            'default' => array(
                'google' => true,
            )
        ),
        // End logo
        array(
            'id' => 'axil_scroll_to_top_enable',
            'type' => 'button_set',
            'title' => esc_html__('Enable Back To Top', 'abstrak'),
            'subtitle' => esc_html__('Enable the back to top button that appears in the bottom right corner of the screen.', 'abstrak'),
            'options' => array(
                'yes' => esc_html__('Yes', 'abstrak'),
                'no' => esc_html__('No', 'abstrak'),
            ),
            'default' => 'yes'
        ),
       
       

        array(
            'id' => 'axil_preloader_image',
            'type' => 'media',
            'title' => esc_html__('Preloader Image', 'abstrak'),
            'subtitle' => esc_html__('Please upload your choice of preloader image. Transparent GIF format is recommended', 'abstrak'),
            'default' => array(
                'url' => AXIL_THEME_URI . '/assets/images/preloader.gif'
            ),
            'required' => array('axil_preloader', 'equals', 'yes')
        ),
     
        array(
                'id'            => 'services_slug',
                'type'          => 'text',
                'title'         => esc_html__('Service Slug',  'abstrak'),
                'subtitle'      => esc_html__('Change the service url slug',  'abstrak'),
                'default'       => 'services',
            ),     

            array(
                'id'            => 'services_cat_slug',
                'type'          => 'text',
                'title'         => esc_html__('Service Categories Slug',  'abstrak'),
                'subtitle'      => esc_html__('Change the service Categories url slug',  'abstrak'),
                'default'       => 'services-cat',
            ),

             array(
                'id' => 'project_slug',
                'type' => 'text',
                'title' => esc_html__('Project Slug',  'abstrak'),
                'subtitle' => esc_html__('Change the project url slug',  'abstrak'),
                'default' => 'projects',
            ),

             array(
                'id' => 'projects_cat_slug',
                'type' => 'text',
                'title' => esc_html__('Projects Categories Slug',  'abstrak'),
                'subtitle' => esc_html__('Change the projects Categories url slug',  'abstrak'),
                'default' => 'projects-cat',
            ),           

             array(
                'id' => 'case_studies_slug',
                'type' => 'text',
                'title' => esc_html__('Case Study Slug',  'abstrak'),
                'subtitle' => esc_html__('Change the Case Study url slug',  'abstrak'),
                'default' => 'case-study',
            ),
             array(
                'id' => 'case_studies_cat_slug',
                'type' => 'text',
                'title' => esc_html__('Case Study Categories Slug',  'abstrak'),
                'subtitle' => esc_html__('Change the Case Study Categories url slug',  'abstrak'),
                'default' => 'case-study-cat',
            ),             

            array(
                'id' => 'team_slug',
                'type' => 'text',
                'title' => esc_html__('Team Slug',  'abstrak'),
                'subtitle' => esc_html__('Change the slug name',  'abstrak'),
                'default' => 'team',
            ),      
            array(
                'id' => 'team_cat_slug',
                'type' => 'text',
                'title' => esc_html__('Team Categories Slug',  'abstrak'),
                'subtitle' => esc_html__('Change the Categories slug name',  'abstrak'),
                'default' => 'team-cat',
            ),


    )
));



Redux::setSection($opt_name,
    array(
        'title' => esc_html__('Contact & Socials', 'abstrak'),
        'id' => 'socials_section',
        'heading' => esc_html__('Contact & Socials', 'abstrak'),
        'subtitle' => esc_html__('In case you want to hide any field, just keep that field empty', 'abstrak'),
        'icon' => 'el el-twitter',
        'subsection' => false,
        'fields' => array(
            array(
                'id' => 'address_field_title',
                'type' => 'text',
                'title' => esc_html__('Address Field Title', 'abstrak'),
                'default' => esc_html__('Contact information', 'abstrak'),
            ),
            array(
                'id' => 'address',
                'type' => 'textarea',
                'title' => esc_html__('Address', 'abstrak'),
                'default' => esc_html__('Theodore Lowe, Ap #867-859 Sit Rd, Azusa New York', 'abstrak'),
            ),
            array(
                'id' => 'call_now_field_title',
                'type' => 'text',
                'title' => esc_html__('Call Now Field Title', 'abstrak'),
                'default' => esc_html__('We are available 24/ 7. Call Now.', 'abstrak'),
            ),
            array(
                'id' => 'phone',
                'type' => 'text',
                'title' => esc_html__('Phone', 'abstrak'),
                'default' => '(888) 456-2790',
            ),
            array(
                'id' => 'fax',
                'type' => 'text',
                'title' => esc_html__('Fax', 'abstrak'),
                'default' => '(121) 255-53333',
            ),
            array(
                'id' => 'email',
                'type' => 'text',
                'title' => esc_html__('Email', 'abstrak'),
                'validate' => 'email',
                'default' => 'example@domain.com',
            ),
            array(
                'id' => 'social_title',
                'type' => 'text',
                'title' => esc_html__('Social Title', 'abstrak'),
                'default' => esc_html__('Follow us', 'abstrak'),
            ),

            array(
                'id' => 'axil_footer_social_enable',
                'type' => 'switch',
                'title' => esc_html__('Social Enable', 'abstrak'),
                'subtitle' => esc_html__('Enable or disable the footer top area.', 'abstrak'),
                'default' => false,
            ),         

            array(
                'id' => 'axil_social_icons',
                'type' => 'sortable',
                'title' => esc_html__('Social Icons', 'abstrak'),
                'subtitle' => esc_html__('Enter social links to show the icons', 'abstrak'),
                'mode' => 'text',
                'label' => true,
                'required' => array('axil_footer_social_enable', 'equals', true),
                'options' => array(
                    'facebook-f' => '',
                    'twitter' => '',
                    'pinterest-p' => '',
                    'linkedin-in' => '',
                    'instagram' => '',
                    'vimeo-v' => '',
                    'dribbble' => '',
                    'behance' => '',
                    'youtube' => '',
                ),
                'default' => array(
                    'facebook-f' => 'https://www.facebook.com/',
                    'twitter' => 'https://twitter.com/',
                    'pinterest-p' => 'https://pinterest.com/',
                    'linkedin-in' => 'https://linkedin.com/',
                    'instagram' => 'https://instagram.com/',
                    'vimeo-v' => 'https://vimeo.com/',
                    'dribbble' => 'https://dribbble.com/',
                    'behance' => 'https://behance.com/',
                    'youtube' => '',
                ),
            )
        )
    )
);


/**
 * Header
 */
Redux::setSection($opt_name, array(
        'title' => esc_html__('Header', 'abstrak'),
        'id' => 'header_id',
        'icon' => 'el el-minus',
        'fields' => array(
            array(
                'id' => 'axil_enable_header',
                'type' => 'switch',
                'title' => esc_html__('Header', 'abstrak'),
                'subtitle' => esc_html__('Enable or disable the header area.', 'abstrak'),
                'default' => true
            ),

            array(
                'id' => 'axil_header_sticky',
                'type' => 'switch',
                'title' => esc_html__('Enable Sticky Header ', 'abstrak'),
                'subtitle' => esc_html__('Enable to activate the sticky header.', 'abstrak'),
                'default' => false,
                'required' => array('axil_enable_header', 'equals', true),
            ),
          
            // Header Custom Style
            array(
                'id' => 'axil_select_header_template',
                'type' => 'image_select',
                'title' => esc_html__('Select Header Layout', 'abstrak'),
                'options' => array(
                    '1' => array(
                        'alt' => esc_html__('Header Layout 1', 'abstrak'),
                        'title' => esc_html__('Header Layout 1', 'abstrak'),
                        'img' => get_template_directory_uri() . '/assets/images/optionframework/header/1.png',
                    ),
                    '2' => array(
                        'alt' => esc_html__('Header Layout 2', 'abstrak'),
                        'title' => esc_html__('Header Layout 2', 'abstrak'),
                        'img' => get_template_directory_uri() . '/assets/images/optionframework/header/2.png',
                    ),
                    '3' => array(
                        'alt' => esc_html__('Header Layout 3', 'abstrak'),
                        'title' => esc_html__('Header Layout 3', 'abstrak'),
                        'img' => get_template_directory_uri() . '/assets/images/optionframework/header/3.png',
                    ), 
                    '4' => array(
                        'alt' => esc_html__('Header Layout 4', 'abstrak'),
                        'title' => esc_html__('Header Layout 4 ( Dark layout)', 'abstrak'),
                        'img' => get_template_directory_uri() . '/assets/images/optionframework/header/4.png',
                    ),
                 
                ),
                'default' => '1',
                'required' => array('axil_enable_header', 'equals', true),
            ),
           
            array(
                'id' => 'axil_enable_offcanvas',
                'type' => 'switch',
                'title' => esc_html__('Header offcanvas', 'abstrak'),
                'subtitle' => esc_html__('Enable or disable header offcanvas Icon.', 'abstrak'),
                'default' => false,
                'required' => array('axil_enable_header', 'equals', true),

                'required' => array(
                    array('axil_enable_header', 'equals', true),
                    array('axil_select_header_template', 'not', '4'),
                ),

            ),   

            array(
                'id' => 'axil_search_placeholders',
                'type' => 'text',
                'title' => esc_html__('Search Placeholders',  'abstrak'),
                'subtitle' => esc_html__('Change Search Placeholdersse',  'abstrak'),
                'default' => esc_html__('Search ...',  'abstrak'),                 
                 'required' => array('axil_enable_offcanvas', 'equals', true),
            ),     


             array(
                'id' => 'axil_enable_social',
                'type' => 'switch',
                'title' => esc_html__('Offcanvas Social', 'abstrak'),
                'subtitle' => esc_html__('Enable or disable header social Icon.', 'abstrak'),
                'default' => false,
                'required' => array('axil_enable_offcanvas', 'equals', true),
            ),   
          
             array(
                'id' => 'axil_enable_menu_social',
                'type' => 'switch',
                'title' => esc_html__('Menu Social', 'abstrak'),
                'subtitle' => esc_html__('Enable or disable header social Icon.', 'abstrak'),
                'default' => false,
               'required' => array(
                    array('axil_enable_header', 'equals', true),
                    array('axil_select_header_template', 'equals', '3'),
                ),
            ),   
        

            array(
                'id' => 'axil_enable_button',
                'type' => 'switch',
                'title' => esc_html__('Header button', 'abstrak'),
                'subtitle' => esc_html__('Enable or disable header button.', 'abstrak'),
                'default' => false,
                 
                'required' => array(
                    array('axil_enable_header', 'equals', true),
                     
                ), 
            ),


            array(
                'id' => 'button_txt',
                'type' => 'text',
                'title' => esc_html__('Button Text', 'abstrak'),
                'default' => esc_html__('Lets Talk', "abstrak"),
                'required' => array('axil_enable_button', 'equals', true),
            ),

            array(
                'id' => 'button_url',
                'type' => 'text',
                'title' => esc_html__('Button Url', 'abstrak'),
                'default' => '#',
                'required' => array('axil_enable_button', 'equals', true),
            ),
        
          array(
                'id' => 'minicart_icon',
                'type' => 'switch',
                'title' => esc_html__('Cart Icon', 'abstrak'),
                'on' => esc_html__('Enabled', 'abstrak'),
                'off' => esc_html__('Disabled', 'abstrak'),
                'default' => false,
            ),
        )
    ));

/**
 * Page Banner/Title section
 */
Redux::setSection($opt_name, array(
    'title' => esc_html__('Pages Banner', 'abstrak'),
    'id' => 'axil_banner_section',
    'icon' => 'el el-website',
    'fields' => array(
         
        array(
            'id' => 'axil_page_banner_enable',
            'type' => 'switch',
            'title' => esc_html__('Banner', 'abstrak'),
            'subtitle' => esc_html__('Enable or disable the banner area.', 'abstrak'),
            'default' => true,
        ),      
           
        array(
            'id' => 'axil_page_banner_template',
            'type' => 'image_select',
            'title' => esc_html__('Select Banner Layout', 'abstrak'),
            'options' => array(
                '1' => array(
                    'alt' => esc_html__('Banner Layout 1', 'abstrak'),
                    'title' => esc_html__('Banner Layout 1 ( without image and shape )', 'abstrak'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/banner/1.jpg',
                ),
                '2' => array(
                    'alt' => esc_html__('Banner Layout 2', 'abstrak'),
                    'title' => esc_html__('Banner Layout 2 ( Shape )', 'abstrak'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/banner/2.jpg',
                ),
                '3' => array(
                    'alt' => esc_html__('Banner Layout 3', 'abstrak'),
                    'title' => esc_html__('Banner Layout 3 ( Image )', 'abstrak'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/banner/3.jpg',
                ),
                
             
            ),
            'default' => '1',
            'required' => array('axil_page_banner_enable', 'equals', true),
        ),
        
       array(
            'id' => 'axil_page_subtitle',
            'type' => 'text',
            'title' => esc_html__(' Sub Title', 'abstrak'),
            'default' => esc_html__(' We design and develop web and mobile applications for our clients worldwide', 'abstrak'),
            'required' => array('axil_page_banner_enable', 'equals', true),
           
        ),

       array(
         'id' => 'axil_page_banner_img',
         'title' => esc_html__('Archive Banner Image', 'abstrak'),           
         'type' => 'media',
          'required' => array('axil_page_banner_template', 'not', '1'),
         'default' => array(
          'url' => AXIL_IMG_URL . 'banner/banner-thumb-3.png'
         ),   
        
     ),    

     array(
        'id' => 'axil_page_banner_image_size',
        'type' => 'dimensions',
        'units_extended' => true,
        'units' => array('rem', 'px', '%'),
        'title' => esc_html__('Banner Image Width', 'abstrak'),
        'subtitle' => esc_html__('Set custom logo height. Default value: 50px', 'abstrak'),
        'height' => false,
        'output' => array(
            'max-width' => '.breadcrumb-banner .banner-thumbnail.banner-axil_page_image_size img'
        ),
        
       'required' => array(
         array('axil_page_banner_template', 'not', '1'),
         array('axil_page_banner_template', 'not', '3'),
      ),
    ),

      array(
         'id' => 'axil_page_banner_shape',
         'title' => esc_html__('Archive Banner Shape', 'abstrak'),           
         'type' => 'media',             
          'required' => array(
             array('axil_page_banner_template', 'not', '2'),
             array('axil_page_banner_template', 'not', '3'),
          ),
         'default' => array(
          'url' => AXIL_IMG_URL . 'banner/bubble-17.png'
         ),   
        
     ),   
     
      array(
         'id' => 'axil_page_banner_shape2',
         'title' => esc_html__('Archive Banner Shape', 'abstrak'),           
         'type' => 'media',
          'required' => array('axil_page_banner_template', 'not', '1'),
         'default' => array(
          'url' => AXIL_IMG_URL . 'banner/bubble-9.png'
         ),   
        
     ), 
      
        array(
            'id' => 'axil_page_breadcrumb_enable',
            'type' => 'switch',
            'title' => esc_html__('Breadcrumb', 'abstrak'),
            'subtitle' => esc_html__('Enable or disable the breadcrumb area.', 'abstrak'),
            'default' => true,
               'required' => array(
                 array('axil_page_banner_template', 'not', '2'),
                 array('axil_page_banner_template', 'not', '3'),
              ),
        ),

          array(
            'id' => 'axil_page_banner_other_shape_enable',
            'type' => 'switch',
            'title' => esc_html__('Banner Shape Disable', 'abstrak'),
            'subtitle' => esc_html__('Enable or disable the banner area.', 'abstrak'),
            'default' => true,
        ),      

       
    )
));


/**
 * Case Study Panel
 */
Redux::setSection($opt_name, array(
    'title' => esc_html__('Case Study', 'abstrak'),
    'id' => 'axil_case_study_archive',
    'icon' => 'el el-file-edit',
));



Redux::setSection($opt_name, array(
    'title' => esc_html__(' Archive', 'abstrak'),
    'id' => 'axil_case_study_archive_banner_section',
    'icon' => 'el el-website',
     'subsection' => true,
    'fields' => array(
           array(
             'id' => 'axil_case_study_archive_banner_enable',
             'type' => 'switch',
             'title' => esc_html__('Banner', 'abstrak'),
             'subtitle' => esc_html__('Enable or disable the banner area.', 'abstrak'),
             'default' => true,
         ),

        array(
            'id' => 'axil_case_study_archive_banner_template',
            'type' => 'image_select',
            'title' => esc_html__('Select Banner Layout', 'abstrak'),
            'options' => array(
                    '1' => array(
                    'alt' => esc_html__('Banner Layout 1', 'abstrak'),
                    'title' => esc_html__('Banner Layout 1', 'abstrak'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/banner/1.jpg',
                ),
                '2' => array(
                    'alt' => esc_html__('Banner Layout 2', 'abstrak'),
                    'title' => esc_html__('Banner Layout 2', 'abstrak'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/banner/2.jpg',
                ),
                '3' => array(
                    'alt' => esc_html__('Banner Layout 3', 'abstrak'),
                    'title' => esc_html__('Banner Layout 3', 'abstrak'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/banner/3.jpg',
                ),
                
                
             
            ),
            'default' => '1',
            'required' => array('axil_case_study_archive_banner_enable', 'equals', true),
        ),      
       array(
            'id' => 'axil_case_study_archive_title',
            'type' => 'text',
            'title' => esc_html__('Default Title', 'abstrak'),
            'subtitle' => esc_html__('Controls the Default title of the page page title are on the Case Study page.', 'abstrak'),
            'default' => esc_html__('All case_study', 'abstrak'),
             'required' => array('axil_case_study_archive_banner_enable', 'equals', true),
           
        ),           
        array(
            'id' => 'axil_case_study_archive_subtitle',
            'type' => 'text',
            'title' => esc_html__(' Sub Title', 'abstrak'),
            'default' => esc_html__(' We design and develop web and mobile applications for our clients worldwide', 'abstrak'),
              'required' => array(
                 array('axil_case_study_archive_banner_template', 'not', '1'),
                
              ),
           
        ),


       array(
         'id' => 'axil_case_study_archive_banner_img',
         'title' => esc_html__('Archive Banner Image', 'abstrak'),           
         'type' => 'media',
          'required' => array('axil_case_study_archive_banner_template', 'not', '1'),
         'default' => array(
          'url' => AXIL_IMG_URL . 'banner/banner-thumb-3.png'
         ),   
        
     ),   
    array(
        'id' => 'axil_case_study_archive_image_size',
        'type' => 'dimensions',
        'units_extended' => true,
        'units' => array('rem', 'px', '%'),
        'title' => esc_html__('Banner Image Width', 'abstrak'),
        'subtitle' => esc_html__('Set custom logo height. Default value: 50px', 'abstrak'),
        'height' => false,
        'output' => array(
            'max-width' => '.breadcrumb-banner .banner-thumbnail.banner-axil_case_study_archive_image_size img'
        ),
        
       'required' => array(
         array('axil_case_study_archive_banner_template', 'not', '1'),
         array('axil_case_study_archive_banner_template', 'not', '3'),
      ),
    ),
      array(
         'id' => 'axil_case_study_archive_banner_shape',
         'title' => esc_html__('Archive Banner Shape', 'abstrak'),           
         'type' => 'media',
         'required' => array(
                 array('axil_case_study_archive_banner_template', 'not', '2'),
                 array('axil_case_study_archive_banner_template', 'not', '3'),
              ),
         'default' => array(
          'url' => AXIL_IMG_URL . 'banner/bubble-17.png'
         ),   
        
     ),   
     
      array(
         'id' => 'axil_case_study_archive_banner_shape2',
         'title' => esc_html__('Archive Banner Shape', 'abstrak'),           
         'type' => 'media',
          'required' => array('axil_case_study_archive_banner_template', 'not', '1'),
         'default' => array(
          'url' => AXIL_IMG_URL . 'banner/bubble-22.png'
         ),   
        
     ), 
           array(
             'id' => 'axil_case_study_archive_banner_other_shape_enable',
             'type' => 'switch',
             'title' => esc_html__('Banner Shape Disable', 'abstrak'),
             'subtitle' => esc_html__('Enable or disable the banner area.', 'abstrak'),
             'default' => true,
         ),      

        array(
            'id' => 'axil_case_study_archive_breadcrumb_enable',
            'type' => 'switch',
            'title' => esc_html__('Breadcrumb', 'abstrak'),
            'subtitle' => esc_html__('Enable or disable the breadcrumb area.', 'abstrak'),
            'default' => true,
            'required' => array(
                    array('axil_case_study_archive_banner_template', 'not', '2'),
                    array('axil_case_study_archive_banner_template', 'not', '3'),
                 ),
        ),
          array(
            'id' => 'axil_case_study_archive_post_per_page',
            'type' => 'text',
            'title' => esc_html__(' Case Study Post par Page', 'abstrak'),
            'default' => '6',
             'required' => array('axil_case_study_archive_banner_enable', 'equals', true),
           
        ),

        
    )
));

Redux::setSection($opt_name, array(
    'title' => esc_html__('Single', 'abstrak'),
    'id' => 'axil_case_study_single_banner_section',
    'icon' => 'el el-website',
    'subsection' => true,
    'fields' => array(
       array(
         'id' => 'axil_case_study_single_banner_enable',
         'type' => 'switch',
         'title' => esc_html__('Banner', 'abstrak'),
         'subtitle' => esc_html__('Enable or disable the banner area.', 'abstrak'),
         'default' => true,
     ),      
       
        
        array(
            'id' => 'axil_case_study_single_banner_template',
            'type' => 'image_select',
            'title' => esc_html__('Select Banner Layout', 'abstrak'),
            'options' => array(
                '1' => array(
                    'alt' => esc_html__('Banner Layout 1', 'abstrak'),
                    'title' => esc_html__('Banner Layout 1', 'abstrak'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/banner/1.jpg',
                ),
                '2' => array(
                    'alt' => esc_html__('Banner Layout 2', 'abstrak'),
                    'title' => esc_html__('Banner Layout 2', 'abstrak'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/banner/2.jpg',
                ),
                '3' => array(
                    'alt' => esc_html__('Banner Layout 3', 'abstrak'),
                    'title' => esc_html__('Banner Layout 3', 'abstrak'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/banner/3.jpg',
                ),
                
                
             
            ),
            'default' => '1',
            'required' => array('axil_case_study_single_banner_enable', 'equals', true),
        ),
         array(
            'id' => 'axil_case_study_single_subtitle',
            'type' => 'text',
            'title' => esc_html__(' Sub Title', 'abstrak'),
            'default' => esc_html__(' We design and develop web and mobile applications for our clients worldwide', 'abstrak'),
           'required' => array(
                    array('axil_case_study_single_banner_template', 'not', '1'),
                     
                 ),
           
        ),
        array(
            'id' => 'axil_case_study_single_breadcrumb_enable',
            'type' => 'switch',
            'title' => esc_html__('Breadcrumb', 'abstrak'),
            'subtitle' => esc_html__('Enable or disable the breadcrumb area.', 'abstrak'),
            'default' => true,
            'required' => array(
                    array('axil_case_study_single_banner_template', 'not', '2'),
                    array('axil_case_study_single_banner_template', 'not', '3'),
                 ),
        ),
   
       array(
         'id' => 'axil_case_study_single_banner_img',
         'title' => esc_html__('Archive Banner Image', 'abstrak'),           
         'type' => 'media',
          'required' => array('axil_case_study_single_banner_template', 'not', '1'),
         'default' => array(
          'url' => AXIL_IMG_URL . 'banner/banner-thumb-3.png'
         ),   
        
     ),   
       array(
           'id' => 'axil_case_study_single_image_size',
           'type' => 'dimensions',
           'units_extended' => true,
           'units' => array('rem', 'px', '%'),
           'title' => esc_html__('Banner Image Width', 'abstrak'),
           'subtitle' => esc_html__('Set custom logo height. Default value: 50px', 'abstrak'),
           'height' => false,
           'output' => array(
               'max-width' => '.breadcrumb-banner .banner-thumbnail.banner-axil_case_study_single_image_size img'
           ),
           
          'required' => array(
            array('axil_case_study_single_banner_template', 'not', '1'),
            array('axil_case_study_single_banner_template', 'not', '3'),
         ),
       ),

      array(
         'id' => 'axil_case_study_single_banner_shape',
         'title' => esc_html__('Archive Banner Shape', 'abstrak'),           
         'type' => 'media',
         'required' => array(
                 array('axil_case_study_single_banner_template', 'not', '2'),
                 array('axil_case_study_single_banner_template', 'not', '3'),
              ),
         'default' => array(
          'url' => AXIL_IMG_URL . 'banner/bubble-17.png'
         ),   
        
     ),   
     
      array(
         'id' => 'axil_case_study_single_banner_shape2',
         'title' => esc_html__('Archive Banner Shape', 'abstrak'),           
         'type' => 'media',
          'required' => array('axil_case_study_single_banner_template', 'not', '1'),
         'default' => array(
          'url' => AXIL_IMG_URL . 'banner/bubble-22.png'
         ),   
        
     ), 
       
        array(
             'id' => 'axil_case_study_single_banner_other_shape_enable',
             'type' => 'switch',
             'title' => esc_html__('Banner Shape Disable', 'abstrak'),
             'subtitle' => esc_html__('Enable or disable the banner area.', 'abstrak'),
             'default' => true,
         ),      

    )
));



/**
 * Case Study Panel
 */
Redux::setSection($opt_name, array(
    'title' => esc_html__('Services', 'abstrak'),
    'id' => 'axil_services',
    'icon' => 'el el-file-edit',
));



Redux::setSection($opt_name, array(
    'title' => esc_html__(' Archive', 'abstrak'),
    'id' => 'axil_services_archive_banner_section',
    'icon' => 'el el-website',
     'subsection' => true,
    'fields' => array(
           array(
             'id' => 'axil_services_archive_banner_enable',
             'type' => 'switch',
             'title' => esc_html__('Banner', 'abstrak'),
             'subtitle' => esc_html__('Enable or disable the banner area.', 'abstrak'),
             'default' => true,
         ),      
        array(
            'id' => 'axil_services_archive_banner_template',
            'type' => 'image_select',
            'title' => esc_html__('Select Banner Layout', 'abstrak'),
            'options' => array(
                '1' => array(
                    'alt' => esc_html__('Banner Layout 1', 'abstrak'),
                    'title' => esc_html__('Banner Layout 1', 'abstrak'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/banner/1.jpg',
                ),
                '2' => array(
                    'alt' => esc_html__('Banner Layout 2', 'abstrak'),
                    'title' => esc_html__('Banner Layout 2', 'abstrak'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/banner/2.jpg',
                ),
                '3' => array(
                    'alt' => esc_html__('Banner Layout 3', 'abstrak'),
                    'title' => esc_html__('Banner Layout 3', 'abstrak'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/banner/3.jpg',
                ),
                
                
             
            ),
            'default' => '1',
            'required' => array('axil_services_archive_banner_enable', 'equals', true),
        ),      
       array(
            'id' => 'axil_services_archive_title',
            'type' => 'text',
            'title' => esc_html__('Default Title', 'abstrak'),
            'subtitle' => esc_html__('Controls the Default title of the page page title are on the Services page.', 'abstrak'),
            'default' => esc_html__('All services', 'abstrak'),
             'required' => array('axil_services_archive_banner_enable', 'equals', true),
           
        ),           
        array(
            'id' => 'axil_services_archive_subtitle',
            'type' => 'text',
            'title' => esc_html__(' Sub Title', 'abstrak'),
            'default' => esc_html__(' We design and develop web and mobile applications for our clients worldwide', 'abstrak'),
             'required' => array(
                 array('axil_services_archive_banner_template', 'not', '1'),
                 
              ),
           
        ),

        array(
            'id' => 'axil_services_archive_breadcrumb_enable',
            'type' => 'switch',
            'title' => esc_html__('Breadcrumb', 'abstrak'),
            'subtitle' => esc_html__('Enable or disable the breadcrumb area.', 'abstrak'),
            'default' => true,
             'required' => array(
                 array('axil_services_archive_banner_template', 'not', '2'),
                 array('axil_services_archive_banner_template', 'not', '3'),
              ),
        ),

          array(
            'id' => 'axil_services_archive_banner_img',
            'title' => esc_html__('Archive Banner Image', 'abstrak'),           
            'type' => 'media',
             'required' => array('axil_services_archive_banner_template', 'not', '1'),
            'default' => array(
             'url' => AXIL_IMG_URL . 'banner/banner-thumb-3.png'
            ),   
           
        ),   
          array(
              'id' => 'axil_services_archive_image_size',
              'type' => 'dimensions',
              'units_extended' => true,
              'units' => array('rem', 'px', '%'),
              'title' => esc_html__('Banner Image Width', 'abstrak'),
              'subtitle' => esc_html__('Set custom logo height. Default value: 50px', 'abstrak'),
              'height' => false,
              'output' => array(
                  'max-width' => '.breadcrumb-banner .banner-thumbnail.banner-axil_services_archive_image_size img'
              ),
              
             'required' => array(
               array('axil_services_archive_banner_template', 'not', '1'),
               array('axil_services_archive_banner_template', 'not', '3'),
            ),
          ),
         array(
            'id' => 'axil_services_archive_banner_shape',
            'title' => esc_html__('Archive Banner Shape', 'abstrak'),           
            'type' => 'media',

             'required' => array(
                 array('axil_services_archive_banner_template', 'not', '2'),
                 array('axil_services_archive_banner_template', 'not', '3'),
              ),
            'default' => array(
             'url' => AXIL_IMG_URL . 'banner/bubble-17.png'
            ),   
           
        ),   
        
         array(
            'id' => 'axil_services_archive_banner_shape2',
            'title' => esc_html__('Archive Banner Shape', 'abstrak'),           
            'type' => 'media',
             'required' => array('axil_services_archive_banner_template', 'not', '1'),
            'default' => array(
             'url' => AXIL_IMG_URL . 'banner/bubble-22.png'
            ),   
           
        ), 


        array(
             'id' => 'axil_services_archive_banner_other_shape_enable',
             'type' => 'switch',
             'title' => esc_html__('Banner Shape Disable', 'abstrak'),
             'subtitle' => esc_html__('Enable or disable the banner Other shape style.', 'abstrak'),
             'default' => true,
         ),  

       


          array(
            'id' => 'axil_services_archive_post_per_page',
            'type' => 'text',
            'title' => esc_html__(' Case Study Post par Page', 'abstrak'),
            'default' => '6',
             'required' => array('axil_services_archive_banner_enable', 'equals', true),
           
        ),
          array(
            'id' => 'axil_services_btn_txt',
            'type' => 'text',
            'title' => esc_html__('Services Button Text', 'abstrak'),
            'default' => 'Find out more',
             'required' => array('axil_services_archive_banner_enable', 'equals', true),
           
        ),
          
           array(
              'id'       => 'axil_services_col_lg',
              'type'     => 'select',
              'title'    => esc_html__( 'Desktops: > 1199px', 'abstrak'), 
              'options'  => array(
                  '12' => esc_html__( '1 Col', 'abstrak' ),
                  '6'  => esc_html__( '2 Col', 'abstrak' ),
                  '4'  => esc_html__( '3 Col', 'abstrak' ),
                  '3'  => esc_html__( '4 Col', 'abstrak' ),
                  '2'  => esc_html__( '6 Col', 'abstrak' ),
              ),
              'default'  => '4',
          ),  
          array(
              'id'       => 'axil_services_col_md',
              'type'     => 'select',
              'title'    => esc_html__( 'Desktops: > 991px', 'abstrak'), 
              'options'  => array(
                  '12' => esc_html__( '1 Col', 'abstrak' ),
                  '6'  => esc_html__( '2 Col', 'abstrak' ),
                  '4'  => esc_html__( '3 Col', 'abstrak' ),
                  '3'  => esc_html__( '4 Col', 'abstrak' ),
                  '2'  => esc_html__( '6 Col', 'abstrak' ),
              ),
              'default'  => '6',
          ),
          array(
              'id'       => 'axil_services_col_sm',
              'type'     => 'select',
              'title'    => esc_html__( 'Tablets: > 767px', 'abstrak'), 
              'options'  => array(
                  '12' => esc_html__( '1 Col', 'abstrak' ),
                  '6'  => esc_html__( '2 Col', 'abstrak' ),
                  '4'  => esc_html__( '3 Col', 'abstrak' ),
                  '3'  => esc_html__( '4 Col', 'abstrak' ),
                  '2'  => esc_html__( '6 Col', 'abstrak' ),
              ),
              'default'  => '12',
          ), 
        
    )
));

Redux::setSection($opt_name, array(
    'title' => esc_html__('Single', 'abstrak'),
    'id' => 'axil_services_single_banner_section',
    'icon' => 'el el-website',
    'subsection' => true,
    'fields' => array(
       array(
         'id' => 'axil_services_single_banner_enable',
         'type' => 'switch',
         'title' => esc_html__('Banner', 'abstrak'),
         'subtitle' => esc_html__('Enable or disable the banner area.', 'abstrak'),
         'default' => true,
     ),      

         array(
            'id' => 'axil_services_single_banner_template',
            'type' => 'image_select',
            'title' => esc_html__('Select Banner Layout', 'abstrak'),
            'options' => array(
               '1' => array(
                    'alt' => esc_html__('Banner Layout 1', 'abstrak'),
                    'title' => esc_html__('Banner Layout 1', 'abstrak'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/banner/1.jpg',
                ),
                '2' => array(
                    'alt' => esc_html__('Banner Layout 2', 'abstrak'),
                    'title' => esc_html__('Banner Layout 2', 'abstrak'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/banner/2.jpg',
                ),
                '3' => array(
                    'alt' => esc_html__('Banner Layout 3', 'abstrak'),
                    'title' => esc_html__('Banner Layout 3', 'abstrak'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/banner/3.jpg',
                ),
                
                
             
            ),
            'default' => '1',
            'required' => array('axil_services_single_banner_enable', 'equals', true),
        ),

        array(
            'id' => 'axil_services_single_subtitle',
            'type' => 'text',
            'title' => esc_html__(' Sub Title', 'abstrak'),
            'default' => esc_html__(' We design and develop web and mobile applications for our clients worldwide', 'abstrak'),
            'required' => array(
                     array('axil_services_single_banner_template', 'not', '1'),
                      
                  ),
           
        ),

        array(
            'id' => 'axil_services_single_breadcrumb_enable',
            'type' => 'switch',
            'title' => esc_html__('Breadcrumb', 'abstrak'),
            'subtitle' => esc_html__('Enable or disable the breadcrumb area.', 'abstrak'),
            'default' => true,
            'required' => array(
                     array('axil_services_single_banner_template', 'not', '2'),
                     array('axil_services_single_banner_template', 'not', '3'),
                  ),
        ),
       
           array(
             'id' => 'axil_services_single_banner_img',
             'title' => esc_html__('Archive Banner Image', 'abstrak'),           
             'type' => 'media',
              'required' => array('axil_services_single_banner_template', 'not', '1'),
             'default' => array(
              'url' => AXIL_IMG_URL . 'banner/banner-thumb-3.png'
             ),   
            
         ),   
            array(
              'id' => 'axil_services_single_image_size',
              'type' => 'dimensions',
              'units_extended' => true,
              'units' => array('rem', 'px', '%'),
              'title' => esc_html__('Banner Image Width', 'abstrak'),
              'subtitle' => esc_html__('Set custom logo height. Default value: 50px', 'abstrak'),
              'height' => false,
              'output' => array(
                  'max-width' => '.breadcrumb-banner .banner-thumbnail.banner-axil_services_single_image_size img'
              ),
              
             'required' => array(
               array('axil_services_single_banner_template', 'not', '1'),
               array('axil_services_single_banner_template', 'not', '3'),
            ),
          ),
          array(
             'id' => 'axil_services_single_banner_shape',
             'title' => esc_html__('Archive Banner Shape', 'abstrak'),           
             'type' => 'media', 

            'required' => array(
                     array('axil_services_single_banner_template', 'not', '2'),
                     array('axil_services_single_banner_template', 'not', '3'),
                  ),
             'default' => array(
              'url' => AXIL_IMG_URL . 'banner/bubble-17.png'
             ),   
            
         ),   
         
          array(
             'id' => 'axil_services_single_banner_shape2',
             'title' => esc_html__('Archive Banner Shape', 'abstrak'),           
             'type' => 'media',
              'required' => array('axil_services_single_banner_template', 'not', '1'),
             'default' => array(
              'url' => AXIL_IMG_URL . 'banner/bubble-22.png'
             ),   
            
         ),   
         
     array(
             'id' => 'axil_services_single_banner_other_shape_enable',
             'type' => 'switch',
             'title' => esc_html__('Banner Shape Disable', 'abstrak'),
             'subtitle' => esc_html__('Enable or disable the banner Other shape style.', 'abstrak'),
             'default' => true,
         ),  


       
    )
));


/**
 * Team Panel
 */
Redux::setSection($opt_name, array(
    'title' => esc_html__('Team', 'abstrak'),
    'id' => 'axil_team_section',
    'icon' => 'el el-file-edit',
));



Redux::setSection($opt_name, array(
    'title' => esc_html__(' Archive', 'abstrak'),
    'id' => 'axil_team_archive_banner_section',
    'icon' => 'el el-website',
     'subsection' => true,
     'fields' => array(
           array(
             'id' => 'axil_team_archive_banner_enable',
             'type' => 'switch',
             'title' => esc_html__('Banner', 'abstrak'),
             'subtitle' => esc_html__('Enable or disable the banner area.', 'abstrak'),
             'default' => true,
         ),      

        array(
            'id' => 'axil_team_archive_banner_template',
            'type' => 'image_select',
            'title' => esc_html__('Select Banner Layout', 'abstrak'),
            'options' => array(
               '1' => array(
                   'alt' => esc_html__('Banner Layout 1', 'abstrak'),
                   'title' => esc_html__('Banner Layout 1', 'abstrak'),
                   'img' => get_template_directory_uri() . '/assets/images/optionframework/header/1.png',
                ),
                '2' => array(
                   'alt' => esc_html__('Banner Layout 2', 'abstrak'),
                   'title' => esc_html__('Banner Layout 2', 'abstrak'),
                   'img' => get_template_directory_uri() . '/assets/images/optionframework/header/2.png',
                ),
                '3' => array(
                   'alt' => esc_html__('Banner Layout 3', 'abstrak'),
                   'title' => esc_html__('Banner Layout 2', 'abstrak'),
                   'img' => get_template_directory_uri() . '/assets/images/optionframework/header/2.png',
                ),
                
             
            ),
            'default' => '1',
            'required' => array('axil_team_archive_banner_enable', 'equals', true),
        ), 
       array(
            'id' => 'axil_team_archive_title',
            'type' => 'text',
            'title' => esc_html__('Default Title', 'abstrak'),
            'subtitle' => esc_html__('Controls the Default title of the page page title are on the team page.', 'abstrak'),
            'default' => esc_html__('All services', 'abstrak'),
             'required' => array('axil_team_archive_banner_enable', 'equals', true),
           
        ),           
        array(
            'id' => 'axil_team_archive_subtitle',
            'type' => 'text',
            'title' => esc_html__(' Sub Title', 'abstrak'),
            'default' => esc_html__(' We design and develop web and mobile applications for our clients worldwide', 'abstrak'),
              'required' => array(
              array('axil_team_archive_banner_template', 'not', '1'),
              
           ),
           
        ),
           array(
             'id' => 'axil_team_archive_banner_img',
             'title' => esc_html__('Archive Banner Image', 'abstrak'),           
             'type' => 'media',
              'required' => array('axil_team_archive_banner_template', 'not', '1'),
             'default' => array(
              'url' => AXIL_IMG_URL . 'banner/banner-thumb-3.png'
             ),   
            
         ),   
             array(
               'id' => 'axil_team_archive_image_size',
               'type' => 'dimensions',
               'units_extended' => true,
               'units' => array('rem', 'px', '%'),
               'title' => esc_html__('Banner Image Width', 'abstrak'),
               'subtitle' => esc_html__('Set custom logo height. Default value: 50px', 'abstrak'),
               'height' => false,
               'output' => array(
                   'max-width' => '.breadcrumb-banner .banner-thumbnail.banner-axil_team_archive_image_size img'
               ),
               
              'required' => array(
                array('axil_team_archive_banner_template', 'not', '1'),
                array('axil_team_archive_banner_template', 'not', '3'),
             ),
           ),
          array(
             'id' => 'axil_team_archive_banner_shape',
             'title' => esc_html__('Archive Banner Shape', 'abstrak'),           
             'type' => 'media',
               
             'required' => array(
              array('axil_team_archive_banner_template', 'not', '2'),
              array('axil_team_archive_banner_template', 'not', '3'),
           ),

             'default' => array(
              'url' => AXIL_IMG_URL . 'banner/bubble-17.png'
             ),   
            
         ),   
         
          array(
             'id' => 'axil_team_archive_banner_shape2',
             'title' => esc_html__('Archive Banner Shape', 'abstrak'),           
             'type' => 'media',
              'required' => array('axil_team_archive_banner_template', 'not', '1'),
             'default' => array(
              'url' => AXIL_IMG_URL . 'banner/bubble-22.png'
             ),   
            
         ), 

        array(
            'id' => 'axil_team_archive_breadcrumb_enable',
            'type' => 'switch',
            'title' => esc_html__('Breadcrumb', 'abstrak'),
            'subtitle' => esc_html__('Enable or disable the breadcrumb area.', 'abstrak'),
            'default' => true,
             'required' => array(
              array('axil_team_archive_banner_template', 'not', '2'),
              array('axil_team_archive_banner_template', 'not', '3'),
           ),
        ),  

         array(
             'id' => 'axil_team_archive_banner_other_shape_enable',
             'type' => 'switch',
             'title' => esc_html__('Banner Shape Disable', 'abstrak'),
             'subtitle' => esc_html__('Enable or disable the banner Other shape style.', 'abstrak'),
             'default' => true,
         ),  

        array(
            'id' => 'axil_team_archive_designation_display',
            'type' => 'switch',
            'title' => esc_html__('Designation', 'abstrak'),
            'subtitle' => esc_html__('Enable or disable the Designation area.', 'abstrak'),
            'default' => true,
           
        ),  
        array(
            'id' => 'axil_team_archive_department_display',
            'type' => 'switch',
            'title' => esc_html__('Department', 'abstrak'),
            'subtitle' => esc_html__('Enable or disable the Department area.', 'abstrak'),
            'default' => true,
           
        ), 
        array(
            'id' => 'axil_team_archive_social_display',
            'type' => 'switch',
            'title' => esc_html__('Social Display', 'abstrak'),
            'subtitle' => esc_html__('Enable or disable the Social area.', 'abstrak'),
            'default' => true,
           
        ),
          array(
            'id' => 'axil_team_archive_post_per_page',
            'type' => 'text',
            'title' => esc_html__(' Team  Post par Page', 'abstrak'),
            'default' => '6', 
           
        ),


          array(
              'id'       => 'axil_team_col_lg',
              'type'     => 'select',
              'title'    => esc_html__( 'Desktops: > 1199px', 'abstrak'), 
              'options'  => array(
                  '12' => esc_html__( '1 Col', 'abstrak' ),
                  '6'  => esc_html__( '2 Col', 'abstrak' ),
                  '4'  => esc_html__( '3 Col', 'abstrak' ),
                  '3'  => esc_html__( '4 Col', 'abstrak' ),
                  '2'  => esc_html__( '6 Col', 'abstrak' ),
              ),
              'default'  => '4',
          ),  
          array(
              'id'       => 'axil_team_col_md',
              'type'     => 'select',
              'title'    => esc_html__( 'Desktops: > 991px', 'abstrak'), 
              'options'  => array(
                  '12' => esc_html__( '1 Col', 'abstrak' ),
                  '6'  => esc_html__( '2 Col', 'abstrak' ),
                  '4'  => esc_html__( '3 Col', 'abstrak' ),
                  '3'  => esc_html__( '4 Col', 'abstrak' ),
                  '2'  => esc_html__( '6 Col', 'abstrak' ),
              ),
              'default'  => '6',
          ),
          array(
              'id'       => 'axil_team_col_sm',
              'type'     => 'select',
              'title'    => esc_html__( 'Tablets: > 767px', 'abstrak'), 
              'options'  => array(
                  '12' => esc_html__( '1 Col', 'abstrak' ),
                  '6'  => esc_html__( '2 Col', 'abstrak' ),
                  '4'  => esc_html__( '3 Col', 'abstrak' ),
                  '3'  => esc_html__( '4 Col', 'abstrak' ),
                  '2'  => esc_html__( '6 Col', 'abstrak' ),
              ),
              'default'  => '12',
          ), 
         
        
    )
));

Redux::setSection($opt_name, array(
    'title' => esc_html__('Single', 'abstrak'),
    'id' => 'axil_team_single_banner_section',
    'icon' => 'el el-website',
    'subsection' => true,
    'fields' => array(
       array(
         'id' => 'axil_team_single_banner_enable',
         'type' => 'switch',
         'title' => esc_html__('Banner', 'abstrak'),
         'subtitle' => esc_html__('Enable or disable the banner area.', 'abstrak'),
         'default' => true,
     ),      

        array(
            'id' => 'axil_team_single_banner_template',
            'type' => 'image_select',
            'title' => esc_html__('Select Banner Layout', 'abstrak'),
            'options' => array(
                '1' => array(
                    'alt' => esc_html__('Banner Layout 1', 'abstrak'),
                    'title' => esc_html__('Banner Layout 1', 'abstrak'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/banner/1.jpg',
                ),
                '2' => array(
                    'alt' => esc_html__('Banner Layout 2', 'abstrak'),
                    'title' => esc_html__('Banner Layout 2', 'abstrak'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/banner/2.jpg',
                ),
                '3' => array(
                    'alt' => esc_html__('Banner Layout 3', 'abstrak'),
                    'title' => esc_html__('Banner Layout 3', 'abstrak'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/banner/3.jpg',
                ),
                
                
             
            ),
            'default' => '1',
            'required' => array('axil_team_single_banner_enable', 'equals', true),
        ), 
        
        array(
            'id' => 'axil_team_single_subtitle',
            'type' => 'text',
            'title' => esc_html__(' Sub Title', 'abstrak'),
            'default' => esc_html__(' We design and develop web and mobile applications for our clients worldwide', 'abstrak'),
             'required' => array(
              array('axil_team_single_banner_template', 'not', '1'),
               
           ),
           
        ),

        array(
            'id' => 'axil_team_single_banner_img',
            'title' => esc_html__('Archive Banner Image', 'abstrak'),           
            'type' => 'media',
             'required' => array('axil_team_single_banner_template', 'not', '1'),
            'default' => array(
             'url' => AXIL_IMG_URL . 'banner/banner-thumb-3.png'
            ),   
           
        ),   
          array(
            'id' => 'axil_team_single_image_size',
            'type' => 'dimensions',
            'units_extended' => true,
            'units' => array('rem', 'px', '%'),
            'title' => esc_html__('Banner Image Width', 'abstrak'),
            'subtitle' => esc_html__('Set custom logo height. Default value: 50px', 'abstrak'),
            'height' => false,
            'output' => array(
                'max-width' => '.breadcrumb-banner .banner-thumbnail.banner-axil_team_single_image_size img'
            ),
            
           'required' => array(
             array('axil_team_single_banner_template', 'not', '1'),
             array('axil_team_single_banner_template', 'not', '3'),
          ),
        ),
         array(
            'id' => 'axil_team_single_banner_shape',
            'title' => esc_html__('Archive Banner Shape', 'abstrak'),           
            'type' => 'media',
            
           'required' => array(
              array('axil_team_single_banner_template', 'not', '2'),
              array('axil_team_single_banner_template', 'not', '3'),
           ),
            'default' => array(
             'url' => AXIL_IMG_URL . 'banner/bubble-10.png'
            ),   
           
        ),   
          array(
             'id' => 'axil_team_single_banner_shape2',
             'title' => esc_html__('Archive Banner Shape', 'abstrak'),           
             'type' => 'media',
              'required' => array('axil_team_single_banner_template', 'not', '1'),
             'default' => array(
              'url' => AXIL_IMG_URL . 'banner/bubble-22.png'
             ),    
         ),   

        array(
            'id' => 'axil_team_single_breadcrumb_enable',
            'type' => 'switch',
            'title' => esc_html__('Breadcrumb', 'abstrak'),
            'subtitle' => esc_html__('Enable or disable the breadcrumb area.', 'abstrak'),
            'default' => true,
             'required' => array(
              array('axil_team_single_banner_template', 'not', '2'),
              array('axil_team_single_banner_template', 'not', '3'),
           ),
        ),
        array(
             'id' => 'axil_team_single_banner_other_shape_enable',
             'type' => 'switch',
             'title' => esc_html__('Banner Shape Disable', 'abstrak'),
             'subtitle' => esc_html__('Enable or disable the banner Other shape style.', 'abstrak'),
             'default' => true,
         ),  
       
    )
));



/**
 * Projects Panel
 */
Redux::setSection($opt_name, array(
    'title' => esc_html__('Projects', 'abstrak'),
    'id' => 'axil_projects_section',
    'icon' => 'el el-file-edit',
));



Redux::setSection($opt_name, array(
    'title' => esc_html__(' Archive', 'abstrak'),
    'id' => 'axil_projects_archive_banner_section',
    'icon' => 'el el-website',
     'subsection' => true,
    'fields' => array(
           array(
             'id' => 'axil_projects_archive_banner_enable',
             'type' => 'switch',
             'title' => esc_html__('Banner', 'abstrak'),
             'subtitle' => esc_html__('Enable or disable the banner area.', 'abstrak'),
             'default' => true,
         ),      

        array(
            'id' => 'axil_projects_archive_banner_template',
            'type' => 'image_select',
            'title' => esc_html__('Select Banner Layout', 'abstrak'),
            'options' => array(
                '1' => array(
                    'alt' => esc_html__('Banner Layout 1', 'abstrak'),
                    'title' => esc_html__('Banner Layout 1', 'abstrak'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/banner/1.jpg',
                ),
                '2' => array(
                    'alt' => esc_html__('Banner Layout 2', 'abstrak'),
                    'title' => esc_html__('Banner Layout 2', 'abstrak'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/banner/2.jpg',
                ),
                '3' => array(
                    'alt' => esc_html__('Banner Layout 3', 'abstrak'),
                    'title' => esc_html__('Banner Layout 3', 'abstrak'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/banner/3.jpg',
                ), 
             
            ),
            'default' => '1',
            'required' => array('axil_projects_archive_banner_enable', 'equals', true),
        ), 
       array(
            'id' => 'axil_projects_archive_title',
            'type' => 'text',
            'title' => esc_html__('Default Title', 'abstrak'),
            'subtitle' => esc_html__('Controls the Default title of the page page title are on the projects page.', 'abstrak'),
            'default' => esc_html__('All Projects', 'abstrak'),
             'required' => array('axil_projects_archive_banner_enable', 'equals', true),
           
        ),           
        array(
            'id' => 'axil_projects_archive_subtitle',
            'type' => 'text',
            'title' => esc_html__(' Sub Title', 'abstrak'),
            'default' => esc_html__(' We design and develop web and mobile applications for our clients worldwide', 'abstrak'),
               
           'required' => array(
              array('axil_projects_archive_banner_template', 'not', '1'),               
           ),
           
        ),

         array(
            'id' => 'axil_projects_archive_banner_img',
            'title' => esc_html__('Archive Banner Image', 'abstrak'),           
            'type' => 'media',
             'required' => array('axil_projects_archive_banner_template', 'not', '1'),
            'default' => array(
             'url' => AXIL_IMG_URL . 'banner/banner-thumb-3.png'
            ),   
           
        ),   

           array(
             'id' => 'axil_projects_archive_image_size',
             'type' => 'dimensions',
             'units_extended' => true,
             'units' => array('rem', 'px', '%'),
             'title' => esc_html__('Banner Image Width', 'abstrak'),
             'subtitle' => esc_html__('Set custom logo height. Default value: 50px', 'abstrak'),
             'height' => false,
             'output' => array(
                 'max-width' => '.breadcrumb-banner .banner-thumbnail.banner-axil_projects_archive_image_size img'
             ),
             
            'required' => array(
              array('axil_projects_archive_banner_template', 'not', '1'),
              array('axil_projects_archive_banner_template', 'not', '3'),
           ),
         ),
         array(
            'id' => 'axil_projects_archive_banner_shape',
            'title' => esc_html__('Archive Banner Shape', 'abstrak'),           
            'type' => 'media',
            
           'required' => array(
              array('axil_projects_archive_banner_template', 'not', '2'),
              array('axil_projects_archive_banner_template', 'not', '3'),
           ),
            'default' => array(
             'url' => AXIL_IMG_URL . 'banner/bubble-10.png'
            ),   
           
        ),   
          array(
             'id' => 'axil_projects_archive_banner_shape2',
             'title' => esc_html__('Archive Banner Shape', 'abstrak'),           
             'type' => 'media',
              'required' => array('axil_projects_archive_banner_template', 'not', '1'),
             'default' => array(
              'url' => AXIL_IMG_URL . 'banner/bubble-22.png'
             ),   
            
         ),   
        array(
            'id' => 'axil_projects_archive_breadcrumb_enable',
            'type' => 'switch',
            'title' => esc_html__('Breadcrumb', 'abstrak'),
            'subtitle' => esc_html__('Enable or disable the breadcrumb area.', 'abstrak'),
            'default' => true,
               
           'required' => array(
              array('axil_projects_archive_banner_template', 'not', '2'),
              array('axil_projects_archive_banner_template', 'not', '3'),
           ),
        ),
        array(
             'id' => 'axil_projects_archive_banner_other_shape_enable',
             'type' => 'switch',
             'title' => esc_html__('Banner Shape Disable', 'abstrak'),
             'subtitle' => esc_html__('Enable or disable the banner Other shape style.', 'abstrak'),
             'default' => true,
         ),  

        array(
            'id' => 'axil_projects_archive_sidebar',
            'type' => 'image_select',
            'title' => esc_html__('Select Blog Sidebar', 'abstrak'),
            'subtitle' => esc_html__('Choose your favorite blog layout', 'abstrak'),
            'options' => array(
                'left' => array(
                    'alt' => esc_html__('Left Sidebar', 'abstrak'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/layout/left-sidebar.png',
                    'title' => esc_html__('Left Sidebar', 'abstrak'),
                ),
                'right' => array(
                    'alt' => esc_html__('Right Sidebar', 'abstrak'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/layout/right-sidebar.png',
                    'title' => esc_html__('Right Sidebar', 'abstrak'),
                ),
                'no' => array(
                    'alt' => esc_html__('No Sidebar', 'abstrak'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/layout/no-sidebar.png',
                    'title' => esc_html__('No Sidebar', 'abstrak'),
                ),
            ),
            'default' => 'right',
        ),

        
          array(
            'id' => 'axil_projects_archive_post_per_page',
            'type' => 'text',
            'title' => esc_html__(' Projects Post par Page', 'abstrak'),
            'default' => '6',
             'required' => array('axil_projects_archive_banner_enable', 'equals', true),
           
        ),
        array(
              'id'       => 'axil_projects_archive_col_lg',
              'type'     => 'select',
              'title'    => esc_html__( 'Desktops: > 1199px', 'abstrak'), 
              'options'  => array(
                  '12' => esc_html__( '1 Col', 'abstrak' ),
                  '6'  => esc_html__( '2 Col', 'abstrak' ),
                  '4'  => esc_html__( '3 Col', 'abstrak' ),
                  '3'  => esc_html__( '4 Col', 'abstrak' ),
                  '2'  => esc_html__( '6 Col', 'abstrak' ),
              ),
              'default'  => '4',
          ),  
          array(
              'id'       => 'axil_projects_archive_col_md',
              'type'     => 'select',
              'title'    => esc_html__( 'Desktops: > 991px', 'abstrak'), 
              'options'  => array(
                  '12' => esc_html__( '1 Col', 'abstrak' ),
                  '6'  => esc_html__( '2 Col', 'abstrak' ),
                  '4'  => esc_html__( '3 Col', 'abstrak' ),
                  '3'  => esc_html__( '4 Col', 'abstrak' ),
                  '2'  => esc_html__( '6 Col', 'abstrak' ),
              ),
              'default'  => '6',
          ),
          array(
              'id'       => 'axil_projects_archive_col_sm',
              'type'     => 'select',
              'title'    => esc_html__( 'Tablets: > 767px', 'abstrak'), 
              'options'  => array(
                  '12' => esc_html__( '1 Col', 'abstrak' ),
                  '6'  => esc_html__( '2 Col', 'abstrak' ),
                  '4'  => esc_html__( '3 Col', 'abstrak' ),
                  '3'  => esc_html__( '4 Col', 'abstrak' ),
                  '2'  => esc_html__( '6 Col', 'abstrak' ),
              ),
              'default'  => '12',
          ), 
        
    )
));

Redux::setSection($opt_name, array(
    'title' => esc_html__('Single', 'abstrak'),
    'id' => 'axil_projects_single_banner_section',
    'icon' => 'el el-website',
    'subsection' => true,
    'fields' => array(
       array(
         'id' => 'axil_projects_single_banner_enable',
         'type' => 'switch',
         'title' => esc_html__('Banner', 'abstrak'),
         'subtitle' => esc_html__('Enable or disable the banner area.', 'abstrak'),
         'default' => true,
     ),      
        array(
            'id' => 'axil_projects_single_subtitle',
            'type' => 'text',
            'title' => esc_html__(' Sub Title', 'abstrak'),
            'default' => esc_html__(' We design and develop web and mobile applications for our clients worldwide', 'abstrak'),
           
            'required' => array('axil_projects_single_banner_enable', 'equals', true),
           
        ),
         array(
            'id' => 'axil_projects_single_banner_template',
            'type' => 'image_select',
            'title' => esc_html__('Select Banner Layout', 'abstrak'),
            'options' => array(
                '1' => array(
                    'alt' => esc_html__('Banner Layout 1', 'abstrak'),
                    'title' => esc_html__('Banner Layout 1', 'abstrak'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/banner/1.jpg',
                ),
                '2' => array(
                    'alt' => esc_html__('Banner Layout 2', 'abstrak'),
                    'title' => esc_html__('Banner Layout 2', 'abstrak'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/banner/2.jpg',
                ),
                '3' => array(
                    'alt' => esc_html__('Banner Layout 3', 'abstrak'),
                    'title' => esc_html__('Banner Layout 3', 'abstrak'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/banner/3.jpg',
                ),
                
                
             
            ),
            'default' => '1',
            'required' => array('axil_projects_single_banner_enable', 'equals', true),
        ),

         array(
             'id' => 'axil_projects_single_subtitle',
             'type' => 'text',
             'title' => esc_html__('Default Sub Title', 'abstrak'),
             
             'default' => esc_html__('A quick view of industry specific problems solved with design by the awesome team at Abstrak.', 'abstrak'),
               'required' => array(
                array('axil_projects_single_banner_template', 'not', '1'),
                 
             ),
         ),
      
           array(
             'id' => 'axil_projects_single_banner_img',
             'title' => esc_html__('Archive Banner Image', 'abstrak'),           
             'type' => 'media',
              'required' => array('axil_projects_single_banner_template', 'not', '1'),
             'default' => array(
              'url' => AXIL_IMG_URL . 'banner/banner-thumb-3.png'
             ),   
            
         ),   

             array(
               'id' => 'axil_projects_single_image_size',
               'type' => 'dimensions',
               'units_extended' => true,
               'units' => array('rem', 'px', '%'),
               'title' => esc_html__('Banner Image Width', 'abstrak'),
               'subtitle' => esc_html__('Set custom logo height. Default value: 50px', 'abstrak'),
               'height' => false,
               'output' => array(
                   'max-width' => '.breadcrumb-banner .banner-thumbnail.banner-axil_projects_single_image_size img'
               ),
               
              'required' => array(
                array('axil_projects_single_banner_template', 'not', '1'),
                array('axil_projects_single_banner_template', 'not', '3'),
             ),
           ),
          array(
             'id' => 'axil_projects_single_banner_shape',
             'title' => esc_html__('Archive Banner Shape', 'abstrak'),           
             'type' => 'media',
             'required' => array(
                array('axil_projects_single_banner_template', 'not', '2'),
                array('axil_projects_single_banner_template', 'not', '3'),
             ),
             'default' => array(
              'url' => AXIL_IMG_URL . 'banner/bubble-17.png'
             ),   
            
         ),   
         
          array(
             'id' => 'axil_projects_single_banner_shape2',
             'title' => esc_html__('Archive Banner Shape', 'abstrak'),           
             'type' => 'media',
              'required' => array('axil_projects_single_banner_template', 'not', '1'),
             'default' => array(
              'url' => AXIL_IMG_URL . 'banner/bubble-22.png'
             ),   
            
         ),   

        array(
            'id' => 'axil_projects_single_breadcrumb_enable',
            'type' => 'switch',
            'title' => esc_html__('Breadcrumb', 'abstrak'),
            'subtitle' => esc_html__('Enable or disable the breadcrumb area.', 'abstrak'),
            'default' => true,
            'required' => array(
                array('axil_projects_single_banner_template', 'not', '2'),
                array('axil_projects_single_banner_template', 'not', '3'),
             ),
        ),
        array(
             'id' => 'axil_projects_single_banner_other_shape_enable',
             'type' => 'switch',
             'title' => esc_html__('Banner Shape Disable', 'abstrak'),
             'subtitle' => esc_html__('Enable or disable the banner Other shape style.', 'abstrak'),
             'default' => true,
         ), 
       
    )
));


/**
 * Blog Panel
 */
Redux::setSection($opt_name, array(
    'title' => esc_html__('Blog', 'abstrak'),
    'id' => 'axil_blog_section',
    'icon' => 'el el-file-edit',
));

/**
 * Blog Options
 */
Redux::setSection($opt_name, array(
    'title' => esc_html__('Archive', 'abstrak'),
    'id' => 'axil_blog_genaral',
    'icon' => 'el el-edit',
    'subsection' => true,
    'fields' => array(

          array(
             'id' => 'axil_blog_banner_enable',
             'type' => 'switch',
             'title' => esc_html__('Banner', 'abstrak'),
             'subtitle' => esc_html__('Enable or disable the banner area.', 'abstrak'),
             'default' => true,
         ),      


        array(
            'id' => 'axil_blog_banner_template',
            'type' => 'image_select',
            'title' => esc_html__('Select Banner Layout', 'abstrak'),
            'options' => array(
               '1' => array(
                    'alt' => esc_html__('Banner Layout 1', 'abstrak'),
                    'title' => esc_html__('Banner Layout 1', 'abstrak'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/banner/1.jpg',
                ),
                '2' => array(
                    'alt' => esc_html__('Banner Layout 2', 'abstrak'),
                    'title' => esc_html__('Banner Layout 2', 'abstrak'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/banner/2.jpg',
                ),
                '3' => array(
                    'alt' => esc_html__('Banner Layout 3', 'abstrak'),
                    'title' => esc_html__('Banner Layout 3', 'abstrak'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/banner/3.jpg',
                ),
                
                
             
            ),
            'default' => '1',
            'required' => array('axil_blog_banner_enable', 'equals', true),
        ), 
        array(
            'id' => 'axil_blog_title',
            'type' => 'text',
            'title' => esc_html__('Blog Default Title', 'abstrak'),
            'subtitle' => esc_html__('Controls the Default title of the page which is displayed on the page title are on the blog page.', 'abstrak'),
            'default' => esc_html__('Blog', 'abstrak'),
             'required' => array('axil_blog_banner_enable', 'equals', true),
        ), 
        array(
            'id' => 'axil_blog_subtitle',
            'type' => 'text',
            'title' => esc_html__('Default Sub Title', 'abstrak'),
            
            'default' => esc_html__('A quick view of industry specific problems solved with design by the awesome team at Abstrak.', 'abstrak'),
            'required' => array(
                array('axil_blog_banner_template', 'not', '1'),
               
             ),
        ),

         array(
            'id' => 'axil_blog_breadcrumb_enable',
            'type' => 'switch',
            'title' => esc_html__('Breadcrumb', 'abstrak'),
            'subtitle' => esc_html__('Enable or disable the breadcrumb area.', 'abstrak'),
            'default' => true,
              'required' => array(
                array('axil_blog_banner_template', 'not', '2'),
                array('axil_blog_banner_template', 'not', '3'),
             ),
        ),

          
        array(
             'id' => 'axil_blog_banner_img',
             'title' => esc_html__('Archive Banner Image', 'abstrak'),           
             'type' => 'media',
              'required' => array('axil_blog_banner_template', 'not', '1'),
             'default' => array(
              'url' => AXIL_IMG_URL . 'banner/banner-thumb-3.png'
             ),   
            
         ),   
          array(
            'id' => 'axil_blog_image_size',
            'type' => 'dimensions',
            'units_extended' => true,
            'units' => array('rem', 'px', '%'),
            'title' => esc_html__('Banner Image Width', 'abstrak'),
            'subtitle' => esc_html__('Set custom logo height. Default value: 50px', 'abstrak'),
            'height' => false,
            'output' => array(
                'max-width' => '.breadcrumb-banner .banner-thumbnail.banner-axil_blog_image_size img'
            ),
            
           'required' => array(
             array('axil_blog_banner_template', 'not', '1'),
             array('axil_blog_banner_template', 'not', '3'),
          ),
        ),
          array(
             'id' => 'axil_blog_banner_shape',
             'title' => esc_html__('Archive Banner Shape', 'abstrak'),           
             'type' => 'media',
             'required' => array(
                array('axil_blog_banner_template', 'not', '2'),
                array('axil_blog_banner_template', 'not', '3'),
             ),
             'default' => array(
              'url' => AXIL_IMG_URL . 'banner/bubble-17.png'
             ),   
            
         ),   
         
          array(
             'id' => 'axil_blog_banner_shape2',
             'title' => esc_html__('Archive Banner Shape', 'abstrak'),           
             'type' => 'media',
              'required' => array('axil_blog_banner_template', 'not', '1'),
             'default' => array(
              'url' => AXIL_IMG_URL . 'banner/bubble-22.png'
             ),   
            
         ), 
        array(
             'id' => 'axil_blog_banner_other_shape_enable',
             'type' => 'switch',
             'title' => esc_html__('Banner Shape Disable', 'abstrak'),
             'subtitle' => esc_html__('Enable or disable the banner Other shape style.', 'abstrak'),
             'default' => true,
         ), 

        array(
            'id' => 'axil_blog_sidebar',
            'type' => 'image_select',
            'title' => esc_html__('Select Blog Sidebar', 'abstrak'),
            'subtitle' => esc_html__('Choose your favorite blog layout', 'abstrak'),
            'options' => array(
                'left' => array(
                    'alt' => esc_html__('Left Sidebar', 'abstrak'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/layout/left-sidebar.png',
                    'title' => esc_html__('Left Sidebar', 'abstrak'),
                ),
                'right' => array(
                    'alt' => esc_html__('Right Sidebar', 'abstrak'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/layout/right-sidebar.png',
                    'title' => esc_html__('Right Sidebar', 'abstrak'),
                ),
                'no' => array(
                    'alt' => esc_html__('No Sidebar', 'abstrak'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/layout/no-sidebar.png',
                    'title' => esc_html__('No Sidebar', 'abstrak'),
                ),
            ),
            'default' => 'right',
        ),
        array(
            'id' => 'axil_show_post_author_meta',
            'type' => 'button_set',
            'title' => esc_html__('Author', 'abstrak'),
            'subtitle' => esc_html__('Show or hide the author of blog post.', 'abstrak'),
            'options' => array(
                'yes' => esc_html__('Show', 'abstrak'),
                'no' => esc_html__('Hide', 'abstrak'),
            ),
            'default' => 'yes',
        ),
        array(
            'id' => 'axil_show_post_publish_date_meta',
            'type' => 'button_set',
            'title' => esc_html__('Publish Date', 'abstrak'),
            'subtitle' => esc_html__('Show or hide the publish date of blog post.', 'abstrak'),
            'options' => array(
                'yes' => esc_html__('Show', 'abstrak'),
                'no' => esc_html__('Hide', 'abstrak'),
            ),
            'default' => 'yes',
        ),   
        array(
            'id' => 'axil_read_time_view',
            'type' => 'button_set',
            'title' => esc_html__('Post Read Time ', 'abstrak'),
            'subtitle' => esc_html__('Show or hide the Post Read of blog post.', 'abstrak'),
            'options' => array(
                'yes' => esc_html__('Show', 'abstrak'),
                'no' => esc_html__('Hide', 'abstrak'),
            ),
            'default' => 'no',
        ), 
         array(
            'id' => 'axil_read_time_view_txt',
            'type' => 'text',
            'title' => esc_html__('Default  Min Read Text', 'abstrak'),
            
            'default' => esc_html__(' min read', 'abstrak'),
            'required' => array(
                array('axil_read_time_view', 'not', 'no'),
               
             ),
        ),
        array(
            'id' => 'axil_show_post_view',
            'type' => 'button_set',
            'title' => esc_html__('Post Min Read Text', 'abstrak'), 
            'options' => array(
                'yes' => esc_html__('Show', 'abstrak'),
                'no' => esc_html__('Hide', 'abstrak'),
            ),
            'default' => 'no',
        ),


             
       array(
            'id' => 'axil_show_blog_details_tags_meta',
            'type' => 'button_set',
            'title' => esc_html__('Tags', 'abstrak'),
            'subtitle' => esc_html__('Show or hide the Tags of blog post.', 'abstrak'),
            'options' => array(
                'yes' => esc_html__('Show', 'abstrak'),
                'no' => esc_html__('Hide', 'abstrak'),
            ),
            'default' => 'no',
        ),      
       array(
            'id' => 'axil_show_post_categories_meta',
            'type' => 'button_set',
            'title' => esc_html__('Categories', 'abstrak'),
            'subtitle' => esc_html__('Show or hide the Categoriesof blog post.', 'abstrak'),
            'options' => array(
                'yes' => esc_html__('Show', 'abstrak'),
                'no' => esc_html__('Hide', 'abstrak'),
            ),
            'default' => 'no',
        ),

       array(
           'id' => 'axil_read_more_btn',
           'type' => 'button_set',
           'title' => esc_html__('Post Read More ', 'abstrak'),
           'subtitle' => esc_html__('Show or hide the Post Read More Button.', 'abstrak'),
           'options' => array(
               'yes' => esc_html__('Show', 'abstrak'),
               'no' => esc_html__('Hide', 'abstrak'),
           ),
           'default' => 'no',
       ), 
        array(
           'id' => 'axil_read_more_btn_txt',
           'type' => 'text',
           'title' => esc_html__('Read More Button Text', 'abstrak'),
           
           'default' => esc_html__(' Read More', 'abstrak'),
           'required' => array(
               array('axil_read_more_btn', 'not', 'no'),
              
            ),
       ),

    )
));

/**
 * Single Post
 */
Redux::setSection($opt_name, array(
    'title' => esc_html__('Single', 'abstrak'),
    'id' => 'axil_single_post_details_id',
    'icon' => 'el el-website',
    'subsection' => true,
    'fields' => array(

    array(
             'id' => 'axil_single_post_banner_enable',
             'type' => 'switch',
             'title' => esc_html__('Banner', 'abstrak'),
             'subtitle' => esc_html__('Enable or disable the banner area.', 'abstrak'),
             'default' => true,
         ),      

            array(
            'id' => 'axil_single_post_banner_template',
            'type' => 'image_select',
            'title' => esc_html__('Select Banner Layout', 'abstrak'),
            'options' => array(
                '1' => array(
                    'alt' => esc_html__('Banner Layout 1', 'abstrak'),
                    'title' => esc_html__('Banner Layout 1', 'abstrak'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/banner/1.jpg',
                ),
                '2' => array(
                    'alt' => esc_html__('Banner Layout 2', 'abstrak'),
                    'title' => esc_html__('Banner Layout 2', 'abstrak'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/banner/2.jpg',
                ),
                '3' => array(
                    'alt' => esc_html__('Banner Layout 3', 'abstrak'),
                    'title' => esc_html__('Banner Layout 3', 'abstrak'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/banner/3.jpg',
                ),
                
                
             
            ),
            'default' => '1',
            'required' => array('axil_single_post_banner_enable', 'equals', true),
        ), 
        
      
            array(
            'id' => 'axil_single_post_subtitle',
            'type' => 'text',
            'title' => esc_html__('Default Sub Title', 'abstrak'),
            
            'default' => esc_html__('A quick view of industry specific problems solved with design by the awesome team at Abstrak.', 'abstrak'),
            'required' => array(
                array('axil_single_post_banner_template', 'not', '1'),
                 
             ),
        ),


         array(
            'id' => 'axil_single_post_breadcrumb_enable',
            'type' => 'switch',
            'title' => esc_html__('Breadcrumb', 'abstrak'),
            'subtitle' => esc_html__('Enable or disable the breadcrumb area.', 'abstrak'),
            'default' => true,
             'required' => array(
                array('axil_single_post_banner_template', 'not', '2'),
                array('axil_single_post_banner_template', 'not', '3'),
             ),
        ),
 
          array(
            'id' => 'axil_single_post_banner_img',
            'title' => esc_html__('Archive Banner Image', 'abstrak'),           
            'type' => 'media',
             'required' => array('axil_single_post_banner_template', 'not', '1'),
            'default' => array(
             'url' => AXIL_IMG_URL . 'banner/banner-thumb-3.png'
            ),   
           
        ),   
            array(
              'id' => 'axil_single_post_image_size',
              'type' => 'dimensions',
              'units_extended' => true,
              'units' => array('rem', 'px', '%'),
              'title' => esc_html__('Banner Image Width', 'abstrak'),
              'subtitle' => esc_html__('Set custom logo height. Default value: 50px', 'abstrak'),
              'height' => false,
              'output' => array(
                  'max-width' => '.breadcrumb-banner .banner-thumbnail.banner-axil_single_post_image_size img'
              ),
              
             'required' => array(
               array('axil_single_post_banner_template', 'not', '1'),
               array('axil_single_post_banner_template', 'not', '3'),
            ),
          ),
         array(
            'id' => 'axil_single_post_banner_shape',
            'title' => esc_html__('Archive Banner Shape', 'abstrak'),           
            'type' => 'media',                 
             'required' => array(
                array('axil_single_post_banner_template', 'not', '2'),
                array('axil_single_post_banner_template', 'not', '3'),
             ),
            'default' => array(
             'url' => AXIL_IMG_URL . 'banner/bubble-17.png'
            ),   
           
        ),   
       
         array(
            'id' => 'axil_single_post_banner_shape2',
            'title' => esc_html__('Archive Banner Shape', 'abstrak'),           
            'type' => 'media',
             'required' => array('axil_single_post_banner_template', 'not', '1'),
            'default' => array(
             'url' => AXIL_IMG_URL . 'banner/bubble-22.png'
            ),   
           
        ),    

          array(
             'id' => 'axil_blog_banner_other_shape_enable',
             'type' => 'switch',
             'title' => esc_html__('Banner Shape Disable', 'abstrak'),
             'subtitle' => esc_html__('Enable or disable the banner Other shape style.', 'abstrak'),
             'default' => true,
         ), 

         array( 
              'id' => 'axil_single_post_banner_other_shape_enable',
              'type' => 'switch',
              'title' => esc_html__('Banner Shape Disable', 'abstrak'),
              'subtitle' => esc_html__('Enable or disable the banner Other shape style.', 'abstrak'),
              'default' => true,
          ), 
        array(
            'id' => 'axil_single_pos',
            'type' => 'image_select',
            'title' => esc_html__('Blog Details Sidebar', 'abstrak'),
            'subtitle' => esc_html__('Choose your favorite layout', 'abstrak'),
            'options' => array(
                'left' => array(
                    'alt' => esc_html__('Left Sidebar', 'abstrak'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/layout/left-sidebar.png',
                    'title' => esc_html__('Left Sidebar', 'abstrak'),
                ),
                'right' => array(
                    'alt' => esc_html__('Right Sidebar', 'abstrak'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/layout/right-sidebar.png',
                    'title' => esc_html__('Right Sidebar', 'abstrak'),
                ),
                'full' => array(
                    'alt' => esc_html__('No Sidebar', 'abstrak'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/layout/no-sidebar.png',
                    'title' => esc_html__('No Sidebar', 'abstrak'),
                ),
            ),
            'default' => 'full',
        ), 
    


    array(
            'id' => 'axil_show_single_post_author_meta',
            'type' => 'button_set',
            'title' => esc_html__('Author', 'abstrak'),
            'subtitle' => esc_html__('Show or hide the author of blog post.', 'abstrak'),
            'options' => array(
                'yes' => esc_html__('Show', 'abstrak'),
                'no' => esc_html__('Hide', 'abstrak'),
            ),
            'default' => 'yes',
        ),
        array(
            'id' => 'axil_show_post_single_publish_date_meta',
            'type' => 'button_set',
            'title' => esc_html__('Publish Date', 'abstrak'),
            'subtitle' => esc_html__('Show or hide the publish date of blog post.', 'abstrak'),
            'options' => array(
                'yes' => esc_html__('Show', 'abstrak'),
                'no' => esc_html__('Hide', 'abstrak'),
            ),
            'default' => 'yes',
        ),   
        array(
            'id' => 'axil_show_post_single_view',
            'type' => 'button_set',
            'title' => esc_html__('Reading Time', 'abstrak'),
            'subtitle' => esc_html__('Show or hide the post Reading Time.', 'abstrak'),
            'options' => array(
                'yes' => esc_html__('Show', 'abstrak'),
                'no' => esc_html__('Hide', 'abstrak'),
            ),
            'default' => 'no',
        ),
             
       array(
            'id' => 'axil_show_blog_single_details_tags_meta',
            'type' => 'button_set',
            'title' => esc_html__('Tags', 'abstrak'),
            'subtitle' => esc_html__('Show or hide the Tags of blog post.', 'abstrak'),
            'options' => array(
                'yes' => esc_html__('Show', 'abstrak'),
                'no' => esc_html__('Hide', 'abstrak'),
            ),
            'default' => 'no',
        ),      
       array(
            'id' => 'axil_show_post_single_categories_meta',
            'type' => 'button_set',
            'title' => esc_html__('Categories', 'abstrak'),
            'subtitle' => esc_html__('Show or hide the Categoriesof blog post.', 'abstrak'),
            'options' => array(
                'yes' => esc_html__('Show', 'abstrak'),
                'no' => esc_html__('Hide', 'abstrak'),
            ),
            'default' => 'no',
        ),
    

        array(
            'id' => 'axil_blog_details_show_author_info',
            'type' => 'switch',
            'title' => esc_html__('Show Author Info', 'abstrak'),
            'subtitle' => esc_html__('Show or hide the Author Info box of single post.', 'abstrak'),
            'default' => false,
        ),
       
        
       
  
    )
));

/**
 * footer Top
 */

Redux::setSection($opt_name, array(
    'title' => esc_html__('Footer Top', 'abstrak'),
    'id' => 'axil_footer_top_section',
    'icon' => 'el el-credit-card',
    'fields' => array(
        array(
            'id' => 'axil_footer_top_enable',
            'type' => 'switch',
            'title' => esc_html__('Footer Top', 'abstrak'),
            'subtitle' => esc_html__('Enable or disable the footer top area.', 'abstrak'),
            'default' => false,
        ),

            array(
                'id' => 'axil_select_footer_top_template',
                'type' => 'image_select',
                'title' => esc_html__('Select Footer Top Layout', 'etrade'),
                'options' => array(
                    '1' => array(
                        'alt' => esc_html__('Footer Top Layout 1', 'etrade'),
                        'title' => esc_html__('Footer Top Layout 1', 'etrade'),
                        'img' => get_template_directory_uri() . '/assets/images/optionframework/footer-top/1.png',
                    ),
                    '2' => array(
                        'alt' => esc_html__('Footer Top Layout 2', 'etrade'),
                        'title' => esc_html__('Footer Top Layout 2', 'etrade'),
                        'img' => get_template_directory_uri() . '/assets/images/optionframework/footer-top/2.png',
                    ),
                    '3' => array(
                        'alt' => esc_html__('Footer Top Layout 3', 'etrade'),
                        'title' => esc_html__('Footer Top Layout 3', 'etrade'),
                        'img' => get_template_directory_uri() . '/assets/images/optionframework/footer-top/3.png',
                    ),
                     
                ),
                'default' => '1',
                'required' => array('axil_footer_top_enable', 'equals', true),
            ),
        
        array(
            'id' => 'axil_ft_title',
            'type' => 'text',
            'title' => esc_html__('Title', 'abstrak'),
            'default' => 'Lets Work Together',
            'required' => array('axil_select_footer_top_template', 'equals', '1'),
        ), 
        array(
            'id' => 'axil_ft_sub_title',
            'type' => 'text',
            'title' => esc_html__('Sub Title', 'abstrak'),
            'default' => 'Need a successful project?',
            'required' => array('axil_select_footer_top_template', 'equals', '1'),
        ),

        array(
            'id' => 'axil_ft_btn_txt',
            'type' => 'text',
            'title' => esc_html__('Button Text', 'abstrak'),
            'default' => esc_html__('Estimate Project', 'abstrak'),
            'required' => array('axil_select_footer_top_template', 'equals', '1'),
        ),
        array(
            'id' => 'axil_ft_btn_url',
            'type' => 'text',
            'title' => esc_html__('Button Url', 'abstrak'),
            'default' => '#',
            'required' => array('axil_select_footer_top_template', 'equals', '1'),
        ),

        array(
            'id' => 'axil_footer_top_img_enable',
            'type' => 'switch',
            'title' => esc_html__('Footer Top Image Enable', 'abstrak'),
            'subtitle' => esc_html__('Enable or disable the footer top Image Group area.', 'abstrak'),
            'default' => '1',
            'required' => array('axil_select_footer_top_template', 'equals', '1'),
        ),  

        array(
            'id' => 'axil_ft_btn_img',
            'title' => esc_html__('Footer Top Image', 'abstrak'),            
            'type' => 'media',
            'default' => array(
                'url' => AXIL_IMG_URL . 'footer/chat-group.png'
            ),
            'required' => array('axil_footer_top_img_enable', 'equals', true),
        ),
 
        array(
            'id' => 'axil_ft_btn_img1',
            'title' => esc_html__('Image 1', 'abstrak'),            
            'type' => 'media',
            'default' => array(
                'url' => AXIL_IMG_URL . 'footer/laptop-poses.png'
            ),
          'required' => array('axil_footer_top_img_enable', 'equals', true),
        ),
       
        array(
            'id' => 'axil_ft_btn_img2',
            'title' => esc_html__('Image 2', 'abstrak'),            
            'type' => 'media',
            'default' => array(
                'url' => AXIL_IMG_URL . 'footer/bill-pay.png'
            ),
            'required' => array('axil_footer_top_img_enable', 'equals', true),
        ),
  

        array(
            'id' => 'axil_footer_top_shape_group_enable',
            'type' => 'switch',
            'title' => esc_html__(' Shape Group', 'abstrak'),
            'subtitle' => esc_html__('Enable or disable the footer Shape Group area', 'abstrak'),
            'default' => true,
            'required' => array('axil_footer_top_img_enable', 'equals', true),
        ),      
  
        array(
            'id' => 'axil_ft_title2',
            'type' => 'text',
            'title' => esc_html__('Title', 'abstrak'),
            'default' => 'Want to talk to a marketing expert?',
            'required' => array('axil_select_footer_top_template', 'equals', '2'),
        ), 
        array(
            'id' => 'axil_ft_sub_title2',
            'type' => 'text',
            'title' => esc_html__('Sub Title', 'abstrak'),
            'default' => 'Need a successful project?',
            'required' => array('axil_select_footer_top_template', 'equals', '2'),
        ),
        array(
            'id' => 'axil_ft_btn_txt2',
            'type' => 'text',
            'title' => esc_html__('Button Text', 'abstrak'),
            'default' => esc_html__('Contact With Us', 'abstrak'),
            'required' => array('axil_select_footer_top_template', 'equals', '2'),
        ),
        array(
            'id' => 'axil_ft_btn_url2',
            'type' => 'text',
            'title' => esc_html__('Button Url', 'abstrak'),
            'default' => '#',
            'required' => array('axil_select_footer_top_template', 'equals', '2'),
        ),

        

    )
));


/**
 * Footer section
 */
Redux::setSection($opt_name, array(
    'title' => esc_html__('Footer', 'abstrak'),
    'id' => 'axil_footer_section',
    'icon' => 'el el-photo',
    'fields' => array(
        array(
            'id' => 'axil_footer_enable',
            'type' => 'switch',
            'title' => esc_html__('Footer', 'abstrak'),
            'subtitle' => esc_html__('Enable or disable the footer area.', 'abstrak'),
            'default' => true,
        ),     
          // Header Custom Style
            array(
                'id' => 'axil_select_footer_template',
                'type' => 'image_select',
                'title' => esc_html__('Select Footer Layout', 'abstrak'),
                'options' => array(
                    '1' => array(
                        'alt' => esc_html__('Footer Layout 1', 'abstrak'),
                        'title' => esc_html__('Footer Layout 1', 'abstrak'),
                        'img' => get_template_directory_uri() . '/assets/images/optionframework/footer/1.png',
                    ),
                    '2' => array(
                        'alt' => esc_html__('Footer Layout 2', 'abstrak'),
                        'title' => esc_html__('Footer Layout 2', 'abstrak'),
                        'img' => get_template_directory_uri() . '/assets/images/optionframework/footer/2.png',
                    ),
                    '3' => array(
                        'alt' => esc_html__('Footer Layout 3', 'abstrak'),
                        'title' => esc_html__('Footer Layout 3', 'abstrak'),
                        'img' => get_template_directory_uri() . '/assets/images/optionframework/footer/3.png',
                    ),
                 
                ),
                'default' => '2',
                'required' => array('axil_footer_enable', 'equals', true),
            ),  
        array(
            'id' => 'axil_footer_footerbottom',
            'type' => 'switch',
            'title' => esc_html__('Footer Bottom Menu', 'abstrak'),
            'subtitle' => esc_html__('Enable or disable the footer Menu.', 'abstrak'),
            'default' => false,
            'required' => array('axil_footer_enable', 'equals', true),            
        ),
         array(
            'id' => 'axil_copyright_contact',
            'type' => 'editor',
            'title' => esc_html__('Copyright Content', 'abstrak'),
            'args' => array(
                'teeny' => true,
                'textarea_rows' => 5,
            ),
            'default' => '© 2022. All rights reserved by <a href="https://axilthemes.com/" target="_blank" rel="noopener">Axilthemes.</a>',
            'required' => array('axil_footer_enable', 'equals', true),
        ),
      
    )
));

Redux::setSection($opt_name,
    array(
        'title' => esc_html__('Under Construction', 'abstrak'),
        'id' => 'under_construction_sttings_section',
        'heading' => esc_html__('Under Construction', 'abstrak'),
        'icon' => 'el el-error-alt',
         
        'fields' => array(
            array(
                'id'                    => 'under_construction_mode_enable',
                'type'                  => 'button_set',
                'title'                 => esc_html__('Under Construction / Coming Soon Mode', 'abstrak'),
                'subtitle'              => esc_html__('If enable, the frontend shows maintenance / coming soon mode page only.', 'abstrak'),
                'options'               => array(
                    'on'                => 'Enable',
                    'off'               => 'Disable'
                ),
                'default'               => 'off'
            ),
            array(
                'id' => 'under_construction_title_text',
                'type' => 'text',
                'title' => esc_html__('Page Title', 'abstrak'),
                'default' => esc_html__('Our new website is on its way', 'abstrak'),
                'required'              => array('under_construction_mode_enable','equals', 'on'),
            ),
            array(
                'id' => 'under_construction_subtitle_text',
                'type' => 'text',
                'title' => esc_html__('Sub Title', 'abstrak'),
                'default' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'abstrak'),
                'required'              => array('under_construction_mode_enable','equals', 'on'),
            ),
            array(
                'id'       => 'under_construction_mailchimp_form_shortcode',
                'type'     => 'text',
                'title'    => esc_html__( 'Mailchimp Form Shortcode', 'abstrak' ),
                'subtitle' => esc_html__( 'Use the shortcode that create Mailchimp Form', 'abstrak' ),
                'required'              => array('under_construction_mode_enable','equals', 'on'),
            ),

            array(
                'id'       => 'under_construction_page_image',
                'type'     => 'media',
                'title'    => esc_html__( 'Under Construction Image', 'abstrak' ),
                 'default' => array(
                    'url' => AXIL_IMG_URL . 'coming-soon/coming-soon.png'
            ), 
            'required'              => array('under_construction_mode_enable','equals', 'on'),
            ),

            array(
                'id'       => 'under_construction_page_shape',
                'type'     => 'media',
                'title'    => esc_html__( 'Under Construction Shape', 'abstrak' ),
                'default'  => array(
                    'url' => AXIL_IMG_URL . 'coming-soon/bubble-28.png'
                ),
                'required'              => array('under_construction_mode_enable','equals', 'on'),
            ),
            array(
                'id'       => 'under_construction_page_line',
                'type'     => 'media',
                'title'    => esc_html__( 'Under Construction Line', 'abstrak' ),
                'default'  => array(
                    'url' => AXIL_IMG_URL . 'coming-soon/line-4.png'
                ),
                'required'              => array('under_construction_mode_enable','equals', 'on'),
            ),

             array(
                'id' => 'cd_days',
                'type' => 'text',            
                'title' => esc_html__('Countdown Days label', 'abstrak'),            
                'default' => 'Days',
                'required'              => array('under_construction_mode_enable','equals', 'on'),

            ),
            array(
                'id' => 'cd_hour',
                'type' => 'text',            
                'title' => esc_html__('Countdown Hour label', 'abstrak'),    
                
                'default' => 'Hour',
                'required'    => array('under_construction_mode_enable','equals', 'on'),        
            ),
            array(
                'id' => 'cd_minute',
                'type' => 'text',            
                'title' => esc_html__('Countdown Minute label', 'abstrak'),            
                'default' => 'Minute',
                'required'              => array('under_construction_mode_enable','equals', 'on'),
            ),
            array(
                'id' => 'cd_second',
                'type' => 'text',            
                'title' => esc_html__('Countdown Second label', 'abstrak'),            
                'default' => 'Second',
                'required'              => array('under_construction_mode_enable','equals', 'on'),

            ),

             array(
                'id'          => 'under_construction_date',
                'type'        => 'date',
                'title'       => __('Date Option', 'abstrak'), 
                'subtitle'    => __('No validation can be done on this field type', 'abstrak'),
                'desc'        => __('This is the description field, again good for additional info.', 'abstrak'),
                'required'              => array('under_construction_mode_enable','equals', 'on'),
                'placeholder' => 'Click to enter a date'

            ),
            
        )
    ) );

/**
 * 404 error page
 */
Redux::setSection($opt_name, array(
    'title' => esc_html__('404 Page', 'abstrak'),
    'id' => 'axil_error_page',
    'icon' => 'el el-eye-close',
    'fields' => array(
        array(
            'id' => 'axil_404_title',
            'type' => 'text',
            'title' => esc_html__('Title', 'abstrak'),
            'subtitle' => esc_html__('Add your Default title.', 'abstrak'),
            'value' => 'Page not Found',
            'default' => esc_html__('Page not Found', 'abstrak'),
        ),

        array(
            'id' => 'axil_404_subtitle',
            'type' => 'text',
            'title' => esc_html__('Sub Title', 'abstrak'),
            'subtitle' => esc_html__('Add your custom subtitle.', 'abstrak'),
            'default' => esc_html__('Sorry, but the page you were looking for could not be found.', 'abstrak'),
        ),

        array(
            'id' => 'axil_enable_go_back_btn',
            'type' => 'button_set',
            'title' => esc_html__('Button', 'abstrak'),
            'subtitle' => esc_html__('Enable or disable the go to home page button.', 'abstrak'),
            'options' => array(
                'yes' => 'Enable',
                'no' => 'Disable'
            ),
            'default' => 'yes'
        ),

        array(
            'id' => 'axil_button_text',
            'type' => 'text',
            'title' => esc_html__('Button Text', 'abstrak'),
            'subtitle' => esc_html__('Set the custom text of go to home page button.', 'abstrak'),
            'default' => esc_html__('Back to Homepage', 'abstrak'),
            'required' => array('axil_enable_go_back_btn', 'equals', 'yes'),
        ),
         array(
            'id' => 'axil_404_banner',
            'title' => esc_html__(' Banner Image', 'abstrak'),           
            'type' => 'media',             
            'default' => array(
             'url' => AXIL_IMG_URL . 'banner/404.png'
            ),   
           
        ),   

          array( 
              'id' => 'axil_404_other_shape_enable',
              'type' => 'switch',
              'title' => esc_html__('404 Others Shape Disable', 'abstrak'),
              'subtitle' => esc_html__('Enable or disable the banner Other shape style.', 'abstrak'),
              'default' => true,
          ),  
    )
));

/**
 * Typography
 */
Redux::setSection($opt_name, array(
    'title' => esc_html__('Typography', 'abstrak'),
    'id' => 'axil_fonts',
    'icon' => 'el el-fontsize',
    'fields' => array(
        array(
            'id' => 'axil_h1_typography',
            'type' => 'typography',
            'title' => esc_html__('H1 Heading Typography (Default size: 56px)', 'abstrak'),
            'subtitle' => esc_html__('Controls the typography settings of the H1 heading.', 'abstrak'),
            'google' => true,
            'text-transform' => true,
            'word-spacing' => true,
            'letter-spacing' => true,
            'subsets' => false,
            'text-align' => false,
            'all_styles' => true,
            'color' => false,
            'units' => 'px',
            'output' => array('h1, .h1'),
        ),
        array(
            'id' => 'axil_h2_typography',
            'type' => 'typography',
            'title' => esc_html__('H2 Heading Typography (Default size: 50px)', 'abstrak'),
            'subtitle' => esc_html__('Controls the typography settings of the H2 heading.', 'abstrak'),
            'google' => true,
            'text-transform' => true,
            'letter-spacing' => true,
            'word-spacing' => true,
            'subsets' => false,
            'text-align' => false,
            'all_styles' => true,
            'color' => false,
            'units' => 'px',
            'output' => array('h2, .h2'),
        ),
        array(
            'id' => 'axil_h3_typography',
            'type' => 'typography',
            'title' => esc_html__('H3 Heading Typography (Default size: 35px)', 'abstrak'),
            'subtitle' => esc_html__('Controls the typography settings of the H3 heading.', 'abstrak'),
            'google' => true,
            'text-transform' => true,
            'letter-spacing' => true,
            'word-spacing' => true,
            'subsets' => false,
            'text-align' => false,
            'all_styles' => true,
            'color' => false,
            'units' => 'px',
            'output' => array('h3, .h3'),
        ),
        array(
            'id' => 'axil_h4_typography',
            'type' => 'typography',
            'title' => esc_html__('H4 Heading Typography (Default size: 26px)', 'abstrak'),
            'subtitle' => esc_html__('Controls the typography settings of the H4 heading.', 'abstrak'),
            'google' => true,
            'text-transform' => true,
            'word-spacing' => true,
            'letter-spacing' => true,
            'subsets' => false,
            'text-align' => false,
            'all_styles' => true,
            'color' => false,
            'units' => 'px',
            'output' => array('h4, .h4'),
        ),
        array(
            'id' => 'axil_h5_typography',
            'type' => 'typography',
            'title' => esc_html__('H5 Heading Typography (Default size: 22px)', 'abstrak'),
            'subtitle' => esc_html__('Controls the typography settings of the H5 heading.', 'abstrak'),
            'google' => true,
            'text-transform' => true,
            'word-spacing' => true,
            'letter-spacing' => true,
            'subsets' => false,
            'text-align' => false,
            'all_styles' => true,
            'color' => false,
            'units' => 'px',
            'output' => array('h5, .h5'),
        ),
        array(
            'id' => 'axil_h6_typography',
            'type' => 'typography',
            'title' => esc_html__('H6 Heading Typography (Default size: 16px)', 'abstrak'),
            'subtitle' => esc_html__('Controls the typography settings of the H6 heading.', 'abstrak'),
            'google' => true,
            'text-transform' => true,
            'word-spacing' => true,
            'letter-spacing' => true,
            'subsets' => false,
            'text-align' => false,
            'all_styles' => true,
            'color' => false,
            'units' => 'px',
            'output' => array('h6, .h6'),
        ),

        array(
            'id' => 'axil_b3_typography',
            'type' => 'typography',
            'title' => esc_html__('Body Typography (Default size: 18px)', 'abstrak'),
            'subtitle' => esc_html__('B3 is used in subtitle, paragraph, footer link and body', 'abstrak'),
            'google' => true,
            'subsets' => false,
            'word-spacing' => true,
            'letter-spacing' => true,
            'text-align' => false,
            'all_styles' => true,
            'color' => false,
            'output' => array('body, p'),
            'units' => 'px',
        ),


    )
) );

/**
 * WooCommerce
 */
if ( class_exists( 'WooCommerce' ) ) {

    Redux::setSection($opt_name, array(
        'title' => esc_html__('WooCommerce', 'abstrak'),
        'id' => 'woo_Settings_section',
        'icon' => 'el el-shopping-cart',
    ));
    /**
     * WooCommerce Archive
     */
    Redux::setSection($opt_name, array(
        'title' => esc_html__('General', 'abstrak'),
        'id' => 'wc_sec_general',
        'icon' => 'el el-folder-open',
        'subsection' => true,
        'fields' => array(
            array(
                'id' => 'wc_general_sidebar',
                'type' => 'image_select',
                'title' => esc_html__('Select Shop Sidebar', 'abstrak'),
                'subtitle' => esc_html__('Choose your favorite shop layout', 'abstrak'),
                'options' => array(
                    'left' => array(
                        'alt' => esc_html__('Left Sidebar', 'abstrak'),
                        'img' => get_template_directory_uri() . '/assets/images/optionframework/layout/left-sidebar.png',
                        'title' => esc_html__('Left Sidebar', 'abstrak'),
                    ),
                    'right' => array(
                        'alt' => esc_html__('Right Sidebar', 'abstrak'),
                        'img' => get_template_directory_uri() . '/assets/images/optionframework/layout/right-sidebar.png',
                        'title' => esc_html__('Right Sidebar', 'abstrak'),
                    ),
                    'no' => array(
                        'alt' => esc_html__('No Sidebar', 'abstrak'),
                        'img' => get_template_directory_uri() . '/assets/images/optionframework/layout/no-sidebar.png',
                        'title' => esc_html__('No Sidebar', 'abstrak'),
                    ),
                ),
                'default' => 'no',
            ),
            array(
                'id'       => 'wc_num_product_per_row',
                'type'     => 'text',
                'title'    => esc_html__( 'Number of Products Per Row', 'abstrak' ),
                'default'  => '3',
            ),
            array(
                'id'       => 'wc_num_product',
                'type'     => 'text',
                'title'    => esc_html__( 'Number of Products Per Page', 'abstrak' ),
                'default'  => '12',
            ),

         array(
             'id' => 'axil_shop_banner_enable',
             'type' => 'switch',
             'title' => esc_html__('Banner', 'abstrak'),
             'subtitle' => esc_html__('Enable or disable the banner area.', 'abstrak'),
             'default' => true,
         ),      

             array(
            'id' => 'axil_shop_banner_template',
            'type' => 'image_select',
            'title' => esc_html__('Select Banner Layout', 'abstrak'),
            'options' => array(
               '1' => array(
                   'alt' => esc_html__('Banner Layout 1', 'abstrak'),
                   'title' => esc_html__('Banner Layout 1', 'abstrak'),
                   'img' => get_template_directory_uri() . '/assets/images/optionframework/header/1.png',
                ),
                '2' => array(
                   'alt' => esc_html__('Banner Layout 2', 'abstrak'),
                   'title' => esc_html__('Banner Layout 2', 'abstrak'),
                   'img' => get_template_directory_uri() . '/assets/images/optionframework/header/2.png',
                ),
                '3' => array(
                   'alt' => esc_html__('Banner Layout 3', 'abstrak'),
                   'title' => esc_html__('Banner Layout 2', 'abstrak'),
                   'img' => get_template_directory_uri() . '/assets/images/optionframework/header/2.png',
                ),
                
             
            ),
            'default' => '1',
            'required' => array('axil_shop_banner_enable', 'equals', true),
        ), 
       array(
            'id' => 'axil_shop_title',
            'type' => 'text',
            'title' => esc_html__('Default Title', 'abstrak'),
            'subtitle' => esc_html__('Controls the Default title of the page page title are on the team page.', 'abstrak'),
            'default' => esc_html__('All services', 'abstrak'),
             'required' => array('axil_shop_banner_enable', 'equals', true),
           
        ),           
        array(
            'id' => 'axil_shop_subtitle',
            'type' => 'text',
            'title' => esc_html__(' Sub Title', 'abstrak'),
            'default' => esc_html__(' We design and develop web and mobile applications for our clients worldwide', 'abstrak'),
              'required' => array(
              array('axil_shop_banner_template', 'not', '1'),
              
           ),
           
        ),
           array(
             'id' => 'axil_shop_banner_img',
             'title' => esc_html__('Archive Banner Image', 'abstrak'),           
             'type' => 'media',
              'required' => array('axil_shop_banner_template', 'not', '1'),
             'default' => array(
              'url' => AXIL_IMG_URL . 'banner/banner-thumb-3.png'
             ),   
            
         ),   
             array(
               'id' => 'axil_shop_image_size',
               'type' => 'dimensions',
               'units_extended' => true,
               'units' => array('rem', 'px', '%'),
               'title' => esc_html__('Banner Image Width', 'abstrak'),
               'subtitle' => esc_html__('Set custom logo height. Default value: 50px', 'abstrak'),
               'height' => false,
               'output' => array(
                   'max-width' => '.breadcrumb-banner .banner-thumbnail.banner-axil_shop_image_size img'
               ),
               
              'required' => array(
                array('axil_shop_banner_template', 'not', '1'),
                array('axil_shop_banner_template', 'not', '3'),
             ),
           ),
          array(
             'id' => 'axil_shop_banner_shape',
             'title' => esc_html__('Archive Banner Shape', 'abstrak'),           
             'type' => 'media',
               
             'required' => array(
              array('axil_shop_banner_template', 'not', '2'),
              array('axil_shop_banner_template', 'not', '3'),
           ),

             'default' => array(
              'url' => AXIL_IMG_URL . 'banner/bubble-17.png'
             ),   
            
         ),   
         
          array(
             'id' => 'axil_shop_banner_shape2',
             'title' => esc_html__('Archive Banner Shape', 'abstrak'),           
             'type' => 'media',
              'required' => array('axil_shop_banner_template', 'not', '1'),
             'default' => array(
              'url' => AXIL_IMG_URL . 'banner/bubble-22.png'
             ),   
            
         ), 

        array(
            'id' => 'axil_shop_breadcrumb_enable',
            'type' => 'switch',
            'title' => esc_html__('Breadcrumb', 'abstrak'),
            'subtitle' => esc_html__('Enable or disable the breadcrumb area.', 'abstrak'),
            'default' => true,
             'required' => array(
              array('axil_shop_banner_template', 'not', '2'),
              array('axil_shop_banner_template', 'not', '3'),
           ),
        ),  

         array(
             'id' => 'axil_shop_banner_other_shape_enable',
             'type' => 'switch',
             'title' => esc_html__('Banner Shape Disable', 'abstrak'),
             'subtitle' => esc_html__('Enable or disable the banner Other shape style.', 'abstrak'),
             'default' => true,
         ), 

        )
    ));
    /**
     * WooCommerce Single Page
     */
    Redux::setSection($opt_name, array(
        'title' => esc_html__('Product Single Page', 'abstrak'),
        'id' => 'wc_sec_product',
        'icon' => 'el el-folder-open',
        'subsection' => true,
        'fields' => array(
            array(
                'id' => 'axil_products_banner_enable',
                'type' => 'switch',
                'title' => esc_html__('Banner', 'abstrak'),
                'subtitle' => esc_html__('Enable or disable the banner area.', 'abstrak'),
                'default' => true,
            ),     
              array(
            'id' => 'axil_products_banner_template',
            'type' => 'image_select',
            'title' => esc_html__('Select Banner Layout', 'abstrak'),
            'options' => array(
               '1' => array(
                   'alt' => esc_html__('Banner Layout 1', 'abstrak'),
                   'title' => esc_html__('Banner Layout 1', 'abstrak'),
                   'img' => get_template_directory_uri() . '/assets/images/optionframework/header/1.png',
                ),
                '2' => array(
                   'alt' => esc_html__('Banner Layout 2', 'abstrak'),
                   'title' => esc_html__('Banner Layout 2', 'abstrak'),
                   'img' => get_template_directory_uri() . '/assets/images/optionframework/header/2.png',
                ),
                '3' => array(
                   'alt' => esc_html__('Banner Layout 3', 'abstrak'),
                   'title' => esc_html__('Banner Layout 2', 'abstrak'),
                   'img' => get_template_directory_uri() . '/assets/images/optionframework/header/2.png',
                ),
                
             
            ),
            'default' => '1',
            'required' => array('axil_products_banner_enable', 'equals', true),
        ), 
       array(
            'id' => 'axil_products_title',
            'type' => 'text',
            'title' => esc_html__('Default Title', 'abstrak'),
            'subtitle' => esc_html__('Controls the Default title of the page page title are on the team page.', 'abstrak'),
            'default' => esc_html__('All services', 'abstrak'),
             'required' => array('axil_products_banner_enable', 'equals', true),
           
        ),           
        array(
            'id' => 'axil_products_subtitle',
            'type' => 'text',
            'title' => esc_html__(' Sub Title', 'abstrak'),
            'default' => esc_html__(' We design and develop web and mobile applications for our clients worldwide', 'abstrak'),
              'required' => array(
              array('axil_products_banner_template', 'not', '1'),
              
           ),
           
        ),
           array(
             'id' => 'axil_products_banner_img',
             'title' => esc_html__('Archive Banner Image', 'abstrak'),           
             'type' => 'media',
              'required' => array('axil_products_banner_template', 'not', '1'),
             'default' => array(
              'url' => AXIL_IMG_URL . 'banner/banner-thumb-3.png'
             ),   
            
         ),   
             array(
               'id' => 'axil_products_image_size',
               'type' => 'dimensions',
               'units_extended' => true,
               'units' => array('rem', 'px', '%'),
               'title' => esc_html__('Banner Image Width', 'abstrak'),
               'subtitle' => esc_html__('Set custom logo height. Default value: 50px', 'abstrak'),
               'height' => false,
               'output' => array(
                   'max-width' => '.breadcrumb-banner .banner-thumbnail.banner-axil_products_image_size img'
               ),
               
              'required' => array(
                array('axil_products_banner_template', 'not', '1'),
                array('axil_products_banner_template', 'not', '3'),
             ),
           ),
          array(
             'id' => 'axil_products_banner_shape',
             'title' => esc_html__('Archive Banner Shape', 'abstrak'),           
             'type' => 'media',
               
             'required' => array(
              array('axil_products_banner_template', 'not', '2'),
              array('axil_products_banner_template', 'not', '3'),
           ),

             'default' => array(
              'url' => AXIL_IMG_URL . 'banner/bubble-17.png'
             ),   
            
         ),   
         
          array(
             'id' => 'axil_products_banner_shape2',
             'title' => esc_html__('Archive Banner Shape', 'abstrak'),           
             'type' => 'media',
              'required' => array('axil_products_banner_template', 'not', '1'),
             'default' => array(
              'url' => AXIL_IMG_URL . 'banner/bubble-22.png'
             ),   
            
         ), 

        array(
            'id' => 'axil_products_breadcrumb_enable',
            'type' => 'switch',
            'title' => esc_html__('Breadcrumb', 'abstrak'),
            'subtitle' => esc_html__('Enable or disable the breadcrumb area.', 'abstrak'),
            'default' => true,
             'required' => array(
              array('axil_products_banner_template', 'not', '2'),
              array('axil_products_banner_template', 'not', '3'),
           ),
        ),  

         array(
             'id' => 'axil_products_banner_other_shape_enable',
             'type' => 'switch',
             'title' => esc_html__('Banner Shape Disable', 'abstrak'),
             'subtitle' => esc_html__('Enable or disable the banner Other shape style.', 'abstrak'),
             'default' => true,
         ), 
         


            array(
                'id' => 'wc_single_product_sidebar',
                'type' => 'image_select',
                'title' => esc_html__('Select Single Product Sidebar', 'abstrak'),
                'subtitle' => esc_html__('Choose your favorite shop layout', 'abstrak'),
                'options' => array(
                    'left' => array(
                        'alt' => esc_html__('Left Sidebar', 'abstrak'),
                        'img' => get_template_directory_uri() . '/assets/images/optionframework/layout/left-sidebar.png',
                        'title' => esc_html__('Left Sidebar', 'abstrak'),
                    ),
                    'right' => array(
                        'alt' => esc_html__('Right Sidebar', 'abstrak'),
                        'img' => get_template_directory_uri() . '/assets/images/optionframework/layout/right-sidebar.png',
                        'title' => esc_html__('Right Sidebar', 'abstrak'),
                    ),
                    'no' => array(
                        'alt' => esc_html__('No Sidebar', 'abstrak'),
                        'img' => get_template_directory_uri() . '/assets/images/optionframework/layout/no-sidebar.png',
                        'title' => esc_html__('No Sidebar', 'abstrak'),
                    ),
                ),
                'default' => 'no',
            ),
            array(
                'id'       => 'wc_cats',
                'type'     => 'switch',
                'title'    => esc_html__( 'Categories', 'abstrak' ),
                'on'       => esc_html__( 'Show', 'abstrak' ),
                'off'      => esc_html__( 'Hide', 'abstrak' ),
                'default'  => true,
            ),
            array(
                'id'       => 'wc_tags',
                'type'     => 'switch',
                'title'    => esc_html__( 'Tags', 'abstrak' ),
                'on'       => esc_html__( 'Show', 'abstrak' ),
                'off'      => esc_html__( 'Hide', 'abstrak' ),
                'default'  => true,
            ),
            array(
                'id'       => 'wc_related',
                'type'     => 'switch',
                'title'    => esc_html__( 'Related Products', 'abstrak' ),
                'on'       => esc_html__( 'Show', 'abstrak' ),
                'off'      => esc_html__( 'Hide', 'abstrak' ),
                'default'  => true,
            ),
            array(
                'id'       => 'wc_description',
                'type'     => 'switch',
                'title'    => esc_html__( 'Description Tab', 'abstrak' ),
                'on'       => esc_html__( 'Show', 'abstrak' ),
                'off'      => esc_html__( 'Hide', 'abstrak' ),
                'default'  => true,
            ),
            array(
                'id'       => 'wc_reviews',
                'type'     => 'switch',
                'title'    => esc_html__( 'Reviews Tab', 'abstrak' ),
                'on'       => esc_html__( 'Show', 'abstrak' ),
                'off'      => esc_html__( 'Hide', 'abstrak' ),
                'default'  => true,
            ),
            array(
                'id'       => 'wc_additional_info',
                'type'     => 'switch',
                'title'    => esc_html__( 'Additional Information Tab', 'abstrak' ),
                'on'       => esc_html__( 'Show', 'abstrak' ),
                'off'      => esc_html__( 'Hide', 'abstrak' ),
                'default'  => true,
            ),
        )
    ));
    /**
     * WooCommerce Cart Page
     */
    Redux::setSection($opt_name, array(
        'title' => esc_html__('Cart page', 'abstrak'),
        'id' => 'wc_sec_cart',
        'icon' => 'el el-folder-open',
        'subsection' => true,
        'fields' => array(
            array(
                'id'       => 'wc_cross_sell',
                'type'     => 'switch',
                'title'    => esc_html__( 'Cross Sell Products', 'abstrak' ),
                'on'       => esc_html__( 'Show', 'abstrak' ),
                'off'      => esc_html__( 'Hide', 'abstrak' ),
                'default'  => true,
            ),
        )
    ));

}  
