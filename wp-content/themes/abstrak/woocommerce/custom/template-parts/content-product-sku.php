<?php
/**
 * @author  Axilthemes
 * @since   1.0
 * @version 1.0
 * @package abstrak
 */

global $product;
?>
<?php if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) :
 $get_sku = ( $sku = $product->get_sku() ) ? $sku : esc_html__( 'N/A', 'abstrak' );
 ?>
	<div class="product-meta">
		<?php esc_html_e( 'SKU', 'abstrak' ); ?>: <span class="sku"><?php echo esc_html($get_sku); ?></span>
	</div>
<?php endif;