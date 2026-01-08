<?php
if ( ! empty( $settings['image_link']['url'] ) ) {
    $widget->add_render_attribute( 'image_link', 'href', $settings['image_link']['url'] );

    if ( $settings['image_link']['is_external'] ) {
        $widget->add_render_attribute( 'image_link', 'target', '_blank' );
    }

    if ( $settings['image_link']['nofollow'] ) {
        $widget->add_render_attribute( 'image_link', 'rel', 'nofollow' );
    }
} ?>
<div class="pxl-image-single pxl-image-single1 <?php if(!empty($settings['img_effect'])) { echo esc_attr($settings['img_effect']); } ?> <?php if(($settings['show_line'] == 'true')) { echo esc_attr('divider-top', 'mrittik'); } ?> <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms" data-wow-duration="<?php echo esc_attr($settings['pxl_animate_duration']); ?>s">
    <?php if(!empty($settings['image']['id'])) : ?>
        <?php if ($settings['image_type'] == 'img') {
            $image_size = !empty($settings['img_size']) ? $settings['img_size'] : 'full';
            $img = pxl_get_image_by_size( array(
                'attach_id'  => $settings['image']['id'],
                'thumb_size' => $image_size,
                'class' => 'no-lazyload'
            ) );
            $thumbnail = $img['thumbnail'];
            ?>
            <div class="pxl-item--inner">
                <?php if (!empty( $settings['image_link']['url'] ) ) { ?><a <?php pxl_print_html($widget->get_render_attribute_string( 'image_link' )); ?>><?php } ?>
                    <?php if ( !empty( $settings['image']['url'] ) ) { echo wp_kses_post($thumbnail); } ?>
                <?php if ( !empty( $settings['image_link']['url'] ) ) { ?></a><?php } ?>
            </div>
        <?php } else { ?>
            <div class="pxl-image-bg bg-image" style="background-image: url(<?php echo esc_url($settings['image']['url']); ?>);"></div>
        <?php } ?>
    <?php endif; ?>
    <?php if($settings['show_particle'] == 'true') : ?>
        <div class="pxl-circle--shapes pxl-draw-svg" data-parallax='{"x": 20}'>
            <svg class="svg-main" xmlns="http://www.w3.org/2000/svg" width="179" height="325" viewBox="0 0 179 325">
                <path d="M283.138 337L-2 51.8625V50.6875L284.312 337H283.138Z"/>
                <path d="M259.329 337L-2 75.6711V74.4961L260.504 337H259.329Z"/>
                <path d="M235.521 337L-2 99.4787V98.3037L236.696 337H235.521Z"/>
                <path d="M211.712 337L-2 123.287V122.112L212.887 337H211.712Z"/>
                <path d="M187.904 337L-2 147.096V145.921L189.079 337H187.904Z"/>
                <path d="M164.096 337L-2 170.904V169.729L165.271 337H164.096Z"/>
                <path d="M140.287 337L-2 194.712V193.537L141.462 337H140.287Z"/>
                <path d="M116.479 337L-2 218.521V217.346L117.654 337H116.479Z"/>
                <path d="M92.6708 337L-2 242.329V241.154L93.8458 337H92.6708Z"/>
                <path d="M68.8625 337L-2 266.138V264.963L70.0375 337H68.8625Z"/>
                <path d="M45.0542 337L-2 289.945V288.771L46.2292 337H45.0542Z"/>
                <path d="M21.2458 337L-2 313.754V312.579L22.4208 337H21.2458Z"/>
                <path d="M306.946 337L-2 28.0539V26.8789L308.121 337H306.946Z"/>
                <path d="M330.754 337L-2 4.24629V3.07129L331.929 337H330.754Z"/>
                <path d="M354.562 337L-2 -19.5623V-20.7373L355.737 337H354.562Z"/>
                <path d="M378.371 337L-2 -43.3709V-44.5459L379.546 337H378.371Z"/>
                <path d="M402.179 337L-2 -67.1795V-68.3545L403.354 337H402.179Z"/>
                <path d="M425.988 337L-2 -90.9871V-92.1621L427.163 337H425.988Z"/>
                <path d="M449.796 337L-2 -114.796V-115.971L450.971 337H449.796Z"/>
                <path d="M473.604 337L-2 -138.604V-139.779L474.779 337H473.604Z"/>
                <path d="M-2 -163H-1.4125L498 336.412V337H497.412L-2 -162.413V-163Z"/>
                <path d="M22.3977 -163L498.002 312.604V313.779L21.2227 -163H22.3977Z"/>
                <path d="M46.2023 -163L497.998 288.796V289.971L45.0273 -163H46.2023Z"/>
                <path d="M70.0109 -163L497.998 264.988V266.163L68.8359 -163H70.0109Z"/>
                <path d="M93.8195 -163L497.999 241.179V242.354L92.6445 -163H93.8195Z"/>
                <path d="M117.628 -163L497.999 217.371V218.546L116.453 -163H117.628Z"/>
                <path d="M141.437 -163L497.999 193.562V194.737L140.262 -163H141.437Z"/>
                <path d="M165.245 -163L497.999 169.754V170.929L164.07 -163H165.245Z"/>
                <path d="M271.054 337L-2 63.9455V62.7705L272.229 337H271.054Z"/>
                <path d="M247.246 337L-2 87.7541V86.5791L248.421 337H247.246Z"/>
                <path d="M223.438 337L-2 111.563V110.388L224.613 337H223.438Z"/>
                <path d="M199.629 337L-2 135.371V134.196L200.804 337H199.629Z"/>
                <path d="M175.821 337L-2 159.179V158.004L176.996 337H175.821Z"/>
                <path d="M152.012 337L-2 182.988V181.812L153.188 337H152.012Z"/>
                <path d="M128.204 337L-2 206.796V205.621L129.379 337H128.204Z"/>
                <path d="M104.396 337L-2 230.604V229.429L105.571 337H104.396Z"/>
                <path d="M80.5875 337L-2 254.412V253.237L81.7625 337H80.5875Z"/>
                <path d="M56.7792 337L-2 278.221V277.046L57.9542 337H56.7792Z"/>
                <path d="M32.9708 337L-2 302.029V300.854L34.1458 337H32.9708Z"/>
                <path d="M9.1625 337L-2 325.837V324.662L10.3375 337H9.1625Z"/>
                <path d="M294.862 337L-2 40.1379V38.9629L296.037 337H294.862Z"/>
                <path d="M318.671 337L-2 16.3293V15.1543L319.846 337H318.671Z"/>
                <path d="M342.479 337L-2 -7.47929V-8.6543L343.654 337H342.479Z"/>
                <path d="M366.288 337L-2 -31.2879V-32.4629L367.463 337H366.288Z"/>
                <path d="M390.096 337L-2 -55.0955V-56.2705L391.271 337H390.096Z"/>
                <path d="M413.904 337L-2 -78.9041V-80.0791L415.079 337H413.904Z"/>
                <path d="M437.713 337L-2 -102.713V-103.888L438.888 337H437.713Z"/>
                <path d="M461.521 337L-2 -126.521V-127.696L462.696 337H461.521Z"/>
                <path d="M485.329 337L-2 -150.329V-151.504L486.504 337H485.329Z"/>
                <path d="M10.3117 -163L497.999 324.688V325.863L9.13672 -163H10.3117Z"/>
                <path d="M34.1203 -163L497.999 300.879V302.054L32.9453 -163H34.1203Z"/>
                <path d="M57.9289 -163L498 277.071V278.246L56.7539 -163H57.9289Z"/>
                <path d="M81.7375 -163L498 253.263V254.438L80.5625 -163H81.7375Z"/>
                <path d="M105.546 -163L498 229.454V230.629L104.371 -163H105.546Z"/>
                <path d="M129.355 -163L498.001 205.646V206.821L128.18 -163H129.355Z"/>
                <path d="M153.163 -163L498.001 181.838V183.013L151.988 -163H153.163Z"/>
                <path d="M176.972 -163L498.001 158.029V159.204L175.797 -163H176.972Z"/>
            </svg>
        </div>
    <?php endif; ?>
</div>