<?php
// Start the session
session_start();

// Include your database connection file
include_once("../database.php");

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if user_id is set in the session
    if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
        // Retrieve form data
        $title = $_POST['title'];
        $proponent_name = $_POST['proponent_name'];
        $office = $_POST['office'];
        $description = $_POST['description'];
        $document_name = $_FILES['document']['name'];
        $document_tmp_name = $_FILES['document']['tmp_name'];
        $user_id = $_SESSION['user_id']; // Get the user ID from the session

        // Set default status to "pending"
        $status = "pending";

        // Read the file content into a variable
        $document_content = file_get_contents($document_tmp_name);

        // Insert data into the database
        $stmt = $connection->prepare("INSERT INTO submissions (title, proponent_name, office, description, document, proposer_id, status) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssis", $title, $proponent_name, $office, $description, $document_content, $user_id, $status);

        if ($stmt->execute()) {
            // Submission successful
            echo json_encode(["status" => "success", "message" => "Proposal submitted successfully!"]);
        } else {
            // Submission failed
            echo json_encode(["status" => "error", "message" => "Failed to submit proposal. Please try again later."]);
        }

        $stmt->close();
    } else {
        // If user_id is not set in the session
        echo json_encode(["status" => "error", "message" => "Session proposer ID not found."]);
    }
}

// Close the database connection
$connection->close();
?>
