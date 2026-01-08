<?php
$default_settings = [
    'layout_mode' => 'fitRows',
];
$settings = array_merge($default_settings, $settings);
extract($settings);

$img_size = '';
if(!empty($settings['img_size'])) {
    $img_size = $settings['img_size'];
} else {
    $img_size = 'full';
}

$col_xs = $widget->get_setting('col_xs', '');
$col_sm = $widget->get_setting('col_sm', '');
$col_md = $widget->get_setting('col_md', '');
$col_lg = $widget->get_setting('col_lg', '');
$col_xl = $widget->get_setting('col_xl', '');

if($col_xl == '5') {
    $col_xl = 'pxl5';
} else {
    $col_xl = 12 / intval($col_xl);
}

$col_lg = 12 / intval($col_lg);
$col_md = 12 / intval($col_md);
$col_sm = 12 / intval($col_sm);
$col_xs = 12 / intval($col_xs);

$grid_sizer = "col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
$item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
?>
<?php if(isset($settings['partner']) && !empty($settings['partner']) && count($settings['partner'])): ?>
    <div class="pxl-grid pxl-partner pxl-partner1" data-layout="<?php echo esc_attr($layout_mode); ?>">
        <div class="pxl-grid-inner pxl-grid-masonry row" data-gutter="15">
            <div class="grid-sizer <?php echo esc_attr($grid_sizer); ?>"></div>
            <?php foreach ($settings['partner'] as $key => $value):
                $image_type = isset($value['image_type']) ? $value['image_type'] : '';
                $image = isset($value['image']) ? $value['image'] : '';
                $image_dark = isset($value['image_dark']) ? $value['image_dark'] : '';
                $icon = isset($value['pxl_icon']) ? $value['pxl_icon'] : '';
                $link = isset($value['link']) ? $value['link'] : '';
                $link_key = $widget->get_repeater_setting_key( 'link', 'value', $key );
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
                <div class="<?php echo esc_attr($item_class); ?>">
                    <div class="pxl-item--inner <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms" data-wow-duration="<?php echo esc_attr($settings['pxl_animate_duration']); ?>s">
                        <div class="pxl-item--image">
                            <?php if ( ! empty( $link['url'] ) ) { ?><a <?php echo implode( ' ', [ $link_attributes ] ); ?>><?php } ?>
                                <?php if($image_type == 'img' && !empty($image['id'])) :
                                    $img = pxl_get_image_by_size(array(
                                        'attach_id'  => $image['id'],
                                        'thumb_size' => $img_size,
                                        'class' => 'image-light no-lazyload',
                                    ));
                                    $thumbnail = $img['thumbnail'];
                                    echo wp_kses_post($thumbnail); ?>
                                <?php endif; ?>
                                <?php if($image_type == 'img' && !empty($image_dark['id'])) :
                                    $img_dark = pxl_get_image_by_size(array(
                                        'attach_id'  => $image_dark['id'],
                                        'thumb_size' => $img_size,
                                        'class' => 'image-dark no-lazyload',
                                    ));
                                    $thumbnail_dark = $img_dark['thumbnail'];
                                    echo wp_kses_post($thumbnail_dark); ?>
                                <?php endif; ?>
                                <?php if($image_type == 'icon' && !empty($icon)) :
                                    $is_new = \Elementor\Icons_Manager::is_migration_allowed();
                                    if ( $is_new ) {
                                        \Elementor\Icons_Manager::render_icon( $icon, [ 'aria-hidden' => 'true' ] );
                                    } else { ?>
                                        <?php \Elementor\Icons_Manager::render_icon( $settings['pxl_icon'], [ 'aria-hidden' => 'true', 'class' => '' ], 'i' ); ?>
                                    <?php } ?>
                                <?php endif; ?>
                            <?php if ( ! empty( $link['url'] ) ) { ?></a><?php } ?>
                        </div>
                   </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>
