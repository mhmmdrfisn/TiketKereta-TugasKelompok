<?php
session_start();
include "../koneksi.php";
if ($_SESSION['status'] != "login") {
  header("location:../index.php?alert=status02");
}


$id_pengguna = $_SESSION['id_pengguna'];
$query_pemesanan = "SELECT * FROM rincian_pemesanan WHERE id_pengguna = '$id_pengguna' ORDER BY id_pemesanan DESC LIMIT 1";
$result_pemesanan = mysqli_query($conn, $query_pemesanan);
$data_pemesanan = mysqli_fetch_assoc($result_pemesanan);


$id_jadwal = $data_pemesanan['id_jadwal'];
$query_jadwal = "SELECT * FROM jadwal_kereta WHERE id_jadwal = '$id_jadwal'";
$result_jadwal = mysqli_query($conn, $query_jadwal);
$data_jadwal = mysqli_fetch_assoc($result_jadwal);


$id_pengguna = $_SESSION['id_pengguna'];
$query_pengguna = "SELECT * FROM pengguna WHERE id_pengguna = '$id_pengguna'";
$result_pengguna = mysqli_query($conn, $query_pengguna);
$data_pengguna = mysqli_fetch_assoc($result_pengguna);


$kode_pembayaran = 'P' . date('ymd') . substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 5);


$id_pemesanan = $data_pemesanan['id_pemesanan'];
$query_update = "UPDATE rincian_pemesanan SET kode_pembayaran = '$kode_pembayaran' WHERE id_pemesanan = '$id_pemesanan'";
$result_update = mysqli_query($conn, $query_update);


?>
<!DOCTYPE html>
<html>

<head>
  <title>Struk Tagihan</title>
  <link rel="stylesheet" type="text/css" href="../assets/style-struk-tagihan.css">
</head>

<body>
  <center>
    <button class="noprint"><a href="profIle.php">Pesanan Saya</a></button>
  </center>


</body>

</html>