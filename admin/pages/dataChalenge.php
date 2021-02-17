<?php
session_start();
if ($_SESSION['status'] != "login") {
	header("location:../login.php?pesan=belum_login");
}
include '../../koneksiDB.php';
include '../template/header.php';

?>

          <div class="col-md-10 p-5 pt-2">
              <h3>
                <i class="fas fa-laptop-code mr-3"></i>Daftar Challenge<hr>
              </h3>
              <div class="box-tools pull-left" style="margin-bottom: 10px;">
	            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#tambahchallenge"><i class="fa fa-laptop-code"></i> Tambah Challenge</a>
	          </div>

              <table style="font-size: 14px;" id="table" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Challenge</th>
                    <th scope="col">Oleh</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Riward</th>
                    <th scope="col">Image</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Hapus</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
$no = 1;
$query = mysqli_query($koneksi, "SELECT * FROM challenge");
while ($data = mysqli_fetch_assoc($query)) {
	$deskripsi = $data["deskripsi"];
	if (strlen($deskripsi) > 10) {
		$deskripsi = substr($deskripsi, 0, 10) . "...";
	}
	?>
                  <tr>
                    <th scope="row"><?php echo $no++; ?></th>
                    <td><?php echo $data['nama_ch']; ?></td>
                    <td><?php echo $data['oleh']; ?></td>
                    <td><?php echo $deskripsi; ?></td>
                    <td><?php echo $data['hadiah']; ?></td>
                    <td>
                      <img src="../../img/challenge/<?php echo $data['image']; ?>" style="height: 100px; width: 100px;">
                    </td>
                    <td>
                      <a href="#" class="btn btn-primary btn-flat btn-xs" data-toggle="modal" data-target="#updatechallenge<?php echo $no; ?>">
                        <i class="fa fa-user-edit"></i>
                      </a>
                    </td>
                    <td>
                      <a href="#" class="btn btn-danger btn-flat btn-xs" data-toggle="modal" data-target="#deletechallenge<?php echo $no; ?>">
                        <i class="fa fa-trash"></i>
                      </a>

                    	<!-- modal delete -->
                      <div class="example-modal">
                        <div id="deletechallenge<?php echo $no; ?>" class="modal fade" role="dialog" style="display:none;">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h3 class="modal-title">Konfirmasi Delete Data Challenge</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <h4 align="center" >Apakah anda yakin ingin menghapus Challenge <strong><?php echo $data['nama_ch']; ?></strong><strong><span class="grt"></span></strong> ?</h4>
                              </div>
                              <div class="modal-footer">
                                <button id="nodelete" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
                                <a href="../lib/proses.php?act=deletechallenge&id=<?php echo $data['id_challenge']; ?>" class="btn btn-primary">Hapus</a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div><!-- modal delete -->




                      <!-- modal update kursus -->
                      <div class="example-modal">
                        <div id="updatechallenge<?php echo $no; ?>" class="modal fade bd-example-modal-lg" role="dialog" style="display:none;">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h3 class="modal-title">Edit Data Challenge</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              </div>
                              <div class="modal-body">
                                <form action="../lib/proses.php" method="post" enctype="multipart/form-data">
                                  <?php
$id_challenge = $data['id_challenge'];
	$query1 = "SELECT * FROM challenge WHERE id_challenge='$id_challenge'";
	$result = mysqli_query($koneksi, $query1);
	while ($data = mysqli_fetch_assoc($result)) {
		?>
                                  <div class="form-group">
                                    <div class="row">
                                      <label class="col-sm-3 control-label text-right">Nama Challenge <span class="text-red" style="color: red;">*</span></label>
                                      <div class="col-sm-8">
                                        <input type="text" class="form-control" name="nama_ch" placeholder="Nama Challenge" value="<?php echo $data['nama_ch']; ?>">
                                        <input type="hidden" name="id_challenge" value="<?php echo $data['id_challenge']; ?>">
                                      </div>
                                    </div>
                                  </div>
                                   <div class="form-group">
                                    <div class="row">
                                      <label class="col-sm-3 control-label text-right">Oleh <span class="text-red" style="color: red;">*</span></label>
                                      <div class="col-sm-8">
                                        <input type="text" class="form-control" name="oleh" placeholder="Oleh" value="<?php echo $data['oleh']; ?>">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="row">
                                    <label class="col-sm-3 control-label text-right">Deskripsi <span class="text-red" style="color: red;">*</span></label>
                                    <div class="col-sm-8">
                                      <textarea id="summernote_challenge" name="deskripsi" class="textboxclass form-control" placeholder="Deskripsi" value="<?php echo $data['deskripsi']; ?>"></textarea>
                                    </div>
                                    </div>
                                  </div>
                                   <div class="form-group">
                                    <div class="row">
                                      <label class="col-sm-3 control-label text-right">Riward <span class="text-red" style="color: red;">*</span></label>
                                      <div class="col-sm-8">
                                        <input type="text" class="form-control" name="hadiah" placeholder="Hadiah" value="<?php echo $data['hadiah']; ?>">
                                      </div>
                                    </div>
                                  </div>
                                   <div class="form-group">
                                    <div class="row">
                                      <label class="col-sm-3 control-label text-right">Image <span class="text-red" style="color: red;">*</span>
                                      </label>
                                      <div class="col-sm-8">
                                         <img src="../../img/challenge/<?php echo $data['image']; ?>" style="width: 120px;float: left;margin-bottom: 5px;"><input type="file" class="form-control" name="image" placeholder="Image">
                                       </div>
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button id="noedit" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
                                    <input type="submit" name="updatechallenge" class="btn btn-primary" value="Edit">
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


              <!-- modal insert challenge-->
            <div class="example-modal">
              <div id="tambahchallenge" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
               <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h3 class="modal-title">Tambah Data Challenge</h3>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form action="../lib/proses.php" method="post" role="form" enctype="multipart/form-data">
                        <div class="form-group">
                          <div class="row">
                          <label class="col-sm-3 control-label text-right">Nama Challenge <span class="text-red" style="color: red;">*</span></label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="nama_ch" placeholder="Nama Challenge" value="" required>
                          </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="row">
                          <label class="col-sm-3 control-label text-right">Oleh <span class="text-red" style="color: red;">*</span></label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="oleh" placeholder="Penyelenggara" value="" required>
                          </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="row">
                          <label class="col-sm-3 control-label text-right">Deskripsi <span class="text-red" style="color: red;">*</span></label>
                          <div class="col-sm-8">
                            <textarea id="challenge" name="deskripsi" class="textboxclass form-control" placeholder="Deskripsi" required></textarea>
                          </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="row">
                          <label class="col-sm-3 control-label text-right">Hadiah <span class="text-red" style="color: red;">*</span></label>
                          <div class="col-sm-8">
                            <input type="number" class="form-control" name="hadiah" placeholder="Hadiah *Dalam Angka*" value="" required>
                          </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="row">
                          <label class="col-sm-3 control-label text-right">Image <span class="text-red" style="color: red;">*</span></label>
                          <div class="col-sm-8">
                            <input type="file" class="form-control" name="image" placeholder="Cover" value="" required>
                          </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button id="nosave" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
                          <input type="submit" name="tambahchallenge" class="btn btn-primary" value="Simpan">
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


      <?php include '../template/footer.php';?>