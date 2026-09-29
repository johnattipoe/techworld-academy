<?php
namespace TWApp;

class Auth
{
    public static function init()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public static function isLoggedIn(): bool
    {
        self::init();
        return !empty($_SESSION['user_id']);
    }

    public static function requireLogin(): void
    {
        if (!self::isLoggedIn()) {
            header('Location: /authenication/login.php');
            exit;
        }
    }

    public static function user(): array
    {
        self::init();
        return [
            'id' => $_SESSION['user_id'] ?? null,
            'username' => $_SESSION['username'] ?? null,
            'role' => $_SESSION['role'] ?? null,
        ];
    }

    public static function isAdmin(): bool
    {
        $u = self::user();
        return isset($u['role']) && $u['role'] === 'admin';
    }
}
