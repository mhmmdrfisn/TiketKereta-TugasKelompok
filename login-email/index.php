<?php
if(isset($_GET['alert'])){
    if($_GET['alert'] == "error404"){
        echo"<script>
    alert('Login Gagal! Username atau Password Salah!, Jika Belum Memiliki Akun Silahkan Buat Akun!');
    </script>";
    } else if($_GET['alert'] == "status01"){
        echo"<script>
        alert('Berhasi Logout!');
        </script>";
    } else if($_GET['alert'] == "status02"){
        echo"<script>
        alert('Anda Harus Login Terlebih Dahulu!');
        </script>";
    }else if($_GET['alert'] == "status03"){
        echo"<script>
        alert('Berhasil Membuat Akun, Silahkan Login');
        </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Email</title>
    <link rel="stylesheet" href="../style.css">
</head>
<style>
    ::-webkit-scrollbar {
      width: 20px;
    }
    ::-webkit-scrollbar-track {
      background-color: transparent;
    }
    ::-webkit-scrollbar-thumb {
      background-color: #d6dee1;
      border-radius: 20px;
      border: 6px solid transparent;
      background-clip: content-box;
    }
    ::-webkit-scrollbar-thumb:hover {
      background-color: #a8bbbf;
    }
</style>
<body>
    <div class="login">
        <div class="login-form">
                <div class="title">
                    <h1>Login Email</h1>
                </div>
                <div class="input">
                    <form action="cek_login_email.php" method="post">
                        <input type="email" placeholder="Email" name="email">
                        <input type="password" placeholder="Password" name="password">
                        <input type="submit" value="Masuk" name="submit">
                    </form>
                </div>
                <div class="link">
                  Belum Mempunyai Akun? <a href="../register/index.php">Daftar</a>
                </div>
        </div>
        <div class="gambar"></div>
    </div>
</body>
</html>