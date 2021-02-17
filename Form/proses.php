<?php  
	
	include 'koneksi.php';

		if (isset($_POST['submitPemohon'])) {
			$nama = $_POST['nama'];
			$email = $_POST['email'];
			$no_tlp = $_POST['no_tlp'];
			$alamat = $_POST['alamat'];
			$univ = $_POST['univ'];
			$jurusan = $_POST['jurusan'];
			$alamat_univ = $_POST['alamat_univ'];
			$tlp_univ = $_POST['tlp_univ'];
			$email_univ = $_POST['email_univ'];
			$status = $_POST['status'];
			$judul = $_POST['judul'];
			$lama = $_POST['lama'];
			$awal = $_POST['awal'];
			$akhir = $_POST['akhir'];


			$query = mysqli_query($koneksi, "INSERT INTO data (nama, email, no_tlp, alamat, univ, jurusan, alamat_univ, tlp_univ, email_univ, status, judul, lama, awal, akhir) VALUES ('$nama','$email','$no_tlp', '$alamat', '$univ', '$jurusan', '$alamat_univ', '$tlp_univ', '$email_univ', '$status', '$judul', '$lama', '$awal', '$akhir')");
			if ($query) {
				session_start();
				$_SESSION['nama'] = $nama;
				echo "<script>alert('Data materi berhasil diinput');window.location='output.php'</script>";
			} else {
				echo "ERROR, data kursus gagal dihapus" . mysqli_error($koneksi);
			}
		}

	?>