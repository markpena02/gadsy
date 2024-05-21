<?php
// Start the session
session_start();

// Set response header to JSON
header('Content-Type: application/json');

// Check if user is logged in
if (isset($_SESSION['user_id']) && !is_null($_SESSION['user_id'])) {
    // If logged in, return JSON indicating user is logged in
    echo json_encode([
        "status" => "success", 
        "message" => "User is logged in", 
        "user_id" => $_SESSION['user_id'],
        "status" => "mama"
    ]);
} else {
    // If not logged in, return JSON indicating user is not logged in
    echo json_encode([
        "status" => "error", 
        "message" => "User is not logged in"
    ]);
}
?>
