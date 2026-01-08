<?php
/**
 * Plugin Name: Fix Demo URLs in Database
 * Description: Replaces demo.bravisthemes.com URLs with local site URLs in database and runtime.
 * Version: 1.1
 * Author: System
 */

// Helper function to get local URL - uses current request URL (not cached to allow per-request changes)
if (!function_exists('get_fix_demo_local_url')) {
    function get_fix_demo_local_url() {
        // Use current request URL instead of siteurl option
        $protocol = 'http';
        if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
            $protocol = 'https';
        } elseif (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') {
            $protocol = 'https';
        } elseif (isset($_SERVER['HTTP_CF_VISITOR']) && strpos($_SERVER['HTTP_CF_VISITOR'], '"scheme":"https"') !== false) {
            $protocol = 'https';
        }
        
        $host = isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : 'localhost';
        return $protocol . '://' . $host;
    }
}

// Replace URLs in permalinks and post URLs
add_filter('post_link', 'fix_demo_urls_in_links', 999);
add_filter('page_link', 'fix_demo_urls_in_links', 999);
add_filter('post_type_link', 'fix_demo_urls_in_links', 999);
add_filter('term_link', 'fix_demo_urls_in_links', 999);
add_filter('attachment_link', 'fix_demo_urls_in_links', 999);
add_filter('get_permalink', 'fix_demo_urls_in_links', 999);
add_filter('home_url', 'fix_demo_urls_in_links', 999);
add_filter('site_url', 'fix_demo_urls_in_links', 999);

function fix_demo_urls_in_links($url) {
    if (empty($url) || !is_string($url)) {
        return $url;
    }
    
    $local_url = get_fix_demo_local_url();
    
    // Replace demo URLs
    if (strpos($url, 'demo.bravisthemes.com') !== false) {
        $url = str_replace('https://demo.bravisthemes.com/mrittik', $local_url, $url);
        $url = str_replace('http://demo.bravisthemes.com/mrittik', $local_url, $url);
    }
    
    // Replace local IP URLs
    if (strpos($url, '192.168.100.130') !== false) {
        $url = str_replace('https://192.168.100.130', $local_url, $url);
        $url = str_replace('http://192.168.100.130', $local_url, $url);
    }
    
    return $url;
}

// Replace URLs in post meta (Elementor, Redux, etc.)
add_filter('get_post_metadata', 'fix_demo_urls_in_post_meta', 999, 4);

function fix_demo_urls_in_post_meta($value, $object_id, $meta_key, $single) {
    // Skip if value is null (let WordPress fetch from DB)
    if ($value === null) {
        return $value;
    }
    
    // Only process if value contains demo URL
    if (is_array($value) || is_string($value)) {
        $value_serialized = is_array($value) ? serialize($value) : $value;
        $local_url = get_fix_demo_local_url();
        
        if (strpos($value_serialized, 'demo.bravisthemes.com') !== false || strpos($value_serialized, '192.168.100.130') !== false) {
            if (is_array($value)) {
                $value = array_map_recursive(function($item) use ($local_url) {
                    if (is_string($item)) {
                        $item = str_replace(['https://demo.bravisthemes.com/mrittik', 'http://demo.bravisthemes.com/mrittik'], $local_url, $item);
                        $item = str_replace(['https://192.168.100.130', 'http://192.168.100.130'], $local_url, $item);
                        return $item;
                    }
                    return $item;
                }, $value);
            } elseif (is_string($value)) {
                $value = str_replace(['https://demo.bravisthemes.com/mrittik', 'http://demo.bravisthemes.com/mrittik'], $local_url, $value);
                $value = str_replace(['https://192.168.100.130', 'http://192.168.100.130'], $local_url, $value);
            }
        }
    }
    
    return $value;
}

// Replace URLs in Elementor data (serialized JSON)
add_filter('get_post_metadata', 'fix_demo_urls_in_elementor_data', 999, 4);

function fix_demo_urls_in_elementor_data($value, $object_id, $meta_key, $single) {
    if ($meta_key === '_elementor_data' && $value !== null) {
        $local_url = get_fix_demo_local_url();
        
        if (is_string($value)) {
            if (strpos($value, 'demo.bravisthemes.com') !== false || strpos($value, '192.168.100.130') !== false) {
                $value = str_replace(['https://demo.bravisthemes.com/mrittik', 'http://demo.bravisthemes.com/mrittik'], $local_url, $value);
                $value = str_replace(['https://192.168.100.130', 'http://192.168.100.130'], $local_url, $value);
            }
        } elseif (is_array($value)) {
            $value_serialized = serialize($value);
            if (strpos($value_serialized, 'demo.bravisthemes.com') !== false || strpos($value_serialized, '192.168.100.130') !== false) {
                $value = array_map_recursive(function($item) use ($local_url) {
                    if (is_string($item)) {
                        $item = str_replace(['https://demo.bravisthemes.com/mrittik', 'http://demo.bravisthemes.com/mrittik'], $local_url, $item);
                        $item = str_replace(['https://192.168.100.130', 'http://192.168.100.130'], $local_url, $item);
                        return $item;
                    }
                    return $item;
                }, $value);
            }
        }
    }
    return $value;
}

// Replace URLs in options (Redux Framework, theme options)
add_filter('option_redux', 'fix_demo_urls_in_options', 999);
add_filter('pre_option_redux', 'fix_demo_urls_in_options', 999);

function fix_demo_urls_in_options($value) {
    if (empty($value)) {
        return $value;
    }
    
    $value_serialized = is_array($value) ? serialize($value) : (string)$value;
    if (strpos($value_serialized, 'demo.bravisthemes.com') !== false || strpos($value_serialized, '192.168.100.130') !== false) {
        $local_url = get_fix_demo_local_url();
        
        if (is_array($value)) {
            $value = array_map_recursive(function($item) use ($local_url) {
                if (is_string($item)) {
                    $item = str_replace(['https://demo.bravisthemes.com/mrittik', 'http://demo.bravisthemes.com/mrittik'], $local_url, $item);
                    $item = str_replace(['https://192.168.100.130', 'http://192.168.100.130'], $local_url, $item);
                    return $item;
                }
                return $item;
            }, $value);
        } elseif (is_string($value)) {
            $value = str_replace(['https://demo.bravisthemes.com/mrittik', 'http://demo.bravisthemes.com/mrittik'], $local_url, $value);
            $value = str_replace(['https://192.168.100.130', 'http://192.168.100.130'], $local_url, $value);
        }
    }
    
    return $value;
}

// Helper function for recursive array mapping
if (!function_exists('array_map_recursive')) {
    function array_map_recursive($callback, $array) {
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $array[$key] = array_map_recursive($callback, $value);
            } else {
                $array[$key] = $callback($value);
            }
        }
        return $array;
    }
}

// Replace URLs in menu items
add_filter('wp_setup_nav_menu_item', 'fix_demo_urls_in_menu_items', 999);

function fix_demo_urls_in_menu_items($menu_item) {
    if (isset($menu_item->url)) {
        $local_url = get_fix_demo_local_url();
        
        // Replace demo URLs
        if (strpos($menu_item->url, 'demo.bravisthemes.com') !== false) {
            $menu_item->url = str_replace(['https://demo.bravisthemes.com/mrittik', 'http://demo.bravisthemes.com/mrittik'], $local_url, $menu_item->url);
        }
        
        // Replace local IP URLs
        if (strpos($menu_item->url, '192.168.100.130') !== false) {
            $menu_item->url = str_replace(['https://192.168.100.130', 'http://192.168.100.130'], $local_url, $menu_item->url);
        }
    }
    
    return $menu_item;
}

// Replace URLs in script output (for inline JavaScript)
add_filter('script_loader_src', 'fix_demo_urls_in_links', 999);
add_filter('style_loader_src', 'fix_demo_urls_in_links', 999);

// Replace URLs in output buffer (catch all)
add_action('template_redirect', 'fix_demo_urls_in_output_buffer', 1);

function fix_demo_urls_in_output_buffer() {
    if (!is_admin()) {
        ob_start('fix_demo_urls_in_output');
    }
}

function fix_demo_urls_in_output($buffer) {
    if (empty($buffer)) {
        return $buffer;
    }
    
    if (strpos($buffer, 'demo.bravisthemes.com') !== false || strpos($buffer, '192.168.100.130') !== false) {
        // Use current request URL (not cached, as it may change per request)
        $protocol = 'http';
        if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
            $protocol = 'https';
        } elseif (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') {
            $protocol = 'https';
        } elseif (isset($_SERVER['HTTP_CF_VISITOR']) && strpos($_SERVER['HTTP_CF_VISITOR'], '"scheme":"https"') !== false) {
            $protocol = 'https';
        }
        $host = isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : 'localhost';
        $local_url = $protocol . '://' . $host;
        
        // Replace demo URLs (normal and JSON escaped)
        $buffer = str_replace('https://demo.bravisthemes.com/mrittik', $local_url, $buffer);
        $buffer = str_replace('http://demo.bravisthemes.com/mrittik', $local_url, $buffer);
        $buffer = str_replace('https:\/\/demo.bravisthemes.com\/mrittik', str_replace('/', '\/', $local_url), $buffer);
        $buffer = str_replace('http:\/\/demo.bravisthemes.com\/mrittik', str_replace('/', '\/', $local_url), $buffer);
        
        // Replace local IP URLs (normal and JSON escaped)
        $buffer = str_replace('https://192.168.100.130', $local_url, $buffer);
        $buffer = str_replace('http://192.168.100.130', $local_url, $buffer);
        $buffer = str_replace('https:\/\/192.168.100.130', str_replace('/', '\/', $local_url), $buffer);
        $buffer = str_replace('http:\/\/192.168.100.130', str_replace('/', '\/', $local_url), $buffer);
    }
    
    return $buffer;
}
