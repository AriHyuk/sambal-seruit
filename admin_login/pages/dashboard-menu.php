<?php

include '../config/koneksi.php';

// Ambil semua data menu
$menus = mysqli_query($conn, "
    SELECT m.*, k.nama_kategori 
    FROM menu m
    JOIN kategori_menu k ON m.kategori = k.id
    ORDER BY m.kategori, m.urutan, m.id
");

?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Kelola Menu</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { font-family: 'Poppins', sans-serif; background: #f8f8f8; }
    .menu-img { width: 80px; height: 60px; object-fit: cover; border-radius: 6px; }
  </style>
</head>
<body>
<div class="container py-5">
  <h2 class="mb-4" style="color:#ff0000;">Kelola Menu</h2>
  <a href="tambah-menu.php" class="btn btn-success mb-3">Tambah Menu</a>
  <table class="table table-bordered table-hover align-middle">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama Menu</th>
        <th>Kategori</th>
        <th>Gambar</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
    <?php $no=1; while($row = mysqli_fetch_assoc($menus)): ?>
      <tr>
        <td><?= $no++ ?></td>
        <td><?= htmlspecialchars($row['nama_menu']) ?></td>
        <td><?= htmlspecialchars(ucwords($row['nama_kategori'])) ?></td>
        <td>
          <?php if($row['gambar']): ?>
            <img src="../Assets/menu/<?= $row['gambar'] ?>" class="menu-img">
          <?php endif; ?>
        </td>
        <td>
          <a href="edit-menu.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
          <a href="hapus-menu.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</a>
        </td>
      </tr>
    <?php endwhile; ?>
    </tbody>
  </table>
  <a href="dashboard-admin.php" class="btn btn-secondary mt-3">Kembali ke Dashboard</a>
</div>

