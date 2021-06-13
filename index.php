<?php
include "./koneksi.php";
$queryMPM = $sql_obj->query("SELECT * FROM lathi WHERE id = 2")->fetch_assoc();
$queryBEM = $sql_obj->query("SELECT * FROM lathi WHERE id = 1")->fetch_assoc();
$queryVMT = $sql_obj->query("SELECT * FROM vmt")->fetch_assoc();
$queryHMJ = $sql_obj->query("SELECT * FROM hmj");
$queryUKM = $sql_obj->query("SELECT * FROM ukm");
$queryOrda = $sql_obj->query("SELECT * FROM orda");
?>
<!DOCTYPE html>
<html lang="en" id="home">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>POLINDRA | Politeknik Negeri Indramayu</title>
  <link rel="icon" href="./assets/img/polindra.png">
  <link rel="stylesheet" href="./assets/landing/style.css">
  <link rel="stylesheet" href="./assets/fontawesome-free/css/all.css" />
</head>
<body>

  <nav class="navbar-title">
    <div class="container">
      <img src="./assets/img/polindra.png" alt="Logo Polindra">

      <div class="title">
        <h2>Politeknik Negeri Indramayu</h2>
        <p>Jl. Raya Lohbener Lama No. 08 Indramayu 45252 Fax / Tlp. (0234) 5746464</p>
      </div>
    </div>
    <div>&nbsp;</div>
  </nav>

  <nav class="navbar">
    <div class="navbar-brand">
      <a href="./">Informasi Ormawa</a>
    </div>

    <ul class="navbar-menu">
      <li><a href="#home">Home</a></li>
      <li><a href="#about">Tentang Kami</a></li>
      <li><a href="#ormawa">Ormawa</a></li>
      <li><a href="#contact">Kontak Kami</a></li>
    </ul>

    <button id="navbar-toggle">
      <i class="fas fa-bars"></i>
    </button>
  </nav>

  <div class="jumbotron">
    <img style="z-index: -999;" src="./assets/img/gedung-polindra.jpg" alt="Logo Polindra">
  </div>

  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
    <path fill="#0099ff" fill-opacity="1" d="M0,224L60,229.3C120,235,240,245,360,218.7C480,192,600,128,720,133.3C840,139,960,213,1080,229.3C1200,245,1320,203,1380,181.3L1440,160L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path>
  </svg>
  <section id="about">
    <div class="container">
      <h1>Tentang Kami</h1>
      <p>
        <?= $queryVMT['about'] ?>
      </p>
      <div class="content">
        <div class="left">
          <h2>Visi</h2>
          <p>
            <?= $queryVMT['visi'] ?>
          </p>
        </div>
        <div class="center">
          <h2>Misi</h2>
          <?= $queryVMT['misi'] ?>
        </div>
        <div class="right">
          <h2>Tujuan</h2>
          <?= $queryVMT['tujuan'] ?>
        </div>
      </div>
    </div>
  </section>

  <svg id="svgOrmawa" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
    <path fill="#fff" fill-opacity="1" d="M0,224L60,229.3C120,235,240,245,360,218.7C480,192,600,128,720,133.3C840,139,960,213,1080,229.3C1200,245,1320,203,1380,181.3L1440,160L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path>
  </svg>
  <section id="ormawa">
    <h1>Organisasi Mahasiswa</h1>
    <p style="margin-bottom: 1rem;"><q>Ormawa adalah Organisasi Mahasiswa</q></p>
    <div class="lathi">
      <a href="<?= $queryBEM['ig'] ?>"><img id="bem" src="./assets/img/<?= $queryBEM['logo'] ?>" alt=""></a>
      <a href="<?= $queryMPM['ig'] ?>"><img id="bem" src="./assets/img/<?= $queryMPM['logo'] ?>" alt=""></a>
    </div>
    <div class="ormawa">
      <div id="hmj">
        <?php while ($qh = $queryHMJ->fetch_assoc()) { ?>
          <a href="<?= $qh['ig_hmj'] ?>" target="blank"><img src="./assets/img/<?= $qh['logo_hmj'] ?>" alt=""></a>
        <?php } ?>
      </div>
      <div id="ukm">
        <?php while ($qu = $queryUKM->fetch_assoc()) { ?>
          <a target="blank" href="<?= $qu['ig_ukm'] ?>"><img src="./assets/img/<?= $qu['logo_ukm'] ?>" alt=""></a>
        <?php } ?>
      </div>
      <div id="orda">
        <?php while ($qo = $queryOrda->fetch_assoc()) { ?>
          <a target="blank" href="<?= $qo['ig_orda'] ?>"><img src="./assets/img/<?= $qo['logo_orda'] ?>" alt=""></a>
        <?php } ?>
      </div>
    </div>
  </section>

  <svg id="footer" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
    <path fill="#000" fill-opacity="1" d="M0,224L60,229.3C120,235,240,245,360,218.7C480,192,600,128,720,133.3C840,139,960,213,1080,229.3C1200,245,1320,203,1380,181.3L1440,160L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path>
  </svg>
  <footer>
    &copy; 2021 Built With <i class="fas fa-heart"></i> Team 9 D3TI.1C <br>
    Mahasiswa Teknik Informatika <br>
    Politeknik Negeri Indramayu
  </footer>

  <script>
    let btnToggle = document.getElementById("navbar-toggle");
    let navbarMenu = document.querySelector(".navbar-menu");

    btnToggle.addEventListener("click", function () {
      navbarMenu.classList.toggle("slider");
    })
  </script>
</body>
</html>