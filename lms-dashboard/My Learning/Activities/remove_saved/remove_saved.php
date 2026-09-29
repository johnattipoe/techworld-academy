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

$saved_id = filter_var($_POST['saved_id'] ?? null, FILTER_VALIDATE_INT);
$user_id = $_SESSION['user_id'];

if(!$saved_id) {
    echo json_encode(['success' => false, 'message' => 'Invalid saved course ID']);
    exit();
}

try {
    $conn = get_db();
    
    // Delete saved course (ensure it belongs to current user)
    $stmt = $conn->prepare("
        DELETE FROM saved_courses 
        WHERE id = :saved_id AND user_id = :user_id
    ");
    $stmt->execute([
        'saved_id' => $saved_id,
        'user_id' => $user_id
    ]);
    
    if($stmt->rowCount() > 0) {
        echo json_encode(['success' => true, 'message' => 'Course removed from saved list']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Course not found or already removed']);
    }
    
} catch (PDOException $e) {
    error_log("Remove saved course error: " . $e->getMessage());
    echo json_encode(['success' => false, 'message' => 'Database error']);
}




