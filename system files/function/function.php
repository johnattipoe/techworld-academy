<?php
// ================================
// function.php - Reusable Functions
// ================================

/**
 * Sanitize input data
 */
function clean_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

/**
 * Redirect to another page
 */
function redirect($url) {
    header("Location: $url");
    exit();
}

/**
 * Display flash messages (success/error)
 */
function flash_message() {
    if(isset($_SESSION['message'])) {
        echo "<div class='alert alert-{$_SESSION['msg_type']}'>
                {$_SESSION['message']}
              </div>";
        unset($_SESSION['message'], $_SESSION['msg_type']);
    }
}

/**
 * Multilingual support helper
 */
function lang($key, $lang_array) {
    return isset($lang_array[$key]) ? $lang_array[$key] : $key;
}

/**
 * Check if user is logged in
 */
function is_logged_in() {
    return isset($_SESSION['user_id']);
}

/**
 * Protect routes (require login)
 */
function require_login() {
    if(!is_logged_in()) {
        $_SESSION['message'] = "Please log in first.";
        $_SESSION['msg_type'] = "warning";
        redirect("authenication/login.php");
    }
}

/**
 * CSRF helpers
 */
function csrf_token() {
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(24));
    }
    return $_SESSION['csrf_token'];
}

function verify_csrf_token($token) {
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }
    return !empty($token) && isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}

/**
 * Role helpers
 */
function is_admin() {
    if (session_status() !== PHP_SESSION_ACTIVE) session_start();
    $role = isset($_SESSION['role']) ? strtolower($_SESSION['role']) : '';
    return in_array($role, ['admin','administrator']);
}

function is_instructor() {
    if (session_status() !== PHP_SESSION_ACTIVE) session_start();
    $role = isset($_SESSION['role']) ? strtolower($_SESSION['role']) : '';
    return in_array($role, ['instructor','teacher','staff','faculty']);
}

/**
 * Simple validators
 */
function validate_email($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL) ? true : false;
}

function validate_int($value, $min = null, $max = null) {
    $opts = ['options' => ['min_range' => is_null($min) ? PHP_INT_MIN : $min, 'max_range' => is_null($max) ? PHP_INT_MAX : $max]];
    return filter_var($value, FILTER_VALIDATE_INT, $opts) !== false;
}

function sanitize_string($s) {
    return is_string($s) ? trim(htmlspecialchars($s, ENT_QUOTES, 'UTF-8')) : '';
}

/**
 * Logging shim - uses system files/logger.php if present
 */
function log_action($level, $message, $context = []) {
    $loggerFile = __DIR__ . '/logger.php';
    if (file_exists($loggerFile)) {
        try {
            require_once $loggerFile;
            if (class_exists('ProjectLogger')) {
                $logger = new ProjectLogger(__DIR__ . '/..');
                if (method_exists($logger, 'log')) {
                    $logger->log($level, $message, $context);
                } else {
                    // Monolog style
                    $logger->{$level}($message, $context);
                }
                return true;
            }
        } catch (Exception $e) {
            // swallow - fallback to error_log
            error_log("Logger error: " . $e->getMessage());
        }
    }
    // Fallback
    error_log(sprintf("[%s] %s", strtoupper($level), $message));
    return false;
}

/**
 * Rate limiting shim - uses system files/rate_limiter.php if present
 */
function rate_limit_check($key, $limit = 10, $window = 60) {
    $rlFile = __DIR__ . '/rate_limiter.php';
    $rlRedis = __DIR__ . '/rate_limiter_redis.php';
    if (file_exists($rlRedis)) {
        try {
            require_once $rlRedis;
            if (function_exists('rate_limiter_redis_allow')) return rate_limiter_redis_allow($key, $limit, $window);
        } catch (Exception $e) {}
    }
    if (file_exists($rlFile)) {
        require_once $rlFile;
        if (function_exists('rate_limiter_allow')) {
            return rate_limiter_allow($key, $limit, $window);
        }
    }
    // default allow
    return true;
}

// ================================
// End of function.php
// ================================
?>
