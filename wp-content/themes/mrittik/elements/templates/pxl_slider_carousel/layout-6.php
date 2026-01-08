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
$image_size = !empty($settings['img_size']) ? $settings['img_size'] : 'full';
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
if(isset($settings['slider6']) && !empty($settings['slider6']) && count($settings['slider6'])): ?>
    <div class="pxl-swiper-sliders pxl-slider-carousel pxl-slider-carousel6 pxl-parent-transition pxl-parent-cursor pxl-swiper-arrow-show <?php if($arrows == 'true') { echo esc_attr__( 'pxl-show-arrow', 'mrittik' ); } ?>" data-view-auto="<?php echo esc_attr($col_xl); ?>">
        <div class="pxl-carousel-inner">
            <div <?php pxl_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>
                <div class="pxl-swiper-wrapper">
                    <?php foreach ($settings['slider6'] as $key => $value):
                        $image1_light = isset($value['sl06_image01_light']) ? $value['sl06_image01_light'] : '';
                        $image2_light = isset($value['sl06_image02_light']) ? $value['sl06_image02_light'] : '';
                        $image3_light = isset($value['sl06_image03_light']) ? $value['sl06_image03_light'] : '';
                        $image1_dark = isset($value['sl06_image01_dark']) ? $value['sl06_image01_dark'] : '';
                        $image2_dark = isset($value['sl06_image02_dark']) ? $value['sl06_image02_dark'] : '';
                        $image3_dark = isset($value['sl06_image03_dark']) ? $value['sl06_image03_dark'] : '';
                        $sub_text = isset($value['sub_text6']) ? $value['sub_text6'] : '';
                        $title = isset($value['title6']) ? $value['title6'] : '';
                        $btn_text = isset($value['btn_text6']) ? $value['btn_text6'] : '';
                        $link = isset($value['btn_link6']) ? $value['btn_link6'] : '';
                        $link_key = $widget->get_repeater_setting_key( 'title6', 'value', $key );

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
                                <div class="pxl-item--content">
                                    <div class="content--inner">
                                        <div class="content--image">
                                            <?php
                                            $images_light = array($image1_light, $image2_light, $image3_light);
                                            $images_dark = array($image1_dark, $image2_dark, $image3_dark);

                                            for ($i = 0; $i < 3; $i++) {
                                                $light_image = $images_light[$i];
                                                $dark_image = $images_dark[$i];

                                                if (!empty($light_image['id'])) {
                                                    $img_light = pxl_get_image_by_size(array(
                                                        'attach_id'  => $light_image['id'],
                                                        'thumb_size' => $image_size,
                                                        'class' => 'img' . ($i + 1) . ' img-light no-lazyload'
                                                    ));
                                                    $thumbnail_light = $img_light['thumbnail'];
                                                    echo wp_kses_post($thumbnail_light);
                                                }

                                                if (!empty($dark_image['id'])) {
                                                    $img_dark = pxl_get_image_by_size(array(
                                                        'attach_id'  => $dark_image['id'],
                                                        'thumb_size' => $image_size,
                                                        'class' => 'img' . ($i + 1) . ' img-dark no-lazyload'
                                                    ));
                                                    $thumbnail_dark = $img_dark['thumbnail'];
                                                    echo wp_kses_post($thumbnail_dark);
                                                }
                                            }
                                            ?>
                                        </div>
                                        <div class="content--wrapper">
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
                                                        echo pxl_print_html('Click Here', 'mrittik');
                                                    } ?>
                                                </span>
                                                <?php if ( ! empty( $link['url'] ) ) { ?></a><?php } ?>
                                            </div>
                                        </div>
                                        <span class="content--line pxl-transtion"></span>
                                    </div>
                                </div>
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
<?php endif; ?>
