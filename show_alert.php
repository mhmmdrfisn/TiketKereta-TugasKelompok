<?php
function showAlert($alert)
{
    $message = "";
    switch ($alert) {
        case "error404":
            $message = "Login Gagal! Username atau Password Salah!, Jika Belum Memiliki Akun Silahkan Buat Akun!";
            break;
        case "status01":
            $message = "Berhasi Logout!";
            break;
        case "status02":
            $message = "Anda Harus Login Terlebih Dahulu!";
            break;
        case "status03":
            $message = "Berhasil Membuat Akun, Silahkan Login";
            break;
        case "status04":
            $message = "Berhasil Memperbaharui! Silahkan Login Kembali";
            break;
    }
    echo "<script>alert('$message');</script>";
}
