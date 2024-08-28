<?php
include "../koneksi.php";


if (mysqli_connect_errno()) {
    echo "Koneksi ke Database Gagal!", mysqli_connect_error();
}
if (isset($_GET['id_pengguna'])) {
    $id_pengguna   = $_GET['id_pengguna'];
} else {
    echo "Error! Hubungi Teknisi Segera";
}

if (!empty($id_pengguna) && $id_pengguna != "") {
    $hapus = mysqli_query($conn, "DELETE FROM pengguna WHERE id_pengguna='$id_pengguna'");
?>
    <script language="JavaScript">
        alert('Berhasil Dihapus!');
        document.location = 'index.php';
    </script>
<?php
}
?>