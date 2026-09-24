<?php

include "koneksi.php";

$kode_barang = $_POST['kode_barang'];
$nama_barang = $_POST['nama_barang'];
$kategori = $_POST['kategori'];
$jumlah = $_POST['jumlah'];
$kondisi = $_POST['kondisi'];
$lokasi = $_POST['lokasi'];
$tanggal_masuk = $_POST['tanggal_masuk'];

$query = "INSERT INTO inventaris
          (kode_barang, nama_barang, kategori, jumlah, kondisi, lokasi, tanggal_masuk)
          VALUES
          ('$kode_barang', '$nama_barang', '$kategori', '$jumlah', '$kondisi', '$lokasi', '$tanggal_masuk')";

$result = mysqli_query($koneksi, $query);

if ($result) {
    header("Location: index.php");
    exit;
} else {
    echo "Data gagal disimpan: " . mysqli_error($koneksi);
}

?>