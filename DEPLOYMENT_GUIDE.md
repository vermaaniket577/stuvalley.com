# 🚀 Deployment Guide - Stuvalley Technology Website

## ✅ Pre-Deployment Checklist

Your project is now **PRODUCTION READY** with the following optimizations:
- ✅ Frontend assets compiled and minified (`npm run build`)
- ✅ Configuration cached (`php artisan config:cache`)
- ✅ Routes cached (`php artisan route:cache`)
- ✅ Blade views cached (`php artisan view:cache`)

---

## 📦 What to Upload to Your Server

### Required Files & Folders:
```
✅ /app
✅ /bootstrap
✅ /config
✅ /database
✅ /public (IMPORTANT: This is your web root)
✅ /resources
✅ /routes
✅ /storage
✅ /vendor (or run composer install on server)
✅ .env (configure for production)
✅ artisan
✅ composer.json
✅ composer.lock
```

### ❌ Do NOT Upload:
```
❌ /node_modules (not needed, assets are built)
❌ .env.example
❌ /tests
❌ .git
```

---

## 🔧 Server Requirements

- **PHP**: 8.1 or higher
- **MySQL**: 5.7+ or MariaDB 10.3+
- **Extensions**: 
  - OpenSSL
  - PDO
  - Mbstring
  - Tokenizer
  - XML
  - Ctype
  - JSON
  - BCMath

---

## 📝 Step-by-Step Deployment

### 1. Upload Files
Upload all required files to your server via FTP/SFTP or Git.

### 2. Set Web Root
Point your domain to the `/public` folder (not the root directory).

**Example for cPanel:**
- Go to "Domains" → Select your domain
- Set "Document Root" to: `/home/username/public_html/public`

### 3. Configure Environment (.env)

Create/edit `.env` file on the server:

```env
APP_NAME="Stuvalley Technology"
APP_ENV=production
APP_KEY=base64:YOUR_KEY_HERE
APP_DEBUG=false
APP_URL=https://yourdomain.com

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password

MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your-email@gmail.com
MAIL_PASSWORD=your-app-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=noreply@yourdomain.com
MAIL_FROM_NAME="${APP_NAME}"
```

### 4. Generate Application Key (if needed)
```bash
php artisan key:generate
```

### 5. Set Permissions
```bash
chmod -R 755 storage
chmod -R 755 bootstrap/cache
```

Or for shared hosting:
```bash
chmod -R 775 storage
chmod -R 775 bootstrap/cache
```

### 6. Run Migrations
```bash
php artisan migrate --force
```

### 7. Create Storage Link
```bash
php artisan storage:link
```

### 8. Clear & Cache (Production)
```bash
php artisan optimize
```

---

## 🔐 Security Checklist

- [ ] Set `APP_DEBUG=false` in `.env`
- [ ] Set `APP_ENV=production` in `.env`
- [ ] Use strong `APP_KEY`
- [ ] Use HTTPS (SSL Certificate)
- [ ] Secure database credentials
- [ ] Set proper file permissions (755/644)
- [ ] Hide `.env` file from public access

---

## 🌐 Hosting Recommendations

### Option 1: Shared Hosting (Beginner-Friendly)
- **Hostinger** - Laravel optimized
- **SiteGround** - Good support
- **Namecheap** - Budget-friendly

**Steps:**
1. Upload files via FTP
2. Import database via phpMyAdmin
3. Update `.env` with database credentials
4. Point domain to `/public` folder

### Option 2: VPS/Cloud (Professional)
- **DigitalOcean** - $6/month
- **Linode** - $5/month
- **AWS Lightsail** - $3.50/month

**Steps:**
1. SSH into server
2. Install LAMP/LEMP stack
3. Clone repository or upload files
4. Run composer install
5. Configure Nginx/Apache
6. Set up SSL with Let's Encrypt

### Option 3: Platform as a Service (Easiest)
- **Laravel Forge** - $12/month (automates everything)
- **Ploi** - $10/month
- **Cloudways** - Managed hosting

---

## 🔄 Post-Deployment Updates

When you make changes locally and want to deploy:

```bash
# 1. Build assets
npm run build

# 2. Upload changed files

# 3. On server, clear cache:
php artisan optimize:clear
php artisan optimize
```

---

## 🐛 Troubleshooting

### Issue: 500 Internal Server Error
**Solution:**
```bash
php artisan optimize:clear
chmod -R 755 storage bootstrap/cache
```

### Issue: CSS/JS not loading
**Solution:**
- Check if `/public/build` folder exists
- Verify `.htaccess` is uploaded
- Clear browser cache

### Issue: Database connection error
**Solution:**
- Verify `.env` database credentials
- Check if database exists
- Test connection via phpMyAdmin

### Issue: Images not displaying
**Solution:**
```bash
php artisan storage:link
chmod -R 755 storage/app/public
```

---

## 📞 Support

If you encounter issues:
1. Check Laravel logs: `storage/logs/laravel.log`
2. Enable debug temporarily: `APP_DEBUG=true`
3. Check server error logs

---

## ✨ Your Project is Ready!

Your website is now optimized and ready for production deployment. Follow the steps above based on your hosting type.

**Good luck with your launch! 🎉**
