<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_post_details',
        'title' => esc_html__('BR Post Details', 'mrittik'),
        'icon' => 'eicon-library-upload',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'mrittik'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'title',
                            'label' => esc_html__('Title', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                        ),
                        array(
                            'name' => 'items',
                            'label' => esc_html__('Content', 'mrittik'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'content_type',
                                    'label' => esc_html__('Content Type', 'mrittik' ),
                                    'type' => \Elementor\Controls_Manager::SELECT,
                                    'options' => [
                                        'text' => 'Text',
                                        'author' => 'Author',
                                        'date' => 'Date',
                                        'category' => 'Category',
                                        'tag' => 'Tags',
                                    ],
                                    'default' => 'text',
                                ),
                                array(
                                    'name' => 'label',
                                    'label' => esc_html__('Label', 'mrittik' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                ),
                                array(
                                    'name' => 'content',
                                    'label' => esc_html__('Content', 'mrittik' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                    'condition' => [
                                        'content_type' => ['text'],
                                    ],
                                ),
                                array(
                                    'name' => 'post_type',
                                    'label' => esc_html__('Post Type', 'mrittik' ),
                                    'type' => \Elementor\Controls_Manager::SELECT,
                                    'options' => [
                                        'post' => 'Blog',
                                        'service' => 'Service',
                                        'portfolio' => 'Portfolio',
                                    ],
                                    'default' => 'post',
                                    'condition' => [
                                        'content_type' => ['category', 'tag'],
                                    ],
                                ),
                            ),
                            'title_field' => '{{{ label }}}',
                        ),
                        array(
                            'name' => 'social_share',
                            'label' => esc_html__('Social Share', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'yes' => 'Yes',
                                'no' => 'No',
                            ],
                            'default' => 'yes',
                        ),
                        array(
                            'name' => 'social_label',
                            'label' => esc_html__('Social Label', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'condition' => [
                                'social_share' => 'yes',
                            ],
                        ),
                        array(
                            'name' => 'social_facebook',
                            'label' => esc_html__('Social Facebook', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'yes' => 'Yes',
                                'no' => 'No',
                            ],
                            'default' => 'yes',
                            'condition' => [
                                'social_share' => 'yes',
                            ],
                        ),
                        array(
                            'name' => 'social_twitter',
                            'label' => esc_html__('Social Twitter', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'yes' => 'Yes',
                                'no' => 'No',
                            ],
                            'default' => 'yes',
                            'condition' => [
                                'social_share' => 'yes',
                            ],
                        ),
                        array(
                            'name' => 'social_pinterest',
                            'label' => esc_html__('Social Pinterest', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'yes' => 'Yes',
                                'no' => 'No',
                            ],
                            'default' => 'yes',
                            'condition' => [
                                'social_share' => 'yes',
                            ],
                        ),
                        array(
                            'name' => 'social_linkedin',
                            'label' => esc_html__('Social Linkedin', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'yes' => 'Yes',
                                'no' => 'No',
                            ],
                            'default' => 'yes',
                            'condition' => [
                                'social_share' => 'yes',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style',
                    'label' => esc_html__('Style', 'mrittik' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'sub_color',
                            'label' => esc_html__('Sub Title Color', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl--item label' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'sub_typography',
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl--item label',
                        ),
                        array(
                            'name' => 'sub_spacer_bottom',
                            'label' => esc_html__('Sub Title Spacer Bottom', 'mrittik' ),
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
                                '{{WRAPPER}} .pxl--item label' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'title_color',
                            'label' => esc_html__('Title Color', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl--item .item--content' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'link_color',
                            'label' => esc_html__('Link Color', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl--item .item--content a' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'link_color_hover',
                            'label' => esc_html__('Link Color Hover', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl--item .item--content a:hover' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'title_typography',
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl--item .item--content',
                        ),
                        array(
                            'name' => 'border_color',
                            'label' => esc_html__('Border Color', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl--item + .pxl--item' => 'border-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'item_spacer',
                            'label' => esc_html__('Item Spacer', 'mrittik' ),
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
                                '{{WRAPPER}} .pxl--item + .pxl--item' => 'margin-top: {{SIZE}}{{UNIT}}; padding-top: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'box_bg_color',
                            'label' => esc_html__('Box Background Color', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post-detail' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'box_padding',
                            'label' => esc_html__('Box Padding', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post-detail' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'control_type' => 'responsive',
                        ),
                        array(
                            'name' => 'box_border_radius',
                            'label' => esc_html__('Box Border Radius', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post-detail' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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