<?php
declare(strict_types=1);
session_start();
require_once __DIR__ . '/../../includes/csrf/csrf.php';
require_once __DIR__ . '/../../../utils/logger/logger.php';

$settingsUrl = '/Admin-dashboard/Settings/settings.php#api-keys';
if (($_SESSION['role'] ?? '') !== 'admin' || empty($_SESSION['user_id'])) {
    header('Location: /authenication/login/login.php');
    exit;
}
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $_SESSION['error'] = 'Invalid request method.';
    header('Location: ' . $settingsUrl);
    exit;
}
if (!validate_csrf_token((string)($_POST['csrf_token'] ?? ''))) {
    $_SESSION['error'] = 'Session expired. Reload and try again.';
    header('Location: ' . $settingsUrl);
    exit;
}
$keyId = filter_var($_POST['key_id'] ?? null, FILTER_VALIDATE_INT);
if (!$keyId || $keyId < 1) {
    $_SESSION['error'] = 'Invalid API key.';
    header('Location: ' . $settingsUrl);
    exit;
}
try {
    require_once __DIR__ . '/../../../config/api_keys/api_keys.php';
    if (!revoke_api_key((int)$keyId)) throw new RuntimeException('Key not found or already revoked.');
    $_SESSION['success'] = 'API key revoked.';
    log_action((string)$_SESSION['username'], 'revoke_api_key', 'Revoked key ID: ' . (int)$keyId);
} catch (Throwable $e) {
    error_log('Admin API key revocation failed: ' . $e->getMessage());
    $_SESSION['error'] = 'Could not revoke that API key.';
}
header('Location: ' . $settingsUrl);
exit;
