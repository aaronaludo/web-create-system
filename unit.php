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

$category = $_GET['category_id'];
$user_id = $_SESSION['user_id'];
$unit_id = $_GET['unit_id'];


$sql = "SELECT * FROM units WHERE id = $unit_id";
$result = mysqli_query($conn, $sql);
while ($row = $result->fetch_assoc()) {
    $name = $row['name'];
}
preg_match_all('/\d+/', $name, $matches);

// var_dump($matches[0][0]);

if (isset($_POST['html'])) {
    $category = intval($_POST['html']);
    
}else if(isset($_POST['css'])){
    $category = intval($_POST['css']);
}

$sql = "SELECT
progresses.user_id,
SUM(progresses.score) AS total_score,
(SUM(progresses.score) / 25) * 100 AS total_percentage
FROM progresses
JOIN lessons ON progresses.lesson_id = lessons.id
WHERE progresses.user_id = $user_id
    AND lessons.category_id = '$category'
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

// var_dump($totalPercentage);

?>

<?php include('layout/__header.php');?>
    <div class="container mt-5">
        <div style="display:flex;align-items:center;justify-content:space-between" class="mb-5">
            <h2 class="text-primary fw-bold"><?php echo $category == 1 ? 'HTML - '.$name : 'CSS - '.$name ?></h2>
            <div><a href="dashboard.php">&lt;&lt;&lt;back</a></div>
        </div>
        <div style="display:flex; align-items: center; justify-content: space-between">
            <!-- <form method="post">
                <button type="submit" value="1" name="html" class="<?php echo $category == 1 ? 'active' : '' ?>">HTML</button>
                <button type="submit" value="2" name="css" class="<?php echo $category == 2 ? 'active' : '' ?>">CSS</button>
            </form> -->
            <div>
                <?php 
                    if($totalPercentage >= 50){
                ?>
                    <button class="btn btn-primary"><a href="examination.php?category_id=<?php echo $category?>" style="text-decoration: none" class="text-white fw-bold">Examination</a></button>
                <?php 
                }
                ?>
            </div>
        </div>
        <hr>
        <div class="lesson-boxes">
            <?php
            // Connect to your database (replace with your database credentials)
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "webcreatesystem";

            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check the connection 
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // SQL query to select lesson data
            $sql = "SELECT *
            FROM lessons
            WHERE lessons.category_id = '$category'
            AND lessons.unit_id = '".$matches[0][0] ."'
            ORDER BY lessons.id ASC";
            $result = $conn->query($sql);

            // Loop through the query results and create lesson boxes
            if ($result->num_rows > 0) {
                // var_dump($result->num_rows);
                
                $index = 1; // Initialize index variable
            
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="lesson-box" style="display:flex;align-items: center;justify-content: space-between; padding: 30px 50px">';
                    echo '<a href="lesson.php?id='.$row["id"].'&lesson_count='. $result->num_rows .'&index='.$index.'&unit_id='.$matches[0][0].'&category_id='.$category.'"><p class="mb-0 fw-bold">'. $row["title"] . '</p></a>';
            
                    // Output the current index
                    // echo '<p>' . $index . '</p>';
            
                    echo '</div>';
            
                    // Increment the index for the next iteration
                    $index++;
                }
            } else {
                echo "No lessons found.";
            }

            // Close the database connection
            $conn->close();
            ?>
        </div>
    </div>
<?php include('layout/__footer.php');?>
</body>
</html>
