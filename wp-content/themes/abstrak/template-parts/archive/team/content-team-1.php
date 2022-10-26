<?php
/**
 * @author  axiltheme
 * @since   1.0
 * @version 1.0
 */
?>	
<?php
$axiloptions = Helper::axil_get_options();
$thumb_size  = "axil-team-sm";

$id             = get_the_id();
$designation    = get_post_meta( $id, "team_designation", true );                   
$department     = get_post_meta( $id, "team_department", true );    

$col_lg                 = $axiloptions['axil_team_col_lg'];
$col_md                 = $axiloptions['axil_team_col_md'];
$col_sm                 = $axiloptions['axil_team_col_sm'];
$designation_display    = $axiloptions['axil_team_archive_designation_display'];
$department_display     = $axiloptions['axil_team_archive_department_display'];
$social_display         = $axiloptions['axil_team_archive_social_display'];
$team_col_class         = "col-lg-{$col_lg} col-sm-{$col_md} col-{$col_sm}";

?>

<div class="<?php echo esc_attr( $team_col_class );?>">
     <div class="team-grid">
        <div class="thumbnail">
            <a href="<?php the_permalink();?>">
               <?php 
                    if ( has_post_thumbnail() ){
                    the_post_thumbnail( $thumb_size );
                    } ?>
                </a>
        </div>

        <div class="content">  
            <h4 class="title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
            <?php if ( $designation_display ): ?>
                <div class="designation"><?php echo esc_html( $designation );?></div>   
            <?php endif; ?>
            <?php if ( $department_display  ): ?>
                <div class="designation"><?php echo esc_html( $department );?></div>    
            <?php endif; ?>

        <?php if ( $social_display ): ?>
        <?php 
            $rows = get_field('team_social_icons_field_5e4b96f6dc7f8');
            if( $rows ) {
                echo '<ul class="list-unstyled social-icon">';
                foreach( $rows as $row ) {

                echo '<li><a href="'. $row['team_enter_social_icon_link'] .' ">'. $row['team_enter_social_icon_markup'] .'</a></li>';
                   
                   
                }
                echo '</ul>';
            } ?>
        <?php endif ?>  


        </div>
    </div>
</div>
