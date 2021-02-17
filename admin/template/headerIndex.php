<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.materialdesignicons.com/5.4.55/css/materialdesignicons.min.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/admin.css">
    <link rel="stylesheet" href="./fontawesome-free/css/all.min.css">
    <title>Dashboard | Admin</title>
  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <a href="../">
          <img src="../img/Logo.png" style="height: 60px;">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

          <form class="form-inline my-2 my-lg-0 ml-auto">
            <h5 style="color: #fff; margin-top: 5px;">Admin || <?php session_start();
echo $_SESSION['nama'];?> || </h5>
          </form>
          <a style="margin-left: 10px;" class="btn btn-danger" href="./logout.php">Keluar</a>
        </div>
      </nav>

      <div class="row no-gutters mt-5">
          <div class="col-md-2 bg-dark mt-2 pr-3 pt-4 dash">
            <ul class="nav flex-column ml-3 mb-5">
                <li class="nav-item">
                  <a class="nav-link active text-white" href="./index.php"><i class="fas fa-home mr-3"></i>Dashboard</a><hr class="bg-secondary">
                </li>
                <li class="nav-item">
                  <a class="nav-link text-white" href="./pages/data_kursus.php"><i class="fas fa-book mr-3"></i>Data Kursus</a><hr class="bg-secondary">
                </li>
                <li class="nav-item">
                  <a class="nav-link text-white" href="./pages/add_materi.php"><i class="mdi mdi-book-open mr-3"></i>Data Materi</a><hr class="bg-secondary">
                </li>
                <li class="nav-item">
                  <a class="nav-link text-white" href="./pages/dataJob.php"><i class="fas fa-laptop-house mr-3"></i>Data Job</a><hr class="bg-secondary">
                </li>
                <li class="nav-item">
                  <a class="nav-link text-white" href="./pages/dataChalenge.php"><i class="fas fa-laptop-code mr-3"></i>Data Challenge</a><hr class="bg-secondary">
                </li>
                <li class="nav-item">
                  <a class="nav-link text-white" href="./pages/dataUser.php"><i class="fas fa-user-circle mr-3"></i>Data User</a><hr class="bg-secondary">
                </li>
                <li class="nav-item">
                  <a class="nav-link text-white" href="./pages/dataAdmin.php"><i class="fas fa-user-cog mr-3"></i>Data Admin</a><hr class="bg-secondary">
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="./pages/dataLangganan.php"><i class="mdi mdi-shopping mr-3"></i>Langganan</a><hr class="bg-secondary">
                  </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="./pages/status.php"><i class="mdi mdi-briefcase-check mr-3"></i>Status</a><hr class="bg-secondary">
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-white" href="../pages/dataPelamar.php"><i class="mdi mdi-briefcase-check mr-3"></i>Data Pelamar</a><hr class="bg-secondary">
                  </li>
                <li class="nav-item">
                  <a class="nav-link text-white" href="./pages/dataFeedback.php"><i class="mdi mdi-comment-account mr-3"></i>Feedback</a>
                </li>
              </ul>
          </div>
