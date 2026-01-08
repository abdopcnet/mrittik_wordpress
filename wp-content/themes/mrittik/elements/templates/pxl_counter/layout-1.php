<?php
$widget->add_render_attribute( 'counter', [
    'class' => 'pxl--counter-value',
    'data-duration' => $settings['duration'],
    'data-to-value' => $settings['ending_number'],
    'data-delimiter' => $settings['thousand_separator_char'],
    'data-text' => $settings['suffix'],
] ); ?>
<div class="pxl-counter pxl-counter1 <?php echo esc_attr($settings['counter_style']); ?> <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms" data-wow-duration="<?php echo esc_attr($settings['pxl_animate_duration']); ?>s">
    <div class="pxl--item-inner">
        <div class="pxl--counter-number">
            <?php if(!empty($settings['prefix'])) : ?>
                <span class="pxl--counter-prefix"><?php echo pxl_print_html($settings['prefix']); ?></span>
            <?php endif; ?>
            <span <?php pxl_print_html($widget->get_render_attribute_string( 'counter' )); ?>><?php echo esc_html($settings['starting_number']); ?></span>
            <?php if($settings['counter_style'] != 'style2' && !empty($settings['suffix'])) : ?>
                <span class="pxl--counter-suffix"><?php echo pxl_print_html($settings['suffix']); ?></span>
            <?php endif; ?>
        </div>
        <?php if(!empty($settings['title'])) : ?>
            <div class="pxl--item-title"><?php echo pxl_print_html($settings['title']); ?></div>
        <?php endif; ?>
    </div>
</div>