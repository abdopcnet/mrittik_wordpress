<?php
$default_settings = [
    'current' => '',
    'menu_item' => '',
    'dropdown_position' => '',
];
$settings = array_merge($default_settings, $settings);
extract($settings);
?>
<?php if(!empty($current) && isset($menu_item) && !empty($menu_item) && count($menu_item)): ?>
    <div class="pxl-pick-list <?php echo esc_attr($dropdown_position); ?>">
        <div class="pxl-current-item">
            <label><?php echo esc_attr($current); ?></label>
        </div>
        <ul class="pxl-current-list">
            <?php
                foreach ($menu_item as $key => $value):
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
                    <li>
                        <?php if ( ! empty( $value['link']['url'] ) ) { ?><a <?php echo implode( ' ', [ $link_attributes ] ); ?>><?php } ?>
                            <?php echo pxl_print_html($value['title']); ?>
                        <?php if ( ! empty( $value['link']['url'] ) ) { ?></a><?php } ?>
                    </li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>
