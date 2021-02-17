<?php

session_start();
if ($_SESSION['status'] != "login") {
	header("location:../login.php?pesan=belum_login");
}

include '../../koneksiDB.php';
include '../template/header.php';

?>

<div class="col-md-10 p-5 pt-2">
  <div class="box-header with-border">
          <h3>
                <i class="fas fa-laptop-house mr-3"></i>Daftar Pekerjaan<hr>
          </h3>
          <div style="margin-bottom: 10px;" class="box-tools pull-left">
            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#tambahjob"><i class="fa fa-laptop-house"></i>Tambah Pekerjaan</a>
          </div>
        </div>
        <div class="box-body">

          <div class="table-responsive22">
            <table id="table" style="font-size: 14px;" class="table table-striped table-bordered">
                <thead>
                <tr>
                  <th scope="col">No.</th>
                  <th scope="col">Nama Job</th>
                  <th scope="col">Oleh</th>
                  <th scope="col">Tipe Kontrak</th>
                  <th scope="col">Posisi</th>
                  <th scope="col">Jenis</th>
                  <th scope="col">Lokasi</th>
                  <th scope="col">Deskripsi</th>
                  <th scope="col">Gambar</th>
                  <th scope="col">Edit</th>
                  <th scope="col">Hapus</th>
                </tr>
              </thead>
              <tbody>
                  <?php
$no = 1;
$queryView = mysqli_query($koneksi, "SELECT * FROM job");
while ($row = mysqli_fetch_assoc($queryView)) {
	// $deskripsi = $row["deskripsi"];
	// $harga = $row['harga'];
	// //memuat pecahan ke mata uang indonesia
	// $uang = "Rp." . number_format($harga, 2, ',', '.');
	// if (strlen($deskripsi) > 100) {
	// 	$deskripsi = substr($deskripsi, 0, 100) . "...";
	// }
	?>
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $row['nama_job']; ?></td>
                    <td><?php echo $row['oleh']; ?></td>
                    <td><?php echo $row['tipe_kontrak']; ?></td>
                    <td><?php echo $row['posisi']; ?></td>
                    <td><?php echo $row['jenis']; ?></td>
                    <td><?php echo $row['lokasi']; ?></td>
                    <td><?php echo $row['deskripsi']; ?></td>
                    <td>
                      <img src="../../img/job/<?php echo $row['image']; ?>" style="height: 100px; width: 100px;">
                    </td>
                    <td>
                      <a href="#" class="btn btn-primary btn-flat btn-xs" data-toggle="modal" data-target="#updatejob<?php echo $no; ?>">
                        <i class="fa fa-user-edit"></i>
                      </a>
                    </td>
                    <td>
                      <a href="#" class="btn btn-danger btn-flat btn-xs" data-toggle="modal" data-target="#deletejob<?php echo $no; ?>">
                        <i class="fa fa-trash"></i>
                      </a>



                      <!-- modal delete -->
                      <div class="example-modal">
                        <div id="deletejob<?php echo $no; ?>" class="modal fade" role="dialog" style="display:none;">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h3 class="modal-title">Konfirmasi Delete Data Kursus</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <h4 align="center" >Apakah anda yakin ingin menghapus Pekerjaan <strong><?php echo $row['nama_job']; ?></strong><strong><span class="grt"></span></strong> ?</h4>
                              </div>
                              <div class="modal-footer">
                                <button id="nodelete" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
                                <a href="../lib/proses.php?act=deletejob&id=<?php echo $row['id_job']; ?>" class="btn btn-primary">Hapus</a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div><!-- modal delete -->







                      <!-- modal update kursus -->
                      <div class="example-modal">
                        <div id="updatejob<?php echo $no; ?>" class="modal fade bd-example-modal-lg" role="dialog" style="display:none;">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h3 class="modal-title">Edit Data Job</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              </div>
                              <div class="modal-body">
                                <form action="../lib/proses.php" method="post" enctype="multipart/form-data">
                                  <?php
$id_job = $row['id_job'];
	$query = "SELECT * FROM job WHERE id_job='$id_job'";
	$result = mysqli_query($koneksi, $query);
	while ($row = mysqli_fetch_assoc($result)) {
		?>
                                  <div class="form-group">
                                    <div class="row">
                                      <label class="col-sm-3 control-label text-right">Nama Job <span class="text-red" style="color: red;">*</span></label>
                                      <div class="col-sm-8">
                                        <input type="text" class="form-control" name="nama_job" placeholder="Nama Job" value="<?php echo $row['nama_job']; ?>"
                                        >
                                        <input type="hidden" name="id_job" value="<?php echo $row['id_job']; ?>">
                                      </div>
                                    </div>
                                  </div>
                                   <div class="form-group">
                                    <div class="row">
                                      <label class="col-sm-3 control-label text-right">Oleh <span style="color: red;" class="text-red">*</span></label>
                                      <div class="col-sm-8">
                                        <input type="text" class="form-control" name="oleh" placeholder="Oleh" value="<?php echo $row['oleh']; ?>">
                                      </div>
                                    </div>
                                  </div>
                                   <div class="form-group">
                                    <div class="row">
                                      <label class="col-sm-3 control-label text-right">Tipe Kontrak <span style="color: red;" class="text-red">*</span></label>
                                      <div class="col-sm-8">
                                        <select class="form-control form-control-sm" name="tipe_kontrak">
                                        <option value="<?php echo $row['tipe_kontrak']; ?>"><?php echo $row['tipe_kontrak']; ?></option>
                                        <option value="Full-Time">Full-Time</option>
                                        <option value="Part-Time">Part-Time</option>
                                        <option value="Freelance">Freelance</option>
                                      </select>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="row">
                                      <label class="col-sm-3 control-label text-right">Posisi <span style="color: red;" class="text-red">*</span></label>
                                      <div class="col-sm-8">
                                        <input type="text" class="form-control" name="posisi" placeholder="Posisi" value="<?php echo $row['posisi']; ?>">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="row">
                                      <label class="col-sm-3 control-label text-right">Jenis <span style="color: red;" class="text-red">*</span></label>
                                      <div class="col-sm-8">
                                        <input type="text" class="form-control" name="jenis" placeholder="Jenis" value="<?php echo $row['jenis']; ?>">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="row">
                                      <label class="col-sm-3 control-label text-right">Lokasi <span style="color: red;" class="text-red">*</span></label>
                                      <div class="col-sm-8">
                                        <input type="text" class="form-control" name="lokasi" placeholder="lokasi" value="<?php echo $row['lokasi']; ?>">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="row">
                                      <label class="col-sm-3 control-label text-right">Deskripsi <span class="text-red" style="color: red;">*</span></label>
                                      <div class="col-sm-8">
                                        <textarea style="height: 100px;" name="deskripsi" class="textboxclass form-control" placeholder="Deskripsi"><?php echo $row['deskripsi']; ?></textarea>
                                      </div>
                                    </div>
                                  </div>
                                   <div class="form-group">
                                    <div class="row">
                                      <label class="col-sm-3 control-label text-right">Gambar <span style="color: red;" class="text-red">*</span>
                                      </label>
                                      <div class="col-sm-8">
                                        <img src="../../img/job/<?php echo $row['image']; ?>" height="120" width="150" />
                                        <input type="file" class="form-control" name="image" value="<?php echo $row['image']; ?>"/>
                                       </div>
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button id="noedit" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
                                    <input type="submit" name="updatejob" class="btn btn-primary" value="Simpan">
                                  </div>
                                  <?php
}
	?>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div><!-- modal update user -->

                      <?php }?>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>





            <!-- modal insert joB-->
            <div class="example-modal">
              <div id="tambahjob" class="modal fade" role="dialog" style="display:none;" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h3 class="modal-title">Tambah Data Job</h3>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form action="../lib/proses.php" method="post" role="form" enctype="multipart/form-data">
                        <div class="form-group">
                          <div class="row">
                            <label class="col-sm-3 control-label text-right">Nama Job <span class="text-red" style="color: red;">*</span></label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" name="nama_job" placeholder="Nama Job" value="" required="">
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="row">
                            <label class="col-sm-3 control-label text-right">Oleh <span class="text-red" style="color: red;">*</span></label>
                            <div class="col-sm-8">
                              <input type="text" name="oleh" class="form-control" value="" placeholder="Oleh" required="">
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="row">
                            <label class="col-sm-3 control-label text-right">Tipe Kontrak <span class="text-red" style="color: red;">*</span></label>
                            <div class="col-sm-8">
                              <select class="form-control form-control-sm" name="tipe_kontrak" required>
                                <option value="">Pilih Tingkatan</option>
                                <option value="Full-Time">Full-Time</option>
                                <option value="Part-Time">Part-Time</option>
                                <option value="Freelance">Freelance</option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="row">
                            <label class="col-sm-3 control-label text-right">Posisi <span class="text-red" style="color: red;">*</span></label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" name="posisi" placeholder="Posisi" value="" required="">
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="row">
                            <label class="col-sm-3 control-label text-right">Jenis <span class="text-red" style="color: red;">*</span></label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" name="jenis" placeholder="Jenis" value="" required="">
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="row">
                            <label class="col-sm-3 control-label text-right">Lokasi <span class="text-red" style="color: red;">*</span></label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" name="lokasi" placeholder="Lokasi" value="" required="">
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="row">
                            <label class="col-sm-3 control-label text-right">Deskripsi <span class="text-red" style="color: red;">*</span></label>
                            <div class="col-sm-8">
                              <textarea class="form-control" name="deskripsi" placeholder="Deskripsi" required=""></textarea>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="row">
                            <label class="col-sm-3 control-label text-right">Gambar <span class="text-red" style="color: red;">*</span></label>
                            <div class="col-sm-8">
                              <input type="file" class="form-control" name="image" placeholder="Gambar" value="" required="">
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button id="nosave" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
                          <input type="submit" name="tambahjob" class="btn btn-primary" value="Simpan">
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- modal insert close -->
          </div>
        </div>
      </div>
</div>


  <?php include '../template/footer.php';?>