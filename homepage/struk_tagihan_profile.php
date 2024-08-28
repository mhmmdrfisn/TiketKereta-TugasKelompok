<?php
session_start();
include "../koneksi.php";
if (!isset($_SESSION['id_pengguna'])) {
  header("Location: login.php");
  exit();
}

$id_pengguna = $_SESSION['id_pengguna'];
$id_pemesanan = $_GET['id_pemesanan'];


$query_pemesanan = "SELECT * FROM rincian_pemesanan WHERE id_pengguna = '$id_pengguna' AND id_pemesanan = '$id_pemesanan'";
$result_pemesanan = mysqli_query($conn, $query_pemesanan);

if (mysqli_num_rows($result_pemesanan) == 0) {
  header("Location: pesanan_saya.php");
  exit();
}

$data_pemesanan = mysqli_fetch_assoc($result_pemesanan);


$id_jadwal = $data_pemesanan['id_jadwal'];
$query_jadwal = "SELECT * FROM jadwal_kereta WHERE id_jadwal = '$id_jadwal'";
$result_jadwal = mysqli_query($conn, $query_jadwal);
$data_jadwal = mysqli_fetch_assoc($result_jadwal);


$query_pengguna = "SELECT * FROM pengguna WHERE id_pengguna = '$id_pengguna'";
$result_pengguna = mysqli_query($conn, $query_pengguna);
$data_pengguna = mysqli_fetch_assoc($result_pengguna);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../assets/style-struk-tagihan.css">
  <title>HealingLoko - Struk Saya</title>
</head>

<body>
  <div class="container">
    <h1>Struk Pembayaran</h1>
    <div class="content">
      <table>
        <tr>
          <td>Kode Pembayaran:</td>
          <td><?php echo $data_pemesanan['kode_pembayaran']; ?></td>
        </tr>
        <tr>
          <td>Nama Akun:</td>
          <td><?php echo $data_pengguna['username']; ?></td>
        </tr>
        <tr>
          <td>Nama Pemesan:</td>
          <td><?php echo $data_pemesanan['nama_lengkap']; ?></td>
        </tr>
        <tr>
          <td>Tipe Identitas:</td>
          <td><?php echo $data_pemesanan['tipe_id']; ?></td>
        </tr>
        <tr>
          <td>Nomor Identitas:</td>
          <td><?php echo $data_pemesanan['no_id']; ?></td>
        </tr>
        <tr>
          <td>Nama Kereta:</td>
          <td><?php echo $data_jadwal['nama_kereta']; ?></td>
        </tr>
        <tr>
          <td>Tanggal Keberangkatan:</td>
          <td><?php echo $data_jadwal['tanggal_keberangkatan']; ?></td>
        </tr>
        <tr>
          <td>Stasiun Keberangkatan:</td>
          <td><?php echo $data_jadwal['kota_asal']; ?></td>
        </tr>
        <tr>
          <td>Stasiun Tujuan:</td>
          <td><?php echo $data_jadwal['kota_tujuan']; ?></td>
        </tr>
        <tr>
          <td>Jumlah Penumpang:</td>
          <td><?php echo $data_pemesanan['jumlah_penumpang']; ?></td>
        </tr>
        <tr>
          <td>Nomor Kursi:</td>
          <td><?php echo $data_pemesanan['nomor_kursi']; ?></td>
        </tr>
        <tr>
          <td colspan="2">

          </td>
          <hr>
        </tr>
      </table>
      <hr>
      <h1>Total Harga : Rp <?php echo number_format($data_pemesanan['total_harga']); ?></h1>
      <hr>
      <p><i>*Silahkan memperlihatkan Struk ini kepada Petugas saat akan melakukan pembayaran.</i></p>
    </div>
    <button class="noprint" onclick="window.print()">Print</button>
    <button class="noprint"><a href="pesanan_saya.php">Kembali</a></button>
</body>

</html>