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
	<link rel="stylesheet" type="text/css" href="css/sifremi_unuttum.css">
	<title>Şifremi Unuttum</title>
</head>
<body>
	<h1>Şifreni mi unuttun?</h1>
      <hr></hr>
      <h3>E-Posta adresinizi yazın ve şifrenizi öğrenin</h3>
      
      <form action="sifremi_unuttum.php" method="POST">
        <label for="mail">E-Posta</label></br>
        <input type="email" id="name" name="name" placeholder="E-Posta adresinizi giriniz" required onblur="validateName(name)">   
      <button type="submit" name="gonderbuton">Gönder</button>
  	  <span id="nameError" style="display: none;" >E-Postanız ile ilgili bir hata oluştu</span>
      </form>

    <?php  
    	$mail = $_POST["name"];
    	$gonderbuton = $_POST["gonderbuton"];

    	$sql = mysqli_query($baglanti, "SELECT sifre FROM tbl_kullanici WHERE mail='$mail'");
    	$row = mysqli_fetch_array($sql,MYSQLI_ASSOC);

    	if (isset($_POST["gonderbuton"])) {
    		if (mysqli_num_rows($sql) == 1){
    			$sifre = $row["sifre"];
    			$_SESSION["sifre"] = $sifre;
    			require_once("mail_gonder.php");
    			echo '<script type="text/javascript">alert("Şifreniz başarıyla gönderildi.");</script>';
				echo '<meta http-equiv="refresh" content="0;URL=sifremi_unuttum.php">';
				/*
				header("Location:mail_gonder.php");
				*/
    		}else{
    			echo '<script type="text/javascript">alert("E-Postanızı kontrol ediniz.");</script>';
				echo '<meta http-equiv="refresh" content="0;URL=sifremi_unuttum.php">';
    		}
    		mysqli_close($baglanti);
    	}
    	
    ?>
</body>
<script src="js/sifremi_unuttum.js" type="text/javascript"></script>
</html>