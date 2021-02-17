<?php

session_start();
include "koneksiDB.php";
include "template/header.php";

?>
        <section class="banner">
            <div class="container">
                <img src="img/course.png" class="img-fluid">
            </div>
        </section>

        <section id="course">
            <div class="container course">
                <div class="row">
                    <div class="col-md-5">
                        <h2>Recommended For You</h2>
                        <p>Here is our recommend challenge that might you want to get study point<br>from reputable companies.</p>
                    </div>
                </div>
            <div class="row">
              <?php
$query = "SELECT * FROM kursus order by id_kursus";
$data = mysqli_query($koneksi, $query);
while ($row = mysqli_fetch_array($data)) {
	$harga = $row['harga'];
	//memuat pecahan ke mata uang indonesia
	$uang = "Rp." . number_format($harga, 2, ',', '.');
	$deskripsi = $row["deskripsi"];
	if (strlen($deskripsi) > 100) {
		$deskripsi = substr($deskripsi, 0, 100) . "...";
	}
	// $query1 = mysqli_query($koneksi, "SELECT * FROM status");
	// $row1 = mysqli_fetch_array($query1);
	?>
                <div class="col-md-4 col-sm-12 mb-3">
                    <div class="card white-bg shadow mb-3">
                        <div class="wrapper wrapper-kelas rounded-top js-balanced-height-img">
                            <img style=" height: 200px; display: block;
  margin-left: auto;
  margin-right: auto;
  padding: 10px;
  width: 50%;" src="img/kursus/<?php echo $row['cover']; ?>" class="img-fluid" alt="Courses">
                        </div>
                        <div class="card-body">
                            <div class="d-flex mb-2">
                                <small class="text-muted" style="font-weight: 600">
                                    <span class="text-muted mr-3"><span class="mdi mdi-chevron-double-up mr-1"></span><?php echo $row['tingkatan']; ?></span>
                                    <span class="text-muted"><span class="mdi mdi-cash-multiple mr-1"></span><?php echo $uang; ?></span>
                                </small>
                            </div>
                            <p class="mb-0 font-weight-bold content-title">
                                    <?php echo $row['nama_kursus']; ?>
                                </p>
                            <div class="card-title">
                                <div class="mt-2 pb-3 text-gray" style="font-size: 0.9rem; height: 116px;" data-equal-height="summary">
                                <p><?php echo $deskripsi; ?></p>
                            </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="js-enrollment-status">
                                <a href="detailKursus.php?id_kursus=<?php echo $row['id_kursus']; ?>&id_user=<?php echo $_SESSION['id_user']; ?>" style=" color: white; margin-bottom: 5px; background-color: #10BFC2;  display: flex;justify-content: center; "class="btn" >Belajar</a>
                            </div>
                        </div>
                    </div>
                </div>
              <?php }?>
            </div>
        </div>
        </section><!--

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

        </section> -->

<?php

include 'template/footer.php';

?>