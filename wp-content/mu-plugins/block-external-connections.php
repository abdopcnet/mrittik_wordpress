<?php
/**
 * Plugin Name: Block All External Connections
 * Description: Blocks all external HTTP connections except localhost. Prevents theme updater, plugin downloads, and API calls.
 * Version: 1.0
 * Author: System
 */

// Block all external HTTP requests
add_filter('pre_http_request', 'block_all_external_requests', 999, 3);

function block_all_external_requests($preempt, $args, $url) {
    // Allow localhost and local IPs
    $parsed_url = parse_url($url);
    $host = isset($parsed_url['host']) ? $parsed_url['host'] : '';
    
    // Allow localhost
    if (in_array($host, ['localhost', '127.0.0.1', '::1'])) {
        return false; // Allow request
    }
    
    // Allow local IP addresses (192.168.x.x, 10.x.x.x, 172.16-31.x.x)
    if (preg_match('/^(192\.168\.|10\.|172\.(1[6-9]|2[0-9]|3[0-1])\.)/', $host)) {
        return false; // Allow request
    }
    
    // Block all other external requests
    return new WP_Error('http_request_failed', 'External connections are disabled. Request blocked: ' . $host);
}

// Disable theme updater - run early to prevent initialization
add_action('plugins_loaded', 'disable_theme_updater_early', 1);
add_action('admin_init', 'disable_theme_updater', 1);

function disable_theme_updater_early() {
    // Prevent theme updater class from being loaded
    if (class_exists('Mrittik_Register')) {
        remove_action('admin_init', array('Mrittik_Register', 'updater'), 14);
    }
}

function disable_theme_updater() {
    // Remove theme updater actions
    global $wp_filter;
    
    // Remove Mrittik_Register updater
    if (isset($wp_filter['admin_init'])) {
        foreach ($wp_filter['admin_init']->callbacks as $priority => $callbacks) {
            foreach ($callbacks as $callback) {
                if (is_array($callback['function']) && 
                    isset($callback['function'][0]) && 
                    is_object($callback['function'][0]) &&
                    get_class($callback['function'][0]) === 'Mrittik_Register' &&
                    $callback['function'][1] === 'updater') {
                    remove_action('admin_init', $callback['function'], $priority);
                }
            }
        }
    }
    
    // Disable EDD theme updater if exists
    if (class_exists('EDD_Theme_Updater_Admin')) {
        remove_action('admin_init', array('EDD_Theme_Updater_Admin', 'updater'), 14);
    }
    
    // Prevent updater class instantiation
    add_filter('pre_site_transient_update_themes', function($value) {
        return false;
    }, 999);
}

// Disable automatic plugin downloads from external API
add_filter('tgmpa_load_bulk_installer', '__return_false', 999);

// Override TGM Plugin Activation to use local plugins only
add_filter('tgmpa_plugin_action_links', 'disable_external_plugin_downloads', 999, 2);

function disable_external_plugin_downloads($action_links, $plugin) {
    // If plugin source is external URL, remove install link
    if (isset($plugin['source']) && (strpos($plugin['source'], 'http://') === 0 || strpos($plugin['source'], 'https://') === 0)) {
        // Check if plugin is already installed
        if (file_exists(WP_PLUGIN_DIR . '/' . $plugin['slug'])) {
            // Plugin exists, allow activation
            return $action_links;
        } else {
            // Plugin doesn't exist, remove install link
            return array();
        }
    }
    return $action_links;
}

// Override plugin URL to use local path
add_filter('pxl_server_info', 'override_bravisthemes_urls', 999);

function override_bravisthemes_urls($infos) {
    // Replace all external URLs with local/empty values
    $infos['api_url'] = '';
    $infos['plugin_url'] = ''; // Will use local plugin directory instead
    $infos['demo_url'] = home_url(); // Use local site URL
    $infos['docs_url'] = '#';
    $infos['support_url'] = '#';
    $infos['help_url'] = '#';
    
    return $infos;
}

// Disable WordPress.org API calls (optional - uncomment if you want to block WordPress.org too)
// add_filter('pre_http_request', function($preempt, $args, $url) {
//     if (strpos($url, 'wordpress.org') !== false || strpos($url, 'api.wordpress.org') !== false) {
//         return new WP_Error('http_request_failed', 'WordPress.org API calls are disabled');
//     }
//     return $preempt;
// }, 999, 3);

// Disable automatic updates
add_filter('automatic_updater_disabled', '__return_true');
add_filter('auto_update_theme', '__return_false');
add_filter('auto_update_plugin', '__return_false');
add_filter('auto_update_core', '__return_false');

// Disable update checks
remove_action('admin_init', '_maybe_update_core');
remove_action('admin_init', '_maybe_update_plugins');
remove_action('admin_init', '_maybe_update_themes');

// Disable WordPress.org API calls for updates
add_filter('pre_site_transient_update_core', '__return_null');
add_filter('pre_site_transient_update_plugins', '__return_null');
add_filter('pre_site_transient_update_themes', '__return_null');

// Log blocked requests (for debugging)
add_action('admin_notices', 'show_blocked_connections_notice');

function show_blocked_connections_notice() {
    if (current_user_can('manage_options')) {
        echo '<div class="notice notice-info is-dismissible">';
        echo '<p><strong>External Connections Blocked:</strong> All external HTTP requests are disabled. The site is running in offline mode.</p>';
        echo '</div>';
    }
}
