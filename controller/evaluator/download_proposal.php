<?php
// Include your database connection file
include_once("../database.php");

// Check if the proposal ID is provided
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $proposalId = $_GET['id'];

    // Prepare and execute query to fetch file path based on ID
    $stmt = $connection->prepare("SELECT document FROM submissions WHERE id = ?");
    $stmt->bind_param("i", $proposalId);
    $stmt->execute();
    $stmt->store_result();

    // Check if a file path is found
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($filePath);
        $stmt->fetch();

        // Construct the full file path
        $fullFilePath = realpath($filePath);

        // Check if the file exists
        if (file_exists($fullFilePath)) {
            // Set headers for file download
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . basename($fullFilePath) . '"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($fullFilePath));

            // Output the file content
            readfile($fullFilePath);
            exit;
        } else {
            // File not found
            echo "File not found.";
        }
    } else {
        // Proposal not found
        echo "Proposal not found.";
    }

    // Close statement and database connection
    $stmt->close();
    $connection->close();
} else {
    // Proposal ID not provided
    echo "Proposal ID not provided.";
}
?>
