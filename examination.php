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

$category_id = $_GET['category_id'];

$sql = "SELECT * FROM examinations WHERE category_id = '$category_id' ORDER BY RAND()";
$result = $conn->query($sql);

?>
<?php include('layout/__header.php');?>
    <div class="container my-5">
        <div>
            <h2 class="text-primary fw-bold mb-5">EXAMNINATION</h2>
            <button class="btn btn-primary"><a href="dashboard.php" class="text-white text-decoration-none fw-bold">Back</a></button>
            <hr>
        </div>
        <form action="examination_.php" method="post">
            <input type="hidden" name="category_id" value="<?php echo $category_id?>">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <div class="mt-3">
                        <h2 class="fw-bolder"><?php echo $row['question'] ?></h2>
                    </div>
                    <div class="my-5">
                        <h3 class="font-weight-normal">
                            <?php echo $row['answers'] ?>
                        </h3>
                    </div>
                    <div class="mb-5 fw-bolder">
                        Answer: <input type="text" name="answers[<?php echo $row['id'] ?>]" placeholder="Type the letter" />
                    </div>
                    <?php
                }
            } else {
                echo "No examination found.";
            }
            ?>
            <div class="mt-3">
                <button class="btn btn-primary fw-bolder" type="submit">Submit</button>
            </div>
        </form>
    </div>
<?php include('layout/__footer.php');?>
</body>
</html>