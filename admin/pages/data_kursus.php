<?php
session_start();
//cek apakah admin sudah login atau belum jika belum maka akan redirect ke halaman login
if ($_SESSION['status'] != "login") {
	header("location:../login.php?pesan=belum_login");
}
include '../../koneksiDB.php';
include '../template/header.php';
?>

<div class="col-md-10 p-5 pt-2">
  <div class="box-header with-border">
          <h3>
                <i class="fas fa-book mr-3"></i>Daftar Kursus<hr>
          </h3>
          <div class="box-tools pull-left" style="margin-bottom: 10px;">
            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#tambahkursus"><i class="fa fa-book"></i> Tambah Kursus</a>
          </div>
        </div>
        <div class="box-body">

          <div class="table-responsive22">
            <table id="table" class="table table-striped table-bordered">
                <thead>
                <tr>
                  <th scope="col">No.</th>
                  <th scope="col">Nama Kursus</th>
                  <th scope="col">Deskripsi</th>
                  <th scope="col">Tingkatan</th>
                  <th scope="col">Cover</th>
                  <th scope="col">Harga</th>
                  <th scope="col">Edit</th>
                  <th scope="col">Hapus</th>
                </tr>
              </thead>
              <tbody>
                  <?php
$no = 1;
$queryView = mysqli_query($koneksi, "SELECT * FROM kursus");
while ($row = mysqli_fetch_assoc($queryView)) {
	$deskripsi = $row["deskripsi"];
	$harga = $row['harga'];
	//memuat pecahan ke mata uang indonesia
	$uang = "Rp." . number_format($harga, 2, ',', '.');
	if (strlen($deskripsi) > 100) {
		$deskripsi = substr($deskripsi, 0, 100) . "...";
	}
	?>
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <!-- <td><?php //echo $row['id_kursus']; ?></td> -->
                    <td><?php echo $row['nama_kursus']; ?></td>
                    <td><?php echo $deskripsi; ?></td>
                    <td><?php echo $row['tingkatan']; ?></td>
                    <td>
                      <img src="../../img/kursus/<?php echo $row['cover']; ?>" style="height: 100px; width: 100px;">
                    </td>
                    <td><?php echo $uang; ?></td>
                    <td>
                      <a href="#" class="btn btn-primary btn-flat btn-xs" data-toggle="modal" data-target="#updatekursus<?php echo $no; ?>">
                        <i class="fa fa-user-edit"></i>
                      </a>
                    </td>
                    <td>
                      <a href="#" class="btn btn-danger btn-flat btn-xs" data-toggle="modal" data-target="#deletekursus<?php echo $no; ?>">
                        <i class="fa fa-trash"></i>
                      </a>


                      <!-- modal delete -->
                      <div class="example-modal">
                        <div id="deletekursus<?php echo $no; ?>" class="modal fade" role="dialog" style="display:none;">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h3 class="modal-title">Konfirmasi Delete Data Kursus</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <h4 align="center" >Apakah Anda Yakin Ingin Menghapus Kursus <strong><?php echo $row['nama_kursus']; ?></strong><strong><span class="grt"></span></strong> ?</h4>
                              </div>
                              <div class="modal-footer">
                                <button id="nodelete" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
                                <a href="../lib/proses.php?act=deletekursus&id=<?php echo $row['id_kursus']; ?>" class="btn btn-primary">Hapus</a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div><!-- modal delete -->




                      <!-- modal update kursus -->
                      <div class="example-modal">
                        <div id="updatekursus<?php echo $no; ?>" class="modal fade bd-example-modal-lg" role="dialog" style="display:none;">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h3 class="modal-title">Edit Data Kursus</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              </div>
                              <div class="modal-body">
                                <form action="../lib/proses.php" method="post" enctype="multipart/form-data">
                                  <?php
$id_kursus = $row['id_kursus'];
	$query = "SELECT * FROM kursus WHERE id_kursus='$id_kursus'";
	$result = mysqli_query($koneksi, $query);
	while ($row = mysqli_fetch_assoc($result)) {
		?>
                                  <div class="form-group">
                                    <div class="row">
                                      <label class="col-sm-3 control-label text-right">Nama Kursus <span class="text-red" style="color: red;">*</span></label>
                                      <div class="col-sm-8">
                                        <input type="text" class="form-control" name="nama_kursus" placeholder="Nama Kursus" value="<?php echo $row['nama_kursus']; ?>">
                                        <input type="hidden" name="id_kursus" value="<?php echo $row['id_kursus']; ?>">
                                      </div>
                                    </div>
                                  </div>
                                   <div class="form-group">
                                    <div class="row">
                                      <label class="col-sm-3 control-label text-right">Deskripsi <span style="color: red;" class="text-red">*</span></label>
                                      <div class="col-sm-8">
                                        <textarea style="height: 100px;" name="deskripsi" class="textboxclass form-control" placeholder="Deskripsi"><?php echo $row['deskripsi']; ?></textarea>
                                      </div>
                                    </div>
                                  </div>
                                   <div class="form-group">
                                    <div class="row">
                                      <label class="col-sm-3 control-label text-right">Tingkatan <span class="text-red" style="color: red;">*</span></label>
                                      <div class="col-sm-8">
                                        <select class="form-control form-control-sm" name="tingkatan">
                                        <option value="<?php echo $row['tingkatan']; ?>"><?php echo $row['tingkatan']; ?></option>
                                        <option value="Dasar">Dasar</option>
                                        <option value="Pemula">Pemula</option>
                                        <option value="Menengah">Menengah</option>
                                        <option value="Mahir">Mahir</option>
                                        <option value="Profesional">Profesional</option>
                                      </select>
                                      </div>
                                    </div>
                                  </div>
                                   <div class="form-group">
                                    <div class="row">
                                      <label class="col-sm-3 control-label text-right">Cover <span class="text-red" style="color: red;">*</span>
                                      </label>
                                      <div class="col-sm-8">
                                         <img src="../../img/kursus/<?php echo $row['cover']; ?>" style="width: 120px;float: left;margin-bottom: 5px;"><input type="file" class="form-control" name="cover" placeholder="Cover">
                                       </div>
                                    </div>
                                  </div>
                                   <div class="form-group">
                                    <div class="row">
                                      <label class="col-sm-3 control-label text-right">Harga <span class="text-red" style="color: red;">*</span></label>
                                      <div class="col-sm-8">
                                        <input type="text" class="form-control" name="harga" placeholder="Harga" value="<?php echo $row['harga']; ?>">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button id="noedit" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
                                    <input type="submit" name="update" class="btn btn-primary" value="Edit">
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




            <!-- modal insert kursus-->
            <div class="example-modal">
              <div id="tambahkursus" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
               <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                      <h3 class="modal-title">Tambah Data Kursus</h3>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form action="../lib/proses.php" method="post" role="form" enctype="multipart/form-data">
                        <div class="form-group">
                          <div class="row">
                          <label class="col-sm-3 control-label text-right">Nama Kursus <span class="text-red" style="color: red;">*</span></label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="nama_kursus" placeholder="Nama Kursus" value="" required>
                          </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="row">
                          <label class="col-sm-3 control-label text-right">Deskripi <span class="text-red" style="color: red;">*</span></label>
                          <div class="col-sm-8">
                            <textarea style="height: 100px;" name="deskripsi" class="textboxclass form-control" placeholder="Deskripsi" required></textarea>
                          </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="row">
                          <label class="col-sm-3 control-label text-right">Tingkatan <span class="text-red" style="color: red;">*</span></label>
                          <div class="col-sm-8">
                            <select class="form-control form-control-sm" name="tingkatan" required>
                              <option value="">Pilih Tingkatan</option>
                              <option value="Dasar">Dasar</option>
                              <option value="Pemula">Pemula</option>
                              <option value="Menengah">Menengah</option>
                              <option value="Mahir">Mahir</option>
                              <option value="Profesional">Profesional</option>
                            </select>
                          </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="row">
                          <label class="col-sm-3 control-label text-right">Cover <span class="text-red" style="color: red;">*</span></label>
                          <div class="col-sm-8">
                            <input type="file" class="form-control" name="cover" placeholder="Cover" value="" required>
                          </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="row">
                          <label class="col-sm-3 control-label text-right">Harga <span class="text-red" style="color: red;">*</span></label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="harga" placeholder="Harga" value="" required>
                          </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button id="nosave" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
                          <input type="submit" name="tambah" class="btn btn-primary" value="Simpan">
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