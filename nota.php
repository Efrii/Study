<?php
session_start();
if (!isset($_SESSION['jmlh_tagihan'])) {
	echo "<div>
    TIDAK ADA DATA PEMBELIAN BERLANGGANAN YANG TERPILIH !!
        </div>";
	?> <?php } else {

	if (isset($_GET['id_user'], $_GET['id_kursus'])) {
		$id_user = $_GET['id_user'];
		$id_kursus = $_GET['id_kursus'];
	} else {
		die("ERROR. TIDAK ADA ID TERPILIH");
	}

	$id_user = $_SESSION['id_user'];
	include 'koneksiDB.php';
	?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.materialdesignicons.com/5.4.55/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/css/style1.css">
    <title>Nota | StudyYuk</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400&display=swap" rel="stylesheet">
</head>
<body>

<div class="main">
    <div class="container" style="margin-top: 20px;">
        <div class="content">
            <div class="row text-center">
                    <div class="col-sm">
                        <a target="_blank" href="https://lobianijs.com">
                            <img src="img/Logo.png" data-holder-rendered="true" />
                            </a>
                    </div>
                    <div class="col-sm">
                        <h2 class="name">
                            <a target="_blank" href="#">
                            STUDY YUK
                            </a>
                        </h2>
                        <?php
$query = mysqli_query($koneksi, "SELECT * FROM StudyYuk");
	while ($data = mysqli_fetch_array($query)) {
		?>
                        <div><?php echo $data['lokasi']; ?></div>
                        <div><?php echo $data['telfon']; ?></div>
                        <div><?php echo $data['email']; ?></div>
                    <?php }?>
                    </div>
                </div>
            </header>
            <div class="col text-center" style="margin-top: 30px;">
                 <?php
$ambil = "SELECT * FROM langganan INNER JOIN user ON user.id_user=langganan.id_user INNER JOIN kursus ON kursus.id_kursus=langganan.id_kursus WHERE user.id_user='$id_user' AND kursus.id_kursus='$id_kursus'";
	$data = mysqli_query($koneksi, $ambil);
	$nota = mysqli_fetch_array($data);
	?>
        <h2 >VA <?php echo $nota['virtual_account'] ?></h2>
            <h5 ><?php echo $nota['tanggal'] ?></h5>
            <br>
            <h3 ><?php echo $nota['nama_depan'] ?> <?php echo $nota['nama_belakang'] ?></h3>
            <h4 ><?php echo $nota['email'] ?></h4>
            <br>
            <h4 >Total Berlangganan      </h4>
            <h4 ><?php echo $nota['jmlh_tagihan'] ?></h4>
            <br>
            <h3 >Kursus Yang Di Ambil</h3>
            <h4 ><?php echo $nota['nama_kursus'] ?></h4>
            </div>
            <div class="text-center" style="margin-top: 30px;">
                <a class="btn btn-primary" href="delLangganan.php">SELESAI</a>
            </div>
        </div>
        </div>
    </div>
</div>
</body>
</html>
<?php }?>
