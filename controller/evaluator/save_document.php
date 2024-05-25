<?php
// Start the session
session_start();

// Include your database connection file
include_once("../database.php");

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $proposer_id = $_POST['proposer_id'];
    $evaluator_id = $_POST['evaluator_id'];
    $document_file_json = json_encode($_POST['document_file']); // Encode document_file as JSON
    $resources_file = $_POST['resources_file'];
    $date_received = $_POST['date_received'];
    $date_reviewed = $_POST['date_reviewed'];
    $status = $_POST['status'];
    $remarks = $_POST['remarks'];
    $description = $_POST['description'];
    $college_office = $_POST['college_office'];

    // Insert data into the documents table
    $stmt = $connection->prepare("INSERT INTO documents (proposer_id, evaluator_id, document_file, resources_file, date_received, date_reviewed, status, remarks, description, college_office) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("iissssssss", $proposer_id, $evaluator_id, $document_file_json, $resources_file, $date_received, $date_reviewed, $status, $remarks, $description, $college_office);

    if ($stmt->execute()) {
        // Document submission successful
        $response = ["status" => "success", "message" => "Document saved successfully!", "document_file_json" => $document_file_json];

        echo json_encode($response);
    } else {
        // Document submission failed
        echo json_encode(["status" => "error", "message" => "Failed to save document."]);
    }

    // Close the statement
    $stmt->close();
} else {
    // If the request method is not POST
    echo json_encode(["status" => "error", "message" => "Invalid request method."]);
}

// Close the database connection
$connection->close();
?>
