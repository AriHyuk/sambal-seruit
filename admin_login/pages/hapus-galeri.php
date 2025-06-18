<?php

include '../config/koneksi.php';

$id = $_GET['id'] ?? 0;
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM galeri WHERE id=$id"));
if ($data) {
  if ($data['gambar'] && file_exists("../Assets/galeri/".$data['gambar'])) {
    unlink("../Assets/galeri/".$data['gambar']); // hapus file gambar
  }
  mysqli_query($conn, "DELETE FROM galeri WHERE id=$id");
}
header("Location: dashboard-galeri.php");
exit;
?>
