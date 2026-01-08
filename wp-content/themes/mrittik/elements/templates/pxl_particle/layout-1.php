<?php $html_id = pxl_get_element_id($settings); ?>
<?php if(isset($settings['images']) && !empty($settings['images']) && count($settings['images'])): ?>
	<div class="pxl-particle pxl-particle1">
		<?php foreach ($settings['images'] as $key => $value): ?>
		    <div id="<?php echo esc_attr($html_id.$key); ?>" class="pxl-item--particle elementor-repeater-item-<?php echo esc_attr($value['_id']); ?> <?php echo esc_attr($value['type_position'].' '.$value['particle_effect'].' '.$value['transform_hover']); ?>" <?php if($value['particle_effect'] == 'move-parallax') { ?>data-move="<?php echo esc_attr($value['parallax_move']); ?>"<?php } ?>>
		    	<?php if($value['particle_effect'] != 'slide-draw-svg'):
		    		if ( !empty($value['particle']['id']) ) {
		    			$particle  = pxl_get_image_by_size( array(
		    				'attach_id'  => $value['particle']['id'],
		    				'thumb_size' => 'full',
		    				'class'      => $value['pxl_animate']
		    			) );
		    			$particle_thumbnail = $particle['thumbnail'];
		    			echo wp_kses_post($particle_thumbnail);
		    		}
		    	endif; ?>
		    	<?php if($value['particle_effect'] == 'slide-draw-svg'):
		    		$is_new = \Elementor\Icons_Manager::is_migration_allowed();
		    		if ( $is_new ) { ?>
		    			<div class="light pxl-visibility-vi-hi"><?php \Elementor\Icons_Manager::render_icon( $value['pxl_icon_light'], [ 'aria-hidden' => 'true' ] ); ?></div>
		    			<div class="dark pxl-visibility-hi-vi"><?php \Elementor\Icons_Manager::render_icon( $value['pxl_icon_dark'], [ 'aria-hidden' => 'true' ] ); ?></div>
		    		<?php }
		    	endif; ?>
		    </div>
		<?php endforeach; ?>
	</div>
<?php endif; ?>
