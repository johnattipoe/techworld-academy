<?php
/**
 * Rate Limiting Library
 * Prevents spam and brute force attacks
 */

class RateLimiter {
    private static $storePath = __DIR__ . '/../../logs/rate_limit.json';
    
    /**
     * Check if request is allowed
     * @param string $identifier - IP address or user ID
     * @param int $maxAttempts - Maximum attempts allowed
     * @param int $timeWindow - Time window in seconds
     * @return array [allowed, remainingAttempts, resetTime]
     */
    public static function check($identifier, $maxAttempts = 5, $timeWindow = 300) {
        $data = self::loadData();
        $currentTime = time();
        
        // Clean old entries
        $data = self::cleanup($data, $currentTime);
        
        if (!isset($data[$identifier])) {
            $data[$identifier] = [
                'attempts' => 1,
                'first_attempt' => $currentTime,
                'last_attempt' => $currentTime
            ];
            self::saveData($data);
            
            return [
                'allowed' => true,
                'remaining' => $maxAttempts - 1,
                'reset_time' => $currentTime + $timeWindow
            ];
        }
        
        $entry = $data[$identifier];
        $timePassed = $currentTime - $entry['first_attempt'];
        
        // Reset if time window has passed
        if ($timePassed > $timeWindow) {
            $data[$identifier] = [
                'attempts' => 1,
                'first_attempt' => $currentTime,
                'last_attempt' => $currentTime
            ];
            self::saveData($data);
            
            return [
                'allowed' => true,
                'remaining' => $maxAttempts - 1,
                'reset_time' => $currentTime + $timeWindow
            ];
        }
        
        // Check if limit exceeded
        if ($entry['attempts'] >= $maxAttempts) {
            $resetTime = $entry['first_attempt'] + $timeWindow;
            $waitTime = $resetTime - $currentTime;
            
            return [
                'allowed' => false,
                'remaining' => 0,
                'reset_time' => $resetTime,
                'wait_time' => $waitTime
            ];
        }
        
        // Increment attempts
        $data[$identifier]['attempts']++;
        $data[$identifier]['last_attempt'] = $currentTime;
        self::saveData($data);
        
        return [
            'allowed' => true,
            'remaining' => $maxAttempts - $data[$identifier]['attempts'],
            'reset_time' => $entry['first_attempt'] + $timeWindow
        ];
    }
    
    /**
     * Load rate limit data
     */
    private static function loadData() {
        if (!file_exists(self::$storePath)) {
            return [];
        }
        
        $content = file_get_contents(self::$storePath);
        return json_decode($content, true) ?: [];
    }
    
    /**
     * Save rate limit data
     */
    private static function saveData($data) {
        $dir = dirname(self::$storePath);
        if (!is_dir($dir)) {
            mkdir($dir, 0755, true);
        }
        
        file_put_contents(self::$storePath, json_encode($data));
    }
    
    /**
     * Clean up old entries
     */
    private static function cleanup($data, $currentTime) {
        foreach ($data as $identifier => $entry) {
            // Remove entries older than 1 hour
            if (($currentTime - $entry['last_attempt']) > 3600) {
                unset($data[$identifier]);
            }
        }
        return $data;
    }
    
    /**
     * Reset rate limit for identifier
     */
    public static function reset($identifier) {
        $data = self::loadData();
        unset($data[$identifier]);
        self::saveData($data);
    }
    
    /**
     * Get client IP address
     */
    public static function getClientIP() {
        $ipKeys = [
            'HTTP_CF_CONNECTING_IP', // CloudFlare
            'HTTP_X_FORWARDED_FOR',  // Proxy
            'HTTP_X_REAL_IP',        // Nginx
            'REMOTE_ADDR'            // Default
        ];
        
        foreach ($ipKeys as $key) {
            if (!empty($_SERVER[$key])) {
                $ips = explode(',', $_SERVER[$key]);
                return trim($ips[0]);
            }
        }
        
        return '0.0.0.0';
    }
}
