<?php
namespace TWApp;

use PDO;
use PDOException;

class Database
{
    protected static $pdo = null;

    public static function getConnection(): ?PDO
    {
        if (self::$pdo !== null) return self::$pdo;

        $dsn = Config::get('TW_DB_DSN');
        $user = Config::get('TW_DB_USER');
        $pass = Config::get('TW_DB_PASS');

        if (!$dsn) {
            return null;
        }

        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];

        try {
            self::$pdo = new PDO($dsn, $user ?? null, $pass ?? null, $options);
            return self::$pdo;
        } catch (PDOException $e) {
            // swallow and return null; caller should handle absence
            error_log('Database connection failed: ' . $e->getMessage());
            return null;
        }
    }
}
