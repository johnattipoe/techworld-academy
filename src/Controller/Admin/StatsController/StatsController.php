<?php
namespace TWApp\Controller\Admin;

use TWApp\Database;
use TWApp\Logger;

class StatsController
{
    public static function index()
    {
        header('Content-Type: application/json');
        $pdo = Database::getConnection();
        if (!$pdo) {
            echo json_encode(['success' => false, 'error' => 'DB not configured']);
            return;
        }

        try {
            $users = $pdo->query('SELECT COUNT(*) as c FROM users')->fetchColumn();
            $courses = $pdo->query('SELECT COUNT(*) as c FROM courses')->fetchColumn();
            $enrollments = $pdo->query('SELECT COUNT(*) as c FROM enrollments')->fetchColumn();

            echo json_encode(['success' => true, 'users' => (int)$users, 'courses' => (int)$courses, 'enrollments' => (int)$enrollments]);
        } catch (\Exception $e) {
            Logger::get()->error('Stats error: ' . $e->getMessage());
            echo json_encode(['success' => false, 'error' => 'Query failed']);
        }
    }
}
