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
  <link rel="stylesheet" type="text/css" href="css/admineksperatama.css">
  <title>Admin Paneli</title>
</head>
<body>
  <div class="admin">
    <header class="admin__header">
      <a href="admin.php" class="logo">
        <h1 style="font-size: 32px;">Değer Kaybı</h1>
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
    <main class="admin__main">
      <div class="dashboard">
        <table class="rwd-table">
          <tr>
            <th>Ad-Soyad</th>
            <th>Kullanıcı Adı</th>
            <th>E-Mail</th>
            <th>Tel-No</th>
            <th>Doğum Tarihi</th>
            <th>Kendini Tanıt</th>
          </tr>
          
          <?php
          
          $kullanici_id =  $_SESSION["kullanici_id"];
          $sql = mysqli_query($baglanti, "SELECT * FROM tbl_eksperbasvuru");
          /* foreach ($sql as $gecmis) {} */
          while ($row = mysqli_fetch_array($sql,MYSQLI_ASSOC)) {

            $ad_soyad = $row['ad_soyad'];
            $k_adi = $row['kullanici_adi'];
            $mail = $row['mail'];
            $tel_no = $row['tel_no'];
            $dog_tar = $row['dogum_tarihi'];
            $kendini_tanit = $row['kendini_tanit'];
            $durum = $row['durum'];
            
            if ($durum == 'A') {

              echo "<tr>
              <td data-th='Ad-Soyad'>$ad_soyad</td>
              <td data-th='Kullanıcı Adı'>$k_adi</td>
              <td data-th='E-Mail'>$mail</td>
              <td data-th='Tel-No'>$tel_no</td>
              <td data-th='Doğum Tarihi'>$dog_tar</td>
              <td data-th='Kendini Tanıt'>$kendini_tanit</td>
              </td>
              </tr>
              ";
            }

          }
          ?>
        </table>
        <br><br>
        <form method="POST" style="float: left;">
          <div class="select-wrap">
            <select name="select-1" id="select-1">
              <option value="Kullanıcı seçiniz...">Kullanıcı seçiniz...</option>
              <?php  
              $kullanici_id2 = $_SESSION["kullanici_id"];
              $secilenkul = $_POST["select-1"];
              $_SESSION['secilenkul'] = $secilenkul;
              $kulsec = mysqli_query($baglanti, "SELECT * FROM tbl_eksperbasvuru WHERE durum = 'A'");
              while ($row2 = mysqli_fetch_array($kulsec,MYSQLI_ASSOC)) {
                $k_adi = $row2['kullanici_adi'];
                echo "<option value='$k_adi'>$k_adi</option>";
              }
              ?>
            </select>
            <br><br>
            <input type="submit" id="gonder" name="gonder" value="Gönder">
            <br><br>
            <select name="select-2" id="select-2">
              <option value="Onayla">Onayla</option>
              <option value="Reddet">Reddet</option>
              <?php  
              $kullanici_id3 = $_SESSION["kullanici_id"];
              $secilenkull = $_SESSION['secilenkul'];
              $secilendurum = $_POST['select-2'];
              if (isset($_POST['gonder'])) {
                if ($secilenkull == 'Kullanıcı seçiniz...') {
                  echo '<script type="text/javascript">alert("Boş alan bırakmayınız.");</script>';
                  echo '<meta http-equiv="refresh" content="0;URL=admineksperatama.php">';
                }
                else{
                  if ($secilendurum == 'Onayla') {
                    $guncelle = mysqli_query($baglanti, "UPDATE tbl_eksperbasvuru SET durum = 'P' WHERE kullanici_adi = '$secilenkull'");
                    $row3 = mysqli_fetch_array($guncelle, MYSQLI_ASSOC);
                    $guncelle2 = mysqli_query($baglanti, "UPDATE tbl_kullanici SET rol_id = 1 WHERE kullanici_adi = '$secilenkull'");
                    $row4 = mysqli_fetch_array($guncelle2, MYSQLI_ASSOC);
                    echo '<script type="text/javascript">alert("Başvuru onaylandı.");</script>';
                    echo '<meta http-equiv="refresh" content="0;URL=admineksperatama.php">';
                  }
                  else{
                    $guncelle3 = mysqli_query($baglanti, "UPDATE tbl_eksperbasvuru SET durum = 'P' WHERE kullanici_adi = '$secilenkull'");
                    $row5 = mysqli_fetch_array($guncelle3, MYSQLI_ASSOC);
                    echo '<script type="text/javascript">alert("Başvuru reddedildi.");</script>';
                    echo '<meta http-equiv="refresh" content="0;URL=admineksperatama.php">';
                  }
                }
              }
              ?>
            </select>
          </div>
          
        </form>
      </div>
    </main>
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