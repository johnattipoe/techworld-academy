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
$name = trim((string)($_POST['key_name'] ?? ''));
if ($name === '' || mb_strlen($name) > 100) {
    $_SESSION['error'] = 'Enter a key name of 1 to 100 characters.';
    header('Location: ' . $settingsUrl);
    exit;
}
try {
    require_once __DIR__ . '/../../../config/api_keys/api_keys.php';
    $token = generate_api_key($name);
    if ($token === false) throw new RuntimeException('Unable to create API key.');
    $_SESSION['new_api_key'] = $token;
    $_SESSION['success'] = 'API key created. Copy it now; it cannot be displayed again.';
    log_action((string)$_SESSION['username'], 'create_api_key', 'Created key: ' . $name);
} catch (Throwable $e) {
    error_log('Admin API key creation failed: ' . $e->getMessage());
    $_SESSION['error'] = 'Could not create the API key. Please try again.';
}
header('Location: ' . $settingsUrl);
exit;
