<?php
$template = (int)$widget->get_setting('content_template','0');
$target = '.pxl-hidden-template-'.$template;
if($template > 0 ){
	if ( !has_action( 'pxl_anchor_target_hidden_panel_'.$template) ){
		add_action( 'pxl_anchor_target_hidden_panel_'.$template, 'mrittik_hook_anchor_hidden_panel' );
	}
}
?>
<div class="pxl-hidden-panel-button pxl-anchor side-panel pxl-cursor--cta" data-target="<?php echo esc_attr($target)?>">
	<span class="line"></span>
	<span class="line"></span>
	<span class="line"></span>
</div>