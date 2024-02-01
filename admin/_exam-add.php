<?php 
require "../connect.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $question = $_POST['question'];
    $answers = $_POST['answers'];
    $right_answer = $_POST['right_answer'];
    $category_id = $_POST['category_id'];

    $sql = "INSERT INTO examinations (question, answers, right_answer, category_id) 
            VALUES ('$question', '$answers', '$right_answer', '$category_id')";

    if ($conn->query($sql) === TRUE) {
        header('Location: exams.php?success=1');

    } else {
        header('Location: exam-add.php?success=0');
    }

    $conn->close();
} else {
    header('Location: exam-add.php?success=0');
}

?>