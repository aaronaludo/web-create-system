<?php
require "../connect.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    $sql = "DELETE FROM lessons WHERE id = '$id'";

    if ($conn->query($sql) === TRUE) {
        header('Location: lessons.php?success=2');
    } else {
        header('Location: lessons.php?success=0');
    }
} else {
    header('Location: lessons.php?success=0');
}
?>