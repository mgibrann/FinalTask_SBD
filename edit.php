<?php
session_start();

if( !isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}

// include database connection file
include_once("functions.php");

// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{   
    $id = $_POST['id_makanan'];

    $nama=$_POST['nama_makanan'];
    $jumlah=$_POST['jumlah_makanan'];
    $harga=$_POST['harga_makanan'];
    $order=$_POST['no_order'];

    // update user data
    $result = mysqli_query($mysqli, "UPDATE makanan SET nama_makanan='$nama',jumlah_makanan='$jumlah',harga_makanan='$harga',no_order='$order' WHERE id_makanan=$id");

    // Redirect to homepage to display updated user in list
    header("Location: stockmakanan.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];

// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM makanan WHERE id_makanan=$id");

while($user_data = mysqli_fetch_array($result))
{
    $nama = $user_data['nama_makanan'];
        $jumlah = $user_data['jumlah_makanan'];
        $harga = $user_data['harga_makanan'];
        $order = $user_data['no_order'];
}
?>
<html>

<head>
    <title>Edit Makanan</title>
</head>

<body>
    <a href="index.php">Home</a>
    <br /><br />

    <h2>Silahkan kurangi makanan yang diambil</h2>

    <form name="update_user" method="post" action="edit.php">
        <table border="0">
            <tr>
                <td>Nama makanan</td>
                <td><input type="text" name="nama_makanan" value=<?php echo $nama;?>></td>
            </tr>
            <tr>
                <td>Jumlah</td>
                <td><input type="text" name="jumlah_makanan" value=<?php echo $jumlah;?>></td>
            </tr>
            <tr>
                <td>Harga</td>
                <td><input type="text" name="harga_makanan" value=<?php echo $harga;?>></td>
            </tr>
            <tr>
                <td>No Order</td>
                <td><input type="text" name="no_order" value=<?php echo $order;?>></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id_makanan" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>

</html>