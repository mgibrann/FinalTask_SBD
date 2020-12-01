<?php 
session_start();

if( !isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}
?>

<html>

<head>
    <title>Menambahkan Makanan</title>
</head>

<body>
    <a href="index.php">Kembali ke Home</a>
    <br /><br />

    <h2>Menambahkan makanan</h2>

    <form action="add.php" method="post" name="form1">
        <table width="25%" border="0">
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama_makanan"></td>
            </tr>
            <tr>
                <td>Jumlah</td>
                <td><input type="text" name="jumlah_makanan"></td>
            </tr>
            <tr>
                <td>Harga</td>
                <td><input type="text" name="harga_makanan"></td>
            </tr>
            <tr>
                <td>Order</td>
                <td><input type="text" name="no_order"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="Submit" value="Add"></td>
            </tr>
        </table>
    </form>

    <?php

    // Check If form submitted, insert form data into users table.
    if(isset($_POST['Submit'])) {
        $nama = $_POST['nama_makanan'];
        $jumlah = $_POST['jumlah_makanan'];
        $harga = $_POST['harga_makanan'];
        $order = $_POST['no_order'];

        // include database connection file
        include_once("functions.php");

        // Insert user data into table
        $result = mysqli_query($mysqli, "INSERT INTO makanan(id_makanan,nama_makanan,jumlah_makanan,harga_makanan,no_order) VALUES('','$nama','$jumlah','$harga','$order')");

        // Show message when user added
        echo "Berhasil Menambahkan Makanan. <a href='index.php'>Lihat Makanan</a>";
    }
    ?>
</body>

</html>