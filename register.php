<?php
include 'koneksiDB.php';
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.materialdesignicons.com/5.4.55/css/materialdesignicons.min.css">
	<title>Register</title>
</head>
<body>
	<div class="row">
		<div class="col-4">
			<div>
				<img src="img/belajar.jpg" style="margin-left: -410px; height: 670px;" >
			</div>
		</div>
		<div class="col-8" style="background: #fff;">
			<h3 class="mt-5" style="text-align: center;">REGISTER<hr></h3>
		    <section class="register">
		        <div class="container">
		        <form class="mt-10" action="admin/lib/proses.php" method="POST" enctype="multipart/form-data">
		            <div class="form-row">
		              <div class="form-group col-md-6">
		                <label>Nama Depan</label>
		                <input type="text" class="form-control" id="inputNamad" placeholder="Nama Depan" name="nama_depan">
		              </div>

		              <div class="form-group col-md-6">
		                <label>Nama Belakang</label>
		                <input type="text" class="form-control" id="inputNamab" placeholder="Nama Belakang" name="nama_belakang">
		              </div>
		            </div>

		            <div class="form-row">
		            <div class="form-group col-md-4">
		              <label for="inputAlamat">Alamat</label>
		              <textarea type="text" class="form-control" id="inputAlamat" placeholder="Alamat" name="alamat"></textarea>
		            </div>

		            <div class="form-group col-md-4">
		              <label for="inputHandphone">Handphone</label>
		              <input type="text" class="form-control" id="inputAHandphone" placeholder="Number Phone" name="no_tlp">
		            </div>

		            <div class="form-group col-md-4">
		                <label for="inputPassword">Tanggal Lahir</label>
		                <input type="date" class="form-control" id="inputPassword" placeholder="Tanggal Lahir" name="tgl_lahir">
		              </div>
		            </div>

		            <div class="form-row">
		              <div class="form-group col-md-4">
		                <label for="inputEmail">Email</label>
		                <input type="email" class="form-control" id="inputEmail" placeholder="Email" name="email">
		              </div>

		              <div class="form-group col-md-4">
		                <label for="inputPassword">Password</label>
		                <input type="password" class="form-control" id="inputPassword" placeholder="Password" name="password">
		              </div>

		              <div class="form-group col-md-3">
		                <label for="inputKota">Kota</label>
		                <input type="text" name="tmp_lahir" class="form-control" id="inputKota" placeholder="Kota">
		              </div>
		            </div>

		            <div class="form-row">
		              <div class="form-group col-md-3">
		                <label for="inputSekolah">Asal Sekolah</label>
		                <input type="text" class="form-control" id="inputKSekolah" placeholder="Sekolah" name="sekolah">
		              </div>

		              <div class="form-group col-md-2">
		              	<div class="form-check" style="margin-top: 35px; margin-left: -5px;">
		                    <input class="form-check-input" name="jns_klamin" type="radio" id="gridCheck1" value="L">
		                    <label class="form-check-label" for="gridCheck1">
		                      Laki-Laki
		                    </label>
		                  </div>
		              </div>
		                  <div class="form-group col-md-1">
		                  <div class="form-check" style="margin-top: 35px; margin-left: -55px;">
		                    <input class="form-check-input" name="jns_klamin" type="radio" id="gridCheck1" value="P">
		                    <label class="form-check-label" for="gridCheck1">
		                      Perempuan
		                    </label>
		                  </div>
		              </div>
		              <div style="margin-left: -15px;" class="form-group col-md-3">
		                <label>Photo Profil</label>
		                <input type="file" name="image" class="form-control">
		              </div>
		            </div>
		            <div class="text-center">
		            	<button type="submit" class="btn btn-primary" style="margin-top: 50px;" name="register" class="btn btn-register mt-5">Sign in</button>
		            </div>
		          </form>
		        </div>
		    </section>
		</div>
	</div>
 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
</body>
</html>