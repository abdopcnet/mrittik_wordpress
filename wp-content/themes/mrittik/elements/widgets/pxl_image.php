<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_image',
        'title' => esc_html__('BR Image', 'mrittik' ),
        'icon' => 'eicon-image',
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
                            'name' => 'image',
                            'label' => esc_html__( 'Choose Image', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                        ),
                        array(
                            'name' => 'image_link',
                            'label' => esc_html__( 'Link', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::URL,
                        ),
                        array(
                            'name' => 'image_type',
                            'label' => esc_html__('Image Type', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'img' => esc_html__( 'Image', 'mrittik' ),
                                'bg' => esc_html__( 'Background', 'mrittik' ),
                            ],
                            'default' => 'img',
                        ),
                        array(
                            'name' => 'img_size',
                            'label' => esc_html__( 'Image Size', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'description' => esc_html__('Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height).', 'mrittik' ),
                            'condition' => [
                                'image_type' => 'img',
                            ],
                        ),
                        array(
                            'name' => 'image_align',
                            'label' => esc_html__( 'Image Alignment', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::CHOOSE,
                            'control_type' => 'responsive',
                            'options' => [
                                'left' => [
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
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-image-single' => 'text-align: {{VALUE}};',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style',
                    'label' => esc_html__('Image', 'mrittik' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'image_width',
                            'label' => esc_html__( 'Image Width', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'description' => esc_html__( 'Enter number.', 'mrittik' ),
                            'control_type' => 'responsive',
                            'size_units' => [ 'px', '%' ],
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
                            'condition' => [
                                'image_type' => 'img',
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-image-single img' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'image_height',
                            'label' => esc_html__( 'Image Height', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'description' => esc_html__( 'Enter number.', 'mrittik' ),
                            'control_type' => 'responsive',
                            'size_units' => [ 'px', '%' ],
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
                            'condition' => [
                                'image_type' => 'img',
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-image-single img' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'bg_height',
                            'label' => esc_html__('Image Height', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'description' => esc_html__('Enter number.', 'mrittik' ),
                            'size_units' => [ 'px', 'vw', 'vh' ],
                            'default' => [
                                'unit' => 'px',
                            ],
                            'range' => [
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
                            'condition' => [
                                'image_type' => 'bg',
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-image-single .pxl-image-bg' => 'height: {{SIZE}}{{UNIT}};',
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
                                '{{WRAPPER}} .pxl-image-single img, {{WRAPPER}} .pxl-image-single .pxl-item--inner' => 'width: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'object_fit',
                            'label' => esc_html__( 'Size', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                '' => esc_html__( 'Default', 'mrittik' ),
                                'none' => esc_html__( 'None', 'mrittik' ),
                                'cover' => esc_html__( 'Cover', 'mrittik' ),
                                'contain' => esc_html__( 'Contain', 'mrittik' ),
                                'fill' => esc_html__( 'Fill', 'mrittik' ),
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-image-single img' => 'object-fit: {{VALUE}};',
                            ],
                            'condition' => [
                                'image_type' => 'img',
                            ],
                        ),
                        array(
                            'name' => 'image_position',
                            'label' => esc_html__('Position', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'control_type' => 'responsive',
                            'options' => [
                                '' => esc_html__( 'Default', 'mrittik' ),
                                'relative' => esc_html__( 'Relative', 'mrittik' ),
                                'absolute' => esc_html__( 'Absolute', 'mrittik' ),
                            ],
                            'default' => '',
                            'separator' => 'before',
                            'selectors' => [
                                '{{WRAPPER}}' => 'position: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'img_horizontal_orientation',
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
                            'condition' => [
                                'image_position!' => '',
                            ],
                        ),
                        array(
                            'name' => 'image_offset_x',
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
                                'size' => '0',
                            ],
                            'size_units' => [ 'px', '%', 'vw', 'vh' ],
                            'selectors' => [
                                '{{WRAPPER}}' => 'left: {{SIZE}}{{UNIT}}',
                            ],
                            'condition' => [
                                'img_horizontal_orientation' => 'start',
                                'image_position!' => '',
                            ],
                        ),
                        array(
                            'name' => 'image_offset_x_end',
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
                                'size' => '0',
                            ],
                            'size_units' => [ 'px', '%', 'vw', 'vh' ],
                            'selectors' => [
                                '{{WRAPPER}}' => 'right: {{SIZE}}{{UNIT}}',
                            ],
                            'condition' => [
                                'img_horizontal_orientation' => 'end',
                                'image_position!' => '',
                            ],
                        ),
                        array(
                            'name' => 'img_vertical_orientation',
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
                            'condition' => [
                                'image_position!' => '',
                            ],
                        ),
                        array(
                            'name' => 'image_offset_y',
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
                                'size' => '0',
                            ],
                            'size_units' => [ 'px', '%', 'vw', 'vh' ],
                            'selectors' => [
                                '{{WRAPPER}}' => 'top: {{SIZE}}{{UNIT}}',
                            ],
                            'condition' => [
                                'img_vertical_orientation' => 'start',
                                'image_position!' => '',
                            ],
                        ),
                        array(
                            'name' => 'image_offset_y_end',
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
                                'size' => '0',
                            ],
                            'size_units' => [ 'px', '%', 'vw', 'vh' ],
                            'selectors' => [
                                '{{WRAPPER}}' => 'bottom: {{SIZE}}{{UNIT}}',
                            ],
                            'condition' => [
                                'img_vertical_orientation' => 'end',
                                'image_position!' => '',
                            ],
                        ),
                        array(
                            'name' => 'img_border_radius',
                            'label' => esc_html__('Image Radius', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px', '%' ],
                            'default' => [
                                'unit' => '%',
                            ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 100,
                                ],
                                '%' => [
                                    'min' => 0,
                                    'max' => 100,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-image-single img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'overlay_color',
                            'label' => esc_html__('Overlay Color', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-image-single .pxl-item--inner:before' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name'  => 'overlay_opacity',
                            'label' => esc_html__( 'Overlay Opacity', 'mrittik' ),
                            'type'  => 'slider',
                            'control_type' => 'responsive',
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 9,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-image-single .pxl-item--inner:before' => 'opacity: 0.{{SIZE}};',
                            ],
                        ),
                        array(
                            'name' => 'darkmode_overlay_color',
                            'label' => esc_html__('Overlay Color (Dark Mode)', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-image-single .pxl-item--inner:before' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name'  => 'darkmode_overlay-opacity',
                            'label' => esc_html__( 'Overlay Opacity (Dark Mode)', 'mrittik' ),
                            'type'  => 'slider',
                            'control_type' => 'responsive',
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 9,
                                ],
                            ],
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-image-single .pxl-item--inner:before' => 'opacity: 0.{{SIZE}};',
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
                                '{{WRAPPER}} .pxl-image-single img' => 'border-style: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'border_width',
                            'label' => esc_html__( 'Border Width', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-image-single img' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'condition' => [
                                'border_type!' => '',
                            ],
                            'responsive' => true,
                        ),
                        array(
                            'name' => 'border_color',
                            'label' => esc_html__( 'Border Color', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-image-single img' => 'border-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'border_type!' => '',
                            ],
                        ),
                        array(
                            'name' => 'darkmode_border_color',
                            'label' => esc_html__( 'Border Color (Dark Mode)', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-image-single img' => 'border-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'border_type!' => '',
                            ],
                        ),
                        array(
                            'name' => 'img_effect',
                            'label' => esc_html__( 'Image Effects', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                '' => 'None',
                                'pxl-image-ink' => esc_html__('Ink', 'mrittik' ),
                                'pxl-image-scroller' => esc_html__('Scroll Load', 'mrittik' ),
                                'pxl-image-tilt' => esc_html__('Tilt', 'mrittik' ),
                                'slide-top-to-bottom' => esc_html__('Slide Top To Bottom ', 'mrittik' ),
                                'pxl-image-effect2' => esc_html__('Slide Bottom To Top ', 'mrittik' ),
                                'slide-right-to-left' => esc_html__('Slide Right To Left ', 'mrittik' ),
                                'slide-left-to-right' => esc_html__('Slide Left To Right ', 'mrittik' ),
                            ],
                            'default' => '',
                            'condition' => [
                                'image_type' => 'img',
                            ],
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
                            'default' => 'false',
                        ),
                        array(
                            'name' => 'particle_bottom_position',
                            'label' => esc_html__('Particle Bottom Position', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ 'px', '%' ],
                            'control_type' => 'responsive',
                            'default' => [
                                'unit' => '%',
                            ],
                            'range' => [
                                '%' => [
                                    'min' => 0,
                                    'max' => 100,
                                ],
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-circle--shapes' => 'bottom: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'particle_right_position',
                            'label' => esc_html__('Particle Right Position', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ 'px', '%' ],
                            'control_type' => 'responsive',
                            'default' => [
                                'unit' => '%',
                            ],
                            'range' => [
                                '%' => [
                                    'min' => 0,
                                    'max' => 100,
                                ],
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-circle--shapes' => 'right: {{SIZE}}{{UNIT}};',
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
                                '{{WRAPPER}} .pxl-circle--shapes' => 'width: {{SIZE}}{{UNIT}};',
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
                                '{{WRAPPER}} .pxl-circle--shapes' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'particle_color',
                            'label' => esc_html__('Particle Color', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-circle--shapes' => 'border-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'darkmode_particle_color',
                            'label' => esc_html__('Particle Color (Dark Mode)', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-circle--shapes' => 'border-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name'  => 'particle_size',
                            'label' => esc_html__( 'Particle Size (px)', 'mrittik' ),
                            'type'  => 'slider',
                            'control_type' => 'responsive',
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-circle--shapes' => 'border-width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_line',
                    'label' => esc_html__('Line', 'mrittik' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'show_line',
                            'label' => esc_html__('Show Line', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'false',
                        ),
                        array(
                            'name' => 'line_bottom_position',
                            'label' => esc_html__('Bottom Position', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ 'px', '%' ],
                            'control_type' => 'responsive',
                            'default' => [
                                'unit' => 'px',
                            ],
                            'range' => [
                                '%' => [
                                    'min' => 0,
                                    'max' => 100,
                                ],
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .divider-top:before' => 'bottom: calc(100% + {{SIZE}}{{UNIT}});',
                            ],
                        ),
                        array(
                            'name' => 'line_left_position',
                            'label' => esc_html__('Left Position', 'mrittik' ),
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
                                '{{WRAPPER}} .divider-top:before' => 'left: calc(50% + {{SIZE}}{{UNIT}});',
                            ],
                        ),
                        array(
                            'name' => 'line_width',
                            'label' => esc_html__('Line Width', 'mrittik' ),
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
                                '{{WRAPPER}} .divider-top:before' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'line_height',
                            'label' => esc_html__('Line Height', 'mrittik' ),
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
                                '{{WRAPPER}} .divider-top:before' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'line_color',
                            'label' => esc_html__('Line Color', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .divider-top:before' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'darkmode_line_color',
                            'label' => esc_html__('Line Color (Dark Mode)', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .divider-top:before' => 'background-color: {{VALUE}};',
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