# Security Libraries Documentation

## 📚 Complete Security Library Suite

Your project now includes **11 comprehensive security libraries** to protect against all major web vulnerabilities.

---

## 🔐 Core Security Libraries

### 1. **CSRF Protection** (`csrf.php`)
**Purpose:** Prevent Cross-Site Request Forgery attacks

**Features:**
- Token generation with expiration
- Secure token validation
- Auto-cleanup of expired tokens

**Usage:**
```php
// Generate token field for forms
echo CSRF::getTokenField();

// Validate token
if (CSRF::validateToken($_POST['csrf_token'])) {
    // Process form
}
```

---

### 2. **Input Validator** (`validator.php`)
**Purpose:** Validate user input data

**Features:**
- Email validation
- Phone number validation
- Name validation
- String length checks
- XSS detection
- URL validation

**Usage:**
```php
if (Validator::email($email)) {
    // Valid email
}

$errors = Validator::validateContactForm($_POST);
```

---

### 3. **Input Sanitizer** (`sanitizer.php`)
**Purpose:** Clean and sanitize user input

**Features:**
- XSS prevention
- HTML entity encoding
- Script tag removal
- Phone/email sanitization

**Usage:**
```php
$clean = Sanitizer::string($input);
$cleanEmail = Sanitizer::email($email);
$data = Sanitizer::sanitizeContactForm($_POST);
```

---

### 4. **Rate Limiter** (`rate_limiter.php`)
**Purpose:** Prevent spam and brute force attacks

**Features:**
- IP-based rate limiting
- Configurable limits & time windows
- Auto-cleanup old entries
- Remaining attempts tracking

**Usage:**
```php
$check = RateLimiter::check($ip, 5, 300); // 5 attempts per 5 min
if (!$check['allowed']) {
    die("Too many requests");
}
```

---

### 5. **SQL Security** (`sql_security.php`)
**Purpose:** Prevent SQL injection

**Features:**
- Table/column name validation
- Safe ORDER BY & LIMIT clauses
- Prepared statement helpers
- LIKE query sanitization

**Usage:**
```php
// Validate table name
if (SQLSecurity::validateTableName($table)) {
    // Safe to use
}

// Safe ORDER BY
$orderBy = SQLSecurity::safeOrderBy($column, 'DESC');

// Prepared query helper
$stmt = SQLSecurity::preparedQuery($pdo, $query, $params);
```

---

### 6. **File Upload Security** (`file_upload_security.php`)
**Purpose:** Secure file upload validation

**Features:**
- MIME type validation
- Extension whitelist
- File size limits
- Image validation
- Malware scanning (basic)
- Secure filename generation

**Usage:**
```php
$result = FileUploadSecurity::validateUpload($_FILES['file'], 10485760);
if ($result['valid']) {
    $path = FileUploadSecurity::secureMove($_FILES['file'], 'upload/');
}
```

---

### 7. **Password Security** (`password_security.php`)
**Purpose:** Secure password handling

**Features:**
- Bcrypt hashing (cost 12)
- Password strength validation
- Common password detection
- Random password generation
- Strength scoring (0-100)

**Usage:**
```php
// Hash password
$hash = PasswordSecurity::hash($password);

// Verify
if (PasswordSecurity::verify($password, $hash)) {
    // Correct password
}

// Validate strength
$result = PasswordSecurity::validateStrength($password);
if (!$result['valid']) {
    echo implode('<br>', $result['errors']);
}
```

---

### 8. **Session Security** (`session_security.php`)
**Purpose:** Enhanced session management

**Features:**
- Secure session configuration
- Session hijacking prevention
- User agent validation
- IP tracking
- Auto session regeneration
- Flash messages

**Usage:**
```php
SessionSecurity::start();
SessionSecurity::set('user_id', 123);
$userId = SessionSecurity::get('user_id');

// Flash message
SessionSecurity::flash('success', 'Login successful!');
```

---

### 9. **Honeypot** (`honeypot.php`)
**Purpose:** Bot detection

**Features:**
- Hidden field honeypots
- Time-based validation
- Form submission speed checks

**Usage:**
```php
// In form
echo HoneypotSecurity::generateField();
echo HoneypotSecurity::generateTimeToken();

// Validate
if (!HoneypotSecurity::validate() || !HoneypotSecurity::validateTime(3)) {
    die('Bot detected');
}
```

---

### 10. **Email Security** (`email_security.php`)
**Purpose:** Prevent email-based attacks

**Features:**
- Email header injection prevention
- Disposable email detection
- MX record validation
- HTML email sanitization
- Verification token generation

**Usage:**
```php
$safe = EmailSecurity::sanitizeEmail($email);

if (EmailSecurity::isDisposableEmail($email)) {
    die('Temporary emails not allowed');
}

if (!EmailSecurity::validateDomain($email)) {
    die('Invalid email domain');
}
```

---

### 11. **Security Helpers** (`security.php`)
**Purpose:** Central security utilities

**Features:**
- Security header management
- Combined form verification
- Security event logging
- Request type detection

**Usage:**
```php
require_once 'utils/security/security.php';

initSecurity();
setSecurityHeaders();

$result = verifyFormSubmission();
logSecurityEvent('login', 'User logged in');
```

---

## 🛡️ Security Coverage

| Vulnerability | Protected By |
|--------------|--------------|
| **XSS** | Validator, Sanitizer |
| **CSRF** | CSRF |
| **SQL Injection** | SQLSecurity |
| **File Upload** | FileUploadSecurity |
| **Session Hijacking** | SessionSecurity |
| **Brute Force** | RateLimiter |
| **Email Injection** | EmailSecurity |
| **Bot Attacks** | Honeypot, RateLimiter |
| **Weak Passwords** | PasswordSecurity |
| **Clickjacking** | Security Headers |

---

## 🚀 Quick Implementation

**Secure Contact Form:**
```php
require_once 'utils/security/security.php';

initSecurity();
setSecurityHeaders();

if (isPostRequest()) {
    // Verify security
    $verify = verifyFormSubmission();
    if ($verify['success']) {
        // Sanitize & validate
        $data = Sanitizer::sanitizeContactForm($_POST);
        $errors = Validator::validateContactForm($data);
        
        if (empty($errors)) {
            // Process form
        }
    }
}
```

**Secure File Upload:**
```php
$result = FileUploadSecurity::validateUpload($_FILES['file']);
if ($result['valid']) {
    $path = FileUploadSecurity::secureMove($_FILES['file'], 'upload/');
}
```

**Secure Login:**
```php
SessionSecurity::start();

if (PasswordSecurity::verify($password, $user['password_hash'])) {
    SessionSecurity::set('user_id', $user['id']);
    SessionSecurity::flash('success', 'Welcome back!');
}
```

---

## 📝 Best Practices

1. **Always use CSRF** protection on forms
2. **Validate then sanitize** all input
3. **Use prepared statements** for database queries
4. **Hash passwords** with PasswordSecurity
5. **Implement rate limiting** on sensitive endpoints
6. **Add honeypots** to public forms
7. **Set security headers** on every page
8. **Log security events** for monitoring
9. **Validate file uploads** strictly
10. **Use secure sessions** throughout

---

## ⚡ Performance Tips

- Rate limiter uses file storage (consider Redis for high traffic)
- Session validation runs on every page load
- File validation includes MIME checking
- Enable caching where appropriate

---

Your application now has **enterprise-grade security** protection! 🎉
