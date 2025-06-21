<?php
include '../config/koneksi.php';
$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM kategori_menu WHERE id=$id"));

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama_kategori'];
    mysqli_query($conn, "UPDATE kategori_menu SET nama_kategori='$nama' WHERE id=$id");
    header('Location: dashboard-kategori.php');
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Kategori</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
    <h2>Edit Kategori</h2>
    <form method="post">
        <div class="mb-3">
            <label>Nama Kategori</label>
            <input type="text" name="nama_kategori" class="form-control" value="<?= htmlspecialchars($data['nama_kategori']) ?>" required>
        </div>
        <button class="btn btn-primary">Update</button>
        <a href="dashboard-kategori.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</body>
</html>
