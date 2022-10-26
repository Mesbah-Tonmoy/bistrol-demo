<?php
/**
 * @author  Axilthemes
 * @since   1.0
 * @version 1.0
 * @package abstrak
 */
$axil_options = Helper::axil_get_options();
$wc_single_product_sidebar =  isset($axil_options['wc_single_product_sidebar']) && !empty($axil_options['wc_single_product_sidebar']) ? $axil_options['wc_single_product_sidebar'] : "no";
$wc_general_sidebar =  isset($axil_options['wc_general_sidebar']) && !empty($axil_options['wc_general_sidebar']) ? $axil_options['wc_general_sidebar'] : "no";


if(is_single()){
    $abstrak_shop_wrapper_class = ($wc_single_product_sidebar === 'no') || !is_active_sidebar( 'sidebar-shop' ) ? 'col-12' : 'col-lg-8 col-md-12 col-12';

} else {
    $abstrak_shop_wrapper_class = ($wc_general_sidebar === 'no') || !is_active_sidebar( 'sidebar-shop' ) ? 'col-12' : 'col-lg-8 col-md-12 col-12';
}
$abstrak_product_sidebar = ($wc_single_product_sidebar === 'left') && is_active_sidebar( 'sidebar-shop' ) && is_single() ? 'abstrak-has-left-sidebar' : '';
$abstrak_shop_sidebar = ($wc_general_sidebar === 'left') && is_active_sidebar( 'sidebar-shop' )  && !is_single() ? 'abstrak-has-left-sidebar' : '';
?>
<div class="axil-container section-padding-equal <?php echo esc_attr($abstrak_product_sidebar); ?> <?php echo esc_attr($abstrak_shop_sidebar); ?>">
	<div class="container">
		<div class="row">
            <!-- Left Sidebar here-->

            <?php if(is_single()){
                if ( is_active_sidebar( 'sidebar-shop' ) && $wc_single_product_sidebar == 'left') { ?>
                    <div class="col-lg-3 col-md-12 col-12 mt_md--40 mt_sm--40">
                        <div class="abstrak-shop-sidebar abstrak-shop-sidebar-left">
                            <?php dynamic_sidebar('sidebar-shop'); ?>
                        </div>
                    </div>
                <?php }
            } else {
                if ( is_active_sidebar( 'sidebar-shop' ) && $wc_general_sidebar == 'left') { ?>
                    <div class="col-lg-4 col-md-12 col-12 mt_md--40 mt_sm--40">
                        <div class="abstrak-shop-sidebar abstrak-shop-sidebar-left">
                            <?php dynamic_sidebar('sidebar-shop'); ?>
                        </div>
                    </div>
                <?php }
            } ?>

			<div class="<?php echo esc_attr($abstrak_shop_wrapper_class); ?>">
				<div class="abstrak-container-content ">