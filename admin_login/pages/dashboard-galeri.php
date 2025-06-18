<?php

include '../config/koneksi.php';

$galeris = mysqli_query($conn, "SELECT * FROM galeri ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Kelola Galeri</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { font-family: 'Poppins', sans-serif; background: #f8f8f8; }
    .galeri-img { width: 90px; height: 60px; object-fit: cover; border-radius: 6px; }
  </style>
</head>
<body>
<div class="container py-5">
  <h2 class="mb-4" style="color:#ff0000;">Kelola Galeri</h2>
  <a href="tambah-galeri.php" class="btn btn-success mb-3">Tambah Foto Galeri</a>
  <table class="table table-bordered table-hover align-middle">
    <thead>
      <tr>
        <th>No</th>
        <th>Judul</th>
        <th>Gambar</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
    <?php $no=1; while($row = mysqli_fetch_assoc($galeris)): ?>
      <tr>
        <td><?= $no++ ?></td>
        <td><?= htmlspecialchars($row['judul']) ?></td>
        <td>
          <?php if($row['gambar']): ?>
            <img src="../Assets/galeri/<?= $row['gambar'] ?>" class="galeri-img">
          <?php endif; ?>
        </td>
        <td>
          <a href="edit-galeri.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
          <a href="hapus-galeri.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</a>
        </td>
      </tr>
    <?php endwhile; ?>
    </tbody>
  </table>
  <a href="dashboard-admin.php" class="btn btn-secondary mt-3">Kembali ke Dashboard</a>
</div>
</body>
</html>
