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
    <link rel="stylesheet" type="text/css" href="css/itirazyonetimi.css">
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
            <h3>İTİRAZ YÖNETİMİ</h3>
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
            <form method="POST">
                <div class="select-wrap">
                    Onay Durumu:
                    <br>
                    <select name="select-3" id="select-3">
                        <option value="Reddet">Reddet</option>
                        <option value="Onayla">Onayla</option>
                        <?php
                        $onaydurum = $_POST["select-3"];
                        $_SESSION['onaydurum'] = $onaydurum;
                        ?>
                    </select>
                </div>
                <div class="select-wrap">
                    <select name="select-2" id="select-2">
                        <option value="Plaka Seçiniz...">Plaka Seçiniz...</option>
                        <?php
                        $kullanici_id4 = $_SESSION["kullanici_id"];
                        $secilenplaka = $_POST["select-2"];
                        $_SESSION['secilenplaka'] = $secilenplaka;
                        $plakasec = mysqli_query($baglanti, "SELECT DISTINCT arac_plaka, durum FROM tbl_itiraz WHERE kullanici_id NOT IN ('$kullanici_id4')");
                            /*
                            $plakalar = array();
                            $i = 0;
                            */
                            while ($row3 = mysqli_fetch_array($plakasec,MYSQLI_ASSOC)) {
                                $arac_plaka = $row3['arac_plaka'];
                                $basvurudurum = $row3['durum'];
                                /*
                                $plakalar[$i] = $arac_plaka;
                                echo '<script type="text/javascript">alert("'.$plakalar[$i].'");</script>';
                                echo '<meta http-equiv="refresh" content="0;URL=degerkaybibelirleme.php">';
                                */
                                if ($basvurudurum == 'A') {
                                    echo "<option value='$arac_plaka'>$arac_plaka</option>";
                                }
                            }
                            
                            ?>
                        </select>
                        <input type="submit" name="onayla" id="onayla" value="Onayla">
                        <ul class="select-list hide"></ul>
                    </div>
                    <table class="rwd-table">
                        <tr>
                            <th>Araç Plakası</th>
                            <th>Açıklama</th>
                            <th>Durum</th>
                        </tr>
                        <?php  
                        $secilenpla = $_SESSION['secilenplaka'];
                        $kullanici_id3 =  $_SESSION["kullanici_id"];
                        $sql2 = mysqli_query($baglanti, "SELECT * FROM tbl_itiraz WHERE arac_plaka = '$secilenpla'");

                        /* foreach ($sql as $gecmis) {} */
                        if (isset($_POST["onayla"])) {
                            while ($row2 = mysqli_fetch_array($sql2,MYSQLI_ASSOC)) {
                                $durum = $row2['durum'];
                                $arac_plaka = $row2['arac_plaka'];
                                $_SESSION['gelen'] = $arac_plaka;
                                $aciklama = $row2['aciklama'];

                                echo "<tr>
                                <td data-th='Araç Plakası'>$arac_plaka</td>
                                <td data-th='Açıklama'>$aciklama</td>
                                <td data-th='Durum'>$durum</td>
                                </tr>";
                            }
                        }
                        
                        ?>
                    </table>
                    <textarea id="yanit" name="yanit" placeholder="Yanıtınızı yazınız..."></textarea>
                    <input type="submit" id="gonder" name="gonder" value="Gönder">
                    <?php
                    $onaydurumu = $_SESSION['onaydurum'];  
                    $yanit = $_POST["yanit"];
                    $secilen = $_SESSION['gelen'];
                    $eksper_id = $_SESSION['kullanici_id'];

                    if (isset($_POST["gonder"])) {
                        if ($yanit == "") {
                            echo '<script type="text/javascript">alert("Lütfen boş alan bırakmayınız.");</script>';
                            echo '<meta http-equiv="refresh" content="0;URL=itirazyonetimi.php">';
                        }
                        else {
                            $itirazidal = mysqli_query($baglanti, "SELECT id FROM tbl_itiraz ORDER BY id DESC LIMIT 1");
                            $row4 = mysqli_fetch_array($itirazidal,MYSQLI_ASSOC);
                            $_SESSION['sonitiraz'] = $row4['id'];
                            $itirazid = $_SESSION['sonitiraz'];
                            if ($onaydurumu == 'Reddet') {
                                $guncelle = mysqli_query($baglanti, "UPDATE tbl_itiraz SET yanit = '$yanit', eksper_id = '$eksper_id' WHERE arac_plaka = '$secilen' and id = '$itirazid'");
                                $row = mysqli_fetch_array($guncelle, MYSQLI_ASSOC);
                                echo '<script type="text/javascript">alert("Mesaj başarıyla gönderildi.");</script>';
                                echo '<meta http-equiv="refresh" content="0;URL=itirazyonetimi.php">';
                            }
                            else{
                                $guncelle2 = mysqli_query($baglanti, "UPDATE tbl_itiraz SET yanit = '$yanit', eksper_id = '$eksper_id' WHERE arac_plaka = '$secilen' and id = '$itirazid'");
                                $row2 = mysqli_fetch_array($guncelle2, MYSQLI_ASSOC);
                                $guncelle5 = mysqli_query($baglanti, "UPDATE tbl_itiraz SET durum = 'P' WHERE arac_plaka = '$secilen'");
                                $row5 = mysqli_fetch_array($guncelle5, MYSQLI_ASSOC);
                                $guncelle6 = mysqli_query($baglanti, "UPDATE tbl_degerkaybibasvuru SET durum = 'A' WHERE arac_plaka = '$secilen'");
                                $row6 = mysqli_fetch_array($guncelle5, MYSQLI_ASSOC);
                                echo '<script type="text/javascript">alert("Mesaj başarıyla gönderildi.");</script>';
                                echo '<meta http-equiv="refresh" content="0;URL=itirazyonetimi.php">';
                            }
                            
                        }
                    }
                    ?>
                </form>
            </div>

        </main>
    </div>
</body>
<script src="https://kit.fontawesome.com/d860437f13.js" crossorigin="anonymous"></script>
</html>