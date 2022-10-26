<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package abstrak
 */
/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */

function abstrak_move_comment_field_to_bottom($fields)
{
    $temp = (isset($fields['comment'])) ? $fields['comment'] : "";
    $temp_cookies = (isset($fields['cookies'])) ? $fields['cookies'] : "";
    unset($fields['comment']);
    unset($fields['cookies']);
    $fields['comment'] = $temp;
    $fields['cookies'] = $temp_cookies;
    return $fields;
}
add_filter('comment_form_fields', 'abstrak_move_comment_field_to_bottom');

if( post_password_required() ){
    return;
}

?>           
<div id="comments" class="comments-area">
    <div class="leave-comment-form">
    <?php
        if( have_comments() ):
            $comments_number = absint( get_comments_number() );
            ?>
            <div id="comment-list" class="blog-comment-box">
                <h3 class="comment-title title mb--40">
                    <?php
                    if ( 1 === $comments_number ) {
                        /* translators: %s: post title */
                        printf( esc_html_x( 'One reply on &ldquo;%s&rdquo;', 'comments title', 'abstrak' ), esc_html( get_the_title() ) );
                    } else {
                        echo sprintf(
                        /* translators: 1: number of comments, 2: post title */
                            _nx(
                                '%1$s reply on &ldquo;%2$s&rdquo;',
                                '%1$s replies on &ldquo;%2$s&rdquo;',
                                $comments_number,
                                'comments title',
                                'abstrak'
                            ),
                            number_format_i18n( $comments_number ),
                            esc_html( get_the_title() )
                        );
                    }
                    ?>
                </h3>
                <?php abstrak_get_post_navigation(); ?>
                <ul class="comment-list comment-list">
                    <?php
                    wp_list_comments(
                        array(
                            'style'     => 'ul',
                            'callback'  => 'abstrak_comment',
                            'type'      => 'all',
                            'format'    => current_theme_supports( 'html5', 'comment-list' ) ? 'html5' : 'xhtml',
                        )
                    );
                    ?>
                </ul>
                <?php abstrak_get_post_navigation(); ?>
                <?php
                if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
                    ?>
                    <p class="no-comments"><?php echo esc_html__( 'Comments are closed.', 'abstrak' ); ?></p>

                <?php
                endif;
                ?>
            </div>
        <?php
        endif;
        ?>

        <?php if ( comments_open() && post_type_supports( get_post_type(), 'comments' ) ) :  ?>
            <div id="comment-form" class="axil-comment-form mt--75 mt_md--40 mt_sm--30">
                <div class="blog-comment-form">
                    <?php
                    $commenter = wp_get_current_commenter();
                    $req = get_option( 'require_name_email' );
                    $aria_req = ( $req ? " aria-required='true'" : '' );
                    $consent = empty( $commenter['comment_author_email'] ) ? '' : ' checked="checked"';
                    $fields = array(
                        'author' =>
                            '<div class="row row--25"><div class="col-lg-6 col-md-6 col-12"><div class="form-group"><label for="author">'.esc_attr__('Full Name', 'abstrak').'<span class="required">*</span></label><span class="focus-border"></span> <input class="form-control"  id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" required aria-required="true" /></div></div>',

                        'email' =>
                            '<div class="col-lg-6 col-md-6 col-12"><div class="form-group"><label for="email">'.esc_attr__('Email ', 'abstrak').'<span class="required">*</span></label><span class="focus-border"></span><input class="form-control"  id="email" name="email" type="email" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" required aria-required="true" /></div></div>',
                        'url' =>
                            '<div class="col-lg-12 col-md-12 col-12"><div class="form-group"><label for="url">'.esc_attr__('Website', 'abstrak').'</label><span class="focus-border"></span><input class="form-control"  id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" /></div></div></div>'  

                    );
               
                    $args = array(
                        'class_submit' => 'axil-btn btn-fill-primary btn-fluidt',
                        'label_submit' => esc_html__( 'Post Comment', 'abstrak' ),
                        'comment_field' =>
                            '<div class="row"><div class="col-md-12"><div class="form-group"><label for="comment">'.esc_attr__('Write your comment here… ', 'abstrak').'<span class="required">*</span></label><span class="focus-border"></span><textarea id="comment" name="comment" rows="3"  required aria-required="true" class="form-control"></textarea></div></div></div>',
                        'fields' => apply_filters( 'comment_form_default_fields', $fields ),
                        'title_reply' => esc_html__('Leave a Reply','abstrak'),
                        'format'            => 'xhtml'

                    );
                    comment_form( $args );
                    ?>
                </div>
            </div>
        <?php endif; ?>

    </div>
</div><!-- .comments-area -->

