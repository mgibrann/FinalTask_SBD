<?php
session_start();

if( !isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}
// include database connection file
include_once("functions.php");

// Get id from URL to delete that user
$id = $_GET['id'];

// Delete user row from table based on given id
$result = mysqli_query($mysqli, "DELETE FROM makanan WHERE id_makanan=$id");

// After delete redirect to Home, so that latest user list will be displayed.
header("Location:index.php");
?>