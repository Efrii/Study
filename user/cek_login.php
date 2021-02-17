<?php
// mengaktifkan session php
session_start();

// menghubungkan dengan koneksi
include '../koneksiDB.php';

// menangkap data yang dikirim dari form
$email = $_POST['email'];
$password = $_POST['password'];

// menyeleksi data admin dengan username dan password yang sesuai
$data = mysqli_query($koneksi, "SELECT * FROM user WHERE email='$email' and password='$password'");

// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);

if ($cek > 0) {
	$_SESSION['email'] = $email;
	$_SESSION['statusUser'] = "login";
	header("location:index.php");
} else {
	header("location:login.php?pesan=gagal");
}
?>