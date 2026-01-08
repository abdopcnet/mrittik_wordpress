# WordPress Site Documentation

## 📋 Overview

This is a WordPress installation configured to work with Cloudflare Tunnel for secure external access while maintaining local HTTP access.

**Site URL:** `https://mrittik.future-support.online`  
**Local URL:** `http://192.168.100.130`

---

## 🚀 Quick Start

### Access the Site

- **External (HTTPS):** https://mrittik.future-support.online
- **Local (HTTP):** http://192.168.100.130
- **Admin Panel:** http://192.168.100.130/wp-admin/

---

## 🛠️ Custom Commands

The following custom commands are available in the terminal:

### `commit`
Commits and pushes changes file by file to Git repository.

```bash
cd /var/www/html/wordpress
commit
```

**What it does:**
- Configures Git user settings
- Commits each changed file individually
- Pushes to `origin main` with force

---

### `build`
Repairs WordPress file permissions and reloads Apache.

```bash
build
```

**What it does:**
- Fixes file ownership (www-data:www-data)
- Sets correct permissions (755 for directories, 644 for files)
- Secures wp-config.php (600)
- Reloads Apache configuration

---

### `restart`
Restarts WordPress-related services.

```bash
restart
```

**What it does:**
- Restarts Apache
- Restarts MySQL
- Restarts Cloudflare Tunnel

---

## 📁 Important Files

### Configuration Files

- **`wp-config.php`** - WordPress configuration
  - Cloudflare Tunnel settings
  - SSL/HTTPS detection
  - API connection settings

- **`.htaccess`** - Apache rewrite rules
  - WordPress permalink structure
  - wp-login redirect

### Custom Scripts

- **`/root/commit.py`** - Git commit automation
- **`/root/build.py`** - Permission repair and rebuild
- **`/root/restart.py`** - Service restart automation

### Must-Use Plugins

- **`wp-content/mu-plugins/fix-ssl-verify.php`** - Fixes SSL verification for WordPress.org API

---

## ⚙️ Configuration Details

### Cloudflare Tunnel

The site is configured to work behind Cloudflare Tunnel:

- **External access:** Uses HTTPS automatically
- **Local access:** Uses HTTP (no forced redirect)
- **IP detection:** Correctly detects visitor IP from Cloudflare

### WordPress URLs

- **External:** `https://mrittik.future-support.online`
- **Local:** Auto-detected from request (allows HTTP)

### File Permissions

Standard WordPress permissions:
- **Directories:** 755
- **Files:** 644
- **wp-config.php:** 600 (secure)
- **wp-content:** 755 (writable)

---

## 🔧 Troubleshooting

### Plugin Installation Not Working

If you see "An unexpected error occurred" when installing plugins:

1. Check that the fix-ssl-verify plugin is active (must-use)
2. Verify internet connection from server
3. Run `build` to fix permissions
4. Clear browser cache

### Can't Access wp-admin

If wp-admin redirects to HTTPS when accessing locally:

1. Access via: `http://192.168.100.130/wp-admin/`
2. The configuration allows HTTP for local IPs
3. If still redirecting, check wp-config.php settings

### Services Not Starting

If services fail to start:

```bash
# Check service status
sudo systemctl status apache2
sudo systemctl status mysql
sudo systemctl status cloudflared

# Restart all services
restart
```

---

## 📝 Maintenance

### Regular Tasks

1. **Update WordPress:**
   - Dashboard → Updates
   - Or via WP-CLI

2. **Backup:**
   - Database: `mysqldump wordpress_db > backup.sql`
   - Files: `tar -czf wordpress-backup.tar.gz /var/www/html/wordpress`

3. **Fix Permissions:**
   ```bash
   build
   ```

4. **Update Plugins/Themes:**
   - Dashboard → Updates
   - Or via WP-CLI

---

## 🔐 Security Notes

- `wp-config.php` has secure permissions (600)
- Cloudflare Tunnel provides SSL/TLS encryption
- WordPress API connections are secured
- File permissions follow WordPress best practices

---

## 📞 Support

For issues or questions:

1. Check the troubleshooting section above
2. Review WordPress logs: `/var/log/apache2/error.log`
3. Check Cloudflare Tunnel logs: `journalctl -u cloudflared`

---

## 📄 License

WordPress is licensed under the GPL v2 or later.

See `license.txt` for full license details.

---

**Last Updated:** January 2026
