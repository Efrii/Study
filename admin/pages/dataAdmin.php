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
                <i class="fas fa-user-cog mr-3"></i>Daftar Admin<hr>
              </h3>
              <div style="margin-bottom: 10px;" class="box-tools pull-left">
                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#tambahadmin"><i class="fa fa-user-cog"></i> Tambah Admin</a>
              </div>
              <table id="table" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Username</th>
                    <th scope="col">Password</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Hapus</th>
                  </tr>
                </thead>
                <tbody>
                                  <?php
$no = 1;
$query = mysqli_query($koneksi, "SELECT * FROM admin");
while ($data = mysqli_fetch_assoc($query)) {
	//enkripsi dengan md5
	$pass = md5($data['password']);
	if (strlen($pass) > 10) {
		$pass = substr($pass, 0, 10) . "...";
	}
	?>
                  <tr>
                    <th scope="row"><?php echo $no++; ?></th>
                    <td><?php echo $data['nama']; ?></td>
                    <td><?php echo $data['username']; ?></td>
                    <td><?php echo $pass; ?></td>
                    <td>
                      <a href="#" class="btn btn-primary btn-flat btn-xs" data-toggle="modal" data-target="#updateadmin<?php echo $no; ?>">
                        <i class="fa fa-user-edit"></i>
                      </a>
                    </td>
                    <td>
                      <a href="#" class="btn btn-danger btn-flat btn-xs" data-toggle="modal" data-target="#deleteadmin<?php echo $no; ?>">
                        <i class="fa fa-trash"></i>
                      </a>

                      <!-- modal delete -->
                      <div class="example-modal">
                        <div id="deleteadmin<?php echo $no; ?>" class="modal fade" role="dialog" style="display:none;">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h3 class="modal-title">Konfirmasi Delete Data Admin</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <h4 align="center" >Apakah anda yakin ingin menghapus Admin <strong><?php echo $data['nama']; ?></strong><strong><span class="grt"></span></strong> ?</h4>
                              </div>
                              <div class="modal-footer">
                                <button id="nodelete" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
                                <a href="../lib/proses.php?act=deleteadmin&id=<?php echo $data['id']; ?>" class="btn btn-primary">Hapus</a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div><!-- modal delete -->





                      <!-- modal update kursus -->
                      <div class="example-modal">
                        <div id="updateadmin<?php echo $no; ?>" class="modal fade" role="dialog" style="display:none;">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h3 class="modal-title">Edit Data Admin</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              </div>
                              <div class="modal-body">
                                <form action="../lib/proses.php" method="post" enctype="multipart/form-data">
                                  <?php
$id = $data['id'];
	$queryUp = "SELECT * FROM admin WHERE id='$id'";
	$result = mysqli_query($koneksi, $queryUp);
	while ($data = mysqli_fetch_array($result)) {
		?>
                                  <div class="form-group">
                                    <div class="row">
                                      <label class="col-sm-3 control-label text-right">Nama Kursus <span class="text-red" style="color: red;">*</span></label>
                                      <div class="col-sm-8">
                                        <input type="text" class="form-control" name="nama" placeholder="Nama Admin" value="<?php echo $data['nama']; ?>">
                                        <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                                      </div>
                                    </div>
                                  </div>
                                   <div class="form-group">
                                    <div class="row">
                                      <label class="col-sm-3 control-label text-right">Username <span class="text-red" style="color: red;">*</span></label>
                                      <div class="col-sm-8">
                                        <input type="text" class="form-control" name="username" placeholder="username" value="<?php echo $data['username']; ?>">
                                      </div>
                                    </div>
                                  </div>
                                   <div class="form-group">
                                    <div class="row">
                                      <label class="col-sm-3 control-label text-right">Password <span class="text-red" style="color: red;">*</span></label>
                                      <div class="col-sm-8">
                                        <input type="text" class="form-control" name="password" placeholder="Password" value="<?php echo $data['password']; ?>">
                                      </div>
                                    </div>
                                  <div class="modal-footer">
                                    <button id="noedit" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
                                    <input type="submit" name="updateadmin" class="btn btn-primary" value="Edit">
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

              <!-- modal insert kursus-->
            <div class="example-modal">
              <div id="tambahadmin" class="modal fade" role="dialog" style="display:none;">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h3 class="modal-title">Tambah Data Admin</h3>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form action="../lib/proses.php" method="post" role="form" enctype="multipart/form-data">
                        <div class="form-group">
                          <div class="row">
                          <label class="col-sm-3 control-label text-right">Nama Admin <span class="text-red" style="color: red;">*</span></label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="nama" placeholder="Nama Admin" value="" required>
                          </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="row">
                          <label class="col-sm-3 control-label text-right">Username <span class="text-red" style="color: red;">*</span></label>
                          <div class="col-sm-8">
                            <input type="text" name="username" class="textboxclass form-control" placeholder="Username" required>
                          </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="row">
                          <label class="col-sm-3 control-label text-right">Password <span class="text-red" style="color: red;">*</span></label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="password" placeholder="Password" value="" required>
                          </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button id="nosave" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
                          <input type="submit" name="tambahadmin" class="btn btn-primary" value="Simpan">
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

<?php
include '../template/footer.php';
?>