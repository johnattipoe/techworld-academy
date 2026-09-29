<?php
// If a project-level Database/db.php exists, prefer it (it provides get_db())
$projectDb = __DIR__ . '/../../Database/db/db.php';
if (file_exists($projectDb)) {
    require_once $projectDb;
}

// PDO helper - returns a shared PDO instance
if (!function_exists('get_db')) {
    function get_db() {
        static $pdo = null;
        if ($pdo instanceof PDO) return $pdo;
        $cfgFile = __DIR__ . '/config.php';
        if (!file_exists($cfgFile)) return null;
        $cfg = include $cfgFile;
        $db = $cfg['db'] ?? null;
        if (!$db) return null;
        try {
            $pdo = new PDO($db['dsn'], $db['user'], $db['pass'], $db['opts'] ?? []);
            return $pdo;
        } catch (Exception $e) {
            error_log('DB connection failed: ' . $e->getMessage());
            return null;
        }
    }
}
