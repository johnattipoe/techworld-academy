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

$course_id = filter_var($_POST['course_id'] ?? null, FILTER_VALIDATE_INT);
$action = $_POST['action'] ?? '';
$user_id = $_SESSION['user_id'];

if(!$course_id || !in_array($action, ['save', 'unsave'])) {
    echo json_encode(['success' => false, 'message' => 'Invalid parameters']);
    exit();
}

try {
    $conn = get_db();
    
    if($action === 'save') {
        // Add to saved courses
        $stmt = $conn->prepare("
            INSERT INTO saved_courses (user_id, course_id) 
            VALUES (:user_id, :course_id)
            ON DUPLICATE KEY UPDATE saved_at = CURRENT_TIMESTAMP
        ");
        $stmt->execute(['user_id' => $user_id, 'course_id' => $course_id]);
        $message = 'Course saved successfully';
    } else {
        // Remove from saved courses
        $stmt = $conn->prepare("
            DELETE FROM saved_courses 
            WHERE user_id = :user_id AND course_id = :course_id
        ");
        $stmt->execute(['user_id' => $user_id, 'course_id' => $course_id]);
        $message = 'Course removed from saved';
    }
    
    echo json_encode([
        'success' => true,
        'message' => $message
    ]);
    
} catch (PDOException $e) {
    error_log("Toggle save course error: " . $e->getMessage());
    echo json_encode([
        'success' => false,
        'message' => 'Database error'
    ]);
}




