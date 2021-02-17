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
                <i class="fas fa-user-circle mr-3"></i>Data User<hr>
              </h3>
              <table id="table" style="font-size: 14px;" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Pass</th>
                    <th scope="col">Tgl Lahir</th>
                    <th scope="col">Tmp Lahir</th>
                    <th scope="col">No Telfon</th>
                    <th scope="col">Sekolah</th>
                    <th scope="col">JK</th>
                    <th scope="col">Image</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Hapus</th>
                  </tr>
                </thead>
                <tbody>
                                  <?php
$no = 1;
$queryV = mysqli_query($koneksi, "SELECT * FROM user");
while ($data = mysqli_fetch_assoc($queryV)) {
	//enkripsi password dengan md5
	$tgl = date_create($data['tgl_lahir']);
	$forTgl = date_format($tgl, "d-m-Y");
	$enkripsi = md5($data['password']);
	if (strlen($enkripsi) > 5) {
		$enkripsi = substr($enkripsi, 0, 5) . "...";
	}
	?>
                  <tr>
                    <th scope="row"><?php echo $no++; ?></th>
                    <td><?php echo $data['nama_depan']; ?> <?php echo $data['nama_belakang']; ?></td>
                    <td><?php echo $data['email']; ?></td>
                    <td><?php echo $enkripsi; ?></td>
                    <td><?php echo $forTgl; ?></td>
                    <td><?php echo $data['tmp_lahir']; ?></td>
                    <td><?php echo $data['no_tlp']; ?></td>
                    <td><?php echo $data['sekolah']; ?></td>
                    <td><?php echo $data['jns_klamin']; ?></td>
                    <td>
                      <img src="../../img/user/<?php echo $data['image']; ?>" style="height: 40px; width: 40px;">
                    </td>
                    <td>
                      <a href="#" class="btn btn-primary btn-flat btn-xs" data-toggle="modal" data-target="#updateuser<?php echo $no; ?>">
                        <i class="fa fa-user-edit"></i>
                      </a>
                    </td>
                    <td>
                      <a href="#" class="btn btn-danger btn-flat btn-xs" data-toggle="modal" data-target="#deleteuser<?php echo $no; ?>">
                        <i class="fa fa-trash"></i>
                      </a>

                      <!-- modal delete -->
                      <div class="example-modal">
                        <div id="deleteuser<?php echo $no; ?>" class="modal fade" role="dialog" style="display:none;">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h3 class="modal-title">Konfirmasi Delete Data User</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <h4 align="center" >Apakah anda yakin ingin menghapus User <strong><?php echo $data['nama_depan']; ?> <?php echo $data['nama_belakang']; ?></strong><strong><span class="grt"></span></strong> ?</h4>
                              </div>
                              <div class="modal-footer">
                                <button id="nodelete" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
                                <a href="../lib/proses.php?act=deleteuser&id=<?php echo $data['id_user']; ?>" class="btn btn-primary">Hapus</a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div><!-- modal delete -->




                      <!-- modal update kursus -->
                      <div class="example-modal">
                        <div id="updateuser<?php echo $no; ?>" class="modal fade" role="dialog" style="display:none;">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h3 class="modal-title">Edit Data User</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              </div>
                              <div class="modal-body">
                                <form action="../lib/proses.php" method="post" enctype="multipart/form-data">
                                  <?php
$id_user = $data['id_user'];
	$query = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user='$id_user'");
	while ($data = mysqli_fetch_assoc($query)) {
		?>
                                  <div class="form-group">
                                    <div class="row">
                                      <label class="col-sm-3 control-label text-right">Nama Depan <span class="text-red" style="color: red;">*</span></label>
                                      <div class="col-sm-8">
                                        <input type="text" class="form-control" name="nama_depan" placeholder="Nama Depan" value="<?php echo $data['nama_depan']; ?>">
                                        <input type="hidden" name="id_user" value="<?php echo $data['id_user']; ?>">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="row">
                                      <label class="col-sm-3 control-label text-right">Nama Belakang <span class="text-red" style="color: red;">*</span></label>
                                      <div class="col-sm-8">
                                        <input type="text" class="form-control" name="nama_belakang" placeholder="Nama Belakang" value="<?php echo $data['nama_belakang']; ?>">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="row">
                                      <label class="col-sm-3 control-label text-right">Email <span class="text-red" style="color: red;">*</span></label>
                                      <div class="col-sm-8">
                                        <input type="text" class="form-control" name="email" placeholder="email" value="<?php echo $data['email']; ?>">
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
                                  </div>
                                  <div class="form-group">
                                    <div class="row">
                                      <label class="col-sm-3 control-label text-right">Tanggal Lahir <span class="text-red" style="color: red;">*</span></label>
                                      <div class="col-sm-8">
                                        <p style="margin-left: 10px;"><?php $tg = date_create($data['tgl_lahir']);
		echo date_format($tg, "d - m - Y");?></p>
                                        <input type="date" class="form-control" name="tgl_lahir" placeholder="Tanggal Lahir" value="<?php echo $data['tgl_lahir']; ?>">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="row">
                                      <label class="col-sm-3 control-label text-right">Tempat Lahir <span class="text-red" style="color: red;">*</span></label>
                                      <div class="col-sm-8">
                                        <input type="text" class="form-control" name="tmp_lahir" placeholder="Tempat Lahir" value="<?php echo $data['tmp_lahir']; ?>">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="row">
                                      <label class="col-sm-3 control-label text-right">Nama Belakang <span class="text-red" style="color: red;">*</span></label>
                                      <div class="col-sm-8">
                                        <input type="text" class="form-control" name="no_tlp" placeholder="No Telfon" value="<?php echo $data['no_tlp']; ?>">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="row">
                                      <label class="col-sm-3 control-label text-right">Sekolah <span class="text-red" style="color: red;">*</span></label>
                                      <div class="col-sm-8">
                                        <input type="text" class="form-control" name="sekolah" placeholder="Asal Sekolah" value="<?php echo $data['sekolah']; ?>">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="row">
                                      <label class="col-sm-3 control-label text-right">Jenis Klamin<span class="text-red" style="color: red;">*</span></label>
                                      <div class="col-sm-8">
                                        <select name="jns_klamin" class="form-control">
                                          <option value="<?php echo $data['jns_klamin']; ?>"><?php echo $data['jns_klamin']; ?></option>
                                          <option value="L">L</option>
                                          <option value="P">P</option>
                                        </select>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="row">
                                      <label class="col-sm-3 control-label text-right">Cover <span class="text-red" style="color: red;">*</span>
                                      </label>
                                      <div class="col-sm-8">
                                         <img src="../../img/user/<?php echo $data['image']; ?>" style="width: 120px;float: left;margin-bottom: 5px;"><input type="file" class="form-control" name="image" placeholder="Cover">
                                       </div>
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button id="noedit" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
                                    <input type="submit" name="updateuser" class="btn btn-primary" value="Edit">
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

    <?php include '../template/footer.php';?>