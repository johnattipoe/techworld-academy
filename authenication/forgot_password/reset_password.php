<?php
declare(strict_types=1);
session_start();
require_once __DIR__ . '/../../utils/security/csrf/csrf.php';
require_once __DIR__ . '/../../Database/db/db.php';
$message = '';
$token = (string)($_GET['token'] ?? $_POST['token'] ?? '');
$validFormat = preg_match('/^[a-f0-9]{64}$/', $token) === 1;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $password = (string)($_POST['password'] ?? '');
    $confirm = (string)($_POST['confirm_password'] ?? '');
    if (!CSRF::validateToken($_POST['csrf_token'] ?? '')) {
        $message = 'Your session expired. Reload the page and try again.';
    } elseif (!$validFormat) {
        $message = 'This reset link is invalid or expired. Request a new link.';
    } elseif (strlen($password) < 10) {
        $message = 'Choose a password with at least 10 characters.';
    } elseif (!hash_equals($password, $confirm)) {
        $message = 'The passwords do not match.';
    } else {
        try {
            $pdo = get_db();
            $pdo->beginTransaction();
            $find = $pdo->prepare('SELECT id, user_id FROM password_reset_tokens WHERE token_hash = ? AND used_at IS NULL AND expires_at > UTC_TIMESTAMP() LIMIT 1 FOR UPDATE');
            $find->execute([hash('sha256', $token)]);
            $record = $find->fetch();
            if (!$record) {
                $pdo->rollBack();
                $message = 'This reset link is invalid or expired. Request a new link.';
            } else {
                $update = $pdo->prepare('UPDATE users SET password = ? WHERE id = ?');
                $update->execute([password_hash($password, PASSWORD_DEFAULT), (int)$record['user_id']]);
                $consume = $pdo->prepare('UPDATE password_reset_tokens SET used_at = UTC_TIMESTAMP() WHERE user_id = ? AND used_at IS NULL');
                $consume->execute([(int)$record['user_id']]);
                $pdo->commit();
                $_SESSION['password_reset_success'] = true;
                header('Location: /authenication/login/login.php?reset=success', true, 303);
                exit;
            }
        } catch (Throwable $e) {
            if (isset($pdo) && $pdo->inTransaction()) $pdo->rollBack();
            error_log('Password reset completion failed: ' . $e->getMessage());
            $message = 'Password could not be updated. Please request a new reset link.';
        }
    }
}
include __DIR__ . '/../../includes/header/header.php';
include __DIR__ . '/../includes/loading.php';
?>
<section class="min-vh-100 d-flex align-items-center justify-content-center py-5" style="background:linear-gradient(135deg,#11998e,#38ef7d)"><div class="container"><div class="row justify-content-center"><div class="col-md-7 col-lg-5"><div class="card border-0 shadow-lg rounded-4"><div class="card-body p-4 p-md-5"><h1 class="h3 text-center text-success fw-bold mb-3">Choose a new password</h1><p class="text-muted text-center">Use at least 10 characters for your new password.</p><?php if ($message !== ''): ?><div class="alert alert-danger" role="alert"><?= htmlspecialchars($message, ENT_QUOTES, 'UTF-8') ?></div><?php endif; ?><?php if (!$validFormat): ?><div class="alert alert-warning">This reset link is invalid. Request a new one from the <a href="forgot_password.php">forgot-password page</a>.</div><?php else: ?><form method="post" action="reset_password.php"><input type="hidden" name="token" value="<?= htmlspecialchars($token, ENT_QUOTES, 'UTF-8') ?>"><?= CSRF::getTokenField() ?><div class="mb-3"><label class="form-label" for="password">New password</label><input class="form-control" type="password" id="password" name="password" minlength="10" autocomplete="new-password" required></div><div class="mb-3"><label class="form-label" for="confirm_password">Confirm password</label><input class="form-control" type="password" id="confirm_password" name="confirm_password" minlength="10" autocomplete="new-password" required></div><button class="btn btn-success w-100" type="submit">Update password</button></form><?php endif; ?><p class="text-center mt-4 mb-0"><a href="/authenication/login/login.php">Back to login</a></p></div></div></div></div></div></section>