<?php
include '../config/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama_kategori'];
    mysqli_query($conn, "INSERT INTO kategori_menu(nama_kategori) VALUES('$nama')");
    header('Location: dashboard-kategori.php');
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Kategori</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
    <h2>Tambah Kategori</h2>
    <form method="post">
        <div class="mb-3">
            <label>Nama Kategori</label>
            <input type="text" name="nama_kategori" class="form-control" required>
        </div>
        <button class="btn btn-success">Simpan</button>
        <a href="dashboard-kategori.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</body>
</html>
