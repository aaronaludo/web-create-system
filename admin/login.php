<?php
session_start();
require "../connect.php";

if(isset($_SESSION['admin_id'])){
    header("Location: dashboard.php");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['admin_id'] = $user['id'];
            $_SESSION['admin_username'] = $user['username'];
            $_SESSION['admin_email'] = $user['email'];
            header('Location: dashboard.php');
            exit();
        }
    }
    
    $_SESSION['message'] = "Invalid login credentials. Please try again.";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <link rel="stylesheet" type="text/css" href="../assets/css/stylee.css" />
    <link rel="stylesheet" type="text/css" href="../assets/css/responsive.css" />
    <title>Login</title>
</head>
<body>
    <div id="wrapper">
        <header id="header" class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid p-0">
                <div id="header-logo">
                    <div class="d-flex justify-content-center align-items-center h-100 w-100">
                        <h6 class="text-primary fw-bold">WEB CREATE SYSTEM</h6>
                    </div>
                </div>
            </div>
        </header>
        <div id="content" class="login-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 d-flex justify-content-center">
                        <div class="col-lg-5 col-sm-10 col-12 col-md-8 mt-5">
                            <div id="login-container">
                                <?php
                                    if (isset($_SESSION['message'])) {
                                ?>
                                <div class="alert alert-danger" role="alert">The details you’ve entered is incorrect.</div>
                                <?php 
                                    unset($_SESSION['message']);
                                    }
                                ?>
                                <h2>Admin Login</h2>
                                <form method="post">
                                    <div class="input-group mb-3 mt-4">
                                        <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                                        <input type="text" class="form-control" placeholder="Username" name="username" />
                                    </div>
                                    <div class="input-group mb-3 mt-4">
                                        <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                                        <input type="password" class="form-control" placeholder="Password" name="password" />
                                    </div>
                                    <button type="submit" class="btn btn-primary w-100">Login</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer style="margin-left: 0">
            Copyright © 2023 All Rights Reserved
        </footer>
    </div>
    <script type="text/javascript" src="../assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
