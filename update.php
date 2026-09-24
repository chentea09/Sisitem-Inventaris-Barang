<?php

include "koneksi.php";

$id_barang = $_POST['id_barang'];
$kode_barang = $_POST['kode_barang'];
$nama_barang = $_POST['nama_barang'];
$kategori = $_POST['kategori'];
$jumlah = $_POST['jumlah'];
$kondisi = $_POST['kondisi'];
$lokasi = $_POST['lokasi'];
$tanggal_masuk = $_POST['tanggal_masuk'];

$query = "UPDATE inventaris SET
            kode_barang = '$kode_barang',
            nama_barang = '$nama_barang',
            kategori = '$kategori',
            jumlah = '$jumlah',
            kondisi = '$kondisi',
            lokasi = '$lokasi',
            tanggal_masuk = '$tanggal_masuk'
          WHERE id_barang = '$id_barang'";

$result = mysqli_query($koneksi, $query);

if ($result) {

    header("Location: index.php");
    exit;

} else {

    echo "Data gagal diperbarui: " . mysqli_error($koneksi);

}

?>