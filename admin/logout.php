<?php
// mengaktifkan session
session_start();

// menghapus semua session
//session_destroy();

unset($_SESSION['status']);

// mengalihkan halaman sambil mengirim pesan logout
header("location:login.php?pesan=logout");
?>