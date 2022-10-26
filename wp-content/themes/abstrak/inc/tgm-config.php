<?php
/**
 * @author  axiltheme
 * @since   1.0
 * @version 1.0
 * @package abstrak
 */

class TGM_Config {
    public $prfx = AXIL_THEME_FIX;  
    public $path = "https://new.axilthemes.com/themes/abstrak/demo/plugins/";

	public function __construct() {
		add_action( 'tgmpa_register', array( $this, 'axil_tgn_plugins' ) );
	}

	public function axil_tgn_plugins(){
		$plugins = array(	
			array(
				'name'         => esc_html__('Axil Elements','abstrak'),
				'slug'         => 'axil-elements',
				'source'       => 'axil-elements.zip',
				'required'     =>  true,
				'version'      => '1.0'
			),
			array(
				'name'         => esc_html__('Abstrak Demo','abstrak'),
				'slug'         => 'abstrak-demo',
				'source'       => 'abstrak-demo.zip',
				'required'     =>  true,
				'version'      => '1.0'
			),				
            array(
                'name'      => esc_html__('Advanced Custom Fields Pro', 'abstrak'),
                'slug'      => 'advanced-custom-fields-pro',
                'source'	=> 'advanced-custom-fields-pro.zip',
                'required'  => true,
            ),	
            				
			// Repository
			array(
				'name'     => esc_html__('Redux Framework','abstrak'),
				'slug'     => 'redux-framework',
				'required' => true,
			),				
			
			array(
				'name'     => esc_html__('Elementor Page Builder','abstrak'),
				'slug'     => 'elementor',
				'required' => true,
			),
			array(
				'name'     => esc_html__('Contact Form 7','abstrak'),
				'slug'     => 'contact-form-7',
				'required' => false,
			),
			array(
				'name'     => esc_html__('MailChimp for WordPress','abstrak'),
				'slug'     => 'mailchimp-for-wp',
				'required' => false,
			),
            array(
                'name'      => esc_html__('One Click Demo', 'abstrak'),
                'slug'      => 'one-click-demo-import',
                'required'  => true,
            ),
            array(
                'name'      => esc_html__('WooCommerce', 'abstrak'),
                'slug'      => 'woocommerce',
                'required'  => false,
            ) 
     );

		$config = array(
			'id'           => $this->prfx,            // Unique ID for hashing notices for multiple instances of TGMPA.
			'default_path' => $this->path,              // Default absolute path to bundled plugins.
			'menu'         => $this->prfx . '-install-plugins', // Menu slug.
			'has_notices'  => true,                    // Show admin notices or not.
			'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
			'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
			'is_automatic' => false,                    // Automatically activate plugins after installation or not.
			'message'      => '',                      // Message to output right before the plugins table.
		);

		tgmpa( $plugins, $config );
	}
}

new TGM_Config;