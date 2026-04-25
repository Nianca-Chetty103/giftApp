<?php
require 'php/config.php';
try {
    $db = getDB();
    echo "✓ Database connected successfully!";
} catch (Exception $e) {
    echo "✗ Error: " . $e->getMessage();
}
?>