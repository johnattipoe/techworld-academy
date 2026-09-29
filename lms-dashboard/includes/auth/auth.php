<?php
if (session_status() !== PHP_SESSION_ACTIVE) { session_start(); }
if (empty($_SESSION['user_id']) || empty($_SESSION['username']) || (($_SESSION['role'] ?? '') !== 'student')) {
    header('Location: /authenication/login/login.php');
    exit;
}
