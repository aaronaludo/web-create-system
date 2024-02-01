<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/style2.css" />
    <link rel="stylesheet" href="assets/css/carousell.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        /* .navbar {
            background-color: #333;
            overflow: hidden;
            padding: 10px;
        }

        .navbar h2 {
            color: #fff;
            margin: 0;
            float: left;
            margin-top: 10px;
            margin-left: 10px;
        }

        .navbar a {
            float: right;
            display: block;
            color: #fff;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        .navbar a:hover {
            background-color: #ddd;
            color: #333;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        } */

        h2 {
            color: #333;
        }

        .lesson-boxes {
            display: grid;
            grid-template-columns: repeat(1, 1fr);
            gap: 20px;
        }

        .lesson-box {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 10px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            text-align: justify;
        }

        .lesson-box h3 {
            margin-top: 0;
        }


        .lesson-boxer {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            margin: 20px;
            padding: 20px;
        }
        button{
            padding: 10px;
        }
        .active{
            background: darkblue !important;
        }
        .active-color{
            color: #f2f2f2;
            background: #333;
            padding: 5px;
            border-radius: 50%;
        }
    </style>
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
            <button class="btn btn-outline-primary"><a href="logout.php" class="text-decoration-none fw-bold">Logout</a></button>
          </div>
        </div>
      </div>
    </nav>