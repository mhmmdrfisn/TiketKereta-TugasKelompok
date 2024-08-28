<?php
session_start();
include "../koneksi.php";

$email = $_POST['email'];
$password = $_POST['password'];

$data = mysqli_query($conn, "select * from pengguna where email='$email' and password='$password'");
$cek = mysqli_num_rows($data);
if($cek > 0){
    $_SESSION['email'] = $email;
    $_SESSION['status'] = "login";
    header ("location: ../homepage/index.php?alert=status04");

} else {
    header("location: index.php?alert=error404");
}
?>