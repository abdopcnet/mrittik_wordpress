<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_heading',
        'title' => esc_html__('BR Heading', 'mrittik' ),
        'icon' => 'eicon-heading',
        'categories' => array('pxltheme-core'),
        'scripts' => array(
            'mrittik-effects'
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__( 'Content', 'mrittik' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'source_type',
                            'label' => esc_html__( 'Source Type', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'text' => 'Text',
                                'title' => 'Page Title',
                            ],
                            'default' => 'text',
                        ),
                        array(
                            'name' => 'sub_title',
                            'label' => esc_html__( 'Sub Title', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::TEXTAREA,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'title',
                            'label' => esc_html__( 'Title', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::TEXTAREA,
                            'label_block' => true,
                            'description' => 'Create highlight text width shortcode: [highlight text="Text Demo"]',
                            'condition' => [
                                'source_type' => ['text'],
                            ],
                        ),
                        array(
                          'name' => 'align',
                            'label' => esc_html__( 'Alignment', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::CHOOSE,
                            'control_type' => 'responsive',
                            'options' => [
                                'left' => [
                                    'title' => esc_html__( 'Left', 'mrittik' ),
                                    'icon' => 'eicon-text-align-left',
                                ],
                                'center' => [
                                    'title' => esc_html__( 'Center', 'mrittik' ),
                                    'icon' => 'eicon-text-align-center',
                                ],
                                'right' => [
                                    'title' => esc_html__( 'Right', 'mrittik' ),
                                    'icon' => 'eicon-text-align-right',
                                ],
                                'justify' => [
                                    'title' => esc_html__( 'Justified', 'mrittik' ),
                                    'icon' => 'eicon-text-align-justify',
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-heading' => 'text-align: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'h_width',
                            'label' => esc_html__( 'Max Width', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px', '%' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-heading .pxl-heading--inner' => 'max-width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_title_sub',
                    'label' => esc_html__('Sub Title', 'mrittik' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'sub_title_color',
                            'label' => esc_html__('Color', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-heading .pxl-item--subtitle' => 'color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-heading .pxl-item--subtitle span' => 'color: {{VALUE}}; text-fill-color: {{VALUE}}; -webkit-text-fill-color: {{VALUE}}; background-image: none;',
                            ],
                        ),
                        array(
                            'name' => 'darkmode_sub_title_color',
                            'label' => esc_html__('Color (Dark Mode)', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-heading .pxl-item--subtitle' => 'color: {{VALUE}};',
                                '.dark-mode {{WRAPPER}} .pxl-heading .pxl-item--subtitle span' => 'color: {{VALUE}}; text-fill-color: {{VALUE}}; -webkit-text-fill-color: {{VALUE}}; background-image: none;',
                            ],
                        ),
                        array(
                            'name' => 'sub_title_typography',
                            'label' => esc_html__('Typography', 'mrittik' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-heading .pxl-item--subtitle span',
                        ),
                        array(
                            'name' => 'sub_title_margin',
                            'label' => esc_html__('Margin (px)', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'vw', 'vh' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-heading .pxl-item--subtitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'control_type' => 'responsive',
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'pxl_animate_sub',
                            'label' => esc_html__( 'BR Animate', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => mrittik_widget_animate(),
                            'default' => '',
                        ),
                        array(
                            'name' => 'pxl_animate_delay_sub',
                            'label' => esc_html__('Animate Delay', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => '0',
                            'description' => esc_html__( 'Enter number. Default 0ms', 'mrittik' ),
                        ),
                        array(
                            'name' => 'pxl_animate_duration_sub',
                            'label' => esc_html__('Animation Duration', 'mrittik'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'min' => 0,
                            'step' => 0.1,
                            'default' => 1.2,
                            'description' => 'Default 1.2s',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_title',
                    'label' => esc_html__('Title', 'mrittik' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'style',
                            'label' => esc_html__('Style', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'style1' => 'Style 1',
                                'style2' => 'Style 2',
                            ],
                            'default' => 'style1',
                        ),
                        array(
                            'name' => 'title_tag',
                            'label' => esc_html__('HTML Tag', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'h1' => 'H1',
                                'h2' => 'H2',
                                'h3' => 'H3',
                                'h4' => 'H4',
                                'h5' => 'H5',
                                'h6' => 'H6',
                                'div' => 'div',
                                'span' => 'span',
                                'p' => 'p',
                            ],
                            'default' => 'h2',
                        ),
                        array(
                            'name' => 'title_color',
                            'label' => esc_html__( 'Title Color', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-heading .pxl-item--title' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'darkmode_title_color',
                            'label' => esc_html__( 'Title Color (Dark Mode)', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-heading .pxl-item--title' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'title_typography',
                            'label' => esc_html__('Typography', 'mrittik' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-heading .pxl-item--title',
                        ),
                        array(
                            'name' => 'highlight_color',
                            'label' => esc_html__( 'Highlight Color', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-heading .pxl-item--title .pxl-title--highlight' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'darkmode_highlight_color',
                            'label' => esc_html__( 'Highlight Color (Dark Mode)', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-heading .pxl-item--title .pxl-title--highlight' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'highlight_typography',
                            'label' => esc_html__('Highlight Typography', 'mrittik' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-heading .pxl-item--title .pxl-title--highlight',
                        ),
                        array(
                            'name' => 'title_custom_font_family',
                            'label' => esc_html__('Custom Font Family', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                '' => 'Inherit',
                            ],
                            'default' => '',
                        ),
                        array(
                            'name'         => 'title_box_shadow',
                            'label' => esc_html__( 'Title Shadow', 'mrittik' ),
                            'type'         => \Elementor\Group_Control_Text_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector'     => '{{WRAPPER}} .pxl-heading .pxl-item--title'
                        ),
                        array(
                            'name' => 'title_margin',
                            'label' => esc_html__('Margin (px)', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'vw', 'vh' ],
                            'default' => [
                                'top' => 0,
                                'right' => 0,
                                'bottom' => 0,
                                'left' => 0,
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-heading .pxl-item--title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'control_type' => 'responsive',
                        ),
                        array(
                            'name' => 'title_padding',
                            'label' => esc_html__('Padding (px)', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'vw', 'vh' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-heading .pxl-item--title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'control_type' => 'responsive',
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'scroll_horizontal',
                            'label' => esc_html__('Scroll Horizontal', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'false',
                        ),
                        array(
                            'name' => 'scroll_revesal',
                            'label' => esc_html__('Scroll Revesal', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'false',
                            'condition' => [
                                'scroll_horizontal' => 'true',
                            ],
                        ),
                        array(
                            'name' => 'scroll_offset_x',
                            'label' => esc_html__('Scroll Offset X', 'mrittik' ),
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
                                'size' => '85',
                            ],
                            'size_units' => [ 'px', '%', 'vw', 'vh' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-section-scroll' => 'transform: translateX({{SIZE}}{{UNIT}}); -webkit-transform: translateX({{SIZE}}{{UNIT}}); -moz-transform: translateX({{SIZE}}{{UNIT}}); -ms-transform: translateX({{SIZE}}{{UNIT}}); -o-transform: translateX({{SIZE}}{{UNIT}});',
                            ],
                            'condition' => [
                                'scroll_horizontal' => 'true',
                            ],
                        ),
                        array(
                            'name' => 'title_line',
                            'label' => esc_html__('Title Line', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'false',
                        ),
                        array(
                            'name' => 'divider',
                            'label' => esc_html__('Divider Position', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'divider-none'      => esc_html__( 'None', 'mrittik' ),
                                'divider-left'      => esc_html__( 'Left', 'mrittik' ),
                                'divider-right'     => esc_html__( 'Right', 'mrittik' ),
                                'divider-top'       => esc_html__( 'Top', 'mrittik' ),
                                'divider-bottom'    => esc_html__( 'Bottom', 'mrittik' ),
                            ],
                            'default' => 'divider-none',
                        ),
                        array(
                            'name'  => 'divider_width',
                            'label' => esc_html__( 'Divider Width', 'mrittik' ),
                            'type'  => 'slider',
                            'control_type' => 'responsive',
                            'size_units' => [ 'px', '%', 'vw', 'vh' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-heading .pxl-item--title:before,
                                {{WRAPPER}} .pxl-heading .pxl-item--title:after' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'divider!' => ['divider-none'],
                            ],
                        ),
                        array(
                            'name'  => 'divider_height',
                            'label' => esc_html__( 'Divider Height', 'mrittik' ),
                            'type'  => 'slider',
                            'control_type' => 'responsive',
                            'size_units' => [ 'px', '%', 'vw', 'vh' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-heading .pxl-item--title:before,
                                {{WRAPPER}} .pxl-heading .pxl-item--title:after' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'divider!' => ['divider-none'],
                            ],
                        ),
                        array(
                            'name' => 'divider_color',
                            'label' => esc_html__( 'Divider Color', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-heading .pxl-item--title:before,
                                {{WRAPPER}} .pxl-heading .pxl-item--title:after' => 'background-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'divider!' => ['divider-none'],
                            ],
                        ),
                        array(
                            'name' => 'darkmode_divider_color',
                            'label' => esc_html__( 'Divider Color (Dark Mode)', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-heading .pxl-item--title:before,
                                .dark-mode {{WRAPPER}} .pxl-heading .pxl-item--title:after' => 'background-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'divider!' => ['divider-none'],
                            ],
                        ),
                        array(
                            'name' => 'title_split_text_anm',
                            'label' => esc_html__('Split Text Animation', 'mrittik' ),
                            'type' => 'select',
                            'options' => [
                                ''               => esc_html__( 'None', 'mrittik' ),
                                'split-in-fade' => esc_html__( 'In Fade', 'mrittik' ),
                                'split-in-right' => esc_html__( 'In Right', 'mrittik' ),
                                'split-in-left'  => esc_html__( 'In Left', 'mrittik' ),
                                'split-in-up'    => esc_html__( 'In Up', 'mrittik' ),
                                'split-in-down'  => esc_html__( 'In Down', 'mrittik' ),
                                'split-in-rotate'  => esc_html__( 'In Rotate', 'mrittik' ),
                                'split-in-scale'  => esc_html__( 'In Scale', 'mrittik' ),
                            ],
                            'default' => '',
                        ),
                        array(
                            'name' => 'pxl_animate',
                            'label' => esc_html__('BR Animate', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => mrittik_widget_animate_v2(),
                            'default' => '',
                        ),
                        array(
                            'name' => 'pxl_animate_delay',
                            'label' => esc_html__('Animate Delay', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => '0',
                            'description' => esc_html__( 'Enter number. Default 0ms', 'mrittik'),
                        ),
                        array(
                            'name' => 'pxl_animate_duration',
                            'label' => esc_html__('Animation Duration', 'mrittik'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'min' => 0,
                            'step' => 0.1,
                            'default' => 1.2,
                            'description' => 'Default 1.2s',
                        ),
                    ),
                ),
            ),
        ),
    ),
    mrittik_get_class_widget_path()
);