
	<?php  
		$hostadresi        =	"localhost";
		$kullaniciadi      =	"root";
		$sifre             =	"";
		$veritabani        =	"db_degerkaybi";
		
		$baglanti = @mysqli_connect($hostadresi,$kullaniciadi,$sifre,$veritabani);
		if (mysqli_connect_errno())
		{
			echo "MySQL bağlantısı başarısız: " . mysqli_connect_error();
		}
		/*
		echo "MySQL bağlantısı başarıyla gerçekleştirildi.";
		*/
	?>
