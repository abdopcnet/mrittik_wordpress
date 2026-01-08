<?php
extract($settings);
?>
<div id="nav" class="pxl-meta-box pxl-meta-box1 pxl-text-img-wrap pxl-parent-transition <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms" data-wow-duration="<?php echo esc_attr($settings['pxl_animate_duration']); ?>s">
    <div class="pxl-item--inner">
        <ul class="pxl-item--content">
            <?php foreach ($content_list as $key => $value):
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
                <li class="list--item pxl-transtion" <?php if(!empty($value['sub_title'])) { ?> data-text="<?php pxl_print_html($value['sub_title']) ?>"<?php } ?> data-target=".item-img-<?php echo esc_attr($key)?>">
                    <a class="pxl-transtion" <?php echo implode( ' ', [ $link_attributes ] ); ?>>
                        <?php if(!empty($value['title'])): ?>
                            <h2 class="item--title el-empty pxl-transtion"><?php pxl_print_html($value['title']) ?></h2>
                        <?php endif; ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
        <div class="pxl-item--image">
            <?php foreach ($content_list as $key => $value):  ?>
                <?php if(!empty($value['image']['url'])) : ?>
                    <div class="image--item pxl-spill-middle pxl-ov-hidden item-img-<?php echo esc_attr($key)?>">
                        <div class="image--inner pxl-spill-middle pxl-ov-hidden">
                            <img src="<?php echo esc_url($value['image']['url'])?>" alt="image hover">
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
</div>