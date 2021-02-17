<?php
session_start();
if (isset($_GET['id_job'])) {
	$id_job = $_GET['id_job'];
} else {
	die("ERROR. Tidak ada id terpilih");
}

include 'koneksiDB.php';
include 'template/header.php';

$query = mysqli_query($koneksi, "SELECT * FROM job WHERE id_job='$id_job'");
$data = mysqli_fetch_array($query);
?>

<div class="content-wrapper" style="margin-top: 0px;">


    <!-- BAGIAN BACKGROUND ABU-ABU -->
    <div class="container-fluid cover-challenge border-job" >
        <img style="height: 550px; width: 100%;" src="https://www.kboo.fm/sites/default/files/images/lead/station_content/blackbird.jpg">
    </div>

    <!-- BAGIAN PROFILE PICTURE -->
    <div class="container-fluid">
        <div class="rangga container shadow-lg p-3 mb-5 bg-white rounded">
            <div class="row pb-lg-5">
                <div class="col-md-10">
                    <div class="row" >
                        <div class="col-xl-3 col-lg-4 col-sm-5 mb-sm-7">
                            <div class="wrapper-kelas">
                                <img src="img/job/<?php echo $data['image']; ?>" style="display: block; width: 100%; height: auto; max-height: 400px;">
                            </div>
                        </div>
                        <div class="col-xl-9 col-lg-8 col-sm-7 pt-3 pl-lg-4">
                            <span class="badge badge-secondary"><?php echo $data['posisi']; ?></span>
                            <h2><?php echo $data['nama_job']; ?></h2>
                            <p></p>
                            <small class="text-muted d-block mb-3">Diselenggarakan oleh: <a href=#"><?php echo $data['oleh']; ?></a></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- TABBED MENU -->
    <div class="container-fluid" style="margin-top: 100px;">
        <div class="container pt-5 border-top">
            <div class="row">
                <div class="col-xl-9 col-lg-8 pr-lg-5">

                    <b>Tipe Kontrak</b>
                    <p><?php echo $data['tipe_kontrak']; ?></p>
                    <br>
                    <b>Posisi</b>
                    <p><?php echo $data['posisi']; ?></p>
                    <br>
                    <b>Jenis Industri</b>
                    <p><?php echo $data['jenis']; ?></p>
                    <br>
                    <b>Lokasi Kerja</b>
                    <p><?php echo $data['lokasi']; ?></p>
                    <br>
                    <b>Syarat Pelamar</b>
                    <div class="fr-view">
                    	<p>
                    		<?php echo $data['deskripsi']; ?>
                    	</p>
                    </div>
                  </div>
                  <?php
if ($_SESSION['statusUser'] != "login") {
	?>
  <div class="col-xl-3 col-lg-4 pl-lg-4 mb-5">
                    <h3 class="mb-4 text-center">Tertarik?</h3>
                      <button class="btn btn-danger btn-lg btn-block shadow" disabled="true"> Anda Harus Login</button>
                    </div>
<?php } else {
	?>
  <div class="col-xl-3 col-lg-4 pl-lg-4 mb-5">
                    <h3 class="mb-4 text-center">Tertarik?</h3>
                  <a data-toggle="modal" data-target="#masukkanlamaran" class="btn btn-primary btn-lg btn-block shadow">
                            <i class="mdi mdi-briefcase-upload"></i> Masukkan Lamaran
                        </a>
                    </div>
<?php }?>

            	</div>
        	</div>
    	</div>

    	<!-- modal insert kursus-->
            <div class="example-modal">
              <div id="masukkanlamaran" class="modal fade bd-example-modal-lg" role="dialog" style="display:none;">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h3 class="modal-title">Masukkan Lamaran <strong><?php echo $data['nama_job']; ?></strong></h3>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form action="admin/lib/proses.php" method="post" role="form" enctype="multipart/form-data">
                      	<div class="form-group">
                          <div class="row">
                          <label class="col-sm-3 control-label text-right">Oleh </label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control-plaintext" name="" placeholder="Nama Admin" value="<?php echo $data['oleh']; ?>" disabled>
                          </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="row">
                          <label class="col-sm-3 control-label text-right">Nama </label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control-plaintext" name="" placeholder="Nama Admin" value="<?php echo $_SESSION['nama_depan']; ?> <?php echo $_SESSION['nama_belakang']; ?>" disabled>
                          </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="row">
                          <label class="col-sm-3 control-label text-right">Email Untuk Di Hubungi  </label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control-plaintext" name="" placeholder="Nama Admin" value="<?php echo $_SESSION['email']; ?>" disabled>
                          </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="row">
                          <label class="col-sm-3 control-label text-right">No Telpon Untuk Di Hubungi </label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control-plaintext" name="" placeholder="Nama Admin" value="<?php echo $_SESSION['no_tlp']; ?>" disabled>
                          </div>
                          </div>
                        </div>
                        <div class="form-group">
                            <input type="hidden" class="form-control-plaintext" name="id_job" placeholder="id_job" value="<?php echo $id_job ?>">
                            <input type="hidden" class="form-control-plaintext" name="id_user" placeholder="id_user" value="<?php echo $_SESSION['id_user']; ?>">
                        </div>
                        <div class="form-group">
                          <div class="row">
                          <label class="col-sm-3 control-label text-right">Cover Latter <span class="text-red" style="color: red;">*</span></label>
                          <div class="col-sm-8">
                            <textarea class="form-control" name="cover_latter" placeholder="Cover Latter" required=""></textarea>
                          </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button id="nosave" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
                          <input type="submit" name="lamarjob" class="btn btn-primary" value="Lamar">
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- modal insert close -->
<?php
include 'template/footer.php';
?>