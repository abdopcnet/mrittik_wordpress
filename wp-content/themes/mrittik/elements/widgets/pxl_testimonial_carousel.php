<?php
$slides_to_show = range( 1, 10 );
$slides_to_show = array_combine( $slides_to_show, $slides_to_show );

pxl_add_custom_widget(
    array(
        'name' => 'pxl_testimonial_carousel',
        'title' => esc_html__('BR Testimonial Carousel', 'mrittik'),
        'icon' => 'eicon-testimonial',
        'categories' => array('pxltheme-core'),
        'scripts' => array(
            'swiper',
            'pxl-swiper',
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
                                    'image' => get_template_directory_uri() . '/elements/templates/pxl_testimonial_carousel/img-layout/layout1.jpg'
                                ],
                                '2' => [
                                    'label' => esc_html__('Layout 2', 'mrittik' ),
                                    'image' => get_template_directory_uri() . '/elements/templates/pxl_testimonial_carousel/img-layout/layout2.jpg'
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'mrittik'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'testimonial',
                            'label' => esc_html__('Testimonial', 'mrittik'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'condition' => [
                                'layout' => ['1']
                            ],
                            'controls' => array(
                                array(
                                    'name' => 'desc',
                                    'label' => esc_html__('Description', 'mrittik' ),
                                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                                    'rows' => 10,
                                    'show_label' => false,
                                ),
                                array(
                                    'name' => 'sub_text',
                                    'label' => esc_html__('Sub Title', 'mrittik' ),
                                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                                    'label_block' => true,
                                ),
                            ),
                        ),
                        array(
                            'name' => 'image_first',
                            'label' => esc_html__( 'Image 01', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                             'condition' => [
                                'layout' => ['1']
                            ],
                        ),
                        array(
                            'name' => 'image_second',
                            'label' => esc_html__( 'Image 02', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                             'condition' => [
                                'layout' => ['1']
                            ],
                        ),
                        array(
                            'name' => 'testimonial_2',
                            'label' => esc_html__('Testimonial', 'mrittik'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'condition' => [
                                'layout' => ['2']
                            ],
                            'controls' => array(
                                array(
                                    'name' => 'image_third',
                                    'label' => esc_html__( 'Image', 'mrittik' ),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                ),
                                array(
                                    'name' => 'desc2',
                                    'label' => esc_html__('Description', 'mrittik' ),
                                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                                    'rows' => 10,
                                    'show_label' => false,
                                ),
                                array(
                                    'name' => 'sub_text2',
                                    'label' => esc_html__('Sub Title', 'mrittik' ),
                                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                                    'label_block' => true,
                                ),
                            ),
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
                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--inner' => 'text-align: {{VALUE}};',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_settings_carousel',
                    'label' => esc_html__('Settings', 'mrittik'),
                    'tab' => \Elementor\Controls_Manager::TAB_SETTINGS,
                    'controls' => array(
                        array(
                            'name' => 'col_xs',
                            'label' => esc_html__('Columns XS Devices', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '1',
                            'options' => [
                                'auto' => 'Auto',
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '6' => '6',
                            ],
                        ),
                        array(
                            'name' => 'col_sm',
                            'label' => esc_html__('Columns SM Devices', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '1',
                            'options' => [
                                'auto' => 'Auto',
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '6' => '6',
                            ],
                        ),
                        array(
                            'name' => 'col_md',
                            'label' => esc_html__('Columns MD Devices', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '1',
                            'options' => [
                                'auto' => 'Auto',
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '6' => '6',
                            ],
                        ),
                        array(
                            'name' => 'col_lg',
                            'label' => esc_html__('Columns LG Devices', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '1',
                            'options' => [
                                'auto' => 'Auto',
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '6' => '6',
                            ],
                        ),
                        array(
                            'name' => 'col_xl',
                            'label' => esc_html__('Columns XL Devices', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '1',
                            'options' => [
                                'auto' => 'Auto',
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '5' => '5',
                                '6' => '6',
                            ],
                        ),
                        array(
                            'name' => 'col_xxl',
                            'label' => esc_html__('Columns XXL Devices', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'inherit',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '5' => '5',
                                '6' => '6',
                                'inherit' => 'Inherit',
                            ],
                        ),
                        array(
                            'name' => 'slides_to_scroll',
                            'label' => esc_html__('Slides to scroll', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '1',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '5' => '5',
                                '6' => '6',
                            ],
                        ),
                        array(
                            'name' => 'item_padding',
                            'label' => esc_html__('Item Padding', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'default' => [
                                'top' => '15',
                                'right' => '15',
                                'bottom' => '15',
                                'left' => '15'
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-swiper-container' => 'margin-top: -{{TOP}}{{UNIT}}; margin-right: -{{RIGHT}}{{UNIT}}; margin-bottom: -{{BOTTOM}}{{UNIT}}; margin-left: -{{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .pxl-swiper-container .pxl-swiper-slide' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'control_type' => 'responsive',
                        ),
                        array(
                            'name' => 'arrows',
                            'label' => esc_html__('Show Arrows', 'mrittik'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'false',
                        ),
                        array(
                            'name' => 'arrows_style',
                            'label' => esc_html__('Arrows Style', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'style1' => 'Style 1',
                                'style2' => 'Style 2',
                                'style3' => 'Style 3',
                                'style4' => 'Style 4',
                            ],
                            'default' => 'style1',
                            'condition' => [
                                'arrows' => 'true',
                            ]
                        ),
                        array(
                            'name' => 'arrow_prev_horizontal_orientation',
                            'label' => esc_html__('Arrow Prev Horizontal Orientation', 'mrittik' ),
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
                            'render_type' => 'ui',
                            'separator' => 'before',
                            'condition' => [
                                'arrows' => 'true',
                                'arrows_style' => 'style2',
                            ],
                        ),
                        array(
                            'name' => 'arrow_prev_offset_left',
                            'label' => esc_html__('Arrow Prev Offset Left', 'mrittik' ),
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
                                'unit' => 'px',
                            ],
                            'size_units' => [ 'px', '%', 'vw', 'vh' ],
                            'selectors' => [
                                '{{WRAPPER}} .wp-arrow.style2 .pxl-swiper-arrow.pxl-swiper-arrow-prev' => 'left: {{SIZE}}{{UNIT}}; right: auto;',
                            ],
                            'condition' => [
                                'arrows' => 'true',
                                'arrows_style' => 'style2',
                                'arrow_prev_horizontal_orientation' => 'start',
                            ],
                        ),
                        array(
                            'name' => 'arrow_prev_offset_right',
                            'label' => esc_html__('Arrow Prev Offset Right', 'mrittik' ),
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
                                'unit' => 'px',
                            ],
                            'size_units' => [ 'px', '%', 'vw', 'vh' ],
                            'selectors' => [
                                '{{WRAPPER}} .wp-arrow.style2 .pxl-swiper-arrow.pxl-swiper-arrow-prev' => 'right: {{SIZE}}{{UNIT}}; left: auto;',
                            ],
                            'condition' => [
                                'arrows' => 'true',
                                'arrows_style' => 'style2',
                                'arrow_prev_horizontal_orientation' => 'end',
                            ],
                        ),
                        array(
                            'name' => 'arrow_next_horizontal_orientation',
                            'label' => esc_html__('Arrow Next Horizontal Orientation', 'mrittik' ),
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
                            'render_type' => 'ui',
                            'separator' => 'before',
                            'condition' => [
                                'arrows' => 'true',
                                'arrows_style' => 'style2',
                            ],
                        ),
                        array(
                            'name' => 'arrow_next_offset_left',
                            'label' => esc_html__('Arrow Next Offset Left', 'mrittik' ),
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
                                'unit' => 'px',
                            ],
                            'size_units' => [ 'px', '%', 'vw', 'vh' ],
                            'selectors' => [
                                '{{WRAPPER}} .wp-arrow.style2 .pxl-swiper-arrow.pxl-swiper-arrow-next' => 'left: {{SIZE}}{{UNIT}}; right: auto;',
                            ],
                            'condition' => [
                                'arrows' => 'true',
                                'arrows_style' => 'style2',
                                'arrow_next_horizontal_orientation' => 'start',
                            ],
                        ),
                        array(
                            'name' => 'arrow_next_offset_right',
                            'label' => esc_html__('Arrow Next Offset Right', 'mrittik' ),
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
                                'unit' => 'px',
                            ],
                            'size_units' => [ 'px', '%', 'vw', 'vh' ],
                            'selectors' => [
                                '{{WRAPPER}} .wp-arrow.style2 .pxl-swiper-arrow.pxl-swiper-arrow-next' => 'right: {{SIZE}}{{UNIT}}; left: auto;',
                            ],
                            'condition' => [
                                'arrows' => 'true',
                                'arrows_style' => 'style2',
                                'arrow_next_horizontal_orientation' => 'end',
                            ],
                        ),
                        array(
                            'name' => 'arrow_vertical_orientation',
                            'label' => esc_html__('Arrow Vertical Orientation', 'mrittik' ),
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
                            'render_type' => 'ui',
                            'condition' => [
                                'arrows' => 'true',
                                'arrows_style' => 'style2',
                            ],
                        ),
                        array(
                            'name' => 'arrow_offset_y',
                            'label' => esc_html__('Arrow Offset Y', 'mrittik' ),
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
                                'unit' => 'px',
                            ],
                            'size_units' => [ 'px', '%', 'vw', 'vh' ],
                            'selectors' => [
                                '{{WRAPPER}} .wp-arrow.style2 .pxl-swiper-arrow' => 'top: {{SIZE}}{{UNIT}}; bottom: auto;',
                            ],
                            'condition' => [
                                'arrow_vertical_orientation' => 'start',
                            ],
                        ),
                        array(
                            'name' => 'arrow_offset_y_end',
                            'label' => esc_html__('Arrow Offset Y', 'mrittik' ),
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
                                'unit' => 'px',
                            ],
                            'size_units' => [ 'px', '%', 'vw', 'vh' ],
                            'selectors' => [
                                '{{WRAPPER}} .wp-arrow.style2 .pxl-swiper-arrow' => 'bottom: {{SIZE}}{{UNIT}}; top: auto;',
                            ],
                            'condition' => [
                                'arrow_vertical_orientation' => 'end',
                            ],
                        ),
                        array(
                            'name' => 'pagination',
                            'label' => esc_html__('Show Pagination', 'mrittik'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'false',
                        ),
                        array(
                            'name' => 'pagination_type',
                            'label' => esc_html__('Pagination Type', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'bullets',
                            'options' => [
                                'bullets' => 'Bullets',
                                'fraction' => 'Fraction',
                            ],
                            'condition' => [
                                'pagination' => 'true'
                            ]
                        ),
                        array(
                            'name' => 'pagination_margin',
                            'label' => esc_html__('Pagination Margin', 'mrittik' ),
                            'type' => 'dimensions',
                            'control_type' => 'responsive',
                            'size_units' => [ 'px', '%', 'vw', 'vh' ],
                            'default' => [
                                'unit' => 'px',
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-swiper-dots' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'condition' => [
                                'pagination' => 'true'
                            ]
                        ),
                        array(
                            'name' => 'bullets_color',
                            'label' => esc_html__('Bullets Color', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-swiper-dots .pxl-swiper-pagination-bullet:before' => 'background-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'pagination_type' => 'bullets',
                                'pagination' => 'true'
                            ]
                        ),
                        array(
                            'name' => 'darkmode_bullets_color',
                            'label' => esc_html__('Bullets Color (Dark Mode)', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-swiper-dots .pxl-swiper-pagination-bullet:before' => 'background-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'pagination_type' => 'bullets',
                                'pagination' => 'true'
                            ]
                        ),
                        array(
                            'name' => 'active_bullets_color',
                            'label' => esc_html__('Bullets Color Active', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-swiper-dots .swiper-pagination-bullet-active:before' => 'background-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'pagination_type' => 'bullets',
                                'pagination' => 'true'
                            ]
                        ),
                        array(
                            'name' => 'darkmode_active_bullets_color',
                            'label' => esc_html__('Bullets Color Active (Dark Mode)', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-swiper-dots .swiper-pagination-bullet-active:before' => 'background-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'pagination_type' => 'bullets',
                                'pagination' => 'true'
                            ],
                        ),
                        array(
                            'name' => 'fraction_color',
                            'label' => esc_html__('Fraction Color', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-swiper-dots.pxl-swiper-pagination-fraction' => 'color: {{VALUE}};',
                            ],
                            'condition' => [
                                'pagination_type' => 'fraction',
                                'pagination' => 'true'
                            ]
                        ),
                        array(
                            'name' => 'darkmode_fraction_color',
                            'label' => esc_html__('Fraction Color (Dark Mode)', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-swiper-dots.pxl-swiper-pagination-fraction' => 'color: {{VALUE}};',
                            ],
                            'condition' => [
                                'pagination_type' => 'fraction',
                                'pagination' => 'true'
                            ],
                        ),
                        array(
                            'name' => 'pause_on_hover',
                            'label' => esc_html__('Pause on Hover', 'mrittik'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'separator' => 'before',
                        ),
                        array(
                            'name' => 'autoplay',
                            'label' => esc_html__('Autoplay', 'mrittik'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                        ),
                        array(
                            'name' => 'autoplay_speed',
                            'label' => esc_html__('Autoplay Speed', 'mrittik'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 5000,
                            'condition' => [
                                'autoplay' => 'true'
                            ]
                        ),
                        array(
                            'name' => 'infinite',
                            'label' => esc_html__('Infinite Loop', 'mrittik'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                        ),
                        array(
                            'name' => 'space_between',
                            'label' => esc_html__('Reduce Spacing', 'mrittik'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                            'condition' => [
                                'layout' => ['1']
                            ],
                        ),
                        array(
                            'name' => 'space_between2',
                            'label' => esc_html__('Reduce Spacing', 'mrittik'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                            'condition' => [
                                'layout' => ['2']
                            ],
                        ),
                        array(
                            'name' => 'speed',
                            'label' => esc_html__('Animation Speed', 'mrittik'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 500,
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style',
                    'label' => esc_html__('Style', 'mrittik' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name'  => 'icon_size',
                            'label' => esc_html__( 'Icon Size (px)', 'mrittik' ),
                            'type'  => 'slider',
                            'control_type' => 'responsive',
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--icon i' => 'font-size: {{SIZE}}{{UNIT}};',
                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--icon svg' => 'width: {{VALUE}};',
                            ],
                            'condition' => [
                                'layout' => ['1', '3', '4']
                            ],
                        ),
                        array(
                            'name' => 'icon_color',
                            'label' => esc_html__('Icon Color', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--icon i' => 'color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--icon svg' => 'stroke: {{VALUE}};',
                            ],
                            'condition' => [
                                'layout' => ['1', '3', '4']
                            ],
                        ),
                        array(
                            'name' => 'darkmode_icon_color',
                            'label' => esc_html__('Icon Color (Dark Mode)', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-testimonial-carousel .pxl-item--icon i' => 'color: {{VALUE}};',
                                '.dark-mode {{WRAPPER}} .pxl-testimonial-carousel .pxl-item--icon svg' => 'stroke: {{VALUE}};',
                            ],
                            'condition' => [
                                'layout' => ['1', '3', '4']
                            ],
                        ),
                        array(
                            'name' => 'icon_margin',
                            'label' => esc_html__('Icon Margin (px)', 'mrittik' ),
                            'type' => 'dimensions',
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
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'separator' => 'after',
                            'condition' => [
                                'layout' => ['1', '3', '4']
                            ],
                        ),
                        array(
                            'name' => 'img_size',
                            'label' => esc_html__('Image Size', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'description' => 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Default: 370x300 (Width x Height)).',
                            'condition' => [
                                'layout' => ['2', '3']
                            ],
                        ),
                        array(
                            'name' => 'sub_title_color',
                            'label' => esc_html__('Sub Title Color', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--subtitle' => 'color: {{VALUE}};',
                            ],
                            'condition' => [
                                'layout' => ['1','2']
                            ],
                        ),
                        array(
                            'name' => 'darkmode_sub_title_color',
                            'label' => esc_html__('Sub Title Color (Dark Mode)', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-testimonial-carousel .pxl-item--subtitle' => 'color: {{VALUE}};',
                            ],
                            'condition' => [
                                'layout' => ['1','2']
                            ],
                        ),
                        array(
                            'name' => 'sub_title_typography',
                            'label' => esc_html__('Sub Title Typography', 'mrittik' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--subtitle',
                            'condition' => [
                                'layout' => ['1','2']
                            ],
                        ),
                        array(
                            'name' => 'sub_title_max_width',
                            'label' => esc_html__( 'Sub Title Max Width', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
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
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--subtitle' => 'max-width: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'layout' => ['1']
                            ],
                        ),
                        array(
                            'name' => 'sub_title_margin',
                            'label' => esc_html__('Sub Title Margin', 'mrittik' ),
                            'type' => 'dimensions',
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
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--subtitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'separator' => 'after',
                            'condition' => [
                                'layout' => ['1']
                            ],
                        ),
                        array(
                            'name' => 'title_color',
                            'label' => esc_html__('Title Color', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--title' => 'color: {{VALUE}};',
                            ],
                            'condition' => [
                                'layout' => ['2', '3']
                            ],
                        ),
                        array(
                            'name' => 'darkmode_title_color',
                            'label' => esc_html__('Title Color (Dark Mode)', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-testimonial-carousel .pxl-item--title' => 'color: {{VALUE}};',
                            ],
                            'condition' => [
                                'layout' => ['2', '3']
                            ],
                        ),
                        array(
                            'name' => 'title_typography',
                            'label' => esc_html__('Title Typography', 'mrittik' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--title',
                            'condition' => [
                                'layout' => ['2', '3']
                            ],
                        ),
                        array(
                            'name' => 'title_max_width',
                            'label' => esc_html__( 'Title Max Width', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
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
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--title' => 'max-width: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'layout' => ['2', '3']
                            ],
                        ),
                        array(
                            'name' => 'title_margin',
                            'label' => esc_html__('Title Margin', 'mrittik' ),
                            'type' => 'dimensions',
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
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'separator' => 'after',
                            'condition' => [
                                'layout' => ['2', '3']
                            ],
                        ),
                        array(
                            'name' => 'desc_color',
                            'label' => esc_html__('Description Color', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--desc' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'darkmode_desc_color',
                            'label' => esc_html__('Description Color (Dark Mode)', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-testimonial-carousel .pxl-item--desc' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'desc_typography',
                            'label' => esc_html__('Description Typography', 'mrittik' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--desc',
                        ),
                        array(
                            'name' => 'desc_max_width',
                            'label' => esc_html__( 'Description Max Width', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
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
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--desc' => 'max-width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'desc_margin',
                            'label' => esc_html__('Description Margin', 'mrittik' ),
                            'type' => 'dimensions',
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
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--desc' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'pxl_animate_description',
                            'label' => esc_html__( 'Description Animate', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => mrittik_widget_animate(),
                            'default' => '',
                        ),
                        array(
                            'name' => 'pxl_animate_delay_description',
                            'label' => esc_html__('Description Animate Delay', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => '0',
                            'description' => esc_html__( 'Enter number. Default 0ms', 'mrittik' ),
                        ),
                        array(
                            'name' => 'pxl_animate_duration_description',
                            'label' => esc_html__('Description Animation Duration', 'mrittik'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'min' => 0,
                            'step' => 0.1,
                            'default' => 1.2,
                            'description' => 'Default 1.2s',
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'author_color',
                            'label' => esc_html__('Author Color', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--author' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'darkmode_author_color',
                            'label' => esc_html__('Author Color (Dark Mode)', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-testimonial-carousel .pxl-item--author' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'author_typography',
                            'label' => esc_html__('Author Typography', 'mrittik' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--author',
                        ),
                        array(
                            'name' => 'author_margin',
                            'label' => esc_html__('Author Margin', 'mrittik' ),
                            'type' => 'dimensions',
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
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--author' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'pxl_animate_author',
                            'label' => esc_html__( 'Author Animate', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => mrittik_widget_animate(),
                            'default' => '',
                        ),
                        array(
                            'name' => 'pxl_animate_delay_author',
                            'label' => esc_html__('Author Animate Delay', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => '0',
                            'description' => esc_html__( 'Enter number. Default 0ms', 'mrittik' ),
                        ),
                        array(
                            'name' => 'pxl_animate_duration_author',
                            'label' => esc_html__('Author Animation Duration', 'mrittik'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'min' => 0,
                            'step' => 0.1,
                            'default' => 1.2,
                            'description' => 'Default 1.2s',
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'position_color',
                            'label' => esc_html__('Position Color', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--position' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'darkmode_position_color',
                            'label' => esc_html__('Position Color (Dark Mode)', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-testimonial-carousel .pxl-item--position' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'position_typography',
                            'label' => esc_html__('Position Typography', 'mrittik' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--position',
                        ),
                        array(
                            'name' => 'position_margin',
                            'label' => esc_html__('Position Margin', 'mrittik' ),
                            'type' => 'dimensions',
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
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--position' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'pxl_animate_position',
                            'label' => esc_html__( 'Position Animate', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => mrittik_widget_animate(),
                            'default' => '',
                        ),
                        array(
                            'name' => 'pxl_animate_delay_position',
                            'label' => esc_html__('Position Animate Delay', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => '0',
                            'description' => esc_html__( 'Enter number. Default 0ms', 'mrittik' ),
                        ),
                        array(
                            'name' => 'pxl_animate_duration_position',
                            'label' => esc_html__('Position Animation Duration', 'mrittik'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'min' => 0,
                            'step' => 0.1,
                            'default' => 1.2,
                            'description' => 'Default 1.2s',
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'bg_color',
                            'label' => esc_html__( 'Box Background Color', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--inner, {{WRAPPER}} .pxl-testimonial-carousel .pxl-item--inner:before' => 'background-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'layout' => ['1', '2']
                            ],
                        ),
                        array(
                            'name' => 'darkmode_bg_color',
                            'label' => esc_html__( 'Box Background Color (Dark Mode)', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-testimonial-carousel .pxl-item--inner, .dark-mode {{WRAPPER}} .pxl-testimonial-carousel .pxl-item--inner:before' => 'background-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'layout' => ['1', '2']
                            ],
                        ),
                        array(
                            'name' => 'hover_bg_color',
                            'label' => esc_html__( 'Box Hover Background Color', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--inner:hover, {{WRAPPER}} .pxl-testimonial-carousel .pxl-item--inner:hover:before' => 'background-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'layout' => ['1', '2']
                            ],
                        ),
                        array(
                            'name' => 'darkmode_hover_bg_color',
                            'label' => esc_html__( 'Box Hover Background Color (Dark Mode)', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-testimonial-carousel .pxl-item--inner:hover, .dark-mode {{WRAPPER}} .pxl-testimonial-carousel .pxl-item--inner:hover:before' => 'background-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'layout' => ['1', '2']
                            ],
                        ),
                        array(
                            'name' => 'bg_color3',
                            'label' => esc_html__( 'Background Color', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-swiper-container' => 'background-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'layout' => ['3']
                            ],
                        ),
                        array(
                            'name' => 'darkmode_bg_color3',
                            'label' => esc_html__( 'Background Color (Dark Mode)', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-testimonial-carousel .pxl-swiper-container' => 'background-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'layout' => ['3']
                            ],
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
                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--inner' => 'border-style: {{VALUE}};',
                            ],
                            'condition' => [
                                'layout' => ['1', '2']
                            ],
                        ),
                        array(
                            'name' => 'border_width',
                            'label' => esc_html__( 'Border Width', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'control_type' => 'responsive',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--inner' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'condition' => [
                                'layout' => ['1', '2']
                            ],
                        ),
                        array(
                            'name' => 'box_border_radius',
                            'label' => esc_html__('Border Radius', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
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
                                    'max' => 300,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--inner' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'condition' => [
                                'layout' => ['1', '2']
                            ],
                        ),
                        array(
                            'name' => 'border_color',
                            'label' => esc_html__('Border Color', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--inner' => 'border-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'layout' => ['1', '2']
                            ],
                        ),
                        array(
                            'name' => 'darkmode_border_color',
                            'label' => esc_html__('Border Color (Dark Mode)', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-testimonial-carousel .pxl-item--inner' => 'border-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'layout' => ['1', '2']
                            ],
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'border_color3',
                            'label' => esc_html__('Border Color', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel3:hover .pxl-swiper-container:before' => 'border-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'layout' => ['3']
                            ],
                        ),
                        array(
                            'name' => 'darkmode_border_color3',
                            'label' => esc_html__('Border Color (Dark Mode)', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-testimonial-carousel3:hover .pxl-swiper-container:before' => 'border-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'layout' => ['3']
                            ],
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'box_padding',
                            'label' => esc_html__('Box Padding', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
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
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'carousel_margin',
                            'label' => esc_html__('Carousel Margin', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', 'em', '%', 'rem' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-carousel-inner' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'control_type' => 'responsive',
                        ),
                    ),
                ),
                mrittik_widget_animation_settings()
            ),
        ),
    ),
    mrittik_get_class_widget_path()
);