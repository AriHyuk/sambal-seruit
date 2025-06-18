<?php
session_start();
include '../config/koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    $_SESSION['admin'] = $username;
    header("Location: dashboard.php");
} else {
    echo "<script>alert('Login gagal'); window.location.href='admin-login.html';</script>";
}
?>
