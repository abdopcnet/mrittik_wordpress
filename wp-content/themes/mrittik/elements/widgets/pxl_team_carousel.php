<?php
$slides_to_show = range( 1, 10 );
$slides_to_show = array_combine( $slides_to_show, $slides_to_show );
pxl_add_custom_widget(
    array(
        'name' => 'pxl_team_carousel',
        'title' => esc_html__('BR Team Carousel', 'mrittik'),
        'icon' => 'eicon-person',
        'categories' => array('pxltheme-core'),
        'scripts' => array(
            'swiper',
            'pxl-swiper'
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'tab_layout',
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
                                    'image' => get_template_directory_uri() . '/elements/templates/pxl_team_carousel/img-layout/layout1.jpg'
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_content',
                    'label' => esc_html__('Content', 'mrittik'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'team',
                            'label' => esc_html__('Content', 'mrittik'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'condition' => [
                                'layout' => '1',
                            ],
                            'controls' => array(
                                array(
                                    'name' => 'image',
                                    'label' => esc_html__('Image', 'mrittik' ),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                ),
                                array(
                                    'name' => 'title',
                                    'label' => esc_html__('Name', 'mrittik'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'position',
                                    'label' => esc_html__('Position', 'mrittik'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                ),
                                array(
                                    'name' => 'link',
                                    'label' => esc_html__('Link', 'mrittik'),
                                    'type' => \Elementor\Controls_Manager::URL,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'social',
                                    'label' => esc_html__( 'Social', 'mrittik' ),
                                    'type' => 'pxl_icons',
                                ),
                            ),
                            'title_field' => '{{{ title }}}',
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_style',
                    'label' => esc_html__('Style', 'mrittik' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'title_color',
                            'label' => esc_html__('Title Color', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-team .pxl-item--title' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'title_typography',
                            'label' => esc_html__('Title Typography', 'mrittik' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-team .pxl-item--title',
                        ),
                        array(
                            'name' => 'position_color',
                            'label' => esc_html__('Position Color', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-team .pxl-item--position' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'position_typography',
                            'label' => esc_html__('Position Typography', 'mrittik' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-team .pxl-item--position',
                        ),
                        array(
                            'name' => 'box_color',
                            'label' => esc_html__('Box Background Color', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-item--meta:before' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'box_min_width',
                            'label' => esc_html__('Box Min Width', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-team .pxl-item--meta' => 'min-width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name'  => 'icon_size',
                            'label' => esc_html__( 'Icon Size (px)', 'mrittik' ),
                            'type'  => 'slider',
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-team .pxl-item--social a' => 'font-size: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'icon_color',
                            'label' => esc_html__('Icon Color', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-team .pxl-item--social a i' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'icon_background_color',
                            'label' => esc_html__('Icon Background Color', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-team .pxl-item--social a' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'box_margin',
                            'label' => esc_html__('Box Margin', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'vw', 'vh' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-carousel-inner' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'control_type' => 'responsive',
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_style_hover',
                    'label' => esc_html__('Style Hover', 'mrittik' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'style',
                            'label' => esc_html__('Hover Image Effect', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'style-circle' => 'Circle',
                                'none' => 'None',
                            ],
                            'default' => 'style-circle',
                        ),
                        array(
                            'name' => 'title_color_hv',
                            'label' => esc_html__('Title Color', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-team .pxl-item--inner:hover .pxl-item--title' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'position_color_hv',
                            'label' => esc_html__('Position Color', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-team .pxl-item--inner:hover .pxl-item--position' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'icon_color_hover',
                            'label' => esc_html__('Icon Color Hover', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-team .pxl-item--social a:hover i' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'icon_background_color_hover',
                            'label' => esc_html__('Icon Background Color Hover', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-team .pxl-item--social a span:before' => 'background-color: {{VALUE}};',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_carousel_settings',
                    'label' => esc_html__('Carousel Settings', 'mrittik'),
                    'tab' => \Elementor\Controls_Manager::TAB_SETTINGS,
                    'controls' => array(
                        array(
                            'name' => 'img_size',
                            'label' => esc_html__('Image Size', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'description' => 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Default: 370x300 (Width x Height)).',
                        ),
                        array(
                            'name' => 'col_xs',
                            'label' => esc_html__('Columns XS Devices', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '1',
                            'options' => [
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
                            'default' => '2',
                            'options' => [
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
                            'default' => '2',
                            'options' => [
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
                            'default' => '3',
                            'options' => [
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
                            'default' => '3',
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
                            'name' => 'pause_on_hover',
                            'label' => esc_html__('Pause on Hover', 'mrittik'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                        ),
                        array(
                            'name' => 'center',
                            'label' => esc_html__('Center', 'mrittik'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'false',
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
                            'name' => 'speed',
                            'label' => esc_html__('Animation Speed', 'mrittik'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 500,
                        ),
                    ),
                ),
                mrittik_widget_animation_settings()
            ),
        ),
    ),
    mrittik_get_class_widget_path()
);