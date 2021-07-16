<?php  
error_reporting (E_ALL ^ E_NOTICE);
require_once("baglanti.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="css/administatistikler.css">
  <title>Admin Paneli</title>
</head>
<body>
  <div class="admin">
    <header class="admin__header">
      <a href="admin.php" class="logo">
        <h1>Değer Kaybı</h1>
      </a>
      <div class="toolbar">
        <button class="btn btn--primary">Online</button>
        <a href="cikis.php" class="logout" style="color: #0095FB;">
          Çıkış
        </a>
      </div>
    </header>
    <nav class="admin__nav">
      <ul class="menu">
        <li class="menu__item">
          <a class="menu__link" href="administatistikler.php">İstatistikler</a>
        </li>
        <li class="menu__item">
          <a class="menu__link" href="adminekspertakip.php">Eksper Takip</a>
        </li>
        <li class="menu__item">
          <a class="menu__link" href="adminkullanicitakip.php">Kullanıcı Takip</a>
        </li>
        <li class="menu__item">
          <a class="menu__link" href="admineksperatama.php">Eksper Atama</a>
        </li>
        <li class="menu__item">
          <a class="menu__link" href="adminkullaniciengelleme.php">Kullanıcı Engelleme</a>
        </li>
      </ul>
    </nav>
    
    <div class="content">
      <main>
        <div class="post">
          <table class="rwd-table">
            <tr>
              <th>Toplam Kayıtlı Kullanıcı Sayısı</th>
              <th>Toplam Eksper Sayısı</th>
              <th>Toplam Değer Kaybı Başvuru Sayısı</th>
              <th>Toplam İtiraz Sayısı</th>
            </tr>
            <?php 
            /*SELECT count(*) FROM tbl_itiraz WHERE kullanici_id IN (select id from tbl_kullanici where id = 1)*/
            /*SELECT count(*) FROM tbl_degerkaybibasvuru WHERE eksper_id = 9*/  
            $kullanici_id =  $_SESSION["kullanici_id"];
            $kullanicilar = mysqli_query($baglanti, "SELECT * FROM tbl_kullanici WHERE rol_id = 0");
            $kullanicisay = mysqli_num_rows($kullanicilar); // toplam kullanıcı sayısı

            $eksperler = mysqli_query($baglanti, "SELECT * FROM tbl_kullanici WHERE rol_id = 1");
            $ekspersay = mysqli_num_rows($eksperler); // toplam eksper sayısı

            $kayitsayisi = mysqli_query($baglanti, "SELECT * FROM tbl_degerkaybibasvuru");
            $kayitsayisirow = mysqli_num_rows($kayitsayisi); // toplam değer kaybı başvuru sayısı

            $itirazsayisi = mysqli_query($baglanti, "SELECT * FROM tbl_itiraz");
            $itirazsayisirow = mysqli_num_rows($itirazsayisi); // toplam itiraz sayısı

            echo "<tr>
            <td data-th='Toplam Kayıtlı Kullanıcı Sayısı'>$kullanicisay</td>
            <td data-th='Toplam Eksper Sayısı'>$ekspersay</td>
            <td data-th='Toplam Değer Kaybı Başvuru Sayısı'>$kayitsayisirow</td>
            <td data-th='Toplam İtiraz Sayısı'>$itirazsayisirow</td>
            </tr>";
            /*
            echo '<script type="text/javascript">alert("'.$kayitrow.'");</script>';
            echo '<meta http-equiv="refresh" content="0;URL=adminekspertakip.php">';
            */
            /*
            $sql = mysqli_query($baglanti, "SELECT * FROM tbl_degerkaybibasvuru WHERE kullanici_id = '$kullanici_id'");

            while ($row = mysqli_fetch_array($sql,MYSQLI_ASSOC)) {

              $arac_markasi = $row['arac_markasi'];
              $arac_modeli = $row['arac_modeli'];
              $arac_km = $row['arac_km'];
              $arac_plaka = $row['arac_plaka'];
              $fiyat = $row['degerkaybi'];

              echo "<tr>
              <td data-th='Eksper Adı'>$arac_markasi</td>
              <td data-th='Araç Plakası'>$arac_modeli</td>
              <td data-th='İş Durumu'>$arac_km</td>
              <td data-th='Değer Kaybı'>$arac_plaka</td>
              <td data-th='Kaza Tarihi'>$fiyat</td>
              </tr>";
            }
            */
            ?>
          </table>
        </div>
      </main>
    </div>

    <footer class="admin__footer">
      <span>
        &copy; 2021 Hakan Talha Övüç
      </span>
    </footer>
  </div>
</body>
<script src="js/admin.js" type="text/javascript"></script>
<script src="https://kit.fontawesome.com/d860437f13.js" crossorigin="anonymous"></script>
</html>