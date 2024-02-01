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

$sql = "SELECT * FROM users WHERE is_admin = 0 AND username LIKE '%$searchName%' ORDER BY $filter ASC";
$result = mysqli_query($conn, $sql);

?>
    <div id="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 d-flex justify-content-between">
                    <div><h2 class="title">Students</h1></div>
                </div>
                <div class="col-lg-12 mb-20">
                    <div class="box">
                        <form method="get">
                            <div class="row">
                                <div class="col-lg-10">
                                    <div class="input-group mb-3 mb-lg-0">
                                        <span class="input-group-text"><i class="fa-solid fa-magnifying-glass"></i></span>
                                        <input type="text" class="form-control" placeholder="Search by name" name="name" value="<?php echo $searchName?>"/>
                                    </div>
                                </div>
                                <div class="col-lg-2"><button class="btn btn-primary w-100" type="submit">Search</button></div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="box">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead class="table-light">
                                            <form method="GET">
                                                <th>ID <button class="btn btn-primary ms-3" name="filter" value="id" <?php echo $filter === 'id' ? 'disabled' : '' ?>><i class="fa-solid fa-filter"></i></button></th>
                                                <th>Username <button class="btn btn-primary ms-3" name="filter" value="username" <?php echo $filter === 'username' ? 'disabled' : '' ?>><i class="fa-solid fa-filter"></i></button></th>
                                                <th>Email <button class="btn btn-primary ms-3" name="filter" value="email" <?php echo $filter === 'email' ? 'disabled' : '' ?>><i class="fa-solid fa-filter"></i></button></th>
                                                <th>Contact Info <button class="btn btn-primary ms-3" name="filter" value="contact_info" <?php echo $filter === 'contact_info' ? 'disabled' : '' ?>><i class="fa-solid fa-filter"></i></button></th>
                                                <th>Actions</th>
                                            </form>
                                        </thead>
                                        <tbody>
                                            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                                <tr>
                                                    <td><?php echo $row['id']; ?></td>
                                                    <td><?php echo $row['username']; ?></td>
                                                    <td><?php echo $row['email']; ?></td>
                                                    <td><?php echo $row['contact_info']; ?></td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <div class="action-button">
                                                                <a href="student-view.php?id=<?php echo $row['id']; ?>" title="View">
                                                                    <i class="fa-solid fa-eye"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
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
