<?php
// Include database connection
include 'dbconn.php';

// Start session
session_start();

// Get form data
$email = $_POST['email'];
$password = $_POST['password'];

// Prepare and execute the SQL statement
$stmt = $conn->prepare("SELECT password FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();

// Check if email exists
if ($stmt->num_rows > 0) {
    $stmt->bind_result($hashedPassword);
    $stmt->fetch();

    // Verify password
    if (password_verify($password, $hashedPassword)) {
        // Set session variable
        $_SESSION['email'] = $email;

        // Redirect to dashboard
        header('Location: dashboard.php');
        exit();
    } else {
        echo "Invalid password.";
    }
} else {
    echo "Email not found.";
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
