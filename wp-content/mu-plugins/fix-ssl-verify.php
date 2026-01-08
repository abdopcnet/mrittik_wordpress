<?php
/**
 * Plugin Name: Fix SSL Verification
 * Description: Fixes SSL certificate verification issues for WordPress API calls
 * Version: 1.0
 * Author: System
 */

// Fix SSL verification for WordPress API calls
add_filter('https_ssl_verify', '__return_true', 999);
add_filter('https_local_ssl_verify', '__return_false', 999);

// Allow WordPress to connect to external APIs
add_filter('http_request_args', function($args, $url) {
    // Allow connections to WordPress.org
    if (strpos($url, 'wordpress.org') !== false || 
        strpos($url, 'api.wordpress.org') !== false ||
        strpos($url, 'downloads.wordpress.org') !== false) {
        $args['sslverify'] = true;
        $args['timeout'] = 30;
        $args['user-agent'] = 'WordPress/' . get_bloginfo('version') . '; ' . get_bloginfo('url');
    }
    return $args;
}, 10, 2);

// Fix HTTP API transport issues
add_filter('http_api_transports', function($transports) {
    // Ensure cURL is preferred
    if (function_exists('curl_init')) {
        return array('curl', 'streams');
    }
    return $transports;
}, 10, 1);

// Increase timeout for WordPress.org API calls
add_filter('http_request_timeout', function($timeout) {
    return 30;
}, 10, 1);

// Fix blocked external requests
add_filter('block_local_requests', '__return_false', 999);
