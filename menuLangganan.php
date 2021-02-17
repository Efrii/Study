<?php
session_start();
//Cek Apakah Click By Id Terambil atau terpilih
if (isset($_GET['id_kursus']/*/, $_GET['id_status']/*/)) {
	$id_kursus = $_GET['id_kursus'];
	//$id_status = $_GET['id_status'];
	// if ($_GET['status'] == "1") {
	// 	die("ANDA SUDAH BERLANGGANAN");
	// } else {
	// 	$status = $_GET['status'];
	// }
} else {
	die("Error. Tidak Ada Id Terpilih!");
}

include 'koneksiDB.php';
include 'template/header.php';

$query = mysqli_query($koneksi, "SELECT * FROM kursus WHERE id_kursus='$id_kursus'");
$data = mysqli_fetch_assoc($query);
$harga = $data['harga'];
$uang = "Rp." . number_format($harga, 2, ',', '.');
?>

	   <section class="des-langganan">
            <div class="container" style="margin-top: 6pc;">
               <div class="row">
                   <div class="col-md-6 des">
                       <h1>Pilih Paket Anda<br>
                        dan Daftar Sekarang!</h1>
                       <p>Pilih paket langganan sebagai investasi
                        belajar yang sesuai dengan kebutuhan Anda.</p>
                   </div>
               </div>
            </div>
        </section>



    <section class="langganan">
        <div class="container">
            <div class="card2 shadow">
                <form action="#" method="post">
                <div class="card-header top">
                	<h3 class="card-title">Paket Langganan Belajar</h3>
                </div>
                <div class="card-body">
                	<label>Nama :</label>
	             <input type="hidden" name="id_kursus" value="<?php echo $id_kursus ?>" disabled >
					<input type="hidden" name="id_user" value="<?php echo $_SESSION['id_user']; ?>" disabled >
					<input class="form-control" type="text" name="nama_plg" value="<?php echo $_SESSION['nama_depan']; ?> <?php echo $_SESSION['nama_belakang']; ?>" disabled/>
                </div>
                <div class="card-body" style="margin-top: -30px;">
					<label for="name">Email :</label>
					<input class="form-control" type="text" name="email_plg" value="<?php echo $_SESSION['email']; ?>" disabled/>
				</div>
				<div class="card-body" style="margin-top: -30px;">
					<label for="name">No Hp :</label>
					<input class="form-control" type="text" name="no_plg" value="<?php echo $_SESSION['no_tlp']; ?>"disabled/>
				</div>
				<div class="card-body" style="margin-top: -30px;">
					<label for="name">Kursus :</label>
					<input class="form-control" type="input" name="ambil_kursus" value="<?php echo $data['nama_kursus']; ?>" disabled/>
				</div>
                <div class="card-body kartu">
                	<div class="form-group paket1">
                    <select class="form-control" name="jmlh_tagihan">
                      <option value="<?php echo $data['harga']; ?>">langganan 30 Hari - <?php echo "Rp." . number_format($data['harga'], 2, ',', '.'); ?></option>
                      <option value="<?php echo $data['harga'] * 3; ?>">langganan 3 Bulan - <?php echo "Rp." . number_format($data['harga'] * 3, 2, ',', '.'); ?></option>
                      <option value="<?php echo $data['harga'] * 6; ?>">langganan 6 Bulan - <?php echo "Rp." . number_format($data['harga'] * 6, 2, ',', '.'); ?></option>
                      <option value="<?php echo $data['harga'] * 12; ?>">langganan 1 Tahun - <?php echo "Rp." . number_format($data['harga'] * 12, 2, ',', '.'); ?></option>
                    </select>
                  </div>

                <p>1. Harap teliti dalam proses berlangganan. <br>
                    2. Materi update setiap tahunnya.<br>
                    3. Pembayaran hanya melalui laman ini.<br>

                </div>
                <div class="card-footer text-center">
                    <input type="submit" name="inputPlg" class="btn btn-primary" value="Langganan">
                </div>
            </div>
            </form>
        </div>
    </section>


	<?php
if (isset($_POST['inputPlg'])) {
	//$id_user = $_SESSION['id_user'];
	$id_kursus = $_GET['id_kursus'];
	//$id_status = $_POST['id_status'];
	$status = $_GET['status'];
	$nama_plg = $_POST['nama_plg'];
	//$email_plg = $_SESSION['email'];
	//$no_plg = $_SESSION['no_tlp'];
	$ambil_kursus = $_POST['ambil_kursus'];
	$jmlh_tagihan = $_POST['jmlh_tagihan'];

	$_SESSION['id_kursus'] = $id_kursus;
	//$_SESSION['id_status'] = $id_status;
	//$_SESSION['status'] = $status;
	$_SESSION['nama_plg'] = $nama_plg;
	$_SESSION['ambil_kursus'] = $ambil_kursus;
	$_SESSION['jmlh_tagihan'] = $jmlh_tagihan;

	echo "<script>window.location='detailLangganan.php'</script>";

	//header('Location: detailLangganan.php?id_kursus=<?php echo $data['id_kursus']');
}
?>
	 <?php include 'template/footer.php';?>