<?php
if (session_status() !== PHP_SESSION_ACTIVE) { session_start(); }
if (empty($_SESSION['instructor_csrf'])) { $_SESSION['instructor_csrf'] = bin2hex(random_bytes(32)); }
function instructor_csrf_token(): string { return $_SESSION['instructor_csrf']; }
function instructor_csrf_valid($token): bool { return isset($_SESSION['instructor_csrf']) && is_string($token) && hash_equals($_SESSION['instructor_csrf'], $token); }
