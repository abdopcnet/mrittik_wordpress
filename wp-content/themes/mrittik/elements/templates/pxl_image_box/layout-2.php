<?php
if ( ! empty( $settings['logo_link']['url'] ) ) {
    $widget->add_render_attribute( 'logo_link', 'href', $settings['logo_link']['url'] );

    if ( $settings['logo_link']['is_external'] ) {
        $widget->add_render_attribute( 'logo_link', 'target', '_blank' );
    }
    if ( $settings['logo_link']['nofollow'] ) {
        $widget->add_render_attribute( 'logo_link', 'rel', 'nofollow' );
    }
} ?>
<div class="pxl-image-box pxl-image-box2 <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms" data-wow-duration="<?php echo esc_attr($settings['pxl_animate_duration']); ?>s">
    <div class="pxl-item--inner">
        <?php if ( ! empty( $settings['logo_link']['url'] ) ) { ?><a <?php pxl_print_html($widget->get_render_attribute_string( 'logo_link' )); ?>><?php } ?>
        <?php if ( !empty($settings['circle_text']) ) : ?>
            <div class="item--text"><?php echo pxl_print_html($settings['circle_text']); ?></div>
        <?php endif; ?>
        <?php if ( !empty($settings['logo']['id']) || !empty($settings['logo_dark']['id']) ) :
            $image_size = !empty($settings['img_size']) ? $settings['img_size'] : 'full'; ?>
            <div class="item--image">
                <?php if(!empty($settings['logo']['id'])) :
                    $img  = pxl_get_image_by_size( array(
                        'attach_id'  => $settings['logo']['id'],
                        'thumb_size' => $image_size,
                        'class' => 'logo-light',
                    ) );
                    $thumbnail    = $img['thumbnail'];
                    ?>
                    <?php echo wp_kses_post($thumbnail); ?>
                <?php endif; ?>
                <?php if(!empty($settings['logo_dark']['id'])) :
                    $img_dark  = pxl_get_image_by_size( array(
                        'attach_id'  => $settings['logo_dark']['id'],
                        'thumb_size' => $image_size,
                        'class' => 'logo-dark',
                    ) );
                    $thumbnail_dark    = $img_dark['thumbnail'];
                    ?>
                    <?php echo wp_kses_post($thumbnail_dark); ?>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        <?php if ( ! empty( $settings['logo_link']['url'] ) ) { ?></a><?php } ?>
    </div>
</div>