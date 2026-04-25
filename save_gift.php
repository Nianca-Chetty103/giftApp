<?php
// ============================================
//  GiftGenie — Save / Remove Gift
//  POST /php/save_gift.php
// ============================================

require_once 'config.php';

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    jsonResponse(['error' => 'Method not allowed.'], 405);
}

$raw    = file_get_contents('php://input');
$body   = json_decode($raw, true);
$action = $body['action'] ?? 'save'; // 'save' or 'remove'

// Use session-based user id for demo (replace with real auth)
if (!isset($_SESSION['user_id'])) {
    $_SESSION['user_id'] = 1; // demo user
}
$userId = $_SESSION['user_id'];
$db     = getDB();

if ($action === 'remove') {
    $giftId = intval($body['gift_id'] ?? 0);
    $stmt   = $db->prepare('DELETE FROM saved_gifts WHERE id = ? AND user_id = ?');
    $stmt->execute([$giftId, $userId]);
    jsonResponse(['success' => true, 'action' => 'removed']);
}

// Save gift
$required = ['gift_name', 'occasion'];
foreach ($required as $field) {
    if (empty($body[$field])) {
        jsonResponse(['error' => "Missing field: {$field}"], 400);
    }
}

$stmt = $db->prepare(
    'INSERT INTO saved_gifts (user_id, gift_name, gift_why, gift_cost, gift_effort, gift_type, occasion, recipient, mode)
     VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)'
);
$stmt->execute([
    $userId,
    $body['gift_name'],
    $body['gift_why']    ?? '',
    $body['gift_cost']   ?? '',
    $body['gift_effort'] ?? '',
    $body['gift_type']   ?? '',
    $body['occasion'],
    $body['recipient']   ?? '',
    $body['mode']        ?? 'thoughtful',
]);

jsonResponse(['success' => true, 'gift_id' => $db->lastInsertId(), 'action' => 'saved']);
