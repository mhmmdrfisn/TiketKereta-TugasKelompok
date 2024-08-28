<?php
include "../koneksi.php";
if (isset($_GET['kode_pembayaran'])) {
    $kode_pembayaran = $_GET['kode_pembayaran'];

    // Update status_pembayaran menjadi "lunas"
    $updateSql = "UPDATE rincian_pemesanan SET status_pembayaran='lunas' WHERE kode_pembayaran='$kode_pembayaran'";
    mysqli_query($conn, $updateSql);

    // Retrieve data setelah update
    $sql = "SELECT * FROM rincian_pemesanan WHERE kode_pembayaran='$kode_pembayaran'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
?>
        <!DOCTYPE html>
        <html>

        <head>
            <title>Struk Pembayaran</title>
            <style>
                .receipt {
                    font-family: sans-serif;
                    background-color: #f2f2f2;
                    padding: 20px;
                    border-radius: 5px;
                    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                    width: 400px;
                    margin: 0 auto;
                    margin-top: 20px;
                }

                .receipt h3 {
                    text-align: center;
                }

                .receipt-item {
                    margin-bottom: 10px;
                }

                .label {
                    font-weight: bold;
                }

                .button {
                    font-family: sans-serif;
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
            <div class="receipt">
                <h3>Struk Pembayaran</h3>
                <div class='receipt-item'>
                    <span class='label'>ID Pemesanan:</span> <?php echo $row['id_pemesanan']; ?>
                </div>
                <div class='receipt-item'>
                    <span class='label'>ID Pengguna:</span> <?php echo $row['id_pengguna']; ?>
                </div>
                <div class='receipt-item'>
                    <span class='label'>ID Jadwal:</span> <?php echo $row['id_jadwal']; ?>
                </div>
                <div class='receipt-item'>
                    <span class='label'>Tipe ID:</span> <?php echo $row['tipe_id']; ?>
                </div>
                <div class='receipt-item'>
                    <span class='label'>No. ID:</span> <?php echo $row['no_id']; ?>
                </div>
                <div class='receipt-item'>
                    <span class='label'>Nama Lengkap:</span> <?php echo $row['nama_lengkap']; ?>
                </div>
                <div class='receipt-item'>
                    <span class='label'>Jumlah Penumpang:</span> <?php echo $row['jumlah_penumpang']; ?>
                </div>
                <div class='receipt-item'>
                    <span class='label'>Total Harga:</span> Rp. <?php echo number_format($row['total_harga']); ?>
                </div>
                <div class='receipt-item'>
                    <span class='label'>Status Pembayaran:</span> <?php echo $row['status_pembayaran']; ?>
                </div>
                <div class='receipt-item'>
                    <span class='label'>Kode Pembayaran:</span> <?php echo $row['kode_pembayaran']; ?>
                </div>
                <div class='receipt-item'>
                    <span class='label'>Waktu Pemesanan:</span> <?php echo $row['waktu_pemesanan']; ?>
                </div>
            </div>
            <script>
                window.print();
            </script>
            <a href="index.php" class="button">Kembali ke Halaman Utama</a>
        </body>

        </html>
<?php
    } else {
        echo "Data tidak ditemukan.";
    }
}
?>