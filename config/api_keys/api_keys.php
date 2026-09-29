<?php
declare(strict_types=1);

require_once __DIR__ . '/../../Database/db/db.php';

function generate_api_key(string $name): string|false
{
    $userId = filter_var($_SESSION['user_id'] ?? null, FILTER_VALIDATE_INT);
    $name = trim($name);
    if (!$userId || $name === '') return false;

    $token = bin2hex(random_bytes(32));
    try {
        $pdo = get_db();
        $stmt = $pdo->prepare('INSERT INTO api_keys (user_id, token, name, scopes, revoked) VALUES (?, ?, ?, ?, 0)');
        $stmt->execute([(int)$userId, $token, mb_substr($name, 0, 100), 'read']);
        return $token;
    } catch (Throwable $e) {
        error_log('API key creation failed: ' . $e->getMessage());
        return false;
    }
}

function validate_api_key(string $key): bool
{
    if ($key === '') return false;
    try {
        $pdo = get_db();
        $stmt = $pdo->prepare('SELECT 1 FROM api_keys WHERE token = ? AND revoked = 0 LIMIT 1');
        $stmt->execute([$key]);
        return (bool)$stmt->fetchColumn();
    } catch (Throwable $e) {
        error_log('API key validation failed: ' . $e->getMessage());
        return false;
    }
}

function get_api_keys(): array
{
    $userId = filter_var($_SESSION['user_id'] ?? null, FILTER_VALIDATE_INT);
    if (!$userId) return [];
    try {
        $pdo = get_db();
        $stmt = $pdo->prepare('SELECT id, name, scopes, created_at FROM api_keys WHERE user_id = ? AND revoked = 0 ORDER BY created_at DESC');
        $stmt->execute([(int)$userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (Throwable $e) {
        error_log('API key list failed: ' . $e->getMessage());
        return [];
    }
}

function revoke_api_key(int $keyId): bool
{
    $userId = filter_var($_SESSION['user_id'] ?? null, FILTER_VALIDATE_INT);
    if (!$userId || $keyId < 1) return false;
    try {
        $pdo = get_db();
        $stmt = $pdo->prepare('UPDATE api_keys SET revoked = 1 WHERE id = ? AND user_id = ? AND revoked = 0');
        $stmt->execute([$keyId, (int)$userId]);
        return $stmt->rowCount() === 1;
    } catch (Throwable $e) {
        error_log('API key revocation failed: ' . $e->getMessage());
        return false;
    }
}
