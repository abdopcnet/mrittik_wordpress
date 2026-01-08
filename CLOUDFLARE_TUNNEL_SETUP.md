# دليل إعداد Cloudflare Tunnel لموقع WordPress

هذا الدليل يشرح كيفية إعداد موقع WordPress المحلي للعمل على الإنترنت باستخدام Cloudflare Tunnel.

## المتطلبات الأساسية

1. حساب Cloudflare (مجاني)
2. تثبيت `cloudflared` على الخادم المحلي
3. موقع WordPress يعمل محلياً

## خطوات الإعداد

### 1. تثبيت Cloudflared

#### على Linux:
```bash
# تحميل cloudflared
wget https://github.com/cloudflare/cloudflared/releases/latest/download/cloudflared-linux-amd64.deb

# تثبيته
sudo dpkg -i cloudflared-linux-amd64.deb
```

#### أو باستخدام snap:
```bash
sudo snap install cloudflared
```

### 2. تسجيل الدخول إلى Cloudflare

```bash
cloudflared tunnel login
```

سيتم فتح متصفح لتفويض Cloudflare Tunnel.

### 3. إنشاء Tunnel جديد

```bash
# إنشاء tunnel جديد
cloudflared tunnel create wordpress-tunnel

# سيتم إنشاء UUID للـ tunnel - احفظه
```

### 4. إعداد ملف التكوين

أنشئ ملف تكوين في `~/.cloudflared/config.yml`:

```yaml
tunnel: YOUR_TUNNEL_UUID
credentials-file: /home/YOUR_USERNAME/.cloudflared/YOUR_TUNNEL_UUID.json

ingress:
  # توجيه حركة المرور إلى WordPress المحلي
  - hostname: your-domain.com
    service: http://localhost:80
  
  # أو إذا كان WordPress يعمل على منفذ آخر
  # - hostname: your-domain.com
  #   service: http://localhost:8080
  
  # قاعدة افتراضية (يجب أن تكون في النهاية)
  - service: http_status:404
```

**ملاحظة:** إذا لم يكن لديك نطاق، يمكنك استخدام عنوان Cloudflare Tunnel المجاني:
```yaml
tunnel: YOUR_TUNNEL_UUID
credentials-file: /home/YOUR_USERNAME/.cloudflared/YOUR_TUNNEL_UUID.json

ingress:
  - service: http://localhost:80
```

### 5. ربط النطاق (اختياري - إذا كان لديك نطاق)

```bash
cloudflared tunnel route dns wordpress-tunnel your-domain.com
```

### 6. تشغيل Tunnel

#### تشغيل مؤقت (للاختبار):
```bash
cloudflared tunnel run wordpress-tunnel
```

#### تشغيل كخدمة (للعمل الدائم):

```bash
# تثبيت كخدمة systemd
sudo cloudflared service install

# تشغيل الخدمة
sudo systemctl start cloudflared
sudo systemctl enable cloudflared
```

### 7. إعدادات WordPress المطلوبة

تم إضافة الإعدادات التالية في `wp-config.php`:

- **اكتشاف IP الحقيقي للزوار** من Cloudflare
- **تفعيل HTTPS** عند استخدام Cloudflare Tunnel مع HTTPS
- **إعدادات Proxy** للعمل خلف Cloudflare

#### إذا كنت تستخدم نطاق مخصص:

1. افتح `wp-config.php`
2. ابحث عن السطور التالية وقم بتعديلها:
```php
define('WP_HOME', 'https://your-domain.com');
define('WP_SITEURL', 'https://your-domain.com');
```

3. أو قم بتعديلها من لوحة تحكم WordPress:
   - Settings → General
   - WordPress Address (URL)
   - Site Address (URL)

### 8. إعدادات إضافية في Cloudflare Dashboard

1. اذهب إلى [Cloudflare Dashboard](https://dash.cloudflare.com)
2. اختر نطاقك
3. SSL/TLS → Overview → اختر "Full" أو "Full (strict)"
4. SSL/TLS → Edge Certificates → تفعيل "Always Use HTTPS"

## التحقق من الإعداد

1. تأكد من أن WordPress يعمل محلياً على `http://localhost:80`
2. شغّل Tunnel: `cloudflared tunnel run wordpress-tunnel`
3. افتح المتصفح واذهب إلى عنوان Tunnel أو النطاق المخصص
4. يجب أن ترى موقع WordPress

## استكشاف الأخطاء

### المشكلة: الموقع لا يعمل
- تأكد من أن WordPress يعمل محلياً
- تحقق من أن المنفذ صحيح في ملف التكوين
- تأكد من أن Tunnel يعمل: `cloudflared tunnel list`

### المشكلة: مشاكل في HTTPS
- تأكد من تفعيل HTTPS في Cloudflare Dashboard
- تحقق من إعدادات `WP_HOME` و `WP_SITEURL` في WordPress

### المشكلة: مشاكل في الصور والملفات
- تأكد من أن `WP_HOME` و `WP_SITEURL` مضبوطة بشكل صحيح
- امسح الكاش في WordPress

### المشكلة: مشاكل في تسجيل الدخول
- تأكد من أن HTTPS مفعّل
- تحقق من إعدادات الكوكيز في WordPress

## الأمان

⚠️ **تحذيرات مهمة:**

1. **لا تعرض قاعدة البيانات مباشرة** - WordPress فقط يجب أن يكون متاحاً
2. **استخدم كلمات مرور قوية** لـ WordPress
3. **فعّل HTTPS** دائماً
4. **استخدم Cloudflare Access** (اختياري) لحماية لوحة التحكم
5. **احتفظ بنسخ احتياطية** من قاعدة البيانات والملفات

## إعدادات متقدمة

### حماية لوحة التحكم باستخدام Cloudflare Access

1. في Cloudflare Dashboard → Zero Trust
2. Access → Applications → Add an application
3. أضف قاعدة لحماية `/wp-admin`

### استخدام Tunnel بدون نطاق مخصص

Cloudflare Tunnel يوفر عنوان مجاني مثل:
`https://random-words-1234.trycloudflare.com`

يمكنك استخدامه مباشرة بدون إعداد DNS.

## الدعم

- [وثائق Cloudflare Tunnel](https://developers.cloudflare.com/cloudflare-one/connections/connect-apps/)
- [دعم WordPress](https://wordpress.org/support/)
