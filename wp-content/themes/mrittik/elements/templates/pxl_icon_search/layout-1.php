<div class="pxl-search-popup-button <?php if(($settings['show_divider'] == 'true')) { echo pxl_print_html('pxl-divider', 'mrittik'); } ?>">
    <a>
        <?php if(!empty($settings['pxl_icon']['value'])) {
            \Elementor\Icons_Manager::render_icon( $settings['pxl_icon'], [ 'aria-hidden' => 'true', 'class' => '' ], 'i' );
        } else { ?>
            <i class="bi bi-search"></i>
        <?php } ?>
    </a>
</div>
<?php  add_action( 'pxl_anchor_target', 'mrittik_hook_anchor_search'); ?>
