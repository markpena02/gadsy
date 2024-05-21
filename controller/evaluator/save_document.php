<?php
// Include your database connection file
include_once("../database.php");

// Check if the form data is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data including college_office
    $proposerId = $_POST['proposer_id'];
    $evaluatorId = $_POST['evaluator_id'];
    $document = $_POST['document'];
    $file = $_POST['file'];
    $dateReceived = $_POST['date_received'];
    $dateReviewed = $_POST['date_reviewed'];
    $status = $_POST['status'];
    $remarks = $_POST['remarks'];
    $description = $_POST['description'];
    $collegeOffice = $_POST['college_office']; // Retrieve college_office

    // Insert data into the database with college_office
    $stmt = $connection->prepare("INSERT INTO documents (proposer_id, evaluator_id, document, file, date_received, date_reviewed, status, remarks, description, college_office) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("iissssssss", $proposerId, $evaluatorId, $document, $file, $dateReceived, $dateReviewed, $status, $remarks, $description, $collegeOffice);

    if ($stmt->execute()) {
        // Submission successful
        $stmt->close();
        
        // Return response with college_office
        $response = ["status" => "success", "message" => "Document saved successfully!", "college_office" => $collegeOffice];
        echo json_encode($response);
    } else {
        // Submission failed
        $stmt->close();
        
        // Return error response
        echo json_encode(["status" => "error", "message" => "Failed to save document. Please try again later."]);
    }
} else {
    // Method not allowed
    http_response_code(405);
    echo json_encode(["status" => "error", "message" => "Method Not Allowed"]);
}

// Close the database connection
$connection->close();
?>
