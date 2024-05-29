<?php
// Start the session
session_start();

// Include your database connection file
include_once("../database.php");

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if user_id is set in the session
    if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
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

        // Insert data into the database without document content
        $stmt = $connection->prepare("INSERT INTO submissions (title, proponent_name, office, description, proposer_id, status) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $title, $proponent_name, $office, $description, $user_id, $status);

        if ($stmt->execute()) {
            // Get the last inserted ID
            $proposalId = $stmt->insert_id;

            // Define the resources directory
            $resourcesDir = '../resources';

            // Ensure the resources directory exists
            if (!is_dir($resourcesDir)) {
                mkdir($resourcesDir, 0777, true);
            }

            // Define the new file path
            $newFilePath = "{$resourcesDir}/resources-{$proposalId}-1." . pathinfo($document_name, PATHINFO_EXTENSION);

            // Move the uploaded file to the resources directory
            if (move_uploaded_file($document_tmp_name, $newFilePath)) {
                // Update the document path in the database
                $updateStmt = $connection->prepare("UPDATE submissions SET document = ? WHERE id = ?");
                $updateStmt->bind_param("si", $newFilePath, $proposalId);
                $updateStmt->execute();
                $updateStmt->close();

                // Submission successful
                echo json_encode(["status" => "success", "message" => "Proposal submitted successfully!"]);
            } else {
                // Failed to move uploaded file
                echo json_encode(["status" => "error", "message" => "Failed to save document."]);
            }
        } else {
            // Submission failed
            echo json_encode(["status" => "error", "message" => "Failed to submit proposal. Please try again later."]);
        }

        // Close the statement
        $stmt->close();
    } else {
        // If user_id is not set in the session
        echo json_encode(["status" => "error", "message" => "Session proposer ID not found."]);
    }
}

// Close the database connection
$connection->close();
?>
