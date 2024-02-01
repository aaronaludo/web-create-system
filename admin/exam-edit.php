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
                    <div><h2 class="title">Edit Exam</h1></div>
                </div>
                <div class="col-lg-12">
                    <div class="box">
                        <div class="row">
                            <div class="col-lg-12">
                                <form action="_exam-edit.php" method="post">
                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                                    <div class="mb-3 row">
                                        <label for="question" class="col-sm-12 col-lg-2 col-form-label">Question: </label>
                                        <div class="col-lg-10 col-sm-12 d-flex align-items-center">
                                            <input type="text" class="form-control" id="question" name="question" value="<?php echo $question; ?>"/>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="answers" class="col-sm-12 col-lg-2 col-form-label">Answers: </label>
                                        <div class="col-lg-10 col-sm-12">
                                            <textarea class="form-control" id="answers" name="answers" rows="10"><?php echo $answers; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="right_answer" class="col-sm-12 col-lg-2 col-form-label">Right Answer: </label>
                                        <div class="col-lg-10 col-sm-12 d-flex align-items-center">
                                            <input type="text" class="form-control" id="right_answer" name="right_answer" value="<?php echo $right_answer; ?>"/>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="category_id" class="col-sm-12 col-lg-2 col-form-label">Category: </label>
                                        <div class="col-lg-10 col-sm-12 d-flex align-items-center">
                                            <select name="category_id" id="category_id" class="form-select form-control">
                                                <option value="1" <?php echo ($category_id == 1) ? 'selected' : ''; ?>>HTML</option>
                                                <option value="2" <?php echo ($category_id == 2) ? 'selected' : ''; ?>>CSS</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center mt-5 mb-4">
                                        <button class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include('../layout/footer.php'); ?>