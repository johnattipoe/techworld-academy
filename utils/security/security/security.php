<?php
/**
 * Security Helper Functions
 * Central security utilities
 */

// Load all security libraries
require_once(__DIR__ . '/../csrf/csrf.php');
require_once(__DIR__ . '/../validator/validator.php');
require_once(__DIR__ . '/../sanitizer/sanitizer.php');
require_once(__DIR__ . '/../rate_limiter/rate_limiter.php');
require_once(__DIR__ . '/../sql_security/sql_security.php');
require_once(__DIR__ . '/../file_upload_security/file_upload_security.php');
require_once(__DIR__ . '/../password_security/password_security.php');
require_once(__DIR__ . '/../session_security/session_security.php');
require_once(__DIR__ . '/../honeypot/honeypot.php');
require_once(__DIR__ . '/../email_security/email_security.php');

/**
 * Initialize security session
 */
function initSecurity() {
    if (session_status() === PHP_SESSION_NONE) {
        // Secure session configuration
        ini_set('session.cookie_httponly', 1);
        ini_set('session.use_only_cookies', 1);
        ini_set('session.cookie_secure', isset($_SERVER['HTTPS']));
        ini_set('session.cookie_samesite', 'Strict');
        
        session_start();
    }
    
    // Regenerate session ID periodically
    if (!isset($_SESSION['created'])) {
        $_SESSION['created'] = time();
    } elseif (time() - $_SESSION['created'] > 1800) {
        session_regenerate_id(true);
        $_SESSION['created'] = time();
    }
}

/**
 * Get secure headers
 */
function setSecurityHeaders() {
    // Prevent clickjacking
    header('X-Frame-Options: SAMEORIGIN');
    
    // XSS Protection
    header('X-XSS-Protection: 1; mode=block');
    
    // Prevent MIME type sniffing
    header('X-Content-Type-Options: nosniff');
    
    // Referrer Policy
    header('Referrer-Policy: strict-origin-when-cross-origin');
    
    // Content Security Policy
    header("Content-Security-Policy: default-src 'self'; script-src 'self' 'unsafe-inline' https://cdn.jsdelivr.net https://unpkg.com; style-src 'self' 'unsafe-inline' https://cdn.jsdelivr.net https://fonts.googleapis.com; font-src 'self' https://fonts.gstatic.com https://cdn.jsdelivr.net; img-src 'self' data: https:; connect-src 'self';");
}

/**
 * Check if request is POST
 */
function isPostRequest() {
    return $_SERVER['REQUEST_METHOD'] === 'POST';
}

/**
 * Verify CSRF and rate limit for forms
 */
function verifyFormSubmission($maxAttempts = 5, $timeWindow = 300) {
    $errors = [];
    
    // Check CSRF token
    if (!isset($_POST['csrf_token']) || !CSRF::validateToken($_POST['csrf_token'])) {
        $errors[] = 'Invalid security token. Please refresh the page and try again.';
        return ['success' => false, 'errors' => $errors];
    }
    
    // Check rate limit
    $clientIP = RateLimiter::getClientIP();
    $rateCheck = RateLimiter::check($clientIP, $maxAttempts, $timeWindow);
    
    if (!$rateCheck['allowed']) {
        $minutes = ceil($rateCheck['wait_time'] / 60);
        $errors[] = "Too many submissions. Please try again in $minutes minute(s).";
        return ['success' => false, 'errors' => $errors, 'rate_limited' => true];
    }
    
    return ['success' => true, 'remaining_attempts' => $rateCheck['remaining']];
}

/**
 * Log security event
 */
function logSecurityEvent(string $type, string $message, array $data = []): void {
    $logFile = __DIR__ . '/../../logs/security.log';
    $logDir = dirname($logFile);
    
    if (!is_dir($logDir)) {
        mkdir($logDir, 0755, true);
    }
    
    $entry = [
        'timestamp' => date('Y-m-d H:i:s'),
        'type' => $type,
        'message' => $message,
        'ip' => RateLimiter::getClientIP(),
        'user_agent' => $_SERVER['HTTP_USER_AGENT'] ?? 'Unknown',
        'data' => $data
    ];
    
    file_put_contents($logFile, json_encode($entry) . PHP_EOL, FILE_APPEND);
}
