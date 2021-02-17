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
                <i class="mdi mdi-shopping mr-3"></i>Daftar Langganan User<hr>
          </h3>
        </div>
        <div class="box-body">

          <div class="table-responsive22">
            <table id="table_langganan" style="margin-left: -20px;" class="table table-striped table-bordered" >
                <thead>
                <tr>
                  <th scope="col">No.</th>
                  <th scope="col">Kursus</th>
                  <th scope="col">Nama Pelanggan</th>
                  <th scope="col">Email</th>
                  <th scope="col">Tanggal</th>
                  <th scope="col">Virtual Account</th>
                  <th scope="col">Tagihan</th>
                </tr>
              </thead>
              <tbody>
                  <?php
$no = 1;
$queryView = mysqli_query($koneksi, "SELECT * FROM langganan INNER JOIN user ON user.id_user=langganan.id_user INNER JOIN kursus ON kursus.id_kursus=langganan.id_kursus");
while ($row = mysqli_fetch_assoc($queryView)) {
	$deskripsi = $row["deskripsi"];
	if (strlen($deskripsi) > 100) {
		$deskripsi = substr($deskripsi, 0, 100) . "...";
	}
	?>
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $row['nama_kursus']; ?></td>
                    <td><?php echo $row['nama_depan']; ?><?php echo $row['nama_belakang']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['tanggal']; ?></td>
                    <td><?php echo $row['virtual_account']; ?></td>
                    <td><?php echo $row['jmlh_tagihan']; ?>
                    

                      <!-- modal delete -->
                      <div class="example-modal">
                        <div id="deletelangganan<?php echo $no; ?>" class="modal fade" role="dialog" style="display:none;">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h3 class="modal-title">Konfirmasi Delete Data Langganan</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <h4 align="center" >Apakah anda yakin ingin menghapus langganan <strong><?php echo $row['nama_depan']; ?> <?php echo $row['nama_belakang']; ?></strong> dengan kursus <strong><?php echo $row['nama_kursus']; ?></strong> dengan jumlah tagihan <strong><?php echo $row['jmlh_tagihan']; ?></strong> <strong></strong><strong><span class="grt"></span></strong> ?</h4>
                              </div>
                              <div class="modal-footer">
                                <button id="nodelete" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
                                <a href="../lib/proses.php?act=deletejob&id=<?php echo $row['id_job']; ?>" class="btn btn-primary">Hapus</a>
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