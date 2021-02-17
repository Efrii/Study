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
                <i class="mdi mdi-book-open mr-3"></i>Daftar Materi<hr>
          </h3>
          <div class="box-tools pull-left" style="margin-bottom: 10px;">
            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#tambahmateri"><i class="mdi mdi-book-open"></i> Tambah Materi</a>
          </div>
        </div>
        <div class="box-body">

          <div class="table-responsive22">
            <table id="table" class="table table-striped table-bordered">
                <thead>
                <tr>
                  <th scope="col">No.</th>
                  <th scope="col">Nama Kursus</th>
                  <th scope="col">Nama Materi</th>
                  <th scope="col">Isi</th>
                  <th scope="col">Edit</th>
                  <th scope="col">Hapus</th>
                </tr>
              </thead>
              <tbody>
                  <?php
$no = 1;
$queryView = mysqli_query($koneksi, "SELECT * FROM materi INNER JOIN kursus ON materi.id_kursus=kursus.id_kursus");
while ($row = mysqli_fetch_assoc($queryView)) {
	$deskripsi = $row["isi"];
	if (strlen($deskripsi) > 1000) {
		$deskripsi = substr($deskripsi, 0, 1000) . "...";
	}
	?>
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <!-- <td><?php //echo $row['id_kursus']; ?></td> -->
                    <td><?php echo $row['nama_kursus']; ?></td>
                    <td><?php echo $row['nama']; ?></td>
                    <td><?php echo $deskripsi; ?></td>
                    <td>
                      <a href="#" class="btn btn-primary btn-flat btn-xs" data-toggle="modal" data-target="#updatemateri<?php echo $no; ?>">
                        <i class="fa fa-user-edit"></i>
                      </a>
                    </td>
                    <td>
                      <a href="#" class="btn btn-danger btn-flat btn-xs" data-toggle="modal" data-target="#deletemateri<?php echo $no; ?>">
                        <i class="fa fa-trash"></i>
                      </a>



                      <!-- modal delete -->
                      <div class="example-modal">
                        <div id="deletemateri<?php echo $no; ?>" class="modal fade" role="dialog" style="display:none;">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                 <h3 class="modal-title">Konfirmasi Delete Data Materi</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <h4 align="center" >Apakah anda yakin ingin menghapus materi <strong><?php echo $row['nama']; ?></strong> dengan kursus <strong><?php echo $row['nama_kursus']; ?></strong><strong><span class="grt"></span></strong> ?</h4>
                              </div>
                              <div class="modal-footer">
                                <button id="nodelete" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cancle</button>
                                <a href="../lib/proses.php?act=deletemateri&id=<?php echo $row['id_materi']; ?>" class="btn btn-primary">Hapus</a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div><!-- modal delete -->



                      <!-- modal update kursus -->
                      <div class="example-modal">
                        <div id="updatemateri<?php echo $no; ?>" class="modal fade bd-example-modal-lg" role="dialog" style="display:none;">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h3 class="modal-title">Edit Data Kursus</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              </div>
                              <div class="modal-body">
                                <form action="../lib/proses.php" method="post" enctype="multipart/form-data">
                                  <?php
$id_materi = $row['id_materi'];
	$query = "SELECT * FROM materi WHERE id_materi='$id_materi'";
	$result = mysqli_query($koneksi, $query);
	while ($row = mysqli_fetch_assoc($result)) {
		?>
                                  <div class="form-group">
                                    <div class="row">
                                      <label class="col-sm-3 control-label text-right">Nama Kursus <span class="text-red" style="color: red;">*</span></label>
                                      <div class="col-sm-8">
                                        <input type="text" class="form-control" name="nama" placeholder="Nama Kursus" value="<?php echo $row['nama']; ?>">
                                        <input type="hidden" name="id_materi" value="<?php echo $row['id_materi']; ?>">
                                      </div>
                                    </div>
                                  </div>
                                   <div class="form-group">
                                    <div class="row">
                                      <label class="col-sm-3 control-label text-right">Isi Materi <span class="text-red" style="color: red;">*</span></label>
                                      <div class="col-sm-8">
                                        <textarea class="summernote" name="isi" class="textboxclass form-control" placeholder="Isi"><?php echo $row['isi']; ?></textarea>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
                                    <input type="submit" name="updatemateri" class="btn btn-primary" value="Edit">
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
              <div id="tambahmateri" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
               <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                      <h3 class="modal-title">Tambah Data Materi</h3>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form action="../lib/proses.php" method="post" role="form" enctype="multipart/form-data">
                        <div class="form-group">
                          <div class="row">
                          <label class="col-sm-3 control-label text-right">Nama Kursus <span class="text-red" style="color: red;">*</span></label>
                          <div class="col-sm-8">
                            <select name="id_kursus" class="form-control form-control-sm" required="">
                              <option value="">Pilih Kursus</option>
                                                            <?php
$query_kursus = "SELECT * FROM kursus";
$data = mysqli_query($koneksi, $query_kursus);
while ($k = mysqli_fetch_array($data)) {

	?>
                              <option value="<?php echo $k['id_kursus'] ?>"><?php echo $k['nama_kursus']; ?></option>
                              <?php }?>
                            </select>

                          </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="row">
                          <label class="col-sm-3 control-label text-right">Nama Materi <span class="text-red" style="color: red;">*</span></label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="nama" placeholder="Nama Materi" value="" required="">
                          </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="row">
                          <label class="col-sm-3 control-label text-right">Isi Materi <span class="text-red" style="color: red;">*</span></label>
                          <div class="col-sm-8">
                            <textarea class="summernote" name="isi" class="textboxclass form-control" placeholder="Isi" required></textarea>
                          </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button id="nosave" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
                          <input type="submit" name="tambahmateri" class="btn btn-primary" value="Simpan">
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