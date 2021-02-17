<?php  
	
	session_start();

	require 'fpdf/fpdf.php';
	require 'koneksi.php';

?>

<!DOCTYPE html>
<html>
<head>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<title>Form Pengajuan Penelitian</title>
</head>
<body>

	<div class="container">
		<div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="assets/images/kotim.png" alt="" width="72" height="72">
        <h2>Form Permohonan Izin Penelitian</h2>
        <p class="lead">Form Ini Bertujuan Memudahkan Proses Permohonan Izin Penelitian di Bappelitbangda Kabupaten Kotawaringin Timur Guna Proses Kelangkapan Data Baik Softcopy Maupun Hardcopy.</p>
         <hr class="mb-4">
     	 </div>

        <div class="col-md-8 order-md-1">
          <h4 class="mb-3">Form Pemohon</h4>
           <hr class="mb-4">
          <form class="needs-validation" action="proses.php" method="post">
              <div class="mb-3">
                <label for="firstName">Nama Pemohon</label>
                <input type="text" class="form-control" name="nama" placeholder="Nama Pemohon"  required>
                <div class="invalid-feedback">
                  Pastikan Penulisan Benar
                </div>

              
            </div>

            <div class="row">
	            <div class="col-md-6 mb-3">
	                <label for="lastName">Email Pemohon</label>
	                	<input type="email" class="form-control" name="email" placeholder="Email Pemohon" required="">
	                		<div class="invalid-feedback">
	                  	Pastikan Format Email Sesuai
	                </div>
	              </div>

              <div class="col-md-6 mb-3">
                <label for="username">No Tlp Pemohon</label>
	              <div class="input-group">
	                <input type="text" class="form-control" name="no_tlp" placeholder="No Telfon Pemohon" required="">
	                <div class="invalid-feedback" style="width: 100%;">
	                  Pastikan Nomer Telfon Sesuai
	                </div>
	              </div>
              </div>
            </div>

            <div class="mb-3">
                <label for="username">Alamat Pemohon</label>
	              <div class="input-group">
	                <textarea class="form-control" name="alamat" placeholder="Alamat" required=""></textarea>
	                <div class="invalid-feedback" style="width: 100%;">
	                  Pastikan Alamat Sesuai
	                </div>
	              </div>
              </div>

            <div class="mb-3">
              <label for="email">Lembaga/Universitas </label>
              <input type="text" class="form-control" name="univ" required="" placeholder="Lembaga / Universitas">
              <div class="invalid-feedback">
               	Pastikan Lembaga atau Universitas Sesuai
              </div>
            </div>

            <div class="mb-3">
              <label for="address">Fakultas/Jurusan <span class="text-muted">(Jika Mahasiswa)</span></label>
              <input type="text" class="form-control" name="jurusan" placeholder="Fakultas atau Jurusan Yang diampun">
              <div class="invalid-feedback">
                Pastikan Jurusan atau Fakultas Sesuai
              </div>
            </div>

            <div class="mb-3">
              <label for="address2">Alamat Lembaga/Universitas</label>
              <textarea class="form-control" name="alamat_univ" placeholder="Alamat Lembaga atau Universitas" required=""></textarea>
            	<div class="invalid-feedback">
                  Pastikan Alamat Lembaga atau Universitas Sesuai
                </div>
            </div>

             <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">Tlp Lembaga/Universitas</label>
                <input type="text" class="form-control" name="tlp_univ" placeholder="No Tlfon Lembaga atau Universitas"  required="">
                <div class="invalid-feedback">
                  Pastikan Nomer Telfon Lembaga atau Universitas Sesuai
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="lastName">Email Lembaga/Universitas</label>
                <input type="email" class="form-control" name="email_univ" placeholder="Email Universitas atau Lembaga" required="">
                <div class="invalid-feedback">
                  Pastikan Format Email Sesuai
                </div>
              </div>
            </div>

              <div class="mb-3">
                <label for="country">Status</label>
				<div class="input-group">
				  <input type="text" class="form-control" name="status" required="" placeholder="Status (Mahasiswa, Peneliti, atau yang lainnya)" aria-label="Text input with radio button">
				</div>
              </div>



            <div class="mb-3">
              <label for="email">Judul Penelitian/Karya Tulis </label>
              <textarea class="form-control" name="judul" placeholder="Judul Penelitian/Karya Tulis" required=""></textarea>
              <div class="invalid-feedback">
                Pastikan Masukkan Judul Yang Sesuai
              </div>
            </div>

            <div class="row">
              <div class="col-md-5 mb-3">
                <label for="country">Lama Penelitian</label>
                <input type="text" name="lama" placeholder="Lama Penelitian Anda" required="">
                <div class="invalid-feedback">
                  Pastikan Lama Penelitian sesuai
                </div>
              </div>
              <div class="col-md-3 mb-3">
                <label for="country">Awal Penelitian</label>
                <input class="tm form-control"  type="date" name="awal" data-date-format="MM/DD/YYYY" required autofocus>
                <div class="invalid-feedback">
                  Pastikan Tanggal Memulai Penelitian sesuai
                </div>
              </div>
              <div class="col-md-3 mb-3">
                <label for="country">Akhir Penelitian</label>
                <input class="tm form-control"  type="date" name="akhir" data-date-format="DD/MMM/YYYY" required autofocus>
                <div class="invalid-feedback">
                  Pastikan Tanggal Mengakhiri Penelitian sesuai
                </div>
              </div>
            </div>

            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" name="submitPemohon" type="submit">Lanjut Untuk Mencetak</button>
          </form>
        </div>

      <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">© 2020-2021 Codefrii</p>
        <ul class="list-inline">
          <li class="list-inline-item"><a href="https://www.instagram.com/efrii__/">Developer</a></li>
          <li class="list-inline-item"><a href="http://studyyuk.epizy.com/">Support</a></li>
        </ul>
      </footer>
	</div>


	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>