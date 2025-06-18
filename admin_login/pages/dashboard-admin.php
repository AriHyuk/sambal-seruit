<?php
session_start();
if (!isset($_SESSION['admin'])) {
  header("Location: admin-login.php");
  exit;
}
?>
<h2>Dashboard Admin</h2>
<p>Selamat datang, <?= $_SESSION['admin']; ?>!</p>
<a href="../proses/logout.php">Logout</a>