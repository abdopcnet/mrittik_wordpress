<?php
/**
 * Plugin Name: Fix CORS Images - Replace Demo URLs with Local URLs
 * Description: Replaces demo.bravisthemes.com image URLs with local WordPress URLs to fix CORS issues.
 * Version: 1.0
 * Author: System
 */

// Replace demo URLs in content output
add_filter('the_content', 'fix_cors_demo_image_urls', 999);
add_filter('widget_text', 'fix_cors_demo_image_urls', 999);
add_filter('wp_get_attachment_image_src', 'fix_cors_demo_image_urls_array', 999, 4);

function fix_cors_demo_image_urls($content) {
    if (empty($content)) {
        return $content;
    }
    
    // Replace demo.bravisthemes.com URLs with local site URL
    $demo_url = 'https://demo.bravisthemes.com/mrittik';
    $local_url = site_url();
    
    // Replace full URLs
    $content = str_replace($demo_url, $local_url, $content);
    
    // Also handle http version
    $demo_url_http = 'http://demo.bravisthemes.com/mrittik';
    $content = str_replace($demo_url_http, $local_url, $content);
    
    return $content;
}

function fix_cors_demo_image_urls_array($image, $attachment_id, $size, $icon) {
    if (is_array($image) && isset($image[0])) {
        $image[0] = fix_cors_demo_image_urls($image[0]);
    }
    return $image;
}

// Replace URLs in theme options and meta data
add_filter('option_siteurl', 'fix_cors_demo_urls_in_options');
add_filter('option_home', 'fix_cors_demo_urls_in_options');
add_filter('wp_get_attachment_url', 'fix_cors_demo_urls_in_attachments', 999);
add_filter('wp_calculate_image_srcset', 'fix_cors_demo_urls_in_srcset', 999, 5);

function fix_cors_demo_urls_in_options($value) {
    if (is_string($value)) {
        $value = str_replace('https://demo.bravisthemes.com/mrittik', site_url(), $value);
        $value = str_replace('http://demo.bravisthemes.com/mrittik', site_url(), $value);
    }
    return $value;
}

function fix_cors_demo_urls_in_attachments($url) {
    if (strpos($url, 'demo.bravisthemes.com') !== false) {
        // Extract the path after /mrittik/
        $path = preg_replace('#https?://demo\.bravisthemes\.com/mrittik(/.*)#', '$1', $url);
        return site_url($path);
    }
    return $url;
}

function fix_cors_demo_urls_in_srcset($sources, $size_array, $image_src, $image_meta, $attachment_id) {
    if (is_array($sources)) {
        foreach ($sources as &$source) {
            if (isset($source['url']) && strpos($source['url'], 'demo.bravisthemes.com') !== false) {
                $source['url'] = fix_cors_demo_urls_in_attachments($source['url']);
            }
        }
    }
    return $sources;
}

// Replace URLs in JavaScript output
add_action('wp_head', 'fix_cors_demo_urls_in_js', 999);
add_action('wp_footer', 'fix_cors_demo_urls_in_js', 999);

function fix_cors_demo_urls_in_js() {
    ?>
    <script type="text/javascript">
    (function() {
        // Replace demo URLs in any JavaScript variables or data attributes
        if (typeof window !== 'undefined') {
            // This will be handled by the content filter above for most cases
            // But we can also add JavaScript-based replacement if needed
            document.addEventListener('DOMContentLoaded', function() {
                var images = document.querySelectorAll('img[src*="demo.bravisthemes.com"]');
                images.forEach(function(img) {
                    var src = img.getAttribute('src');
                    if (src) {
                        img.src = src.replace(/https?:\/\/demo\.bravisthemes\.com\/mrittik/g, '<?php echo esc_js(site_url()); ?>');
                    }
                });
                
                // Also handle background images
                var elements = document.querySelectorAll('[style*="demo.bravisthemes.com"]');
                elements.forEach(function(el) {
                    var style = el.getAttribute('style');
                    if (style) {
                        el.style.cssText = style.replace(/https?:\/\/demo\.bravisthemes\.com\/mrittik/g, '<?php echo esc_js(site_url()); ?>');
                    }
                });
            });
        }
    })();
    </script>
    <?php
}

// Replace URLs in CSS output
add_filter('style_loader_src', 'fix_cors_demo_urls_in_css', 999);
add_filter('wp_get_attachment_image_attributes', 'fix_cors_demo_urls_in_image_attributes', 999, 3);

function fix_cors_demo_urls_in_css($src) {
    if (strpos($src, 'demo.bravisthemes.com') !== false) {
        $src = str_replace('https://demo.bravisthemes.com/mrittik', site_url(), $src);
        $src = str_replace('http://demo.bravisthemes.com/mrittik', site_url(), $src);
    }
    return $src;
}

function fix_cors_demo_urls_in_image_attributes($attr, $attachment, $size) {
    if (is_array($attr)) {
        foreach ($attr as $key => $value) {
            if (is_string($value) && strpos($value, 'demo.bravisthemes.com') !== false) {
                $attr[$key] = str_replace('https://demo.bravisthemes.com/mrittik', site_url(), $value);
                $attr[$key] = str_replace('http://demo.bravisthemes.com/mrittik', site_url(), $attr[$key]);
            }
        }
    }
    return $attr;
}
