<?php
session_start();
require_once __DIR__ . '/../../utils/logger/logger.php';
require_once __DIR__ . '/../../utils/security/csrf/csrf.php';
$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim((string)($_POST['username'] ?? ''));
    $password = (string)($_POST['password'] ?? '');
    if (!CSRF::validateToken($_POST['csrf_token'] ?? '')) {
        $message = 'Your session expired. Please reload the page and try again.';
    } elseif ($username === '' || $password === '') {
        $message = 'Username/email and password are required.';
    } else {
        require_once __DIR__ . '/../../Database/db/db.php';
        try {
            $pdo = get_db();
            $stmt = $pdo->prepare('SELECT id, username, email, password, role, status FROM users WHERE username = ? OR email = ? LIMIT 1');
            $stmt->execute([$username, $username]);
            $user = $stmt->fetch();
        } catch (Throwable $e) {
            error_log('Login database error: ' . $e->getMessage());
            $message = 'Unable to sign in right now. Please try again later.';
            $user = false;
        }
        if ($user && ($user['status'] ?? 'active') === 'active' && password_verify($password, $user['password'])) {
            session_regenerate_id(true);
            log_action($username, 'login', 'success');
            $_SESSION['username'] = $user['username'];
            $_SESSION['user_id'] = (int)$user['id'];
            $_SESSION['role'] = $user['role'];
            $dashboardUrl = match ($user['role']) {
                'admin' => '/Admin-dashboard/Admin_dashboard/Admin_dashboard.php',
                'instructor' => '/instructor-dashboard/instructor_dashboard/instructor_dashboard.php',
                default => '/lms-dashboard/lms_dashboard/lms_dashboard.php',
            };
            header('Content-Type: text/html; charset=UTF-8');
            ?>
            <!doctype html>
            <html lang="en"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"><title>Login successful</title>
            <style>body{margin:0;background:transparent;color:#263238;font:14px/1.45 Arial,sans-serif}.success-toast{position:fixed;top:18px;right:18px;width:min(340px,calc(100vw - 36px));box-sizing:border-box;padding:16px 18px;background:#fff;border:1px solid #dce5df;border-left:4px solid #198754;border-radius:6px;box-shadow:0 8px 24px rgba(0,0,0,.12)}.success-toast strong{display:block;margin-bottom:3px;font-size:15px}.success-toast p{margin:0 0 9px;color:#626b66}.success-toast a{color:#157347;font-weight:600}@media(max-width:480px){.success-toast{top:12px;right:12px;width:calc(100vw - 24px)}}</style></head>
            <body><p>Opening your dashboard...</p><script>
            (function(){
              var dashboard = <?= json_encode($dashboardUrl, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) ?>;
              try {
                if (window.opener && !window.opener.closed && window.opener.location.origin === window.location.origin) {
                  if (typeof window.opener.showTechworldLoginToast === 'function') {
                    window.opener.showTechworldLoginToast();
                  } else {
                    window.opener.postMessage({ type: 'techworld-login-success' }, window.location.origin);
                  }
                }
              } catch (error) {}
              window.location.replace(dashboard);
            }());
            </script></body></html>
            <?php
            exit;
        }
        if ($message === '') {
            log_action($username, 'login', 'failed');
            $message = 'Invalid username/email or password.';
        }
    }
}

include(__DIR__ . '/..\..\includes\header\header.php');
include(__DIR__ . '/../includes/loading.php');

 ?>


<!-- LOGIN PAGE -->
<section class="min-vh-100 d-flex align-items-center justify-content-center" style="background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
          <div class="row g-0">
            <!-- Left Side: Illustration or Branding -->
            <div class="col-md-5 d-none d-md-flex align-items-center justify-content-center bg-success bg-gradient text-white p-4">
              <div class="text-center">
                <img src="/assets/images/logo.png" alt="Logo" class="mb-4" style="max-width: 120px;">
                <h2 class="fw-bold">Welcome Back!</h2>
                <p class="mt-3">Log in to access your TECHWORLD Academy dashboard and continue your learning journey.</p>
              </div>
            </div>
            <!-- Right Side: Form -->
            <div class="col-md-7">
              <div class="card-body p-5">
                <h3 class="text-center fw-bold mb-4 text-success">Login</h3>
                <!-- Login Form -->
                <?php if(!empty($message)): ?>
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= htmlspecialchars($message) ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                <?php endif; ?>
                <form id="loginForm" action="" method="POST" target="_blank" rel="opener">
                  <?= CSRF::getTokenField() ?>
                  <div class="mb-3">
                    <label for="username" class="form-label fw-semibold">Username or Email</label>
                    <input type="text" class="form-control rounded-3" id="username" name="username" placeholder="Enter your username or email" required>
                  </div>
                  <div class="mb-3">
                    <label for="password" class="form-label fw-semibold">Password</label>
                    <input type="password" class="form-control rounded-3" id="password" name="password" placeholder="Enter password" required>
                  </div>
                  <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="remember">
                      <label class="form-check-label small" for="remember">Remember me</label>
                    </div>
                    <a href="/authenication/forgot_password/forgot_password.php" class="text-success fw-semibold text-decoration-none">Forgot Password?</a>
                  </div>
                  <div class="d-grid">
                    <button type="submit" class="btn btn-success rounded-3 shadow">Login</button>
                  </div>
                </form>
                <div class="text-center my-3">
                  <span class="text-muted">or continue with</span>
                </div>
                <div class="d-flex flex-wrap justify-content-center gap-2 mb-3" aria-label="Sign in or register with Google, Microsoft, or Yahoo">
                  <a class="btn btn-outline-secondary btn-sm" href="/authenication/oauth/start.php?provider=google" target="_blank" rel="opener"><i class="fa-brands fa-google me-1" aria-hidden="true"></i>Gmail</a>
                  <a class="btn btn-outline-secondary btn-sm" href="/authenication/oauth/start.php?provider=microsoft" target="_blank" rel="opener"><i class="fa-brands fa-microsoft me-1" aria-hidden="true"></i>Outlook</a>
                  <a class="btn btn-outline-secondary btn-sm" href="/authenication/oauth/start.php?provider=yahoo" target="_blank" rel="opener"><i class="fa-brands fa-yahoo me-1" aria-hidden="true"></i>Yahoo</a>
                </div>
                <!-- Divider -->
                <div class="text-center my-3">
                  <span class="text-muted">or</span>
                </div>
                <!-- Register Link -->
                <p class="text-center mt-3 mb-0">Don't have an account? 
                  <a href="/authenication/register/register.php" class="text-success fw-bold text-decoration-none">Register</a>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</section>
<script>
(function(){
  function showLoginToast(){
    if (document.getElementById('loginSuccessToast')) return;
    var toast = document.createElement('div');
    toast.id = 'loginSuccessToast';
    toast.setAttribute('role', 'status');
    toast.setAttribute('aria-live', 'polite');
    toast.style.cssText = 'position:fixed;top:18px;right:18px;z-index:50000;width:min(320px,calc(100vw - 36px));box-sizing:border-box;padding:14px 16px;background:#fff;border:1px solid #dce5df;border-left:4px solid #198754;border-radius:5px;box-shadow:0 5px 18px rgba(0,0,0,.16);font:14px/1.45 Arial,sans-serif;color:#263238';
    var title = document.createElement('strong');
    title.textContent = 'Login successful';
    var detail = document.createElement('div');
    detail.textContent = 'Your dashboard opened in a new tab.';
    detail.style.cssText = 'margin-top:3px;color:#626b66';
    toast.appendChild(title);
    toast.appendChild(detail);
    document.body.appendChild(toast);
    window.setTimeout(function(){ window.location.replace('/index.php'); }, 3000);
  }
  window.showTechworldLoginToast = showLoginToast;
  window.addEventListener('message', function(event){
    if (event.origin === window.location.origin && event.data && event.data.type === 'techworld-login-success') showLoginToast();
  });
  var form = document.getElementById('loginForm');
  if (form) {
    form.addEventListener('submit', function(){
      var resultName = 'techworldLoginResult' + Date.now();
      var resultTab = window.open('about:blank', resultName);
      if (resultTab) form.target = resultName;
    });
  }
}());
</script>