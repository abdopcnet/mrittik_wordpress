<?php
$html_id = pxl_get_element_id($settings);
$query_type = $widget->get_setting('query_type', 'recent_product');
$post_per_page = $widget->get_setting('post_per_page', 8);
$product_ids = $widget->get_setting('product_ids', '');
$categories = $widget->get_setting('taxonomies', '');
$param_args=[];

$loop = mrittik_woocommerce_query($query_type,$post_per_page,$product_ids,$categories,$param_args);
extract($loop);

$layout               = $widget->get_setting('layout', '1');
$pagination_type      = $widget->get_setting('pagination_type', 'false');

$item_animation          = $widget->get_setting('item_animation', '') ;
$item_animation_duration = $widget->get_setting('item_animation_duration', 'normal');
$item_animation_delay    = $widget->get_setting('item_animation_delay', '150');

$img_size = $widget->get_setting('img_size');

$load_more = array(
    'layout'             => $layout,
    'query_type'         => $query_type,
    'product_ids'        => $product_ids,
    'categories'         => $categories,
    'param_args'         => $param_args,
    'startPage'          => $paged,
    'maxPages'           => $max,
    'total'              => $total,
    'limit'              => $post_per_page,
    'nextLink'           => $next_link,
    'layout_mode'         => 'masonry',
    'item_animation'          => $item_animation ,
    'item_animation_duration' => $item_animation_duration,
    'item_animation_delay'    => $item_animation_delay,
    'col_xs'                  => $widget->get_setting('col_xs', '1'),
    'col_sm'                  => $widget->get_setting('col_sm', '2'),
    'col_md'                  => $widget->get_setting('col_md', '2'),
    'col_lg'                  => $widget->get_setting('col_lg', '3'),
    'col_xl'                  => $widget->get_setting('col_xl', '4'),
    'col_xxl'                 => $widget->get_setting('col_xxl', '4')
);

$widget->add_render_attribute( 'wrapper', [
    'id'               => $html_id,
    'class'            => trim('pxl-grid woocommerce pxl-product-grid layout-'.$layout),
    'data-layout'      =>  'masonry',
    'data-start-page'  => $paged,
    'data-max-pages'   => $max,
    'data-total'       => $total,
    'data-perpage'     => $post_per_page,
    'data-next-link'   => $next_link
]);

if(is_admin())
    $grid_class = 'pxl-grid-inner pxl-grid-masonry-adm row relative';
else
    $grid_class = 'pxl-grid-inner pxl-grid-masonry row relative';

$widget->add_render_attribute( 'grid', 'class', $grid_class);

if( $total <= 0){
    echo '<div class="pxl-no-post-grid">'.esc_html__( 'No Post Found', 'mrittik' ). '</div>';
    return;
}

$col_xxl = 'col-xxl-'.str_replace('.', '',12 / floatval( $settings['col_xxl']));
$col_xl  = 'col-xl-'.str_replace('.', '',12 / floatval( $settings['col_xl']));
$col_lg  = 'col-lg-'.str_replace('.', '',12 / floatval( $settings['col_lg']));
$col_md  = 'col-md-'.str_replace('.', '',12 / floatval( $settings['col_md']));
$col_sm  = 'col-sm-'.str_replace('.', '',12 / floatval( $settings['col_sm']));
$col_xs  = 'col-'.str_replace('.', '',12 / floatval( $settings['col_xs']));

$item_class = trim(implode(' ', ['pxl-grid-item price-show', $col_xxl, $col_xl, $col_lg, $col_md, $col_sm, $col_xs]));

$orderby_options = array(
    'menu_order' => __('Default sorting', 'mrittik'),
    'popularity' => __('Sort by popularity', 'mrittik'),
    'rating'     => __('Sort by average rating', 'mrittik'),
    'date'       => __('Sort by latest', 'mrittik'),
    'price'      => __('Sort by price: low to high', 'mrittik'),
    'price-desc' => __('Sort by price: high to low', 'mrittik')
);
$orderby = isset($_GET['orderby']) ? wc_clean($_GET['orderby']) : 'menu_order';
$shop_url = get_permalink( wc_get_page_id( 'shop' ) );

?>
<?php if ($posts->found_posts > 0): ?>
    <div <?php pxl_print_html($widget->get_render_attribute_string( 'wrapper' )) ?>>

        <div class="row content-row pxl-content-wrap <?php echo esc_html($settings['sidebar_position']); ?>">

        <?php if($settings['sidebar_position'] != 'no-sidebar') { echo '<div class="pxl-content-area pxl-content-shop col-12 col-xl-9 col-lg-12">'; }
        else { echo '<div class="pxl-content-area pxl-content-shop col-12">'; } ?>

            <div class="woocommerce-topbar">
                <?php if (function_exists('woocommerce_result_count')): ?>
                    <div class="woocommerce-result-count">
                        <?php echo esc_html('Showing 1–'.$post_per_page.' of '.$total.' results'); ?>
                    </div>
                <?php endif; ?>
                <?php if (function_exists('woocommerce_catalog_ordering')): ?>
                    <div class="woocommerce-topbar-ordering">
                        <?php
                            echo '<form class="woocommerce-ordering" method="get" action="' . esc_url( $shop_url ) . '">';
                            echo '<select name="orderby" class="orderby">';
                            foreach ($orderby_options as $key => $value) {
                                echo '<option value="' . esc_attr($key) . '" ' . selected($orderby, $key, false) . '>' . esc_html($value) . '</option>';
                            }
                            echo '</select>';
                            echo '<input type="hidden" name="paged" value="1" />';
                            echo '<input type="hidden" name="post_type" value="product" />';
                            echo '</form>';
                        ?>
                    </div>
                <?php endif; ?>
            </div>

            <div <?php pxl_print_html($widget->get_render_attribute_string('grid')); ?>>
                <?php
                    $d = 0;
                    while ($posts->have_posts()) {
                        $posts->the_post();
                        global $product;
                        $d++;
                        $unit_price = get_post_meta($product->get_id(), 'unit_price');

                        $term_list = array();
                        $term_of_post = wp_get_post_terms($product->get_ID(), 'product_cat');
                        foreach ($term_of_post as $term) {
                            $term_list[] = $term->slug;
                        }
                        $filter_class = implode(' ', $term_list);

                        $filter_attribute = '';
                        $attributes = wc_get_product($product->get_id())->get_attributes();
                        $attribute_slugs = array();
                        foreach ($attributes as $attribute) {
                            $attribute_name = $attribute->get_name();
                            $attribute_terms = $attribute->get_terms();
                            foreach ($attribute_terms as $term) {
                                $attribute_slugs[] = $term->slug;
                            }
                        }
                        $filter_attribute = implode(' ', $attribute_slugs);

                        $tag_list = array();
                        $tag_of_post = wp_get_post_terms($product->get_ID(), 'product_tag');
                        foreach ($tag_of_post as $term4) {
                            $tag_list[] = $term4->slug;
                        }
                        $filter_tag = implode(' ', $tag_list);

                        ?>
                        <div class="<?php echo trim(implode(' ', [$item_class, $filter_class, $filter_attribute, $filter_tag])); ?>" data-price="<?php echo wp_kses_post($product->get_regular_price()); ?>">
                            <div class="pxl-item--inner <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms" data-wow-duration="<?php echo esc_attr($settings['pxl_animate_duration']); ?>s">
                                <a href="<?php echo esc_url(get_permalink( $product->get_ID() )); ?>" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                                    <?php $badge_new = get_post_meta($product->get_id(), 'badge_new', '1'); ?>
                                    <?php if ($product->is_on_sale()):?>
                                        <span class="onsale"><?php echo pxl_print_html('Sale', 'mrittik'); ?></span>
                                    <?php endif; ?>
                                    <?php if($badge_new == '1') :?>
                                        <span class="isnew"><?php echo pxl_print_html('New', 'mrittik'); ?></span>
                                    <?php endif; ?>
                                    <?php if ($product->is_featured()):?>
                                        <span class="featured"><?php echo pxl_print_html('Hot', 'mrittik'); ?></span>
                                    <?php endif; ?>
                                </a>
                                <div class="woocommerce-product-inner">
                                    <?php
                                    $image_size = !empty($img_size) ? $img_size : '810x969';
                                    $img_id     = get_post_thumbnail_id( $product->get_ID() );
                                    if (has_post_thumbnail($product->get_ID()) && wp_get_attachment_image_src(get_post_thumbnail_id($product->get_ID()), false)):
                                        $img = pxl_get_image_by_size( array(
                                            'attach_id'  => $img_id,
                                            'thumb_size' => $image_size
                                        ) );
                                    $thumbnail = $img['thumbnail'];
                                    ?>
                                    <div class="woocommerce-product-header">
                                        <a class="woocommerce-product-details" href="<?php echo esc_url(get_permalink( $product->get_ID() )); ?>">
                                            <?php echo wp_kses_post($thumbnail); ?>
                                        </a>
                                        <div class="woocommerce-product-meta">
                                            <?php if (class_exists('WPCleverWoosq')) { ?>
                                                <div class="woocommerce-btn-item woocommerce-quick-view">
                                                    <?php echo do_shortcode('[woosq id="'.esc_attr( $product->get_id() ).'"]'); ?>
                                                </div>
                                            <?php } ?>
                                            <?php if (class_exists('WPCleverWoosc')) { ?>
                                                <div class="woocommerce-btn-item woocommerce-compare">
                                                    <?php echo do_shortcode('[woosc id="'.esc_attr( $product->get_id() ).'"]'); ?>
                                                </div>
                                            <?php } ?>
                                            <?php if (class_exists('WPCleverWoosw')) { ?>
                                                <div class="woocommerce-btn-item woocommerce-wishlist">
                                                    <?php echo do_shortcode('[woosw id="'.esc_attr( $product->get_id() ).'"]'); ?>
                                                </div>
                                            <?php } ?>
                                            <div class="woocommerce-btn-item woocommerce-add-to--cart">
                                                <?php
                                                echo apply_filters( 'woocommerce_loop_add_to_cart_link',
                                                    sprintf( '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" class="button ajax_add_to_cart %s product_type_%s"></a>',
                                                        esc_url( $product->add_to_cart_url() ),
                                                        esc_attr( $product->get_id() ),
                                                        esc_attr( $product->get_sku() ),
                                                        $product->is_purchasable() ? 'add_to_cart_button' : '',
                                                        esc_attr( $product->get_type() ),
                                                    ),
                                                    $product );
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                    <div class="woocommerce-product-content">
                                        <h6 class="woocommerce-product--title">
                                            <a href="<?php echo esc_url(get_permalink( $product->get_ID() )); ?>"><?php echo esc_attr(get_the_title($product->get_ID())); ?></a>
                                        </h6>
                                        <?php if(!empty($unit_price)) : ?>
                                            <div class="unit-price"><?php print implode(", ", $unit_price); ?></div>
                                        <?php endif; ?>
                                        <div class="woocommerce-product--price">
                                            <span class="price"><?php echo wp_kses_post($product->get_price_html()); ?></span>
                                        </div>
                                        <div class="woocommerce-product--excerpt" style="display: none;">
                                            <?php woocommerce_template_single_excerpt(); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }


                        echo '<div class="grid-sizer '.$item_class.'"></div>';
                ?>
                <?php wp_reset_postdata(); ?>
            </div>
            <div class="pxl-grid-no-results"><?php echo esc_html__( 'No matching results.', 'mrittik' ) ?></div>

            <?php if ($pagination_type == 'pagination') { ?>
                <div class="pxl-grid-pagination pagin-product d-flex" data-loadmore="<?php echo esc_attr(json_encode($load_more)); ?>" data-query="<?php echo esc_attr(json_encode($args)); ?>">
                    <?php mrittik()->page->get_pagination($query, true); ?>
                </div>
            <?php } ?>
            <?php if (!empty($next_link) && $pagination_type == 'loadmore'):
                ?>
                <div class="pxl-load-more product" data-loadmore="<?php echo esc_attr(json_encode($load_more)); ?>" data-loading-text="<?php echo esc_attr__('Loading', 'mrittik') ?>" data-loadmore-text="<?php echo esc_html($settings['loadmore_text']); ?>">
                    <span class="pxl-btn btn-product-grid-loadmore right">
                        <span class="btn-text"><?php echo esc_html($settings['loadmore_text']); ?></span>
                        <span class="pxl-btn-icon pxli-spinner"></span>
                    </span>
                </div>
            <?php endif; ?>
        <?php if($settings['sidebar_position'] != 'no-sidebar') { echo '</div>'; } ?>

        <!-- SIDE BAR -->
        <?php if($settings['sidebar_position'] != 'no-sidebar') { echo '<div class="pxl-sidebar-area pxl-sidebar-shop col-12 col-xl-3 col-lg-0">'; } ?>

        <?php if($settings['show_product_search'] == 'true'): ?>
            <section class="widget woocommerce widget_product_search">
                <div class="widget-content">
                    <form role="search" method="get" class="woocommerce-product-search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <label class="screen-reader-text" for="<?php echo 'woocommerce-product-search-field-' . $html_id; ?>"><?php esc_html_e( 'Search for:', 'mrittik' ); ?></label>
                        <input type="search" id="<?php echo 'woocommerce-product-search-field-' . $html_id; ?>" class="search-field" placeholder="<?php echo esc_attr_e( 'Search Products...', 'mrittik' ); ?>" value="<?php echo get_search_query(); ?>" name="s" required />
                        <input type="hidden" name="post_type" value="product" />
                        <button type="submit" class="search-submit" value="<?php echo esc_attr_e( 'Search', 'mrittik' ); ?>"><?php echo esc_html_e( 'Search', 'mrittik' ); ?></button>
                    </form>
                </div>
            </section>
        <?php endif; ?>

        <?php if($settings['show_product_category'] == 'true'):
            $taxonomy = 'product_cat';
            $terms = get_terms(array(
                'taxonomy' => $taxonomy,
                'hide_empty' => false,
            )); ?>
            <?php if (!empty($terms) && !is_wp_error($terms)): ?>
                <section class="widget woocommerce widget_product_categories">
                    <div class="widget-content">
                        <?php if (!empty($settings['product_category_title'])): ?>
                            <h2 class="widget-title">
                                <span><?php echo esc_attr($settings['product_category_title']); ?></span>
                            </h2>
                        <?php endif; ?>
                        <ul class="product-categories">
                            <?php foreach ( $terms as $term ) {
                                $term_link = get_term_link( $term );
                                echo '<li class="cat-item cat-item-' . $term->term_id . '" data-filter=".' . $term->slug . '">';
                                echo '<a href="' . esc_url( $term_link ) . '" class="pxl-hover-transition">' . $term->name . '</a>';
                                echo '</li>';
                            } ?>
                        </ul>
                    </div>
                </section>
            <?php endif; ?>
        <?php endif; ?>

        <?php $args = array(
                'post_type' => 'product',
                'posts_per_page' => -1,
            );
            $query = new WP_Query($args);
            $minPrice = 0;
            $maxPrice = 0;
            if ($query->have_posts()) {
                while ($query->have_posts()) {
                    $query->the_post();
                    global $product;
                    $regularPrice = $product->get_regular_price();
                    $salePrice = $product->get_sale_price();
                    if ($salePrice) {
                        $productPrice = $salePrice;
                    } else {
                        $productPrice = $regularPrice;
                    }
                    if ($minPrice == 0 || $productPrice < $minPrice) {
                        $minPrice = $productPrice;
                    }
                    if ($productPrice > $maxPrice) {
                        $maxPrice = $productPrice;
                    }
                }
                wp_reset_postdata();
            } ?>
            <section class="widget woocommerce widget_price_filter" data-price-min="<?php echo esc_attr($minPrice); ?>" data-price-max="<?php echo esc_attr($maxPrice); ?>" <?php if ($settings['show_product_filter_price'] != 'true') { ?>style="display: none;"<?php } ?>>
                <div class="widget-content">
                    <?php if (!empty($settings['product_filter_price_title'])): ?>
                        <h2 class="widget-title">
                            <span><?php echo esc_attr($settings['product_filter_price_title']); ?></span>
                        </h2>
                    <?php endif; ?>
                    <form method="get" action="">
                        <div class="price_slider_wrapper">
                            <div class="price_slider ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content" style="">
                                <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                            </div>
                            <div class="price_slider_amount" data-step="10">
                                <label class="screen-reader-text" for="<?php echo 'min_price_' . $html_id; ?>">
                                    <?php echo esc_attr_e('Min price', 'mrittik'); ?>
                                </label>
                                <input type="text" id="<?php echo 'min_price_' . $html_id; ?>" name="min_price" value="<?php echo esc_attr($minPrice); ?>" data-min="<?php echo esc_attr($minPrice); ?>" placeholder="Min price" style="display: none;">
                                <label class="screen-reader-text" for="<?php echo 'max_price_' . $html_id; ?>">
                                    <?php echo esc_attr_e('Max price', 'mrittik'); ?>
                                </label>
                                <input type="text" id="<?php echo 'max_price_' . $html_id; ?>" name="max_price" value="<?php echo esc_attr($maxPrice); ?>" data-max="<?php echo esc_attr($maxPrice); ?>" placeholder="Max price" style="display: none;">
                                <button type="submit" class="button wp-element-button">
                                    <?php echo esc_attr_e('FILTER', 'mrittik'); ?>
                                </button>
                                <div class="price_label">
                                    <?php echo esc_attr_e('Price: ', 'mrittik'); ?>
                                    <span class="from"><?php echo '$' . $minPrice; ?></span> - <span class="to"><?php echo '$' . $maxPrice; ?></span>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        <?php ?>

        <?php if(isset($settings['attributes_list']) && !empty($settings['attributes_list']) && count($settings['attributes_list'])) :
            global $wp;
            foreach ($settings['attributes_list'] as $key => $value):
                $attribute_name = isset($value['attribute_name']) ? $value['attribute_name'] : '';
                $attribute_slug = isset($value['attribute_slug']) ? $value['attribute_slug'] : '';
                $terms = get_terms(array(
                    'taxonomy' => 'pa_'.$attribute_slug,
                    'hide_empty' => false,
                ));
                ?>
                <section class="widget woocommerce widget_layered_nav woocommerce-widget-layered-nav">
                    <div class="widget-content">
                        <?php if (!empty($attribute_name)): ?>
                            <h2 class="widget-title">
                                <span><?php echo esc_attr($attribute_name); ?></span>
                            </h2>
                        <?php endif; ?>
                        <?php if (!empty($terms)): ?>
                            <ul class="woocommerce-widget-layered-nav-list">
                                <?php foreach ($terms as $term) : ?>
                                    <li class="woocommerce-widget-layered-nav-list__item wc-layered-nav-term" data-filter="<?php echo esc_attr('.' . $term->slug); ?>">
                                        <span><?php echo esc_html($term->name); ?></span>
                                    </li>
                                    <?php wp_reset_postdata();
                                endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </section>
            <?php endforeach; ?>
        <?php endif; ?>

        <?php if ( $settings['show_product_list'] == 'true' ) :
            $args = array(
                'post_type'      => 'product',
                'posts_per_page' => $settings['product_list_number'],
                'orderby'        => $settings['product_order_by'],
                'order'          => $settings['product_order'],
            );
            $query = new WP_Query( $args );
            ?>
            <?php if ( $query->have_posts() ) : ?>
                <section class="widget woocommerce widget_products">
                    <div class="widget-content">
                        <?php if (!empty($settings['product_list_title'])): ?>
                            <h2 class="widget-title">
                                <span><?php echo esc_attr($settings['product_list_title']); ?></span>
                            </h2>
                        <?php endif; ?>
                        <ul class="product_list_widget">
                            <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                                <li>
                                    <div class="wg-product-inner">
                                        <div class="wg-product-image">
                                            <a href="<?php echo esc_url( get_permalink() ); ?>">
                                                <?php the_post_thumbnail( 'mrittik-thumb-wg-products' ); ?>
                                            </a>
                                        </div>
                                        <div class="wg-product-holder">
                                            <h3 class="product-title">
                                                <a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html( get_the_title() ); ?></a>
                                            </h3>
                                            <?php echo wc_get_rating_html( $product->get_average_rating() ); ?>
                                            <?php echo wp_kses_post( $product->get_price_html() ); ?>
                                        </div>
                                    </div>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                    </div>
                </section>
            <?php endif;
            wp_reset_query();
            ?>
        <?php endif; ?>

        <?php if ( $settings['show_product_tag'] == 'true' ) : ?>
            <section class="widget woocommerce widget_product_tag_cloud">
                <div class="widget-content">
                    <?php if (!empty($settings['product_tag_cloud_title'])): ?>
                        <h2 class="widget-title">
                            <span><?php echo esc_attr($settings['product_tag_cloud_title']); ?></span>
                        </h2>
                    <?php endif; ?>
                    <div class="tagcloud">
                        <?php
                        $tags = get_terms( 'product_tag' );
                        $tag_count = 1;
                        foreach ( $tags as $tag ) :
                            $tag_link = get_term_link( $tag );
                            $tag_count_class = 'tag-link-position-' . $tag_count;
                            $tag_id_class = 'tag-link-' . $tag->term_id;
                            $tag_slug = $tag->slug;
                            ?>
                            <a href="<?php echo esc_url( $tag_link ); ?>" class="tag-cloud-link <?php echo esc_attr( $tag_id_class . ' ' . $tag_count_class ); ?>" aria-label="<?php echo esc_attr( $tag->name . ' (' . $tag->count . ' products)' ); ?>" data-filter="<?php echo esc_attr('.' . $tag_slug); ?>">
                                <?php echo esc_html( $tag->name ); ?>
                            </a>
                            <?php
                            $tag_count++;
                        endforeach;
                        ?>
                    </div>
                </div>
            </section>
        <?php endif; ?>

        <?php if($settings['sidebar_position'] != 'no-sidebar') { echo '</div>'; } ?>
        <!-- END SIDE BAR -->

        </div>
    </div>
<?php endif; ?>
