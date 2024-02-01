<?php 
include('../layout/header.php'); 
require "../connect.php";

if(!isset($_SESSION['admin_id'])){
    header("Location: login.php");
}

$id = $_GET['id'];

$sql = "SELECT * FROM examinations WHERE id = $id";
$result = mysqli_query($conn, $sql);

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $question = $row['question'];
        $answers = $row['answers'];
        $right_answer = $row['right_answer'];
        $category_id = $row['category_id'];
    }
}else{
    header('Location: exams.php');
    exit();
}

?>
    <div id="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 d-flex justify-content-between">
                    <div>
                        <h2 class="title">View Exam</h2>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="alert alert-primary">
                        <div class="alert-heading mb-3 fw-bold">
                            <h4 class="d-inline">Question: </h4>
                            <h4 class="d-inline fw-bold"><?php echo $question ?></h4>
                        </div>
                        <div class="alert-heading mb-3 fw-bold">
                            <h4 class="d-inline">Answers: </h4>
                            <h4 class="d-inline fw-bold"><?php echo $answers ?></h4>
                        </div>
                        <div class="alert-heading mb-3 fw-bold">
                            <h4 class="d-inline">Right Answer: </h4>
                            <h4 class="d-inline fw-bold"><?php echo $right_answer ?></h4>
                        </div>
                        <div class="alert-heading mb-3 fw-bold">
                            <h4 class="d-inline">Category: </h4>
                            <h4 class="d-inline fw-bold"><?php echo $category_id == 1 ? 'HTML' : 'CSS'; ?></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include('../layout/footer.php'); ?>
