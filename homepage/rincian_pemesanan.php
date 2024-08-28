<?php
session_start();
include "../koneksi.php";
if ($_SESSION['status'] != "login") {
    header("location:../index.php?alert=status02");
}


if (isset($_POST['submit'])) {

    $id_jadwal = $_POST['id_jadwal'];
    $jumlah_penumpang = $_POST['jumlah_penumpang'];

    $query_jadwal = "SELECT * FROM jadwal_kereta WHERE id_jadwal = '$id_jadwal'";
    $result_jadwal = mysqli_query($conn, $query_jadwal);
    $data_jadwal = mysqli_fetch_assoc($result_jadwal);

    $id_pengguna = $_SESSION['id_pengguna'];
    $query_pengguna = "SELECT * FROM pengguna WHERE id_pengguna = $id_pengguna";
    $result_pengguna = mysqli_query($conn, $query_pengguna);
    $data_pengguna = mysqli_fetch_assoc($result_pengguna);

    $tipe_id = $_POST['tipe_id'];
    $no_id = $_POST['no_id'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $harga_tiket = $data_jadwal['harga_tiket'];

    $query_kursi_terisi = "SELECT nomor_kursi FROM rincian_pemesanan WHERE id_jadwal = '$id_jadwal'";
    $result_kursi_terisi = mysqli_query($conn, $query_kursi_terisi);
    $kursi_terisi = array();
    while ($row = mysqli_fetch_array($result_kursi_terisi)) {
        $kursi_terisi[] = $row['nomor_kursi'];
    }

    $nomor_kursi = array();
    for ($i = 0; $i < $jumlah_penumpang; $i++) {
        $nomor_kursi[$i] = generate_nomor_kursi($kursi_terisi, $i + 1);
        $kursi_terisi[] = $nomor_kursi[$i];
    }

    $total_harga = $data_jadwal['harga_tiket'] * count($nama_lengkap);
}

function generate_nomor_kursi($kursi_terisi)
{
    $prefix = ($kursi_terisi <= 40) ? 'A' : 'B';
    $nomor_kursi = $prefix . rand(1, 99);

    if (in_array($nomor_kursi, $kursi_terisi)) {
        return generate_nomor_kursi($kursi_terisi);
    } else {
        return $nomor_kursi;
    }
}

?>
<h2>Rincian Pemesanan</h2>
<style>
    body {
        font-family: 'Open Sans', sans-serif;
        background-color: #f2f2f2;
    }

    h2 {
        font-size: 1.2rem;
        margin-top: 2rem;
        margin-bottom: 1rem;
    }

    table {
        border-collapse: collapse;
        width: 100%;
        margin-bottom: 2rem;
    }

    th,
    td {
        text-align: left;
        padding: 0.5rem;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #f2f2f2;
    }

    td:first-child {
        font-weight: bold;
        color: #444;
    }

    p {
        font-size: 1.2rem;
        margin-top: 2rem;
        margin-bottom: 1rem;
        font-weight: bold;
    }

    .btn-submit {
        background-color: #6754e2;
        color: white;
        padding: 0.5rem 1rem;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        margin-top: 2rem;
        font-size: 1.2rem;
    }

    .btn-submit:hover {
        background-color: orange;
    }
</style>
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
        <td>Tanggal Keberangkatan</td>
        <td><?php echo $data_jadwal['tanggal_keberangkatan']; ?></td>
    </tr>
    <tr>
        <td>Jumlah Penumpang</td>
        <td><?php echo count($nama_lengkap); ?></td>
    </tr>
    <tr>
        <td>Harga Tiket</td>
        <td><?php echo "Rp " . number_format($harga_tiket, 0, ',', '.'); ?></td>
    </tr>

</table>
<h2>Daftar Penumpang</h2>
<table>
    <thead>
        <tr>
            <th>No.</th>
            <th>Tipe ID</th>
            <th>No. ID</th>
            <th>Nama Penumpang</th>
            <th>Nomor Kursi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        for ($i = 0; $i < count($nama_lengkap); $i++) {
        ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $tipe_id[$i]; ?></td>
                <td><?php echo $no_id[$i]; ?></td>
                <td><?php echo $nama_lengkap[$i]; ?></td>
                <td><?php echo $nomor_kursi[$i]; ?></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>


<h2>Total Harga</h2>
<p>Rp.<?php echo number_format($total_harga); ?></p>

<form action="pembayaran.php" method="post">
    <input type="hidden" name="id_jadwal" value="<?php echo $id_jadwal; ?>">
    <input type="hidden" name="id_pengguna" value="<?php echo $id_pengguna; ?>">
    <input type="hidden" name="tipe_id" value="<?php echo implode(',', $tipe_id); ?>">
    <input type="hidden" name="no_id" value="<?php echo implode(',', $no_id); ?>">
    <input type="hidden" name="nama_lengkap" value="<?php echo implode(',', $nama_lengkap); ?>">
    <input type="hidden" name="jumlah_penumpang" value="<?php echo $jumlah_penumpang; ?>">
    <input type="hidden" name="nomor_kursi" value="<?php echo implode(',', $nomor_kursi); ?>">
    <input type="hidden" name="total_harga" value="<?php echo $total_harga; ?>">
    <button type="submit" name="submit" class="btn-submit">Pesan</button>
</form>