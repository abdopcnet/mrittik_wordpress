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
$speed = $widget->get_setting('speed', '500');
$opts = [
    'slide_direction'               => 'horizontal',
    'slide_percolumn'               => '1',
    'slide_mode'                    => 'fade',
    'slides_to_show'                => $col_xl,
    'slides_to_show_xxl'            => $col_xxl,
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
    'speed'                         => $speed
];
$widget->add_render_attribute( 'carousel', [
    'class'         => 'pxl-swiper-container',
    'dir'           => is_rtl() ? 'rtl' : 'ltr',
    'data-settings' => wp_json_encode($opts)
]);
$img_size = '';
if(!empty($settings['img_size'])) {
    $img_size = $settings['img_size'];
} else {
    $img_size = 'full';
}
if(isset($settings['list']) && !empty($settings['list']) && count($settings['list'])): ?>
    <div class="pxl-swiper-sliders pxl-gallery-carousel pxl-gallery-carousel1 pxl-parent-cursor pxl-swiper-arrow-show" data-arrow="<?php echo esc_attr($arrows); ?>">
        <div class="pxl-carousel-inner">
            <div <?php pxl_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>
                <div class="pxl-swiper-wrapper">
                    <?php foreach ($settings['list'] as $key => $value):
                        $image = isset($value['image']) ? $value['image'] : '';
                        $btn_text = isset($value['btn_text']) ? $value['btn_text'] : '';
                        $link = isset($value['link']) ? $value['link'] : '';
                        $link_key = $widget->get_repeater_setting_key( 'title', 'value', $key );
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
                                <?php if ( !empty($image['id']) ) :
                                    $img_icon  = pxl_get_image_by_size( array(
                                        'attach_id'  => $image['id'],
                                        'thumb_size' => $img_size,
                                    ) );
                                    $thumbnail = $img_icon['thumbnail']; ?>
                                    <?php if(!empty($link['url'])) { ?><a <?php echo implode( ' ', [ $link_attributes ] ); ?>><?php } ?>
                                    <div class="item--image"><?php echo pxl_print_html($thumbnail); ?></div>
                                    <?php if(!empty($link['url'])) { ?></a><?php } ?>
                                <?php endif; ?>
                           </div>
                        </div>
                    <?php endforeach; ?>
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
<?php endif; ?>
