<?php
/**
 * Payment System Database Configuration
 */

class PaymentDB {
    private static ?self $instance = null;
    private PDO $connection;
    
    private function __construct() {
        try {
            $host = getenv('DB_HOST') ?: '127.0.0.1';
            $port = getenv('DB_PORT') ?: '3306';
            $dbname = getenv('DB_DATABASE') ?: 'techworld_db';
            $username = getenv('DB_USERNAME') ?: 'root';
            $password = getenv('DB_PASSWORD') ?: '';
            $ssl = filter_var(getenv('DB_SSL') ?: 'false', FILTER_VALIDATE_BOOLEAN);
            $sslCa = getenv('DB_SSL_CA') ?: '';
            
            $dsn = "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8mb4";
            
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];

            if ($ssl) {
                if ($sslCa !== '') {
                    $options[PDO::MYSQL_ATTR_SSL_CA] = $sslCa;
                }

                $options[PDO::MYSQL_ATTR_SSL_VERIFY_SERVER_CERT] = filter_var(
                    getenv('DB_SSL_VERIFY') ?: 'true',
                    FILTER_VALIDATE_BOOLEAN
                );
            }
            
            $this->connection = new PDO($dsn, $username, $password, $options);
            
        } catch (PDOException $e) {
            die('Database connection failed: ' . $e->getMessage());
        }
    }
    
    public static function getInstance(): self {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    
    public function getConnection(): PDO {
        return $this->connection;
    }
    
    // Prevent cloning
    private function __clone() {}
    
    // Prevent unserialization
    public function __wakeup() {
        throw new Exception("Cannot unserialize singleton");
    }
}

// Usage: $db = PaymentDB::getInstance()->getConnection();
