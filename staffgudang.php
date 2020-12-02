<?php 
include_once('functions.php');

$result = mysqli_query($mysqli, "SELECT * FROM staff_gudang ORDER BY id_staff ASC");

if(isset($_POST["cari"])){
    $result = caristaff($_POST["keyword"]);
}
if(isset($_POST["keluar"])){
    session_unset();
    session_destroy();

    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body>
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

    <div class="container-fluid bg-light">
        <div class="row" style="height: 660px;">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-primary sidebar collapse">
                <div class="sidebar-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link text-light" href="dashboard.php">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-home">
                                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                    <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                </svg>
                                Dashboard <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="stockmakanan.php">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-shopping-cart">
                                    <circle cx="9" cy="21" r="1"></circle>
                                    <circle cx="20" cy="21" r="1"></circle>
                                    <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                                </svg>
                                Stock Makanan
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="staffgudang.php">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-file">
                                    <path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path>
                                    <polyline points="13 2 13 9 20 9"></polyline>
                                </svg>
                                Staff Gudang
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="distributor.php">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-layers">
                                    <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                                    <polyline points="2 17 12 22 22 17"></polyline>
                                    <polyline points="2 12 12 17 22 12"></polyline>
                                </svg>
                                Distributor
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="dapur.php">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-bar-chart-2">
                                    <line x1="18" y1="20" x2="18" y2="10"></line>
                                    <line x1="12" y1="20" x2="12" y2="4"></line>
                                    <line x1="6" y1="20" x2="6" y2="14"></line>
                                </svg>
                                Dapur
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="column mx-auto" style="margin-top: 150px;">
                <form action="" class="form-inline my-3" method="post">
                    <input type="text" class="form-control" name="keyword" placeholder="Masukan Keyword pencarian..."
                        size="40" autocomplete="off">
                    <button type="submit" class="btn btn-primary ml-4" name="cari">Cari</button>
                </form>
                </form>
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="">Id Staff</th>
                            <th scope="col">Nama Staff</th>
                            <th scope="col">No Order</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach($result as $data_staff):?>
                        <tr>
                            <td><?= $data_staff['id_staff']; ?></td>
                            <td><?= $data_staff['nama_staff']; ?></td>
                            <td><?= $data_staff['no_order']; ?></td>
                            <td> <button class="btn btn-warning">
                                    <a style="text-decoration: none; color:white;"
                                        href='editstaff.php?id=<?= $data_staff['id_staff']; ?>'>Edit</a>
                                </button>
                                <button class="btn btn-danger"><a style="color: white; text-decoration: none;"
                                        href='deletestaff.php?id=<?= $data_staff['id_staff']; ?>'>Delete</a>
                                </button>
                                <button class="btn btn-success">
                                    <a href="addstaff.php" style="text-decoration: none;" class="text-light">+</a>
                                </button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
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