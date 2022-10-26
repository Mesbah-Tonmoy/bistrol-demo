<?php
/**
 * @author  axiltheme
 * @since   1.0
 * @version 1.0
 */
?>	
<?php	
$axiloptions = Helper::axil_get_options();
$thumb_size  = "axil-project-lg";
$col_lg = $axiloptions['axil_projects_archive_col_lg'];
$col_md = $axiloptions['axil_projects_archive_col_md'];
$col_sm = $axiloptions['axil_projects_archive_col_sm'];
$projects_col_class = "col-lg-{$col_lg} col-sm-{$col_md} col-{$col_sm}";
?> 
<div class="<?php echo esc_attr($projects_col_class); ?> project">
    <div class="project-grid">
         <?php 
            if ( has_post_thumbnail() ){ ?>
        <div class="thumbnail">
            <a href="<?php the_permalink();?>">
                <?php  the_post_thumbnail( $thumb_size ); ?>
            </a>
        </div>
        <?php  } ?>

        <div class="content">
            <h5 class="title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h5>
            <span class="subtitle"><?php echo Helper::axil_get_projects_cat( $id ); ?></span>
        </div>
    </div>
</div> 