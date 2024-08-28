<?php
session_start();
include "../koneksi.php";
if ($_SESSION['status'] != "login") {
    header("location:../index.php?alert=status02");
}
$id_pengguna = $_GET['id_pengguna'];

$query = "SELECT * FROM pengguna WHERE id_pengguna = $id_pengguna";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>AdminLoko - Edit Pengguna</title>
    </head>
    <style>
        body {
            background-color: #f2f2f2;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }

        header {
            background-color: #336699;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            padding: 20px;
            margin-bottom: 20px;
        }

        h1 {
            font-size: 24px;
            margin: 10px 0 0;
        }

        .form-group {
            margin-bottom: 10px;
        }

        select {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            width: 100%;
            margin-bottom: 10px;
        }

        option {
            padding: 10px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="time"],
        input[type="number"],
        input[type="date"] {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            width: 100%;
        }

        button[type="submit"] {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-right: 10px;
        }

        .btn-secondary {
            background-color: #ccc;
            color: #333;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        @media (min-width: 768px) {
            .container {
                max-width: 600px;
                margin: auto;
            }
        }
    </style>

    <body>
        <form action="proses_edit_pengguna.php" method="post">
            <table>
                <tr>
                    <td>
                        <h3>Edit Pengguna</h3>
                    </td>
                </tr>
                <tr>
                    <td>
                        ID Pengguna
                    </td>
                    <td>
                        <input type="hidden" name="id_pengguna" value="<?php echo $id_pengguna ?>">
                    </td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        Nama
                    </td>
                    <td>
                        <input type="text" name="username" value="<?php echo $row['username']; ?>">
                    </td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        Email
                    </td>
                    <td>
                        <input type="email" name="email" value="<?php echo $row['email']; ?>">
                    </td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        Password
                    </td>
                    <td>
                        <input type="password" name="password" value="<?php echo $row['password']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <button type="submit" name="update">Update</button>

                    </td>
                </tr>
            </table>
        </form>
    <?php
} else {
    echo "Pengguna tidak ditemukan.";
}

mysqli_close($conn);
    ?>
    </body>

    </html>