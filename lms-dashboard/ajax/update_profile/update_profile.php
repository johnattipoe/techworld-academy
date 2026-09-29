<?php
session_start();
require_once(__DIR__ . '/..\..\..\Database\db\db.php');
require_once(__DIR__ . '/..\..\..\utils\security\csrf\csrf.php');

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
    exit;
}

if (($_SESSION['role'] ?? '') !== 'student' || !isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'Not authenticated']);
    exit;
}

$userId = (int)$_SESSION['user_id'];
$token = $_POST['csrf_token'] ?? ($_SERVER['HTTP_X_CSRF_TOKEN'] ?? '');

if (!is_string($token) || !CSRF::validateToken($token)) {
    echo json_encode(['success' => false, 'message' => 'Invalid security token']);
    exit;
}

$fullName = trim((string)($_POST['full_name'] ?? ''));
$username = trim((string)($_POST['username'] ?? ''));
$email = trim((string)($_POST['email'] ?? ''));
$phone = trim((string)($_POST['phone'] ?? ''));

if ($fullName === '' || $username === '' || $email === '') {
    echo json_encode(['success' => false, 'message' => 'Name, username, and email are required']);
    exit;
}

if (mb_strlen($fullName) > 100) {
    echo json_encode(['success' => false, 'message' => 'Name is too long']);
    exit;
}

if (!preg_match('/^[A-Za-z0-9 _.-]{3,50}$/', $username)) {
    echo json_encode(['success' => false, 'message' => 'Username format is invalid']);
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['success' => false, 'message' => 'Email format is invalid']);
    exit;
}

if ($phone !== '' && mb_strlen($phone) > 20) {
    echo json_encode(['success' => false, 'message' => 'Phone number is too long']);
    exit;
}

try {
    $conn = get_db();

    $stmt = $conn->prepare("\n        SELECT id FROM users\n        WHERE (username = ? OR email = ?) AND id != ?\n        LIMIT 1\n    ");
    $stmt->execute([$username, $email, $userId]);
    if ($stmt->fetch(PDO::FETCH_ASSOC)) {
        echo json_encode(['success' => false, 'message' => 'Username or email is already in use']);
        exit;
    }

    $stmt = $conn->prepare("\n        UPDATE users\n        SET full_name = ?, username = ?, email = ?, phone = ?
        WHERE id = ?
    ");
    $stmt->execute([$fullName, $username, $email, $phone, $userId]);

    $_SESSION['username'] = $username;

    echo json_encode(['success' => true, 'message' => 'Profile updated successfully']);
} catch (PDOException $e) {
    error_log('LMS account update failed: ' . $e->getMessage());
    echo json_encode(['success' => false, 'message' => 'Unable to save this account change right now']);
}

