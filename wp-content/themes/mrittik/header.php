<?php
/**
 * @package Bravisthemes
 */
global $product;
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="profile" href="//gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <?php $pxl_page_cls = apply_filters( 'pxl_page_class', 'pxl-page' ); ?>
    <div id="pxl-wapper" class="pxl-wapper <?php echo esc_attr($pxl_page_cls) ?>">
        <?php
        	mrittik()->page->get_site_loader();
            mrittik()->header->getHeader();
            if(!is_404()) {
                mrittik()->page->get_page_title();
            }
        ?>
        <div id="pxl-main">
            <?php
                $grid_lines = mrittik()->get_theme_opt('grid_lines', false);
                $grid_lines_mobile = mrittik()->get_theme_opt('grid_lines_mobile', false);
                $grid_lines_page = mrittik()->get_page_opt('grid_lines_page', '1');
                if($grid_lines_page == '0') {
                    $grid_lines = '0';
                }
            ?>
            <?php if ( class_exists( 'WooCommerce' ) ) {
                if ( is_shop() || is_product() || is_cart() || is_checkout() || is_account_page() || in_array('woocommerce-page', get_body_class()) ){
                    $grid_lines = '0';
                }
            } ?>
            <?php if ($grid_lines) : ?>
                <div class="pxl-grid-lines <?php if($grid_lines_mobile == '1') { echo esc_attr__( 'grid-mobile', 'mrittik' ); } ?>">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            <?php endif; ?>
            <?php
                $background_page = mrittik()->get_page_opt('background_page', '0');
                if($background_page == '1') { ?>
                    <div class="pxl-page-bg"></div>
                <?php }
            ?>
