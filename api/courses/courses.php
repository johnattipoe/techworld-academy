<?php
header('Content-Type: application/json; charset=utf-8');
require_once(__DIR__ . '/../system files/db.php');

$pdo = get_db();
if (!$pdo) { echo json_encode(['error'=>'no_db']); exit; }

$method = $_SERVER['REQUEST_METHOD'];
if ($method === 'GET') {
    if (!empty($_GET['id'])) {
        $stmt = $pdo->prepare('SELECT * FROM courses WHERE id = ?');
        $stmt->execute([$_GET['id']]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        echo json_encode($row ?: []);
    } else {
        $stmt = $pdo->query('SELECT c.*, u.username as instructor_name FROM courses c LEFT JOIN users u ON u.id = c.instructor_id');
        echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
    }
    exit;
}

http_response_code(405);
echo json_encode(['error'=>'method_not_allowed']);
