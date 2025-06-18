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
            height: 800px;
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
    <header>
        <h2>MENU MENU RUMAH SAMBAL SERUIT</h2>
    </header>
    <div class="content">
        <div class="menu-list">
            <div class="menu-item">
                <img src="../assets/menu ayam.jpg" alt="MENU AYAM" class="menu-img">
                <h4>MENU AYAM</h4>
            </div>
            <div class="menu-item">
                <img src="../assets/ayam.jpg" alt="MENU AYAM" class="menu-img">
                <h4>MENU AYAM</h4>
            </div>
        </div>
    </div>
<header>
</header>
<div class="content">
    <div class="menu-list">
        <div class="menu-item">
            <img src="../Assets/menu bebek.jpg" alt="MENU BEBEK" class="menu-img">
            <H4>MENU BEBEK</H4>
        </div>
        <div class="menu-item">
                <img src="../Assets/menu kuah.jpg" alt="MENU AYAM" class="menu-img">
                <h4>MENU KUAH</h4>
            </div>
    </div>
</div>
<header>
</header>
<div class="content">
    <div class="menu-list">
        <div class="menu-item">
            <img src="../Assets/menu ikan.jpg" alt="MENU IKAN" class="menu-img">
            <h4>MENU IKAN</h4>
        </div>
        <div class="menu-item">
            <img src="../Assets/ikan.jpg" alt="MENU IKAN" class="menu-img">
            <h4>MENU IKAN</h4>
    </div>
</div>
<header>
</header>
<div class="content">
    <div class="menu-list">
        <div class="menu-item">
            <img src="../Assets/ikan asin.jpg" alt="MENU IKAN ASIN" class="menu-img">
            <h4>MENU IKAN ASIN</h4>
        </div>
        <div class="menu-item">
            <img src="../Assets/menu sate.jpg" alt="MENU SATE" class="menu-img">
            <h4>MENU SATE</h4>
    </div>
</div>
<header>
</header>
<div class="content">
    <div class="menu-list">
        <div class="menu-item">
            <img src="../Assets/menu minuman.jpg" alt="MINUMAN" class="menu-img">
            <h4>MINUMAN</h4>
        </div>
        <div class="menu-item">
            <img src="../Assets/menu sayur.jpg" alt="MENU SAYUR" class="menu-img">
            <h4>MENU SAYU</h4>
    </div>
</div>
<header>
     <h2>ANEKA MENU TAMBAHAN</h2>
</header>
<div class="content">
    <div class="menu-list">
        <div class="menu-item">
            <img src="../Assets/menu tambahan.jpg" style="width: 1000px; height: auto; object-fit: cover; border-radius: 10px;">
            <h4>MENU TAMBAHAN</h4>
        </div>
</div>
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
</div>
</body>
</html>
