<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    include "../koneksi.php";
    include "admin-assets-fungsi/fungsi_index_admin.php";
    ?>



    <form action="" method="post">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <div class="container-fluid px-4">
                                <h1 class="mt-4">Tambah Petugas</h1>
                                <ol class="breadcrumb mb-4">
                                    <li class="breadcrumb-item"><a href="index.php" class="text-decoration-none">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item active">Tambah Petugas</li>
                                </ol>
                            </div>
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input class="form-control" type="text" name="username" id="username" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input class="form-control" type="email" name="email" id="email" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input class="form-control" type="password" name="password" id="password" required>
                                </div>
                                <div class="form-group">
                                    <label for="nama_lengkap">Nama Lengkap</label>
                                    <input class="form-control" type="text" name="nama_lengkap" id="nama_lengkap" required>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_kelahiran">Tanggal Kelahiran</label>
                                    <input class="form-control" type="date" name="tanggal_kelahiran" id="tanggal_kelahiran" required>
                                </div>
                                <div class="form-group">
                                    <label for="umur">Umur</label>
                                    <input class="form-control" type="number" name="umur" id="umur" required>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <textarea class="form-control" rea name="alamat" id="alamat" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="nomor_telfon">Nomor Telfon</label>
                                    <input class="form-control" type="text" name="nomor_telfon" id="nomor_telfon" required>
                                </div>
                                <div class="text-center">
                                    <input class="btn btn-primary" type="submit" name="simpan" value="Simpan">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </form>
</body>

</html>