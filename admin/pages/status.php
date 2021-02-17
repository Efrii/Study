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
                <i class="mdi mdi-briefcase-check mr-3"></i>Status Berlangganan<hr>
          </h3>
        </div>
        <div class="box-body">

          <div class="table-responsive22">
            <table id="table" class="table table-striped table-bordered">
                <thead>
                <tr>
                  <th scope="col">No.</th>
                  <th scope="col">Nama Kursus</th>
                  <th scope="col">Nama User</th>
                  <th scope="col">Status Langganan</th>
                  <th scope="col">Hapus</th>
                </tr>
              </thead>
              <tbody>
                  <?php
$no = 1;
$queryView = mysqli_query($koneksi, "SELECT * FROM status INNER JOIN kursus ON status.id_kursus=kursus.id_kursus INNER JOIN user ON status.id_user=user.id_user");
while ($row = mysqli_fetch_assoc($queryView)) {
	$deskripsi = $row["deskripsi"];
	if (strlen($deskripsi) > 100) {
		$deskripsi = substr($deskripsi, 0, 100) . "...";
	}
	?>
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <!-- <td><?php //echo $row['id_kursus']; ?></td> -->
                    <td><?php echo $row['nama_kursus']; ?></td>
                    <td><?php echo $row['nama_depan']; ?> <?php echo $row['nama_belakang']; ?></td>
                    <td><?php echo $row['status']; ?></td>
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
                                 <h3 class="modal-title">Konfirmasi Delete Data Status</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <h4 align="center" >Apakah anda yakin ingin menghapus materi id <?php echo $row['id_status']; ?><strong><span class="grt"></span></strong> ?</h4>
                              </div>
                              <div class="modal-footer">
                                <button id="nodelete" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cancle</button>
                                <a href="../lib/proses.php?act=deletestatus&id=<?php echo $row['id_status']; ?>" class="btn btn-primary">Delete</a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div><!-- modal delete -->


                      <?php }?>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
</div>

  <?php include '../template/footer.php';?>