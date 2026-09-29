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

$path_id = filter_var($_POST['path_id'] ?? null, FILTER_VALIDATE_INT);
$user_id = $_SESSION['user_id'];

if(!$path_id) {
    echo json_encode(['success' => false, 'message' => 'Invalid path ID']);
    exit();
}

try {
    $conn = get_db();
    
    // Check if path exists and is active
    $stmt = $conn->prepare("SELECT id FROM learning_paths WHERE id = :path_id AND is_active = 1");
    $stmt->execute(['path_id' => $path_id]);
    if(!$stmt->fetch()) {
        echo json_encode(['success' => false, 'message' => 'Learning path not found']);
        exit();
    }
    
    // Check if already enrolled
    $stmt = $conn->prepare("SELECT id FROM user_learning_paths WHERE user_id = :user_id AND path_id = :path_id");
    $stmt->execute(['user_id' => $user_id, 'path_id' => $path_id]);
    if($stmt->fetch()) {
        echo json_encode(['success' => false, 'message' => 'Already enrolled in this path']);
        exit();
    }
    
    // Enroll user in learning path
    $stmt = $conn->prepare("
        INSERT INTO user_learning_paths (user_id, path_id, status) 
        VALUES (:user_id, :path_id, 'active')
    ");
    $stmt->execute([
        'user_id' => $user_id,
        'path_id' => $path_id
    ]);
    
    echo json_encode([
        'success' => true,
        'message' => 'Successfully enrolled in learning path'
    ]);
    
} catch (PDOException $e) {
    error_log("Enroll path error: " . $e->getMessage());
    echo json_encode([
        'success' => false,
        'message' => 'Database error'
    ]);
}




