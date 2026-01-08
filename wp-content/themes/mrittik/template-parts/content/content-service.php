<?php
/**
 * Template part for displaying posts in loop
 *
 * @package Bravisthemes
 */
$service_navigation = mrittik()->get_theme_opt( 'service_navigation', false );
?>
<article id="pxl-post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="pxl-entry-content clearfix">
        <?php
            the_content();
            wp_link_pages( array(
                'before'      => '<div class="pxl-page-links">',
                'after'       => '</div>',
                'link_before' => '<span>',
                'link_after'  => '</span>',
            ) );
        ?>
    </div>
    <?php if($service_navigation) { mrittik()->blog->get_post_service_nav(); } ?>
</article>
