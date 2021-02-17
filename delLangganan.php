<?php
session_start();
unset($_SESSION['jmlh_tagihan']);

header('Location:user/index.php');

?>