<?php
/**
 * @package Bravisthemes
 */
$back_totop_on = mrittik()->get_theme_opt('back_totop_on', false);
$back_totop_text = mrittik()->get_theme_opt('back_totop_text', esc_html__('UP', 'mrittik'));
$button_light_dark_on = mrittik()->get_theme_opt('button_light_dark_on', false);
$mouse_move_animation = mrittik()->get_theme_opt('mouse_move_animation', false);
?>
		</div><!-- #main -->

		<?php if( class_exists( 'WooCommerce' ) ) :
			if( is_shop() ) { mrittik()->shop->getShop(); }
			if( is_product() ) { mrittik()->shop->getProduct(); }
		endif; ?>
		<?php mrittik()->footer->getFooter(); ?>
		<?php do_action( 'pxl_anchor_target') ?>

		<?php if ($back_totop_on) : ?>
			<div class="pxl-scroll-top">
				<a href="#"><?php echo pxl_print_html($back_totop_text); ?></a>
			</div>
		<?php endif; ?>

		<?php if ($mouse_move_animation) :
			wp_enqueue_script( 'pxl-cursor', get_template_directory_uri() . '/assets/js/libs/cursor.js', array( 'jquery' ), '1.0.0', true ); ?>
			<div class="pxl-cursor"></div>
			<div class="pxl-cursor-follower"></div>
			<div class="pxl-cursor-drag">
				<span class="pxl-overlay"></span>
				<span class="icon icon-left bi-chevron-left"></span>
				<span class="icon icon-right bi-chevron-right"></span>
			</div>
		<?php endif; ?>

		<?php if ($button_light_dark_on) : ?>
			<div class="pxl-switch-button">
				<span></span>
			</div>
		<?php endif; ?>

		</div><!-- #wapper -->
	<?php wp_footer(); ?>

	</body>
</html>