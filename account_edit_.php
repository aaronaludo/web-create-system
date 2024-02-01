<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle the form submission
    $username = $_POST['username'];
    $email = $_POST['email'];
    $place_of_birth = $_POST['place_of_birth'];
    $school = $_POST['school'];
    $contact_info = $_POST['contact_info'];
    $filename = basename($_FILES["fileToUpload"]["name"]) == '' ? $_SESSION['image'] : basename($_FILES["fileToUpload"]["name"]);

    // Handle file upload
    if (!empty($_FILES['fileToUpload']['name'])) {
        $targetDirectory = 'assets/images/'; // The directory where you want to store uploaded files
        $targetFile = $targetDirectory . basename($_FILES['fileToUpload']['name']);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        $check = getimagesize($_FILES['fileToUpload']['tmp_name']);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }

        if ($_FILES['fileToUpload']['size'] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            echo "Sorry, only JPG, JPEG, PNG, and GIF files are allowed.";
            $uploadOk = 0;
        }

        if ($uploadOk == 1) {
            if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $targetFile)) {
                echo "The file " . htmlspecialchars(basename($_FILES['fileToUpload']['name'])) . " has been uploaded.";
                // Store the file path in the database if needed
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }

    // Update user information in the database
    $dbHost = 'localhost';
    $dbUser = 'root';
    $dbPass = '';
    $dbName = 'webcreatesystem';

    $conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $userId = $_SESSION['user_id'];

    $sql = "UPDATE users SET 
            username = ?, 
            email = ?, 
            place_of_birth = ?, 
            school = ?, 
            contact_info = ?,
            image = ?
            WHERE id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssi", $username, $email, $place_of_birth, $school, $contact_info, $filename, $userId);

    if ($stmt->execute()) {
        // Update successful
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $email;
        $_SESSION['place_of_birth'] = $place_of_birth;
        $_SESSION['school'] = $school;
        $_SESSION['contact_info'] = $contact_info;
        $_SESSION['image'] = $filename;

        // echo "<br/><a href='account.php'>Back</a>";
        header('Location: account.php');
    } else {
        // Error occurred
        echo "Error: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>