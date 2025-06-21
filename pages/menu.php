<?php
include '../admin_login/config/koneksi.php';

// Get all categories from database
$kategori_result = mysqli_query($conn, "SELECT * FROM kategori_menu");
$daftar_kategori = [];
while ($row = mysqli_fetch_assoc($kategori_result)) {
    $daftar_kategori[$row['id']] = $row['nama_kategori'];
}

// Get all menu items, ordered by category then id
$result = mysqli_query($conn, "SELECT m.*, km.nama_kategori 
                              FROM menu m
                              JOIN kategori_menu km ON m.kategori = km.id
                              ORDER BY m.kategori, m.id DESC");

// Group menu items by category
$kategori_data = [];
while ($row = mysqli_fetch_assoc($result)) {
    $kategori_data[$row['kategori']]['nama'] = $row['nama_kategori'];
    $kategori_data[$row['kategori']]['items'][] = $row;
}

// Check if a specific category filter is set
$active_filter = isset($_GET['kategori']) ? intval($_GET['kategori']) : null;
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Menu - Rumah Sambal Seruit</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Menu lengkap Rumah Sambal Seruit dengan cita rasa otentik Lampung">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <style>
        :root {
            --primary: #e63946;
            --primary-dark: #c1121f;
            --secondary: #f8f9fa;
            --dark: #212529;
            --light: #f8f9fa;
            --gray: #6c757d;
            --light-gray: #e9ecef;
            --card-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            --card-hover-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
            --transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--light);
            color: var(--dark);
            line-height: 1.6;
            overflow-x: hidden;
        }

        /* Header Section */
        .hero-section {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: white;
            padding: 5rem 0;
            margin-bottom: 3rem;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiPjxkZWZzPjxwYXR0ZXJuIGlkPSJwYXR0ZXJuIiB3aWR0aD0iNDAiIGhlaWdodD0iNDAiIHBhdHRlcm5Vbml0cz0idXNlclNwYWNlT25Vc2UiIHBhdHRlcm5UcmFuc2Zvcm09InJvdGF0ZSg0NSkiPjxyZWN0IHdpZHRoPSIyMCIgaGVpZ2h0PSIyMCIgZmlsbD0icmdiYSgyNTUsMjU1LDI1NSwwLjA1KSIvPjwvcGF0dGVybj48L2RlZnM+PHJlY3QgZmlsbD0idXJsKCNwYXR0ZXJuKSIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIvPjwvc3ZnPg==');
            z-index: 1;
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .hero-title {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            font-size: clamp(2rem, 5vw, 3.5rem);
            margin-bottom: 1rem;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .hero-subtitle {
            font-size: clamp(1rem, 2vw, 1.25rem);
            opacity: 0.9;
            max-width: 700px;
            margin: 0 auto;
        }

        /* Category Filter */
        .category-filter {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 0.75rem;
            margin: 2rem auto;
            padding: 0 1rem;
        }

        .filter-btn {
            background-color: white;
            color: var(--primary);
            border: 2px solid var(--primary);
            padding: 0.5rem 1.5rem;
            font-weight: 600;
            border-radius: 50px;
            transition: var(--transition);
            cursor: pointer;
        }

        .filter-btn:hover, .filter-btn.active {
            background-color: var(--primary);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .filter-btn.active {
            background-color: var(--primary-dark);
            border-color: var(--primary-dark);
        }

        /* Category Section */
        .category-section {
            padding: 2rem 0;
        }

        .category-title {
            position: relative;
            display: inline-block;
            margin: 2rem auto;
            padding: 0.75rem 2rem;
            background-color: var(--primary);
            color: white;
            font-weight: 600;
            font-size: clamp(1.25rem, 3vw, 1.75rem);
            border-radius: 50px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            transform: translateY(0);
            transition: var(--transition);
        }

        .category-title:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
        }

        .category-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 60%;
            height: 3px;
            background-color: var(--primary);
            border-radius: 3px;
            opacity: 0.5;
        }

        /* Menu Card */
        .menu-card {
            border: none;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: var(--card-shadow);
            transition: var(--transition);
            height: 100%;
            background-color: white;
            margin-bottom: 1.5rem;
        }

        .menu-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--card-hover-shadow);
        }

        .menu-img-container {
            position: relative;
            overflow: hidden;
            height: 200px;
        }

        .menu-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .menu-card:hover .menu-img {
            transform: scale(1.05);
        }

        .menu-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background-color: var(--primary);
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: 600;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .card-body {
            padding: 1.5rem;
            display: flex;
            flex-direction: column;
            height: calc(100% - 200px);
        }

        .menu-title {
            font-weight: 700;
            font-size: 1.25rem;
            color: var(--dark);
            margin-bottom: 0.75rem;
        }

        .menu-description {
            color: var(--gray);
            font-size: 0.9rem;
            margin-bottom: 1rem;
            flex-grow: 1;
        }

        .menu-price {
            font-weight: 700;
            color: var(--primary);
            font-size: 1.1rem;
            margin-top: auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 0.75rem;
            border-top: 1px dashed var(--light-gray);
        }

        /* Show More/Less Button */
        .show-more-btn {
            background-color: transparent;
            color: var(--primary);
            border: 2px solid var(--primary);
            padding: 0.5rem 1.5rem;
            font-weight: 600;
            border-radius: 50px;
            transition: var(--transition);
            margin: 1rem auto;
            display: block;
        }

        .show-more-btn:hover {
            background-color: var(--primary);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Hidden items */
        .menu-item.hidden {
            display: none;
        }

        /* Back Button */
        .back-btn {
            background-color: var(--primary);
            color: white;
            border: none;
            padding: 0.75rem 2rem;
            font-weight: 600;
            border-radius: 50px;
            transition: var(--transition);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            margin: 3rem auto;
            display: inline-block;
        }

        .back-btn:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
            color: white;
        }

        /* Animation Classes */
        .animate-delay-1 {
            animation-delay: 0.1s;
        }
        .animate-delay-2 {
            animation-delay: 0.2s;
        }
        .animate-delay-3 {
            animation-delay: 0.3s;
        }

        /* Responsive Adjustments */
        @media (max-width: 992px) {
            .hero-section {
                padding: 4rem 0;
            }
            
            .menu-img-container {
                height: 180px;
            }
        }

        @media (max-width: 768px) {
            .hero-section {
                padding: 3rem 0;
                margin-bottom: 2rem;
            }
            
            .menu-img-container {
                height: 160px;
            }
            
            .card-body {
                padding: 1.25rem;
            }
        }

        @media (max-width: 576px) {
            .hero-section {
                padding: 2.5rem 0;
            }
            
            .menu-img-container {
                height: 140px;
            }
            
            .menu-title {
                font-size: 1.1rem;
            }
            
            .menu-description {
                font-size: 0.85rem;
            }
            
            .menu-price {
                font-size: 1rem;
            }
            
            .category-title {
                padding: 0.5rem 1.5rem;
                font-size: 1.2rem;
            }
        }
    </style>
</head>
<body>
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container hero-content">
            <h1 class="hero-title animate__animated animate__fadeInDown">MENU RUMAH SAMBAL SERUIT</h1>
            <p class="hero-subtitle animate__animated animate__fadeIn animate__delay-1s">Cita Rasa Otentik Lampung di Setiap Hidangan</p>
        </div>
    </section>

    <!-- Category Filter -->
    <div class="category-filter">
        <button class="filter-btn <?= is_null($active_filter) ? 'active' : '' ?>" 
                onclick="window.location.href='?'">
            Semua Menu
        </button>
        <?php foreach ($daftar_kategori as $id => $nama): ?>
            <button class="filter-btn <?= $active_filter == $id ? 'active' : '' ?>" 
                    onclick="window.location.href='?kategori=<?= $id ?>'">
                <?= htmlspecialchars($nama) ?>
            </button>
        <?php endforeach; ?>
    </div>

    <!-- Menu Sections -->
    <main class="container category-section">
        <?php foreach ($kategori_data as $kategori_id => $data): ?>
            <?php 
                // Skip if we have an active filter and this isn't the filtered category
                if (!is_null($active_filter) && $active_filter != $kategori_id) continue;
                
                $items = $data['items'];
                $show_more = count($items) > 8;
                $display_items = $show_more ? array_slice($items, 0, 8) : $items;
            ?>
            
            <div class="text-center">
                <h2 class="category-title animate__animated animate__fadeIn"><?= htmlspecialchars($data['nama']) ?></h2>
            </div>
            
            <div class="row">
                <?php foreach ($display_items as $index => $menu): ?>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 animate__animated animate__fadeInUp animate__delay-<?= ($index % 4) + 1 ?>s menu-item">
                        <div class="card menu-card">
                            <div class="menu-img-container">
                                <img src="../admin_login/Assets/menu/<?= htmlspecialchars($menu['gambar']) ?>" 
                                     class="menu-img"
                                     alt="<?= htmlspecialchars($menu['nama_menu']) ?>"
                                     loading="lazy"
                                     style="cursor: pointer;"
                                     data-bs-toggle="modal"
                                     data-bs-target="#imageModal"
                                     onclick="showImageModal(this)">
                                <span class="menu-badge"><?= htmlspecialchars($data['nama']) ?></span>
                            </div>
                            <div class="card-body">
                                <h3 class="menu-title"><?= htmlspecialchars($menu['nama_menu']) ?></h3>
                                <?php if (!empty($menu['deskripsi'])): ?>
                                    <p class="menu-description"><?= htmlspecialchars($menu['deskripsi']) ?></p>
                                <?php endif; ?>
                                <?php if (!empty($menu['harga'])): ?>
                                    <div class="menu-price">
                                        <span>Harga</span>
                                        <span>Rp<?= number_format($menu['harga'], 0, ',', '.') ?></span>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                
                <?php if ($show_more): ?>
                    <?php foreach (array_slice($items, 8) as $index => $menu): ?>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3 animate__animated animate__fadeInUp animate__delay-<?= ($index % 4) + 1 ?>s menu-item hidden">
                            <div class="card menu-card">
                                <div class="menu-img-container">
                                    <img src="../admin_login/Assets/menu/<?= htmlspecialchars($menu['gambar']) ?>" 
                                         class="menu-img"
                                         alt="<?= htmlspecialchars($menu['nama_menu']) ?>"
                                         loading="lazy"
                                         style="cursor: pointer;"
                                         data-bs-toggle="modal"
                                         data-bs-target="#imageModal"
                                         onclick="showImageModal(this)">
                                    <span class="menu-badge"><?= htmlspecialchars($data['nama']) ?></span>
                                </div>
                                <div class="card-body">
                                    <h3 class="menu-title"><?= htmlspecialchars($menu['nama_menu']) ?></h3>
                                    <?php if (!empty($menu['deskripsi'])): ?>
                                        <p class="menu-description"><?= htmlspecialchars($menu['deskripsi']) ?></p>
                                    <?php endif; ?>
                                    <?php if (!empty($menu['harga'])): ?>
                                        <div class="menu-price">
                                            <span>Harga</span>
                                            <span>Rp<?= number_format($menu['harga'], 0, ',', '.') ?></span>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    
                    <div class="col-12 text-center">
                        <button class="show-more-btn" 
                                onclick="toggleShowMore(this, '<?= $kategori_id ?>')">
                            Tampilkan Lebih Banyak
                        </button>
                    </div>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>

        <!-- Back Button -->
        <div class="text-center">
            <button onclick="history.back()" class="back-btn animate__animated animate__fadeIn">
                Kembali
            </button>
        </div>
    </main>

    <!-- Image Modal -->
    <div class="modal fade" id="imageModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-body text-center p-0">
                    <img id="modalImage" src="" alt="" class="img-fluid">
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Add intersection observer for scroll animations
        document.addEventListener('DOMContentLoaded', function() {
            const animateElements = document.querySelectorAll('.animate__animated');
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const animation = entry.target.getAttribute('data-animate');
                        entry.target.classList.add(animation);
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.1
            });

            animateElements.forEach(element => {
                observer.observe(element);
            });
        });

        function showImageModal(imgElement) {
            const modalImg = document.getElementById('modalImage');
            modalImg.src = imgElement.src;
            modalImg.alt = imgElement.alt;
        }

        function toggleShowMore(button, categoryId) {
            const hiddenItems = document.querySelectorAll(`.menu-item.hidden[data-category="${categoryId}"]`);
            const isShowingMore = button.textContent.includes('Lebih Banyak');
            
            if (isShowingMore) {
                hiddenItems.forEach(item => item.classList.remove('hidden'));
                button.textContent = 'Tampilkan Lebih Sedikit';
            } else {
                hiddenItems.forEach(item => item.classList.add('hidden'));
                button.textContent = 'Tampilkan Lebih Banyak';
            }
        }
    </script>
</body>
</html>