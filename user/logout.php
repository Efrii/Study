<?php
// mengaktifkan session
session_start();

// menghapus semua session
//session_destroy();
unset($_SESSION['statusUser'], $_SESSION['id_user'], $_SESSION['nama_depan'], $_SESSION['nama_belakang'], $_SESSION['email'], $_SESSION['password'], $_SESSION['alamat'], $_SESSION['tgl_lahir'], $_SESSION['tmp_lahir'], $_SESSION['no_tlp'], $_SESSION['sekolah'], $_SESSION['jns_klamin'], $_SESSION['image'], $_SESSION['id_user']);

// mengalihkan halaman sambil mengirim pesan logout
header("location:login.php?pesan=logout");
?>