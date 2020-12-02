<?php 
session_start();

if( !isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}
if(isset($_POST["keluar"])){
    session_unset();
    session_destroy();

    header("Location: login.php");
    exit;
}
?>

<html>

<head>
    <title>Menambahkan Staff</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body class="bg-light">
    <nav class="navbar navbar-secondary sticky-top bg-light flex-md-nowrap p-0 shadow">
        <a class="navbar-brand  px-4 py-2" href="#">PT MUNDUR JAYA</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse"
            data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <form action="" method="post">
                    <button type="submit" style="border-width: 0;" class="nav-link text-primary bg-light"
                        name="keluar">Sign
                        out</button>
                </form>
            </li>
        </ul>
    </nav>

    <div class="container-fluid bg-light mt-5">
        <div class="col-4 mx-auto my-auto">
            <h2 class="text-primary text-center">Tambah Staff</h2>
            <form action="adddistributor.php" class="form-inline" method="post" name="form1">
                <table class="table table-dark">
                    <tr>
                        <td>No Order</td>
                        <td><input type="text" class="form-control" name="no_order"></td>
                    </tr>
                    <tr>
                        <td>Nama PT</td>
                        <td><input type="text" class="form-control" name="nama_PT"></td>
                    </tr>
                    <tr>
                        <td>alamat</td>
                        <td><input type="text" class="form-control" name="alamat"></td>
                    </tr>
                    <tr>
                        <td>telepon</td>
                        <td><input type="text" class="form-control" name="telepon"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" class="btn btn-primary" name="Submit" value="Add"> <button
                                class="btn btn-warning ml-2 "><a class="text-light"
                                    href="staffgudang.php">Kembali</a></button></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>

    <?php

    // Check If form submitted, insert form data into users table.
    if(isset($_POST['Submit'])) {
        $order = $_POST['no_order'];
        $nama = $_POST['nama_PT'];
        $alamat = $_POST['alamat'];
        $telepon = $_POST['telepon'];

        // include database connection file
        include_once("functions.php");

        // Insert user data into table
        $result = mysqli_query($mysqli, "INSERT INTO distributor(no_order,nama_PT,alamat,telepon) VALUES('$order','$nama','$alamat', '$telepon')");

        // Show message when user added
        header("Location: distributor.php");
        exit;
    }
    ?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
</body>

</html>