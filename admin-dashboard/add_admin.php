<!DOCTYPE html>
<html lang="en">
<div class="container-fluid px-4">

    <?php
    include "../koneksi.php";
    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $usernamelowercase = strtolower(stripslashes('username'));

        $username_already_used = mysqli_query($conn, "SELECT * FROM pengguna WHERE 
    username='$username'");


        if (mysqli_num_rows($username_already_used)) {
            echo "<script>
        alert('Username Sudah Digunkan!');
        </script>";
            return false;
        }

        $data = mysqli_query($conn, "INSERT into pengguna set 
            username = '$username',
            email = '$email',
            password = '$password',
            id_level = '1'
           
        ");

        header("location: index.php?alert=status01");
    }
    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $usernamelowercase = strtolower(stripslashes('username'));

        $username_already_used = mysqli_query($conn, "SELECT * FROM pengguna WHERE 
    username='$username'");


        if (mysqli_num_rows($username_already_used)) {
            echo "<script>
        alert('Username Sudah Digunkan!');
        </script>";
            return false;
        }

        $data = mysqli_query($conn, "INSERT into pengguna set 
            username = '$username',
            email = '$email',
            password = '$password',
            id_level = '1'
           
        ");

        header("location: ../index.php?alert=status01 ");
    }

    ?>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>

    <body>

        <div class="container">
            <div class="row justify-content-center mt-5">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="mt-4">Tambah Admin</h1>
                            <ol class="breadcrumb mb-4">
                                <li class="breadcrumb-item"><a href="index.php" class="text-decoration-none">Dashboard</a></li>
                                <li class="breadcrumb-item active">Tambah Admin</li>
                            </ol>
                        </div>
                        <div class="card-body">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" name="username" id="username" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" id="password" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="submit" class="btn btn-primary btn-block">Tambah</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

</html>