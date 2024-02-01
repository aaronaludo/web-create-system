<?php
require "../connect.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $category_id = $_POST['category_id'];

    $sql = "UPDATE units SET
            name = '$name',
            category_id = '$category_id'
            WHERE id = '$id'";

    if ($conn->query($sql) === TRUE) {
        header('Location: units.php?success=3');
    } else {
        header('Location: unit-edit.php?success=0');
    }
} else {
    header('Location: unit-edit.php?success=0');
}
?>