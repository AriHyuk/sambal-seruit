<?php
include '../config/koneksi.php';
$prinsip = mysqli_query($conn, "SELECT * FROM prinsip ORDER BY urutan, id");
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Kelola Prinsip Kami</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container py-5">
  <h2 class="mb-4" style="color:#ff0000;">Kelola Prinsip Kami</h2>
  <a href="tambah-prinsip.php" class="btn btn-success mb-3">+ Tambah Prinsip</a>
  <table class="table table-bordered table-hover align-middle">
    <thead>
      <tr>
        <th>No</th>
        <th>Judul</th>
        <th>Deskripsi</th>
        <th>Gambar</th>
        <th>Urutan</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
    <?php $no=1; while($row = mysqli_fetch_assoc($prinsip)): ?>
      <tr>
        <td><?= $no++ ?></td>
        <td><?= htmlspecialchars($row['judul']) ?></td>
        <td><?= $row['deskripsi'] ?></td>
        <td>
          <?php if($row['gambar']): ?>
            <img src="../Assets/prinsip/<?= htmlspecialchars($row['gambar']) ?>" style="width:60px;height:60px;object-fit:cover;">
          <?php endif; ?>
        </td>
        <td><?= (int)$row['urutan'] ?></td>
        <td>
          <a href="edit-prinsip.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
          <a href="hapus-prinsip.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</a>
        </td>
      </tr>
    <?php endwhile; ?>
    </tbody>
  </table>
  <a href="dashboard-admin.php" class="btn btn-secondary mt-3">Kembali ke Dashboard</a>
</div>
</body>
</html>
