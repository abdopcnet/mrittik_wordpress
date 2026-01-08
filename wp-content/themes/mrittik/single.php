<?php
/**
 * @package Bravisthemes
 */
get_header();
$mrittik_sidebar = mrittik()->get_sidebar_args(['type' => 'post', 'content_col_xl'=> '8', 'content_col_lg'=> '8']);
$post_related = mrittik()->get_theme_opt( 'post_related', false );
?>
<div class="container">
    <div class="row <?php echo esc_attr($mrittik_sidebar['wrap_class']) ?>">
        <div id="pxl-content-area" class="<?php echo esc_attr($mrittik_sidebar['content_class']) ?>">
            <main id="pxl-content-main">
                <?php while ( have_posts() ) {
                    the_post();
                    get_template_part( 'template-parts/content/content-single', get_post_format() );
                    if ( comments_open() || get_comments_number() ) {
                        comments_template();
                    }
                } ?>
                <?php if($post_related) { mrittik()->blog->get_related_post(); } ?>
            </main>
        </div>
        <?php if ($mrittik_sidebar['sidebar_class']) : ?>
            <div id="pxl-sidebar-area" class="<?php echo esc_attr($mrittik_sidebar['sidebar_class']) ?>">
                <div class="pxl-sidebar-sticky">
                    <?php get_sidebar(); ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php get_footer();
