<?php
$templates_df = ['0' => esc_html__('None', 'mrittik')];
$templates = $templates_df + mrittik_get_templates_option('hidden-panel') ;
pxl_add_custom_widget(
    array(
        'name'       => 'pxl_anchor',
        'title'      => esc_html__( 'BR Anchor', 'mrittik' ),
        'icon'       => 'eicon-anchor',
        'categories' => array('pxltheme-core'),
        'scripts'    => array(),
        'params' => array(
            'sections' => array(
                array(
                    'name'     => 'icon_section',
                    'label'    => esc_html__( 'Settings', 'mrittik' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'template',
                            'label' => esc_html__('Select Templates', 'mrittik'),
                            'type' => 'select',
                            'options' => $templates,
                            'default' => 'df'
                        ),
                        array(
                            'name' => 'link',
                            'label' => esc_html__('Link', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::URL,
                            'placeholder' => esc_html__('https://your-link.com', 'mrittik' ),
                            'default' => [
                                'url' => '#',
                            ],
                            'condition' => ['template' => '0']
                        ),
                        array(
                            'name' => 'icon_type',
                            'label' => esc_html__('Select Icon Type', 'mrittik'),
                            'type' => 'select',
                            'options' => [
                                'none' => esc_html__('None', 'mrittik'),
                                'lib' => esc_html__('Library', 'mrittik'),
                                'custom' => esc_html__('Custom', 'mrittik'),
                            ],
                            'default' => 'custom'
                        ),
                        array(
                            'name' => 'selected_icon',
                            'label' => esc_html__( 'Icon', 'mrittik' ),
                            'type' => 'icons',
                            'default' => [
                                'library' => 'pxli',
                                'value'   => 'pxli-menu'
                            ],
                            'condition' => ['icon_type' => 'lib']
                        ),
                        array(
                            'name'        => 'custom_class',
                            'label'       => esc_html__( 'Custom Class', 'mrittik' ),
                            'type'        => 'text',
                        ),
                    ),
                ),
                array(
                    'name'     => 'style_icon_section',
                    'label'    => esc_html__( 'Icon', 'mrittik' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'icon_type!' => 'none',
                    ],
                    'controls' => array(
                        array(
                            'name'  => 'icon_size',
                            'label' => esc_html__( 'Icon Size', 'mrittik' ),
                            'type'  => 'slider',
                            'size_units' => [ 'px', '%', 'vw', 'vh' ],
                            'range' => [
                                '%' => [
                                    'min' => 0,
                                    'max' => 100,
                                ],
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                                'vw' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                                'vh' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'control_type' => 'responsive',
                            'condition' => ['icon_type' => 'lib'],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-anchor-icon' => 'font-size: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'icon_color',
                            'label' => esc_html__('Icon Color', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-anchor-icon' => 'color: {{VALUE}};',
                            ],
                            'condition' => ['icon_type' => 'lib'],
                        ),
                        array(
                            'name' => 'darkmode_icon_color',
                            'label' => esc_html__('Icon Color (Dark Mode)', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-anchor-icon' => 'color: {{VALUE}};',
                            ],
                            'condition' => ['icon_type' => 'lib'],
                        ),
                        array(
                            'name'  => 'icon_width',
                            'label' => esc_html__( 'Icon Width', 'mrittik' ),
                            'type'  => 'slider',
                            'size_units' => [ 'px', '%', 'vw', 'vh' ],
                            'range' => [
                                '%' => [
                                    'min' => 0,
                                    'max' => 100,
                                ],
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                                'vw' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                                'vh' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'control_type' => 'responsive',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-anchor-wrap .pxl-anchor-icon.custom' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => ['icon_type' => 'custom'],
                        ),
                        array(
                            'name'  => 'icon_height',
                            'label' => esc_html__( 'Icon Height', 'mrittik' ),
                            'type'  => 'slider',
                            'size_units' => [ 'px', '%', 'vw', 'vh' ],
                            'range' => [
                                '%' => [
                                    'min' => 0,
                                    'max' => 100,
                                ],
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                                'vw' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                                'vh' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'control_type' => 'responsive',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-anchor-wrap .pxl-anchor-icon.custom' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => ['icon_type' => 'custom'],
                        ),
                        array(
                            'name'  => 'line_width_1',
                            'label' => esc_html__( 'Line One Width', 'mrittik' ),
                            'type'  => 'slider',
                            'size_units' => [ 'px', '%', 'vw', 'vh' ],
                            'range' => [
                                '%' => [
                                    'min' => 0,
                                    'max' => 100,
                                ],
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                                'vw' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                                'vh' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'control_type' => 'responsive',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-anchor-wrap .pxl-anchor-icon.custom span' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => ['icon_type' => 'custom'],
                        ),
                        array(
                            'name'  => 'line_width_2',
                            'label' => esc_html__( 'Line Two Width', 'mrittik' ),
                            'type'  => 'slider',
                            'size_units' => [ 'px', '%', 'vw', 'vh' ],
                            'range' => [
                                '%' => [
                                    'min' => 0,
                                    'max' => 100,
                                ],
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                                'vw' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                                'vh' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'control_type' => 'responsive',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-anchor-wrap .pxl-anchor-icon.custom span:nth-child(2)' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => ['icon_type' => 'custom'],
                        ),
                        array(
                            'name'  => 'line_width_3',
                            'label' => esc_html__( 'Line Three Width', 'mrittik' ),
                            'type'  => 'slider',
                            'size_units' => [ 'px', '%', 'vw', 'vh' ],
                            'range' => [
                                '%' => [
                                    'min' => 0,
                                    'max' => 100,
                                ],
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                                'vw' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                                'vh' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'control_type' => 'responsive',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-anchor-wrap .pxl-anchor-icon.custom span:nth-child(3)' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => ['icon_type' => 'custom'],
                        ),
                        array(
                            'name'  => 'line_height',
                            'label' => esc_html__( 'Line Height', 'mrittik' ),
                            'type'  => 'slider',
                            'size_units' => [ 'px', '%', 'vw', 'vh' ],
                            'range' => [
                                '%' => [
                                    'min' => 0,
                                    'max' => 100,
                                ],
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                                'vw' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                                'vh' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'control_type' => 'responsive',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-anchor-wrap .pxl-anchor-icon.custom span' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => ['icon_type' => 'custom'],
                        ),
                        array(
                            'name'  => 'line_spacer',
                            'label' => esc_html__( 'Line Spacer', 'mrittik' ),
                            'type'  => 'slider',
                            'size_units' => [ 'px', '%', 'vw', 'vh' ],
                            'range' => [
                                '%' => [
                                    'min' => 0,
                                    'max' => 100,
                                ],
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                                'vw' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                                'vh' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'control_type' => 'responsive',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-anchor-wrap .pxl-anchor-icon.custom span:not(:last-child)' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => ['icon_type' => 'custom'],
                        ),
                        array(
                            'name' => 'icon_color2',
                            'label' => esc_html__('Icon Color', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-anchor-wrap .pxl-anchor-icon.custom span' => 'background-color: {{VALUE}};',
                            ],
                            'condition' => ['icon_type' => 'custom'],
                            'separator' => 'before',
                        ),
                        array(
                            'name' => 'darkmode_icon_color2',
                            'label' => esc_html__('Icon Color (Dark Mode)', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-anchor-wrap .pxl-anchor-icon.custom span' => 'background-color: {{VALUE}};',
                            ],
                            'condition' => ['icon_type' => 'custom'],
                        ),
                        array(
                            'name' => 'icon_horizontal_orientation',
                            'label' => esc_html__('Horizontal Orientation', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::CHOOSE,
                            'control_type' => 'responsive',
                            'options' => [
                                'start' => [
                                    'title' => esc_html__( 'Left', 'mrittik' ),
                                    'icon' => 'eicon-h-align-left',
                                ],
                                'end' => [
                                    'title' => esc_html__( 'Right', 'mrittik' ),
                                    'icon' => 'eicon-h-align-right',
                                ],
                            ],
                            'toggle' => false,
                            'default' => 'start',
                            'render_type' => 'ui',
                            'separator' => 'before',
                        ),
                        array(
                            'name' => 'icon_offset_x',
                            'label' => esc_html__('Offset X', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'range' => [
                                'px' => [
                                    'min' => -1000,
                                    'max' => 1000,
                                ],
                                '%' => [
                                    'min' => -200,
                                    'max' => 200,
                                ],
                                'vw' => [
                                    'min' => -200,
                                    'max' => 200,
                                ],
                                'vh' => [
                                    'min' => -200,
                                    'max' => 200,
                                ],
                            ],
                            'default' => [
                                'unit' => '%',
                                'size' => '50',
                            ],
                            'size_units' => [ 'px', '%', 'vw', 'vh' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-anchor-icon' => 'left: {{SIZE}}{{UNIT}}',
                            ],
                            'condition' => [
                                'icon_horizontal_orientation' => 'start',
                            ],
                        ),
                        array(
                            'name' => 'icon_offset_x_end',
                            'label' => esc_html__('Offset X', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'range' => [
                                'px' => [
                                    'min' => -1000,
                                    'max' => 1000,
                                    'step' => 1,
                                ],
                                '%' => [
                                    'min' => -200,
                                    'max' => 200,
                                ],
                                'vw' => [
                                    'min' => -200,
                                    'max' => 200,
                                ],
                                'vh' => [
                                    'min' => -200,
                                    'max' => 200,
                                ],
                            ],
                            'default' => [
                                'unit' => '%',
                                'size' => '50',
                            ],
                            'size_units' => [ 'px', '%', 'vw', 'vh' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-anchor-icon' => 'right: {{SIZE}}{{UNIT}}',
                            ],
                            'condition' => [
                                'icon_horizontal_orientation' => 'end',
                            ],
                        ),
                        array(
                            'name' => 'icon_vertical_orientation',
                            'label' => esc_html__('Vertical Orientation', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::CHOOSE,
                            'control_type' => 'responsive',
                            'options' => [
                                'start' => [
                                    'title' => esc_html__( 'Top', 'mrittik' ),
                                    'icon' => 'eicon-v-align-top',
                                ],
                                'end' => [
                                    'title' => esc_html__( 'Bottom', 'mrittik' ),
                                    'icon' => 'eicon-v-align-bottom',
                                ],
                            ],
                            'toggle' => false,
                            'default' => 'start',
                            'render_type' => 'ui',
                        ),
                        array(
                            'name' => 'icon_offset_y',
                            'label' => esc_html__('Offset Y', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'range' => [
                                'px' => [
                                    'min' => -1000,
                                    'max' => 1000,
                                    'step' => 1,
                                ],
                                '%' => [
                                    'min' => -200,
                                    'max' => 200,
                                ],
                                'vw' => [
                                    'min' => -200,
                                    'max' => 200,
                                ],
                                'vh' => [
                                    'min' => -200,
                                    'max' => 200,
                                ],
                            ],
                            'default' => [
                                'unit' => '%',
                                'size' => '50',
                            ],
                            'size_units' => [ 'px', '%', 'vw', 'vh' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-anchor-icon' => 'top: {{SIZE}}{{UNIT}}',
                            ],
                            'condition' => [
                                'icon_vertical_orientation' => 'start',
                            ],
                        ),
                        array(
                            'name' => 'icon_offset_y_end',
                            'label' => esc_html__('Offset Y', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'range' => [
                                'px' => [
                                    'min' => -1000,
                                    'max' => 1000,
                                    'step' => 1,
                                ],
                                '%' => [
                                    'min' => -200,
                                    'max' => 200,
                                ],
                                'vw' => [
                                    'min' => -200,
                                    'max' => 200,
                                ],
                                'vh' => [
                                    'min' => -200,
                                    'max' => 200,
                                ],
                            ],
                            'default' => [
                                'unit' => '%',
                                'size' => '50',
                            ],
                            'size_units' => [ 'px', '%', 'vw', 'vh' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-anchor-icon' => 'bottom: {{SIZE}}{{UNIT}}',
                            ],
                            'condition' => [
                                'icon_vertical_orientation' => 'end',
                            ],
                        ),
                    ),
                ),
                array(
                    'name'     => 'style_box_section',
                    'label'    => esc_html__( 'Box', 'mrittik' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name'  => 'box_width',
                            'label' => esc_html__( 'Box Width', 'mrittik' ),
                            'type'  => 'slider',
                            'size_units' => [ 'px', '%', 'vw', 'vh' ],
                            'range' => [
                                '%' => [
                                    'min' => 0,
                                    'max' => 100,
                                ],
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                                'vw' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                                'vh' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'control_type' => 'responsive',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-anchor-wrap' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name'  => 'box_height',
                            'label' => esc_html__( 'Box Height', 'mrittik' ),
                            'type'  => 'slider',
                            'size_units' => [ 'px', '%', 'vw', 'vh' ],
                            'range' => [
                                '%' => [
                                    'min' => 0,
                                    'max' => 100,
                                ],
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                                'vw' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                                'vh' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'control_type' => 'responsive',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-anchor-wrap' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'bg_color',
                            'label' => esc_html__('Background Color', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-circle' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'darkmode_bg_color',
                            'label' => esc_html__( 'Background Color (Dark Mode)', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-circle' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'border_radius',
                            'label' => esc_html__('Border Radius', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px', '%' ],
                            'default' => [
                                'unit' => '%',
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-circle' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name'  => 'box_rotate',
                            'label' => esc_html__( 'Rotate', 'mrittik' ),
                            'type'  => 'slider',
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => -360,
                                    'max' => 360,
                                ],
                            ],
                            'control_type' => 'responsive',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-circle' => '-webkit-transform: rotate({{SIZE}}deg); -ms-transform: rotate({{SIZE}}deg); transform: rotate({{SIZE}}deg);',
                            ],
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'box_horizontal_orientation',
                            'label' => esc_html__('Horizontal Orientation', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::CHOOSE,
                            'control_type' => 'responsive',
                            'options' => [
                                'start' => [
                                    'title' => esc_html__( 'Left', 'mrittik' ),
                                    'icon' => 'eicon-h-align-left',
                                ],
                                'end' => [
                                    'title' => esc_html__( 'Right', 'mrittik' ),
                                    'icon' => 'eicon-h-align-right',
                                ],
                            ],
                            'toggle' => false,
                            'default' => 'start',
                            'render_type' => 'ui',
                        ),
                        array(
                            'name' => 'box_offset_x',
                            'label' => esc_html__('Offset X', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'range' => [
                                'px' => [
                                    'min' => -1000,
                                    'max' => 1000,
                                ],
                                '%' => [
                                    'min' => -200,
                                    'max' => 200,
                                ],
                                'vw' => [
                                    'min' => -200,
                                    'max' => 200,
                                ],
                                'vh' => [
                                    'min' => -200,
                                    'max' => 200,
                                ],
                            ],
                            'default' => [
                                'unit' => '%',
                                'size' => '0',
                            ],
                            'size_units' => [ 'px', '%', 'vw', 'vh' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-circle' => 'left: {{SIZE}}{{UNIT}}',
                            ],
                            'condition' => [
                                'box_horizontal_orientation' => 'start',
                            ],
                        ),
                        array(
                            'name' => 'box_offset_x_end',
                            'label' => esc_html__('Offset X', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'range' => [
                                'px' => [
                                    'min' => -1000,
                                    'max' => 1000,
                                    'step' => 1,
                                ],
                                '%' => [
                                    'min' => -200,
                                    'max' => 200,
                                ],
                                'vw' => [
                                    'min' => -200,
                                    'max' => 200,
                                ],
                                'vh' => [
                                    'min' => -200,
                                    'max' => 200,
                                ],
                            ],
                            'default' => [
                                'unit' => '%',
                                'size' => '0',
                            ],
                            'size_units' => [ 'px', '%', 'vw', 'vh' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-circle' => 'right: {{SIZE}}{{UNIT}}',
                            ],
                            'condition' => [
                                'box_horizontal_orientation' => 'end',
                            ],
                        ),
                        array(
                            'name' => 'box_vertical_orientation',
                            'label' => esc_html__('Vertical Orientation', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::CHOOSE,
                            'control_type' => 'responsive',
                            'options' => [
                                'start' => [
                                    'title' => esc_html__( 'Top', 'mrittik' ),
                                    'icon' => 'eicon-v-align-top',
                                ],
                                'end' => [
                                    'title' => esc_html__( 'Bottom', 'mrittik' ),
                                    'icon' => 'eicon-v-align-bottom',
                                ],
                            ],
                            'toggle' => false,
                            'default' => 'start',
                            'render_type' => 'ui',
                        ),
                        array(
                            'name' => 'box_offset_y',
                            'label' => esc_html__('Offset Y', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'range' => [
                                'px' => [
                                    'min' => -1000,
                                    'max' => 1000,
                                    'step' => 1,
                                ],
                                '%' => [
                                    'min' => -200,
                                    'max' => 200,
                                ],
                                'vw' => [
                                    'min' => -200,
                                    'max' => 200,
                                ],
                                'vh' => [
                                    'min' => -200,
                                    'max' => 200,
                                ],
                            ],
                            'default' => [
                                'unit' => '%',
                                'size' => '0',
                            ],
                            'size_units' => [ 'px', '%', 'vw', 'vh' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-circle' => 'top: {{SIZE}}{{UNIT}}',
                            ],
                            'condition' => [
                                'box_vertical_orientation' => 'start',
                            ],
                        ),
                        array(
                            'name' => 'box_offset_y_end',
                            'label' => esc_html__('Offset Y', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'range' => [
                                'px' => [
                                    'min' => -1000,
                                    'max' => 1000,
                                    'step' => 1,
                                ],
                                '%' => [
                                    'min' => -200,
                                    'max' => 200,
                                ],
                                'vw' => [
                                    'min' => -200,
                                    'max' => 200,
                                ],
                                'vh' => [
                                    'min' => -200,
                                    'max' => 200,
                                ],
                            ],
                            'default' => [
                                'unit' => '%',
                                'size' => '0',
                            ],
                            'size_units' => [ 'px', '%', 'vw', 'vh' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-circle' => 'bottom: {{SIZE}}{{UNIT}}',
                            ],
                            'condition' => [
                                'box_vertical_orientation' => 'end',
                            ],
                        ),
                    ),
                ),
            )
        )
    ),
    mrittik_get_class_widget_path()
);