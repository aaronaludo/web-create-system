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
                    <div><h2 class="title">Add Lesson</h1></div>
                </div>
                <?php if (isset($_GET['success']) && $_GET['success'] == 0) {?>
                    <div class="col-lg-12">
                        <div class="alert alert-danger" role="alert">Lesson added failed!</div>
                    </div>
                <?php }?>
                <div class="col-lg-12">
                    <div class="box">
                        <div class="row">
                            <div class="col-lg-12">
                                <form action="_lesson-add.php" method="post" enctype="multipart/form-data">
                                    <div class="mb-3 row">
                                        <label for="sequence" class="col-sm-12 col-lg-2 col-form-label">Sequence: </label>
                                        <div class="col-lg-10 col-sm-12 d-flex align-items-center">
                                            <input type="number" class="form-control" id="sequence" name="sequence"/>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="title" class="col-sm-12 col-lg-2 col-form-label">Title: </label>
                                        <div class="col-lg-10 col-sm-12 d-flex align-items-center">
                                            <input type="text" class="form-control" id="title" name="title"/>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="description" class="col-sm-12 col-lg-2 col-form-label">Description: </label>
                                        <div class="col-lg-10 col-sm-12">
                                            <textarea class="form-control" id="description" name="description" rows="10"></textarea>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="image" class="col-sm-12 col-lg-2 col-form-label">Image: </label>
                                        <div class="col-lg-10 col-sm-12 d-flex align-items-center">
                                            <input type="file" class="form-control" id="image" name="image"/>
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
                                    <div class="mb-3 row">
                                        <label for="unit_id" class="col-sm-12 col-lg-2 col-form-label">Unit: </label>
                                        <div class="col-lg-10 col-sm-12 d-flex align-items-center">
                                            <input type="number" class="form-control" id="unit_id" name="unit_id"/>
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