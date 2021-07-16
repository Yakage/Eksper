<?php  
	error_reporting (E_ALL ^ E_NOTICE);
?>

<!DOCTYPE html>
<html lang="tr-TR">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/uyeol.css">
	<title>Üye Ol</title>
</head>
<body>
	<div class="container">
  	<div class="toggle-button">
  		<a href="girisyap.php" style="text-decoration: none; color: white;"><p id="button-text">Sign Up<br>Giriş Yap</p></a>
  	</div>
  	<form action="uyeol.php" method="POST">
    	<div class="title"><h1 id="title-text">Welcome Back<br>Kayıt Ol</h1></div>
    	<div class="double-field show-field" id="signUp-only">
      	<div class="input-div"><p>Ad-Soyad:</p><input type="text" name="adsoyad" id="adsoyad" maxlength="30"></div>
      	<span class="spacing"></span>
      	<div class="input-div"><p>Kullanıcı Adı:</p><input type="text" name="kadi" id="kadi" maxlength="30"></div>
    	</div>
    	<div class="input-div"><p>Email:</p><input type="email" name="email" id="email"></div>
    	<div class="input-div"><p>Şifre:</p><input type="password" name="sifre" id="sifre"></div>
    	<div class="input-div show-field" id="signUp-only">
      	<p>Şifre Tekrar:</p>
      	<input type="password" name="sifretekrar" id="sifretekrar">
    	</div>
    	<button type="submit" id="button" name="kayitolbuton">Kayıt Ol</button>
  	</form>
	</div>

	<?php  
		include 'baglanti.php';

		$adsoyad= $_POST["adsoyad"]; 
		$kullaniciadi = $_POST["kadi"];
		$email= $_POST["email"];
		$sifre= $_POST["sifre"];
		$sifretekrar= $_POST["sifretekrar"];

		if(isset($_POST["kayitolbuton"]))
		{
			$kontrol = mysqli_query($baglanti, "select * from tbl_kullanici where kullanici_adi='$kullaniciadi'");
			$kayitsayisi = mysqli_num_rows($kontrol,MYSQLI_ASSOC);
			if ($kayitsayisi == 0) {
			if(($kullaniciadi == "") and ($sifre == "") and ($sifretekrar == "")){ //Eğer kullanıcı adı, şifresi ve şifre(tekrar) alanı boş ise hata mesajı verdiriyoruz
				echo '<script type="text/javascript">alert("Boş bıraktığınız alanlar var!");</script>';
				echo '<meta http-equiv="refresh" content="0;URL=uyeol.php">';
			}elseif($sifre != $sifretekrar){ //Eğer kullanıcı şifresi ve şifre(tekrar) eşleşmiyorsa hata mesajı verdiriyoruz
				echo '<script type="text/javascript">alert("Şifreleriniz birbiriyle uyuşmuyor!");</script>';
				echo '<meta http-equiv="refresh" content="0;URL=uyeol.php">';
			}
			elseif(mysqli_num_rows($kontrol) == 1){
				echo '<script type="text/javascript">alert("Bu kullanıcı adına ait başka bir üye var!");</script>';
				echo '<meta http-equiv="refresh" content="0;URL=uyeol.php">';
			}
			else{ //Eğer boş bırakılan bir alan yoksa, şifre ve şifre(tekrar) eşleşiyorsa kullanıcı kayıt işlemini gerçekleştiriyoruz
				$ekle = "INSERT INTO tbl_kullanici (ad_soyad,mail,kullanici_adi,sifre) 
				VALUES ('$adsoyad','$email','$kullaniciadi', '$sifre')"; 
				//Kullanıcıyı veritabanına kaydedicek mysql kodu
				mysqli_query($baglanti,$ekle);
    			echo '<script type="text/javascript">alert("Kayıt işleminiz başarıyla gerçekleşti!");</script>';
				echo '<meta http-equiv="refresh" content="0;URL=uyeol.php">';
			}
			}
			mysqli_close($baglanti);
		}
	?>
</body>
<script src="js/uyeol.js" type="text/javascript"></script>
</html>