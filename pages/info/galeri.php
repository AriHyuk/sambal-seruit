<?php
include '../../admin_login/config/koneksi.php'; // sesuaikan path jika perlu
$galeri = mysqli_query($conn, "SELECT * FROM galeri ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Galeri - Rumah Sambal Seruit</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;600&display=swap" rel="stylesheet">
  <style>
    body { font-family: 'Poppins', sans-serif; background: #fff; color: #000; margin:0; padding:0;}
    .galeri-container { max-width: 1100px; margin: 0 auto; padding: 40px 15px;}
    h2 { color: #ff0000; text-align:center; margin-bottom:30px; letter-spacing:1px; }
    .gallery-section { text-align: center; }
    .gallery { display: flex; flex-wrap: wrap; justify-content: center; gap: 24px; margin-top: 16px; }
    .gallery-item { width: 230px; cursor: pointer; border-radius: 14px; overflow: hidden; background: #fff;
      box-shadow: 0 4px 16px rgba(0,0,0,0.09); transition: transform 0.18s, box-shadow 0.18s; display: flex; flex-direction: column;}
    .gallery-item:hover { transform: translateY(-7px) scale(1.03); box-shadow: 0 10px 30px rgba(0,0,0,0.14);}
    .gallery-item img { width: 100%; height: 150px; object-fit: cover; border-bottom: 2px solid #ffe600; background: #eee; transition: filter 0.3s;}
    .gallery-item:hover img { filter: brightness(0.96) saturate(1.13);}
    .caption { padding: 13px 10px 11px 10px; font-size: 15px; background-color: #ffe600; font-weight: 600; color: #111; border-radius: 0 0 10px 10px; flex: 1; display: flex; align-items: center; justify-content: center; min-height: 40px;}
    .modal { display: none; position: fixed; z-index: 100; padding-top: 60px; left: 0; top: 0; width: 100%; height: 100%; overflow: auto; background-color: rgba(0,0,0,0.82);}
    .modal-content { margin: auto; display: block; max-width: 80vw; border-radius: 10px; }
    .modal-caption { margin: auto; text-align: center; padding: 10px; color: #fff; }
    .close { position: absolute; top: 20px; right: 35px; color: white; font-size: 40px; font-weight: bold; cursor: pointer; }
    .close:hover { color: #000; }
    @media (max-width:600px){
      .gallery { gap: 14px; }
      .gallery-item { width: 96vw; max-width: 340px; }
      .gallery-item img { height: 130px;}
      .galeri-container { padding: 30px 5vw; }
    }
    footer { text-align: center; padding: 5px; background: #ff0000; color: #efefef; margin-top: 40px;}
  </style>
</head>
<body>
<div class="galeri-container">
  <h2>Galeri Rumah Sambal Seruit</h2>
  <section class="gallery-section">
    <div class="gallery">
      <?php while($row = mysqli_fetch_assoc($galeri)): ?>
        <div class="gallery-item" onclick="openModal(this)">
          <img src="../../admin_login/Assets/galeri/<?= htmlspecialchars($row['gambar']) ?>" alt="<?= htmlspecialchars($row['judul']) ?>">
          <div class="caption"><?= htmlspecialchars($row['judul']) ?></div>
        </div>
      <?php endwhile; ?>
    </div>
  </section>
  <div style="text-align:center; margin:24px 0;">
    <button onclick="history.back()" style="
      padding: 10px 22px;
      background-color: #fc0808;
      color: white;
      border: none;
      border-radius: 8px;
      font-weight: bold;
      cursor: pointer;
      font-size: 17px;
    " onmouseover="this.style.background='#a11d1d'" onmouseout="this.style.background='#B22222'">
      Kembali
    </button>
  </div>
</div>
<!-- Modal -->
<div id="myModal" class="modal">
  <span class="close" onclick="closeModal()">&times;</span>
  <img class="modal-content" id="modal-img">
  <div class="modal-caption" id="modal-caption"></div>
</div>
<script>
  function openModal(elem) {
    const img = elem.querySelector("img");
    const caption = elem.querySelector(".caption").innerText;
    document.getElementById("myModal").style.display = "block";
    document.getElementById("modal-img").src = img.src;
    document.getElementById("modal-caption").innerText = caption;
  }
  function closeModal() {
    document.getElementById("myModal").style.display = "none";
  }
</script>
</body>
</html>
