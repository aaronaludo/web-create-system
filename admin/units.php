<?php 
include('../layout/header.php'); 
require "../connect.php";

if(!isset($_SESSION['admin_id'])){
    header("Location: login.php");
}

$searchName = '';

if(isset($_GET['name'])){
    $searchName = $_GET['name'];
}

$filter = 'id';

if(isset($_GET['filter'])){
    $filter = $_GET['filter'];
}

$sql = "SELECT * FROM units WHERE name LIKE '%$searchName%' ORDER BY $filter ASC";
$result = mysqli_query($conn, $sql);
?>
    <div id="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 d-flex justify-content-between">
                    <div><h2 class="title">Units</h1></div>
                    <div class="d-flex align-items-center"><a class="btn btn-primary" href="unit-add.php"><i class="fa-solid fa-plus"></i>&nbsp;&nbsp;&nbsp;Add Unit</a></div>
                </div>
                <div class="col-lg-12 mb-20">
                    <div class="box">
                        <form method="get">
                            <div class="row">
                                <div class="col-lg-10">
                                    <div class="input-group mb-3 mb-lg-0">
                                        <span class="input-group-text"><i class="fa-solid fa-magnifying-glass"></i></span>
                                        <input type="text" class="form-control" placeholder="Search by Name" name="name" value="<?php echo $searchName?>"/>
                                    </div>
                                </div>
                                <div class="col-lg-2"><button class="btn btn-primary w-100" type="submit">Search</button></div>
                            </div>
                        </form>
                    </div>
                </div>
                <?php if (isset($_GET['success']) && $_GET['success'] == 1) {?>
                    <div class="col-lg-12">
                        <div class="alert alert-success" role="alert">Unit added successfully!</div>
                    </div>
                <?php }else if(isset($_GET['success']) && $_GET['success'] == 2) {?>
                    <div class="col-lg-12">
                        <div class="alert alert-success" role="alert">Unit deleted successfully!</div>
                    </div>
                <?php }else if(isset($_GET['success']) && $_GET['success'] == 3) {?>
                    <div class="col-lg-12">
                        <div class="alert alert-success" role="alert">Unit updated successfully!</div>
                    </div>
                <?php }else if(isset($_GET['success']) && $_GET['success'] == 0) {?>
                    <div class="col-lg-12">
                        <div class="alert alert-danger" role="alert">Unit deleted failed!</div>
                    </div>
                <?php }?>
                <div class="col-lg-12">
                    <div class="box">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead class="table-light">
                                            <form method="get">
                                                <th>ID <button class="btn btn-primary ms-3" name="filter" value="id" <?php echo $filter === 'id' ? 'disabled' : '' ?>><i class="fa-solid fa-filter"></i></button></th>
                                                <th>Name <button class="btn btn-primary ms-3" name="filter" value="name" <?php echo $filter === 'name' ? 'disabled' : '' ?>><i class="fa-solid fa-filter"></i></button></th>
                                                <th>Category <button class="btn btn-primary ms-3" name="filter" value="category_id" <?php echo $filter === 'category_id' ? 'disabled' : '' ?>><i class="fa-solid fa-filter"></i></button></th>
                                                <th>Action</th>
                                            </form>
                                        </thead>
                                        <tbody>
                                            <?php while ($row = mysqli_fetch_assoc($result)) {?>
                                                <tr>
                                                    <td><?php echo $row['id']?></td>
                                                    <td><?php echo $row['name']?></td>
                                                    <td><?php echo $row['category_id'] == 1 ? 'HTML' : 'CSS'; ?></td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <div class="action-button"><a href="unit-view.php?id=<?php echo $row['id']; ?>" title="View"><i class="fa-solid fa-eye"></i></a></div>
                                                            <div class="action-button"><a href="unit-edit.php?id=<?php echo $row['id']; ?>" title="Edit"><i class="fa-solid fa-pencil text-primary"></i></a></div>
                                                            <div class="action-button">
                                                                <button class="border-0 color-red" title="Delete" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo $row['id']; ?>" type="button">
                                                                    <i class="fa-solid fa-trash"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <div class="modal fade" id="deleteModal<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel<?php echo $row['id']; ?>" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="deleteModalLabel">Delete</h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Are you sure you want to delete <strong><?php echo $row['name']?></strong> ?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal" id="close_modal">Close</button>
                                                                <form action="_unit-delete.php" method="post">
                                                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include('../layout/footer.php'); ?>