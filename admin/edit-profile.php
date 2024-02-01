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
                        <div><h2 class="title">Edit Profile</h1></div>
                    </div>
                    <div class="col-lg-12">
                        <div class="box">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form action="_edit-profile.php" method="post">
                                        <?php if (isset($_GET['success']) && $_GET['success'] == 1) {?>
                                            <div class="col-lg-12">
                                                <div class="alert alert-success" role="alert">Edit profile successfully!</div>
                                            </div>
                                        <?php }else if(isset($_GET['success']) && $_GET['success'] == 0) {?>
                                            <div class="col-lg-12">
                                                <div class="alert alert-success" role="alert">Edit Profile failed!</div>
                                            </div>
                                        <?php }?>
                                        <div class="mb-3 row">
                                            <label for="username" class="col-sm-12 col-lg-2 col-form-label">Username: <span class="required">*</span></label>
                                            <div class="col-lg-10 col-sm-12 d-flex align-items-center">
                                                <input type="text" class="form-control" id="username" name="username" value="<?php echo $username; ?>"/>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="email" class="col-sm-12 col-lg-2 col-form-label">Email: <span class="required">*</span></label>
                                            <div class="col-lg-10 col-sm-12 d-flex align-items-center">
                                                <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>"/>
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