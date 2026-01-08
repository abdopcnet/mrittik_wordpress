<?php
add_action( 'elementor/element/section/section_structure/after_section_end', 'mrittik_add_custom_section_controls' );
add_action( 'elementor/element/column/layout/after_section_end', 'mrittik_add_custom_columns_controls' );
function mrittik_add_custom_section_controls( \Elementor\Element_Base $element) {

	$element->start_controls_section(
		'section_pxl',
		[
			'label' => esc_html__( 'Mrittik Settings', 'mrittik' ),
			'tab' => \Elementor\Controls_Manager::TAB_LAYOUT,
		]
	);

	$element->add_responsive_control(
		'pxl_section_margin',
		[
			'label' => esc_html__( 'Section Container Margin', 'mrittik' ),
			'type' => \Elementor\Controls_Manager::DIMENSIONS,
			'size_units' => [ 'px', '%', 'vw', 'vh' ],
			'selectors' => [
				'{{WRAPPER}} > .elementor-container' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
			],
		]
	);

	$element->add_control(
		'pxl_section_offset',
		[
			'label' => esc_html__( 'Section Offset', 'mrittik' ),
			'type'         => \Elementor\Controls_Manager::SELECT,
			'prefix_class' => 'pxl-section-offset-',
			'hide_in_inner' => true,
			'options'      => array(
				'none'    => esc_html__( 'None', 'mrittik' ),
				'left'   => esc_html__( 'Left', 'mrittik' ),
				'right'     => esc_html__( 'Right', 'mrittik' ),
			),
			'default'      => 'none',
			'condition' => [
				'layout' => 'full_width'
			]
		]
	);

	$element->add_control(
		'pxl_container_width',
		[
			'label' => esc_html__( 'Container Width', 'mrittik' ),
			'type'         => \Elementor\Controls_Manager::SELECT,
			'prefix_class' => 'pxl-container-width-',
			'hide_in_inner' => true,
			'options'      => array(
				'container-1200'    => esc_html__( '1200px', 'mrittik' ),
				'container-1400'    => esc_html__( '1400px', 'mrittik' ),
				'container-925'    => esc_html__( '925px', 'mrittik' )
			),
			'default'      => 'container-1200',
			'condition' => [
				'layout' => 'full_width',
				'pxl_section_offset!' => 'none'
			]
		]
	);

	$element->add_control(
		'row_scroll_fixed',
		[
	        'label'   => esc_html__( 'Row Scroll - Column Fixed', 'mrittik' ),
            'type'    => \Elementor\Controls_Manager::SELECT,
            'options' => array(
                'none'        => esc_html__( 'No', 'mrittik' ),
                'fixed'   => esc_html__( 'Yes', 'mrittik' ),
            ),
            'prefix_class' => 'pxl-row-scroll-',
            'default'      => 'none',
		]
	);

	$element->add_responsive_control(
		'pxl_section_border',
		[
	        'label'   => esc_html__( 'Border Type', 'mrittik' ),
            'type'    => \Elementor\Controls_Manager::SELECT,
            'options' => array(
            	'' 		 => esc_html__( 'None', 'mrittik' ),
            	'solid'  => esc_html__( 'Solid', 'mrittik' ),
            	'double' => esc_html__( 'Double', 'mrittik' ),
            	'dotted' => esc_html__( 'Dotted', 'mrittik' ),
            	'dashed' => esc_html__( 'Dashed', 'mrittik' ),
            	'groove' => esc_html__( 'Groove', 'mrittik' ),
            ),
            'default'    => '',
            'selectors' => [
            	'{{WRAPPER}}' => 'border-style: {{VALUE}};',
            ],
            'separator'    => 'before',
		]
	);

	$element->add_responsive_control(
		'pxl_section_border_width',
		[
	        'label'   => esc_html__( 'Border Width', 'mrittik' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
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
            'selectors' => [
            	'{{WRAPPER}}' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'condition' => [
            	'pxl_section_border!' => '',
            ],
		]
	);

	$element->add_responsive_control(
		'pxl_section_border_light',
		[
	        'label'   	=> esc_html__( 'Border Color - Light', 'mrittik' ),
            'type' 	  	=> \Elementor\Controls_Manager::COLOR,
            'selectors' => [
            	'{{WRAPPER}}' => 'border-color: {{VALUE}};',
            ],
            'condition' => [
                'pxl_section_border!' => '',
            ],
		]
	);

	$element->add_responsive_control(
		'pxl_section_border_dark',
		[
	        'label'   	=> esc_html__( 'Border Color - Dark', 'mrittik' ),
            'type' 	  	=> \Elementor\Controls_Manager::COLOR,
            'selectors' => [
            	'.dark-mode {{WRAPPER}}' => 'border-color: {{VALUE}};',
            ],
            'condition' => [
                'pxl_section_border!' => '',
            ],
		]
	);

	$element->add_control(
		'pxl_grid_line',
		[
			'label'   => esc_html__( 'Show Grid', 'mrittik' ),
            'type'    => \Elementor\Controls_Manager::SELECT,
            'options' => array(
                'none'     => esc_html__( 'No', 'mrittik' ),
                'yes'      => esc_html__( 'Yes', 'mrittik' ),
            ),
            'prefix_class' => 'pxl-show-grid-',
            'default'      => 'none',
            'separator'    => 'before',
		]
	);

	$element->add_control(
		'pxl_grid_line_mobile',
		[
			'label'   => esc_html__( 'Show Grid In Mobile', 'mrittik' ),
            'type'    => \Elementor\Controls_Manager::SELECT,
            'options' => array(
                'none'     => esc_html__( 'No', 'mrittik' ),
                'yes'      => esc_html__( 'Yes', 'mrittik' ),
            ),
            'prefix_class' => 'pxl-grid-mobile-',
            'default'      => 'none',
            'condition' => [
                'pxl_grid_line' => ['yes'],
            ],
		]
	);

	$element->add_control(
		'grid_bg_light',
		[
	        'label'   	=> esc_html__( 'Grid Color - Light', 'mrittik' ),
            'type' 	  	=> \Elementor\Controls_Manager::COLOR,
            'selectors' => [
            	'{{WRAPPER}} .pxl-grid-lines span' => 'background-color: {{VALUE}};',
            ],
            'condition' => [
                'pxl_grid_line' => ['yes'],
            ],
		]
	);

	$element->add_control(
		'grid_bg_dark',
		[
	        'label'   	=> esc_html__( 'Grid Color - Dark', 'mrittik' ),
            'type' 	  	=> \Elementor\Controls_Manager::COLOR,
            'selectors' => [
            	'.dark-mode {{WRAPPER}} .pxl-grid-lines span' => 'background-color: {{VALUE}};',
            ],
            'condition' => [
                'pxl_grid_line' => ['yes'],
            ],
		]
	);

	$element->add_control(
		'grid_dot_light_color_a',
		[
	        'label'   	=> esc_html__( 'Grid Dot Color One - Light', 'mrittik' ),
            'type' 	  	=> \Elementor\Controls_Manager::COLOR,
            'condition' => [
                'pxl_grid_line' => ['yes'],
            ],
		]
	);

	$element->add_control(
		'grid_dot_light_color_b',
		[
	        'label'   	=> esc_html__( 'Grid Dot Color Two - Light', 'mrittik' ),
            'type' 	  	=> \Elementor\Controls_Manager::COLOR,
            'selectors' => [
            	'{{WRAPPER}} .pxl-grid-lines span:before' => 'background: linear-gradient(0deg, {{grid_dot_light_color_a.VALUE}} 0%, {{grid_dot_light_color_b.VALUE}} 100%);',
            ],
            'condition' => [
                'pxl_grid_line' => ['yes'],
            ],
		]
	);

	$element->add_control(
		'grid_dot_dark_color_a',
		[
	        'label'   	=> esc_html__( 'Grid Dot Color One - Dark', 'mrittik' ),
            'type' 	  	=> \Elementor\Controls_Manager::COLOR,
            'condition' => [
                'pxl_grid_line' => ['yes'],
            ],
		]
	);

	$element->add_control(
		'grid_dot_dark_color_b',
		[
	        'label'   	=> esc_html__( 'Grid Dot Color Two - Dark', 'mrittik' ),
            'type' 	  	=> \Elementor\Controls_Manager::COLOR,
            'selectors' => [
            	'.dark-mode {{WRAPPER}} .pxl-grid-lines span:before' => 'background: linear-gradient(0deg, {{grid_dot_dark_color_a.VALUE}} 0%, {{grid_dot_dark_color_b.VALUE}} 100%);',
            ],
            'condition' => [
                'pxl_grid_line' => ['yes'],
            ],
		]
	);

	$element->add_control(
		'pxl_section_bg',
		[
			'label'   => esc_html__( 'Background Type', 'mrittik' ),
            'type'    => \Elementor\Controls_Manager::SELECT,
            'options' => array(
                'none'     => esc_html__( 'No', 'mrittik' ),
                'normal'   => esc_html__( 'Normal', 'mrittik' ),
                'overlay'  => esc_html__( 'Overlay', 'mrittik' ),
                'scroll'   => esc_html__( 'Scroll', 'mrittik' ),
                'parallax' => esc_html__( 'Parallax', 'mrittik' ),
            ),
            'prefix_class' => 'pxl-section-bg-',
            'default'      => 'none',
            'separator'    => 'before',
		]
	);

	$element->add_control(
		'pxl_section_bg_light',
		[
	        'label'   	=> esc_html__( 'Background - Light', 'mrittik' ),
            'type' 	  	=> \Elementor\Controls_Manager::COLOR,
            'selectors' => [
            	'{{WRAPPER}}' => 'background-color: {{VALUE}};',
            ],
            'condition' => [
                'pxl_section_bg' => ['normal'],
            ],
		]
	);

	$element->add_control(
		'pxl_section_bg_dark',
		[
	        'label'   	=> esc_html__( 'Background - Dark', 'mrittik' ),
            'type' 	  	=> \Elementor\Controls_Manager::COLOR,
            'selectors' => [
            	'.dark-mode {{WRAPPER}}' => 'background-color: {{VALUE}};',
            ],
            'condition' => [
                'pxl_section_bg' => ['normal'],
            ],
		]
	);

	$element->add_control(
		'pxl_section_overlay_light',
		[
	        'label'   	=> esc_html__( 'Background Overlay - Light', 'mrittik' ),
            'type' 	  	=> \Elementor\Controls_Manager::COLOR,
            'selectors' => [
            	'{{WRAPPER}}:before' => 'background-color: {{VALUE}};',
            ],
            'condition' => [
                'pxl_section_bg' => ['overlay'],
            ],
		]
	);

	$element->add_control(
		'pxl_section_overlay_dark',
		[
	        'label'   	=> esc_html__( 'Background Overlay - Dark', 'mrittik' ),
            'type' 	  	=> \Elementor\Controls_Manager::COLOR,
            'selectors' => [
            	'.dark-mode {{WRAPPER}}:before' => 'background-color: {{VALUE}};',
            ],
            'condition' => [
                'pxl_section_bg' => ['overlay'],
            ],
		]
	);

	$element->add_control(
		'pxl_scroll_bg_img',
		[
			'label' => esc_html__( 'Scroll Background Image - Light', 'mrittik' ),
			'type' => \Elementor\Controls_Manager::MEDIA,
			'selectors' => [
				'{{WRAPPER}} .pxl-elementor-bg-scroll .scroll-element' => 'background-image: url( {{URL}} );',
			],
			'condition' => [
                'pxl_section_bg' => ['scroll'],
            ],
		]
	);

	$element->add_control(
		'pxl_scroll_bg_img_dark',
		[
	        'label'   	=> esc_html__( 'Scroll Background Image - Dark', 'mrittik' ),
            'type' => \Elementor\Controls_Manager::MEDIA,
			'selectors' => [
				'.dark-mode {{WRAPPER}} .pxl-elementor-bg-scroll .scroll-element' => 'background-image: url( {{URL}} );',
			],
			'condition' => [
                'pxl_section_bg' => ['scroll'],
            ],
		]
	);

	$element->add_control(
		'pxl_parallax_bg_img',
		[
			'label' => esc_html__( 'Parallax Background Image - Light', 'mrittik' ),
			'type' => \Elementor\Controls_Manager::MEDIA,
			'selectors' => [
				'{{WRAPPER}} .pxl-elementor-bg-parallax .parallax-element' => 'background-image: url( {{URL}} );',
			],
			'condition' => [
                'pxl_section_bg' => ['parallax'],
            ],
		]
	);

	$element->add_control(
		'pxl_parallax_bg_img_dark',
		[
			'label' => esc_html__( 'Parallax Background Image - Dark', 'mrittik' ),
			'type' => \Elementor\Controls_Manager::MEDIA,
			'selectors' => [
				'.dark-mode {{WRAPPER}} .pxl-elementor-bg-parallax .parallax-element' => 'background-image: url( {{URL}} );',
			],
			'condition' => [
                'pxl_section_bg' => ['parallax'],
            ],
		]
	);

	$element->add_control(
		'pxl_section_grid_ani',
		[
			'label'   => esc_html__( 'Grid Background Animation', 'mrittik' ),
            'type' 	  => \Elementor\Controls_Manager::SWITCHER,
            'default' => 'false',
            'prefix_class' => 'pxl-section-grid-bg-',
            'separator'    => 'before',
		]
	);

	$element->add_control(
		'pxl_section_grid_ani_keep',
		[
			'label'   => esc_html__( 'Keep Grid Animation On Hover', 'mrittik' ),
            'type' 	  => \Elementor\Controls_Manager::SWITCHER,
            'default' => 'false',
            'prefix_class' => 'pxl-section-grid-keep-',
            'condition' => [
                'pxl_section_grid_ani' => ['yes'],
            ],
		]
	);

	$element->add_control(
		'pxl_section_grid_anicl_light',
		[
	        'label'   	=> esc_html__( 'Grid Color - Light', 'mrittik' ),
            'type' 	  	=> \Elementor\Controls_Manager::COLOR,
            'selectors' => [
            	'{{WRAPPER}} .pxl-elementor-grid-ani:after' => 'background-image: radial-gradient({{VALUE}} 1px, transparent 1px);',
            	'{{WRAPPER}} .pxl-elementor-grid-ani .grid-element:before' => 'background-image: radial-gradient({{VALUE}} 3px, transparent 3px);',
            	'{{WRAPPER}} .pxl-elementor-grid-ani .grid-element:after' => 'background-image: radial-gradient({{VALUE}} 2px, transparent 2px);',
            ],
            'condition' => [
                'pxl_section_grid_ani' => ['yes'],
            ],
		]
	);

	$element->add_control(
		'pxl_section_grid_anicl_dark',
		[
	        'label'   	=> esc_html__( 'Grid Color - Dark', 'mrittik' ),
            'type' 	  	=> \Elementor\Controls_Manager::COLOR,
            'selectors' => [
            	'.dark-mode {{WRAPPER}} .pxl-elementor-grid-ani:after' => 'background-image: radial-gradient({{VALUE}} 1px, transparent 1px);',
            	'.dark-mode {{WRAPPER}} .pxl-elementor-grid-ani .grid-element:before' => 'background-image: radial-gradient({{VALUE}} 3px, transparent 3px);',
            	'.dark-mode {{WRAPPER}} .pxl-elementor-grid-ani .grid-element:after' => 'background-image: radial-gradient({{VALUE}} 2px, transparent 2px);',
            ],
            'condition' => [
                'pxl_section_grid_ani' => ['yes'],
            ],
		]
	);

	$element->end_controls_section();
};

add_filter( 'pxl_section_start_render', 'mrittik_custom_section_start_render', 10, 3 );
function mrittik_custom_section_start_render($html, $settings, $el){

	if(!empty($settings['pxl_scroll_bg_img']['url']) || !empty($settings['pxl_scroll_bg_img_dark']['url'])){
		$html .= '<div class="pxl-elementor-bg-scroll"><div class="scroll-element" data-parallax=\'{"y": -20}\'></div></div>';
	}
	if(!empty($settings['pxl_parallax_bg_img']['url']) || !empty($settings['pxl_parallax_bg_img_dark']['url'])){
        $html .= '<div class="pxl-elementor-bg-parallax"><div class="parallax-element"></div></div>';
    }

	return $html;
}

function mrittik_add_custom_columns_controls( \Elementor\Element_Base $element) {
	$element->start_controls_section(
		'columns_pxl',
		[
			'label' => esc_html__( 'Mrittik Settings', 'mrittik' ),
			'tab' => \Elementor\Controls_Manager::TAB_LAYOUT,
		]
	);

	$element->add_control(
		'col_sticky',
		[
            'label'   => esc_html__( 'Column Sticky', 'mrittik' ),
			'type'    => \Elementor\Controls_Manager::SELECT,
			'options' => array(
				'none'           => esc_html__( 'No', 'mrittik' ),
				'sticky' => esc_html__( 'Yes', 'mrittik' ),
            ),
            'default' => 'none',
            'prefix_class' => 'pxl-column-'
		]
	);

	$element->add_control(
		'pxl_col_bg_light',
		[
	        'label'   	=> esc_html__( 'Column Background - Light', 'mrittik' ),
            'type' 	  	=> \Elementor\Controls_Manager::COLOR,
            'selectors' => [
            	'{{WRAPPER}}' => 'background-color: {{VALUE}};',
            ],
		]
	);

	$element->add_control(
		'pxl_col_bg_dark',
		[
	        'label'   	=> esc_html__( 'Column Background - Dark', 'mrittik' ),
            'type' 	  	=> \Elementor\Controls_Manager::COLOR,
            'selectors' => [
            	'.dark-mode {{WRAPPER}}' => 'background-color: {{VALUE}};',
            ],
		]
	);

	$element->end_controls_section();
}


add_action( 'elementor/element/after_add_attributes', 'mrittik_custom_el_attributes', 10, 1 );
function mrittik_custom_el_attributes($el){
    if( 'section' !== $el->get_name() ) {
        return;
    }
    $settings = $el->get_settings();

    $_animation = ! empty( $settings['_animation'] );
    $animation = ! empty( $settings['animation'] );
    $has_animation = $_animation && 'none' !== $settings['_animation'] || $animation && 'none' !== $settings['animation'];

    if ( $has_animation ) {
    	$is_static_render_mode = \Elementor\Plugin::$instance->frontend->is_static_render_mode();

    	if ( ! $is_static_render_mode ) {
    		$el->add_render_attribute( '_wrapper', 'class', 'pxl-elementor-animate' );
    	}
    }
}

add_action( 'elementor/element/column/layout/before_section_end', 'add_responsive_column_order', 10, 3 );
function add_responsive_column_order( $element, $args ) {
	$element->add_responsive_control(
		'responsive_column_order',
		[
			'label'   => esc_html__( 'Column Order', 'mrittik' ),
			'type' => \Elementor\Controls_Manager::NUMBER,
			'separator' => 'before',
			'selectors' => [
				'{{WRAPPER}}' => '-webkit-order: {{VALUE}}; -ms-flex-order: {{VALUE}}; order: {{VALUE}};',
			],
		]
	);
}