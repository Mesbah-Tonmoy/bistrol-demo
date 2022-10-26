<?php
/**
 * @author  axiltheme
 * @since   1.0
 * @version 1.0
 * @package abstrak
 */

trait PostMeta
{
    public static function axil_postmeta(){
        $axil_options = Helper::axil_get_options();
        ?>

        <div class="author">
             <?php if ($axil_options['axil_show_post_author_meta'] != 'no') { ?>
                <div class="author-thumb">
                    <?php echo get_avatar(get_the_author_meta('ID'), 80); ?>
                </div>
            <?php } ?> 
            <div class="info">
                <?php if ($axil_options['axil_show_post_author_meta'] != 'no') { ?> 
                    <h6 class="author-name"> <?php printf('<a class="hover-flip-item-wrapper" href="%1$s"><span class="hover-flip-item"><span data-text="%2$s">%2$s</span></span></a>', esc_url(get_author_posts_url(get_the_author_meta('ID', get_the_author_meta() ))), get_the_author_meta('display_name', get_the_author_meta( 'ID' ))); ?></h6>
                <?php } ?> 
             <ul class="blog-meta list-unstyled">
                <?php if ($axil_options['axil_show_post_publish_date_meta'] != 'no'  ) { ?>
                        <li class="post-meta-date"><?php echo get_the_time(get_option('date_format')); ?></li>
                    <?php } ?>
                    <?php if ($axil_options['axil_read_time_view'] !== 'no') { ?>
                        <li class="post-meta-reading-time"><?php echo abstrak_content_estimated_reading_time(get_the_content()); ?></li>
                    <?php } ?>
                    <?php if ($axil_options['axil_show_blog_details_tags_meta'] !== 'no' && has_tag()) { ?>
                        <li class="post-meta-tags"><?php the_tags( ' ', ', ', '' ); ?></li>
                    <?php } ?>
                    <?php if ($axil_options['axil_show_post_categories_meta'] !== 'no' && has_category()) { ?>
                        <li class="post-meta-categories"><?php the_category(', &nbsp;'); ?></li>
                    <?php } ?>   
                     <?php if ( $axil_options['axil_show_post_view'] != "no" ) { ?>
                        <li><?php echo axil_post_views('Views'); ?></li>
                    <?php } ?>

                </ul>
            </div>
        </div>
        <?php
    }

    public static function axil_quote_postmeta(){
        $axil_options = Helper::axil_get_options();
        ?>

        <div class="author">   
            <div class="info">
                <?php if ($axil_options['axil_show_post_author_meta'] != 'no') { ?> 
                    <h6 class="author-name"> <?php printf('<a class="hover-flip-item-wrapper" href="%1$s"><span class="hover-flip-item"><span data-text="%2$s">%2$s</span></span></a>', esc_url(get_author_posts_url(get_the_author_meta('ID', get_the_author_meta( 'ID' ) ))), get_the_author_meta('display_name', get_the_author_meta( 'ID' ))); ?></h6>
                <?php } ?> 
                <ul class="blog-meta list-unstyled">
                     <?php if ($axil_options['axil_show_post_publish_date_meta'] !== 'no') { ?>
                        <li class="post-meta-date"><?php echo get_the_time(get_option('date_format')); ?></li>
                    <?php } ?>
                  
                    <?php if ( $axil_options['axil_show_post_view'] != "no" ) { ?>
                        <li><?php echo axil_post_views('Views'); ?></li>
                    <?php } ?>

                </ul>
            </div>
        </div>
        <?php
    }


  // Single post meta
    public static function abstrak_singlepostmeta()
    {
        $axil_options = Helper::axil_get_options();
        ?>
         <div class="author ">
             <?php if ($axil_options['axil_show_single_post_author_meta'] != 'no' ) { ?>
                <div class="author-thumb">
                    <?php echo get_avatar( get_the_author_meta('ID'), 80); ?>
                </div>
            <?php } ?>
            <div class="info">           
             <?php
               if ( $axil_options['axil_show_single_post_author_meta'] != 'no' ) { ?>
                    <h6 class="author-name post-author-name">
                       <?php echo get_the_author_link(); ?>
                            
                        </h6>
            <?php } ?> 
            <ul class="blog-meta list-unstyled">
                <?php if ($axil_options['axil_show_post_single_publish_date_meta'] != 'no'  ) { ?>
                        <li class="post-meta-date"><?php echo get_the_time(get_option('date_format')); ?></li>
                    <?php } ?>
                    <?php if ($axil_options['axil_show_post_single_view'] !== 'no') { ?>
                        <li class="post-meta-reading-time"><?php echo abstrak_content_estimated_reading_time(get_the_content()); ?></li>
                    <?php } ?>
                    <?php if ($axil_options['axil_show_blog_single_details_tags_meta'] !== 'no' && has_tag()) { ?>
                        <li class="post-meta-tags"><?php the_tags( ' ', ', ', '' ); ?></li>
                    <?php } ?>
                    <?php if ($axil_options['axil_show_post_single_categories_meta'] !== 'no' && has_category()) { ?>
                        <li class="post-meta-categories"><?php the_category(', &nbsp;'); ?></li>
                    <?php } ?> 
            </ul>
        </div>
    </div>

    <?php }


    /**
     * axil_post_category_meta
     */
    public static function axil_post_category_meta($show = true){
        $axil_options = Helper::axil_get_options();
        if ( $show && $axil_options['axil_show_post_categories_meta'] !== 'no' && has_category()) {
            $categories = get_the_category();
            ?>
            <div class="post-cat">
                <div class="post-cat-list">
                    <?php
                    if ( ! empty( $categories ) ) {
                        foreach( $categories as $category ) { ?>
                            <a class="hover-flip-item-wrapper" href="<?php echo esc_url( get_category_link( $category->term_id ) ) ?>">
                                <span class="hover-flip-item"><span data-text="<?php echo esc_html( $category->name ) ?>"><?php echo esc_html( $category->name ) ?></span></span>
                            </a> <?php
                        }
                    }
                    ?>
                </div>
            </div>
            <?php
        }
    }
 
    public static function axil_read_more()
    {
        $axil_options = Helper::axil_get_options();
        if ($axil_options['axil_enable_readmore_btn'] !== 'no') { ?>
            <a class="axil-button btn-large btn-transparent" href="<?php the_permalink(); ?>"><span
                        class="button-text"><?php echo esc_html($axil_options['axil_readmore_text'], 'abstrak') ?></span><span
                        class="button-icon"></span></a>
        <?php }
    }
}



