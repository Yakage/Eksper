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
	<link rel="stylesheet" type="text/css" href="css/eksperbasvurusu.css">
	<title>Eksper Başvurusu</title>
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
            <h3>EKSPER BAŞVURUSU</h3>
            <ul>
                <li>
                    <a href="degerbasvurusu.php">
                        <i class="fas fa-car" aria-hidden="true"></i>
                        Değer Kaybı Başvurusu
                    </a>
                </li>
                <li>
                    <a href="gecmishasarlar.php">
                        <i class="fas fa-history" aria-hidden="true"></i>
                        Geçmiş Hasarlar
                    </a>
                </li>
                <li>
                    <a href="itiraz.php">
                        <i class="fas fa-tasks" aria-hidden="true"></i>
                        Itiraz Paneli
                    </a>
                </li>
                <li>
                    <a href="itirazgecmisi.php">
                        <i class="fas fa-history" aria-hidden="true"></i>
                        Itiraz Geçmişi
                    </a>
                </li>
                <li>
                    <a href="eksperbasvuru.php">
                        <i class="fas fa-user" aria-hidden="true"></i>
                        Eksper Başvurusu
                    </a>
                </li>
            </ul>
            <div class="btn-box">
                <a href="home.php" class="btn">Anasayfa</a>
                <a href="cikis.php" class="btn">Çıkış</a>
            </div>
            <div class="music">
            </div>
        </div>
        <div class="content">
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
                        <div class="input-div"><p>Tel-No:</p><input type="text" name="telno" id="telno" maxlength="30"></div>
                        <div class="input-div"><p>Doğum Tarihi:</p><input type="date" name="dogtarihi" id="dogtarihi"></div>
                        <textarea id="kendindenbahset" name="kendindenbahset" placeholder="Kendinden bahset (eğitim durumu, iş geçmişi vs.)"></textarea>
                        <button type="submit" id="button" name="button">Başvur</button>
                    </form>
                    <?php  
                    $kullanici_id = $_SESSION['kullanici_id'];
                    $tel_no = $_POST['telno'];
                    $dog_tarihi = $_POST['dogtarihi'];
                    $kendinen_bahset = $_POST['kendindenbahset'];
                    /*
                    echo '<script type="text/javascript">alert("'.$kullanici_id.'");</script>';
                    echo '<meta http-equiv="refresh" content="0;URL=degerbasvurusu.php">';
                    */
                    $bilgiler = mysqli_query($baglanti, "SELECT * FROM tbl_kullanici WHERE id = '$kullanici_id'");
                    $row = mysqli_fetch_array($bilgiler, MYSQLI_ASSOC);
                    $adsoyad = $row['ad_soyad'];
                    $mail = $row['mail'];
                    $kullanici_adi = $row['kullanici_adi'];
                    /*Medipol Üniversitesi, Bilgisayar Programcılığı bölümü mezunuyum. Yaklaşık 1 sene iş tecrübem var.*/
                    if (isset($_POST["button"])) {
                        if ($tel_no == "" or $dog_tarihi == "gg.aa.yyyy" or $kendinen_bahset == "") {
                            echo '<script type="text/javascript">alert("Lütfen boş alan bırakmayınız.");</script>';
                            echo '<meta http-equiv="refresh" content="0;URL=eksperbasvuru.php">';
                        }
                        else{
                            $diger_telno = mysqli_query($baglanti, "SELECT tel_no FROM tbl_eksperbasvuru");
                            $diger_telno_row = mysqli_fetch_array($diger_telno,MYSQLI_ASSOC);
                            $diger_tel = $diger_telno_row['tel_no'];
                            $kontrol = mysqli_query($baglanti, "SELECT * FROM tbl_eksperbasvuru WHERE kullanici_id = '$kullanici_id'");
                            $kontrolrow = mysqli_fetch_array($kontrol,MYSQLI_ASSOC);
                            $kontrol_id = $kontrolrow['kullanici_id'];
                            $kontrol_telno = $kontrolrow['tel_no'];
                            if ($kontrol_id == $kullanici_id or $diger_tel == $kontrol_telno) {
                                echo '<script type="text/javascript">alert("Birden fazla kez başvuru yapamazsınız.");</script>';
                                echo '<meta http-equiv="refresh" content="0;URL=eksperbasvuru.php">';
                            }
                            else{
                                /*Ege Üniversitesi, İşletme mezunuyum. 3 yıl iş tecrübem var.*/
                                $basvur = mysqli_query($baglanti, "INSERT INTO tbl_eksperbasvuru (ad_soyad,kullanici_adi,mail,tel_no,dogum_tarihi,kendini_tanit,kullanici_id) 
                                    VALUES ('$adsoyad','$kullanici_adi','$mail', '$tel_no', '$dog_tarihi', '$kendinen_bahset', '$kullanici_id')");
                                mysqli_fetch_array($basvur,MYSQLI_ASSOC);

                                echo '<script type="text/javascript">alert("Başvurunuz başarıyla yapılmıştır.");</script>';
                                echo '<meta http-equiv="refresh" content="0;URL=eksperbasvuru.php">';
                            }
                        }
                    }
                    ?>
                </div>
            </main>
        </div>
    </div>
</body>
<script src="js/profil.js" type="text/javascript"></script>
<script src="https://kit.fontawesome.com/d860437f13.js" crossorigin="anonymous"></script>
</html>