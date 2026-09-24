<?php

include "koneksi.php";

$id = $_GET['id'];

$query = "SELECT * FROM inventaris WHERE id_barang = '$id'";
$result = mysqli_query($koneksi, $query);

$data = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Barang</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">

    <h1>Edit Data Barang</h1>

    <form action="update.php" method="POST" class="form-box">

        <input
            type="hidden"
            name="id_barang"
            value="<?= $data['id_barang']; ?>"
        >

        <label>Kode Barang</label>

        <input
            type="text"
            name="kode_barang"
            value="<?= $data['kode_barang']; ?>"
            required
        >


        <label>Nama Barang</label>

        <input
            type="text"
            name="nama_barang"
            value="<?= $data['nama_barang']; ?>"
            required
        >


        <label>Kategori</label>

        <select name="kategori" required>

            <option value="Elektronik"
                <?= ($data['kategori'] == 'Elektronik') ? 'selected' : ''; ?>>
                Elektronik
            </option>

            <option value="Furniture"
                <?= ($data['kategori'] == 'Furniture') ? 'selected' : ''; ?>>
                Furniture
            </option>

            <option value="ATK"
                <?= ($data['kategori'] == 'ATK') ? 'selected' : ''; ?>>
                ATK
            </option>

            <option value="Lainnya"
                <?= ($data['kategori'] == 'Lainnya') ? 'selected' : ''; ?>>
                Lainnya
            </option>

        </select>


        <label>Jumlah</label>

        <input
            type="number"
            name="jumlah"
            value="<?= $data['jumlah']; ?>"
            min="1"
            required
        >


        <label>Kondisi</label>

        <select name="kondisi" required>

            <option value="Baik"
                <?= ($data['kondisi'] == 'Baik') ? 'selected' : ''; ?>>
                Baik
            </option>

            <option value="Rusak Ringan"
                <?= ($data['kondisi'] == 'Rusak Ringan') ? 'selected' : ''; ?>>
                Rusak Ringan
            </option>

            <option value="Rusak Berat"
                <?= ($data['kondisi'] == 'Rusak Berat') ? 'selected' : ''; ?>>
                Rusak Berat
            </option>

        </select>


        <label>Lokasi</label>

        <input
            type="text"
            name="lokasi"
            value="<?= $data['lokasi']; ?>"
            required
        >


        <label>Tanggal Masuk</label>

        <input
            type="date"
            name="tanggal_masuk"
            value="<?= $data['tanggal_masuk']; ?>"
            required
        >


        <div class="form-button">

            <button type="submit" class="btn tambah">
                Update Data
            </button>

            <a href="index.php" class="btn kembali">
                Batal
            </a>

        </div>

    </form>

</div>

</body>
</html>