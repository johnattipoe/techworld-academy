<?php
header('Content-Type: application/json; charset=utf-8');
require_once(__DIR__ . '/../system files/db.php');
require_once(__DIR__ . '/../utils/logger.php');
// Simple protection: allow only admin sessions OR a valid api_key param
$allowed = false;
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
    $allowed = true;
    log_action($_SESSION['username'], 'api_audit_logs_access', 'success');
}
// API key fallback
if (!$allowed) {
    $keys = require(__DIR__ . '/../config/api_keys.php');
    $provided = $_GET['api_key'] ?? '';
    if (!empty($provided) && $provided === ($keys['audit_logs_key'] ?? '')) {
        $allowed = true;
        log_action('api_key', 'api_audit_logs_access', 'success');
    } else if (!empty($provided)) {
        log_action('api_key', 'api_audit_logs_access', 'failed: invalid key');
    }
}
if (!$allowed) {
    http_response_code(403);
    echo json_encode(['error' => 'forbidden']);
    exit;
}

$logFile = __DIR__ . '/../logs/audit.log';
$out = ['logs' => [], 'meta' => []];
$lines = [];
if (file_exists($logFile)) {
    $lines = array_reverse(file($logFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES));
}
// Filters
$userFilter = $_GET['user'] ?? '';
$actionFilter = $_GET['action'] ?? '';
$dateFrom = $_GET['date_from'] ?? '';
$dateTo = $_GET['date_to'] ?? '';
$filtered = [];
foreach ($lines as $line) {
    $parts = explode(' | ', $line);
    $date = $parts[0] ?? '';
    $user = $parts[1] ?? '';
    $action = $parts[2] ?? '';
    $include = true;
    if ($userFilter && stripos($user, $userFilter) === false) $include = false;
    if ($actionFilter && stripos($action, $actionFilter) === false) $include = false;
    if ($dateFrom && $date < $dateFrom) $include = false;
    if ($dateTo && $date > $dateTo) $include = false;
    if ($include) $filtered[] = $line;
}
// Pagination
$page = max(1, intval($_GET['page'] ?? 1));
$perPage = max(10, intval($_GET['per_page'] ?? 25));
$total = count($filtered);
$start = ($page - 1) * $perPage;
$paged = array_slice($filtered, $start, $perPage);
$out['logs'] = $paged;
$out['meta'] = ['page' => $page, 'per_page' => $perPage, 'total' => $total, 'total_pages' => max(1, ceil($total / $perPage))];

echo json_encode($out, JSON_PRETTY_PRINT);
