<?php
// ============================================
//  GiftGenie — Generate Gift Ideas
//  POST /php/generate.php
// ============================================

require_once 'config.php';
require_once 'gifts_db.php';

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    jsonResponse(['error' => 'Method not allowed.'], 405);
}

$raw  = file_get_contents('php://input');
$body = json_decode($raw, true);

$occasion  = trim($body['occasion']  ?? '');
$recipient = trim($body['recipient'] ?? '');
$budget    = intval($body['budget']  ?? 50);
$mode      = $body['mode'] === 'convenient' ? 'convenient' : 'thoughtful';

// Debug: Log the received budget
error_log("Received budget: " . $budget);

if (!$occasion) {
    jsonResponse(['error' => 'Occasion is required.'], 400);
}

// Log generation
$db = getDB();
$stmt = $db->prepare('INSERT INTO generation_log (session_id, occasion, recipient, budget, mode) VALUES (?, ?, ?, ?, ?)');
$stmt->execute([session_id(), $occasion, $recipient, $budget, $mode]);

// Get curated gift suggestions from database
$allGifts = getGiftSuggestions($occasion, $mode);

// Shuffle and return exactly 5 gifts
shuffle($allGifts);
$selected = array_slice($allGifts, 0, 5);

// Enhanced price checking and comparison
function parsePriceRange(string $priceRange): array {
    $ranges = [
        'Under R50' => ['min' => 0, 'max' => 50],
        'R50–R150' => ['min' => 50, 'max' => 150],
        'R150–R300' => ['min' => 150, 'max' => 300],
        'R300+' => ['min' => 300, 'max' => PHP_INT_MAX],
        'Any budget' => ['min' => 0, 'max' => PHP_INT_MAX],
    ];
    return $ranges[$priceRange] ?? ['min' => 0, 'max' => PHP_INT_MAX];
}

function isWithinBudget(string $giftPrice, int $userBudget): bool {
    $range = parsePriceRange($giftPrice);
    return $range['max'] <= $userBudget || $range['min'] <= $userBudget;
}

function getPriceCompatibility(string $giftPrice, int $userBudget): string {
    $range = parsePriceRange($giftPrice);
    $midpoint = ($range['min'] + $range['max']) / 2;

    if ($midpoint <= $userBudget * 0.5) {
        return 'budget_friendly';
    } elseif ($midpoint <= $userBudget) {
        return 'within_budget';
    } else {
        return 'over_budget';
    }
}

// Filter and rank gifts by budget compatibility
$filtered = [];
$overBudget = [];

foreach ($selected as $gift) {
    $compatibility = getPriceCompatibility($gift['cost'], $budget);

    if (isWithinBudget($gift['cost'], $budget)) {
        $gift['price_status'] = $compatibility;
        $filtered[] = $gift;
    } else {
        $gift['price_status'] = 'over_budget';
        $overBudget[] = $gift;
    }
}

// If we don't have enough within-budget gifts, add some over-budget ones with warnings
if (count($filtered) < 3 && !empty($overBudget)) {
    $additional = array_slice($overBudget, 0, 3 - count($filtered));
    $filtered = array_merge($filtered, $additional);
}

// Ensure we have exactly 5 gifts
$gifts = array_slice($filtered, 0, 5);

// Sort by price compatibility (budget-friendly first, then within-budget, then over-budget)
usort($gifts, function($a, $b) {
    $order = ['budget_friendly' => 1, 'within_budget' => 2, 'over_budget' => 3];
    return ($order[$a['price_status']] ?? 3) <=> ($order[$b['price_status']] ?? 3);
});

$parsed = ['gifts' => $gifts];

jsonResponse(['gifts' => $parsed['gifts'], 'mode' => $mode, 'occasion' => $occasion, 'debug_budget' => $budget]);
