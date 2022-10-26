<?php
/**
 * Plugin Name: Abstrak Demo
 * Plugin URI: #
 * Description: Abstrak demo.
 * Version: 1.4.3
 * Author: Axilthemes
 * Author URI: http://axilthemes.com/
 * Text Domain: abstrak-demo
*/

/**
* Define
*/
define( 'ABSTRAK_DEMO_VERSION', '1.2.0' );
define( 'ABSTRAK_DEMO_URL', plugins_url( '/', __FILE__ ) );
define( 'ABSTRAK_DEMO_DIR', dirname( __FILE__ ) );
define( 'ABSTRAK_DEMO_PATH', plugin_dir_path( __FILE__ ) );
define( 'ABSTRAK_DEMO_CONTENT_URL', ABSTRAK_DEMO_URL . 'demo/' );
define( 'ABSTRAK_DEMO_PREVIEW_IMAGE_URL', ABSTRAK_DEMO_CONTENT_URL . 'preview/' );

/**
 * Include all files
 */
include_once(ABSTRAK_DEMO_DIR. '/include/demo-import-config.php');
