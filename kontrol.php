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
  <title>Kontrol</title>
</head>
<body>
	<?php  
  $kullaniciadi = $_POST["kadi"];
  $sifre = $_POST["sifre"];

  $sql = mysqli_query($baglanti, "SELECT * FROM tbl_kullanici WHERE kullanici_adi='$kullaniciadi' and sifre='$sifre'");
  $row = mysqli_fetch_array($sql,MYSQLI_ASSOC);
  $rol_id = $row["rol_id"];
  if ($rol_id == 0) {
    if (mysqli_num_rows($sql) == 1){
      $kullanici_id = $row["id"];
      $_SESSION['kullanici_id'] = $kullanici_id;
      $_SESSION['kadi'] = $kullaniciadi;
      $_SESSION['rol_id'] = $rol_id;
              /*
              echo "Başarıyla giriş yapıldı. Hoş geldin, " . $row['kullanici_adi'];
              */
              header("Location:home.php");
              die();

            }else {
              if(empty($kullaniciadi) || empty($sifre)) { // gönderilenler boş mu
                echo "Lütfen boş bırakmayın" . "<br>" . "<a href='girisyap.php'>Giriş Yap sayfasına dönmek için tıklayınız.</a>";
              }
              else{
                echo "Giriş yapılamadı. Lütfen kullanıcı adınızı ve şifrenizi kontrol edin" . "<br>" . "<a href='girisyap.php'>Giriş Yap sayfasına dönmek için tıklayınız.</a>";
              }
            }
          }
          if ($rol_id == 1) {
            if (mysqli_num_rows($sql) == 1){
              $kullanici_id = $row["id"];
              $_SESSION['kullanici_id'] = $kullanici_id;
              $_SESSION['kadi'] = $kullaniciadi;
              $_SESSION['rol_id'] = $rol_id;
              /*
              echo "Başarıyla giriş yapıldı. Hoş geldin, " . $row['kullanici_adi'];
              */
              header("Location:eksperhome.php");
              die();

            }else {
              if(empty($kullaniciadi) || empty($sifre)) { // gönderilenler boş mu
                echo "Lütfen boş bırakmayın" . "<br>" . "<a href='girisyap.php'>Giriş Yap sayfasına dönmek için tıklayınız.</a>";
              }
              else{
                echo "Giriş yapılamadı. Lütfen kullanıcı adınızı ve şifrenizi kontrol edin" . "<br>" . "<a href='girisyap.php'>Giriş Yap sayfasına dönmek için tıklayınız.</a>";
              }
            }
          }
          if ($rol_id == 2) {
            $kullanici_id = $row["id"];
            $_SESSION['kullanici_id'] = $kullanici_id;
            $_SESSION['kadi'] = $kullaniciadi;
            $_SESSION['rol_id'] = $rol_id;
              /*
              echo "Başarıyla giriş yapıldı. Hoş geldin, " . $row['kullanici_adi'];
              */
              header("Location:admin.php");
              die();
            }
            else {
              if(empty($kullaniciadi) || empty($sifre)) { // gönderilenler boş mu
                echo "Lütfen boş bırakmayın" . "<br>" . "<a href='girisyap.php'>Giriş Yap sayfasına dönmek için tıklayınız.</a>";
              }
              else{
                echo "Giriş yapılamadı. Lütfen kullanıcı adınızı ve şifrenizi kontrol edin" . "<br>" . "<a href='girisyap.php'>Giriş Yap sayfasına dönmek için tıklayınız.</a>";
              }
            }
            
            ?>
          </body>
          </html>