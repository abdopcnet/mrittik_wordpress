<?php

if (!class_exists('Mrittik_Footer')) {

    class Mrittik_Footer
    {
        public function getFooter()
        {
            if(is_singular('elementor_library')) return;
            $disable_footer = mrittik()->get_page_opt('disable_footer','0');
            $footer_layout = (int)mrittik()->get_opt('footer_layout');

            if($disable_footer == '1') return;
            if ($footer_layout <= 0 || !class_exists('Pxltheme_Core') || !is_callable( 'Elementor\Plugin::instance' )) {
                get_template_part( 'template-parts/footer/default');
            } else {
                $args = [
                    'footer_layout' => $footer_layout
                ];
                get_template_part( 'template-parts/footer/elementor','', $args );
            }

        }

    }
}
