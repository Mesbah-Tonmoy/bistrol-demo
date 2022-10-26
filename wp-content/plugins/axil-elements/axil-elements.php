<?php
/*
Plugin Name: Axil Elements
Plugin URI: https://www.axiltheme.com
Description: Axil Elements Plugin for abstrak Theme
Version: 1.2.3
Author: AxilTheme
Author URI: https://www.axiltheme.com
*/

if (!defined('ABSPATH')) exit;

if (!defined('ABSTRAK_ELEMENTS')) {
    $plugin_data = get_file_data(__FILE__, array('version' => 'Version'));
    define('ABSTRAK_ELEMENTS', $plugin_data['version']);
    define('ABSTRAK_ELEMENTS_SCRIPT_VER', (WP_DEBUG) ? time() : ABSTRAK_ELEMENTS);
    define('ABSTRAK_ELEMENTS_THEME_PREFIX', 'axil-elements');
    define('ABSTRAK_PT_PREFIX', 'axil');
    define('ABSTRAK_ELEMENTS_BASE_DIR', plugin_dir_path(__FILE__)); 
    defined('ABSTRAK_ELEMENTS_ACTIVED') or define('ABSTRAK_ELEMENTS_ACTIVED', (bool) function_exists('WC'));
    define('ABSTRAK_ELEMENTS_BASE_URL', plugins_url('/', __FILE__));
}

class abstrak_elements
{

    public $plugin = 'axil-elements';
    public $action = 'abstrak_theme_init';
    protected static $instance;

    public function __construct()
    {
        add_action('plugins_loaded', array($this, 'load_textdomain'), 20);
        add_action($this->action, array($this, 'after_theme_loaded'));
       
    }

    public static function instance()
    {
        if (null == self::$instance) {
            self::$instance = new self;
        }
        return self::$instance;
    }
    public function after_theme_loaded()
    {
       
        require_once ABSTRAK_ELEMENTS_BASE_DIR . 'lib/wp-svg/init.php'; 
        require_once ABSTRAK_ELEMENTS_BASE_DIR . 'lib/navmenu-icon/init.php';
        include_once(ABSTRAK_ELEMENTS_BASE_DIR. '/include/custom-post.php');
        include_once(ABSTRAK_ELEMENTS_BASE_DIR. '/include/social-share.php');
        include_once(ABSTRAK_ELEMENTS_BASE_DIR. '/include/widgets/custom-widget-register.php');
        include_once(ABSTRAK_ELEMENTS_BASE_DIR. '/include/allow-svg.php');        
        include_once(ABSTRAK_ELEMENTS_BASE_DIR. '/include/sidebar-generator.php');       
        include_once(ABSTRAK_ELEMENTS_BASE_DIR. '/include/common-functions.php');        
        if (did_action('elementor/loaded')) {
            require_once ABSTRAK_ELEMENTS_BASE_DIR . 'elementor/init.php';
            require_once ABSTRAK_ELEMENTS_BASE_DIR . 'elementor/helper.php'; 
        }

    }
    
    public function load_textdomain()
    {
        load_plugin_textdomain($this->plugin, false, dirname(plugin_basename(__FILE__)) . '/languages');
    }
}

abstrak_elements::instance();

/**
 * Escapeing
 */
if ( !function_exists('axil_escapeing')) {
    function axil_escapeing($html){
        return $html;
    }
}

function abstrak_enqueue_editor_scripts(){

    wp_enqueue_style('abstrak-element-addons-editor', ABSTRAK_ELEMENTS_BASE_URL . 'assets/css/editor.css', null, '1.0');
    
}
add_action( 'elementor/editor/after_enqueue_scripts', 'abstrak_enqueue_editor_scripts');