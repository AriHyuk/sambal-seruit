<?php
include '../config/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nama = $_POST['nama_menu'];
  $kategori = $_POST['kategori'];
  $gambar = '';
  if ($_FILES['gambar']['name']) {
    $gambar = uniqid() . '-' . $_FILES['gambar']['name'];
    move_uploaded_file($_FILES['gambar']['tmp_name'], "../Assets/menu/$gambar");
  }
  mysqli_query($conn, "INSERT INTO menu (nama_menu, kategori, gambar) VALUES ('$nama', '$kategori', '$gambar')");
  header("Location: dashboard-menu.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah Menu</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container py-5">
  <h2>Tambah Menu</h2>
  <form method="POST" enctype="multipart/form-data">
    <div class="mb-3">
      <label>Nama Menu</label>
      <input type="text" name="nama_menu" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Kategori</label>
      <select name="kategori" class="form-control" required>
        <option value="ayam">Ayam</option>
        <option value="ikan">Ikan</option>
        <option value="bebek">Bebek</option>
        <option value="kuah">Kuah</option>
        <option value="sayur">Sayur</option>
        <option value="minuman">Minuman</option>
        <option value="tambahan">Menu Tambahan</option>
        <!-- tambah sesuai kategori lain -->
      </select>
    </div>
    <div class="mb-3">
      <label>Gambar</label>
      <input type="file" name="gambar" class="form-control">
    </div>
    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="dashboard-menu.php" class="btn btn-secondary">Kembali</a>
  </form>
</div>
</body>
</html>
