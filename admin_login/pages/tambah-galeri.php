<?php

include '../config/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $judul = $_POST['judul'];
  $gambar = '';
  if ($_FILES['gambar']['name']) {
    $gambar = uniqid() . '-' . $_FILES['gambar']['name'];
    move_uploaded_file($_FILES['gambar']['tmp_name'], "../Assets/galeri/$gambar");
  }
  mysqli_query($conn, "INSERT INTO galeri (judul, gambar) VALUES ('$judul', '$gambar')");
  header("Location: dashboard-galeri.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah Galeri</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container py-5">
  <h2>Tambah Foto Galeri</h2>
  <form method="POST" enctype="multipart/form-data">
    <div class="mb-3">
      <label>Judul</label>
      <input type="text" name="judul" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Gambar</label>
      <input type="file" name="gambar" class="form-control">
    </div>
    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="dashboard-galeri.php" class="btn btn-secondary">Kembali</a>
  </form>
</div>
</body>
</html>
