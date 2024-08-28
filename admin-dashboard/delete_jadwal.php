<?php
include "../koneksi.php";


if (mysqli_connect_errno()) {
    echo "Koneksi ke Database Gagal!", mysqli_connect_error();
}
if (isset($_GET['id_jadwal'])) {
    $id_jadwal   = $_GET['id_jadwal'];
} else {
    echo "Error! Hubungi Teknisi Segera";
}

if (!empty($id_jadwal) && $id_jadwal != "") {
    $hapus = mysqli_query($conn, "DELETE FROM jadwal_kereta WHERE id_jadwal='$id_jadwal'");
?>
    <script language="JavaScript">
        alert('Berhasil Dihapus!');
        document.location = 'index.php';
    </script>
<?php
}
?>