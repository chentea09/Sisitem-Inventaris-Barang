<?php

include "koneksi.php";

$id = $_GET['id'];

$query = "DELETE FROM inventaris WHERE id_barang = '$id'";

$result = mysqli_query($koneksi, $query);

if ($result) {

    header("Location: index.php");
    exit;

} else {

    echo "Data gagal dihapus: " . mysqli_error($koneksi);

}

?>