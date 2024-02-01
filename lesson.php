<?php 

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

// $lesson_new = $_GET['id'];
$user_id = $_SESSION['user_id'];
$category_id = $_GET['category_id'];
$unit_id = $_GET['unit_id'];
$index = $_GET['index'];
$lesson_count = $_GET['lesson_count'];

if($lesson_count < $index){
    header("Location: dashboard.php");
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

$sql = "SELECT *
FROM lessons
WHERE lessons.category_id = '$category_id'
AND lessons.unit_id = '".$unit_id ."'
ORDER BY lessons.id ASC";
$result = $conn->query($sql);

$row = $result->fetch_all();
$lesson_new = $row[$index-1][0];
// var_dump($row[$index-1]);

// SQL query to select lesson data
$sql = "SELECT * FROM lessons WHERE id = '$lesson_new'";
$result = $conn->query($sql);


if(!$lesson_new || $result->num_rows === 0){
    header('Location: dashboard.php');
    exit();
}

$data = $result->fetch_assoc();

$is_done_sql = "SELECT * FROM progresses WHERE user_id = '$user_id' AND lesson_id = '$lesson_new'";
$is_done_result = $conn->query($is_done_sql);

// var_dump($is_done_result->num_rows);

if($is_done_result->num_rows == 0){
    $is_done = 0;
}else{
    $is_done_data = $is_done_result->fetch_assoc();
    $is_done = $is_done_data['is_done'];
}


if (isset($_POST['done'])) {
    $is_done = intval($_POST['done']);

    if (isset($is_done_data['id'])) {
        $id = intval($is_done_data['id']);  // Create a separate variable for id
        $sql = "UPDATE progresses SET is_done = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
    
        // Bind the parameters by reference
        $stmt->bind_param("si", $is_done, $id);
        $stmt->execute();
    }else{
        $sql = "INSERT INTO progresses (user_id, lesson_id, is_done) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $user_id, $lesson_new, $is_done);
        $stmt->execute();
    }
    
}else if(isset($_POST['undone'])){
    $is_done = intval($_POST['undone']);

    if (isset($is_done_data['id'])) {
        $id = intval($is_done_data['id']);  // Create a separate variable for id
        $sql = "UPDATE progresses SET is_done = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
    
        // Bind the parameters by reference
        $stmt->bind_param("si", $is_done, $id);
        $stmt->execute();
    }

}
?>
<?php include('layout/__header.php');?>
    <div class="container my-5">
        <div>
            <img src="assets/images/lessons/<?php echo $row[$index-1][4]?>" alt="lesson1" style="width: 500px"/>
            <div style="display: flex;justify-content:space-between;align-items:center" class="my-5">
                <h2 class="text-primary fw-bold"><?php echo $row[$index-1][1] ?></h2>
                <!-- <a href="lesson.php?id=<?php echo $lesson_new + 1?>">next lesson >></a> -->
            </div>
            <!-- <button><a href="quiz.php?id=<?php echo $lesson_new?>">QUIZ</a></button>
            <?php if($lesson_new != 1){?>
                <button><a href="lesson.php?id=<?php echo $lesson_new - 1?>">PREVIOUS</a></button>
            <?php }?> -->
            <!-- <button><a href="lesson.php?id=<?php echo $lesson_new + 1?>">NEXT</a></button> -->
            <div style="display: flex; align-items: center; justify-content: space-between">
                <div class="w-100">
                    <div class="d-flex align-items-center justify-content-between w-100">
                        <button class="btn btn-primary"><a href="livecodeeditor.php" class="text-white fw-bold" style="text-decoration: none;">TRY IT HERE !</a></button>
                        <button class="btn btn-primary"><a href="lesson.php?id=<?php echo $lesson_new + 1?>&lesson_count=<?php echo $lesson_count; ?>&index=<?php echo $index + 1;?>&unit_id=<?php echo $unit_id; ?>&category_id=<?php echo $category_id; ?>" class="text-white fw-bold text-decoration-none">NEXT</a></button>
                    </div>
                    <?php 
                        if($is_done == 1){
                    ?>

                    <?php 
                    $query = "SELECT COUNT(*) AS quiz_count FROM quizzes WHERE lesson_id = ?";
                    $stmt = $conn->prepare($query);
                    $stmt->bind_param("i", $lesson_new); // "i" indicates an integer parameter

                    // Execute the query
                    $stmt->execute();
                    $stmt->bind_result($quiz_count);
                    $stmt->fetch(); 
                    if($quiz_count != 0){
                    ?>
                    <button class="btn btn-outline-primary"><a href="quiz.php?lesson_id=<?php echo $lesson_new?>" class="fw-bold text-decoration-none">QUIZ</a></button>
                    <?php 
                    }
                    if(isset($is_done_data['score']) && $quiz_count != 0){
                        echo $is_done_data['score'].'/'.$quiz_count;
                    }
                    }
                    ?>
                </div>
            </div>
            <hr>
        </div>
        <div>
            <h3 class="font-weight-normal">
                <?php echo $row[$index-1][2]; ?>
            </h3>
        </div>
        <hr>
        <div class="d-flex align-items-center justify-content-end">
            <form method="post">
                <?php 
                if($is_done == 0){
                ?>
                    <button type="submit" name="undone" value="0" class="btn btn-primary fw-bold <?php echo $is_done == 0 ? 'active' : '' ?>">UNDONE</button>
                <?php }?>
                <button type="submit" name="done" value="1" class="btn btn-primary fw-bold <?php echo $is_done == 1 ? 'active' : '' ?>">DONE</button>
            </form>
        </div>
    </div>
<?php include('layout/__footer.php');?>
</body>
</html>