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

// include database connection file
include_once("functions.php");

// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{   
    $id = $_POST['id_staff'];
    $nama=$_POST['nama_staff'];
    $order=$_POST['no_order'];

    // update user data
    $result = mysqli_query($mysqli, "UPDATE staff_gudang SET id_staff='$id',nama_staff='$nama',no_order='$order' WHERE id_staff=$id");

    // Redirect to homepage to display updated user in list
    header("Location: staffgudang.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];

// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM staff_gudang WHERE id_staff=$id");

while($user_data = mysqli_fetch_array($result))
{
    $id = $user_data['id_staff'];
        $nama = $user_data['nama_staff'];
        $order = $user_data['no_order'];
}
?>
<html>

<head>
    <title>Edit Staff</title>
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
        <div class="col-5 mx-auto my-auto">
            <h2 class="text-primary text-center">Edit Staff</h2>
            <form name="update_user" class="form-inline" method="post" action="editstaff.php">
                <table class="table table-dark">
                    <tr>
                        <td>Id Staff</td>
                        <td><input type="text" class="form-control" name="id_staff" value=<?php echo $id;?>></td>
                    </tr>
                    <tr>
                        <td>Nama</td>
                        <td><input type="text" class="form-control" name="nama_staff" value=<?php echo $nama;?>>
                        </td>
                    </tr>
                    <tr>
                        <td>No Order</td>
                        <td><input type="text" class="form-control" name="no_order" value=<?php echo $order;?>></td>
                    </tr>
                    <tr>
                        <td><input type="hidden" name="id_makanan" value=<?php echo $_GET['id'];?>></td>
                        <td><input type="submit" class="btn btn-primary" name="update" value="Update"><button
                                class="btn btn-warning ml-2 "><a class="text-light"
                                    href="staffgudang.php">Kembali</a></button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
</body>

</html>