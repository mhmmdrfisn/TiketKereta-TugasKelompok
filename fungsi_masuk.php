<?php
session_start();
include "koneksi.php";
$username = $_POST['username'];
$password = md5($_POST['password']);


$data = mysqli_query($conn, "SELECT * FROM pengguna WHERE username='$username' AND password='$password'");
$cek = mysqli_num_rows($data);
if ($cek > 0) {
    $row = mysqli_fetch_array($data);
    $_SESSION['id_pengguna'] = $row['id_pengguna'];
    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;
    $_SESSION['id_level'] = $row['id_level'];
    $_SESSION['status'] = 'login';

    if ($row['id_level'] == 1) {
        header("location: admin-dashboard/index.php");
    } elseif ($row['id_level'] == 3) {
        header("location: homepage/index.php");
    } elseif ($row['id_level'] == 2) {
        header("location: office-dashboard/index.php");
    }
} else {
    header("location: login.php?alert=error404");
}
