<?php
session_start();
include "../koneksi.php";

if ($_SESSION['status'] != "login") {
    header("location:../index.php?alert=status02");
}

if (isset($_POST['update'])) {
    $id_pengguna = $_POST['id_pengguna'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $tanggal_kelahiran = $_POST['tanggal_kelahiran'];
    $umur = $_POST['umur'];
    $alamat = $_POST['alamat'];
    $nomor_telfon = $_POST['nomor_telfon'];

    $hashed_password = md5($password);

    $update_pengguna = mysqli_query($conn, "UPDATE pengguna SET username='$username', email='$email', password='$hashed_password' WHERE id_pengguna='$id_pengguna'");

    $update_data_petugas = mysqli_query($conn, "UPDATE data_petugas SET nama_lengkap='$nama_lengkap', tanggal_kelahiran='$tanggal_kelahiran', umur='$umur', alamat='$alamat', nomor_telfon='$nomor_telfon' WHERE id_pengguna='$id_pengguna'");

    $result = mysqli_query($conn, "SELECT * FROM pengguna WHERE id_pengguna='$id_pengguna'");
    if (mysqli_num_rows($result) > 0) {
        header("location: index.php");
    } else {
        echo "Data tidak ditemukan";
    }
}
