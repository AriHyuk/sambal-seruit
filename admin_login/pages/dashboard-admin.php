<?php

?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Dashboard Admin</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <style>
    body { font-family: 'Poppins', sans-serif; background: #fafafa; }
    .dashboard-nav .card {
      transition: transform .15s;
      border-radius: 16px;
      box-shadow: 0 4px 16px rgba(0,0,0,0.08);
      cursor: pointer;
      text-align: center;
      border: none;
    }
    .dashboard-nav .card:hover {
      transform: translateY(-5px) scale(1.02);
      box-shadow: 0 8px 24px rgba(0,0,0,0.13);
      background: #ffecec;
    }
    .dashboard-nav .card .icon {
      font-size: 44px;
      color: #ff0000;
      margin-bottom: 12px;
    }
    .dashboard-nav .card .fw-bold {
      color: #ff0000;
    }
    .btn-logout {
      background: #ff0000;
      color: #fff;
      border: none;
      border-radius: 7px;
      font-weight: 600;
      padding: 12px 36px;
      margin-top: 32px;
      font-size: 18px;
    }
    .btn-logout:hover {
      background: #e60000;
      color: #fff;
    }
    @media (max-width: 767px) {
      .dashboard-nav .card { margin-bottom: 24px; }
    }
  </style>
</head>
<body>
  <div class="container py-5">
    <h2 class="mb-5 fw-bold text-center" style="color:#ff0000;">Dashboard Admin</h2>
    <div class="row dashboard-nav justify-content-center g-4">
      <div class="col-12 col-sm-6 col-md-4 mb-3">
        <a href="dashboard-menu.php" class="text-decoration-none">
          <div class="card p-4 h-100">
            <div class="icon"><i class="bi bi-card-list"></i></div>
            <div class="fw-bold fs-5 mb-1">Kelola Menu</div>
            <div class="text-secondary">Tambah, edit, dan hapus daftar menu makanan/minuman</div>
          </div>
        </a>
      </div>
      <div class="col-12 col-sm-6 col-md-4 mb-3">
        <a href="dashboard-galeri.php" class="text-decoration-none">
          <div class="card p-4 h-100">
            <div class="icon"><i class="bi bi-images"></i></div>
            <div class="fw-bold fs-5 mb-1">Kelola Galeri</div>
            <div class="text-secondary">Kelola dan atur gambar-gambar galeri di website</div>
          </div>
        </a>
      </div>
      <!-- Tambahkan card lain jika perlu -->
    </div>
    <div class="d-flex justify-content-center">
      <form method="post" action="../proses/logout.php">
        <button type="submit" class="btn btn-logout mt-4"><i class="bi bi-box-arrow-right"></i> Logout</button>
      </form>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
