<?php
/**
 * @author  AxilTheme
 * 
 * The following code is a derivative work of the code from plugin "Menu Image v-2.9.1"(https://wordpress.org/plugins/menu-image/),
 * which is licensed GPLv2. This code therefore is also licensed under the terms
 * of the GNU Public License, verison 2.
 */
namespace axiltheme\abstrak_elements;

use axiltheme\eBaz\Helper;
use axiltheme\Lib\WP_SVG;


class NavMenu_Icon {

	protected static $instance = null;

	
	private function __construct() {
		

		// Frontend
		add_filter( 'axiltheme_navmenu_icon_item_title', array( $this, 'menu_image_nav_menu_item_title_filter' ), 10, 7 ); // Output
			add_filter( 'nav_menu_link_attributes', array( $this, 'wpse156165_menu_add_class' ), 10, 3 );
	}

	public static function instance() {
		if ( null == self::$instance ) {
			self::$instance = new self;
		}
		return self::$instance;
	}


	public function  wpse156165_menu_add_class( $atts, $item, $args ) {
	    $class = 'nav-link'; // or something based on $item
	    
	    $atts['class'] = $class;
	    return $atts;
	}


	public function menu_image_nav_menu_item_title_filter( $title, $item, $depth, $args, $icon_display, $text_display ) {
	

		  $thumb_id = '';
            if( class_exists('acf') ) {
            	$thumb_id = get_field('field_5c3de8217d5ec', $item);
            }
           

		if ( !$thumb_id ) {
			return $title;
		}
		$icon 	= $icon_display ? WP_SVG::get_attachment_image( $thumb_id, array( '30', '30' ), true ) : '';
		$icon 	= $icon_display ? '<span class="menu-icon">' . $icon . '</span>' : '';
		$text 	= $text_display ? '<span title="' . $title . '" class="menu-text">' . $title . '</span>' : '';
		$title  = $text . $icon;
		return $title;
	}




}

NavMenu_Icon::instance();