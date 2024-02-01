<?php
require "../connect.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $question = $_POST['question'];
    $answers = $_POST['answers'];
    $right_answer = $_POST['right_answer'];
    $category_id = $_POST['category_id'];

    $sql = "UPDATE examinations SET
            question = '$question',
            answers = '$answers',
            right_answer = '$right_answer',
            category_id = '$category_id'
            WHERE id = '$id'";

    if ($conn->query($sql) === TRUE) {
        header('Location: exams.php?success=3');
    } else {
        header('Location: exam-edit.php?success=0');
    }
} else {
    header('Location: exam-edit.php?success=0');
}

?>