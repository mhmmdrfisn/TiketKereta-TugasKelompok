<?php
session_start();
include "../koneksi.php";


if (isset($_POST['update'])) {
    $n_kereta = $_POST['n_kereta'];
    $k_asal = $_POST['k_asal'];
    $k_tujuan = $_POST['k_tujuan'];
    $jam_b = $_POST['jam_b'];
    $jam_k = $_POST['jam_k'];
    $h_ket = $_POST['h_ket'];
    $ka_ger = $_POST['ka_ger'];
    $tang_ket = $_POST['tang_ket'];
    $id_jadwal = $_SESSION['id_jadwal'];


    $result = mysqli_query($conn, "SELECT * FROM jadwal_kereta WHERE id_jadwal='$id_jadwal'");
    if (mysqli_num_rows($result) > 0) {

        $update = mysqli_query($conn, "UPDATE jadwal_kereta SET nama_kereta='$n_kereta', 
                                                                  kota_asal='$k_asal', 
                                                                  kota_tujuan='$k_tujuan', 
                                                                  jam_keberangkatan='$jam_b',
                                                                  jam_kedatangan='$jam_k', 
                                                                  harga_tiket='$h_ket', 
                                                                  kapasitas_gerbong='$ka_ger',
                                                                  tanggal_keberangkatan='$tang_ket'
                                        WHERE id_jadwal='$id_jadwal'");

        $data = mysqli_query($conn, "SELECT * FROM jadwal_kereta WHERE id_jadwal='$id_jadwal'");

        header("location: index.php");
    } else {

        echo "Data tidak ditemukan";
    }
}
