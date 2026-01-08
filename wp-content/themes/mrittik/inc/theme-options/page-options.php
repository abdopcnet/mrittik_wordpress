<?php

add_action( 'pxl_post_metabox_register', 'mrittik_page_options_register' );
function mrittik_page_options_register( $metabox ) {

	$panels = [
		'post' => [
			'opt_name'            => 'post_option',
			'display_name'        => esc_html__( 'Post Settings', 'mrittik' ),
			'show_options_object' => false,
			'context'  => 'advanced',
			'priority' => 'default',
			'sections'  => [
				'header' => [
					'title'  => esc_html__( 'Post Header', 'mrittik' ),
					'icon'   => 'el-icon-website',
					'fields' => array_merge(
						mrittik_disable_header_opts([
							'default_value'   => '0'
						]),
				        mrittik_header_opts([
							'default'         => true,
							'default_value'   => '-1'
						])
				    )
				],
				'post_header_mobile' => [
					'title'  => esc_html__( 'Header Mobile', 'mrittik' ),
					'icon'   => 'el-icon-website',
					'fields' => array_merge(
						array(
							array(
								'id'       => 'disable_header_mobile_layout',
								'type'     => 'switch',
								'title'    => esc_html__('Disable', 'mrittik'),
								'subtitle' => esc_html__('Disable Mobile Header', 'mrittik'),
								'default'  => '0',
							),
							array(
								'id'       => 'header_mobile_blur',
								'type'     => 'switch',
								'title'    => esc_html__('Mobile Header Blur', 'mrittik'),
								'default'  => '0',
								'subtitle' => esc_html__('ㅤ', 'mrittik'),
								'required' => array( 0 => 'disable_header_mobile_layout', 1 => 'equals', 2 => false ),
							),
							array(
								'id'       => 'header_mobile_logo_dark',
								'type'     => 'switch',
								'title'    => esc_html__('Mobile Header Logo Dark', 'mrittik'),
								'default'  => '0',
								'subtitle' => esc_html__('ㅤ', 'mrittik'),
								'required' => array( 0 => 'disable_header_mobile_layout', 1 => 'equals', 2 => false ),
							),
					        array(
				                'id'       => 'pm_menu',
				                'type'     => 'select',
				                'title'    => esc_html__( 'Menu', 'mrittik' ),
				                'options'  => mrittik_get_nav_menu_slug(),
				                'default' => '-1',
				            ),
					    )
				    )
				],
				'post_title' => [
					'title'  => esc_html__( 'Post Title', 'mrittik' ),
					'icon'   => 'el el-indent-left',
					'fields' => array_merge(
				        mrittik_post_title_opts([
							'default'         => true,
							'default_value'   => '-1'
						])
				    )
				],
				'post_settings' => [
					'title'  => esc_html__( 'Post Settings', 'mrittik' ),
					'icon'   => 'el el-refresh',
					'fields' => array_merge(
						mrittik_sidebar_pos_opts(['prefix' => 'post_', 'default' => true, 'default_value' => '-1']),
						array(
					        array(
					            'id'       => 'post_title_on',
					            'title'    => esc_html__('Title', 'mrittik'),
					            'subtitle' => esc_html__('Show Title on single post.', 'mrittik'),
					            'type'     => 'switch',
					            'default'  => true
					        ),
						),
						array(
					        array(
					            'id'       => 'post_feature_image_on',
					            'title'    => esc_html__('Feature Image', 'mrittik'),
					            'subtitle' => esc_html__('Show feature image on single post.', 'mrittik'),
					            'type'     => 'switch',
					            'default'  => true,
					        ),
						),
						array(
							array(
								'id'           => 'align_content_post',
								'type'         => 'button_set',
								'title'        => esc_html__( 'Align Content', 'mrittik' ),
								'options'      => array(
									'content-left'  => esc_html__(' Left (Default)', 'mrittik'),
					                'content-center' => esc_html__('Center', 'mrittik'),
					                'content-right'  => esc_html__('Right', 'mrittik')
								),
								'default'      => 'content-left',
								'force_output' => true
							),
						),
						array(
					        array(
								'id'             => 'content_spacing',
								'type'           => 'spacing',
								'output'         => array( '#pxl-wapper #pxl-main' ),
								'right'          => false,
								'left'           => false,
								'mode'           => 'padding',
								'units'          => array( 'px' ),
								'units_extended' => 'false',
								'title'          => esc_html__( 'Spacing Top/Bottom', 'mrittik' ),
								'default'        => array(
									'padding-top'    => '',
									'padding-bottom' => '',
									'units'          => 'px',
								)
							),
					    ),
					)
				],
			]
		],
		'page' => [
			'opt_name'            => 'pxl_page_options',
			'display_name'        => esc_html__( 'Page Settings', 'mrittik' ),
			'show_options_object' => false,
			'context'  => 'advanced',
			'priority' => 'default',
			'sections'  => [
				'header' => [
					'title'  => esc_html__( 'Header', 'mrittik' ),
					'icon'   => 'el-icon-website',
					'fields' => array_merge(
		              	mrittik_disable_header_opts([
							'default_value'   => '0'
						]),
				        mrittik_header_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						array(
					        array(
				                'id'       => 'p_menu',
				                'type'     => 'select',
				                'title'    => esc_html__( 'Menu', 'mrittik' ),
				                'options'  => mrittik_get_nav_menu_slug(),
				                'default' => '-1',
				            ),
					    )
				    )

				],
				'header_mobile' => [
					'title'  => esc_html__( 'Header Mobile', 'mrittik' ),
					'icon'   => 'el-icon-website',
					'fields' => array_merge(
						array(
							array(
								'id'       => 'disable_header_mobile_layout',
								'type'     => 'switch',
								'title'    => esc_html__('Disable', 'mrittik'),
								'subtitle' => esc_html__('Disable Mobile Header', 'mrittik'),
								'default'  => '0',
							),
							array(
								'id'       => 'header_mobile_blur',
								'type'     => 'switch',
								'title'    => esc_html__('Mobile Header Blur', 'mrittik'),
								'default'  => '0',
								'subtitle' => esc_html__('ㅤ', 'mrittik'),
								'required' => array( 0 => 'disable_header_mobile_layout', 1 => 'equals', 2 => false ),
							),
							array(
								'id'       => 'header_mobile_logo_dark',
								'type'     => 'switch',
								'title'    => esc_html__('Mobile Header Logo Dark', 'mrittik'),
								'default'  => '0',
								'subtitle' => esc_html__('ㅤ', 'mrittik'),
								'required' => array( 0 => 'disable_header_mobile_layout', 1 => 'equals', 2 => false ),
							),
					        array(
				                'id'       => 'pm_menu',
				                'type'     => 'select',
				                'title'    => esc_html__( 'Menu', 'mrittik' ),
				                'options'  => mrittik_get_nav_menu_slug(),
				                'default' => '-1',
				            ),
					    )
				    )
				],
				'page_title' => [
					'title'  => esc_html__( 'Page Title', 'mrittik' ),
					'icon'   => 'el el-indent-left',
					'fields' => array_merge(
				        mrittik_page_title_opts([
							'default'         => true,
							'default_value'   => '-1'
						])
				    )
				],
				'content' => [
					'title'  => esc_html__( 'Content', 'mrittik' ),
					'icon'   => 'el-icon-pencil',
					'fields' => array_merge(
						mrittik_sidebar_pos_opts(['prefix' => 'page_', 'default' => false, 'default_value' => '0']),
						array(
					        array(
								'id'             => 'content_spacing',
								'type'           => 'spacing',
								'output'         => array( '#pxl-wapper #pxl-main' ),
								'right'          => false,
								'left'           => false,
								'mode'           => 'padding',
								'units'          => array( 'px' ),
								'units_extended' => 'false',
								'title'          => esc_html__( 'Spacing Top/Bottom', 'mrittik' ),
								'default'        => array(
									'padding-top'    => '',
									'padding-bottom' => '',
									'units'          => 'px',
								)
							),
							array(
					        	'id'           => 'loading_page',
					        	'type'         => 'button_set',
					        	'title'        => esc_html__( 'Loading', 'mrittik' ),
					        	'options'      => array(
					        		'-1'  	   => esc_html__( 'Inherit', 'mrittik' ),
					        		'bd' 	   => esc_html__( 'Builder', 'mrittik' ),
					        	),
					        	'default'      => '-1',
					        ),
					        array(
					        	'id'    => 'loader_style',
					        	'type'  => 'select',
					        	'title' => esc_html__('Loader Style', 'mrittik'),
					        	'subtitle' => esc_html__('ㅤ', 'mrittik'),
					        	'options' => [
					        		'style-text'           => esc_html__('Text', 'mrittik'),
					        		'style-text-blend'     => esc_html__('Text Blend', 'mrittik'),
					        		'style-triangle'       => esc_html__('Triangle', 'mrittik'),
					        		'style-home-assistant' => esc_html__('Home Assistant', 'mrittik'),
					        	],
					        	'default' => 'style-text',
					        	'indent' => true,
					        	'required' => array( 0 => 'loading_page', 1 => 'equals', 2 => 'bd' ),
					        ),
					        array(
					        	'id'             => 'loading_text',
					        	'type'           => 'text',
					        	'title'          => esc_html__('Loading Text', 'mrittik'),
					        	'default'        => '',
					        	'desc'           => esc_html__('Enter the text displayed on load.', 'mrittik'),
					        	'required'       => array( 0 => 'loader_style', 1 => 'equals', 2 => array('style-text', 'style-text-blend') ),
					        	'force_output'   => true
					        ),
					        array(
		                        'id'       => 'grid_lines_page',
		                        'title'    => esc_html__('Grid Lines', 'mrittik'),
		                        'type'     => 'switch',
		                        'default'  => '1',
		                    ),
					    )
					)
				],
				'footer' => [
					'title'  => esc_html__( 'Footer', 'mrittik' ),
					'icon'   => 'el el-website',
					'fields' => array_merge(
						array(
		                  	array(
		                        'id'       => 'disable_footer',
		                        'title'    => esc_html__('Disable', 'mrittik'),
		                        'subtitle' => esc_html__('ㅤ', 'mrittik'),
		                        'type'     => 'switch',
		                        'default'  => '0',
		                    ),
		              	),
				        mrittik_footer_opts([
							'default'         => true,
							'default_value'   => '-1'
						])
				    )
				],
				'background' => [
					'title'  => esc_html__( 'Background', 'mrittik' ),
					'icon'   => 'el el-photo',
					'fields' => array_merge(
						array(
							array(
								'id'       => 'background_page',
								'title'    => esc_html__('Enable', 'mrittik'),
								'subtitle' => esc_html__('Enable background for page.', 'mrittik'),
								'type'     => 'switch',
								'default'  => '0',
							),
							array(
								'id'       => 'page_bg_light',
								'type'     => 'background',
								'output'   => array( '.pxl-page-bg' ),
								'title'    => esc_html__( 'Background Light', 'mrittik' ),
								'default'  => array(
									'background-image' => '',
								),
								'required' => array( 0 => 'background_page', 1 => 'equals', 2 => '1' ),
								'force_output'   => true
							),
							array(
								'id'       => 'page_bg_dark',
								'type'     => 'background',
								'output'   => array( '.dark-mode .pxl-page-bg' ),
								'title'    => esc_html__( 'Background Dark', 'mrittik' ),
								'default'  => array(
									'background-image' => '',
								),
								'required' => array( 0 => 'background_page', 1 => 'equals', 2 => '1' ),
								'force_output'   => true
							),
		              	),
				    )
				],
				'colors' => [
					'title'  => esc_html__( 'Colors', 'mrittik' ),
					'icon'   => 'el el-website',
					'fields' => array_merge(
				        array(
				        	array(
					            'id'          => 'primary_color',
					            'type'        => 'color',
					            'title'       => esc_html__('Primary Color', 'mrittik'),
					            'transparent' => false,
					            'default'     => ''
					        ),
				        	array(
				        		'id'          => 'secondary_color',
				        		'type'        => 'color',
				        		'title'       => esc_html__('Secondary Color', 'mrittik'),
				        		'transparent' => false,
				        		'default'     => ''
				        	),
					    )
				    )
				]
			]
		],
		'portfolio' => [
			'opt_name'            => 'pxl_portfolio_options',
			'display_name'        => esc_html__( 'Portfolio Options', 'mrittik' ),
			'show_options_object' => false,
			'context'  => 'advanced',
			'priority' => 'default',
			'sections'  => [
				'portfolio_header' => [
					'title'  => esc_html__( 'General', 'mrittik' ),
					'icon'   => 'el-icon-website',
					'fields' => array_merge(
						mrittik_disable_header_opts([
							'default_value'   => '0'
						]),
				        mrittik_header_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
				        mrittik_post_title_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						array(
							array(
								'id'       => 'grid_lines_page',
								'title'    => esc_html__('Grid Lines', 'mrittik'),
								'type'     => 'switch',
								'default'  => '1',
							),
							array(
								'id' 	   => 'portfolio_external_link',
								'type' 	   => 'text',
								'title'	   => esc_html__('External Link', 'mrittik'),
								'validate' => 'url',
								'default'  => '',
							),
							array(
				                'id'       => 'p_menu',
				                'type'     => 'select',
				                'title'    => esc_html__( 'Menu', 'mrittik' ),
				                'options'  => mrittik_get_nav_menu_slug(),
				                'default' => '-1',
				            ),
						)
				    )
				],
				'header_mobile' => [
					'title'  => esc_html__( 'Header Mobile', 'mrittik' ),
					'icon'   => 'el-icon-website',
					'fields' => array_merge(
						array(
							array(
								'id'       => 'disable_header_mobile_layout',
								'type'     => 'switch',
								'title'    => esc_html__('Disable', 'mrittik'),
								'subtitle' => esc_html__('Disable Mobile Header', 'mrittik'),
								'default'  => '0',
							),
							array(
								'id'       => 'header_mobile_blur',
								'type'     => 'switch',
								'title'    => esc_html__('Mobile Header Blur', 'mrittik'),
								'default'  => '0',
								'subtitle' => esc_html__('ㅤ', 'mrittik'),
								'required' => array( 0 => 'disable_header_mobile_layout', 1 => 'equals', 2 => false ),
							),
							array(
								'id'       => 'header_mobile_logo_dark',
								'type'     => 'switch',
								'title'    => esc_html__('Mobile Header Logo Dark', 'mrittik'),
								'default'  => '0',
								'subtitle' => esc_html__('ㅤ', 'mrittik'),
								'required' => array( 0 => 'disable_header_mobile_layout', 1 => 'equals', 2 => false ),
							),
					        array(
				                'id'       => 'pm_menu',
				                'type'     => 'select',
				                'title'    => esc_html__( 'Menu', 'mrittik' ),
				                'options'  => mrittik_get_nav_menu_slug(),
				                'default' => '-1',
				            ),
					    )
				    )
				],
				'portfolio_content' => [
					'title'  => esc_html__( 'Content', 'mrittik' ),
					'icon'   => 'el-icon-pencil',
					'fields' => array_merge(
						mrittik_sidebar_pos_opts(['prefix' => 'portfolio_', 'default' => false, 'default_value' => '0']),
						array(
					        array(
								'id'             => 'content_spacing',
								'type'           => 'spacing',
								'output'         => array( '#pxl-wapper #pxl-main' ),
								'right'          => false,
								'left'           => false,
								'mode'           => 'padding',
								'units'          => array( 'px' ),
								'units_extended' => 'false',
								'title'          => esc_html__( 'Spacing Top/Bottom', 'mrittik' ),
								'default'        => array(
									'padding-top'    => '',
									'padding-bottom' => '',
									'units'          => 'px',
								)
							),
					        array(
					        	'id'      => 'nav_red_pos',
					        	'title'   => esc_html__('Navigation & Related Projects Position', 'mrittik'),
					        	'type'    => 'button_set',
					        	'options' => array(
					        		'left'  => esc_html__('Left','mrittik'),
					        		'center' => esc_html__('Center','mrittik'),
					        		'right' => esc_html__('Right','mrittik'),
					        	),
					        	'default' => 'center',
					        ),
					        array(
					        	'id'           => 'portfolio_nav_link_cus',
					        	'type'         => 'button_set',
					        	'title'        => esc_html__( 'Navigation Button Link', 'mrittik' ),
					        	'options'      => array(
					        		'-1'  	   => esc_html__( 'Inherit', 'mrittik' ),
					        		'custom' 	   => esc_html__( 'Custom', 'mrittik' ),
					        	),
					        	'default'      => '-1',
					        ),
					        array(
					        	'id'       => 'portfolio_nav_link_page',
					        	'type'     => 'text',
					        	'title'    => esc_html__('Navigation Button Link', 'mrittik'),
					        	'subtitle' => esc_html__('Enter navigation middle button link.', 'mrittik'),
					        	'default'  => '#',
					        	'required' => array( 0 => 'portfolio_nav_link_cus', 1 => 'equals', 2 => 'custom' ),
					        ),
					    )
					)
				],
				'portfolio_footer' => [
					'title'  => esc_html__( 'Footer', 'mrittik' ),
					'icon'   => 'el el-website',
					'fields' => array_merge(
				        mrittik_footer_opts([
							'default'         => true,
							'default_value'   => '-1'
						])
				    )
				],
			]
		],
		'service' => [
			'opt_name'            => 'pxl_service_options',
			'display_name'        => esc_html__( 'Service Settings', 'mrittik' ),
			'show_options_object' => false,
			'context'  => 'advanced',
			'priority' => 'default',
			'sections'  => [
				'header' => [
					'title'  => esc_html__( 'General', 'mrittik' ),
					'icon'   => 'el-icon-website',
					'fields' => array_merge(
						array(
							array(
					            'id'=> 'service_external_link',
					            'type' => 'text',
					            'title' => esc_html__('External Link', 'mrittik'),
					            'validate' => 'url',
					            'default' => '',
					        ),
					        array(
					            'id'       => 'service_icon_type',
					            'type'     => 'button_set',
					            'title'    => esc_html__('Icon Type', 'mrittik'),
					            'options'  => array(
					                'icon'  => esc_html__('Icon', 'mrittik'),
					                'image'  => esc_html__('Image', 'mrittik'),
					            ),
					            'default'  => 'icon'
					        ),
					        array(
					            'id'       => 'service_icon_font',
					            'type'     => 'pxl_iconpicker',
					            'title'    => esc_html__('Icon', 'mrittik'),
					            'required' => array( 0 => 'service_icon_type', 1 => 'equals', 2 => 'icon' ),
            					'force_output' => true
					        ),
					        array(
					            'id'       => 'service_img_light',
					            'type'     => 'media',
					            'title'    => esc_html__('Icon Image Light', 'mrittik'),
					            'default' => '',
					            'required' => array( 0 => 'service_icon_type', 1 => 'equals', 2 => 'image' ),
				            	'force_output' => true
					        ),
					        array(
					            'id'       => 'service_img_dark',
					            'type'     => 'media',
					            'title'    => esc_html__('Icon Image Dark', 'mrittik'),
					            'default' => '',
					            'required' => array( 0 => 'service_icon_type', 1 => 'equals', 2 => 'image' ),
				            	'force_output' => true
					        ),
					        array(
								'id'             => 'content_spacing',
								'type'           => 'spacing',
								'output'         => array( '#pxl-wapper #pxl-main' ),
								'right'          => false,
								'left'           => false,
								'mode'           => 'padding',
								'units'          => array( 'px' ),
								'units_extended' => 'false',
								'title'          => esc_html__( 'Content Spacing Top/Bottom', 'mrittik' ),
								'default'        => array(
									'padding-top'    => '',
									'padding-bottom' => '',
									'units'          => 'px',
								)
							),
							array(
		                        'id'       => 'grid_lines_page',
		                        'title'    => esc_html__('Grid Lines', 'mrittik'),
		                        'type'     => 'switch',
		                        'default'  => '1',
		                    ),
						)
				    )
				],
				'header_service' => [
					'title'  => esc_html__( 'Header', 'mrittik' ),
					'icon'   => 'el-icon-website',
					'fields' => array_merge(
						mrittik_disable_header_opts([
							'default_value'   => '0'
						]),
				        mrittik_header_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						array(
					        array(
				                'id'       => 'p_menu',
				                'type'     => 'select',
				                'title'    => esc_html__( 'Menu', 'mrittik' ),
				                'options'  => mrittik_get_nav_menu_slug(),
				                'default' => '-1',
				            ),
					    )
				    )

				],
				'header_mobile' => [
					'title'  => esc_html__( 'Header Mobile', 'mrittik' ),
					'icon'   => 'el-icon-website',
					'fields' => array_merge(
						array(
							array(
								'id'       => 'disable_header_mobile_layout',
								'type'     => 'switch',
								'title'    => esc_html__('Disable', 'mrittik'),
								'subtitle' => esc_html__('Disable Mobile Header', 'mrittik'),
								'default'  => '0',
							),
							array(
								'id'       => 'header_mobile_blur',
								'type'     => 'switch',
								'title'    => esc_html__('Mobile Header Blur', 'mrittik'),
								'default'  => '0',
								'subtitle' => esc_html__('ㅤ', 'mrittik'),
								'required' => array( 0 => 'disable_header_mobile_layout', 1 => 'equals', 2 => false ),
							),
							array(
								'id'       => 'header_mobile_logo_dark',
								'type'     => 'switch',
								'title'    => esc_html__('Mobile Header Logo Dark', 'mrittik'),
								'default'  => '0',
								'subtitle' => esc_html__('ㅤ', 'mrittik'),
								'required' => array( 0 => 'disable_header_mobile_layout', 1 => 'equals', 2 => false ),
							),
					        array(
				                'id'       => 'pm_menu',
				                'type'     => 'select',
				                'title'    => esc_html__( 'Menu', 'mrittik' ),
				                'options'  => mrittik_get_nav_menu_slug(),
				                'default' => '-1',
				            ),
					    )
				    )
				],
				'page_title' => [
					'title'  => esc_html__( 'Page Title', 'mrittik' ),
					'icon'   => 'el el-indent-left',
					'fields' => array_merge(
				        mrittik_page_title_opts([
							'default'         => true,
							'default_value'   => '-1'
						])
				    )
				],
			]
		],
		'product' => [
			'opt_name'            => 'pxl_product_options',
			'display_name'        => esc_html__( 'Product Settings', 'mrittik' ),
			'show_options_object' => false,
			'context'  => 'advanced',
			'priority' => 'default',
			'sections'  => [
				'header' => [
					'title'  => esc_html__( 'General', 'mrittik' ),
					'icon'   => 'el-icon-website',
					'fields' => array_merge(
						array(
							array(
					            'id'=> 'unit_price',
					            'type' => 'text',
					            'title' => esc_html__('Unit Price', 'mrittik'),
					            'subtitle' => esc_html__('Product price by weight.', 'mrittik'),
					            'validate' => 'html_custom',
					            'default' => '',
					        ),
							array(
								'id'       => 'badge_new',
								'title'    => esc_html__('Show New Badge', 'mrittik'),
								'subtitle' => esc_html__('Show a new badge for item.', 'mrittik'),
								'type'     => 'switch',
								'default'  => '0',
							),
							array(
								'id'    => 'product_page_style',
								'type'  => 'select',
								'title' => esc_html__('Product Page Style', 'mrittik'),
								'options' => [
									'style1'       	   => esc_html__('Style 1', 'mrittik'),
									'style2'       	   => esc_html__('Style 2', 'mrittik'),
								],
								'default' => 'style1',
							),
						)
				    )
				],
				'product_info' => [
					'title'  => esc_html__( 'Product Info', 'mrittik' ),
					'icon'   => 'el el-shopping-cart',
					'fields' => array_merge(
						array(
							array(
								'id'       => 'feature_tab_on',
								'title'    => esc_html__('Show Additional Information Tab', 'mrittik'),
								'subtitle' => esc_html__('Show a additional information tab on the product page.', 'mrittik'),
								'type'     => 'switch',
								'default'  => '0',
							),
							array(
								'id'=> 'product_specification_title',
								'type' => 'text',
								'title' => esc_html__('Additional Tab Title', 'mrittik'),
								'placeholder' => esc_html__('Vendor Info', 'mrittik' ),
								'validate' => 'html_custom',
								'default' => '',
								'required' => array( 0 => 'feature_tab_on', 1 => 'equals', 2 => '1' ),
							),
							array(
								'id'=> 'product_specification_content',
								'type' => 'textarea',
								'title' => esc_html__('Tab Content', 'mrittik'),
								'validate' => 'html_custom',
								'default' => '',
								'required' => array( 0 => 'feature_tab_on', 1 => 'equals', 2 => '1' ),
							),
							array(
								'id'=> 'product_specification',
								'type' => 'multi_text',
								'title' => esc_html__('Tab Content List', 'mrittik'),
								'validate' => 'html_custom',
								'default' => '',
								'required' => array( 0 => 'feature_tab_on', 1 => 'equals', 2 => '1' ),
							),
							array(
					            'id'=> 'product_info_1',
					            'type' => 'text',
					            'title' => esc_html__('Product Info Delivery 1', 'mrittik'),
					            'validate' => 'html_custom',
					            'default' => '',
					        ),
					        array(
					            'id'=> 'product_info_2',
					            'type' => 'text',
					            'title' => esc_html__('Product Info Delivery 2', 'mrittik'),
					            'validate' => 'html_custom',
					            'default' => '',
					        ),
					        array(
					            'id'=> 'product_info_3',
					            'type' => 'text',
					            'title' => esc_html__('Product Info Delivery 3', 'mrittik'),
					            'validate' => 'html_custom',
					            'default' => '',
					        ),
					        array(
					            'id'=> 'product_info_4',
					            'type' => 'text',
					            'title' => esc_html__('Product Info Delivery 4', 'mrittik'),
					            'validate' => 'html_custom',
					            'default' => '',
					        ),
						)
				    )
				],
				'header_product' => [
					'title'  => esc_html__( 'Header', 'mrittik' ),
					'icon'   => 'el-icon-website',
					'fields' => array_merge(
						mrittik_disable_header_opts([
							'default_value'   => '0'
						]),
				        mrittik_header_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						array(
					        array(
				                'id'       => 'p_menu',
				                'type'     => 'select',
				                'title'    => esc_html__( 'Menu', 'mrittik' ),
				                'options'  => mrittik_get_nav_menu_slug(),
				                'default' => '-1',
				            ),
					    )
				    )

				],
				'header_mobile' => [
					'title'  => esc_html__( 'Header Mobile', 'mrittik' ),
					'icon'   => 'el-icon-website',
					'fields' => array_merge(
						array(
							array(
								'id'       => 'disable_header_mobile_layout',
								'type'     => 'switch',
								'title'    => esc_html__('Disable', 'mrittik'),
								'subtitle' => esc_html__('Disable Mobile Header', 'mrittik'),
								'default'  => '0',
							),
							array(
								'id'       => 'header_mobile_blur',
								'type'     => 'switch',
								'title'    => esc_html__('Mobile Header Blur', 'mrittik'),
								'default'  => '0',
								'subtitle' => esc_html__('ㅤ', 'mrittik'),
								'required' => array( 0 => 'disable_header_mobile_layout', 1 => 'equals', 2 => false ),
							),
							array(
								'id'       => 'header_mobile_logo_dark',
								'type'     => 'switch',
								'title'    => esc_html__('Mobile Header Logo Dark', 'mrittik'),
								'default'  => '0',
								'subtitle' => esc_html__('ㅤ', 'mrittik'),
								'required' => array( 0 => 'disable_header_mobile_layout', 1 => 'equals', 2 => false ),
							),
					        array(
				                'id'       => 'pm_menu',
				                'type'     => 'select',
				                'title'    => esc_html__( 'Menu', 'mrittik' ),
				                'options'  => mrittik_get_nav_menu_slug(),
				                'default' => '-1',
				            ),
					    )
				    )
				],
				'page_title' => [
					'title'  => esc_html__( 'Page Title', 'mrittik' ),
					'icon'   => 'el el-indent-left',
					'fields' => array_merge(
						mrittik_page_title_shop_opts([
							'default'         => true,
							'default_value'   => 'df'
						])
					)
				],
			]
		],
		'pxl-template' => [
			'opt_name'            => 'pxl_hidden_template_options',
			'display_name'        => esc_html__( 'Template Settings', 'mrittik' ),
			'show_options_object' => false,
			'context'  => 'advanced',
			'priority' => 'default',
			'sections'  => [
				'header' => [
					'title'  => esc_html__( 'General', 'mrittik' ),
					'icon'   => 'el-icon-website',
					'fields' => array(
						array(
							'id'    => 'template_type',
							'type'  => 'select',
							'title' => esc_html__('Type', 'mrittik'),
				            'options' => [
				            	'df'       	   => esc_html__('Select Type', 'mrittik'),
								'header'       => esc_html__('Header', 'mrittik'),
								'footer'       => esc_html__('Footer', 'mrittik'),
								'mega-menu'    => esc_html__('Mega Menu', 'mrittik'),
								'page-title'   => esc_html__('Page Title', 'mrittik'),
								'tab' => esc_html__('Tab', 'mrittik'),
								'hidden-panel' => esc_html__('Hidden Panel', 'mrittik'),
								'widget' => esc_html__('Widget Sidebar', 'mrittik'),
								'shop' => esc_html__('Shop', 'mrittik'),
				            ],
				            'default' => 'df',
				        ),
				        array(
							'id'    => 'header_type',
							'type'  => 'button_set',
							'title' => esc_html__('Header Type', 'mrittik'),
				            'options' => [
				            	'px-header--default'       	   => esc_html__('Default', 'mrittik'),
								'px-header--transparent'       => esc_html__('Transparent', 'mrittik'),
				            ],
				            'default' => 'px-header--default',
				            'indent' => true,
                			'required' => array( 0 => 'template_type', 1 => 'equals', 2 => 'header' ),
				        ),
				        array(
							'id'       => 'template_position',
							'type'     => 'select',
							'title'    => esc_html__('Display Position', 'mrittik'),
							'options'  => [
								'left'   => esc_html__('Left Position', 'mrittik'),
								'top'    => esc_html__('Top Position', 'mrittik'),
								'center' => esc_html__('Center Position (popup)', 'mrittik'),
								'right'  => esc_html__('Right Position', 'mrittik'),
								'full'   => esc_html__('Full Screen', 'mrittik'),
				            ],
							'default'  => 'left',
							'required' => [ 'template_type', '=', 'hidden-panel']
				        ),
				        array(
							'id'       => 'header_position',
							'type'     => 'select',
							'title'    => esc_html__('Header Position', 'mrittik'),
							'options'  => [
								'df'   => esc_html__('Default', 'mrittik'),
								'fixed-left'    => esc_html__('Fixed Left', 'mrittik'),
								'fixed-right' => esc_html__('Fixed Right', 'mrittik')
				            ],
							'default'  => 'df',
							'required' => [ 'template_type', '=', 'header']
				        ),
					),

				],
			]
		],
	];

	$metabox->add_meta_data( $panels );
}
