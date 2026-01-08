<?php
$editor_content = $widget->get_settings_for_display( 'text_ed' );
$editor_content = $widget->parse_text_editor( $editor_content );
?>
<div class="pxl-text-editor <?php echo esc_attr( $settings['pxl_animate'] ); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms" data-wow-duration="<?php echo esc_attr($settings['pxl_animate_duration']); ?>s">
	<div class="pxl-item--inner <?php if($settings['rotate_text'] == 'true') { echo 'pxl-rotate-text'; } ?> <?php if(($settings['show_divider'] == 'true')) { echo pxl_print_html('pxl-divider', 'mrittik'); } ?> <?php if(($settings['strong_effects'] == 'true')) { echo pxl_print_html('pxl-neon-glow', 'mrittik'); } ?> <?php echo esc_attr( $settings['text_custom_font_family'] ); ?>">
		<?php echo wp_kses_post($editor_content); ?>
	</div>
</div>
