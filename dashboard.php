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

$category = 1;
$user_id = $_SESSION['user_id'];

if (isset($_POST['html'])) {
    $category = intval($_POST['html']);
    
}else if(isset($_POST['css'])){
    $category = intval($_POST['css']);
}
?>
<?php include('layout/__header.php');?>
    <div class="container my-5">
        <h2 class="text-primary fw-bold mb-5">STUDY: <?php echo $category == 1 ? 'HTML' : 'CSS'; ?></h2>
        <div style="display:flex; align-items: center; justify-content: space-between">
            <form method="post">
                <button type="submit" value="1" name="html" class="btn btn-primary <?php echo $category == 1 ? 'active' : '' ?>">HTML</button>
                <button type="submit" value="2" name="css" class="btn btn-primary <?php echo $category == 2 ? 'active' : '' ?>">CSS</button>
            </form>
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
            FROM units WHERE category_id = '$category'
            ORDER BY id ASC";
            $result = $conn->query($sql);

            // Loop through the query results and create lesson boxes
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    // var_dump($row);
                    echo '<div class="lesson-box" style="display:flex;align-items: center;justify-content: space-between; padding: 30px 50px;">';
                    echo '<a href="unit.php?unit_id=' . $row["id"] . '&category_id='. $category .'"><p class="m-0 fw-bold">'. $row["name"] . '</p></a>';
                    // echo '<div class="icon-container active-color"><i class="fas fa-check"></i></div>';
                    echo '</div>';
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
