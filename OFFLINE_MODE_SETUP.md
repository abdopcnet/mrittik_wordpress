# Offline Mode Setup - Complete Documentation

## Overview
This WordPress installation is now configured to run completely offline with **NO external connections**. All external HTTP requests are blocked.

---

## What Was Configured

### 1. **wp-config.php Changes**
- `WP_HTTP_BLOCK_EXTERNAL = true` - Blocks all external HTTP requests
- `WP_ACCESSIBLE_HOSTS = 'localhost,127.0.0.1'` - Only allows localhost connections

### 2. **Must-Use Plugin: block-external-connections.php**
This plugin provides additional blocking at the WordPress level:

#### Features:
- ✅ Blocks all external HTTP requests (except localhost)
- ✅ Disables theme updater (prevents connection to `api.bravisthemes.com`)
- ✅ Disables automatic WordPress updates
- ✅ Disables plugin downloads from external APIs
- ✅ Overrides Bravisthemes URLs to local/empty values
- ✅ Prevents update checks for core, themes, and plugins

---

## What Is Blocked

### ❌ Blocked Connections:
- `api.bravisthemes.com` - Theme updates & plugin downloads
- `demo.bravisthemes.com` - Demo site (already display-only)
- `doc.bravisthemes.com` - Documentation links
- `wordpress.org` - WordPress updates (optional, can be enabled)
- All other external domains

### ✅ Allowed Connections:
- `localhost` / `127.0.0.1` - Local server only
- Local IP addresses (192.168.x.x, 10.x.x.x, 172.16-31.x.x)

---

## Installed Plugins (All Local)

All required plugins are already installed locally:

1. ✅ **Bravis Addons** - Installed
2. ✅ **Redux Framework** - Installed
3. ✅ **Elementor** - Installed
4. ✅ **Contact Form 7** - Installed
5. ✅ **WooCommerce** - Installed
6. ✅ **Revolution Slider** - Installed
7. ✅ **WPC AJAX Add to Cart** - Installed
8. ✅ **Variation Swatches for WooCommerce** - Installed
9. ✅ **WPC Smart Compare** - Installed
10. ✅ **WPC Smart Quick View** - Installed
11. ✅ **WPC Smart Wishlist** - Installed

**No external downloads needed!**

---

## Testing Offline Mode

### Test 1: Block External Connection
```php
$result = wp_remote_get('https://api.bravisthemes.com/');
// Should return: WP_Error with message "External connections are disabled"
```

### Test 2: Verify Local Connection Works
```php
$result = wp_remote_get('http://localhost/');
// Should work (if local server is running)
```

---

## How to Re-enable External Connections (If Needed)

### Option 1: Temporary (for testing)
Comment out in `wp-config.php`:
```php
// define('WP_HTTP_BLOCK_EXTERNAL', true);
define('WP_HTTP_BLOCK_EXTERNAL', false);
```

### Option 2: Permanent
1. Delete or rename: `/wp-content/mu-plugins/block-external-connections.php`
2. Change `WP_HTTP_BLOCK_EXTERNAL` to `false` in `wp-config.php`
3. Clear WordPress cache

---

## Admin Panel Changes

### Theme Dashboard
- "View Demo" link now points to your local site
- Plugin download links are disabled (plugins already installed)
- Update notifications are hidden

### Update Checks
- No automatic update checks
- No update notifications
- Theme updater is completely disabled

---

## Security Benefits

1. **No Data Leakage** - Site cannot send data to external servers
2. **No Unauthorized Updates** - Prevents automatic theme/plugin updates
3. **Privacy** - No connection logs to external servers
4. **Control** - Complete control over what the site can access

---

## Troubleshooting

### Issue: "Plugin installation failed"
**Solution:** All required plugins are already installed. If you need a new plugin, install it manually via FTP or disable offline mode temporarily.

### Issue: "Theme update check failed"
**Solution:** This is expected behavior. Theme updates are disabled in offline mode.

### Issue: "Cannot connect to WordPress.org"
**Solution:** This is expected. To allow WordPress.org connections, modify `block-external-connections.php` and uncomment the WordPress.org filter.

---

## Files Modified

1. `/wp-config.php` - Added `WP_HTTP_BLOCK_EXTERNAL = true`
2. `/wp-content/mu-plugins/block-external-connections.php` - New plugin (created)

## Files NOT Modified (Theme Files)
- Theme files remain unchanged
- All functionality preserved
- Only external connections are blocked

---

## Status Check

Run this command to verify offline mode:
```bash
cd /var/www/html/wordpress
php -r "require 'wp-load.php'; \$result = wp_remote_get('https://api.bravisthemes.com/'); echo is_wp_error(\$result) ? 'OFFLINE MODE: Active ✅' : 'WARNING: External connections allowed ❌';"
```

Expected output: `OFFLINE MODE: Active ✅`

---

**Last Updated:** January 2026
**Status:** ✅ Fully Offline - No External Connections
