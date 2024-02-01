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
                    <div><h2 class="title">Settings</h1></div>
                </div>
            </div>
        </div>
    </div>
<?php include('../layout/footer.php'); ?>
