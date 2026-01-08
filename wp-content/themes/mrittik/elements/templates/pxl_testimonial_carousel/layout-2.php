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

$space_between = $widget->get_setting('space_between2');
$opts = [
    'slide_direction'               => 'horizontal',
    'slide_percolumn'               => '1',
    'slide_mode'                    => 'slide',
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
    'center'                        => 'true',
    'space_between2'                => $space_between,
    'delay'                         => $autoplay_speed,
    'loop'                          => $infinite,
    'speed'                         => $speed
];
$widget->add_render_attribute( 'carousel', [
    'class'         => 'pxl-swiper-container',
    'dir'           => is_rtl() ? 'rtl' : 'ltr',
    'data-settings' => wp_json_encode($opts)
]);
if(isset($settings['testimonial_2']) && !empty($settings['testimonial_2']) && count($settings['testimonial_2'])): ?>
    <div class="pxl-swiper-sliders pxl-testimonial-carousel pxl-testimonial-carousel2 pxl-swiper-arrow-show pxl-parent-transition pxl-parent-cursor pxl-drag-area <?php if($arrows == 'true') { echo esc_attr__( 'pxl-show-arrow', 'mrittik' ); } ?>" data-view-auto="<?php echo esc_attr($col_xl); ?>" style="--data-speed: <?php echo esc_attr($speed .'ms'); ?>">
        <div class="pxl-carousel-inner">
            <div <?php pxl_print_html($widget->get_render_attribute_string( 'carousel' ));?>>
                <div class="pxl-swiper-wrapper">
                    <?php foreach ($settings['testimonial_2'] as $key => $value):
                        $image = isset($value['image_third']) ? $value['image_third'] : '';
                        $desc = isset($value['desc2']) ? $value['desc2'] : '';
                        $sub_text = isset($value['sub_text2']) ? $value['sub_text2'] : '';
                        ?>
                        <div class="pxl-swiper-slide">
                            <div class="pxl-item--inner <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms" data-wow-duration="<?php echo esc_attr($settings['pxl_animate_duration']); ?>s">
                                <?php if(!empty($image['id'])) :
                                    $image_size = !empty($settings['img_size']) ? $settings['img_size'] : 'full';
                                    $img = pxl_get_image_by_size( array(
                                        'attach_id'  => $image['id'],
                                        'thumb_size' => $image_size,
                                        'class' => 'no-lazyload'
                                    ) );
                                    $thumbnail = $img['thumbnail'];
                                    ?>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="125" height="125" viewBox="0 0 125 125" fill="none" class="pxl-transtion">
                                        <circle cx="62.5" cy="62.5" r="62.5" fill="#D9D9D9" fill-opacity="0.5"/>
                                    </svg>
                                    <div class="pxl-item--image pxl-transtion">
                                        <?php echo wp_kses_post($thumbnail); ?>
                                    </div>
                                <?php endif; ?>
                                <?php if(!empty($desc)) : ?>
                                    <div class="pxl-item--desc el-empty pxl-transtion <?php echo esc_attr($settings['pxl_animate_description']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay_description']); ?>ms" data-wow-duration="<?php echo esc_attr($settings['pxl_animate_duration_description']); ?>s"><?php echo pxl_print_html('“ ' . $desc . ' ”'); ?></div>
                                <?php endif; ?>
                                <?php if(!empty($sub_text)) : ?>
                                    <h6 class="pxl-item--subtitle pxl-transtion"><?php echo pxl_print_html($sub_text); ?></h6>
                                <?php endif; ?>
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