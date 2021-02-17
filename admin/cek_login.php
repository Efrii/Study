<?php
// menghubungkan dengan koneksi
include '../koneksiDB.php';

// menangkap data yang dikirim dari form
$username = $_POST['username'];
$password = $_POST['password'];

// menyeleksi data admin dengan username dan password yang sesuai
$data = mysqli_query($koneksi, "SELECT * FROM admin WHERE username='$username' and password='$password'");

// menghitung jumlah ata yang ditemukan
$cek = mysqli_num_rows($data);

if ($cek > 0) {
	session_start();
	$_SESSION['username'] = $username;
	$_SESSION['status'] = "login";
	header("location:index.php");
} else {
	header("location:login.php?pesan=gagal");
}
?>