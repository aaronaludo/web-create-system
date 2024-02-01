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
            <h2 class="text-primary fw-bold mb-5">CHANGE PASSWORD</h2>
            <button class="btn btn-primary"><a href="account.php" class="text-white text-decoration-none fw-bold">ACCOUNT DETAILS</a></button>
            <hr>
        </div>
        <form method="post" action="change_password_.php">
            <div class="mt-3">
                <input type="password" name="current_password" placeholder="CURRENT PASSWORD" class="form-control"/>
            </div>
            <div class="mt-3">
                <input type="password" name="new_password" placeholder="NEW PASSWORD" class="form-control"/>
            </div>
            <div class="mt-3">
                <input type="password" name="confirm_password" placeholder="CONFIRM PASSWORD" class="form-control"/>
            </div>
            <div class="mt-3">
                <button type="submit" class="btn btn-primary w-100">Submit</button>
            </div>
        </form>
    </div>
<?php include('layout/__footer.php');?>
</body>
</html>