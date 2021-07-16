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
	<link rel="stylesheet" type="text/css" href="css/admineksperatama.css">
	<title>Admin Paneli</title>
</head>
<body>
	<div class="admin">
		<header class="admin__header">
			<a href="admin.php" class="logo">
				<h1 style="font-size: 32px;">Değer Kaybı</h1>
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
		<main class="admin__main">
			<div class="dashboard">
				<table class="rwd-table">
					<tr>
						<th>Ad-Soyad</th>
						<th>Kullanıcı Adı</th>
						<th>E-Mail</th>
						<th>Rol</th>
						<th>Kayıt Tarihi</th>
					</tr>

					<?php
					$sql = mysqli_query($baglanti, "SELECT * FROM tbl_kullanici");
					/* foreach ($sql as $gecmis) {} */
					while ($row = mysqli_fetch_array($sql,MYSQLI_ASSOC)) {

						$kul_id = $row['id'];
						$ad_soyad = $row['ad_soyad'];
						$k_adi = $row['kullanici_adi'];
						$mail = $row['mail'];
						$rol_id = $row['rol_id'];
						$kayit_tar = $row['kayit_tarihi'];

						if ($rol_id == 0) {

							echo "<tr>
							<td data-th='Ad-Soyad'>$ad_soyad</td>
							<td data-th='Kullanıcı Adı'>$k_adi</td>
							<td data-th='E-Mail'>$mail</td>
							<td data-th='Rol'>Kullanıcı</td>
							<td data-th='Kayıt Tarihi'>$kayit_tar</td>
							</td>
							</tr>
							";
						}

					}
					?>
				</table>
				<br><br>
				<form method="POST" style="float: left;">
					<div class="select-wrap">
						<select name="select-1" id="select-1">
							<option value="Kullanıcı seçiniz...">Kullanıcı seçiniz...</option>
							<?php
							$secilenkul = $_POST["select-1"];
							$_SESSION['secilenkul'] = $secilenkul;
							$kulsec = mysqli_query($baglanti, "SELECT * FROM tbl_kullanici WHERE rol_id < 1");
							while ($row2 = mysqli_fetch_array($kulsec,MYSQLI_ASSOC)) {
								$k_adi = $row2['kullanici_adi'];
								echo "<option value='$k_adi'>$k_adi</option>";
							}
							?>
						</select>
						<br><br>
						<input type="submit" id="gonder" name="gonder" value="Gönder">
						<br><br>
						<?php
						$kullan_sil = $_SESSION['secilenkul'];
						$kul_id_al = mysqli_query($baglanti, "SELECT * FROM tbl_kullanici WHERE kullanici_adi = '$kullan_sil'");
						if ($row3 = mysqli_fetch_array($kul_id_al, MYSQLI_ASSOC)) {
							$kul_id = $row3['id'];
							if (isset($_POST['gonder'])) {
								if ($kullan_sil == "Kullanıcı seçiniz...") {
									echo '<script type="text/javascript">alert("Lütfen boş alan bırakmayınız.");</script>';
									echo '<meta http-equiv="refresh" content="0;URL=adminkullaniciengelleme.php">';
								}
								else{
									$kul_sil = mysqli_query($baglanti, "DELETE FROM tbl_kullanici WHERE id = '$kul_id'");
									mysqli_fetch_array($kul_sil, MYSQLI_ASSOC);
									$itiraz_sil = mysqli_query($baglanti, "DELETE FROM tbl_itiraz WHERE kullanici_id = '$kul_id'");
									mysqli_fetch_array($itiraz_sil, MYSQLI_ASSOC);
									$deger_sil = mysqli_query($baglanti, "DELETE FROM tbl_eksperbasvuru WHERE kullanici_id = '$kul_id'");
									mysqli_fetch_array($deger_sil, MYSQLI_ASSOC);
									$eksp_sil = mysqli_query($baglanti, "DELETE FROM tbl_degerkaybibasvuru WHERE kullanici_id = '$kul_id'");
									mysqli_fetch_array($eksp_sil, MYSQLI_ASSOC);
									echo '<script type="text/javascript">alert("Kullanıcı silme/engelleme işlemi başarıyla tamamlandı.");</script>';
									echo '<meta http-equiv="refresh" content="0;URL=adminkullaniciengelleme.php">';
								}
							}
						}
						

						?>
					</div>
				</form>
			</div>
		</main>
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