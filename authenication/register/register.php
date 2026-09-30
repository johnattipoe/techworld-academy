<?php
session_start();
require_once __DIR__ . '/../../utils/logger/logger.php';
require_once __DIR__ . '/../../utils/security/csrf/csrf.php';
$message = '';
$message_type = 'danger';
$username = $email = $full_name = $phone = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim((string)($_POST['username'] ?? ''));
    $email = trim((string)($_POST['email'] ?? ''));
    $password = (string)($_POST['password'] ?? '');
    $confirm_password = (string)($_POST['confirm_password'] ?? '');
    $full_name = trim((string)($_POST['full_name'] ?? ''));
    $phone = trim((string)($_POST['phone'] ?? ''));
    if (!CSRF::validateToken($_POST['csrf_token'] ?? '')) {
        $message = 'Your session expired. Please reload the page and try again.';
    } elseif ($username === '' || $email === '' || $password === '' || $full_name === '') {
        $message = 'All required fields must be filled.';
    } elseif (!isset($_POST['terms'])) {
        $message = 'Please accept the Terms & Conditions to register.';
    } elseif (!preg_match('/^[a-zA-Z0-9_.-]{3,50}$/', $username)) {
        $message = 'Username must be 3 to 50 characters using letters, numbers, dots, underscores, or hyphens.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = 'Please enter a valid email address.';
    } elseif (strlen($password) < 10) {
        $message = 'Password must be at least 10 characters long.';
    } elseif (!hash_equals($password, $confirm_password)) {
        $message = 'Passwords do not match.';
    } else {
        require_once __DIR__ . '/../../Database/db/db.php';
        try {
            $pdo = get_db();
            $stmt = $pdo->prepare('INSERT INTO users (username, email, password, full_name, phone, role) VALUES (?, ?, ?, ?, ?, ?)');
            $stmt->execute([$username, $email, password_hash($password, PASSWORD_DEFAULT), $full_name, $phone, 'student']);
            log_action($username, 'register', 'success');
            $message = 'Registration successful! You can now login.';
            $message_type = 'success';
            $username = $email = $full_name = $phone = '';
        } catch (PDOException $e) {
            log_action('system', 'register_error', $e->getMessage());
            $isDuplicate = (int)($e->errorInfo[1] ?? 0) === 1062;
            $message = $isDuplicate
                ? 'That username or email may already be registered. Please check and try again.'
                : 'Registration could not be completed because of a database error. Please try again later.';
        }
    }
    if ($message_type !== 'success') log_action($username, 'register', 'failed');
}
include(__DIR__ . '/../../includes/header/header.php');
include(__DIR__ . '/../includes/loading.php');

?>


<!-- REGISTER PAGE -->
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
                <h2 class="fw-bold">Welcome!</h2>
                <p class="small fw-semibold mb-2">Sign in or create an account with</p>
                <div class="d-flex flex-wrap justify-content-center gap-2" aria-label="Sign in or register with Google, Microsoft, or Yahoo">
                  <a class="btn btn-light btn-sm" href="/authenication/oauth/start.php?provider=google" target="_blank" rel="opener"><i class="fa-brands fa-google me-1" aria-hidden="true"></i>Gmail</a>
                  <a class="btn btn-light btn-sm" href="/authenication/oauth/start.php?provider=microsoft" target="_blank" rel="opener"><i class="fa-brands fa-microsoft me-1" aria-hidden="true"></i>Outlook</a>
                  <a class="btn btn-light btn-sm" href="/authenication/oauth/start.php?provider=yahoo" target="_blank" rel="opener"><i class="fa-brands fa-yahoo me-1" aria-hidden="true"></i>Yahoo</a>
                </div>
                <p class="mt-3">Join TECHWORLD Academy and unlock your potential.<br>Learn, grow, and succeed with us.</p>
              </div>
            </div>
            <!-- Right Side: Form -->
            <div class="col-md-7">
              <div class="card-body p-5">
                <h3 class="text-center fw-bold mb-4 text-success">Create Account</h3>
                <!-- Register Form -->
                <?php if(!empty($message)): ?>
                  <div class="alert alert-<?= $message_type ?> alert-dismissible fade show" role="alert">
                    <?= htmlspecialchars($message) ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                <?php endif; ?>
                <form action="" method="POST">
                  <?= CSRF::getTokenField() ?>
                  <div class="row">
                    <div class="col-md-6 mb-3">
                      <label for="username" class="form-label fw-semibold">Username</label>
                      <input type="text" class="form-control rounded-3" id="username" name="username" placeholder="Choose a username" required>
                    </div>
                    <div class="col-md-6 mb-3">
                      <label for="full_name" class="form-label fw-semibold">Full Name</label>
                      <input type="text" class="form-control rounded-3" id="full_name" name="full_name" placeholder="Enter your full name" required>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 mb-3">
                      <label for="phone" class="form-label fw-semibold">Phone Number</label>
                      <input type="tel" class="form-control rounded-3" id="phone" name="phone" placeholder="Enter your phone number" required>
                    </div>
                    <div class="col-md-6 mb-3">
                      <label for="email" class="form-label fw-semibold">Email Address</label>
                      <input type="email" class="form-control rounded-3" id="email" name="email" placeholder="Enter your email" required>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 mb-3">
                      <label for="password" class="form-label fw-semibold">Password</label>
                      <input type="password" class="form-control rounded-3" id="password" name="password" placeholder="Enter password" required>
                    </div>
                    <div class="col-md-6 mb-3">
                      <label for="confirm_password" class="form-label fw-semibold">Confirm Password</label>
                      <input type="password" class="form-control rounded-3" id="confirm_password" name="confirm_password" placeholder="Confirm password" required>
                    </div>
                  </div>
                  <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" id="terms" name="terms" value="1" required>
                    <label class="form-check-label small" for="terms">
                      I agree to the <a href="../terms.php" class="text-success fw-semibold text-decoration-none">Terms & Conditions</a>.
                    </label>
                  </div>
                  <div class="d-grid">
                    <button type="submit" class="btn btn-success rounded-3 shadow">Register</button>
                  </div>
                </form>
                <!-- Divider -->
                <div class="text-center my-3">
                  <span class="text-muted">or</span>
                </div>
                <!-- Login Link -->
                <p class="text-center mt-3 mb-0">Already have an account? 
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
