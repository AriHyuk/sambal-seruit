<?php
session_start();
include '../config/koneksi.php';

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

// Hash password jika di database disimpan dalam hash
// $password = md5($password); 
// Jika sudah pakai password_hash, pakai password_verify nanti

// Cek login
$sql = "SELECT * FROM admin WHERE username = '$username' AND password = MD5('$password')";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  $data = mysqli_fetch_assoc($result);
  $_SESSION['admin_id'] = $data['id'];
  $_SESSION['admin_username'] = $data['username'];
  $_SESSION['admin_nama'] = $data['nama_lengkap'];
  // Redirect ke halaman admin/dashboard
  header('Location: ../pages/dashboard-admin.php');
  exit;
} else {
  // Balikin ke login kalau gagal
  header('Location: ../pages/login.php?msg=LoginGagal');
  exit;
}
?>
