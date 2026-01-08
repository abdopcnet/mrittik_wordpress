<?php
$pt_supports = ['post'];
use Elementor\Controls_Manager;
pxl_add_custom_widget(
    array(
        'name'       => 'pxl_product_grid',
        'title'      => esc_html__('BR Product Grid', 'mrittik' ),
        'icon'       => 'eicon-posts-grid',
        'categories' => array('pxltheme-core'),
        'scripts'    => [
            'imagesloaded',
            'isotope',
            'pxl-post-grid',
        ],
        'params' => array(
            'sections' => array(
                array(
                    'name'     => 'layout_section',
                    'label'    => esc_html__( 'Layout', 'mrittik' ),
                    'tab'      => 'layout',
                    'controls' => array(
                        array(
                            'name'    => 'layout',
                            'label'   => esc_html__( 'Templates', 'mrittik' ),
                            'type'    => 'layoutcontrol',
                            'default' => '1',
                            'options' => [
                                '1' => [
                                    'label' => esc_html__( 'Layout 1', 'mrittik' ),
                                    'image' => get_template_directory_uri() . '/elements/templates/pxl_product_grid/img-layout/layout1.jpg'
                                ],
                            ],
                            'prefix_class' => 'pxl-product-grid-layout-'
                        )
                    )
                ),
                array(
                    'name' => 'source_section',
                    'label' => esc_html__('Source', 'mrittik' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name'    => 'query_type',
                            'label'   => esc_html__( 'Select Query Type', 'mrittik' ),
                            'type'    => 'select',
                            'default' => 'recent_product',
                            'options' => [
                                'recent_product'   => esc_html__( 'Recent Products', 'mrittik' ),
                                'best_selling'     => esc_html__( 'Best Selling', 'mrittik' ),
                                'featured_product' => esc_html__( 'Featured Products', 'mrittik' ),
                                'top_rate'         => esc_html__( 'High Rate', 'mrittik' ),
                                'on_sale'          => esc_html__( 'On Sale', 'mrittik' ),
                                'recent_review'    => esc_html__( 'Recent Review', 'mrittik' ),
                                'deals'            => esc_html__( 'Product Deals', 'mrittik' ),
                                'separate'         => esc_html__( 'Product separate', 'mrittik' ),
                            ]
                        ),
                        array(
                            'name'     => 'taxonomies',
                            'label'    => esc_html__( 'Select Term of Product', 'mrittik' ),
                            'type'     => 'select2',
                            'multiple' => true,
                            'options'  => pxl_get_product_grid_term_options()
                        ),
                        array(
                            'name'     => 'product_ids',
                            'label'    => esc_html__( 'Products id (123,124,135...)', 'mrittik' ),
                            'type'     => 'text',
                            'default'  => '',
                            'condition' => array( 'query_type' => 'separate' )
                        ),
                        array(
                            'name'     => 'post_per_page',
                            'label'    => esc_html__( 'Post per page', 'mrittik' ),
                            'type'     => 'text',
                            'default'  => '12'
                        )
                    ),
                ),
                array(
                    'name' => 'attribute_section',
                    'label' => esc_html__('Attributes', 'mrittik' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'attributes_list',
                            'label' => esc_html__('Attributes List', 'mrittik'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'attribute_name',
                                    'label' => esc_html__('Attribute Title', 'mrittik'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'attribute_slug',
                                    'label' => esc_html__('Attribute Slug', 'mrittik'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                    'description' => 'Make sure to enter the correct product attribute slug: "<a href="' . esc_url( admin_url( 'edit.php?post_type=product&page=product_attributes' ) ) . '" target="_blank">Click Here</a>"',
                                ),
                            ),
                            'title_field' => '{{{ attribute_name }}}',
                        ),
                    ),
                ),
                array(
                    'name' => 'general_section',
                    'label' => esc_html__('General Settings', 'mrittik' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array_merge(
                        array(
                            array(
                                'name' => 'img_size',
                                'label' => esc_html__('Image Size', 'mrittik' ),
                                'type' => \Elementor\Controls_Manager::TEXT,
                                'description' => 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Default: 370x300 (Width x Height)).',
                            ),
                            array(
                                'name'    => 'pagination_type',
                                'label'   => esc_html__('Pagination Type', 'mrittik' ),
                                'type'    => \Elementor\Controls_Manager::SELECT,
                                'default' => 'false',
                                'options' => [
                                    'pagination' => esc_html__('Pagination', 'mrittik' ),
                                    'loadmore'   => esc_html__('Loadmore', 'mrittik' ),
                                    'false'      => esc_html__('Disable', 'mrittik' ),
                                ],
                            ),
                            array(
                                'name'      => 'loadmore_text',
                                'label'     => esc_html__( 'Load More text', 'mrittik' ),
                                'type'      => \Elementor\Controls_Manager::TEXT,
                                'default'   => esc_html__('Load More','mrittik'),
                                'condition' => [
                                    'pagination_type' => 'loadmore'
                                ]
                            ),
                            array(
                                'name' => 'loadmore_color',
                                'label' => esc_html__('Load More Color', 'mrittik' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-grid .pxl-load-more .btn' => 'color: {{VALUE}};',
                                ],
                                'condition' => [
                                    'pagination_type' => 'loadmore'
                                ]
                            ),
                            array(
                                'name' => 'darkmode_loadmore_color',
                                'label' => esc_html__('Load More Color (Dark Mode)', 'mrittik' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '.dark-mode {{WRAPPER}} .pxl-grid .pxl-load-more .btn' => 'color: {{VALUE}};',
                                ],
                                'condition' => [
                                    'pagination_type' => 'loadmore'
                                ]
                            ),
                            array(
                                'name' => 'loadmore_bg_color',
                                'label' => esc_html__('Load More Background Color', 'mrittik' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-grid .pxl-load-more .btn' => 'background-color: {{VALUE}};',
                                ],
                                'condition' => [
                                    'pagination_type' => 'loadmore'
                                ]
                            ),
                            array(
                                'name' => 'darkmode_loadmore_bg_color',
                                'label' => esc_html__('Load More Background Color (Dark Mode)', 'mrittik' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '.dark-mode {{WRAPPER}} .pxl-grid .pxl-load-more .btn' => 'background-color: {{VALUE}};',
                                ],
                                'condition' => [
                                    'pagination_type' => 'loadmore'
                                ]
                            ),
                            array(
                                'name'         => 'pagination_alignment',
                                'label'        => esc_html__( 'Pagination Alignment', 'mrittik' ),
                                'type'         => 'choose',
                                'control_type' => 'responsive',
                                'options' => [
                                    'start' => [
                                        'title' => esc_html__( 'Start', 'mrittik' ),
                                        'icon'  => 'eicon-text-align-left',
                                    ],
                                    'center' => [
                                        'title' => esc_html__( 'Center', 'mrittik' ),
                                        'icon'  => 'eicon-text-align-center',
                                    ],
                                    'end' => [
                                        'title' => esc_html__( 'End', 'mrittik' ),
                                        'icon'  => 'eicon-text-align-right',
                                    ]
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-grid-pagination, {{WRAPPER}} .pxl-load-more' => 'justify-content: {{VALUE}};'
                                ],
                                'condition' => [
                                    'pagination_type!' => 'false'
                                ],
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
                                    '{{WRAPPER}} .pxl-pagination-links, {{WRAPPER}} .pxl-load-more' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                                'condition' => [
                                    'pagination_type!' => 'false'
                                ]
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
                                    '{{WRAPPER}} .pxl-grid-inner' => 'margin-top: -{{TOP}}{{UNIT}}; margin-right: -{{RIGHT}}{{UNIT}}; margin-bottom: -{{BOTTOM}}{{UNIT}}; margin-left: -{{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .pxl-grid-inner .pxl-grid-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                                'control_type' => 'responsive',
                            ),
                            array(
                                'name'         => 'gap_extra',
                                'label'        => esc_html__( 'Item Gap Bottom', 'mrittik' ),
                                'description'  => esc_html__( 'Add extra space at bottom of each items','mrittik'),
                                'type'         => \Elementor\Controls_Manager::NUMBER,
                                'default'      => 0,
                                'control_type' => 'responsive',
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-grid-inner .pxl-grid-item' => 'margin-bottom: {{VALUE}}px;',
                                ],
                            )
                        ),
                    )
                ),
                array(
                    'name' => 'grid_section',
                    'label' => esc_html__('Grid Settings', 'mrittik' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array_merge(
                        mrittik_grid_column_settings()
                    ),
                ),
                array(
                    'name' => 'settings_section',
                    'label' => esc_html__('Settings', 'mrittik'),
                    'tab' => \Elementor\Controls_Manager::TAB_SETTINGS,
                    'controls' => array(
                        array(
                            'name' => 'sidebar_position',
                            'label' => esc_html__('Sidebar Position', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'no-sidebar'  => 'Disable',
                                'pxl-has-sidebar pxl-sidebar-left' => 'Left',
                                'pxl-has-sidebar pxl-sidebar-right'  => 'Right',
                            ],
                            'default' => 'no-sidebar',
                        ),
                        array(
                            'name' => 'show_product_search',
                            'label' => esc_html__('Product Search', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                            'condition' => [
                                'sidebar_position!' => 'no-sidebar',
                            ],
                            'separator' => 'before',
                        ),
                        array(
                            'name' => 'show_product_category',
                            'label' => esc_html__('Product Categories', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                            'condition' => [
                                'sidebar_position!' => 'no-sidebar',
                            ],
                            'separator' => 'before',
                        ),
                        array(
                            'name' => 'product_category_title',
                            'label' => esc_html__('Product Category Title', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => esc_html__('Product categories', 'mrittik'),
                            'condition' => [
                                'sidebar_position!' => 'no-sidebar',
                                'show_product_category' => 'true',
                            ],
                        ),
                        array(
                            'name' => 'show_product_filter_price',
                            'label' => esc_html__('Filter Products by Price', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                            'condition' => [
                                'sidebar_position!' => 'no-sidebar',
                            ],
                            'separator' => 'before',
                        ),
                        array(
                            'name' => 'product_filter_price_title',
                            'label' => esc_html__('Product Filter Price Title', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => esc_html__('Filter by price', 'mrittik'),
                            'condition' => [
                                'sidebar_position!' => 'no-sidebar',
                                'show_product_filter_price' => 'true',
                            ],
                        ),
                        array(
                            'name' => 'show_product_list',
                            'label' => esc_html__('Products List', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                            'condition' => [
                                'sidebar_position!' => 'no-sidebar',
                            ],
                            'separator' => 'before',
                        ),
                        array(
                            'name' => 'product_list_title',
                            'label' => esc_html__('Product List Title', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => esc_html__('Products', 'mrittik'),
                            'condition' => [
                                'sidebar_position!' => 'no-sidebar',
                                'show_product_list' => 'true',
                            ],
                        ),
                        array(
                            'name' => 'product_list_number',
                            'label' => esc_html__('Number Of Products To Show', 'mrittik'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 5,
                            'condition' => [
                                'sidebar_position!' => 'no-sidebar',
                                'show_product_list' => 'true',
                            ],
                        ),
                        array(
                            'name' => 'product_order_by',
                            'label' => esc_html__('Order By', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'date'  => 'Date',
                                'price' => 'Price',
                                'rand'  => 'Random',
                            ],
                            'default' => 'date',
                            'condition' => [
                                'sidebar_position!' => 'no-sidebar',
                                'show_product_list' => 'true',
                            ],
                        ),
                        array(
                            'name' => 'product_order',
                            'label' => esc_html__('Order', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'ASC' => 'ASC',
                                'DESC' => 'DESC',
                            ],
                            'default' => 'DESC',
                            'condition' => [
                                'sidebar_position!' => 'no-sidebar',
                                'show_product_list' => 'true',
                            ],
                        ),
                        array(
                            'name' => 'show_product_tag',
                            'label' => esc_html__('Products Tag Cloud', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                            'condition' => [
                                'sidebar_position!' => 'no-sidebar',
                            ],
                            'separator' => 'before',
                        ),
                        array(
                            'name' => 'product_tag_cloud_title',
                            'label' => esc_html__('Product Tag Cloud Title', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => esc_html__('Product tags', 'mrittik'),
                            'condition' => [
                                'sidebar_position!' => 'no-sidebar',
                                'show_product_tag' => 'true',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'style_section',
                    'label' => esc_html__('Style', 'mrittik'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'img_padding',
                            'label' => esc_html__('Image Padding', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%' ],
                            'control_type' => 'responsive',
                            'default' => [
                                'unit' => 'px',
                            ],
                            'range' => [
                                '%' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-product-grid .woocommerce-product-inner .woocommerce-product-header .woocommerce-product-details' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'title_color',
                            'label' => esc_html__( 'Title Color', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-product-grid .woocommerce-product-content .woocommerce-product--title a' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'darkmode_title_color',
                            'label' => esc_html__( 'Title Color (Dark Mode)', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-product-grid .woocommerce-product-content .woocommerce-product--title a' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'hover_title_color',
                            'label' => esc_html__( 'Hover Title Color', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-product-grid .woocommerce-product-content .woocommerce-product--title a:hover' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'darkmode_hover_title_color',
                            'label' => esc_html__( 'Hover Title Color (Dark Mode)', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-product-grid .woocommerce-product-content .woocommerce-product--title a:hover' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'title_typography',
                            'label' => esc_html__('Typography', 'mrittik' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-product-grid .woocommerce-product-content .woocommerce-product--title',
                        ),
                        array(
                            'name' => 'title_margin',
                            'label' => esc_html__('Title Margin', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-product-grid .woocommerce-product-content .woocommerce-product--title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'control_type' => 'responsive',
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'border_color',
                            'label' => esc_html__('Border Color', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-product-grid .woocommerce-product-inner:before' => 'border-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'darkmode_border_color',
                            'label' => esc_html__('Border Color (Dark Mode)', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-product-grid .woocommerce-product-inner:before' => 'border-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'bg_color',
                            'label' => esc_html__('Background Color', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-product-grid .woocommerce-product-inner' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'darkmode_bg_color',
                            'label' => esc_html__('Background Color (Dark Mode)', 'mrittik' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.dark-mode {{WRAPPER}} .pxl-product-grid .woocommerce-product-inner' => 'background-color: {{VALUE}};',
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