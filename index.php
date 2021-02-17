<?php
include 'koneksiDB.php';
include 'template/header.php';
?>
       <section class="banner">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 title">
                        <h1>Learn Anytime, Anywhere, <br>and Accelerate Future </h1>
                        <p>We believe everyone has the capacity to be creative. <br> StudyYuk is a place where people develop their own potential.</p>
                    </div>

                    <div class="gambar col-md-6">
                        <img src="img/home.jpg" class="ban-img img-fluid" alt="">
                    </div>
                </div>
            </div>
        </section>
        <section id="course">
            <div class="container course">
                <div class="row">
                    <div class="col-md-5">
                        <h2>Our Popular Services</h2>
                        <p>Here is our popular course that might you want to learn<br>from our expert instructions.</p>
                    </div>

                    <div class="ml-lg-auto">
                    </div>
                </div>
            <div class="row">
                <div class="col-md-4 col-sm-12 mb-3">

                    <div class="card">
                        <img src="img/courses.png" class="card-img-top" alt="...">

                        <div class="card-body">
                            <div class="card-title"><h4>Courses</h4></div>
                            Belajar dengan kurikulum yang telah divalidasi oleh industri IT di dunia seperti Google, Microsoft dll.
                        </div>

                        <div class="card-footer">
                            <a class="btn" href="menuKursus.php">Lihat Lebih Lanjut</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-12 mb-3">
                    <div class="card">
                        <img src="img/job.png" class="card-img-top" alt="...">

                        <div class="card-body">
                            <div class="card-title"><h4>Jobs</h4></div>
                            Cari lowongan pekerjaan dengan mudah sesuai dengan kemampuan yang anda miliki.
                        </div>

                        <div class="card-footer">
                            <a class="btn" href="menuJob.php">Lihat Lebih Lanjut</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-12 mb-3">
                    <div class="card">
                        <img src="img/challenge.png" class="card-img-top" alt="...">

                        <div class="card-body">
                            <div class="card-title"><h4>Challenge</h4></div>
                            Uji kemampuan pemahaman materi dengan mengikuti beberapa tantangan dan raih keuntungannya.
                        </div>

                        <div class="card-footer">
                            <a class="btn" href="menuChallenge.php">Lihat Lebih Lanjut</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </section>


        <section class="about">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <img src="img/about1.png" class="ban-img img-fluid" alt="">
                    </div>

                <div class="col-md-5 aboutt">
                    <h1>Why Learning With Us ?</h1>
                    <p>Kami akan membantu Anda dalam belajar di StudyYuk Academy dengan kurikulum yang dibangun bersama pelaku industri ternama..</p>
                </div>

                </div>
            </div>
            </section>

<?php

include 'template/footer.php';

?>