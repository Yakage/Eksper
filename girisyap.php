<?php  
	error_reporting (E_ALL ^ E_NOTICE);
?>
<!DOCTYPE html>
<html lang="tr-TR">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" type="text/css" href="css/girisyap.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Giriş Yap</title>
</head>
<body>
	<div class="wrapper fadeInDown">
  	<div id="formContent">
    <!-- Tabs Titles -->
    <h2 class="active">Giriş Yap</h2>

    <!-- Login Form -->
    <form action="kontrol.php" method="POST">
      <input type="text" id="kadi" class="fadeIn second" name="kadi" placeholder="Kullanıcı adı">
      <input type="password" id="sifre" class="fadeIn third" name="sifre" placeholder="Şifre">
      <input type="submit" class="fadeIn fourth" name="girisbuton" value="Giriş">
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="sifremi_unuttum.php">Şifremi Unuttum?</a>
    </div>
  </div>
</div>
<?php  
/*
  include 'baglanti.php';

  $kullaniciadi = $_GET["kadi"];
  $sifre = $_GET["sifre"];

  if(isset($_GET["girisbuton"]))
  {
    $sql = mysqli_query($baglanti, "SELECT * FROM tbl_kullanici WHERE kullanici_adi='$kullaniciadi' and sifre='$sifre'");
    $row = mysqli_fetch_array($sql);
    if(isset($_GET['kadi']) && isset($_GET['sifre'])) { // form gönderilmiş mi
      if(empty($kullaniciadi) || empty($sifre)) { // gönderilenler boş mu
        echo 'Lütfen boş bırakmayın';
        header("Location:girisyap.php");
      }

      else {
         if ($row['kullanici_adi'] == $kullaniciadi && $row['sifre'] == $sifre ){
           echo "Başarıyla giriş yapıldı. Hoş geldin, ".$row['kullanici_adi'];
           header("Location:home.php");
          } else {
           echo "Giriş yapılamadı. Lütfen kullanıcı adınızı ve şifrenizi kontrol edin";
           header("Location:girisyap.php");
        }
      }
    }
    else {
      echo 'Lütfen formu kullanın';
      header("Location:girisyap.php");
    }
  }
*/
?>
</body>
</html>