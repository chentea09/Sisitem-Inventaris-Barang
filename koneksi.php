<?php

$host = "localhost";
$user = "root";
$password = "Root12345!";
$database = "db_inventaris";

$koneksi = mysqli_connect($host, $user, $password, $database);

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

?>