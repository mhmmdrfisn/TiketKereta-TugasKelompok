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



    $result = mysqli_query($conn, "SELECT * FROM pengguna WHERE id_pengguna='$id_pengguna'");
    if (mysqli_num_rows($result) > 0) {

        $update = mysqli_query($conn, "UPDATE pengguna SET username='$username', 
                                                                  email='$email', 
                                                                  password='$password'
                                                                WHERE id_pengguna='$id_pengguna'");

        $data = mysqli_query($conn, "SELECT * FROM pengguna WHERE id_pengguna='$id_pengguna'");

        header("location: index.php");
    } else {

        echo "Data tidak ditemukan";
    }
}
