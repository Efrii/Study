<?php

session_start();
include "koneksiDB.php";
include "template/header.php";

?>
        <section class="banner">
            <div class="container">
                <div class="row justify-content-md-center">
                    <div class="col">
                        <div class="text-center">
                        <img src="img/job1.png" alt="" style="width: 75%;" class="img-fluid budi">
                        </div>
                    </div>
                    <div class="col-md-6 title">
                        <h3>TEMUKAN PEKERJAAN IMPIANMU</h3>
                        <p>Terdapat lebih dari 200rb instansi perusahaan di bidang IT <br> yang bekerja sama dengan StudyYuk tunggu apalagi <br>
                        kejar impian mu sekaranga juga </p>
                    </div>
                </div>
            </div>
        </section>

        <section id="course">
            <div class="container course">
                <div class="row">
                    <div class="col-md-5">
                        <h2>Recommended For You</h2>
                        <p>Here is our recommend job that might you want to take<br>from reputable companies.</p>
                    </div>

                    <div class="cari ml-lg-auto">
                    </div>
                </div>
            <div class="row">
              <?php
$query = mysqli_query($koneksi, "SELECT * FROM job ORDER BY id_job ASC LIMIT 6");
while ($row = mysqli_fetch_assoc($query)) {
	$deskripsi = $row["deskripsi"];
	if (strlen($deskripsi) > 100) {
		$deskripsi = substr($deskripsi, 0, 100) . "...";
	}
	?>
            <div class="col-md-4 col-sm-12 mb-3">
                <div class="card white-bg shadow mb-3">
                    <div class="wrapper wrapper-kelas rounded-top js-balanced-height-img" >
                    <img src="img/job/<?php echo $row['image']; ?>" style=" height: 200px; display: block;
  margin-left: auto;
  margin-right: auto;
  padding: 10px;
  width: 50%;" class="img-fluid" alt="Courses">
                </div>
            <div class="card-body">
                <div>
                    <span class="badge badge-secondary mb-3"><?php echo $row['tipe_kontrak']; ?>
                    </span>
                </div>
                <div data-equal-height="card" style="height: 72px;">
                    <h5 class="mb-0">
                        <a data-equal-height="title" style="height: 49px; color: #007bff;">
                            <?php echo $row['nama_job']; ?>
                            </a>
                        </h5>
                        <span class="tipe">Publis Oleh:
                            <span class="text-muted"><?php echo $row['oleh']; ?>
                            </span>
                        </span>
                    </div>
                </div>
                    <div class="card-footer">
                        <div class="row" style="color: #007bff;">
                            <div class="col-12 col-lg text-center text-lg-left">
                                <small><?php echo $row['posisi']; ?></small>
                            </div>
                            <div class="col-12 col-lg-auto text-center text-lg-right">
                                <small><?php echo $row['lokasi']; ?></small>
                            </div>
                        </div>
                    </div>
                <div class="card-footer">
                            <a href="detailJob.php?id_job=<?php echo $row['id_job']; ?>&id_user=<?php echo $_SESSION['id_user']; ?>" style=" color: white; margin-bottom: 5px; background-color: #10BFC2;  display: flex;justify-content: center; "class="btn" >Lihat Lebih Lanjut</a>
                        </div>
                    </div>
                </div>
              <?php }?>
            </div>
        </div>
        </section>
<!--
        <section class="paket section-spacing text-center" id="paket">
            <div class="container">
                <header>
                    <h2>Choose Your Plan and Enroll Now!</h2>
                    <p>Free signup. 14 days free trial. No credit card required.</p>
                </header>

                <dic class="row">
                    <div class="col-md-4">
                        <div class="paket-detail">
                            <div class="header">
                                <h3>BASIC</h3>
                            </div>
                            <div class="price">
                                <span class="uang">Rp.</span>
                                <span class="harga">100.000</span>
                                <span class="periode">/<br> 1 Month</span>
                            </div>

                            <div class="buy">
                                <a class="btn btn-buy" href="">ENROLL NOW</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="paket-detail">
                            <div class="header">
                                <h3>Medium</h3>
                            </div>
                            <div class="price">
                                <span class="uang">Rp.</span>
                                <span class="harga">200.000</span>
                                <span class="periode">/<br> 3 Month</span>
                            </div>

                            <div class="buy">
                                <a class="btn btn-buy" href="">ENROLL NOW</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="paket-detail">
                            <div class="header">
                                <span class="badge badge-secondary">Recommended</span>
                                <h3>PREMIUM</h3>
                            </div>
                            <div class="price">
                                <span class="uang">Rp.</span>
                                <span class="harga">500.000</span>
                                <span class="periode">/<br> 1 Year</span>
                            </div>

                            <div class="buy">
                                <a class="btn btn-buy" href="">ENROLL NOW</a>
                            </div>
                        </div>
                    </div>
                </dic>

            </div>

        </section>
 -->
<?php

include 'template/footer.php';

?>