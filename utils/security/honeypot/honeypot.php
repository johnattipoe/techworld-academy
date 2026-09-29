<?php
/**
 * Honeypot Security Library
 * Bot detection using hidden fields
 */

class HoneypotSecurity {
    /**
     * Generate honeypot field
     */
    public static function generateField($fieldName = 'website') {
        // Hidden field that humans won't fill but bots will
        return '
        <div style="position: absolute; left: -5000px;" aria-hidden="true">
            <label for="' . htmlspecialchars($fieldName) . '">Leave this field blank</label>
            <input type="text" name="' . htmlspecialchars($fieldName) . '" id="' . htmlspecialchars($fieldName) . '" value="" tabindex="-1" autocomplete="off">
        </div>';
    }
    
    /**
     * Validate honeypot
     */
    public static function validate($fieldName = 'website') {
        // If honeypot field is filled, it's a bot
        if (isset($_POST[$fieldName]) && !empty($_POST[$fieldName])) {
            return false;
        }
        return true;
    }
    
    /**
     * Time-based honeypot (form filled too quickly)
     */
    public static function generateTimeToken() {
        $time = time();
        $token = hash_hmac('sha256', $time, 'honeypot_secret');
        
        return '
        <input type="hidden" name="honeypot_time" value="' . $time . '">
        <input type="hidden" name="honeypot_token" value="' . $token . '">';
    }
    
    /**
     * Validate time-based honeypot
     */
    public static function validateTime($minSeconds = 3) {
        if (!isset($_POST['honeypot_time']) || !isset($_POST['honeypot_token'])) {
            return false;
        }
        
        $time = (int) $_POST['honeypot_time'];
        $token = $_POST['honeypot_token'];
        
        // Verify token
        $expectedToken = hash_hmac('sha256', $time, 'honeypot_secret');
        if ($token !== $expectedToken) {
            return false;
        }
        
        // Check if form was filled too quickly
        $elapsed = time() - $time;
        
        if ($elapsed < $minSeconds) {
            // Form filled too quickly - likely a bot
            return false;
        }
        
        if ($elapsed > 3600) {
            // Form took too long - session may have expired
            return false;
        }
        
        return true;
    }
}
