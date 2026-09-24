<?php
include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Barang</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">

    <h1>Tambah Data Barang</h1>

    <form action="simpan.php" method="POST" class="form-box">

        <label>Kode Barang</label>
        <input type="text" name="kode_barang" required>

        <label>Nama Barang</label>
        <input type="text" name="nama_barang" required>

        <label>Kategori</label>
        <select name="kategori" required>
            <option value="">-- Pilih Kategori --</option>
            <option value="Elektronik">Elektronik</option>
            <option value="Furniture">Furniture</option>
            <option value="ATK">ATK</option>
            <option value="Lainnya">Lainnya</option>
        </select>

        <label>Jumlah</label>
        <input type="number" name="jumlah" min="1" required>

        <label>Kondisi</label>
        <select name="kondisi" required>
            <option value="">-- Pilih Kondisi --</option>
            <option value="Baik">Baik</option>
            <option value="Rusak Ringan">Rusak Ringan</option>
            <option value="Rusak Berat">Rusak Berat</option>
        </select>

        <label>Lokasi</label>
        <input type="text" name="lokasi" required>

        <label>Tanggal Masuk</label>
        <input type="date" name="tanggal_masuk" required>

        <div class="form-button">

            <button type="submit" class="btn tambah">
                Simpan
            </button>

            <a href="index.php" class="btn kembali">
                Kembali
            </a>

        </div>

    </form>

</div>

</body>
</html>