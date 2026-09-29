<?php
session_start();
if (($_SESSION['role'] ?? '') !== 'instructor' || empty($_SESSION['user_id'])) { header('Location: /authenication/login/login.php'); exit; }
require_once(__DIR__ . '/../../includes/db/db.php');
require_once(__DIR__ . '/../../includes/csrf/csrf.php');
$pdo = get_db();
$userId = (int)$_SESSION['user_id'];
$message = ''; $messageType = 'info';
$stmt = $pdo->prepare('SELECT id, username, email, full_name, phone FROM users WHERE id = ?');
$stmt->execute([$userId]); $user = $stmt->fetch(PDO::FETCH_ASSOC) ?: [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!instructor_csrf_valid($_POST['csrf_token'] ?? null)) { http_response_code(403); $message = 'Session token expired. Reload this page and try again.'; $messageType = 'danger'; }
    else {
        $name = trim($_POST['full_name'] ?? ''); $email = trim($_POST['email'] ?? ''); $phone = trim($_POST['phone'] ?? '');
        if ($name === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) { $message = 'Enter a name and a valid email address.'; $messageType = 'warning'; }
        else {
            try { $q = $pdo->prepare('UPDATE users SET full_name = ?, email = ?, phone = ? WHERE id = ?'); $q->execute([$name, $email, $phone, $userId]); $message = 'Your profile was saved.'; $messageType = 'success'; $user['full_name']=$name; $user['email']=$email; $user['phone']=$phone; $_SESSION['full_name']=$name; }
            catch (PDOException $e) { $message = 'That email address may already be in use.'; $messageType = 'danger'; }
        }
    }
}
$pageTitle='Profile'; include(__DIR__.'/../../includes/header/header.php'); include(__DIR__.'/../../includes/navbar/navbar.php'); include(__DIR__.'/../../includes/sidebar/sidebar.php');
?>
<main class="main-content"><div class="page-content container-fluid"><div class="page-heading"><div><span class="eyebrow">ACCOUNT</span><h1>Profile</h1><p>Keep your instructor contact details up to date.</p></div></div>
<?php if($message): ?><div class="alert alert-<?=htmlspecialchars($messageType)?>"><?=htmlspecialchars($message)?></div><?php endif; ?>
<div class="row g-4"><div class="col-xl-8"><section class="card dashboard-card"><div class="card-body p-4"><form method="post" class="row g-3"><input type="hidden" name="csrf_token" value="<?=htmlspecialchars(instructor_csrf_token(),ENT_QUOTES,'UTF-8')?>"><div class="col-md-6"><label class="form-label">Full name</label><input class="form-control" name="full_name" value="<?=htmlspecialchars($user['full_name']??'',ENT_QUOTES,'UTF-8')?>" required></div><div class="col-md-6"><label class="form-label">Email</label><input class="form-control" type="email" name="email" value="<?=htmlspecialchars($user['email']??'',ENT_QUOTES,'UTF-8')?>" required></div><div class="col-md-6"><label class="form-label">Phone</label><input class="form-control" name="phone" value="<?=htmlspecialchars($user['phone']??'',ENT_QUOTES,'UTF-8')?>"></div><div class="col-md-6"><label class="form-label">Username</label><input class="form-control" value="<?=htmlspecialchars($user['username']??'',ENT_QUOTES,'UTF-8')?>" readonly></div><div class="col-12"><button class="btn btn-primary" type="submit"><i class="fa-regular fa-floppy-disk me-2"></i>Save profile</button></div></form></div></section></div><div class="col-xl-4"><section class="card dashboard-card"><div class="card-body p-4"><span class="profile-avatar profile-avatar-large"><?=htmlspecialchars(strtoupper(substr($user['full_name']??'I',0,1)))?></span><h2 class="h5 mt-3 mb-1"><?=htmlspecialchars($user['full_name']??'Instructor')?></h2><p class="text-muted mb-0"><?=htmlspecialchars($user['email']??'')?></p><hr><a href="/instructor-dashboard/Settings/password/password.php" class="btn btn-outline-primary">Change password</a></div></section></div></div></div></main>
<?php include(__DIR__.'/../../includes/footer/footer.php'); ?>
