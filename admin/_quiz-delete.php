<?php
require "../connect.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    $sql = "DELETE FROM quizzes WHERE id = '$id'";

    if ($conn->query($sql) === TRUE) {
        header('Location: quizzes.php?success=2');
    } else {
        header('Location: quizzes.php?success=0');
    }
} else {
    header('Location: quizzes.php?success=0');
}
?>