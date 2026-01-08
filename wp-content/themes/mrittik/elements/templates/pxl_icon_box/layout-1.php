<?php
$img_size = '';
if(!empty($settings['img_size'])) {
    $img_size = $settings['img_size'];
} else {
    $img_size = 'full';
}
$widget->add_render_attribute('button', 'class', 'item--link');
if ( ! empty( $settings['link']['url'] ) ) {
    $widget->add_render_attribute( 'button', 'href', $settings['link']['url'] );

    if ( $settings['link']['is_external'] ) {
        $widget->add_render_attribute( 'button', 'target', '_blank' );
    }

    if ( $settings['link']['nofollow'] ) {
        $widget->add_render_attribute( 'button', 'rel', 'nofollow' );
    }
}
?>
<div class="pxl-icon-box pxl-icon-box1 <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms" data-wow-duration="<?php echo esc_attr($settings['pxl_animate_duration']); ?>s">
    <div class="pxl-item--inner">
        <div class="pxl-item--content">
            <?php if ( !empty( $settings['link']['url'] ) ) { ?><a aria-label="<?php echo pxl_print_html($settings['title']); ?>" <?php pxl_print_html($widget->get_render_attribute_string( 'button' )); ?>><?php } ?>
                <?php if ( $settings['icon_type'] == 'icon' && !empty($settings['pxl_icon']['value']) ) : ?>
                    <div class="pxl-item--icon">
                        <?php \Elementor\Icons_Manager::render_icon( $settings['pxl_icon'], [ 'aria-hidden' => 'true', 'class' => '' ], 'i' ); ?>
                    </div>
                <?php endif; ?>
                <?php if ( $settings['icon_type'] == 'image' && !empty($settings['icon_image']['id']) ) : ?>
                    <div class="pxl-item--icon">
                        <?php $img_icon  = pxl_get_image_by_size( array(
                            'attach_id'  => $settings['icon_image']['id'],
                            'thumb_size' => $img_size,
                        ) );
                        $thumbnail_icon    = $img_icon['thumbnail'];
                        echo pxl_print_html($thumbnail_icon); ?>
                    </div>
                <?php endif; ?>
                <?php if (!empty($settings['title'])) : ?>
                    <h6 class="pxl-item--title el-empty"><?php echo pxl_print_html($settings['title']); ?></h6>
                <?php endif; ?>
            <?php if ( ! empty( $settings['link']['url'] ) ) { ?></a><?php } ?>
        </div>
    </div>
</div>