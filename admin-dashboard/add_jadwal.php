<!DOCTYPE html>
<html lang="en">
<?php
include "../koneksi.php";
if (isset($_POST['submit'])) {
    $n_kereta = $_POST['n_kereta'];
    $k_asal = $_POST['k_asal'];
    $k_tujuan = $_POST['k_tujuan'];
    $jam_b = $_POST['jam_b'];
    $jam_k = $_POST['jam_k'];
    $h_ket = $_POST['h_ket'];
    $ka_ger = $_POST['ka_ger'];
    $tang_ket = $_POST['tang_ket'];

    $sql = "INSERT INTO jadwal_kereta (nama_kereta, kota_asal, kota_tujuan, jam_keberangkatan, jam_kedatangan, harga_tiket, kapasitas_gerbong, tanggal_keberangkatan) VALUES ('$n_kereta', '$k_asal', '$k_tujuan', '$jam_b', '$jam_k', '$h_ket', '$ka_ger', '$tang_ket')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Berhasil!');</script>";
        header("location: index.php");
    } else {
        echo "<script>alert('Gagal!');</script>";
    }
}

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form action="" method="post">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <div class="container-fluid px-4">
                                <h1 class="mt-4">Tambah Jadwal</h1>
                                <ol class="breadcrumb mb-4">
                                    <li class="breadcrumb-item"><a href="index.php" class="text-decoration-none">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Tambah Jadwal</li>
                                </ol>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="n_kereta">Nama Kereta</label>
                                    <select class="form-control" name="n_kereta">
                                        <optgroup label="Tersedia Melayani Lokal Bandung">
                                            <option value="443 Bandung Raya Ekonomi">443 Bandung Raya Ekonomi (KRD)</option>
                                            <option value="123 Cimahi Bandung Ekspres (CBE)">123 Cimahi Bandung Ekspres (CBE)</option>
                                            <option value="555 Bandung Cimahi Metropolitan (BCM)">555 Bandung Cimahi Metropolitan (BCM)</option>
                                            <option value="789 Cimahi Bandung Lodaya (CBL">789 Cimahi Bandung Lodaya (CBL)</option>
                                        </optgroup>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="k_asal">Kota Asal</label>
                                    <select class="form-control" name="k_asal">
                                        <optgroup label="Kabupaten Bandung">
                                            <option value="Cicalengka">Cicalengka (CCL)</option>
                                            <option value="Haurpugur">Haurpugur (HRP)</option>
                                            <option value="Rancaekek">Rancaekek (RCK)</option>
                                            <option value="Cimekar">Cimekar (CMK)</option>
                                        </optgroup>
                                        <optgroup label="Kota Bandung">
                                            <option value="Kiaracondong">Kiaracondong (KAC)</option>
                                            <option value="Cikudapateuh">Cikudapateuh (CTH)</option>
                                            <option value="Bandung">Bandung (BD)</option>
                                            <option value="Ciroyom">Ciroyom (CIR)</option>
                                            <option value="Cimindi">Cimindi (CMD)</option>
                                        </optgroup>
                                        <optgroup label="Kota Cimahi">
                                            <option value="Cimahi">Cimahi (CMI)</option>
                                            <option value="Gadobangkong">Gadobangkong (GK)</option>
                                        </optgroup>
                                        <optgroup label="Kabupaten Bandung Barat">
                                            <option value="Padalarang">Padalarang (PDL)</option>
                                            <option value="Cilame">Cilame (CLE)</option>
                                            <option value="Sasaksaat">Sasaksaat (SKT)</option>
                                            <option value="Maswati">Maswati (MSI)</option>
                                            <option value="Rendeh">Rendeh (RH)</option>
                                            <option value="Cikadondong">Cikadondong (CD)</option>
                                        </optgroup>
                                        <optgroup label="Kabupaten Purwakarta">
                                            <option value="Plered">Plered (PLD)</option>
                                            <option value="Cikadondong">Sukatani (SUT)</option>
                                            <option value="Ciganea">Ciganea (CA)</option>
                                            <option value="Purwakarta">Purwakarta (PWK)</option>
                                        </optgroup>

                                    </select>
                                </div>


                                <div class="form-group">
                                    <label for="k_tujuan">Kota Tujuan</label>
                                    <select class="form-control" name="k_tujuan">
                                        <optgroup label="Kabupaten Bandung">
                                            <option value="Cicalengka">Cicalengka (CCL)</option>
                                            <option value="Haurpugur">Haurpugur (HRP)</option>
                                            <option value="Rancaekek">Rancaekek (RCK)</option>
                                            <option value="Cimekar">Cimekar (CMK)</option>
                                        </optgroup>
                                        <optgroup label="Kota Bandung">
                                            <option value="Kiaracondong">Kiaracondong (KAC)</option>
                                            <option value="Cikudapateuh">Cikudapateuh (CTH)</option>
                                            <option value="Bandung">Bandung (BD)</option>
                                            <option value="Ciroyom">Ciroyom (CIR)</option>
                                            <option value="Cimindi">Cimindi (CMD)</option>
                                        </optgroup>
                                        <optgroup label="Kota Cimahi">
                                            <option value="Cimahi">Cimahi (CMI)</option>
                                            <option value="Gadobangkong">Gadobangkong (GK)</option>
                                        </optgroup>
                                        <optgroup label="Kabupaten Bandung Barat">
                                            <option value="Padalarang">Padalarang (PDL)</option>
                                            <option value="Cilame">Cilame (CLE)</option>
                                            <option value="Sasaksaat">Sasaksaat (SKT)</option>
                                            <option value="Maswati">Maswati (MSI)</option>
                                            <option value="Rendeh">Rendeh (RH)</option>
                                            <option value="Cikadondong">Cikadondong (CD)</option>
                                        </optgroup>
                                        <optgroup label="Kabupaten Purwakarta">
                                            <option value="Plered">Plered (PLD)</option>
                                            <option value="Cikadondong">Sukatani (SUT)</option>
                                            <option value="Ciganea">Ciganea (CA)</option>
                                            <option value="Purwakarta">Purwakarta (PWK)</option>
                                        </optgroup>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="jam_b">Jam Keberangkatan</label>
                                    <input class="form-control" type="time" name="jam_b" required>
                                </div>
                                <div class="form-group">
                                    <label for="jam_k">Jam Kedatangan</label>
                                    <input class="form-control" type="time" name="jam_k" required>
                                </div>
                                <div class="form-group">
                                    <label for="h_ket">Harga Tiket</label>
                                    <input class="form-control" type="text" name="h_ket" required>
                                </div>
                                <div class="form-group">
                                    <label for="ka_ger">Kapasitas Gerbong</label>
                                    <input class="form-control" type="text" name="ka_ger" required>
                                </div>
                                <div class="form-group">
                                    <label for="tang_ket">Tanggal Keberangkatan</label>
                                    <input class="form-control" type="date" name="tang_ket" required>
                                </div>
                                <div class="text-center">
                                    <button class="btn btn-primary" type="submit" name="submit">Tambah</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </form>
</body>

</html>