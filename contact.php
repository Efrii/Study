<?php

session_start();
include "koneksiDB.php";
include "template/header.php";

?>
        <section id="contact" class="contact">
            <div class="container">

              <div class="section-title kami">
                <h2>Contact</h2>
                <p>Contact Us</p>
              </div>

              <div class="row mt-5">
              <?php
$query = mysqli_query($koneksi, "SELECT * FROM StudyYuk");
$data = mysqli_fetch_array($query);
?>
                <div class="col-lg-4">
                  <div class="info">
                    <div class="address">
                      <h4>Lokasi:</h4>
                      <p><?php echo $data['lokasi']; ?></p>
                    </div>

                    <div class="email">
                      <h4>Email:</h4>
                      <p><?php echo $data['email']; ?></p>
                    </div>

                    <div class="phone">
                      <h4>Telepon:</h4>
                      <p><?php echo $data['telfon']; ?></p>
                    </div>
                  </div>

                </div>

                <div class="col-lg-8 mt-5 mt-lg-0" data-aos="fade-left">
                  <?php
session_start();
if ($_SESSION['statusUser'] != "login") {
	?>
                        <p style="text-align: center;"><a href="#" class="text-danger">Login Terlebih Dahulu</a></p>
                        <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                          <div class="form-row">
                            <div class="col-md-6 form-group">
                              <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" readonly/>
                              <div class="validate"></div>
                            </div>
                            <div class="col-md-6 form-group">
                              <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" readonly/>
                              <div class="validate"></div>
                            </div>
                          </div>
                          <div class="form-group">
                            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" readonly/>
                            <div class="validate"></div>
                          </div>
                          <div class="form-group">
                            <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message" readonly></textarea>
                            <div class="validate"></div>
                          </div>
                          <div class="mb-3">
                            <div class="loading">Loading</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Your message has been sent. Thank you!</div>
                          </div>
                          <div class="text-center"><button type="submit" data-toggle="tooltip" data-placement="top" title="Login Terlebih Dahulu"
  disabled>Send Message</button></div>
                        </form>
                      <?php } else {
	?>

                  <form action="admin/lib/proses.php" method="post" role="form" class="php-email-form">
                    <div class="form-row">
                        <input type="text" hidden="true" name="id_user" class="form-control" id="id_user" value="<?php echo $data['id_user'] ?>" readonly/>
                      <div class="col-md-6 form-group">
                        <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Kamu" data-rule="minlen:4" data-msg="Please enter at least 4 chars" value="<?php echo $_SESSION['nama_depan'] ?> <?php echo $_SESSION['nama_belakang']; ?>" readonly/>
                        <div class="validate"></div>
                      </div>
                      <div class="col-md-6 form-group">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email Kamu" data-rule="email" data-msg="Please enter a valid email" value="<?php echo $_SESSION['email']; ?>"readonly/>
                        <div class="validate"></div>
                      </div>
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control" name="subjek" id="subjek" placeholder="Subjek" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                      <div class="validate"></div>
                    </div>
                    <div class="form-group">
                      <textarea class="form-control" name="masukan" id="masukan" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                      <div class="validate"></div>
                    </div>
                    <div class="mb-3">
                      <div class="loading">Loading</div>
                      <div class="error-message"></div>
                      <div class="sent-message">Your message has been sent. Thank you!</div>
                    </div>
                    <div class="text-center"><button type="submit" name="tambahFeedback">Send Message</button></div>
                  </form>
                    <?php }?>


                </div>

              </div>

            </div>
          </section>

<?php

include 'template/footer.php';

?>