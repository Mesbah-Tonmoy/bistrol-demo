<?php
$axil_options               = Helper::axil_get_options();
$axil_offcanvas_menu_args   = Helper::axil_offcanvas_menu_args();
$phoneNumber                = preg_replace("/[^0-9+]/", '', $axil_options['phone']);
$faxNumber                  = preg_replace("/[^0-9+]/", '', $axil_options['fax']);
$header_layout              = Helper::axil_header_layout();
$sidenav_class              = ($header_layout['header_style'] == '2') ? 'side-nav__left' : '';
$unique_id                  = esc_attr( abstrak_unique_id( 'search-' ) );
$axil_search_offcanvas      = ( $axil_options['axil_search_placeholders'] ) ? $axil_options['axil_search_placeholders'] : 'Search ...';
 
$axil_active_onepage = axil_get_acf_data( "axil_active_onepage");
$axil_nav_menu_args = Helper::axil_nav_menu_args2();

?>
<div class="offcanvas offcanvas-end header-offcanvasmenu" tabindex="-1" id="offcanvasMenuRight">
    <div class="offcanvas-header">
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
         
        <form  id="<?php echo esc_attr($unique_id); ?>" class="side-nav-search-form blog-search" action="<?php echo esc_url(home_url( '/' )); ?>" method="GET">
            <div class="axil-search blog-search form-group">
                <input class="search-field"  type="text"  name="s"  placeholder="<?php echo esc_attr( $axil_search_offcanvas ); ?>" value="<?php echo get_search_query(); ?>"/>
                <button type="submit" class="side-nav-search-btn"><i class="fal fa-search"></i></button>
            </div>
        </form>      
        <div class="row ">
            <?php if (has_nav_menu('offcanvas')) { ?>
                <!-- Start Left Bar  -->
                  <div class="col-lg-5 col-xl-6">
                    <?php  if ( $axil_active_onepage == 'yes' ) { ?>
                      <?php if (has_nav_menu('primary')) {
                         wp_nav_menu($axil_nav_menu_args);
                    } ?> 
                <?php }else{ ?> 
                     <?php 
                        if (has_nav_menu('offcanvas')) {
                            wp_nav_menu( array(
                                'theme_location' => 'offcanvas',
                                'container' => 'div',
                                'menu_class' => "main-navigation list-unstyled",
                                'fallback_cb' => false
                                )
                             ); 
                        }
                    ?> 

                <?php } ?>  
                </div>
                <!-- End Left Bar  -->
            <?php } ?>               
            <div class="col-lg-7 col-xl-6">
                <div class="contact-info-wrap">
                    <div class="contact-inner">
                        <address class="address">
                            <?php
                            if ($axil_options['address_field_title']) { ?>
                                <span class="title"> <?php echo axil_kses_intermediate( $axil_options['address_field_title'] ); ?> </span>
                            <?php } ?>
                            <?php
                            if ($axil_options['address']) {
                            ?>
                                <p class="m-b-xs-30 mid grey-dark-three"><?php echo axil_kses_intermediate($axil_options['address']); ?></p>
                            <?php
                            }
                            ?>
                        </address>
                        <address class="address">
                            <?php
                            if ($axil_options['call_now_field_title']) { ?>
                                <span class="title"> <?php echo axil_kses_intermediate($axil_options['call_now_field_title']); ?> </span>
                            <?php } ?>

                            <?php
                            if ($axil_options['phone']) {
                            ?>
                                 
                                <a class="tel" href="tel:<?php echo axil_kses_intermediate($phoneNumber); ?>"><i class="fas fa-phone"></i><?php echo axil_kses_intermediate($axil_options['phone']); ?>
                                </a>
                             
                            <?php
                            }
                            ?>
                            <?php
                            if ($axil_options['fax']) {
                            ?> 
                                <a class="tel" href="tel:<?php echo axil_kses_intermediate($faxNumber); ?>"><i class="fas fa-fax"></i><?php echo axil_kses_intermediate($axil_options['fax']); ?>
                                </a>
                                
                            <?php
                            }
                            ?>
                            <?php
                            if ($axil_options['email']) {
                            ?> 
                                <a class="tel" href="mailto:<?php echo axil_kses_intermediate($axil_options['email']); ?>"><i class="fas fa-envelope"></i><?php echo axil_kses_intermediate($axil_options['email']); ?>
                                </a>
                                
                            <?php
                            }
                            ?>
                        </address>
                    </div> 
                      <?php if(!empty($axil_options['axil_enable_social']) ){ ?>    

                        <?php if (!empty( $axil_options['axil_social_icons'] ) ) { ?>
                            <div class="contact-inner">
                            <?php
                            if ($axil_options['social_title']) { ?>
                                <h5 class="title"><?php echo esc_html( $axil_options['social_title'] ); ?></h5>
                            <?php } ?>

                                <div class="contact-social-share">
                                    <ul class="social-share list-unstyled">
                                        <?php
                                        foreach ($axil_options['axil_social_icons'] as $key => $value) {
                                            if ($value != '') {
                                                echo '<li><a class="' . esc_html($key) . ' social-icon" href="' . esc_url($value) . '"  target="_blank"><i class="fab fa-' . esc_html($key) . '"></i></a></li>';
                                            }
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                            <!-- End of .side-nav-inner -->
                        <?php } ?>   
                      <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
