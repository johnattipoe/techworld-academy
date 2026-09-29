<?php
// Simple audit log utility
function log_action(string $user, string $action, string $details = ''): void {
    $entry = date('Y-m-d H:i:s') . " | $user | $action | $details\n";
    $logDirectory = __DIR__ . '/../../logs';
    if (!is_dir($logDirectory)) {
        mkdir($logDirectory, 0755, true);
    }
    file_put_contents($logDirectory . '/audit.log', $entry, FILE_APPEND);
}
?>