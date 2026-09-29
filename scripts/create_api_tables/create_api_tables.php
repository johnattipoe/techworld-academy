<?php
require_once(__DIR__ . '/..\..\system files\db\db.php');

$pdo = get_db();
if (!$pdo) {
    die("Could not connect to database\n");
}

try {
    // Create settings table
    $pdo->exec("CREATE TABLE IF NOT EXISTS settings (
        name VARCHAR(255) PRIMARY KEY,
        value TEXT NOT NULL,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )");

    // Create API keys table
    $pdo->exec("CREATE TABLE IF NOT EXISTS api_keys (
        id INT PRIMARY KEY AUTO_INCREMENT,
        name VARCHAR(255) NOT NULL,
        key_value VARCHAR(255) NOT NULL UNIQUE,
        created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        last_used TIMESTAMP NULL,
        revoked TINYINT(1) DEFAULT 0,
        INDEX idx_key_value (key_value),
        INDEX idx_revoked (revoked)
    )");

    echo "Database migrations completed successfully.\n";
    
    // Insert default settings
    $stmt = $pdo->prepare("INSERT IGNORE INTO settings (name, value) VALUES (?, ?)");
    $stmt->execute(['log_retention_days', '30']);
    
    echo "Default settings inserted.\n";

} catch (PDOException $e) {
    die("Error during migrations: " . $e->getMessage());
}