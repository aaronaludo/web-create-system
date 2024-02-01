<?php
require "../connect.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $category_id = $_POST['category_id'];

    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $image = $_FILES['image']['name'];
        $image_temp = $_FILES['image']['tmp_name'];
        $image_path = "../assets/images/lessons/" . $image;

        move_uploaded_file($image_temp, $image_path);
    } else {
        $image = $_POST['current_image'];
    }

    $unit_id = $_POST['unit_id'];
    $sequence = $_POST['sequence'];

    $sql = "UPDATE lessons SET
            title = '$title',
            description = '$description',
            category_id = '$category_id',
            image = '$image',
            unit_id = '$unit_id',
            sequence = '$sequence'
            WHERE id = '$id'";

    if ($conn->query($sql) === TRUE) {
        header('Location: lessons.php?success=3');
    } else {
        header('Location: lesson-edit.php?success=0');
    }
} else {
    header('Location: lesson-edit.php?success=0');
}
?>