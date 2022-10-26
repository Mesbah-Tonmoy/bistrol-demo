<?php
/**
 * @author  axiltheme
 * @since   1.0
 * @version 1.0
 */

use Elementor\Plugin;

class Scripts
{
 
    public $version;
    protected static $instance = null;
    public static $axil_options = null;

    public function __construct()
    {
        
        add_action('wp_enqueue_scripts', array($this, 'register_scripts'), 12);
        add_action('wp_enqueue_scripts', array($this, 'enqueue_scripts'), 15);
        add_action('admin_enqueue_scripts', array($this, 'admin_scripts'), 15);
        //add_action( 'after_setup_theme', array( $this, 'set_redux_compability_options' ) );
        
    }

        public function set_redux_compability_options(){
            $new_options = array(       
 
            'minicart_icon' => "on",
            );

            foreach ( $new_options as $key => $value ) {
                if ( !isset(  Helper::$axil_get_options[$key]  ) ) {
                    self::$axil_options[$key] = $value;
                }
            }
        }

    public static function instance()
        {
            if (null == self::$instance) {
                self::$instance = new self;
            }
            return self::$instance;
        }

    public function register_scripts()
    {
        /* Deregister font awesome*/
        wp_deregister_style('font-awesome');       

        wp_register_style('bootstrap', Helper::maybe_vendors_rtl('bootstrap.min'), array(), AXIL_VERSION);
        wp_register_style('font-awesome', Helper::get_vendor_css('font-awesome'), array(), AXIL_VERSION);
        wp_register_style('slick', Helper::get_vendor_css('slick'), array(), AXIL_VERSION);
        wp_register_style('slick-theme', Helper::get_vendor_css('slick-theme'), array(), AXIL_VERSION);
        wp_register_style('sal', Helper::get_vendor_css('sal'), array(), AXIL_VERSION);
        wp_register_style('odometer', Helper::get_vendor_css('odometer-theme-default'), array(), AXIL_VERSION);
        wp_register_style('magnific-popup', Helper::get_vendor_css('magnific-popup'), array(), AXIL_VERSION);
        wp_register_style('green-audio-player', Helper::get_vendor_css('green-audio-player.min'), array(), AXIL_VERSION);
        wp_register_style('abstrak-gfonts', $this->axil_fonts_url(), array(), AXIL_VERSION);
        wp_register_style('abstrak-app', Helper::maybe_rtl('app'), array(), AXIL_VERSION);
        wp_register_style('abstrak-woocommerce', Helper::maybe_rtl('woocommerce'), array(), AXIL_VERSION);
                  
        wp_register_script('bootstrap', Helper::get_vendor_js('bootstrap.min'), array('jquery'), AXIL_VERSION, true);
        wp_register_script('slick', Helper::get_vendor_js('slick.min'), array('jquery'), AXIL_VERSION, true); 
        wp_register_script('isotope-pkgd', Helper::get_vendor_js('isotope.pkgd.min'), array('jquery'), AXIL_VERSION, true);
        wp_register_script('waypoints', Helper::get_vendor_js('waypoints.min'), array('jquery'), AXIL_VERSION, true);
        wp_register_script('counterup', Helper::get_vendor_js('counterup'), array('jquery'), AXIL_VERSION, true);
        wp_register_script('odometer', Helper::get_vendor_js('odometer.min'), array('jquery'), AXIL_VERSION, true);
        wp_register_script('jquery-appear', Helper::get_vendor_js('jquery-appear'), array('jquery'), AXIL_VERSION, true);
       
        wp_register_script('sal', Helper::get_vendor_js('sal'), array(), AXIL_VERSION);
        wp_register_script('jquery-magnific-popup', Helper::get_vendor_js('jquery.magnific-popup.min'), array(), AXIL_VERSION);
        wp_register_script('js-cookie', Helper::get_vendor_js('js.cookie'), array(), AXIL_VERSION);
        wp_register_script('jquery-style-switcher', Helper::get_vendor_js('jquery.style.switcher'), array(), AXIL_VERSION);
        wp_register_script('jquery-countdown', Helper::get_vendor_js('jquery.countdown.min'), array(), AXIL_VERSION);
        wp_register_script('tilt', Helper::get_vendor_js('tilt'), array(), AXIL_VERSION);
        wp_register_script('green-audio-player', Helper::get_vendor_js('green-audio-player.min'), array(), AXIL_VERSION);
        wp_register_script('jquery-nav', Helper::get_vendor_js('jquery.nav'), array(), AXIL_VERSION);
        wp_register_script('axil-app', Helper::get_js('app'), array('jquery'), AXIL_VERSION, true);
        wp_register_script('axil-has-elementor', Helper::get_js('has-elementor'), array('jquery'), AXIL_VERSION, true);
    }
  
public function enqueue_scripts()
    {

       $axil_options = Helper::axil_get_options();

        wp_enqueue_style( 'bootstrap' );        
        wp_enqueue_style( 'font-awesome' );
        wp_enqueue_style( 'sal');
        wp_enqueue_style( 'magnific-popup' );
        wp_enqueue_style( 'abstrak-gfonts' );
        wp_enqueue_style( 'abstrak-app' );
        wp_enqueue_style( 'abstrak-woocommerce' );
        wp_enqueue_style( 'abstrak-style', get_stylesheet_uri() ); 
        wp_enqueue_style( 'slick');
        wp_enqueue_style( 'slick-theme');
        //wp_enqueue_script( 'jquery-nav');

        wp_enqueue_script('slick');
        wp_enqueue_script('bootstrap');        
        wp_enqueue_script('imagesloaded');
        wp_enqueue_script('isotope-pkgd');        
        $this->elementor_scripts();    
        $this->localized_scripts(); // Localization   

      
        wp_enqueue_script('odometer'); 
        wp_enqueue_script('jquery-appear'); 
        wp_enqueue_style('odometer');

        wp_enqueue_script('sal');
        wp_enqueue_script('jquery-magnific-popup');

        if (isset($axil_options['show_ld_switcher_form_user_end'])) {
            if ($axil_options['show_ld_switcher_form_user_end'] === 'on' || $axil_options['show_ld_switcher_form_user_end'] == 1) {
                wp_enqueue_script('js-cookie');
                wp_enqueue_script('jquery-style-switcher');

            }
        } 

        wp_enqueue_script('jquery-countdown');
        wp_enqueue_script('tilt');       
       
        wp_enqueue_script('axil-app');
        wp_enqueue_script('axil-has-elementor');

         if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
            wp_enqueue_script( 'comment-reply' );
        }

    }

public function elementor_scripts()
    {
        if (!did_action('elementor/loaded')) {
            return;
        }
        if (Plugin::$instance->preview->is_preview_mode()) {
          
        wp_enqueue_script('bootstrap');        
    
        wp_enqueue_script('sal');
        wp_enqueue_script('jquery-magnific-popup');
        wp_enqueue_script('js-cookie');
        wp_enqueue_script('jquery-style-switcher');
        wp_enqueue_script('tilt');
        wp_enqueue_script('green-audio-player');       
        wp_enqueue_script('jquery-countdown'); 
        //wp_enqueue_script('jquery-nav'); 

        wp_enqueue_script('odometer'); 
        wp_enqueue_script('jquery-appear'); 
        wp_enqueue_style('odometer');
        wp_enqueue_style('slick');
        wp_enqueue_style('slick-theme');
        wp_enqueue_script('slick');
        wp_enqueue_script('imagesloaded');
        wp_enqueue_script('isotope-pkgd');

        }
    }


public function admin_scripts()
    {
      
        wp_enqueue_style('abstrak-wp-admin', Helper::get_admin_css('admin-style'), array(), AXIL_VERSION);        
        if (is_rtl()){
            wp_enqueue_style('abstrak-rtl-admin', Helper::get_admin_css('admin-style'), array(), AXIL_VERSION);           
        }

        // JS
        wp_enqueue_media();
        wp_enqueue_script( 'jquery-ui-tabs' );
            
    }

private function axil_fonts_url()
    {
        $fonts_url = '';
        $fonts = array();
        $subsets = 'latin,latin-ext';
         /* translators: If there are characters in your language that are not supported by Poppins, translate this to 'off'. Do not translate into your own language. */
        if ('off' !== _x('on', 'Poppins font: on or off', 'abstrak')) {
            $fonts[] = 'Poppins:wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,700&display=swap';
            
        }

        /* translators: If there are characters in your language that are not supported by Yantramanav, translate this to 'off'. Do not translate into your own language. */


        if ( 'off' !== esc_attr_x( 'on', 'DM Sans font: on or off', 'abstrak' ) ) {
            $fonts[] = 'DM Sans:0,400;0,500;0,700;1,400;1,500;1,700';
        }

        if ($fonts) {
            $fonts_url = add_query_arg(array(
                'family' => urlencode(implode('|', $fonts)),
                'subset' => urlencode($subsets),
            ), 'https://fonts.googleapis.com/css');
        }
        return $fonts_url;
    }

     


private function localized_scripts()
    {
        $axil_options           = Helper::axil_get_options();
      
        $localize_data = array(
            'ajaxurl'           => admin_url('admin-ajax.php'),
            'hasAdminBar'       => is_admin_bar_showing() ? 1 : 0,            
           
            'day'               => $axil_options['cd_days'] ? $axil_options['cd_days'] : esc_html__('Days', 'abstrak'),
            'hour'              => $axil_options['cd_hour'] ? $axil_options['cd_hour'] : esc_html__('Hour', 'abstrak'),
            'minute'            => $axil_options['cd_minute'] ? $axil_options['cd_minute'] : esc_html__('Minute', 'abstrak'),
            'second'            => $axil_options['cd_second'] ? $axil_options['cd_second'] : esc_html__('Second', 'abstrak'),

            'rtl'               => is_rtl() ? 'yes' : 'no', //@rtl
            
        );
        wp_localize_script('axil-has-elementor', 'abstrakObj', $localize_data);
    } 

}

Scripts::instance();