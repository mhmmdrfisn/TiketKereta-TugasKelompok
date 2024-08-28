<?php
session_start();
include "../koneksi.php";
if ($_SESSION['status'] != "login") {
    header("location:../index.php?alert=status02");
}

if (isset($_POST['submit-tiket'])) {

    $id_jadwal = $_POST['id_jadwal'];
    $query_jadwal = "SELECT * FROM jadwal_kereta WHERE id_jadwal = $id_jadwal";
    $result_jadwal = mysqli_query($conn, $query_jadwal);
    $data_jadwal = mysqli_fetch_assoc($result_jadwal);

    $id_pengguna = $_SESSION['id_pengguna'];
    $query_pengguna = "SELECT * FROM pengguna WHERE id_pengguna = $id_pengguna";
    $result_pengguna = mysqli_query($conn, $query_pengguna);
    $data_pengguna = mysqli_fetch_assoc($result_pengguna);
    if (isset($_POST['jumlah_penumpang'])) {
        $jumlah_penumpang = $_POST['jumlah_penumpang'];
    } else {
        echo 'Harap masukkan jumlah penumpang.';
    }
} else {
    echo 'Errror';
}
?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
    body {
        font-family: 'Open Sans', sans-serif;
        background-color: #f2f2f2;
    }

    h2 {
        font-size: 24px;
        font-weight: 600;
        margin-top: 40px;
        margin-bottom: 20px;
    }

    table {
        border-collapse: collapse;
        width: 100%;
        max-width: 800px;
        margin-bottom: 30px;
    }

    table td {
        padding: 10px;
        font-size: 18px;
        font-weight: 400;
        color: #333;
        border: 1px solid #ddd;
    }

    table td:first-child {
        font-weight: 600;
        color: #555;
        background-color: #f5f5f5;
        width: 40%;
        max-width: 300px;
    }

    form {
        margin-top: 40px;
        max-width: 800px;
    }

    label {
        font-size: 18px;
        font-weight: 400;
        color: #333;
        margin-bottom: 10px;
        display: block;
    }

    input[type=text],
    select {
        padding: 10px;
        font-size: 18px;
        font-weight: 400;
        color: #333;
        border: 1px solid #ddd;
        border-radius: 5px;
        width: 100%;
        margin-bottom: 20px;
        box-sizing: border-box;
    }

    input[type=number] {
        padding: 10px;
        font-size: 18px;
        font-weight: 400;
        color: #333;
        border: 1px solid #ddd;
        border-radius: 5px;
        width: 100%;
        margin-bottom: 20px;
        box-sizing: border-box;
    }

    input[type=submit] {
        background-color: #6754e2;
        color: #fff;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
        font-size: 18px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    input[type=submit]:hover {
        background-color: #6754e2;
    }

    button {
        background-color: #6754e2;
        color: white;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
        font-size: 13px;
        font-weight: 1000;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    button a {
        color: white;
    }

    button:hover {
        background-color: #6754e2;
    }


    .btn-submit {
        background-color: #6754e2;
        color: #fff;
        padding: 8px 16px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
</style>
<h2>Detail Perjalanan</h2>
<table>
    <tr>
        <td>Nama Kereta</td>
        <td><?php echo $data_jadwal['nama_kereta']; ?></td>
    </tr>
    <tr>
        <td>Kota Asal</td>
        <td><?php echo $data_jadwal['kota_asal']; ?></td>
    </tr>
    <tr>
        <td>Kota Tujuan</td>
        <td><?php echo $data_jadwal['kota_tujuan']; ?></td>
    </tr>
    <tr>
        <td>Jam Keberangkatan</td>
        <td><?php echo $data_jadwal['jam_keberangkatan']; ?></td>
    </tr>
    <tr>
        <td>Jam Kedatangan</td>
        <td><?php echo $data_jadwal['jam_kedatangan']; ?></td>
    </tr>
    <tr>
        <td>Harga Tiket</td>
        <td> Rp.<?php echo number_format($data_jadwal['harga_tiket']); ?></td>
    </tr>
    <tr>
        <td>Kapasitas Gerbong Tersedia</td>
        <td><?php echo $data_jadwal['kapasitas_gerbong']; ?></td>
    </tr>
    <tr>
        <td>Tanggal Keberangkatan</td>
        <td><?php echo $data_jadwal['tanggal_keberangkatan']; ?></td>
    </tr>
</table>

<h2>Detail Kontak Pengguna</h2>
<table>
    <tr>
        <td>Username</td>
        <td><?php echo $data_pengguna['username']; ?></td>
    </tr>
    <tr>
        <td>Email</td>
        <td><?php echo $data_pengguna['email']; ?></td>
    </tr>
</table>

<?php
for ($i = 1; $i <= $jumlah_penumpang; $i++) {
?>
    <h2>Detail Penumpang ke-<?php echo $i; ?></h2>
    <form action="rincian_pemesanan.php" method="post">
        <label>Tipe ID (KTP/Paspor):</label>
        <select name="tipe_id[]">
            <option value="KTP">KTP</option>
            <option value="Paspor">Paspor</option>
        </select>
        <br>
        <label>No ID:</label>
        <input type="text" name="no_id[]" required pattern="\d{16}" oninput="maxLengthCheck(this)" maxlength="16">
        <br><label>Nama Lengkap:</label>
        <input type="text" name="nama_lengkap[]" maxlength="50" minlength="1" required pattern="[A-Z\s]+" oninvalid="invalidInput(this)" title="Hanya huruf kapital yang diizinkan">
        <br><br>
    <?php
}

    ?>
    <div class="submit-container">
        <input type="hidden" name="id_jadwal" value="<?php echo $id_jadwal; ?>">
        <input type="hidden" name="jumlah_penumpang" value="<?php echo $jumlah_penumpang; ?>">
        <button type="submit" name="submit" class="btn-submit">Lanjutkan Pemesanan</button>
        <button class="noprint"><a style="text-decoration: none;" href="cari_tiket.php">Kembali</a></button>
    </div>
    </form>
    </div>
    <script>
        function maxLengthCheck(object) {
            if (object.value.length > object.maxLength) {
                object.value = object.value.slice(0, object.maxLength)
            }
        }

        function invalidInput(input) {
            if (input.validity.patternMismatch) {
                input.setCustomValidity('Mohon masukkan hanya huruf kapital dan spasi.');
            } else if (/\d/.test(input.value)) {
                input.setCustomValidity('Mohon jangan masukkan angka pada nama.');
            } else {
                input.setCustomValidity('');
            }
        }
    </script>