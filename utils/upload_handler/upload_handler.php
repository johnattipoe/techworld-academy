<?php
require_once(__DIR__ . '/security/file_upload_security.php');
require_once(__DIR__ . '/../system files/virus_scan.php');

// File upload handler
function handle_file_upload($input_name, $target_dir = '../upload/', $max_size = 10485760) {
    if (!isset($_FILES[$input_name]) || $_FILES[$input_name]['error'] !== UPLOAD_ERR_OK) {
        return ['success' => false, 'message' => 'No file uploaded or upload error.'];
    }

    $file = $_FILES[$input_name];
    $validation = FileUploadSecurity::validateUpload($file, $max_size);
    if (!$validation['valid']) {
        return ['success' => false, 'message' => implode(' ', $validation['errors'])];
    }

    if (!FileUploadSecurity::basicMalwareScan($file['tmp_name'])) {
        return ['success' => false, 'message' => 'File failed malware scan.'];
    }

    $enable_scan = getenv('VIRUS_SCAN_ENABLED') === '1';
    if ($enable_scan && function_exists('virus_scan_file')) {
        if (!virus_scan_file($file['tmp_name'])) {
            return ['success' => false, 'message' => 'Virus scan failed.'];
        }
    }

    try {
        $path = FileUploadSecurity::secureMove($file, $target_dir);
        return ['success' => true, 'filename' => basename($path), 'path' => $path];
    } catch (Exception $e) {
        return ['success' => false, 'message' => 'Failed to move uploaded file.'];
    }
}
?>