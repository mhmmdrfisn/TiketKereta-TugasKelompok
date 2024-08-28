<?php
session_start();
include "../koneksi.php";
if ($_SESSION['status'] != "login") {
    header("location:../index.php?alert=status02");
}
$id_pengguna = $_GET['id_pengguna'];

$query = "SELECT * FROM pengguna JOIN data_petugas ON pengguna.id_pengguna = data_petugas.id_pengguna WHERE pengguna.id_level = 2";;
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
        <title>AdminLoko - Edit Officer</title>
    </head>
    <body>
    <form action="proses_edit_officer.php" method="post">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                            <div class="card-body">
                            <div class="form-group">
                             <input type="hidden" name="id_pengguna" value="<?php echo $id_pengguna ?>">
                                </div>
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input class="form-control" type="text" name="username" id="username" value="<?php echo $row['username']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input class="form-control" type="email" name="email" id="email" value="<?php echo $row['email']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input class="form-control" type="password" name="password" id="password" required>
                                </div>
                                <div class="form-group">
                                    <label for="nama_lengkap">Nama Lengkap</label>
                                    <input class="form-control" type="text" name="nama_lengkap" id="nama_lengkap" value="<?php echo $row['nama_lengkap']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_kelahiran">Tanggal Kelahiran</label>
                                    <input class="form-control" type="date" name="tanggal_kelahiran" id="tanggal_kelahiran" value="<?php echo $row['tanggal_kelahiran']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="umur">Umur</label>
                                    <input class="form-control" type="number" name="umur" id="umur" value="<?php echo $row['umur']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <textarea class="form-control" name="alamat" id="alamat" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="nomor_telfon">Nomor Telfon</label>
                                    <input class="form-control" type="text" name="nomor_telfon" id="nomor_telfon" value="<?php echo $row['nomor_telfon']; ?>" required>
                                </div>
                                <div class="text-center">
                                    <input class="btn btn-primary" type="submit" name="update" value="Simpan">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </form>
    <?php
} else {
    echo "Pengguna tidak ditemukan.";
}

mysqli_close($conn);
    ?>
    </body>

    </html>