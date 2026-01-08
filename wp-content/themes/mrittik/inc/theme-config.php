<?php
// make some configs
if(!function_exists('mrittik_configs')){
    function mrittik_configs($value){

        $configs = [
            'theme_colors' => [
                'primary'   => [
                    'title' => esc_html__('Primary', 'mrittik').' ('.mrittik()->get_opt('primary_color', '#000000').')',
                    'value' => mrittik()->get_opt('primary_color', '#000000')
                ],
                'secondary'   => [
                    'title' => esc_html__('Secondary', 'mrittik').' ('.mrittik()->get_opt('secondary_color', '#A6A182').')',
                    'value' => mrittik()->get_opt('secondary_color', '#A6A182')
                ],
                'third'   => [
                    'title' => esc_html__('Third', 'mrittik').' ('.mrittik()->get_opt('third_color', '#54595F').')',
                    'value' => mrittik()->get_opt('third_color', '#54595F')
                ],
                'fourth'   => [
                    'title' => esc_html__('Fourth', 'mrittik').' ('.mrittik()->get_opt('fourth_color', '#FFFFFF').')',
                    'value' => mrittik()->get_opt('fourth_color', '#FFFFFF')
                ],
                'fifth'   => [
                    'title' => esc_html__('Fifth', 'mrittik').' ('.mrittik()->get_opt('fifth_color', '#999999').')',
                    'value' => mrittik()->get_opt('fifth_color', '#999999')
                ],
                'sixth'   => [
                    'title' => esc_html__('Sixth', 'mrittik').' ('.mrittik()->get_opt('sixth_color', '#1B1B1B').')',
                    'value' => mrittik()->get_opt('sixth_color', '#1B1B1B')
                ],
                'bglight'   => [
                    'title' => esc_html__('Background Light', 'mrittik').' ('.mrittik()->get_opt('bg_light_color', '#FFFFFF').')',
                    'value' => mrittik()->get_opt('bg_light_color', '#FFFFFF')
                ],
                'bgdark'   => [
                    'title' => esc_html__('Background Dark', 'mrittik').' ('.mrittik()->get_opt('bg_dark_color', '#1B1B1B').')',
                    'value' => mrittik()->get_opt('bg_dark_color', '#1B1B1B')
                ],
                'gridlight'   => [
                    'title' => esc_html__('Grid Light', 'mrittik').' ('.mrittik()->get_opt('bg_grid_light', '#E6E6E6').')',
                    'value' => mrittik()->get_opt('bg_grid_light', '#E6E6E6')
                ],
                'griddark'   => [
                    'title' => esc_html__('Grid Dark', 'mrittik').' ('.mrittik()->get_opt('bg_grid_dark', '#2e2e2e').')',
                    'value' => mrittik()->get_opt('bg_grid_dark', '#2e2e2e')
                ]
            ],
            'link' => [
                'color' => mrittik()->get_opt('link_color', ['regular' => '#999999'])['regular'],
                'color-hover'   => mrittik()->get_opt('link_color', ['hover' => '#A6A182'])['hover'],
                'color-active'  => mrittik()->get_opt('link_color', ['active' => '#A6A182'])['active'],
            ],
            'gradient' => [
                'color-from' => mrittik()->get_opt('gradient_color', ['from' => '#999999'])['from'],
                'color-to' => mrittik()->get_opt('gradient_color', ['to' => '#A6A182'])['to'],
            ],

        ];
        return $configs[$value];
    }
}
if(!function_exists('mrittik_inline_styles')) {
    function mrittik_inline_styles() {

        $theme_colors      = mrittik_configs('theme_colors');
        $link_color        = mrittik_configs('link');
        $gradient_color    = mrittik_configs('gradient');

        ob_start();
        echo ':root{';

            foreach ($theme_colors as $color => $value) {
                printf('--%1$s-color: %2$s;', str_replace('#', '',$color),  $value['value']);
            }
            foreach ($theme_colors as $color => $value) {
                printf('--%1$s-color-rgb: %2$s;', str_replace('#', '',$color),  mrittik_hex_rgb($value['value']));
            }
            foreach ($link_color as $color => $value) {
                printf('--link-%1$s: %2$s;', $color, $value);
            }
            foreach ($gradient_color as $color => $value) {
                printf('--gradient-%1$s: %2$s;', $color, $value);
            }
        echo '}';

        return ob_get_clean();

    }
}
