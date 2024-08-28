<!DOCTYPE html>
<html>

<head>
  <title>Daftar Pengguna</title>
</head>

<body>
  <div class="container-fluid px-4">
    <h1 class="mt-4">Pengguna Tersedia</h1>
    <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item"><a href="index.php" class="text-decoration-none">Dashboard</a></li>
      <li class="breadcrumb-item active">Pengguna Tersedia</li>
    </ol>
    <form method="POST" action="">
      <div class="form-group">
        <input type="text" name="cari" placeholder="Cari pengguna" class="form-control">
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary">Cari</button>
      </div>
    </form>
    <?php
    include "../koneksi.php";
    if (isset($_POST['cari'])) {
      $cari = $_POST['cari'];

      $query = "SELECT * FROM pengguna WHERE username LIKE '%" . $cari . "%' OR email LIKE '%" . $cari . "%'";

      $data = mysqli_query($conn, $query);
    } else {
      $query = "SELECT * FROM pengguna";
      $data = mysqli_query($conn, $query);
    }
    ?>
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

            $query = "SELECT * FROM pengguna WHERE id_level = 3 AND username LIKE '%" . $cari . "%'";
            $data = mysqli_query($conn, $query);
          } else {
            $query = "SELECT * FROM pengguna WHERE id_level = 3";
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
</body>

</html>