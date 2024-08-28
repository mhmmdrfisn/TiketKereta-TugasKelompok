<?php
include "koneksi.php";
if (isset($_POST['submit_daftar'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $usernamelowercase = strtolower(stripslashes('username'));

    $username_already_used = mysqli_query($conn, "SELECT * FROM pengguna WHERE 
    username='$username'");


    if (mysqli_num_rows($username_already_used)) {
        echo "<script>
        alert('Username Sudah Digunkan!');
        </script>";
        return false;
    }

    $data = mysqli_query($conn, "INSERT into pengguna set 
            username = '$username',
            email = '$email',
            password = '$password',
            id_level = '3'
           
        ");
    header("location:daftar.php?alert=status03");
}
