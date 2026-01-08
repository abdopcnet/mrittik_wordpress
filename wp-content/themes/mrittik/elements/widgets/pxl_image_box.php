<?php
// Register Image Box Widget
pxl_add_custom_widget(
    array(
        'name' => 'pxl_image_box',
        'title' => esc_html__('BR Image Box', 'mrittik' ),
        'icon' => 'eicon-image-box',
        'categories' => array('pxltheme-core'),
        'scripts' => array(
            'mrittik-effects'
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
                                    'image' => get_template_directory_uri() . '/elements/templates/pxl_image_box/img-layout/layout1.jpg'
                                ],
                                '2' => [
                                    'label' => esc_html__('Layout 2', 'mrittik' ),
                                    'image' => get_template_directory_uri() . '/elements/templates/pxl_image_box/img-layout/layout2.jpg'
                                ],
                                '3' => [
                                    'label' => esc_html__('Layout 3', 'mrittik' ),
                                    'image' => get_template_directory_uri() . '/elements/templates/pxl_image_box/img-layout/layout3.jpg'
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'mrittik' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'condition' => [
                        'layout' => ['1'],
                    ],
                    'controls' => array(
                        array(
                            'name' => 'image_effects',
                            'label' => esc_html__('Image Effects', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::CHOOSE,
                            'options' => [
                                'normal' => [
                                    'title' => esc_html__('Normal', 'mrittik' ),
                                    'icon' => 'eicon-exit',
                                ],
                                'expo' => [
                                    'title' => esc_html__('Expo Easing Zoom', 'mrittik' ),
                                    'icon' => 'eicon-frame-expand',
                                ],
                                'wave' => [
                                    'title' => esc_html__('Wave', 'mrittik' ),
                                    'icon' => 'eicon-slider-3d',
                                ],
                            ],
                            'default' => 'normal',
                        ),
                        array(
                            'name' => 'image_front',
                            'label' => esc_html__( 'Image Front', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                        ),
                        array(
                            'name' => 'image_back',
                            'label' => esc_html__( 'Image Back', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                            'condition' => [
                                'image_effects' => 'normal',
                            ],
                        ),
                        array(
                            'name' => 'btn_link',
                            'label' => esc_html__('Link', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::URL,
                        ),
                    ),
                ),
                array(
                    'name' => 'section_content_ly2',
                    'label' => esc_html__('Content', 'mrittik' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'condition' => [
                        'layout' => ['2'],
                    ],
                    'controls' => array(
                        array(
                            'name' => 'circle_text',
                            'label' => esc_html__('Circle Text', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => esc_html__('Click Here', 'mrittik'),
                        ),
                        array(
                            'name' => 'logo',
                            'label' => esc_html__('Logo', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                        ),
                        array(
                            'name' => 'logo_dark',
                            'label' => esc_html__('Logo Dark', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                        ),
                        array(
                            'name' => 'logo_link',
                            'label' => esc_html__('Link', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::URL,
                        ),
                    ),
                ),
                array(
                    'name' => 'section_content_ly3',
                    'label' => esc_html__('Content', 'mrittik' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'condition' => [
                        'layout' => ['3'],
                    ],
                    'controls' => array(
                        array(
                            'name' => 'image_front_01',
                            'label' => esc_html__( 'Image Front One', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                        ),
                        array(
                            'name' => 'image_front_02',
                            'label' => esc_html__( 'Image Front Two', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                        ),
                        array(
                            'name' => 'image_back_01',
                            'label' => esc_html__( 'Image Back', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                        ),
                        array(
                            'name' => 'btn_link_03',
                            'label' => esc_html__('Link', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::URL,
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style',
                    'label' => esc_html__('Style', 'mrittik'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'effect_style',
                            'label' => esc_html__('Effect Style', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'style1' => 'Style 1',
                                'style2' => 'Style 2',
                                'style3' => 'Style 3',
                                'style4' => 'Style 4',
                                'style5' => 'Style 5',
                                'style6' => 'Style 6',
                                'style7' => 'Style 7',
                            ],
                            'default' => 'style1',
                            'condition' => [
                                'layout' => ['1', '3'],
                            ],
                            'conditions' => [
                                'relation' => 'or',
                                'terms' => [
                                    [
                                        'terms' => [
                                            ['name' => 'layout', 'operator' => '==', 'value' => '1'],
                                            ['name' => 'image_effects', 'operator' => 'in', 'value' => ['normal']]
                                        ]
                                    ],
                                    [
                                        'terms' => [
                                            ['name' => 'layout', 'operator' => '==', 'value' => '3'],
                                        ]
                                    ],
                                ],
                            ],
                        ),
                        array(
                            'name' => 'img_size',
                            'label' => esc_html__('Image Size', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'description' => 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Default: 370x300 (Width x Height)).',
                            'condition' => [
                                'layout' => ['2'],
                            ],
                        ),
                        array(
                            'name' => 'image_size',
                            'label' => esc_html__('Image Size', 'mrittik' ),
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
                                '{{WRAPPER}} .item--image img' => 'width: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'img_max_height',
                            'label' => esc_html__('Image Max Height', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
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
                                '{{WRAPPER}} .pxl-image-box .item--image img' => 'max-height: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'img_max_height3',
                            'label' => esc_html__('Image Back Max Height', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
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
                                '{{WRAPPER}} .pxl-image-box .item--back img' => 'max-height: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'layout' => ['3'],
                            ],
                        ),
                        array(
                            'name' => 'img_margin',
                            'label' => esc_html__('Image Margin (px)', 'mrittik' ),
                            'type' => 'dimensions',
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-item--inner .item--image' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'separator' => 'after',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_particle',
                    'label' => esc_html__('Particle', 'mrittik' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'show_particle',
                            'label' => esc_html__('Show Particle', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                            'condition' => [
                                'layout' => ['1', '3'],
                            ],
                        ),
                        array(
                            'name' => 'particle_bottom_position',
                            'label' => esc_html__('Particle Bottom Position', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ 'px', '%' ],
                            'control_type' => 'responsive',
                            'default' => [
                                'unit' => 'px',
                            ],
                            'range' => [
                                '%' => [
                                    'min' => -100,
                                    'max' => 100,
                                ],
                                'px' => [
                                    'min' => -3000,
                                    'max' => 3000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .image--reveal' => 'bottom: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'layout' => ['1'],
                            ],
                        ),
                        array(
                            'name' => 'particle_left_position',
                            'label' => esc_html__('Particle Left Position', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ 'px', '%' ],
                            'control_type' => 'responsive',
                            'default' => [
                                'unit' => '%',
                            ],
                            'range' => [
                                '%' => [
                                    'min' => -100,
                                    'max' => 100,
                                ],
                                'px' => [
                                    'min' => -3000,
                                    'max' => 3000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .image--reveal' => 'left: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'layout' => ['1'],
                            ],
                        ),
                        array(
                            'name' => 'width_particle',
                            'label' => esc_html__('Particle Width', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ '%', 'px' ],
                            'control_type' => 'responsive',
                            'default' => [
                                'unit' => '%',
                            ],
                            'range' => [
                                '%' => [
                                    'min' => 0,
                                    'max' => 1000,
                                ],
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .image--reveal svg' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'layout' => ['1', '3'],
                            ],
                        ),
                        array(
                            'name' => 'height_particle',
                            'label' => esc_html__('Particle Height', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ '%', 'px' ],
                            'control_type' => 'responsive',
                            'default' => [
                                'unit' => '%',
                            ],
                            'range' => [
                                '%' => [
                                    'min' => 0,
                                    'max' => 1000,
                                ],
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .image--reveal svg' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'layout' => ['1', '3'],
                            ],
                        ),
                        array(
                            'name' => 'item_width',
                            'label' => esc_html__('Item Width', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ '%', 'px' ],
                            'control_type' => 'responsive',
                            'default' => [
                                'unit' => 'px',
                            ],
                            'range' => [
                                '%' => [
                                    'min' => 0,
                                    'max' => 1000,
                                ],
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-item--inner' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'layout' => ['2'],
                            ],
                        ),
                        array(
                            'name' => 'item_height',
                            'label' => esc_html__('Item Height', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ '%', 'px' ],
                            'control_type' => 'responsive',
                            'default' => [
                                'unit' => 'px',
                            ],
                            'range' => [
                                '%' => [
                                    'min' => 0,
                                    'max' => 1000,
                                ],
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-item--inner' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'layout' => ['2'],
                            ],
                        ),
                        array(
                            'name' => 'item_bg_color',
                            'label' => esc_html__('Item Background Color', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-item--inner' => 'background-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'layout' => ['2'],
                            ],
                        ),
                        array(
                            'name' => 'darkmode_item_bg_color',
                            'label' => esc_html__('Item Background Color (Dark Mode)', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-item--inner' => 'background-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'layout' => ['2'],
                            ],
                        ),
                        array(
                            'name' => 'particle_color',
                            'label' => esc_html__('Particle Color', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .image--reveal svg path' => 'fill: {{VALUE}};',
                            ],
                            'condition' => [
                                'layout' => ['1', '3'],
                            ],
                        ),
                        array(
                            'name' => 'darkmode_particle_color',
                            'label' => esc_html__('Particle Color (Dark Mode)', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .image--reveal svg path' => 'fill: {{VALUE}};',
                            ],
                            'condition' => [
                                'layout' => ['1', '3'],
                            ],
                        ),
                    ),
                ),
                mrittik_widget_animation_settings(),
            ),
        ),
    ),
    mrittik_get_class_widget_path()
);