<?php 
include('../layout/header.php'); 
require "../connect.php";

if(!isset($_SESSION['admin_id'])){
    header("Location: login.php");
}

$id = $_GET['id'];

$sql = "SELECT * FROM units WHERE id = $id";
$result = mysqli_query($conn, $sql);

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $name = $row['name'];
        $category_id = $row['category_id'];
    }
}else{
    header('Location: units.php');
    exit();
}

?>
    <div id="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 d-flex justify-content-between">
                    <div><h2 class="title">Edit</h1></div>
                </div>
                <div class="col-lg-12">
                    <div class="box">
                        <div class="row">
                            <div class="col-lg-12">
                                <form action="_unit-edit.php" method="POST">
                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                                    <div class="mb-3 row">
                                        <label for="name" class="col-sm-12 col-lg-2 col-form-label">Name: <span class="required">*</span></label>
                                        <div class="col-lg-10 col-sm-12">
                                            <input type="text" class="form-control" id="name" value="<?php echo $name;?>" name="name"/>
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
                                        <button class="btn btn-primary">Save</button>
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