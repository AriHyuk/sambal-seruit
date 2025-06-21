<?php
include '../config/koneksi.php';
$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM kategori_menu WHERE id=$id");
header('Location: dashboard-kategori.php');
?>
