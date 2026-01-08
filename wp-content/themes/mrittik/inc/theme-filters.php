<?php
/**
 * Filters hook for the theme
 *
 * @package Bravisthemes
 */

add_filter( 'pxl_server_info', 'mrittik_add_server_info');
function mrittik_add_server_info($infos){
  $infos = [
    'api_url' => 'https://api.bravisthemes.com/',
    'docs_url' => 'https://doc.bravisthemes.com/mrittik/',
    'plugin_url' => 'https://api.bravisthemes.com/plugins/',
    'demo_url' => 'https://demo.bravisthemes.com/mrittik/',
    'support_url' => 'https://bravisthemes.ticksy.com/',
    'help_url' => 'https://doc.bravisthemes.com/',
    'email_support' => '',
    'video_url' => '#'
  ];

  return $infos;
}

/* Custom Classs - Body */
function mrittik_body_classes( $classes ) {

    if (class_exists('ReduxFramework')) {
        $classes[] = ' pxl-redux-page';
    }

    $footer_fixed = mrittik()->get_theme_opt('footer_fixed');
    if(isset($footer_fixed) && $footer_fixed) {
        $classes[] = ' pxl-footer-fixed';
    }

    $mouse_move_animation = mrittik()->get_theme_opt('mouse_move_animation');
    if($mouse_move_animation) {
        $classes[] = ' pxl-enable-cursor';
    }

    $header_mobile_blur = mrittik()->get_page_opt('header_mobile_blur');
    if($header_mobile_blur) {
        $classes[] = ' pxl-header-mb-blur';
    }

    $header_mobile_logo_dark = mrittik()->get_page_opt('header_mobile_logo_dark');
    if($header_mobile_logo_dark) {
        $classes[] = ' pxl-header-mb-white';
    }

    $light_dark_switch = mrittik()->get_theme_opt('light_dark_switch');
    if($light_dark_switch == 'pxl-dark-mode') {
        $classes[] = ' dark-mode';
    }

    if (isset($_GET['color'])) {
        $color = $_GET['color'];
        if ($color == 'v-dark') {
            $classes[] = 'dark-mode';
        } elseif ($color == 'v-light') {
            $classes[] = 'light-mode';
        }
    }

    $request_uri = filter_input(INPUT_SERVER, 'REQUEST_URI', FILTER_SANITIZE_URL);
    if ($request_uri !== false && $request_uri !== null) {
    	$url = esc_url(add_query_arg(array('iframe', 'eval'), $request_uri));
    } else {
    	$url = '';
    }
    $slug = basename(parse_url($url, PHP_URL_PATH));
    if ($slug == 'landing') {
    	$classes[] = 'pxl-landing-page dark-mode';
    }

    return $classes;
}
add_filter( 'body_class', 'mrittik_body_classes' );

add_filter( 'pxl_page_class', 'mrittik_page_classes' );
function mrittik_page_classes($str_cls){
	$header_layout	= (int)mrittik()->get_opt('header_layout');
	if ($header_layout > 0){
    	$header_position = get_post_meta( $header_layout, 'header_position', true );
    	if(!empty($header_position))
    		$str_cls .= ' header-pos-'.$header_position;
    }
    return $str_cls;
}

/* Post Type Support Elementor*/
add_filter( 'pxl_add_cpt_support', 'mrittik_add_cpt_support' );
function mrittik_add_cpt_support($cpt_support) {
	$cpt_support[] = 'service';
	$cpt_support[] = 'pxl-slider';
    return $cpt_support;
}

add_filter( 'pxl_support_default_cpt', 'mrittik_support_default_cpt' );
function mrittik_support_default_cpt($postypes){
	return $postypes; // pxl-template
}

add_filter( 'pxl_extra_post_types', 'mrittik_add_posttype' );
function mrittik_add_posttype( $postypes ) {
	$portfolio_slug = mrittik()->get_theme_opt( 'portfolio_slug', 'portfolio' );
	$portfolio_name = mrittik()->get_theme_opt( 'portfolio_name', esc_html__('Portfolio', 'mrittik') );
	$postypes['portfolio'] = array(
		'status' => true,
		'item_name'  => $portfolio_name,
		'items_name' => $portfolio_name,
		'args'       => array(
			'rewrite'             => array(
                'slug'       => $portfolio_slug,
 		 	),
		),
	);

	$service_slug = mrittik()->get_theme_opt( 'service_slug', 'service' );
	$service_name = mrittik()->get_theme_opt( 'service_name', esc_html__('Services', 'mrittik') );
	$postypes['service'] = array(
		'status' => true,
		'item_name'  => $service_name,
		'items_name' => $service_name,
		'args'       => array(
			'rewrite'             => array(
                'slug'       => $service_slug,
 		 	),
		),
	);
    $postypes['pxl-slider'] = [
        'status'     => true,
        'item_name'  => esc_html__('Slider Builder', 'mrittik'),
		'items_name' => esc_html__('Slider Builder', 'mrittik'),
        'args'       => array(
            'supports'           => array(
                'title',
                'editor',
            ),
            'public'             => true,
            'publicly_queryable' => true,
            'show_in_nav_menus'   => false
        ),
        'labels'     => array()
    ];
	return $postypes;
}

add_filter( 'pxl_extra_taxonomies', 'mrittik_add_tax' );
function mrittik_add_tax( $taxonomies ) {
	$portfolio_category_slug = mrittik()->get_theme_opt( 'portfolio_category_slug', 'portfolio-category' );
	$portfolio_category_name = mrittik()->get_theme_opt( 'portfolio_category_name', esc_html__('Portfolio Categories', 'mrittik') );
	$taxonomies['portfolio-category'] = array(
		'status'     => true,
		'post_type'  => array( 'portfolio' ),
		'taxonomy'   => $portfolio_category_name,
		'taxonomies' => $portfolio_category_name,
		'args'       => array(
			'rewrite'             => array(
                'slug'       => $portfolio_category_slug
 		 	),
		),
		'labels'     => array()
	);
	$taxonomies['portfolio-tag'] = array(
		'status'     => true,
		'post_type'  => array( 'portfolio' ),
		'taxonomy'   => 'Portfolio Tags',
		'taxonomies' => 'Portfolio Tags',
		'args'       => array(
			'rewrite'             => array(
                'slug'       => 'portfolio-tag'
 		 	),
		),
		'labels'     => array()
	);

	$service_category_slug = mrittik()->get_theme_opt( 'service_category_slug', 'service-category' );
	$service_category_name = mrittik()->get_theme_opt( 'service_category_name', esc_html__('Service Categories', 'mrittik') );
	$taxonomies['service-category'] = array(
		'status'     => true,
		'post_type'  => array( 'service' ),
		'taxonomy'   => $service_category_name,
		'taxonomies' => $service_category_name,
		'args'       => array(
			'rewrite'             => array(
                'slug'       => $service_category_slug
 		 	),
		),
		'labels'     => array()
	);
	$taxonomies['service-tag'] = array(
		'status'     => true,
		'post_type'  => array( 'service' ),
		'taxonomy'   => 'Service Tags',
		'taxonomies' => 'Service Tags',
		'args'       => array(
			'rewrite'             => array(
                'slug'       => 'service-tag'
 		 	),
		),
		'labels'     => array()
	);

	return $taxonomies;
}

/* Custom Archive Post Type Link */
add_filter( 'post_type_archive_link', 'mrittik_get_post_type_archive_link', 10, 2 );
function mrittik_get_post_type_archive_link($link, $post_type){

	if( $post_type == 'portfolio'){
		$port_archive_link = mrittik()->get_theme_opt('archive_portfolio_link', '');
		    if( !empty($port_archive_link) ){ 
		  	$link = get_permalink($port_archive_link);
		}
	}

	if( $post_type == 'service'){
		$port_archive_link = mrittik()->get_theme_opt('archive_service_link', '');
		    if( !empty($port_archive_link) ){ 
		  	$link = get_permalink($port_archive_link);
		}
	}

  return $link;
}


add_filter( 'pxl_theme_builder_post_types', 'mrittik_theme_builder_post_type' );
function mrittik_theme_builder_post_type($postypes){
	//default are header, footer, mega-menu
	$postypes[] = 'pxl-slider';
	return $postypes;
}

add_filter( 'pxl_theme_builder_layout_ids', 'mrittik_theme_builder_layout_id' );
function mrittik_theme_builder_layout_id($layout_ids){
	//default [],
	$header_layout        = (int)mrittik()->get_opt('header_layout');
	$header_sticky_layout = (int)mrittik()->get_opt('header_sticky_layout');
	$footer_layout        = (int)mrittik()->get_opt('footer_layout');
	$ptitle_layout        = (int)mrittik()->get_opt('ptitle_layout');
	$shop_layout  		  = (int)mrittik()->get_opt('shop_layout');
	$shop_single_layout   = (int)mrittik()->get_opt('shop_single_layout');
	if( $header_layout > 0)
		$layout_ids[] = $header_layout;
	if( $header_sticky_layout > 0)
		$layout_ids[] = $header_sticky_layout;
	if( $footer_layout > 0)
		$layout_ids[] = $footer_layout;
	if( $ptitle_layout > 0)
		$layout_ids[] = $ptitle_layout;
	if( $shop_layout > 0)
		$layout_ids[] = $shop_layout;
	if( $shop_single_layout > 0)
		$layout_ids[] = $shop_single_layout;

	return $layout_ids;
}

add_filter( 'pxl_wg_get_source_id_builder', 'mrittik_wg_get_source_builder' );
function mrittik_wg_get_source_builder($wg_datas){
  $wg_datas['tabs'] = ['control_name' => 'tabs', 'source_name' => 'content_template'];
  return $wg_datas;
}

add_filter( 'pxl_template_type_support', 'mrittik_template_type_support' );
function mrittik_template_type_support($type){
	//default ['header','footer','mega-menu']
	$extra_type = [
        'page-title'   => esc_html__('Page Title', 'mrittik'),
        'hidden-panel' => esc_html__('Hidden Panel', 'mrittik'),
        'tab'          => esc_html__('Tab', 'mrittik'),
	];
	$template_type = array_merge($type,$extra_type);
	return $template_type;
}


add_filter( 'get_the_archive_title', 'mrittik_archive_title_remove_label' );
function mrittik_archive_title_remove_label( $title ) {
	if ( is_category() ) {
		$title = single_cat_title( '', false );
	} elseif ( is_tag() ) {
		$title = single_tag_title( '', false );
	} elseif ( is_author() ) {
		$title = get_the_author();
	} elseif ( is_post_type_archive() ) {
		$title = post_type_archive_title( '', false );
	} elseif ( is_tax() ) {
		$title = single_term_title( '', false );
	} elseif ( is_home() ) {
		$title = single_post_title( '', false );
	}

	return $title;
}

add_filter( 'comment_reply_link', 'mrittik_comment_reply_link' );
function mrittik_comment_reply_link( $content ) {
    return preg_replace( '/comment-reply-link/', 'comment-reply-link ', $content);
}

add_filter( 'pxl_enable_megamenu', 'mrittik_enable_megamenu' );
function mrittik_enable_megamenu() {
	return true;
}
add_filter( 'pxl_enable_onepage', 'mrittik_enable_onepage' );
function mrittik_enable_onepage() {
	return true;
}

add_filter( 'pxl_support_awesome_pro', 'mrittik_support_awesome_pro' );
function mrittik_support_awesome_pro() {
	return true;
}

add_filter( 'redux_pxl_iconpicker_field/get_icons', 'mrittik_add_icons_to_pxl_iconpicker_field' );
function mrittik_add_icons_to_pxl_iconpicker_field($icons){
	$custom_icons = []; //'Flaticon' => array(array('flaticon-marker' => 'flaticon-marker')),
	$icons = array_merge($custom_icons, $icons);
	return $icons;
}


add_filter("pxl_mega_menu/get_icons", "mrittik_add_icons_to_megamenu");
function mrittik_add_icons_to_megamenu($icons){
	$custom_icons = []; //'Flaticon' => array(array('flaticon-marker' => 'flaticon-marker')),
	$icons = array_merge($custom_icons, $icons);
	return $icons;
}


/**
 * Move comment field to bottom
 */
add_filter( 'comment_form_fields', 'mrittik_comment_field_to_bottom' );
function mrittik_comment_field_to_bottom( $fields ) {
	$comment_field = $fields['comment'];
	unset( $fields['comment'] );
	$fields['comment'] = $comment_field;
	return $fields;
}


/* ------Disable Lazy loading---- */
add_filter( 'wp_lazy_loading_enabled', '__return_false' );


/* Edit Popup Elementor Pro */
function mrittik_fix_elementor_popup_location( $that ){
    $loc = $that->get_location('popup');
    
    if( ! $loc['edit_in_content'] ){
        $args = [
            'label'           => $loc['label'],
            'multiple'        => $loc['multiple'],
            'public'          => $loc['public'],
            'edit_in_content' => true,
            'hook'            => $loc['hook'],
        ];
        
        $that->register_location('popup', $args);
    }
}
add_action('elementor/theme/register_locations', 'mrittik_fix_elementor_popup_location', 9999999 );