<?php
session_start();
include 'koneksiDB.php';
//include 'template/header.php';
$harga = $_SESSION['jmlh_tagihan'];
//memuat pecahan ke mata uang indonesia
$uang = "Rp." . number_format($harga, 2, ',', '.');
$nohp = $_SESSION['no_tlp'];
$tanggal = date("d-m-Y H:i:s");
$angka = rand(10, 1000);
$virtulAc = $nohp . $angka;
$n = date('d-m-Y H:i:s', strtotime( $tanggal . " +1 days"));
?>
	<div class="container">
			<?php
if (!isset($_SESSION['jmlh_tagihan'])) {
	echo "<div>
	TIDAK ADA DATA PEMBELIAN BERLANGGANAN YANG TERPILIH !!
		</div>";
	?>
<?php } else {

	?>
	<!DOCTYPE html>
	<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.materialdesignicons.com/5.4.55/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/css/style1.css">
    <title>StudyYuk</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400&display=swap" rel="stylesheet">
	</head>
	<body>
	<!-- Just an image -->
		<nav class="bg-light" style="margin-top: 20px;">
		  <div class="container position-relative text-center">
		      	<img src="img/Logo.png" alt="" class="img-fluid te" width="180" height="60">
		  </div>
		</nav>
		
		<section class="payment" style="margin-top: 55px;">
            <div class="container">
                <div class="shadow p-3 mb-5 bg-white rounded" style="text-align: center;
  border: 1px solid white;">
			  		<h1><?php echo "IDR. " . number_format($harga,2,); ?></h1>
				</div>
				<div class="text-center" style="color: red; background: #fdedee; font-weight: bold;">
					Bayar Sebelum : <?php echo $n; ?>
				</div>
				 <div class="container">
				  <div class="row justify-content-md-center">
				    <div class="col-md-auto shadow p-3 mb-5 bg-white rounded" style="background: #f8f9fa!important; border: 1px solid white; margin-top: 50px;">
				      <div class="container">
					  <!-- Stack the columns on mobile by making one full-width and the other half-width -->
					  <div class="row">
					    <div class="col-md-6">
					    	<!-- //form -->
					    	<form method="POST" action="">
					    		<input type="hidden" name="id_kursus" value="<?php echo $_SESSION['id_kursus']; ?>" disabled>
					    		<input type="hidden" name="id_user" value="<?php echo $_SESSION['id_user']; ?>" disabled>
					    		<label>No Virtual Account #</label>
					    		<input class="form-control" type="text" name="virtual_account" value="<?php echo $virtulAc; ?>"readonly>
					    		<br>
					    		<label>Tanggal </label>
					    		<input class="form-control" type="text" name="tanggal" value="<?php echo $tanggal; ?>" readonly> 
					    		<br>
					    		<label>Nomimal Yang Akan Dibayarkan</label>
					    		<input class="form-control" type="text" name="jmlh_tagihan" value="Rp.<?php echo number_format($harga, 2, ',', '.'); ?>" readonly>
					    		<br>
					    		<label>Nama Virtual Account </label>
					    		<label>PT. STUDY YUK AKADEMI INDONESIA</label>
					    	
					    </div>
					    <div class="col-md-6 text-center">
					    	<img src="img/BRI.png" class="img-fluid" width="180" height="60">
					    </div>
					  </div>
				    </div>
				    <br>
				    <div class="text-center">
				    	 <input type="submit" value="BAYAR" class="btn btn-primary" style="" name="bayar">
				    </div>
				    </div>
				  </div>
				  </form>
				  <?php  
				  if (isset($_POST['bayar'])) {
				  	$id_kursus = $_SESSION['id_kursus'];
				  $id_user = $_SESSION['id_user'];
				  //$id_status = $_SESSION['id_status'];
				  //$status = $_SESSION['status'];
				  $virtual_account = $_POST['virtual_account'];
				  $tanggal = $_POST['tanggal'];
				  $jmlh_tagihan = $_POST['jmlh_tagihan'];

				  $query_insert = mysqli_query($koneksi, "INSERT INTO langganan (id_user, id_kursus, virtual_account, tanggal, jmlh_tagihan) VALUES ('$id_user', '$id_kursus', '$virtual_account', '$tanggal', '$jmlh_tagihan')");

				  $query_update = mysqli_query($koneksi, "INSERT INTO status (id_kursus, id_user, status) VALUES ('$id_kursus', '$id_user', '1')");

				  if ($query_insert) {
				  	//header("location:delLangganan.php")
				  } else {
				  	die("Query Error : " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
				  }
				  if ($query_update) {
				  		header("location:nota.php?id_user=". $id_user . "&id_kursus=" . $id_kursus);
				  	} else {
				  		die("Query Error : " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
				  	}
				}
				  ?>
<?php }?>

	</div>
<?php include 'template/footer.php'?>