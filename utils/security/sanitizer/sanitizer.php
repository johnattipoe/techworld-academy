<?php
/**
 * Input Sanitization Library
 * Cleans and sanitizes user input
 */

class Sanitizer {
    /**
     * Sanitize string
     */
    public static function string($value) {
        return htmlspecialchars(trim($value), ENT_QUOTES, 'UTF-8');
    }
    
    /**
     * Sanitize email
     */
    public static function email($email) {
        $email = trim($email);
        return filter_var($email, FILTER_SANITIZE_EMAIL);
    }
    
    /**
     * Sanitize phone number
     */
    public static function phone($phone) {
        // Keep only numbers, +, -, (, ), and spaces
        return preg_replace('/[^0-9+\-() ]/', '', trim($phone));
    }
    
    /**
     * Sanitize text area (preserve line breaks but remove scripts)
     */
    public static function textarea($value) {
        // Remove script tags and other dangerous HTML
        $value = strip_tags($value);
        // Convert special chars but preserve line breaks
        return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
    }
    
    /**
     * Sanitize filename
     */
    public static function filename($filename) {
        // Remove any path traversal attempts
        $filename = basename($filename);
        // Remove special characters
        return preg_replace('/[^a-zA-Z0-9._-]/', '_', $filename);
    }
    
    /**
     * Sanitize URL
     */
    public static function url($url) {
        return filter_var($url, FILTER_SANITIZE_URL);
    }
    
    /**
     * Sanitize integer
     */
    public static function integer($value) {
        return (int) filter_var($value, FILTER_SANITIZE_NUMBER_INT);
    }
    
    /**
     * Remove XSS vulnerabilities
     */
    public static function xss($value) {
        // Remove null bytes
        $value = str_replace(chr(0), '', $value);
        
        // Remove any script tags
        $value = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', '', $value);
        
        // Remove javascript: protocol
        $value = preg_replace('/javascript:/i', '', $value);
        
        // Remove on* event handlers
        $value = preg_replace('/\s*on\w+\s*=\s*["\']?[^"\']*["\']?/i', '', $value);
        
        return $value;
    }
    
    /**
     * Sanitize all contact form data
     */
    public static function sanitizeContactForm($data) {
        return [
            'name' => self::string($data['name'] ?? ''),
            'email' => self::email($data['email'] ?? ''),
            'phone' => self::phone($data['phone'] ?? ''),
            'subject' => self::string($data['subject'] ?? ''),
            'source' => self::string($data['source'] ?? ''),
            'message' => self::textarea($data['message'] ?? ''),
            'newsletter' => isset($data['newsletter']) ? 1 : 0
        ];
    }
}
