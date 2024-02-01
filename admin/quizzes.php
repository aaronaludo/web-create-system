<?php 
include('../layout/header.php'); 
require "../connect.php";

if(!isset($_SESSION['admin_id'])){
    header("Location: login.php");
}

$searchQuestion = '';

if(isset($_GET['question'])){
    $searchQuestion = $_GET['question'];
}

$sqll = "SELECT * FROM `lessons`";
$resultt = mysqli_query($conn, $sqll);
$finall = mysqli_fetch_all($resultt);

$filter = 'id';
$lesson = $finall[0][0];

if(isset($_GET['filter'])){
    $filter = $_GET['filter'];
}

if(isset($_GET['lesson'])){
    $lesson = $_GET['lesson'];
}

$sqll = "SELECT * FROM `lessons`";
$resultt = mysqli_query($conn, $sqll);

$sql = "SELECT quizzes.*, lessons.title AS lesson_title 
        FROM quizzes 
        JOIN lessons ON quizzes.lesson_id = lessons.id 
        WHERE quizzes.question LIKE '%$searchQuestion%' 
        AND quizzes.lesson_id = $lesson
        ORDER BY $filter ASC";
$result = mysqli_query($conn, $sql);

?>
    <div id="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 d-flex justify-content-between">
                    <div><h2 class="title">Quizzes</h1></div>
                        <div class="d-flex align-items-center"><a class="btn btn-primary" href="quiz-add.php"><i class="fa-solid fa-plus"></i>&nbsp;&nbsp;&nbsp;Add Quiz</a></div>
                </div>
                <div class="col-lg-12 mb-20">
                    <div class="box">
                        <form method="get">
                            <div class="row">
                                <div class="col-lg-5">
                                    <select class="form-select mb-3 mb-lg-0 form-control" id="field" name="lesson">
                                        <?php while($row = mysqli_fetch_assoc($resultt)) {?>
                                            <option value="<?php echo $row['id']?>" <?php echo $lesson == $row['id'] ? "selected" : "" ?>><?php echo $row['category_id'] == 1 ? $row['title'] .' - (HTML)': $row['title'] .' - (CSS)'?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-lg-5">
                                    <div class="input-group mb-3 mb-lg-0">
                                        <span class="input-group-text"><i class="fa-solid fa-magnifying-glass"></i></span>
                                        <input type="text" class="form-control" placeholder="Search by Question" name="question" value="<?php echo $searchQuestion?>"/>
                                    </div>
                                </div>
                                <div class="col-lg-2"><button class="btn btn-primary w-100" type="submit">Search</button></div>
                            </div>
                        </form>
                    </div>
                </div>
                <?php if (isset($_GET['success']) && $_GET['success'] == 1) {?>
                    <div class="col-lg-12">
                        <div class="alert alert-success" role="alert">Quiz added successfully!</div>
                    </div>
                <?php }else if(isset($_GET['success']) && $_GET['success'] == 2) {?>
                    <div class="col-lg-12">
                        <div class="alert alert-success" role="alert">Quiz deleted successfully!</div>
                    </div>
                <?php }else if(isset($_GET['success']) && $_GET['success'] == 3) {?>
                    <div class="col-lg-12">
                        <div class="alert alert-success" role="alert">Quiz updated successfully!</div>
                    </div>
                <?php }else if(isset($_GET['success']) && $_GET['success'] == 0) {?>
                    <div class="col-lg-12">
                        <div class="alert alert-danger" role="alert">Quiz deleted failed!</div>
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
                                                <input type="hidden" name="lesson" value="<?php echo $lesson?>">
                                                <th>ID <button class="btn btn-primary ms-3" name="filter" value="id" <?php echo $filter === 'id' ? 'disabled' : '' ?>><i class="fa-solid fa-filter"></i></button></th>
                                                <th>Question <button class="btn btn-primary ms-3" name="filter" value="question" <?php echo $filter === 'question' ? 'disabled' : '' ?>><i class="fa-solid fa-filter"></i></button></th>
                                                <th>Lesson <button class="btn btn-primary ms-3" name="filter" value="lesson_id" <?php echo $filter === 'lesson_id' ? 'disabled' : '' ?>><i class="fa-solid fa-filter"></i></button></th>
                                                <th>Actions</th>
                                            </form>
                                        </thead>
                                        <tbody>
                                            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                                <tr>
                                                    <td><?php echo $row['id']; ?></td>
                                                    <td><?php echo $row['question']; ?></td>
                                                    <td><?php echo $row['lesson_title']; ?></td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <div class="action-button"><a href="quiz-view.php?id=<?php echo $row['id']; ?>" title="View"><i class="fa-solid fa-eye"></i></a></div>
                                                            <div class="action-button"><a href="quiz-edit.php?id=<?php echo $row['id']; ?>" title="Edit"><i class="fa-solid fa-pencil text-primary"></i></a></div>
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
                                                                Are you sure you want to delete <strong><?php echo $row['question']?></strong> ?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal" id="close_modal">Close</button>
                                                                <form action="_quiz-delete.php" method="post">
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
