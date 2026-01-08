<?php
/**
 * Custom Woocommerce shop page.
 */
get_header();
  if(is_singular('product')){
    $mrittik_sidebar = mrittik()->get_sidebar_args(['type' => 'product', 'content_col_xl'=> '9', 'content_col_lg'=> '8']);
    // type: blog, post, page, shop, product
}else{
    $mrittik_sidebar = mrittik()->get_sidebar_args(['type' => 'shop', 'content_col_xl'=> '9', 'content_col_lg'=> '12']);
}

?>
    <div class="container content-container">
        <div class="row content-row <?php echo esc_attr($mrittik_sidebar['wrap_class']) ?>">
            <div id="primary" class="<?php echo esc_attr($mrittik_sidebar['content_class']) ?>">
                <main id="main" class="site-main" role="main">
                        <?php woocommerce_content(); ?>
                </main><!-- #main -->
            </div><!-- #primary -->

            <?php if ( $mrittik_sidebar['sidebar_class']): ?>
                <aside id="secondary" class="<?php echo esc_attr($mrittik_sidebar['sidebar_class']) ?>">
                    <div class="sidebar-sticky">
                        <?php dynamic_sidebar( 'sidebar-shop' ); ?>
                    </div>
                </aside>
            <?php endif; ?>
        </div>
    </div>
<?php
get_footer();