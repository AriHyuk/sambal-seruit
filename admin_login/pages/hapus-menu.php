<?php

include '../config/koneksi.php';

$id = $_GET['id'] ?? 0;
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM menu WHERE id=$id"));
if ($data) {
  if ($data['gambar'] && file_exists("../Assets/menu/".$data['gambar'])) {
    unlink("../Assets/menu/".$data['gambar']); // hapus file gambar
  }
  mysqli_query($conn, "DELETE FROM menu WHERE id=$id");
}
header("Location: dashboard-menu.php");
exit;
?>
