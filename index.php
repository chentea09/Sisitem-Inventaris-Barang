<?php

include "koneksi.php";

$keyword = $_GET['keyword'] ?? '';

$query = "SELECT * FROM inventaris
          WHERE kode_barang LIKE '%$keyword%'
          OR nama_barang LIKE '%$keyword%'
          OR kategori LIKE '%$keyword%'
          OR lokasi LIKE '%$keyword%'
          ORDER BY id_barang DESC";

$result = mysqli_query($koneksi, $query);

// Total seluruh barang
$query_total = "SELECT SUM(jumlah) AS total_barang FROM inventaris";
$result_total = mysqli_query($koneksi, $query_total);
$data_total = mysqli_fetch_assoc($result_total);

$total_barang = $data_total['total_barang'] ?? 0;

// Menghitung jumlah jenis barang
$query_jenis = "SELECT COUNT(*) AS total_jenis FROM inventaris";
$result_jenis = mysqli_query($koneksi, $query_jenis);
$data_jenis = mysqli_fetch_assoc($result_jenis);
$total_jenis = $data_jenis['total_jenis'] ?? 0;

// Menghitung jumlah barang kondisi baik
$query_baik = "SELECT SUM(jumlah) AS total_baik 
               FROM inventaris 
               WHERE kondisi = 'Baik'";
$result_baik = mysqli_query($koneksi, $query_baik);
$data_baik = mysqli_fetch_assoc($result_baik);
$total_baik = $data_baik['total_baik'] ?? 0;

// Menghitung jumlah barang rusak
$query_rusak = "SELECT SUM(jumlah) AS total_rusak 
                FROM inventaris 
                WHERE kondisi != 'Baik'";
$result_rusak = mysqli_query($koneksi, $query_rusak);
$data_rusak = mysqli_fetch_assoc($result_rusak);
$total_rusak = $data_rusak['total_rusak'] ?? 0;

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventaris Barang</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container">

        <h1>Sistem Inventaris Barang</h1>

        <p class="subtitle">
            Data Inventaris Barang
        </p>

       <div class="stats">

            <div class="stat-box">
                <span>Total Jenis</span>
                <strong><?= $total_jenis; ?></strong>
                <small>Jenis barang</small>
            </div>

            <div class="stat-box">
                <span>Total Barang</span>
                <strong><?= $total_barang; ?></strong>
                <small>Seluruh jumlah barang</small>
            </div>

            <div class="stat-box">
                <span>Kondisi Baik</span>
                <strong><?= $total_baik; ?></strong>
                <small>Barang dalam kondisi baik</small>
            </div>

            <div class="stat-box">
                <span>Kondisi Rusak</span>
                <strong><?= $total_rusak; ?></strong>
                <small>Rusak ringan / berat</small>
            </div>

        </div>

        <div class="toolbar">
            <a href="tambah.php" class="btn tambah">
                + Tambah Barang
            </a>
        </div>

        <form method="GET" action="index.php" class="search-box">

            <input
                type="text"
                name="keyword"
                placeholder="Cari kode, nama, kategori, atau lokasi..."
                value="<?= htmlspecialchars($keyword); ?>"
            >

            <button type="submit" class="btn cari">
                🔎 Cari
            </button>

            <a href="index.php" class="btn reset">
                Reset
            </a>

        </form>

        <table>

            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Jumlah</th>
                    <th>Kondisi</th>
                    <th>Lokasi</th>
                    <th>Tanggal Masuk</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>

                <?php
                $no = 1;

                while ($data = mysqli_fetch_assoc($result)) {
                ?>

                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $data['kode_barang']; ?></td>
                    <td><?= $data['nama_barang']; ?></td>
                    <td><?= $data['kategori']; ?></td>
                    <td><?= $data['jumlah']; ?></td>
                    <td><?= $data['kondisi']; ?></td>
                    <td><?= $data['lokasi']; ?></td>
                    <td><?= $data['tanggal_masuk']; ?></td>

                    <td>
                        <a href="edit.php?id=<?= $data['id_barang']; ?>" class="btn edit">
                            Edit
                        </a>

                        <a href="hapus.php?id=<?= $data['id_barang']; ?>"
                           class="btn hapus"
                           onclick="return confirm('Apakah kamu yakin ingin menghapus data ini?');">
                            Hapus
                        </a>
                    </td>
                </tr>

                <?php
                }
                ?>

            </tbody>

        </table>

    </div>

</body>
</html>