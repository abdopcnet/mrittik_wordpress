<?php

if (!class_exists('Mrittik_Page')) {

    class Mrittik_Page
    {
        public function get_site_loader(){

            $site_loader = mrittik()->get_theme_opt( 'site_loader', false );
            $loader_style = mrittik()->get_theme_opt( 'loader_style', 'style-text' );
            $loading_text = mrittik()->get_theme_opt( 'loading_text' );

            $loading_page = mrittik()->get_page_opt( 'loading_page', '-1');
            $loading_type_page = mrittik()->get_page_opt( 'loader_style', 'style-text');
            $loading_text_page = mrittik()->get_page_opt( 'loading_text', '' );

            if($loading_page == 'bd') {
                $loader_style = $loading_type_page;
            }
            if($loading_page == 'bd' && ($loading_type_page == 'style-text' || $loading_type_page == 'style-text-blend') ) {
                $loading_text = $loading_text_page;
            }

            if($site_loader) { ?>
                <div id="pxl-loadding" class="pxl-loader <?php echo esc_attr($loader_style); ?>">
                    <div class="pxl-loader-inner">
                        <?php switch ($loader_style) {
                            case 'style-text': ?>
                                <div class="preloader-inner">
                                    <div class="spinner"></div>
                                    <?php if(!empty($loading_text)) { ?>
                                        <div class="loading-text">
                                            <?php $characters = mb_str_split($loading_text);
                                            foreach ($characters as $character) {
                                                $encoded_character = htmlspecialchars($character, ENT_COMPAT, 'UTF-8', false);
                                                echo '<span data-text="' . $encoded_character . '">' . $encoded_character . '</span>';
                                            }
                                            ?>
                                        </div>
                                    <?php } ?>
                                </div>
                            <?php break;

                            case 'style-text-blend': ?>
                                <div class="preloader-inner">
                                    <?php if(!empty($loading_text)) { ?>
                                        <div class="loading-text">
                                            <span><?php echo esc_attr($loading_text, 'mrittik'); ?></span>
                                        </div>
                                    <?php } ?>
                                </div>
                            <?php break;

                            case 'style-home-assistant': ?>
                                <div class="preloader-inner">
                                    <svg class="ha-logo loading" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10 10">
                                        <path class="house" d="M1.9 8.5V5.3h-1l4-4.3 2.2 2.1v-.6h1v1.7l1 1.1H7.9v3.2z" />
                                        <path class="circut" d="M5 8.5V4m0 3.5l1.6-1.6V4.3M5 6.3L3.5 4.9v-.6m2.7.7l.4.4L7 5M5.9 6.1v.5h.5M4.2 5v.5h-.8m1 1.5v.6h-.6m1.2.8L3.6 6.7M5 8.4l1-.9h.7M4.6 3.6L5 4l.4-.4" />
                                        <g>
                                            <circle cx="5.5" cy="3.4" r="0.21" />
                                            <circle cx="4.5" cy="3.4" r="0.21" />
                                            <circle cx="6.6" cy="4.1" r="0.21" />
                                            <circle cx="3.5" cy="4.1" r="0.21" />
                                            <circle cx="4.2" cy="4.8" r="0.21" />
                                            <circle cx="6.1" cy="4.8" r="0.21" />
                                            <circle cx="7.1" cy="4.8" r="0.21" />
                                            <circle cx="6.6" cy="6.6" r="0.21" />
                                            <circle cx="5.9" cy="5.9" r="0.21" />
                                            <circle cx="3.2" cy="5.5" r="0.21" />
                                            <circle cx="3.5" cy="6.5" r="0.21" />
                                            <circle cx="4.4" cy="6.8" r="0.21" />
                                            <circle cx="3.6" cy="7.6" r="0.21" />
                                            <circle cx="6.9" cy="7.5" r="0.21" />
                                        </g>
                                    </svg>
                                </div>
                            <?php break;

                            default: ?>
                                <div class="loader-triangle">
                                    <svg viewBox="0 0 86 80">
                                        <polygon points="43 8 79 72 7 72"></polygon>
                                    </svg>
                                </div>
                            <?php break;
                        } ?>
                    </div>
                </div>
            <?php }
        }

        public function get_link_pages() {
            wp_link_pages( array(
                'before'      => '<div class="page-links">',
                'after'       => '</div>',
                'link_before' => '<span>',
                'link_after'  => '</span>',
            ) );
        }

        public function get_page_title(){
            $pt_mode = mrittik()->get_opt('pt_mode');
            if( $pt_mode == 'none' ) return;
            $ptitle_layout = (int)mrittik()->get_opt('ptitle_layout');
            $titles = $this->get_title();
            if ($pt_mode == 'bd' && $ptitle_layout > 0 && class_exists('Pxltheme_Core') && is_callable( 'Elementor\Plugin::instance' )) {
                ?>
                <div id="pxl-page-title-elementor">
                    <?php echo Elementor\Plugin::$instance->frontend->get_builder_content_for_display( $ptitle_layout);?>
                </div>
                <?php
            } else {
                $ptitle_breadcrumb_on = mrittik()->get_opt( 'ptitle_breadcrumb_on', '1' ); ?>
                <div id="pxl-page-title-default">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="pxl-page-title-inner">
                                    <h2 class="pxl-page-title"><?php echo mrittik_html($titles['title']) ?></h2>
                                    <?php if($ptitle_breadcrumb_on == '1') : ?>
                                        <?php $this->get_breadcrumb(); ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }
        }

        public function get_title() {
            $title = '';
            // Default titles
            if ( ! is_archive() ) {
                // Posts page view
                if ( is_home() ) {
                    // Only available if posts page is set.
                    if ( ! is_front_page() && $page_for_posts = get_option( 'page_for_posts' ) ) {
                        $title = get_post_meta( $page_for_posts, 'custom_title', true );
                        if ( empty( $title ) ) {
                            $title = get_the_title( $page_for_posts );
                        }
                    }
                    if ( is_front_page() ) {
                        $title = esc_html__( 'Blog', 'mrittik' );
                    }
                } // Single page view
                elseif ( is_page() ) {
                    $title = get_post_meta( get_the_ID(), 'custom_title', true );
                    if ( ! $title ) {
                        $title = get_the_title();
                    }
                } elseif ( is_404() ) {
                    $title = esc_html__( '404', 'mrittik' );
                } elseif ( is_search() ) {
                    $title = esc_html__( 'Search results', 'mrittik' );
                } elseif ( is_singular('lp_course') ) {
                    $title = esc_html__( 'Course', 'mrittik' );
                } else {
                    $title = get_post_meta( get_the_ID(), 'custom_title', true );
                    if ( ! $title ) {
                        $title = get_the_title();
                    }
                }
            } else {
                $title = get_the_archive_title();
                if( (class_exists( 'WooCommerce' ) && is_shop()) ) {
                    $title = get_post_meta( wc_get_page_id('shop'), 'custom_title', true );
                    if(!$title) {
                        $title = get_the_title( get_option( 'woocommerce_shop_page_id' ) );
                    }
                }
            }

            return array(
                'title' => $title,
            );
        }

        public function get_breadcrumb(){

            if ( ! class_exists( 'Mrittik_Breadcrumb' ) )
            {
                return;
            }

            $breadcrumb = new Mrittik_Breadcrumb();
            $entries = $breadcrumb->get_entries();

            if ( empty( $entries ) )
            {
                return;
            }

            ob_start();

            foreach ( $entries as $entry )
            {
                $entry = wp_parse_args( $entry, array(
                    'label' => '',
                    'url'   => ''
                ) );

                if ( empty( $entry['label'] ) )
                {
                    continue;
                }

                echo '<li>';

                if ( ! empty( $entry['url'] ) )
                {
                    printf(
                        '<a class="breadcrumb-entry" data-hover="%2$s" href="%1$s">%2$s</a>',
                        esc_url( $entry['url'] ),
                        esc_attr( $entry['label'] )
                    );
                }
                else
                {
                    printf( '<span class="breadcrumb-entry" >%s</span>', esc_html( $entry['label'] ) );
                }

                echo '</li>';
            }

            $output = ob_get_clean();

            if ( $output )
            {
                printf( '<ul class="pxl-breadcrumb">%s</ul>', wp_kses_post($output));
            }
        }

        public function get_pagination( $query = null, $ajax = false ){

            if($ajax){
                add_filter('paginate_links', 'mrittik_ajax_paginate_links');
            }

            $classes = array();

            if ( empty( $query ) )
            {
                $query = $GLOBALS['wp_query'];
            }

            if ( empty( $query->max_num_pages ) || ! is_numeric( $query->max_num_pages ) || $query->max_num_pages < 2 )
            {
                return;
            }

            $paged = $query->get( 'paged', '' );

            if ( ! $paged && is_front_page() && ! is_home() )
            {
                $paged = $query->get( 'page', '' );
            }

            $paged = $paged ? intval( $paged ) : 1;

            $pagenum_link = html_entity_decode( get_pagenum_link() );
            $query_args   = array();
            $url_parts    = explode( '?', $pagenum_link );

            if ( isset( $url_parts[1] ) )
            {
                wp_parse_str( $url_parts[1], $query_args );
            }

            $pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
            $pagenum_link = trailingslashit( $pagenum_link ) . '%_%';
            $paginate_links_args = array(
                'base'     => $pagenum_link,
                'total'    => $query->max_num_pages,
                'current'  => $paged,
                'mid_size' => 1,
                'add_args' => array_map( 'urlencode', $query_args ),
            );
            if($ajax){
                $paginate_links_args['format'] = '?page=%#%';
            }
            $links = paginate_links( $paginate_links_args );
            if ( $links ):
            ?>
            <nav class="pxl-pagination-wrap <?php echo esc_attr($ajax?'ajax':''); ?>">
                <div class="pxl-pagination-links">
                    <?php
                        echo wp_kses_post($links);
                    ?>
                </div>
            </nav>
            <?php
            endif;
        }
    }
}
