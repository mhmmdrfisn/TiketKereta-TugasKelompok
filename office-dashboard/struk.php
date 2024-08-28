<!DOCTYPE html>
<html>

<head>
    <title>Konfirmasi Pembayaran</title>
    <style>
        .card {
            font-family: sans-serif;
            background-color: #f2f2f2;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            width: 400px;
            margin: 0 auto;
            margin-top: 20px;
        }

        .card h3 {
            text-align: center;
        }

        .receipt-item {
            margin-bottom: 10px;
        }

        .label {
            font-weight: bold;
        }

        .button {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: block;
            margin: 0 auto;
            margin-top: 20px;
            width: 200px;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <div class="card">
        <?php
        include "../koneksi.php";
        if (isset($_POST['submit'])) {
            $kode_pembayaran = $_POST['kode_pembayaran'];
            $total_uang = $_POST['total_uang'];

            $sql = "SELECT * FROM rincian_pemesanan WHERE kode_pembayaran='$kode_pembayaran'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                echo "<h3>Data Pemesanan:</h3>";
                echo "<div class='receipt'>";
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<div class='receipt-item'>";
                    echo "<span class='label'>ID Pemesanan:</span>" . $row['id_pemesanan'];
                    echo "</div>";
                    echo "<div class='receipt-item'>";
                    echo "<span class='label'>ID Pengguna:</span>" . $row['id_pengguna'];
                    echo "</div>";
                    echo "<div class='receipt-item'>";
                    echo "<span class='label'>ID Jadwal:</span>" . $row['id_jadwal'];
                    echo "</div>";
                    echo "<div class='receipt-item'>";
                    echo "<span class='label'>Tipe ID:</span>" . $row['tipe_id'];
                    echo "</div>";
                    echo "<div class='receipt-item'>";
                    echo "<span class='label'>No. ID:</span>" . $row['no_id'];
                    echo "</div>";
                    echo "<div class='receipt-item'>";
                    echo "<span class='label'>Nama Lengkap:</span>" . $row['nama_lengkap'];
                    echo "</div>";
                    echo "<div class='receipt-item'>";
                    echo "<span class='label'>Jumlah Penumpang:</span>" . $row['jumlah_penumpang'];
                    echo "</div>";
                    echo "<div class='receipt-item'>";
                    echo "<span class='label'>Total Harga:</span>Rp." . number_format($row['total_harga']);
                    echo "</div>";
                    echo "<div class='receipt-item'>";
                    echo "<span class='label'>Status Pembayaran:</span>" . $row['status_pembayaran'];
                    echo "</div>";
                    echo "<div class='receipt-item'>";
                    echo "<span class='label'>Kode Pembayaran:</span>" . $row['kode_pembayaran'];
                    echo "</div>";
                    echo "<div class='receipt-item'>";
                    echo "<span class='label'>Waktu Pemesanan:</span>" . $row['waktu_pemesanan'];
                    echo "</div>";
                    $total_harga = $row['total_harga'];
                    $kembalian = $total_uang - $total_harga;
                    echo "<div class='receipt-item'>";
                    echo "<span class='label'>Total Uang Pelanggan:</span>Rp." . number_format($total_uang);
                    echo "</div>";
                    echo "<div class='receipt-item'>";
                    echo "<span class='label'>Total Harga:</span>Rp." . number_format($total_harga);
                    echo "</div>";
                    echo "<div class='receipt-item'>";
                    echo "<span class='label'>Kembalian:</span>Rp." . number_format($kembalian);
                    echo "</div>";
                }
                echo "</div>";
                echo "<a class='button' href='cetak_struk.php?kode_pembayaran=$kode_pembayaran'>Nyatakan Pembayaran</a>";
            } else {
                echo "<p>Data tidak ditemukan.</p>";
            }
        }
        ?>
    </div>
</body>

</html>