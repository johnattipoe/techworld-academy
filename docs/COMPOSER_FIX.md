# Composer Installation Fix

## Problem
Composer cannot install dependencies because:
1. ZIP extension is not enabled in PHP
2. Git is not installed

## Quick Fix Options

### **Option 1: Enable ZIP Extension (Recommended)**

1. **Open php.ini file:**
   ```
   C:\xampp\php\php.ini
   ```

2. **Find this line:**
   ```ini
   ;extension=zip
   ```

3. **Remove the semicolon:**
   ```ini
   extension=zip
   ```

4. **Save and restart** (close terminal and reopen)

5. **Run again:**
   ```powershell
   php 'C:\Users\User\AppData\Roaming\Composer\latest.phar' install
   ```

---

### **Option 2: Install Git**

Download and install Git from: https://git-scm.com/download/win

After installation, restart terminal and run:
```powershell
php 'C:\Users\User\AppData\Roaming\Composer\latest.phar' install
```

---

### **Option 3: Rebuild Vendor from Scratch**

If Composer partially failed, clear and reinstall dependencies:

```powershell
cd "C:\Users\JOYCE\3D Objects\TECHWORLD ACADEMY AND SOLUTION"
if (Test-Path vendor) { Remove-Item -Recurse -Force vendor }
composer install
```

---

## ✅ Recommended Solution

**Enable ZIP extension** (takes 1 minute):
1. Edit `C:\xampp\php\php.ini`
2. Find `;extension=zip`
3. Change to `extension=zip`
4. Restart terminal
5. Run `composer install` again

This will allow Composer to work properly for all future installations.
