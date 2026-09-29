<?php
declare(strict_types=1);

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
require_once __DIR__ . '/../../../utils/logger/logger.php';
require_once __DIR__ . '/../../includes/csrf/csrf.php';

$settingsUrl = '/Admin-dashboard/Settings/settings.php';
if (($_SESSION['role'] ?? '') !== 'admin') {
    header('Location: /authenication/login/login.php', true, 303);
    exit;
}
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ' . $settingsUrl, true, 303);
    exit;
}
if (!validate_csrf_token($_POST['csrf_token'] ?? '')) {
    $_SESSION['error'] = 'Your session token expired. Reload the settings page and try again.';
    header('Location: ' . $settingsUrl, true, 303);
    exit;
}

$retentionDays = filter_input(INPUT_POST, 'log_retention_days', FILTER_VALIDATE_INT);
if ($retentionDays === false || $retentionDays === null || $retentionDays < 1 || $retentionDays > 3650) {
    $_SESSION['error'] = 'Choose a retention period from 1 to 3650 days.';
    log_action($_SESSION['username'] ?? 'unknown', 'update_audit_settings', 'failed: Invalid retention period');
} else {
    $_SESSION['admin_log_retention_days'] = $retentionDays;
    $_SESSION['success'] = 'Audit log preference saved for this session.';
    log_action($_SESSION['username'] ?? 'unknown', 'update_audit_settings', 'success: Updated session preference');
}
header('Location: ' . $settingsUrl, true, 303);
exit;
