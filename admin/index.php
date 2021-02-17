<?php

session_start();
if ($_SESSION['status'] != "login") {
	header("location:login.php?pesan=belum_login");
}

include '../koneksiDB.php';
include 'template/headerIndex.php';

$nama = $_SESSION['username'];
$query = mysqli_query($koneksi, "SELECT * FROM admin WHERE username='$nama'");
$data = mysqli_fetch_array($query);
$_SESSION['nama'] = $data['nama'];
?>

          <div class="col-md-10 p-5 pt-2">
              <h3>
                <i class="fas fa-house-user mr-3"></i>Dashboard<hr>
              </h3>

              <div class="row mt-4" style="margin-bottom: 10px;">
                <div class="card ml-5">
                    <div class="card-header bg-dark text-white" style="width: 60rem;">
                      Caution
                    </div>
                    <div class="card-body">
                      <blockquote class="blockquote mb-0">
                        <p>Selamat Datang Admin <?php echo $_SESSION['nama']; ?></p>
                        <footer class="blockquote-footer">"It's a brew-tiful day to have a Starbucks drink." <cite title="Source Title">Source Title</cite></footer>
                      </blockquote>
                    </div>
                  </div>
              </div>
<?php

$query = mysqli_query($koneksi, "SELECT * FROM admin");
$jumlahAdmin = mysqli_num_rows($query);

?>
              <div class="row text-white">
                <div class="card shadow-lg p-3 mb-5 rounded bg-secondary   ml-5" style="width: 18rem; margin-bottom: 18px;">
                    <div class="card-body-icon">
                        <i class="mdi mdi-comment-account mr-3"></i>
                    </div>
                    <div class="card-body">
                      <h5 class="card-title">ADMIN</h5>
                      <div class="display-4"><?php echo $jumlahAdmin; ?></div>
                      <a href="#" class="text-white">Lihat Detail<i class="fas fa-angle-double-right ml-2"></i></a>
                    </div>
                  </div>

<?php

$query = mysqli_query($koneksi, "SELECT * FROM user");
$jumlahUser = mysqli_num_rows($query)

?>
                  <div class="card shadow-lg p-3 mb-5 rounded bg-secondary ml-5" style="width: 18rem;margin-bottom: 18px;">
                    <div class="card-body-icon">
                        <i class="fas fa-user mr-3"></i>
                    </div>
                    <div class="card-body">
                      <h5 class="card-title">USER</h5>
                      <div class="display-4"><?php echo $jumlahUser; ?></div>
                      <a href="data_kursus.php" class="text-white">Lihat Detail<i class="fas fa-angle-double-right ml-2"></i></a>
                    </div>
                  </div>

<?php

$query = mysqli_query($koneksi, "SELECT * FROM feedback");
$jumlahFeedback = mysqli_num_rows($query)

?>
                  <div class="card shadow-lg p-3 mb-5 rounded bg-secondary ml-5" style="width: 18rem;margin-bottom: 18px;">
                    <div class="card-body-icon">
                        <i class="mdi mdi-comment-account mr-3"></i>
                    </div>
                    <div class="card-body">
                      <h5 class="card-title">FEEDBACK</h5>
                      <div class="display-4"><?php echo $jumlahFeedback; ?></div>
                      <a href="data_kursus.php" class="text-white">Lihat Detail<i class="fas fa-angle-double-right ml-2"></i></a>
                    </div>
                  </div>
<?php

$query = mysqli_query($koneksi, "SELECT * FROM kursus");
$jumlahKursus = mysqli_num_rows($query)

?>
                  <div class="card shadow-lg p-3 mb-5 rounded bg-secondary ml-5" style="width: 18rem;margin-bottom: 18px;">
                    <div class="card-body-icon">
                        <i class="fas fa-book mr-3"></i>
                    </div>
                    <div class="card-body">
                      <h5 class="card-title">KURSUS</h5>
                      <div class="display-4"><?php echo $jumlahKursus; ?></div>
                      <a href="data_kursus.php" class="text-white">Lihat Detail<i class="fas fa-angle-double-right ml-2"></i></a>
                    </div>
                  </div>
<?php

$query = mysqli_query($koneksi, "SELECT * FROM job");
$jumlahjob = mysqli_num_rows($query)

?>
                  <div class="card shadow-lg p-3 mb-5 rounded bg-secondary ml-5" style="width: 18rem;margin-bottom: 18px;">
                    <div class="card-body-icon">
                        <i class="fas fa-laptop-house mr-3"></i>
                    </div>
                    <div class="card-body">
                      <h5 class="card-title">JOB</h5>
                      <div class="display-4"><?php echo $jumlahjob; ?></div>
                      <a href="data_kursus.php" class="text-white">Lihat Detail<i class="fas fa-angle-double-right ml-2"></i></a>
                    </div>
                  </div>
<?php

$query = mysqli_query($koneksi, "SELECT * FROM challenge");
$jumlahchallenge = mysqli_num_rows($query)

?>
                  <div class="card shadow-lg p-3 mb-5 rounded bg-secondary ml-5" style="width: 18rem;margin-bottom: 18px;">
                    <div class="card-body-icon">
                        <i class="fas fa-laptop-code mr-3"></i>
                    </div>
                    <div class="card-body">
                      <h5 class="card-title">CHALLENGE</h5>
                      <div class="display-4"><?php echo $jumlahchallenge; ?></div>
                      <a href="data_kursus.php" class="text-white">Lihat Detail<i class="fas fa-angle-double-right ml-2"></i></a>
                    </div>
                  </div>



          </div>

<?php include 'template/footer.php';?>