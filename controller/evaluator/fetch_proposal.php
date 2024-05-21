<?php
// Include your database connection file
include_once("../database.php");

function fetch_proposals() {
    // Connect to the database
    global $connection;

    // Query to fetch specific columns from submissions table
    $query = "SELECT title, proponent_name, description, id, proposer_id FROM submissions";

    // Execute the query
    $result = $connection->query($query);

    if($result) {
        // Initialize an empty array to store proposal data
        $proposals = [];

        // Fetch data and format into associative array
        while ($row = $result->fetch_assoc()) {
            $proposals[] = [
                "title" => $row['title'],
                "proponent_name" => $row['proponent_name'],
                "description" => $row['description'],
                "id" => $row['id'],
                "proposer_id" => $row['proposer_id']
            ];
        }

        // Free result set
        $result->free();

        // Return proposal data
        return $proposals;
    } else {
        // Handle query execution error
        return ["error" => "Failed to execute query"];
    }
}

// Usage example:
$proposals = fetch_proposals();
echo json_encode($proposals);
?>
