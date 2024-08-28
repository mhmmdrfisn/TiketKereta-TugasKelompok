<!DOCTYPE html>
<html lang="en">
<?php

include "../koneksi.php";

$sql_jadwal_kereta = "SELECT * FROM jadwal_kereta";
$data = mysqli_query($conn, $sql_jadwal_kereta);
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="admin-assets/style-admin-index.css">
    <title>AdminLoko - Jadwal Kereta</title>
</head>
<style>
    .btn-spacing {
        margin-right: 10px;
        margin-bottom: 10px;
    }
</style>

<body>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Jadwal Tersedia</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php" class="text-decoration-none">Dashboard</a></li>
            <li class="breadcrumb-item active">Jadwal Tersedia</li>
        </ol>

        <div class="table-responsive">

            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID</th>
                        <th>Nama Kereta</th>
                        <th>Dari</th>
                        <th>Tujuan</th>
                        <th>Jam Keberangkatan</th>
                        <th>Jam Kedatangan</th>
                        <th>Tanggal Keberangkatan</th>
                        <th>Harga Tiket</th>
                        <th>Kapasitas Gerbong</th>
                        <th>Edit</th>
                        <th>Hapus</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $no = 1;
                    foreach ($data as $d) : ?>
                        <tr>
                            <td>
                                <?php echo $no++; ?>
                            </td>
                            <td>
                                <?php echo $d['id_jadwal']; ?>
                            </td>
                            <td>
                                <?php echo $d['nama_kereta']; ?>
                            </td>
                            <td>
                                <?php echo $d['kota_asal']; ?>
                            </td>
                            <td>
                                <?php echo $d['kota_tujuan']; ?>
                            </td>
                            <td>
                                <?php echo $d['jam_keberangkatan']; ?>
                            </td>
                            <td>
                                <?php echo $d['jam_kedatangan']; ?>
                            </td>
                            <td>
                                <?php echo $d['tanggal_keberangkatan']; ?>
                            </td>
                            <td>
                                Rp.<?php echo number_format($d["harga_tiket"]); ?>
                            </td>
                            <td>
                                <?php echo $d['kapasitas_gerbong']; ?>
                            </td>
                            <td>
                                <a href="edit_jadwal.php?id_jadwal=<?php echo $d['id_jadwal']; ?>" class="btn btn-sm btn-primary">Edit</a>
                            </td>
                            <td>
                                <button class="btn btn-sm btn-danger" onclick="hapusJadwal(<?php echo $d['id_jadwal']; ?>)">Hapus</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>

                <script>
                    function hapusJadwal(id_jadwal) {
                        if (confirm('Apakah anda yakin ingin menghapus?')) {
                            window.location.href = 'delete_jadwal.php?id_jadwal=' + id_jadwal;
                        }
                    }
                </script>

            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>