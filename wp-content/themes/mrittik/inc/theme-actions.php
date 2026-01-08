<?php
/**
 * Actions Hook for the theme
 *
 * @package Bravisthemes
 */
add_action('after_setup_theme', 'mrittik_setup');
function mrittik_setup(){

    //Set the content width in pixels, based on the theme's design and stylesheet.
    $GLOBALS['content_width'] = apply_filters( 'mrittik_content_width', 1200 );

    // Make theme available for translation.
    load_theme_textdomain( 'mrittik', get_template_directory() . '/languages' );

    // Custom Header
    add_theme_support( 'custom-header' );

    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    // Let WordPress manage the document title.
    add_theme_support( 'title-tag' );

    // Enable support for Post Thumbnails on posts and pages.
    add_theme_support( 'post-thumbnails' );

    set_post_thumbnail_size( 1170, 710 );

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus( array(
        'primary' => esc_html__( 'Primary', 'mrittik' ),
    ) );

    // Add theme support for selective refresh for widgets.
    add_theme_support( 'customize-selective-refresh-widgets' );

    // Add support for core custom logo.
    add_theme_support( 'custom-logo', array(
        'height'      => 250,
        'width'       => 250,
        'flex-width'  => true,
        'flex-height' => true,
    ) );

    // Post formats
    add_theme_support( 'post-formats', array (
        '',
    ) );

    // Enable support for Post Thumbnails on posts and pages.
    add_theme_support('post-thumbnails');
    add_image_size( 'mrittik-thumb-small', 100, 100, true );
    add_image_size( 'mrittik-thumb-xs', 170, 120, true );
    add_image_size( 'mrittik-thumb-wg-products', 255, 315, true );
    add_image_size( 'mrittik-thumb-portfolio', 565, 625, true );
    add_image_size( 'mrittik-thumb-related', 1170, 584, true );
    add_image_size( 'mrittik-thumb-medium', 1170, 684, true );
    add_image_size( 'mrittik-thumb-lager', 1400, 420, true );

    add_theme_support( 'woocommerce' );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
    remove_theme_support('widgets-block-editor');

}

/**
 * Register Widgets Position.
 */
add_action( 'widgets_init', 'mrittik_widgets_position' );
function mrittik_widgets_position() {
	register_sidebar( array(
		'name'          => esc_html__( 'Blog Sidebar', 'mrittik' ),
		'id'            => 'sidebar-blog',
		'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="widget-content">',
		'after_widget'  => '</div></section>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );

	if (class_exists('ReduxFramework')) {
		register_sidebar( array(
			'name'          => esc_html__( 'Page Sidebar', 'mrittik' ),
			'id'            => 'sidebar-page',
			'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="widget-content">',
			'after_widget'  => '</div></section>',
			'before_title'  => '<h2 class="widget-title"><span>',
			'after_title'   => '</span></h2>',
		) );
	}

	if ( class_exists( 'Woocommerce' ) ) {
		register_sidebar( array(
			'name'          => esc_html__( 'Shop Sidebar', 'mrittik' ),
			'id'            => 'sidebar-shop',
			'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="widget-content">',
			'after_widget'  => '</div></section>',
			'before_title'  => '<h2 class="widget-title"><span>',
			'after_title'   => '</span></h2>',
		) );
	}
}

/**
 * Enqueue Styles Scripts : Front-End
 */
add_action( 'wp_enqueue_scripts', 'mrittik_scripts' );
function mrittik_scripts() {

    /* Popup Libs */
    wp_enqueue_style( 'jquery-ui', get_template_directory_uri() . '/assets/css/jquery-ui.css', array(), '1.0.0' );
    wp_enqueue_style('magnific-popup', get_template_directory_uri() . '/assets/css/libs/magnific-popup.css', array(), '1.1.0');
    wp_enqueue_script( 'magnific-popup', get_template_directory_uri() . '/assets/js/libs/magnific-popup.min.js', array( 'jquery' ), '1.1.0', true );
    wp_enqueue_style('wow-animate', get_template_directory_uri() . '/assets/css/libs/animate.min.css', array(), '1.1.0');
    wp_enqueue_script( 'wow-animate', get_template_directory_uri() . '/assets/js/libs/wow.min.js', array( 'jquery' ), '1.0.0', true );
    wp_enqueue_script( 'nice-select', get_template_directory_uri() . '/assets/js/libs/nice-select.js', array( 'jquery' ), '1.0.0', true );
    wp_enqueue_script( 'slick-lib', get_template_directory_uri() . '/assets/js/libs/slick.min.js', array( 'jquery' ), '1.0.0', true );
    wp_enqueue_script( 'progressbar', get_template_directory_uri() . '/assets/js/libs/progressbar.min.js', array( 'jquery' ), '1.0.0', true );
    wp_enqueue_style('custom-scrollbars', get_template_directory_uri() . '/assets/css/libs/overlayscrollbars.css', array(), '1.1.0');
    wp_enqueue_script( 'overlayscrollbars', get_template_directory_uri() . '/assets/js/libs/overlayscrollbars.min.js', array( 'jquery' ), '1.0.0', true );
    wp_enqueue_script( 'tween-max', get_template_directory_uri() . '/assets/js/libs/tweenmax.min.js', array( 'jquery' ), '1.0.0', true );
    wp_enqueue_script( 'scroll-magic', get_template_directory_uri() . '/assets/js/libs/scrollmagic.min.js', array( 'jquery' ), '1.0.0', true );
    wp_enqueue_script( 'animation-gsap', get_template_directory_uri() . '/assets/js/libs/animation-gsap.js', array( 'jquery' ), '1.0.0', true );
    wp_enqueue_script( 'parallax-scroll', get_template_directory_uri() . '/assets/js/libs/parallax-scroll.js', array( 'jquery' ), '1.0.0', true );
    wp_enqueue_script( 'gsap-lib', get_template_directory_uri() . '/assets/js/libs/gsap.min.js', array( 'jquery' ), '1.0.0', true );
    wp_enqueue_script( 'scroll-trigger-lib', get_template_directory_uri() . '/assets/js/libs/scroll-trigger.min.js', array( 'jquery' ), '1.0.0', true );
    wp_enqueue_script( 'anime-lib', get_template_directory_uri() . '/assets/js/libs/anime.min.js', array( 'jquery' ), '1.0.0', true );
    wp_enqueue_script( 'split-text-lib', get_template_directory_uri() . '/assets/js/libs/split-text.min.js', array( 'jquery' ), '1.0.0', true );
    wp_enqueue_script( 'scroll-smoother-lib', get_template_directory_uri() . '/assets/js/libs/scroll-smoother.min.js', array( 'jquery' ), '1.0.0', true );
    // wp_enqueue_script( 'curtains-umd-lib', get_template_directory_uri() . '/assets/js/libs/curtains.umd.min.js', array( 'jquery' ), '1.0.0', true );
    wp_enqueue_script( 'curtains-lib', get_template_directory_uri() . '/assets/js/libs/curtains.min.js', array( 'jquery' ), '1.0.0', true );
    wp_enqueue_script( 'jquery-ui-slider' );

    /* Parallax Libs */
    wp_enqueue_script( 'vanilla-tilt', get_template_directory_uri() . '/assets/js/libs/vanilla-tilt.min.js', array( 'jquery' ), '1.0.0', true );

    /* Icons Lib - CSS */
    wp_enqueue_style('bootstrap-icons', get_template_directory_uri() . '/assets/fonts/bootstrap-icons/css/bootstrap-icons.css');

    // Image Before After
    wp_register_script( 'event-move', get_template_directory_uri() . '/assets/js/libs/event.move.js', array( 'jquery' ), '1.0.0', true );

	$mrittik_version = wp_get_theme( get_template() );
	wp_enqueue_style( 'pxl-caseicon', get_template_directory_uri() . '/assets/css/caseicon.css', array(), $mrittik_version->get( 'Version' ) );
    wp_enqueue_style( 'pxl-grid', get_template_directory_uri() . '/assets/css/grid.css', array(), $mrittik_version->get( 'Version' ) );
	wp_enqueue_style( 'pxl-style', get_template_directory_uri() . '/assets/css/style.css', array(), $mrittik_version->get( 'Version' ) );
	wp_add_inline_style( 'pxl-style', mrittik_inline_styles() );
    wp_enqueue_style( 'pxl-base', get_template_directory_uri() . '/style.css', array(), $mrittik_version->get( 'Version' ) );
    wp_enqueue_style( 'pxl-google-fonts', mrittik_fonts_url(), array(), null );
	wp_enqueue_script( 'pxl-main', get_template_directory_uri() . '/assets/js/theme.js', array( 'jquery' ), $mrittik_version->get( 'Version' ), true );
    wp_enqueue_script( 'pxl-woocommerce', get_template_directory_uri() . '/woocommerce/woocommerce.js', array( 'jquery' ), $mrittik_version->get( 'Version' ), true );
    wp_localize_script( 'pxl-main', 'main_data', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
    do_action( 'mrittik_scripts');
}

/**
 * Enqueue Styles Scripts : Back-End
 */
add_action('admin_enqueue_scripts', 'mrittik_admin_style');
function mrittik_admin_style() {
    $theme = wp_get_theme( get_template() );
    wp_enqueue_style( 'mrittik-admin-style', get_template_directory_uri() . '/assets/css/admin.css', array(), $theme->get( 'Version' ) );
    wp_enqueue_style('bootstrap-icons', get_template_directory_uri() . '/assets/fonts/bootstrap-icons/css/bootstrap-icons.css');
}

add_action( 'elementor/editor/before_enqueue_scripts', function() {
    wp_enqueue_style('admin-bootstrap-icons', get_template_directory_uri() . '/assets/fonts/bootstrap-icons/css/bootstrap-icons.css');
    wp_enqueue_style( 'mrittik-admin-style', get_template_directory_uri() . '/assets/css/admin.css');
} );

/* Favicon */
add_action('wp_head', 'mrittik_site_favicon');
function mrittik_site_favicon(){
    $favicon = mrittik()->get_theme_opt( 'favicon' );
    if(!empty($favicon['url']))
        echo '<link rel="icon" type="image/png" href="'.esc_url($favicon['url']).'"/>';
}

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
add_action( 'wp_head', 'mrittik_pingback_header' );
function mrittik_pingback_header() {
    if ( is_singular() && pings_open() )
    {
        echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
    }
}

add_action( 'elementor/preview/enqueue_styles', 'mrittik_add_editor_preview_style' );
function mrittik_add_editor_preview_style() {
    wp_add_inline_style( 'editor-preview', mrittik_editor_preview_inline_styles() );
}
function mrittik_editor_preview_inline_styles(){
    $theme_colors = mrittik_configs('theme_colors');
    ob_start();
        echo '.elementor-edit-area-active{';
            foreach ($theme_colors as $color => $value) {
                printf('--%1$s-color: %2$s;', str_replace('#', '',$color),  $value['value']);
            }
        echo '}';
    return ob_get_clean();
}

add_action( 'pxl_anchor_target', 'mrittik_hook_anchor_templates_hidden_panel');
function mrittik_hook_anchor_templates_hidden_panel(){

    $hidden_templates = mrittik_get_templates_slug('hidden-panel');
    if(empty($hidden_templates)) return;

    foreach ($hidden_templates as $slug => $values){
        $cur_post_id = apply_filters( 'wpml_object_id', $values['post_id'], 'post' );
        $args = [
            'slug' => $slug,
            'post_id' => $cur_post_id,
            'position' => !empty($values['position']) ? $values['position'] : 'custom-pos'
        ];
        if( did_action('pxl_anchor_target_hidden_panel_'.$cur_post_id) <= 0){
            //can be assign from here: do_action( 'pxl_anchor_target_hidden_panel_'.$slug);
            do_action( 'pxl_anchor_target_hidden_panel_'.$cur_post_id, $args );
        }
    }
}

function mrittik_hook_anchor_hidden_panel($args){
    ?>
    <div class="pxl-hidden-template pxl-hidden-template-<?php echo esc_attr($args['post_id'])?> pos-<?php echo esc_attr($args['position']) ?>">
        <div class="pxl-hidden-template-wrap">
            <div class="pxl-panel-header">
                <div class="panel-header-inner">
                    <span class="pxl-close pxl-close-drop" title="<?php echo esc_attr__( 'Close', 'mrittik' ) ?>"></span>
                </div>
            </div>
            <div class="pxl-panel-content" data-lenis-prevent>
               <?php echo Elementor\Plugin::$instance->frontend->get_builder_content_for_display( (int)$args['post_id']); ?>
            </div>
        </div>
    </div>
    <div class="pxl-overlay-drop"></div>
    <?php
}

/* Search Popup */
if(!function_exists('mrittik_hook_anchor_search')){
    function mrittik_hook_anchor_search(){
        $logo_s = mrittik()->get_theme_opt( 'logo_s', ['url' => get_template_directory_uri().'/assets/img/logo-light.png', 'id' => '' ] ); 
        ?>
        <div id="pxl-search-popup">
            <div class="pxl-item--overlay"></div>
            <div class="pxl-item--logo">
                <?php
                if ($logo_s['url']) {
                    printf(
                        '<a href="%1$s" title="%2$s" rel="home">
                        <img src="%3$s" alt="%2$s" class="logo-light"/>
                        </a>',
                        esc_url( home_url( '/' ) ),
                        esc_attr( get_bloginfo( 'name' ) ),
                        esc_url( $logo_s['url'] )
                    );
                }
                ?>
            </div>
            <div class="pxl-item--conent">
                <div class="pxl-item--close pxl-close"></div>
                <form role="search" method="get" action="<?php echo esc_url(home_url( '/' )); ?>">
                    <input type="text" required placeholder="<?php esc_attr_e('Type Your Search Words...', 'mrittik'); ?>" name="s" class="search-field" />
                    <button type="submit" class="search-submit rm-style-default"><i class="caseicon-search"></i></button>
                    <div class="pxl--search-divider"></div>
                </form>
            </div>
        </div>
    <?php }
}
/* Cart Sidebar */
if(!function_exists('mrittik_hook_anchor_cart')){
    function mrittik_hook_anchor_cart(){ ?>
        <div class="pxl-overlay-drop"></div>
        <div class="pxl-hidden-template pxl-side-cart pos-right">
            <div class="pxl-hidden-template-wrap">
                <div class="pxl-panel-header">
                    <div class="panel-header-inner">
                        <span class="pxl-title h3"><?php echo esc_html__( 'Cart', 'mrittik' ) ?><span class="widget_cart_counter">(<?php echo sprintf (_n( '%d item', '%d items', WC()->cart->cart_contents_count, 'mrittik' ), WC()->cart->cart_contents_count ); ?>)</span></span>
                        <span class="pxl-close pxl-close-drop" title="<?php echo esc_attr__( 'Close', 'mrittik' ) ?>"></span>
                    </div>
                </div>
                <div class="pxl-panel-content widget_shopping_cart" data-lenis-prevent>
                    <div class="widget_shopping_cart_content">
                        <?php woocommerce_mini_cart(); ?>
                    </div>
                </div>
            </div>
        </div>
    <?php }
}
