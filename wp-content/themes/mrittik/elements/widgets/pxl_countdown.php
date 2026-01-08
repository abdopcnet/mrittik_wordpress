<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_countdown',
        'title' => esc_html__('BR Countdown', 'mrittik' ),
        'icon' => 'eicon-countdown',
        'categories' => array('pxltheme-core'),
        'scripts' => array(
            'mrittik-countdown',
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_layout',
                    'label' => esc_html__('Layout', 'mrittik' ),
                    'tab' => \Elementor\Controls_Manager::TAB_LAYOUT,
                    'controls' => array(
                        array(
                            'name' => 'layout',
                            'label' => esc_html__('Templates', 'mrittik' ),
                            'type' => 'layoutcontrol',
                            'default' => '1',
                            'options' => [
                                '1' => [
                                    'label' => esc_html__('Layout 1', 'mrittik' ),
                                    'image' => get_template_directory_uri() . '/elements/templates/pxl_countdown/img-layout/layout1.jpg'
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'countdown_section',
                    'label' => esc_html__('Content', 'mrittik' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'title',
                            'label' => esc_html__('Title', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::TEXTAREA,
                            'placeholder' => esc_html__('Enter your title', 'mrittik' ),
                            'description' => 'Create highlight text width shortcode: [highlight text="Text Demo"]',
                            'label_block' => true,
                            'condition' => [
                                'layout' => ['2'],
                            ],
                        ),
                        array(
                            'name' => 'date',
                            'label' => esc_html__('Date', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => esc_html__('2040/10/10', 'mrittik'),
                            'placeholder' => esc_html__( 'yy/mm/dd', 'mrittik' ),
                            'label_block' => true,
                            'description' => esc_html__('Set date count down (Date format: yy/mm/dd)', 'mrittik'),
                        ),
                        array(
                            'name' => 'day',
                            'label' => esc_html__('Days Text', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'placeholder' => esc_html__( 'Days', 'mrittik' ),
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'hour',
                            'label' => esc_html__('Hours Text', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'placeholder' => esc_html__( 'Hours', 'mrittik' ),
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'minute',
                            'label' => esc_html__('Minutes Text', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'placeholder' => esc_html__( 'Minutes', 'mrittik' ),
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'second',
                            'label' => esc_html__('Seconds Text', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'placeholder' => esc_html__( 'Seconds', 'mrittik' ),
                            'label_block' => true,
                        ),
                        array(
                            'name'         => 'align',
                            'label'        => esc_html__( 'Alignment', 'mrittik' ),
                            'type'         => 'choose',
                            'control_type' => 'responsive',
                            'options' => [
                                'start' => [
                                    'title' => esc_html__( 'Start', 'mrittik' ),
                                    'icon' => 'eicon-text-align-left',
                                ],
                                'center' => [
                                    'title' => esc_html__( 'Center', 'mrittik' ),
                                    'icon' => 'eicon-text-align-center',
                                ],
                                'end' => [
                                    'title' => esc_html__( 'End', 'mrittik' ),
                                    'icon' => 'eicon-text-align-right',
                                ]
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-countdown' => 'justify-content: {{VALUE}};',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_countdown',
                    'label' => esc_html__('Countdown', 'mrittik'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'show_svg',
                            'label' => esc_html__('Pipe', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'svg-on' => esc_html__('Show', 'mrittik' ),
                                'svg-off'  => esc_html__('Hidden', 'mrittik' ),
                            ],
                            'default' => 'svg-off',
                            'condition' => [
                                'layout' => ['1'],
                            ],
                        ),
                        array(
                            'name' => 'countdown_color',
                            'label' => esc_html__('Number Color', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .countdown-item .countdown-amount' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'darkmode_countdown_color',
                            'label' => esc_html__('Number Color (Dark Mode)', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .countdown-item .countdown-amount' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'number_typography',
                            'label' => esc_html__('Number Typography', 'mrittik' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .countdown-item .countdown-amount',
                        ),
                        array(
                            'name' => 'number_margin',
                            'label' => esc_html__('Number Margin', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px', '%', 'vw', 'vh' ],
                            'selectors' => [
                                '{{WRAPPER}} .countdown-item .countdown-amount' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'period_color',
                            'label' => esc_html__('Period Color', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .countdown-item .countdown-period' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'darkmode_period_color',
                            'label' => esc_html__('Period Color (Dark Mode)', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .countdown-item .countdown-period' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'period_typography',
                            'label' => esc_html__('Period Typography', 'mrittik' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .countdown-item .countdown-period',
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'dot_color',
                            'label' => esc_html__('Dot Color', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .countdown-item:after' => 'color: {{VALUE}};',
                            ],
                            'condition' => ['show_svg' => 'svg-off'],
                        ),
                        array(
                            'name' => 'darkmode_dot_color',
                            'label' => esc_html__('Dot Color (Dark Mode)', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .countdown-item:after' => 'color: {{VALUE}};',
                            ],
                            'condition' => ['show_svg' => 'svg-off'],
                        ),
                        array(
                            'name'  => 'dot_size',
                            'label' => esc_html__( 'Dot Size (px)', 'mrittik' ),
                            'type'  => 'slider',
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],
                            'condition' => ['show_svg' => 'svg-off'],
                            'selectors' => [
                                '{{WRAPPER}} .countdown-item:after' => 'font-size: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'dot_margin',
                            'label' => esc_html__('Dot Margin', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px', '%', 'vw', 'vh' ],
                            'selectors' => [
                                '{{WRAPPER}} .countdown-item:after' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'condition' => ['show_svg' => 'svg-off'],
                        ),
                        array(
                            'name' => 'svg_color',
                            'label' => esc_html__('SVG Color', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .countdown-item-inner svg' => 'fill: {{VALUE}};',
                            ],
                            'condition' => ['show_svg' => 'svg-on'],
                        ),
                        array(
                            'name' => 'darkmode_svg_color',
                            'label' => esc_html__('SVG Color (Dark Mode)', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .countdown-item-inner svg' => 'fill: {{VALUE}};',
                            ],
                            'condition' => ['show_svg' => 'svg-on'],
                        ),
                        array(
                            'name' => 'svg_size',
                            'label' => esc_html__( 'SVG Size', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px', '%', 'vw', 'vh' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .countdown-item-inner' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}}; min-width: {{SIZE}}{{UNIT}}; border-radius: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => ['show_svg' => 'svg-on'],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_box',
                    'label' => esc_html__('Box', 'mrittik'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'countdown_bg_color',
                            'label' => esc_html__( 'Countdown Background Color', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-countdown' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'darkmode_countdown_bg_color',
                            'label' => esc_html__('Countdown Background Color (Dark Mode)', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-countdown' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'countdown_padding',
                            'label' => esc_html__('Countdown Padding', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px', '%', 'vw', 'vh' ],
                            'default' => [
                                'unit' => 'px',
                            ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                                '%' => [
                                    'min' => 0,
                                    'max' => 100,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-countdown' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'c_width',
                            'label' => esc_html__( 'Max Width', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px', '%', 'vw', 'vh' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-countdown-wrap .pxl-countdown' => 'max-width: {{SIZE}}{{UNIT}};',
                            ],
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'border_type',
                            'label' => esc_html__( 'Border Type', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                '' => esc_html__( 'None', 'mrittik' ),
                                'solid' => esc_html__( 'Solid', 'mrittik' ),
                                'double' => esc_html__( 'Double', 'mrittik' ),
                                'dotted' => esc_html__( 'Dotted', 'mrittik' ),
                                'dashed' => esc_html__( 'Dashed', 'mrittik' ),
                                'groove' => esc_html__( 'Groove', 'mrittik' ),
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-countdown-wrap' => 'border-style: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'border_width',
                            'label' => esc_html__( 'Border Width', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-countdown-wrap' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'condition' => [
                                'border_type!' => '',
                            ],
                            'responsive' => true,
                        ),
                        array(
                            'name' => 'border_color',
                            'label' => esc_html__('Border Color', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-countdown-wrap' => 'border-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'border_type!' => '',
                            ],
                        ),
                        array(
                            'name' => 'darkmode_border_color',
                            'label' => esc_html__('Border Color (Dark Mode)', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-countdown-wrap' => 'border-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'border_type!' => '',
                            ],
                        ),
                        array(
                            'name' => 'box_padding',
                            'label' => esc_html__('Box Padding', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px', '%', 'vw', 'vh' ],
                            'default' => [
                                'unit' => 'px',
                            ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                                '%' => [
                                    'min' => 0,
                                    'max' => 100,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-countdown-wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                    ),
                ),
                mrittik_widget_animation_settings()
            ),
        ),
    ),
    mrittik_get_class_widget_path()
);