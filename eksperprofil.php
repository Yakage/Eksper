<?php  
error_reporting (E_ALL ^ E_NOTICE);
session_start();
?>
<!DOCTYPE html>
<html lang="tr-TR">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/eksperprofil.css">
	<title>Eksper Profili</title>
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
            <h3>PROFIL</h3>
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
        <div class="bar">
            <div class="item">
                <a href="javascript:;"></a>
                <p class="num photos">0</p>
                <p>Devam Eden</p>
            </div>
            <div class="item">
                <a href="javascript:;"></a>
                <p class="num videos">0</p>
                <p>Tamamlanmış</p>
            </div>
            <div class="item">
                <a href="javascript:;"></a>
                <p class="num connections">0</p>
                <p>İtirazlar</p>
            </div>
            <div class="item">
                <a href="javascript:;"></a>
                <p class="num mixes">0</p>
                <p>Total</p>
            </div>
        </div>
        <div class="post">
            <div class="item">
                <a href="javascript:;"></a>
                <div class="pic">
                    <img src="https://aracdegerkaybi.biz/wp-content/uploads/2019/05/profil_photo_1-300x300.png" alt="" />
                </div>
                <div class="txt">
                    <p>
                        Değer kaybı nedir?
                    </p>
                </div>
            </div>
            <div class="item">
                <a href="javascript:;"></a>
                <div class="pic">
                    <img src="https://nitrobilisim.com.tr/media/1131/content/oto-ekspertiz-devletin-zorunlu-oto-ekspertiz-raporu-961552-300x300.jpg" alt="" />
                </div>
                <div class="txt">
                    <p>
                        Eksper kimdir ve görevleri nedir?
                    </p>
                </div>
            </div>
            <div class="item">
                <a href="javascript:;"></a>
                <div class="pic">
                    <img src="https://www.filizerol.av.tr/wp-content/uploads/2021/03/deger-kaybi-ve-kazanc-kaybi.svg" alt="" />
                </div>
                <div class="txt">
                    <p>Hukuki süreçte yapılması gerekenler?</p>
                </div>
            </div>
            <div class="item">
                <a href="javascript:;"></a>
                <div class="pic">
                    <img src="https://foto.haberler.com/haber/2012/12/04/cin-de-her-gun-160-kisi-oluyor-4143711_7994_300.jpg" alt="" />
                </div>
                <div class="txt">
                    <p>Kaza sonrasında yapılması gerekenler?</p>
                </div>
            </div>
        </div>
    </main>
</div>
</div>
<?php
	/*  
	$kullaniciadi =  $_SESSION["kadi"];
	echo "<script type='text/javascript'>alert('$kullaniciadi');</script>";
	*/
    ?>
</body>
<script src="js/eksperprofil.js" type="text/javascript"></script>
<script src="https://kit.fontawesome.com/d860437f13.js" crossorigin="anonymous"></script>
</html>