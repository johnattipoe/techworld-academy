<?php
session_start();
require_once(__DIR__ . '/oauth.php');
require_once(__DIR__ . '/../../Database/db/db.php');

$auth = $_SESSION['tw_oauth'] ?? null;
unset($_SESSION['tw_oauth']);
if (!is_array($auth) || !isset($auth['provider'], $auth['state'], $auth['verifier'], $auth['created_at']) || time() - (int)$auth['created_at'] > 600) {
    tw_oauth_error('The sign-in session expired. Please start again.');
}
if (!isset($_GET['state']) || !hash_equals((string)$auth['state'], (string)$_GET['state'])) {
    tw_oauth_error('The sign-in request could not be verified. Please try again.');
}
if (isset($_GET['error']) || empty($_GET['code'])) {
    tw_oauth_error('The identity provider cancelled or could not complete sign-in.');
}

$provider = (string)$auth['provider'];
$config = tw_oauth_provider_config($provider);
if ($config === null || empty($config['client_id']) || empty($config['client_secret'])) {
    tw_oauth_error('This sign-in provider is not configured.');
}

try {
    $tokenFields = [
        'grant_type' => 'authorization_code',
        'code' => (string)$_GET['code'],
        'redirect_uri' => $config['redirect_uri'],
    ];
    $tokenHeaders = ['Accept: application/json', 'Content-Type: application/x-www-form-urlencoded'];
    if ($provider === 'yahoo') {
        $tokenHeaders[] = 'Authorization: Basic ' . base64_encode($config['client_id'] . ':' . $config['client_secret']);
    } else {
        $tokenFields['client_id'] = $config['client_id'];
        $tokenFields['client_secret'] = $config['client_secret'];
    }
    if ($config['pkce']) {
        $tokenFields['code_verifier'] = (string)$auth['verifier'];
    }

    $token = tw_oauth_request($config['token_url'], $tokenFields, $tokenHeaders);
    if (empty($token['access_token'])) {
        throw new RuntimeException('The identity provider did not return an access token.');
    }

    $profile = tw_oauth_request($config['userinfo_url'], null, [
        'Accept: application/json',
        'Authorization: Bearer ' . $token['access_token'],
    ]);
    $subject = trim((string)($profile['sub'] ?? ''));
    $email = strtolower(trim((string)($profile['email'] ?? '')));
    $name = trim((string)($profile['name'] ?? ''));
    $emailVerified = in_array($profile['email_verified'] ?? false, [true, 1, '1', 'true'], true);

    if ($subject === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        throw new RuntimeException('The provider did not return a usable email address.');
    }

    $pdo = get_db();
    $pdo->beginTransaction();

    $linked = $pdo->prepare('SELECT u.id, u.username, u.role FROM oauth_accounts oa JOIN users u ON u.id = oa.user_id WHERE oa.provider = ? AND oa.provider_subject = ? LIMIT 1');
    $linked->execute([$provider, $subject]);
    $user = $linked->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        $byEmail = $pdo->prepare('SELECT id, username, role FROM users WHERE email = ? LIMIT 1');
        $byEmail->execute([$email]);
        $user = $byEmail->fetch(PDO::FETCH_ASSOC);

        if ($user && !$emailVerified) {
            throw new RuntimeException('An account already uses this email. Sign in with your password first; this provider did not confirm the email address for secure account linking.');
        }

        if (!$user) {
            $base = strtolower((string)strstr($email, '@', true));
            $base = trim((string)preg_replace('/[^a-z0-9._-]+/', '.', $base), '._-');
            $base = substr($base !== '' ? $base : 'student', 0, 40);
            $username = $base;
            $suffix = 1;
            $usernameCheck = $pdo->prepare('SELECT 1 FROM users WHERE username = ? LIMIT 1');
            while (true) {
                $usernameCheck->execute([$username]);
                if (!$usernameCheck->fetchColumn()) {
                    break;
                }
                $username = substr($base, 0, 40) . '-' . $suffix++;
            }

            $displayName = $name !== '' ? $name : $base;
            $passwordHash = password_hash(bin2hex(random_bytes(32)), PASSWORD_DEFAULT);
            $create = $pdo->prepare('INSERT INTO users (username, email, password, full_name, role, status) VALUES (?, ?, ?, ?, ?, ?)');
            $create->execute([$username, $email, $passwordHash, $displayName, 'student', 'active']);
            $user = ['id' => (int)$pdo->lastInsertId(), 'username' => $username, 'role' => 'student'];
        }

        $link = $pdo->prepare('INSERT INTO oauth_accounts (user_id, provider, provider_subject, email) VALUES (?, ?, ?, ?)');
        $link->execute([$user['id'], $provider, $subject, $email]);
    }

    $pdo->commit();
    session_regenerate_id(true);
    $_SESSION['user_id'] = (int)$user['id'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['role'] = $user['role'];

    $dashboard = $user['role'] === 'admin'
        ? '/Admin-dashboard/Admin_dashboard/Admin_dashboard.php'
        : ($user['role'] === 'instructor'
            ? '/instructor-dashboard/instructor_dashboard/instructor_dashboard.php'
            : '/lms-dashboard/lms_dashboard/lms_dashboard.php');
    $dashboardJson = json_encode($dashboard, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT);
    header('Content-Type: text/html; charset=UTF-8');
    echo '<!doctype html><html lang="en"><meta charset="utf-8"><title>Signed in</title><body><script>if(window.opener&&!window.opener.closed){window.opener.location.replace("/index.php");}window.location.replace(' . $dashboardJson . ');</script><noscript><a href="' . htmlspecialchars($dashboard, ENT_QUOTES, 'UTF-8') . '">Continue to your dashboard</a></noscript></body></html>';
} catch (Throwable $error) {
    if (isset($pdo) && $pdo instanceof PDO && $pdo->inTransaction()) {
        $pdo->rollBack();
    }
    error_log('OAuth sign-in failed for ' . $provider . ': ' . $error->getMessage());
    tw_oauth_error($error instanceof RuntimeException ? $error->getMessage() : 'Sign-in could not be completed. Please try again.');
}