<!-- PROJECT SETUP INSTRUCTIONS -->

## ✅ Environment Setup Complete!

### Quick Start Guide

#### 1. **Configure Environment Variables**
Open `.env` file and update:
```env
# Database credentials
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=techworld_db
DB_USERNAME=root
DB_PASSWORD=your_password

# Mail settings
MAIL_USERNAME=your-email@gmail.com
MAIL_PASSWORD=your-app-password
```

#### 2. **Install Dependencies**
```bash
composer install
```

#### 3. **Database Setup**
- Import the database: `Database/techworld_db.sql`
- Or run manually:
```bash
mysql -u root -p techworld_db < Database/techworld_db.sql
```

#### 4. **File Permissions**
Ensure these folders are writable:
```bash
chmod -R 775 upload/
chmod -R 775 logs/
chmod -R 775 backup/
```

#### 5. **Security Keys**
Generate random keys for:
- `SECURITY_SALT`
- `JWT_SECRET`
- `ENCRYPTION_KEY`

Use: https://www.random.org/strings/ or `openssl rand -base64 32`

#### 6. **Test the Application**
```bash
php -S localhost:3000
```
Visit: http://localhost:3000

---

## 📁 Files Updated

✓ `.env` - Your environment configuration
✓ `.env.example` - Template for team members
✓ `config/env.php` - Environment loader
✓ `Database/db.php` - Now uses env variables
✓ `.gitignore` - Protects sensitive files

---

## 🔧 Usage in Code

```php
// Load environment variables
require_once 'config/env.php';

// Access variables
$appName = env('APP_NAME');
$debug = env('APP_DEBUG', false);
$maxUpload = env('MAX_FILE_SIZE');
```

---

## 🚀 Next Steps

1. **Update `.env`** with your actual credentials
2. **Run `composer install`** to install PHPMailer & dependencies
3. **Import database** from `Database/techworld_db.sql`
4. **Generate security keys** in `.env`
5. **Test database connection**
6. **Configure mail settings** (Gmail App Password)
7. **Set up payment gateways** (if needed)

---

## 🔒 Security Checklist

- [ ] `.env` is in `.gitignore`
- [ ] Generated unique security keys
- [ ] Changed default admin credentials
- [ ] Set `APP_DEBUG=false` in production
- [ ] Configured proper file permissions
- [ ] Updated `ALLOWED_FILE_TYPES` as needed

---

## 📞 Need Help?

Check these files:
- `docs/` - Documentation guides
- `README.md` - Project overview
- `.env.example` - All available settings
