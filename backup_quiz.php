<?php 

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webcreatesystem";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$lesson_id = $_GET['lesson_id'];

$sql = "SELECT * FROM quizzes WHERE lesson_id = '$lesson_id' ORDER BY RAND()";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html>
<head>
    <title>My Account</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .navbar {
            background-color: #333;
            overflow: hidden;
            padding: 10px;
        }

        .navbar h2 {
            color: #fff;
            margin: 0;
            float: left;
            margin-top: 10px;
            margin-left: 10px;
        }

        .navbar a {
            float: right;
            display: block;
            color: #fff;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        .navbar a:hover {
            background-color: #ddd;
            color: #333;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
        }

        .lesson-boxes {
            display: grid;
            grid-template-columns: repeat(1, 1fr);
            gap: 20px;
        }

        .lesson-box {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 10px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            text-align: justify;
        }

        .lesson-box h3 {
            margin-top: 0;
        }

        .flex-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .flex-container button {
            padding: 10px;
            margin-right: 10px;
        }
        .font-weight-normal{
            font-weight: normal;
        }
        button a{
            text-decoration: none;
            color: black;
        }
        .mt-3{
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <h2>WEBCREATE</h2>
        <a href="logout.php">Logout</a>
        <a href="progress.php">Progress</a>
        <a href="account.php">My Account</a>
        <a href="dashboard.php">Home</a>
    </div>
    <div class="container">
        <div>
            <h2>QUIZ    </h2>
            <button><a href="lesson.php?id=1">Back</a></button>

            <hr>
        </div>
        <?php 
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
        ?>
            <div class="mt-3">
                <h2><?php echo $row['question']?></h2>
            </div>
            <div>
                <h3 class="font-weight-normal">
                    <?php echo $row['answers']?>
                </h3>
            </div>
            <div class="mt-3">
                Answer: <input type="text" name="answer" placeholder="Type the letter"/>
            </div>
        <?php
                }
            } else {
                echo "No lessons found.";
            }
        ?>
            <div class="mt-3">
                <button type="submit">Submit</button>
            </div>
    </div>
</body>
</html>