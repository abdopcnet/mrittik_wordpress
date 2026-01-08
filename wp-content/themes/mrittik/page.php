<?php
/**
 * @package Bravisthemes
 */
get_header();
$mrittik_sidebar = mrittik()->get_sidebar_args(['type' => 'page', 'content_col_xl'=> '8', 'content_col_lg'=> '8']);
if ( class_exists('\Elementor\Plugin') && \Elementor\Plugin::$instance->documents->get(get_the_ID())->is_built_with_elementor() && $mrittik_sidebar['sidebar_class']==false) {
    $classes = 'elementor-container';
} else {
    $classes = 'container';
}
?>
<div class="<?php echo esc_attr($classes); ?>">
    <div class="row <?php echo esc_attr($mrittik_sidebar['wrap_class']) ?>">
        <div id="pxl-content-area" class="<?php echo esc_attr($mrittik_sidebar['content_class']) ?>">
            <main id="pxl-content-main">
                <?php while ( have_posts() ) {
                    the_post();
                    get_template_part( 'template-parts/content/content', 'page' );
                    if ( comments_open() || get_comments_number() ) {
                        comments_template();
                    }
                } ?>
            </main>
        </div>
        <?php if ($mrittik_sidebar['sidebar_class']) : ?>
            <div id="pxl-sidebar-area" class="<?php echo esc_attr($mrittik_sidebar['sidebar_class']) ?>">
                <div class="pxl-sidebar-sticky">
                    <?php dynamic_sidebar( 'sidebar-page' ); ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php get_footer();