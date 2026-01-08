<?php
$p_menu = mrittik()->get_page_opt('p_menu');
if(!empty($p_menu) && $p_menu != '-1') {
    $menu = $p_menu;
} else {
    $menu = $settings['menu'];
}
if (!empty($menu) || has_nav_menu('primary')) {
    $menu_class = 'pxl-menu-primary clearfix ' . $settings['menu_style'];
    $walker = class_exists('PXL_Mega_Menu_Walker') ? new PXL_Mega_Menu_Walker : '';
    $link_before = '<span>';
    $link_after = '</span><i class="bi-chevron-down pxl-nav-icon pxl-hide"></i>';
    $show_parallax = $settings['menu_style'] == 'menu-parallax';

    ?>
    <div class="pxl-nav-menu pxl-nav-menu1 <?php if ($show_parallax) { echo esc_attr('pxl-menu-parallax'); } ?>">
        <?php
        if (!empty($menu)) {
            wp_nav_menu(array(
                'menu_class' => $menu_class,
                'walker' => $walker,
                'link_before' => $link_before,
                'link_after' => $link_after,
                'menu' => wp_get_nav_menu_object($menu)
            ));
        } elseif (has_nav_menu('primary')) {
            $attr_menu = array(
                'theme_location' => 'primary',
                'menu_class' => $menu_class,
                'link_before' => $link_before,
                'link_after' => $link_after,
                'walker' => $walker,
            );
            wp_nav_menu($attr_menu);
        }
        if ($show_parallax) { ?>
            <div class="menu-background-pattern"></div>
            <?php if (!empty($settings['image']['id'])) { ?>
                <div class="menu-background-image" style="background-image: url(<?php echo esc_url($settings['image']['url']); ?>);"></div>
            <?php } ?>
        <?php } ?>
    </div>
<?php } ?>
