<?php 

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

?>
<?php include('layout/__header.php');?>
    <div class="container my-5">
        <div>
            <h2 class="text-primary fw-bold mb-5">ACCOUNT EDIT</h2>
            <button class="btn btn-primary"><a href="account.php" class="text-white text-decoration-none fw-bold">ACCOUNT DETAILS</a></button>

            <hr>
        </div>
        <form method="post" action="account_edit_.php" enctype="multipart/form-data">
            <div class="mb-3">
                <h3 class="fw-bold">Profile Picture:</h3>
                <div>
                    <img src="assets/images/<?php echo $_SESSION['image']?>" width="200"/>
                </div>  
                <div>
                    <input type="file" name="fileToUpload" id="fileToUpload" class="form-control mt-3">
                </div>
            </div>
            <div class="mb-3">
                <h3 class="d-inline fw-bold">Name:</h3>
                <span>
                    <input type="text" name="username" value="<?php echo $_SESSION['username']?>" class="form-control mt-3"/>
                </span>
            </div>
            <div class="mb-3">
                <h3 class="d-inline fw-bold">Email:</h3>
                <span>
                    <input type="text" name="email" value="<?php echo $_SESSION['email']?>" class="form-control mt-3"/>
                </span>
            </div>
            <div class="mb-3">
                <h3 class="d-inline fw-bold">Place of Birth:</h3>
                <span>
                    <input type="text" name="place_of_birth" value="<?php echo $_SESSION['place_of_birth']?>" class="form-control mt-3"/>
                </span>
            </div>
            <div class="mb-3">
                <h3 class="d-inline fw-bold">School:</h3>
                <span>
                    <input type="text" name="school" value="<?php echo $_SESSION['school']?>" class="form-control mt-3"/>
                </span>
            </div>
            <div class="mb-3">
                <h3 class="d-inline fw-bold">Contact Info:</h3>
                <span>
                    <input type="text" name="contact_info" value="<?php echo $_SESSION['contact_info']?>" class="form-control mt-3"/>
                </span>
            </div>
            <div class="mt-3">
                <button class="btn btn-primary w-100">Submit</button>
            </div>
        </form>
    </div>
<?php include('layout/__footer.php');?>
</body>
</html>