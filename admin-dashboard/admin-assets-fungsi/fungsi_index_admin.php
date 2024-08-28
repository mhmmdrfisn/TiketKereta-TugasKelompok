<?php

if ($_SESSION['status'] != "login") {
  header("location:../index.php?alert=status02");
}


$query_pengguna = mysqli_query($conn, "SELECT COUNT(*) as total_pengguna FROM pengguna ");
$data_pengguna = mysqli_fetch_assoc($query_pengguna);
$total_pengguna = $data_pengguna['total_pengguna'];


$query_admin = mysqli_query($conn, "SELECT COUNT(*) as total_admin FROM pengguna WHERE id_level = 1");
$data_admin = mysqli_fetch_assoc($query_admin);
$total_admin = $data_admin['total_admin'];


$query_petugas = mysqli_query($conn, "SELECT COUNT(*) as total_petugas FROM data_petugas");
$data_petugas = mysqli_fetch_assoc($query_petugas);
$total_petugas = $data_petugas['total_petugas'];


$query_lunas = mysqli_query($conn, "SELECT COUNT(*) as total_lunas FROM rincian_pemesanan WHERE status_pembayaran = 'Lunas'");
$data_lunas = mysqli_fetch_assoc($query_lunas);
$total_lunas = $data_lunas['total_lunas'];

$query_belumbayar = mysqli_query($conn, "SELECT COUNT(*) as total_belumbayar FROM rincian_pemesanan WHERE status_pembayaran = 'Belum Bayar'");
$data_belumbayar = mysqli_fetch_assoc($query_belumbayar);
$total_belumbayar = $data_belumbayar['total_belumbayar'];


$query_dibatalkan = mysqli_query($conn, "SELECT COUNT(*) as total_dibatalkan FROM rincian_pemesanan WHERE status_pembayaran = 'Dibatalkan'");
$data_dibatalkan = mysqli_fetch_assoc($query_dibatalkan);
$total_dibatalkan = $data_dibatalkan['total_dibatalkan'];

$query_pendapatan = "SELECT SUM(rincian_pemesanan.total_harga) AS jumlah_pendapatan FROM jadwal_kereta 
        INNER JOIN rincian_pemesanan ON jadwal_kereta.id_jadwal = rincian_pemesanan.id_jadwal
        WHERE rincian_pemesanan.status_pembayaran = 'Lunas'";
$data_pendapatan = mysqli_query($conn, $query_pendapatan);

if ($data_pendapatan) {
  $row = mysqli_fetch_assoc($data_pendapatan);
  $total_pendapatan = $row['jumlah_pendapatan'];
} else {
  $total_pendapatan = 0;
}


$tanggal_pendapatan = date('Y-m-d');
$query_insert_pendapatan = "INSERT INTO pendapatan (jumlah_pendapatan, tanggal_pendapatan) 
                           VALUES ('$total_pendapatan', '$tanggal_pendapatan')";
mysqli_query($conn, $query_insert_pendapatan);


if (isset($_POST['simpan'])) {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = md5($_POST['password']);
  $nama_lengkap = $_POST['nama_lengkap'];
  $tanggal_kelahiran = $_POST['tanggal_kelahiran'];
  $umur = $_POST['umur'];
  $alamat = $_POST['alamat'];
  $nomor_telfon = $_POST['nomor_telfon'];


  $query_pengguna = "INSERT INTO pengguna (username, email, password, id_level) VALUES ('$username', '$email', '$password', '2')";
  mysqli_query($conn, $query_pengguna);


  $id_pengguna = mysqli_insert_id($conn);


  $query_petugas = "INSERT INTO data_petugas (id_pengguna, nama_lengkap, tanggal_kelahiran, umur, alamat, nomor_telfon) VALUES ('$id_pengguna', '$nama_lengkap', '$tanggal_kelahiran', '$umur', '$alamat', '$nomor_telfon')";
  mysqli_query($conn, $query_petugas);


  header("location: index.php");
  exit;
}


$sql = "SELECT * FROM jadwal_kereta";
$data = mysqli_query($conn, $sql);
