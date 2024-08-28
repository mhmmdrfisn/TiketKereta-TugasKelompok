<?php
$conn = mysqli_connect("localhost", "root", "", "kai_kelompok");

if (mysqli_connect_errno()){
    echo"Koneksi ke Database Gagal!", mysqli_connect_error();
}
?>

