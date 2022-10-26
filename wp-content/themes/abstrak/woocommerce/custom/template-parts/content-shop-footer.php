<?php
/**
 * @author  Axilthemes
 * @since   1.0
 * @version 1.0
 * @package abstrak
 */
$axil_options = Helper::axil_get_options();
$wc_single_product_sidebar =  isset($axil_options['wc_single_product_sidebar']) ? $axil_options['wc_single_product_sidebar'] : "no";
$wc_general_sidebar =  isset($axil_options['wc_general_sidebar']) ? $axil_options['wc_general_sidebar'] : "no";
?>
				
				</div>
			</div>
            <?php if(is_single()){
                if ( is_active_sidebar( 'sidebar-shop' ) && $wc_single_product_sidebar == 'right') { ?>
                    <div class="col-lg-4 col-md-12 col-12 mt_md--40 mt_sm--40">
                        <div class="abstrak-shop-sidebar abstrak-shop-sidebar-right">
                            <?php dynamic_sidebar('sidebar-shop'); ?>
                        </div>
                    </div>
                <?php }
            } else{
                if ( is_active_sidebar( 'sidebar-shop' ) && $wc_general_sidebar == 'right') { ?>
                    <div class="col-lg-4 col-md-12 col-12 mt_md--40 mt_sm--40">
                        <div class="abstrak-shop-sidebar abstrak-shop-sidebar-right">
                            <?php dynamic_sidebar('sidebar-shop'); ?>
                        </div>
                    </div>
                <?php }
            } ?>

		</div>
	</div>
</div>