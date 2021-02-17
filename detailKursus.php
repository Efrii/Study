    <?php
session_start();
//Cek Apakah Click By Id Terambil atau terpilih
if (isset($_GET['id_kursus']/*/, $_SESSION['id_user'], $_GET['id_status'], $_GET['id_materi'], $_GET['status']/*/)) {
	$id_kursus = $_GET['id_kursus'];
	$id_user = $_SESSION['id_user'];
	//$id_status = $_GET['id_status'];
	// $id_materi = $_GET['id_materi'];
	// $status = $_GET['status'];
} else {
	die("Error. Tidak Ada Id Terpilih!");
}

include 'koneksiDB.php';
include 'template/header.php';

$query = mysqli_query($koneksi, "SELECT * FROM kursus Where id_kursus='$id_kursus'");
$data = mysqli_fetch_array($query);
// $query1 = mysqli_query($koneksi, "SELECT * FROM status WHERE id_status='$id_status' AND status='$status'");
// $row = mysqli_fetch_array($query1);
// $query2 = mysqli_query($koneksi, "SELECT * FROM materi WHERE id_materi='$id_materi'");
// $row1 = mysqli_fetch_array($query2);
?>
	<section class="detail_course" style="background-color:#253252;
    height: 400px;">
            <div class="container">
                <div class="row">
                <div class="col-md-7 detail_course1" style="margin-top: 200px;
    color: white;">
                    <h2><?php echo $data['nama_kursus']; ?></h2>
                    <p><?php echo $data['deskripsi']; ?></p>
                </div>


                <div class="col-md-4 ml-lg-auto">
                    <div class="card shadow p-3 mb-5 bg-white rounded" style="margin-top: 200px;
    background-color: white;
    max-width:300px;
    max-height: 350px;
    margin-left: auto;">
                        <img style="height: 150px; width: 270px;" class="img-fluid" src="img/kursus/<?php echo $data['cover']; ?>">

                        <div class="card-body text-center">
                            <div class="card-title"><h4>Belajar <?php echo $data['nama_kursus']; ?></h4></div>
                        </div>

                        <div class="container-fluid">


                        	<?php
if ($_SESSION['statusUser'] != "login") {
	?>
	<div class="text-center">
                      <button class="btn btn-danger btn-lg btn-block shadow" disabled="true"> Anda Harus Login</button>
                    </div>

									<?php } else {
	?>
                                        <?php
$querycek = mysqli_query($koneksi, "SELECT * from materi INNER JOIN kursus ON materi.id_kursus=kursus.id_kursus INNER JOIN status ON status.id_kursus=kursus.id_kursus INNER JOIN user ON user.id_user=status.id_user WHERE status.status='1' AND user.id_user='$id_user' AND kursus.id_kursus='$id_kursus'");
	$cek = mysqli_num_rows($querycek);
	?>
                                    <?php
if ($cek > 0) {
		//kondisi jika user sudah melakukan pembelian maka user tidak bisa membeli lagi
		?>
<?php } else {
		?>
        <div class="text-center">
        <a href="menuLangganan.php?id_kursus=<?php echo $data['id_kursus']; ?>&id_user=<?php echo $id_user; ?>" style=" color: white; margin-bottom: 5px; background-color: #10BFC2;  display: flex;justify-content: center; "class="btn" >Daftar</a>

<?php }?>
                                <a href="menuMateri.php?id_kursus=<?php echo $data['id_kursus']; ?>&id_materi=<?php echo $data['id_materi']; ?>&id_user=<?php echo $_SESSION['id_user']; ?>&id_status=<?php $queryy = "SELECT * from materi INNER JOIN kursus ON materi.id_kursus=kursus.id_kursus INNER JOIN status ON status.id_kursus=kursus.id_kursus INNER JOIN user ON user.id_user=status.id_user WHERE user.id_user='$id_user' AND kursus.id_kursus='$id_kursus'";
	$gg = mysqli_query($koneksi, $queryy);
	$j = mysqli_fetch_array($gg);
	?><?php echo $j['id_status']; ?>&status=<?php echo $j['status']; ?>" style=" color: white;background-color: #10BFC2;  display: flex;justify-content: center; "class="btn" >Belajar</a>
                                </div>
							        <?php }?>


                        </div>
                    </div>

                </div>

                </div>
            </div>

        </section>

        <section class="deskripsi">
            <div class="container">
                <div class="row">
                    <div class="col-md-8" style="margin-top: 10px;">
                    <nav>
                        <div class="nav nav-tabs">
                            <a class="nav-item nav-link active" data-toggle="tab" href="#nav-des" role="tab">Deskripsi</a>
                            <a class="nav-item nav-link" data-toggle="tab" href="#nav-sil" role="tab">Silabus</a>
                            <a class="nav-item nav-link" data-toggle="tab" href="#nav-ul" role="tab">Ulasan</a>
                        </div>
                    </nav>


                    <div class="tab-content kursus" style="margin-top: 50px;">
                        <div class="tab-pane fade show active" style="color: black !important;" id="nav-des" role="tabpanel">
                            <h4>Home</h4>
                            <p><?php echo $data['deskripsi']; ?></p>
                        </div>

                        <div class="tab-pane fade" id="nav-sil" role="tabpanel">
                            <h4>Daftar Modul</h4>

                    <table class="table table-responsive-sm table-hover">
                        <thead>
                        <tr>
                            <th scope="col">Modul</th>
                            <th scope="col">Status</th>
                        </tr>
                        </thead>
                        <?php
$no = 1;
$query_ = "SELECT * FROM materi INNER JOIN kursus ON materi.id_kursus=kursus.id_kursus WHERE kursus.id_kursus='$id_kursus'";
$dataa = mysqli_query($koneksi, $query_);
while ($s = mysqli_fetch_assoc($dataa)) {
	?>
                        <tbody>
                            <tr>
                                <th scope="row"><a class="disabled">Modul <?php echo $no++ . " : " . $s['nama']; ?></a></th>
                                <th style="color: #007bff;">
                                    Berbayar
                                </th>

                            </tr>
                        </tbody>
                        <?php }?>
                    </table>
                            <p></p>

                        </div>

                        <div class="tab-pane fade" id="nav-ul" role="tabpanel">
                            <h4>Kontak</h4>
                            <p>Email : belajarBareng@studyyuk.co.id</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




<?php

include 'template/footer.php';

?>