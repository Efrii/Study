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
                <i class="mdi mdi-comment-account mr-3"></i>Daftar Pelamar<hr>
              </h3>

              <table id="table" style="font-size: 14px;" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Melamar</th>
                    <th scope="col">Cover Latter</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
$no = 1;
$query = mysqli_query($koneksi, "SELECT * FROM lamarJob INNER JOIN job ON lamarJob.id_job=job.id_job INNER JOIN user ON user.id_user=lamarJob.id_user");
while ($data = mysqli_fetch_assoc($query)) {

	?>
                  <tr>
                    <th scope="row"><?php echo $no++; ?></th>
                    <td><?php echo $data['nama_depan']; ?> <?php echo $data['nama_belakang']; ?></td>
                    <td><?php echo $data['email']; ?></td>
                    <td><?php echo $data['nama_job']; ?></td>
                    <td><?php echo $data['cover_latter']; ?></td>
                    <td>
                      <a href="#" class="btn btn-danger btn-flat btn-xs" data-toggle="modal" data-target="#deletefeedback<?php echo $no; ?>">
                        <i class="fa fa-trash"></i>
                      </a>
                    </td>
                  </tr>


                  <!-- modal delete -->
                      <div class="example-modal">
                        <div id="deletefeedback<?php echo $no; ?>" class="modal fade" role="dialog" style="display:none;">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h3 class="modal-title">Konfirmasi Delete Data Feedback</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <h4 align="center" >Apakah anda yakin ingin menghapus Data Pelamar <strong><?php echo $data['nama_depan']; ?> <?php echo $data['nama_belakang']; ?></strong></strong><strong><span class="grt"></span></strong> ?</h4>
                              </div>
                              <div class="modal-footer">
                                <button id="nodelete" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
                                <a href="../lib/proses.php?act=deletelamar&id=<?php echo $data['id_lamar']; ?>" class="btn btn-primary">Hapus</a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div><!-- modal delete -->

                  <?php }?>
                </tbody>
              </table>

          </div>
      </div>

<?php include '../template/footer.php';?>