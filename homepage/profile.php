<!DOCTYPE html>
<html>

<?php
session_start();
include "../koneksi.php";
include "assets-fungsi/fungsi_profile.php";
if ($_SESSION['status'] != "login") {
    header("location:../index.php?alert=status02");
}
?>

<head>
    <title>HealingLoko - Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../assets/style-userprofile.css">
</head>

<body>
    <div class="container">
        <nav>
            <ul>
                <li><a href="#" data-target="ubah-nama">Ubah Nama</a></li>
                <li><a href="#" data-target="ganti-password">Ubah Password</a></li>
                <li><a href="pesanan_saya.php">Pesanan Saya</a></li>
                <li><a href="riwayat_pesanan.php">Riwayat Pesanan Saya</a></li>
                <li><a href="index.php">Home</a></li>
            </ul>
        </nav>
        <div class="content">
            <h3>Masuk Sebagai : <?php echo $_SESSION["username"]; ?></h3>
            <div id="ubah-nama" class="menu-content">
                <h2>Ubah Nama</h2>
                <form method="POST" action="">
                    <label for="username">Nama Pengguna:</label>
                    <input type="text" name="username" id="username" value="<?php echo $_SESSION["username"]; ?>" required>
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <button type="submit" name="submit-nama">Simpan Perubahan</button>
                </form>

            </div>
            <div id="ganti-password" class="menu-content">
                <h2>Ganti Password</h2>
                <form method="POST" action="">
                    <label for="username">Password Pengguna:</label>
                    <input type="text" name="password" id="password" required>
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <button type="submit" name="submit-pw">Simpan Perubahan</button>
                </form>
            </div>
            <script>
                var contents = document.getElementsByClassName("menu-content");
                for (var i = 0; i < contents.length; i++) {
                    contents[i].style.display = "none";
                }


                var links = document.querySelectorAll("nav a[data-target]");
                for (var i = 0; i < links.length; i++) {
                    links[i].addEventListener("click", function() {

                        for (var i = 0; i < contents.length; i++) {
                            contents[i].style.display = "none";
                        }


                        var targetId = this.getAttribute("data-target");
                        var targetContent = document.getElementById(targetId);


                        targetContent.style.display = "block";
                    });
                }
            </script>
</body>

</html>