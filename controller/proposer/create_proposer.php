<?php
// Include your database connection file
include_once("../database.php");

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $full_name = $_POST['full_name'];
    $dob = $_POST['dob'];
    $campus = $_POST['campus'];
    $college_office = $_POST['college_office'];
    $position = $_POST['position'];
    $role_summary = $_POST['role_summary'];
    $university_email = $_POST['university_email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Add validation checks here if needed

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert data into the database
    $stmt = $connection->prepare("INSERT INTO proponents (full_name, dob, campus, college_office, position, role_summary, university_email, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssss", $full_name, $dob, $campus, $college_office, $position, $role_summary, $university_email, $hashed_password);

    if ($stmt->execute()) {
        // Registration successful
        echo json_encode(["status" => "success", "message" => "Registration successful!"]);
    } else {
        // Registration failed
        echo json_encode(["status" => "error", "message" => "Registration failed. Please try again later."]);
    }

    $stmt->close();
}

// Close the database connection
$connection->close();
?>
