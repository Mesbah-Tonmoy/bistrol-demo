<?php
/**
 * @author  Axilthemes
 * @since   1.0
 * @version 1.0
 * @package abstrak
 */


/*-------------------------------------
#. Theme supports for WooCommerce
---------------------------------------*/
function axil_shop_support() {
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-lightbox' );
}



/*-------------------------------------
#. Custom functions used directly
---------------------------------------*/
function axil_shop_get_template_parts( $template ){
    get_template_part( 'woocommerce/custom/template-parts/content', $template );
}


function axil_shop_hide_page_title(){
    return false;
}

function axil_shop_loop_shop_per_page(){
    $axil_options 	= Helper::axil_get_options();
    if (isset($axil_options['wc_num_product']) && !empty($axil_options['wc_num_product'])){
        return $axil_options['wc_num_product'];
    } else {
        return 8;
    }

}

function axil_shop_wrapper_start() {
    axil_shop_get_template_parts( 'shop-header' );
}

function axil_shop_wrapper_end() {
    axil_shop_get_template_parts( 'shop-footer' );
}

function axil_shop_shop_topbar() {
    axil_shop_get_template_parts( 'shop-top' );
}

function axil_shop_loop_shop_columns(){
    $axil_options 	= Helper::axil_get_options();
    if (isset($axil_options['wc_num_product_per_row']) && !empty($axil_options['wc_num_product_per_row'])){
        return $axil_options['wc_num_product_per_row'];
    } else {
        return 4;
    }

}

function axil_shop_loop_product_title(){
    echo '<h3><a href="' . get_the_permalink() . '" class="woocommerce-LoopProduct-link">' . get_the_title() . '</a></h3>';
}

function axil_shop_shop_thumb_area(){
    axil_shop_get_template_parts( 'shop-thumb' );
}

function axil_shop_shop_info_wrap_start(){
    echo '<div class="products-shop">';
}

function axil_shop_shop_add_description(){
    if ( is_shop() || is_product_category() || is_product_tag() ) {
        global $post;
        echo '<div class="shop-excerpt grid-hide"><div class="short-description">';
        the_excerpt();
        echo '</div></div>';
    }
}

function axil_shop_shop_info_wrap_end(){
    echo '</div>';
}


function axil_shop_render_sku(){
    axil_shop_get_template_parts( 'product-sku' );
}

function axil_shop_render_meta(){
    axil_shop_get_template_parts( 'product-meta' );
}

function axil_shop_show_or_hide_related_products(){
    $axil_options 	= Helper::axil_get_options();
    // Show or hide related products
    if ( empty( $axil_options['wc_related'] ) ) {
        remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
    }
}

function axil_shop_hide_product_data_tab( $tabs ){

    $axil_options 	= Helper::axil_get_options();


    if ( empty( $axil_options['wc_description'] ) ) {
        unset( $tabs['description'] );
    }
    if ( empty( $axil_options['wc_reviews'] ) ) {
        unset( $tabs['reviews'] );
    }
    if ( empty( $axil_options['wc_additional_info'] ) ) {
        unset( $tabs['additional_information'] );
    }
    return $tabs;
}

function axil_shop_product_review_form( $comment_form ){
    $commenter = wp_get_current_commenter();

    $comment_form['fields'] = array(
        'author' => '<div class="row"><div class="col-sm-6"><div class="comment-form-author form-group"><input id="author" name="author" type="text" class="form-control" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" placeholder="' . esc_attr__( 'Name *', 'abstrak' ) . '" required /></div></div>',
        'email'  => '<div class="comment-form-email col-sm-6"><div class="form-group"><input id="email" class="form-control" name="email" type="email" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" placeholder="' . esc_attr__( 'Email *', 'abstrak' ) . '" required /></div></div></div>',
    );

    $comment_form['comment_field'] = '';

    if ( get_option( 'woocommerce_enable_review_rating' ) === 'yes' ) {
        $comment_form['comment_field'] = '<p class="comment-form-rating"><label for="rating">' . esc_html__( 'Your Rating', 'abstrak' ) .'</label>
		<select name="rating" id="rating" required>
			<option value="">' . esc_html__( 'Rate&hellip;', 'abstrak' ) . '</option>
			<option value="5">' . esc_html__( 'Perfect', 'abstrak' ) . '</option>
			<option value="4">' . esc_html__( 'Good', 'abstrak' ) . '</option>
			<option value="3">' . esc_html__( 'Average', 'abstrak' ) . '</option>
			<option value="2">' . esc_html__( 'Not that bad', 'abstrak' ) . '</option>
			<option value="1">' . esc_html__( 'Very Poor', 'abstrak' ) . '</option>
			</select></p>';
    }

    $comment_form['comment_field'] .= '<div class="col-sm-12 p-0"><div class="form-group comment-form-comment"><textarea id="comment" name="comment" class="form-control" placeholder="' . esc_attr__( 'Your Review *', 'abstrak' ) . '" cols="45" rows="8" required></textarea></div></div>';

    return $comment_form;
}

function axil_shop_show_or_hide_cross_sells(){
    // Show or hide related cross sells
    $axil_options 	= Helper::axil_get_options();
    if ( !empty($axil_options['wc_cross_sell'] ) ) {
        add_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display', 10 );
    }
}



/**
 * Change the breadcrumb separator
 */
function axil_change_breadcrumb_delimiter( $defaults ) {
    $separator          = '';
    $defaults['delimiter'] = '<li class="separator"> ' . esc_html($separator) . ' </li>';
    $defaults['wrap_before'] = '<ul class="axil-breadcrumb liststyle d-flex shop-breadcrumb">';
    $defaults['wrap_after'] = '</ul>';
    $defaults['before'] = '<li>';
    $defaults['after'] = '</li>';
    $defaults['home'] = esc_html__('Home', 'abstrak');
    return $defaults;
}


add_filter( 'woocommerce_output_related_products_args', 'abstrak_change_number_related_products', 9999 );

function abstrak_change_number_related_products( $args ) {
    $args['posts_per_page'] = 3; // # of related products
    $args['columns'] = 3; // # of columns per row
    return $args;
}


/**
 * fragments cart contents count
 */
add_filter( 'woocommerce_add_to_cart_fragments', 'abstrak_woocommerce_header_add_to_cart_fragment' );
function abstrak_woocommerce_header_add_to_cart_fragment( $fragments ) {
    global $woocommerce;
    ob_start();
    ?>
    <span class="aw-cart-count"><?php echo esc_html( $woocommerce->cart->cart_contents_count ); ?></span>
    <?php
    $fragments['span.aw-cart-count'] = ob_get_clean();
    return $fragments;
}