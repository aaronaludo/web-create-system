<?php 
// include('../layout/header.php'); 
require "../connect.php";

$total_students_sql = "SELECT * FROM `users` WHERE is_admin = 0";
$total_students_result = mysqli_query($conn, $total_students_sql);

$total_lessons_sql = "SELECT * FROM `lessons`";
$total_lessons_result = mysqli_query($conn, $total_lessons_sql);

$total_quizzes_sql = "SELECT * FROM quizzes";
$total_quizzes_result = mysqli_query($conn, $total_quizzes_sql);

$total_examinations_sql = "SELECT * FROM examinations";
$total_examinations_result = mysqli_query($conn, $total_examinations_sql);

$lesson_graph_sql = "SELECT
    lessons.id AS lesson_id,
    lessons.title,
    COUNT(progresses.user_id) AS done_count
FROM
    lessons
LEFT JOIN
    progresses ON lessons.id = progresses.lesson_id AND progresses.is_done = 1
GROUP BY
    lessons.id, lessons.title
ORDER BY
    done_count DESC;";

$lesson_graph_result = mysqli_query($conn, $lesson_graph_sql);

if ($lesson_graph_result) {
    $lesson_graph_done_count_array = array();
    $lesson_graph_title_array = array();
    while ($row = mysqli_fetch_assoc($lesson_graph_result)) {
        $lesson_graph_done_count_array[] = $row['done_count'];
        $lesson_graph_title_array[] = "'".$row['title']."'";
    }

    $lesson_graph_done_count_string = implode(',', $lesson_graph_done_count_array);
    $lesson_graph_title_string = implode(',', $lesson_graph_title_array);
}

$exam_graph_sql_html = "SELECT * FROM `examination_progress` WHERE category_id = 1";
$exam_graph_sql_css = "SELECT * FROM `examination_progress` WHERE category_id = 2";

$exam_graph_result_html = mysqli_query($conn, $exam_graph_sql_html);
$exam_graph_result_css = mysqli_query($conn, $exam_graph_sql_css);

$quiz_taken_graph_sql = "SELECT * FROM `progresses` WHERE score != 0";

$quiz_taken_graph_result = mysqli_query($conn, $quiz_taken_graph_sql);


include('../layout/header.php'); 
?>
    <div id="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 d-flex justify-content-between">
                    <div><h2 class="title">Dashboard</h1></div>
                </div>
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-sm-6 col-lg-3">
                            <div class="tile tile-primary">
                                <div class="tile-heading">Total Students</div>
                                <div class="tile-body">
                                    <i class="fa-solid fa-users"></i>
                                    <h2 class="float-end"><?php echo $total_students_result->num_rows; ?></h2>
                                </div>
                                <div class="tile-footer"><a href="students.php">View more...</a></div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="tile tile-primary">
                                <div class="tile-heading">Total Lessons</div>
                                <div class="tile-body">
                                    <i class="fa-solid fa-person-chalkboard"></i>
                                    <h2 class="float-end"><?php echo $total_lessons_result->num_rows; ?></h2>
                                </div>
                                <div class="tile-footer"><a href="lessons.php">View more...</a></div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="tile tile-primary">
                                <div class="tile-heading">Total Quizzes Questions</div>
                                <div class="tile-body">
                                    <i class="fa-solid fa-pencil"></i> 
                                    <h2 class="float-end"><?php echo $total_quizzes_result->num_rows; ?></h2>
                                </div>
                                <div class="tile-footer"><a href="quizzes.php">View more...</a></div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="tile tile-primary">
                                <div class="tile-heading">Total Exams Questions</a></span></div>
                                <div class="tile-body">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                    <h2 class="float-end"><?php echo $total_examinations_result->num_rows; ?></h2>
                                </div>
                                <div class="tile-footer"><a href="exams.php">View more...</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-3">
                    <div class="box">
                        <canvas id="myChart2" width="400" height="400"></canvas>
                    </div>
                </div>
                <div class="col-lg-6 mb-3">
                    <div class="box">
                        <canvas id="myChart3" width="400" height="400"></canvas>
                    </div>
                </div>
                <div class="col-lg-12 mb-3">
                    <div class="box">
                        <canvas id="myChart" width="400" height="400"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
      // Sample data for the bar chart
      var data = {
        labels: [<?php echo $lesson_graph_title_string; ?>],
        datasets: [
          {
            label: "Lessons",
            data: [<?php echo $lesson_graph_done_count_string; ?>],
            backgroundColor: "rgba(75, 192, 192, 0.2)", // Background color of bars
            borderColor: "rgba(75, 192, 192, 1)", // Border color of bars
            borderWidth: 1, // Border width of bars
          },
        ],
      };

      var data2 = {
        labels: ['HTML', 'CSS'],
        datasets: [
          {
            label: "Exams",
            data: [<?php echo $exam_graph_result_html->num_rows;?>, <?php echo $exam_graph_result_css->num_rows; ?>],
            backgroundColor: "rgba(75, 192, 192, 0.2)", // Background color of bars
            borderColor: "rgba(75, 192, 192, 1)", // Border color of bars
            borderWidth: 1, // Border width of bars
          },
        ],
      };
      
      var data3 = {
        labels: ['Total Quiz Taken'],
        datasets: [
          {
            label: "Quizzes",
            data: [<?php echo $quiz_taken_graph_result->num_rows; ?>],
            backgroundColor: "rgba(75, 192, 192, 0.2)", // Background color of bars
            borderColor: "rgba(75, 192, 192, 1)", // Border color of bars
            borderWidth: 1, // Border width of bars
          },
        ],
      };

      // Configuration options for the chart
      var options = {
        scales: {
          y: {
            beginAtZero: true,
          },
        },
      };

      // Get the canvas element and create a bar chart
      var ctx = document.getElementById("myChart").getContext("2d");
      var myChart = new Chart(ctx, {
        type: "bar", // Specify the chart type
        data: data,
        options: options,
      });
      
      var ctx2 = document.getElementById("myChart2").getContext("2d");
      var myChart2 = new Chart(ctx2, {
        type: "bar", // Specify the chart type
        data: data2,
        options: options,
      });

      var ctx3 = document.getElementById("myChart3").getContext("2d");
      var myChart3 = new Chart(ctx3, {
        type: "bar", // Specify the chart type
        data: data3,
        options: options,
      });
    </script>
<?php include('../layout/footer.php'); ?>