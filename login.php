<?php 
session_start();

if(isset($_SESSION["login"])){
    header("Location: index.php");
    exit;
}

require 'functions.php';

if( isset($_POST["login"])){

    $username = $_POST["username"];
    $password = $_POST['password'];
    
    $result = mysqli_query($mysqli,"SELECT * FROM users WHERE username = '$username'");
   
    if( mysqli_num_rows($result) === 1){
        $row = mysqli_fetch_assoc($result);
       
        if( password_verify($password, $row["password"]) ) {
            // set session
            $_SESSION["login"] = true;
            
            header("Location: dashboard.php");
            exit;
        }
    }
    $error = true;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
        <?php if(isset($error)) :?>
        <p style="color: red;">username / password salah</p>
        <?php endif;  ?>
        <form class="cform-signin" method="post">
            <div class="mb-5 text-primary">

                <h2>PT MUNDUR JAYA</h2>
            </div>
            <h1 class="h4 mb-3 font-weight-normal">Log In</h1>
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
            <div class="checkbox mb-1 mt-3">
                <label>
                    <input type="checkbox" value="remember-me"> Remember me
                </label>
            </div>
            <a href="register.php" class="mb-3">Don't have account?</a>
            <button class="btn btn-lg btn-primary btn-block mb-5 mt-2" name="login" type="submit">Log In</button>
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