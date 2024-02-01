<?php 

session_start();

if(isset($_SESSION['user_id'])){
    header('Location: dashboard.php');
}

?>
<?php include('layout/_header.php');?>

    <div class="container">
        <div class="p-5 text-center rounded-3 mt-5">
            <h1 class="color-webcreate fw-bold hero-title position-relative display-3">Forgot Password</h1>
        </div>
    </div>

    <div class="bg-webcreate marketing">
        <div class="container">
          <div class="row featurette">
            <div class="col-12 d-flex flex-column align-items-center">
              <form class="row g-3">
                <div class="col-12">
                    <label for="username" class="form-label">Email:</label>
                    <input type="text" class="form-control" id="username" name="username">
                </div>
                <div><a href="login.php">Back to Login</a></div>
                <div class="col-12">
                  <button type="submit" class="btn btn-primary w-100">Submit</button>
                </div>
              </form>
              <div class="error-message">
    
            </div>
            <hr class="featurette-divider" />
          </div>
        </div>
    </div>

<?php include('layout/_footer.php');?>
