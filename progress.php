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

$user_id = $_SESSION['user_id'];

$query = "SELECT l.id, l.title, l.description, l.image, p.is_done
          FROM lessons l
          LEFT JOIN progresses p ON l.id = p.lesson_id AND p.user_id = $user_id AND l.category_id = 1 ";
$result = mysqli_query($conn, $query);

if ($result) {
    $completed_lessons = 0;
    $total_lessons = 25; // Replace with your actual total lesson count

    while ($row = mysqli_fetch_assoc($result)) {
        if ($row['is_done'] == 1) {
            $completed_lessons++;
        }
    }

    // Calculate the read progress as a percentage
    $read_progress = round(($completed_lessons / $total_lessons) * 100, 2);
}


    $sql = "SELECT
        progresses.user_id,
        SUM(progresses.score) AS total_score,
        (SUM(progresses.score) / 50) * 100 AS total_percentage
        FROM progresses
        JOIN lessons ON progresses.lesson_id = lessons.id
        WHERE progresses.user_id = $user_id
            AND lessons.category_id = 1
        GROUP BY progresses.user_id;";

    $result2 = mysqli_query($conn, $sql);

    if ($result2) { // Check if the query was successful
        $row = mysqli_fetch_assoc($result2);
    
        if ($row) { // Check if there are rows in the result
            $totalScore = $row['total_score'];
            $totalPercentage = round($row['total_percentage'], 2);
    
        } else {
            $totalScore = 0;
            $totalPercentage = 0;
        }
    } else {
        // Handle the case where the query failed
        echo "Query failed: " . mysqli_error($conn);
    }

    $sql = "SELECT
    user_id,
    SUM(score) AS total_score,
    (SUM(score) / 25) * 100 AS total_percentage
    FROM examination_progress
    WHERE user_id = $user_id AND category_id = 1
    GROUP BY user_id;";

$result3 = mysqli_query($conn, $sql);

if ($result3) {
    $row = mysqli_fetch_assoc($result3);

    if ($row) {
        $totalScore_exam = $row['total_score'];
        $totalPercentage_exam = round($row['total_percentage'], 2);
    } else {
        $totalScore_exam = 0;
        $totalPercentage_exam = 0;
    }
} else {
    // Handle the case where the query failed
    echo "Query failed: " . mysqli_error($conn);
}


$query_css = "SELECT l.id, l.title, l.description, l.image, p.is_done
          FROM lessons l
          LEFT JOIN progresses p ON l.id = p.lesson_id AND p.user_id = $user_id AND l.category_id = 2";
$result_css = mysqli_query($conn, $query_css);

if ($result_css) {
    $completed_lessons_css = 0;
    $total_lessons_css = 25; // Replace with your actual total lesson count

    while ($row = mysqli_fetch_assoc($result_css)) {
        if ($row['is_done'] == 1) {
            $completed_lessons_css++;
        }
    }

    // Calculate the read progress as a percentage
    $read_progress_css = round(($completed_lessons_css / $total_lessons_css) * 100, 2);
}

$sql_css = "SELECT
        progresses.user_id,
        SUM(progresses.score) AS total_score,
        (SUM(progresses.score) / 25) * 100 AS total_percentage
        FROM progresses
        JOIN lessons ON progresses.lesson_id = lessons.id
        WHERE progresses.user_id = $user_id
            AND lessons.category_id = 2
        GROUP BY progresses.user_id;";

    $result2_css = mysqli_query($conn, $sql_css);

    if ($result2_css) { // Check if the query was successful
        $row = mysqli_fetch_assoc($result2_css);
    
        if ($row) { // Check if there are rows in the result
            $totalScore_css = $row['total_score'];
            $totalPercentage_css = round($row['total_percentage'], 2);
    
        } else {
            $totalScore_css = 0;
            $totalPercentage_css = 0;
        }
    } else {
        // Handle the case where the query failed
        echo "Query failed: " . mysqli_error($conn);
    }

    $sql_css_exam = "SELECT
    user_id,
    SUM(score) AS total_score,
    (SUM(score) / 20) * 100 AS total_percentage
    FROM examination_progress
    WHERE user_id = $user_id AND category_id = 2
    GROUP BY user_id;";

$result3_css_exam = mysqli_query($conn, $sql_css_exam);

if ($result3_css_exam) {
    $row = mysqli_fetch_assoc($result3_css_exam);

    if ($row) {
        $totalScore_css_exam = $row['total_score'];
        $totalPercentage_css_exam = round($row['total_percentage'], 2);
    } else {
        $totalScore_css_exam = 0;
        $totalPercentage_css_exam = 0;
    }
} else {
    // Handle the case where the query failed
    echo "Query failed: " . mysqli_error($conn);
}

?>
<?php include('layout/__header.php');?>
    <style>
        .progress-container {
            width: 100%;
            margin: 0 auto;
            border: 1px solid #ccc;
            padding: 10px;
            border-radius: 5px;
        }

        .progress-bar {
            background-color: #f0f0f0;
            height: 20px;
            border-radius: 5px;
            position: relative;
        }

        .progress {
            width: 0;
            height: 100%;
            background-color: #4caf50;
            border-radius: 5px;
            transition: width 0.3s ease-in-out;
        }

        .progress-label {
            margin-top: 5px;
            font-weight: bold;
        }
    </style>
        <div class="container my-5">
            <div>
                <h1 class="text-primary fw-bold mb-5">HTML COURSE</h2>
                <hr>
            </div>
            <div>
                <h2 class="fw-bold my-3">Read Progress:</h2>
                <div class="progress-container">
                    <div class="progress-bar">
                        <div class="progress" style="width: <?php echo $read_progress; ?>%;"></div>
                    </div>
                    <div class="progress-label"><?php echo $read_progress; ?>%</div>
                </div>
            </div>
            <div>
                <h2 class="fw-bold my-3">Quiz Progress:</h2>
                <div class="progress-container">
                    <div class="progress-bar">
                        <div class="progress" style="width: <?php echo $totalPercentage ?>%;"></div>
                    </div>
                    <div class="progress-label"><?php echo $totalPercentage ?>%</div>
                </div>
            </div>
            <div>
                <h2 class="fw-bold my-3">Examination Progress:</h2>
                <div class="progress-container">
                    <div class="progress-bar">
                        <div class="progress" style="width: <?php echo $totalPercentage_exam; ?>%;"></div>
                    </div>
                    <div class="progress-label"><?php echo $totalPercentage_exam; ?>%</div>
                </div>
            </div>
        </div>
        <div class="container my-5">
        <div>
            <h1 class="text-primary fw-bold my-3">CSS COURSE</h1>
            <hr>
        </div>
        <div>
            <h2 class="fw-bold my-3"">Read Progress:</h2>
            <div class="progress-container">
                <div class="progress-bar">
                    <div class="progress" style="width: <?php echo $read_progress_css; ?>%;"></div>
                </div>
                <div class="progress-label"><?php echo $read_progress_css; ?>%</div>
            </div>
        </div>
        <div>
            <h2 class="fw-bold my-3">Quiz Progress:</h2>
            <div class="progress-container">
                <div class="progress-bar">
                    <div class="progress" style="width: <?php echo $totalPercentage_css ?>%;"></div>
                </div>
                <div class="progress-label"><?php echo $totalPercentage_css ?>%</div>
            </div>
        </div>
        <div>
            <h2 class="fw-bold my-3"">Examination Progress:</h2>
            <div class="progress-container">
                <div class="progress-bar">
                    <div class="progress" style="width: <?php echo $totalPercentage_css_exam; ?>%;"></div>
                </div>
                <div class="progress-label"><?php echo $totalPercentage_css_exam; ?>%</div>
            </div>
        </div>
    </div>
    </div>
<?php include('layout/__footer.php');?>
</body>
</html>
