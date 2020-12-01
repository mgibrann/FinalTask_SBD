<?php 

include_once('functions.php');

$result = mysqli_query($mysqli, "SELECT A.nama_PT, A.alamat, A.telepon, B.jumlah_makanan, B.harga_makanan, B.nama_makanan
FROM distributor A INNER JOIN makanan B ON A.no_order = B.no_order");



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Distributor</title>
</head>

<body>
    <table width='80%' border=1>

        <tr>
            <th>Nama Distributor</th>
            <th>Makanan dikirim</th>
            <th>Jumlah Makanan</th>
            <th>Harga</th>
            <th>Alamat</th>
            <th>Telepon</th>
        </tr>
        <?php foreach($result as $data_makanan):?>
        <tr>
            <td><?= $data_makanan['nama_PT']; ?></td>
            <td><?= $data_makanan['nama_makanan']; ?></td>
            <td><?= $data_makanan['jumlah_makanan']; ?></td>
            <td><?= $data_makanan['harga_makanan']; ?></td>
            <td><?= $data_makanan['alamat']; ?></td>
            <td><?= $data_makanan['telepon']; ?></td>
            <!-- <td><a href='edit.php?id=<?= $data_makanan['id_makanan']; ?>'>Edit</a> | <a
                    href='delete.php?id=<?= $data_makanan['id_makanan']; ?>'>Delete</a></td> -->
        </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>