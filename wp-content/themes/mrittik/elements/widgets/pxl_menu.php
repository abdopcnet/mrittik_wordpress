<?php
$menus = get_terms( 'nav_menu', array( 'hide_empty' => false ) );
$pxl_menus = array(
    '' => esc_html__('Default', 'mrittik')
);
if ( is_array( $menus ) && ! empty( $menus ) ) {
    foreach ( $menus as $value ) {
        if ( is_object( $value ) && isset( $value->name, $value->slug ) ) {
            $pxl_menus[ $value->slug ] = $value->name;
        }
    }
} else {
    $pxl_menus = '';
}
pxl_add_custom_widget(
    array(
        'name' => 'pxl_menu',
        'title' => esc_html__('BR Nav Menu', 'mrittik'),
        'icon' => 'eicon-nav-menu',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'mrittik'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'menu',
                            'label' => esc_html__('Select Menu', 'mrittik'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => $pxl_menus,
                        ),
                        array(
                            'name' => 'menu_style',
                            'label' => esc_html__('Style', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'menu-default',
                            'options' => [
                                'menu-default' => esc_html__('Default', 'mrittik' ),
                                'pxl-rotate-text' => esc_html__('Rotate', 'mrittik' ),
                                'menu-style2' => esc_html__('Line', 'mrittik' ),
                                'menu-parallax' => esc_html__('Parallax', 'mrittik' ),
                                'menu-vertical' => esc_html__('Vertical', 'mrittik' ),
                            ],
                        ),
                        array(
                            'name' => 'image',
                            'label' => esc_html__( 'Background', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                            'condition' => [
                                'menu_style' => 'menu-parallax',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_first_level',
                    'label' => esc_html__('First Level', 'mrittik'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'color',
                            'label' => esc_html__('Color', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-nav-menu .pxl-menu-primary > li > a' => 'color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-nav-menu .pxl-menu-primary > li > a span' => 'color: {{VALUE}};',
                            ],
                            'separator' => 'before',
                        ),
                        array(
                            'name' => 'darkmode_color',
                            'label' => esc_html__('Color (Dark Mode)', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary > li > a' => 'color: {{VALUE}};',
                                '.dark-mode {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary > li > a span' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'color_hover',
                            'label' => esc_html__('Color Hover', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-nav-menu .pxl-menu-primary > li > a:hover' => 'color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-nav-menu .pxl-menu-primary > li > a:hover span' => 'color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-nav-menu .pxl-menu-primary > li.menu-item-has-children > a:hover .pxl-nav-icon' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'darkmode_color_hover',
                            'label' => esc_html__('Color Hover (Dark Mode)', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary > li > a:hover' => 'color: {{VALUE}};',
                                '.dark-mode {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary > li > a:hover span' => 'color: {{VALUE}};',
                                '.dark-mode {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary > li.menu-item-has-children > a:hover .pxl-nav-icon' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'color_active',
                            'label' => esc_html__('Color Active', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-nav-menu .pxl-menu-primary > li.current_page_item > a,
                                 {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary > li.current-menu-parent > a,
                                 {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary > li.current-menu-item > a,
                                 {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary > li.current_page_ancestor > a,
                                 {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary > li.current-menu-ancestor > a,
                                 {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary > li.current_page_item > a span,
                                 {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary > li.current-menu-parent > a span,
                                 {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary > li.current-menu-item > a span,
                                 {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary > li.current_page_ancestor > a span,
                                 {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary > li.current-menu-ancestor > a span,
                                 {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary > li.current_page_item.menu-item-has-children > a .pxl-nav-icon,
                                 {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary > li.current-menu-parent.menu-item-has-children > a .pxl-nav-icon,
                                 {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary > li.current-menu-item.menu-item-has-children > a .pxl-nav-icon,
                                 {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary > li.current_page_ancestor.menu-item-has-children > a .pxl-nav-icon,
                                 {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary > li.current-menu-ancestor.menu-item-has-children > a .pxl-nav-icon' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'darkmode_color_active',
                            'label' => esc_html__('Color Active (Dark Mode)', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary > li.current_page_item > a,
                                .dark-mode {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary > li.current-menu-parent > a,
                                .dark-mode {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary > li.current-menu-item > a,
                                .dark-mode {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary > li.current_page_ancestor > a,
                                .dark-mode {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary > li.current-menu-ancestor > a,
                                .dark-mode {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary > li.current_page_item > a span,
                                .dark-mode {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary > li.current-menu-parent > a span,
                                .dark-mode {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary > li.current-menu-item > a span,
                                .dark-mode {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary > li.current_page_ancestor > a span,
                                .dark-mode {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary > li.current-menu-ancestor > a span,
                                .dark-mode {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary > li.current_page_item.menu-item-has-children > a .pxl-nav-icon,
                                .dark-mode {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary > li.current-menu-parent.menu-item-has-children > a .pxl-nav-icon,
                                .dark-mode {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary > li.current-menu-item.menu-item-has-children > a .pxl-nav-icon,
                                .dark-mode {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary > li.current_page_ancestor.menu-item-has-children > a .pxl-nav-icon,
                                .dark-mode {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary > li.current-menu-ancestor.menu-item-has-children > a .pxl-nav-icon' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'icon_color',
                            'label' => esc_html__('Icon Color', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-nav-menu .pxl-menu-primary > li.menu-item-has-children > a .pxl-nav-icon' => 'color: {{VALUE}};',
                            ],
                            'separator' => 'before',
                        ),
                        array(
                            'name' => 'darkmode_icon_color',
                            'label' => esc_html__('Icon Color (Dark Mode)', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary > li.menu-item-has-children > a .pxl-nav-icon' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'icon_font_size',
                            'label' => esc_html__('Icon Font Size', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px', 'em', '%', 'rem' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-nav-menu .pxl-menu-primary > li.menu-item-has-children > a .pxl-nav-icon:before' => 'font-size: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'icon_space',
                            'label' => esc_html__('Icon Spacer', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', 'em', '%', 'rem' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-nav-menu .pxl-menu-primary > li.menu-item-has-children > a .pxl-nav-icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'separator' => 'before',
                        ),
                        array(
                            'name' => 'typography',
                            'label' => esc_html__('Typography', 'mrittik' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-nav-menu .pxl-menu-primary > li > a',
                        ),
                        array(
                            'name' => 'item_space',
                            'label' => esc_html__('Item Spacer', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', 'em', '%', 'rem' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-nav-menu .pxl-menu-primary > li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'vertical_border_color',
                            'label' => esc_html__('Border Color', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-nav-menu .menu-vertical li + li a' => 'border-top-color: {{VALUE}};',
                            ],
                            'separator' => 'before',
                            'condition' => [
                                'menu_style' => 'menu-vertical',
                            ],
                        ),
                        array(
                            'name' => 'darkmode_vertical_border_color',
                            'label' => esc_html__('Border Color (Dark Mode)', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-nav-menu .menu-vertical li + li a' => 'border-top-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'menu_style' => 'menu-vertical',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_sub_level',
                    'label' => esc_html__('Sub Level', 'mrittik'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'hover_effects',
                            'label' => esc_html__('Hover Effects', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'menu-fade',
                            'options' => [
                                'menu-fade' => esc_html__('Fade', 'mrittik' ),
                                'menu-scale' => esc_html__('Scale', 'mrittik' ),
                                'menu-translate-tb' => esc_html__('Top To Bottom', 'mrittik' ),
                                'menu-translate-rl' => esc_html__('Right To Left', 'mrittik' ),
                            ],
                            'prefix_class' => 'nav-menu-effect '
                        ),
                        array(
                            'name' => 'sub_color',
                            'label' => esc_html__('Color', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-nav-menu li.pxl-megamenu, {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary li .sub-menu li > a' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'sub_color_hover',
                            'label' => esc_html__('Color Hover/Actvie', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-nav-menu .pxl-menu-primary li .sub-menu li:hover > a, {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary li .sub-menu li.current_page_item > a, {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary li .sub-menu li.current-menu-item > a, {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary li .sub-menu li.current_page_ancestor > a, {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary li .sub-menu li.current-menu-ancestor > a' => 'color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-nav-menu .pxl-menu-primary .sub-menu li a:before' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'sub_bg_color',
                            'label' => esc_html__('Background Color', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-nav-menu .pxl-menu-primary .sub-menu:not(.pxl-mega-menu), {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary .children' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'sub_border_color',
                            'label' => esc_html__('Border Color', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-nav-menu .pxl-menu-primary .sub-menu, {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary .children' => 'border-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'sub_item_border_color',
                            'label' => esc_html__('Item Border Color', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-nav-menu .pxl-menu-primary .sub-menu li:not(:last-child), {{WRAPPER}} .pxl-nav-menu.pxl-menu-primary .children li:not(:last-child)' => 'border-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'darkmode_sub_color',
                            'label' => esc_html__('Color (Dark Mode)', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-nav-menu li.pxl-megamenu, .dark-mode {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary li .sub-menu li > a' => 'color: {{VALUE}};',
                            ],
                            'separator' => 'before',
                        ),
                        array(
                            'name' => 'darkmode_sub_color_hover',
                            'label' => esc_html__('Color Hover/Actvie (Dark Mode)', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary li .sub-menu li:hover > a, .dark-mode {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary li .sub-menu li.current_page_item > a, .dark-mode {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary li .sub-menu li.current-menu-item > a, .dark-mode {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary li .sub-menu li.current_page_ancestor > a, .dark-mode {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary li .sub-menu li.current-menu-ancestor > a' => 'color: {{VALUE}};',
                                '.dark-mode {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary .sub-menu li a:before' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'darkmode_sub_bg_color',
                            'label' => esc_html__('Background Color (Dark Mode)', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary .sub-menu:not(.pxl-mega-menu), .dark-mode {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary .children' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'darkmode_sub_border_color',
                            'label' => esc_html__('Border Color (Dark Mode)', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary .sub-menu, .dark-mode {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary .children' => 'border-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'darkmode_sub_item_border_color',
                            'label' => esc_html__('Item Border Color (Dark Mode)', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary .sub-menu li:not(:last-child), .dark-mode {{WRAPPER}} .pxl-nav-menu.pxl-menu-primary .children li:not(:last-child)' => 'border-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'sub_icon_color',
                            'label' => esc_html__('Icon Color', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-nav-menu .sub-menu li.menu-item-has-children > a:after' => 'color: {{VALUE}};',
                            ],
                            'separator' => 'before',
                        ),
                        array(
                            'name' => 'darkmode_sub_icon_color',
                            'label' => esc_html__('Icon Color (Dark Mode)', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-nav-menu .sub-menu li.menu-item-has-children > a:after' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'sub_icon_font_size',
                            'label' => esc_html__('Icon Font Size', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px', 'em', '%', 'rem' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-nav-menu .sub-menu li.menu-item-has-children > a:after' => 'font-size: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'sub_typography',
                            'label' => esc_html__('Typography', 'mrittik' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-nav-menu .pxl-menu-primary li .sub-menu a, {{WRAPPER}} .pxl-heading .pxl-item--title',
                        ),
                        array(
                            'name' => 'sub_item_space',
                            'label' => esc_html__('Item Spacer', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ 'px' ],
                            'default' => [
                                'size' => 0,
                            ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-menu-primary .sub-menu li + li' => 'margin-top: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                    ),
                ),
            ),
        ),
    ),
    mrittik_get_class_widget_path()
);