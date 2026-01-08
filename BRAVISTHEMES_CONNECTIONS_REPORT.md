# Report: Bravisthemes.com Connections in Mrittik Theme

## Summary
This report analyzes all connections and references to `bravisthemes.com` domains in the Mrittik theme.

---

## Active Connections (HTTP Requests)

### 1. **API Connection - Plugin Downloads**
**Location:** `/wp-content/themes/mrittik/inc/admin/admin-require-plugins.php`
- **URL:** `https://api.bravisthemes.com/plugins/`
- **Purpose:** Downloads "Bravis Addons" plugin
- **When:** During plugin installation via TGM Plugin Activation
- **Status:** ⚠️ **ACTIVE** - Theme tries to download plugins from this URL

**Code:**
```php
$pxl_server_info = apply_filters( 'pxl_server_info', ['plugin_url' => 'https://api.bravisthemes.com/plugins/'] );
$default_path = $pxl_server_info['plugin_url'];
```

---

### 2. **Theme Updater API**
**Location:** `/wp-content/themes/mrittik/inc/admin/updater/updater-class.php`
- **URL:** `http://api.bravisthemes.com/`
- **Purpose:** Checks for theme updates
- **When:** Periodically checks for theme updates
- **Status:** ⚠️ **ACTIVE** - Uses `wp_remote_get()` to check for updates

**Code:**
```php
$response = wp_remote_get( $this->remote_api_url, array( 'timeout' => 15, 'body' => $api_params ) );
```

---

### 3. **Theme Registration API**
**Location:** `/wp-content/themes/mrittik/inc/admin/updater/register-admin.php`
- **URL:** `http://api.bravisthemes.com/`
- **Purpose:** Theme registration and license verification
- **When:** When registering/activating theme license
- **Status:** ⚠️ **ACTIVE** - Uses `wp_remote_get()` for license verification

**Code:**
```php
$response = wp_remote_get(
    add_query_arg( $api_params, $this->remote_api_url ),
    array( 'timeout' => 15, 'sslverify' => false )
);
```

---

## Display-Only References (No Active Connections)

### 4. **Demo URL (Display Only)**
**Locations:**
- `/wp-content/themes/mrittik/inc/theme-filters.php` (line 14)
- `/wp-content/themes/mrittik/inc/admin/views/admin-tabs.php` (line 12)
- `/wp-content/themes/mrittik/inc/admin/demo-data/demo-config.php` (line 10)

**URL:** `https://demo.bravisthemes.com/mrittik/`
- **Purpose:** Link to demo site in admin panel
- **Status:** ✅ **DISPLAY ONLY** - Just a link, no HTTP requests
- **Usage:** Shown in theme admin dashboard as "View Demo" button

---

### 5. **Documentation URLs (Display Only)**
**Location:** `/wp-content/themes/mrittik/inc/theme-filters.php`
- **URLs:** 
  - `https://doc.bravisthemes.com/mrittik/`
  - `https://doc.bravisthemes.com/`
- **Purpose:** Links to documentation
- **Status:** ✅ **DISPLAY ONLY** - Just links in admin panel

---

### 6. **Support URL (Display Only)**
**Location:** `/wp-content/themes/mrittik/inc/theme-filters.php`
- **URL:** `https://bravisthemes.ticksy.com/`
- **Purpose:** Link to support ticket system
- **Status:** ✅ **DISPLAY ONLY** - Just a link

---

## Files That Make HTTP Requests

### Files Using `wp_remote_get()` or `wp_remote_post()`:

1. **`inc/admin/updater/updater-class.php`** (line 114)
   - Connects to: `http://api.bravisthemes.com/`
   - Purpose: Check for theme updates

2. **`inc/admin/updater/register-admin.php`** (line 289)
   - Connects to: `http://api.bravisthemes.com/`
   - Purpose: License verification

3. **`inc/admin/admin-require-plugins.php`** (line 10)
   - Uses: `https://api.bravisthemes.com/plugins/`
   - Purpose: Download Bravis Addons plugin (via TGM Plugin Activation)

---

## Recommendations

### Option 1: Block External Connections (Recommended for Offline Use)
If you want to prevent all external connections:

1. **Block API requests** in `wp-config.php`:
```php
define('WP_HTTP_BLOCK_EXTERNAL', true);
define('WP_ACCESSIBLE_HOSTS', 'api.wordpress.org,downloads.wordpress.org');
```

2. **Disable theme updater** by removing or commenting out the updater class initialization.

### Option 2: Keep Connections (For Updates & Plugin Downloads)
If you want to keep theme updates and plugin downloads working:
- Keep current setup
- Ensure `WP_HTTP_BLOCK_EXTERNAL` is `false` in `wp-config.php`

### Option 3: Replace Demo URL References
If you want to remove demo URL references (they're display-only):
- Modify `inc/theme-filters.php` to change `demo_url` to your site URL
- This won't affect functionality, only admin panel links

---

## Current Status

✅ **No active connections to `demo.bravisthemes.com`** - It's only used for display links

⚠️ **Active connections to `api.bravisthemes.com`**:
- Theme update checks
- Plugin downloads (Bravis Addons)
- License verification

---

## Testing

To verify if theme is making connections:

1. **Check WordPress debug log:**
```bash
tail -f /var/log/apache2/error.log | grep bravisthemes
```

2. **Monitor network requests:**
```bash
# Install tcpdump or use browser DevTools Network tab
```

3. **Check WordPress transients:**
```sql
SELECT * FROM wp_options WHERE option_name LIKE '%bravisthemes%' OR option_name LIKE '%_transient%';
```

---

**Last Updated:** January 2026
**Theme Version:** Mrittik 1.0.6
