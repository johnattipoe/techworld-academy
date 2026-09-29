<?php
session_start();
require_once(__DIR__ . '/../../../../Database/db/db.php');
require_once(__DIR__ . '/../../../../utils/security/csrf/csrf.php');

header('Content-Type: application/json');

if(($_SESSION['role'] ?? '') !== 'student' || !isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'Not authenticated']);
    exit();
}

if($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
    exit();
}

$csrfToken = $_POST['csrf_token'] ?? $_SERVER['HTTP_X_CSRF_TOKEN'] ?? '';
if (!is_string($csrfToken) || !CSRF::validateToken($csrfToken)) { http_response_code(403); echo json_encode(['success' => false, 'message' => 'Security token expired']); exit(); }

$user_id = $_SESSION['user_id'];

try {
    $conn = get_db();
    
    // Delete all viewing history for user
    $stmt = $conn->prepare("DELETE FROM course_views WHERE user_id = :user_id");
    $stmt->execute(['user_id' => $user_id]);
    
    echo json_encode([
        'success' => true,
        'message' => 'Viewing history cleared successfully'
    ]);
    
} catch (PDOException $e) {
    error_log("Clear history error: " . $e->getMessage());
    echo json_encode([
        'success' => false,
        'message' => 'Database error'
    ]);
}



