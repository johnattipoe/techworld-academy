<?php
/**
 * Password Security Library
 * Secure password hashing and validation
 */

class PasswordSecurity {
    /**
     * Hash password
     */
    public static function hash($password) {
        return password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);
    }
    
    /**
     * Verify password
     */
    public static function verify($password, $hash) {
        return password_verify($password, $hash);
    }
    
    /**
     * Check if password needs rehashing
     */
    public static function needsRehash($hash) {
        return password_needs_rehash($hash, PASSWORD_BCRYPT, ['cost' => 12]);
    }
    
    /**
     * Validate password strength
     */
    public static function validateStrength($password, $minLength = 8) {
        $errors = [];
        
        // Check minimum length
        if (strlen($password) < $minLength) {
            $errors[] = "Password must be at least $minLength characters";
        }
        
        // Check for uppercase letter
        if (!preg_match('/[A-Z]/', $password)) {
            $errors[] = "Password must contain at least one uppercase letter";
        }
        
        // Check for lowercase letter
        if (!preg_match('/[a-z]/', $password)) {
            $errors[] = "Password must contain at least one lowercase letter";
        }
        
        // Check for number
        if (!preg_match('/[0-9]/', $password)) {
            $errors[] = "Password must contain at least one number";
        }
        
        // Check for special character
        if (!preg_match('/[^A-Za-z0-9]/', $password)) {
            $errors[] = "Password must contain at least one special character";
        }
        
        // Check for common passwords
        if (self::isCommonPassword($password)) {
            $errors[] = "Password is too common. Please choose a stronger password";
        }
        
        return [
            'valid' => empty($errors),
            'errors' => $errors,
            'strength' => self::calculateStrength($password)
        ];
    }
    
    /**
     * Calculate password strength (0-100)
     */
    public static function calculateStrength($password) {
        $strength = 0;
        $length = strlen($password);
        
        // Length score (up to 30 points)
        $strength += min(30, $length * 2);
        
        // Uppercase letters (10 points)
        if (preg_match('/[A-Z]/', $password)) $strength += 10;
        
        // Lowercase letters (10 points)
        if (preg_match('/[a-z]/', $password)) $strength += 10;
        
        // Numbers (10 points)
        if (preg_match('/[0-9]/', $password)) $strength += 10;
        
        // Special characters (20 points)
        if (preg_match('/[^A-Za-z0-9]/', $password)) $strength += 20;
        
        // Multiple character types (20 points)
        $types = 0;
        if (preg_match('/[A-Z]/', $password)) $types++;
        if (preg_match('/[a-z]/', $password)) $types++;
        if (preg_match('/[0-9]/', $password)) $types++;
        if (preg_match('/[^A-Za-z0-9]/', $password)) $types++;
        
        if ($types >= 3) $strength += 20;
        
        return min(100, $strength);
    }
    
    /**
     * Check if password is commonly used
     */
    private static function isCommonPassword($password) {
        $commonPasswords = [
            'password', '12345678', 'qwerty', 'abc123', 
            'password123', 'admin', 'letmein', 'welcome',
            '123456', '1234567890', 'admin123'
        ];
        
        return in_array(strtolower($password), $commonPasswords);
    }
    
    /**
     * Generate secure random password
     */
    public static function generateRandom($length = 16) {
        $uppercase = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $lowercase = 'abcdefghijklmnopqrstuvwxyz';
        $numbers = '0123456789';
        $special = '!@#$%^&*()_+-=[]{}|;:,.<>?';
        
        $all = $uppercase . $lowercase . $numbers . $special;
        
        $password = '';
        $password .= $uppercase[random_int(0, strlen($uppercase) - 1)];
        $password .= $lowercase[random_int(0, strlen($lowercase) - 1)];
        $password .= $numbers[random_int(0, strlen($numbers) - 1)];
        $password .= $special[random_int(0, strlen($special) - 1)];
        
        for ($i = 4; $i < $length; $i++) {
            $password .= $all[random_int(0, strlen($all) - 1)];
        }
        
        return str_shuffle($password);
    }
}
