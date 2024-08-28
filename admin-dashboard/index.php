<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include "../koneksi.php";
include "admin-assets-fungsi/fungsi_index_admin.php";

if ($_SESSION['status'] != "login") {
  header("location:../index.php?alert=status02");
}
?>

<head>
  <title>HealingLoko - Admin Dashboard</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="admin-assets/style-admin-index.css">
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-md navbar-dark" id="bg-nav">
    <a class="navbar-brand" href="#">Admin Dashboard</a>

    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Keluar</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-2 mt-0 tinggi" id="bg">
        <ul class="navbar-nav flex-column nav-link navbar-dark">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?page=show_jadwal">Lihat Jadwal Tersedia</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?page=input_code">Masukan Kode Pembayaran</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?page=add_admin">Tambah Admin</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?page=add_officer">Tambah Petugas</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="index.php?page=add_jadwal">Tambah Jadwal</a>
          </li>
        </ul>

      </div>
      <div class="col-md-10 tinggi">

        <?php

        $page = (@$_GET['page']);
        if (!isset($page)) {
        ?>
          <div class="container-fluid px-1">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
            <div class="row">
              <div class="col-xl-4 col-md-6 align-items-center">
                <div class="card bg-primary text-white mb-4">
                  <div class="card-body">Total Pengguna : <?php echo $total_pengguna; ?></div>
                  <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="index.php?page=show_user">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                  </div>
                </div>
              </div>
              <div class="col-xl-4 col-md-6">
                <div class="card bg-warning text-white mb-4">
                  <div class="card-body">Total Admin : <?php echo $total_admin; ?></div>
                  <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="index.php?page=show_admin">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                  </div>
                </div>
              </div>
              <div class="col-xl-4 col-md-6">
                <div class="card bg-warning text-white mb-4">
                  <div class="card-body">Total Petugas : <?php echo $total_petugas; ?></div>
                  <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="index.php?page=show_officer">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                  </div>
                </div>
              </div>
              <div class="col-xl-4 col-md-6">
                <div class="card bg-success text-white mb-4">
                  <div class="card-body">Total Pendapatan : Rp <?php echo number_format($total_pendapatan); ?></div>
                  <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="index.php?page=rincian_pendapatan">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                  </div>
                </div>
              </div>
              <div class="col-xl-4 col-md-6">
                <div class="card bg-success text-white mb-4">
                  <div class="card-body">Total Pengguna Lunas : <?php echo $total_lunas; ?></div>
                  <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="index.php?page=show_lunas">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                  </div>
                </div>
              </div>
              <div class="col-xl-4 col-md-6">
                <div class="card bg-danger text-white mb-4">
                  <div class="card-body">Total Pengguna Belum Bayar : <?php echo $total_belumbayar; ?></div>
                  <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="index.php?page=show_belumbayar">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                  </div>
                </div>
              </div>
              <div class="col-xl-4 col-md-6">
                <div class="card bg-danger text-white mb-4">
                  <div class="card-body">Total Pengguna Dibatalkan : <?php echo $total_dibatalkan; ?></div>
                  <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="index.php?page=show_dibatalkan">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                  </div>
                </div>
              </div>

            </div>
          <?php
        } elseif ($page == "show_jadwal") {
          include "show_jadwal.php";
        } elseif ($page == "show_user") {
          include "show_user.php";
        } elseif ($page == "show_admin") {
          include "show_admin.php";
        } elseif ($page == "show_lunas") {
          include "show_lunas.php";
        } elseif ($page == "show_belumbayar") {
          include "show_belumbayar.php";
        } elseif ($page == "show_dibatalkan") {
          include "show_dibatalkan.php";
        } elseif ($page == "input_code") {
          include "input_code.php";
        } elseif ($page == "add_admin") {
          include "add_admin.php";
        } elseif ($page == "add_jadwal") {
          include "add_jadwal.php";
        } elseif ($page == "rincian_pendapatan") {
          include "rincian_pendapatan.php";
        } elseif ($page == "add_officer") {
          include "add_officer.php";
        } elseif ($page == "show_officer") {
          include "show_officer.php";
        } elseif ($page == "edit_officer") {
          include "edit_officer.php";
        }
          ?>

          </div>
      </div>
    </div>

  </div>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>