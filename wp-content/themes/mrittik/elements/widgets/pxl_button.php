<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_button',
        'title' => esc_html__('BR Button', 'mrittik' ),
        'icon' => 'eicon-button',
        'categories' => array('pxltheme-core'),
        'scripts' => array(
            'mrittik-effects'
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'mrittik' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'text',
                            'label' => esc_html__('Text', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => esc_html__('Click Here', 'mrittik'),
                        ),
                        array(
                            'name' => 'link',
                            'label' => esc_html__('Link', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::URL,
                            'default' => [
                                'url' => '#',
                            ],
                        ),
                        array(
                            'name' => 'align',
                            'label' => esc_html__('Alignment', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::CHOOSE,
                            'control_type' => 'responsive',
                            'options' => [
                                'left'    => [
                                    'title' => esc_html__('Left', 'mrittik' ),
                                    'icon' => 'fa fa-align-left',
                                ],
                                'center' => [
                                    'title' => esc_html__('Center', 'mrittik' ),
                                    'icon' => 'fa fa-align-center',
                                ],
                                'right' => [
                                    'title' => esc_html__('Right', 'mrittik' ),
                                    'icon' => 'fa fa-align-right',
                                ],
                                'justify' => [
                                    'title' => esc_html__('Justified', 'mrittik' ),
                                    'icon' => 'fa fa-align-justify',
                                ],
                            ],
                            'prefix_class' => 'elementor-align-',
                            'default' => '',
                            'selectors'         => [
                                '{{WRAPPER}} .pxl-button' => 'text-align: {{VALUE}}',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_button',
                    'label' => esc_html__('Button Normal', 'mrittik' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'btn_style',
                            'label' => esc_html__('Style', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'btn btn-default' => esc_html__('Default', 'mrittik' ),
                                'pxl-btn-line' => esc_html__('Style 2', 'mrittik' ),
                                'pxl-btn-shine' => esc_html__('Style 3', 'mrittik' ),
                                'btn-border-running' => esc_html__('Style 4', 'mrittik' ),
                            ],
                            'default' => 'btn btn-default',
                        ),
                        array(
                            'name' => 'btn_typography',
                            'label' => esc_html__( 'Typography', 'mrittik' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-button a',
                        ),
                        array(
                            'name'         => 'btn_box_shadow',
                            'label' => esc_html__( 'Box Shadow', 'mrittik' ),
                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector'     => '{{WRAPPER}} .pxl-button a'
                        ),
                        array(
                            'name' => 'btn_padding',
                            'label' => esc_html__('Padding', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'vw', 'vh' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'control_type' => 'responsive',
                        ),
                        array(
                            'name' => 'btn_margin',
                            'label' => esc_html__('Margin', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'vw', 'vh' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'control_type' => 'responsive',
                        ),
                        array(
                            'name' => 'btn_width',
                            'label' => esc_html__('Button Width', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::CHOOSE,
                            'control_type' => 'responsive',
                            'options' => [
                                '100%' => [
                                    'title' => esc_html__('100%', 'mrittik' ),
                                    'icon' => 'eicon-text-align-justify',
                                ],
                                'auto' => [
                                    'title' => esc_html__('Auto', 'mrittik' ),
                                    'icon' => 'eicon-h-align-stretch',
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button a' => 'width: {{VALUE}};',
                            ],
                            'condition' => ['btn_style' => 'btn btn-default'],
                        ),
                        array(
                            'name' => 'color',
                            'label' => esc_html__('Color', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .btn-text, {{WRAPPER}} .pxl-btn-shine' => 'color: {{VALUE}};',
                            ],
                            'separator' => 'before',
                            'condition' => [
                                'btn_style' => ['btn btn-default', 'pxl-btn-shine'],
                            ],
                        ),
                        array(
                            'name' => 'btn_bg_color',
                            'label' => esc_html__('Background Color', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button a:after, {{WRAPPER}} .pxl-btn-shine' => 'background-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'btn_style' => ['btn btn-default', 'pxl-btn-shine'],
                            ],
                        ),
                        array(
                            'name' => 'border_color',
                            'label' => esc_html__('Border Color', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button svg, {{WRAPPER}} .pxl-btn-shine' => 'border-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'btn_style' => ['btn btn-default', 'pxl-btn-shine'],
                            ],
                        ),
                        array(
                            'name' => 'line_color',
                            'label' => esc_html__('Line Color', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button svg path' => 'fill: {{VALUE}};',
                                '{{WRAPPER}} .pxl-btn-shine:before' => 'background-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'btn_style' => ['btn btn-default', 'pxl-btn-shine'],
                            ],
                        ),
                        array(
                            'name' => 'darkmode_color',
                            'label' => esc_html__('Color (Dark Mode)', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-button .btn-text, .dark-mode {{WRAPPER}} .pxl-btn-shine' => 'color: {{VALUE}};',
                            ],
                            'separator' => 'before',
                            'condition' => [
                                'btn_style' => ['btn btn-default', 'pxl-btn-shine'],
                            ],
                        ),
                        array(
                            'name' => 'darkmode_btn_bg_color',
                            'label' => esc_html__('Background Color (Dark Mode)', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-button a:after, .dark-mode {{WRAPPER}} .pxl-btn-shine' => 'background-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'btn_style' => ['btn btn-default', 'pxl-btn-shine'],
                            ],
                        ),
                        array(
                            'name' => 'darkmode_border_color',
                            'label' => esc_html__('Border Color (Dark Mode)', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-button svg, .dark-mode {{WRAPPER}} .pxl-btn-shine' => 'border-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'btn_style' => ['btn btn-default', 'pxl-btn-shine'],
                            ],
                        ),
                        array(
                            'name' => 'darkmode_line_color',
                            'label' => esc_html__('Line Color (Dark Mode)', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-button svg path' => 'fill: {{VALUE}};',
                                '.dark-mode {{WRAPPER}} .pxl-btn-shine:before' => 'background-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'btn_style' => ['btn btn-default', 'pxl-btn-shine'],
                            ],
                        ),
                        array(
                            'name' => 'button_color_2',
                            'label' => esc_html__('Color', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} a, {{WRAPPER}} a .btn-text' => 'color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-btn-line .btn-icon .line, {{WRAPPER}} .pxl-btn-line .btn-icon .dot' => 'background-color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-btn-line .btn-icon .circle' => 'border-color: {{VALUE}};',
                            ],
                            'condition' => ['btn_style' => 'pxl-btn-line'],
                            'separator' => 'before',
                        ),
                        array(
                            'name' => 'darkmode_button_color2',
                            'label' => esc_html__('Color (Dark Mode)', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} a, .dark-mode {{WRAPPER}} a .btn-text' => 'color: {{VALUE}};',
                                '.dark-mode {{WRAPPER}} .pxl-btn-line .btn-icon .line, .dark-mode {{WRAPPER}} .pxl-btn-line .btn-icon .dot' => 'background-color: {{VALUE}};',
                                '.dark-mode {{WRAPPER}} .pxl-btn-line .btn-icon .circle' => 'border-color: {{VALUE}};',
                            ],
                            'condition' => ['btn_style' => 'pxl-btn-line'],
                        ),
                        array(
                            'name' => 'button_text_margin',
                            'label' => esc_html__('Text Margin', 'mrittik' ),
                            'type' => 'dimensions',
                            'control_type' => 'responsive',
                            'size_units' => [ 'px', '%', 'vw', 'vh' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .btn-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'condition' => ['btn_style' => 'pxl-btn-line'],
                            'separator' => 'before',
                        ),
                        array(
                            'name' => 'btn_line_width',
                            'label' => esc_html__('Line Width', 'mrittik' ),
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
                                '{{WRAPPER}} .pxl-btn-line .btn-icon .line' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => ['btn_style' => 'pxl-btn-line'],
                        ),
                        array(
                            'name' => 'btn_line_height',
                            'label' => esc_html__('Line Height', 'mrittik' ),
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
                                '{{WRAPPER}} .pxl-btn-line .btn-icon .line' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => ['btn_style' => 'pxl-btn-line'],
                        ),
                        array(
                            'name' => 'circle_size',
                            'label' => esc_html__('Circle Size', 'mrittik' ),
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
                                '{{WRAPPER}} .pxl-btn-line .btn-icon .circle' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => ['btn_style' => 'pxl-btn-line'],
                        ),
                        array(
                            'name' => 'circle_width',
                            'label' => esc_html__('Circle Width', 'mrittik' ),
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
                                '{{WRAPPER}} .pxl-btn-line .btn-icon .circle' => 'border-width: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => ['btn_style' => 'pxl-btn-line'],
                        ),
                        array(
                            'name' => 'dot_size',
                            'label' => esc_html__('Dot Size', 'mrittik' ),
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
                                '{{WRAPPER}} .pxl-btn-line .btn-icon .dot' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => ['btn_style' => 'pxl-btn-line'],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_button_hover',
                    'label' => esc_html__('Button Hover', 'mrittik' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'button_effect',
                            'label' => esc_html__('Effect', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                '' => esc_html__('None', 'mrittik' ),
                                'pxl-jump' => esc_html__('Jump', 'mrittik' ),
                                'pxl-upscale' => esc_html__('Upscale', 'mrittik' ),
                                'pxl-spin' => esc_html__('Spin', 'mrittik' ),
                                'pxl-skew' => esc_html__('Skew', 'mrittik' ),
                                'pxl-squash' => esc_html__('Squash', 'mrittik' ),
                                'pxl-leap' => esc_html__('Leap', 'mrittik' ),
                                'pxl-fade' => esc_html__('Fade', 'mrittik' ),
                                'pxl-sheen' => esc_html__('Sheen', 'mrittik' ),
                                'pxl-xspin' => esc_html__('Xspin', 'mrittik' ),
                                'pxl-pop' => esc_html__('Pop', 'mrittik' ),
                            ],
                            'default' => '',
                        ),
                        array(
                            'name' => 'color_hover',
                            'label' => esc_html__('Color', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button a:hover .btn-text, {{WRAPPER}} .pxl-btn-shine:hover' => 'color: {{VALUE}};',
                            ],
                            'separator' => 'before',
                            'condition' => [
                                'btn_style' => ['btn btn-default', 'pxl-btn-shine'],
                            ],
                        ),
                        array(
                            'name' => 'btn_bg_color_hover',
                            'label' => esc_html__('Background Color', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button a:hover:after, {{WRAPPER}} .pxl-btn-shine:hover' => 'background-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'btn_style' => ['btn btn-default', 'pxl-btn-shine'],
                            ],
                        ),
                        array(
                            'name' => 'border_color_hover',
                            'label' => esc_html__('Border Color', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button a:hover:before, {{WRAPPER}} .pxl-btn-shine:hover' => 'border-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'btn_style' => ['btn btn-default', 'pxl-btn-shine'],
                            ],
                        ),
                        array(
                            'name' => 'darkmode_color_hover',
                            'label' => esc_html__('Color (Dark Mode)', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-button a:hover .btn-text, .dark-mode {{WRAPPER}} .pxl-btn-shine:hover' => 'color: {{VALUE}};',
                            ],
                            'condition' => [
                                'btn_style' => ['btn btn-default', 'pxl-btn-shine'],
                            ],
                        ),
                        array(
                            'name' => 'darkmode_btn_bg_color_hover',
                            'label' => esc_html__('Background Color (Dark Mode)', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-button a:hover:after, .dark-mode {{WRAPPER}} .pxl-btn-shine:hover' => 'background-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'btn_style' => ['btn btn-default', 'pxl-btn-shine'],
                            ],
                        ),
                        array(
                            'name' => 'darkmode_border_color_hover',
                            'label' => esc_html__('Border Color (Dark Mode)', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-button a:hover:before, .dark-mode {{WRAPPER}} .pxl-btn-shine:hover' => 'border-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'btn_style' => ['btn btn-default', 'pxl-btn-shine'],
                            ],
                        ),

                        array(
                            'name' => 'hover_button_color2',
                            'label' => esc_html__('Color', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} a:hover, {{WRAPPER}} a:hover .btn-text' => 'color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-btn-line:hover .btn-icon .line, {{WRAPPER}} .pxl-btn-line:hover .btn-icon .dot' => 'background-color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-btn-line:hover .btn-icon .circle' => 'border-color: {{VALUE}};',
                            ],
                            'condition' => ['btn_style' => 'pxl-btn-line'],
                        ),
                        array(
                            'name' => 'darkmode_hover_button_color2',
                            'label' => esc_html__('Color (Dark Mode)', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} a:hover, .dark-mode {{WRAPPER}} a:hover .btn-text' => 'color: {{VALUE}};',
                                '.dark-mode {{WRAPPER}} .pxl-btn-line:hover .btn-icon .line, .dark-mode {{WRAPPER}} .pxl-btn-line:hover .btn-icon .dot' => 'background-color: {{VALUE}};',
                                '.dark-mode {{WRAPPER}} .pxl-btn-line:hover .btn-icon .circle' => 'border-color: {{VALUE}};',
                            ],
                            'condition' => ['btn_style' => 'pxl-btn-line'],
                        ),
                        array(
                            'name'         => 'btn_box_shadow_hover',
                            'label'        => esc_html__( 'Box Shadow', 'mrittik' ),
                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector'     => '{{WRAPPER}} .pxl-button a:hover',
                        ),
                    ),
                ),
                mrittik_widget_animation_settings()
            ),
        ),
    ),
    mrittik_get_class_widget_path()
);