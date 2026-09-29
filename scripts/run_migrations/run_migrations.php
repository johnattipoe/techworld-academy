<?php
// Run DB migrations using system files/db.php
require_once(__DIR__ . '/../system files/db.php');
require_once(__DIR__ . '/../system files/function.php');

$pdo = get_db();
if (!$pdo) {
    echo "No database connection (check TW_DB_DSN/TW_DB_USER/TW_DB_PASS or system files/config.php)\n";
    exit(1);
}

$migrations = [
    // users
    "CREATE TABLE IF NOT EXISTS users (
        id INTEGER PRIMARY KEY AUTO_INCREMENT,
        username VARCHAR(100) NOT NULL UNIQUE,
        email VARCHAR(255) NOT NULL UNIQUE,
        password_hash VARCHAR(255) DEFAULT NULL,
        role VARCHAR(50) DEFAULT 'student',
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )",

    // courses
    "CREATE TABLE IF NOT EXISTS courses (
        id INTEGER PRIMARY KEY AUTO_INCREMENT,
        title VARCHAR(255) NOT NULL,
        description TEXT,
        instructor_id INTEGER,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (instructor_id) REFERENCES users(id)
    )",

    // enrollments
    "CREATE TABLE IF NOT EXISTS enrollments (
        id INTEGER PRIMARY KEY AUTO_INCREMENT,
        user_id INTEGER NOT NULL,
        course_id INTEGER NOT NULL,
        instructor_id INTEGER DEFAULT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (user_id) REFERENCES users(id),
        FOREIGN KEY (course_id) REFERENCES courses(id)
    )",

    // activity
    "CREATE TABLE IF NOT EXISTS activity (
        id INTEGER PRIMARY KEY AUTO_INCREMENT,
        user_id INTEGER DEFAULT NULL,
        action VARCHAR(255) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )",
];

foreach ($migrations as $sql) {
    try {
        $pdo->exec($sql);
        echo "Applied: " . strtok(trim($sql), "\n") . "\n";
    } catch (Exception $e) {
        echo "Migration failed: " . $e->getMessage() . "\n";
    }
}

echo "Migrations complete.\n";
