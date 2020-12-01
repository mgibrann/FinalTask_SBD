<?php

$databaseHost = 'localhost';
$databaseName = 'finaltask-sbd';
$databaseUsername = 'root';
$databasePassword = '';

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 

function query($query){
    global $mysqli;
    $result = mysqli_query($mysqli, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

function cari($keyword){
    $query = "SELECT * FROM makanan 
                WHERE
            id_makanan LIKE '%$keyword%' OR
            nama_makanan LIKE '%$keyword%' OR
            jumlah_makanan LIKE '%$keyword%' OR
            harga_makanan LIKE '%$keyword%' OR
            no_order LIKE '%$keyword%'
            ";
    return query($query);
}

function register($data){
    global $mysqli;

    $username = strtolower($data["username"]);
    $password = $data["password"];

    // cek username sudah ada blm
    $result = mysqli_query($mysqli, "SELECT username FROM users WHERE username = '$username'");

    if( mysqli_fetch_assoc($result) ) {
        echo "<script>
        alert('username sudah terdaftar');
        </script>";
        return false;
    }

    if($username == $password){
        echo "<script>
        alert('password dan username tidak boleh sama!');
        </script>";
        return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($mysqli, "INSERT INTO users VALUES ('','$username'
    , '$password')");

    return (mysqli_affected_rows($mysqli));
}
?>