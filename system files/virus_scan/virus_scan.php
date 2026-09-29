<?php
// Simple virus scan helper that uses 'clamscan' if available on the system.
function virus_scan_file($path) {
    if (!is_file($path)) return false;
    if (getenv('VIRUS_SCAN_ENABLED') !== '1') {
        return true;
    }
    // check for clamscan binary
    $which = null;
    if (strtoupper(substr(PHP_OS, 0, 3)) !== 'WIN') {
        $which = trim(shell_exec('which clamscan 2>/dev/null'));
    }
    if (!$which) {
        // no scanner available - return true to allow but log
        error_log('No virus scanner available for ' . $path);
        return true;
    }
    $cmd = escapeshellcmd($which) . ' --no-summary ' . escapeshellarg($path);
    $out = null; $rc = null;
    exec($cmd, $out, $rc);
    // clamscan returns 0 for ok, 1 for infected
    return ($rc === 0);
}
