<?php
/**
 * @author  AxilTheme
 * @since   1.0
 * @version 1.0
 */
?>
<?php if( $settings['seation_section_section_title_on'] =='yes' ){ ?>
    <div class="section-title-wrapper mb--30">
        <div class="row justify-content-lg-<?php echo axil_kses_intermediate( $settings['axil_section_section_align'] );?>">
            <div class="col-lg-12 section-heading heading-<?php echo esc_attr( $settings['heading_color'] );?>">
                 <?php  if( $settings['axil_section_section_title_before'] ){ ?>
                    <span class="subtitle"><?php echo esc_attr( $settings['axil_section_section_title_before'] );?></span>
                <?php  } ?> 

                 <?php if ($settings['axil_section_section_title_tag']) : ?>
                <?php  if($settings['axil_section_section_title']){ ?>
                    <<?php echo esc_html( $settings['axil_section_section_title_tag'] );?> class="title">
                        <?php echo axil_kses_intermediate( $settings['axil_section_section_title'] );?>
                    </<?php echo esc_html( $settings['axil_section_section_title_tag'] );?>> 
                <?php  } ?>             
            <?php endif; ?>
            </div>
        </div>
    </div>
<?php } ?> 