<?php
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
  
  require("PHPMailer/src/Exception.php");
  require("PHPMailer/src/PHPMailer.php");
  require("PHPMailer/src/SMTP.php");
  /*
  require_once("mail/PHPMailerAutoload.php");
  */
  session_start();
  $sifre = $_SESSION["sifre"];
  /*
  echo $sifre . "<br>";
  */
  $mail = new PHPMailer();
  $mail->IsSMTP();
  $mail->SMTPDebug = 2; 
  $mail->SMTPAuth = true;
  $mail->SMTPSecure = 'tls';
  $mail->Host = 'smtp.gmail.com';
  $mail->Port = 587;
  $mail->IsHTML(true);
  $mail->SetLanguage("tr", "PHPMailer/language/");
  $mail->CharSet ="utf-8";
  $mail->Username = "h.talhaovuc@gmail.com";
  $mail->Password = "Ha583428";
  $mail->SetFrom("h.talhaovuc@gmail.com", "Hakan Talha Övüç"); // Mail attigimizda yazacak isim
  $mail->AddAddress("h4kantalha@yandex.com"); // Maili gonderecegimiz kisi/ alici
  $mail->Subject = "Şifremi Unuttum"; // Konu basligi
  $mail->Body = "Şifreniz: " . $sifre; // Mailin icerigi
  if(!$mail->Send()){
    echo "Mailer Error: ".$mail->ErrorInfo;
  } else {
    echo "Mesaj gonderildi";
  }
?>