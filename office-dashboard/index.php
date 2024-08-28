<!DOCTYPE html>
<html>

<head>
	<title>Form Pembayaran</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
	<div class="container">
		<div class="container-fluid px-4">
			<h1 class="mt-4">Form Kode Pembayaran</h1>
			<ol class="breadcrumb mb-4">
				<li class="breadcrumb-item"><a href="logout.php" class="text-decoration-none">Logout</a></li>
				<li class="breadcrumb-item active">Form Kode Pembayaran</li>
			</ol>
			<form method="POST" action="struk.php">
				<div class="form-group">
					<label for="kode_pembayaran">Kode Pembayaran:</label>
					<input type="text" class="form-control" name="kode_pembayaran" required>
				</div>
				<div class="form-group">
					<label for="total_uang">Total Uang Pelanggan:</label>
					<input type="number" class="form-control" name="total_uang" required>
				</div>
				<button type="submit" class="btn btn-primary" name="submit">Cek Pembayaran</button>
			</form>
		</div>
	</div>
</body>

</html>