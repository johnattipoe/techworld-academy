<?php
session_start();
require_once __DIR__ . '/../../utils/security/csrf/csrf.php';
include __DIR__ . '/../../includes/header/header.php';
include __DIR__ . '/../includes/loading.php';
?>

<!-- FORGOT PASSWORD PAGE -->
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
                <h2 class="fw-bold">Reset Password</h2>
                <p class="mt-3">Enter your email to receive a password reset link and regain access to your TECHWORLD Academy account.</p>
              </div>
            </div>
            <!-- Right Side: Form -->
            <div class="col-md-7">
              <div class="card-body p-5">
                <h3 class="text-center fw-bold mb-4 text-success">Forgot Password</h3>
                <!-- Forgot Password Form -->
                <?php if (!empty($_SESSION["password_reset_notice"])): ?><div class="alert alert-info" role="status"><?= htmlspecialchars($_SESSION["password_reset_notice"], ENT_QUOTES, "UTF-8") ?></div><?php unset($_SESSION["password_reset_notice"]); endif; ?>
                <form action="process-forgot-password.php" method="POST">
                  <?= CSRF::getTokenField() ?>
                  <div class="mb-3">
                    <label for="email" class="form-label fw-semibold">Email Address</label>
                    <input type="email" class="form-control rounded-3" id="email" name="email" placeholder="Enter your email" required>
                  </div>
                  <div class="d-grid">
                    <button type="submit" class="btn btn-success rounded-3 shadow">Send Reset Link</button>
                  </div>
                </form>
                <!-- Divider -->
                <div class="text-center my-3">
                  <span class="text-muted">or</span>
                </div>
                <!-- Login Link -->
                <p class="text-center mt-3 mb-0">Remembered your password? 
                  <a href="/authenication/login/login.php" class="text-success fw-bold text-decoration-none">Login</a>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
