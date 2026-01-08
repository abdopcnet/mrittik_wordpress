<?php
$default_settings = [
    'title' => '',
    'list' => '',
];
$settings = array_merge($default_settings, $settings);
extract($settings);
?>
<?php if(isset($list) && !empty($list) && count($list)): ?>
    <div class="pxl-list <?php echo esc_attr($list_style); ?> <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms" data-wow-duration="<?php echo esc_attr($settings['pxl_animate_duration']); ?>s">
        <?php if(!empty($title)): ?>
            <<?php echo esc_attr($settings['title_tag']); ?> class="pxl-item--title el-empty">
                <?php echo pxl_print_html($settings['title']); ?>
                <span class="title-line"></span>
            </<?php echo esc_attr($settings['title_tag']); ?>>
        <?php endif ;?>
        <ul class="pxl-item--list">
            <?php
            foreach ($list as $key => $value):
                $content = isset($value['content']) ? $value['content'] : '';
                $link_text = isset($value['link_text']) ? $value['link_text'] : '';
                $link = isset($value['link']) ? $value['link'] : '';
                $link_key = $widget->get_repeater_setting_key( 'content', 'value', $key );
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
                <li class="pxl-list--content">
                    <?php if (!empty($content)): ?>
                        <span><?php echo pxl_print_html($content); ?></span>
                    <?php endif; ?>
                    <?php if (!empty($link_text)) : ?>
                        <a <?php echo implode( ' ', [ $link_attributes ] ); ?>>
                            <?php echo pxl_print_html($link_text); ?>
                        </a>
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>