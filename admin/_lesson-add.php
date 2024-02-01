<?php 
require "../connect.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $category_id = $_POST['category_id'];

    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $image = $_FILES['image']['name'];
        $image_temp = $_FILES['image']['tmp_name'];
        $image_path = "../assets/images/lessons/" . $image;

        move_uploaded_file($image_temp, $image_path);
    } else {
        $image = 'no_image';
    }

    $unit_id = $_POST['unit_id'];
    $sequence = $_POST['sequence'];

    $sql = "INSERT INTO lessons (title, description, category_id, image, unit_id, sequence) 
            VALUES ('$title', '$description', '$category_id', '$image', '$unit_id', '$sequence')";

    if ($conn->query($sql) === TRUE) {
        header('Location: lessons.php?success=1');

    } else {
        header('Location: lesson-add.php?success=0');
    }

    $conn->close();
} else {
    header('Location: lesson-add.php?success=0');
}

?>