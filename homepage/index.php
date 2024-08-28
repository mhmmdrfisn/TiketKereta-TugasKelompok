<?php
session_start();
include "../koneksi.php";
if ($_SESSION['status'] != "login") {
    header("location:../index.php?alert=status02");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HealingLoko - Liburan Mudah Pikiran Indah</title>
    <link rel="stylesheet" href="../bootstrap-5.2.0-dist/css/bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <script src="../bootstrap-5.2.0-dist/js/bootstrap.bundle.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="index.php">HealingLoko</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="cari_tiket.php">Cari Tiket</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="profile.php">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#tentang">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#kontak">Kontak</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Keluar</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="hero">
        <h2>Buat Liburan Lokal Kamu Bersama Kami!</h2>
    </div>
    <div class="content" id="tentang">
        <div class="paragraf">
            <p>Healingloko adalah sebuah situs web yang menyediakan layanan pemesanan tiket kereta api. Situs web ini dibuat oleh dua orang dari kelompok 7, yaitu Muhammad Rafi Sanjaya dan Daffa Muhammad Ihsan Nustiawan.</p>
        </div>
    </div>
    <footer class="new_footer_area bg_color" id="kontak">
        <div class="new_footer_top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="f_widget about-widget pl_70 wow fadeInLeft" data-wow-delay="0.6s" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInLeft;">
                            <h3 class="f-title f_600 t_color f_size_18">Dukungan</h3>
                            <ul class="list-unstyled f_list">
                                <li><a href="halaman-kebijakan/termsandconditions.php">Syarat &amp; Ketentuan</a></li>
                                <li><a href="halaman-kebijakan/privacypolicy.php">Kebijakan Privasi</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="f_widget social-widget pl_70 wow fadeInLeft" data-wow-delay="0.8s" style="visibility: visible; animation-delay: 0.8s; animation-name: fadeInLeft;">
                            <h3 class="f-title f_600 t_color f_size_18">Team Solutions</h3>
                            <div class="f_social_icon">
                                <a href="https://www.instagram.com/vitoibrahim_" class="fa-solid fa-user"></a>
                                <a href="https://www.instagram.com/daffaluddy06" class="fa-solid fa-user"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer_bg">
                <div class="footer_bg_one"></div>
                <div class="footer_bg_two"></div>
            </div>
        </div>
        <div class="footer_bottom">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-sm-7">
                        <p class="mb-0 f_400">© Kelompok 07 - 2023 All rights reserved.</p>
                    </div>
                    <div class="col-lg-6 col-sm-5 text-right">
                        <p>Made with <i class="icon_heart"></i> in <a href="#" target="_blank">Kelompok 07</a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="app.js"></script>
    <script src="https://kit.fontawesome.com/bebd0ca8b1.js" crossorigin="anonymous"></script>
</body>

</html>