<?php  
session_start();
include 'koneksi.php';

$point = $_SESSION['nama'];

$query = mysqli_query($koneksi, "SELECT * FROM data WHERE nama='$point'");
$data = mysqli_fetch_array($query);

$alamat = $data['alamat']; 
$alamat_univ = $data['alamat_univ'];
$judul = $data['judul'];
// memecah string input berdasarkan karakter '\r\n\r\n'
$pecah = explode("\r\n\r\n", $alamat);
$alamat_u = explode("\r\n\r\n", $alamat_univ);
$judul = explode("\r\n\r\n", $judul);
// string kosong inisialisasi
$text = "";
$text2 = "";
$text3 = "";
 
// untuk setiap substring hasil pecahan, sisipkan <p> di awal dan </p> di akhir
// lalu menggabungnya menjadi satu string utuh $text
for ($i=0; $i<=count($pecah)-1; $i++)
{
   $part = str_replace($pecah[$i], "<p>".$pecah[$i]."</p>", $pecah[$i]);
   $text .= $part;
}

for ($qi=0; $qi<=count($alamat_u)-1; $qi++)
{
   $part1 = str_replace($alamat_u[$qi], "<p>".$alamat_u[$qi]."</p>", $alamat_u[$qi]);
   $text2 .= $part1;
}

for ($qi1=0; $qi1<=count($judul)-1; $qi1++)
{
   $part2 = str_replace($judul[$qi1], "<p>".$judul[$qi1]."</p>", $judul[$qi1]);
   $text3 .= $part2;
}

?>

<!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

<style type="text/css">
<!--
span.cls_002{font-family:Times,serif;font-size:12.1px;color:rgb(0,0,0);font-weight:bold;font-style:normal;text-decoration: none}
div.cls_002{font-family:Times,serif;font-size:12.1px;color:rgb(0,0,0);font-weight:bold;font-style:normal;text-decoration: none}
span.cls_003{font-family:Times,serif;font-size:12.1px;color:rgb(0,0,0);font-weight:normal;font-style:normal;text-decoration: none}
div.cls_003{font-family:Times,serif;font-size:12.1px;color:rgb(0,0,0);font-weight:normal;font-style:normal;text-decoration: none}
@media print {
  .btn{
    display: none;
  }
}

.btn {
  border-radius: 50%;
  bottom: 0px;
    left: 0px; 
    width: 70px;
    height: 70px;
    position: fixed;
}
-->
</style>
<script type="text/javascript" src="6a6c7ed8-6c64-11eb-8b25-0cc47a792c0a_id_6a6c7ed8-6c64-11eb-8b25-0cc47a792c0a_files/wz_jsgraphics.js"></script>


<div style="position:absolute;left:50%;margin-left:-297px;top:0px;width:595px;height:841px;border-style:outset;overflow:hidden">
<div style="position:absolute;left:0px;top:0px">
<img src="6a6c7ed8-6c64-11eb-8b25-0cc47a792c0a_id_6a6c7ed8-6c64-11eb-8b25-0cc47a792c0a_files/background1.jpg" width="595" height="841"></div>
<div style="position:absolute;left:199.61px;top:54.88px" class="cls_002"><span class="cls_002">PERMOHONAN IZIN PENELITIAN</span></div>
<div style="position:absolute;left:56.64px;top:96.30px" class="cls_003"><span class="cls_003">Nama Pemohon</span></div>
<div style="position:absolute;left:248.09px;top:96.30px" class="cls_003"><span class="cls_003">:</span></div>
<div style="position:absolute;left:262.25px;top:96.30px" class="cls_003"><span class="cls_003"><?php echo $_SESSION['nama']; ?></span></div>
<div style="position:absolute;left:56.64px;top:123.90px" class="cls_003"><span class="cls_003">Alamat Pemohon</span></div>
<div style="position:absolute;left:248.09px;top:123.90px" class="cls_003"><span class="cls_003">:</span></div>
<div style="position:absolute;left:262.25px;top:112px" class="cls_003"><span class="cls_003"><?php echo $text ?></span></div>
<div style="position:absolute;left:262.25px;top:137.70px" class="cls_003"><span class="cls_003"></span></div>
<div style="position:absolute;left:262.25px;top:151.50px" class="cls_003"><span class="cls_003"></span></div>


<div style="position:absolute;left:248.09px;top:165.30px" class="cls_003"><span class="cls_003">HP</span></div>
<div style="position:absolute;left:308.69px;top:165.30px" class="cls_003"><span class="cls_003">:</span></div>
<div style="position:absolute;left:344.71px;top:165.30px" class="cls_003"><span class="cls_003"><?php echo $data['no_tlp']; ?></span></div>
<div style="position:absolute;left:248.09px;top:179.10px" class="cls_003"><span class="cls_003">Email</span></div>
<div style="position:absolute;left:308.69px;top:179.10px" class="cls_003"><span class="cls_003">:</span></div>
<div style="position:absolute;left:344.71px;top:179.10px" class="cls_003"><span class="cls_003"><?php echo $data['email']; ?></span></div>
<div style="position:absolute;left:56.64px;top:206.70px" class="cls_003"><span class="cls_003">Lembaga/Universitas</span></div>
<div style="position:absolute;left:248.09px;top:206.70px" class="cls_003"><span class="cls_003">:</span></div>
<div style="position:absolute;left:262.25px;top:206.70px" class="cls_003"><span class="cls_003"><?php echo $data['univ']; ?></span></div>
<div style="position:absolute;left:56.64px;top:234.30px" class="cls_003"><span class="cls_003">Fakultas/Jurusan (jika mahasiswa)</span></div>
<div style="position:absolute;left:248.09px;top:234.30px" class="cls_003"><span class="cls_003">:</span></div>
<div style="position:absolute;left:262.25px;top:234.30px" class="cls_003"><span class="cls_003"><?php echo $data['jurusan']; ?></span></div>
<div style="position:absolute;left:56.64px;top:261.93px" class="cls_003"><span class="cls_003">Alamat Lembaga/Universitas</span></div>
<div style="position:absolute;left:248.09px;top:261.93px" class="cls_003"><span class="cls_003">:</span></div>
<div style="position:absolute;left:262.25px;top:250px" class="cls_003"><span class="cls_003"><?php echo $text2 ?></span></div>
<div style="position:absolute;left:262.25px;top:275.73px" class="cls_003"><span class="cls_003"></span></div>
<div style="position:absolute;left:262.25px;top:289.53px" class="cls_003"><span class="cls_003"></span></div>
<div style="position:absolute;left:248.09px;top:303.33px" class="cls_003"><span class="cls_003">Telepon</span></div>
<div style="position:absolute;left:308.69px;top:303.33px" class="cls_003"><span class="cls_003">:</span></div>
<div style="position:absolute;left:344.71px;top:303.33px" class="cls_003"><span class="cls_003"><?php echo $data['tlp_univ']; ?></span></div>
<div style="position:absolute;left:248.09px;top:317.13px" class="cls_003"><span class="cls_003">Email</span></div>
<div style="position:absolute;left:308.69px;top:317.13px" class="cls_003"><span class="cls_003">:</span></div>
<div style="position:absolute;left:344.71px;top:317.13px" class="cls_003"><span class="cls_003"><?php echo $data['email_univ']; ?></span></div>
<div style="position:absolute;left:56.64px;top:344.73px" class="cls_003"><span class="cls_003">Status</span></div>
<div style="position:absolute;left:248.09px;top:344.73px" class="cls_003"><span class="cls_003">:</span></div>
<div style="position:absolute;left:262.25px;top:344.73px" class="cls_003"><span class="cls_003"><?php echo $data['status']; ?></span></div>
<div style="position:absolute;left:56.64px;top:375.93px" class="cls_003"><span class="cls_003">Judul Penelitian/Karya Tulis</span></div>
<div style="position:absolute;left:248.09px;top:375.93px" class="cls_003"><span class="cls_003">:</span></div>
<div style="position:absolute;left:262.25px;top:363.93px" class="cls_003"><span class="cls_003"><?php echo $text3 ?></span></div>
<div style="position:absolute;left:262.25px;top:413.73px" class="cls_003"><span class="cls_003"></span></div>
<div style="position:absolute;left:262.25px;top:427.55px" class="cls_003"><span class="cls_003"></span></div>
<div style="position:absolute;left:262.25px;top:441.35px" class="cls_003"><span class="cls_003"></span></div>
<div style="position:absolute;left:262.25px;top:455.15px" class="cls_003"><span class="cls_003"></span></div>
<div style="position:absolute;left:56.64px;top:450.75px" class="cls_003"><span class="cls_003">Lama Penelitian</span></div>
<div style="position:absolute;left:248.09px;top:450.75px" class="cls_003"><span class="cls_003">:</span></div>
<div style="position:absolute;left:262.25px;top:450.75px" class="cls_003"><span class="cls_003"><?php echo $data['lama']; ?></span></div>
<div style="position:absolute;left:262.25px;top:470.55px" class="cls_003"><span class="cls_003">Tanggal <?php echo date('m-d-Y', strtotime($data['awal']));?></span></div>
<div style="position:absolute;left:262.25px;top:490.35px" class="cls_003"><span class="cls_003">Sampai dengan tanggal <?php echo  date('m-d-Y', strtotime($data['akhir']));?></span></div>
<div style="position:absolute;left:56.64px;top:520.75px" class="cls_003"><span class="cls_003">Dengan ini menyatakan akan melakukan penelitian sesuai yang tercantum dalam proposal dan</span></div>
<div style="position:absolute;left:56.64px;top:535.55px" class="cls_003"><span class="cls_003">formulir   ini,   serta   bersedia   menyerahkan   salinan/copy   hasil   penelitian   dalam   bentuk</span></div>
<div style="position:absolute;left:56.64px;top:550.35px" class="cls_003"><span class="cls_003">hardcopy/softcopy ke Bappelitbangda Kabupaten Kotawaringin Timur Up. Bidang Penelitian dan</span></div>
<div style="position:absolute;left:56.64px;top:565.15px" class="cls_003"><span class="cls_003">Pengembangan setelah menyelesaikan penelitian.</span></div>
<div style="position:absolute;left:344.71px;top:585.78px" class="cls_003"><span class="cls_003">Sampit,</span></div>
<div style="position:absolute;left:390.78px;top:585.78px" class="cls_003"><span class="cls_003"><?php echo date('d F Y');  ?></span></div>
<div style="position:absolute;left:380.71px;top:601.38px" class="cls_003"><span class="cls_003">Pemohon,</span></div>
<div style="position:absolute;left:365.71px;top:660.58px; text-align: center;" class="cls_003"><span class="cls_003"><?php echo $data['nama']; ?></span></div>
</div>

<button class="btn btn-primary btn-lg btn-block fixed-bottom" onclick="window.print()">Print</button>



</html>