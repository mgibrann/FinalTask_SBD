<?php 
include_once('functions.php');

if(isset($_SESSION["login"])){
    header("Location: index.php");
    exit;
}

if(isset($_POST["register"])){

    if(register($_POST) > 0) {
        echo "<script>
        alert('user berhasil ditambahkan');
        </script>";
}else {
    echo mysqli_error($mysqli);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <style>
    .content {
        min-width: 25%;
        max-width: 40%;
        margin: auto;
        margin-top: 10%;
    }

    .date {
        height: 200;
    }
    </style>
</head>

<body class="text-center">

    <div class="content">
        <form class="cform-signin" method="post">
            <img class="mb-4" src="/docs/4.5/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
            <h1 class="h3 mb-3 font-weight-normal">Sign In</h1>
            <div>
                <label for="username" class="sr-only">Username</label>
                <input type="text" id="username" name="username" class="form-control" placeholder="Username"
                    required="">
            </div>
            <div class="mt-3">
                <label for="password" class="sr-only">Password</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Password"
                    required="">
            </div>
            <a href="login.php" class="mb-3 mt-6">Already Have an Account?</a>
            <button class="btn btn-lg btn-primary btn-block mb-5 mt-3" type="submit" name="register">Sign in</button>
            <div class="mt-5 mb-3">
            </div>
        </form>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
</body>

</html>