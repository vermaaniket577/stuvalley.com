# 🚀 Deployment Instructions for Stuvalley.com

This guide contains everything you need to take your website live on a production server (like CPanel, VPS, or Shared Hosting).

---

## 📦 1. Your Deployment Package
I have created a file named: **`stuvalley_deploy.zip`** in your project folder.
This zip contains:
- All source code
- The `vendor` folder (so you don't need to run composer on the server)
- Optimized configuration

---

## 🛠️ 2. On the Live Server
1. **Upload**: Upload `stuvalley_deploy.zip` to your server's root or `public_html` (depending on your host).
2. **Extract**: Exact the files.
3. **Domain Pointing**:
   - If using **CPanel**, ensure your domain points to the `/public` folder inside the extracted project.
   - Alternatively, move the contents of the `/public` folder to `public_html` and update `index.php`.

---

## 🔑 3. Environment Configuration (.env)
Create a `.env` file on your server and use these **Production Settings**:

```env
APP_NAME="Stuvalley Technology"
APP_ENV=production
APP_DEBUG=false
APP_URL=https://stuvalley.com

# Database Connection
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_live_db_name
DB_USERNAME=your_live_db_user
DB_PASSWORD=your_live_db_password

# Filesystem (Crucial for Images)
FILESYSTEM_DISK=public
```

---

## 🖼️ 4. Handling Uploaded Images
Since you now have an **Image Upload** feature, you must ensure the server can display them:

1. **Storage Link**:
   In your server terminal (or via a Cron Job / Link tool), run:
   ```bash
   php artisan storage:link
   ```
   *This creates a shortcut between the private storage folder and the public website.*

2. **Permissions**:
   Ensure the following folders are "Writable" (Permission 755 or 775):
   - `storage`
   - `bootstrap/cache`

---

## ✅ 5. Final Checklist
- [ ] Run `php artisan migrate` on the server to create the tables.
- [ ] Check if the **WhatsApp** button appears (it should default to `9425455499`).
- [ ] Test the **Blog Image Upload** in the admin panel.
- [ ] Ensure `APP_DEBUG` is set to `false` (very important for security!).

---

**Everything is ready! Just upload the zip and follow these steps.** 🚀
