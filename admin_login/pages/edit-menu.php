<?php
include '../config/koneksi.php';

$id = $_GET['id'] ?? 0;
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM menu WHERE id=$id"));
if (!$data) { header("Location: dashboard-menu.php"); exit; }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nama = $_POST['nama_menu'];
  $kategori = $_POST['kategori'];
  $gambar = $data['gambar'];
  if ($_FILES['gambar']['name']) {
    $gambar = uniqid() . '-' . $_FILES['gambar']['name'];
    move_uploaded_file($_FILES['gambar']['tmp_name'], "../Assets/menu/$gambar");
  }
  mysqli_query($conn, "UPDATE menu SET nama_menu='$nama', kategori='$kategori', gambar='$gambar' WHERE id=$id");
  header("Location: dashboard-menu.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Menu</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container py-5">
  <h2>Edit Menu</h2>
  <form method="POST" enctype="multipart/form-data">
    <div class="mb-3">
      <label>Nama Menu</label>
      <input type="text" name="nama_menu" class="form-control" value="<?= htmlspecialchars($data['nama_menu']) ?>" required>
    </div>
    <div class="mb-3">
      <label>Kategori</label>
      <select name="kategori" class="form-control" required>
        <?php
        $kategori = ['ayam','ikan','bebek','kuah','sayur','minuman','tambahan'];
        foreach($kategori as $kat):
          $selected = $kat == $data['kategori'] ? 'selected' : '';
          echo "<option value='$kat' $selected>".ucwords($kat)."</option>";
        endforeach;
        ?>
      </select>
    </div>
    <div class="mb-3">
      <label>Gambar (biarkan kosong jika tidak diganti)</label><br>
      <?php if($data['gambar']): ?>
        <img src="../Assets/menu/<?= $data['gambar'] ?>" width="80" class="mb-2"><br>
      <?php endif; ?>
      <input type="file" name="gambar" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="dashboard-menu.php" class="btn btn-secondary">Kembali</a>
  </form>
</div>
</body>
</html>
