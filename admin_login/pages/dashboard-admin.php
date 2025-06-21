<?php
session_start();
include '../config/koneksi.php';

// Hitung total menu
$resultMenu = mysqli_query($conn, "SELECT COUNT(*) as total FROM menu");
$dataMenu = mysqli_fetch_assoc($resultMenu);
$totalMenu = $dataMenu['total'] ?? 0;

// Hitung total galeri
$resultGaleri = mysqli_query($conn, "SELECT COUNT(*) as total FROM galeri");
$dataGaleri = mysqli_fetch_assoc($resultGaleri);
$totalGaleri = $dataGaleri['total'] ?? 0;

$resultKategori = mysqli_query($conn, "SELECT COUNT(*) as total FROM kategori_menu");
$dataKategori = mysqli_fetch_assoc($resultKategori);
$totalKategori = $dataKategori['total'] ?? 0;

?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Dashboard Admin</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <style>
    :root {
      --primary-color: #dc3545;
      --primary-light: #ffecec;
      --sidebar-width: 280px;
      --topbar-height: 70px;
    }
    
    body {
      font-family: 'Poppins', sans-serif;
      background: #f8f9fa;
      overflow-x: hidden;
    }
    
    /* Sidebar Styles */
    .sidebar {
      width: var(--sidebar-width);
      height: 100vh;
      position: fixed;
      left: 0;
      top: 0;
      background: white;
      box-shadow: 0 0 30px rgba(0,0,0,0.05);
      transition: all 0.3s;
      z-index: 1000;
    }
    
    .sidebar-brand {
      height: var(--topbar-height);
      display: flex;
      align-items: center;
      padding: 0 1.5rem;
      border-bottom: 1px solid rgba(0,0,0,0.05);
    }
    
    .sidebar-brand h4 {
      font-weight: 600;
      color: var(--primary-color);
      margin-bottom: 0;
    }
    
    .sidebar-menu {
      padding: 1.5rem 0;
    }
    
    .sidebar-menu .menu-item {
      display: block;
      padding: 0.8rem 1.5rem;
      color: #555;
      text-decoration: none;
      transition: all 0.2s;
      margin: 0.2rem 0;
      border-left: 3px solid transparent;
    }
    
    .sidebar-menu .menu-item:hover,
    .sidebar-menu .menu-item.active {
      background: var(--primary-light);
      color: var(--primary-color);
      border-left: 3px solid var(--primary-color);
    }
    
    .sidebar-menu .menu-item i {
      margin-right: 10px;
      font-size: 1.1rem;
      width: 20px;
      text-align: center;
    }
    
    /* Main Content Styles */
    .main-content {
      margin-left: var(--sidebar-width);
      min-height: 100vh;
      transition: all 0.3s;
    }
    
    .topbar {
      height: var(--topbar-height);
      background: white;
      box-shadow: 0 0 30px rgba(0,0,0,0.05);
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0 2rem;
    }
    
    .content-wrapper {
      padding: 2rem;
    }
    
    .welcome-card {
      background: white;
      border-radius: 12px;
      padding: 2rem;
      box-shadow: 0 5px 20px rgba(0,0,0,0.03);
      margin-bottom: 2rem;
    }
    
    .stats-card {
      background: white;
      border-radius: 12px;
      padding: 1.5rem;
      box-shadow: 0 5px 20px rgba(0,0,0,0.03);
      transition: all 0.3s;
      height: 100%;
      border-left: 4px solid var(--primary-color);
    }
    
    .stats-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 30px rgba(0,0,0,0.08);
    }
    
    .stats-card .icon {
      font-size: 2.5rem;
      color: var(--primary-color);
      margin-bottom: 1rem;
    }
    
    .stats-card .count {
      font-size: 1.8rem;
      font-weight: 600;
      color: #333;
    }
    
    .stats-card .label {
      color: #777;
      font-size: 0.9rem;
    }
    
    /* Responsive Styles */
    @media (max-width: 992px) {
      .sidebar {
        transform: translateX(-100%);
      }
      
      .sidebar.active {
        transform: translateX(0);
      }
      
      .main-content {
        margin-left: 0;
      }
      
      .toggle-sidebar {
        display: block !important;
      }
    }
    
    .toggle-sidebar {
      display: none;
      background: none;
      border: none;
      font-size: 1.5rem;
      color: #555;
    }
    
    .user-dropdown img {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      object-fit: cover;
    }
  </style>
</head>
<body>
  <!-- Sidebar -->
  <div class="sidebar">
    <div class="sidebar-brand">
      <h4><i class="bi bi-shop"></i> Admin Panel</h4>
    </div>
    
    <div class="sidebar-menu">
      <a href="index.php" class="menu-item active">
        <i class="bi bi-speedometer2"></i> Dashboard
      </a>
      <a href="dashboard-menu.php" class="menu-item">
        <i class="bi bi-card-list"></i> Kelola Menu
      </a>
      <a href="dashboard-galeri.php" class="menu-item">
        <i class="bi bi-images"></i> Kelola Galeri
      </a>
        <a href="dashboard-kategori.php" class="menu-item">
        <i class="bi bi-images"></i> Kelola Kategori
      </a>
      <a href="../proses/logout.php" class="menu-item">
        <i class="bi bi-box-arrow-right"></i> Logout
      </a>
    </div>
  </div>
  
  <!-- Main Content -->
  <div class="main-content">
    <!-- Topbar -->
    <div class="topbar">
      <button class="toggle-sidebar">
        <i class="bi bi-list"></i>
      </button>
      
      <div class="dropdown user-dropdown">
        <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle" data-bs-toggle="dropdown">
          <img src="https://ui-avatars.com/api/?name=Admin&background=dc3545&color=fff" alt="Admin">
          <span class="ms-2 d-none d-sm-inline">Admin</span>
        </a>
        <ul class="dropdown-menu dropdown-menu-end">
          <li><a class="dropdown-item" href="#"><i class="bi bi-person me-2"></i> Profile</a></li>
          <li><a class="dropdown-item" href="#"><i class="bi bi-gear me-2"></i> Settings</a></li>
          <li><hr class="dropdown-divider"></li>
          <li><a class="dropdown-item" href="../proses/logout.php"><i class="bi bi-box-arrow-right me-2"></i> Logout</a></li>
        </ul>
      </div>
    </div>
    
    <!-- Content -->
    <div class="content-wrapper">
      <div class="welcome-card">
        <h3 class="mb-3">Selamat Datang, Admin!</h3>
        <p class="text-muted">Kelola konten website Anda dengan mudah melalui panel ini.</p>
      </div>
      
      <div class="row g-4">
        <div class="col-md-6 col-lg-3">
          <div class="stats-card">
            <div class="icon">
              <i class="bi bi-card-list"></i>
            </div>
           <div class="count"><?= $totalMenu ?></div>
            <div class="label">Total Menu</div>
          </div>
        </div>
        
        <div class="col-md-6 col-lg-3">
          <div class="stats-card">
            <div class="icon">
              <i class="bi bi-images"></i>
            </div>
            <div class="count"><?= $totalGaleri ?></div>
            <div class="label">Foto Galeri</div>
          </div>
        </div>

                <div class="col-md-6 col-lg-3">
          <div class="stats-card">
            <div class="icon">
              <i class="bi bi-images"></i>
            </div>
            <div class="count"><?= $totalKategori ?></div>
            <div class="label">Kategori</div>
          </div>
        </div>
        
      
      </div>
      
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Toggle sidebar on mobile
    document.querySelector('.toggle-sidebar').addEventListener('click', function() {
      document.querySelector('.sidebar').classList.toggle('active');
    });
    
    // Close sidebar when clicking outside on mobile
    document.addEventListener('click', function(event) {
      const sidebar = document.querySelector('.sidebar');
      const toggleBtn = document.querySelector('.toggle-sidebar');
      
      if (window.innerWidth <= 992 && 
          !sidebar.contains(event.target) && 
          event.target !== toggleBtn && 
          !toggleBtn.contains(event.target)) {
        sidebar.classList.remove('active');
      }
    });
  </script>
</body>
</html>