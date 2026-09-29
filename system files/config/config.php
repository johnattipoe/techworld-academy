<?php
// Central configuration - reads from environment variables with sensible defaults
return [
    'db' => [
    'dsn' => getenv('TW_DB_DSN') ?: 'mysql:host=127.0.0.1;port=3307;dbname=techworld_db;charset=utf8mb4',
    'user' => getenv('TW_DB_USER') ?: 'root',
    'pass' => getenv('TW_DB_PASS') ?: '',
        'opts' => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ],
    ],
    // Upload directory - put outside webroot if possible
    'upload_dir' => getenv('TW_UPLOAD_DIR') ?: realpath(__DIR__ . '/../uploads'),
];

