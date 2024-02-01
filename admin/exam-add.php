<?php 
include('../layout/header.php'); 

if(!isset($_SESSION['admin_id'])){
    header("Location: login.php");
}
?>
    <div id="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 d-flex justify-content-between">
                    <div><h2 class="title">Add Exam</h1></div>
                </div>
                <?php if (isset($_GET['success']) && $_GET['success'] == 0) {?>
                    <div class="col-lg-12">
                        <div class="alert alert-danger" role="alert">Exam added failed!</div>
                    </div>
                <?php }?>
                <div class="col-lg-12">
                    <div class="box">
                        <div class="row">
                            <div class="col-lg-12">
                                <form action="_exam-add.php" method="post">
                                    <div class="mb-3 row">
                                        <label for="question" class="col-sm-12 col-lg-2 col-form-label">Question: </label>
                                        <div class="col-lg-10 col-sm-12 d-flex align-items-center">
                                            <input type="text" class="form-control" id="question" name="question"/>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="answers" class="col-sm-12 col-lg-2 col-form-label">Answers: </label>
                                        <div class="col-lg-10 col-sm-12">
                                            <textarea class="form-control" id="answers" name="answers" rows="10"></textarea>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="right_answer" class="col-sm-12 col-lg-2 col-form-label">Right Answer: </label>
                                        <div class="col-lg-10 col-sm-12 d-flex align-items-center">
                                            <input type="text" class="form-control" id="right_answer" name="right_answer"/>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="category_id" class="col-sm-12 col-lg-2 col-form-label">Category: </label>
                                        <div class="col-lg-10 col-sm-12 d-flex align-items-center">
                                            <select name="category_id" id="category_id" class="form-select form-control">
                                                <option value="1">HTML</option>
                                                <option value="2">CSS</option>
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