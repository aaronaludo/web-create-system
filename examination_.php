<?php
session_start();

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
        $category_id = $_POST['category_id'];
        $total_questions = 0;
        $correct_answers = 0;

        // Validate and sanitize input
        if (isset($_POST['answers']) && is_array($_POST['answers'])) {
            foreach ($_POST['answers'] as $exam_id => $submitted_answer) {
                // Sanitize the $exam_id to prevent SQL injection
                $exam_id = intval($exam_id);
                $submitted_answer = $conn->real_escape_string($submitted_answer);

                $sql = "SELECT right_answer FROM examinations WHERE id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $exam_id);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $correct_answer = $row['right_answer'];

                    if (strtoupper($submitted_answer) == strtoupper($correct_answer)) {
                        $correct_answers++;
                    }
                    $total_questions++;
                }
                $stmt->close();
            }

            $score = ($correct_answers / $total_questions) * 100;

            // Check if an examination progress record exists for the user
            $sql = "SELECT user_id, category_id FROM examination_progress WHERE user_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $user_id);
            $stmt->execute();
            $result = $stmt->get_result();
            $data = $result->fetch_assoc();

            // var_dump($result);
            // var_dump($result->num_rows >= 0);


            if ($result->num_rows == 1 && $data['category_id'] != $category_id || $result->num_rows <= 0) {

                $sql = "INSERT INTO examination_progress (user_id, score, category_id) VALUES (?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("idi", $user_id, $correct_answers, $category_id);
                $stmt->execute();

            } else if($result->num_rows > 0){

                $sql = "UPDATE examination_progress SET score = ? WHERE user_id = ? AND category_id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("dii", $correct_answers, $user_id, $category_id);
                $stmt->execute();
            }

            // echo "You got $correct_answers out of $total_questions questions correct. Your score is $score%";
            header("Location: progress.php");
            // echo "<a href='dashboard.php'>Back to Dashboard</a>";
        } else {
            echo "No answers were submitted.";
        }
    } else {
        echo "Please log in to submit the quiz.";
    }
}
?>
