<?php
/**
 * Session Security Library
 * Enhanced session management and security
 */

class SessionSecurity {
    /**
     * Start secure session
     */
    public static function start() {
        if (session_status() === PHP_SESSION_ACTIVE) {
            return;
        }
        
        // Secure session configuration
        ini_set('session.cookie_httponly', 1);
        ini_set('session.use_only_cookies', 1);
        ini_set('session.cookie_secure', isset($_SERVER['HTTPS']));
        ini_set('session.cookie_samesite', 'Strict');
        ini_set('session.use_strict_mode', 1);
        
        // Start session
        session_start();
        
        // Regenerate session ID if needed
        self::regenerateIfNeeded();
        
        // Validate session
        self::validate();
    }
    
    /**
     * Regenerate session ID if needed
     */
    private static function regenerateIfNeeded() {
        if (!isset($_SESSION['created'])) {
            $_SESSION['created'] = time();
            $_SESSION['last_activity'] = time();
        } elseif (time() - $_SESSION['created'] > 1800) {
            // Regenerate every 30 minutes
            session_regenerate_id(true);
            $_SESSION['created'] = time();
        }
        
        $_SESSION['last_activity'] = time();
    }
    
    /**
     * Validate session
     */
    private static function validate() {
        // Check user agent
        $currentUA = $_SERVER['HTTP_USER_AGENT'] ?? '';
        
        if (!isset($_SESSION['user_agent'])) {
            $_SESSION['user_agent'] = $currentUA;
        } elseif ($_SESSION['user_agent'] !== $currentUA) {
            // User agent changed - possible session hijacking
            self::destroy();
            return false;
        }
        
        // Check IP address (optional - can cause issues with mobile networks)
        if (isset($_SESSION['ip_address'])) {
            $currentIP = self::getClientIP();
            if ($_SESSION['ip_address'] !== $currentIP) {
                // IP changed - log and optionally destroy session
                error_log("Session IP changed: {$_SESSION['ip_address']} -> $currentIP");
            }
        } else {
            $_SESSION['ip_address'] = self::getClientIP();
        }
        
        // Check session timeout
        if (isset($_SESSION['last_activity'])) {
            $timeout = 3600; // 1 hour
            if (time() - $_SESSION['last_activity'] > $timeout) {
                self::destroy();
                return false;
            }
        }
        
        return true;
    }
    
    /**
     * Get client IP
     */
    private static function getClientIP() {
        $ipKeys = [
            'HTTP_CF_CONNECTING_IP',
            'HTTP_X_FORWARDED_FOR',
            'HTTP_X_REAL_IP',
            'REMOTE_ADDR'
        ];
        
        foreach ($ipKeys as $key) {
            if (!empty($_SERVER[$key])) {
                $ips = explode(',', $_SERVER[$key]);
                return trim($ips[0]);
            }
        }
        
        return '0.0.0.0';
    }
    
    /**
     * Set session value
     */
    public static function set($key, $value) {
        self::start();
        $_SESSION[$key] = $value;
    }
    
    /**
     * Get session value
     */
    public static function get($key, $default = null) {
        self::start();
        return $_SESSION[$key] ?? $default;
    }
    
    /**
     * Check if session key exists
     */
    public static function has($key) {
        self::start();
        return isset($_SESSION[$key]);
    }
    
    /**
     * Remove session value
     */
    public static function remove($key) {
        self::start();
        unset($_SESSION[$key]);
    }
    
    /**
     * Destroy session
     */
    public static function destroy() {
        if (session_status() === PHP_SESSION_ACTIVE) {
            $_SESSION = [];
            
            // Delete session cookie
            if (isset($_COOKIE[session_name()])) {
                setcookie(session_name(), '', time() - 3600, '/');
            }
            
            session_destroy();
        }
    }
    
    /**
     * Set flash message
     */
    public static function flash($key, $value) {
        self::start();
        $_SESSION['_flash'][$key] = $value;
    }
    
    /**
     * Get and remove flash message
     */
    public static function getFlash($key, $default = null) {
        self::start();
        
        if (isset($_SESSION['_flash'][$key])) {
            $value = $_SESSION['_flash'][$key];
            unset($_SESSION['_flash'][$key]);
            return $value;
        }
        
        return $default;
    }
}
