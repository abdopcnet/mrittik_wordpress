<?php
/**
 * @package Bravisthemes
 */
$archive_readmore_text = mrittik()->get_theme_opt('archive_readmore_text', esc_html__('Read More', 'mrittik'));
$archive_excerpt_on = mrittik()->get_theme_opt('archive_excerpts', true);
$archive_excerpt = get_the_excerpt($post->ID);
$thumbnail_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false);
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('pxl-item--archive'); ?>>
    <?php if (has_post_thumbnail()) {
        echo '<div class="item--featured">'; ?>
            <a href="<?php echo esc_url( get_permalink()); ?>"><?php the_post_thumbnail('mrittik-thumb-medium'); ?></a>
        <?php echo '</div>';
    } ?>
    <div class="item--holder">
        <?php mrittik()->blog->get_archive_meta(); ?>
        <h5 class="item--title">
            <a href="<?php echo esc_url( get_permalink()); ?>" title="<?php the_title_attribute(); ?>">
                <?php if(is_sticky()) { ?>
                    <i class="caseicon-check-mark"></i>
                <?php } ?>
                <?php the_title(); ?>
            </a>
        </h5>
        <?php if($archive_excerpt_on && !empty($archive_excerpt)): ?>
            <div class="item--excerpt">
                <?php
                    mrittik()->blog->get_excerpt();
                    wp_link_pages( array(
                        'before'      => '<div class="page-links">',
                        'after'       => '</div>',
                        'link_before' => '<span>',
                        'link_after'  => '</span>',
                    ) );
                ?>
            </div>
        <?php endif; ?>
        <a class="pxl-btn-line" href="<?php echo esc_url( get_permalink()); ?>">
            <span class="btn-text">
                <?php echo mrittik_html($archive_readmore_text); ?>
            </span>
            <span class="btn-icon">
                <span class="line"></span>
                <span class="circle"></span>
                <span class="dot"></span>
            </span>
        </a>
    </div>
</article>