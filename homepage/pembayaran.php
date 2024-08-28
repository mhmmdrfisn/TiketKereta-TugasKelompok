<?php
session_start();
include "../koneksi.php";
if ($_SESSION['status'] != "login") {
    header("location:../index.php?alert=status02");
}

if (isset($_POST['submit'])) {

    $id_jadwal = $_POST['id_jadwal'];
    $nomor_kursi = $_POST['nomor_kursi'];
    $jumlah_penumpang = $_POST['jumlah_penumpang'];

    $query_jadwal = "SELECT * FROM jadwal_kereta WHERE id_jadwal = '$id_jadwal'";
    $result_jadwal = mysqli_query($conn, $query_jadwal);
    $data_jadwal = mysqli_fetch_assoc($result_jadwal);

    $id_pengguna = $_SESSION['id_pengguna'];
    $query_pengguna = "SELECT * FROM pengguna WHERE id_pengguna = $id_pengguna";
    $result_pengguna = mysqli_query($conn, $query_pengguna);
    $data_pengguna = mysqli_fetch_assoc($result_pengguna);

    $tipe_id = $_POST['tipe_id'];
    $no_id = $_POST['no_id'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $nama_lengkap_arr = explode(",", $nama_lengkap);
    $nnomor_kursi_arr = explode(",", $nomor_kursi);

    $total_harga = $data_jadwal['harga_tiket'] * count($nama_lengkap_arr);

    $kapasitas_gerbong = $data_jadwal['kapasitas_gerbong'];
    $jumlah_pemesanan = $jumlah_penumpang * count($nama_lengkap_arr);
    if ($kapasitas_gerbong >= $jumlah_pemesanan) {

        $status_pembayaran = 'belum bayar';
        $query = "INSERT INTO rincian_pemesanan (id_pengguna, id_jadwal, tipe_id, no_id, nama_lengkap, jumlah_penumpang, total_harga, nomor_kursi, status_pembayaran) VALUES ('$id_pengguna', '$id_jadwal', '$tipe_id', '$no_id', '$nama_lengkap', '$jumlah_penumpang', '$total_harga', '$nomor_kursi','$status_pembayaran')";
        $result = mysqli_query($conn, $query);

        if ($result) {

            header("Location: struk_tagihan_pemesanan.php");
            exit();
        } else {

            header("Location: gagal_pembayaran.php");
            exit();
        }
    } else {

        header("Location: gagal_pembayaran.php?pesan=kapasitas_gerbong_tidak_cukup");
        exit();
    }
}
