<?php
$html_id = pxl_get_element_id($settings);
$source  = $widget->get_setting('source_'.$settings['post_type']);
$orderby = $widget->get_setting('orderby', 'date');
$order = $widget->get_setting('order', 'desc');
$limit = $widget->get_setting('limit', 6);
$post_ids = $widget->get_setting('post_ids', '');
$settings['layout']    = $settings['layout_'.$settings['post_type']];
extract(pxl_get_posts_of_grid('portfolio', [
    'source' => $source,
    'orderby' => $orderby,
    'order' => $order,
    'limit' => $limit,
    'post_ids' => $post_ids,
]));

$pxl_animate = $widget->get_setting('pxl_animate', '');
$col_xs = $widget->get_setting('col_xs', '');
$col_sm = $widget->get_setting('col_sm', '');
$col_md = $widget->get_setting('col_md', '');
$col_lg = $widget->get_setting('col_lg', '');
$col_xl = $widget->get_setting('col_xl', '');
$col_xxl = $widget->get_setting('col_xxl', '');
if($col_xxl == 'inherit') {
    $col_xxl = $col_xl;
}
$slides_to_scroll = $widget->get_setting('slides_to_scroll', '');

$style = $widget->get_setting('style');
$arrows = $widget->get_setting('arrows','false');
$arrows_style = $widget->get_setting('arrows_style','style1');
$pagination = $widget->get_setting('pagination','false');
$pagination_type = $widget->get_setting('pagination_type','bullets');
$pause_on_hover = $widget->get_setting('pause_on_hover');
$autoplay = $widget->get_setting('autoplay');
$autoplay_speed = $widget->get_setting('autoplay_speed', '5000');
$infinite = $widget->get_setting('infinite');
$speed = $widget->get_setting('speed', '500');
$center = $widget->get_setting('center', 'false');

$show_tag = $widget->get_setting('show_tag', 'true');
$show_button = $widget->get_setting('show_button', 'true');
$button_text = $widget->get_setting('button_text');

$img_size = $widget->get_setting('img_size');
$show_category = $widget->get_setting('show_category');

$opts = [
    'slide_direction'               => 'horizontal',
    'slide_percolumn'               => '1',
    'slide_percolumnfill'           => '1',
    'slide_mode'                    => 'slide',
    'slides_to_show'                => $col_xl,
    'slides_to_show_xxl'            => $col_xxl,
    'slides_to_show_lg'             => $col_lg,
    'slides_to_show_md'             => $col_md,
    'slides_to_show_sm'             => $col_sm,
    'slides_to_show_xs'             => $col_xs,
    'slides_to_scroll'              => $slides_to_scroll,
    'slides_gutter'                 => 30,
    'arrow'                         => $arrows,
    'pagination'                    => $pagination,
    'pagination_type'               => $pagination_type,
    'autoplay'                      => $autoplay,
    'pause_on_hover'                => $pause_on_hover,
    'pause_on_interaction'          => 'true',
    'delay'                         => $autoplay_speed,
    'loop'                          => $infinite,
    'speed'                         => $speed,
    'center'                        => $center
];

$widget->add_render_attribute( 'carousel', [
    'class'         => 'pxl-swiper-container',
    'dir'           => is_rtl() ? 'rtl' : 'ltr',
    'data-settings' => wp_json_encode($opts)
]); ?>

<?php if (is_array($posts)): ?>
    <div class="pxl-swiper-sliders pxl-portfolio-carousel pxl-portfolio-carousel1 pxl-parent-cursor <?php echo esc_attr($style); ?> <?php if($center == 'true') { echo 'pxl--swiper-center'; } ?>"  data-cursor="-hidden">
        <div class="pxl-carousel-inner">
            <div <?php pxl_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>
                <div class="pxl-swiper-wrapper">
                    <?php
                        $style_sizes = [
                            'style1' => '444x600',
                            'style2' => '848x512',
                        ];
                        $image_size = !empty($img_size) ? $img_size : ($style_sizes[$style] ?? '');
                        foreach ($posts as $post):
                        $portfolio_external_link = get_post_meta($post->ID, 'portfolio_external_link', true);
                        $img_id = get_post_thumbnail_id( $post->ID );
                        if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)):
                            $img = pxl_get_image_by_size( array(
                                'attach_id'  => $img_id,
                                'thumb_size' => $image_size
                            ) );
                            $thumbnail = $img['thumbnail'];
                            ?>
                            <div class="pxl-swiper-slide">
                                <div class="pxl-item--inner pxl-grid-item-inner<?php echo esc_attr($pxl_animate); ?>" data-wow-duration="1.2s">
                                    <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)):
                                    $thumbnail_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false); ?>
                                        <div class="item--featured">
                                            <a href="<?php if(!empty($portfolio_external_link)) { echo esc_url($portfolio_external_link); } else { echo esc_url(get_permalink( $post->ID )); } ?>">
                                                <?php echo wp_kses_post($thumbnail); ?>
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                    <div class="item--content">
                                        <?php if($show_tag == 'true' && has_term( '', 'portfolio-tag', $post->ID )) : ?>
                                            <div class="item--tags"><?php the_terms( $post->ID, 'portfolio-tag', '', ', ' ); ?></div>
                                        <?php endif; ?>
                                        <h5 class="item--title"><a href="<?php if(!empty($portfolio_external_link)) { echo esc_url($portfolio_external_link); } else { echo esc_url(get_permalink( $post->ID )); } ?>"><?php echo esc_attr(get_the_title($post->ID)); ?></a></h5>
                                        <?php if($show_button == 'true') : ?>
                                            <div class="pxl-item--button">
                                                <a class="item--button pxl-btn-line" href="<?php if(!empty($portfolio_external_link)) { echo esc_url($portfolio_external_link); } else { echo esc_url(get_permalink( $post->ID )); } ?>">
                                                    <span class="btn-text">
                                                        <?php if(!empty($button_text)) {
                                                            echo pxl_print_html($button_text);
                                                        } else {
                                                            echo pxl_print_html('VIEW DETAILS', 'mrittik');
                                                        } ?>
                                                    </span>
                                                    <span class="btn-icon">
                                                        <span class="line"></span>
                                                        <span class="circle"></span>
                                                        <span class="dot"></span>
                                                    </span>
                                                </a>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php if($arrows == 'true'): ?>
                <div class="wp-arrow <?php echo esc_attr($arrows_style); ?>" data-cursor="-hidden">
                    <?php if($arrows_style == 'style1') { ?>
                        <div class="pxl-swiper-arrow pxl-swiper-arrow-prev">
                            <span class="crossline1"></span>
                            <span class="crossline2"></span>
                        </div>
                        <div class="pxl-swiper-arrow pxl-swiper-arrow-next">
                            <span class="crossline1"></span>
                            <span class="crossline2"></span>
                        </div>
                    <?php } else if($arrows_style == 'style2') { ?>
                        <div class="pxl-swiper-arrow pxl-swiper-arrow-prev">
                            <span class="line"></span>
                            <span class="circle"></span>
                            <span class="dot"></span>
                        </div>
                        <div class="pxl-swiper-arrow pxl-swiper-arrow-next">
                            <span class="line"></span>
                            <span class="circle"></span>
                            <span class="dot"></span>
                        </div>
                    <?php } else { ?>
                        <div class="pxl-swiper-arrow pxl-swiper-arrow-prev pxl-cursor--cta"><i class="bi bi-arrow-left"></i></div>
                        <div class="pxl-swiper-arrow pxl-swiper-arrow-next pxl-cursor--cta"><i class="bi bi-arrow-right"></i></div>
                    <?php } ?>
                </div>
            <?php endif; ?>
            <?php if($pagination !== 'false'): ?>
                <div class="pxl-swiper-dots"></div>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>