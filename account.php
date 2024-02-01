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

$sql_html_exam = "SELECT
user_id,
SUM(score) AS total_score,
(SUM(score) / 25) * 100 AS total_percentage
FROM examination_progress
WHERE user_id = $user_id AND category_id = 1
GROUP BY user_id;";

$result3_html_exam = mysqli_query($conn, $sql_html_exam);

if ($result3_html_exam) {
$row = mysqli_fetch_assoc($result3_html_exam);

if ($row) {
    $totalScore_html_exam = $row['total_score'];
    $totalPercentage_html_exam = round($row['total_percentage'], 2);
} else {
    $totalScore_html_exam = 0;
    $totalPercentage_html_exam = 0;
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


$unit1_html_sql = "SELECT 
    progresses.is_done,
    progresses.user_id,
    units.id AS unit_id,
    units.name AS unit_name,
    lessons.id AS lesson_id,
    lessons.title,
    lessons.description,
    lessons.category_id,
    lessons.image,
    lessons.unit_id,
    lessons.sequence
FROM 
    units
JOIN 
    lessons ON units.id = lessons.unit_id AND lessons.category_id = 1
LEFT JOIN 
    progresses ON lessons.id = progresses.lesson_id AND progresses.user_id = '$user_id'
WHERE 
    units.id = 1
GROUP BY 
    units.id, units.name, lessons.id, lessons.title, lessons.description, lessons.category_id, lessons.image, lessons.unit_id, lessons.sequence;";

$unit1_html_result = mysqli_query($conn, $unit1_html_sql);

$unit1_html_has_true = true;

while ($row = mysqli_fetch_assoc($unit1_html_result)) {
    if ($row['is_done'] == '0' || $row['is_done'] == null) {
        $unit1_html_has_true = false;
        break; 
    }
}

$unit2_html_sql = "SELECT 
    progresses.is_done,
    progresses.user_id,
    units.id AS unit_id,
    units.name AS unit_name,
    lessons.id AS lesson_id,
    lessons.title,
    lessons.description,
    lessons.category_id,
    lessons.image,
    lessons.unit_id,
    lessons.sequence
FROM 
    units
JOIN 
    lessons ON units.id = lessons.unit_id AND lessons.category_id = 1
LEFT JOIN 
    progresses ON lessons.id = progresses.lesson_id AND progresses.user_id = '$user_id'
WHERE 
    units.id = 2
GROUP BY 
    units.id, units.name, lessons.id, lessons.title, lessons.description, lessons.category_id, lessons.image, lessons.unit_id, lessons.sequence;";

$unit2_html_result = mysqli_query($conn, $unit2_html_sql);

$unit2_html_has_true = true;

while ($row = mysqli_fetch_assoc($unit2_html_result)) {
    if ($row['is_done'] == '0' || $row['is_done'] == null) {
        $unit2_html_has_true = false;
        break; 
    }
}

$unit3_html_sql = "SELECT 
    progresses.is_done,
    progresses.user_id,
    units.id AS unit_id,
    units.name AS unit_name,
    lessons.id AS lesson_id,
    lessons.title,
    lessons.description,
    lessons.category_id,
    lessons.image,
    lessons.unit_id,
    lessons.sequence
FROM 
    units
JOIN 
    lessons ON units.id = lessons.unit_id AND lessons.category_id = 1
LEFT JOIN 
    progresses ON lessons.id = progresses.lesson_id AND progresses.user_id = '$user_id'
WHERE 
    units.id = 3
GROUP BY 
    units.id, units.name, lessons.id, lessons.title, lessons.description, lessons.category_id, lessons.image, lessons.unit_id, lessons.sequence;";

$unit3_html_result = mysqli_query($conn, $unit3_html_sql);

$unit3_html_has_true = true;

while ($row = mysqli_fetch_assoc($unit3_html_result)) {
    if ($row['is_done'] == '0' || $row['is_done'] == null) {
        $unit3_html_has_true = false;
        break; 
    }
}

$unit4_html_sql = "SELECT 
    progresses.is_done,
    progresses.user_id,
    units.id AS unit_id,
    units.name AS unit_name,
    lessons.id AS lesson_id,
    lessons.title,
    lessons.description,
    lessons.category_id,
    lessons.image,
    lessons.unit_id,
    lessons.sequence
FROM 
    units
JOIN 
    lessons ON units.id = lessons.unit_id AND lessons.category_id = 1
LEFT JOIN 
    progresses ON lessons.id = progresses.lesson_id AND progresses.user_id = '$user_id'
WHERE 
    units.id = 4
GROUP BY 
    units.id, units.name, lessons.id, lessons.title, lessons.description, lessons.category_id, lessons.image, lessons.unit_id, lessons.sequence;";

$unit4_html_result = mysqli_query($conn, $unit4_html_sql);

$unit4_html_has_true = true;

while ($row = mysqli_fetch_assoc($unit4_html_result)) {
    if ($row['is_done'] == '0' || $row['is_done'] == null) {
        $unit4_html_has_true = false;
        break; 
    }
}

$unit5_html_sql = "SELECT 
    progresses.is_done,
    progresses.user_id,
    units.id AS unit_id,
    units.name AS unit_name,
    lessons.id AS lesson_id,
    lessons.title,
    lessons.description,
    lessons.category_id,
    lessons.image,
    lessons.unit_id,
    lessons.sequence
FROM 
    units
JOIN 
    lessons ON units.id = lessons.unit_id AND lessons.category_id = 1
LEFT JOIN 
    progresses ON lessons.id = progresses.lesson_id AND progresses.user_id = '$user_id'
WHERE 
    units.id = 5
GROUP BY 
    units.id, units.name, lessons.id, lessons.title, lessons.description, lessons.category_id, lessons.image, lessons.unit_id, lessons.sequence;";

$unit5_html_result = mysqli_query($conn, $unit5_html_sql);

$unit5_html_has_true = true;

while ($row = mysqli_fetch_assoc($unit5_html_result)) {
    if ($row['is_done'] == '0' || $row['is_done'] == null) {
        $unit5_html_has_true = false;
        break; 
    }
}

$unit1_css_sql = "SELECT 
    progresses.is_done,
    progresses.user_id,
    units.id AS unit_id,
    units.name AS unit_name,
    lessons.id AS lesson_id,
    lessons.title,
    lessons.description,
    lessons.category_id,
    lessons.image,
    lessons.unit_id,
    lessons.sequence
FROM 
    units
JOIN 
    lessons ON units.id = lessons.unit_id AND lessons.category_id = 2
LEFT JOIN 
    progresses ON lessons.id = progresses.lesson_id AND progresses.user_id = '$user_id'
WHERE 
    units.id = 1
GROUP BY 
    units.id, units.name, lessons.id, lessons.title, lessons.description, lessons.category_id, lessons.image, lessons.unit_id, lessons.sequence;";

$unit1_css_result = mysqli_query($conn, $unit1_css_sql);

$unit1_css_has_true = true;

while ($row = mysqli_fetch_assoc($unit1_css_result)) {
    if ($row['is_done'] == '0' || $row['is_done'] == null) {
        $unit1_css_has_true = false;
        break; 
    }
}

$unit2_css_sql = "SELECT 
    progresses.is_done,
    progresses.user_id,
    units.id AS unit_id,
    units.name AS unit_name,
    lessons.id AS lesson_id,
    lessons.title,
    lessons.description,
    lessons.category_id,
    lessons.image,
    lessons.unit_id,
    lessons.sequence
FROM 
    units
JOIN 
    lessons ON units.id = lessons.unit_id AND lessons.category_id = 2
LEFT JOIN 
    progresses ON lessons.id = progresses.lesson_id AND progresses.user_id = '$user_id'
WHERE 
    units.id = 2
GROUP BY 
    units.id, units.name, lessons.id, lessons.title, lessons.description, lessons.category_id, lessons.image, lessons.unit_id, lessons.sequence;";

$unit2_css_result = mysqli_query($conn, $unit2_css_sql);

$unit2_css_has_true = true;

while ($row = mysqli_fetch_assoc($unit2_css_result)) {
    if ($row['is_done'] == '0' || $row['is_done'] == null) {
        $unit2_css_has_true = false;
        break; 
    }
}

$unit3_css_sql = "SELECT 
    progresses.is_done,
    progresses.user_id,
    units.id AS unit_id,
    units.name AS unit_name,
    lessons.id AS lesson_id,
    lessons.title,
    lessons.description,
    lessons.category_id,
    lessons.image,
    lessons.unit_id,
    lessons.sequence
FROM 
    units
JOIN 
    lessons ON units.id = lessons.unit_id AND lessons.category_id = 2
LEFT JOIN 
    progresses ON lessons.id = progresses.lesson_id AND progresses.user_id = '$user_id'
WHERE 
    units.id = 3
GROUP BY 
    units.id, units.name, lessons.id, lessons.title, lessons.description, lessons.category_id, lessons.image, lessons.unit_id, lessons.sequence;";

$unit3_css_result = mysqli_query($conn, $unit3_css_sql);

$unit3_css_has_true = true;

while ($row = mysqli_fetch_assoc($unit3_css_result)) {
    if ($row['is_done'] == '0' || $row['is_done'] == null) {
        $unit3_css_has_true = false;
        break; 
    }
}

$unit4_css_sql = "SELECT 
    progresses.is_done,
    progresses.user_id,
    units.id AS unit_id,
    units.name AS unit_name,
    lessons.id AS lesson_id,
    lessons.title,
    lessons.description,
    lessons.category_id,
    lessons.image,
    lessons.unit_id,
    lessons.sequence
FROM 
    units
JOIN 
    lessons ON units.id = lessons.unit_id AND lessons.category_id = 2
LEFT JOIN 
    progresses ON lessons.id = progresses.lesson_id AND progresses.user_id = '$user_id'
WHERE 
    units.id = 4
GROUP BY 
    units.id, units.name, lessons.id, lessons.title, lessons.description, lessons.category_id, lessons.image, lessons.unit_id, lessons.sequence;";

$unit4_css_result = mysqli_query($conn, $unit4_css_sql);

$unit4_css_has_true = true;

while ($row = mysqli_fetch_assoc($unit4_css_result)) {
    if ($row['is_done'] == '0' || $row['is_done'] == null) {
        $unit4_css_has_true = false;
        break; 
    }
}

$unit5_css_sql = "SELECT 
    progresses.is_done,
    progresses.user_id,
    units.id AS unit_id,
    units.name AS unit_name,
    lessons.id AS lesson_id,
    lessons.title,
    lessons.description,
    lessons.category_id,
    lessons.image,
    lessons.unit_id,
    lessons.sequence
FROM 
    units
JOIN 
    lessons ON units.id = lessons.unit_id AND lessons.category_id = 2
LEFT JOIN 
    progresses ON lessons.id = progresses.lesson_id AND progresses.user_id = '$user_id'
WHERE 
    units.id = 5
GROUP BY 
    units.id, units.name, lessons.id, lessons.title, lessons.description, lessons.category_id, lessons.image, lessons.unit_id, lessons.sequence;";

$unit5_css_result = mysqli_query($conn, $unit5_css_sql);

$unit5_css_has_true = true;

while ($row = mysqli_fetch_assoc($unit5_css_result)) {
    if ($row['is_done'] == '0' || $row['is_done'] == null) {
        $unit5_css_has_true = false;
        break; 
    }
}

// var_dump('Unit 1 HTML: '.$unit1_html_has_true);
// var_dump('Unit 2 HTML: '.$unit2_html_has_true);
// var_dump('Unit 3 HTML: '.$unit3_html_has_true);
// var_dump('Unit 4 HTML: '.$unit4_html_has_true);
// var_dump('Unit 5 HTML: '.$unit5_html_has_true);
// var_dump('Unit 1 CSS: '.$unit1_css_has_true);
// var_dump('Unit 2 CSS: '.$unit2_css_has_true);
// var_dump('Unit 3 CSS: '.$unit3_css_has_true);
// var_dump('Unit 4 CSS: '.$unit4_css_has_true);
// var_dump('Unit 5 CSS: '.$unit5_css_has_true);



?>
<?php include('layout/__header.php');?>
    <div class="container my-5">
        <div>
            <h2 class="text-primary fw-bold mb-5">ACCOUNT DETAILS</h2>
            <button class="btn btn-primary"><a href="account_edit.php" class="text-white text-decoration-none fw-bold">EDIT</a></button>
            <button class="btn btn-primary"><a href="change_password.php" class="text-white text-decoration-none fw-bold">CHANGE PASSWORD</a></button>

            <hr>
        </div>
        <div>
            <div class="mb-3">
                <h3 class="fw-bold">Profile Picture:</h3>
                <div>
                    <img src="assets/images/<?php echo $_SESSION['image']?>" width="200"/>
                </div>  
            </div>
            <div class="mb-3">
                <h3 class="d-inline fw-bold">Name:</h3>
                <span>
                    <h3 class="d-inline ms-3"><?php echo $_SESSION['username']?></h3>
                </span>
            </div>
            <div class="mb-3">
                <h3 class="d-inline fw-bold">Email:</h3>
                <span>
                    <h3 class="d-inline ms-3"><?php echo $_SESSION['email']?></h3>
                </span>
            </div>
            <div class="mb-3">
                <h3 class="d-inline fw-bold">Place of Birth:</h3>
                <span>
                    <h3 class="d-inline ms-3"><?php echo $_SESSION['place_of_birth']?></h3>
                </span>
            </div>
            <div class="mb-3">
                <h3 class="d-inline fw-bold">School:</h3>
                <span>
                    <h3 class="d-inline ms-3"><?php echo $_SESSION['school']?></h3>
                </span>
            </div>
            <div class="mb-3">
                <h3 class="d-inline fw-bold">Contact Info:</h3>
                <span>
                    <h3 class="d-inline ms-3"><?php echo $_SESSION['contact_info']?></h3>
                </span>
            </div>
            <div class="mb-3">
                <h3 class="d-inline fw-bold">Badge:</h3>
                <span>
                    <?php if($unit1_html_has_true){?>
                        <!-- <br/>unit 1 html badge<br/> -->
                        <img src="assets/images/badges/HTML Unit 1 Badge.png" alt="unit1_html_badge" width="100"/>
                    <?php }?>
                    <?php if($unit2_html_has_true){?>
                        <!-- unit 2 html badge<br/> -->
                        <img src="assets/images/badges/HTML Unit 2 Badge.png" alt="unit2_html_badge" width="100"/>
                    <?php }?>
                    <?php if($unit3_html_has_true){?>
                        <!-- unit 3 html badge<br/> -->
                        <img src="assets/images/badges/HTML Unit 3 Badge.png" alt="unit3_html_badge" width="100"/>
                    <?php }?>
                    <?php if($unit4_html_has_true){?>
                        <!-- unit 4 html badge<br/> -->
                        <img src="assets/images/badges/HTML Unit 4 Badge.png" alt="unit4_html_badge" width="100"/>
                    <?php }?>
                    <?php if($unit5_html_has_true){?>
                        <!-- unit 5 html badge<br/> -->
                        <img src="assets/images/badges/HTML Unit 5 Badge.png" alt="unit5_html_badge" width="100"/>
                    <?php }?>
                    <?php if($unit1_css_has_true){?>
                        <!-- unit 1 css badge<br/> -->
                        <img src="assets/images/badges/CSS Unit 1 Badge.png" alt="unit1_css_badge" width="100"/>
                    <?php }?>
                    <?php if($unit2_css_has_true){?>
                        <!-- unit 2 css badge<br/> -->
                        <img src="assets/images/badges/CSS Unit 2 Badge.png" alt="unit2_css_badge" width="100"/>
                    <?php }?>
                    <?php if($unit3_css_has_true){?>
                        <!-- unit 3 css badge<br/> -->
                        <img src="assets/images/badges/CSS Unit 3 Badge.png" alt="unit3_css_badge" width="100"/>
                    <?php }?>
                    <?php if($unit4_css_has_true){?>
                        <!-- unit 4 css badge<br/> -->
                        <img src="assets/images/badges/CSS Unit 4 Badge.png" alt="unit4_css_badge" width="100"/>
                    <?php }?>
                    <?php if($unit5_css_has_true){?>
                        <!-- unit 5 css badge<br/> -->
                        <img src="assets/images/badges/CSS Unit 5 Badge.png" alt="unit5_css_badge" width="100"/>
                    <?php }?>
                </span>
            </div>
            <div class="mb-3">
                <h3 class="d-inline fw-bold">Certification:</h3>
                <span>
                    <?php if($totalPercentage_html_exam >= 50){?>
                        <form method="post" action="_html_cert.php" class="my-3">
                            <button class="btn btn-primary" type="submit" name="name" value="<?php echo $_SESSION['username'];?>">Download HTML Certificate</button>
                        </form>
                    <?php }?>
                    <?php 
                    if($totalPercentage_css_exam >= 50){
                        ?>
                        <form method="post" action="_css_cert.php">
                            <button class="btn btn-primary" type="submit" name="name" value="<?php echo $_SESSION['username'];?>">Download CSS Certificate</button>
                        </form>
                    <?php 
                    }
                ?>
                </span>
            </div>
    </div>
<?php include('layout/__footer.php');?>
</body>
</html>