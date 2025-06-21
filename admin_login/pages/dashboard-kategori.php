<?php
include '../config/koneksi.php';

// Ambil semua kategori
$kategori_result = mysqli_query($conn, "
    SELECT 
        k.id, 
        k.nama_kategori, 
        COUNT(m.id) AS jumlah_menu 
    FROM kategori_menu k
    LEFT JOIN menu m ON k.nama_kategori = m.kategori
    GROUP BY k.id, k.nama_kategori
");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Kategori</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
    <h1 class="mb-4">Dashboard Kategori Menu</h1>

    <a href="tambah-kategori.php" class="btn btn-primary mb-3">+ Tambah Kategori</a>

    <table class="table table-bordered table-hover bg-white shadow-sm">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Nama Kategori</th>
                <th>Jumlah Menu</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; while ($row = mysqli_fetch_assoc($kategori_result)): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= htmlspecialchars($row['nama_kategori']) ?></td>
                    <td><?= $row['jumlah_menu'] ?></td>
                    <td>
                        <a href="edit-kategori.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="hapus-kategori.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus kategori ini?')">Hapus</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
      <a href="dashboard-admin.php" class="btn btn-secondary mt-3">Kembali ke Dashboard</a>
</div>
</body>
</html>
