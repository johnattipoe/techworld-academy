<?php
header('Content-Type: application/json; charset=utf-8');
require_once(__DIR__ . '/../../system files/db/db.php');

$pdo = get_db();
if (!$pdo) { echo json_encode(['error'=>'no_db']); exit; }


$method = $_SERVER['REQUEST_METHOD'];
if ($method === 'GET') {
    $stmt = $pdo->query('SELECT id, username, email, role, created_at FROM users');
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($rows);
    exit;
} elseif ($method === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $stmt = $pdo->prepare('INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, ?)');
    $stmt->execute([
        $data['username'],
        $data['email'],
        password_hash($data['password'], PASSWORD_DEFAULT),
        $data['role']
    ]);
    echo json_encode(['success' => true, 'id' => $pdo->lastInsertId()]);
    exit;
} elseif ($method === 'PUT') {
    $data = json_decode(file_get_contents('php://input'), true);
    $stmt = $pdo->prepare('UPDATE users SET username=?, email=?, role=? WHERE id=?');
    $stmt->execute([
        $data['username'],
        $data['email'],
        $data['role'],
        $data['id']
    ]);
    echo json_encode(['success' => true]);
    exit;
} elseif ($method === 'DELETE') {
    $data = json_decode(file_get_contents('php://input'), true);
    $stmt = $pdo->prepare('DELETE FROM users WHERE id=?');
    $stmt->execute([$data['id']]);
    echo json_encode(['success' => true]);
    exit;
}

http_response_code(405);
echo json_encode(['error'=>'method_not_allowed']);
