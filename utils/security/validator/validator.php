<?php
/**
 * Input Validation Library
 * Validates user input data
 */

class Validator {
    /**
     * Validate email address
     */
    public static function email($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }
    
    /**
     * Validate phone number
     */
    public static function phone($phone) {
        // Remove all non-numeric characters
        $cleaned = preg_replace('/[^0-9+]/', '', $phone);
        
        // Check if it's a valid format (10-15 digits)
        return preg_match('/^\+?[0-9]{10,15}$/', $cleaned);
    }
    
    /**
     * Validate required field
     */
    public static function required($value) {
        return !empty(trim($value));
    }
    
    /**
     * Validate string length
     */
    public static function length($value, $min = 0, $max = PHP_INT_MAX) {
        $length = mb_strlen($value, 'UTF-8');
        return $length >= $min && $length <= $max;
    }
    
    /**
     * Validate alphanumeric with spaces
     */
    public static function alphanumericSpace($value) {
        return preg_match('/^[a-zA-Z0-9\s]+$/', $value);
    }
    
    /**
     * Validate name (letters, spaces, hyphens, apostrophes)
     */
    public static function name($value) {
        return preg_match("/^[a-zA-Z\s'-]+$/", $value);
    }
    
    /**
     * Validate against XSS
     */
    public static function noScripts($value) {
        // Check for script tags or javascript
        $dangerous = ['<script', 'javascript:', 'onerror=', 'onload=', '<iframe'];
        
        foreach ($dangerous as $pattern) {
            if (stripos($value, $pattern) !== false) {
                return false;
            }
        }
        
        return true;
    }
    
    /**
     * Validate URL
     */
    public static function url($url) {
        return filter_var($url, FILTER_VALIDATE_URL) !== false;
    }
    
    /**
     * Validate integer
     */
    public static function integer($value) {
        return filter_var($value, FILTER_VALIDATE_INT) !== false;
    }
    
    /**
     * Comprehensive form validation
     */
    public static function validateContactForm($data) {
        $errors = [];
        
        // Validate name
        if (!self::required($data['name'])) {
            $errors['name'] = 'Name is required';
        } elseif (!self::name($data['name'])) {
            $errors['name'] = 'Name contains invalid characters';
        } elseif (!self::length($data['name'], 2, 100)) {
            $errors['name'] = 'Name must be between 2 and 100 characters';
        }
        
        // Validate email
        if (!self::required($data['email'])) {
            $errors['email'] = 'Email is required';
        } elseif (!self::email($data['email'])) {
            $errors['email'] = 'Invalid email address';
        }
        
        // Validate phone (if provided)
        if (!empty($data['phone']) && !self::phone($data['phone'])) {
            $errors['phone'] = 'Invalid phone number format';
        }
        
        // Validate subject
        if (!self::required($data['subject'])) {
            $errors['subject'] = 'Subject is required';
        }
        
        // Validate message
        if (!self::required($data['message'])) {
            $errors['message'] = 'Message is required';
        } elseif (!self::length($data['message'], 10, 5000)) {
            $errors['message'] = 'Message must be between 10 and 5000 characters';
        }
        
        // Check for XSS attempts
        foreach ($data as $key => $value) {
            if (is_string($value) && !self::noScripts($value)) {
                $errors[$key] = 'Invalid content detected';
            }
        }
        
        return $errors;
    }
}
