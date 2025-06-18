<?php

include '../config/koneksi.php';

$id = $_GET['id'] ?? 0;
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM galeri WHERE id=$id"));
if (!$data) { header("Location: dashboard-galeri.php"); exit; }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $judul = $_POST['judul'];
  $gambar = $data['gambar'];
  if ($_FILES['gambar']['name']) {
    $gambar = uniqid() . '-' . $_FILES['gambar']['name'];
    move_uploaded_file($_FILES['gambar']['tmp_name'], "../Assets/galeri/$gambar");
  }
  mysqli_query($conn, "UPDATE galeri SET judul='$judul', gambar='$gambar' WHERE id=$id");
  header("Location: dashboard-galeri.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Foto Galeri</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container py-5">
  <h2>Edit Foto Galeri</h2>
  <form method="POST" enctype="multipart/form-data">
    <div class="mb-3">
      <label>Judul</label>
      <input type="text" name="judul" class="form-control" value="<?= htmlspecialchars($data['judul']) ?>" required>
    </div>
    <div class="mb-3">
      <label>Gambar (biarkan kosong jika tidak diganti)</label><br>
      <?php if($data['gambar']): ?>
        <img src="../Assets/galeri/<?= $data['gambar'] ?>" width="80" class="mb-2"><br>
      <?php endif; ?>
      <input type="file" name="gambar" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="dashboard-galeri.php" class="btn btn-secondary">Kembali</a>
  </form>
</div>
</body>
</html>
