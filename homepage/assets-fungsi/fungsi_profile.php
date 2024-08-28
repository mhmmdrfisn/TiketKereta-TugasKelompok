<?php

if (isset($_POST['submit-nama'])) {
    $id_pengguna = $_SESSION['id_pengguna'];
    $username = $_POST['username'];

    
    $query = "UPDATE pengguna SET username = '$username' WHERE id_pengguna = $id_pengguna";
    $hasil = mysqli_query($conn, $query);

    if ($hasil) {
        header("location: logout_update.php");
    } else {
        echo "<script>alert('Perubahan gagal disimpan');</script>";
    }
}
?>

<?php

if (isset($_POST['submit-pw'])) {
    $id_pengguna = $_SESSION['id_pengguna'];
    $password = md5($_POST['password']);

    $query = "UPDATE pengguna SET password = '$password' WHERE id_pengguna = $id_pengguna";
    $hasil = mysqli_query($conn, $query);

    if ($hasil) {
        header("location: logout_update.php");
    } else {
        echo "<script>alert('Perubahan gagal disimpan');</script>";
    }
}
?>