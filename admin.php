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
  <link rel="stylesheet" type="text/css" href="css/admin.css">
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
        <h2>Hoş Geldin</h2>
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
                        <img src="resimler/images.png" alt="deger kaybi" />
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