<?php
session_start();
if (isset($_GET['status'], $_GET['id_materi'], $_GET['id_kursus'], $_SESSION['id_user'], $_GET['id_status'])) {
	$id_materi = $_GET['id_materi'];
	$id_user = $_SESSION['id_user'];
	$id_kursus = $_GET['id_kursus'];
	$id_status = $_GET['id_status'];
	if ($_GET['status'] == "1") {
		$status = $_GET['status'];
	} else {
		die("ANDA BELUM BERLANGGANAN");
	}
} else {
	die("ANDA BELUM BERLANGGANAN");
}
include 'koneksiDB.php';
include 'template/header.php';
?>

<section class="detail_course">
            <div class="container">
                <div class="row">
                <div class="col-md-7 detail_course1">
                    <h2>Belajar HTML</h2>
                    <p><br><br></p>
                </div>
                </div>
            </div>

        <section class="konten">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3">
                            <h2>Daftar Modul</h2>
                            <div id="scroll-ku" class="vertical-menu">
                                <?php $q = "SELECT * FROM materi INNER JOIN kursus ON materi.id_kursus=kursus.id_kursus where kursus.id_kursus='$id_kursus'";
$d = mysqli_query($koneksi, $q);
while ($da = mysqli_fetch_array($d)) {
	?>
                                <a class="list-group-item list-group-item-action"  href="menuMateri.php?id_kursus=<?php echo $id_kursus ?>&id_user=<?php echo $id_user ?>&id_status=<?php echo $id_status ?>&status=<?php echo $status ?>&id_materi=<?php echo $da['id_materi']; ?>"><i class="mdi mdi-book-open"> </i> <?php echo $da['nama']; ?></a>
                                <?php }?>
                            </div>
                        </div>

                       <section style="margin-top: 44px;" class="konten-tabel col-md-9 p-lg-5 shadow-sm border rounded">
                           <div class="container tab-pane fade show" role="tabpanel">
                                                    <?php

$id_materi = $_GET['id_materi'];
$query = mysqli_query($koneksi, "SELECT * FROM materi INNER JOIN kursus ON materi.id_kursus=kursus.id_kursus where kursus.id_kursus='$id_kursus' AND materi.id_materi='$id_materi'");
while ($data = mysqli_fetch_array($query)) {
	?>
                               <h1><?php echo $data['nama'] ?></h1>
                               <p><?php echo $data['isi']; ?></p>
                               <?php }?>
                           </div>

                       </section>

                    </div>
              </div>
        </section>

<?php
include 'template/footer.php';
?>