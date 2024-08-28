<?php
include "koneksi.php";
include 'show_alert.php';
include 'fungsi_daftar.php';

if (isset($_GET['alert'])) {
    showAlert($_GET['alert']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style-masuk-daftar.css">
    <title>HealingLoko - Masuk dan Daftar</title>
</head>

<body>

    <body>
        <div class="main">
            <input type="checkbox" id="chk" aria-hidden="true">

            <div class="signup">
                <form action="" method="POST">
                    <label for="chk" aria-hidden="true">Daftar</label>
                    <input type="text" name="username" placeholder="Username" required="">
                    <input type="email" name="email" placeholder="Email" required="">
                    <input type="password" name="password" placeholder="Password" required="">
                    <button name="submit_daftar">Daftar</button>
                </form>
            </div>

            <div class="login">
                <form action="fungsi_masuk.php" method="POST">
                    <label for="chk" aria-hidden="true">Masuk</label>
                    <input type="text" name="username" placeholder="Username" required="">
                    <input type="password" name="password" placeholder="Password" required="">
                    <button name="submit_masuk">Masuk</button>
                </form>
            </div>
        </div>
    </body>

</html>