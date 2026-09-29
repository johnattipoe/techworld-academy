<?php
// ../process/login-process.php
require_once(__DIR__ . '/../../system files/config/config.php');
// Add login attempt logging and account lockout
define('MAX_LOGIN_ATTEMPTS', 5);
define('LOCKOUT_MINUTES', 15);

// Always start session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Allow only POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit('Method Not Allowed');
}

// Sanitize inputs
$email    = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$password = $_POST['password'] ?? '';

// Helper: get client IP
function getClientIp() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        return $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        return $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        return $_SERVER['REMOTE_ADDR'] ?? 'unknown';
    }
}
if (!$email || !$password) {
    $_SESSION['flash'] = 'Please enter both email and password.';
    header('Location: ../authentication/login.php');
    exit;
}

try {
    // Get PDO connection from config
    global $pdo;
    if (!isset($pdo)) {
        throw new Exception('Database connection failed');
    }

    // Look up user
    $stmt = $pdo->prepare("SELECT id, email, password FROM users WHERE email = ? LIMIT 1");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    // Check for lockout
    $lockedOut = false;
    $lockoutExpires = null;
    if ($user) {
        $stmt2 = $pdo->prepare("SELECT COUNT(*) AS fail_count, MAX(attempt_time) AS last_fail FROM login_attempts WHERE user_id = ? AND success = 0 AND attempt_time > (NOW() - INTERVAL ? MINUTE)");
        $stmt2->execute([$user['id'], LOCKOUT_MINUTES]);
        $row = $stmt2->fetch();
        if ($row && $row['fail_count'] >= MAX_LOGIN_ATTEMPTS) {
            $lockedOut = true;
            $lockoutExpires = date('Y-m-d H:i:s', strtotime($row['last_fail'] . ' + ' . LOCKOUT_MINUTES . ' minutes'));
        }
    }

    if ($user && password_verify($password, $user['password'])) {
            if ($lockedOut) {
                $_SESSION['flash'] = 'Account locked due to too many failed logins. Try again after ' . $lockoutExpires . '.';
                header('Location: ../authentication/login.php');
                exit;
            }
            // ✅ Correct password
            // Prevent session fixation
            session_regenerate_id(true);
            // Store data in session
            $_SESSION['user_id']    = $user['id'];
            $_SESSION['user_email'] = $user['email'];
            // Log successful login
            $stmt3 = $pdo->prepare("INSERT INTO login_attempts (user_id, email, ip_address, success) VALUES (?, ?, ?, 1)");
            $stmt3->execute([$user['id'], $email, getClientIp()]);
            // Flash message
            $_SESSION['flash'] = 'Welcome back, ' . htmlspecialchars($user['email']) . '!';
            // Redirect to dashboard
            header('Location: ../dashboard/index.php');
            exit;
        } else {
            // ❌ Invalid login
            if ($user) {
                $stmt4 = $pdo->prepare("INSERT INTO login_attempts (user_id, email, ip_address, success) VALUES (?, ?, ?, 0)");
                $stmt4->execute([$user['id'], $email, getClientIp()]);
            }
            $_SESSION['flash'] = $lockedOut ? ('Account locked due to too many failed logins. Try again after ' . $lockoutExpires . '.') : 'Invalid email or password.';
            header('Location: ../authentication/login.php');
            exit;
        }

} catch (PDOException $e) {
    error_log('Database error: ' . $e->getMessage());
    $_SESSION['flash'] = 'Database error. Please try again later.';
    header('Location: ../authentication/login.php');
    exit;

} catch (Exception $e) {
    error_log('Login error: ' . $e->getMessage());
    $_SESSION['flash'] = 'Unexpected error. Please try again later.';
    header('Location: ../authentication/login.php');
    exit;
}
