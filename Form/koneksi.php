<?php  

date_default_timezone_set("Asia/Bangkok");
	$server = 'sql310.epizy.com';
	$username = 'epiz_27622033';
	$password = '0IekMgIJ0Zevm';
	$database = 'epiz_27622033_Online_Courses';

$koneksi = mysqli_connect($server, $username, $password) or die("Koneksi Gagal");
mysqli_select_db($koneksi, $database) or die("Database Belum Ada, Gagal Menghubungkan");

?>