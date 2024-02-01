<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $host = "localhost";
    $db_username = "root";
    $db_password = "";
    $db_name = "webcreatesystem";
    $mysqli = new mysqli($host, $db_username, $db_password, $db_name);

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    $query = "SELECT id, username, password, place_of_birth, school, contact_info, email, image FROM users WHERE username = ?";
    
    $stmt = $mysqli->prepare($query);
    
    $stmt->bind_param("s", $username);
    
    $stmt->execute();
    
    $stmt->bind_result($user_id, $db_username, $db_password_hash, $place_of_birth, $school, $contact_info, $email, $image);
    
    if ($stmt->fetch()) {
        if (password_verify($password, $db_password_hash)) {
            $_SESSION["user_id"] = $user_id;
            $_SESSION["username"] = $db_username;
            $_SESSION["place_of_birth"] = $place_of_birth;
            $_SESSION["school"] = $school;
            $_SESSION["contact_info"] = $contact_info;
            $_SESSION["email"] = $email;
            $_SESSION['image'] = $image;
            header("Location: dashboard.php"); 
            exit();
        } else {
            // echo "Invalid username or password. Please try again.";
            header("Location: login.php?success=0"); 
        }
    } else {
        header("Location: login.php?success=0"); 
    }

    $stmt->close();
    $mysqli->close();
}
?>