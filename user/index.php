<?php
session_start();
if ($_SESSION['statusUser'] != "login") {
	header("location:login.php?pesan=belum_login");
}

include '../koneksiDB.php';
include 'template/header.php';

$email = $_SESSION['email'];
$query = "SELECT * FROM user WHERE email = '$email'";
$result = mysqli_query($koneksi, $query);
?>
<?php
if (mysqli_num_rows($result) > 0) {
	$data_ = mysqli_fetch_array($result);
	$_SESSION['id_user'] = $data_['id_user'];
	$_SESSION['nama_depan'] = $data_['nama_depan'];
	$_SESSION['nama_belakang'] = $data_['nama_belakang'];
	$_SESSION['email'] = $data_['email'];
	$_SESSION['password'] = $data_['password'];
	$_SESSION['alamat'] = $data_['alamat'];
	$_SESSION['tgl_lahir'] = $data_['tgl_lahir'];
	$_SESSION['tmp_lahir'] = $data_['tmp_lahir'];
	$_SESSION['no_tlp'] = $data_['no_tlp'];
	$_SESSION['sekolah'] = $data_['sekolah'];
	$_SESSION['jns_klamin'] = $data_['jns_klamin'];
	$_SESSION['image'] = $data_['image'];
}
?>

	<section class="detail_course" style="background-color:#253252;
    height: 400px;">
            <div class="container">
                <div class="row">
                <div class="col-md-4">
                    <div class="card1 shadow p-3 mb-5 bg-white rounded" style="margin-top: 200px;
    background-color: white;
    max-height: 350px;
    margin-left: auto;">
                        <img style="height: 150px; width: 100%;" class="img-fluid" src="../img/user/<?php echo $_SESSION['image']; ?>">

                        <div class="card-body">
                            <div class="text-center card-title"><h4><?php echo $_SESSION['nama_depan']; ?> <?php echo $_SESSION['nama_belakang']; ?></h4></div>
                            <div class="text-center">
                                <span class="text-icon">
                                    <i class="mdi mdi-map-marker"></i><?php echo $_SESSION['alamat']; ?>
                                </span>
                            <div clas="text-center">
                                <span class="text-icon">
                                           <?php
$id_user = $_SESSION['id_user'];
$query = mysqli_query($koneksi, "SELECT SUM(challenge.hadiah) FROM ikutChallenge INNER JOIN challenge ON ikutChallenge.id_challenge=challenge.id_challenge INNER JOIN user ON ikutChallenge.id_user=user.id_user WHERE user.id_user='$id_user' ORDER BY challenge.hadiah");
while ($jumlah = mysqli_fetch_array($query)) {
	?>
                                    <i class="mdi mdi-star"> <?php echo $jumlah['SUM(challenge.hadiah)']; ?> point</i>
                                <?php }?>
                                </span>
                            </div>
                        </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row text-center text-dark row-eq-height">
                <div class="col-md-4 mt-2">
                    <div class="card shadow-lg p-3 mb-5 bg-white rounded">
                        <div class="card-body">
                            Belajar
                            <?php
$id_user = $_SESSION['id_user'];
$query = mysqli_query($koneksi, "SELECT * FROM langganan INNER JOIN user ON langganan.id_user=user.id_user WHERE user.id_user='$id_user'");
?>
                            <h1><?php echo mysqli_num_rows($query); ?><br><small>Kelas Akademi</small></h1>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mt-2">
                    <div class="card shadow-lg p-3 mb-5 bg-white rounded">
                        <div class="card-body card-challenge">
                            Mengikuti
                            <?php
$id_user = $_SESSION['id_user'];
$query = mysqli_query($koneksi, "SELECT * FROM ikutChallenge INNER JOIN challenge ON ikutChallenge.id_challenge=challenge.id_challenge INNER JOIN user ON ikutChallenge.id_user=user.id_user WHERE user.id_user='$id_user'");
?>
                            <div class="spacer-24-px d-none d-md-block d-lg-none"></div>
                            <h1><?php echo mysqli_num_rows($query); ?> <br><small>Challenge</small></h1>
                            <div class="spacer-24-px d-none d-md-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mt-2 text-dark">
                    <div class="card shadow-lg p-3 mb-5 bg-white rounded">
                        <div class="card-body card-event">
                            Melamar
                            <?php
$id_user = $_SESSION['id_user'];
$queryjob = mysqli_query($koneksi, "SELECT * FROM lamarJob INNER JOIN job ON lamarJob.id_job=job.id_job INNER JOIN user ON user.id_user=lamarJob.id_user WHERE user.id_user='$id_user'");
?>
                            <div class="spacer-24-px d-none d-md-block d-lg-none"></div>
                            <h1><?php echo mysqli_num_rows($queryjob); ?><br><small>Job</small></h1>
                            <div class="spacer-24-px d-none d-md-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="card card-kelas shadow-lg p-3 mb-5 bg-white rounded">
                <div class="card-header">
                  Kelas Yang Dipelajari
                </div>
                <div class="card-body">

                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Kelas</th>
                            <th scope="col">Progres</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                          	<?php
$query_ = mysqli_query($koneksi, "SELECT DISTINCT(kursus.nama_kursus) FROM kursus INNER JOIN langganan ON kursus.id_kursus=langganan.id_kursus INNER JOIN user ON user.id_user=langganan.id_user WHERE user.id_user='$id_user'");
while ($data = mysqli_fetch_assoc($query_)) {
	?>
                            <td><?php echo $data['nama_kursus']; ?></td>
                            <td>
                                <div class="progress mt-3" style="height: 2px;">
                                <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                              	</div>
                          	</td>
                          </tr>
                      <?php }?>
                        </tbody>
                      </table>

                </div>
              </div>
        </div>
    </section>


<?php include 'template/footer.php';?>