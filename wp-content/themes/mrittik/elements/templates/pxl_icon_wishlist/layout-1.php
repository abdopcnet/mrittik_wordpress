<?php if(class_exists('WPCleverWoosw')) :
    $woosw_id = get_option( 'woosw_page_id' );
    ?>
	<div class="pxl-wishlist-button">
		<a class="pxl-woosw-btn" href="<?php echo esc_url(get_permalink($woosw_id)); ?>"></a>
		<?php if(!empty($settings['pxl_icon']['value'])) {
			\Elementor\Icons_Manager::render_icon( $settings['pxl_icon'], [ 'aria-hidden' => 'true', 'class' => '' ], 'i' );
		} else { ?>
			<i class="caseicon-heart-alt"></i>
		<?php } ?>
		<span data-tip="<?php echo WPcleverWoosw::get_count(); ?>" class="wishlist-count">
			<?php echo WPcleverWoosw::get_count(); ?>
		</span>
	</div>
<?php endif; ?>