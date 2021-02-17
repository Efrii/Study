<?php

session_start();
include '../../koneksiDB.php';

//////////////----------------DATA KURSUS--------------\\\\\\\\\\\\\\\\\\\\

//Insert Data Kursus
if (isset($_POST['tambah'])) {
	$nama_kursus = $_POST['nama_kursus'];
	$deskripsi = $_POST['deskripsi'];
	$tingkatan = $_POST['tingkatan'];
	$cover = $_FILES['cover']['name'];
	$harga = $_POST['harga'];

	if ($cover != "") {
		$ekstensi_diperolehkan = array('png', 'jpg', 'jpeg');
		$x = explode('.', $cover);
		$ektensi = strtolower(end($x));
		$file_tmp = $_FILES['cover']['tmp_name'];
		$jeneng = "Courses"; //Memberi nama awal
		$angka = rand(1, 999); //Memberi angka acak di belakang nama
		$nama_gambar_baru = $jeneng . '-' . $angka . '.jpg';

		if (in_array($ektensi, $ekstensi_diperolehkan) === true) {
			move_uploaded_file($file_tmp, '../../img/kursus/' . $nama_gambar_baru);

			$query = "INSERT INTO kursus (nama_kursus, deskripsi, tingkatan, cover, harga) VALUES ('$nama_kursus','$deskripsi','$tingkatan','$nama_gambar_baru','$harga')";

			$result = mysqli_query($koneksi, $query);

			if (!$result) {

				die("Query Error : " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));

			} else {

				echo "<script>alert('Data Kursus berhasil ditambahkan');window.location='../pages/data_kursus.php'</script>";
			}
		} else {

			echo "<script>alert('Ektensi gambar hanya bisa jpg dan png!');window.location='../pages/data_kursus.php';</script>";
		}
	} else {

		$query = "INSERT INTO kursus (nama_kursus, deskripsi, tingkatan, harga) VALUES ('$nama_kursus','$deskripsi','$tingkatan','$harga')";

		$result = mysqli_query($koneksi, $query);

		if (!$result) {

			die("Query Error : " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));

		} else {

			echo "<script>alert('Data Kursus berhasil ditambahkan');window.location='../pages/data_kursus.php'</script>";

		}
	}

}

//Update Data Kursus
if (isset($_POST['update'])) {
	$id_kursus = $_POST['id_kursus'];
	$nama_kursus = $_POST['nama_kursus'];
	$deskripsi = $_POST['deskripsi'];
	$tingkatan = $_POST['tingkatan'];
	$cover = $_FILES['cover']['name'];
	$harga = $_POST['harga'];

	if ($cover != "") {
		$ekstensi_diperolehkan = array('png', 'jpg', 'jpeg');
		$x = explode('.', $cover);
		$ektensi = strtolower(end($x));
		$file_tmp = $_FILES['cover']['tmp_name'];
		$jeneng = "Courses"; //Memberi nama awal
		$angka = rand(1, 999); //Memberi angka acak di belakang nama
		$nama_gambar_baru = $jeneng . '-' . $angka . '.jpg';

		if (in_array($ektensi, $ekstensi_diperolehkan) === true) {
			move_uploaded_file($file_tmp, '../../img/kursus/' . $nama_gambar_baru);

			//proses hapus gambar di local storage
			$query = mysqli_query($koneksi, "SELECT * FROM kursus WHERE id_kursus='$id_kursus'");
			while ($data = mysqli_fetch_array($query)) {
				$gambar = $data['cover'];
				unlink('../../img/kursus/' . $gambar);
			}

			$query = "UPDATE kursus SET nama_kursus = '$nama_kursus', deskripsi = '$deskripsi', tingkatan = '$tingkatan', cover = '$nama_gambar_baru', harga = '$harga'";

			$query .= "WHERE id_kursus = '$id_kursus'";

			$result = mysqli_query($koneksi, $query);

			if (!$result) {

				die("Query Error : " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));

			} else {
				echo "<script>alert('Data Kursus berhasil Diubah');window.location='../pages/data_kursus.php'</script>";
			}
		} else {

			echo "<script>alert('Ektensi gambar hanya bisa jpg dan png!');window.location='../pages/kursus.php';</script>";
		}
	} else {
		$query = "UPDATE kursus SET nama_kursus = '$nama_kursus', deskripsi = '$deskripsi', tingkatan = '$tingkatan', harga = '$harga'";
		$query .= "WHERE id_kursus = '$id_kursus'";

		$result = mysqli_query($koneksi, $query);

		if (!$result) {

			die("Query Error : " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));

		} else {

			echo "<script>alert('Data Kursus berhasil Diubah');window.location='../pages/data_kursus.php'</script>";

		}
	}

}

//Delete Data Kursus
if ($_GET['act'] == 'deletekursus') {
	$id_kursus = $_GET['id'];

	//proses hapus gambar di local storage
	$query = mysqli_query($koneksi, "SELECT * FROM kursus WHERE id_kursus='$id_kursus'");
	while ($data = mysqli_fetch_array($query)) {
		$gambar = $data['cover'];
		unlink('../../img/kursus/' . $gambar);
	}

	$querydelete = mysqli_query($koneksi, "DELETE FROM kursus WHERE id_kursus = '$id_kursus'");
	if ($querydelete) {
		// redirect ke index.php
		header("location:../pages/data_kursus.php");
	} else {
		echo "ERROR, data kursus gagal dihapus" . mysqli_error($koneksi);
	}
}

/////////////// ----------- DATA FEEDBACK --------------- \\\\\\\\\\\\\\\

//Tambah Data Feedback/Masukan
if (isset($_POST['tambahFeedback'])) {
	$id_user = $_SESSION['id_user'];
	$nama = $_POST['nama'];
	$email = $_POST['email'];
	$subjek = $_POST['subjek'];
	$masukan = $_POST['masukan'];

	$query = "INSERT INTO feedback (id_user, nama, email, subjek, masukan) VALUES ('$id_user','$nama','$email','$subjek','$masukan')";

	$result = mysqli_query($koneksi, $query);

	if (!$result) {

		die("Query Error : " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));

	} else {

		echo "<script>alert('Data Kursus berhasil Diubah');window.location='../../contact.php'</script>";

	}

}

//delete feedback
if ($_GET['act'] == 'deletefeedback') {
	$id_feedback = $_GET['id'];
	$querydelete = mysqli_query($koneksi, "DELETE FROM feedback WHERE id_feedback = '$id_feedback'");
	if ($querydelete) {
		// redirect ke index.php
		header("location:../pages/dataFeedback.php");
	} else {
		echo "ERROR, data kursus gagal dihapus" . mysqli_error($koneksi);
	}
}

//////////////////------------ DATA JOB ------------\\\\\\\\\\\\\\\\\\\\\\\\\\

//Inpute Data Job
if (isset($_POST['tambahjob'])) {
	$nama_job = $_POST['nama_job'];
	$oleh = $_POST['oleh'];
	$tipe_kontrak = $_POST['tipe_kontrak'];
	$posisi = $_POST['posisi'];
	$jenis = $_POST['jenis'];
	$lokasi = $_POST['lokasi'];
	$deskripsi = $_POST['deskripsi'];
	$image = $_FILES['image']['name'];

	if ($image != "") {
		$ekstensi_diperolehkan = array('png', 'jpg', 'jpeg');
		$x = explode('.', $image);
		$ektensi = strtolower(end($x));
		$file_tmp = $_FILES['image']['tmp_name'];
		$jeneng = "Job";
		$angka = rand(1, 999);
		$nama_gambar_baru = $jeneng . '-' . $angka . '.jpg';

		if (in_array($ektensi, $ekstensi_diperolehkan) === true) {
			move_uploaded_file($file_tmp, '../../img/job/' . $nama_gambar_baru);

			$query = "INSERT INTO job (nama_job, oleh, tipe_kontrak, posisi, jenis, lokasi, deskripsi, image) VALUES ('$nama_job', '$oleh', '$tipe_kontrak', '$posisi', '$jenis', '$lokasi', '$deskripsi', '$nama_gambar_baru')";

			$result = mysqli_query($koneksi, $query);

			if (!$result) {

				die("Query Error : " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));

			} else {

				echo "<script>alert('Data Kursus berhasil ditambahkan');window.location='../pages/dataJob.php'</script>";
			}
		} else {

			echo "<script>alert('Ektensi gambar hanya bisa jpg dan png!');window.location='../pages/dataJob.php';</script>";
		}
	} else {
		$query = "INSERT INTO job (nama_job, oleh, tipe_kontrak, posisi, jenis, lokasi, deskripsi) VALUES ('$nama_job', '$oleh', '$tipe_kontrak', '$posisi', '$jenis', '$lokasi', '$deskripsi')";

		$result = mysqli_query($koneksi, $query);

		if (!$result) {

			die("Query Error : " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));

		} else {

			echo "<script>alert('Data Kursus berhasil Diubah');window.location='../pages/dataJob.php'</script>";

		}
	}
}

//Update Data Job
if (isset($_POST['updatejob'])) {
	$id_job = $_POST['id_job'];
	$nama_job = $_POST['nama_job'];
	$oleh = $_POST['oleh'];
	$tipe_kontrak = $_POST['tipe_kontrak'];
	$posisi = $_POST['posisi'];
	$jenis = $_POST['jenis'];
	$lokasi = $_POST['lokasi'];
	$deskripsi = $_POST['deskripsi'];
	$image = $_FILES['image']['name'];

	if ($image != "") {
		$ekstensi_diperolehkan = array('png', 'jpg', 'jpeg');
		$x = explode('.', $image);
		$ektensi = strtolower(end($x));
		$file_tmp = $_FILES['image']['tmp_name'];
		$jeneng = "Job";
		$angka = rand(1, 999);
		$nama_gambar_baru = $jeneng . '-' . $angka . '.jpg';

		if (in_array($ektensi, $ekstensi_diperolehkan) === true) {
			move_uploaded_file($file_tmp, '../../img/job/' . $nama_gambar_baru);

			//proses hapus gambar di local storage
			$query = mysqli_query($koneksi, "SELECT * FROM job WHERE id_job='$id_job'");
			while ($data = mysqli_fetch_array($query)) {
				$gambar = $data['image'];
				unlink('../../img/job/' . $gambar);
			}

			$query = "UPDATE job SET nama_job = '$nama_job', oleh = '$oleh', tipe_kontrak = '$tipe_kontrak', posisi = '$posisi', jenis = '$jenis', lokasi = '$lokasi', deskripsi = '$deskripsi', image = '$nama_gambar_baru'";

			$query .= "WHERE id_job = '$id_job'";

			$result = mysqli_query($koneksi, $query);

			if (!$result) {

				die("Query Error : " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));

			} else {
				echo "<script>alert('Data Job berhasil Diubah');window.location='../pages/dataJob.php'</script>";
			}
		} else {

			echo "<script>alert('Ektensi gambar hanya bisa jpg dan png!');window.location='../pages/dataJob.php';</script>";
		}
	} else {
		$query = "UPDATE job SET nama_job = '$nama_job', oleh = '$oleh', tipe_kontrak = '$tipe_kontrak', posisi = '$posisi', jenis = '$jenis', lokasi = '$lokasi', deskripsi = '$deskripsi'";

		$query .= "WHERE id_job = '$id_job'";

		$result = mysqli_query($koneksi, $query);

		if (!$result) {

			die("Query Error : " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));

		} else {

			echo "<script>alert('Data Job berhasil Diubah');window.location='../pages/dataJob.php'</script>";

		}
	}

}

//Delete Job
if ($_GET['act'] == 'deletejob') {
	$id_job = $_GET['id'];

	$query = mysqli_query($koneksi, "SELECT * FROM job WHERE id_job='$id_job'");
	while ($data = mysqli_fetch_array($query)) {
		$gambar = $data['image'];
		unlink('../../img/job/' . $gambar);
	}

	$querydelete = mysqli_query($koneksi, "DELETE FROM job WHERE id_job = '$id_job'");
	if ($querydelete) {
		// redirect ke index.php
		header("location:../pages/dataJob.php");
	} else {
		echo "ERROR, data kursus gagal dihapus" . mysqli_error($koneksi);
	}
}

/////////////////------------------- USER -----------------\\\\\\\\\\\\\\\\\\\

//insert Register
if (isset($_POST['register'])) {
	$nama_depan = $_POST['nama_depan'];
	$nama_belakang = $_POST['nama_belakang'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$alamat = $_POST['alamat'];
	$tgl_lahir = $_POST['tgl_lahir'];
	$tmp_lahir = $_POST['tmp_lahir'];
	$no_tlp = $_POST['no_tlp'];
	$sekolah = $_POST['sekolah'];
	$jns_klamin = $_POST['jns_klamin'];
	$image = $_FILES['image']['name'];

	if ($image != "") {
		$ekstensi_diperolehkan = array('png', 'jpg', 'jpeg');
		$x = explode('.', $image);
		$ektensi = strtolower(end($x));
		$file_tmp = $_FILES['image']['tmp_name'];
		$jeneng = "User";
		$angka = rand(1, 999);
		$nama_gambar_baru = $jeneng . '-' . $angka . '.jpg';

		if (in_array($ektensi, $ekstensi_diperolehkan) === true) {
			move_uploaded_file($file_tmp, '../../img/user/' . $nama_gambar_baru);

			$query = mysqli_query($koneksi, "SELECT * FROM user WHERE email='$email'");
			$data = mysqli_num_rows($query);

			if ($data > 0) {
				echo "<script>alert('Email Sudah Terdaftar');window.location='../../register.php'</script>";
			} else {
				$query = "INSERT INTO user (id_user, nama_depan,nama_belakang,email,password,alamat,tgl_lahir,tmp_lahir,no_tlp,sekolah,jns_klamin, image) VALUES (NULL,'$nama_depan','$nama_belakang','$email','$password','$alamat','$tgl_lahir','$tmp_lahir','$no_tlp','$sekolah','$jns_klamin', '$nama_gambar_baru')";

				$result = mysqli_query($koneksi, $query);

				if (!$result) {
					die("Query Error : " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
				} else {
					echo "<script>alert('Data Kursus berhasil ditambahkan');window.location='../../user/'</script>";
				}
			}
		} else {

			echo "<script>alert('Ektensi gambar hanya bisa jpg dan png!');window.location='../../register.php'</script>";
		}
	} else {
		$query = "INSERT INTO user (id_user, nama_depan,nama_belakang,email,password,alamat,tgl_lahir,tmp_lahir,no_tlp,sekolah,jns_klamin) VALUES (NULL,'$nama_depan','$nama_belakang','$email','$password','$alamat','$tgl_lahir','$tmp_lahir','$no_tlp','$sekolah','$jns_klamin')";

		$result = mysqli_query($koneksi, $query);

		if (!$result) {

			die("Query Error : " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));

		} else {

			echo "<script>alert('Data Kursus berhasil Diubah');window.location='../../user/'</script>";

		}
	}
}

//Delete User
if ($_GET['act'] == 'deleteuser') {
	$id_user = $_GET['id'];

	//proses hapus gambar di local storage
	$query = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user='$id_user'");
	while ($data = mysqli_fetch_array($query)) {
		$gambar = $data['image'];
		unlink('../../img/user/' . $gambar);
	}

	$querydelete = mysqli_query($koneksi, "DELETE FROM user WHERE id_user = '$id_user'");
	if ($querydelete) {
		// redirect ke index.php
		header("location:../pages/dataUser.php");
	} else {
		echo "ERROR, data kursus gagal dihapus" . mysqli_error($koneksi);
	}
}

//update user
if (isset($_POST['updateuser'])) {
	$id_user = $_POST['id_user'];
	$nama_depan = $_POST['nama_depan'];
	$nama_belakang = $_POST['nama_belakang'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$tgl_lahir = $_POST['tgl_lahir'];
	$tmp_lahir = $_POST['tmp_lahir'];
	$no_tlp = $_POST['no_tlp'];
	$sekolah = $_POST['sekolah'];
	$jns_klamin = $_POST['jns_klamin'];
	$image = $_FILES['image']['name'];

	if ($image != "") {
		$ekstensi_diperolehkan = array('png', 'jpg', 'jpeg');
		$x = explode('.', $image);
		$ektensi = strtolower(end($x));
		$file_tmp = $_FILES['image']['tmp_name'];
		$jeneng = "User";
		$angka = rand(1, 999);
		$nama_gambar_baru = $jeneng . '-' . $angka . '.jpg';

		if (in_array($ektensi, $ekstensi_diperolehkan) === true) {
			move_uploaded_file($file_tmp, '../../img/user/' . $nama_gambar_baru);

			//proses hapus gambar di local storage
			$query = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user='$id_user'");
			while ($data = mysqli_fetch_array($query)) {
				$gambar = $data['image'];
				unlink('../../img/user/' . $gambar);
			}

			$query = "UPDATE user SET nama_depan = '$nama_depan', nama_belakang = '$nama_belakang', email = '$email', password = '$password', tgl_lahir = '$tgl_lahir', tmp_lahir = '$tmp_lahir', no_tlp = '$no_tlp', sekolah = '$sekolah', jns_klamin = '$jns_klamin', image = '$nama_gambar_baru' WHERE id_user = '$id_user'";

			$result = mysqli_query($koneksi, $query);

			if (!$result) {

				die("Query Error : " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));

			} else {
				echo "<script>alert('Data User berhasil Diubah');window.location='../pages/dataUser.php'</script>";
			}
		} else {

			echo "<script>alert('Ektensi gambar hanya bisa jpg dan png!');window.location='../pages/dataUser.php';</script>";
		}
	} else {
		$query = "UPDATE user SET nama_depan = '$nama_depan', nama_belakang = '$nama_belakang', email = '$email', password = '$password', tgl_lahir = '$tgl_lahir', tmp_lahir = '$tmp_lahir', no_tlp = '$no_tlp', sekolah = '$sekolah', jns_klamin = '$jns_klamin' WHERE id_user = '$id_user'";

		$result = mysqli_query($koneksi, $query);

		if (!$result) {

			die("Query Error : " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));

		} else {

			echo "<script>alert('Data User berhasil Diubah');window.location='../pages/dataUser.php'</script>";

		}
	}

}

///////////////----------------- ADMIN --------------\\\\\\\\\\\\

//tambah data Admin
if (isset($_POST['tambahadmin'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$nama = $_POST['nama'];

	$query = mysqli_query($koneksi, "INSERT INTO admin (username, password, nama) VALUES ('$username', '$password', '$nama')");

	if ($query) {
		echo "<script>alert('Data Admin berhasil Ditambah');window.location='../pages/dataAdmin.php'</script>";
	} else {
		echo "ERROR, data kursus gagal diupdate" . mysqli_error($koneksi);
	}
}

//delete admin
if ($_GET['act'] == 'deleteadmin') {
	$id = $_GET['id'];

	$query = mysqli_query($koneksi, "DELETE FROM admin WHERE id = '$id'");

	if ($query) {
		// redirect ke index.php
		header("location:../pages/dataAdmin.php");
	} else {
		echo "ERROR, data admin gagal dihapus" . mysqli_error($koneksi);
	}
}

//update admin
if (isset($_POST['updateadmin'])) {
	$id = $_POST['id'];
	$nama = $_POST['nama'];
	$username = $_POST['username'];
	$password = $_POST['password'];

	$query = "UPDATE admin SET nama = '$nama', username = '$username', password = '$password' WHERE id = '$id'";
	$result = mysqli_query($koneksi, $query);
	if ($result) {
		echo "<script>alert('Data Admin berhasil Diubah');window.location='../pages/dataAdmin.php'</script>";
	} else {
		echo "ERROR, data kursus gagal dihapus" . mysqli_error($koneksi);
	}
}

////////////////----------------CHALLENGE -----------------\\\\\\\\\\\\\\\\\\\\\\

//Insert Data Challlenge
if (isset($_POST['tambahchallenge'])) {
	$nama_ch = $_POST['nama_ch'];
	$oleh = $_POST['oleh'];
	$deskripsi = $_POST['deskripsi'];
	$hadiah = $_POST['hadiah'];
	$image = $_FILES['image']['name'];

	if ($image != "") {
		$ekstensi_diperolehkan = array('png', 'jpg', 'jpeg');
		$x = explode('.', $image);
		$ektensi = strtolower(end($x));
		$file_tmp = $_FILES['image']['tmp_name'];
		$jeneng = "Challlenge"; //Memberi nama awal
		$angka = rand(1, 999); //Memberi angka acak di belakang nama
		$nama_gambar_baru = $jeneng . '-' . $angka . '.jpg';

		if (in_array($ektensi, $ekstensi_diperolehkan) === true) {
			move_uploaded_file($file_tmp, '../../img/challenge/' . $nama_gambar_baru);

			$query = "INSERT INTO challenge (nama_ch, oleh, deskripsi, hadiah, image) VALUES ('$nama_ch','$oleh','$deskripsi','$hadiah','$nama_gambar_baru')";

			$result = mysqli_query($koneksi, $query);

			if (!$result) {

				die("Query Error : " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));

			} else {

				echo "<script>alert('Data Kursus berhasil ditambahkan');window.location='../pages/dataChalenge.php'</script>";
			}
		} else {

			echo "<script>alert('Ektensi gambar hanya bisa jpg dan png!');window.location='../pages/dataChalenge.php';</script>";
		}
	} else {

		$query = "INSERT INTO challenge (nama_ch, oleh, deskripsi, hadiah) VALUES ('$nama_ch','$oleh','$deskripsi','$hadiah')";

		$result = mysqli_query($koneksi, $query);

		if (!$result) {

			die("Query Error : " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));

		} else {

			echo "<script>alert('Data Challlenge berhasil ditambahkan');window.location='../pages/dataChalenge.php'</script.php'</script>";

		}
	}

}

//Update Data Challenge
if (isset($_POST['updatechallenge'])) {
	$id_challenge = $_POST['id_challenge'];
	$nama_ch = $_POST['nama_ch'];
	$oleh = $_POST['oleh'];
    $deskripsi = $_POST['deskripsi'];
	$hadiah = $_POST['hadiah'];
	$image = $_FILES['image']['name'];

	if ($image != "") {
		$ekstensi_diperolehkan = array('png', 'jpg', 'jpeg');
		$x = explode('.', $image);
		$ektensi = strtolower(end($x));
		$file_tmp = $_FILES['image']['tmp_name'];
		$jeneng = "Challlenge"; //Memberi nama awal
		$angka = rand(1, 999); //Memberi angka acak di belakang nama
		$nama_gambar_baru = $jeneng . '-' . $angka . '.jpg';

		if (in_array($ektensi, $ekstensi_diperolehkan) === true) {
			move_uploaded_file($file_tmp, '../../img/challenge/' . $nama_gambar_baru);

			//proses hapus gambar di local storage
			$query = mysqli_query($koneksi, "SELECT * FROM challenge WHERE id_challenge='$id_challenge'");
			while ($data = mysqli_fetch_array($query)) {
				$gambar = $data['image'];
				unlink('../../img/challenge/' . $gambar);
			}

			$query = "UPDATE challenge SET nama_ch = '$nama_ch', oleh = '$oleh', deskripsi = '$deskripsi', hadiah = '$hadiah', image = '$nama_gambar_baru'";

			$query .= "WHERE id_challenge = '$id_challenge'";

			$result = mysqli_query($koneksi, $query);

			if (!$result) {

				die("Query Error : " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));

			} else {
				echo "<script>alert('Data Challlenge berhasil Diubah');window.location='../pages/dataChalenge..php'</script>";
			}
		} else {

			echo "<script>alert('Ektensi gambar hanya bisa jpg dan png!');window.location='../pages/dataChalenge.php';</script>";
		}
	} else {
		$query = "UPDATE challenge SET nama_ch = '$nama_ch', oleh = '$oleh', deskripsi = '$deskripsi', hadiah = '$hadiah'";
		$query .= "WHERE id_challenge = '$id_challenge'";

		$result = mysqli_query($koneksi, $query);

		if (!$result) {

			die("Query Error : " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));

		} else {

			echo "<script>alert('Data Challlenge berhasil Diubah');window.location='../pages/dataChalenge.php'</script>";

		}
	}

}

//delete challenge
if ($_GET['act'] == 'deletechallenge') {
	$id_challenge = $_GET['id'];

	$query = mysqli_query($koneksi, "SELECT * FROM challenge WHERE id_challenge='$id_challenge'");
	while ($data = mysqli_fetch_array($query)) {
		$gambar = $data['image'];
		unlink('../../img/challenge/' . $gambar);
	}

	$query = mysqli_query($koneksi, "DELETE FROM challenge WHERE id_challenge = '$id_challenge'");

	if ($query) {
		echo "<script>alert('Data Challlenge berhasil dihapus')window.location='../pages/dataChalenge.php';</script>";
	} else {
		echo "ERROR, data kursus gagal dihapus" . mysqli_error($koneksi);
	}
}

////------------------ ISI MATERI ---------------\\\\\\\\

//tambah isi materi sesuai kursus
if (isset($_POST['tambahmateri'])) {
	$id_kursus = $_POST['id_kursus'];
	$nama = $_POST['nama'];
	$isi = $_POST['isi'];

	$query = mysqli_query($koneksi, "INSERT INTO materi (id_kursus, nama, isi) VALUES ('$id_kursus', '$nama', '$isi')");
	if ($query) {
		echo "<script>alert('Data materi berhasil diinput');window.location='../pages/add_materi.php'</script>";
	} else {
		echo "ERROR, data kursus gagal dihapus" . mysqli_error($koneksi);
	}
}

//update isi materi
if (isset($_POST['updatemateri'])) {
	$id_materi = $_POST['id_materi'];
	$nama = $_POST['nama'];
	$isi = $_POST['isi'];

	$query = mysqli_query($koneksi, "UPDATE materi SET nama = '$nama', isi = '$isi' WHERE id_materi = '$id_materi'");
	if ($query) {
		echo "<script>alert('Data materi berhasil update');window.location='../pages/add_materi.php'</script>";
	} else {
		echo "ERROR, data kursus gagal dihapus" . mysqli_error($koneksi);
	}
}

//delete isi data materi
if ($_GET['act'] == 'deletemateri') {
	$id_materi = $_GET['id'];

	$query = mysqli_query($koneksi, "DELETE FROM materi WHERE id_materi='$id_materi'");

	if ($query) {
		echo "<script>alert('Data materi berhasil dihapus');window.location='../pages/add_materi.php'</script>";
	} else {
		echo "ERROR, data kursus gagal dihapus" . mysqli_error($koneksi);
	}
}

///////////-------------------- LANGGANAN -----------------\\\\\\\\\\\\\\

if ($_GET['act'] == 'deletestatus') {
	$id_status = $_GET['id'];

	$query = mysqli_query($koneksi, "DELETE FROM status WHERE id_status='$id_status'");

	if ($query) {
		echo "<script>alert('Data status berhasil dihapus');window.location='../pages/status.php'</script>";
	} else {
		echo "ERROR, data kursus gagal dihapus" . mysqli_error($koneksi);
	}
}

////////////--------------- LAMAR JOB ----------------------\\\\\\\\\\\\\\\\
if (isset($_POST['lamarjob'])) {
	$id_job = $_POST['id_job'];
	$id_user = $_SESSION['id_user'];
	$cover_latter = $_POST['cover_latter'];

	$query = mysqli_query($koneksi, "INSERT INTO lamarJob (id_job, id_user, cover_latter) VALUES ('$id_job', '$id_user', '$cover_latter')");

	if ($query) {
		echo "<script>alert('Data materi berhasil input');</script>";
		header('location:../../detailJob.php?id_job=' . $id_job . '$id_user=' . $id_user);
	} else {
		echo "ERROR, data kursus gagal dihapus" . mysqli_error($koneksi);
	}
}

if ($_GET['act'] == 'deletelamar') {
	$id_lamar = $_GET['id'];

	$query = mysqli_query($koneksi, "DELETE FROM lamarJob WHERE id_lamar='$id_lamar'");

	if ($query) {
		echo "<script>alert('Data Pelamar berhasil dihapus');window.location='../pages/dataPelamar.php'</script>";
	} else {
		echo "ERROR, data kursus gagal dihapus" . mysqli_error($koneksi);
	}
}

////////////------------------- ikut Challange----------------\\\\\\\\\\\\\\\\
if (isset($_POST['ikutchallenge'])) {
	$id_challenge = $_POST['id_challenge'];
	$id_user = $_POST['id_user'];
	$mengikuti = $_POST['mengikuti'];

	$query = mysqli_query($koneksi, "INSERT INTO ikutChallenge (id_challenge,id_user, mengikuti) VALUES ('$id_challenge', '$id_user', '$mengikuti')");

	if ($query) {
		echo "<script>alert('Berhasil Mengikuti Challlenge');window.location='../../menuChallenge.php'</script>";
		//header('location:../../detailJob.php?id_job=' . $id_job . '$id_user=' . $id_user);
	} else {
		echo "ERROR, data lamar gagal dihapus" . mysqli_error($koneksi);
	}
}
?>