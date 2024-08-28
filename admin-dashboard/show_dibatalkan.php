<!DOCTYPE html>
<html>

<head>
  <title>HealingLoko - Dibatalkan</title>
</head>

<body>
  <div class="container">
    <div class="container-fluid px-4">
      <h1 class="mt-4">Daftar Pesanan Dibatalkan</h1>
      <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.php" class="text-decoration-none">Dashboard</a></li>
        <li class="breadcrumb-item active">Daftar Pesanan Dibatalkan</li>
      </ol>


      <div class="table-responsive">
        <table class=" table table-striped">
          <thead>
            <tr>
              <th>No</th>
              <th>Tipe ID</th>
              <th>No ID</th>
              <th>Nama Lengkap</th>
              <th>Jumlah Penumpang</th>
              <th>Total Harga</th>
              <th>Nomor Kursi</th>
              <th>Status Pembayaran</th>
              <th>Kode Pembayaran</th>
              <th>Waktu Pemesanan</th>
            </tr>
          </thead>
          <tbody>
            <?php
            include "../koneksi.php";

            $sql = "SELECT * FROM rincian_pemesanan WHERE status_pembayaran = 'Dibatalkan'";
            $result = mysqli_query($conn, $sql);


            if (mysqli_num_rows($result) > 0) {
              $no = 1;
              while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $no++ . "</td>";
                echo "<td>" . $row["tipe_id"] . "</td>";
                echo "<td>" . $row["no_id"] . "</td>";
                echo "<td>" . $row["nama_lengkap"] . "</td>";
                echo "<td>" . $row["jumlah_penumpang"] . "</td>";
                echo "<td>" . "Rp." . number_format($row["total_harga"]) . "</td>";
                echo "<td>" . $row["nomor_kursi"] . "</td>";
                echo "<td>" . $row["status_pembayaran"] . "</td>";
                echo "<td>" . $row["kode_pembayaran"] . "</td>";
                echo "<td>" . $row["waktu_pemesanan"] . "</td>";
                echo "</tr>";
              }
            } else {
              echo "<tr><td colspan='11'>Tidak ada pemesanan yang Dibatalkan.</td></tr>";
            }

            mysqli_close($conn);
            ?>
          </tbody>
        </table>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>