<?php
$template = (int)$widget->get_setting('template','0');

$widget->add_render_attribute('anchor', 'class', 'pxl-anchor side-panel align-items-center');


$target = '.pxl-hidden-template-'.$template;
if($template > 0 ){

	if ( !has_action( 'pxl_anchor_target_hidden_panel_'.$template) ){
		add_action( 'pxl_anchor_target_hidden_panel_'.$template, 'mrittik_hook_anchor_hidden_panel' );
	}

}else if( $template == 0 && !empty($settings['link']['url'])){
	$widget->add_render_attribute( 'custom_link', 'class', 'custom-link pxl-anchor' );
	if( strpos($settings['link']['url'], '#') !== false){
		$widget->add_render_attribute( 'custom_link', 'class', 'anchor' );
		$widget->add_render_attribute( 'custom_link', 'href', 'javascript:void(0);' );
		$widget->add_render_attribute( 'custom_link', 'data-target', $settings['link']['url'] );
	}else{
		$widget->add_render_attribute( 'custom_link', 'href', $settings['link']['url'] );
	    if ( $settings['link']['is_external'] ) {
	        $widget->add_render_attribute( 'custom_link', 'target', '_blank' );
	    }
	    if ( $settings['link']['nofollow'] ) {
	        $widget->add_render_attribute( 'custom_link', 'rel', 'nofollow' );
	    }
	}
}

$custom_cls = $widget->get_setting('custom_class','');

?>
<div class="pxl-anchor-wrap <?php echo esc_attr($custom_cls); ?>">
	<?php if ($template == 0 && !empty($settings['link']['url'])): ?>
		<a <?php pxl_print_html($widget->get_render_attribute_string('custom_link')); ?>>
	<?php else: ?>
		<div <?php pxl_print_html($widget->get_render_attribute_string('anchor')); ?> data-target="<?php echo esc_attr($target)?>">
	<?php endif; ?>

	<?php
		$icon_type = $widget->get_setting('icon_type', 'none');

		if ($icon_type == 'lib') {
			echo '<div class="pxl-anchor-icon">';
			\Elementor\Icons_Manager::render_icon($settings['selected_icon'], ['aria-hidden' => 'true', 'class' => ''], 'span');
			echo '</div>';
		} elseif ($icon_type == 'custom') {
			echo '<div class="pxl-icon pxl-anchor-icon custom pxl-transtion"><span></span><span></span><span></span></div>';
		}
	?>
	<div class="pxl-circle"></div>

	<?php if ($template == 0 && !empty($settings['link']['url'])): ?>
		</a>
	<?php else: ?>
		</div>
	<?php endif; ?>
</div>
