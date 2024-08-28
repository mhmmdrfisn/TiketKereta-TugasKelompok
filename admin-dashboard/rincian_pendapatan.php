<?php
include '../koneksi.php';

$periode = '';
$tanggal_awal = '';
$tanggal_akhir = '';

if (isset($_POST['periode'])) {
    $periode = $_POST['periode'];

    if ($periode === 'minggu') {
        $tanggal_awal = $_POST['tanggal1'];
        $tanggal_akhir = $_POST['tanggal2'];
    } elseif ($periode === 'hari') {
        $tanggal_awal = $_POST['tanggal'];
        $tanggal_akhir = $_POST['tanggal'];
    } elseif ($periode === 'bulan') {
        $bulan = $_POST['bulan'];
        $tanggal_awal = date('Y-m-01', strtotime($bulan));
        $tanggal_akhir = date('Y-m-t', strtotime($bulan));
    } elseif ($periode === 'tahun') {
        $tahun = $_POST['tahun'];
        $tanggal_awal = $tahun . '-01-01';
        $tanggal_akhir = $tahun . '-12-31';
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="admin-assets/style-admin-index.css">
    <title>AdminLoko - Rincian Pemesanan</title>
</head>

<body>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Rincian Pemesanan</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php" class="text-decoration-none">Dashboard</a></li>
            <li class="breadcrumb-item active">Rincian Pemesanan</li>
        </ol>
        <form method="POST" action="">
            <label for="periode">Pencarian Berdasarkan:</label>
            <select name="periode" id="periode" onchange="handlePeriodeChange()">
                <option value="hari">Harian</option>
                <option value="minggu">Mingguan</option>
                <option value="bulan">Bulanan</option>
                <option value="tahun">Tahunan</option>
            </select>
            <div id="inputContainer"></div>
            <br><br>
            <input type="submit" class="btn btn-primary" value="Cari">
        </form>
        <br>
        <br>
        <?php
        if ($periode !== '') {
            echo "<div class='mb-4'>
                    <p class='d-inline-block mr-2'>Pencarian: Periode: $periode, Tanggal Awal: $tanggal_awal, Tanggal Akhir: $tanggal_akhir</p>
                  </div>";

            $sql = "SELECT SUM(total_harga) AS total_pendapatan FROM rincian_pemesanan
                    WHERE DATE(waktu_pemesanan) BETWEEN '$tanggal_awal' AND '$tanggal_akhir' 
                    AND status_pembayaran = 'Lunas'";

            $result = mysqli_query($conn, $sql);

            if (!$result) {
                die("Query gagal: " . mysqli_error($conn));
            }

            $row = mysqli_fetch_assoc($result);
            $total_pendapatan = $row['total_pendapatan'];

            echo "<div class='mb-4'>
                    <h5 class='d-inline-block mr-2'>Total Pendapatan pada $periode:</h5>
                    <h4 class='d-inline-block'>Rp. " . number_format($total_pendapatan, 0, ",", ".") . "</h4>
                  </div>";

            $sql_rincian = "SELECT p.*, j.*, u.username, u.email FROM rincian_pemesanan p
                            INNER JOIN jadwal_kereta j ON p.id_jadwal = j.id_jadwal
                            INNER JOIN pengguna u ON p.id_pengguna = u.id_pengguna
                            WHERE DATE(p.waktu_pemesanan) BETWEEN '$tanggal_awal' AND '$tanggal_akhir' 
                            AND p.status_pembayaran = 'Lunas'
                            ORDER BY p.waktu_pemesanan DESC";

            $result_rincian = mysqli_query($conn, $sql_rincian);

            if (!$result_rincian) {
                die("Query gagal: " . mysqli_error($conn));
            }

            if (mysqli_num_rows($result_rincian) > 0) {
                echo "<table class='table table-striped'>
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Akun</th>
                                <th>Email</th>
                                <th>Nama Kereta</th>
                                <th>Jumlah Penumpang</th>
                                <th>Total Harga</th>
                                <th>Kode Pembayaran</th>
                                <th>Waktu Pemesanan</th>
                            </tr>
                        </thead>
                        <tbody>";
                $no = 1;
                while ($row = mysqli_fetch_assoc($result_rincian)) {
                    echo "<tr>
                            <td>" . $no . "</td>
                            <td>" . $row['username'] . "</td>
                            <td>" . $row['email'] . "</td>
                            <td>" . $row['nama_kereta'] . "</td>
                            <td>" . $row['jumlah_penumpang'] . "</td>
                            <td>" . $row['total_harga'] . "</td>
                            <td>" . $row['kode_pembayaran'] . "</td>
                            <td>" . $row['waktu_pemesanan'] . "</td>
                          </tr>";
                    $no++;
                }
                echo "</tbody></table>";
            } else {
                echo "Data Tidak Tersedia!";
            }
        }
        ?>
        <button class="btn btn-success" onclick="exportToXLSX()">Export to XLSX</button>
        <button class="btn btn-danger" onclick="printData()">Print</button>

    </div>
    <script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.10.0/jspdf.umd.min.js"></script>
    <script src="admin-assets/fungsi-export.js"></script>
    <script>
        function handlePeriodeChange() {
            const selectedOption = document.getElementById('periode').value;
            const inputContainer = document.getElementById('inputContainer');
            inputContainer.innerHTML = '';

            if (selectedOption === 'hari') {
                const tanggalLabel = document.createElement('label');
                tanggalLabel.innerHTML = 'Tanggal: ';

                const tanggalInput = document.createElement('input');
                tanggalInput.setAttribute('type', 'date');
                tanggalInput.setAttribute('name', 'tanggal');
                tanggalInput.setAttribute('value', new Date().toISOString().slice(0, 10));

                inputContainer.appendChild(tanggalLabel);
                inputContainer.appendChild(tanggalInput);
            } else if (selectedOption === 'minggu') {
                const tanggal1Label = document.createElement('label');
                tanggal1Label.innerHTML = 'Tanggal Awal: ';

                const tanggal1Input = document.createElement('input');
                tanggal1Input.setAttribute('type', 'date');
                tanggal1Input.setAttribute('name', 'tanggal1');
                tanggal1Input.setAttribute('value', new Date().toISOString().slice(0, 10));

                const tanggal2Label = document.createElement('label');
                tanggal2Label.innerHTML = 'Tanggal Akhir: ';

                const tanggal2Input = document.createElement('input');
                tanggal2Input.setAttribute('type', 'date');
                tanggal2Input.setAttribute('name', 'tanggal2');
                tanggal2Input.setAttribute('value', new Date().toISOString().slice(0, 10));

                inputContainer.appendChild(tanggal1Label);
                inputContainer.appendChild(tanggal1Input);
                inputContainer.appendChild(tanggal2Label);
                inputContainer.appendChild(tanggal2Input);
            } else if (selectedOption === 'bulan') {
                const bulanLabel = document.createElement('label');
                bulanLabel.innerHTML = 'Bulan: ';

                const bulanInput = document.createElement('input');
                bulanInput.setAttribute('type', 'month');
                bulanInput.setAttribute('name', 'bulan');
                bulanInput.setAttribute('value', new Date().toISOString().slice(0, 7));

                inputContainer.appendChild(bulanLabel);
                inputContainer.appendChild(bulanInput);
            } else if (selectedOption === 'tahun') {
                const tahunLabel = document.createElement('label');
                tahunLabel.innerHTML = 'Tahun: ';

                const tahunInput = document.createElement('input');
                tahunInput.setAttribute('type', 'number');
                tahunInput.setAttribute('name', 'tahun');
                tahunInput.setAttribute('value', new Date().getFullYear());

                inputContainer.appendChild(tahunLabel);
                inputContainer.appendChild(tahunInput);
            }
        }
    </script>
</body>

</html>