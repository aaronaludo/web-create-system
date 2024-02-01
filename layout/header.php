<?php
session_start();

$username = $_SESSION['admin_username'];
$email = $_SESSION['admin_email'];

if(!isset($_SESSION['admin_id'])){
    header("Location: login.php");
}

function isPageActive($page)
{
    $currentUrl = $_SERVER['REQUEST_URI'];
    return strpos($currentUrl, $page) !== false ? 'active' : '';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <link rel="stylesheet" type="text/css" href="../assets/css/stylee.css" />
    <link rel="stylesheet" type="text/css" href="../assets/css/responsive.css" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>   
    <title>Dashboard</title>
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
                <a href="#" id="button-menu"><i class="fa-solid fa-bars"></i></a>
                <a href="#" id="button-menu-close"><i class="fa-solid fa-xmark"></i></a>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="../assets/images/profile-45x45.png" alt="User" title="User" class="round" /><?php echo $username; ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="edit-profile.php">Edit Profile</a></li>
                            <li><a class="dropdown-item" href="change-password.php">Change Password</a></li>
                            <form method="post" action="_logout.php">
                                <li><button class="dropdown-item" type="submit">Logout</button></li>
                            </form>
                        </ul>
                    </li>
                </ul>
            </div>
        </header>
        <nav id="column-left">
            <ul id="menu">
                <li><a href="dashboard.php" class="<?php echo isPageActive('dashboard.php'); ?>"><i class="fa-solid fa-gauge"></i> Dashboard</a></li>
                <li><a href="students.php" class="<?php echo isPageActive('students.php'); ?>"><i class="fa-solid fa-users"></i> Students</a></li>
                <li><a href="lessons.php" class="<?php echo isPageActive('lessons.php'); ?>"><i class="fa-solid fa-person-chalkboard"></i> Lessons</a></li>
                <li><a href="quizzes.php" class="<?php echo isPageActive('quizzes.php'); ?>"><i class="fa-solid fa-pencil"></i> Quizzes</a></li>
                <li><a href="exams.php" class="<?php echo isPageActive('exams.php'); ?>"><i class="fa-solid fa-pen-to-square"></i> Exams</a></li>
                <li><a href="units.php" class="<?php echo isPageActive('units.php'); ?>"><i class="fa-solid fa-pen-to-square"></i> Units</a></li>
                <li><a href="settings.php" class="<?php echo isPageActive('settings.php'); ?>"><i class="fa-solid fa-gear"></i> Settings</a></li>
            </ul>
        </nav>