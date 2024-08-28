<?php
session_start();
include "../koneksi.php";
if (!isset($_SESSION['id_pengguna'])) {
  header("Location: login.php");
  exit();
}


$id_pengguna = $_SESSION['id_pengguna'];
$query_pemesanan = "SELECT * FROM rincian_pemesanan WHERE id_pengguna = '$id_pengguna' AND status_pembayaran IN ('Belum Bayar') ORDER BY id_pemesanan DESC";
$result_pemesanan = mysqli_query($conn, $query_pemesanan);



$id_pengguna = $_SESSION['id_pengguna'];
$query_pengguna = "SELECT * FROM pengguna WHERE id_pengguna = '$id_pengguna'";
$result_pengguna = mysqli_query($conn, $query_pengguna);
$data_pengguna = mysqli_fetch_assoc($result_pengguna);


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $id_pemesanan = $_POST['id_pemesanan'];
  $query_batal = "UPDATE rincian_pemesanan SET status_pembayaran = 'Dibatalkan' WHERE id_pemesanan = '$id_pemesanan'";
  $result_batal = mysqli_query($conn, $query_batal);
  if ($result_batal) {
    echo "<script>alert('Berhasil Membatalkan Pesanan'); window.location='pesanan_saya.php';</script>";
  } else {
    echo "<script>alert('Gagal Membatalkan Pesanan');</script>";
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HealingLoko - Pesanan Saya</title>
</head>
<style>
  h1 {
    font-size: 36px;
    text-align: center;
    margin-bottom: 20px;
  }

  table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
  }


  table,
  thead,
  tr,
  th {
    font-size: 13px;
  }


  th,
  td {
    text-align: left;
    padding: 10px;
    border-bottom: 1px solid #ddd;
  }

  th {
    background-color: #f2f2f2;
  }

  tr:hover {
    background-color: #f5f5f5;
  }

  button {
    background-color: #6754e2;
    border: none;
    color: white;
    padding: 10px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    border-radius: 10px;
  }

  button:hover {
    background-color: orange;
  }

  form {
    display: inline-block;
  }

  body {
    font-family: 'Open Sans', sans-serif;
    background-color: #f2f2f2;
  }
</style>

<body>
  <div class="container">
    <h1>Pesanan Saya</h1>
    <button class="noprint"><a style="text-decoration: none; color: white;" href="profile.php">Kembali</a></button>
    <div class="content">
      <table>
        <thead>
          <tr>
            <th>No</th>
            <th>Kode Pemesanan</th>
            <th>Nama Kereta</th>
            <th>Tanggal Keberangkatan</th>
            <th>Waktu Keberangkatan</th>
            <th>Stasiun Keberangkatan</th>
            <th>Stasiun Tujuan</th>
            <th>Jumlah Penumpang</th>
            <th>Tipe Nomor Identitas</th>
            <th>Nomor Identitas</th>
            <th>Nama Lengkap</th>
            <th>Total Harga</th>
            <th>Nomor Kursi</th>
            <th>Status</th>
            <th>Batalkan</th>
            <th>Cetak</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if (mysqli_num_rows($result_pemesanan) > 0) {
            $no = 1;
            while ($data_pemesanan = mysqli_fetch_assoc($result_pemesanan)) {

              $id_jadwal = $data_pemesanan['id_jadwal'];
              $query_jadwal = "SELECT * FROM jadwal_kereta WHERE id_jadwal = '$id_jadwal'";
              $result_jadwal = mysqli_query($conn, $query_jadwal);
              $data_jadwal = mysqli_fetch_assoc($result_jadwal);
          ?>
              <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $data_pemesanan['kode_pembayaran']; ?></td>
                <td><?php echo $data_jadwal['nama_kereta']; ?></td>
                <td><?php echo $data_pemesanan['waktu_pemesanan']; ?></td>
                <td><?php echo $data_jadwal['jam_keberangkatan']; ?></td>
                <td><?php echo $data_jadwal['kota_asal']; ?></td>
                <td><?php echo $data_jadwal['kota_tujuan']; ?></td>
                <td><?php echo $data_pemesanan['jumlah_penumpang']; ?></td>
                <td><?php echo $data_pemesanan['tipe_id']; ?></td>
                <td><?php echo $data_pemesanan['no_id']; ?></td>
                <td><?php echo $data_pemesanan['nama_lengkap']; ?></td>
                <td>Rp <?php echo number_format($data_pemesanan['total_harga']); ?></td>
                <td><?php echo $data_pemesanan['nomor_kursi']; ?></td>
                <td><?php echo $data_pemesanan['status_pembayaran']; ?></td>
                <td>
                  <form method="POST" action="">
                    <input type="hidden" name="id_pemesanan" value="<?php echo $data_pemesanan['id_pemesanan']; ?>">
                    <button type="submit">Batalkan</button>
                  </form>
                </td>
                <td><button onclick="printPesanan('<?php echo $data_pemesanan['id_pemesanan']; ?>')">Cetak</button></td>
              </tr>
            <?php
            }
          } else {
            ?>
            <tr>
              <td colspan="9">Belum ada pesanan</td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
    <script>
      function printPesanan(id_pemesanan) {
        window.location.href = "struk_tagihan_profile.php?id_pemesanan=" + id_pemesanan;
      }
    </script>

</body>

</html>