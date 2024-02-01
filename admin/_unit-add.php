<?php 
require "../connect.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $category_id = $_POST['category_id'];

    $sql = "INSERT INTO units (name, category_id) 
            VALUES ('$name', '$category_id')";

    if ($conn->query($sql) === TRUE) {
        header('Location: units.php?success=1');

    } else {
        header('Location: unit-add.php?success=0');
    }

    $conn->close();
} else {
    header('Location: unit-add.php?success=0');
}

?>