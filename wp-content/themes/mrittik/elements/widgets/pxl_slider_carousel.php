<?php
$slides_to_show = range( 1, 10 );
$slides_to_show = array_combine( $slides_to_show, $slides_to_show );

pxl_add_custom_widget(
    array(
        'name' => 'pxl_slider_carousel',
        'title' => esc_html__('BR Slider Carousel', 'mrittik'),
        'icon' => 'eicon-slider-push',
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
                                    'image' => get_template_directory_uri() . '/elements/templates/pxl_slider_carousel/img-layout/layout1.jpg'
                                ],
                                '2' => [
                                    'label' => esc_html__('Layout 2', 'mrittik' ),
                                    'image' => get_template_directory_uri() . '/elements/templates/pxl_slider_carousel/img-layout/layout2.jpg'
                                ],
                                '3' => [
                                    'label' => esc_html__('Layout 3', 'mrittik' ),
                                    'image' => get_template_directory_uri() . '/elements/templates/pxl_slider_carousel/img-layout/layout3.jpg'
                                ],
                                '4' => [
                                    'label' => esc_html__('Layout 4', 'mrittik' ),
                                    'image' => get_template_directory_uri() . '/elements/templates/pxl_slider_carousel/img-layout/layout4.jpg'
                                ],
                                '5' => [
                                    'label' => esc_html__('Layout 5', 'mrittik' ),
                                    'image' => get_template_directory_uri() . '/elements/templates/pxl_slider_carousel/img-layout/layout5.jpg'
                                ],
                                '6' => [
                                    'label' => esc_html__('Layout 6', 'mrittik' ),
                                    'image' => get_template_directory_uri() . '/elements/templates/pxl_slider_carousel/img-layout/layout6.jpg'
                                ],
                                '7' => [
                                    'label' => esc_html__('Layout 7', 'mrittik' ),
                                    'image' => get_template_directory_uri() . '/elements/templates/pxl_slider_carousel/img-layout/layout7.jpg'
                                ],
                                '8' => [
                                    'label' => esc_html__('Layout 8', 'mrittik' ),
                                    'image' => get_template_directory_uri() . '/elements/templates/pxl_slider_carousel/img-layout/layout8.jpg'
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_content_slider7',
                    'label' => esc_html__('Slider', 'mrittik'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'condition' => [
                        'layout' => ['7'],
                    ],
                    'controls' => array(
                        array(
                            'name' => 'sl07_image01_left',
                            'label' => esc_html__( 'Image 01 Left', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                        ),
                        array(
                            'name' => 'sl07_image02_left',
                            'label' => esc_html__( 'Image 02 Left', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                        ),
                        array(
                            'name' => 'sl07_image03_left',
                            'label' => esc_html__( 'Image 03 Left', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'sl07_image01_right',
                            'label' => esc_html__( 'Image 01 Right', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                        ),
                        array(
                            'name' => 'sl07_image02_right',
                            'label' => esc_html__( 'Image 02 Right', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                        ),
                        array(
                            'name' => 'sl07_image03_right',
                            'label' => esc_html__( 'Image 03 Right', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                        ),
                        array(
                            'name' => 'sl07_logo',
                            'label' => esc_html__( 'Logo', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                        ),
                        array(
                            'name' => 'sub_text7',
                            'label' => esc_html__('Sub Title', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'title7',
                            'label' => esc_html__('Title', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::TEXTAREA,
                            'rows' => 10,
                            'show_label' => false,
                        ),
                        array(
                            'name' => 'btn_text7_01',
                            'label' => esc_html__('Button 01 Text', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'placeholder' => esc_html__('Click Here', 'mrittik'),
                        ),
                        array(
                            'name' => 'btn_link7_01',
                            'label' => esc_html__('Button 01 Link', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::URL,
                            'default' => [
                                'url' => '#',
                            ],
                        ),
                        array(
                            'name' => 'btn_text7_02',
                            'label' => esc_html__('Button 02 Text', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'placeholder' => esc_html__('Click Here', 'mrittik'),
                        ),
                        array(
                            'name' => 'btn_link7_02',
                            'label' => esc_html__('Button 02 Link', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::URL,
                            'default' => [
                                'url' => '#',
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
                            'name' => 'slider1',
                            'label' => esc_html__('Slider', 'mrittik'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'condition' => [
                                'layout' => ['1', '2', '4', '8'],
                            ],
                            'controls' => array(
                                array(
                                    'name' => 'image1',
                                    'label' => esc_html__( 'Image Light', 'mrittik' ),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                ),
                                array(
                                    'name' => 'image_dark',
                                    'label' => esc_html__( 'Image Dark', 'mrittik' ),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                ),
                                array(
                                    'name' => 'sub_text1',
                                    'label' => esc_html__('Sub Title', 'mrittik' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'title1',
                                    'label' => esc_html__('Title', 'mrittik' ),
                                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                                    'rows' => 10,
                                    'show_label' => false,
                                ),
                                array(
                                    'name' => 'btn_text1',
                                    'label' => esc_html__('Button Text', 'mrittik' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'placeholder' => esc_html__('VIEW DETAILS', 'mrittik'),
                                ),
                                array(
                                    'name' => 'btn_link1',
                                    'label' => esc_html__('Button Link', 'mrittik' ),
                                    'type' => \Elementor\Controls_Manager::URL,
                                    'default' => [
                                        'url' => '#',
                                    ],
                                ),
                            ),
                            'title_field' => '{{{ title1 }}}',
                        ),
                        array(
                            'name' => 'slider2',
                            'label' => esc_html__('Slider', 'mrittik'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'condition' => [
                                'layout' => ['3'],
                            ],
                            'controls' => array(
                                array(
                                    'name' => 'image2',
                                    'label' => esc_html__( 'Mask Image', 'mrittik' ),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                ),
                                array(
                                    'name' => 'mask_text2',
                                    'label' => esc_html__('Mask Text', 'mrittik' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                    'separator' => 'after',
                                ),
                                array(
                                    'name' => 'title2',
                                    'label' => esc_html__('Title', 'mrittik' ),
                                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                                    'rows' => 10,
                                    'show_label' => false,
                                ),
                                array(
                                    'name' => 'sub_text2',
                                    'label' => esc_html__('Sub Title', 'mrittik' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'btn_text2',
                                    'label' => esc_html__('Button Text', 'mrittik' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'placeholder' => esc_html__('VIEW DETAILS', 'mrittik'),
                                ),
                                array(
                                    'name' => 'btn_link2',
                                    'label' => esc_html__('Button Link', 'mrittik' ),
                                    'type' => \Elementor\Controls_Manager::URL,
                                    'default' => [
                                        'url' => '#',
                                    ],
                                ),
                                array(
                                    'name' => 'show_bg',
                                    'label' => esc_html__('Enable Background', 'mrittik' ),
                                    'type' => \Elementor\Controls_Manager::SWITCHER,
                                    'default' => 'false',
                                ),
                                array(
                                    'name' => 'image2_bg',
                                    'label' => esc_html__( 'Background Image', 'mrittik' ),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                    'condition' => [
                                        'show_bg' => 'true',
                                    ],
                                ),
                                array(
                                    'name' => 'image2_bg_dark',
                                    'label' => esc_html__( 'Background Image Dark', 'mrittik' ),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                    'condition' => [
                                        'show_bg' => 'true',
                                    ],
                                ),
                            ),
                            'title_field' => '{{{ title2 }}}',
                        ),
                        array(
                            'name' => 'slider3',
                            'label' => esc_html__('Slider Above', 'mrittik'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'condition' => [
                                'layout' => '5',
                            ],
                            'controls' => array(
                                array(
                                    'name' => 'image_above',
                                    'label' => esc_html__( 'Image', 'mrittik' ),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                ),
                                array(
                                    'name' => 'img_above_link',
                                    'label' => esc_html__('Image Link', 'mrittik' ),
                                    'type' => \Elementor\Controls_Manager::URL,
                                    'default' => [
                                        'url' => '#',
                                    ],
                                ),
                            ),
                        ),
                        array(
                            'name' => 'slider4',
                            'label' => esc_html__('Slider Below', 'mrittik'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'condition' => [
                                'layout' => '5',
                            ],
                            'controls' => array(
                                array(
                                    'name' => 'image_below',
                                    'label' => esc_html__( 'Image', 'mrittik' ),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                ),
                                array(
                                    'name' => 'img_below_link',
                                    'label' => esc_html__('Image Link', 'mrittik' ),
                                    'type' => \Elementor\Controls_Manager::URL,
                                    'default' => [
                                        'url' => '#',
                                    ],
                                ),
                            ),
                        ),
                        array(
                            'name' => 'title3',
                            'label' => esc_html__('Title', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::TEXTAREA,
                            'rows' => 10,
                            'show_label' => false,
                            'condition' => [
                                'layout' => '5',
                            ],
                        ),
                        array(
                            'name' => 'sub_text3',
                            'label' => esc_html__('Sub Title', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                            'condition' => [
                                'layout' => '5',
                            ],
                        ),
                        array(
                            'name' => 'btn_text3',
                            'label' => esc_html__('Button Text', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'placeholder' => esc_html__('Click Here', 'mrittik'),
                            'condition' => [
                                'layout' => '5',
                            ],
                        ),
                        array(
                            'name' => 'btn_link3',
                            'label' => esc_html__('Button Link', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::URL,
                            'default' => [
                                'url' => '#',
                            ],
                            'condition' => [
                                'layout' => '5',
                            ],
                        ),
                        array(
                            'name' => 'slider6',
                            'label' => esc_html__('Slider', 'mrittik'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'condition' => [
                                'layout' => ['6'],
                            ],
                            'controls' => array(
                                array(
                                    'name' => 'sl06_image01_light',
                                    'label' => esc_html__( 'Image 01 Light', 'mrittik' ),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                ),
                                array(
                                    'name' => 'sl06_image02_light',
                                    'label' => esc_html__( 'Image 02 Light', 'mrittik' ),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                ),
                                array(
                                    'name' => 'sl06_image03_light',
                                    'label' => esc_html__( 'Image 03 Light', 'mrittik' ),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                    'separator' => 'after',
                                ),
                                array(
                                    'name' => 'sl06_image01_dark',
                                    'label' => esc_html__( 'Image 01 Dark', 'mrittik' ),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                ),
                                array(
                                    'name' => 'sl06_image02_dark',
                                    'label' => esc_html__( 'Image 02 Dark', 'mrittik' ),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                ),
                                array(
                                    'name' => 'sl06_image03_dark',
                                    'label' => esc_html__( 'Image 03 Dark', 'mrittik' ),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                ),
                                array(
                                    'name' => 'title6',
                                    'label' => esc_html__('Title', 'mrittik' ),
                                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                                    'rows' => 10,
                                    'show_label' => false,
                                ),
                                array(
                                    'name' => 'sub_text6',
                                    'label' => esc_html__('Sub Title', 'mrittik' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'btn_text6',
                                    'label' => esc_html__('Button Text', 'mrittik' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'placeholder' => esc_html__('Click Here', 'mrittik'),
                                ),
                                array(
                                    'name' => 'btn_link6',
                                    'label' => esc_html__('Button Link', 'mrittik' ),
                                    'type' => \Elementor\Controls_Manager::URL,
                                    'default' => [
                                        'url' => '#',
                                    ],
                                ),
                            ),
                        ),
                        array(
                            'name' => 'img_size',
                            'label' => esc_html__('Image Size', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'description' => 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Default: 370x300 (Width x Height)).',
                            'condition' => [
                                'layout' => ['5', '6'],
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
                                '{{WRAPPER}} .pxl-slider-carousel' => 'text-align: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'carousel_style',
                            'label' => esc_html__('Slider Style', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'style1' => 'Style 1',
                                'style2' => 'Style 2',
                            ],
                            'default' => 'style1',
                            'condition' => [
                                'layout' => ['1', '4'],
                            ],
                        ),
                        array(
                            'name' => 'zoom_effect',
                            'label' => esc_html__('Zoom Effect', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'none' => 'None',
                                '1.1' => '1.1X',
                                '1.6' => '1.6X',
                                '2.4' => '2.4X',
                            ],
                            'default' => 'none',
                            'condition' => [
                                'layout' => ['1'],
                            ],
                        ),
                        array(
                            'name' => 'logo_height',
                            'label' => esc_html__('Height', 'mrittik' ),
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
                            ],
                            'control_type' => 'responsive',
                            'selectors' => [
                                '{{WRAPPER}} .content--wrapper .logo' => 'max-height: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'layout' => ['7'],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_image',
                    'label' => esc_html__('Image', 'mrittik' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'layout' => ['6'],
                    ],
                    'controls' => array(
                        array(
                            'name'  => 'img_size_width',
                            'label' => esc_html__( 'Width', 'mrittik' ),
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
                                '{{WRAPPER}} .content--image' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name'  => 'img_size_height',
                            'label' => esc_html__( 'Height', 'mrittik' ),
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
                                '{{WRAPPER}} .content--image' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_subtitle',
                    'label' => esc_html__('Subtitle', 'mrittik' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'sub_title_color',
                            'label' => esc_html__('Sub Title Color', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-item--subtitle' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'darkmode_sub_title_color',
                            'label' => esc_html__('Sub Title Color (Dark Mode)', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-item--subtitle' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'sub_title_typography',
                            'label' => esc_html__('Sub Title Typography', 'mrittik' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-item--subtitle',
                        ),
                        array(
                            'name' => 'sub_title_max_width',
                            'label' => esc_html__( 'Sub Title Max Width', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
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
                                '{{WRAPPER}} .pxl-item--subtitle' => 'max-width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'sub_title_margin',
                            'label' => esc_html__('Sub Title Margin', 'mrittik' ),
                            'type' => 'dimensions',
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
                                '{{WRAPPER}} .pxl-item--subtitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'separator' => 'after',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_title',
                    'label' => esc_html__('Title', 'mrittik' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name'  => 'line_width',
                            'label' => esc_html__( 'Line Width', 'mrittik' ),
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
                                '{{WRAPPER}} .pxl-item--title:before' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name'  => 'line_height',
                            'label' => esc_html__( 'Line Height', 'mrittik' ),
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
                                '{{WRAPPER}} .pxl-item--title:before' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'line_color',
                            'label' => esc_html__('Line Color', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-item--title:before' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'darkmode_line_color',
                            'label' => esc_html__('Line Color (Dark Mode)', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-item--title:before' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'line_margin',
                            'label' => esc_html__('Line Margin', 'mrittik' ),
                            'type' => 'dimensions',
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
                                '{{WRAPPER}} .pxl-item--title:before' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'title_color',
                            'label' => esc_html__('Title Color', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-item--title' => 'color: {{VALUE}};',
                            ],
                            'separator' => 'before',
                        ),
                        array(
                            'name' => 'darkmode_title_color',
                            'label' => esc_html__('Title Color (Dark Mode)', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-item--title' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'title_typography',
                            'label' => esc_html__('Title Typography', 'mrittik' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-item--title',
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
                                '{{WRAPPER}} .pxl-item--title' => 'max-width: {{SIZE}}{{UNIT}};',
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
                                '{{WRAPPER}} .pxl-item--title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_button',
                    'label' => esc_html__('Button', 'mrittik' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'button_color',
                            'label' => esc_html__('Button Color', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .item--button, {{WRAPPER}} .item--button .btn-text' => 'color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-btn-line .btn-icon .line, {{WRAPPER}} .pxl-btn-line .btn-icon .dot' => 'background-color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-btn-line .btn-icon .circle, {{WRAPPER}} .btn-border-running' => 'border-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'darkmode_button_color',
                            'label' => esc_html__('Button Color (Dark Mode)', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .item--button, .dark-mode {{WRAPPER}} .item--button .btn-text' => 'color: {{VALUE}};',
                                '.dark-mode {{WRAPPER}} .pxl-btn-line .btn-icon .line, .dark-mode {{WRAPPER}} .pxl-btn-line .btn-icon .dot' => 'background-color: {{VALUE}};',
                                '.dark-mode {{WRAPPER}} .pxl-btn-line .btn-icon .circle, .dark-mode {{WRAPPER}} .btn-border-running' => 'border-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'hover_button_color',
                            'label' => esc_html__('Hover Button Color', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .item--button:hover, {{WRAPPER}} .item--button:hover .btn-text' => 'color: {{VALUE}}; text-decoration: underline {{VALUE}};',
                                '{{WRAPPER}} .pxl-btn-line:hover .btn-icon .line, {{WRAPPER}} .pxl-btn-line:hover .btn-icon .dot' => 'background-color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-btn-line:hover .btn-icon .circle, {{WRAPPER}} .btn-border-running' => 'border-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'darkmode_hover_button_color',
                            'label' => esc_html__('Hover Button Color (Dark Mode)', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .item--button:hover, .dark-mode {{WRAPPER}} .item--button:hover .btn-text' => 'color: {{VALUE}}; text-decoration: underline {{VALUE}};',
                                '.dark-mode {{WRAPPER}} .pxl-btn-line:hover .btn-icon .line, .dark-mode {{WRAPPER}} .pxl-btn-line:hover .btn-icon .dot' => 'background-color: {{VALUE}};',
                                '.dark-mode {{WRAPPER}} .pxl-btn-line:hover .btn-icon .circle, .dark-mode {{WRAPPER}} .btn-border-running' => 'border-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'button_typography',
                            'label' => esc_html__('Button Typography', 'mrittik' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .item--button',
                        ),
                        array(
                            'name' => 'button_margin',
                            'label' => esc_html__('Button Text Margin', 'mrittik' ),
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
                                '{{WRAPPER}} .pxl-item--content .btn-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'separator' => 'after',
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
                            'condition' => [
                                'layout' => ['1', '2'],
                            ],
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
                            'condition' => [
                                'layout' => ['1', '2'],
                            ],
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
                            'condition' => [
                                'layout' => ['1', '2'],
                            ],
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
                            'condition' => [
                                'layout' => ['1', '2'],
                            ],
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
                            'condition' => [
                                'layout' => ['1', '2'],
                            ],
                        ),
                        array(
                            'name' => 'content_line_color',
                            'label' => esc_html__('Content Line Color', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .content--line' => 'background-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'layout' => ['6'],
                            ],
                        ),
                        array(
                            'name' => 'darkmode_content_line_color',
                            'label' => esc_html__('Content Line Color (Dark Mode)', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .content--line' => 'background-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'layout' => ['6'],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_grid_line',
                    'label' => esc_html__('Grid Lines', 'mrittik' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'layout' => ['4'],
                    ],
                    'controls' => array(
                        array(
                            'name' => 'show_grid_line',
                            'label' => esc_html__('Show Grid', 'mrittik'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'false',
                        ),
                        array(
                            'name' => 'show_grid_mobile',
                            'label' => esc_html__('Show Grid In Mobile', 'mrittik'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'false',
                            'condition' => [
                                'show_grid_line' => 'true',
                            ],
                        ),
                        array(
                            'name' => 'grid_line_color',
                            'label' => esc_html__('Grid Line Color', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-grid-lines span' => 'background-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'show_grid_line' => 'true',
                            ],
                        ),
                        array(
                            'name' => 'darkmode_grid_line_color',
                            'label' => esc_html__('Grid Line Color (Dark Mode)', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-grid-lines span' => 'background-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'show_grid_line' => 'true',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_box',
                    'label' => esc_html__('Box', 'mrittik' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'content_margin',
                            'label' => esc_html__('Content Margin', 'mrittik' ),
                            'type' => 'dimensions',
                            'control_type' => 'responsive',
                            'size_units' => [ 'px', '%', 'vw', 'vh' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-item--content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'content_max_width',
                            'label' => esc_html__( 'Content Max Width', 'mrittik' ),
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
                                '{{WRAPPER}} .pxl-item--content' => 'max-width: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'layout!' => '3',
                            ],
                        ),
                        array(
                            'name' => 'content_wrapper_max_width',
                            'label' => esc_html__( 'Content Max Width', 'mrittik' ),
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
                                '{{WRAPPER}} .content--wrapper' => 'max-width: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'layout' => ['3', '4'],
                            ],
                        ),
                        array(
                            'name' => 'content_padding',
                            'label' => esc_html__('Content Padding', 'mrittik' ),
                            'type' => 'dimensions',
                            'control_type' => 'responsive',
                            'size_units' => [ 'px', '%', 'vw', 'vh' ],
                            'selectors' => [
                                '{{WRAPPER}} .content--inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'condition' => [
                                'layout!' => '3',
                            ],
                        ),
                        array(
                            'name' => 'content_wrapper_padding',
                            'label' => esc_html__('Content Padding', 'mrittik' ),
                            'type' => 'dimensions',
                            'control_type' => 'responsive',
                            'size_units' => [ 'px', '%', 'vw', 'vh' ],
                            'selectors' => [
                                '{{WRAPPER}} .content--wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'condition' => [
                                'layout' => ['3', '4', '6'],
                            ],
                        ),
                        array(
                            'name' => 'content_bg_color',
                            'label' => esc_html__('Content Background Color', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .content--inner' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'darkmode_content_bg_color',
                            'label' => esc_html__('Content Background Color (Dark Mode)', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .content--inner' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'bg_padding',
                            'label' => esc_html__('Background Padding', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px', '%', 'vw', 'vh' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-item--inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'bg_margin',
                            'label' => esc_html__('Background Margin', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px', '%', 'vw', 'vh' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-item--inner' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'carousel_margin',
                            'label' => esc_html__('Carousel Margin', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', 'em', '%', 'rem' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-carousel-inner' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'control_type' => 'responsive',
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
                                'top' => '0',
                                'right' => '0',
                                'bottom' => '0',
                                'left' => '0'
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
                            'name' => 'arrows_bg_color',
                            'label' => esc_html__('Arrows Background Color', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .wp-arrow.style1 .pxl-swiper-arrow' => 'background-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'arrows' => 'true',
                                'arrows_style' => 'style1',
                            ]
                        ),
                        array(
                            'name' => 'darkmode_arrows_bg_color',
                            'label' => esc_html__('Arrows Background Color (Dark Mode)', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .wp-arrow.style1 .pxl-swiper-arrow' => 'background-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'arrows' => 'true',
                                'arrows_style' => 'style1',
                            ]
                        ),
                        array(
                            'name' => 'arrows_disabled_bg_color',
                            'label' => esc_html__('Arrows Disabled Background Color', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .wp-arrow.style1 .pxl-swiper-arrow.swiper-button-disabled' => 'background-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'arrows' => 'true',
                                'arrows_style' => 'style1',
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
                            'name' => 'center',
                            'label' => esc_html__('Center', 'mrittik'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                        ),
                        array(
                            'name' => 'speed',
                            'label' => esc_html__('Animation Speed', 'mrittik'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 1600,
                        ),
                    ),
                ),
                mrittik_widget_animation_settings()
            ),
        ),
    ),
    mrittik_get_class_widget_path()
);