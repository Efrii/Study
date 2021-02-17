<?php

session_start();
include "koneksiDB.php";
include "template/header.php";

?>
        <section class="banner">
            <div class="container">
                <div class="row justify-content-md-center">
                    <div class="col">
                        <div>
                        <img src="img/challenge1.png" alt="" class="img-fluid budi">
                        </div>
                    </div>
                    <div class="col-md-6 title">
                        <h3>ASAH KEMAMPUANMU DI SINI</h3>
                        <p>Terdapat lebih dari 12rb challenge setiap tahunnya yang <br> diselenggarakan oleh perusahaan ternama di dunia <br>
                        ikutilah dan raih manfaatnya </p>
                    </div>
                </div>
            </div>
        </section>

        <section id="course">
            <div class="container course">
                <div class="row">
                    <div class="col-md-5">
                        <h2>Recommended For You</h2>
                        <p>Here is our recommend course that might you want to learn<br>from our expert instructions.</p>
                    </div>
                </div>
            <div class="row">
              <?php
$no = 1;
$query = mysqli_query($koneksi, "SELECT * FROM challenge ORDER BY id_challenge ASC LIMIT 6");
while ($row = mysqli_fetch_assoc($query)) {
	$deskripsi = $row["deskripsi"];
	if (strlen($deskripsi) > 100) {
		$deskripsi = substr($deskripsi, 0, 100) . "...";
	}
	?>
            <div class="col-md-4 col-sm-12 mb-3" <?php echo $no++; ?>>
                <div class="card white-bg shadow  mb-3 ">
                    <div class="wrapper wrapper-kelas rounded-top js-balanced-height-img">
                    <img src="img/challenge/<?php echo $row['image']; ?>" style=" height: 200px; display: block;
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
                            <?php echo $row['nama_ch']; ?>
                            </a>
                        </h5>
                        <span class="tipe">oleh:
                            <span class="text-muted"><?php echo $row['oleh']; ?>
                            </span>
                        </span>
                        <div>
                            <?php echo $deskripsi; ?>
                        </div>
                    </div>
                </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-12 col-lg text-center text-lg-left">
                                <small style="color: #007bff;">Point : <?php echo $row['hadiah']; ?></small>
                            </div>
                        </div>
                    </div>
                    <?php
if ($_SESSION['statusUser'] != "login") {
		?>
                        <div class="col">
                      <button class="btn btn-danger btn-block shadow" style="margin-bottom: 10px;" disabled="true"> Anda Harus Login</button>
                    </div>
                <?php } else {?>
                <div class="card-footer">
                            <a data-toggle="modal" data-target="#ikut<?php echo $no; ?>" style=" color: white; margin-bottom: 5px; background-color: #10BFC2;  display: flex;justify-content: center; "class="btn" >Ikuti</a>
                        </div>
                    <?php }?>
                    </div>
                </div>

        <!-- modal insert kursus-->
            <div class="example-modal">
                <div id="ikut<?php echo $no; ?>" class="modal fade" role="dialog" style="display:none;">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                 <h3 class="modal-title">Konfirmasi Mengikuti Challenge</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                              <div class="modal-body">
                                <h4 align="center" >Apakah anda yakin ingin mengikuti Challenge <strong><?php echo $row['nama_ch']; ?></strong> dengan hadiah sebesar <strong><?php echo $row['hadiah']; ?></strong><strong><span class="grt"></span></strong> point ?</h4>
                                <form method="post" action="admin/lib/proses.php">
                                    <input type="hidden" class="form-control-plaintext" name="mengikuti" value="YA">
                                    <input type="hidden" class="form-control-plaintext" name="id_challenge" placeholder="id_job" value="<?php echo $row['id_challenge']; ?>">
                                    <input type="hidden" class="form-control-plaintext" name="id_user" placeholder="id_user" value="<?php echo $_SESSION['id_user']; ?>">
                              </div>
                              <div class="modal-footer">
                                <button id="nodelete" type="button" class="btn btn-danger" data-dismiss="modal" style=" color: white; margin-bottom: 5px;  display: flex;justify-content: center; ">Batal</button>
                                 <input type="submit" name="ikutchallenge" class="btn" style=" color: white; margin-bottom: 5px; background-color: #10BFC2;  display: flex;justify-content: center; " value="Ikuti">
                              </div>
                          </form>
                            </div>
                          </div>
                        </div>
                      </div>
            <!-- modal insert close -->

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

        </section> -->

<?php

include 'template/footer.php';

?>