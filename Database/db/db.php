<?php
require_once(__DIR__ . '/../../config/env/env.php');
require_once(__DIR__ . '/../../utils/logger/logger.php');

// Database connection (MySQL)
function get_db() {
    $host = env('DB_HOST', '127.0.0.1');
    $port = env('DB_PORT', '3306');
    $db   = env('DB_DATABASE', 'techworld_db');
    $user = env('DB_USERNAME', 'root');
    $pass = env('DB_PASSWORD', '');
    $charset = env('DB_CHARSET', 'utf8mb4');
    
    $dsn = "mysql:host=$host;port=$port;dbname=$db;charset=$charset";
    
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    
    try {
        $pdo = new PDO($dsn, $user, $pass, $options);
        log_action('system', 'db_connect', 'success');
        return $pdo;
    } catch (PDOException $e) {
        log_action('system', 'db_connect', 'failed: ' . $e->getMessage());
        if (env('APP_DEBUG', false)) {
            die('Database connection failed: ' . $e->getMessage());
        } else {
            die('Database connection failed. Please contact support.');
        }
    }
}
?>