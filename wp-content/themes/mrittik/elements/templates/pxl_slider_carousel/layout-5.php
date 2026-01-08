<?php
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
$arrows = $widget->get_setting('arrows','false');
$arrows_style = $widget->get_setting('arrows_style','style1');
$pagination = $widget->get_setting('pagination','false');
$pagination_type = $widget->get_setting('pagination_type','bullets');
$pause_on_hover = $widget->get_setting('pause_on_hover');
$autoplay = $widget->get_setting('autoplay', '');
$autoplay_speed = $widget->get_setting('autoplay_speed', '5000');
$infinite = $widget->get_setting('infinite','false');
$center = $widget->get_setting('center','false');
$speed = $widget->get_setting('speed', '500');
$image_size = !empty($settings['img_size']) ? $settings['img_size'] : '283x181';
$opts = [
    'slide_direction'               => 'horizontal',
    'slide_percolumn'               => '1',
    'slide_mode'                    => 'slide',
    'slides_to_show'                => $col_xl,
    'slides_to_show_xxl'             => $col_xxl,
    'slides_to_show_lg'             => $col_lg,
    'slides_to_show_md'             => $col_md,
    'slides_to_show_sm'             => $col_sm,
    'slides_to_show_xs'             => $col_xs,
    'slides_to_scroll'              => $slides_to_scroll,
    'arrow'                         => $arrows,
    'pagination'                    => $pagination,
    'pagination_type'               => $pagination_type,
    'autoplay'                      => $autoplay,
    'pause_on_hover'                => $pause_on_hover,
    'pause_on_interaction'          => 'true',
    'mousewheel'                    => 'false',
    'delay'                         => $autoplay_speed,
    'loop'                          => $infinite,
    'center'                        => $center,
    'speed'                         => $speed
];
$widget->add_render_attribute( 'carousel1', [
    'class'             => 'pxl-swiper-container pxl-carousel-above wow fadeInRight',
    'data-wow-delay'    => '600ms',
    'data-wow-duration' => '1.2s',
    'dir'               => is_rtl() ? 'rtl' : 'ltr',
    'data-settings'     => wp_json_encode($opts)
]);
$widget->add_render_attribute( 'carousel2', [
    'class'             => 'pxl-swiper-container pxl-carousel-below wow fadeInLeft',
    'data-wow-delay'    => '600ms',
    'data-wow-duration' => '1.2s',
    'dir'               => is_rtl() ? 'rtl' : 'ltr',
    'data-settings'     => wp_json_encode($opts)
]);

if ( ! empty( $settings['btn_link3']['url'] ) ) {
    $widget->add_render_attribute( 'btn_link3', 'href', $settings['btn_link3']['url'] );

    if ( $settings['btn_link3']['is_external'] ) {
        $widget->add_render_attribute( 'btn_link3', 'target', '_blank' );
    }

    if ( $settings['btn_link3']['nofollow'] ) {
        $widget->add_render_attribute( 'btn_link3', 'rel', 'nofollow' );
    }
}
?>
<div class="pxl-swiper-sliders pxl-slider-carousel pxl-slider-carousel5 pxl-parent-transition pxl-parent-cursor pxl-swiper-arrow-show <?php if($arrows == 'true') { echo esc_attr__( 'pxl-show-arrow', 'mrittik' ); } ?>" data-view-auto="<?php echo esc_attr($col_xl); ?>">
    <div class="pxl-carousel-inner">
        <div <?php pxl_print_html($widget->get_render_attribute_string( 'carousel1' )); ?>>
            <div class="pxl-swiper-wrapper">
                <?php foreach ($settings['slider3'] as $key => $value):
                    $image = isset($value['image_above']) ? $value['image_above'] : '';
                    $link = isset($value['img_above_link']) ? $value['img_above_link'] : '';
                    $link_key = $widget->get_repeater_setting_key( 'image', 'value', $key );
                    $img = pxl_get_image_by_size(array(
                        'attach_id'  => $image['id'],
                        'thumb_size' => $image_size,
                        'class'      => 'no-lazyload'
                    ));
                    $thumbnail = $img['thumbnail'];

                    if ( ! empty( $link['url'] ) ) {
                        $widget->add_render_attribute( $link_key, 'href', $link['url'] );

                        if ( $link['is_external'] ) {
                            $widget->add_render_attribute( $link_key, 'target', '_blank' );
                        }

                        if ( $link['nofollow'] ) {
                            $widget->add_render_attribute( $link_key, 'rel', 'nofollow' );
                        }
                    }
                    $link_attributes = $widget->get_render_attribute_string( $link_key );
                    ?>
                    <div class="pxl-swiper-slide">
                        <div class="pxl-item--inner <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms" data-wow-duration="<?php echo esc_attr($settings['pxl_animate_duration']); ?>s">
                            <?php if (!empty( $link['url'] ) ) { ?><a <?php echo implode( ' ', [ $link_attributes ] ); ?>><?php } ?>
                                <?php echo wp_kses_post($thumbnail); ?>
                            <?php if ( !empty( $link['url'] ) ) { ?></a><?php } ?>
                       </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="pxl-swiper-content">
            <div class="pxl-item--content">
                <?php if(!empty($settings['title3'])) : ?>
                    <h2 class="pxl-item--title el-empty pxl-transtion"><?php echo pxl_print_html($settings['title3']); ?></h2>
                <?php endif; ?>
                <div class="pxl-item--link">
                    <?php if(!empty($settings['sub_text3'])) : ?>
                        <span class="pxl-item--subtitle pxl-transtion"><?php echo pxl_print_html($settings['sub_text3']).' —'; ?></span>
                    <?php endif; ?>
                    <?php if (!empty( $settings['btn_link3']['url'] ) ) { ?><a class="item--button" <?php pxl_print_html($widget->get_render_attribute_string( 'btn_link3' )); ?>><?php } ?>
                    <span class="btn-text">
                        <?php if(!empty($settings['btn_text3'])) {
                            echo pxl_print_html($settings['btn_text3']);
                        } else {
                            echo pxl_print_html('Click Here', 'mrittik');
                        } ?>
                    </span>
                    <?php if ( !empty( $settings['btn_link3']['url'] ) ) { ?></a><?php } ?>
                </div>
            </div>
        </div>
        <div <?php pxl_print_html($widget->get_render_attribute_string( 'carousel2' )); ?>>
            <div class="pxl-swiper-wrapper">
                <?php foreach ($settings['slider4'] as $key => $value):
                    $image_below = isset($value['image_below']) ? $value['image_below'] : '';
                    $link2 = isset($value['img_below_link']) ? $value['img_below_link'] : '';
                    $link_key2 = $widget->get_repeater_setting_key( 'image_below', 'value', $key );
                    $img2 = pxl_get_image_by_size(array(
                        'attach_id'  => $image_below['id'],
                        'thumb_size' => $image_size,
                        'class'      => 'no-lazyload'
                    ));
                    $thumbnail = $img2['thumbnail'];

                    if ( ! empty( $link2['url'] ) ) {
                        $widget->add_render_attribute( $link_key2, 'href', $link2['url'] );

                        if ( $link2['is_external'] ) {
                            $widget->add_render_attribute( $link_key2, 'target', '_blank' );
                        }

                        if ( $link2['nofollow'] ) {
                            $widget->add_render_attribute( $link_key2, 'rel', 'nofollow' );
                        }
                    }
                    $link_attribute2 = $widget->get_render_attribute_string( $link_key2 );
                    ?>
                    <div class="pxl-swiper-slide">
                        <div class="pxl-item--inner <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms" data-wow-duration="<?php echo esc_attr($settings['pxl_animate_duration']); ?>s">
                            <?php if (!empty( $link2['url'] ) ) { ?><a <?php echo implode( ' ', [ $link_attribute2 ] ); ?>><?php } ?>
                                <?php echo wp_kses_post($thumbnail); ?>
                            <?php if ( !empty( $link2['url'] ) ) { ?></a><?php } ?>
                       </div>
                    </div>
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
