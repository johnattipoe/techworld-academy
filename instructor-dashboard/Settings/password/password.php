<?php
session_start(); if (($_SESSION['role']??'')!=='instructor' || empty($_SESSION['user_id'])) { header('Location: /authenication/login/login.php'); exit; }
require_once(__DIR__.'/../../includes/db/db.php'); require_once(__DIR__.'/../../includes/csrf/csrf.php'); $pdo=get_db(); $message=''; $type='info';
if($_SERVER['REQUEST_METHOD']==='POST') {
 if(!instructor_csrf_valid($_POST['csrf_token']??null)){http_response_code(403);$message='Session token expired. Reload this page and try again.';$type='danger';}
 else {
  $current=$_POST['current_password']??''; $new=$_POST['new_password']??''; $confirm=$_POST['confirm_password']??'';
  if(strlen($new)<8){$message='Use at least 8 characters for your new password.';$type='warning';}
  elseif($new!==$confirm){$message='The new passwords do not match.';$type='warning';}
  else { $q=$pdo->prepare('SELECT password FROM users WHERE id=?');$q->execute([(int)$_SESSION['user_id']]);$row=$q->fetch(PDO::FETCH_ASSOC);
   if(!$row || (isset($row['password']) && $row['password']!=='' && !password_verify($current,$row['password']))){$message='The current password is incorrect.';$type='danger';}
   else {$u=$pdo->prepare('UPDATE users SET password=? WHERE id=?');$u->execute([password_hash($new,PASSWORD_DEFAULT),(int)$_SESSION['user_id']]);$message='Your password was changed.';$type='success';}
  }
 }
}
$pageTitle='Change password';include(__DIR__.'/../../includes/header/header.php');include(__DIR__.'/../../includes/navbar/navbar.php');include(__DIR__.'/../../includes/sidebar/sidebar.php');
?>
<main class="main-content"><div class="page-content container-fluid"><div class="page-heading"><div><span class="eyebrow">ACCOUNT SECURITY</span><h1>Change password</h1><p>Choose a strong password you do not use elsewhere.</p></div></div><?php if($message):?><div class="alert alert-<?=htmlspecialchars($type)?>"><?=htmlspecialchars($message)?></div><?php endif;?><div class="row g-4"><div class="col-xl-7"><section class="card dashboard-card"><div class="card-body p-4"><form method="post" class="row g-3"><input type="hidden" name="csrf_token" value="<?=htmlspecialchars(instructor_csrf_token(),ENT_QUOTES,'UTF-8')?>"><div class="col-12"><label class="form-label" for="currentPassword">Current password</label><input class="form-control" id="currentPassword" type="password" name="current_password" autocomplete="current-password" required></div><div class="col-md-6"><label class="form-label" for="newPassword">New password</label><input class="form-control" id="newPassword" type="password" name="new_password" minlength="8" autocomplete="new-password" required></div><div class="col-md-6"><label class="form-label" for="confirmPassword">Confirm password</label><input class="form-control" id="confirmPassword" type="password" name="confirm_password" minlength="8" autocomplete="new-password" required></div><div class="col-12"><button class="btn btn-primary" type="submit">Update password</button></div></form></div></section></div><div class="col-xl-5"><section class="card dashboard-card"><div class="card-body p-4"><h2 class="h5">Password tips</h2><ul class="text-muted mb-0"><li>Use at least 8 characters.</li><li>Mix words, numbers, and symbols.</li><li>Avoid reusing another account password.</li></ul></div></section></div></div></div></main>
<?php include(__DIR__.'/../../includes/footer/footer.php'); ?>
