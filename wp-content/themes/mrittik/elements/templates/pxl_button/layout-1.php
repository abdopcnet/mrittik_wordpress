<?php
$custom_icon = $widget->get_setting('custom_icon');
$widget->add_render_attribute( 'wrapper', 'class', 'pxl-button' );
$hide_cursor = ($settings['btn_style'] == 'btn btn-default') ? 'pxl-pointer-none' : '';
$widget->add_render_attribute('button', 'class', $settings['btn_style'] . ' ' . $settings['pxl_animate'] . ' ' . $hide_cursor);
if ( ! empty( $settings['link']['url'] ) ) {
    $widget->add_render_attribute( 'button', 'href', $settings['link']['url'] );

    if ( $settings['link']['is_external'] ) {
        $widget->add_render_attribute( 'button', 'target', '_blank' );
    }

    if ( $settings['link']['nofollow'] ) {
        $widget->add_render_attribute( 'button', 'rel', 'nofollow' );
    }
} ?>
<div <?php pxl_print_html($widget->get_render_attribute_string( 'wrapper' )); ?>>
    <a <?php pxl_print_html($widget->get_render_attribute_string( 'button' )); ?> data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms" data-wow-duration="<?php echo esc_attr($settings['pxl_animate_duration']); ?>s">
        <?php if($settings['button_effect'] != ''){ ?>
            <span class="btn-text pxl-wobble" data-text="<?php echo esc_attr($settings['text']); ?>" data-animation="<?php echo esc_attr($settings['button_effect']); ?>">
                <?php if(!empty($settings['text'])) {
                    $btn_text = $settings['text'];
                } else {
                    $btn_text = esc_html__('Click Here', 'mrittik');
                }
                $words = explode(' ', $btn_text);
                foreach ($words as $word) {
                    echo '<span>' . htmlspecialchars($word) . '</span> ';
                }
                ?>
            </span>
        <?php } else { ?>
            <span class="btn-text" data-text="<?php echo esc_attr($settings['text']); ?>">
                <?php echo pxl_print_html($settings['text']);?>
            </span>
        <?php } ?>
        <?php if ($settings['btn_style'] == 'btn btn-default') : ?>
            <svg width="206" height="48" viewBox="0 0 206 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M305.946 337L-3 28.0539V26.8789L307.121 337H305.946Z"/>
                <path d="M329.754 337L-3 4.24629V3.07129L330.929 337H329.754Z"/>
                <path d="M353.562 337L-3 -19.5623V-20.7373L354.737 337H353.562Z"/>
                <path d="M377.371 337L-3 -43.3709V-44.5459L378.546 337H377.371Z"/>
                <path d="M401.179 337L-3 -67.1795V-68.3545L402.354 337H401.179Z"/>
                <path d="M424.988 337L-3 -90.9871V-92.1621L426.163 337H424.988Z"/>
                <path d="M448.796 337L-3 -114.796V-115.971L449.971 337H448.796Z"/>
                <path d="M472.604 337L-3 -138.604V-139.779L473.779 337H472.604Z"/>
                <path d="M-3 -163H-2.4125L497 336.412V337H496.412L-3 -162.413V-163Z"/>
                <path d="M21.3957 -163L497 312.604V313.779L20.2207 -163H21.3957Z"/>
                <path d="M45.2043 -163L497 288.796V289.971L44.0293 -163H45.2043Z"/>
                <path d="M69.0129 -163L497 264.988V266.163L67.8379 -163H69.0129Z"/>
                <path d="M92.8215 -163L497.001 241.179V242.354L91.6465 -163H92.8215Z"/>
                <path d="M116.63 -163L497.001 217.371V218.546L115.455 -163H116.63Z"/>
                <path d="M140.437 -163L496.999 193.562V194.737L139.262 -163H140.437Z"/>
                <path d="M164.245 -163L496.999 169.754V170.929L163.07 -163H164.245Z"/>
                <path d="M188.054 -163L497 145.946V147.121L186.879 -163H188.054Z"/>
                <path d="M293.862 337L-3 40.1379V38.9629L295.037 337H293.862Z"/>
                <path d="M317.671 337L-3 16.3293V15.1543L318.846 337H317.671Z"/>
                <path d="M341.479 337L-3 -7.47929V-8.6543L342.654 337H341.479Z"/>
                <path d="M365.288 337L-3 -31.2879V-32.4629L366.463 337H365.288Z"/>
                <path d="M389.096 337L-3 -55.0955V-56.2705L390.271 337H389.096Z"/>
                <path d="M412.904 337L-3 -78.9041V-80.0791L414.079 337H412.904Z"/>
                <path d="M436.713 337L-3 -102.713V-103.888L437.888 337H436.713Z"/>
                <path d="M460.521 337L-3 -126.521V-127.696L461.696 337H460.521Z"/>
                <path d="M484.329 337L-3 -150.329V-151.504L485.504 337H484.329Z"/>
                <path d="M9.31172 -163L496.999 324.688V325.863L8.13672 -163H9.31172Z"/>
                <path d="M33.1203 -163L496.999 300.879V302.054L31.9453 -163H33.1203Z"/>
                <path d="M56.9289 -163L497 277.071V278.246L55.7539 -163H56.9289Z"/>
                <path d="M80.7375 -163L497 253.263V254.438L79.5625 -163H80.7375Z"/>
                <path d="M104.546 -163L497 229.454V230.629L103.371 -163H104.546Z"/>
                <path d="M128.355 -163L497.001 205.646V206.821L127.18 -163H128.355Z"/>
                <path d="M152.163 -163L497.001 181.838V183.013L150.988 -163H152.163Z"/>
                <path d="M175.97 -163L496.999 158.029V159.204L174.795 -163H175.97Z"/>
                <path d="M199.779 -163L496.999 134.221V135.396L198.604 -163H199.779Z"/>
            </svg>
        <?php endif; ?>
        <?php if ($settings['btn_style'] == 'pxl-btn-line') : ?>
            <span class="btn-icon">
                <span class="line"></span>
                <span class="circle"></span>
                <span class="dot"></span>
            </span>
        <?php endif; ?>
    </a>
</div>