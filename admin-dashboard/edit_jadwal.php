<?php
session_start();
include "../koneksi.php";

if ($_SESSION['status'] != "login") {
    header("location:../index.php?alert=status02");
}
$id_jadwal = $_GET['id_jadwal'];

$result = mysqli_query($conn, "SELECT * FROM jadwal_kereta WHERE id_jadwal=$id_jadwal");
while ($data = mysqli_fetch_array($result)) {
    $n_kereta = $data['nama_kereta'];
    $k_asal = $data['kota_asal'];
    $k_tujuan = $data['kota_tujuan'];
    $jam_b = $data['jam_keberangkatan'];
    $jam_k = $data['jam_kedatangan'];
    $h_ket = $data['harga_tiket'];
    $ka_ger = $data['kapasitas_gerbong'];
    $tang_k = $data['tanggal_keberangkatan'];
}
$_SESSION['id_jadwal'] = $id_jadwal;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdminLoko - Edit Jadwal</title>
    <link rel="stylesheet" href="admin-assets/style-add-edit-jadwal.css">
</head>
<style>
</style>

<body>
    <form action="proses_edit_jadwal.php" method="post">
        <table>
            <tr>
                <td>
                    <h3>Edit Jadwal Kereta Api</h3>
                </td>
            </tr>
            <tr>
                <td>
                    ID
                </td>
                <td>
                    <input type="text" name="id" value="<?php echo $id_jadwal ?>" disabled>
                </td>
            </tr>
            <tr>
                <td></td>
            </tr>
            <tr>
                <td>
                    Nama Kereta
                </td>
                <td>
                    <select name="n_kereta">
                        <optgroup label="Tersedia Melayani Lokal Bandung">
                            <option value="443 Bandung Raya Ekonomi">443 Bandung Raya Ekonomi (KRD)</option>
                    </select>
                    <!-- <input type="text" name="id" value="<?php echo $id ?>"> -->
                </td>
            </tr>
            <tr>
                <td></td>
            </tr>
            <tr>
                <td>
                    Kota Asal
                </td>
                <td>
                    <select name="k_asal">
                        <optgroup label="Kabupaten Bandung">
                            <option value="Cicalengka">Cicalengka (CCL)</option>
                            <option value="Haurpugur">Haurpugur (HRP)</option>
                            <option value="Rancaekek">Rancaekek (RCK)</option>
                            <option value="Cimekar">Cimekar (CMK)</option>
                        <optgroup label="Kota Bandung">
                            <option value="Kiaracondong">Kiaracondong (KAC)</option>
                            <option value="Cikudapateuh">Cikudapateuh (CTH)</option>
                            <option value="Bandung">Bandung (BD)</option>
                            <option value="Ciroyom">Ciroyom (CIR) </option>
                            <option value="Cimindi">Cimindi (CMD)</option>
                        <optgroup label="Kota Cimahi">
                            <option value="Cimahi">Cimahi (CMI)</option>
                            <option value="Gadobangkong">Gadobangkong (GK)</option>
                        <optgroup label="Kabupaten Bandung Barat">
                            <option value="Padalarang">Padalarang (PDL)</option>
                            <option value="Cilame">Cilame (CLE)</option>
                            <option value="Sasaksaat">Sasaksaat (SKT)</option>
                            <option value="Maswati">Maswati (MSI)</option>
                            <option value="Rendeh">Rendeh (RH)</option>
                            <option value="Cikadondong">Cikadondong (CD)</option>
                        <optgroup label="Kabupaten Purwakarta">
                            <option value="Plered">Plered (PLD)</option>
                            <option value="Cikadondong">Sukatani (SUT)</option>
                            <option value="Ciganea">Ciganea (CA)</option>
                            <option value="Purwakarta">Purwakarta (PWK)</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
            </tr>
            <tr>
                <td>
                    Kota Tujuan
                </td>
                <td>
                    <select name="k_tujuan">
                        <optgroup label="Kabupaten Bandung">
                            <option value="Cicalengka">Cicalengka (CCL)</option>
                            <option value="Haurpugur">Haurpugur (HRP)</option>
                            <option value="Rancaekek">Rancaekek (RCK)</option>
                            <option value="Cimekar">Cimekar (CMK)</option>
                        <optgroup label="Kota Bandung">
                            <option value="Kiaracondong">Kiaracondong (KAC)</option>
                            <option value="Cikudapateuh">Cikudapateuh (CTH)</option>
                            <option value="Bandung">Bandung (BD)</option>
                            <option value="Ciroyom">Ciroyom (CIR) </option>
                            <option value="Cimindi">Cimindi (CMD)</option>
                        <optgroup label="Kota Cimahi">
                            <option value="Cimahi">Cimahi (CMI)</option>
                            <option value="Gadobangkong">Gadobangkong (GK)</option>
                        <optgroup label="Kabupaten Bandung Barat">
                            <option value="Padalarang">Padalarang (PDL)</option>
                            <option value="Cilame">Cilame (CLE)</option>
                            <option value="Sasaksaat">Sasaksaat (SKT)</option>
                            <option value="Maswati">Maswati (MSI)</option>
                            <option value="Rendeh">Rendeh (RH)</option>
                            <option value="Cikadondong">Cikadondong (CD)</option>
                        <optgroup label="Kabupaten Purwakarta">
                            <option value="Plered">Plered (PLD)</option>
                            <option value="Cikadondong">Sukatani (SUT)</option>
                            <option value="Ciganea">Ciganea (CA)</option>
                            <option value="Purwakarta">Purwakarta (PWK)</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
            </tr>
            <tr>
                <td>
                    Jam Keberangkatan
                </td>
                <td>
                    <input type="time" name="jam_b" value="<?php echo $jam_b ?>" required>
                </td>
            </tr>
            <tr>
                <td></td>
            </tr>
            <tr>
                <td>
                    Jam Kedatangan
                </td>
                <td>
                    <input type="time" name="jam_k" value="<?php echo $jam_k ?>" required>
                </td>
            </tr>
            <tr>
                <td></td>
            </tr>
            <tr>
                <td>
                    Harga Tiket
                </td>
                <td>
                    <input type="text" name="h_ket" value="<?php echo $h_ket ?>" required>
                </td>
            </tr>
            <tr>
                <td></td>
            </tr>
            <tr>
                <td>
                    Kapasitas Gerbong
                </td>
                <td>
                    <input type="text" name="ka_ger" value="<?php echo $ka_ger ?>" required>
                </td>
            </tr>
            <tr>
                <td></td>
            </tr>
            <tr>
                <td></td>
            </tr>
            <tr>
                <td>
                    Tanggal Keberangkatan
                </td>
                <td>
                    <input type="date" name="tang_ket" value="<?php echo $tang_ket ?>" required>
                </td>
            </tr>
            <tr>
                <td></td>
            </tr>
            <tr>
                <td>
                    <button type="submit" name="update">Update</button>
                </td>
            </tr>
        </table>
    </form>
</body>

</html>