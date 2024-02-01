<?php

session_start();

// Database configuration
$dbHost = 'localhost';
$dbUser = 'root';
$dbPassword = '';
$dbName = 'webcreatesystem';

// Create a database connection
$conn = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the input values from the form
    $currentPassword = $_POST["current_password"];
    $newPassword = $_POST["new_password"];
    $confirmPassword = $_POST["confirm_password"];

    if (empty($currentPassword) || empty($newPassword) || empty($confirmPassword)) {
        echo "Please fill out all fields.";
    } elseif ($newPassword !== $confirmPassword) {
        echo "New password and confirmation do not match.";
    } else {
        // Fetch the user's information from your database and validate the current password.
        $userId = $_SESSION['user_id'];  // Replace with the actual user ID

        $sql = "SELECT password FROM users WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows == 1) {
            $stmt->bind_result($storedPassword);
            $stmt->fetch();

            // Validate the current password
            if (password_verify($currentPassword, $storedPassword)) {
                // Update the password (hash and salt the new password)
                $hashedNewPassword = password_hash($newPassword, PASSWORD_DEFAULT);
                $updateSql = "UPDATE users SET password = ? WHERE id = ?";
                $updateStmt = $conn->prepare($updateSql);
                $updateStmt->bind_param("si", $hashedNewPassword, $userId);

                if ($updateStmt->execute()) {
                    echo "Password changed successfully. <br />";
                    echo "<a href='account.php'>Back</a>";
                } else {
                    echo "Error updating password: " . $updateStmt->error;
                }
            } else {
                echo "Invalid current password.";
            }
        } else {
            echo "User not found.";
        }
        $stmt->close();
    }
}

// Close the database connection
$conn->close();
?>
