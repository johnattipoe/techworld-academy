<?php
// Very small file-based rate limiter. Not suitable for high scale. Stores counters in tmp directory.
function rate_limiter_allow($key, $limit = 10, $window = 60) {
    $tmp = sys_get_temp_dir();
    $hash = preg_replace('/[^a-z0-9_\-]/i', '_', $key);
    $file = $tmp . DIRECTORY_SEPARATOR . 'rl_' . $hash . '.json';
    $now = time();
    $data = ['ts' => $now, 'count' => 0, 'window' => $window];
    if (file_exists($file)) {
        $raw = @file_get_contents($file);
        $parsed = json_decode($raw, true);
        if (is_array($parsed)) $data = $parsed;
    }
    if ($now - $data['ts'] > $data['window']) {
        $data['ts'] = $now;
        $data['count'] = 1;
    } else {
        $data['count']++;
    }
    file_put_contents($file, json_encode($data), LOCK_EX);
    return ($data['count'] <= $limit);
}
