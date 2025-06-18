<?php
include '../admin_login/config/koneksi.php'; // Sesuaikan path jika file ada di folder lain

// Ambil semua menu, urutkan berdasarkan kategori lalu id
$result = mysqli_query($conn, "SELECT * FROM menu ORDER BY kategori, id DESC");

// Kelompokkan menu per kategori
$kategori_data = [];
while ($row = mysqli_fetch_assoc($result)) {
    $kategori_data[$row['kategori']][] = $row;
}

// Daftar kategori yang ingin ditampilkan urutannya
$daftar_kategori = [
    'ayam' => 'MENU AYAM',
    'bebek' => 'MENU BEBEK',
    'kuah' => 'MENU KUAH',
    'ikan' => 'MENU IKAN',
    'ikan asin' => 'MENU IKAN ASIN',
    'sate' => 'MENU SATE',
    'minuman' => 'MINUMAN',
    'sayur' => 'MENU SAYUR',
    'tambahan' => 'MENU TAMBAHAN'
];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Menu - Rumah Sambal Seruit</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #fefefe;
        }
        header {
            background-color: #ff0000;
            color: #fff;
            text-align: center;
            padding: 10px 0;
        }
        h2 {
            margin: 0;
        }
        .content {
            padding: 40px 20px;
            max-width: 1200px;
            margin: auto;
        }
        .menu-list {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
        }
        .menu-item {
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 5px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            text-align: center;
            padding-bottom: 10px;
            transition: transform 0.3s ease;
        }
        .menu-item:hover {
            transform: translateY(-5px);
        }
        .menu-img {
            width: 100%;
            height: 180px;
            object-fit: cover;
        }
        .menu-item h4 {
            margin: 15px 0 5px;
            font-weight: 600;
            color: #333;
        }
        .menu-item p {
            color: #888;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <?php foreach ($daftar_kategori as $kategori => $judul): ?>
        <?php if (!empty($kategori_data[$kategori])): ?>
            <header>
                <h2><?= htmlspecialchars($judul) ?></h2>
            </header>
            <div class="content">
                <div class="menu-list">
                    <?php foreach ($kategori_data[$kategori] as $menu): ?>
                        <div class="menu-item">
                            <img src="../admin_login/Assets/menu/<?= htmlspecialchars($menu['gambar']) ?>" alt="<?= htmlspecialchars($menu['nama_menu']) ?>" class="menu-img">
                            <h4><?= htmlspecialchars($menu['nama_menu']) ?></h4>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>

    <div style="text-align:center; margin:20px 0;">
      <button onclick="history.back()" style="
        padding: 10px 20px;
        background-color: #ff0808;
        color: white;
        border: none;
        border-radius: 8px;
        font-weight: bold;
        cursor: pointer;
      " onmouseover="this.style.background='#a11d1d'" onmouseout="this.style.background='#B22222'">
        Kembali
      </button>
    </div>
</body>
</html>
