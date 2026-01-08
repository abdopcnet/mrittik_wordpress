<?php
/**
 * Plugin Name: Fix CORS Images - Replace Demo URLs with Local URLs
 * Description: Replaces demo.bravisthemes.com image URLs with local WordPress URLs to fix CORS issues.
 * Version: 1.1
 * Author: System
 */

// Prevent infinite loops
if (!function_exists('fix_cors_demo_image_urls')) {
    // Replace demo URLs in content output
    add_filter('the_content', 'fix_cors_demo_image_urls', 999);
    add_filter('widget_text', 'fix_cors_demo_image_urls', 999);
    
    function fix_cors_demo_image_urls($content) {
        if (empty($content) || !is_string($content)) {
            return $content;
        }
        
        // Only process if demo URL exists
        if (strpos($content, 'demo.bravisthemes.com') === false) {
            return $content;
        }
        
        // Get current request URL instead of siteurl option (not cached)
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
        
        // Replace demo URLs
        $content = str_replace('https://demo.bravisthemes.com/mrittik', $local_url, $content);
        $content = str_replace('http://demo.bravisthemes.com/mrittik', $local_url, $content);
        
        // Also replace local IP URLs with current domain
        if (strpos($content, '192.168.100.130') !== false) {
            $content = str_replace('https://192.168.100.130', $local_url, $content);
            $content = str_replace('http://192.168.100.130', $local_url, $content);
        }
        
        return $content;
    }
}

// Replace URLs in attachment URLs (but avoid recursion)
if (!function_exists('fix_cors_demo_urls_in_attachments')) {
    add_filter('wp_get_attachment_url', 'fix_cors_demo_urls_in_attachments', 999);
    
    function fix_cors_demo_urls_in_attachments($url) {
        if (empty($url)) {
            return $url;
        }
        
        // Use current request URL
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
        
        // Replace demo URLs
        if (strpos($url, 'demo.bravisthemes.com') !== false) {
            $path = preg_replace('#https?://demo\.bravisthemes\.com/mrittik(/.*)#', '$1', $url);
            if ($path !== $url) {
                return $local_url . $path;
            }
        }
        
        // Replace local IP URLs
        if (strpos($url, '192.168.100.130') !== false) {
            $path = preg_replace('#https?://192\.168\.100\.130(/.*)#', '$1', $url);
            if ($path !== $url) {
                return $local_url . $path;
            }
        }
        
        return $url;
    }
}

// Replace URLs in image srcset
if (!function_exists('fix_cors_demo_urls_in_srcset')) {
    add_filter('wp_calculate_image_srcset', 'fix_cors_demo_urls_in_srcset', 999, 5);
    
    function fix_cors_demo_urls_in_srcset($sources, $size_array, $image_src, $image_meta, $attachment_id) {
        if (!is_array($sources)) {
            return $sources;
        }
        
        // Use current request URL (not cached)
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
        
        foreach ($sources as &$source) {
            if (isset($source['url'])) {
                // Replace demo URLs
                if (strpos($source['url'], 'demo.bravisthemes.com') !== false) {
                    $path = preg_replace('#https?://demo\.bravisthemes\.com/mrittik(/.*)#', '$1', $source['url']);
                    if ($path !== $source['url']) {
                        $source['url'] = $local_url . $path;
                    }
                }
                // Replace local IP URLs
                elseif (strpos($source['url'], '192.168.100.130') !== false) {
                    $path = preg_replace('#https?://192\.168\.100\.130(/.*)#', '$1', $source['url']);
                    if ($path !== $source['url']) {
                        $source['url'] = $local_url . $path;
                    }
                }
            }
        }
        return $sources;
    }
}

// Replace URLs in JavaScript output (client-side)
add_action('wp_head', 'fix_cors_demo_urls_in_js', 999);
add_action('wp_footer', 'fix_cors_demo_urls_in_js', 999);

function fix_cors_demo_urls_in_js() {
    static $output_done = false;
    if ($output_done) {
        return;
    }
    $output_done = true;
    
    // Use current request URL
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
    ?>
    <script type="text/javascript">
    (function() {
        document.addEventListener('DOMContentLoaded', function() {
            var localUrl = '<?php echo esc_js($local_url); ?>';
            
            // Replace demo URLs and local IP URLs in img src attributes
            var images = document.querySelectorAll('img[src*="demo.bravisthemes.com"], img[src*="192.168.100.130"]');
            images.forEach(function(img) {
                var src = img.getAttribute('src');
                if (src) {
                    src = src.replace(/https?:\/\/demo\.bravisthemes\.com\/mrittik/g, localUrl);
                    src = src.replace(/https?:\/\/192\.168\.100\.130/g, localUrl);
                    img.src = src;
                }
            });
            
            // Replace demo URLs and local IP URLs in background images
            var elements = document.querySelectorAll('[style*="demo.bravisthemes.com"], [style*="192.168.100.130"]');
            elements.forEach(function(el) {
                var style = el.getAttribute('style');
                if (style) {
                    style = style.replace(/https?:\/\/demo\.bravisthemes\.com\/mrittik/g, localUrl);
                    style = style.replace(/https?:\/\/192\.168\.100\.130/g, localUrl);
                    el.style.cssText = style;
                }
            });
            
            // Also handle data attributes
            var dataElements = document.querySelectorAll('[data-bg*="demo.bravisthemes.com"], [data-src*="demo.bravisthemes.com"], [data-bg*="192.168.100.130"], [data-src*="192.168.100.130"]');
            dataElements.forEach(function(el) {
                if (el.hasAttribute('data-bg')) {
                    var bg = el.getAttribute('data-bg');
                    bg = bg.replace(/https?:\/\/demo\.bravisthemes\.com\/mrittik/g, localUrl);
                    bg = bg.replace(/https?:\/\/192\.168\.100\.130/g, localUrl);
                    el.setAttribute('data-bg', bg);
                }
                if (el.hasAttribute('data-src')) {
                    var src = el.getAttribute('data-src');
                    src = src.replace(/https?:\/\/demo\.bravisthemes\.com\/mrittik/g, localUrl);
                    src = src.replace(/https?:\/\/192\.168\.100\.130/g, localUrl);
                    el.setAttribute('data-src', src);
                }
            });
        });
    })();
    </script>
    <?php
}

// Replace URLs in image attributes
if (!function_exists('fix_cors_demo_urls_in_image_attributes')) {
    add_filter('wp_get_attachment_image_attributes', 'fix_cors_demo_urls_in_image_attributes', 999, 3);
    
    function fix_cors_demo_urls_in_image_attributes($attr, $attachment, $size) {
        if (!is_array($attr)) {
            return $attr;
        }
        
        // Use current request URL (not cached)
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
        
        foreach ($attr as $key => $value) {
            if (is_string($value)) {
                // Replace demo URLs
                if (strpos($value, 'demo.bravisthemes.com') !== false) {
                    $attr[$key] = str_replace('https://demo.bravisthemes.com/mrittik', $local_url, $value);
                    $attr[$key] = str_replace('http://demo.bravisthemes.com/mrittik', $local_url, $attr[$key]);
                }
                // Replace local IP URLs
                if (strpos($attr[$key], '192.168.100.130') !== false) {
                    $attr[$key] = str_replace('https://192.168.100.130', $local_url, $attr[$key]);
                    $attr[$key] = str_replace('http://192.168.100.130', $local_url, $attr[$key]);
                }
            }
        }
        return $attr;
    }
}
