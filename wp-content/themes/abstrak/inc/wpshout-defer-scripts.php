<?php
//add_action( 'wp_print_scripts', 'wsds_detect_enqueued_scripts' );
function wsds_detect_enqueued_scripts() {
	global $wp_scripts;
	foreach( $wp_scripts->queue as $handle ) :
		echo $handle . ' | ';
	endforeach;
}

// DEFER internal scripts
add_filter( 'script_loader_tag', 'wsds_defer_scripts', 10, 3 );
function wsds_defer_scripts( $tag, $handle, $src ) {

	// The handles of the enqueued scripts we want to defer
	$defer_scripts = array( 

		'admin-bar',
		'contact-form-7',
		'wc-add-to-cart',
		'woocommerce',
		'wc-cart-fragments',		
 
		'elementor-app-loader',
		'slick',
		'bootstrap',
		'imagesloaded',
		'isotope-pkgd',
		'waypoints',
		'counterup',
		'sal',
		'jquery-magnific-popup',
		'js-cookie',
		'jquery-style-switcher',
		'jquery-countdown',
		'tilt' ,
		'axil-app' ,
		'axil-has-elementor',

	);

    if ( in_array( $handle, $defer_scripts ) ) {
        return '<script type="text/javascript" src="' . $src . '" defer="defer"></script>' . "\n";
    }

    return $tag;
}


// ASYNC external scripts
//add_filter( 'script_loader_tag', 'wsds_async_scripts', 10, 3 );
function wsds_async_scripts( $tag, $handle, $src ) {

	// The handles of the enqueued scripts we want to async
	$async_scripts = array( 

	);

    if ( in_array( $handle, $async_scripts ) ) {
        return '<script type="text/javascript" src="' . $src . '" async="async"></script>' . "\n";
    }

    return $tag;
}