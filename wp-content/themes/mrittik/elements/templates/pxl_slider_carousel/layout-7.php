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

$widget->add_render_attribute('button1', 'class', 'pxl-btn-shine shine-light');
if ( ! empty( $settings['btn_link7_01']['url'] ) ) {
    $widget->add_render_attribute( 'button1', 'href', $settings['btn_link7_01']['url'] );

    if ( $settings['btn_link7_01']['is_external'] ) {
        $widget->add_render_attribute( 'button1', 'target', '_blank' );
    }

    if ( $settings['btn_link7_01']['nofollow'] ) {
        $widget->add_render_attribute( 'button1', 'rel', 'nofollow' );
    }
}
$widget->add_render_attribute('button2', 'class', 'pxl-btn-shine');
if ( ! empty( $settings['btn_link7_02']['url'] ) ) {
    $widget->add_render_attribute( 'button2', 'href', $settings['btn_link7_02']['url'] );

    if ( $settings['btn_link7_02']['is_external'] ) {
        $widget->add_render_attribute( 'button2', 'target', '_blank' );
    }

    if ( $settings['btn_link7_02']['nofollow'] ) {
        $widget->add_render_attribute( 'button2', 'rel', 'nofollow' );
    }
}
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
?>
<div class="pxl-swiper-sliders pxl-slider-carousel pxl-slider-carousel7 pxl-parent-transition pxl-parent-cursor pxl-swiper-arrow-show <?php if($arrows == 'true') { echo esc_attr__( 'pxl-show-arrow', 'mrittik' ); } ?>" data-view-auto="<?php echo esc_attr($col_xl); ?>">
    <div class="pxl-carousel-inner">
        <div <?php pxl_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>
            <div class="pxl-swiper-wrapper">
                <div class="pxl-swiper-slide">
                    <div class="pxl-item--inner <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms" data-wow-duration="<?php echo esc_attr($settings['pxl_animate_duration']); ?>s">
                        <div class="pxl-item--content">
                            <div class="content--inner">
                                <div class="content--wrapper">
                                    <?php if(!empty($settings['sl07_logo']['id'])) :
                                        $img  = pxl_get_image_by_size( array(
                                            'attach_id'  => $settings['sl07_logo']['id'],
                                            'thumb_size' => 'full',
                                            'class' => 'logo',
                                        ) );
                                        $thumbnail = $img['thumbnail'];
                                        ?>
                                        <?php echo wp_kses_post($thumbnail); ?>
                                    <?php endif; ?>
                                    <?php if(!empty($settings['sub_text7'])) : ?>
                                        <div class="pxl-item--subtitle pxl-transtion"><?php echo pxl_print_html($settings['sub_text7']); ?></div>
                                    <?php endif; ?>
                                    <?php if(!empty($settings['title7'])) : ?>
                                        <h2 class="pxl-item--title el-empty pxl-transtion"><?php echo pxl_print_html($settings['title7']); ?></h2>
                                    <?php endif; ?>
                                    <div class="pxl-item--link">
                                        <?php if ( !empty( $settings['btn_link7_01']['url'] ) ) { ?><a <?php pxl_print_html($widget->get_render_attribute_string( 'button1' )); ?>><?php } ?>
                                        <span class="btn-text">
                                            <?php if(!empty($settings['btn_text7_01'])) {
                                                echo pxl_print_html($settings['btn_text7_01']);
                                            } else {
                                                echo pxl_print_html('Click Here', 'mrittik');
                                            } ?>
                                        </span>
                                        <?php if ( ! empty( $settings['btn_link7_01']['url'] ) ) { ?></a><?php } ?>
                                        <?php if ( !empty( $settings['btn_link7_02']['url'] ) ) { ?><a <?php pxl_print_html($widget->get_render_attribute_string( 'button2' )); ?>><?php } ?>
                                        <span class="btn-text">
                                            <?php if(!empty($settings['btn_text7_02'])) {
                                                echo pxl_print_html($settings['btn_text7_02']);
                                            } else {
                                                echo pxl_print_html('Click Here', 'mrittik');
                                            } ?>
                                        </span>
                                        <?php if ( ! empty( $settings['btn_link7_02']['url'] ) ) { ?></a><?php } ?>
                                    </div>
                                </div>
                                <div class="content--image content-left">
                                    <?php
                                    $images_left = array($settings['sl07_image01_left'], $settings['sl07_image02_left'], $settings['sl07_image03_left']);

                                    for ($i = 0; $i < 3; $i++) {
                                        $left_image = $images_left[$i];

                                        if (!empty($left_image['id'])) {
                                            $img_left = pxl_get_image_by_size(array(
                                                'attach_id'  => $left_image['id'],
                                                'thumb_size' => $image_size,
                                                'class' => 'img' . ($i + 1) . ' img-left no-lazyload'
                                            ));
                                            $thumbnail_left = $img_left['thumbnail'];
                                            ?>
                                            <div class="image-init image-left"><?php echo wp_kses_post($thumbnail_left); ?></div>
                                        <?php }
                                    }
                                    ?>
                                </div>
                                <div class="content--image content-right">
                                    <?php
                                    $images_right = array($settings['sl07_image01_right'], $settings['sl07_image02_right'], $settings['sl07_image03_right']);

                                    for ($i = 0; $i < 3; $i++) {
                                        $right_image = $images_right[$i];

                                        if (!empty($right_image['id'])) {
                                            $img_right = pxl_get_image_by_size(array(
                                                'attach_id'  => $right_image['id'],
                                                'thumb_size' => $image_size,
                                                'class' => 'img' . ($i + 1) . ' img-right no-lazyload'
                                            ));
                                            $thumbnail_right = $img_right['thumbnail'];
                                            ?>
                                            <div class="image-init image-right"><?php echo wp_kses_post($thumbnail_right); ?></div>
                                        <?php }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
