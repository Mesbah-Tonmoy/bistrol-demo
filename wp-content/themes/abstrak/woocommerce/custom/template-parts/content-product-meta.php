<?php
/**
 * @author  Axilthemes
 * @since   1.0
 * @version 1.0
 * @package abstrak
 */

global $product;
$abstrak_options 	= Helper::axil_get_options();
do_action( 'woocommerce_product_meta_start' );
$cats_html = wc_get_product_category_list( $product->get_id(), ', ', '<div class="product-meta"><span>' . _n( 'Category:', 'Categories:', count( $product->get_category_ids() ), 'abstrak' ) . '</span> ', '</div>' );
$tags_html = wc_get_product_tag_list( $product->get_id(), ', ', '<div class="product-meta"><span>' . _n( 'Tag:', 'Tags:', count( $product->get_tag_ids() ), 'abstrak' ) . '</span> ', '</div>' );
if ( isset($abstrak_options['wc_cats']) && !empty($abstrak_options['wc_cats']) ) {
	echo wp_kses_post( $cats_html );
}
if ( isset($abstrak_options['wc_tags']) && !empty($abstrak_options['wc_tags']) ) {
	echo wp_kses_post( $tags_html );
}
do_action( 'woocommerce_product_meta_end' ); 