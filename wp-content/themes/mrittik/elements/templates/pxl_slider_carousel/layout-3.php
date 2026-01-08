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
    'delay'                         => $autoplay_speed,
    'loop'                          => $infinite,
    'center'                        => $center,
    'speed'                         => $speed
];
$widget->add_render_attribute( 'carousel', [
    'class'         => 'pxl-swiper-container',
    'dir'           => is_rtl() ? 'rtl' : 'ltr',
    'data-settings' => wp_json_encode($opts)
]);
if(isset($settings['slider2']) && !empty($settings['slider2']) && count($settings['slider2'])): ?>
    <div class="pxl-swiper-sliders pxl-slider-carousel pxl-slider-carousel3 pxl-parent-transition pxl-swiper-arrow-show pxl-parent-cursor pxl-drag-area <?php if($arrows == 'true') { echo esc_attr__( 'pxl-show-arrow', 'mrittik' ); } ?>" data-view-auto="<?php echo esc_attr($col_xl); ?>">
        <div class="pxl-carousel-inner">
            <div <?php pxl_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>
                <div class="pxl-swiper-wrapper">
                    <?php foreach ($settings['slider2'] as $key => $value):
                        $image = isset($value['image2']) ? $value['image2'] : '';
                        $mask_text = isset($value['mask_text2']) ? $value['mask_text2'] : '';
                        $sub_text = isset($value['sub_text2']) ? $value['sub_text2'] : '';
                        $title = isset($value['title2']) ? $value['title2'] : '';
                        $show_bg = isset($value['show_bg']) ? $value['show_bg'] : '';
                        $image2_bg = isset($value['image2_bg']) ? $value['image2_bg'] : '';
                        $image2_bg_dark = isset($value['image2_bg_dark']) ? $value['image2_bg_dark'] : '';
                        $btn_text = isset($value['btn_text2']) ? $value['btn_text2'] : '';
                        $link = isset($value['btn_link2']) ? $value['btn_link2'] : '';
                        $link_key = $widget->get_repeater_setting_key( 'title2', 'value', $key );
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
                        <div class="pxl-swiper-slide <?php if ( $show_bg == 'true' ) { echo "pxl-slide-background"; } ?>">
                            <div class="pxl-item--inner <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms" data-wow-duration="<?php echo esc_attr($settings['pxl_animate_duration']); ?>s">
                                <div class="pxl-item--content">
                                    <div class="content--inner">
                                        <div class="content--wrapper" data-parallax='{"x": 50}'>
                                            <?php if(!empty($title)) : ?>
                                                <h2 class="pxl-item--title el-empty pxl-transtion"><?php echo pxl_print_html($title); ?></h2>
                                            <?php endif; ?>
                                            <div class="pxl-item--link">
                                                <?php if(!empty($sub_text)) : ?>
                                                    <span class="pxl-item--subtitle pxl-transtion"><?php echo pxl_print_html($sub_text).' —'; ?></span>
                                                <?php endif; ?>
                                                <?php if ( !empty( $link['url'] ) ) { ?><a class="item--button" <?php echo implode( ' ', [ $link_attributes ] ); ?>><?php } ?>
                                                <span class="btn-text">
                                                    <?php if(!empty($btn_text)) {
                                                        echo pxl_print_html($btn_text);
                                                    } else {
                                                        echo pxl_print_html('VIEW DETAILS', 'mrittik');
                                                    } ?>
                                                </span>
                                                <?php if ( ! empty( $link['url'] ) ) { ?></a><?php } ?>
                                            </div>
                                        </div>
                                        <?php if(!empty($image['id'])) : ?>
                                           <div class="mask--content" style="background-image: url(<?php echo esc_url($image['url']); ?>);">
                                            <?php if(!empty($mask_text)) : ?>
                                                <?php echo pxl_print_html($mask_text); ?>
                                            <?php endif; ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                           </div>
                            <?php if(!empty($image2_bg['id'])) : ?>
                                <div class="pxl-item--background bg-light" style="background-image: url(<?php echo esc_url($image2_bg['url']); ?>);"></div>
                            <?php endif; ?>
                            <?php if(!empty($image2_bg_dark['id'])) : ?>
                                <div class="pxl-item--background bg-dark" style="background-image: url(<?php echo esc_url($image2_bg_dark['url']); ?>);"></div>
                            <?php endif; ?>
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
<?php endif; ?>
