<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Code Editor</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/style2.css" />
    <link rel="stylesheet" href="assets/css/codeeditorr.css">
    <script src="https://kit.fontawesome.com/8de0cc1865.js" crossorigin="anonymous"></script>
    <script src="assets/js/codeeditor.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg shadow" id="navbar">
      <div class="container">
        <a class="navbar-brand text-primary" href="index.php">WEBCREATE</a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarTogglerDemo02"
          aria-controls="navbarTogglerDemo02"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-auto">
          </ul>
          <div class="d-flex">
            <button class="btn btn-primary me-2"><a href="dashboard.php" class="text-white text-decoration-none fw-bold">Home</a></button>
            <button class="btn btn-primary me-2"><a href="account.php" class="text-white text-decoration-none fw-bold">My Account</a></button>
            <button class="btn btn-primary me-2"><a href="progress.php" class="text-white text-decoration-none fw-bold">Progress</a></button>
            <button class="btn btn-outline-primary"><a href="logout" class="text-decoration-none fw-bold">Logout</a></button>
          </div>
        </div>
      </div>
    </nav>
    <div class="containerr" style="margin: 50px 0px 150px 0px">
        <div class="left">
            <label>
                <i class="fa-regular fa-file"></i> HTML </label>
            <textarea id="html-code" onkeyup="run()"></textarea>

            <label><i class="fa-brands fa-css3-alt"></i> CSS </label>
            <textarea id="css-code" onkeyup="run()"></textarea>
        </div>
        <div class="right">
            <label><i class= "class="fa-solid fa-code"></i>Output</label>
            <iframe id="output"></iframe>
        </div>
    </div>
<?php include('layout/__footer.php');?>
</body>
</html>  