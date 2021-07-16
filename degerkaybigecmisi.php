<?php  
error_reporting (E_ALL ^ E_NOTICE);
require_once("baglanti.php");
session_start();
?>
<!DOCTYPE html>
<html lang="tr-TR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/degerkaybigecmisi.css">
    <title>Eksper Profil</title>
</head>
<body>
    <div id="app">
        <div class="fixed-menu active">
            <div class="switch">
                <i class="fa fa-times-circle" aria-hidden="true"></i>
            </div>
            <div class="logo">
                <a href="javascript:;"></a>
                <p>Değer Kaybı</p>
            </div>
            <h3>DEĞER KAYBI GEÇMİŞİ</h3>
            <ul>
                <li>
                    <a href="degerkaybibelirleme.php">
                        <i class="fas fa-car" aria-hidden="true"></i>
                        Değer Kaybı Belirleme
                    </a>
                </li>
                <li>
                    <a href="degerkaybigecmisi.php">
                        <i class="fas fa-history" aria-hidden="true"></i>
                        Değer Kaybı Geçmişi
                    </a>
                </li>
                <li>
                    <a href="itirazyonetimi.php">
                        <i class="fas fa-hammer" aria-hidden="true"></i>
                        Itiraz Yönetimi
                    </a>
                </li>
                <!--
                <li>
                    <a href="itiraz.php">
                        <i class="fas fa-tasks" aria-hidden="true"></i>
                        Itiraz Paneli
                    </a>
                </li>
                <li>
                    <a href="javascript:;">
                        <i class="fa fa-users" aria-hidden="true"></i>
                        People
                    </a>
                </li>
                -->
    </ul>
    <div class="btn-box">
        <a href="eksperhome.php" class="btn">Anasayfa</a>
        <a href="cikis.php" class="btn">Çıkış</a>
    </div>
    <div class="music">
            <!--
            <div class="pic">
                <img src="https://picsum.photos/300/200?random=10" alt="" />
            </div>
            <p>music - name</p>
            <div class="control">
                <div class="prev btn">
                    <i class="fa fa-fast-backward" aria-hidden="true"></i>
                </div>
                <div class="play btn">
                    <i class="fa fa-play" aria-hidden="true"></i>
                </div>
                <div class="next btn">
                    <i class="fa fa-fast-forward" aria-hidden="true"></i>
                </div>
            </div>
        -->
    </div>
</div>
<div class="content">
        <!--
        <header>
            <div class="tips">
                <i class="fa fa-bell-o" aria-hidden="true"></i>
            </div>
        </header>
    -->
    <main>
        <div class="info">
            <h1>Hakan Talha Övüç</h1>
            <p>
                <i class="fa fa-suitcase" aria-hidden="true"></i>
                Eksper
            </p>
            <p>
                <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                Medipol Üniversitesi
            </p>
            <p>
                <i class="fa fa-map-marker" aria-hidden="true"></i>
                Istanbul
            </p>
        </div>
        <div class="post">
            <table class="rwd-table">
        <tr>
            <th>Araç Markası</th>
            <th>Araç Modeli</th>
            <th>Araç KM</th>
            <th>Araç Plaka</th>
            <th>Kaza Tarihi</th>
            <th>Değer Kaybı (TL)</th>
        </tr>
        <?php  
        $kullanici_id3 =  $_SESSION["kullanici_id"];
        $sql2 = mysqli_query($baglanti, "SELECT * FROM tbl_degerkaybibasvuru WHERE eksper_id = '$kullanici_id3'");

        /* foreach ($sql as $gecmis) {} */
        while ($row2 = mysqli_fetch_array($sql2,MYSQLI_ASSOC)) {
            $durum = $row2['durum'];
            $arac_markasi = $row2['arac_markasi'];
            $arac_modeli = $row2['arac_modeli'];
            $arac_km = $row2['arac_km'];
            $arac_plaka = $row2['arac_plaka'];
            $kaza_tarihi = $row2['kaza_tarihi'];
            $fiyat = $row2['degerkaybi'];

            if ($durum != 'A') {
                echo "<tr>
                <td data-th='Araç Markası'>$arac_markasi</td>
                <td data-th='Araç Modeli'>$arac_modeli</td>
                <td data-th='Araç KM'>$arac_km</td>
                <td data-th='Araç Plaka'>$arac_plaka</td>
                <td data-th='Kaza Tarihi'>$kaza_tarihi</td>
                <td data-th='Değer Kaybı (TL)'>$fiyat</td>
                </tr>";
            }
        }
        ?>
    </table>
        </div>
    </main>
</div>
</body>
<script src="https://kit.fontawesome.com/d860437f13.js" crossorigin="anonymous"></script>
</html>