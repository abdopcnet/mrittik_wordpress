<?php

if (!class_exists('Mrittik_Header')) {

    class Mrittik_Header
    {
        public function getHeader()
        {
            $header_layout = (int) mrittik()->get_opt('header_layout');
            $header_layout_sticky = (int) mrittik()->get_opt('header_layout_sticky');
            $header_mobile_layout = (int) mrittik()->get_opt('header_mobile_layout');

            $disable_header_layout = mrittik()->get_page_opt('disable_header_layout', '0');
            $disable_header_sticky = mrittik()->get_page_opt('disable_header_sticky', '0');
            $disable_header_mobile_layout = mrittik()->get_page_opt('disable_header_mobile_layout', '0');

            $args = [];

            if ($header_layout <= 0 || !class_exists('Pxltheme_Core') || !is_callable( 'Elementor\Plugin::instance' )) {
                get_template_part( 'template-parts/header/default');
            } else {

                $args = [
                    'header_layout' => $header_layout,
                    'header_layout_sticky' => $header_layout_sticky,
                    'header_mobile_layout' => $header_mobile_layout
                ];

                if ($disable_header_layout === '1') {
                    unset($args['header_layout']);
                }
                if ($disable_header_sticky === '1') {
                    unset($args['header_layout_sticky']);
                }
                if ($disable_header_mobile_layout === '1') {
                    unset($args['header_mobile_layout']);
                }

                get_template_part( 'template-parts/header/elementor','', $args );

            }
        }

    }
}
