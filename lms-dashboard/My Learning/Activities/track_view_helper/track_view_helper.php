<?php
// Track course view helper script
// Include this in course-player.php or anywhere you want to track views

function track_course_view($user_id, $course_id) {
    try {
        require_once(__DIR__ . '/../../../../Database/db/db.php');
        $conn = get_db();
        
        $stmt = $conn->prepare("
            INSERT INTO course_views (user_id, course_id) 
            VALUES (:user_id, :course_id)
        ");
        $stmt->execute([
            'user_id' => $user_id,
            'course_id' => $course_id
        ]);
        
        return true;
    } catch (PDOException $e) {
        error_log("Track course view error: " . $e->getMessage());
        return false;
    }
}
