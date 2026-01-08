<?php
/**
 * Plugin Name: Fix WordPress URLs - Dynamic Site/Home URLs
 * Description: Dynamically sets WordPress site_url() and home_url() based on current HTTP_HOST, ensuring correct URLs for both local and external access.
 * Version: 1.0
 * Author: System
 */

// Override site_url() and home_url() to use current request URL
add_filter('site_url', 'fix_wordpress_site_url', 1);
add_filter('home_url', 'fix_wordpress_home_url', 1);
add_filter('option_siteurl', 'fix_wordpress_option_url', 1);
add_filter('option_home', 'fix_wordpress_option_url', 1);

function fix_wordpress_site_url($url, $path = '', $scheme = null) {
    return fix_wordpress_dynamic_url($url, 'siteurl');
}

function fix_wordpress_home_url($url, $path = '', $scheme = null) {
    return fix_wordpress_dynamic_url($url, 'home');
}

function fix_wordpress_option_url($value) {
    // Only override if we're in a web request (not CLI)
    if (php_sapi_name() === 'cli' || !isset($_SERVER['HTTP_HOST'])) {
        return $value;
    }
    
    // Prevent infinite loop - don't process if value is already correct
    $host = $_SERVER['HTTP_HOST'];
    $parsed = parse_url($value);
    if (isset($parsed['host']) && $parsed['host'] === $host) {
        return $value; // Already correct
    }
    
    return fix_wordpress_dynamic_url($value, 'option');
}

function fix_wordpress_dynamic_url($url, $type = 'home') {
    // Only process in web context
    if (php_sapi_name() === 'cli' || !isset($_SERVER['HTTP_HOST'])) {
        return $url;
    }
    
    $host = $_SERVER['HTTP_HOST'];
    
    // Determine protocol
    $protocol = 'http';
    if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
        $protocol = 'https';
    } elseif (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') {
        $protocol = 'https';
    } elseif (isset($_SERVER['HTTP_CF_VISITOR']) && strpos($_SERVER['HTTP_CF_VISITOR'], '"scheme":"https"') !== false) {
        $protocol = 'https';
    }
    
    // Build new base URL
    $new_base_url = $protocol . '://' . $host;
    
    // Extract path from URL
    $parsed = parse_url($url);
    $path = isset($parsed['path']) ? $parsed['path'] : '';
    $query = isset($parsed['query']) ? '?' . $parsed['query'] : '';
    $fragment = isset($parsed['fragment']) ? '#' . $parsed['fragment'] : '';
    
    // If URL is relative or already correct, return as is
    // But if it's a full URL with different domain, check if we should replace
    if (isset($parsed['host']) && $parsed['host'] !== $host) {
        // If it's the old local IP, replace with current host
        if ($parsed['host'] === '192.168.100.130') {
            return $new_base_url . $path . $query . $fragment;
        }
        
        // Also check if URL contains the old IP in the string
        if (strpos($url, '192.168.100.130') !== false) {
            $url = str_replace('https://192.168.100.130', $new_base_url, $url);
            $url = str_replace('http://192.168.100.130', $new_base_url, $url);
            return $url;
        }
    }
    
    // If URL contains 192.168.100.130 anywhere, replace it
    if (strpos($url, '192.168.100.130') !== false) {
        $url = str_replace('https://192.168.100.130', $new_base_url, $url);
        $url = str_replace('http://192.168.100.130', $new_base_url, $url);
        return $url;
    }
    
    return $url;
}

// Also fix permalinks and post links
add_filter('post_link', 'fix_wordpress_dynamic_url', 999);
add_filter('page_link', 'fix_wordpress_dynamic_url', 999);
add_filter('post_type_link', 'fix_wordpress_dynamic_url', 999);
add_filter('term_link', 'fix_wordpress_dynamic_url', 999);
add_filter('attachment_link', 'fix_wordpress_dynamic_url', 999);
add_filter('get_permalink', 'fix_wordpress_dynamic_url', 999);
