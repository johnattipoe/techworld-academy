<?php
declare(strict_types=1);
session_start();
require_once __DIR__ . '/../../utils/security/csrf/csrf.php';
require_once __DIR__ . '/../../Database/db/db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !CSRF::validateToken($_POST['csrf_token'] ?? '')) {
    http_response_code(400);
    exit('Invalid request. Return to the password reset form and try again.');
}
$email = filter_var(trim((string)($_POST['email'] ?? '')), FILTER_VALIDATE_EMAIL);
$generic = 'If an account matches that email address, a password reset link will be sent.';
$_SESSION['password_reset_notice'] = $generic;
if ($email) {
    try {
        $pdo = get_db();
        $stmt = $pdo->prepare("SELECT id, email FROM users WHERE email = ? AND status = 'active' LIMIT 1");
        $stmt->execute([$email]);
        $user = $stmt->fetch();
        if ($user) {
            $rawToken = bin2hex(random_bytes(32));
            $tokenHash = hash('sha256', $rawToken);
            $save = $pdo->prepare('INSERT INTO password_reset_tokens (user_id, token_hash, expires_at) VALUES (?, ?, DATE_ADD(UTC_TIMESTAMP(), INTERVAL 1 HOUR))');
            $save->execute([(int)$user['id'], $tokenHash]);
            $https = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off');
            $base = rtrim((string)env('APP_URL', (($https ? 'https' : 'http') . '://' . ($_SERVER['HTTP_HOST'] ?? 'localhost'))), '/');
            $link = $base . '/authenication/forgot_password/reset_password.php?token=' . rawurlencode($rawToken);
            $from = (string)env('MAIL_FROM_ADDRESS', '');
            $fromName = (string)env('MAIL_FROM_NAME', 'TECHWORLD Academy');
            if ($from !== '' && filter_var($from, FILTER_VALIDATE_EMAIL)) {
                $subject = 'Reset your TECHWORLD Academy password';
                $body = "A password reset was requested for your account. Use this link within one hour:\n\n" . $link . "\n\nIf you did not request this, you can ignore this email.";
                $headers = "From: " . mb_encode_mimeheader($fromName) . " <$from>\r\nContent-Type: text/plain; charset=UTF-8";
                if (!mail($email, $subject, $body, $headers)) {
                    error_log('Password reset email transport failed. Configure server mail delivery.');
                }
            } else {
                error_log('Password reset requested but MAIL_FROM_ADDRESS is not configured.');
            }
        }
    } catch (Throwable $e) {
        error_log('Password reset request failed: ' . $e->getMessage());
    }
}
header('Location: forgot_password.php', true, 303);
exit;