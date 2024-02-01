<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webcreatesystem"; // Replace with your actual database name

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
        $lesson_id = $_POST['lesson_id'];
        $total_questions = 0;
        $correct_answers = 0;

        foreach ($_POST['answers'] as $quiz_id => $submitted_answer) {
            $sql = "SELECT right_answer FROM quizzes WHERE id = $quiz_id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $correct_answer = $row['right_answer'];

                if (strtoupper($submitted_answer) == strtoupper($correct_answer)) {
                    $correct_answers++;
                }
                $total_questions++;
            }
        }

        $score = ($correct_answers / $total_questions) * 100;

        $sql = "UPDATE progresses SET score = ? WHERE user_id = ? AND lesson_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iis", $correct_answers, $user_id, $lesson_id);
        $stmt->execute();

        // echo "You got $correct_answers out of $total_questions questions correct. Your correct answer is $correct_answers";
        // echo "<a href='lesson.php?id=$lesson_id'>Back to Lesson</a>";
        header("Location: lesson.php?id=$lesson_id");
    };
}
?>