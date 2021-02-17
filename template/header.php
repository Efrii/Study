<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="57x57" href="img/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="img/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="img/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="img/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="img/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="img/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="img/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="img/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="img/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="img/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="img/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="img/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.materialdesignicons.com/5.4.55/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/css/style1.css">
    <title>StudyYuk</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400&display=swap" rel="stylesheet">

</head>

<body>

    <section id="navbar">
        <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="img/Logo.png" width="200" height="70">
            </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ml-lg-auto">
              <a class="nav-item nav-link" href="./index.php">Home <span class="sr-only">(current)</span></a>
              <a class="nav-item nav-link" href="./menuKursus.php">Course</a>
              <a class="nav-item nav-link" href="./menuJob.php">Job</a>
              <a class="nav-item nav-link" href="./menuChallenge.php">Chalange</a>
              <a class="nav-item nav-link" href="./contact.php">Contact Us</a>
                 <?php
session_start();
if ($_SESSION['statusUser'] != "login") {
	?>
                <a class="btn btnlogin" href="user/login.php">Masuk</a>
                <a class="btn btnregister" href="register.php">Daftar</a>
              <?php } else {
	?>
              <div class="dropdown" style="margin-left: 10px;">
                <a href="drop" data-toggle="dropdown" class="nav-link" style="color: rgba(0,0,0,.5); margin-top: -9;">
                  <img class="efri" src="img/user/<?php echo $_SESSION['image']; ?>"> <?php echo $_SESSION['nama_depan']; ?> <?php echo $_SESSION['nama_belakang']; ?>
                </a>
                <ul id="drop" class="dropdown-menu" style="margin-top: 10px; margin-left: 15px;">
                  <li class="dropdown-item"><a href="user/" class="mdi mdi-face nav-item nav-link" href="#" > Profil Saya</a></li>
                  <li class="dropdown-item"><a href="user/logout.php" class="mdi mdi-logout nav-item nav-link" href="#" > Logout</a></li>
                </ul>
              </div>
              <?php }?>
            </form>
            </div>
          </div>
        </div>
      </nav>
    </section>