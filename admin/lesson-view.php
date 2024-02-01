<?php 
include('../layout/header.php'); 
require "../connect.php";

if(!isset($_SESSION['admin_id'])){
    header("Location: login.php");
}

$id = $_GET['id'];

$sql = "SELECT * FROM lessons WHERE id = $id";
$result = mysqli_query($conn, $sql);

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $title = $row['title'];
        $description = $row['description'];
        $category_id = $row['category_id'];
        $image = $row['image'];
        $unit_id = $row['unit_id'];
        $sequence = $row['sequence'];
    }
}else{
    header('Location: lessons.php');
    exit();
}

?>
    <div id="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 d-flex justify-content-between">
                    <div>
                        <h2 class="title">View Lesson</h2>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="alert alert-primary">
                        <div class="mb-5 row w-100">
                            <div class="col-lg-12 d-flex align-items-center justify-content-center">
                                <img src="../assets/images/lessons/<?php echo $image; ?>" alt="lesson_image" style="width: 700px; "/>
                            </div>
                        </div>
                        <div class="alert-heading mb-3 fw-bold">
                            <h4 class="d-inline">Title: </h4>
                            <h4 class="d-inline fw-bold"><?php echo $title ?></h4>
                        </div>
                        <div class="alert-heading mb-3 fw-bold">
                            <h4 class="d-inline">Description: </h4>
                            <p class="d-inline fw-bold"><?php echo $description ?></p>
                        </div>
                        <div class="alert-heading mb-3 fw-bold">
                            <h4 class="d-inline">Category: </h4>
                            <h4 class="d-inline fw-bold"><?php echo $category_id == 1 ? "HTML" : "CSS" ?></h4>
                        </div>
                        <div class="alert-heading mb-3 fw-bold">
                            <h4 class="d-inline">Unit: </h4>
                            <h4 class="d-inline fw-bold"><?php echo $unit_id ?></h4>
                        </div>
                        <div class="alert-heading mb-3 fw-bold">
                            <h4 class="d-inline">Sequence: </h4>
                            <h4 class="d-inline fw-bold"><?php echo $sequence ?></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include('../layout/footer.php'); ?>
