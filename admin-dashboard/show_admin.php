<!DOCTYPE html>
<html>

<head>
  <title>Daftar Admin</title>
</head>

<body>
  <div class="container-fluid px-4">
    <h1 class="mt-4">Admin Tersedia</h1>
    <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item"><a href="index.php" class="text-decoration-none">Dashboard</a></li>
      <li class="breadcrumb-item active">Admin Tersedia</li>
    </ol>
    <form method="POST" action="">
      <div class="form-group">
        <input type="text" name="cari" placeholder="Cari pengguna" class="form-control">
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary">Cari</button>
      </div>
    </form>
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>No</th>
            <th>Username</th>
            <th>Email</th>
            <th>Password</th>
            <th>Edit</th>
            <th>Hapus</th>
          </tr>
        </thead>

        <tbody>
          <?php
          include "../koneksi.php";
          if (isset($_POST['cari'])) {
            $cari = $_POST['cari'];

            $query = "SELECT * FROM pengguna WHERE id_level = 1 AND username LIKE '%" . $cari . "%'";
            $data = mysqli_query($conn, $query);
          } else {
            $query = "SELECT * FROM pengguna WHERE id_level = 1";
            $data = mysqli_query($conn, $query);
          }


          if (mysqli_num_rows($data) > 0) {

            $no = 1;
            while ($row = mysqli_fetch_assoc($data)) {
              echo "<tr>";
              echo "<td>" . $no++ . "</td>";
              echo "<td>" . $row["username"] . "</td>";
              echo "<td>" . $row["email"] . "</td>";
              echo "<td>" . $row["password"] . "</td>";
              echo "<td><a href='edit_pengguna.php?id_pengguna=" . $row['id_pengguna'] . "' class='btn btn-sm btn-primary'>Edit</a></td>";
              echo "<td><button class='btn btn-sm btn-danger' onclick='hapusPengguna(" . $row['id_pengguna'] . ")'>Hapus</button></td>";
              echo "</tr>";
            }
            if (mysqli_num_rows($data) == 0) {
              echo "<tr><td colspan='4'>Tidak ada Pengguna</td></tr>";
            }
          }


          mysqli_close($conn);
          ?>
        </tbody>
      </table>
    </div>
    <script>
      function hapusPengguna(id_pengguna) {
        if (confirm('Apakah anda yakin ingin menghapus?')) {
          window.location.href = 'delete_pengguna.php?id_pengguna=' + id_pengguna;
        }
      }
    </script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>