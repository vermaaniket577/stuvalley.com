# MySQL Database Setup for XAMPP

## Step 1: Start MySQL in XAMPP
1. Open XAMPP Control Panel
2. Click "Start" next to MySQL
3. Wait for it to show "Running" status

## Step 2: Create Database via phpMyAdmin

### Option A: Using phpMyAdmin (Easiest)
1. Open your browser and go to: http://localhost/phpmyadmin
2. Click on "New" in the left sidebar
3. Database name: `stuvalley_db`
4. Collation: `utf8mb4_unicode_ci`
5. Click "Create"

### Option B: Using SQL Tab in phpMyAdmin
1. Go to http://localhost/phpmyadmin
2. Click on "SQL" tab at the top
3. Paste this SQL and click "Go":

```sql
CREATE DATABASE IF NOT EXISTS stuvalley_db 
CHARACTER SET utf8mb4 
COLLATE utf8mb4_unicode_ci;
```

## Step 3: Run Migrations

After creating the database, run this command in your terminal:

```bash
php artisan migrate:fresh --seed
```

This will:
- Create all database tables
- Import your existing data from SQLite (if needed)

## Step 4: Verify Connection

Check if the connection works:

```bash
php artisan db:show
```

You should see MySQL information instead of SQLite.

## ✅ Configuration Already Done

Your `.env` file has been updated with:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=stuvalley_db
DB_USERNAME=root
DB_PASSWORD=
```

## Troubleshooting

### Error: "Access denied for user 'root'@'localhost'"
**Solution**: Your MySQL has a password. Update `.env`:
```
DB_PASSWORD=your_mysql_password
```

### Error: "SQLSTATE[HY000] [2002] No connection could be made"
**Solution**: MySQL is not running. Start it in XAMPP Control Panel.

### Error: "Unknown database 'stuvalley_db'"
**Solution**: Create the database using phpMyAdmin (Step 2).

## Migration Data from SQLite to MySQL (Optional)

If you want to keep your existing blog posts and data:

1. Export data from SQLite:
```bash
php artisan db:seed --class=ExportSqliteData
```

2. Or manually copy important records via phpMyAdmin

---

**Next Step**: Please create the database using phpMyAdmin, then I'll run the migrations for you!
