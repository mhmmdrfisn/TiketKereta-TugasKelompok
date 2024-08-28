<!DOCTYPE html>
<html>

<head>
	<title>Form Pembayaran</title>

</head>

<body>
	<div class="container">
		<div class="container-fluid px-4">
			<h1 class="mt-4">Form Kode Pembayaran</h1>
			<ol class="breadcrumb mb-4">
				<li class="breadcrumb-item"><a href="index.php" class="text-decoration-none">Dashboard</a></li>
				<li class="breadcrumb-item active">Form Kode Pembayaran</li>
			</ol>
			<form method="POST" action="">
				<div class="form-group">
					<label for="kode_pembayaran">Kode Pembayaran:</label>
					<input type="text" class="form-control" name="kode_pembayaran" required>
				</div>
				<button type="submit" class="btn btn-primary" name="submit">Cek Pembayaran</button>
			</form>
			<?php
			include "../koneksi.php";
			if (isset($_POST['submit'])) {
				$kode_pembayaran = $_POST['kode_pembayaran'];

				$sql = "SELECT * FROM rincian_pemesanan WHERE kode_pembayaran='$kode_pembayaran'";
				$result = mysqli_query($conn, $sql);

				if (mysqli_num_rows($result) > 0) {
					echo "<h3>Data Pemesanan:</h3>";
					echo "<div class='table-responsive'>";
					echo "<table class='table'>";
					echo "<thead>";
					echo "<tr>";
					echo "<th>Tipe ID</th>";
					echo "<th>No. ID</th>";
					echo "<th>Nama Lengkap</th>";
					echo "<th>Jumlah Penumpang</th>";
					echo "<th>Total Harga</th>";
					echo "<th>Nomor Kursi</th>";
					echo "<th>Status Pembayaran</th>";
					echo "<th>Kode Pembayaran</th>";
					echo "<th>Waktu Pemesanan</th>";
					echo "<th>Aksi</th>";
					echo "</tr>";
					echo "</thead>";
					echo "<tbody>";
					while ($row = mysqli_fetch_assoc($result)) {
						echo "<tr>";
						echo "<td>" . $row['tipe_id'] . "</td>";
						echo "<td>" . $row['no_id'] . "</td>";
						echo "<td>" . $row['nama_lengkap'] . "</td>";
						echo "<td>" . $row['jumlah_penumpang'] . "</td>";
						echo "<td>" . "Rp." . number_format($row['total_harga']) . "</td>";
						echo "<td>" . $row['nomor_kursi'] . "</td>";
						echo "<td>" . $row['status_pembayaran'] . "</td>";
						echo "<td>" . $row['kode_pembayaran'] . "</td>";
						echo "<td>" . $row['waktu_pemesanan'] . "</td>";
						echo "<td><form method='POST' action=''><input type='hidden' name='id_pemesanan' value='" . $row['id_pemesanan'] . "'><button type='submit' class='btn btn-success' name='lunas'>Nyatakan Lunas</button></form></td>";
						echo "</tr>";
					}



					echo "</table>";
				} else {
					echo "Data tidak ditemukan.";
				}
			}


			if (isset($_POST['lunas'])) {
				$id_pemesanan = $_POST['id_pemesanan'];


				$query = "SELECT status_pembayaran FROM rincian_pemesanan WHERE id_pemesanan = '$id_pemesanan'";
				$result = mysqli_query($conn, $query);
				$row = mysqli_fetch_assoc($result);
				if ($row['status_pembayaran'] == 'Lunas') {
					echo "<script>alert('Pemesanan dengan No ID $id_pemesanan sudah lunas!');</script>";
				} else {

					$query = "UPDATE rincian_pemesanan SET status_pembayaran = 'Lunas' WHERE id_pemesanan = '$id_pemesanan'";
					mysqli_query($conn, $query);


					$query = "UPDATE jadwal_kereta jk JOIN rincian_pemesanan rp ON jk.id_jadwal = rp.id_jadwal SET jk.kapasitas_gerbong = jk.kapasitas_gerbong - rp.jumlah_penumpang WHERE rp.id_pemesanan = '$id_pemesanan'";
					mysqli_query($conn, $query);

					echo "<script>alert('Pemesanan dengan No ID $id_pemesanan berhasil dinyatakan lunas!');</script>";
				}
			}



			?>