<?php
session_start();

if( !isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}

// Create database connection using config file
include_once('functions.php');

// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT * FROM makanan ORDER BY id_makanan ASC");

//tombol cari ditekan
if(isset($_POST["cari"])){
    $result = cari($_POST["keyword"]);
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
    <title>Homepage</title>
</head>

<body>
    <a href="add.php">Tambah Makanan Baru</a><br /><br />
    <form action="" method="post">
        <button type="submit" name="keluar">logout</button>
    </form>

    <form action="" method="post">
        <input type="text" name="keyword" placeholder="Masukan Keyword pencarian..." size="40" autocomplete="off">
        <button type="submit" name="cari">Cari</button>
    </form>
    <table width='80%' border=1>

        <tr>
            <th>id</th>
            <th>Nama</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>no_order</th>
            <th>Update</th>
        </tr>
        <?php foreach($result as $data_makanan):?>
        <tr>
            <td><?= $data_makanan['id_makanan']; ?></td>
            <td><?= $data_makanan['nama_makanan']; ?></td>
            <td><?= $data_makanan['jumlah_makanan']; ?></td>
            <td><?= $data_makanan['harga_makanan']; ?></td>
            <td><?= $data_makanan['no_order']; ?></td>
            <td><a href='edit.php?id=<?= $data_makanan['id_makanan']; ?>'>Edit</a> | <a
                    href='delete.php?id=<?= $data_makanan['id_makanan']; ?>'>Delete</a></td>
        </tr>
        <?php endforeach; ?>
    </table>


</body>

</html>