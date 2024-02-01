<?php
require "../connect.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $question = $_POST['question'];
    $answers = $_POST['answers'];
    $right_answer = $_POST['right_answer'];
    $lesson_id = $_POST['lesson_id'];

    $sql = "UPDATE quizzes SET
            question = '$question',
            answers = '$answers',
            right_answer = '$right_answer',
            lesson_id = '$lesson_id'
            WHERE id = '$id'";

    if ($conn->query($sql) === TRUE) {
        header('Location: quizzes.php?success=3');
    } else {
        header('Location: quiz-edit.php?success=0');
    }
} else {
    header('Location: quiz-edit.php?success=0');
}
?>