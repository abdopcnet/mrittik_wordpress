<?php
// Register Video Player Widget
pxl_add_custom_widget(
    array(
        'name' => 'pxl_showcase',
        'title' => esc_html__('BR Showcase', 'mrittik' ),
        'icon' => 'eicon-image',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'layout_section',
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
                                    'image' => get_template_directory_uri() . '/elements/templates/pxl_showcase/img-layout/layout1.jpg'
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'content_section',
                    'label' => esc_html__('Content', 'mrittik' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'image',
                            'label' => esc_html__('Image', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                        ),
                        array(
                            'name' => 'darkmode_image',
                            'label' => esc_html__('Image (Dark Mode)', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'btn_text1',
                            'label' => esc_html__('Button Text 1', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                        ),
                        array(
                            'name' => 'link1',
                            'label' => esc_html__('Link 1', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::URL,
                            'placeholder' => esc_html__('https://your-link.com', 'mrittik' ),
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'btn_text2',
                            'label' => esc_html__('Button Text 2', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                        ),
                        array(
                            'name' => 'link2',
                            'label' => esc_html__('Link 2', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::URL,
                            'placeholder' => esc_html__('https://your-link.com', 'mrittik' ),
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'title',
                            'label' => esc_html__('Title', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::TEXTAREA,
                            'label_block' => true,
                            'description' => 'Create highlight text width shortcode: [highlight text="Text Demo"]',
                        ),
                        array(
                            'name' => 'title_link',
                            'label' => esc_html__('Title Link', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::URL,
                            'placeholder' => esc_html__('https://your-link.com', 'mrittik' ),
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'notification',
                            'label' => esc_html__('Show Notification', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'false',
                        ),
                        array(
                            'name' => 'notification_label',
                            'label' => esc_html__('Notification Text', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'condition' => [
                                'notification' => 'true',
                            ],
                        ),
                        array(
                            'name'         => 'active',
                            'label'        => esc_html__( 'Active', 'mrittik' ),
                            'type'         => 'choose',
                            'control_type' => 'responsive',
                            'options' => [
                                'active' => [
                                    'title' => esc_html__( 'Active', 'mrittik' ),
                                    'icon' => 'eicon-plus',
                                ],
                                'inactive' => [
                                    'title' => esc_html__( 'Inactive', 'mrittik' ),
                                    'icon' => 'eicon-editor-close',
                                ],
                            ],
                            'default' => 'active',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-anchor-wrap' => 'justify-content: {{VALUE}};',
                            ],
                            'prefix_class' => 'pxl-showcase-'
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style',
                    'label' => esc_html__('Style', 'mrittik' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'scroll_effect',
                            'label' => esc_html__('Scroll Effect', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'false',
                        ),
                        array(
                            'name' => 'img_size',
                            'label' => esc_html__( 'Image Size', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'description' => esc_html__('Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height).', 'mrittik' ),
                        ),
                        array(
                            'name' => 'img_height',
                            'label' => esc_html__( 'Image Height', 'mrittik' ),
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
                                '{{WRAPPER}} .pxl-showcase .item--image' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'img_brightness',
                            'label' => esc_html__('Image Brightness', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ '%', '%' ],
                            'default' => [
                                'unit' => '%',
                            ],
                            'range' => [
                                '%' => [
                                    'min' => 0,
                                    'max' => 200,
                                ],
                            ],
                            'control_type' => 'responsive',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-showcase .item--image img' => '-webkit-filter: brightness({{SIZE}}{{UNIT}}); filter: brightness({{SIZE}}{{UNIT}});',
                            ],
                        ),
                        array(
                            'name' => 'img_margin',
                            'label' => esc_html__('Image Margin', 'mrittik' ),
                            'type' => 'dimensions',
                            'size_units' => [ 'px', '%', 'vw', 'vh' ],
                            'control_type' => 'responsive',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-showcase .pxl-item--image' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'button_color',
                            'label' => esc_html__('Button Color', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-showcase .item--link' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'darkmode_button_color',
                            'label' => esc_html__('Button Color (Dark Mode)', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-showcase .item--link' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'button_bg_color',
                            'label' => esc_html__('Button Background Color', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-showcase .item--link' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'darkmode_button_bg_color',
                            'label' => esc_html__( 'Button Background Color (Dark Mode)', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-showcase .item--link' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'button_typography',
                            'label' => esc_html__('Button Typography', 'mrittik' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-showcase .item--link',
                        ),
                        array(
                            'name' => 'button_min_width',
                            'label' => esc_html__('Button Min Width', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'description' => esc_html__('Enter number.', 'mrittik' ),
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
                                '{{WRAPPER}} .pxl-showcase .item--link' => 'min-width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'button_space',
                            'label' => esc_html__('Button Space', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'description' => esc_html__('Enter number.', 'mrittik' ),
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
                                '{{WRAPPER}} .pxl-showcase .item--link + .item--link' => 'margin-top: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'noti_color',
                            'label' => esc_html__('Notification Color', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-showcase .notification' => 'color: {{VALUE}};',
                            ],
                            'condition' => [
                                'notification' => 'true',
                            ],
                            'separator' => 'before',
                        ),
                        array(
                            'name' => 'darkmode_noti_color',
                            'label' => esc_html__('Notification Color (Dark Mode)', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-showcase .notification' => 'color: {{VALUE}};',
                            ],
                            'condition' => [
                                'notification' => 'true',
                            ],
                        ),
                        array(
                            'name' => 'noti_bg_color',
                            'label' => esc_html__('Notification Background Color', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-showcase .notification' => 'background-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'notification' => 'true',
                            ],
                        ),
                        array(
                            'name' => 'darkmode_noti_bg_color',
                            'label' => esc_html__( 'Notification Background Color (Dark Mode)', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-showcase .notification' => 'background-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'notification' => 'true',
                            ],
                        ),
                        array(
                            'name' => 'noti_typography',
                            'label' => esc_html__('Notification Typography', 'mrittik' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-showcase .notification',
                            'condition' => [
                                'notification' => 'true',
                            ],
                        ),
                        array(
                            'name' => 'title_color',
                            'label' => esc_html__( 'Title Color', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-showcase .pxl-item--title, {{WRAPPER}} .pxl-showcase .pxl-item--title a' => 'color: {{VALUE}};',
                            ],
                            'separator' => 'before',
                        ),
                        array(
                            'name' => 'darkmode_title_color',
                            'label' => esc_html__( 'Title Color (Dark Mode)', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-showcase .pxl-item--title, .dark-mode {{WRAPPER}} .pxl-showcase .pxl-item--title a' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'hover_title_color',
                            'label' => esc_html__( 'Hover Title Color', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-showcase .pxl-item--title a:hover' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'darkmode_hover_title_color',
                            'label' => esc_html__( 'Hover Title Color (Dark Mode)', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-showcase .pxl-item--title a:hover' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'title_typography',
                            'label' => esc_html__('Title Typography', 'mrittik' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-showcase .pxl-item--title, {{WRAPPER}} .pxl-showcase .pxl-item--title a',
                        ),
                        array(
                            'name' => 'title_margin',
                            'label' => esc_html__('Title Margin', 'mrittik' ),
                            'type' => 'dimensions',
                            'size_units' => [ 'px', '%', 'vw', 'vh' ],
                            'control_type' => 'responsive',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-showcase .pxl-item--title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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