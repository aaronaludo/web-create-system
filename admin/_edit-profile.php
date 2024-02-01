<?php
session_start();
require "../connect.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_SESSION['admin_id'];
    $username = $_POST['username'];
    $email = $_POST['email'];

    $sql = "UPDATE users SET
            username = '$username',
            email = '$email'
            WHERE id = '$id'";

    if ($conn->query($sql) === TRUE) {
        header('Location: edit-profile.php?success=1');
        $_SESSION['admin_username'] = $username;
        $_SESSION['admin_email'] = $email;
    } else {
        header('Location: edit-profile.php?success=0');
    }
} else {
    header('Location: edit-profile.php?success=0');
}
?>