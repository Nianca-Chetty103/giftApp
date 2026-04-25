<?php
// ============================================
//  GiftGenie — Fetch Saved Gifts
//  GET /php/get_saved.php
// ============================================

require_once 'config.php';

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

if (!isset($_SESSION['user_id'])) {
    $_SESSION['user_id'] = 1; // demo user
}
$userId = $_SESSION['user_id'];

$db   = getDB();
$stmt = $db->prepare(
    'SELECT id, gift_name, gift_why, gift_cost, gift_effort, gift_type, occasion, mode, created_at
     FROM saved_gifts WHERE user_id = ? ORDER BY created_at DESC LIMIT 20'
);
$stmt->execute([$userId]);
$gifts = $stmt->fetchAll();

jsonResponse(['saved' => $gifts]);
