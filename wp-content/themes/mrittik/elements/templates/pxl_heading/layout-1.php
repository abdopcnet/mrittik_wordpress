<?php
$editor_title = $widget->get_settings_for_display( 'title' );
$editor_title = $widget->parse_text_editor( $editor_title );
?>
<div class="pxl-heading <?php if(($settings['scroll_horizontal'] == 'true')) { echo pxl_print_html('pxl-section-scroll', 'mrittik'); } ?> <?php if(($settings['scroll_revesal'] == 'true')) { echo pxl_print_html('revesal', 'mrittik'); } ?>">
	<div class="pxl-heading--inner <?php if(($settings['scroll_horizontal'] == 'true')) { echo pxl_print_html('element-scroll', 'mrittik'); } ?>">
		<?php if(!empty($settings['sub_title'])) : ?>
			<div class="pxl-item--subtitle <?php echo esc_attr($settings['pxl_animate_sub']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay_sub']); ?>ms" data-wow-duration="<?php echo esc_attr($settings['pxl_animate_duration_sub']); ?>s"><span><?php echo esc_attr($settings['sub_title']); ?></span></div>
		<?php endif; ?>
		<<?php echo esc_attr($settings['title_tag']); ?> class="pxl-item--title <?php echo esc_attr($settings['style']); ?> <?php echo esc_attr($settings['divider']) ;?> <?php if(!empty($settings['title_split_text_anm'])) { echo esc_attr('pxl-split-text '.$settings['title_split_text_anm']); } ?> <?php if($settings['pxl_animate'] !== 'wow letter') { echo esc_attr($settings['pxl_animate']); } ?> <?php echo esc_attr($settings['title_custom_font_family']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms" data-wow-duration="<?php echo esc_attr($settings['pxl_animate_duration']); ?>s">
			<?php if($settings['source_type'] == 'text' && !empty($editor_title)) {
				if($settings['pxl_animate'] == 'wow letter') {
					$arr_str = explode(' ', $editor_title); ?>
					<span class="pxl-item--text">
			            <?php foreach ($arr_str as $index => $value) {
			                $arr_str[$index] = '<span class="pxl-text--slide"><span class="'.$settings['pxl_animate'].'">' . $value . '</span></span>';
			            }
			            $str = implode(' ', $arr_str);
			            echo wp_kses_post($str); ?>
			        </span>
				<?php } else {
					echo wp_kses_post($editor_title);
				}
			} elseif($settings['source_type'] == 'title') {
				$titles = mrittik()->page->get_title();
				pxl_print_html($titles['title']);
			}?>
			<?php if(($settings['title_line'] == 'true')) : ?>
				<span class="title-line"></span>
			<?php endif; ?>
		</<?php echo esc_attr($settings['title_tag']); ?>>
	</div>
</div>
