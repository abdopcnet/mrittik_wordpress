<?php if ( ! empty( $settings['item_link2']['url'] ) ) {
    $widget->add_render_attribute( 'item_link2', 'href', $settings['item_link2']['url'] );
    if ( $settings['item_link2']['is_external'] ) {
        $widget->add_render_attribute( 'item_link2', 'target', '_blank' );
    }
    if ( $settings['item_link2']['nofollow'] ) {
        $widget->add_render_attribute( 'item_link2', 'rel', 'nofollow' );
    }
}
?>
<div class="pxl-contact-info pxl-contact-info2 <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms" data-wow-duration="<?php echo esc_attr($settings['pxl_animate_duration']); ?>s">
    <div class="pxl-item--inner">
        <?php if ( !empty( $settings['image2']['id'] ) ) :
            $image_size = !empty($settings['img_size']) ? $settings['img_size'] : 'full';
            $img  = pxl_get_image_by_size( array(
                'attach_id'  => $settings['image2']['id'],
                'thumb_size' => $image_size,
                'class' => 'no-lazyload'
            ) );
            $thumbnail = $img['thumbnail']; ?>
            <div class="pxl-item--image">
                <?php echo wp_kses_post($thumbnail); ?>
            </div>
        <?php endif; ?>
        <div class="pxl-item--content">
            <?php if ( !empty($settings['title2']) ) : ?>
                <h5 class="pxl-item--title"><?php if ( ! empty( $settings['item_link2']['url'] ) ) { ?> <a <?php pxl_print_html($widget->get_render_attribute_string( 'item_link2' )); ?>> <?php } ?>
                    <?php echo pxl_print_html($settings['title2']); ?>
                <?php if ( ! empty( $settings['item_link2']['url'] ) ) { ?> </a> <?php } ?>
                </h5>
            <?php endif; ?>
            <?php if ( !empty($settings['desc2']) ) : ?>
                <div class="pxl-item--description">
                    <?php echo pxl_print_html($settings['desc2']); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>