<?php
session_start();
require "../connect.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $oldPassword = $_POST['old_password'];
    $newPassword = $_POST['new_password'];
    $confirmPassword = $_POST['confirm_new_password'];

    $adminId = $_SESSION['admin_id']; 

    $checkPasswordQuery = "SELECT password FROM users WHERE id = $adminId";
    $result = $conn->query($checkPasswordQuery);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $currentPasswordHash = $row['password'];

        // Verify the old password using password_verify
        if (password_verify($oldPassword, $currentPasswordHash)) {

            if ($newPassword != $confirmPassword) {
                $_SESSION['message'] = "<div class='alert alert-danger' role='alert'>New password and confirm password do not match.</div>";
                header("Location: change-password.php");
            } else {
                // Hash the new password before updating
                $newPasswordHash = password_hash($newPassword, PASSWORD_DEFAULT);

                $updatePasswordQuery = "UPDATE users SET password = '$newPasswordHash' WHERE id = $adminId";
                if ($conn->query($updatePasswordQuery)) {
                    $_SESSION['message'] = "<div class='alert alert-success' role='alert'>Password changed successfully.</div>";
                    header("Location: change-password.php");
                } else {
                    $_SESSION['message'] = "<div class='alert alert-danger' role='alert'>Password change failed. Please try again later.</div>";
                    header("Location: change-password.php");
                }
            }
        } else {
            $_SESSION['message'] = "<div class='alert alert-danger' role='alert'>Old password is incorrect.</div>";
            header("Location: change-password.php");
        }
    } else {
        $_SESSION['message'] = "<div class='alert alert-danger' role='alert'>User not found.</div>";
        header("Location: change-password.php");
    }

    $conn->close();
}
?>
