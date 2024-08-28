<?php
session_start();
include "../koneksi.php";
if ($_SESSION['status'] != "login") {
   header("location:../index.php?alert=status02");
}
?>
<!DOCTYPE html>
<html>

<head>
   <title>HealingLoko - Pemesanan Tiket</title>
   <link rel="stylesheet" href="../assets/style-buy-tiket.css">
</head>

<body>
   <h3>Mau Kemana?</h3>
   <form action="" method="get">
      <label>Dari :</label>
      <select name="cari">
         <optgroup label="Kabupaten Bandung">
            <option value="Cicalengka">Cicalengka (CCL)</option>
            <option value="Haurpugur">Haurpugur (HRP)</option>
            <option value="Rancaekek">Rancaekek (RCK)</option>
            <option value="Cimekar">Cimekar (CMK)</option>
         <optgroup label="Kota Bandung">
            <option value="Kiaracondong">Kiaracondong (KAC)</option>
            <option value="Cikudapateuh">Cikudapateuh (CTH)</option>
            <option value="Bandung">Bandung (BD)</option>
            <option value="Ciroyom">Ciroyom (CIR) </option>
            <option value="Cimindi">Cimindi (CMD)</option>
         <optgroup label="Kota Cimahi">
            <option value="Cimahi">Cimahi (CMI)</option>
            <option value="Gadobangkong">Gadobangkong (GK)</option>
         <optgroup label="Kabupaten Bandung Barat">
            <option value="Padalarang">Padalarang (PDL)</option>
            <option value="Cilame">Cilame (CLE)</option>
            <option value="Sasaksaat">Sasaksaat (SKT)</option>
            <option value="Maswati">Maswati (MSI)</option>
            <option value="Rendeh">Rendeh (RH)</option>
            <option value="Cikadondong">Cikadondong (CD)</option>
         <optgroup label="Kabupaten Purwakarta">
            <option value="Plered">Plered (PLD)</option>
            <option value="Cikadondong">Sukatani (SUT)</option>
            <option value="Ciganea">Ciganea (CA)</option>
            <option value="Purwakarta">Purwakarta (PWK)</option>
      </select>
      <label>Ke :</label>
      <select name="cari2">
         <optgroup label="Kabupaten Bandung">
            <option value="Cicalengka">Cicalengka (CCL)</option>
            <option value="Haurpugur">Haurpugur (HRP)</option>
            <option value="Rancaekek">Rancaekek (RCK)</option>
            <option value="Cimekar">Cimekar (CMK)</option>
         <optgroup label="Kota Bandung">
            <option value="Kiaracondong">Kiaracondong (KAC)</option>
            <option value="Cikudapateuh">Cikudapateuh (CTH)</option>
            <option value="Bandung">Bandung (BD)</option>
            <option value="Ciroyom">Ciroyom (CIR) </option>
            <option value="Cimindi">Cimindi (CMD)</option>
         <optgroup label="Kota Cimahi">
            <option value="Cimahi">Cimahi (CMI)</option>
            <option value="Gadobangkong">Gadobangkong (GK)</option>
         <optgroup label="Kabupaten Bandung Barat">
            <option value="Padalarang">Padalarang (PDL)</option>
            <option value="Cilame">Cilame (CLE)</option>
            <option value="Sasaksaat">Sasaksaat (SKT)</option>
            <option value="Maswati">Maswati (MSI)</option>
            <option value="Rendeh">Rendeh (RH)</option>
            <option value="Cikadondong">Cikadondong (CD)</option>
         <optgroup label="Kabupaten Purwakarta">
            <option value="Plered">Plered (PLD)</option>
            <option value="Cikadondong">Sukatani (SUT)</option>
            <option value="Ciganea">Ciganea (CA)</option>
            <option value="Purwakarta">Purwakarta (PWK)</option>
      </select>
      <label>tanggal :</label>
      <input type="date" name="cari3" value="<?php echo date('Y-m-d'); ?>" required>
      <input type="submit" value="Cari">
      <a href="index.php">Kembali</a>
   </form>

   <?php
   if (isset($_GET['cari']) && isset($_GET['cari2']) && isset($_GET['cari3'])) {
      $cari = $_GET['cari'];
      $cari2 = $_GET['cari2'];
      $cari3 = $_GET['cari3'];

      echo "<b> Dari : " . $cari . " |</b>";
      echo "<b> Ke : " . $cari2 . " |</b>";
      echo "<b> Tanggal Keberangkatan : " . $cari3 . "</b>";
   }
   ?>

   <table border="1">
      <tr>
         <th>No</th>
         <!-- <th>ID</th> -->
         <th>Nama Kereta</th>
         <th>Dari</th>
         <th>Tujuan</th>
         <th>Jam Keberangakatan</th>
         <th>Jam Kedatangan</th>
         <th>Tanggal Keberangakatan</th>
         <th>Harga Tiket</th>
         <th>Kapasitas Gerbong Tersedia</th>
         <th>Action</th>
      </tr>
      <?php
      date_default_timezone_set('Asia/Jakarta');
      $tanggal_sekarang = date("Y-m-d");
      $jam_sekarang = date('H:i:s', time());
      $jadwal_lewat = mysqli_query($conn, "SELECT * FROM jadwal_kereta WHERE tanggal_keberangkatan <= '$tanggal_sekarang'");
      if (mysqli_num_rows($jadwal_lewat) > 0) {
         foreach ($jadwal_lewat as $jadwal) {
            $id_jadwal = $jadwal['id_jadwal'];
            $nama_kereta = $jadwal['nama_kereta'];
            $kota_asal = $jadwal['kota_asal'];
            $kota_tujuan = $jadwal['kota_tujuan'];
            $jam_keberangkatan = $jadwal['jam_keberangkatan'];
            $jam_kedatangan = $jadwal['jam_kedatangan'];
            $harga_tiket = $jadwal['harga_tiket'];
            $kapasitas_gerbong = $jadwal['kapasitas_gerbong'];
            $tanggal_keberangkatan =  $jadwal['tanggal_keberangkatan'];
            $tanggal_update = date('Y-m-d', strtotime($tanggal_keberangkatan . ' +1 day'));
            try {
               $sql = mysqli_query($conn, "INSERT INTO jadwal_kereta VALUES(null,'$nama_kereta','$kota_asal','$kota_tujuan','$jam_keberangkatan','$jam_kedatangan','$harga_tiket','$kapasitas_gerbong','$tanggal_update')");
            } catch (Exception $th) {
               if (isset($_GET['cari']) && isset($_GET['cari2']) && isset($_GET['cari3'])) {
                  $cari = $_GET['cari'];
                  $cari2 = $_GET['cari2'];
                  $cari3 = $_GET['cari3'];
                  $query = "SELECT * FROM jadwal_kereta WHERE kota_asal LIKE '%" . $cari . "%' AND kota_tujuan LIKE '%" . $cari2 . "%' AND tanggal_keberangkatan >= '" . $cari3 . "'";
                  $data = mysqli_query($conn, $query);
               } else {
                  $query = "SELECT * FROM jadwal_kereta WHERE (tanggal_keberangkatan = '$tanggal_sekarang' AND jam_keberangkatan > '$jam_sekarang') OR tanggal_keberangkatan > '$tanggal_sekarang' ORDER BY tanggal_keberangkatan ASC, jam_keberangkatan ASC";
                  $data = mysqli_query($conn, $query);
               }
            }
         }
      }

      $query = "SELECT * FROM jadwal_kereta WHERE (tanggal_keberangkatan = '$tanggal_sekarang' AND jam_keberangkatan > '$jam_sekarang') OR tanggal_keberangkatan > '$tanggal_sekarang' ORDER BY tanggal_keberangkatan ASC, jam_keberangkatan ASC";

      $data = mysqli_query($conn, $query);
      $no = 1;
      while ($d = mysqli_fetch_array($data)) {
      ?>
         <tr>
            <td><?php echo $no++; ?></td>
            <!-- <td></?php echo $d['id_jadwal']; ?></td> -->
            <td><?php echo $d['nama_kereta']; ?></td>
            <td><?php echo $d['kota_asal']; ?></td>
            <td><?php echo $d['kota_tujuan']; ?></td>
            <td><?php echo $d['jam_keberangkatan']; ?></td>
            <td><?php echo $d['jam_kedatangan']; ?></td>
            <td><?php echo $d['tanggal_keberangkatan']; ?></td>
            <td><?php echo "Rp." . number_format($d['harga_tiket']); ?></td>
            <td><?php echo $d['kapasitas_gerbong']; ?></td>
            <td>
               <form action="pemesanan.php" method="post">
                  <input type="hidden" name="id_jadwal" value="<?= $d['id_jadwal'] ?>">
                  <label>Jumlah Penumpang :</label>
                  <input type="number" name="jumlah_penumpang" value="1" max="5" min="1" required>

                  <input type="submit" name="submit-tiket" value="Beli Tiket">
               </form>
            </td>
         </tr>
      <?php } ?>
   </table>
</body>

</html>