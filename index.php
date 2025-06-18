<?php
// Uncomment if you have header/footer includes
// include 'pages/header.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Rumah Sambal Seruit - Menyajikan makanan khas Lampung dengan cita rasa otentik. Fresh, Otentik, Harga Bersahabat.">
    <title>Rumah Sambal Seruit | Makanan Khas Lampung</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <style>
        /* CSS Variables for Brand Colors and Common Styles */
        :root {
            --primary-color: #e63946; /* Main brand red */
            --primary-dark: #c1121f;  /* Darker red for gradients/hovers */
            --secondary-bg: #ffe6a7; /* Light yellow for hero background */
            --text-dark: #212529;    /* Dark text color */
            --text-medium: #555;     /* Medium gray text */
            --text-light: #444;      /* Slightly lighter gray text */
            --bg-light: #fff;        /* White background */
            --bg-body: #f8f9fa;      /* Light gray body background */
            --gray: #6c757d;         /* General gray */
            --light-gray-border: #e9ecef; /* Light gray for borders/dividers */
            --transition-speed: all 0.3s ease;
            --shadow-sm: 0 2px 8px rgba(0,0,0,0.1);
            --shadow-md: 0 4px 12px rgba(0,0,0,0.15);
            --shadow-lg: 0 8px 25px rgba(230,57,70,0.18); /* Stronger shadow for hover */
        }

        /* Base Styles & Resets */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            color: var(--text-dark);
            line-height: 1.6;
            background-color: var(--bg-body);
            display: flex;
            flex-direction: column;
            min-height: 100vh; /* Ensures footer sticks to bottom */
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        img {
            max-width: 100%;
            height: auto;
            display: block; /* Removes extra space below images */
        }

        /* Global Container for Centering Content */
        .container {
            max-width: 1100px;
            margin: 0 auto;
            padding: 0 20px; /* Consistent horizontal padding */
        }

        /* --- Header Styles --- */
        .header-bar {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
            color: white;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: var(--shadow-md);
            position: relative;
            z-index: 100;
            overflow: hidden; /* Ensures pseudo-element doesn't overflow */
        }

        /* Background pattern for header */
        .header-bar::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiPjxkZWZzPjxwYXR0ZXJuIGlkPSJwYXR0ZXJuIiB3aWR0aD0iNDAiIGhlaWdodD0iNDAiIHBhdHRlcm5Vbml0cz0idXNlclNwYWNlT25Vc2UiIHBhdHRlcm5UcmFuc2Zvcm09InJvdGF0ZSg0NSkiPjxyZWN0IHdpZHRoPSIyMCIgaGVpZ2h0PSIyMCIgZmlsbD0icmdiYSgyNTUsMjU1LDI1NSwwLjA1KSIvPjwvcGF0dGVybj48L2RlZnM+PHJlY3QgZmlsbD0idXJsKCNwYXR0ZXJuKSIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIvPjwvc3ZnPg==');
            z-index: -1;
            opacity: 0.8; /* Subtle pattern */
        }

        .left-logo, .right-logo {
            flex: 0 0 80px; /* Fixed width for logos */
            display: flex;
            align-items: center;
        }

        .left-logo img, .right-logo img {
            max-width: 100%;
            height: auto;
            max-height: 80px; /* Maintain aspect ratio */
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid rgba(255,255,255,0.2);
            transition: var(--transition-speed);
        }

        .left-logo img:hover, .right-logo img:hover {
            transform: scale(1.05);
            border-color: rgba(255,255,255,0.4);
        }

        .header-title {
            flex: 1; /* Allows title to take available space */
            text-align: center;
            padding: 0 1rem;
        }

        .header-title h1 {
            font-family: 'Playfair Display', serif;
            font-size: clamp(1.5rem, 4vw, 2.5rem); /* Responsive font size */
            font-weight: 700;
            margin-bottom: 0.5rem;
            text-shadow: 0 2px 4px rgba(0,0,0,0.2);
        }

        .header-title p {
            font-size: clamp(0.9rem, 2vw, 1.1rem);
            opacity: 0.9;
            font-weight: 400;
        }

        /* --- Navigation Styles --- */
        nav {
            background-color: var(--bg-light);
            box-shadow: var(--shadow-sm);
            position: sticky; /* Sticky navigation */
            top: 0;
            z-index: 90;
        }

        nav ul {
            display: flex;
            justify-content: center;
            list-style: none;
            padding: 0;
            margin: 0;
        }

        nav li {
            position: relative;
        }

        nav a {
            display: block;
            padding: 1rem 1.5rem;
            color: var(--text-dark);
            text-decoration: none;
            font-weight: 500;
            transition: var(--transition-speed);
            position: relative;
        }

        nav a:hover, nav a:focus {
            color: var(--primary-color);
        }

        /* Underline effect on hover/active */
        nav a::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 0;
            height: 3px;
            background-color: var(--primary-color);
            transition: var(--transition-speed);
        }

        nav a:hover::after {
            width: 70%;
        }

        /* Active link style (PHP logic needed to apply 'active' class) */
        nav a.active {
            color: var(--primary-color);
            font-weight: 600;
        }

        nav a.active::after {
            width: 70%;
        }

        /* Mobile Menu Toggle */
        .menu-toggle {
            display: none; /* Hidden by default on desktop */
            cursor: pointer;
            padding: 1rem;
            text-align: center;
            background-color: var(--primary-color);
            color: white;
            font-weight: 600;
            font-size: 1.1rem;
            border-bottom: 1px solid rgba(255,255,255,0.2);
        }
        .menu-toggle i {
            margin-right: 8px;
        }

        /* --- Main Content Area --- */
        main {
            flex-grow: 1; /* Allows main content to fill available space */
        }

        /* --- Hero Section (Main Landing Content) --- */
        .hero-main-section {
            background: linear-gradient(135deg, var(--secondary-bg) 30%, var(--bg-light) 100%);
            padding: 60px 0 40px 0;
            text-align: center;
        }

        .hero-main-section h2 {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            color: var(--primary-color);
            font-size: clamp(2.3rem, 5vw, 3.2rem);
            margin-bottom: 16px;
            line-height: 1.2;
        }

        .hero-main-section p {
            font-size: clamp(1.15rem, 2.5vw, 1.25rem);
            color: var(--text-medium);
            margin-bottom: 40px;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
        }

        .hero-main-section p span {
            color: var(--primary-color);
            font-weight: 600;
        }

        .btn-action {
            display: inline-block;
            background: var(--primary-color);
            color: var(--bg-light);
            padding: 14px 36px;
            border-radius: 32px;
            font-weight: 600;
            font-size: 1.09rem;
            box-shadow: 0 4px 15px var(--shadow-sm);
            text-decoration: none;
            transition: var(--transition-speed);
            border: none;
            cursor: pointer;
        }

        .btn-action:hover {
            background: var(--primary-dark);
            box-shadow: 0 6px 20px var(--shadow-md);
            transform: translateY(-2px);
        }

        /* --- Promo Section (Feature Cards) --- */
        .promo-section {
            padding: 60px 0;
            text-align: center;
        }

        .promo-section-title {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            color: var(--text-dark);
            font-size: clamp(1.8rem, 4vw, 2.8rem);
            margin-bottom: 40px;
        }

        .promo-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); /* Adaptive columns */
            gap: 30px;
            margin-top: 40px;
        }

        .promo-card {
            background: var(--bg-light);
            border-radius: 17px;
            box-shadow: var(--shadow-sm); /* Softer shadow */
            padding: 30px 25px;
            display: flex;
            flex-direction: column;
            align-items: center;
            transition: var(--transition-speed);
            text-align: center;
            border: 1px solid var(--light-gray-border); /* Subtle border */
        }

        .promo-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-lg); /* More prominent shadow on hover */
            border-color: var(--primary-color); /* Highlight border on hover */
        }

        .promo-card img {
    width: 120px;
    height: 120px;
    object-fit: cover;
    margin-bottom: 18px;
    border-radius: 16px;
    padding: 6px;
    background-color: #fcebeb;
    box-shadow: 0 2px 10px rgba(230,57,70,0.11);
    transition: transform .18s;
}
.promo-card:hover img {
    transform: scale(1.07);
}


        .promo-card h3 {
            color: var(--primary-color);
            font-size: 1.35rem;
            margin-bottom: 10px;
            font-weight: 700;
        }

        .promo-card p {
            font-size: 0.98rem;
            color: var(--text-light);
            line-height: 1.5;
        }

        /* --- Call to Action Section --- */
        .cta-section {
            padding: 50px 0 30px 0;
            text-align: center;
            background-color: var(--bg-light);
            box-shadow: inset 0 2px 10px rgba(0,0,0,0.05); /* Subtle inner shadow */
        }

        .cta-section h3 {
            color: var(--text-dark);
            font-weight: 700;
            font-size: clamp(1.5rem, 3vw, 2.1rem);
            margin-bottom: 18px;
        }

        .cta-section p {
            color: var(--text-medium);
            font-size: clamp(0.95rem, 2vw, 1.15rem);
            margin-bottom: 24px;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .cta-section p a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 600;
            transition: var(--transition-speed);
        }

        .cta-section p a:hover {
            color: var(--primary-dark);
            text-decoration: underline;
        }

        /* --- Footer Styles --- */
        footer {
            background-color: var(--dark);
            color: white;
            text-align: center;
            padding: 1.5rem;
            margin-top: auto; /* Pushes footer to the bottom */
            font-size: 0.9rem;
        }

        /* --- Responsive Adjustments --- */
        @media (max-width: 992px) {
            .header-bar {
                padding: 1rem;
            }
            
            .left-logo, .right-logo {
                flex: 0 0 60px; /* Smaller logos on tablets */
            }

            .header-title h1 {
                font-size: clamp(1.5rem, 3.5vw, 2.2rem);
            }

            .header-title p {
                font-size: clamp(0.85rem, 1.8vw, 1rem);
            }
        }

        @media (max-width: 768px) {
            .header-bar {
                flex-direction: column;
                padding: 1.5rem 1rem;
                text-align: center;
            }
            
            .left-logo, .right-logo {
                display: none; /* Hide logos on small mobile for simplicity */
            }
            
            .header-title {
                padding: 0;
                margin-bottom: 1rem; /* Add spacing below title */
            }

            /* Mobile Navigation */
            nav ul {
                flex-direction: column;
                display: none; /* Hide nav menu by default */
            }
            
            nav ul.show {
                display: flex; /* Show nav menu when 'show' class is added */
            }
            
            .menu-toggle {
                display: block; /* Show menu toggle button */
            }
            
            nav a {
                padding: 0.8rem 1rem;
                border-bottom: 1px solid var(--light-gray-border); /* Separator for mobile links */
            }
            
            nav a:hover {
                background-color: var(--light-gray-border);
            }

            .promo-cards {
                grid-template-columns: 1fr; /* Stack cards vertically on smaller screens */
                gap: 20px; /* Slightly less gap */
            }

            .container {
                padding: 0 15px; /* Smaller padding on mobile */
            }

            .hero-main-section, .promo-section, .cta-section {
                padding-left: 15px;
                padding-right: 15px;
            }
        }

        @media (max-width: 576px) {
            .header-title h1 {
                font-size: 1.8rem;
            }
            
            .header-title p {
                font-size: 0.95rem;
            }

            .hero-main-section h2 {
                font-size: 2rem;
            }

            .hero-main-section p {
                font-size: 1rem;
            }

            .btn-action {
                padding: 12px 28px;
                font-size: 1rem;
            }

            .promo-card h3 {
                font-size: 1.2rem;
            }

            .promo-card p {
                font-size: 0.9rem;
            }
        }
    </style>
</head>
<body>
    <header class="header-bar">
        <div class="left-logo">
            <img src="Assets/logo_rumahsambalseruit.jpeg" alt="Logo Rumah Sambal Seruit">
        </div>
        <div class="header-title">
            <h1>Selamat Datang Di Rumah Sambal Seruit</h1>
            <p>Menikmati Kelezatan Makanan Khas Lampung</p>
        </div>
        <div class="right-logo">
            <img src="Assets/logo_rumahsambalseruit.jpeg" alt="Logo Rumah Sambal Seruit">
        </div>
    </header>
    
    <nav>
        <div class="menu-toggle" id="menuToggle">
            <span><i class="fas fa-bars"></i> Menu</span>
        </div>
        <ul id="navMenu">
            <li><a href="index.php" class="active">Home</a></li>
            <li><a href="pages/menu.php">Menu</a></li>
            <li><a href="pages/info/about.php">About</a></li>
            <li><a href="pages/info/galeri.php">Galeri</a></li>
            <li><a href="pages/contact.php">Kontak</a></li>
        </ul>
    </nav>
    
    <main>
        <section class="hero-main-section">
            <h2 class="hero-title">Kelezatan Khas Lampung<br> dalam Satu Rumah</h2>
            <p>Selamat datang di <b>Rumah Sambal Seruit</b>, tempat terbaik menikmati menu-menu legendaris dan sambal khas Lampung.<br>
            <span>Fresh • Otentik • Harga Bersahabat</span></p>
            <a href="pages/menu.php" class="btn-action">Lihat Menu <i class="fas fa-utensils"></i></a>
        </section>

        <section class="promo-section container">
            <h2 class="promo-section-title">Mengapa Memilih Kami?</h2>
            <div class="promo-cards">
                <div class="promo-card">
                    <img src="Assets/menu andalan.jpg" alt="Sambal Seruit Otentik">
                    <h3>Sambal Seruit Otentik</h3>
                    <p>Cita rasa sambal khas Lampung yang melegenda.<br> <b>Racikan asli keluarga!</b></p>
                </div>
                <div class="promo-card">
                    <img src="Assets/menu ayam.jpg" alt="Aneka Menu Favorit">
                    <h3>Aneka Menu Favorit</h3>
                    <p>Ayam, ikan, bebek, sate, hingga menu prasmanan.<br> Lengkap & halal.</p>
                </div>
                <div class="promo-card">
                    <img src="Assets/ruang vvip.jpg" alt="Ruang VIP">
                    <h3>Nyaman & Kekinian</h3>
                    <p>Tersedia ruang VIP, parkiran luas, mushola, free WiFi.<br> Untuk keluarga & acara!</p>
                </div>
            </div>
        </section>

        <section class="cta-section">
            <h3>Yuk, kunjungi Rumah Sambal Seruit!</h3>
            <p>
                Jalan Kelezatan No.10, Ciledug, Kota Tangerang<br>
                <a href="https://goo.gl/maps/Xn6kSeruit" target="_blank"><i class="fas fa-map-marker-alt"></i> Lihat di Google Maps</a>
            </p>
            <a href="pages/contact.php" class="btn-action">Hubungi Kami</a>
        </section>
    </main>
    
    <footer>
        &copy; 2025 Rumah Sambal Seruit. All Rights Reserved.
    </footer>

    <script>
        // Mobile menu toggle functionality
        document.addEventListener('DOMContentLoaded', function() {
            const menuToggle = document.getElementById('menuToggle');
            const navMenu = document.getElementById('navMenu');
            
            if (menuToggle && navMenu) { // Ensure elements exist before adding event listeners
                menuToggle.addEventListener('click', function() {
                    navMenu.classList.toggle('show');
                });
            }
            
            // Highlight current page in navigation
            // This part assumes your PHP script outputs index.php, menu.php etc.
            // For more robust highlighting, PHP should determine the active class.
            const currentPath = window.location.pathname;
            const currentFile = currentPath.substring(currentPath.lastIndexOf('/') + 1);
            
            const navLinks = document.querySelectorAll('nav a');
            
            navLinks.forEach(link => {
                // Check if the link's href matches the current file or contains it
                // e.g., index.php, pages/menu.php, pages/info/about.php
                const linkHref = link.getAttribute('href');
                if (linkHref && (linkHref === currentFile || linkHref.includes(currentPath.substring(1)))) { // Check full path including subdirectories
                    link.classList.add('active');
                } else if (currentFile === '' && linkHref === 'index.php') { // Handle root index.php
                    link.classList.add('active');
                }
            });
        });
    </script>
</body>
</html>