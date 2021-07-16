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
	<link rel="stylesheet" type="text/css" href="css/home.css">
	<title>Anasayfa</title>
</head>
<body>
	<div class="header">
        <div class="nav-menu">
            <div class="logo">Değer Kaybı</div>
            <div class="menu">
                <ul>
                    <li><a href="#">Anasayfa</a></li>
                    <li><a href="profil.php">Profil</a></li>
                    <li><a href="#">Hakkımızda</a></li>
                    <li><a href="#">İletişim</a></li>
                    <li><a href="cikis.php">Çıkış</a></li>
                </ul>
            </div>
        </div>
        <div class="banner"> 
            <h1 style="color:black;">Değer Kaybı Nedir?</h1>
            <p style="color:black; font-size: 20px;">Kaza sebebiyle onarım gören araçların ikinci el piyasa değerlerinde meydana gelen maddi kaybı ifade eder. Aracınız kazada herhangi bir hasar görmüşse tamamen ve en düzgün şekilde tamir edilmiş olsa dahi aracınızda değer kaybı oluşur.</p>
            <a href="#">Daha Fazla</a>
        </div>
</div>
  <div class="container">
        <div class="text">
            <h1>Hizmetlerimiz</h1>
        </div>
        <div class="main">
            <div class="single">
                <i class="fas fa-car-crash"></i>
                <p>Oto ekspertiz işlemleri, ilgili aracın geçmişte yaşadığı kazalardan değişen parçalara, mekanik aksamında bozulan yerlerden yakın zamanda masraf çıkarabilecek tüm noktalara kadar otomobilin incelenmesinden oluşmaktadır.</p>
                <a href="index.html">Daha Fazla</a>
            </div>
            <div class="single">
                <i class="fas fa-lira-sign"></i>
                <p>Araçlarınızın değer kaybını yapacak tecrübeli ekibimizin sizlere özel olarak vereceği işlem ücretlerinden
                yararlanabilirsiniz.</p>
                <a href="index.html">Daha Fazla</a>
            </div>
            <div class="single">
                <i class="fas fa-gavel"></i>
                <p>Siz müşterilerimizin itiraz ettiği eksper raporları dahilinde, hukuki süreçte de yanınızdayız.</p>
                <a href="index.html">Daha Fazla</a>
            </div>
        </div>
        <footer>

            <p class="txt"><b>Değer kaybı</b> ile size özel eksper tekliflerinden kolayca yararlanır ve teklif konusunda
            ilgili değer kaybının hukuki sürecini takip edebilmesi adına avukata yönlendirebilirsin. İletişime geçmek için <a href="#">tıklayınız.</a></p>

          <a class="footer-a" href="#">Daha Fazla</a>

          <span> &copy; Website design by <b>Hakan Talha Övüç</b>  | 2021</span>
        </footer>
        <?php
        	/*
        	$kullaniciadi = $_SESSION["kadi"];
        	echo "Hoş geldin, " . $kullaniciadi;
            $rol_id = $_SESSION["rol_id"];
            echo "Giriş yapan kullanıcının rol idsi: " . $rol_id;
            */
        ?>
</div>
</body>
</html>