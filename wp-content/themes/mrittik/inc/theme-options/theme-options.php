<?php
add_action('after_setup_theme', 'bravisthemes_setup_theme_option', 1);
function bravisthemes_setup_theme_option(){
    if (!class_exists('ReduxFramework')) {
        return;
    }
    if (class_exists('ReduxFrameworkPlugin')) {
        remove_action('admin_notices', array(ReduxFrameworkPlugin::instance(), 'admin_notices'));
    }

    $opt_name = mrittik()->get_option_name();
    $version = mrittik()->get_version();

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => '', //$theme->get('Name'),
        // Name that appears at the top of your panel
        'display_version'      => $version,
        // Version that appears at the top of your panel
        'menu_type'            => 'submenu', //class_exists('Pxltheme_Core') ? 'submenu' : '',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => esc_html__('Theme Options', 'mrittik'),
        'page_title'           => esc_html__('Theme Options', 'mrittik'),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => false,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => false,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-admin-generic',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => true,
        // Show the time the page took to load, etc
        'update_notice'        => true,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field
        'show_options_object' => false,
        // OPTIONAL -> Give you extra features
        'page_priority'        => 80,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'pxlart', //class_exists('Mrittik_Admin_Page') ? 'case' : '',
        // For a full list of options, visit: //codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => 'pxlart-theme-options',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        ),
    );

    Redux::SetArgs($opt_name, $args);

    /*--------------------------------------------------------------
    # General
    --------------------------------------------------------------*/

    Redux::setSection($opt_name, array(
        'title'  => esc_html__('General', 'mrittik'),
        'icon'   => 'el-icon-home',
        'fields' => array(
            array(
                'id'       => 'favicon',
                'type'     => 'media',
                'title'    => esc_html__('Favicon', 'mrittik'),
                'default'  => '',
                'url'      => false
            ),
            array(
                'id'       => 'mouse_move_animation',
                'type'     => 'switch',
                'title'    => esc_html__('Mouse Move Animation', 'mrittik'),
                'default'  => false
            ),
            array(
                'id'       => 'grid_sline',
                'title'    => esc_html__('Grid Lines', 'mrittik'),
                'type'     => 'section',
                'indent'   => true,
            ),
            array(
                'id'       => 'grid_lines',
                'type'     => 'switch',
                'title'    => esc_html__('Grid Lines', 'mrittik'),
                'default'  => false
            ),
            array(
                'id'       => 'grid_lines_mobile',
                'type'     => 'switch',
                'title'    => esc_html__('Show Grid Lines In Mobile', 'mrittik'),
                'default'  => false,
                'required' => array( 0 => 'grid_lines', 1 => 'equals', 2 => true ),
            ),
            array(
                'id'       => 'page_lading',
                'title'    => esc_html__('Page Loading', 'mrittik'),
                'type'     => 'section',
                'indent'   => true,
            ),
            array(
                'id'       => 'site_loader',
                'type'     => 'switch',
                'title'    => esc_html__('Loader', 'mrittik'),
                'default'  => false
            ),
            array(
                'id'       => 'loader_style',
                'type'     => 'select',
                'title'    => esc_html__('Loader Style', 'mrittik'),
                'options'  => [
                    'style-text'           => esc_html__('Text', 'mrittik'),
                    'style-text-blend'     => esc_html__('Text Blend', 'mrittik'),
                    'style-triangle'       => esc_html__('Triangle', 'mrittik'),
                    'style-home-assistant' => esc_html__('Home Assistant', 'mrittik'),
                ],
                'default'  => 'style-text',
                'indent'   => true,
                'required' => array( 0 => 'site_loader', 1 => 'equals', 2 => true ),
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
                'id'          => 'loading_text_typo',
                'type'        => 'typography',
                'title'       => esc_html__('Loading Text Typography', 'mrittik'),
                'google'      => true,
                'font-backup' => false,
                'all_styles'  => false,
                'line-height'  => false,
                'font-size'  => false,
                'color'  => false,
                'font-style'  => false,
                'font-weight'  => false,
                'text-align'  => false,
                'units'       => 'px',
                'output'      => array('.pxl-loader.style-text.hide .preloader-inner .loading-text'),
                'required'       => array( 0 => 'loader_style', 1 => 'equals', 2 => array('style-text', 'style-text-blend') ),
                'force_output'   => true
            ),
        )
    ));

    /*--------------------------------------------------------------
    # Colors
    --------------------------------------------------------------*/

    Redux::setSection($opt_name, array(
        'title'  => esc_html__('Colors', 'mrittik'),
        'icon'   => 'el-icon-file-edit',
        'fields' => array(
            array(
                'id'       => 'button_light_dark_on',
                'type'     => 'switch',
                'title'    => esc_html__('Button Switch Light/Dark', 'mrittik'),
                'default'  => false,
            ),
            array(
                'id'       => 'light_dark_switch',
                'type'     => 'button_set',
                'title'    => esc_html__('Color Mode', 'mrittik'),
                'options'  => array(
                    'pxl-light-mode' => esc_html__('Light Layous', 'mrittik'),
                    'pxl-dark-mode'  => esc_html__('Dark Layous', 'mrittik'),
                ),
                'default'  => 'pxl-light-mode',
            ),
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
            array(
                'id'          => 'third_color',
                'type'        => 'color',
                'title'       => esc_html__('Third Color', 'mrittik'),
                'transparent' => false,
                'default'     => ''
            ),
            array(
                'id'          => 'fourth_color',
                'type'        => 'color',
                'title'       => esc_html__('Fourth Color', 'mrittik'),
                'transparent' => false,
                'default'     => ''
            ),
            array(
                'id'          => 'fifth_color',
                'type'        => 'color',
                'title'       => esc_html__('Fifth Color', 'mrittik'),
                'transparent' => false,
                'default'     => ''
            ),
            array(
                'id'          => 'sixth_color',
                'type'        => 'color',
                'title'       => esc_html__('Sixth Color', 'mrittik'),
                'transparent' => false,
                'default'     => ''
            ),
            array(
                'id'      => 'link_color',
                'type'    => 'link_color',
                'title'   => esc_html__('Link Colors', 'mrittik'),
                'default' => array(
                    'regular' => '',
                    'hover'   => '',
                    'active'  => ''
                ),
                'output'  => array('a')
            ),
            array(
                'id'          => 'bg_light_color',
                'type'        => 'color',
                'title'       => esc_html__('Background Color - Light', 'mrittik'),
                'transparent' => false,
                'default'     => ''
            ),
            array(
                'id'          => 'bg_dark_color',
                'type'        => 'color',
                'title'       => esc_html__('Background Color - Dark', 'mrittik'),
                'transparent' => false,
                'default'     => ''
            ),
            array(
                'id'          => 'bg_grid_light',
                'type'        => 'color',
                'title'       => esc_html__('Grid Color - Light', 'mrittik'),
                'transparent' => false,
                'default'     => ''
            ),
            array(
                'id'          => 'bg_grid_dark',
                'type'        => 'color',
                'title'       => esc_html__('Grid Color - Dark', 'mrittik'),
                'transparent' => false,
                'default'     => ''
            ),
        )
    ));

    /*--------------------------------------------------------------
    # Header
    --------------------------------------------------------------*/

    Redux::setSection($opt_name, array(
        'title'  => esc_html__('Header', 'mrittik'),
        'icon'   => 'el el-indent-left',
        'fields' => array_merge(
            mrittik_header_opts(),
            array(
                array(
                    'id'       => 'sticky_scroll',
                    'type'     => 'button_set',
                    'title'    => esc_html__('Sticky Scroll', 'mrittik'),
                    'options'  => array(
                        'pxl-sticky-stt' => esc_html__('Scroll To Top', 'mrittik'),
                        'pxl-sticky-stb'  => esc_html__('Scroll To Bottom', 'mrittik'),
                    ),
                    'default'  => 'pxl-sticky-stb',
                ),
            )
        )
    ));

    Redux::setSection($opt_name, array(
        'title'      => esc_html__('Mobile', 'mrittik'),
        'icon'       => 'el el-picture',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'logo_m',
                'type'     => 'media',
                'title'    => esc_html__('Logo Light', 'mrittik'),
                 'default' => array(
                    'url'=>get_template_directory_uri().'/assets/img/logo-light.png'
                ),
                'url'      => false
            ),
            array(
                'id'       => 'logo_m_dark',
                'type'     => 'media',
                'title'    => esc_html__('Logo Dark', 'mrittik'),
                 'default' => array(
                    'url'=>get_template_directory_uri().'/assets/img/logo-dark.png'
                ),
                'url'      => false
            ),
            array(
                'id'       => 'logo_height',
                'type'     => 'dimensions',
                'title'    => esc_html__('Logo Height', 'mrittik'),
                'width'    => false,
                'unit'     => 'px',
                'output'    => array('#pxl-header-default .pxl-header-branding img, .pxl-logo-mobile img, #pxl-header-mobile .pxl-header-branding img'),
            ),
            array(
                'id'       => 'search_mobile',
                'type'     => 'switch',
                'title'    => esc_html__('Search Form', 'mrittik'),
                'default'  => true
            )
        )
    ));

    Redux::setSection($opt_name, array(
        'title'      => esc_html__('Search Popup', 'mrittik'),
        'icon'       => 'el el-picture',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'logo_s',
                'type'     => 'media',
                'title'    => esc_html__('Logo', 'mrittik'),
                 'default' => array(
                    'url'=>get_template_directory_uri().'/assets/img/logo-dark.png'
                ),
                'url'      => false
            ),
        )
    ));

    /*--------------------------------------------------------------
    # Page Title area
    --------------------------------------------------------------*/

    Redux::setSection($opt_name, array(
        'title'  => esc_html__('Page Title', 'mrittik'),
        'icon'   => 'el-icon-map-marker',
        'fields' => array_merge(
            mrittik_page_title_opts()
        )
    ));


    /*--------------------------------------------------------------
    # Footer
    --------------------------------------------------------------*/

    Redux::setSection($opt_name, array(
        'title'  => esc_html__('Footer', 'mrittik'),
        'icon'   => 'el el-website',
        'fields' => array_merge(
            mrittik_footer_opts(),
            array(
                array(
                    'id'       => 'back_totop_on',
                    'type'     => 'switch',
                    'title'    => esc_html__('Button Back to Top', 'mrittik'),
                    'default'  => false,
                ),
                array(
                    'id'       => 'back_totop_text',
                    'type'     => 'text',
                    'title'    => esc_html__('Back To Top Text', 'mrittik'),
                    'placeholder' => esc_html__('UP', 'mrittik' ),
                    'required' => array( 0 => 'back_totop_on', 1 => 'equals', 2 => '1' ),
                ),
                array(
                    'id'       => 'footer_fixed',
                    'type'     => 'switch',
                    'title'    => esc_html__('Footer Fixed', 'mrittik'),
                    'default'  => false,
                )
            )
        )

    ));

    /*--------------------------------------------------------------
    # WordPress default content
    --------------------------------------------------------------*/

    Redux::setSection($opt_name, array(
        'title' => esc_html__('Blog Archive', 'mrittik'),
        'icon'  => 'el-icon-pencil',
        'fields'     => array_merge(
            mrittik_sidebar_pos_opts([ 'prefix' => 'blog_']),
            array(
                array(
                    'id'       => 'archive_category',
                    'title'    => esc_html__('Category', 'mrittik'),
                    'subtitle' => esc_html__('Display the Category for each blog post.', 'mrittik'),
                    'type'     => 'switch',
                    'default'  => true,
                ),
                array(
                    'id'       => 'archive_date',
                    'title'    => esc_html__('Date', 'mrittik'),
                    'subtitle' => esc_html__('Display the Date for each blog post.', 'mrittik'),
                    'type'     => 'switch',
                    'default'  => true,
                ),
                array(
                    'id'       => 'archive_excerpts',
                    'title'    => esc_html__('Excerpt', 'mrittik'),
                    'subtitle' => esc_html__('Show Excerpt for blog post.', 'mrittik'),
                    'type'     => 'switch',
                    'default'  => true
                ),
                array(
                    'id'      => 'archive_excerpt_length',
                    'type'    => 'text',
                    'title'   => esc_html__('Excerpt Length', 'mrittik'),
                    'default' => '',
                    'subtitle' => esc_html__('Default: 50', 'mrittik'),
                    'required' => array( 0 => 'archive_excerpts', 1 => 'equals', 2 => '1' ),
                ),
                array(
                    'id'      => 'archive_readmore_text',
                    'type'    => 'text',
                    'title'   => esc_html__('Button Text', 'mrittik'),
                    'default' => '',
                    'subtitle' => esc_html__('Default: Read more', 'mrittik'),
                    'required' => array( 0 => 'archive_excerpts', 1 => 'equals', 2 => '1' ),
                )
            )
        )
    ));

    Redux::setSection($opt_name, array(
        'title'      => esc_html__('Single Post', 'mrittik'),
        'icon'       => 'el-icon-file-edit',
        'subsection' => true,
        'fields'     => array_merge(
            mrittik_sidebar_pos_opts([ 'prefix' => 'post_']),
            array(
                array(
                    'id'       => 'post_title',
                    'title'    => esc_html__('Title', 'mrittik'),
                    'subtitle' => esc_html__('Show Title on single post.', 'mrittik'),
                    'type'     => 'switch',
                    'default'  => true
                ),
                array(
                    'id'       => 'post_category',
                    'title'    => esc_html__('Category', 'mrittik'),
                    'subtitle' => esc_html__('Display the Category for blog post.', 'mrittik'),
                    'type'     => 'switch',
                    'default'  => true
                ),
                array(
                    'id'       => 'post_date',
                    'title'    => esc_html__('Date', 'mrittik'),
                    'subtitle' => esc_html__('Display the Date for blog post.', 'mrittik'),
                    'type'     => 'switch',
                    'default'  => true
                ),
                array(
                    'id'       => 'post_author_box_info',
                    'title'    => esc_html__('Author Box Info', 'mrittik'),
                    'subtitle' => esc_html__('Show author box info for blog post.', 'mrittik'),
                    'type'     => 'switch',
                    'default'  => true
                ),
                array(
                    'id'       => 'post_author_position',
                    'type'     => 'text',
                    'title'    => esc_html__('Position For User', 'mrittik'),
                    'subtitle' => esc_html__('Show the position of the author, who posted the article.', 'mrittik'),
                    'default'  => '',
                    'required' => array( 0 => 'post_author_box_info', 1 => 'equals', 2 => '1' ),
                ),
                array(
                    'id'       => 'post_navigation',
                    'title'    => esc_html__('Navigation', 'mrittik'),
                    'subtitle' => esc_html__('Display the Navigation for blog post.', 'mrittik'),
                    'type'     => 'switch',
                    'default'  => false,
                ),
                array(
                    'id'       => 'post_tag',
                    'title'    => esc_html__('Tags', 'mrittik'),
                    'subtitle' => esc_html__('Display the Tag for blog post.', 'mrittik'),
                    'type'     => 'switch',
                    'default'  => true
                ),
                array(
                    'id' => 'social_section',
                    'title' => esc_html__('Social', 'mrittik'),
                    'type'  => 'section',
                    'indent' => true,
                ),
                array(
                    'id'       => 'post_social_share',
                    'title'    => esc_html__('Social', 'mrittik'),
                    'subtitle' => esc_html__('Display the Social Share for blog post.', 'mrittik'),
                    'type'     => 'switch',
                    'default'  => false,
                ),
                array(
                    'id'       => 'social_facebook',
                    'title'    => esc_html__('Facebook', 'mrittik'),
                    'type'     => 'switch',
                    'default'  => false,
                    'indent' => true,
                    'required' => array( 0 => 'post_social_share', 1 => 'equals', 2 => '1' ),
                ),
                array(
                    'id'       => 'social_twitter',
                    'title'    => esc_html__('Twitter', 'mrittik'),
                    'type'     => 'switch',
                    'default'  => false,
                    'indent' => true,
                    'required' => array( 0 => 'post_social_share', 1 => 'equals', 2 => '1' ),
                ),
                array(
                    'id'       => 'social_pinterest',
                    'title'    => esc_html__('Pinterest', 'mrittik'),
                    'type'     => 'switch',
                    'default'  => false,
                    'indent' => true,
                    'required' => array( 0 => 'post_social_share', 1 => 'equals', 2 => '1' ),
                ),
                array(
                    'id'       => 'social_linkedin',
                    'title'    => esc_html__('LinkedIn', 'mrittik'),
                    'type'     => 'switch',
                    'default'  => false,
                    'indent' => true,
                    'required' => array( 0 => 'post_social_share', 1 => 'equals', 2 => '1' ),
                ),
                array(
                    'id' => 'post_related_on',
                    'title' => esc_html__('Post Related', 'mrittik'),
                    'type'  => 'section',
                    'indent' => true,
                ),
                array(
                    'id'       => 'post_related',
                    'title'    => esc_html__('Post Related', 'mrittik'),
                    'subtitle' => esc_html__('Show Post Related for blog post.', 'mrittik'),
                    'type'     => 'switch',
                    'default'  => false
                ),
                array(
                    'id'       => 'post_related_title',
                    'type'     => 'text',
                    'title'    => esc_html__('Related Title Text', 'mrittik'),
                    'placeholder' => esc_html__('Related posts', 'mrittik' ),
                    'required' => array( 0 => 'post_related', 1 => 'equals', 2 => '1' ),
                ),
                array(
                    'id'       => 'post_related_text',
                    'type'     => 'text',
                    'title'    => esc_html__('Related Button Text', 'mrittik'),
                    'placeholder' => esc_html__('Browse All', 'mrittik' ),
                    'required' => array( 0 => 'post_related', 1 => 'equals', 2 => '1' ),
                ),
                array(
                    'id'       => 'post_related_link',
                    'type'     => 'text',
                    'title'    => esc_html__('Related Button Link', 'mrittik'),
                    'default'  => '#',
                    'required' => array( 0 => 'post_related', 1 => 'equals', 2 => '1' ),
                ),
                array(
                    'id'      => 'post_related_excerpt_line',
                    'type'    => 'text',
                    'title'   => esc_html__('Excerpt Line', 'mrittik'),
                    'default' => '',
                    'required' => array( 0 => 'post_related', 1 => 'equals', 2 => '1' ),
                ),
            )
        )
    ));

    Redux::setSection($opt_name, array(
        'title'      => esc_html__('Extra Post Type', 'mrittik'),
        'icon'       => 'el el-briefcase',
        'fields'     => array(
        )
    ));

    Redux::setSection($opt_name, array(
        'title'      => esc_html__('Service', 'mrittik'),
        'icon'       => 'el el-file-edit',
        'subsection' => true,
        'fields'     => array(
            array(
                'title' => esc_html__('Service', 'mrittik'),
                'type'  => 'section',
                'id' => 'post_service',
                'indent' => true,
            ),
            array(
                'id'      => 'service_slug',
                'type'    => 'text',
                'title'   => esc_html__('Service Slug', 'mrittik'),
                'default' => '',
                'desc'     => 'Default: service',
            ),
            array(
                'id'      => 'service_name',
                'type'    => 'text',
                'title'   => esc_html__('Service Name', 'mrittik'),
                'default' => '',
                'desc'     => 'Default: Service',
            ),
            array(
                'id'      => 'service_category_slug',
                'type'    => 'text',
                'title'   => esc_html__('Service Category Slug', 'mrittik'),
                'default' => '',
                'desc'     => 'Default: service-category',
            ),
            array(
                'id'      => 'service_category_name',
                'type'    => 'text',
                'title'   => esc_html__('Service Category Name', 'mrittik'),
                'default' => '',
                'desc'     => 'Default: Service Categories',
            ),
            array(
                'id'    => 'archive_service_link',
                'type'  => 'select',
                'title' => esc_html__( 'Custom Archive Page Link', 'mrittik' ),
                'data'  => 'page',
                'args'  => array(
                    'post_type'      => 'page',
                    'posts_per_page' => -1,
                    'orderby'        => 'title',
                    'order'          => 'ASC',
                ),
            ),
        )
    ));

    Redux::setSection($opt_name, array(
        'title'      => esc_html__('Portfolio', 'mrittik'),
        'icon'       => 'el el-file-edit',
        'subsection' => true,
        'fields'     => array(
            array(
                'title' => esc_html__('Portfolio', 'mrittik'),
                'type'  => 'section',
                'id' => 'post_portfolio',
                'indent' => true,
            ),
            array(
                'id'       => 'portfolio_navigation',
                'title'    => esc_html__('Navigation', 'mrittik'),
                'subtitle' => esc_html__('Display the Navigation for portfolio post.', 'mrittik'),
                'type'     => 'switch',
                'default'  => false,
            ),
            array(
                'id'       => 'portfolio_nav_link',
                'type'     => 'text',
                'title'    => esc_html__('Navigation Button Link', 'mrittik'),
                'subtitle' => esc_html__('Enter navigation middle button link.', 'mrittik'),
                'default'  => '#',
                'required' => array( 0 => 'portfolio_navigation', 1 => 'equals', 2 => '1' ),
            ),
            array(
                'id'       => 'portfolio_nav_text',
                'type'     => 'text',
                'title'    => esc_html__('Text caption', 'mrittik'),
                'subtitle' => esc_html__('Text caption middle button link on hover.', 'mrittik'),
                'placeholder' => esc_html__('Show All Projects', 'mrittik' ),
                'required' => array( 0 => 'portfolio_navigation', 1 => 'equals', 2 => '1' ),
            ),
            array(
                'id'       => 'projects_related',
                'title'    => esc_html__('Related Projects', 'mrittik'),
                'subtitle' => esc_html__('Show Related Projects for portfolio post.', 'mrittik'),
                'type'     => 'switch',
                'default'  => false,
            ),
            array(
                'id'       => 'projects_related_title',
                'type'     => 'text',
                'title'    => esc_html__('Related Projects Title Text', 'mrittik'),
                'placeholder' => esc_html__('PROJECT CONCEPT', 'mrittik' ),
                'required' => array( 0 => 'projects_related', 1 => 'equals', 2 => '1' ),
            ),
            array(
                'id'      => 'portfolio_slug',
                'type'    => 'text',
                'title'   => esc_html__('Portfolio Slug', 'mrittik'),
                'default' => '',
                'desc'     => 'Default: portfolio',
            ),
            array(
                'id'      => 'portfolio_name',
                'type'    => 'text',
                'title'   => esc_html__('Portfolio Name', 'mrittik'),
                'default' => '',
                'desc'     => 'Default: Portfolio',
            ),
            array(
                'id'      => 'portfolio_category_slug',
                'type'    => 'text',
                'title'   => esc_html__('Portfolio Category Slug', 'mrittik'),
                'default' => '',
                'desc'     => 'Default: portfolio-category',
            ),
            array(
                'id'      => 'portfolio_category_name',
                'type'    => 'text',
                'title'   => esc_html__('Portfolio Category Name', 'mrittik'),
                'default' => '',
                'desc'     => 'Default: Portfolio Categories',
            ),
            array(
                'id'    => 'archive_portfolio_link',
                'type'  => 'select',
                'title' => esc_html__( 'Custom Archive Page Link', 'mrittik' ),
                'data'  => 'page',
                'args'  => array(
                    'post_type'      => 'page',
                    'posts_per_page' => -1,
                    'orderby'        => 'title',
                    'order'          => 'ASC',
                ),
            ),
        )
    ));

    /*--------------------------------------------------------------
    # Woocommerce
    --------------------------------------------------------------*/
    if(class_exists('Woocommerce')) {
        Redux::setSection($opt_name, array(
            'title' => esc_html__('Woocommerce', 'mrittik'),
            'icon'  => 'el el-shopping-cart',
            'fields'     => array_merge(
                mrittik_sidebar_pos_opts([ 'prefix' => 'shop_']),
                array(
                    array(
                        'title'         => esc_html__('Products displayed per row', 'mrittik'),
                        'id'            => 'products_columns',
                        'type'          => 'slider',
                        'subtitle'      => esc_html__('Number product to show per row', 'mrittik'),
                        'default'       => 3,
                        'min'           => 2,
                        'step'          => 1,
                        'max'           => 6,
                        'display_value' => 'text'
                    ),
                    array(
                        'title'         => esc_html__('Products displayed per page', 'mrittik'),
                        'id'            => 'product_per_page',
                        'type'          => 'slider',
                        'subtitle'      => esc_html__('Number product to show', 'mrittik'),
                        'default'       => 9,
                        'min'           => 3,
                        'step'          => 1,
                        'max'           => 50,
                        'display_value' => 'text'
                    ),
                ),
                mrittik_shop_opts()
            )
        ));

        Redux::setSection($opt_name, array(
            'title'      => esc_html__('Single Product', 'mrittik'),
            'icon'       => 'el el-shopping-cart',
            'subsection' => true,
            'fields'     => array_merge(
                mrittik_sidebar_pos_opts([ 'prefix' => 'product_']),
                array(
                    array(
                        'id'       => 'product_title',
                        'type'     => 'switch',
                        'title'    => esc_html__('Product Title', 'mrittik'),
                        'default'  => true
                    ),
                    array(
                        'id'       => 'product_social_share',
                        'type'     => 'switch',
                        'title'    => esc_html__('Social Share', 'mrittik'),
                        'default'  => false
                    ),
                    array(
                        'id'       => 'product_related',
                        'title'    => esc_html__('Product Related', 'mrittik'),
                        'subtitle' => esc_html__('Show/Hide related product', 'mrittik'),
                        'type'     => 'switch',
                        'default'  => '1',
                    ),
                    array(
                        'id'      => 'product_related_title',
                        'type'    => 'text',
                        'title'   => esc_html__('Related Title', 'mrittik'),
                        'default' => '',
                        'placeholder' => esc_html__('Related Products', 'mrittik'),
                        'required' => array( 0 => 'product_related', 1 => 'equals', 2 => '1' ),
                    ),
                    array(
                        'id'       => 'product_variation_style',
                        'type'     => 'button_set',
                        'title'    => esc_html__('Product Variation Style', 'mrittik'),
                        'subtitle' => esc_html__('Dropdown or selected list', 'mrittik'),
                        'options' => array(
                            'dropdown'  => esc_html__('Dropdown', 'mrittik'),
                            'list' => esc_html__('List', 'mrittik')
                        ),
                        'default' => 'dropdown'
                    ),
                ),
                mrittik_shop_single_opts()
            )
        ));
    }
    /*--------------------------------------------------------------
    # Typography
    --------------------------------------------------------------*/
    Redux::setSection($opt_name, array(
        'title'  => esc_html__('Typography', 'mrittik'),
        'icon'   => 'el-icon-text-width',
        'fields' => array(
            array(
                'id'          => 'font_body',
                'type'        => 'typography',
                'title'       => esc_html__('Body', 'mrittik'),
                'google'      => true,
                'font-backup' => true,
                'all_styles'  => true,
                'line-height'  => true,
                'font-size'  => true,
                'text-align'  => false,
                'output'      => array('body'),
                'units'       => 'px',
            ),
            array(
                'id'          => 'font_h1',
                'type'        => 'typography',
                'title'       => esc_html__('Heading 1', 'mrittik'),
                'google'      => true,
                'font-backup' => true,
                'all_styles'  => true,
                'text-align'  => false,
                'output'      => array('h1'),
                'units'       => 'px',
            ),
            array(
                'id'          => 'font_h2',
                'type'        => 'typography',
                'title'       => esc_html__('Heading 2', 'mrittik'),
                'google'      => true,
                'font-backup' => true,
                'all_styles'  => true,
                'text-align'  => false,
                'output'      => array('h2'),
                'units'       => 'px',
            ),
            array(
                'id'          => 'font_h3',
                'type'        => 'typography',
                'title'       => esc_html__('Heading 3', 'mrittik'),
                'google'      => true,
                'font-backup' => true,
                'all_styles'  => true,
                'text-align'  => false,
                'output'      => array('h3'),
                'units'       => 'px',
            ),
            array(
                'id'          => 'font_h4',
                'type'        => 'typography',
                'title'       => esc_html__('Heading 4', 'mrittik'),
                'google'      => true,
                'font-backup' => true,
                'all_styles'  => true,
                'text-align'  => false,
                'output'      => array('h4'),
                'units'       => 'px',
            ),
            array(
                'id'          => 'font_h5',
                'type'        => 'typography',
                'title'       => esc_html__('Heading 5', 'mrittik'),
                'google'      => true,
                'font-backup' => true,
                'all_styles'  => true,
                'text-align'  => false,
                'output'      => array('h5'),
                'units'       => 'px',
            ),
            array(
                'id'          => 'font_h6',
                'type'        => 'typography',
                'title'       => esc_html__('Heading 6', 'mrittik'),
                'google'      => true,
                'font-backup' => true,
                'all_styles'  => true,
                'text-align'  => false,
                'output'      => array('h6'),
                'units'       => 'px',
            ),
        )
    ));
}