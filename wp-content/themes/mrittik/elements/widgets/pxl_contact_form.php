<?php
if(class_exists('WPCF7')) {
    $cf7 = get_posts('post_type="wpcf7_contact_form"&numberposts=-1');

    $contact_forms = array();
    if ($cf7) {
        foreach ($cf7 as $cform) {
            $contact_forms[$cform->ID] = $cform->post_title;
        }
    } else {
        $contact_forms[esc_html__('No contact forms found', 'mrittik')] = 0;
    }

    pxl_add_custom_widget(
        array(
            'name' => 'pxl_contact_form',
            'title' => esc_html__('BR Contact Form', 'mrittik'),
            'icon' => 'eicon-form-horizontal',
            'categories' => array('pxltheme-core'),
            'params' => array(
                'sections' => array(
                    array(
                        'name' => 'tab_content',
                        'label' => esc_html__('Content', 'mrittik'),
                        'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                        'controls' => array(
                            array(
                                'name' => 'form_id',
                                'label' => esc_html__('Select Form', 'mrittik'),
                                'type' => \Elementor\Controls_Manager::SELECT,
                                'options' => $contact_forms,
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
                                    '{{WRAPPER}} .pxl-contact-form' => 'max-width: {{SIZE}}{{UNIT}};',
                                ],
                            ),
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
                        ),
                    ),
                    array(
                        'name' => 'tab_style_input',
                        'label' => esc_html__('Input', 'mrittik'),
                        'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                        'controls' => array(
                            array(
                                'name' => 'text_color',
                                'label' => esc_html__('Label Color', 'mrittik' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .wpcf7-form' => 'color: {{VALUE}};',
                                    '{{WRAPPER}} .wpcf7-form label' => 'color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'darkmode_text_color',
                                'label' => esc_html__('Label Color (Dark Mode)', 'mrittik' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '.dark-mode {{WRAPPER}} .wpcf7-form' => 'color: {{VALUE}};',
                                    '.dark-mode {{WRAPPER}} .wpcf7-form label' => 'color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'input_typography',
                                'label' => esc_html__('Input Typography', 'mrittik' ),
                                'type' => \Elementor\Group_Control_Typography::get_type(),
                                'control_type' => 'group',
                                'selector' => '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control:not(.wpcf7-submit), {{WRAPPER}} .pxl-contact-form .pxl-select-higthlight',
                            ),
                            array(
                                'name' => 'input_color',
                                'label' => esc_html__('Input Color', 'mrittik' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control:not(.wpcf7-submit), {{WRAPPER}} .pxl-contact-form .pxl-select-higthlight' => 'color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'darkmode_input_color',
                                'label' => esc_html__('Input Color (Dark Mode)', 'mrittik' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '.dark-mode {{WRAPPER}} .pxl-contact-form .wpcf7-form-control:not(.wpcf7-submit), .dark-mode {{WRAPPER}} .pxl-contact-form .pxl-select-higthlight' => 'color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'input_bg_color',
                                'label' => esc_html__('Background Color', 'mrittik' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control:not(.wpcf7-submit), {{WRAPPER}} .pxl-contact-form .pxl-select-higthlight' => 'background-color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'darkmode_input_bg_color',
                                'label' => esc_html__('Background Color (Dark Mode)', 'mrittik' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '.dark-mode {{WRAPPER}} .pxl-contact-form .wpcf7-form-control:not(.wpcf7-submit), .dark-mode {{WRAPPER}} .pxl-contact-form .pxl-select-higthlight' => 'background-color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'input_padding',
                                'label' => esc_html__('Input Padding', 'mrittik' ),
                                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'vw', 'vh' ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control:not(.wpcf7-submit):not(.wpcf7-textarea), {{WRAPPER}} .pxl-contact-form .pxl-select-higthlight' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                                'control_type' => 'responsive',
                            ),
                            array(
                                'name' => 'input_border_radius',
                                'label' => esc_html__('Border Radius', 'mrittik' ),
                                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                                'control_type' => 'responsive',
                                'size_units' => [ 'px', '%' ],
                                'default' => [
                                    'unit' => '%',
                                ],
                                'range' => [
                                    '%' => [
                                        'min' => 0,
                                        'max' => 100,
                                    ],
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control:not(.wpcf7-submit), {{WRAPPER}} .pxl-contact-form .pxl-select .pxl-select-higthlight' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                            ),
                            array(
                                'name'         => 'input_box_shadow',
                                'label' => esc_html__( 'Box Shadow', 'mrittik' ),
                                'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                'control_type' => 'group',
                                'selector'     => '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control:not(.wpcf7-submit), {{WRAPPER}} .pxl-contact-form .pxl-select .pxl-select-higthlight'
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
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control:not(.wpcf7-submit), {{WRAPPER}} .pxl-contact-form .pxl-select .pxl-select-higthlight' => 'border-style: {{VALUE}} !important;',
                                ],
                            ),
                            array(
                                'name' => 'border_width',
                                'label' => esc_html__( 'Border Width', 'mrittik' ),
                                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control:not(.wpcf7-submit), {{WRAPPER}} .pxl-contact-form .pxl-select .pxl-select-higthlight' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
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
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control:not(.wpcf7-submit), {{WRAPPER}} .pxl-contact-form .pxl-select .pxl-select-higthlight' => 'border-color: {{VALUE}} !important;',
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
                                    '.dark-mode {{WRAPPER}} .pxl-contact-form .wpcf7-form-control:not(.wpcf7-submit), .dark-mode {{WRAPPER}} .pxl-contact-form .pxl-select .pxl-select-higthlight' => 'border-color: {{VALUE}} !important;',
                                ],
                                'condition' => [
                                    'border_type!' => '',
                                ],
                            ),
                            array(
                                'name' => 'input_height',
                                'label' => esc_html__('Input Height', 'mrittik' ),
                                'type' => \Elementor\Controls_Manager::SLIDER,
                                'control_type' => 'responsive',
                                'size_units' => [ 'px', '%', 'vw', 'vh' ],
                                'default' => [
                                    'unit' => 'px',
                                ],
                                'range' => [
                                    'px' => [
                                        'min' => 0,
                                        'max' => 1000,
                                    ],
                                    '%' => [
                                        'min' => 0,
                                        'max' => 100,
                                    ],
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control:not(.wpcf7-submit):not(.wpcf7-textarea), {{WRAPPER}} .pxl-contact-form .pxl-select-higthlight' => 'height: {{SIZE}}{{UNIT}};',
                                ],
                            ),
                            array(
                                'name' => 'textarea_height',
                                'label' => esc_html__('Textarea Height', 'mrittik' ),
                                'type' => \Elementor\Controls_Manager::SLIDER,
                                'control_type' => 'responsive',
                                'size_units' => [ 'px', '%', 'vw', 'vh' ],
                                'default' => [
                                    'unit' => 'px',
                                ],
                                'range' => [
                                    'px' => [
                                        'min' => 0,
                                        'max' => 1000,
                                    ],
                                    '%' => [
                                        'min' => 0,
                                        'max' => 100,
                                    ],
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control.wpcf7-textarea' => 'height: {{SIZE}}{{UNIT}};',
                                ],
                            ),
                            array(
                                'name' => 'textarea_padding',
                                'label' => esc_html__('Padding Textarea', 'mrittik' ),
                                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'vw', 'vh' ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control.wpcf7-textarea' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                                'control_type' => 'responsive',
                            ),
                            array(
                                'name' => 'input_spacer_bottom',
                                'label' => esc_html__('Spacer Bottom (px)', 'mrittik' ),
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
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control-wrap' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                                ],
                            ),
                        ),
                    ),
                    array(
                        'name' => 'tab_style_button',
                        'label' => esc_html__('Button', 'mrittik'),
                        'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                        'controls' => array(
                            array(
                                'name' => 'button_typography',
                                'label' => esc_html__('Button Typography', 'mrittik' ),
                                'type' => \Elementor\Group_Control_Typography::get_type(),
                                'control_type' => 'group',
                                'selector' => '{{WRAPPER}} .pxl-contact-form .wpcf7-submit, {{WRAPPER}} .pxl-contact-form button',
                            ),
                            array(
                                'name' => 'button_color',
                                'label' => esc_html__('Button Color', 'mrittik' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7-submit' => 'color: {{VALUE}};',
                                    '{{WRAPPER}} .pxl-contact-form1 .wpcf7-form .input-filled .wpcf7-submit i' => 'color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'bg_button_color',
                                'label' => esc_html__('Background Color', 'mrittik' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7-submit, {{WRAPPER}} .pxl-contact-form .wpcf7-submit:after' => 'background-color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'bg_button_color_hv',
                                'label' => esc_html__('Background Color Hover', 'mrittik' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7-submit:hover, {{WRAPPER}} .pxl-contact-form .wpcf7-submit:hover:after' => 'background-color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'darkmode_button_color',
                                'label' => esc_html__('Button Color (Dark Mode)', 'mrittik' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '.dark-mode {{WRAPPER}} .pxl-contact-form .wpcf7-submit' => 'color: {{VALUE}};',
                                    '.dark-mode {{WRAPPER}} .pxl-contact-form1 .wpcf7-form .input-filled .wpcf7-submit i' => 'color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'darkmode_bg_button_color',
                                'label' => esc_html__('Background Color (Dark Mode)', 'mrittik' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '.dark-mode {{WRAPPER}} .pxl-contact-form .wpcf7-submit, .dark-mode {{WRAPPER}} .pxl-contact-form .wpcf7-submit:after' => 'background-color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'darkmode_bg_button_color_hv',
                                'label' => esc_html__('Background Color Hover (Dark Mode)', 'mrittik' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '.dark-mode {{WRAPPER}} .pxl-contact-form .wpcf7-submit:hover, .dark-mode {{WRAPPER}} .pxl-contact-form .wpcf7-submit:hover:after' => 'background-color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'button_padding',
                                'label' => esc_html__('Padding', 'mrittik' ),
                                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px' ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7-submit, {{WRAPPER}} .pxl-contact-form button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                                'control_type' => 'responsive',
                            ),
                            array(
                                'name' => 'button_border_radius',
                                'label' => esc_html__('Border Radius', 'mrittik' ),
                                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                                'control_type' => 'responsive',
                                'size_units' => [ 'px', '%' ],
                                'default' => [
                                    'unit' => '%',
                                ],
                                'range' => [
                                    '%' => [
                                        'min' => 0,
                                        'max' => 100,
                                    ],
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7-submit, {{WRAPPER}} .pxl-contact-form button, {{WRAPPER}} .pxl-contact-form .wpcf7-submit:after, {{WRAPPER}} .pxl-contact-form button:after' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                            ),
                            array(
                                'name'         => 'button_box_shadow',
                                'label' => esc_html__( 'Box Shadow', 'mrittik' ),
                                'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                'control_type' => 'group',
                                'selector'     => '{{WRAPPER}} .pxl-contact-form .wpcf7-submit, {{WRAPPER}} .pxl-contact-form button'
                            ),
                        ),
                    ),
                    array(
                        'name' => 'section_style_box',
                        'label' => esc_html__('Box', 'mrittik'),
                        'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                        'controls' => array(
                            array(
                                'name' => 'box_padding',
                                'label' => esc_html__('Box Padding', 'mrittik' ),
                                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'vw', 'vh' ],
                                'selectors' => [
                                    '{{WRAPPER}} .wp-row-ctf7' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                                'control_type' => 'responsive',
                            ),
                            array(
                                'name' => 'bg_color',
                                'label' => esc_html__( 'Background Color', 'mrittik' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .wp-row-ctf7' => 'background-color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'darkmode_bg_color',
                                'label' => esc_html__( 'Background Color (Dark Mode)', 'mrittik' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '.dark-mode {{WRAPPER}} .wp-row-ctf7' => 'background-color: {{VALUE}};',
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
}