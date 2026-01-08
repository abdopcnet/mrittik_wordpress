<?php
/**
 * @package Bravisthemes
 */
$portfolio_navigation = mrittik()->get_theme_opt( 'portfolio_navigation', false );
$projects_related = mrittik()->get_theme_opt( 'projects_related', false );
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
    <?php if($portfolio_navigation) { mrittik()->blog->get_post_portfolio_nav(); } ?>
</article>
<?php if($projects_related) { mrittik()->blog->get_related_portfolio(); } ?>