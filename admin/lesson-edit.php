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
                    <div><h2 class="title">Edit Lesson</h1></div>
                </div>
                <div class="col-lg-12">
                    <div class="box">
                        <div class="row">
                            <div class="col-lg-12">
                                <form action="_lesson-edit.php" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                                    <input type="hidden" name="current_image" value="<?php echo $image; ?>">
                                    <div class="mb-5 row w-100">
                                        <div class="col-lg-12 d-flex align-items-center justify-content-center">
                                            <img src="../assets/images/lessons/<?php echo $image; ?>" alt="lesson_image" style="width: 700px; "/>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="sequence" class="col-sm-12 col-lg-2 col-form-label">Sequence: </label>
                                        <div class="col-lg-10 col-sm-12 d-flex align-items-center">
                                            <input type="number" class="form-control" id="sequence" name="sequence" value="<?php echo $sequence ?>"/>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="title" class="col-sm-12 col-lg-2 col-form-label">Title: </label>
                                        <div class="col-lg-10 col-sm-12 d-flex align-items-center">
                                            <input type="text" class="form-control" id="title" name="title" value="<?php echo $title; ?>"/>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="description" class="col-sm-12 col-lg-2 col-form-label">Description: </label>
                                        <div class="col-lg-10 col-sm-12">
                                            <textarea class="form-control" id="description" name="description" rows="10"><?php echo $description; ?></textarea>
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
                                            <input type="number" class="form-control" id="unit_id" name="unit_id" value="<?php echo $unit_id; ?>"/>
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