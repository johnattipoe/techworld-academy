<?php
$uri = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';
$uri = rawurldecode($uri);
$path = $uri === '/' ? '/index/index.php' : $uri;

$resolved = __DIR__ . $path;
if (is_file($resolved)) {
    $staticExtensions = ['css', 'gif', 'ico', 'jpeg', 'jpg', 'js', 'png', 'svg', 'webp', 'woff', 'woff2'];
    if (in_array(strtolower(pathinfo($resolved, PATHINFO_EXTENSION)), $staticExtensions, true)) {
        return false;
    }

    require $resolved;
    exit;
}

if (is_dir($resolved)) {
    $candidate = $resolved . '/index.php';
    if (is_file($candidate)) {
        require $candidate;
        exit;
    }
}

if ($path === '/index/index.php') {
    require __DIR__ . '/index/index.php';
    exit;
}

http_response_code(404);
echo '404 Not Found';
exit;
