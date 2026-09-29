<?php
/**
 * Environment Configuration Loader
 * Load and access environment variables from .env file
 */

class EnvLoader {
    private static $variables = [];
    private static $loaded = false;

    /**
     * Load environment variables from .env file
     */
    public static function load($filePath = null) {
        if (self::$loaded) {
            return;
        }

        if ($filePath === null) {
            $filePath = __DIR__ . '/../../.env';
        }

        if (!file_exists($filePath)) {
            self::$loaded = true;
            error_log("Warning: .env file not found at: $filePath; using configured defaults.");
            return;
        }

        $lines = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        
        foreach ($lines as $line) {
            // Skip comments and empty lines
            if (strpos(trim($line), '#') === 0 || trim($line) === '') {
                continue;
            }

            // Parse the line
            if (strpos($line, '=') !== false) {
                list($name, $value) = explode('=', $line, 2);
                $name = trim($name);
                $value = trim($value);

                // Remove quotes from value if present
                if ((substr($value, 0, 1) === '"' && substr($value, -1) === '"') ||
                    (substr($value, 0, 1) === "'" && substr($value, -1) === "'")) {
                    $value = substr($value, 1, -1);
                }

                // Set environment variable
                self::$variables[$name] = $value;
                
                // Also set as PHP environment variable
                if (!isset($_ENV[$name])) {
                    $_ENV[$name] = $value;
                    putenv("$name=$value");
                }
            }
        }

        self::$loaded = true;
    }

    /**
     * Get environment variable value
     * 
     * @param string $key Variable name
     * @param mixed $default Default value if not found
     * @return mixed
     */
    public static function get($key, $default = null) {
        if (!self::$loaded) {
            self::load();
        }

        // Check in custom variables first
        if (isset(self::$variables[$key])) {
            return self::parseValue(self::$variables[$key]);
        }

        // Check in $_ENV
        if (isset($_ENV[$key])) {
            return self::parseValue($_ENV[$key]);
        }

        // Check in getenv()
        $value = getenv($key);
        if ($value !== false) {
            return self::parseValue($value);
        }

        return $default;
    }

    /**
     * Parse value to appropriate type
     */
    private static function parseValue(string $value): mixed {
        $value = trim($value);

        // Convert boolean strings
        if (strtolower($value) === 'true') {
            return true;
        }
        if (strtolower($value) === 'false') {
            return false;
        }

        // Convert null
        if (strtolower($value) === 'null') {
            return null;
        }

        // Convert numeric values
        if (is_numeric($value)) {
            return strpos($value, '.') !== false ? (float)$value : (int)$value;
        }

        return $value;
    }

    /**
     * Check if environment variable exists
     */
    public static function has(string $key): bool {
        if (!self::$loaded) {
            self::load();
        }

        return isset(self::$variables[$key]) || isset($_ENV[$key]) || getenv($key) !== false;
    }

    /**
     * Get all environment variables
     */
    public static function all() {
        if (!self::$loaded) {
            self::load();
        }

        return self::$variables;
    }

    /**
     * Set environment variable
     */
    public static function set(string $key, mixed $value): void {
        self::$variables[$key] = $value;
        $_ENV[$key] = $value;
        putenv("$key=$value");
    }
}

/**
 * Helper function to get environment variable
 */
function env(string $key, mixed $default = null): mixed {
    return EnvLoader::get($key, $default);
}

// Auto-load environment variables
try {
    EnvLoader::load();
} catch (Exception $e) {
    // .env file not found - this is okay in production
    error_log("Warning: " . $e->getMessage());
}
