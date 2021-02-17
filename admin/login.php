<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/login_style.css">
</head>
<body>
	<div class="login">
	  <h1>Login Admin</h1>
	  	<?php 
		if(isset($_GET['pesan'])){
				if($_GET['pesan'] == "gagal"){
					echo "Login gagal! username dan password salah!";
				}else if($_GET['pesan'] == "logout"){
					echo "Anda telah berhasil logout";
				}else if($_GET['pesan'] == "belum_login"){
					echo "Anda harus login untuk mengakses halaman admin";
				}
			}
		?>
	    <form method="post" action="cek_login.php">
	      <input type="text" name="username" placeholder="Username" required="required" />
	        <input type="password" name="password" placeholder="Password" required="required" />
	        <button type="submit" class="btn btn-primary btn-block btn-large">Login</button>
	        <a href="../index.php">Back</a>
	    </form>
	</div>
</body>
</html>