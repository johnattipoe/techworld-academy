<?php
/**
 * Email Security Library
 * Prevent email header injection and validate email operations
 */

class EmailSecurity {
    /**
     * Sanitize email address
     */
    public static function sanitizeEmail($email) {
        // Remove any characters that could be used for header injection
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        
        // Remove newlines and carriage returns
        $email = str_replace(["\r", "\n", "%0a", "%0d"], '', $email);
        
        return $email;
    }
    
    /**
     * Validate email address
     */
    public static function validateEmail($email) {
        $email = self::sanitizeEmail($email);
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }
    
    /**
     * Prevent email header injection
     */
    public static function sanitizeEmailHeader($value) {
        // Remove any newlines, carriage returns, and null bytes
        $value = str_replace(["\r", "\n", "\0", "%0a", "%0d"], '', $value);
        
        // Remove any characters that could be used for injection
        $value = preg_replace('/[^\x20-\x7E]/', '', $value);
        
        return trim($value);
    }
    
    /**
     * Validate email subject
     */
    public static function sanitizeSubject($subject) {
        return self::sanitizeEmailHeader($subject);
    }
    
    /**
     * Validate email body
     */
    public static function sanitizeBody($body, $allowHtml = false) {
        if (!$allowHtml) {
            // Plain text email - remove HTML tags
            $body = strip_tags($body);
        } else {
            // HTML email - sanitize but keep safe tags
            $body = self::sanitizeHtmlEmail($body);
        }
        
        return $body;
    }
    
    /**
     * Sanitize HTML email content
     */
    private static function sanitizeHtmlEmail($html) {
        // Allow only safe HTML tags
        $allowedTags = '<p><br><strong><b><em><i><u><a><ul><ol><li><h1><h2><h3><h4><h5><h6><table><tr><td><th><thead><tbody><tfoot>';
        
        $html = strip_tags($html, $allowedTags);
        
        // Remove dangerous attributes
        $html = preg_replace('/<([a-z][a-z0-9]*)[^>]*?(href|src)=["\']?(javascript:|data:)[^>]*?>/i', '<$1>', $html);
        
        return $html;
    }
    
    /**
     * Check if email is disposable/temporary
     */
    public static function isDisposableEmail($email) {
        $disposableDomains = [
            'tempmail.com', 'throwaway.email', 'guerrillamail.com',
            '10minutemail.com', 'mailinator.com', 'yopmail.com',
            'temp-mail.org', 'getnada.com', 'maildrop.cc'
        ];
        
        $domain = substr(strrchr($email, "@"), 1);
        return in_array(strtolower($domain), $disposableDomains);
    }
    
    /**
     * Validate email domain has MX record
     */
    public static function validateDomain($email) {
        $domain = substr(strrchr($email, "@"), 1);
        
        if (!$domain) {
            return false;
        }
        
        // Check if domain has MX records
        return checkdnsrr($domain, 'MX') || checkdnsrr($domain, 'A');
    }
    
    /**
     * Generate email-safe token for verification
     */
    public static function generateVerificationToken() {
        return bin2hex(random_bytes(32));
    }
}
