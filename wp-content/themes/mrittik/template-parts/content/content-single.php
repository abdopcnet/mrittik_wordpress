<?php
/**
 * Template part for displaying posts in loop
 *
 * @package Bravisthemes
 */
$post_title = mrittik()->get_theme_opt( 'post_title', true );
$post_tag = mrittik()->get_theme_opt( 'post_tag', true );
$post_social_share = mrittik()->get_theme_opt( 'post_social_share', false );
$post_navigation = mrittik()->get_theme_opt( 'post_navigation', false );
$post_author_box_info = mrittik()->get_theme_opt( 'post_author_box_info', true );
$post_author_position = mrittik()->get_theme_opt( 'post_author_position' );
$align_content_post = mrittik()->get_page_opt( 'align_content_post', 'content-left' );
$post_feature_image_on = mrittik()->get_page_opt( 'post_feature_image_on', true );
$post_title_on = mrittik()->get_page_opt( 'post_title_on', true );
?>
<article id="pxl-post-<?php the_ID(); ?>" <?php post_class( 'pxl-item-single-post'.' '.$align_content_post ); ?>>
    <?php if($post_feature_image_on) { ?>
        <?php if (has_post_thumbnail()) {
            echo '<div class="pxl-item--image">'; ?>
            <?php the_post_thumbnail('mrittik-thumb-lager'); ?>
            <?php echo '</div>';
        }
    } ?>
    <div class="pxl-item--post">
        <?php mrittik()->blog->get_post_metas(); ?>
        <?php if($post_title && $post_title_on) { ?>
            <h3 class="pxl-item--title"><?php the_title(); ?></h3>
        <?php } ?>
        <div class="pxl-item--holder">
            <div class="pxl-item--content clearfix">
                <?php
                    the_content();
                    wp_link_pages( array(
                        'before'      => '<div class="page-links">',
                        'after'       => '</div>',
                        'link_before' => '<span>',
                        'link_after'  => '</span>',
                    ) );
                ?>
            </div>
        </div>
        <?php if($post_tag || $post_social_share ) :  ?>
            <div class="pxl--post-footer">
                <?php if($post_tag) { mrittik()->blog->get_tagged_in(); } ?>
                <?php if($post_social_share) { mrittik()->blog->get_socials_share(); } ?>
            </div>
        <?php endif; ?>
        <?php if($post_navigation) { mrittik()->blog->get_post_nav(); } ?>
        <?php if($post_author_box_info) : ?>
            <div class="pxl--author-info">
                <div class="entry-author-avatar">
                    <?php echo get_avatar( get_the_author_meta( 'ID' ), 160 ); ?>
                </div>
                <div class="entry-author-meta">
                    <h5 class="author-name">
                        <?php the_author_posts_link(); ?>
                    </h5>
                    <?php if(!empty($post_author_position)) : ?>
                        <div class="author-position"><?php echo esc_attr( $post_author_position ); ?></div>
                    <?php endif; ?>
                    <div class="author-description">
                        <?php the_author_meta( 'description' ); ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</article><!-- #post -->