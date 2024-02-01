<?php 
require "../connect.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $question = $_POST['question'];
    $answers = $_POST['answers'];
    $right_answer = $_POST['right_answer'];
    $lesson_id = $_POST['lesson_id'];

    $sql = "INSERT INTO quizzes (question, answers, right_answer, lesson_id) 
            VALUES ('$question', '$answers', '$right_answer', '$lesson_id')";

    if ($conn->query($sql) === TRUE) {
        header('Location: quizzes.php?success=1');

    } else {
        header('Location: quiz-add.php?success=0');
    }

    $conn->close();
} else {
    header('Location: quiz-add.php?success=0');
}

?>