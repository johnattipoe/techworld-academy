<?php
session_start();
require_once(__DIR__ . '/../../../../Database/db/db.php');

header('Content-Type: application/json');

if(($_SESSION['role'] ?? '') !== 'student' || !isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'Not authenticated']);
    exit();
}

$user_id = $_SESSION['user_id'];

try {
    $conn = get_db();
    
    // Fetch all active learning paths that user is NOT enrolled in
    $stmt = $conn->prepare("
        SELECT 
            lp.id,
            lp.title,
            lp.description,
            lp.difficulty,
            lp.estimated_time,
            COUNT(DISTINCT lpc.id) as total_courses
        FROM learning_paths lp
        LEFT JOIN learning_path_courses lpc ON lp.id = lpc.path_id
        WHERE lp.is_active = 1
        AND lp.id NOT IN (
            SELECT path_id FROM user_learning_paths WHERE user_id = :user_id
        )
        GROUP BY lp.id
        ORDER BY lp.created_at DESC
    ");
    $stmt->execute(['user_id' => $user_id]);
    $paths = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode([
        'success' => true,
        'paths' => $paths
    ]);
    
} catch (PDOException $e) {
    error_log("Get available paths error: " . $e->getMessage());
    echo json_encode([
        'success' => false,
        'message' => 'Database error',
        'paths' => []
    ]);
}

